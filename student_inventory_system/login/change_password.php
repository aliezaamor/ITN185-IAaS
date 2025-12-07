<?php
//Load necessary functions and ensure user authentication
require_once 'auth.php';

$user_id = $_SESSION['user_id'] ?? null;

require_once 'user_model.php';
$model = new user_Model();

// Fetch user details (used to get the current hashed password)
$user = $model->edit($user_id);

if (!$user) { die("User not found"); }

if (isset($_POST['change_pass'])) {

    $old = $_POST['old_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    // Check old password
    if (!password_verify($old, $user['user_password'])) {
        echo "<script>alert('Old password is incorrect!');</script>";
    }
    elseif ($new !== $confirm) {
        echo "<script>alert('Passwords do not match!');</script>";
    }
    else {
        // Pass RAW password to model (model will hash it)
        if ($model->updatePassword($user_id, $new)) {
            echo "<script>alert('Password updated successfully!');</script>";
            echo "<script>window.location.href='user_profile.php';</script>";
            exit();
        } else {
            echo "<script>alert('Failed to update password');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password - MyEdu.Keep</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url("../pictures/backpic.png") center / cover no-repeat fixed;
        }

        .pass-wrapper {
            max-width: 500px;
            margin: 80px auto;
            padding: 40px;
            background: rgba(255, 241, 225, 0.88);
            backdrop-filter: blur(8px);
            border-radius: 28px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
            margin-bottom: 40px;
        }

        .title {
            text-align: center;
            font-size: 30px;
            font-weight: 800;
            color: #5A3E2B;
            margin-bottom: 30px;
            margin-top: -10px;
        }

        .form-box {
            background: #ffffffd8;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .field {
            margin-bottom: 20px;
        }

        .field label {
            font-size: 14px;
            font-weight: 600;
            color: #6b4a34;
        }

        .field input {
            width: 97%;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #b9a493;
            font-size: 16px;
            font-family: 'Poppins';
        }

        .actions {
            margin-top: 30px;
            display: flex;
            gap: 20px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 15px;
            border: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: .2s;
            color: white;
        }

        .save-btn { background: #3e6ba4; }
        .save-btn:hover { background: #2d507c; }

        .back-btn { background: #8a4f2d; }
        .back-btn:hover { background: #6b3b20; }

    </style>
</head>
<body>

<?php include '../header.php'; ?>

<!-- Main wrapper for password change UI -->
<div class="pass-wrapper">

    <h1 class="title">Change Password</h1>

    <div class="form-box">

        <form method="POST">

            <div class="field">
                <label>Old Password</label>
                <input type="password" name="old_password" required>
            </div>

            <div class="field">
                <label>New Password</label>
                <input type="password" name="new_password" required>
            </div>

            <div class="field">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" required>
            </div>

            <div class="actions">
                <button type="submit" name="change_pass" class="btn save-btn">Update Password</button>
                <a href="user_profile.php" class="btn back-btn">Back</a>
            </div>

        </form>

    </div>

</div>

<?php include '../footer.php'; ?>

</body>
</html>
