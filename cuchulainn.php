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
    <title>Cú Chulainn – Irish Folklore</title>
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
    <img src="images/cuchulainn-hero.webp" alt="Cú Chulainn Illustration" class="hero-image">
    </div>
    <div class="hero-text">
        <h1>Cú Chulainn</h1>
        <p>The legendary Irish warrior of unmatched skill and bravery</p>
    
</div>

<!-- CONTENT SECTIONS -->
<div class="content-section">
    <h2>Introduction</h2>
    <p>
        Cú Chulainn is one of the most famous heroes of Irish mythology, central to the Ulster Cycle of tales. 
        Known for his incredible combat skills, loyalty, and tragic destiny, he remains a symbol of bravery and heroism in Irish folklore.
    </p>
</div>

<div class="content-section">
    <h2>Early Life</h2>
    <p>
        Born as Sétanta, he earned the name Cú Chulainn (“Hound of Culann”) after slaying the fierce guard dog of the smith Culann in self-defense. 
        From a young age, he displayed extraordinary strength, agility, and a fiery temper that foreshadowed his future as a warrior.
    </p>
</div>

<div class="content-section">
    <h2>Heroic Feats</h2>
    <p>
        Cú Chulainn became renowned for his incredible feats in battle, including defending Ulster single-handedly during the epic Táin Bó Cúailnge (Cattle Raid of Cooley). 
        He wielded the deadly weapon Gáe Bolg and entered a frenzied state called the “ríastrad” or warp spasm, which made him nearly unstoppable.
    </p>
    <img src="images/cuchulainn-battle.jpg" alt="Cú Chulainn in Battle">
</div>

<div class="content-section">
    <h2>Tragic Fate</h2>
    <p>
        Despite his valor and prowess, Cú Chulainn’s life was marked by tragedy. Betrayal, curses, and inevitable death shaped his story, emphasizing the themes of heroism intertwined with mortality.
        His tale highlights the tension between glory and the human cost of warfare, leaving a lasting impression on Irish cultural memory.
    </p>
</div>

<div class="content-section">
    <h2>Legacy</h2>
    <p>
        Cú Chulainn’s legend has endured for centuries, inspiring literature, art, and modern adaptations in film and gaming. 
        He remains a timeless symbol of courage, skill, and the heroic spirit of ancient Ireland.
    </p>
</div>

</body>
</html>
