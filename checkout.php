<?php
    require_once "ca_db_setup.php";

    if (!isset($_GET['id'])) {
        echo "Error: No room ID provided.";
        exit;
    }

    $id = $conn->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM roominfo WHERE Title= '$id'";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="checkoutStyle.css" />
</head>
<body>

    <div class="room-container">

    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<a class="back-link" href="service.php">← Go back</a>';
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

    <form action="" method="post">
        <div class="option-group">
            <strong>Location:</strong><br>
            <label><input type="radio" name="location" value="Dublin" required> Dublin</label>
            <label><input type="radio" name="location" value="Cork"> Cork</label>
            <label><input type="radio" name="location" value="Limerick"> Limerick</label>
            <label><input type="radio" name="location" value="Sligo"> Sligo</label>
        </div>

        <div class="option-group">
            <strong>Duration:</strong><br>
            <label><input type="radio" name="duration" value="One Semester" required> One Semester</label>
            <label><input type="radio" name="duration" value="Two Semesters"> Two Semesters</label>
            <label><input type="radio" name="duration" value="Full Year"> Full Year</label>
        </div>

        <a href="payment.html" class="checkout-btn">Checkout</a>
    </form>

</div>

</body>
</html>
