<?php
// Load the authentication file to ensure only logged-in users can access this page
require_once '../login/auth.php';

// Include the model that handles all item-related database operations
require_once 'addItem_model.php';

// Check if an item ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: ../userHomepage.php");
    exit();
}

// Create a new instance of the model so we can access the delete function
$model = new addItem_Model();

$model->delete($_GET['id']);

// After deleting, redirect the user back to the previous page they came from
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
