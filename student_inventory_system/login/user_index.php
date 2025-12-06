<?php
session_start();
include 'user_model.php';
$user_model = new user_Model();

if (isset($_POST['submit'])) {
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    if ($user_model->authenticate($email, $password)) {

        // ADMIN LOGIN
        if ($_SESSION['role'] === 'admin') {
    header("Location: ../admin/adminHomepage.php");
    exit();
}

// USER LOGIN
header("Location: ../userHomepage.php");
exit();


    } else {
        echo "<script>alert('Invalid email or password');</script>";
        echo "<script>window.location.href = 'user_index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMart — Login</title>

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
            padding: 28px 32px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.12);
            margin-bottom: 110px;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #5A3E2B;
        }

        .input-box {
            margin-bottom: 18px;
            position: relative;
            margin-right: 50px;
        }

        .input-box label {
            display: block;
            font-size: 14px;
            color: #5A3E2B;
            margin-bottom: 5px;
            font-weight: 600;
        }

        /* Text fields */
        .input-box input {
            width: 100%;
            padding: 12px 40px 12px 14px;
            background: rgba(255,255,255,0.9);
            border-radius: 10px;
            border: 1px solid #b69d84;
            outline: none;
            font-size: 14px;
        }

        /* Icons */
        .input-box .icon {
            position: absolute;
            right: -40px;
            top: 36px;
            font-size: 20px;
            color: #5A3E2B;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: none;
            background: #5A3E2B;
            color: white;
            font-size: 15px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn:hover {
            background: #6b4a34;
        }

        .login-register {
            margin-top: 14px;
            text-align: center;
            font-size: 13px;
        }

        .login-register a {
            color: #5A3E2B;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>

<body>

<?php include 'login_header.php'; ?>

<div class="login-wrapper">
    <div class="login-box">

        <h2>Account Login</h2>

        <form action="" method="post">
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <label>Email</label>
                <input type="text" name="user_email" required autocomplete="off">
            </div>

            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <label>Password</label>
                <input type="password" name="user_password" required autocomplete="off">
            </div>

            <input type="submit" class="btn" name="submit" value="Login">

            <div class="login-register">
                Don't have an account? <a href="user_add.php">Sign Up</a>
            </div>
        </form>

    </div>
</div>

<?php include '../footer.php'; ?>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
