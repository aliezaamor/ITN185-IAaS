<?php
//Load necessary functions and ensure user authentication
require_once 'auth.php';
require_once 'user_model.php';
$model = new user_Model();

// Get logged-in user id
$user_id = $_SESSION['user_id'] ?? null;

// Fetch user data
$user = $model->edit($user_id);

if (!$user) {
    die("User not found");
}

// Handle update
if (isset($_POST['update_profile'])) {

    $update = [
        "user_name" => trim($_POST['user_name']),
        "user_email" => trim($_POST['user_email']),
        "address" => trim($_POST['address']),
        "mobile_number" => trim($_POST['mobile_number']),
    ];

    // Run update
    if ($model->update($update, $user_id)) {

        // Update session values
        $_SESSION['user_name']  = $update['user_name'];
        $_SESSION['user_email'] = $update['user_email'];

        echo "<script>alert('Profile updated successfully!');</script>";
        echo "<script>window.location.href='user_profile.php';</script>";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile - MyEdu.Keep</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url("../pictures/backpic.png") center / cover no-repeat fixed;
        }

        .edit-wrapper {
            max-width: 900px;
            margin: 80px auto;
            padding: 40px;
            background: rgba(255, 241, 225, 0.88);
            backdrop-filter: blur(8px);
            border-radius: 28px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
        }

        .title {
            text-align: center;
            font-size: 38px;
            font-weight: 800;
            color: #5A3E2B;
            margin-bottom: 30px;
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
            width: 100%;
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
            text-align: center;
            font-size: 15px;
            font-weight: 600;
            border-radius: 15px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: .2s;
            color: white;
        }

        .save-btn { background: #5A3E2B; }
        .save-btn:hover { background: #7a543c; }

        .back-btn { background: #8a4f2d; }
        .back-btn:hover { background: #6b3b20; }

</style>

</head>
<body>

<?php include '../header.php'; ?>

<div class="edit-wrapper">
    <h1 class="title">Edit Profile</h1>

     <!-- User profile update form -->
    <div class="form-box">

        <form method="POST">

            <div class="field">
                <label>Full Name</label>
                <input type="text" name="user_name" value="<?php echo htmlspecialchars($user['user_name']); ?>" required>
            </div>

            <div class="field">
                <label>Email Address</label>
                <input type="email" name="user_email" value="<?php echo htmlspecialchars($user['user_email']); ?>" required>
            </div>

            <div class="field">
                <label>Address</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
            </div>

            <div class="field">
                <label>Mobile Number</label>
                <input type="text" name="mobile_number" value="<?php echo htmlspecialchars($user['mobile_number']); ?>">
            </div>

            <div class="actions">
                <button type="submit" name="update_profile" class="btn save-btn">Save Changes</button>
                <a href="user_profile.php" class="btn back-btn">Back</a>
            </div>

        </form>

    </div>
</div>

<?php include '../footer.php'; ?>

</body>
</html>
