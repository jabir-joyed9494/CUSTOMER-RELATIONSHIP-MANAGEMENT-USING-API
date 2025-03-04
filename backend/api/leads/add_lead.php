<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

include __DIR__ . '/../../classes/crm.php';

$input = file_get_contents("php://input");
$data = json_decode($input);

// echo json_encode(["received_data" => $data]);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["status" => "error", "message" => "Invalid JSON: " . json_last_error_msg()]);
    exit();
}
if (!empty($data->name) && !empty($data->email) && !empty($data->phone)) {
    $crm = new CRM();
    if ($crm->addLead($data->name, $data->email, $data->phone)) {
        echo json_encode(["status" => "success", "message" => "Lead added successfully"]);
    } else {
        error_log("API Error: Could not add lead.");
        echo json_encode(["status" => "error", "message" => "Database error while adding lead."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Missing required fields"]);
}



?>
