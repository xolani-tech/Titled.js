<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

include '../db_connection.php';


// DELETE METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Id = $_POST['id'];

    $sql = "DELETE FROM admin_users WHERE Id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $Id]);

    echo "Admin user deleted successfully!";
}




?>