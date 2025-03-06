<?php
 
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

     require_once __DIR__ . '/../../classes/crm--for-contact.php';
   
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $data = json_decode(file_get_contents("php://input"));

        echo json_encode(["received_data" => $data]);
     
         if($data){
              $crm = new CRM_CONTACT();
              $crm->addContact($data->name,$data->email,$data->phone,$data->leadid);
         }
         else {
             echo json_encode(["error" => "Invalid input data."]);
         }
     
    }
    
?>