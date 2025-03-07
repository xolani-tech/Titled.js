<?php
include 'db_connection.php';

// CREATE METHOD



// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $name = $_POST['name'];
//     $brand = $_POST['brand'];
//     $processor = $_POST['processor'];
//     $operatingSystem = $_POST['operatingSystem'];
//     $graphics = $_POST['graphics'];
//     $storage = $_POST['storage'];
//     $ram = $_POST['ram'];
//     $price = $_POST['price'];

//     $sql = "INSERT INTO desktops (Name, Brand, Processor, `Operating System`, Graphics, Storage, RAM, Price) 
//             VALUES (:name, :brand, :processor, :operatingSystem, :graphics, :storage, :ram, :price)";
    
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([
//         ':name' => $name,
//         ':brand' => $brand,
//         ':processor' => $processor,
//         ':operatingSystem' => $operatingSystem,
//         ':graphics' => $graphics,
//         ':storage' => $storage,
//         ':ram' => $ram,
//         ':price' => $price
//     ]);

//     echo "Desktop added successfully!";
// }

// create different  files
// add
// edit
// get
// delete

// script file for fetching methods



// GET METHOD
// $sql = "SELECT * FROM desktops";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $desktops = $stmt->fetchAll(PDO::FETCH_ASSOC);

// echo json_encode($desktops);



// UPDATE METHOD
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $id = $_POST['id'];
//     $name = $_POST['name'];
//     $brand = $_POST['brand'];
//     $processor = $_POST['processor'];
//     $operatingSystem = $_POST['operatingSystem'];
//     $graphics = $_POST['graphics'];
//     $storage = $_POST['storage'];
//     $ram = $_POST['ram'];
//     $price = $_POST['price'];

//     $sql = "UPDATE desktops SET Name = :name, Brand = :brand, Processor = :processor, `Operating System` = :operatingSystem, 
//             Graphics = :graphics, Storage = :storage, RAM = :ram, Price = :price WHERE Id = :id";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([
//         ':id' => $id,
//         ':name' => $name,
//         ':brand' => $brand,
//         ':processor' => $processor,
//         ':operatingSystem' =>$operatingSystem,
//         ':graphics' => $graphics,
//         ':storage' => $storage,
//         ':ram' => $ram,
//         ':price' => $price
//     ]);

//     echo "Desktop updated successfully!";
// }


// DELETE METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Id = $_POST['id'];

    $sql = "DELETE FROM desktops WHERE Id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $Id]);

    echo "Desktop deleted successfully!";
}


?>

