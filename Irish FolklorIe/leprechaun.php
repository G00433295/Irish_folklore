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
    <title>The Leprechaun – Irish Folklore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="leprechaun-page">

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
<div class="hero" style="background: url('images/leprechaun-hero.jpg') center/cover no-repeat; height: 380px;">
    <div>
        <h1>The Leprechaun</h1>
        <p>The mischievous fairy of Irish folklore</p>
    </div>
</div>

<!-- CONTENT SECTIONS -->
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
</div>

<div class="content-section">
    <h2>Introduction</h2>
    <p>
        Leprechauns are small, magical beings in Irish folklore, famous for their trickery and love of gold. 
        Often depicted wearing green coats and hats, they are solitary creatures who guard hidden pots of gold at the end of rainbows. 
        Though mischievous, they are not malevolent; capturing one can lead to a wish or reveal hidden treasure—but only if you are clever enough to outwit them.
    </p>
    <img src="images/leprechaun-art.jpg" alt="Leprechaun Illustration">
</div>

<div class="content-section">
    <h2>Origins</h2>
    <p>
        Leprechauns come from ancient Irish mythology, with stories tracing back to the Tuatha Dé Danann, the magical people of Ireland. 
        These fairy cobblers were said to craft shoes for other fairies and were always associated with gold and cleverness.
    </p>
</div>

<div class="content-section">
    <h2>Appearance</h2>
    <ul>
        <li>Small stature, usually under 3 feet tall</li>
        <li>Wears green or red clothing</li>
        <li>Often has a beard and pointed hat</li>
        <li>Carries a hidden pot of gold</li>
    </ul>
    <img src="images/leprechaun-figure.jpg" alt="Leprechaun">
</div>

<div class="content-section">
    <h2>Role in Folklore</h2>
    <p>
        Leprechauns are tricksters who enjoy playing pranks on humans. Legends say that if you capture a leprechaun, he must grant you three wishes in exchange for his freedom—but he will try to deceive you. 
        They are also known for their shoemaking skills, which is their primary occupation in fairy society.
    </p>
</div>

<div class="content-section">
    <h2>Modern Culture</h2>
    <p>
        Leprechauns remain popular in Irish culture and worldwide, appearing in films, cartoons, and holiday decorations for St. Patrick’s Day. 
        They embody both the humor and the mystical charm of Ireland’s folklore.
    </p>
</div>

</body>
</html>
