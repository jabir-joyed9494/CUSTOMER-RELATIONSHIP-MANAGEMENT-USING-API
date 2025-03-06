<?php
  
   include __DIR__ . '/../config/database.php';

   class CONTACT{
     private $db;
     private $pdo;

     public function __construct()
     {
        $this->db =  new DATABASE();
        $this->pdo = $this->db->dbconnection();
     }

     public function addContact($name,$email,$phone,$leadid){

        $stdo = $this->pdo->prepare("INSERT INTO contacts (name, email, phone, leadid) VALUES (?, ?, ?, ?)");
        $result = $stdo->execute([$name, $email, $phone, $leadid]);
        if($result){
            return true;
        }
        else{
            return false;
        }
     }

     public function searchContact($name){
      $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE name LIKE ?");
      $stmt->execute(['%'. $name . '%']);
      return $stmt->fetchAll(PDO:: FETCH_ASSOC);
     }

     public function displayAllContact(){
      $stmt = $this->pdo->prepare("SELECT * FROM contacts");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function deleteContact($id){
      $stmt = $this->pdo->prepare("DELETE FROM contacts WHERE id = ?");
      $stmt->execute([$id]);
      return true;
     }


   }

?>