<?php 
    require_once 'login/auth.php';
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
    background: url("pictures/backpic.png") center / cover no-repeat fixed;
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

    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Organize Smarter, <br> Live Stress-Free</h1>
            <p>Track, sort, and secure all your school essentials in one smart inventory system.</p>

            <button class="btn-shop" onclick="window.location.href='addItems/addItem.php'">
                LOG ITEMS
            </button>
        </div>

        <img src="https://3.files.edl.io/57b6/21/08/03/152951-480c64db-8855-433b-9cea-7c55836efb1b.jpg" alt="School Supplies">
    </section>

    <section class="categories">

    <div class="category-box"
         style="background-image: url('https://static.vecteezy.com/system/resources/thumbnails/070/424/463/small/stack-of-books-on-school-desk-free-photo.jpg');"
         onclick="window.location.href='addItems/view_items.php?type=' + encodeURIComponent('Academic & Study Materials')">
        <div class="category-label">
            <h2>Academic & Study Materials</h2>
            <p>Notes • Books • Papers</p>
        </div>
    </div>

    <div class="category-box"
         style="background-image: url('https://img.freepik.com/free-photo/modern-stationary-collection-arrangement_23-2149309643.jpg?semt=ais_hybrid&w=740&q=80');"
         onclick="window.location.href='addItems/view_items.php?type=' + encodeURIComponent('Digital & Electronic Devices')">
        <div class="category-label">
            <h2>Digital & Electronic Devices</h2>
            <p>Phones • Tablets • Laptops</p>
        </div>
    </div>

    <div class="category-box"
         style="background-image: url('https://img.freepik.com/premium-photo/clothing-accessories-men-women-ready-travel-life-style_11304-1404.jpg');"
         onclick="window.location.href='addItems/view_items.php?type=' + encodeURIComponent('Clothing & Accessories')">
        <div class="category-label">
            <h2>Clothing & Accessories</h2>
            <p>Uniforms • Wearables</p>
        </div>
    </div>

</section>

<section class="categories">

    <div class="category-box"
         style="background-image: url('https://backpackbeat.com/cdn/shop/collections/Complete_pegboard_backpack_storage_solutions_with_bags_and_sports_equipment.jpg?v=1753071609&width=1500');"
         onclick="window.location.href='addItems/view_items.php?type=' + encodeURIComponent('Bags & Storage Items')">
        <div class="category-label">
            <h2>Bags & Storage Items</h2>
            <p>Backpacks • Cases</p>
        </div>
    </div>

    <div class="category-box"
         style="background-image: url('https://peplyf.com/cdn/shop/files/lunchbox-ss-PL230912-bento-box-with-tumbler-01.jpg?v=1725003865');"
         onclick="window.location.href='addItems/view_items.php?type=' + encodeURIComponent('Food & Drink Items')">
        <div class="category-label">
            <h2>Food and Drink Items</h2>
            <p>Snacks • Bottles</p>
        </div>
    </div>

    <div class="category-box"
         style="background-image: url('https://diplomacy.state.gov/wp-content/uploads/2022/11/2014.0012.08.multi-Personal-hygiene-kit-USAID_Web-scaled.jpg');"
         onclick="window.location.href='addItems/view_items.php?type=' + encodeURIComponent('Personal Care & Hygiene')">
        <div class="category-label">
            <h2>Personal Care and Hygiene</h2>
            <p>Self-care essentials</p>
        </div>
    </div>

</section>

<section class="categories">

    <div class="category-box"
         style="background-image: url('https://img.freepik.com/free-photo/sports-tools_53876-138077.jpg?semt=ais_hybrid&w=740&q=80');"
         onclick="window.location.href='addItems/view_items.php?type=' + encodeURIComponent('Sports & Activity Equipment')">
        <div class="category-label">
            <h2>Sports & Activity Equipments</h2>
            <p>Gear • Apparel</p>
        </div>
    </div>

    <div class="category-box"
         style="background-image: url('https://images.squarespace-cdn.com/content/v1/5d005ea4dbd3b80001fec9f1/1571377482380-2DKCZS2TYWPTULEP4ZHD/Imperial_Vaults_safety-deposit-boxes_banner_other-valuables-storage_web.jpg?format=2500w');"
         onclick="window.location.href='addItems/view_items.php?type=' + encodeURIComponent('Valuables')">
        <div class="category-label">
            <h2>Valuables</h2>
            <p>Money • Devices • IDs</p>
        </div>
    </div>

</section>


    <?php include 'footer.php'; ?>

</body>
</html>
