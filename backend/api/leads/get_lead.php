<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

include __DIR__ . '/../../classes/crm.php';

$crm = new CRM();

// Check if 'id' is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(["error" => "Lead ID missing"]);
    exit();
}

$leadId = intval($_GET['id']);

$lead = $crm->getLeadById($leadId);

 //ob_end_clean();
if ($lead) {
    echo json_encode($lead);
} else {
    echo json_encode(["error" => "Lead not found"]);
}
?>

