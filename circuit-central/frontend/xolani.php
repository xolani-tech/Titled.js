<?php

include '../backend/db_connection.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    <style>
    /* Basic styling for the admin dashboard */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        background-image: url('Images/Processed_Circuit.jpg');
    }
    .admin-dashboard {
        display: flex;
        width: 100%;
    }
    /* Sidebar styling */
    .sidebar {
        width: 250px;
        background: #333;
        color: white;
        padding: 20px;
        height: 255vh;
    }
    .sidebar h2 {
        text-align: center;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar ul li {
        padding: 10px;
        margin: 10px 0;
        background: #444;
        text-align: center;
    }
    .sidebar ul li a {
        color: white;
        text-decoration: none;
        display: block;
    }
    .sidebar ul li:hover {
        background: #555;
    }
    /* Content area styling */
    .content {
        flex: 1;
        padding: 20px;
    }
    .stats {
        display: flex;
        gap: 20px;
    }
    .card {
        background: white;
        padding: 20px;
        flex: 1;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }
    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background: #333;
        color: white;
    }
    .chart-container {
        width: 100%;
        margin-top: 20px;
    }
    /* Product management section */
    .product-management {
        margin-top: 20px;
    }
    .product-management input, .product-management select, .product-management button {
        display: block;
        margin: 10px 0;
        padding: 10px;
        width: 100%;
        padding-right: 0%;
    }
    /* styling for logo */
    .logo {
        width: 100px; /* Adjust size */
        height: auto; /* Maintain aspect ratio */
    }
</style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Circuit Central</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <div class="admin-dashboard">
        <!-- Sidebar Navigation -->
        <nav class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Trade-Ins</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="index.php">Go to Circuit Central</a></li>
            </ul>
        </nav>
        <!-- Main Content Area -->
        <main class="content">
            <img class="logo" src="img/logo.png" alt="">
            <h1>Admin Dashboard</h1>
            <h2>Circuit Central</h2>
            <!-- Statistics Cards -->
            <div class="stats">
                <div class="card">
                    <h3>Total Sales</h3>
                    <p id="total-sales">R0</p>
                </div>
                <div class="card">
                    <h3>Total Orders</h3>
                    <p id="total-orders">0</p>
                </div>
                <div class="card">
                    <h3>Pending Trade-Ins</h3>
                    <p id="pending-tradeins">0</p>
                </div>
            </div>
            <!-- Sales Chart -->
            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
            <!-- Recent Orders Table -->
            <h2>Recent Orders</h2>
            <table id="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                 <!-- Orders will be inserted here dynamically -->
             </tbody>
            </table>
            

    <!-- Product Management Section -->
<div class="product-management">
    <h2>Product Management</h2>
    <input type="file" id="product-image">
    <select id="product-category">
        <option value="DELL">DELL</option>
        <option value="HP">HP</option>
        <option value="LENOVO">LENOVO</option>
    </select>
    <input type="text" id="product-name" placeholder="Product Name">
    <input type="number" id="product-price" placeholder="Price">
    <input type="number" id="product-stock" placeholder="Stock Quantity">
    <button onclick="addProduct()">Add Product</button>
    
    <h3>Product Listings</h3>
    <table id="product-table">
        <thead>
            <tr>
                <th> Name</th>
                <th>Brand</th>
                <th>Processor </th>
                <th>Operating System</th>
                <th>Graphics</th>
                <th>Storage</th>
                <th>Ram</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <!-- Products will be dynamically inserted here -->
        </tbody>
    </table>
</div>

<script>
        // Function to fetch data from the API
        async function fetchData(table) {
            try {
                const response = await fetch(`../backend/api_fetch.php?table=${table}`);
                const data = await response.json();
                return data;
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        }

        // Function to display products in the table
        async function displayProducts() {
            const products = await fetchData('laptops'); // Fetch data from the 'laptops' table
            const tableBody = document.getElementById('product-table').getElementsByTagName('tbody')[0];

            // Clear existing rows
            tableBody.innerHTML = '';

            // Populate the table with fetched data
            products.forEach(product => {
                const row = tableBody.insertRow();
                row.innerHTML = `
                    <td>${product.Brand}</td>
                    <td>${product.Name}</td>
                    <td>R${product.Price}</td>
                    <td>${product.Stock}</td>
                    <td>
                        <button onclick="editProduct(this)">Edit</button>
                        <button onclick="removeProduct(this)">Remove</button>
                    </td>
                `;
            });
        }

        // Call the function to display products when the page loads
        displayProducts();

        // Function to add a new product
        function addProduct() {
            const image = document.getElementById("product-image");
            const category = document.getElementById("product-category");
            const name = document.getElementById("product-name");
            const price = document.getElementById("product-price");
            const stock = document.getElementById("product-stock");

            // Ensure all fields are filled
            if (!name.value || !price.value || !stock.value) {
                alert("Please fill in all fields.");
                return;
            }

            const table = document.getElementById("product-table").getElementsByTagName("tbody")[0];
            const newRow = table.insertRow();
            newRow.innerHTML = `
                <td>${category.value}</td>
                <td>${name.value}</td>
                <td>R${price.value}</td>
                <td>${stock.value}</td>
                <td>
                    <button onclick="editProduct(this)">Edit</button>
                    <button onclick="removeProduct(this)">Remove</button>
                </td>
            `;

            // Clear form fields after adding a product
            image.value = "";
            category.selectedIndex = 0; // Reset to the first option
            name.value = "";
            price.value = "";
            stock.value = "";
        }

        // Function to edit a product
        function editProduct(button) {
            const row = button.parentNode.parentNode;
            const name = prompt("Edit product name:", row.cells[1].innerText);
            const price = prompt("Edit product price:", row.cells[2].innerText);
            const stock = prompt("Edit stock quantity:", row.cells[3].innerText);

            if (name) row.cells[1].innerText = name;
            if (price) row.cells[2].innerText = price;
            if (stock) row.cells[3].innerText = stock;
        }

        // Function to remove a product
        function removeProduct(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        // Sales Chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Sales Trends',
                    data: [100, 200, 150, 300, 250],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>