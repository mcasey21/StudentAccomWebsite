<?php
require_once "ca_db_setup.php";

if (!isset($_GET['id'])) {
    echo "Error: No room ID provided.";
    exit;
}

$id = $conn->real_escape_string($_GET['id']);
$sql = "SELECT * FROM roominfo WHERE Title= '$id'";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc())
        {
            echo '<a class="back-link" href="service.php">Go back ..</a>';
            echo "<img src='" . htmlspecialchars($row['Pic']) . "' alt='" . htmlspecialchars($row['Title']) . "' class='room-image'>";
            echo "<h2 class='room-title'>" . htmlspecialchars($row['Title']) . "</h2>";
            echo "<p class='room-price'>€" . htmlspecialchars($row['Price']) . " per month</p>";
        }
        } 
    else {
        echo "No rooms found.";
    }

    $conn->close();

?>