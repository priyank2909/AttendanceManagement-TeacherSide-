<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Delete Course - Attendance Management System</title>
    <style>
    /* add_course.css */

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

.add-delete-course-card {
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    padding: 20px;
    width: 600px;
    height: 375px;
    text-align: center;
}

h1 {
    font-size: 24px;
    margin-bottom: 40px;

}

.form-group {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
}

label {
    font-weight: bold;
    width: 30%;
    text-align: left;
    margin-left: 10px;
}

input[type="text"] {
    width: 40%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}


button {
    flex-basis:50%; /* Adjust button width as needed */
    padding: 10px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 50px;
}

button:hover {
    background-color: #0056b3;
}

#deleteCourseBtn {
    background-color: #FF6347; /* Red color for delete button */
}

#deleteCourseBtn:hover {
    background-color: #D83A12; /* Darker red for delete button on hover */
}

    </style>
</head>
<body>
    <div class="container">
        <div class="add-delete-course-card">
            <h1>Course Management</h1>
            <form action="process_course.php" id="courseForm" method = "POST" >
                <div class="form-group">
                    <label for="courseId">Course ID</label>
                    <input type="text" id="courseId" name="courseId" required>
                </div>
                <div class="form-group">
                    <label for="courseName">Course Name</label>
                    <input type="text" id="courseName" name="courseName" required>
                </div>
                <div class="form-group">
                    <label for="courseCredits">Course Credits</label>
                    <input type="text" id="courseCredits" name="courseCredits" required>
                </div>
                <div class="form-group">
                    <label for="courseDuration">Course Duration</label>
                    <input type="text" id="courseDuration" name="courseDuration" required>
                </div>
                <input type="hidden" name="viewCourses" value="1">
                <button type="submit" class="btn-add-course" name= "addcourse">Add Course</button>
                <button type= "submit" id="deleteCourseBtn" class="btn-delete-course" name= "deletecourse">Delete Course</button>
                <button type= "submit" id="ViewCourseBtn" class="btn-view-course" name= "viewcourse">View Courses</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to handle "View Courses" button click
        document.getElementById("ViewCourseBtn").addEventListener("click", function () {
            // Fetch and display courses here using JavaScript or redirect to a separate page
            window.location.href = "view_courses.php";
        });
    </script>
</body>
</html>