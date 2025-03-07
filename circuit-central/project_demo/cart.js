// Function to add items to cart


document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("cart-items")) {
        loadCart(); // If on cart page, load cart items
    }
});
function addToCart(name, price, image) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let item = cart.find(item => item.name === name);

    if (item) {
        item.quantity += 1;
    } else {
        cart.push({ name, price, image, quantity: 1 });
    }

    localStorage.setItem("cart", JSON.stringify(cart));
    alert("Item added to cart!");
}

// Function to load cart items in cart.html
// Function to load cart items from localStorage and display them
function loadCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartItemsContainer = document.getElementById("cart-items");
    let cartTotal = document.getElementById("cart-total");
    
    cartItemsContainer.innerHTML = cart.length ? "" : `<tr><td colspan="6">Your cart is empty</td></tr>`;
    let total = 0;

    cart.forEach((item, index) => {
        let row = `
            <tr>
                <td>${item.name}</td>
                <td><img src="${item.image}" width="80"></td>
                <td>R${item.price.toFixed(2)}</td>
                <td><input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)"></td>
                <td>R${(item.price * item.quantity).toFixed(2)}</td>
                <td><button onclick="removeItem(${index})">❌</button></td>
            </tr>
        `;
        cartItemsContainer.innerHTML += row;
        total += item.price * item.quantity;
    });

    cartTotal.textContent = total.toFixed(2); // Update total price
    localStorage.setItem("cart", JSON.stringify(cart)); // Update localStorage
}


// Function to update quantity
function updateQuantity(index, newQuantity) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart[index].quantity = Math.max(1, parseInt(newQuantity) || 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart();
}

// Function to remove an item
function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart();
}

// Function to clear cart (for checkout)
function checkout() {
    localStorage.removeItem("cart");
    alert("Thank you for your purchase!");
    window.location.href = "payment.html";
}
