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
    <title>Fionn mac Cumhaill – Irish Folklore</title>
    <link rel="stylesheet" href="style.css">
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
    <img src="images/fionn-hero.jpg" alt="Fionn mac Cumhaill Illustration" class="hero-image">
    </div>
    <div class="hero-text">
        <h1>Fionn mac Cumhaill</h1>
        <p>Legendary warrior and leader of the Fianna</p>
    
</div>

<!-- CONTENT SECTIONS -->
<div class="content-section">
    <h2>Introduction</h2>
    <p>
        Fionn mac Cumhaill is one of the most celebrated heroes in Irish mythology. 
        Renowned for his courage, wisdom, and leadership, Fionn leads the legendary band of warriors known as the Fianna. 
        Tales of his exploits and adventures have been passed down through generations, showcasing his cunning, strength, and supernatural insight.
    </p>
</div>

<div class="content-section">
    <h2>Origins</h2>
    <p>
        Fionn is said to be the son of Cumhal, leader of the Fianna, and Muirne, a noblewoman. 
        He grew up under the guidance of the druid **Finn Eces**, who trained him in wisdom and magic. 
        His early life was marked by trials, including the famous story where he gains his extraordinary knowledge by tasting the magical Salmon of Knowledge.
    </p>
</div>

<div class="content-section">
    <h2>Salmon of Knowledge</h2>
    <p>
        One of Fionn’s most famous tales involves the Salmon of Knowledge, a mystical fish that contains all the world’s wisdom. 
        While cooking the salmon for his master, Fionn accidentally tastes it and gains profound insight. 
        From that moment on, he becomes Ireland’s most knowledgeable warrior and problem-solver, using his wisdom to protect his people.
    </p>
    <img src="images/fionn-salmon.jpg" alt="Fionn and the Salmon of Knowledge">
</div>

<div class="content-section">
    <h2>Leadership of the Fianna</h2>
    <p>
        Fionn eventually becomes the leader of the Fianna, a band of elite warriors who protect Ireland from threats and uphold justice. 
        Under his guidance, the Fianna embark on daring adventures, battling mythical creatures, rival clans, and supernatural beings.
    </p>
</div>

<div class="content-section">
    <h2>Legacy</h2>
    <p>
        Fionn mac Cumhaill’s stories have inspired countless retellings in literature, music, and modern media. 
        He symbolizes bravery, intelligence, and the eternal pursuit of justice. 
        His legend remains a cornerstone of Irish cultural heritage, embodying the spirit of heroism and wisdom.
    </p>
</div>

</body>
</html>
