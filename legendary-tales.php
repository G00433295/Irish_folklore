<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Legendary Tales</title>
    <link rel="stylesheet" href="css/creatures.css">
    <link rel="icon" type="image/png" href="images/favicon.webp">
</head>
<body class="creatures-page">

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

<!-- LEGENDARY TALES GALLERY -->
<div class="creatures-gallery">

    <div class="creature-item">
        <a href="fionn.php" class="creature-link">
            <img src="images/fionn.jpg" alt="Fionn mac Cumhaill">
            <div class="creature-text">
                <h3>Fionn mac Cumhaill</h3>
            </a>
            <p>Leader of the Fianna, a legendary warrior and hero of Irish myth.</p>
            </div>
    </div>

    <div class="creature-item">
        <a href="cuchulainn.php" class="creature-link">
            <img src="images/cu-chulainn.webp" alt="Cú Chulainn">
            <div class="creature-text">
                <h3>Cú Chulainn</h3>
            </a>
            <p>The great Ulster hero, famed for his strength and tragic fate.</p>
            </div>
    </div>

    <div class="creature-item">
        <a href="children-of-lir.php" class="creature-link">
            <img src="images/children-of-lir.webp" alt="The Children of Lir">
            <div class="creature-text">
                <h3>The Children of Lir</h3>
            </a>
            <p>Four children transformed into swans by their jealous stepmother.</p>
            </div>
    </div>

    <div class="creature-item">
        <a href="deirdre.php" class="creature-link">
            <img src="images/deirdre-of-the-sorrows.jpg" alt="Deirdre of the Sorrows">
            <div class="creature-text">
                <h3>Deirdre of the Sorrows</h3>
            </a>
            <p>A tragic heroine whose beauty and fate brought sorrow to all around her.</p>
            </div>
    </div>

</div>

</body>
</html>
