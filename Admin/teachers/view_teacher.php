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
    width: 90%;
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
            <h2>View Teachers</h2>
            <table>
                <thead>
                    <tr>
                        <th>Teacher ID</th>
                        <th>Teacher Name</th>
                        <th>Teacher Email</th>
                        <th>Teacher Degree</th>
                        <th>Username</th>
                        <th>Specialized Course1 </th>
                        <th>Specialized Course2 </th>
                        <th>Specialized Course3 </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // PHP code to fetch and display courses from the database
                    include("../../db.php");
                    
                    $sql = "SELECT teacher_id, teacher_name, teacher_email, teacher_degree,teacher_username, specialized_course_1, 
                    specialized_course_2, specialized_course_3 FROM teachers";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['teacher_id'] . "</td>";
                            echo "<td>" . $row['teacher_name'] . "</td>";
                            echo "<td>" . $row['teacher_email'] . "</td>";
                            echo "<td>" . $row['teacher_degree'] . "</td>";
                            echo "<td>" . $row['teacher_username'] . "</td>";
                            echo "<td>" . $row['specialized_course_1'] . "</td>";
                            echo "<td>" . $row['specialized_course_2'] . "</td>";
                            echo "<td>" . $row['specialized_course_3'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No teachers found.</td></tr>";
                    }
                    
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <button class="btn-back" onclick="window.location.href = 'add_teacher.php';">Back</button>
        </div>
    </div>
</body>
</html>
