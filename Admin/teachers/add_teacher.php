<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher - Attendance Management System</title>
    <style>
                /* add_teacher.css */

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

            .add-teacher-card {
                background-color: #fff;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                padding: 20px;
                width: 1000px; /* Limit the maximum width */
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
                margin-top: 40px;
            }

            .form-group label {
                font-weight: bold;
                width: 30%;
                text-align: left;
                margin-left: 10px;
            }

            .form-group input[type="text"],
            .form-group input[type="email"],
            .form-group input[type="tel"],
            .form-group input[type="password"] {
                width: 40%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
            }

            .form-group:nth-child(n+2) input[type="text"] {
                width: 45%; /* Adjust the width for subsequent rows */
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


    </style>
</head>
<body>
    <div class="container">
        <div class="add-teacher-card">
            <h1>Teacher Management</h1>
            <form action="process_teacher.php" method="POST">
                <div class="form-group">
                    <label for="teacherId">Teacher ID</label>
                    <input type="text" id="teacherId" name="teacherId" maxlength="10">
                    <label for="teacherName">Teacher Name</label>
                    <input type="text" id="teacherName" name="teacherName" >
                    <label for="teacherEmail">Teacher Email</label>
                    <input type="email" id="teacherEmail" name="teacherEmail">
                </div>
                <div class="form-group">
                    <label for="teacherPhone">Teacher Phone Number</label>
                    <input type="tel" id="teacherPhone" name="teacherPhone" maxlength="10">
                    <label for="teacherUsername">Username</label>
                    <input type="text" id="teacherUsername" name="teacherUsername">
                </div>
                <div class="form-group">
                    <label for="teacherPassword">Password</label>
                    <input type="password" id="teacherPassword" name="teacherPassword">
                    <label for="teacherCpassword">Confirm Password</label>
                    <input type="password" id="teacherCpassword" name="teacherCpassword">
                </div>
                <div class="form-group">
                    <label for="teacherDegree">Degree</label>
                    <input type="text" id="teacherDegree" name="teacherDegree" >
                    <label for="specializedCourse1">Specialized Course 1</label>
                    <input type="text" id="specializedCourse1" name="specializedCourse1">
                </div>
                <div class="form-group">
                    <label for="specializedCourse2">Specialized Course 2</label>
                    <input type="text" id="specializedCourse2" name="specializedCourse2">
                    <label for="specializedCourse3">Specialized Course 3</label>
                    <input type="text" id="specializedCourse3" name="specializedCourse3">
                </div>  
                <input type="hidden" name="viewTeachers" value="1">
                <button type="submit" class="btn-add-teacher" name="addTeacher">Add Teacher</button>
                <button type="submit" id= "btnprogramdelete" class="btn-delete-teacher" name="deleteTeacher">Delete Teacher</button>
                <button type="submit" id="ViewTeacherbtn" class="btn-view-teachers" name="viewTeachers">View Teachers</button>
            </form>
        </div>
    </div>
    <script>
        // JavaScript to handle "View Courses" button click
        document.getElementById("ViewTeacherbtn").addEventListener("click", function () {
            // Fetch and display courses here using JavaScript or redirect to a separate page
            window.location.href = "view_teacher.php";
        });
    </script>
</body>
</html>
