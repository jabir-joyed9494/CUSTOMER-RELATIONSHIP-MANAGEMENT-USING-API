<?php 
    class DATABASE{
        private $host = '127.0.0.1';
        private $dbname = 'crm_db';
        private $username = 'root';
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
               // echo "Database Connected Successfully";
            } catch(PDOException $e) {
                echo "Error" . $e->getMessage();
            }
            return $this->conn;
         }       
    }

    // $db = new DATABASE();
    // $db->dbconnection();

    
?>