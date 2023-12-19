<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - Attendance Management System</title>
    <style>
                /* add_student.css */

            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .container {
                text-align: left;
            }

            .add-student-card {
                background-color: #fff;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                padding: 20px;
                width: 900px; /* Limit the maximum width */
                text-align: center;
                
            }

            h1 {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .form-group {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 10px;
            }

            .form-group label {
                font-weight: bold;
                width: 30%;
                text-align: left;
                margin-left: 10px;
            }

            .form-group input[type="text"],
            .form-group input[type="email"],
            .form-group input[type="password"] {
                width: 30%; /* Adjust the width as needed */
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
            }

            .form-group input[type="text"]:nth-child(4),
            .form-group input[type="text"]:nth-child(5),
            .form-group input[type="text"]:nth-child(6) {
                width: 22%; /* Adjust the width as needed */
            }

            .buttons-container {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }

            button {
                flex-basis: 30%; /* Adjust button width as needed */
                padding: 10px;
                background-color: #007BFF;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 16px;
                cursor: pointer;
                margin-top: 20px;
            }

            button:hover {
                background-color: #0056b3;
            }

            #btnprogramdelete{
                background-color: #FF6347; /* Red color for delete button */
            }

            #btnprogramdelete:hover {
                background-color: #D83A12; /* Darker red for delete button on hover */
            }

            .form-group select {
                width: 32.25%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                font-size: 16px;
            }


    </style>
</head>
<body>
    <div class="container">
        <div class="add-student-card">
            <h1>Student Management</h1>
            <form action="process_student.php" method="POST">
                <div class="form-group">
                    <label for="studentId">Student ID</label>
                    <input type="text" id="studentId" name="studentId" maxlength="20">
                </div>
                <div class="form-group">
                    <label for="studentProgram">Program</label>
                    <select id="studentProgram" name="studentProgram">
                    <option value="" disabled selected>Select Program</option>
                            <?php
                    // Step 1: Connect to the database
                    
                    include("../../db.php");

                    // Step 2: Fetch program options
                    $sql = "SELECT program_name FROM programs";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Step 3: Populate the dropdown with database values
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row["program_name"] . '">' . $row["program_name"] . '</option>';
                        }
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="studentName">Student Name</label>
                    <input type="text" id="studentName" name="studentName" >
                </div>
                <div class="form-group">
                    <label for="studentEmail">Student Email</label>
                    <input type="email" id="studentEmail" name="studentEmail" >
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" id="cpassword" name="cpassword">
                </div>
                <input type="hidden" name="viewStudents" value="1">
                <button type="submit" class="btn-add-student" name="addStudent">Add Student</button>
                <button type="submit" id="btnprogramdelete" name="deleteStudent">Delete Student</button>
                <button type="submit" id="ViewStudentbtn" class="btn-view-students" name="viewStudents">View Students</button>
            </form>
        </div>
    </div>
    <script>

        // JavaScript to handle "View Courses" button click
        document.getElementById("ViewStudentbtn").addEventListener("click", function () {
            // Fetch and display courses here using JavaScript or redirect to a separate page
            window.location.href = "view_students.php";
        });
    </script>
</body>
</html>
