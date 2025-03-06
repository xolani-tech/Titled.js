<?php

// db_connection.php

$host = '127.0.0.1:3306';
$dbname = 'circuit_central';
$username = 'root'; // Replace with your database username
$password = '@jonathanmicah23'; // Replace with your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>





