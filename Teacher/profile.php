<?php
session_start();
// Include your database connection code here
include("../db.php");

if (isset($_SESSION['teacherId'])) {
    $teacherId = $_SESSION['teacherId'];
    // Fetch teacher details from the database
    $sql = "SELECT * FROM teachers WHERE teacher_id = '$teacherId'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $teacherName = $row['teacher_name'];
        $teacherEmail = $row['teacher_email'];
        $teacherPhone = $row['teacher_phone'];
        $teacherUsername = $row['teacher_username'];
        $teacherDegree = $row['teacher_degree'];
        $course1 = $row['specialized_course_1'];
        $course2 = $row['specialized_course_2'];
        $course3 = $row['specialized_course_3'];
        // Add more fields as needed
    }
} else {
    // Handle the case when the teacher is not logged in
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profile</title>
    <style>
        /* Add your CSS styles for the profile page here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
            margin-left:20px;
        }

        .form-group label {
            font-weight: bold;
            margin-left:10px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 25%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-container {
            text-align: center;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile</h1>
        <form class="profile-form" action="#" method="POST">
            <div class="form-group">
                <label for="teacher-name">Name: </label>
                <input type="text" id="teacher-name" name="teacher-name" value="<?php echo $teacherName; ?>" disabled>
                <label for="teacher-email">Email: </label>
                <input type="email" id="teacher-email" name="teacher-email" value="<?php echo $teacherEmail; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="teacher-phone">Phone: </label>
                <input type="text" id="teacher-phone" name="teacher-phone" value="<?php echo $teacherPhone; ?>" disabled>
                <label for="teacher-username">Username: </label>
                <input type="text" id="teacher-username" name="teacher-username" value="<?php echo $teacherUsername; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="teacher-degree">Degree: </label>
                <input type="text" id="teacher-degree" name="teacher-degree" value="<?php echo $teacherDegree; ?>" disabled>
                <label for="teacher-course1">Specialized Course 1: </label>
                <input type="text" id="teacher-course2" name="teacher-course2" value="<?php echo $course1; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="teacher-course3">Specialized Course 2:</label>
                <input type="text" id="teacher-course3" name="teacher-course3" value="<?php echo $course2; ?>" disabled>
                <label for="teacher-course3">Specialized Course 3:</label>
                <input type="text" id="teacher-course3" name="teacher-course3" value="<?php echo $course3; ?>" disabled>
            </div>
        </form>
    </div>
</body>
</html>
