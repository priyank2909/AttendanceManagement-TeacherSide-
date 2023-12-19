<!DOCTYPE html>
<html lang="en">
<head>
<style>

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    text-align: center;
    margin-top: 20px;
}

.view-course-card {
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    padding: 20px;
    width: 80%;
    margin: 0 auto;
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    background-color: #007BFF;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.btn-back {
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

.btn-back:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
    <div class="container">
        <div class="view-course-card">
            <h2>View Students</h2>
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Program</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // PHP code to fetch and display courses from the database
                    include("../../db.php");
                    
                    $sql = "SELECT student_id, student_program, student_name, student_email, student_username  
                    FROM students";
                    $result = $conn->query($sql);

                    if(!$result){
                        echo "Query error: ". $conn->error;
                    }else{
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['student_id'] . "</td>";
                            echo "<td>" . $row['student_program'] . "</td>";
                            echo "<td>" . $row['student_name'] . "</td>";
                            echo "<td>" . $row['student_email'] . "</td>";
                            echo "<td>" . $row['student_username'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No Students found.</td></tr>";
                    }
                }
                    
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <button class="btn-back" onclick="window.location.href = 'add_student.php';">Back</button>
        </div>
    </div>
</body>
</html>
