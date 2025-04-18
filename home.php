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
    <title>Home | Unistay</title>
</head>
<body>

    <div class="banner"></div>

    <h1 class="unistay-title">Unistay Accommodation</h1>
    <p class="unistay-subtitle">Premium Student Living</p>

    <?php 
        if ($username == "admin" && $password == "admin999")
        {
            echo "
            <ul class='nav'>
            <li><a class='navlinks' href='home.php'>Home</a></li>
            <li><a class='navlinks' href='#'>Service</a></li>
            <li><a class='navlinks' href='about.php'>About Us</a></li>              
            <li><a class='navlinks' href='contact.php'>Contact</a></li>
            <li><a class='navlinks' href='#'>Admin</a></li>
            </ul> ";
        }
        else {
            echo "
            <ul class='nav'>
            <li><a class='navlinks' href='home.php'>Home</a></li>
            <li><a class='navlinks' href='#'>Service</a></li>
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

    <div class="side-container">
        <div class="left-box">
            <img class="quote" src="pinkquote.png" alt="">
            <p class="testimonial-text">
            Unistay made my uni life 10x easier.<br>
            Great vibes and comfy rooms!</p>
            <p class="testimonial-author">Sarah,<br>TU.Dublin</p>
            <hr class="testimonial-line">
            <p class="testimonial-text">
            Loved staying here during college.<br>
            Perfect rooms for a great price</p>
            <p class="testimonial-author">James,<br>Trinity</p>
        </div>
        <div class="offer-box">
            <div class="calendar-icon">📅</div>
            <h3 class="offer-title">Spring Special!</h3>
            <p class="offer-details">
            Book before <strong>April 30</strong><br>
            to get <strong>1 week FREE</strong>
            </p>
            <ul class="offer-perks">
            <li>• Free laundry tokens</li>
            <li>• €20 café voucher</li>
            </ul>
            <a href="#" class="offer-btn">Book Now</a>
        </div>
    </div>
    

    <div class="middle">
        <h1 class="main-text">Welcome to Unistay!</h1>
        <p class="sub-text">Experience premium student living designed for comfort, <br>
        convenience, and community. Whether you're here to <br>
        study socialize, or simply unwind, our spaces are built<br> 
        to help you feel right at home from day one!</p>
        <ul class="icons-list">
        <li>
            <div class="icon-container">
                <div class="ring"></div>
                <img class="image" src="coffeecupong.png" alt="Coffee Cup" onclick="window.open('coffeeshop.jpg', '_blank')">
            </div>
        </li>
        <li>
            <div class="icon-container">
                <div class="ring"></div>
                <img class="image" src="bedpng.png" alt="Bed" onclick="window.open('bedroom.jpg', '_blank')">
            </div>
        </li>
        <li>
            <div class="icon-container">
                <div class="ring"></div>
                <img class="image" src="hangerpng.png" alt="Hanger" onclick="window.open('washroom.jpg', '_blank')">
            </div>
        </li>
        <li>
            <div class="icon-container">
                <div class="ring"></div>
                <img class="image" src="bookpng.png" alt="Book" onclick="window.open('studyroom.png', '_blank')">
            </div>
        </li>
    </ul>
    <ul class="textlist">
        <li class="icontext">Coffee</li>
        <li class="icontext">Bedroom</li>
        <li class="icontext">Washroom</li>
        <li class="icontext">Study room</li>
    </ul>
    <a href="#"><button class="bookbutton">Book Now</button></a>
    </div>

    
    <script>
        function toggleMenu() {
            document.getElementById("sideMenu").classList.toggle("open");
        }
    </script>
</body>
</html>