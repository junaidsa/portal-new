<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Account Created</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
            border: 1px solid #dddddd;
            border-radius: 10px;
            text-align: center;
        }
        .email-header {
            background-color: #007bff;
            padding: 10px 0;
        }
        .email-header img {
            max-width: 150px;
        }
        .email-header h2 {
            color: white;
            font-size: 24px;
            margin: 10px 0 0 0;
        }
        .email-body {
            margin: 20px 0;
        }
        .email-body p {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
        }
        .sign-in-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .sign-in-button:hover {
            background-color: #0056b3;
        }
        .email-footer {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Company Logo and Name -->
        <div class="email-header">
            <img src="https://smartedu.my/wp-content/uploads/2024/03/Logo-white-background-296x99.png" alt="Company Logo" >
            <h2>SmartEdu</h2> <!-- Company Name -->
        </div>

        <!-- Tagline -->
        <p><em>Your trusted partner in education.</em></p>

        <!-- Email Content -->
        <div class="email-body">
            <h1>Admin Account Created</h1>
            <p>A new admin account has been created with the following details:</p>
            <p><strong>Full Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Branch:</strong> {{ $branch }}</p>
            <p><strong>Password:</strong> {{ $password }}</p>
            <p>Please log in and change your password as soon as possible for security reasons.</p>

            <!-- Sign In Button -->
            <a href="https://smartedu.my/login" class="sign-in-button">Sign In</a>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>If you have any issues, please contact our support team.</p>
            <p>&copy; 2024 SmartEdu, All rights reserved.</p>
        </div>
    </div>
</body>
</html>
