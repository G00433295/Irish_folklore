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
    <title>The Banshee – Irish Folklore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="banshee-page">

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
 
<div class="hero">
    <img src="images/banshee-forest.jpg" alt="Banshee Illustration" class="hero-image">
    <div class="hero-text">
        </div>
        <div>
        <h1>The Banshee</h1>
        <p>A haunting spirit from the depths of Irish folklore</p>
    </div>
</div>


<!-- CONTENT SECTIONS -->
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
</div>

<div class="content-section">
    <h2>Introduction</h2>
    <p>
        The Banshee (Irish: <em>bean sí</em>) is a mythical spirit whose wail foretells death. 
        Traditionally, she is described as a solitary figure, often seen near the homes of families with deep Irish roots. 
        Her mournful cries, known as the <em>caoineadh</em> or keen, are said to be a warning to loved ones of an impending passing. 
        While frightening, the Banshee is not malevolent; she acts as a supernatural messenger, honoring the deceased and guiding souls to the afterlife. 
        Folklore also suggests she may appear in different forms, sometimes as a young maiden, other times as an old hag, reflecting the varying tales passed down through generations.
    </p>
    <img src="images/banshee-art.jpg" alt="Banshee Illustration">
</div>

<div class="content-section">
    <h2>Origins</h2>
    <p>
        The Banshee is deeply rooted in ancient Irish and Gaelic tradition. She was believed to watch over noble families, mourning each death that occurred within their lineage. 
        Some legends trace her ancestry back to fairy women or spirits of the Otherworld, connecting her to Ireland’s mystical and pre-Christian past. 
        Over time, the Banshee became a symbol of family loyalty and the thin veil between life and death.
    </p>
</div>

<div class="content-section">
    <h2>Appearance</h2>
    <p>
        Stories of the Banshee describe her in various ways. Some portray her as a beautiful young woman, draped in flowing robes with long hair cascading down her back. 
        Others depict her as a terrifying old hag with wrinkled skin and eyes red from eternal weeping. 
        Regardless of form, she is always otherworldly, appearing suddenly to deliver her mournful cry.
    </p>

    <ul>
        <li>Pale woman with silver hair</li>
        <li>Grey or white cloak</li>
        <li>Sometimes young, sometimes old</li>
        <li>Red eyes from weeping</li>
    </ul>

    <img src="images/banshee-woman.jpg" alt="Banshee Depiction">
</div>

<div class="content-section">
    <h2>The Keen</h2>
    <p>
        The Banshee's wail, called the <em>caoineadh</em>, is said to be chilling beyond measure. 
        It can be heard echoing through valleys, forests, and riversides. In some accounts, families would recognize a particular Banshee’s cry as belonging to their lineage. 
        Although the sound is a harbinger of death, she does not bring it herself; she simply warns of what is to come. 
        In folklore, ignoring her cry was considered unwise, as it might bring misfortune or sorrow to the family.
    </p>
</div>

<div class="content-section">
    <h2>Associated Families</h2>
    <p>
        Folklore suggests that Banshees are attached to certain Irish families, particularly those with pure Gaelic bloodlines. 
        Surnames often begin with O’, Mc/Mac, or Ní. In many legends, each family has its own Banshee, dedicated to mourning its members. 
        Famous surnames associated with the Banshee include:
    </p>
    <ul>
        <li>O’Connor</li>
        <li>O’Neill</li>
        <li>O’Brien</li>
        <li>MacMurrough</li>
        <li>MacCarthy</li>
    </ul>
</div>

<div class="content-section">
    <h2>Modern Culture</h2>
    <p>
        Today, the Banshee continues to fascinate writers, filmmakers, and gamers. She appears in movies, television series, books, and even video games, often symbolizing foreboding or tragedy. 
        Contemporary interpretations sometimes reimagine her as a tragic figure rather than a fearsome omen, emphasizing the emotional depth and mystique of Irish folklore. 
        Despite modern adaptations, the Banshee remains a powerful emblem of Ireland’s rich mythological heritage.
    </p>
</div>

</body>
</html>
