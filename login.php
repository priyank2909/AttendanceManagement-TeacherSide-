<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* Reset some default styles */
        body, html {
            margin: 0;
            padding: 0;
        }

        /* Set a background color for the entire page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Light gray background color */
            overflow: hidden;
            background-color: #007bff;
        }

        /* Center the login container vertically and horizontally */
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Style the login cards */
        .login-card {
            background-color: #fff; /* White background color for the cards */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 45%; /* Adjust the width as needed */
            display: flex; /* Use flexbox */
            flex-direction: column; /* Stack child elements vertically */
            justify-content: center; /* Center vertically */
            align-items: center; /* Center horizontally */
        }

        .left-card {
            margin-left: 10px;
            margin-right: 10px;
            height: 70vh;
            width: 600px;
        }

        .right-card {
            /* Add your background image here */
            width: 37%; /* Adjust the width as needed */
            height: 70vh;
        }

        .right-card img {
            width: 95%;
            height: 400px;
        }

        h3 {
            font-size: 18px;
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 40px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        select { /* Add styling for select element */
            width: 450px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #b61ded;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #58068e;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card left-card">

            <h3>Attendance Management System</h3>
            <form action="logmein.php" method="POST">

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <button type="submit">Login</button>
            </form>
        </div>

        <div class="login-card right-card">
            <img src="images/attendance.jpg" alt="Attendance Image">
        </div>
    
    </div>

</body>
</html>
