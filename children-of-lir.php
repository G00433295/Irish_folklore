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
    <title>The Children of Lir – Irish Folklore</title>
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
    <img src="images/children-of-lir-hero.png" alt="Children of Lir Illustration" class="hero-image">
    </div>
    <div class="hero-text">
        <h1>The Children of Lir</h1>
        <p>A timeless tale of love, transformation, and endurance</p>
    
</div>

<!-- CONTENT SECTIONS -->
<div class="content-section">
    <h2>Introduction</h2>
    <p>
        The Children of Lir is one of the most famous Irish legends, telling the story of Lir’s four children who were transformed into swans by their jealous stepmother. 
        The tale speaks of patience, loyalty, and the enduring power of love, capturing the imagination of generations.
    </p>
</div>

<div class="content-section">
    <h2>The Curse</h2>
    <p>
        After Lir’s wife died, his children were cared for by their stepmother, Aoife, who became jealous of the attention they received. 
        Driven by envy, Aoife cast a spell on the children, turning them into swans and condemning them to spend 900 years on lakes and rivers across Ireland.
    </p>
    <img src="images/children-of-lir-curse.jpg" alt="The Children of Lir as Swans">
</div>

<div class="content-section">
    <h2>Life as Swans</h2>
    <p>
        During their long years as swans, the children retained their human voices and memories. 
        They endured hardships, yet their bond as siblings remained unbroken. 
        Their sorrowful existence became a symbol of patience, resilience, and hope for eventual liberation.
    </p>
</div>

<div class="content-section">
    <h2>Resolution</h2>
    <p>
        After 900 years, the children were finally freed from the curse by the arrival of Christianity in Ireland. 
        They transformed back into humans but were old and near death, passing away peacefully after a life marked by loyalty and endurance. 
        The story continues to be celebrated as a classic example of Irish mythology’s blend of magic, tragedy, and morality.
    </p>
</div>

</body>
</html>
