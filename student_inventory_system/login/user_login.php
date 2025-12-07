<?php 
    // Start session for user login page
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyEdu.Keep</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>


    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background: url("../pictures/backpic.png") center / cover no-repeat fixed;
    }


    /* HERO LAYOUT */
    .hero {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 60px;
        padding: 80px 10%;
    }

    /* TEXT SIDE */
    .hero-text {
        max-width: 480px;
    }

.hero-text h1 {
    font-size: 50px;
    font-weight: 800;
    line-height: 1.15;
    color: #5A3E2B;
    letter-spacing: -0.5px;
}

.hero-text p {
    font-size: 18px;
    margin-top: 14px;
    max-width: 360px;
    line-height: 1.7;
    color: #6b4a34;
}

/* BUTTON */
.btn-shop {
    margin-top: 28px;
    padding: 14px 32px;
    background: linear-gradient(135deg, #5A3E2B, #7a543c);
    border: none;
    border-radius: 999px;
    color: white;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: .5px;
    cursor: pointer;
    box-shadow: 0 8px 18px rgba(0,0,0,0.12);
    transition: all 0.3s ease;
}

.btn-shop:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

/* HERO IMAGE */
.hero img {
    width: 700px;
    height: 400px;
    border-radius: 22px;
    object-fit: cover;

    /* Blended edges */
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


        /* Category Boxes */
        .categories {
            display: flex;
            justify-content: center;
            gap: 25px;
            padding: 40px;
        }
        .category-box {
            width: 350px;
            height: 180px;
            background-size: cover;
            background-position: center;
            border-radius: 25px;
            position: relative;
            cursor: pointer;
            overflow: hidden;
        }

            /* Blur background image layer */
    .category-box::before {
        content: "";
        position: absolute;
        inset: 0;
        background: inherit;
        background-size: cover;
        background-position: center;
        
        filter: blur(3px);
        transform: scale(1.05); /* avoids edge clipping */
        transition: all 0.3s ease;
    }

    /* Optional dark glass overlay for text readability */
    .category-box::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.18);
    }

    /* Keep label above layers */
    .category-label {
        position: relative;
        z-index: 2;
    }

    /* Hover: remove blur for clear view */
    .category-box:hover::before {
        filter: blur(0);
    }

    /* Subtle zoom on hover */
    .category-box:hover {
        transform: scale(1.03);
    }

        .category-label {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: white;
        }
        .category-label h2 {
            margin: 0;
            font-size: 26px;
            font-weight: bold;
        }
        .category-label p {
            margin: 0;
        }

        /* Footer Icons */
        .footer-icons {
            text-align: center;
            padding: 40px;
            font-size: 40px;
        }
    </style>

</head>
<body>

    <?php include 'login_header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Organize Smarter, <br> Live Stress-Free</h1>
            <p>Track, sort, and secure all your school essentials in one smart inventory system.</p>

            <button class="btn-shop" onclick="window.location.href='user_index.php'">
                LOG ITEMS
            </button>
        </div>

        <img src="https://3.files.edl.io/57b6/21/08/03/152951-480c64db-8855-433b-9cea-7c55836efb1b.jpg" alt="School Supplies">
    </section>


    <?php include("../footer.php"); ?>

</body>
</html>