<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

include '../db_connection.php';

// GET METHOD
$sql = "SELECT * FROM desktops";
$stmt = $conn->prepare($sql);
$stmt->execute();
$desktops = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($desktops);




?>