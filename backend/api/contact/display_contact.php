<?php
       header('Content-Type: application/json');
       header('Access-Control-Allow-Origin: *');
       header('Access-Control-Allow-Methods: POST');
       header('Access-Control-Allow-Headers: Content-Type, Authorization');

       include __DIR__ . '/../../classes/crm--for-contact.php';

       $crm = new CRM_CONTACT();
       $contacts = $crm->displayAllContact();

       if($contacts){
         echo json_encode($contacts);
       }
       else{
        echo json_encode(["message" => "No Contact Found!"]);
       }
?>