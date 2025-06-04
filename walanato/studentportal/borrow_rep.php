<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once './db_connect.php';

$student_id = $_SESSION['student_id'] ?? null;
if (!$student_id) {
    header("Location: ../login.php");
    exit();
}

$device_id = $_POST['device_id'] ?? null;
if (!$device_id) {
    echo "Device ID missing.";
    exit(); 
}

// Get POST data from the form
//inalis na priority
$purpose = $_POST['purpose'] ?? '';
$start_time = $_POST['start_time'] ?? '';
$end_time = $_POST['end_time'] ?? '';
$special_request = $_POST['special_req'] ?? '';
$agreement = isset($_POST['agreement']) ? 1 : 0;

// Validate required fields
if (empty($purpose) || empty($start_time) || empty($end_time) || !$agreement) {
    echo "Please fill in all required fields and agree to the terms.";
    exit();
}

// Prepare SQL statement
$sql = "INSERT INTO borrow_request 
        (student_id, device_id, purpose, borrow_time, return_time, special_request, agreement) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

$stmt->bind_param("ssssssi", $student_id, $device_id, $purpose, $start_time, $end_time, $special_request, $agreement);

if ($stmt->execute()) {
    echo "Reservation submitted!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
