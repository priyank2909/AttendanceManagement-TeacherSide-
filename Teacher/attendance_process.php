<?php
session_start();

 // Include your database connection code here

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once("../db.php");

    if (isset($_POST["program"]) && isset($_POST["course"])) {
        $program = $_POST["program"];
        $course = $_POST["course"];
    } else {
        echo "Invalid subject name.";
        exit;
    }
        // Retrieve data from the POST request
        $course = $_POST["course"];
        $program = $_POST["program"];
        $date = $_POST["date"];
        $startTime = $_POST["startTime"];
        $endTime = $_POST["endTime"];
        $studentIds = $_POST["studentId"];
        $studentNames = $_POST["studentName"];
        $attendance = $_POST["attendance"];

        if ($startTime === $endTime) {
            echo '<script>alert("Start-time And End-time cannot be same.");</script>';
            echo '<script>window.location.href = "course_details.php";</script>';
        }

        $timeRange = $startTime . "-" . $endTime;

        // Insert attendance records into the table
        $insertStmt = $conn->prepare("INSERT INTO `$program` (student_id, student_name, course_name, attendance, date, timerange) VALUES (?, ?, ?, ?, ?, ?)");

        if (!$insertStmt) {
            die("Prepare statement failed: " . mysqli_error($conn));
        }

        foreach ($studentIds as $studentId) {
            $status = $attendance[$studentId];
        
            $sql_student = "SELECT student_name FROM students WHERE student_id = ?";
            $stmt_student = $conn->prepare($sql_student);
            $stmt_student->bind_param("s", $studentId);
            $stmt_student->execute();
            $result_student = $stmt_student->get_result();
            $row_student = $result_student->fetch_assoc();
            $studentName = $row_student["student_name"];
            // Insert attendance record using prepared statement
            $insertStmt->bind_param("ssssss", $studentId, $studentName, $course ,$status, $date, $timeRange);
            
            if ($insertStmt->execute()) {
                echo '<script>alert("Attendance Marked Successfully.");</script>';
                echo '<script>window.location.href = "course_details.php";</script>';
            } else {
                echo "Error: " . $insertStmt->error;
            }
        }

        $insertStmt->close();
        $conn->close();

        // Redirect to a success page or perform any other necessary actions
        echo '<script>alert("Attendance Marked Successfully.");</script>';
        echo '<script>window.location.href = "course_details.php";</script>';
        }
        else{
        echo "Invalid request method.";
        }

// Close the database connection

?>
