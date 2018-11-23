<?php
    class Db {
        private static $instance = NULL;
        
        private function __construct() {}
        
        private function __clone() {}
        
        public static function getInstance() {
            if (!isset(self::$instance)) {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                try {
                    self::$instance = new PDO('mysql:host=localhost;dbname=inanda', 'root', 'root', $pdo_options);
                }catch (PDOException $e) {
                    include_once("view/pages/500error.php");
                    exit();
                }            }
            return self::$instance;
        }
    }
?>