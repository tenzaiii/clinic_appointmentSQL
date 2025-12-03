<?php
include('dbcon.php');

if (isset($_POST['add_users'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    
    $query = "INSERT INTO clinic_acc (first_name, last_name, email, phone_no) VALUES ('$first_name', '$last_name', '$email', '$phone_no')";
    
    $result = mysqli_query($connection, $query);
    
    if (!$result) {
        header("Location: index.php?message=Error: " . mysqli_error($connection));
    } else {
        header("Location: index.php?message=User added successfully!");
    }
}
?>