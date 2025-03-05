<?php

include __DIR__ . '/../model/lead.php';
   class CRM{
      private $leads;

      public function __construct()
      {
         $this->leads = new Lead();
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
    
   }

?>