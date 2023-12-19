<?php
include("../../db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addStudent'])) {
        // Add Student
        $studentId = $_POST['studentId'];
        $studentName = $_POST['studentName'];
        $studentEmail = $_POST['studentEmail'];
        $programName = $_POST['studentProgram']; // Accept program name from the form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // Check if any of the required fields are empty
        if (empty($studentId) || empty($studentName) || empty($studentEmail) || empty($programName) || empty($username) || empty($password) || empty($cpassword)) {
            echo '<script>alert("Please fill all fields in the form");</script>';
            echo '<script>window.location.href = "add_student.php";</script>';

        } elseif (strlen($password) < 8) {
            echo '<script>alert("Password should be at least 8 characters long");</script>';
            echo '<script>window.location.href = "add_student.php";</script>';

        } elseif ($password != $cpassword) {
            echo '<script>alert("Both passwords do not match !!");</script>';
            echo '<script>window.location.href = "add_student.php";</script>';

        } else {

            // Insert the student into the database with the retrieved program ID
                $sql = "INSERT INTO students (student_id, student_program, student_name, student_email, student_username, student_password, student_cpassword) 
                VALUES ('$studentId', '$programName', '$studentName', '$studentEmail', '$username', '$password', '$cpassword')";
                
                if ($conn->query($sql) === TRUE) {
                    // Student added successfully
                    echo '<script>alert("Student Added Successfully");</script>';
                    echo '<script>window.location.href = "add_student.php";</script>';
                } else {
                    // Error adding student
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        }
        
    } elseif (isset($_POST['deleteStudent'])) {
        $studentId = $_POST['studentId'];
        $program = $_POST['studentProgram'];

        // Delete the student from the database
        if (empty($studentId) || empty($program)){
            echo '<script>alert("Please provide ID and program");</script>';
            echo '<script>window.location.href = "add_student.php";</script>';
        } else {
            $sql = "DELETE FROM students WHERE student_id = '$studentId' AND student_program = '$program'";
        }

        if ($conn->query($sql) === TRUE) {
            // Student deleted successfully
            echo '<script>alert("Student deleted Successfully");</script>';
            echo '<script>window.location.href = "add_student.php";</script>';
        } else {
            // Error deleting student
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } elseif (isset($_POST['viewStudents'])) {
        // View Students button was clicked
        header("Location: view_students.php"); // Redirect to the view_students.php page
        exit; // Exit to prevent further processing
    }
}

$conn->close();
?>
