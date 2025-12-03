<?php include("dbcon.php"); ?>
<?php

if(isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
}

$query = "select * 'clinic_acc' where email = '$email' and password = '$password'";
$result = mysqli_query($conn, $query);

if(!$result) {
    die("Query Failed: ". mysqli_error($conn));
}else {
    $row = mysqli_num_rows($result);
    echo $row;

    if($row == 1) {
        $SEESSION['email'] = $email;
        header("Location: index.php");
    } else {
        header("Location: login.php?message=Invalid Login Credentials");
    }
}