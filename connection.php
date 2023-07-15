<?php
    // Variable initialization
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "snaap_inventory";

    // Creates connection
    $conn = new mysqli($serverName, $userName, $password, $dbName);

    // Checks connection
    if ($conn -> connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>