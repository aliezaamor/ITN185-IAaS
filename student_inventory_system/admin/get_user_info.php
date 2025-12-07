<?php
//Load necessary functions and ensure admin authentication
require_once '../login/user_model.php';
require_once '../addItems/addItem_model.php';

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "No ID provided"]);
    exit;
}

$user_id = $_GET['id'];

$userModel = new user_Model();
$itemModel = new addItem_Model();

// Fetch user info from the database
$user = $userModel->fetchUserById($user_id);
$count = $itemModel->countItemsByUser($user_id);

// Add the total items count to the user data
$user['total_items'] = $count;

echo json_encode($user);
?>
