<?php

class SignUpController {

        public static function showSignUp() {
            view('signup');
        }

        public static function signup() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Capture form data
                $role = $_POST['role'] ?? '';
                $surname = $_POST['surname'] ?? '';
                $firstName = $_POST['first_name'] ?? '';
                $middleName = $_POST['middle_name'] ?? '';
                $nameSuffix = $_POST['name_suffix'] ?? '';
                $birthDate = $_POST['birth_date'] ?? '';
                $streetAddress = $_POST['street_address'] ?? '';
                $municipality = $_POST['municipality'] ?? '';
                $barangay = $_POST['barangay'] ?? '';
                $zipCode = $_POST['zip_code'] ?? '';
                $precinctNumber = $_POST['precinct_number'] ?? '';
                $email = $_POST['email'] ?? '';
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $confirmPassword = $_POST['confirm_password'] ?? '';
        
                // Validation
                $errors = self::validateFormData($role, $surname, $firstName, $birthDate, $streetAddress, $municipality, $barangay, $zipCode, $precinctNumber, $email, $username, $password, $confirmPassword);
        
                // Check if email or username already exists
                $db = Database::getConnection();
                $stmtEmail = $db->prepare('SELECT COUNT(*) FROM REGISTRATION WHERE email = :email');
                $stmtEmail->execute([':email' => $email]);
                $emailExists = $stmtEmail->fetchColumn() > 0;
        
                $stmtUsername = $db->prepare('SELECT COUNT(*) FROM ACCOUNTS WHERE username = :username');
                $stmtUsername->execute([':username' => $username]);
                $usernameExists = $stmtUsername->fetchColumn() > 0;
        
                if ($emailExists) {
                    $errors[] = 'Email is already registered.';
                }
                if ($usernameExists) {
                    $errors[] = 'Username is already taken.';
                }
        
                if (empty($errors)) {
                    try {
                        // Insert user details into the REGISTRATION table
                        $stmt = $db->prepare('INSERT INTO REGISTRATION 
                        (
                            role, 
                            surname, 
                            firstname, 
                            middlename, 
                            name_suffix, 
                            birthdate, 
                            streetaddress, 
                            municipality, 
                            barangay, 
                            zipcode, 
                            precinct_number, 
                            email
                        ) VALUES
                        (
                            :role, 
                            :surname, 
                            :firstName, 
                            :middleName, 
                            :nameSuffix, 
                            :birthDate, 
                            :streetAddress, 
                            :municipality, 
                            :barangay, 
                            :zipCode, 
                            :precinctNumber, 
                            :email
                        )');
        
                        $stmt->execute([
                            ':role' => $role,
                            ':surname' => $surname,
                            ':firstName' => $firstName,
                            ':middleName' => $middleName,
                            ':nameSuffix' => $nameSuffix,
                            ':birthDate' => $birthDate,
                            ':streetAddress' => $streetAddress,
                            ':municipality' => $municipality,
                            ':barangay' => $barangay,
                            ':zipCode' => $zipCode,
                            ':precinctNumber' => $precinctNumber,
                            ':email' => $email
                        ]);
        
                        // Insert account credentials into the ACCOUNTS table
                        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                        $stmt = $db->prepare('INSERT INTO ACCOUNTS (username, password) VALUES (:username, :password)');
                        $stmt->execute([
                            ':username' => $username,
                            ':password' => $hashedPassword
                        ]);
        
                        redirect('/login');
                    } catch (PDOException $e) {
                        $errors[] = 'An error occurred during registration. Please try again later.';
                        // Pass form data (including error messages) back to the view
                        view('signup', ['errors' => $errors, 'input' => $_POST]);
                    }
                } else {
                    // Pass form data (including error messages) back to the view
                    view('signup', ['errors' => $errors, 'input' => $_POST]);
                }
            }
        }
        
        private static function validateFormData
        (
            $role, $surname, $firstName, $birthDate, $streetAddress, $municipality, $barangay, 
            $zipCode, $precinctNumber, $email, $username, $password, $confirmPassword
        ) {
            $errors = [];
        
            // Regular expression to allow only letters, numbers, spaces, and some basic punctuation
            $validStringPattern = '/^[a-zA-Z0-9\s,.\'"-]*$/'; // Corrected regex pattern
        
            // Apply trim and check for special characters
            if (empty(trim($role)) || !preg_match($validStringPattern, $role)) {
                $errors[] = 'Role is required and must not contain special characters.';
            }
            if (empty(trim($surname)) || !preg_match($validStringPattern, $surname)) {
                $errors[] = 'Surname is required and must not contain special characters.';
            }
            if (empty(trim($firstName)) || !preg_match($validStringPattern, $firstName)) {
                $errors[] = 'First Name is required and must not contain special characters.';
            }
            if (empty(trim($birthDate))) $errors[] = 'Birth Date is required.';
            if (empty(trim($streetAddress)) || !preg_match($validStringPattern, $streetAddress)) {
                $errors[] = 'Address is required and must not contain special characters.';
            }
            if (empty(trim($municipality)) || !preg_match($validStringPattern, $municipality)) {
                $errors[] = 'Municipality is required and must not contain special characters.';
            }
            if (empty(trim($barangay)) || !preg_match($validStringPattern, $barangay)) {
                $errors[] = 'Barangay is required and must not contain special characters.';
            }
            if (empty(trim($zipCode))) $errors[] = 'Zip Code is required.';
            if (empty(trim($precinctNumber))) $errors[] = 'Precinct number is required.';
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
            if (empty(trim($username)) || !preg_match($validStringPattern, $username)) {
                $errors[] = 'Username is required and must not contain special characters.';
            }
            if (strlen(trim($password)) < 6) $errors[] = 'Password must be at least 6 characters.';
            if ($password !== $confirmPassword) $errors[] = 'Passwords do not match.';
        
            return $errors;
        }
}

?>
