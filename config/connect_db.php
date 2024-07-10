<?php
    class Database {
        private $host = "localhost";
        private $db = "us_pw_dtmju";
        private $username = "shikikie";
        private $password = "Kikie@564133";
        private $charset = "utf8";

        public  $conn;

        public function getConnection() {
            $this->conn = null;
            try {
                $this->conn = new PDO("
                mysql:host=".$this->host.";
                dbname=".$this->db.";
                charset=".$this->charset.";", 
                $this->username, 
                $this->password);
                
            }catch(PDOException $e) {
                echo "[Error] -> ".$e->getMessage();
            }
            return $this->conn;
        }


    }
?>