<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function cart_total($cart) {
    $total = 0;
    foreach ($cart as $item) {
        $qty = (int)($item['qty'] ?? 0);
        $price = (float)($item['price'] ?? 0);
        $total += $qty * $price;
    }
    return $total;
}

/* ----------------------------
   FETCH HANDLER (JSON)
---------------------------- */
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["action"])) {
    header("Content-Type: application/json");

    $action = $_POST["action"];

    if ($action === "get_cart") {
        $cart = $_SESSION["cart"] ?? [];
        echo json_encode([
            "status" => "ok",
            "cart" => $cart,
            "total" => cart_total($cart)
        ]);
        exit();
    }

    if ($action === "place_order") {
        $cart = $_SESSION["cart"] ?? [];
        $errors = [];

        $full_name = trim($_POST["full_name"] ?? "");
        $email     = trim($_POST["email"] ?? "");
        $address1  = trim($_POST["address1"] ?? "");
        $city      = trim($_POST["city"] ?? "");
        $eircode   = trim($_POST["eircode"] ?? "");

        $card_name = trim($_POST["card_name"] ?? "");

        // ✅ full card number (remove spaces)
        $card_number = preg_replace('/\s+/', '', $_POST["card_number"] ?? "");

        // Validation
        if ($full_name === "") $errors[] = "Full name is required.";
        if ($email === "") $errors[] = "Email is required.";
        if ($email !== "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email format is invalid.";
        if ($address1 === "") $errors[] = "Address is required.";
        if ($city === "") $errors[] = "City is required.";
        if ($eircode === "") $errors[] = "Eircode is required.";

        if ($card_name === "") $errors[] = "Name on card is required.";

        // ✅ full card validation
        if ($card_number === "") {
            $errors[] = "Card number is required.";
        } elseif (!ctype_digit($card_number)) {
            $errors[] = "Card number must contain only digits.";
        } elseif (strlen($card_number) !== 16) {
            $errors[] = "Card number must be exactly 16 digits.";
        }

        if (empty($cart)) $errors[] = "Your basket is empty.";

        if (!empty($errors)) {
            echo json_encode(["status" => "error", "errors" => $errors]);
            exit();
        }

        $total = cart_total($cart);

        // ✅ DO NOT store full card number — only last 4
        $_SESSION["checkout"] = [
            "full_name" => $full_name,
            "email" => $email,
            "address1" => $address1,
            "city" => $city,
            "eircode" => $eircode,
            "card_name" => $card_name,
            "card_last4" => substr($card_number, -4),
            "total" => $total,
            "placed_at" => date("Y-m-d H:i:s")
        ];

        $_SESSION["cart"] = [];

        echo json_encode([
            "status" => "ok",
            "message" => "Order placed successfully!",
            "total" => $total
        ]);
        exit();
    }

    echo json_encode(["status" => "error", "errors" => ["Unknown action."]]);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link rel="stylesheet" href="css/checkout.css">
    <link rel="icon" type="image/png" href="images/favicon.webp">
</head>
<body class="checkout-page">

<nav class="navbar">
  <div class="nav-center">
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="mythical-creatures.php">Mythical Creatures</a></li>
      <li><a href="legendary-tales.php">Legendary Tales</a></li>
      <li><a href="shop.php">Shop</a></li>
      <li><a href="checkout.php" class="active">Checkout</a></li>
    </ul>
  </div>
  <a class="logout-btn" href="logout.php">Logout</a>
</nav>

<div class="container" style="max-width: 900px; margin: 30px auto; padding: 20px;">
  <h1>Checkout</h1>

  <div id="checkout-messages"></div>

 <div class="checkout-basket">
  <h2>Your Basket</h2>
  <ul id="checkout-cart"></ul>

  <p><strong>Total: €<span id="checkout-total">0.00</span></strong></p>

  <p>
    <a href="shop.php" class="back-link">Back to Shop</a>
  </p>
</div>

    <div style="flex: 2; min-width: 320px; background:#ffffff; padding:15px; border-radius:10px;">
      <h2>Delivery & Payment</h2>

      <form id="checkout-form">
        <label>Full Name *</label><br>
        <input type="text" name="full_name" style="width:100%; padding:10px; margin:8px 0;"><br>

        <label>Email *</label><br>
        <input type="text" name="email" style="width:100%; padding:10px; margin:8px 0;"><br>

        <label>Address *</label><br>
        <input type="text" name="address1" style="width:100%; padding:10px; margin:8px 0;"><br>

        <label>City *</label><br>
        <input type="text" name="city" style="width:100%; padding:10px; margin:8px 0;"><br>

        <label>Eircode *</label><br>
        <input type="text" name="eircode" style="width:100%; padding:10px; margin:8px 0;"><br>

        <hr style="margin:15px 0;">

        <label>Name on Card *</label><br>
        <input type="text" name="card_name" style="width:100%; padding:10px; margin:8px 0;"><br>

        <label>Card Number *</label><br>
        <input
          type="text"
          name="card_number"
          inputmode="numeric"
          maxlength="19"
          placeholder="1234 5678 9012 3456"
          style="width:100%; padding:10px; margin:8px 0;"
        ><br>

        <button id="place-order-btn" type="submit"
          style="width:100%; padding:12px; background:#0d9e20; color:white; border:none; border-radius:6px; font-weight:bold; cursor:pointer;">
          Place Order
        </button>
      </form>
    </div>
  </div>
</div>

<script src="js/checkout.js" defer></script>
</body>
</html>
