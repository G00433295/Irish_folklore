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
    <title>Mythical Creatures</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="creatures-page">

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-center">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="mythical-creatures.php" class="active">Mythical Creatures</a></li>
            <li><a href="legendary-tales.php">Legendary Tales</a></li>
            <li><a href="shop.php">Shop</a></li>
        </ul>
    </div>
    <a class="logout-btn" href="logout.php">Logout</a>
</nav>

<div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
</div>

<!-- CREATURES GALLERY -->
<div class="creatures-gallery">

    <div class="creature-item">
        <a href="banshee.php" class="creature-link">
            <img src="images/banshee.jpg" alt="Banshee">
            <div class="creature-text">
                <h3>Banshee</h3>
                </a>
                <p>A mythical spirit known for its wailing cries, often seen as an omen.</p>
            </div>
        
    </div>

    <div class="creature-item">
        <a href="dullahan.php" class="creature-link">
            <img src="images/dullahan.jpg" alt="Dullahan">
            <div class="creature-text">
                <h3>Dullahan</h3>
                </a>
                <p>A headless horseman from Irish folklore who carries his own head.</p>
            </div>
        
    </div>

    <div class="creature-item">
        <a href="leprechaun.php" class="creature-link">
            <img src="images/leprechaun.jpg" alt="Leprechaun">
            <div class="creature-text">
                <h3>Leprechaun</h3>
                </a>
                <p>A small Irish fairy known for hiding pots of gold at the end of rainbows.</p>
            </div>
        
    </div>

    <div class="creature-item">
        <a href="selkie.php" class="creature-link">
            <img src="images/selkie.png" alt="Selkie">
            <div class="creature-text">
                <h3>Selkie</h3>
                </a>
                <p>A magical seal creature that can shed its skin to become human.</p>
            </div>
        
    </div>

</div>

</body>
</html>
