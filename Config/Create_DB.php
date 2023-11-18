<?php 

    $serverName = 'localhost';
    $username = 'root';
    $password = '';

    // Connection to database 

    $conn_db = new mysqli($serverName , $username , $password);

    // Check Connection 

    if ($conn_db->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "CREATE DATABASE data_banque";

    if ($conn_db->query($sql) === TRUE) {
        echo "Create Data Base Succefully";
    }else {
        echo "Error creating database: " . $conn->error;
    }









?>