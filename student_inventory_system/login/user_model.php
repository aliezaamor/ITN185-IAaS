<?php 
    Class user_Model{
 
         // Database connection properties
        private $server = "localhost";
        private $username = "root";
        private $password;
        private $db = "student_inventory";
        private $conn;
 
        // Automatically connect to database when the class is created
        public function __construct(){
            try {
                 
                $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
            } catch (Exception $e) {
                echo "connection failed" . $e->getMessage();
            }
        }
        
        // Insert new user
        public function insert(){

            if (isset($_POST['submit'])) {
                if (isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['address']) && isset($_POST['mobile_number']) && isset($_POST['user_password'])) {
                    if (!empty($_POST['user_name']) && !empty($_POST['user_email']) && !empty($_POST['address']) && !empty($_POST['mobile_number']) && !empty($_POST['user_password']) ) {
                         
                        $user_name = $_POST['user_name'];
                        $user_email = $_POST['user_email'];
                        $address = $_POST['address'];
                        $mobile_number = $_POST['mobile_number'];
                        $user_password = $_POST['user_password'];
        
                        // Check if the email is valid
                        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                            echo "<script>alert('Invalid email format');</script>";
                            echo "<script>window.location.href = 'user_add.php';</script>";
                            return; // Stop execution if email is invalid
                        }
        
                        // Check if the email already exists in the database
                        $check_query = "SELECT * FROM user_login WHERE user_email='$user_email'";
                        $result = $this->conn->query($check_query);
                        if ($result->num_rows > 0) {
                            echo "<script>alert('Email already exists');</script>";
                            echo "<script>window.location.href = 'user_add.php';</script>";
                            return; // Stop execution if email already exists
                        }

                        // Hash the password
                        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
        
                        // Proceed with insertion if email is valid and not already registered
                        $query = "INSERT INTO user_login (user_name,user_email,address,mobile_number,user_password) VALUES ('$user_name','$user_email','$address','$mobile_number','$hashed_password')";
                        if ($sql = $this->conn->query($query)) {
                            $_SESSION['user_name'] = $user_name;
                            $_SESSION['user_email'] = $user_email;
                            header("Location: registration_success.php");
                            exit();
                        } else {
                            echo "<script>alert('Failed to register');</script>";
                            echo "<script>window.location.href = 'user_add.php';</script>";
                        }
        
                    } else {
                        echo "<script>alert('Please fill all fields');</script>";
                        echo "<script>window.location.href = 'user_add.php';</script>";
                    }
                }
            }
        }
    
        // Fetch all users
        public function fetch(){
            $data = null;
 
            $query = "SELECT * FROM user_login";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
 
        // Fetch single user by email
        public function fetch_single($user_email){
            $data = null;
         
            $query = "SELECT * FROM user_login WHERE user_email = '$user_email'";
            if ($sql = $this->conn->query($query)) {
                if ($sql->num_rows > 0) {
                    $data = $sql->fetch_assoc();
                } else {
                    echo "No user found with email: $user_email";
                }
            } else {
                echo "Error executing query: " . $this->conn->error;
            }
            return $data;
        }
        
        
        // Edit user details
        public function edit($user_id){
 
            $data = null;
 
            $query = "SELECT * FROM user_login WHERE user_id = '$user_id'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                }
            }
            return $data;
        }
 
        // Update user details
        public function update($data){

            $query = "UPDATE user_login SET";
        
            // Check if user_name field is provided
            if (isset($data['user_name'])) {
                $query .= " user_name='{$data['user_name']}',";
            }
        
            // Check if user_email field is provided
            if (isset($data['user_email'])) {
                $query .= " user_email='{$data['user_email']}',";
            }
        
            // Check if address field is provided
            if (isset($data['address'])) {
                $query .= " address='{$data['address']}',";
            }
        
            // Check if mobile_number field is provided
            if (isset($data['mobile_number'])) {
                $query .= " mobile_number='{$data['mobile_number']}',";
            }
        
            // Check if user_password field is provided
            if (isset($data['user_password'])) {
                $query .= " user_password='{$data['user_password']}',";
            }
        
            // Remove the trailing comma from the query
            $query = rtrim($query, ',');
        
            $query .= " WHERE user_email='{$data['user_email']}'";
        
            if ($sql = $this->conn->query($query)) {
                return true;
            } else {
                return false;
            }
        }
        
        //update user password
       public function updatePassword($user_id, $new_password) {
            // Hash the raw new password
            $hashed = password_hash($new_password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("UPDATE user_login SET user_password = ? WHERE user_id = ?");
            $stmt->bind_param("si", $hashed, $user_id);

            return $stmt->execute();
        }

        // Authenticate user login
        public function authenticate($user_email, $user_password) {

            // Query user by email
            $query = "SELECT * FROM user_login WHERE user_email='$user_email'";
            $result = $this->conn->query($query);

            if ($result->num_rows == 1) {

                $user = $result->fetch_assoc();

                // Verify password
                if (password_verify($user_password, $user['user_password'])) {

                    // --- Set common session data ---
                    $_SESSION['user_id'] = $user['user_id'];
                    $_SESSION['user_name'] = $user['user_name'];
                    $_SESSION['user_email'] = $user['user_email'];

                    // --- Determine role ---
                    if ($user['user_email'] === 'admin@gmail.com') {
                        $_SESSION['role'] = 'admin';
                    } else {
                        $_SESSION['role'] = 'user';
                    }

                    return true;  // Login successful
                }

                return false; // Password incorrect
            }

            return false; // Email not found
        }

        // Count new users registered today
        public function countNewUsersToday() {
            $query = "SELECT COUNT(*) AS total FROM user_login WHERE DATE(created_at) = CURDATE()";
            $result = $this->conn->query($query)->fetch_assoc();
            return $result['total'];
        }

        // Get user registration dates and counts
        public function getUserDates() {
            $query = "SELECT DATE(created_at) AS d, COUNT(*) AS c 
                    FROM user_login GROUP BY DATE(created_at)";
            $result = $this->conn->query($query);

            $data = [];
            while ($r = $result->fetch_assoc()) {
                $data[$r['d']] = $r['c'];
            }
            return $data;
        }

        // Fetch user by ID
        public function fetchUserById($user_id) {
            $query = "SELECT * FROM user_login WHERE user_id = '$user_id'";
            $result = $this->conn->query($query);

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }
            return null;
        }

    }
 ?>