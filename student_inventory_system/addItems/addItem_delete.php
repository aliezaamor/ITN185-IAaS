<?php
require_once '../login/auth.php';
require_once 'addItem_model.php';

if (!isset($_GET['id'])) {
    header("Location: ../userHomepage.php");
    exit();
}

$model = new addItem_Model();

$model->delete($_GET['id']);

// Return to previous page
header("Location: ".$_SERVER['HTTP_REFERER']);
exit();
