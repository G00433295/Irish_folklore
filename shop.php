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
    <title>Shop</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* SHOP PAGE STYLING */
        .shop-container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .shop-items {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            flex: 3;
        }

        .shop-items h1 {
            grid-column: 1 / -1;
            text-align: center;
            margin-bottom: 20px;
        }

        .shop-item {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }

        .shop-item img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .basket {
            flex: 1;
            background: #d4edda; /* Green background */
            padding: 15px;
            border-radius: 10px;
            max-width: 250px;
            height: fit-content;
        }

        .basket ul {
            list-style: none;
            padding: 0;
        }

        .basket li {
            margin-bottom: 10px;
        }

        .remove-item {
            margin-left: 5px;
            background: #cc0000;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            padding: 2px 6px;
        }

        .remove-item:hover {
            background: #ff0000;
        }

        #basket-total {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
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
        <h1>Shop Irish Folklore Items</h1>

        <!-- Item 1: Celtic Hoodie -->
        <div class="shop-item">
            <img src="images/celtic-hoodie.webp" alt="Celtic Hoodie">
            <h3>Celtic Hoodie</h3>
            <p>€25</p>
            <label for="hoodie-size">Size:</label>
            <select id="hoodie-size" class="item-size">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>XL</option>
            </select>
            <button class="add-to-basket">Add to Basket</button>
        </div>

        <!-- Item 2: Irish Folklore T-shirt -->
        <div class="shop-item">
            <img src="images/irish-tshirt.png" alt="Irish Folklore T-shirt">
            <h3>Irish Folklore T-shirt</h3>
            <p>€15</p>
            <label for="tshirt-size">Size:</label>
            <select id="tshirt-size" class="item-size">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>XL</option>
            </select>
            <button class="add-to-basket">Add to Basket</button>
        </div>

        <!-- Item 3: Irish Mythology Book -->
        <div class="shop-item">
            <img src="images/irish-book.png" alt="Irish Mythology Book">
            <h3>Irish Mythology Book</h3>
            <p>€10</p>
            <button class="add-to-basket">Add to Basket</button>
        </div>

        <!-- Item 4: Celtic Knot Bracelet -->
        <div class="shop-item">
            <img src="images/celtic-bracelet.jpg" alt="Celtic Knot Bracelet">
            <h3>Celtic Knot Bracelet</h3>
            <p>€5</p>
            <button class="add-to-basket">Add to Basket</button>
        </div>

    </div>

    <!-- BASKET -->
    <div class="basket">
        <h2>Your Basket</h2>
        <ul id="basket-items">
            <!-- Items will appear here -->
        </ul>
        <p id="basket-total"><strong>Total: €0.00</strong></p>
    </div>

</div>

<!-- JavaScript to handle basket -->
<script>
const addButtons = document.querySelectorAll('.add-to-basket');
const basketList = document.getElementById('basket-items');
const basketTotal = document.getElementById('basket-total');
let basket = {}; // store items and quantities

addButtons.forEach(button => {
    button.addEventListener('click', () => {
        const itemDiv = button.parentElement;
        let itemName = itemDiv.querySelector('h3').innerText;
        const price = parseFloat(itemDiv.querySelector('p').innerText.replace('€',''));
        const sizeSelect = itemDiv.querySelector('.item-size');
        if(sizeSelect) {
            itemName += ` (Size: ${sizeSelect.value})`;
        }

        if(basket[itemName]){
            basket[itemName].quantity += 1;
            basket[itemName].totalPrice = basket[itemName].quantity * basket[itemName].unitPrice;
            updateBasketItem(itemName);
        } else {
            basket[itemName] = {
                quantity: 1,
                unitPrice: price,
                totalPrice: price
            };
            createBasketItem(itemName);
        }
        updateBasketTotal();
    });
});

function createBasketItem(name){
    const li = document.createElement('li');
    li.id = encodeURIComponent(name);
    li.innerHTML = `${name} [${basket[name].quantity}] - €${basket[name].totalPrice.toFixed(2)}
                    <button class="remove-item">Remove</button>`;
    basketList.appendChild(li);

    li.querySelector('.remove-item').addEventListener('click', () => {
        delete basket[name];
        li.remove();
        updateBasketTotal();
    });
}

function updateBasketItem(name){
    const li = document.getElementById(encodeURIComponent(name));
    if(li){
        li.innerHTML = `${name} [${basket[name].quantity}] - €${basket[name].totalPrice.toFixed(2)}
                        <button class="remove-item">Remove</button>`;
        li.querySelector('.remove-item').addEventListener('click', () => {
            delete basket[name];
            li.remove();
            updateBasketTotal();
        });
    }
}

function updateBasketTotal(){
    let total = 0;
    for(const key in basket){
        total += basket[key].totalPrice;
    }
    basketTotal.innerHTML = `<strong>Total: €${total.toFixed(2)}</strong>`;
}
</script>

</body>
</html>
