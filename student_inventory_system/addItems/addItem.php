<?php 
require_once '../login/auth.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<title>Add New Item</title>

</head>
<body>

<!-- PAGE TITLE -->
<h2 class="page-title">Add New Item</h2>

<div class="container">
<div class="row">
<div class="col-md-5 mx-auto form-card">

<?php
include 'addItem_model.php';
$addItem_model = new addItem_Model();
if (!isset($_SESSION['user_id'])) {
    die("Error: User not logged in. Please login first.");
}

$user_id = $_SESSION['user_id'];
$addItem_model->insert($user_id);

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];  // ✔ get the logged-in user
    $insert = $addItem_model->insert($user_id); 
}
?>

<form action="" method="post" enctype="multipart/form-data">

<!-- Item Name -->
<div class="form-group">
    <label>Item Name</label>
    <input type="text" class="form-control" name="item_name" 
           placeholder="e.g. Blue Notebook, Samsung Charger" required>
</div>

<!-- Category -->
<div class="form-group">
    <label>Item Category</label>
    <select class="form-control" name="item_type" required>
        <option value="Academic & Study Materials">Academic & Study Materials</option>
        <option value="Digital & Electronic Devices">Digital & Electronic Devices</option>
        <option value="Clothing & Accessories">Clothing & Accessories</option>
        <option value="Bags & Storage Items">Bags & Storage Items</option>
        <option value="Food & Drink Items">Food & Drink Items</option>
        <option value="Personal Care & Hygiene">Personal Care & Hygiene</option>
        <option value="Sports & Activity Equipment">Sports & Activity Equipment</option>
        <option value="Valuables">Valuables</option>
    </select>
</div>

<!-- Picture -->
<div class="form-group">
    <label>Item Picture</label>
    <input type="file" class="form-control-file" name="item_picture"
           accept="image/*" required>
</div>

<!-- Details -->
<div class="form-group">
    <label>Item Details</label>
    <textarea class="form-control" name="details" rows="3"
            placeholder="Add more description if needed..."></textarea>
</div>

<!-- Status -->
<div class="form-group">
    <label>Item Status</label>
    <select class="form-control" name="item_status" required>
        <option value="Owned">Owned</option>
        <option value="Missing">Missing</option>
        <option value="Recovered">Recovered</option>
        <option value="Disposed">Disposed</option>
    </select>

    <small class="text-muted">
        Choose the current condition of the item.
    </small>
</div>

<!-- Buttons -->
<button type="submit" name="submit" class="btn btn-block btn-submit">
    Save Item
</button>

<a href="../userHomepage.php" class="back-btn">Go Back</a>

</form>

</div>
</div>
</div>

</body>
</html>

<style>

/* Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&display=swap');

body{
    font-family: "Poppins", sans-serif;
    background: url("../pictures/backpic.png") center / cover no-repeat fixed;
    min-height:100vh;
    padding-top:50px;
}

/* Page title */
.page-title{
    font-family:'Montserrat', sans-serif;
    font-size:40px;
    font-weight:800;
    text-align:center;
    color:white;
    text-shadow:
        0 0 5px rgba(255,160,122,1),
        0 0 10px rgba(255,137,96,0.6),
        0 0 20px rgba(255,112,67,0.7);
    margin-bottom:30px;
    letter-spacing:1px;
}

.page-title::after{
    content:"";
    width:130px;
    height:5px;
    background:#ffab91;
    display:block;
    margin:10px auto 0;
    border-radius:3px;
}

/* Form Card */
.form-card{
    background: rgba(255,255,255,0.96);
    border-radius:18px;
    padding:32px;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
    border-left:8px solid #ffab91;
}

/* Labels */
.form-group label{
    font-weight:600;
    color:#6b3f2e;
}

.form-control{
    height:45px
}

/* Input styles */
.form-control,
.form-control-file,
textarea{
    border:1.5px solid #ffccbc;
    border-radius:12px;
    padding:10px 12px;
    font-size:14px;
}

.form-control:focus,
textarea:focus{
    border-color:#ff8a65;
    box-shadow:0 0 6px rgba(255,138,101,.4)!important;
}

/* Buttons */
.btn-submit{
    background:#ff8a65;
    color:#fff;
    border:none;
    border-radius:12px;
    padding:12px;
    font-size:1.05em;
    font-weight:600;
    transition:0.25s;
}

.btn-submit:hover{
    background:#ff7043;
}

.back-btn{
    display:block;
    width:100%;
    text-align:center;
    margin-top:12px;
    padding:10px;
    background:#ffd180;
    border-radius:12px;
    font-weight:600;
    text-decoration:none!important;
    color:#6b3f2e!important;
    transition:.2s;
}

.back-btn:hover{
    background:#ffca28;
}

</style>
