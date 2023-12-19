<?php
session_start(); // Start a new or resume the existing session

// // Check if the user is logged in (customize this as needed)
// if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
//     header("Location: ../login.php"); // Redirect to the login page if not logged in
//     exit();
// }

// Handle logout
if (isset($_GET["logout"])) {
    session_destroy(); // Destroy the session
    header("Location: ../../login.php"); // Redirect to the login page after logout
    exit();
}
?>

<!-- dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Attendance Management System</title>
    <style>
                   /* Reset some default styles */
                   body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        /* Set a background color for the entire page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        /* Center the dashboard container vertically and horizontally */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Style the dashboard container */
        .dashboard {
            background-color: #fff;
            border-radius: 10px;
            display: flex;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 1500px;
            height: 90%;
            /* max-width: 1200px; Set a maximum width for the dashboard */
        }

        /* Style the left menu */
        .dashboard-menu {
            background-color: #007bff; /* Menu background color */
            color: #fff; /* Text color */
            padding: 20px;
            width: 200px; /* Adjust the width as needed */
        }

        .dashboard-menu h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .dashboard-menu ul {
            list-style: none;
            padding: 0;
        }

        .dashboard-menu ul li {
            margin-bottom: 25px;
        }

        .dashboard-menu ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
            transition: background-color 0.3s;
        }

        .dashboard-menu ul li a:hover {
            background-color: #0056b3; /* Hover background color */
            width: 94%;
            margin-left: 15px;
        }

        /* Style the right content area (iframe) */
        .dashboard-content {
            flex-grow: 1;
            padding: 20px;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="dashboard">
            <div class="dashboard-menu">
                <h1>Welcome Admin</h1>
                <ul>
                    <li><a href="../course/add_course.php" target="content">Manage Course</a></li>
                    <li><a href="../program/add_program.php" target="content">Manage Program</a></li>
                    <li><a href="../teachers/add_teacher.php" target="content">Manage Teacher</a></li>
                    <li><a href="../students/add_student.php" target="content">Manage Students</a></li>
                    <li><a href="../assign_course/assign_course.php" target="content">Course Assignment</a></li>
                    <li><a href="?logout=true">Logout</a></li>
                </ul>
            </div>
            <div class="dashboard-content">
                <iframe name="content" src="" frameborder="0">
                </iframe>
            </div>
        </div>
    </div>
</body>
</html>
