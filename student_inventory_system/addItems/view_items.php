<?php
require_once '../login/auth.php';
include 'addItem_model.php';

/* ----------------------------
   GET CATEGORY FROM URL
-----------------------------*/
if (!isset($_GET['type'])) {
    header("Location: ../userHomepage.php");
    exit();
}

$category = $_GET['type'];

/* ----------------------------
   FETCH USER ITEMS
-----------------------------*/
$model = new addItem_Model();
$items = $model->fetch($category);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($category); ?> Items</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    font-family:'Poppins', sans-serif;
    background: url("../pictures/backpic.png") center / cover no-repeat fixed;
}

.title{
    text-align:center;
    margin:30px 0 10px;
    font-size:40px;
    font-weight:800;
    color:#5A3E2B;
}

.back-btn{
    display:block;
    width:160px;
    margin:8px auto 30px;
    padding:10px;
    background:#5A3E2B;
    border-radius:999px;
    text-align:center;
    color:white;
    text-decoration:none;
    font-weight:600;
}

.item-grid{
    width:85%;
    margin:0 auto 80px;
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(240px,1fr));
    gap:25px;
}

/* ITEM CARD */
.item{
    background:white;
    border-radius:16px;
    box-shadow:0 5px 18px rgba(0,0,0,.12);
    overflow:hidden;
    transition:0.25s ease;
}

.item:hover{
    transform:translateY(-6px);
}

.item img{
    width:100%;
    height:200px;
    object-fit:cover;
}

.item-info{
    padding:14px;
}

.item-info h3{
    margin:2px 0 4px;
    font-size:18px;
}

.status{
    font-size:12px;
    font-weight:700;
    color:white;
    background:#5A3E2B;
    display:inline-block;
    padding:4px 10px;
    border-radius:999px;
}

.details{
    margin-top:8px;
    font-size:14px;
    color:#444;
    line-height:1.4;
}

.empty-msg{
    grid-column:1/-1;
    text-align:center;
    font-size:22px;
    font-weight:600;
    color:#555;
}

/* ===== MODAL VIEW ===== */
.modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.65);
    z-index:999;
}

.modal-content{
    background:white;
    width:90%;
    max-width:550px;
    margin:80px auto;
    padding:20px;
    border-radius:18px;
    position:relative;
    animation:zoom .25s ease;
}

@keyframes zoom{
    from{transform:scale(.7);opacity:0}
    to{transform:scale(1);opacity:1}
}

.modal img{
    width:100%;
    height:300px;
    object-fit:cover;
    border-radius:14px;
}

.close{
    position:absolute;
    top:15px;
    right:18px;
    font-size:30px;
    cursor:pointer;
}

.modal-actions{
    margin-top:20px;
    display:flex;
    gap:12px;
}

.modal-actions a{
    flex:1;
    padding:10px;
    text-align:center;
    color:white;
    text-decoration:none;
    border-radius:999px;
}

.edit-btn{
    background:#4CAF50;
}

.delete-btn{
    background:#E74C3C;
}


</style>

</head>
<body>

<?php include '../header.php'; ?>

<h1 class="title"><?php echo htmlspecialchars($category); ?></h1>

<!---------------- ITEMS GRID ---------------->
<div class="item-grid">

<?php if(empty($items)): ?>

    <div class="empty-msg">
        No items logged yet in this category.
    </div>

<?php else: ?>

    <?php foreach($items as $item): ?>

<div class="item"
    onclick="openItem(
        '<?php echo addslashes($item['item_name']); ?>',
        '<?php echo addslashes($item['details']); ?>',
        '<?php echo addslashes($item['item_status']); ?>',
        '<?php echo addslashes($item['item_picture']); ?>',
        '<?php echo $item['item_id']; ?>'
    )">

    <img src="<?php echo htmlspecialchars($item['item_picture']); ?>">

    <div class="item-info">

        <h3><?php echo htmlspecialchars($item['item_name']); ?></h3>
        <span class="status"><?php echo htmlspecialchars($item['item_status']); ?></span>

    </div>

</div>

<?php endforeach; ?>



<?php endif; ?>



</div>
<a class="back-btn" href="../userHomepage.php">← Back</a>

<?php include '../footer.php'; ?>

<!-- ITEM MODAL -->
<div id="itemModal" class="modal">

<div class="modal-content">

    <span class="close" onclick="closeItem()">&times;</span>

    <img id="modalImg">

    <h2 id="modalTitle"></h2>

    <span id="modalStatus" class="status"></span>

    <p id="modalDetails"></p>

    <div class="modal-actions">
        <a id="editBtn" class="edit-btn">Edit Item</a>
        <a id="deleteBtn" class="delete-btn"
           onclick="return confirm('Delete this item?')">
            Delete Item
        </a>
    </div>

</div>

</div>

<script>
function openItem(name, details, status, img, id){

    document.getElementById("modalTitle").innerText = name;
    document.getElementById("modalDetails").innerText = details;
    document.getElementById("modalStatus").innerText = status;
    document.getElementById("modalImg").src = img;

    document.getElementById("editBtn").href =
        "addItem_edit.php?id=" + id;

    document.getElementById("deleteBtn").href =
        "addItem_delete.php?id=" + id;

    document.getElementById("itemModal").style.display = "block";
}

function closeItem(){
    document.getElementById("itemModal").style.display = "none";
}
</script>


</body>
</html>
