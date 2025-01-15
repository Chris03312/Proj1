<?php

class NotificationController {

    // Method to get and categorize notifications
    public static function getNotifications() {
        // Set the current time with the 'Asia/Manila' time zone
        $currentTime = new DateTime('now', new DateTimeZone('Asia/Manila'));  // Use 'Asia/Manila' time zone
        
        // Fetch notifications
        $notifications = Notification::getnotification();
        $newNotifications = [];
        $earlierNotifications = [];
    
        foreach ($notifications as $notification) {
            // Combine date_sent and time_sent to create a full DateTime object
            $notificationDateTimeString = $notification['date_sent'] . ' ' . $notification['time_sent'];
    
            // Create the notification time with 'Asia/Manila' time zone
            $notificationTime = DateTime::createFromFormat('m-d-y h:i:s A', $notificationDateTimeString, new DateTimeZone('Asia/Manila'));
    
            if ($notificationTime === false) {
                echo "Invalid Date Format for Notification<br>";
                continue;
            }
    
            // Ensure both times are in the same time zone
            $notificationTime->setTimezone(new DateTimeZone('Asia/Manila'));  // Set time zone to 'Asia/Manila'
    
            // Calculate the time difference
            $interval = $currentTime->diff($notificationTime);
                
            // Debug output
            // echo "Notification Time: " . $notificationTime->format('Y-m-d H:i:s') . "<br>";
            // echo "Time Interval: " . $interval->format('%h hours %i minutes %s seconds') . "<br>";
    
            // If the notification is within 30 minutes
            if ($interval->h == 0 && $interval->i < 30) {
                $newNotifications[] = $notification;
            } else {
                $earlierNotifications[] = $notification;
            }
        }
    
        return [
            'newNotifications' => $newNotifications,
            'earlierNotifications' => $earlierNotifications
        ];
    }
    
}
