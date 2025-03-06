<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json");
 header("Access-Control-Allow-Methods: GET");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include __DIR__ . '/../../classes/crm.php';
if (isset($_GET['name']) && !empty($_GET['name'])) {
   $name = $_GET['name'];

   $crm = new CRM();
   $leads = $crm->searchLeadByName($name);
   
   if (count($leads) > 0) {
       echo json_encode($leads);
   } else {
       echo json_encode([]);
   }
} else {
   echo json_encode(["message" => "No name parameter provided"]);
}












// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $input = file_get_contents("php://input");
//    $data = json_decode($input);

//    //echo json_encode(["received_data" => $data]);

//    if (json_last_error() !== JSON_ERROR_NONE) {
//       echo json_encode(["status" => "error", "message" => "Invalid JSON: " . json_last_error_msg()]);
//       exit();
//    }

//    if (!empty($data->name)) {
//       $crm = new CRM();
//       $leads = $crm->searchLeadByName($data->name);

//       if ($leads) {
//          echo json_encode($leads);
//       } else {
//          echo json_encode(["message" => "No Leads Found"]);
//       }
//    } else {
//       echo json_encode(["message" => "Missing required fields"]);
//    }
// }
