<?php

require_once __DIR__ . '/../configuration/Database.php';

class Profile
{
    // Method to get user data based on username
    public static function getUserData($username)
    {
        // Get database connection
        $db = Database::getConnection();

        // Prepare query to fetch user registration data based on username
        $query = $db->prepare("
            SELECT r.role, r.registration_id, r.surname, r.firstName, r.middleName, r.name_suffix, r.birthDate, 
                   r.streetAddress, r.barangay, r.municipality, r.zipCode, 
                   r.precinct_number, r.email 
            FROM registration r 
            INNER JOIN Accounts a ON a.registration_id = r.registration_id 
            WHERE a.username = :username
        ");
        
        // Execute the query with the provided username
        $query->execute(['username' => $username]);

        // Fetch the result
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateProfile
    (
        $registration_id, $surname, $firstName, $middleName, $nameSuffix, $birthDate, $streetAddress, 
        $barangay, $municipality, $zipCode, $precinctNumber, $email
    )
    {
        $db = Database::getConnection(); // Assuming Database::getConnection() gets the PDO connection

        $sql = "UPDATE Registration SET
                surname = :surname,
                firstName = :first_name,
                middleName = :middle_name,
                name_suffix = :name_suffix,
                birthDate = :birth_date,
                streetAddress = :street_address,
                barangay = :barangay,
                municipality = :municipality,
                zipCode = :zip_code,
                precinct_number = :precinct_number,
                email = :email
                WHERE registration_id = :registration_id"; // Use the actual field name for user_id in the table

        // Prepare the query
        $stmt = $db->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':registration_id', $registration_id);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':middle_name', $middleName);
        $stmt->bindParam(':name_suffix', $nameSuffix);
        $stmt->bindParam(':birth_date', $birthDate);
        $stmt->bindParam(':street_address', $streetAddress);
        $stmt->bindParam(':barangay', $barangay);
        $stmt->bindParam(':municipality', $municipality);
        $stmt->bindParam(':zip_code', $zipCode);
        $stmt->bindParam(':precinct_number', $precinctNumber);
        $stmt->bindParam(':email', $email);
        // Execute the query and return the result
        return $stmt->execute();

    }
    
}

?>
