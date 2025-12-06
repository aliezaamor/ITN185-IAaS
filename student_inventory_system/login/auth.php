<?php
session_start();

// Block admins
if (!isset($_SESSION['user_id'])) {
    session_unset();
    session_destroy();
    header("Location: ../login/user_index.php");
    exit();
}

// Remove leftover ADMIN session data
unset($_SESSION['admin_logged_in'], $_SESSION['admin_id'], $_SESSION['admin_name'], $_SESSION['admin_email']);
