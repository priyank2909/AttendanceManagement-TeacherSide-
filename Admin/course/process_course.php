<?php
include("../../db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addcourse'])) {
        // Add Course
        $courseId = $_POST['courseId'];
        $courseName = $_POST['courseName'];
        $courseCredits = $_POST['courseCredits'];
        $courseDuration = $_POST['courseDuration'];

        // Insert the course into the database
        $sql = "INSERT INTO courses (course_id, course_name, course_credits, course_duration) VALUES ('$courseId', '$courseName', '$courseCredits', '$courseDuration')";

        if ($conn->query($sql) === TRUE) {
            // Course added successfully
            echo '<script>alert("Course Added Successfully");</script>';
            echo '<script>window.location.href = "add_course.php";</script>';
        } else {
            // Error adding course
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['deletecourse'])) {
        $courseId = $_POST['courseId'];
        
        // Delete the course from the database
        $sql = "DELETE FROM courses WHERE course_id = '$courseId'";

        if ($conn->query($sql) === TRUE) {
            // Course deleted successfully
            echo '<script>alert("Course deleted Successfully");</script>';
        echo '<script>window.location.href = "add_course.php";</script>';
        } else {
            // Error deleting course
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['viewcourse'])) {
        // View Courses button was clicked
        header("Location: view_courses.php"); // Redirect to the view_courses.php page
        exit; // Exit to prevent further processing
    }
}

    $conn->close();
?>