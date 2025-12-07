<?php 
// Load the authentication file to ensure only logged-in users can access this page
require_once '../login/auth.php';

// Include the model that handles all item-related database operations
include 'addItem_model.php';

$model = new addItem_Model();

if (!isset($_GET['id'])) {
    die("Invalid item.");
}

$item_id = $_GET['id'];
$item = $model->fetch_single($item_id);

if (!$item) {
    die("Item not found.");
}

// UPDATE LOGIC
if (isset($_POST['submit'])) {

    $picture = "";

    // Handle image upload only if new file chosen
    if (!empty($_FILES['item_picture']['name'])){

        $file_name = time() . "_" . basename($_FILES['item_picture']['name']);
        $upload_dir = "../uploads/";

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $destination = $upload_dir . $file_name;

        if(move_uploaded_file($_FILES['item_picture']['tmp_name'], $destination)){
            $picture = $destination;
        }
    }

    // Prepare updated data to send to the model
    $data = [
        'item_id'       => $item_id,
        'item_name'     => $_POST['item_name'],
        'details'       => $_POST['details'],
        'item_status'   => $_POST['item_status'],
        'item_type'     => $_POST['item_type'],
        'item_picture' => $picture
    ];

    // Run update function from the model
    if ($model->update($data)){
        echo "<script>alert('Item updated successfully');</script>";
        echo "<script>window.location.href='../userHomepage.php';</script>";
        exit;
    }

}
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<title>Edit Item</title>

<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&display=swap');

body{
    font-family: "Poppins", sans-serif;
    background: url("../pictures/backpic.png") center / cover no-repeat fixed;
    min-height:100vh;
    padding-top:50px;
}

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

.form-card{
    background: rgba(255,255,255,0.96);
    border-radius:18px;
    padding:32px;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
    border-left:8px solid #ffab91;
}

.form-group label{
    font-weight:600;
    color:#6b3f2e;
}

.form-control{
    height:45px
}

.form-control,
.form-control-file,
textarea{
    border:1.5px solid #ffccbc;
    border-radius:12px;
    padding:10px 12px;
}

.form-control:focus,
textarea:focus{
    border-color:#ff8a65;
    box-shadow:0 0 6px rgba(255,138,101,.4)!important;
}

.btn-submit{
    background:#ff8a65;
    color:#fff;
    border:none;
    border-radius:12px;
    padding:12px;
    font-size:1.05em;
    font-weight:600;
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
}

.back-btn:hover{
    background:#ffca28;
}
</style>

</head>
<body>

<h2 class="page-title">Edit Item</h2>

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto form-card">

            <form method="post" enctype="multipart/form-data">

            <!-- Item Name -->
            <div class="form-group">
                <label>Item Name</label>
                <input type="text" class="form-control"
                    name="item_name"
                    value="<?= htmlspecialchars($item['item_name']) ?>" required>
            </div>

            <!-- Category -->
            <div class="form-group">
                <label>Item Category</label>
                <select name="item_type" class="form-control">
                    <?php
                    $categories = [
                    "Academic & Study Materials",
                    "Digital & Electronic Devices",
                    "Clothing & Accessories",
                    "Bags & Storage Items",
                    "Food & Drink Items",
                    "Personal Care & Hygiene",
                    "Sports & Activity Equipment",
                    "Valuables"
                    ];
                    foreach($categories as $cat){
                        $selected = ($item['item_type'] == $cat) ? "selected" : "";
                        echo "<option $selected>$cat</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Picture -->
            <div class="form-group">
                <label>Update Picture (optional)</label><br>
                <img src="<?= $item['item_picture']?>" style="width:100px;border-radius:10px;"><br><br>
                <input type="file" class="form-control-file" name="item_picture">
            </div>

            <!-- Details -->
            <div class="form-group">
                <label>Item Details</label>
                <textarea class="form-control" name="details" rows="3"><?= htmlspecialchars($item['details']) ?></textarea>
            </div>

            <!-- Status -->
            <div class="form-group">
                <label>Item Status</label>
                <select name="item_status" class="form-control">
                    <?php
                    $statuses = ["Owned","Missing","Recovered","Disposed"];
                    foreach($statuses as $st){
                        $selected = ($item['item_status'] == $st) ? "selected" : "";
                        echo "<option $selected>$st</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Submit Button -->
            <button name="submit" class="btn btn-submit btn-block"> Update Item </button>

            <a href="../userHomepage.php" class="back-btn">Go Back</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>

