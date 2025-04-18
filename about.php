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
  <title>About Us | Unistay</title>
  <link rel="stylesheet" href="aboutStyle.css" />
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

  <div class="header">
    <h1>About Us</h1>
    <p>Where Student Life Meets Comfort & Community.</p>
  </div>

  <div class="mission-section">
    <img src="teampic.jpg" alt="team picture" />
    <div class="mission-text">
      <h2>Our Mission</h2>
      <p>
        At Unistay, we believe that your accommodation should feel like a second home.
        We've designed our living spaces with students in mind combining comfort,
        convenience, and a touch of style. Whether you're focused on studying, 
        socializing, or simply enjoying downtime, Unistay gives you the space to thrive.
      </p>
    </div>
  </div>

  <div class="team-section">
    <h2>Meet the Team</h2>
    <div class="team-members">
      <div class="team-member">
        <h3>Nicola - Ops Lead</h3>
        <p>Keeps Unistay running smooth like butter. She's the one making sure everything works perfectly behind the scenes.</p>
      </div>
      <div class="team-member">
        <h3>Mark - Student Support</h3>
        <p>From check-in to check-out, Mark is your guy. Need help? He's always just a knock or message away.</p>
      </div>
      <div class="team-member">
        <h3>Stephanie - Design Boss</h3>
        <p>She's the mastermind behind the chill, cozy vibes. Leah makes sure every space feels just right.</p>
      </div>
    </div>
  </div>

  <script>
        function toggleMenu() {
            document.getElementById("sideMenu").classList.toggle("open");
        }
    </script>

</body>
</html>
