<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once '../../../backend/config/config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$student_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents('php://input'), true);

$device_id = (int)($data['device_id'] ?? 0);
$purpose = $data['purpose'] ?? '';
$other_purpose = $data['other_purpose'] ?? '';
$borrow_date = $data['borrow_date'] ?? '';
$start_time = $data['start_time'] ?? '';
$end_time = $data['end_time'] ?? '';

if (!$device_id || !$purpose || !$borrow_date || !$start_time || !$end_time) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

$stmt = $conn->prepare("INSERT INTO reservations (student_id, device_id, purpose, other_purpose, borrow_date, start_time, end_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sisssss", $student_id, $device_id, $purpose, $other_purpose, $borrow_date, $start_time, $end_time);

if ($stmt->execute()) {
    // Insert notification for the student
    $notif_stmt = $conn->prepare("INSERT INTO notifications (student_id, title, message, type) VALUES (?, ?, ?, ?)");
    $notif_title = "Reservation Submitted";
    $notif_message = "Your reservation request was submitted and is waiting for faculty approval.";
    $notif_type = "reservation";
    $notif_stmt->bind_param("ssss", $student_id, $notif_title, $notif_message, $notif_type);
    $notif_stmt->execute();
    $notif_stmt->close();

    echo json_encode(['success' => true, 'message' => 'Reservation created']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $stmt->error]);
}
$stmt->close();
$conn->close();
