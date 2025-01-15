<?php 

class LogoutController {
    public static function logout() {
        session_start();  // Ensure the session is started
        session_destroy();  // Destroy all session data
        redirect('/login');  // Redirect to the login page
    }
}