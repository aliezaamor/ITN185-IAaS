<?php 
    require_once 'login/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About • MyEdu.Keep</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url("pictures/backpic.png") center / cover no-repeat fixed;
        }

        /* Centered About Section */
        .about-container {
            max-width: 900px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.8);
            padding: 50px;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            backdrop-filter: blur(4px);
        }

        .about-container h1 {
            font-size: 48px;
            font-weight: 800;
            color: #5A3E2B;
            margin-bottom: 20px;
        }

        .about-container p {
            font-size: 18px;
            color: #6b4a34;
            line-height: 1.8;
            margin-bottom: 18px;
        }

        /* Optional Image for design consistency */
        .about-img {
            width: 90%;
            max-width: 700px;
            border-radius: 20px;
            margin: 30px auto;
            display: block;

            mask-image: radial-gradient(
                ellipse at center,
                black 60%,
                transparent 100%
            );
            -webkit-mask-image: radial-gradient(
                ellipse at center,
                black 60%,
                transparent 100%
            );
        }
    </style>
</head>

<body>

<?php include 'header.php'; ?>

<div class="about-container">
    <h1>About MyEdu.Keep</h1>

    <p>
        MyEdu.Keep is a simple and smart inventory system designed to help students 
        track, organize, and manage their school items with ease. Whether it's 
        academic materials, gadgets, clothing, or personal belongings, the system 
        allows users to store item details in one secure platform.
    </p>

    <p>
        The purpose of this system is to help students keep a clear record of their 
        belongings to avoid misplacement, clutter, and confusion. With MyEdu.Keep, 
        you can quickly log items, categorize them, and easily review everything you own.
    </p>

    <p>
        Our goal is simple — to help you stay organized, reduce stress, and 
        maintain better control over your school essentials.
    </p>

    <img class="about-img" src="https://3.files.edl.io/57b6/21/08/03/152951-480c64db-8855-433b-9cea-7c55836efb1b.jpg" alt="About Image">
</div>

<?php include 'footer.php'; ?>

</body>
</html>
