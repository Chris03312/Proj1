<?php 

require_once __DIR__ . '/../models/Profile.php';

class ProfileController
{
    public static function profile()
    {
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
            redirect('/login');
        }

        $username = $_SESSION['username'];

        // Call the Profile model's getUserData method to get the user's registration details
        $userData = Profile::getUserData($username);

        if ($userData) {
            // Pass the user data to the view
            view('profile', [
                'username' => $username,
                'registration_id' => $userData['registration_id'],
                'surname' => $userData['surname'],
                'first_name' => $userData['firstName'],
                'middle_name' => $userData['middleName'],
                'name_suffix' => $userData['name_suffix'],
                'birth_date' => $userData['birthDate'],
                'street_address' => $userData['streetAddress'],
                'barangay' => $userData['barangay'],
                'municipality' => $userData['municipality'],
                'zip_code' => $userData['zipCode'],
                'precinct_number' => $userData['precinct_number'],
                'email' => $userData['email']
            ]);
        } else {
            // Handle case when no user data is found
            echo "User data not found!";
        }
    }

    public static function updateProfile(){
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
            redirect('/login');
        }
    
        $username = $_SESSION['username'];
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect form data (ensure you sanitize and validate as needed)
            $registration_id = $_POST['registration_id'];
            $surname = $_POST['surname'];
            $firstName = $_POST['first_name'];
            $middleName = $_POST['middle_name'];
            $nameSuffix = $_POST['name_suffix'];
            $birthDate = $_POST['birth_date'];
            $streetAddress = $_POST['street_address'];
            $barangay = $_POST['barangay'];
            $municipality = $_POST['municipality'];
            $zipCode = $_POST['zip_code'];
            $precinctNumber = $_POST['precinct_number'];
            $email = $_POST['email'];
        
            // Call the updateProfile method from the model
            $updateSuccess = Profile::updateProfile(
                $registration_id, $surname, $firstName, $middleName, $nameSuffix, 
                $birthDate, $streetAddress, $barangay, $municipality, $zipCode, 
                $precinctNumber, $email
            );
        
            if ($updateSuccess) {
                // Redirect to /profile after successful update
                header("Location: /profile");
                exit(); // Ensure no further code is executed after the redirect
            } else {
                // Handle the error case, maybe show an error message
                echo "Error updating profile.";
            }
        }
    }
    
    
}
