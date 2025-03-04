<?php 
    class DATABASE{
        private $host = 'localhost';
        private $dbname = 'crm_db';
        private $username = 'joyed';
        private $password = 'Joyed@1234';
        private $conn;

        public function __construct()
        {
            $this->conn = null;
        }
        
        public function dbconnection(){
            try {
                $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch(PDOException $e) {
                error_log("Database Connection Error: " . $e->getMessage());  // Log error
                die(json_encode(["status" => "error", "message" => "Database connection failed."])); // Stop script and return error
            }
            return $this->conn;
         }
         

    }
?>