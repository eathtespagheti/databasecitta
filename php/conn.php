<?php 
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $databaseName = "world";

    $conn = new mysqli($serverName, $userName, $password, $databaseName);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error); 
    }
?>