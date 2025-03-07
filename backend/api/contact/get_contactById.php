<?php
  
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET');
  header('Access-Control-Allow-Headers: Content-Type');

  include __DIR__ . '/../../classes/crm--for-contact.php';

  $input = file_get_contents("php://input");
  $data = json_decode($input);
   

    // echo json_encode(["received_data"=>$data]);

    $crm = new CRM_CONTACT();

    $contact = $crm->getContactbyleadId($data->id);

     echo json_encode($contact);


?>