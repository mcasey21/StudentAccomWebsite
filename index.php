<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "ca_db_setup.php"; // Database connection
    $loginError = "";

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM userinfo WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        // Login successful
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: home.php");
        exit();
    } 
    else {
        // Login failed
        $loginError = "Invalid username or password.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
    <title>Unistay Accomadation</title>
</head>
<body>
    <img src="loginPic.jpeg" width="600" height="700">
    <aside>

        <h1 class="unistay-title">Unistay Accommodation</h1>
        <p class="unistay-subtitle">Premium Student Living</p>
        
        <form class="loginForm" action="" method="post">
            <fieldset>
                <legend>Username</legend>
                <input type="text" name="username" required/>
            </fieldset>
            <fieldset>
                <legend>Password</legend>
                <input type="password" name="password" required/>
            </fieldset>
            <input type="submit" value="Login" class="LoginButton">
        </form>

        <?php if (!empty($loginError)): ?>
            <p class="loginErrText"><?= $loginError ?></p>
        <?php endif; ?>

        <div class="registerContainer">
            <a href="register.php" target="_blank">
                <input type="button" value="Register" class="RegisterButton">
            </a>
            <p>No account? Sign up here!</p>
        </div>

        <p class="socialsText">Or find us here</p>
        <a href="https://www.facebook.com/">
            <img class="fb" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/facebook/facebook-original.svg" width="20" height="20"></a>
        <a href="https://x.com/i/flow/login">
            <img class="x" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/twitter/twitter-original.svg" width="18" height="18"></a>
        <a href="https://www.linkedin.com/">
            <img class="lkin" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/linkedin/linkedin-original.svg" width="20" height="20"></a>
    </aside>
</body>
</html>

