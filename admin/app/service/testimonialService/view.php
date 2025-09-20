<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');

$result = $conn->query("SELECT id, name, logo,products_id  FROM clients_logos ORDER BY id DESC");

$data = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert to full URL for React (so <img src="..."> works)
        $program_id = $row['products_id'];
        $productQuery = $conn->query("SELECT name FROM products WHERE id = '$program_id' LIMIT 1");
        $product = mysqli_fetch_assoc($productQuery);
        $row['productsName'] = $product['name'];
        $row['logo'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $row['logo'];
        $data[] = $row;
    }
}
// print_r($data);
// die;
echo json_encode([
    "status" => 200,
    "data" => $data
]);
