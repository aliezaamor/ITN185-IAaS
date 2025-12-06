<?php
session_start();

/* Allow only admin role */
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    session_unset();
    session_destroy();
    header("Location: ../login/user_login.php");
    exit();
}

/* Remove leftover USER session data */
unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_email']);
