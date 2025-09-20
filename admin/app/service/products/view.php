<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

$result = $conn->query("SELECT id, name, logo FROM clients_logos ORDER BY id DESC");

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert to full URL for React (so <img src="..."> works)
        $row['logo'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['logo'];
        $data[] = $row;
    }
}

echo json_encode([
    "status" => 200,
    "data" => $data
]);
?>  