<?php
        define('HOSTNAME', 'localhost');
        define('DB_USERNAME', 'root'); 
        define('DB_PASSWORD','');
        define('DATABASE','clinicdb');

        $connection = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DATABASE);

        if (!$connection) {
            die("Status: Database connection failed: " . mysqli_connect_error());
        }
       
?>