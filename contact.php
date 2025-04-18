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
  <link rel="stylesheet" href="contactStyle.css" />
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

    <div class="leftSection">
        <h1 class="contact-title">Contact Us</h1>
        <p class="contact-text">Feel free to use the form or drop us an email. <br> 
        Old-fashioned phone calls work too
        </p>
        <div class="contact-item">
            <img src="phoneiconpink.png" alt="">
            <p>484 324 2400</p>
        </div>
        <div class="contact-item">
            <img src="lettericonpink.png" alt="">
            <p>info@unistay.com</p>
        </div>
        <div class="contact-item">
            <img src="pinpointiconpink.png" alt="">
            <p>13 West 3rd St. <br> Dublin, Ireland</p>
        </div>
    </div>

    <div class="rightSection">
        <form>
            <label for="">Name</label><br>
            <input class="namebox" type="text" placeholder="First" required/>
            <input class="namebox" type="text" placeholder="Last" required/><br><br>
            <label for="">Email</label><br>
            <input type="email" placeholder="example@email.com" required/><br><br>
            <label for="">Phone (optional)</label><br>
            <input type="tel" placeholder="xxx-xxx-xxxx" /><br><br>
            <label for="">Message</label><br>
            <textarea placeholder="Type your message ..." required></textarea><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function toggleMenu() {
            document.getElementById("sideMenu").classList.toggle("open");
        }
    </script>
</body>
</html>