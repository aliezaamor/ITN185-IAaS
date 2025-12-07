<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MyEdu.Keep — Registration Successful</title>

<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url("../pictures/backpic.png") center / cover no-repeat fixed;
        }

        .login-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 110px;
        }

        .login-box {
            width: 400px;
            background: white;
            padding: 36px 32px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
            margin-bottom: 110px;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 15px;
            color: #5A3E2B;
        }

        .message {
            font-size: 15px;
            color: #333;
            margin-bottom: 25px;
        }

        .btn {
            display: inline-block;
            width: 90%;
            padding: 10px;
            border-radius: 8px;
            border: none;
            background: #5A3E2B;
            color: white;
            font-size: 15px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
        }

        .btn:hover {
            background: #6b4a34;
        }
</style>

</head>

<body>

<?php include 'login_header.php'; ?>

<div class="login-wrapper">
    <div class="login-box">

        <h2>Registration Successful!</h2>

        <div class="message">
            Your account has been created successfully.<br>
            You can now log in using your credentials.
        </div>

        <a href="user_index.php" class="btn">Login Now</a>

    </div>
</div>

<?php include '../footer.php'; ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>

