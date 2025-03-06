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

        public function deleteLead($leadId){
            $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$leadId]);
            return true;
        }

        public function getLeadById($id) {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function updateLead($id, $name, $email, $phone) {
            $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?");
            return $stmt->execute([$name, $email, $phone, $id]);
        }

        public function searchLeadByName($name){
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE name LIKE ?");
            $stmt->execute(['%'. $name . '%']);
            return $stmt->fetchAll(PDO:: FETCH_ASSOC);
        }
    }

?>