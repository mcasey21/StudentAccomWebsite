<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "ca_db_setup.php"; // Database connection

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM userinfo WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        // Login successful
        header("Location: home.html");
        exit();
    } else {
        // Login failed
        echo "<p style='color: red; font-family: Arial;'>Invalid username or password.</p>";
        echo "<a href='index.html'>Go back to login</a>";
    }

    $conn->close();
}
?>
