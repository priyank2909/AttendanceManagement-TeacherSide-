<?php

session_start();
?>

<html>
<head>
    <style>
        .course-card {
            background-color: #f4f4f4;
            padding: 20px;
            margin: 20px 1%;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            width: 48%; /* 48% width for each card with some spacing in between */
            height: 180px;
            box-sizing: border-box;
            float: left; /* Float cards to the left to create a two-column layout */
            border: 1px solid #ccc;
            text-align: center;
            color: #000;
        }

        /* Adjust styles for the last course card in each row to clear the float */
        .course-card:nth-child(2n + 1) {
            margin-right: 0;
        }

        .course-card h3 {
            font-size: 18px;
            text-align: center;
            margin-top: 0px;
        }

        .course-card-link {
            text-decoration: none;
            color: black;
            transition: background-color 0.3s, color 0.3s;
            display: block; /* Make the entire card clickable */
            height: 100%;
        }

        .course-card-link:hover {
            background-color: #007bff;
            color: #fff;
        }

        .course-card a {
            text-decoration: none;
            color: #007bff;
        }

        .course-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div id="courses" class="tab-content">
    <?php
    // Include your database connection code here
    include("../db.php");

    if (isset($_SESSION['teacherName'])) {
        // Fetch the teacher's ID from the session
        $teacherName = $_SESSION['teacherName'];

        // Fetch the courses taught by the teacher from the database
        $sql = "SELECT course_name, program_name FROM course_teacher_assignment WHERE teacher_name = '$teacherName'";
        $result = $conn->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $coursename = $row['course_name'];
                $program = $row['program_name'];

                // Perform a lookup to get the course name based on course_id
                $sqlCourseName = "SELECT * FROM courses WHERE course_name = '$coursename'";
                $resultCourseName = $conn->query($sqlCourseName);

                $sqlprogramname = "SELECT program_name from programs where program_name = '$program'";
                $resultProgramname = $conn->query($sqlprogramname);

                if ($resultCourseName && $resultCourseName->num_rows > 0 && $resultProgramname) {
                    $rowCourseName = $resultCourseName->fetch_assoc();
                    $rowprogramname = $resultProgramname->fetch_assoc();

                    $courseName = $rowCourseName['course_name'];
                    $courseCredits = $rowCourseName['course_credits'];
                    $courseDuration = $rowCourseName['course_duration'];
                    $programname = $rowprogramname['program_name'];

                    // Wrap the course card in an anchor tag with a link (e.g., to a course details page)
                    echo "<a href = 'mark_attendance.php?program=$programname&course=$courseName'>";
                    echo '<div class="course-card">';
                    echo '<h3>' . $courseName . '</h3>';
                    echo '<h3>Course Credits: ' . $courseCredits . '</h3>';
                    echo '<h3>Course Duration: ' . $courseDuration . ' lectures</h3>';
                    echo '<h3>Program Name: ' . $programname . '</h3>';
                    echo '</div>';
                    echo "</a>";
                } else {
                    echo '<script>alert("No Courses Found for this Course ID :");</script>';
                }
            }
        } else {
            echo '<p>No courses found.</p>';
        }
    }
    ?>
</div>
</body>
</html>
