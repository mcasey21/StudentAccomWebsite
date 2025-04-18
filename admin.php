<?php
    session_start();
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact | Unistay</title>
  <link rel="stylesheet" href="adminStyle.css" />
</head>
<body>

    <h1 class="unistay-title">Unistay Accommodation</h1>
    <p class="unistay-subtitle">Premium Student Living</p>

    <?php 
        if ($username == "admin" && $password == "admin999")
        {
            echo "
            <ul class='nav'>
            <li><a class='navlinks' href='home.php'>Home</a></li>
            <li><a class='navlinks' href='service.php'>Rooms</a></li>
            <li><a class='navlinks' href='about.php'>About Us</a></li>              
            <li><a class='navlinks' href='contact.php'>Contact</a></li>
            <li><a class='navlinks' href='admin.php'>Admin</a></li>
            </ul> ";
        }
        else {
            echo "
            <ul class='nav'>
            <li><a class='navlinks' href='home.php'>Home</a></li>
            <li><a class='navlinks' href='service.php'>Rooms</a></li>
            <li><a class='navlinks' href='about.php'>About Us</a></li>              
            <li><a class='navlinks' href='contact.php'>Contact</a></li>
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

    <div class="button-container">
        <a href="addNewRoom.php">Add new room</a>
        <a href="editRooms.php">Room Database</a>
        <a href="checkDb.php">User Database</a>
    </div>
    

    <script>
        function toggleMenu() {
            document.getElementById("sideMenu").classList.toggle("open");
        }
    </script>
</body>
</html>