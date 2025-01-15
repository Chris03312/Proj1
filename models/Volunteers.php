<?php

require_once __DIR__ . '/../configuration/Database.php';

class Volunteers {
    // Fetch all volunteers from the database
    public static function getAllVolunteers() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM volunteers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return data as an associative array
    }


    public static function getVolunteersBySearch($searchQuery) {
        $db = Database::getConnection();
        
        // Prepare the query with LIKE statements for each column
        $stmt = $db->prepare(
            "SELECT * FROM volunteers 
            WHERE FIRST_NAME LIKE :search 
            OR LAST_NAME LIKE :search
            OR ASSIGNED_PARISH LIKE :search
            OR VOLUNTEERS_ID LIKE :search
            OR STATUS LIKE :search"
        );
        
        // Execute the query with the search parameter
        $stmt->execute(['search' => '%' . $searchQuery . '%']);
        
        // Return the results as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

}

?>
