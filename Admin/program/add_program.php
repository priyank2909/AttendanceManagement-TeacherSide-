<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Management - Attendance Management System</title>
    <style>
    /* program_management.css */

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

.add-delete-program-card {
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    padding: 20px;
    width: 600px;
    height: 300px;
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
    flex-basis: 50%; /* Adjust button width as needed */
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

#deleteProgramBtn {
    background-color: #FF6347; /* Red color for delete button */
}

#deleteProgramBtn:hover {
    background-color: #D83A12; /* Darker red for delete button on hover */
}

    </style>
</head>
<body>
    <div class="container">
        <div class="add-delete-program-card">
            <h1>Program Management</h1>
            <form action="process_program.php" id="programForm" method="POST">
                <div class="form-group">
                    <label for="programId">Program ID</label>
                    <input type="text" id="programId" name="programId" required>
                </div>
                <div class="form-group">
                    <label for="programName">Program Name</label>
                    <input type="text" id="programName" name="programName" required>
                </div>
                <input type="hidden" name="viewPrograms" value="1">
                <button type="submit" class="btn-add-program" name="addprogram">Add Program</button>
                <button type="submit" id="deleteProgramBtn" class="btn-delete-program" name="deleteprogram">Delete Program</button>
                <button type="submit" id="viewProgramBtn" class="btn-view-program" name="viewprogram">View Programs</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to handle "View Programs" button click
        document.getElementById("viewProgramBtn").addEventListener("click", function () {
            // Fetch and display programs here using JavaScript or redirect to a separate page
            window.location.href = "view_program.php";
        });
    </script>
</body>
</html>
