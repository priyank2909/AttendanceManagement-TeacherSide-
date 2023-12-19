<?php
// Include your database connection code (db.php or similar)
include("../../db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $teacherName = $_POST["teacherName"];
    $courseName = $_POST["courseName"];
    $programName = $_POST["program"];
                // Insert the assignment into the new table
    $sqlInsertAssignment = "INSERT INTO course_teacher_assignment (teacher_name, course_name, program_name) VALUES ('$teacherName', '$courseName', '$programName')";

        if (mysqli_query($conn, $sqlInsertAssignment)) {
        // Course assigned to the teacher successfully
        echo '<script>alert("Course assigned successfully.");</script>';
        echo '<script>window.location.href = "assign_course.php";</script>';
        } else {
        // Error occurred while assigning the course, handle this as needed
        echo "Error: " . mysqli_error($conn);
        }
}else {
    echo "Invalid request method.";
}

$conn->close();
?>
