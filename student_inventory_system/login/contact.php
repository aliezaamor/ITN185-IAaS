<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact • MyEdu.Keep</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>

<?php include 'login_header.php'; ?>

<!-- Main Contact Section -->
<div class="contact-container">
    <h1>Contact Us</h1>
    <p>
        Have questions or need assistance?  
        Reach out to us through our official email or social media channels.
    </p>

    <div class="contact-info">

        <div class="info-box">
            <h3>Email</h3>
            <p>support@myedukeep.com</p>
        </div>

        <div class="info-box">
            <h3>Facebook</h3>
            <p>@MyEduKeepOfficial</p>
        </div>

        <div class="info-box">
            <h3>Instagram</h3>
            <p>@myedukeep</p>
        </div>

        <div class="info-box">
            <h3>Twitter / X</h3>
            <p>@MyEduKeep</p>
        </div>

    </div>

</div>

<?php include '../footer.php'; ?>

</body>
</html>

<style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url("pictures/backpic.png") center / cover no-repeat fixed;
        }

        .contact-container {
            max-width: 900px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.82);
            padding: 50px;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            backdrop-filter: blur(4px);
        }

        .contact-container h1 {
            font-size: 46px;
            font-weight: 800;
            color: #5A3E2B;
            margin-bottom: 20px;
        }

        .contact-container p {
            font-size: 18px;
            color: #6b4a34;
            line-height: 1.8;
            margin-bottom: 18px;
        }

        .contact-info {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .info-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 25px;
            border-radius: 20px;
            width: 260px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            transition: .3s ease;
        }

        .info-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0,0,0,0.15);
        }

        .info-box h3 {
            color: #5A3E2B;
            margin-bottom: 10px;
            font-size: 22px;
        }

        .info-box p {
            color: #6b4a34;
            font-size: 16px;
            margin: 0;
        }
    </style>
