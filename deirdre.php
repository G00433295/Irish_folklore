<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deirdre of the Sorrows – Irish Folklore</title>
    <link rel="stylesheet" href="css/creature-pages.css">
      <link rel="icon" type="image/png" href="images/favicon.webp">

</head>
<body class="banshee-page">

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-center">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="mythical-creatures.php">Mythical Creatures</a></li>
            <li><a href="legendary-tales.php" class="active">Legendary Tales</a></li>
            <li><a href="shop.php">Shop</a></li>
        </ul>
    </div>
    <a class="logout-btn" href="logout.php">Logout</a>
</nav>

<!-- HERO -->
<div class="hero">
    <img src="images/deirdre-hero.webp" alt="Deirdre Illustration" class="hero-image">
    </div>
    <div class="hero-text">
        <h1>Deirdre of the Sorrows</h1>
        <p>The tragic heroine of Irish legend</p>
    
</div>

<!-- CONTENT SECTIONS -->
<div class="content-section">
    <h2>Introduction</h2>
    <p>
        Deirdre of the Sorrows is one of the most famous tragic figures in Irish mythology. 
        Known for her extraordinary beauty and her ill-fated love story, Deirdre’s life is a tale of passion, prophecy, and sorrow. 
        Her story has been told and retold in countless forms, symbolizing love, loss, and the inexorable fate of destiny.
    </p>
</div>

<div class="content-section">
    <h2>Origins</h2>
    <p>
        Deirdre was born under a prophecy that she would bring great sorrow and bloodshed. 
        Fearing the consequences, King Conchobar mac Nessa planned to raise her as his own, intending to marry her when she grew older. 
        Despite this, fate had other plans, and her life became entwined with love, rebellion, and tragedy.
    </p>
</div>

<div class="content-section">
    <h2>Love and Tragedy</h2>
    <p>
        Deirdre fell in love with Naoise, a warrior of the Red Branch Knights, and they fled together to escape King Conchobar’s control. 
        Their exile lasted several years, but ultimately they were betrayed and forced to return. 
        Naoise and his brothers were killed, and Deirdre was brought back to the king, where her sorrowful life ended in heartbreak.
    </p>
    <img src="images/deirdre-love.jpg" alt="Deirdre and Naoise">
</div>

<div class="content-section">
    <h2>Legacy</h2>
    <p>
        Deirdre’s story has left an enduring mark on Irish literature and culture. 
        She represents beauty, passion, and the tragic consequences of fate. 
        Her legend continues to inspire poetry, theatre, and modern adaptations, symbolizing the power of love and the inevitability of sorrow.
    </p>
</div>

</body>
</html>
