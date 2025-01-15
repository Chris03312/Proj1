<?php

session_start();

class AuthController {
    public static function showLoginForm() {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            redirect('/dashboard');
        }

        // Render the login form
        view('login');
    }

    public static function login()
    {
        require_once __DIR__ . '/../configuration/Database.php'; // Include the Database class
    
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
    
        try {
            // Get the database connection
            $db = Database::getConnection();
    
            // Create a prepared statement to prevent SQL injection
            $stmt = $db->prepare('SELECT * FROM accounts WHERE USERNAME = :username');
            $stmt->execute(['username' => $username]);
    
            // Check if the user exists
            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
                // Verify the provided password against the hashed password
                if (password_verify($password, $user['PASSWORD'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
    
                    redirect('/dashboard');
                } else {
                    // Invalid password
                    view('login', ['error' => 'Invalid username or password.']);
                }
            } else {
                // Invalid username
                view('login', ['error' => 'Invalid username or password.']);
            }
        } catch (PDOException $e) {
            // Handle database connection or query errors
            view('login', ['error' => 'An error occurred while processing your request. Please try again later.']);
            error_log('Login error: ' . $e->getMessage());
        }
    }
    
    
}
