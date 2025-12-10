<?php 
class addItem_Model {

    // Database connection properties
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "student_inventory";
    private $conn;

    // Automatically connect to database when the class is created
    public function __construct() {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

   // insert new item
    public function insert() {

        if (!isset($_POST['submit'])) return;

         // Check if user is logged in
        if (!isset($_SESSION['user_id'])) {
            echo "<script>alert('User not logged in!');</script>";
            return;
        }

        $user_id = $_SESSION['user_id'];

        // Required fields
        if (empty($_POST['item_name']) || empty($_POST['item_type']) 
            || empty($_POST['item_status']) || $_FILES['item_picture']['error'] !== UPLOAD_ERR_OK) {

            echo "<script>alert('Please fill all required fields!');</script>";
            return;
        }

        // Collect form values
        $item_name = $_POST['item_name'];
        $details = $_POST['details'];
        $item_status = $_POST['item_status'];
        $item_type = $_POST['item_type'];

        // FILE UPLOAD
        $file_name = time() . "_" . basename($_FILES['item_picture']['name']);
        $upload_dir = "../uploads/";
        
        // Create folder if not exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $file_destination = $upload_dir . $file_name;

        if (!move_uploaded_file($_FILES['item_picture']['tmp_name'], $file_destination)) {
            echo "<script>alert('Failed to upload image');</script>";
            return;
        }

        // INSERT QUERY
        $query = "INSERT INTO items (user_id, item_name, item_picture, item_type, details, item_status)
                  VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("isssss", $user_id, $item_name, $file_destination, $item_type, $details, $item_status);

        if ($stmt->execute()) {
            echo "<script>alert('Item added successfully!');</script>";
            echo "<script>window.location.href = '../userHomepage.php';</script>";
        } else {
            echo "<script>alert('Error adding item');</script>";
        }
    }

    // FETCH ITEMS FOR LOGGED IN USER
    public function fetch($search = null) {
    if (!isset($_SESSION['user_id'])) return [];
    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM items WHERE user_id = ?";
    
     // Add search conditions if search is provided
    if ($search) {
        $search = "%{$search}%";
        $query .= " AND (item_name LIKE ? 
                      OR item_status LIKE ?
                      OR item_type LIKE ?
                      OR details LIKE ?)";
    }

    $stmt = $this->conn->prepare($query);

    if ($search) {
        $stmt->bind_param("issss", $user_id, $search, $search, $search, $search);
    } else {
        $stmt->bind_param("i", $user_id);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }

    return $items;
}

    // DELETE ITEM
    public function delete($item_id) {
        $query = "DELETE FROM items WHERE item_id = '$item_id'";
        return $this->conn->query($query);
    }

    // FETCH SINGLE ITEM
    public function fetch_single($item_id) {
        $query = "SELECT * FROM items WHERE item_id = '$item_id'";
        $result = $this->conn->query($query);

        return $result->fetch_assoc();
    }

    // UPDATE ITEM
    public function update($data) {
    $item_id = $data['item_id'];
    $item_name = $data['item_name'];
    $details = $data['details'];
    $item_status = $data['item_status'];
    $item_type = $data['item_type'];

    // Update picture only if exists
    $item_picture = !empty($data['item_picture']) ? $data['item_picture'] : null;

    if ($item_picture) {
        $query = "UPDATE items 
                  SET item_name = ?, details = ?, item_status = ?, item_type = ?, item_picture = ?
                  WHERE item_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssi", $item_name, $details, $item_status, $item_type, $item_picture, $item_id);
    } else {
        $query = "UPDATE items 
                  SET item_name = ?, details = ?, item_status = ?, item_type = ?
                  WHERE item_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssi", $item_name, $details, $item_status, $item_type, $item_id);
    }

    return $stmt->execute();
}


    // FETCH ALL ITEMS
    public function fetchAllItems() {
        $data = [];
        $query = "SELECT * FROM items";
        $sql = $this->conn->query($query);
        while ($row = $sql->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

     //  COUNT ITEMS ADDED TODAY (FOR STATS)
    public function countNewItemsToday() {
        $query = "SELECT COUNT(*) AS total FROM items WHERE DATE(created_at) = CURDATE()";
        $result = $this->conn->query($query)->fetch_assoc();
        return $result['total'];
    }

    //  COUNT TOTAL ITEMS FOR ONE USER
    public function countItemsByUser($user_id) {
        $query = "SELECT COUNT(*) AS total FROM items WHERE user_id = '$user_id'";
        $result = $this->conn->query($query)->fetch_assoc();
        return $result['total'];
    }

    //  GET DAILY ITEM COUNT (GRAPH CHART)
    public function getItemDates() {
        $query = "SELECT DATE(created_at) AS d, COUNT(*) AS c 
                FROM items GROUP BY DATE(created_at)";
        $result = $this->conn->query($query);

        $data = [];
        while ($r = $result->fetch_assoc()) {
            $data[$r['d']] = $r['c'];
        }
        return $data;
    }

}
?>