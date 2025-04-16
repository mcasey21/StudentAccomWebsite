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

    <ul class="nav">
        <li><a class="navlinks" href="#">Home</a></li>
        <li><a class="navlinks" href="#">Service</a></li>
        <li><a class="navlinks" href="#">About Us</a></li>              
        <li><a class="navlinks" href="#">Contact</a></li>
    </ul>

    
    <div class="menu-toggle" onclick="toggleMenu()">
        <div class="button-line"></div>
        <div class="button-line"></div>
        <div class="button-line"></div>
    </div>
    
      
    <div class="side-menu" id="sideMenu">
        <h2>Menu</h2>
        <hr>
        <img class="sideMenuImg" src="personicon.png">
        <a class="sideMenuSection" href="edit.php">My Account</a>
        <hr>
    </div>
    
    <script>
        function toggleMenu() {
            document.getElementById("sideMenu").classList.toggle("open");
        }
    </script>
</body>
</html>