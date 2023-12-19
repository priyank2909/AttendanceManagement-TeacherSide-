<?php
session_start();

include("../db.php");

if (isset($_SESSION['teacherId'])) {
    // The teacherId session variable is set, you can proceed to use it.
    $teacherId = $_SESSION['teacherId'];
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
    $newpass = $_POST['new-password'];
    $newcpass = $_POST['confirm-password']; 
    
    if($newpass == $newcpass)
    {
        $query = "UPDATE teachers SET teacher_password = $newpass, teacher_cpassword = $newcpass WHERE teacher_id = '$teacherId'"; 
        if (mysqli_query($conn, $query)) {
            echo "Record has been updated successfully";
        } else {
            echo "Error: " . $query . ":-" . mysqli_error($conn);
        }
    }else{
        echo "new and confirm not equal";
    }
}
}


?>