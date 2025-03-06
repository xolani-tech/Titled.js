<?php
include 'backend/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $productId = $data['id'];

    // Insert product into the cart table
    $sql = "INSERT INTO cart (product_id, quantity) VALUES (:product_id, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':product_id' => $productId]);

    echo "Product added to cart!";
}
?>