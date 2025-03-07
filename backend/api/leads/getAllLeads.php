<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

require_once __DIR__ . '/../../classes/crm.php';


$crm = new CRM();
$leads = $crm->displayAllLeads();

if ($leads) {
     echo json_encode($leads);
} else {
    echo json_encode(["message" => "No leads found"]);
}
?>
