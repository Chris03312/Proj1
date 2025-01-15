<?php

include("../configuration/database.php");

$username = 'admin1';
$password = 'password123';  // Example password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);  // Hash the password

try {
    // Prepare SQL statement
    $stmt = $sql_connection->prepare("INSERT INTO accounts (username, password) VALUES (:username, :password)");
    
    // Bind parameters to the SQL query
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    
    // Execute the query
    $stmt->execute();

    echo "User successfully added to the database.";
} catch (PDOException $e) {
    // Handle any errors that occur during the query execution
    echo "Error: " . $e->getMessage();
}
?>
