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

     public function getContact($id){
      $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE id = ?");
      $stmt->execute([$id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
     }

     public function updateContact($id,$name,$email,$phone){
      $stmt = $this->pdo->prepare("UPDATE contacts SET name = ?, email = ?, phone = ? WHERE id = ?");
      return $stmt->execute([$name, $email, $phone, $id]);
     }

     public function getContactbyleadId($id){
      $stmt = $this->pdo->prepare("SELECT * FROM contacts WHERE leadid = ?");
      $stmt->execute([$id]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }


   }

?>