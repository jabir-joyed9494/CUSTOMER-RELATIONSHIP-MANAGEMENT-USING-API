<?php
      header('Content-Type: application/json');
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: GET');
      header('Access-Control-Allow-Headers: Content-Type');

      include __DIR__ . '/../../classes/crm--for-contact.php';

      $input = file_get_contents("php://input");
      $data = json_decode($input);

      //echo json_encode(["received_data"=>$data]);

      if(!empty($data->name) && !empty($data->email) && !empty($data->phone)){
        $crm = new CRM_CONTACT();
        $result = $crm->updateContact($data->id,$data->name,$data->email,$data->phone);

        if($result){
            echo json_encode(["status" => "success", "message" => "Contact updated successfully"]);
        }
        else{
            echo json_encode(["status" => "error", "message" => "Database error while adding lead."]);
        }

      }


?>