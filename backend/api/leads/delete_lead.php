<?php
  
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, DELETE');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');

  include __DIR__ . '/../../classes/crm.php';

  $input = file_get_contents("php://input");
  $data =json_decode($input);

  //echo json_encode(["received_data" => $data]);

  if(!empty($data->id)){
     $crm = new CRM();
     $result = $crm->deleteLead($data->id);

     if($result){
        echo json_encode(["message" => "Delete Successfully"]);
     }
     else{
        echo json_encode(["message" => "Finding Error"]);
     }
  }
  else{
    echo json_encode(["message" => "Id Not Found"]);
  }
 
?>