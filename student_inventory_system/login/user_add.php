<?php
    session_start();
    include 'user_model.php';
    $user_model = new user_Model();
    $insert = $user_model->insert();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
     <!-- Internal CSS styles -->
    <style>
     body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: url("../pictures/backpic.png") center / cover no-repeat fixed;
}

/* Logo wrapper */
.wrapper {
      width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 50px; /* pushes below header */
}

.logo-img {
    width: 85px;
}

.wrapper label {
    font-size: 20px;
    font-weight: 600;
    color: #5A3E2B;
}

/* Glass container */
.container {
    width: 420px;
    padding: 30px 35px;
    background: rgba(255,255,255,0.35);
    border-radius: 22px;
    backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.5);
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    margin: 0 auto;
    margin-bottom: 30px;
}

/* Form box */
.form-box {
    width: 100%;
}

/* Input box */
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

/* Button */
.btn {
    width: 100%;
    padding: 12px;
    background: #5A3E2B;
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 15px;
    font-weight: 600;
    cursor: pointer;
    transition: .2s;
}

.btn:hover {
    background: #6b4a34;
}

/* Login link */
.login-register {
    text-align: center;
    font-size: 14px;
    margin-top: 12px;
    color: #5A3E2B;
}

.login-register a {
    font-weight: 600;
    color: #5A3E2B;
    text-decoration: none;
}

.login-register a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>

<?php include 'login_header.php'; ?>
<div class="wrapper">

      </div>
      <div class="container">
        <div class="form-box login">
             <!-- Registration form -->
            <form action="" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <label for="username">Username</label>
                    <input type="text" name="user_name" id="username" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <label for="email">Email</label>
                    <input type="text" name="user_email" id="email" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="location"></ion-icon></span>
                    <label for="">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="call"></ion-icon></ion-icon></span>
                    <label for="">Mobile No.</label>
                    <input type="text" name="mobile_number" id="mobile_number" autocomplete="off" required>
                </div>

                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <label for="password">Password</label>
                    <input type="password" name="user_password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                     <!-- Submit button -->
                    <input type="submit" class="btn" name="submit" value="Sign Up" required>
                </div>
                  <!-- Login link -->
                <div class="login-register">
                    Already have an account? <a href="user_index.php">Login</a>
                </div>
            </form>
        </div>
      </div>
      <?php include '../footer.php'; ?>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>