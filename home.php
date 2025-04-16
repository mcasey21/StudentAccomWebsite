<?php
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homeStyle.css">
    <title>Home</title>
</head>
<body>

    <h1 class="unistay-title">Unistay Accommodation</h1>
    <p class="unistay-subtitle">Premium Student Living</p>

    <?php 
        if ($username == "admin" && $password == "admin999")
        {
            echo "
            <ul class='nav'>
            <li><a class='navlinks' href='#'>Home</a></li>
            <li><a class='navlinks' href='#'>Service</a></li>
            <li><a class='navlinks' href='#'>About Us</a></li>              
            <li><a class='navlinks' href='#'>Contact</a></li>
            <li><a class='navlinks' href='#'>Admin</a></li>
            </ul> ";
        }
        else {
            echo "
            <ul class='nav'>
            <li><a class='navlinks' href='#'>Home</a></li>
            <li><a class='navlinks' href='#'>Service</a></li>
            <li><a class='navlinks' href='#'>About Us</a></li>              
            <li><a class='navlinks' href='#'>Contact</a></li>
            </ul> ";
        }
    ?>

    <div class="menu-toggle" onclick="toggleMenu()">
        <div class="button-line"></div>
        <div class="button-line"></div>
        <div class="button-line"></div>
    </div>
    
      
    <div class="side-menu" id="sideMenu">
        <h2>Menu</h2>
        <hr>
        <img class="sideMenuImg" src="personicon.png">
        <?php 
        if ($username): ?>
            <a class="sideMenuSection" href="edit.php?id=<?= urlencode($username) ?>">My Account</a>
        <?php endif; 
        ?>
        <hr>
    </div>

    <div class="container">
        <h1>Welcome to Unistay!</h1>
        <p>Experience premium student living designed for comfort, <br>
        convenience, and community. Whether you're here to study, <br>
        socialize, or simply unwind, our spaces are built to help <br> 
        you feel right at home from day one!</p>
    </div>
    
    <script>
        function toggleMenu() {
            document.getElementById("sideMenu").classList.toggle("open");
        }
    </script>
</body>
</html>