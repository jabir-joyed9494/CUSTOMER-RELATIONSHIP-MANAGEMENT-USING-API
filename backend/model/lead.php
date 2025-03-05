<?php 

include __DIR__ . '/../config/database.php';
    class LEAD{
          
        private $db;
        private $pdo;
         
         public function __construct()
         {
            $this->db = new DATABASE();
            $this->pdo = $this->db->dbconnection();
         }

         public function addLead($name,$email,$phone){

            $stmt = $this->pdo->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
            $result = $stmt->execute([$name, $email, $phone]);

            if($result){
                return true;
            }
          
            return false;
        }

        public function displayAllLeads(){
            $stmt = $this->pdo->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>