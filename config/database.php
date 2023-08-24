<?php
    class Database {

        private $host       = "db";
        private $db_name    = "shoplist_db";
        private $username   = "MYSQL_USER";
        private $password   = "MYSQL_PASSWORD";
        public $conn;

        public function getConnection() {

            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            } catch (PDOException $exception) {
                echo "Connection error: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }
?>
