<?php
session_start();
require_once '../../config/config.php';

// Check if student is logged in
if (!isset($_SESSION['user_id'])) {
    die("Access denied. Please log in as a student.");
}
$student_id = $_SESSION['user_id']; // VARCHAR(11)

// Fetch all reservations for this student
$reservations = $conn->query("
    SELECT r.*, d.name AS device_name, d.model
    FROM reservations r
    JOIN devices d ON r.device_id = d.device_id
    WHERE r.student_id = '$student_id'
    ORDER BY r.created_at DESC
");

// Fetch notifications for this student
$notifications = $conn->query("
    SELECT * FROM notifications
    WHERE student_id = '$student_id'
    ORDER BY created_at DESC
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Reservations</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px;}
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f0f0f0; }
        .status-pending { color: orange; }
        .status-approved { color: green; }
        .status-rejected { color: red; }
        .status-completed { color: blue; }
        .status-cancelled { color: gray; }
        .notif { background: #f9f9f9; border: 1px solid #eee; margin-bottom: 8px; padding: 8px; border-radius: 4px;}
    </style>
</head>
<body>
    <h1>My Device Reservations</h1>
    <h2>Reservations</h2>
    <table>
        <tr>
            <th>Reservation ID</th>
            <th>Device</th>
            <th>Purpose</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Other Purpose</th>
        </tr>
        <?php while ($row = $reservations->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['reservation_id']) ?></td>
            <td><?= htmlspecialchars($row['device_name'] . ' (' . $row['model'] . ')') ?></td>
            <td><?= htmlspecialchars($row['purpose']) ?></td>
            <td><?= htmlspecialchars($row['borrow_date']) ?></td>
            <td><?= htmlspecialchars($row['start_time'] . ' - ' . $row['end_time']) ?></td>
            <td class="status-<?= htmlspecialchars($row['status']) ?>"><?= htmlspecialchars(ucfirst($row['status'])) ?></td>
            <td><?= htmlspecialchars($row['other_purpose']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Notifications</h2>
    <?php while ($notif = $notifications->fetch_assoc()): ?>
        <div class="notif">
            <strong><?= htmlspecialchars($notif['title']) ?></strong><br>
            <?= htmlspecialchars($notif['message']) ?><br>
            <small><?= htmlspecialchars($notif['created_at']) ?></small>
        </div>
    <?php endwhile; ?>
</body>
</html>