<?php

include("../configuration/database.php");

date_default_timezone_set('Asia/Manila'); // Set to your desired time zone

$from = 'Chris123';
$to = 'admin1';
$message = 'HALOOO EYOOOO';  // Example message
$date = date('m-d-y');
$time = date('h:i:s A');
$status = 'UNREAD';

try {
    // Prepare SQL statement
    $db = Database::getConnection();
    $stmt = $db->prepare("INSERT INTO NOTIFICATIONS (`to`, `from`, message, date_sent, time_sent, status) 
                          VALUES (:to, :from, :message, :date, :time, :status)");
    
    // Bind parameters to the SQL query
    $stmt->bindParam(':from', $from);
    $stmt->bindParam(':to', $to);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':time', $time);
    $stmt->bindParam(':status', $status);
    
    // Execute the query
    $stmt->execute();

    echo "Notification successfully added to the database.";
} catch (PDOException $e) {
    // Handle any errors that occur during the query execution
    echo "Error: " . $e->getMessage();
}
?>
