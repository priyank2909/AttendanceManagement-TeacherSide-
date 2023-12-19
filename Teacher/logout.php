<?php
session_start(); // Start or resume the session

// Destroy the session
session_destroy();

// Redirect the user to the login page
header('Location: ../login.php');
exit();
?>
