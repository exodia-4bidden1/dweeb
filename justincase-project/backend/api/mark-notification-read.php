<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

require_once '../config/config.php';

session_start();

// Check if student is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

// Get the request body
$data = json_decode(file_get_contents('php://input'), true);

// Validate required fields
if (!isset($data['notification_id'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing notification ID']);
    exit;
}

$notification_id = $data['notification_id'];
$student_id = $_SESSION['user_id'];

try {
    // Mark notification as read
    $stmt = $conn->prepare("
        UPDATE notifications 
        SET is_read = TRUE 
        WHERE notification_id = ? AND student_id = ?
    ");
    
    $stmt->bind_param("is", $notification_id, $student_id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo json_encode([
            'success' => true,
            'message' => 'Notification marked as read'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Notification not found or already read'
        ]);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error marking notification as read: ' . $e->getMessage()
    ]);
}

$conn->close();
?> 