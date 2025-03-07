<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Circuit Central</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Add your existing CSS styles here */
    </style>
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
                <li><a href="index.html">Go to Shop</a></li>
            </ul>
        </nav>
        <!-- Main Content Area -->
        <main class="content">
            <img class="logo" src="Images/logo.png" alt="">
            <h1>Admin Dashboard</h1>
            <h2>Circuit Central</h2>
            <!-- Product Management Section -->
            <div class="product-management">
                <h2>Product Management</h2>
                <input type="text" id="product-name" placeholder="Product Name">
                <input type="number" id="product-price" placeholder="Price">
                <input type="number" id="product-stock" placeholder="Stock">
                <select id="product-category">
                    <option value="Dell">Dell</option>
                    <option value="HP">HP</option>
                    <option value="Lenovo">Lenovo</option>
                </select>
                <select id="product-type">
                    <option value="laptop">Laptop</option>
                    <option value="desktop">Desktop</option>
                </select>
                <textarea id="product-description" placeholder="Product Description"></textarea>
                <input type="file" id="product-image">
                <button onclick="addProduct()">Add Product</button>
                <h3>Product Listings</h3>
                <label for="filter-type">Filter by Type:</label>
                <select id="filter-type">
                    <option value="all">All</option>
                    <option value="laptop">Laptops</option>
                    <option value="desktop">Desktops</option>
                </select>
                <table id="product-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Processor</th>
                            <th>Operating System</th>
                            <th>Graphics</th>
                            <th>RAM</th>
                            <th>Price</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Product data will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script>
        // Fetch product data from the PHP API
        fetch('http://localhost/php-lessons/project_demo/backend/laptops/read_laptops.php') // Adjust the path to your PHP API
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#laptop-table tbody');
                const filterType = document.getElementById('filter-type');

                // Function to render products based on filter
                const renderProducts = (type) => {
                    tableBody.innerHTML = ''; // Clear existing rows

                    data.forEach(laptop => {
                        if (type === 'all' || laptop.type === type) {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${laptop.name}</td>
                                <td>${laptop.brand}</td>
                                <td>${laptop.processor}</td>
                                <td>${laptop.os}</td>
                                <td>${laptop.graphics}</td>
                                <td>${laptop.ram}</td>
                                <td>$${laptop.price.toFixed(2)}</td>
                                <td>${laptop.type}</td>
                            `;
                            tableBody.appendChild(row);
                        }
                    });
                };

                // Initial render (show all products)
                renderProducts('all');

                // Add event listener to filter dropdown
                filterType.addEventListener('change', () => {
                    renderProducts(filterType.value);
                });
            })
            .catch(error => {
                console.error('Error fetching product data:', error);
            });

        // Function to add a new product (for demonstration purposes)
        function addProduct() {
            const name = document.getElementById("product-name").value;
            const price = document.getElementById("product-price").value;
            const stock = document.getElementById("product-stock").value;
            const category = document.getElementById("product-category").value;
            const type = document.getElementById("product-type").value;
            const description = document.getElementById("product-description").value;
            const image = document.getElementById("product-image").value;

            if (!name || !price || !stock || !category || !type) {
                alert("Please fill in all fields.");
                return;
            }

            const tableBody = document.querySelector('#product-table tbody');
            const newRow = tableBody.insertRow();
            newRow.innerHTML = `
                <td>${name}</td>
                <td>${category}</td>
                <td>N/A</td> <!-- Processor -->
                <td>N/A</td> <!-- OS -->
                <td>N/A</td> <!-- Graphics -->
                <td>${stock}GB</td> <!-- RAM -->
                <td>$${parseFloat(price).toFixed(2)}</td>
                <td>${type}</td>
            `;

            // Clear form fields after adding a product
            document.getElementById("product-name").value = "";
            document.getElementById("product-price").value = "";
            document.getElementById("product-stock").value = "";
            document.getElementById("product-category").selectedIndex = 0;
            document.getElementById("product-type").selectedIndex = 0;
            document.getElementById("product-description").value = "";
            document.getElementById("product-image").value = "";
        }
    </script>
</body>
</html>