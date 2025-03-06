<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

include '../db_connection.php';

// GET METHOD

$sql = "SELECT * FROM admin_users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$admin_users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($admin_users);



?>


