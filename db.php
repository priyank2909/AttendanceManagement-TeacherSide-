<?php

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'attendance';

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if(!$conn){
        echo'Could not Connect MYSQL Server: '.mysqli_error($conn);
        die;
    }
?>