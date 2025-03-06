<!-- name
 phone
 email
 email
 password -->

 <?php
 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

 include '../db_connection.php';

// CREATE METHOD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (Name, Phone, Email, Password) 
            VALUES (:name, :phone, :email, :password)";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':Password' => $Password,
    ]);

    echo "User created successfully!";
}
 
 
 
 
 ?>