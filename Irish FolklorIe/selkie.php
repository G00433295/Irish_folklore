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
    <title>The Selkie – Irish Folklore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="selkie-page">

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

<!-- HERO -->
<div class="hero" style="background: url('images/selkie-hero.jpg') center/cover no-repeat; height: 380px;">
    <div>
        <h1>The Selkie</h1>
        <p>The magical seal-being of Irish and Scottish folklore</p>
    </div>
</div>

<!-- CONTENT SECTIONS -->
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
</div>

<div class="content-section">
    <h2>Introduction</h2>
    <p>
        Selkies are mystical creatures that live as seals in the sea but can shed their skins to become human on land. 
        They are often depicted in tales of love and longing, as their human form allows them to interact with humans, but they always yearn for the ocean. 
        Selkie stories explore themes of freedom, love, and the tension between human desire and natural instinct.
    </p>
    <img src="images/selkie-art.jpg" alt="Selkie Illustration">
</div>

<div class="content-section">
    <h2>Origins</h2>
    <p>
        Selkies come from Irish, Scottish, and Faroese folklore, particularly from coastal regions where fishing and seal hunting were common. 
        The stories were passed down orally, often warning of the heartbreak that can occur if a selkie is trapped away from the sea.
    </p>
</div>

<div class="content-section">
    <h2>Appearance</h2>
    <ul>
        <li>Seal in the water, human on land</li>
        <li>Beautiful human appearance, often female</li>
        <li>Long flowing hair and enchanting eyes</li>
        <li>Always carries the seal skin to return to the sea</li>
    </ul>
    <img src="images/selkie-figure.jpg" alt="Selkie">
</div>

<div class="content-section">
    <h2>Role in Folklore</h2>
    <p>
        Selkies are often central in romantic or tragic tales. If a human hides their seal skin, the selkie may be forced to stay on land and marry, but they will always search for the skin to return to the sea. 
        These stories explore the themes of freedom, love, and loss.
    </p>
</div>

<div class="content-section">
    <h2>Modern Culture</h2>
    <p>
        Selkies have inspired numerous books, films, and art pieces, symbolizing the allure of the ocean, the mystery of the unknown, and the longing for home. 
        They continue to capture the imagination of folklore enthusiasts worldwide.
    </p>
</div>

</body>
</html>
