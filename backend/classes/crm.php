<?php
   
     require_once __DIR__ . '/../model/lead.php';
   //   require_once __DIR__ . '/../model/contact.php';
   class CRM{
      private $leads;
      // private $contacts;

      public function __construct()
      {
         $this->leads = new Lead();
         // $this->contacts = new CONTACT();
      }

      public function addLead($name, $email, $phone){
         $result = ($this->leads->addLead($name, $email, $phone));
         if($result) return true;
         else return false;
      }

      public function displayAllLeads(){
         $result = $this->leads->displayAllLeads();
         return $result;
      }

      public function deleteLead($leadId){
         return $this->leads->deleteLead($leadId);
      }

      public function getLeadById($leadId){
         return $this->leads->getLeadById($leadId);
      }

      public function updateLead($id,$name,$email,$phone){
         return $this->leads->updateLead($id,$name,$email,$phone);
      }

      public function searchLeadByName($name){
          return $this->leads->searchLeadByName($name);
      }
    
   }

?>