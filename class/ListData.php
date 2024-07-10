<?php
    class ListData {
        private $conn;
        private $table = 'data_67';
        public $StudentCode;

        

        public function __construct($db){
            $this->conn = $db;
        }

        public function setStudentCode($StudentCode){
            $this->StudentCode = $StudentCode;
        }

        public function SelectData($StudentCode) {
            $stdCode = $StudentCode;
            $query = "SELECT * FROM {$this->table} WHERE STUDENTCODE = :StudentCode";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":StudentCode", $stdCode);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
            }else{
                return false;
            }
        }
    }
?>