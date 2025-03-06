<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Circuit Central | Your Tech Hub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%; /* Adjust width as needed */
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-body {
            display: flex;
            gap: 20px; /* Space between image and details */
        }

        .modal-image img {
            max-width: 300px; /* Adjust image size as needed */
            height: auto;
            border-radius: 10px;
        }

        .modal-details {
            flex: 1;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }
    </style>
</head>
<body>

<!-- Include the database connection -->
<?php 
include '../backend/db_connection.php';

// Fetch desktops with their corresponding images
$sql_desktops = "
    SELECT desktops.*, images.file_path 
    FROM desktops 
    JOIN images ON desktops.image_id = images.id
";
$stmt_desktops = $conn->prepare($sql_desktops);
$stmt_desktops->execute();
$desktops = $stmt_desktops->fetchAll(PDO::FETCH_ASSOC);

// Fetch laptops with their corresponding images
$sql_laptops = "
    SELECT laptops.*, images.file_path 
    FROM laptops 
    JOIN images ON laptops.image_id = images.id
";
$stmt_laptops = $conn->prepare($sql_laptops);
$stmt_laptops->execute();
$laptops = $stmt_laptops->fetchAll(PDO::FETCH_ASSOC);
?>

    <!-- Modal Structure -->
    <div id="productModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <div class="modal-image">
                    <img id="modalProductImage" src="" alt="Product Image">
                </div>
                <div class="modal-details">
                    <h2 id="modalProductName"></h2>
                    <p><strong>Brand:</strong> <span id="modalProductBrand"></span></p>
                    <p><strong>Price:</strong> <span id="modalProductPrice"></span></p>
                    <p><strong>Specifications:</strong> <span id="modalProductSpecs"></span></p>
                </div>
            </div>
        </div>
    </div>

    <section id="header">
        <h1 style="display: inline; margin-left: 10px;">Circuit Central</h1>
        <a href="#"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                
                <li><a href="Promos.php">Promos</a></li>
                <li><a href="PC's & Laptops.php">PC's & Laptops</a></li>
                <li><a href="My Account.php">My Account</a></li>
                <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </div>
    </section>
    

    <section id="hero">
        <h4> Circuit Central – Powering Connections, Driving Innovation</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save up to 20% off when receiving a referral code</p>
        <a href="Tradein.php"><button class="normal">TRADE IN , TRADE NOW</button></a>
    </section>

    <section id="product1">
        <h2>Featured Products</h2>
        <p>Summer Collection On New Modern Designed Desktop PC's</p>
        <div class="pro-container" id="featured-products">
            <?php foreach ($desktops as $desktop): ?>
                <div class="pro" onclick="openModal({
                    name: '<?php echo htmlspecialchars($desktop['Name']); ?>',
                    brand: '<?php echo htmlspecialchars($desktop['Brand']); ?>',
                    price: '<?php echo htmlspecialchars($desktop['Price']); ?>',
                    proce: '<?php echo htmlspecialchars($desktop['Processor']); ?>',
                    image: '<?php echo htmlspecialchars($desktop['file_path']); ?>' // Pass image URL
                })">
                    <img src="<?php echo htmlspecialchars($desktop['file_path']); ?>" alt="<?php echo htmlspecialchars($desktop['Name']); ?>">
                    <div class="des">
                        <span><?php echo htmlspecialchars($desktop['Brand']); ?></span>
                        <h5><?php echo htmlspecialchars($desktop['Name']); ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4><?php echo htmlspecialchars($desktop['Price']); ?></h4>
                    </div>
                    <a href="#" onclick="addToCart(<?php echo $desktop['Id']; ?>)"><i class="fal fa-shopping-cart cart"></i></a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>20% Off</span> - All laptops & Desktops</h2>
        <a href="Shop.php"><button class="normal">Explore More</button></a>
    </section>

    <section id="product1">
        <h2>New Arrivals</h2>
        <p>Summer Collection Of Laptops In A New Modern Design</p>
        <div class="pro-container">
            <?php foreach ($laptops as $laptop): ?>
                <div class="pro" onclick="openModal({
                    name: '<?php echo htmlspecialchars($laptop['Name']); ?>',
                    brand: '<?php echo htmlspecialchars($laptop['Brand']); ?>',
                    price: '<?php echo htmlspecialchars($laptop['Price']); ?>',
                    processor: '<?php echo htmlspecialchars($laptop['Processor']); ?>',
                    image: '<?php echo htmlspecialchars($laptop['file_path']); ?>' // Pass image URL
                })">
                    <img src="<?php echo htmlspecialchars($laptop['file_path']); ?>" alt="<?php echo htmlspecialchars($laptop['Name']); ?>">
                    <div class="des">
                        <span><?php echo htmlspecialchars($laptop['Brand']); ?></span>
                        <h5><?php echo htmlspecialchars($laptop['Name']); ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4><?php echo htmlspecialchars($laptop['Price']); ?></h4>
                    </div>
                    <button class="submit"><a href="#" onclick="addToCart(<?php echo $laptop['Id']; ?>)"><i class="fal fa-shopping-cart cart"></i></a></button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>Crazy deals</h4>
            <h2>buy 1 get 1 free</h2>
            <span>The best classic laptop is on sale at Circuit Central</span>
            <button class="white">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>spring/summer</h4>
            <h2>upcoming season</h2>
            <span>The best classic laptop is on sale at Circuit Central</span>
            <button class="white">Collection</button>
        </div>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>
   
    <div id="footer-container"></div>

    <script> 
        fetch("footer.php")
            .then(response => response.text())
            .then(data => document.getElementById("footer-container").innerHTML = data);
    </script>

    <script>

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/67c8127018121519097562f9/1iliog265';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
        // Function to add a product to the cart
        function addToCart(productId) {
            fetch('php/add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: productId }),
            })
                .then(response => response.text())
                .then(message => {
                    alert(message); // Show success message
                })
                .catch(error => {
                    console.error('Error adding to cart:', error);
                });
        }

        // Modal functionality
        const modal = document.getElementById("productModal");
        const closeBtn = document.querySelector(".close");

        function openModal(product) {
            document.getElementById("modalProductName").innerText = product.name;
            document.getElementById("modalProductBrand").innerText = product.brand;
            document.getElementById("modalProductPrice").innerText = product.price;
            document.getElementById("modalProductSpecs").innerText = product.specs;
            document.getElementById("modalProductImage").src = product.image; // Set image source
            modal.style.display = "block";
        }

        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>