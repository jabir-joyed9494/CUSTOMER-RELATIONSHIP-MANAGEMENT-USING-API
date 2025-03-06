<?php
  
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");
  header("Access-Control-Allow-Methods: GET");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

   include __DIR__ . '/../../classes/crm--for-contact.php';
  
   if($_SERVER['REQUEST_METHOD']==='GET'){
  
    if (isset($_GET['name']) && !empty($_GET['name'])){
         $name = $_GET['name'];

       //  echo json_encode($name);

         if($name){
            $crm = new CRM_CONTACT();
            $contacts = $crm->searchContact($name);

           if(count($contacts)>0){
               echo json_encode($contacts);
           }
           else{
            echo json_encode(["message" => "No name parameter provided"]);
           }
         }
    }
    else{
        echo json_encode(["message" => "Field is empty"]);
    }
     
   }

?>