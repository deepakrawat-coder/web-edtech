<?php
## Database configuration
// include '../.../includes/db-config.php';
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
session_start();
## Fetch records
$result_record = "SELECT id, title,message,image,Status,product_id , created_at FROM service_about ORDER BY ID ASC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
    $productName = '';
    if (!empty($row['product_id'])) {
        $productQuery = $conn->query("SELECT name FROM products WHERE id = '" . intval($row['product_id']) . "' LIMIT 1");
        if ($productQuery && $productQuery->num_rows > 0) {
            $product = mysqli_fetch_assoc($productQuery);
            $productName = $product['name'];
        }
    }
    $no = $i++;
    $data[] = array(
        "No" => $no,
        "ID" => $row['id'],
        "Title" => $row["title"],
        "Message" => substr($row["message"],0,90).'...',
        "ProductName" => $productName,
        "Image"=> $row["image"],
        "Status" => $row["Status"],
        "Created_At" => $row["created_at"],
    );
}


echo json_encode(['data' => $data]);
