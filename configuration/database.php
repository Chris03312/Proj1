<?php

class Database
{
    private static $instance = null;

    private function __construct() {}
    private function __clone() {}

    public static function getConnection()
    {
        if (self::$instance === null) {
            $host = 'localhost';
            $dbname = 'dppam';
            $username = 'root';
            $password = '';

            try {
                self::$instance = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
?>
