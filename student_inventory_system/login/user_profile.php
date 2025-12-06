<?php
    require_once 'auth.php';

    // Get session values
    $username = $_SESSION['user_name'] ?? "GUEST";
    $email = $_SESSION['user_email'] ?? "No email";
    $user_id = $_SESSION['user_id'] ?? null;

    require_once 'user_model.php';
    $model = new user_Model();

    // Fetch full user details
    $user = $model->edit($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - MyEdu.Keep</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url("../pictures/backpic.png") center / cover no-repeat fixed;
        }

        /* Center Profile Container */
        .profile-wrapper {
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
            margin-top: -10px;
        }

        /* Profile Info Layout */
        .profile-content {
            display: flex;
            gap: 40px;
        }

        /* Info Card */
        .info-box {
            flex: 1;
            background: #ffffffd8;
            padding: 25px;
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

        .field p {
            font-size: 18px;
            font-weight: 600;
            margin: 6px 0 0;
            color: #5A3E2B;
        }

        /* Buttons */
        .actions {
            margin-top: 30px;
            display: flex;
            gap: 20px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border-radius: 15px;
            text-align: center;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            color: white;
            transition: 0.2s;
        }

        .edit-btn {
            background: #5A3E2B;
        }
        .edit-btn:hover {
            background: #7a543c;
        }

        .password-btn {
            background: #3e6ba4;
        }
        .password-btn:hover {
            background: #2d507c;
        }

        .back-btn {
            background: #8a4f2d;
        }
        .back-btn:hover {
            background: #6b3b20;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .profile-content {
                flex-direction: column;
            }
            .profile-photo {
                margin: 0 auto;
            }
        }
    </style>
</head>
<body>

<?php include '../header.php'; ?>

<div class="profile-wrapper">
    <h1 class="title">My Profile</h1>

    <div class="profile-content">

        <!-- DETAILS SECTION -->
        <div class="info-box">

            <div class="field">
                <label>Full Name:</label>
                <p><?php echo htmlspecialchars($user['user_name']); ?></p>
            </div>

            <div class="field">
                <label>Email Address:</label>
                <p><?php echo htmlspecialchars($user['user_email']); ?></p>
            </div>

            <div class="field">
                <label>Address:</label>
                <p><?php echo htmlspecialchars($user['address']); ?></p>
            </div>

            <div class="field">
                <label>Mobile Number:</label>
                <p><?php echo htmlspecialchars($user['mobile_number']); ?></p>
            </div>

            <!-- Action Buttons -->
            <div class="actions">
                <a class="btn edit-btn" href="user_edit.php?user_id=<?php echo $user_id; ?>">Edit Profile</a>
                <a class="btn password-btn" href="change_password.php">Change Password</a>
            </div>

        </div>

    </div>
</div>

<?php include '../footer.php'; ?>

<!-- ICONS -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
