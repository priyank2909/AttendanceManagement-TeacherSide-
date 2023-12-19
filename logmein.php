<?php
session_start();
include("db.php"); // Include your database connection code here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check for admin credentials
    $admin_sql = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
    $admin_result = $conn->query($admin_sql);

    // Check for teacher credentials
    $teacher_sql = "SELECT * FROM teachers WHERE teacher_username = '$username' LIMIT 1";
    $teacher_result = $conn->query($teacher_sql);

    // Check for student credentials
    $student_sql = "SELECT * FROM students WHERE student_username = '$username' LIMIT 1";
    $student_result = $conn->query($student_sql);

    // Check if the user exists in any of the tables and verify the password
    if ($admin_result->num_rows === 1) {
        $row = $admin_result->fetch_assoc();
        if ($password === $row['password']) {
            // Valid credentials
            echo '<script>window.location.href = "Admin/dashboard/admin_dashboard.php";</script>'; // Redirect to the admin dashboard
            //exit;
        }
    } elseif ($teacher_result->num_rows === 1) {
        $row = $teacher_result->fetch_assoc();
        if ($password === $row['teacher_password']) {
            $_SESSION['teacherId'] = $row['teacher_id'];
            // Valid credentials
            echo '<script>window.location.href = "Teacher/teachers_dashboard.php";</script>'; // Redirect to the teacher dashboard
            exit;
        }
    } elseif ($student_result->num_rows === 1) {
        $row = $student_result->fetch_assoc();
        if ($password === $row['student_password']) {
            // Valid credentials
            echo '<script>window.location.href = "Student/students_dashboard.php";</script>';  // Redirect to the student dashboard
            exit;
        }
    } else{

    // Invalid credentials, redirect back to the login page with an error message
    header('Location: login.php?error=1');
    exit;
    }
} else {
    // Handle cases where the request method is not POST
    header('Location: login.php'); // Redirect to the login page
    exit;
}

?>
