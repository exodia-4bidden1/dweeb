<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

require_once '../config/config.php';

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get the request body
$data = json_decode(file_get_contents('php://input'), true);

// Validate required fields
if (!isset($data['reservation_id']) || !isset($data['faculty_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

$reservation_id = $data['reservation_id'];
$faculty_id = $data['faculty_id'];

try {
    // Start transaction
    $conn->begin_transaction();

    // Update reservation status to approved
    $update_reservation = $conn->prepare("
        UPDATE resernvations 
        SET status = 'approved', 
            faculty_id = ?, 
            approved_at = NOW() 
        WHERE reservation_id = ? AND status = 'pending'
    ");
    $update_reservation->bind_param("si", $faculty_id, $reservation_id);
    $update_reservation->execute();

    if ($update_reservation->affected_rows === 0) {
        throw new Exception("Reservation not found or already processed");
    }

    // Get reservation details for notification
    $get_details = $conn->prepare("
        SELECT r.student_id, r.device_id, d.name as device_name 
        FROM reservations r
        JOIN devices d ON r.device_id = d.device_id
        WHERE r.reservation_id = ?
    ");
    $get_details->bind_param("i", $reservation_id);
    $get_details->execute();
    $details = $get_details->get_result()->fetch_assoc();

    // Update device status to borrowed
    $update_device = $conn->prepare("
        UPDATE devices 
        SET status = 'borrowed' 
        WHERE device_id = ?
    ");
    $update_device->bind_param("i", $details['device_id']);
    $update_device->execute();

    // Create notification for student
    $notification_title = "Device Reservation Approved";
    $notification_message = "Your reservation for {$details['device_name']} has been approved.";
    $create_notification = $conn->prepare("
        INSERT INTO notifications (student_id, title, message, type) 
        VALUES (?, ?, ?, 'approval')
    ");
    $create_notification->bind_param("iss", $details['student_id'], $notification_title, $notification_message, 'approval');
    $create_notification->execute();

    // Add to device history
    $add_history = $conn->prepare("
        INSERT INTO device_history (device_id, student_id, reservation_id, action, notes) 
        VALUES (?, ?, ?, 'borrowed', 'Device borrowed after faculty approval')
    ");
    $add_history->bind_param("iii", $details['device_id'], $details['student_id'], $reservation_id);
    $add_history->execute();

    // Commit transaction
    $conn->commit();

    echo json_encode([
        'success' => true,
        'message' => 'Device reservation approved successfully',
        'data' => [
            'reservation_id' => $reservation_id,
            'device_id' => $details['device_id'],
            'student_id' => $details['student_id']
        ]
    ]);

} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error approving device reservation: ' . $e->getMessage()
    ]);
}

$conn->close();
?> 