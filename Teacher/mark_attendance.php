<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Attendance System</title>
        <style>
            /* Apply some basic styling to the table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: center;
}

/* Style the radio buttons */
input[type="radio"] {
    margin: 0 5px;
}

/* Style the submit button */
.btn-primary {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

/* Style the form container */
.table-responsive {
    overflow-x: auto;
}

/* Style the heading */
h2 {
    font-size: 1.2rem;
    margin: 10px 0;
}

/* Style the hidden inputs */
input[type="hidden"] {
    display: none;
}

/* Apply some basic styling to the forms */
form {
    margin: 20px;
}

/* Style the labels and inputs */
label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
}

input[type="text"],
input[type="date"],
input[type="time"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Style the hidden inputs */
input[type="hidden"] {
    display: none;
}

/* Style the submit button */
input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 20px;
}

/* Style the disabled inputs */
input[disabled] {
    background-color: #f0f0f0;
    cursor: not-allowed;
}

.center{
    text-align: center;
}

        </style>
    </head>
    <body>
        <h1>Attendance System</h1>
        
        <?php

        include("../db.php");

        $program = "";
        $course = "";

    // Check if the request method is GET
    if ($_SERVER["REQUEST_METHOD"] === 'GET') {
        // Check if "program" is set in the GET parameters
        if (isset($_GET["program"])) {
            $program = $_GET["program"];
        }
        // Check if "course" is set in the GET parameters
        if (isset($_GET["course"])) {
            $course = $_GET["course"];
        }

    // Display the form for selecting date, start time, and end time
    echo "<form id='time-form' method='GET' action='mark_attendance.php'>";
    echo "<input type='text' name='program' value='" . htmlspecialchars($program) . "' disabled>";
    echo "<input type='text' name='course' value='" . htmlspecialchars($course) . "' disabled>";

    echo "<label for='date'>Select Date:</label>";
    echo "<input type='date' name='date' id='date'>";

    echo "<label for='startTime'>Start Time:</label>";
    echo "<input type='time' name='startTime' id='startTime'>";

    echo "<label for='endTime'>End Time:</label>";
    echo "<input type='time' name='endTime' id='endTime'>";

    echo "<input type='hidden' name='program' value='$program'>";
    echo "<input type='hidden' name='course' value='$course'>";
    echo "<input type='submit'  value='Submit'>";
    echo "</form>";

    echo "<form id='attendance-form' action='attendance_process.php' method='POST'>";
    echo "<input type='hidden' name='program' value='$program'>";
    echo "<input type='hidden' name='course' value='$course'>";

    // Check if date, start time, and end time are set in the GET parameters
    if (isset($_GET["date"]) && isset($_GET["startTime"]) && isset($_GET["endTime"]) && isset($_GET["program"]) && isset($_GET["course"])) {
        $date = $_GET["date"];
        $startTime = $_GET["startTime"];
        $endTime = $_GET["endTime"];
        $program = $_GET["program"];
        $course = $_GET["course"];

        // Query to fetch students based on program ID
        $studentsQuery = "SELECT student_id, student_name FROM students WHERE student_program = '$program'";
        $studentsResult = mysqli_query($conn, $studentsQuery);

        if (!$studentsResult) {
            die("Students query failed: " . mysqli_error($conn));
        }

            if ($studentsResult->num_rows > 0) {
                echo "<form id='attendance-form' action='attendance_process.php' method='POST'>";
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered'>
                        <thead>
                            <tr>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>";
                        echo "<div class= 'center'>";
                        echo "<h2>$program - $course - Date: $date, Time Range: $startTime to $endTime</h2>";
                        echo "</div>";
                
                while ($row = $studentsResult->fetch_assoc()){
                    $studentId = $row["student_id"];
                    $studentName = $row["student_name"];

                    if (isset($studentId)) {
                    echo "<tr>
                        <td><input type='hidden' readonly name='studentId[]' value='$studentId'>$studentId</td>
                        <td><input type='hidden' readonly name='studentName[]' value='$studentName'>$studentName</td> 
                        <td>
                            <input type='radio' name='attendance[$studentId]' value='present' checked> Present
                            <input type='radio' name='attendance[$studentId]' value='absent'> Absent
                        </td>
                    </tr>";
                    }
                }
                echo "</tbody></table>";
                echo "</div>";
                
                // Insert the selected date, start time, and end time into the form data
                echo "<input type='hidden' name='date' value='$date'>";
                echo "<input type='hidden' name='startTime' value='$startTime'>";
                echo "<input type='hidden' name='endTime' value='$endTime'>";
                
                echo "<div class='d-grid gap-2'>
                        <button type='submit' class='btn btn-primary'>Submit Attendance</button>
                        </div>";
                echo "</form>";
            }
        }
        $conn->close();
    }
    ?>
</body>
</html>