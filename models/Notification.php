<?php

require_once __DIR__ . '/../configuration/Database.php';
class Notification {

    public static function getNotification() {
        try {
            $username = $_SESSION['username'];
    
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT `from`, `to`, message, date_sent, time_sent, status FROM notifications WHERE `to` = :username');
            $stmt->execute([':username' => $username]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array if an error occurs
        }
    }
    
    
}