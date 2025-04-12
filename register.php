<?php
$registerMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_user'])) {
    require_once "ca_db_setup.php";

    $u = $_POST['username'];
    $p = $_POST['password'];
    $e = $_POST['email'];
    $f = $_POST['fName'];
    $s = $_POST['sName'];

    $sql = "INSERT INTO userinfo (username, password, email, fName, sName)
            VALUES ('$u', '$p', '$e', '$f', '$s')";

    if ($conn->query($sql) === TRUE) {
        $registerMessage = "Resgistered succesfully!, return to login page";
    }
    else {
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
    <link rel="stylesheet" href="registerStyle.css">
</head>
<body>
    <div class="loginWrapper">
        <div class="title">Register</div>
        <form class="loginForm" action="register.php" method="post">
            <fieldset>
                <legend>Username</legend>
                <input type="text" name="username" required>
            </fieldset>
            <fieldset>
                <legend>Password</legend>
                <input type="password" name="password" required>
            </fieldset>
            <fieldset>
                <legend>Email</legend>
                <input type="email" name="email" required>
            </fieldset>
            <fieldset>
                <legend>First Name</legend>
                <input type="text" name="fName" required>
            </fieldset>
            <fieldset>
                <legend>Last Name</legend>
                <input type="text" name="sName" required>
            </fieldset>
            <input class="AddNewButton" type="submit" name="submit_user" value="Sign Up">
        </form>

        <?php
            if (!empty($registerMessage)) {
                echo "<div class='registerMessage'>$registerMessage</div>";
            }
        ?>
    </div>
</body>
</html>
