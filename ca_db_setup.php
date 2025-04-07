<?php
    // Variables, only these 4 needed
    $servername = "localhost";
    $username = "root";
    $pword = "";
    $dbname = "ca_db";

    // Create connection
    $conn = new mysqli($servername, $username, $pword, $dbname);

    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    // "Connection established <br>";
?>