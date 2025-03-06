<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');


include '../db_connection.php';


// UPDATE METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $processor = $_POST['processor'];
    $operatingSystem = $_POST['operatingSystem'];
    $graphics = $_POST['graphics'];
    $storage = $_POST['storage'];
    $ram = $_POST['ram'];
    $price = $_POST['price'];

    $sql = "UPDATE desktops SET Name = :name, Brand = :brand, Processor = :processor, `Operating System` = :operatingSystem, 
            Graphics = :graphics, Storage = :storage, RAM = :ram, Price = :price WHERE Id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':name' => $name,
        ':brand' => $brand,
        ':processor' => $processor,
        ':operatingSystem' =>$operatingSystem,
        ':graphics' => $graphics,
        ':storage' => $storage,
        ':ram' => $ram,
        ':price' => $price
    ]);

    echo "Desktop updated successfully!";
}






?>