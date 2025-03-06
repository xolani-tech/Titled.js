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
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users SET Name = :name, Phone = :phone, Email = :email, Password = :password, 
            WHERE Id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id' => $id,
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':password' =>$password,
    ]);

    echo "User updated successfully!";
}


?>