<?php 
require_once 'admin_auth.php';
require_once '../login/user_model.php';
require_once '../addItems/addItem_model.php';

$userModel = new user_Model();
$itemModel = new addItem_Model();

// Count users
$users = $userModel->fetch();
$totalUsers = count($users);

// Count items
$items = $itemModel->fetchAllItems(); 
$totalItems = count($items);

// Count new users today
$newUsersToday = $userModel->countNewUsersToday();

// Count new items today
$newItemsToday = $itemModel->countNewItemsToday();

// Build arrays for charts
$userDates = $userModel->getUserDates();
$itemDates = $itemModel->getItemDates();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { 
            font-family: 'Poppins', sans-serif; 
            background: #f2ece7; 
            margin: 0; 
            color: #4b3a2f;
        }

        .container {
            width: 92%;
            margin: auto;
        }

        /* HEADER STYLE */
        .page-title {
            text-align: center;
            margin-top: 30px;
            font-size: 42px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #5A3E2B;
            animation: fadeInDown 0.7s ease-in-out;
        }

        /* DASHBOARD CARDS */
        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
            gap: 22px;
            margin: 40px 0;
        }

        .card {
            background: white;
            padding: 30px 25px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            text-align: center;
            transition: 0.25s ease;
            cursor: pointer;
            border-bottom: 4px solid #d3b59f;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.22);
            border-bottom-color: #b83f3f;
        }

        .card h2 {
            margin: 0;
            font-size: 48px;
            font-weight: 800;
            color: #b83f3f;
        }

        .card p {
            margin-top: 5px;
            font-size: 16px;
            color: #6d5848;
        }

        /* GRAPH SECTIONS */
        .graph-box {
            background: white;
            padding: 30px;
            border-radius: 22px;
            margin: 35px 0;
            box-shadow: 0 10px 24px rgba(0,0,0,0.13);
            animation: fadeIn 0.8s;
        }

        h2.section-title {
            font-size: 26px;
            margin-bottom: 15px;
            color: #5A3E2B;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 80px;
            box-shadow: 0 8px 22px rgba(0,0,0,0.12);
            animation: fadeInUp 0.9s;
        }

        table th {
            background: #5A3E2B;
            color: white;
            padding: 18px;
            font-size: 16px;
        }

        table td {
            padding: 18px;
            border-bottom: 1px solid #eee;
            font-size: 15px;
        }

        table tr:hover {
            background: #f9f4ef;
        }

        .user-link {
            color: #b83f3f;
            font-weight: 600;
            text-decoration: none;
            transition: 0.2s;
        }

        .user-link:hover {
            color: #8c2e2e;
            text-decoration: underline;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.5);
            animation: fadeIn 0.3s;
        }

        .modal-content {
            background: #fff;
            margin: 10% auto;
            padding: 35px;
            border-radius: 20px;
            width: 380px;
            box-shadow: 0 8px 26px rgba(0,0,0,0.26);
            animation: slideUp 0.4s;
        }

        .close {
            float: right;
            cursor: pointer;
            font-size: 26px;
            color: #b83f3f;
            transition: 0.2s;
        }

        .close:hover {
            color: #7a2a2a;
        }

        /* ANIMATIONS */
        @keyframes fadeIn { from {opacity:0;} to {opacity:1;} }
        @keyframes fadeInUp { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }
        @keyframes fadeInDown { from {opacity:0; transform:translateY(-20px);} to {opacity:1; transform:translateY(0);} }
        @keyframes slideUp { from {opacity:0; transform:translateY(30px);} to {opacity:1; transform:translateY(0);} }

    </style>
</head>

<body>

<?php include "admin_header.php"; ?>

<div class="container">

    <h1 class="page-title">Admin Dashboard</h1>

    <!-- Cards -->
    <div class="dashboard">
        <div class="card">
            <h2><?= $totalUsers ?></h2>
            <p>Total Users</p>
        </div>

        <div class="card">
            <h2><?= $totalItems ?></h2>
            <p>Total Logged Items</p>
        </div>

        <div class="card">
            <h2><?= $newUsersToday ?></h2>
            <p>New Users Today</p>
        </div>

        <div class="card">
            <h2><?= $newItemsToday ?></h2>
            <p>New Items Today</p>
        </div>
    </div>

    <!-- Users Graph -->
    <div class="graph-box">
        <h2 class="section-title">User Growth Over Time</h2>
        <canvas id="userChart"></canvas>
    </div>

    <!-- Items Graph -->
    <div class="graph-box">
        <h2 class="section-title">Items Posted Over Time</h2>
        <canvas id="itemChart"></canvas>
    </div>

    <!-- User Table -->
    <h2 class="section-title">User List & Item Counts</h2>
    <table>
        <tr>
            <th>User Name</th>
            <th>Total Items Posted</th>
        </tr>

        <?php foreach ($users as $u): ?>
            <?php $count = $itemModel->countItemsByUser($u['user_id']); ?>
            <tr>
                <td>
                    <a href="#" class="user-link" data-id="<?= $u['user_id'] ?>">
                        <?= $u['user_name'] ?>
                    </a>
                </td>
                <td><?= $count ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<!-- MODAL -->
<div id="userModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>

        <h2 style="color:#5A3E2B;margin-bottom:10px;">User Details</h2>
        <p><strong>Name:</strong> <span id="m_name"></span></p>
        <p><strong>Email:</strong> <span id="m_email"></span></p>
        <p><strong>Address:</strong> <span id="m_address"></span></p>
        <p><strong>Mobile:</strong> <span id="m_mobile"></span></p>
        <p><strong>Total Items Posted:</strong> <span id="m_items"></span></p>
    </div>
</div>

<!-- CHART SCRIPTS -->
<script>
const userDates = <?= json_encode(array_keys($userDates)) ?>;
const userCounts = <?= json_encode(array_values($userDates)) ?>;

const itemDates = <?= json_encode(array_keys($itemDates)) ?>;
const itemCounts = <?= json_encode(array_values($itemDates)) ?>;

new Chart(document.getElementById("userChart"), {
    type: "line",
    data: {
        labels: userDates,
        datasets: [{
            label: "Users Registered",
            data: userCounts,
            borderWidth: 3,
            borderColor: "rgb(184,63,63)",
            backgroundColor: "rgba(184,63,63,0.25)",
            fill: true,
            tension: 0.35
        }]
    }
});

new Chart(document.getElementById("itemChart"), {
    type: "bar",
    data: {
        labels: itemDates,
        datasets: [{
            label: "Items Posted",
            data: itemCounts,
            backgroundColor: "rgba(90,62,43,0.8)",
        }]
    }
});

// MODAL JS
document.querySelectorAll(".user-link").forEach(link => {
    link.addEventListener("click", function(e) {
        e.preventDefault();

        const id = this.dataset.id;

        fetch("get_user_info.php?id=" + id)
            .then(res => res.json())
            .then(data => {
                document.getElementById("m_name").textContent = data.user_name;
                document.getElementById("m_email").textContent = data.user_email;
                document.getElementById("m_address").textContent = data.address;
                document.getElementById("m_mobile").textContent = data.mobile_number;
                document.getElementById("m_items").textContent = data.total_items;

                document.getElementById("userModal").style.display = "block";
            });
    });
});

document.querySelector(".close").onclick = () => {
    document.getElementById("userModal").style.display = "none";
};

window.onclick = e => {
    if (e.target == document.getElementById("userModal")) {
        document.getElementById("userModal").style.display = "none";
    }
};
</script>

</body>
</html>
