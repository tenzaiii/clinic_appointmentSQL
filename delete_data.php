<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($connection, $_GET['id']);
    $query = "DELETE FROM clinic_acc WHERE id='$id'";


    if (mysqli_query($connection, $query)) {
        header("Location: index.php?message=Patient deleted successfully&type=success");
        // After successful DELETE
        mysqli_query($connection, "ALTER TABLE clinic_acc AUTO_INCREMENT = 1");
    } else {
        header("Location: index.php?message=Error deleting patient&type=danger");
    }
}
mysqli_close($connection);
exit();
?>