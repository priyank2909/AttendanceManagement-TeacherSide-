<?php
session_start(); // Start a new or resume the existing session

if (isset($_GET["logout"])) {
    session_destroy(); // Destroy the session
    header("Location: ../login.php"); // Redirect to the login page after logout
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
            height: 92vh;
        }

        /* Style the dashboard container */
        .dashboard {
            background-color: #fff;
            border-radius: 10px;
            display: flex;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 1500px;
            height: 96%;
            border: 2px solid black;
            margin-bottom:25px;
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

        .navbar {   
            background-color: #007bff; /* Blue background color */
            color: #fff; /* White text color */
            padding: 10px 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 95%;
            margin-left:17px;
            margin-top:5px;
            border-radius: 10px;
            border: 2px solid black;
            
        }

        .logout-button {
            background-color: #ff0000; /* Red background color */
            color: #fff; /* White text color */
            padding: 5px 10px 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin-left: auto;
        }

        .logout-button:hover {
            background-color: #cc0000; /* Darker red on hover */
            cursor: pointer;
        }

        .teacher-name {
            font-size: 24px;
            font-weight: bold;
        }


    </style>
</head>
<body>
<div class="navbar">
        <?php
            // Include your database connection code here
            include("../db.php");

            if (isset($_SESSION['teacherId'])) {
                // Fetch the teacher's name based on the session teacherId
                $teacherId = $_SESSION['teacherId'];
                $sql = "SELECT teacher_name FROM teachers WHERE teacher_id = '$teacherId'";

                $result = $conn->query($sql);
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $teacherName = $row['teacher_name'];
                    $_SESSION['teacherName'] = $teacherName;
                    echo "<div class='teacher-card'>
                            <span class='teacher-name'>Welcome, $teacherName</span>
                        </div>";
                }
            }
        ?>
    </div>
    <div class="container">
        <div class="dashboard">
            <div class="dashboard-menu"> 
                <ul>
                    <li><a href="profile.php" target="content">Profile</a></li>
                    <li><a href="course_details.php" target="content">Course Details</a></li>
                    <li><a href="update_pass.php" target="content">Update Password</a></li>
                    <li><a href="?logout=true">Logout</a></li>
                </ul>
        </div>
        <div class="dashboard-content">
                <iframe name="content" src="" frameborder="0">
                    <li><a href="logout.php">Logout</a></li>
                </iframe>
            </div>
        </div>
    </div>
</body>
</html>
