<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
        font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f4f4f4;
            border-radius: 5px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            text-align: left;
        }

        .form-group input[type="password"] {
            width: 94%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .btn-container {
            margin-top: 15px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Change Password</h2>
        <form action ="process_pass.php" method = "POST">
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" >
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password">
            </div>
            <div class="btn-container">
                <button type="submit" class="btn">Change Password</button>
            </div>
        </form>
    </div>

</body>
</html>
