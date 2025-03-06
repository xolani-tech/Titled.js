<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Circuit Central</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section id="header">
        <h1 style="display: inline; margin-left: 10px;">Circuit Central</h1>
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a href="Shop.html">Shop</a></li>
                <li><a href="Promos.html">Promos</a></li>
                <li><a href="PC's & Laptops.html">PC's & Laptops</a></li>
                <li><a href="My Account.html">My Account</a></li>
                <li><a href="cart.html"><i class="far fa-shopping-bag"></i></a></li>
            </ul>
        </div>
    </section>

    <section id="cart">
        <h2>Your Cart</h2>
        <div id="cart-items">
            <!-- Cart items will be dynamically loaded here -->
        </div>
    </section>

    <script>
        fetch('backend/fetch_cart.php')
            .then(response => response.json())
            .then(data => {
                const cartContainer = document.getElementById('cart-items');
                cartContainer.innerHTML = ''; // Clear existing content

                data.forEach(item => {
                    const cartItemHTML = `
                        <div class="cart-item">
                            <h3>${item.Name}</h3>
                            <p>Price: ${item.Price}</p>
                            <p>Quantity: ${item.quantity}</p>
                        </div>
                    `;
                    cartContainer.insertAdjacentHTML('beforeend', cartItemHTML);
                });
            })
            .catch(error => console.error('Error fetching cart items:', error));
    </script>
</body>
</html>