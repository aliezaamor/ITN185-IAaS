<?php
// Start session only if no session exists yet
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$adminName = $_SESSION['user_name'] ?? 'ALIEZA';
?>

<!-- ================= ADMIN HEADER ================= -->
<header class="top-header">

    <!-- LOGO -->
    <a href="../admin/adminHomepage.php" class="brand">
        MyEdu<span>.Keep</span> <small style="font-size:13px;color:#b83f3f;">ADMIN</small>
    </a>

    <!-- ADMIN INFO -->
    <div class="user-dropdown">
        <div class="user-trigger" style="background:#b83f3f;">
            <ion-icon name="shield-checkmark-outline"></ion-icon>
            <span><?= htmlspecialchars($adminName) ?></span>
        </div>

        <div class="dropdown-menu">
            <p><strong><?= htmlspecialchars($adminName) ?></strong></p>
            <p style="font-size:12px;color:#777;">Administrator</p>

            <a href="../login/user_login.php" class="dropdown-btn logout">Logout</a>
        </div>
    </div>

</header>

<!-- ================= ADMIN HEADER STYLES ================= -->
<style>
.top-header {
    position: sticky;
    top: 0;
    z-index: 999;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 6%;
    background: rgba(255, 241, 225, 0.95);
    backdrop-filter: blur(8px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.12);
}

.brand {
    font-size: 28px;
    font-weight: 800;
    letter-spacing: 3px;
    text-decoration:none;
    color:#5A3E2B;
}

.brand span { color:#6b4a34; }

.nav-pill {
    display: flex;
    gap: 18px;
}

.nav-pill a {
    text-decoration:none;
    padding:8px 18px;
    border-radius:999px;
    font-weight:600;
    background:#b83f3f;
    color:white;
}

.user-dropdown { position:relative; }

.user-trigger {
    display:flex;
    align-items:center;
    gap:8px;
    padding:7px 14px;
    border-radius:999px;
    color:white;
    background:#b83f3f;
    cursor:pointer;
}

.dropdown-menu {
    position:absolute;
    right:0;
    top:50px;
    width:200px;
    background:white;
    padding:12px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.15);
    display:none;
}

.dropdown-menu p {
    text-align:center;
    margin:0;
}

.dropdown-btn {
    display:block;
    margin-top:10px;
    padding:10px;
    text-align:center;
    border-radius:8px;
    text-decoration:none;
    background:#b83f3f;
    color:white;
}

.logout { background:#333; }
</style>

<!-- ================= JS ================= -->
<script>
document.querySelector('.user-trigger').addEventListener('click', function(){
    document.querySelector('.dropdown-menu').classList.toggle('show');
});
</script>

<style>
.show {
    display:block !important;
}
</style>

<!-- ICONS -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
