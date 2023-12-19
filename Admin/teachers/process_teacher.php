<?php
include("../../db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addTeacher'])) {
        // Add Course
        $teacherId = $_POST['teacherId'];
        $teacherName = $_POST['teacherName'];
        $teacherEmail = $_POST['teacherEmail'];
        $teacherPhone = $_POST['teacherPhone'];
        $teacherUsername = $_POST['teacherUsername'];
        $teacherPassword = $_POST['teacherPassword'];
        $teacherCpassword = $_POST['teacherCpassword'];
        $teacherDegree = $_POST['teacherDegree'];
        $teachercourse = $_POST['specializedCourse1'];
        $teachercourse2 = $_POST['specializedCourse2'];
        $teachercourse3 = $_POST['specializedCourse3'];

        if (empty($teacherId) || empty($teacherName) || empty($teacherEmail) || empty($teacherPhone) || 
        empty($teacherUsername) || empty($teacherPassword) || empty($teacherCpassword)|| empty($teacherDegree)|| empty($teachercourse)) {
            echo '<script>alert("Please fill all fields in the form");</script>';
            echo '<script>window.location.href = "add_teacher.php";</script>';

        } elseif (strlen($teacherPassword) < 8) {
            echo '<script>alert("Password should be atleast 8 characters long");</script>';
            echo '<script>window.location.href = "add_teacher.php";</script>';

        } elseif ($teacherPassword != $teacherCpassword) {
            echo '<script>alert("Both the passwords do not match !!");</script>';
            echo '<script>window.location.href = "add_teacher.php";</script>';
        }  else {
        // Insert the course into the database
            $sql = "INSERT INTO teachers (teacher_id, teacher_name, teacher_email, teacher_phone, teacher_username, teacher_password, teacher_cpassword, teacher_degree, specialized_course_1, specialized_course_2, specialized_course_3) 
            VALUES ('$teacherId', '$teacherName', '$teacherEmail','$teacherPhone','$teacherUsername','$teacherPassword','$teacherCpassword','$teacherDegree','$teachercourse', '$teachercourse2','$teachercourse3')";
        }

        if ($conn->query($sql) === TRUE) {
            // Course added successfully
            echo '<script>alert("Teacher Added Successfully");</script>';
            echo '<script>window.location.href = "add_teacher.php";</script>';
        } else {
            // Error adding course
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['deleteTeacher'])) {
        $teacherId = $_POST['teacherId'];
        
        // Delete the course from the database
        if(empty($teacherId)){
            echo '<script>alert("Please provide ID for deletion");</script>';
            echo '<script>window.location.href = "add_teacher.php";</script>';
        }else{
            $sql = "DELETE FROM teachers WHERE teacher_id = '$teacherId'";
        }

        if ($conn->query($sql) === TRUE) {
            // Course deleted successfully
            echo '<script>alert("Teacher deleted Successfully");</script>';
            echo '<script>window.location.href = "add_teacher.php";</script>';
        } else {
            // Error deleting course
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['viewTeachers'])) {
        // View Courses button was clicked
        header("Location: view_teacher.php"); // Redirect to the view_courses.php page
        exit; // Exit to prevent further processing
    }
}

    $conn->close();
?>