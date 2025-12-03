<?php
session_start();
include('dbcon.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $appointment_id = intval($_GET['id']);
    $user_id = $_SESSION['user_id'];
    
    $stmt = $connection->prepare("SELECT id FROM appointments WHERE id = ? AND user_id = ? AND status = 'pending'");
    $stmt->bind_param("ii", $appointment_id, $user_id);
    $stmt->execute();
    
    if ($stmt->get_result()->num_rows > 0) {
        $stmt = $connection->prepare("UPDATE appointments SET status = 'cancelled' WHERE id = ?");
        $stmt->bind_param("i", $appointment_id);
        if ($stmt->execute()) {
            header("Location: my-appointments.php?success=1");
        } else {
            header("Location: my-appointments.php?error=1");
        }
    } else {
        header("Location: my-appointments.php?error=1");
    }
    $stmt->close();
}

mysqli_close($connection);
exit();
?>
