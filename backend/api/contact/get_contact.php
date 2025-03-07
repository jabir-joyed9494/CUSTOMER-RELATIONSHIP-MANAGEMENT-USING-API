<?php
   header('Content-Type: application/json');
   header('Access-Control-Allow-Origin: *');
   header('Access-Control-Allow-Methods: GET');
   header('Access-Control-Allow-Headers: Content-Type');

   include __DIR__ . '/../../classes/crm--for-contact.php';

   if(!isset($_GET['id']) && empty($_GET['id'])){
      echo json_encode(["error"=>"Contact is missing"]);
      exit();
   }

   $crm = new CRM_CONTACT();
   $contactId = $_GET['id'];
   //echo json_encode(["received_data" => $contactId]);

   $contact = $crm->getContact($contactId);

   echo json_encode($contact);
?>