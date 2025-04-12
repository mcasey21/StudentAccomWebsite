<?php
$registerMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_user'])) {
    require_once "ca_db_setup.php"; // make sure this points to your DB config

    $u = $_POST['username'];
    $p = $_POST['password'];
    $e = $_POST['email'];
    $f = $_POST['fName'];
    $s = $_POST['sName'];

    $sql = "INSERT INTO userinfo (username, password, email, fName, sName)
            VALUES ('$u', '$p', '$e', '$f', '$s')";

    if ($conn->query($sql) === TRUE) {
        $registerMessage = "New record created successfully!";
    } else {
        $registerMessage = "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - Unistay</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h1>Register New User</h1>

    <form action="register.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>First Name:</label>
        <input type="text" name="fName" required><br><br>
        <label>Last Name:</label>
        <input type="text" name="sName" required><br><br>
        <input type="submit" name="submit_user" value="Add New">
    </form>

    <?php
        if (!empty($registerMessage)){
            echo "<p>$registerMessage</p>";
        }
    ?>
</body>
</html>
