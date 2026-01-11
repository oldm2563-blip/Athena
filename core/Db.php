<?php
    class Db{
        private static ?pdo $connect = null;

        protected static function connection() : PDO{
            if (self::$connect === null) {
            $config = require __DIR__ . '/../config/database.php';
            try {
                self::$connect = new PDO ("mysql:host={$config['host']};port={$config['port']};dbname={$config['db_name']};", $config ['username'], $config ['password']);
                self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch (PDOException $e) {
                die("error: ". $e->getMessage());
            }
       }
        return self::$connect;
        }
        
    }