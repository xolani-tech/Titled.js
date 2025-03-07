
<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

include '../db_connection.php';

// CREATE METHOD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $body = $_POST['body'];
    $screen = $_POST['screen'];
    $functionality = $_POST['functionality'];

    $sql = "INSERT INTO received (, Brand, Model, Body, Screen, Functionality) 
            VALUES ( :brand, :model, :body, :screen, :functionality)";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':brand' => $brand,
        ':model' => $model, 
        ':body' => $body,
        ':screen' => $screen,
        ':functionality' => $functionality,
    ]);

    echo "Sold to circuit central successfully!";
}


?>