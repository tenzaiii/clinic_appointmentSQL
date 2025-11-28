<?php
if (isset($_POST["add_users"])) {

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];   
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];

if ($first_name == "" || empty($first_name)){
    header('location:index.php?message= First Name is required');
}
}
?>