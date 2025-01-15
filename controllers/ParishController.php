<?php

require_once __DIR__ . '/../models/Parish.php';

class ParishController
{
    public static function getParishes()
    {
        $city = $_GET['city'] ?? '';
        header('Content-Type: application/json');
        if ($city) {
            $parishes = Parish::getParishesByCity($city);
            echo json_encode($parishes);
        } else {
            echo json_encode([]);
        }
    }
}
?>
