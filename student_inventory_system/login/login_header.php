<header class="top-header">

    <!-- LOGO -->
    <div class="brand" onclick="window.location.href='user_login.php'" style="cursor:pointer;">
        MyEdu<span>.Keep</span>
    </div>


    <!-- SEARCH -->
    <div class="search-box">
        <input type="text" placeholder="Search products...">
        <ion-icon name="search-outline"></ion-icon>
    </div>

    <!-- NAV -->
    <nav class="nav-pill">
        <a class="active" href="user_login.php">HOME</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTACT</a>
    </nav>

    <div class="profile-badge" onclick="window.location.href='user_index.php'">
        <span>LOGIN</span>
    </div>

</header>
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
}
.brand span {
    color: #6b4a34;
}

/* Search box */
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
    transition: 0.2s ease;
}

.nav-pill a:hover {
    background: rgba(90, 62, 43, 0.15);
}

/* Active */
.nav-pill a.active {
    background: #5A3E2B;
    color: white;
}

/* Profile badge */
.profile-badge {
    display: flex;
    align-items: center;
    gap: 8px;

    background: #5A3E2B;
    color: white;

    padding: 7px 15px;
    border-radius: 999px;
    font-size: 13px;
    font-weight: 600;
}

.profile-badge ion-icon {
    font-size: 20px;
}

/* Mobile tweaks */
@media (max-width: 960px) {
    .search-box {
        display: none;
    }
}
</style>

<!-- ================= ICONS ================= -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
