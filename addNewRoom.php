<?php
require_once "ca_db_setup.php";

// Insert data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $t = $_POST['title'];
    $p = $_POST['pic'];
    $d = $_POST['description'];
    $pr = $_POST['price'];

    // Check if the room already exists
    $check = $conn->prepare("SELECT * FROM roominfo WHERE Title = ?");
    $check->bind_param("s", $t);
    $check->execute();
    $res = $check->get_result();
    
    if ($res->num_rows == 0) {
        $query = "INSERT INTO roominfo (Title, Pic, Description, Price) VALUES ('$t', '$p', '$d', $pr)";
        $conn->query($query);
    }
    $check->close();

    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addNewRoomStyle.css" />
    <title>Add Room</title>
</head>
<body>
    <h1 class="title">Add a New Room</h1>
    <form action="addNewRoom.php" method="POST">
        <label for="title">Room Title:</label>
        <input type="text" id="title" name="title" placeholder="Room title" required><br>

        <label for="pic">Room Image (file name):</label>
        <input type="text" id="pic" name="pic" placeholder="Image file name" required><br>

        <label for="description">Room Description:</label>
        <textarea id="description" name="description" placeholder="Room description" required></textarea><br>

        <label for="price">Price per month (€):</label>
        <input type="number" id="price" name="price" placeholder="price per month" required><br><br>

        <input class="button" type="submit" value="Add Room">
    </form>
    <a class="back-link" href="admin.php">Go back</a>
</body>
</html>
