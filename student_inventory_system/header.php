<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Always use user session only
    $username = $_SESSION['user_name'] ?? "GUEST";
    $email    = $_SESSION['user_email'] ?? "No email";
    $basePath = "/student_inventory/ITN185-IAaS/student_inventory_system/";
    $profileLink = $basePath . "login/user_profile.php";
    $logoutLink  = $basePath . "login/user_login.php";
    $homelink    = $basePath . "userHomepage.php";
    $aboutlink    = $basePath . "about.php";
    $contactlink    = $basePath . "contact.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>

<!-- ================= HEADER ================= -->
<header class="top-header">

    <!-- LOGO -->
    <a href="<?= $homelink ?>" class="brand">
    MyEdu<span>.Keep</span>
</a>


    <!-- SEARCH -->
    <div class="search-box">
        <input type="text" placeholder="Search products...">
        <ion-icon name="search-outline"></ion-icon>
    </div>

    <!-- NAV -->
    <nav class="nav-pill">
    <a class="<?= basename($_SERVER['PHP_SELF']) == 'userHomepage.php' ? 'active' : '' ?>" 
       href="<?= $homelink ?>">HOME</a>

    <a class="<?= basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : '' ?>" 
       href="<?= $aboutlink ?>">ABOUT</a>

    <a class="<?= basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : '' ?>" 
       href="<?= $contactlink ?>">CONTACT</a>
</nav>


    <!-- ========== USER DROPDOWN ========== -->
    <div class="user-dropdown">
        <div class="user-trigger">
            <ion-icon name="person-circle-outline"></ion-icon>
            <span><?php echo htmlspecialchars($username); ?></span>
        </div>

        <div class="dropdown-menu">
            <p><strong><?php echo htmlspecialchars($username); ?></strong></p>
            <p class="email"><?php echo htmlspecialchars($email); ?></p>

            <a href="<?= $profileLink ?>" class="dropdown-btn">Profile</a>
            <a href="<?= $logoutLink ?>" class="dropdown-btn logout">Logout</a>
        </div>
    </div>

</header>
<!-- ================= END HEADER ================= -->


<!-- ================= HEADER STYLES ================= -->
<style>
.top-header {
    position: sticky;
    top: 0;
    z-index: 999;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;

    padding: 16px 6%;
    background: rgba(255, 241, 225, 0.95);
    backdrop-filter: blur(8px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.12);
}

/* Logo */
.brand {
    font-size: 28px;
    font-weight: 800;
    letter-spacing: 3px;
    color: #5A3E2B;
    text-decoration: none; /* Important */
}
.brand span { color: #6b4a34; }


/* Search */
.search-box {
    margin-left: 200px;
    flex: 1;
    max-width: 280px;
    position: relative;
}
.search-box input {
    width: 100%;
    padding: 10px 40px 10px 16px;
    border-radius: 999px;
    border: none;
    outline: none;
    background: white;
    font-size: 13px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
}
.search-box ion-icon {
    position: absolute;
    right: -25px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
    color: #5A3E2B;
}

/* Nav pills */
.nav-pill {
    display: flex;
    gap: 18px;
}
.nav-pill a {
    text-decoration: none;
    padding: 8px 18px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
    color: #5A3E2B;
    transition: .2s;
}
.nav-pill a:hover {
    background: rgba(90,62,43,0.15);
}
.nav-pill a.active {
    background: #5A3E2B;
    color: white;
}

/* User dropdown */
.user-dropdown {
    position: relative;
    display: inline-block;
    cursor: pointer;
}
.user-trigger {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #5A3E2B;
    padding: 7px 14px;
    border-radius: 999px;
    color: white;
    font-size: 13px;
    font-weight: 600;
}
.user-trigger ion-icon { font-size: 20px; }

.dropdown-menu {
    position: absolute;
    top: 50px;
    right: 0;
    background: white;
    width: 230px;
    padding: 12px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    display: none;
}
.dropdown-menu p {
    text-align: center;
    margin: 0;
    color: #333;
    font-size: 14px;
}
.dropdown-menu .email {
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
}

.dropdown-btn {
    display: block;
    text-decoration: none;
    padding: 8px;
    text-align: center;
    margin-top: 6px;
    background: #5A3E2B;
    color: white;
    border-radius: 8px;
    font-size: 13px;
}
.logout {
    background: #b83f3f;
}

@media (max-width: 960px) {
    .search-box { display: none; }
}
</style>

<!-- ================= JS for Dropdown ================= -->
<script>
document.querySelector('.user-trigger').addEventListener('click', function() {
    const menu = document.querySelector('.dropdown-menu');
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
});

document.addEventListener('click', function(e) {
    const dropdown = document.querySelector('.user-dropdown');
    if (!dropdown.contains(e.target)) {
        document.querySelector('.dropdown-menu').style.display = "none";
    }
});
</script>

<!-- ICONS -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
