<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Course to Teacher - Attendance Management System</title>
    <style>
                                /* Style the container */
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 95vh;
                background-color: #f0f0f0;
            }

            /* Style the card */
            .assign-course-card {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                padding: 20px;
                width: 800px;
                height: 400px; 
            }

            /* Style the form header */
            .assign-course-card h1 {
                font-size: 24px;
                margin-bottom: 20px;
                text-align: center;
            }

            /* Style the form group */
            .form-group {
                margin-bottom: 15px;
            }

            /* Style the labels */
            .form-group label {
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }

            /* Style the select inputs */
            .form-group select {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                background-color: #fff;
                font-size: 16px;
                margin-bottom: 20px;
            }

            /* Style the submit button */
            .btn-assign-course {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                display: block;
                margin: 0 auto;
            }

            /* Style the submit button on hover */
            .btn-assign-course:hover {
                background-color: #0056b3;
            }

            /* Increase the width of the select element */
            select {
                width: 100%; /* Use a specific width, e.g., 100% to expand to the container's width */
                padding: 10px; /* Add padding for better spacing and appearance */
                border: 1px solid #ccc; /* Add a border for clarity */
                border-radius: 5px; /* Add rounded corners */
                font-size: 16px; /* Adjust font size for readability */
                background-color: #fff; /* Background color */
                color: #333; /* Text color */
                outline: none; /* Remove the default focus outline */
            }

            /* Style the dropdown arrow */
            select::-ms-expand {
                display: none; /* Hide the default arrow in IE */
            }

            /* Add custom styling when the dropdown is open (optional) */
            select:focus {
                border-color: #007bff; /* Change border color when focused */
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a subtle shadow */
            }

        /* Add a class for hiding the teacher dropdown initially */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="assign-course-card">
            <h1>Assign Course to Teacher</h1>
            <form action="process_assign_course.php" method="POST">
                <div class="form-group">
                    <label for="courseName">Select the Course</label>
                    <select id="courseName" name="courseName" required onchange="fetchTeachersForCourse()">
                        <option value="" disabled selected>Select Teacher</option>
                        <?php
                        // Include your database connection code (db.php or similar)
                        include("../../db.php");

                        // Fetch course data
                        $sqlCourse = "SELECT course_name FROM courses";
                        $resultCourse = $conn->query($sqlCourse);

                        if ($resultCourse->num_rows > 0) {
                            while ($rowCourse = $resultCourse->fetch_assoc()) {
                                echo '<option value="' . $rowCourse["course_name"] . '">' . $rowCourse["course_name"] . '</option>';
                            }
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="teacherName">Select the Teacher</label>
                    <select id="teacherName" name="teacherName" required>
                        <option value="" disabled selected>Select Teacher</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="program">Select the Program</label>
                    <select id="program" name="program" required>
                        <option value="" disabled selected>Select Program</option>
                        <?php
                        // Include your database connection code (db.php or similar)
                        include("../../db.php");

                        // Fetch program data
                        $sqlProgram = "SELECT program_name FROM programs";
                        $resultProgram = $conn->query($sqlProgram);

                        if ($resultProgram->num_rows > 0) {
                            while ($rowProgram = $resultProgram->fetch_assoc()) {
                                echo '<option value="' . $rowProgram["program_name"] . '">' . $rowProgram["program_name"] . '</option>';
                            }
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn-assign-course">Assign Course</button>
            </form>
        </div>
    </div>
    <script>
        function fetchTeachersForCourse() {
            var courseName = document.getElementById("courseName").value;
            var teacherDropdown = document.getElementById("teacherName");

            // Reset and hide the teacher dropdown initially
            teacherDropdown.innerHTML = '<option value="" disabled>Select Teacher</option>';
            teacherDropdown.classList.add("hidden");

            if (courseName !== "") {
                // Make an AJAX request to fetch teachers who have the selected course as a specialized course
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Update the teacher dropdown with the fetched data
                        teacherDropdown.innerHTML = xhr.responseText;
                        teacherDropdown.classList.remove("hidden");
                    }
                };
                xhr.open("GET", "fetch_teachers.php?courseName=" + courseName, true);
                xhr.send();
            }
        }
    </script>
</body>
</html>