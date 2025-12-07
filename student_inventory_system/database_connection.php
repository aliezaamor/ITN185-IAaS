<?php
    // Database connection properties
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "student_inventory"; 

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
