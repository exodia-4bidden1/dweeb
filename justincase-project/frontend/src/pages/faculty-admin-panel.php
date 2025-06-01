<?php
session_start();
require_once '../../config/config.php';

// Check if faculty is logged in
if (!isset($_SESSION['faculty_id'])) {
    die("Access denied. Please log in as faculty.");
}
$faculty_id = $_SESSION['faculty_id']; // VARCHAR(11)

// Handle approval/rejection
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reservation_id'], $_POST['action'])) {
    $reservation_id = intval($_POST['reservation_id']);
    $action = $_POST['action'] === 'approve' ? 'approved' : 'rejected';

    // Update reservation status
    $stmt = $conn->prepare("UPDATE reservations SET status=?, faculty_id=?, approved_at=NOW() WHERE reservation_id=?");
    $stmt->bind_param("ssi", $action, $faculty_id, $reservation_id);
    $stmt->execute();

    // Get student_id and device_id for notification
    $res = $conn->query("SELECT student_id, device_id FROM reservations WHERE reservation_id=$reservation_id");
    $row = $res->fetch_assoc();
    $student_id = $row['student_id'];
    $device_id = $row['device_id'];

    // Insert notification
    $title = "Reservation " . ucfirst($action);
    $message = "Your reservation for device #$device_id has been $action by the faculty.";
    $notif_stmt = $conn->prepare("INSERT INTO notifications (student_id, title, message, type) VALUES (?, ?, ?, 'approval')");
    $notif_stmt->bind_param("sss", $student_id, $title, $message);
    $notif_stmt->execute();

    echo "<script>alert('Reservation $action.');window.location.reload();</script>";
    exit;
}

// Fetch all pending reservations
$reservations = $conn->query("
    SELECT r.*, d.name AS device_name, d.model, s.first_name, s.last_name
    FROM reservations r
    JOIN devices d ON r.device_id = d.device_id
    JOIN students s ON r.student_id = s.student_id
    WHERE r.status = 'pending'
    ORDER BY r.created_at DESC
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Faculty Admin Panel - Pending Reservations</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px;}
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f0f0f0; }
        form { display: inline; }
        .btn { padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;}
        .approve { background: #4caf50; color: white;}
        .reject { background: #f44336; color: white;}
    </style>
</head>
<body>
    <h1>Faculty Admin Panel</h1>
    <h2>Pending Device Reservations</h2>
    <table>
        <tr>
            <th>Reservation ID</th>
            <th>Student</th>
            <th>Device</th>
            <th>Purpose</th>
            <th>Date</th>
            <th>Time</th>
            <th>Other Purpose</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $reservations->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['reservation_id']) ?></td>
            <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
            <td><?= htmlspecialchars($row['device_name'] . ' (' . $row['model'] . ')') ?></td>
            <td><?= htmlspecialchars($row['purpose']) ?></td>
            <td><?= htmlspecialchars($row['borrow_date']) ?></td>
            <td><?= htmlspecialchars($row['start_time'] . ' - ' . $row['end_time']) ?></td>
            <td><?= htmlspecialchars($row['other_purpose']) ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="reservation_id" value="<?= $row['reservation_id'] ?>">
                    <button class="btn approve" name="action" value="approve" onclick="return confirm('Approve this reservation?')">Approve</button>
                </form>
                <form method="post">
                    <input type="hidden" name="reservation_id" value="<?= $row['reservation_id'] ?>">
                    <button class="btn reject" name="action" value="reject" onclick="return confirm('Reject this reservation?')">Reject</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>