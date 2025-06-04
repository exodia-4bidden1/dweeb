<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

require_once '../config/config.php';

session_start();

// Check if student is logged in
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$student_id = $_SESSION['user_id'];

// Get status filter from query parameters, default to 'approved'
$statusFilter = isset($_GET['statusFilter']) ? $_GET['statusFilter'] : 'approved';

try {
    // Base query to fetch reservations for the student
    $sql = "
        SELECT 
            d.device_id,
            d.name,
            d.model,
            r.borrow_date,
            r.start_time,
            r.end_time,
            r.status as reservation_status
        FROM reservations r
        JOIN devices d ON r.device_id = d.device_id
        WHERE r.student_id = ?
    ";

    // Add status filtering based on the filter parameter
    if ($statusFilter === 'approved') {
        // Filter for currently borrowed (status is 'approved')
        $sql .= " AND r.status = 'approved'"; 
    } else if ($statusFilter === 'all') {
        // No status filter, fetch all history (all statuses for the student)
        // The WHERE clause already limits to the student
    }

    $sql .= " ORDER BY r.borrow_date DESC";

    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $devices = [];
    while ($row = $result->fetch_assoc()) {
        $devices[] = $row;
    }
    
    echo json_encode([
        'success' => true,
        'devices' => $devices
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error fetching borrowed devices: ' . $e->getMessage()
    ]);
}

$conn->close();
?> 