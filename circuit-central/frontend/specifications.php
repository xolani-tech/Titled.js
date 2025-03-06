<?php
include '../backend/db_connection.php';

?>


<!-- Modal Structure -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modalProductName"></h2>
        <p><strong>Brand:</strong> <span id="modalProductBrand"></span></p>
        <p><strong>Price:</strong> <span id="modalProductPrice"></span></p>
        <p><strong>Specifications:</strong> <span id="modalProductSpecs"></span></p>
    </div>
</div>

<script>
    // Get the modal
    const modal = document.getElementById("productModal");

    // Get the <span> element that closes the modal
    const closeBtn = document.querySelector(".close");

    // Function to open the modal and populate it with product details
    function openModal(product) {
        document.getElementById("modalProductName").innerText = product.name;
        document.getElementById("modalProductBrand").innerText = product.brand;
        document.getElementById("modalProductProcessor").innerText = product.price;
        document.getElementById("modalProductSpecs").innerText = product.specs;
        modal.style.display = "block";
    }

    // Close the modal when the close button is clicked
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>

<style>
    /* Modal Styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black with opacity */
}

.modal-content {
    background-color: #fff;
    margin: 10% auto; /* 10% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 50%; /* Adjust width as needed */
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
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