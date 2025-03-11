<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

 header("Access-Control-Allow-Origin: *");
 header('Content-Type: application/json');
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include __DIR__ . '/../../classes/crm.php';
if (isset($_GET['name']) && !empty($_GET['name'])) {
   $name = $_GET['name'];

  // echo json_encode(["receive data" => $name]);

   $crm = new CRM();
   $leads = $crm->searchLeadByName($name);
   //  ob_end_clean();
   if (count($leads) > 0) {
       echo json_encode($leads);
   } else {
       echo json_encode([]);
   }
} else {
   echo json_encode(["message" => "No name parameter provided"]);
}


