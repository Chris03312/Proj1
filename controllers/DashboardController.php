<?php

require_once __DIR__ . '/../models/Parish.php';
require_once __DIR__ . '/../models/Volunteers.php';
require_once __DIR__ . '/../models/Notification.php';
require_once __DIR__ . '/../controllers/NotificationController.php';

class DashboardController
{
    public static function dashboard() {
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
            redirect('/login');
        }

        $searchQuery = $_GET['search'] ?? '';

        // fetched data
        $cities = Parish::getCities();
        $volunteers = Volunteers::getVolunteersBySearch($searchQuery);

        // Get categorized notifications using NotificationController
        $notificationData = NotificationController::getNotifications();

        // Pass the data to the dashboard view
        view('dashboard', [
            'username' => $_SESSION['username'],
            'cities' => $cities,
            'volunteers' => $volunteers,
            'newNotifications' => $notificationData['newNotifications'],
            'earlierNotifications' => $notificationData['earlierNotifications']
        ]);
    }
}
