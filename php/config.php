<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "OnlineMusicStore";

    // Creating a connection
    $db = new mysqli($servername, $username, $password, $dbname);

    // Checking the connection
    if($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
    // Connection successful message
    // echo "<script>alert('Connected successfully!')</script>";
?>