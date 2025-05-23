<!-- HINDI PA NAGANA TO HA -->

<?php
session_start();
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $device_name = trim($_POST['device_name'] ?? '');
    $purpose = trim($_POST['purpose'] ?? '');
    $priority = intval($_POST['priority'] ?? 0);
    $start_time = $_POST['start_time'] ?? '';
    $end_time = $_POST['end_time'] ?? '';
    $special_request = trim($_POST['special_req'] ?? '');
    $agreement = isset($_POST['agreement']) ? 1 : 0;

    if (!$device_name || !$purpose || !$priority || !$start_time || !$end_time || !$special_request || !$agreement) {
        die('Please fill all required fields and agree to the terms.');
    }

    $conn = db_connect();

    $stmt = $conn->prepare("INSERT INTO reservations (device_name, purpose, priority, start_time, end_time, special_request, agreement) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssi", $device_name, $purpose, $priority, $start_time, $end_time, $special_request, $agreement);

    if ($stmt->execute()) {
        // Redirect back with success message or display success page
        header("Location: ../device-catalog.html?reserved=1");
        exit;
    } else {
        die("Failed to submit reservation. Please try again.");
    }
} else {
    die("Invalid request.");
}
?>
