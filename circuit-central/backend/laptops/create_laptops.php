<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');


include '../db_connection.php';


// CREATE METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $processor = $_POST['processor'];
    $operatingSystem = $_POST['operatingSystem'];
    $graphics = $_POST['graphics'];
    $storage = $_POST['storage'];
    $ram = $_POST['ram'];
    $price = $_POST['price'];

    $sql = "INSERT INTO laptops (Name, Brand, Processor, `Operating System`, Graphics, Storage, RAM, Price) 
            VALUES (:name, :brand, :processor, :operatingSystem, :graphics, :storage, :ram, :price)";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':brand' => $brand,
        ':processor' => $processor,
        ':operatingSystem' => $operatingSystem,
        ':graphics' => $graphics,
        ':storage' => $storage,
        ':ram' => $ram,
        ':price' => $price
    ]);

    echo "Laptops added successfully!";
}
?>