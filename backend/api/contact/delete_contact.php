<?php
  
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, DELETE');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');

  include __DIR__ . '/../../classes/crm--for-contact.php';

  $input = file_get_contents("php://input");
  $data =json_decode($input);

   if(!empty($data->id)){
       $crm = new CRM_CONTACT();
       $result = $crm->deleteContact($data->id);
       if($result){
        echo json_encode(["message"=>"Delete Succesfully"]);
       }
   }
   else{
    echo json_encode(["message" => "ID not found"]);
   }

?>