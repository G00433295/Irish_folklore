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
    <title>The Dullahan – Irish Folklore</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="dullahan-page">

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
<div class="dullahan-hero">
    <img src="images/dullahan-horse.jpg" alt="Dullahan Horse" style="
        width: 80%;       /* smaller than full width */
        max-width: 900px; /* optional max width */
        display: block;
        margin: 30px auto; /* center and add top/bottom spacing */
        border-radius: 10px; /* optional rounded corners */
    ">
</div>
   


</div>

<!-- CONTENT SECTIONS -->
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
</div>

<div class="content-section">
    <h2>Introduction</h2>
    <p>
        The Dullahan is a fearsome headless rider from Irish folklore, often seen riding a black horse at night. 
        He carries his own head under one arm, and his eyes are said to glow with an otherworldly light. 
        The Dullahan is associated with death, appearing as a harbinger to announce that someone is about to die. 
        Despite his terrifying appearance, the Dullahan is a messenger of fate rather than an evil spirit, carrying out the will of the supernatural forces of the Otherworld.
    </p>
    <img src="images/dullahan-art.jpg" alt="Dullahan Illustration" 
     style="width: 60%; display: block; margin: 15px auto; border-radius: 10px;">

</div>

<div class="content-section">
    <h2>Origins</h2>
    <p>
        Tales of the Dullahan date back to ancient Irish mythology and were part of oral storytelling traditions. 
        The word "Dullahan" may derive from Gaelic roots meaning "dark" or "unknown," emphasizing his mysterious and fearsome nature. 
        Legends describe him appearing on lonely roads or at the edges of towns, always unseen until he is dangerously close.
    </p>
</div>

<div class="content-section">
    <h2>Appearance</h2>

    <p>
        The Dullahan is instantly recognizable as a headless rider. He carries his head under his arm, often grinning or displaying a terrifying expression. 
        He is usually mounted on a black horse that gallops with supernatural speed. In some stories, he wields a whip made from a human spine, which he uses to strike fear into those who witness him.
    </p>

    <ul>
        <li>Headless rider holding his severed head</li>
        <li>Wields a whip made from a human spine</li>
        <li>Often dressed in black armor or cloak</li>
        <li>Rides a black horse with glowing eyes</li>
    </ul>
    <img src="images/dullahan-forest.webp" alt="Dullahan Riding">
</div>

<div class="content-section">
    <h2>The Warning</h2>
    <p>
        The Dullahan is said to appear at the door of someone who is about to die. If he calls a person’s name, that individual will soon pass away. 
        He is relentless and unstoppable, often riding at great speed to reach his destination. 
        Some legends say he cannot be stopped by mortal weapons, but he fears gold, which can repel him temporarily.
    </p>
</div>

<div class="content-section">
    <h2>Modern Depictions</h2>
    <p>
        Numerous Irish folktales describe encounters with the Dullahan. Witnesses report feeling an icy chill, hearing the thunder of his horse’s hooves, and seeing his horrifying visage before disappearing into the night. 
        His story serves as a cautionary tale, reminding people of the inevitability of death and the power of fate.
    </p>
</div>

</body>
</html>
