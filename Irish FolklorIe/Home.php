<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="home-page">

<nav class="navbar">
    <div class="nav-center">
        <ul>
            <li><a href="Home.php" class="active">Home</a></li>
            <li><a href="mythical-creatures.php">Mythical Creatures</a></li>
            <li><a href="legendary-tales.php">Legendary Tales</a></li>
            <li><a href="shop.php">Shop</a></li>
        </ul>
    </div>

    <!-- Logout on the right -->
    <a class="logout-btn" href="logout.php">Logout</a>
</nav>

<div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    
    <section class="intro">
        <p>Explore the rich world of <strong>Irish Folklore</strong>! Discover enchanting myths, legendary tales, and the magical creatures that have been passed down through generations.</p>
    </section>

    <section class="highlights">
        <h2>Featured Sections</h2>
        <ul>
            <li><a href="mythical-creatures.php">Mythical Creatures</a> – From fairies and leprechauns to dragons and banshees.</li>
            <li><a href="legendary-tales.php">Legendary Tales</a> – Epic stories of heroes, gods, and ancient Ireland.</li>
            <li><a href="shop.php">Shop</a> – Irish folklore-themed books, gifts, and collectibles.</li>
        </ul>
    </section>

    <section class="newsletter">
        <p>Sign up for our newsletter to get the latest stories and folklore updates delivered to your inbox!</p>
        <form action="#" method="post">
            <input type="email" name="email" placeholder="Enter your email">
            <button type="submit">Subscribe</button>
        </form>
    </section>
</div>

</body>
</html>





