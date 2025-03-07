<?php
// api_fetch.php

// Include the database connection file
include 'db_connection.php';

/**
 * Fetch data from the database using the API.
 *
 * @param string $table The name of the table to fetch data from.
 * @return array Fetched data as an associative array.
 */
function fetchDataFromAPI($table) {
    global $conn;

    try {
        // Prepare the SQL query
        $sql = "SELECT * FROM $table";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Fetch all rows as an associative array
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the fetched data
        return $data;
    } catch (PDOException $e) {
        // Handle errors
        die("Error fetching data from $table: " . $e->getMessage());
    }
}

// Example: Fetch data from the 'laptops' table
if (isset($_GET['table'])) {
    $table = $_GET['table'];
    $data = fetchDataFromAPI($table);

    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}