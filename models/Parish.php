<?php

require_once __DIR__ . '/../configuration/Database.php';

class Parish
{
    public static function getCities()
    {
        $db = Database::getConnection();
        $query = $db->query("SELECT DISTINCT CITY FROM parishes");
        return $query->fetchAll(PDO::FETCH_COLUMN); // Returns only city names
    }

    public static function getParishesByCity($city)
    {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT PARISH_NAME FROM parishes WHERE CITY = :city");
        
        // Bind the city parameter correctly
        $stmt->execute(['city' => $city]);  // Changed 'CITY' to 'city'
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
