<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/* ----------------------------
   SINGLE-FILE "CHILD" HANDLER
   (fetch posts to shop.php)
---------------------------- */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
    header("Content-Type: application/json");

    $action = $_POST["action"];

    if ($action === "get") {
        echo json_encode(["status" => "ok", "cart" => $_SESSION["cart"]]);
        exit();
    }

    if ($action === "add") {
        $name  = trim($_POST["name"] ?? "");
        $price = (float)($_POST["price"] ?? 0);
        $size  = trim($_POST["size"] ?? "");

        if ($name === "" || $price <= 0) {
            echo json_encode(["status" => "error", "message" => "Invalid item"]);
            exit();
        }

        $key = $name . "|" . $size;

        if (!isset($_SESSION["cart"][$key])) {
            $_SESSION["cart"][$key] = [
                "name" => $name,
                "price" => $price,
                "size" => $size,
                "qty" => 1
            ];
        } else {
            $_SESSION["cart"][$key]["qty"]++;
        }

        echo json_encode(["status" => "ok", "cart" => $_SESSION["cart"]]);
        exit();
    }

    if ($action === "remove") {
        $key = $_POST["key"] ?? "";
        if (isset($_SESSION["cart"][$key])) {
            unset($_SESSION["cart"][$key]);
        }

        echo json_encode(["status" => "ok", "cart" => $_SESSION["cart"]]);
        exit();
    }

    echo json_encode(["status" => "error", "message" => "Unknown action"]);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" href="css/shop.css">
    <link rel="icon" type="image/png" href="images/favicon.webp">
</head>
<body class="shop-page">

<!-- NAVBAR -->
<nav class="navbar">
    <div class="nav-center">
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="mythical-creatures.php">Mythical Creatures</a></li>
            <li><a href="legendary-tales.php">Legendary Tales</a></li>
            <li><a href="shop.php" class="active">Shop</a></li>
        </ul>
    </div>
    <a class="logout-btn" href="logout.php">Logout</a>
</nav>

<div class="shop-container">

    <!-- SHOP ITEMS -->
    <div class="shop-items">
        <div class="shop-heading">
            <h1>Shop Irish Folklore Items</h1>
        </div>

        <div class="shop-item">
            <img src="images/celtic-hoodie.webp" alt="Celtic Hoodie">
            <h3>Celtic Hoodie</h3>
            <p>€25</p>
            <label>Size:</label>
            <select class="item-size">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>XL</option>
            </select>
            <button class="add-to-basket" type="button">Add to Basket</button>
        </div>

        <div class="shop-item">
            <img src="images/irish-tshirt.png" alt="Irish Folklore T-shirt">
            <h3>Irish Folklore T-shirt</h3>
            <p>€15</p>
            <label>Size:</label>
            <select class="item-size">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>XL</option>
            </select>
            <button class="add-to-basket" type="button">Add to Basket</button>
        </div>

        <div class="shop-item">
            <img src="images/irish-book.png" alt="Irish Mythology Book">
            <h3>Irish Mythology Book</h3>
            <p>€10</p>
            <button class="add-to-basket" type="button">Add to Basket</button>
        </div>

        <div class="shop-item">
            <img src="images/celtic-bracelet.jpg" alt="Celtic Knot Bracelet">
            <h3>Celtic Knot Bracelet</h3>
            <p>€5</p>
            <button class="add-to-basket" type="button">Add to Basket</button>
        </div>
    </div>

  <div class="basket">
    <h2>Your Basket</h2>
    <ul id="basket-items"></ul>

    <p id="basket-total"><strong>Total: €0.00</strong></p>

    <!-- Checkout button -->
    <button id="checkout-btn" type="button">Checkout</button>
</div>

</div>

<!-- ✅ External JS file -->
<script src="js/shop.js" defer></script>

</body>
</html>
