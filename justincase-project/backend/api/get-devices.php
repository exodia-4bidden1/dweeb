<?php
header("Access-Control-Allow-Origin: *");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
require_once '../config/config.php'; // or your connection file

$result = $conn->query("SELECT * FROM devices");
$devices = [];
while ($row = $result->fetch_assoc()) {
    if (isset($row['specs'])) {
        $row['specs'] = json_decode($row['specs'], true);
    }
    $devices[] = $row;
}
echo json_encode($devices);
$conn->close();
?>