<?php
  
     require_once __DIR__ . '/../model/contact.php';

     class CRM_CONTACT{
        private $contact;

        public function __construct()
        {
             $this->contact = new CONTACT();
        }


      public function addContact($name, $email, $phone, $leadid){
        return $this->contact->addContact($name,$email,$phone,$leadid);
      }

      public function searchContact($name){
          return $this->contact->searchContact($name);
      }

      public function displayAllContact(){
          return $this->contact->displayAllContact();
      }
      public function deleteContact($Id){
          return $this->contact->deleteContact($Id);
      }
     }
?>