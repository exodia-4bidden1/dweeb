<?php
session_start();
require_once '../../config/config.php'; // Adjust path as needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get student_id from session (must be logged in)
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(['success' => false, 'message' => 'Not logged in.']);
        exit;
    }
    $student_id = $_SESSION['user_id']; // This is now VARCHAR(11)

    // Get POST data
    $device_id = $_POST['device_id'] ?? '';
    $purpose = trim($_POST['purpose'] ?? '');
    $other_purpose = trim($_POST['other_purpose'] ?? '');
    $borrow_date = $_POST['borrow_date'] ?? '';
    $start_time = $_POST['start_time'] ?? '';
    $end_time = $_POST['end_time'] ?? '';
    $agreed = $_POST['agreed'] ?? '';

    // Validate
    if (!$agreed) {
        echo json_encode(['success' => false, 'message' => 'You must agree to the Device Lending Agreement.']);
        exit;
    }
    if (!$device_id || !$purpose || !$borrow_date || !$start_time || !$end_time) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
        exit;
    }

    // Insert reservation (status = pending)
    $stmt = $conn->prepare("INSERT INTO reservations (student_id, device_id, purpose, other_purpose, borrow_date, start_time, end_time, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("sisssss", $student_id, $device_id, $purpose, $other_purpose, $borrow_date, $start_time, $end_time);

    if ($stmt->execute()) {
        // Insert notification for student
        $title = "Reservation Submitted";
        $message = "Your reservation request for device #$device_id has been submitted and is pending approval.";
        $notif_stmt = $conn->prepare("INSERT INTO notifications (student_id, title, message, type) VALUES (?, ?, ?, 'reservation')");
        $notif_stmt->bind_param("sss", $student_id, $title, $message);
        $notif_stmt->execute();

        echo json_encode(['success' => true, 'message' => 'Reservation submitted successfully!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to submit reservation.']);
    }
    $stmt->close();
    exit;
}
?>