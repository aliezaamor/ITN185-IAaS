<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: user_index.php"); 
    exit();
}

$username = $_SESSION['user_name'];
$useremail = $_SESSION['email'] ?? "";
$is_admin = $_SESSION['is_admin'] ?? false;
?>

<div class="profile-wrapper">
    <!-- BUTTON shown on header -->
    <button id="user-btn" class="profile-badge">
        <ion-icon name="person-circle-outline"></ion-icon>
        <span><?php echo htmlspecialchars($username); ?></span>
    </button>

    <!-- DROPDOWN PANEL -->
    <div id="user-form" class="user-dropdown">
        <h3><?php echo htmlspecialchars($username); ?></h3>
        <p><?php echo htmlspecialchars($useremail); ?></p>

        <a href="user_page.php">My Profile</a>

        <?php if($is_admin): ?>
            <a href="admin_dashboard.php">Admin Panel</a>
        <?php endif; ?>

        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

<style>
/* Container */
.profile-wrapper {
    position: relative;
}

/* Badge same look as your header */
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
    border: none;
    cursor: pointer;
}

/* Dropdown panel */
.user-dropdown {
    position: absolute;
    top: 50px;
    right: 0;
    width: 180px;
    background: #fff;
    padding: 16px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);

    display: none;
    flex-direction: column;
    gap: 10px;
}

.user-dropdown.visible {
    display: flex;
}

.user-dropdown h3 {
    margin: 0;
    font-size: 16px;
    font-weight: 700;
    color: #5A3E2B;
}

.user-dropdown p {
    font-size: 13px;
    color: #666;
    margin: 0 0 5px;
}

.user-dropdown a {
    text-decoration: none;
    font-size: 14px;
    color: #5A3E2B;
    padding: 6px;
    border-radius: 6px;
}

.user-dropdown a:hover {
    background: rgba(90, 62, 43, 0.15);
}

.logout {
    color: red !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('user-btn');
    const dropdown = document.getElementById('user-form');

    btn.addEventListener('click', () => {
        dropdown.classList.toggle('visible');
    });
});
</script>
