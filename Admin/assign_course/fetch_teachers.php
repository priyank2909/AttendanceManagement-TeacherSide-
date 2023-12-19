<?php
// Include your database connection code (db.php or similar)
include("../../db.php");

if (isset($_GET["courseName"])) {
    $courseName = $_GET["courseName"];

    // Fetch teachers who have the selected course name as a specialized course name
    $sqlTeachersForCourse = "SELECT teacher_name FROM teachers WHERE specialized_course_1 LIKE '%$courseName%' OR specialized_course_2 LIKE '%$courseName%' OR specialized_course_3 LIKE '%$courseName%'";
    $resultTeachersForCourse = $conn->query($sqlTeachersForCourse);

    if ($resultTeachersForCourse->num_rows > 0) {
        while ($rowTeacher = $resultTeachersForCourse->fetch_assoc()) {
            echo '<option value="' . $rowTeacher["teacher_name"] . '">' . $rowTeacher["teacher_name"] . '</option>';
        }
    } else {
        echo '<option value="" disabled>No teachers available for this course</option>';
    }
}

// Close the database connection
$conn->close();
?>
