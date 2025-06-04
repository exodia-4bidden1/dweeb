<?php
header('Content-Type: application/json');

// Include database configuration
require_once '../config/config.php'; // Ensure this file contains your database credentials

// Use $conn from config.php (mysqli connection)
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed: ' . $conn->connect_error
    ]);
    exit;
}

// Retrieve student ID dynamically (replace with actual session or authentication logic)
if (!isset($_GET['student_id'])) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Student ID is required'
    ]);
    exit;
}
$student_id = $_GET['student_id'];

try {
    // Fetch reservations for the student using mysqli
    $stmt = $conn->prepare("SELECT r.*, d.name AS device_name, d.model FROM reservations r JOIN devices d ON r.device_id = d.device_id WHERE r.student_id = ? ORDER BY r.created_at DESC");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $reservations = [];
    while ($row = $result->fetch_assoc()) {
        $reservations[] = $row;
    }

    // Return reservations in JSON format
    echo json_encode([
        'success' => true,
        'devices' => $reservations // Changed 'data' to 'devices' to match frontend expectation
    ]);

} catch (Exception $e) {
    // Handle general errors
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error fetching reservations: ' . $e->getMessage()
    ]);
}

$conn->close();
?>