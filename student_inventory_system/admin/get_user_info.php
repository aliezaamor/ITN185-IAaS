<?php
require_once '../login/user_model.php';
require_once '../addItems/addItem_model.php';

if (!isset($_GET['id'])) {
    echo json_encode(["error" => "No ID provided"]);
    exit;
}

$user_id = $_GET['id'];

$userModel = new user_Model();
$itemModel = new addItem_Model();

$user = $userModel->fetchUserById($user_id);
$count = $itemModel->countItemsByUser($user_id);

$user['total_items'] = $count;

echo json_encode($user);
?>
