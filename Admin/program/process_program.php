<?php
include("../../db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addprogram'])) {
        // Add Program
        $programId = $_POST['programId'];
        $programName = $_POST['programName'];

        // Insert the program into the database
        $sql = "INSERT INTO programs (program_id, program_name) VALUES ('$programId', '$programName')";

        if ($conn->query($sql) === TRUE) {
            // Program added successfully
            echo '<script>alert("Program Added Successfully");</script>';
            echo '<script>window.location.href = "add_program.php";</script>';
        } else {
            // Error adding program
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['deleteprogram'])) {
        $programId = $_POST['programId'];
        
        // Delete the program from the database
        $sql = "DELETE FROM programs WHERE program_id = '$programId'";

        if ($conn->query($sql) === TRUE) {
            // Program deleted successfully
            echo '<script>alert("Program deleted Successfully");</script>';
            echo '<script>window.location.href = "add_program.php";</script>';
        } else {
            // Error deleting program
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['viewprogram'])) {
        // View Programs button was clicked
        header("Location: view_program.php"); // Redirect to the view_programs.php page
        exit; // Exit to prevent further processing
    }
}

$conn->close();
?>
