<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
session_start();

// Fetch records
$sql = "SELECT id, plains_category_id ,status, actual_price, discout_price, key_features, plain_type,created_at 
        FROM plains 
        ORDER BY id ASC";

$results = mysqli_query($conn, $sql);

$data = [];
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
    $plain_category_name = '';
    $plain_categoryProductId = null;

    if (!empty($row['plains_category_id'])) {
        $plain_categoryQuery = $conn->query("SELECT name, products_id  
                                             FROM plains_category 
                                             WHERE id = '" . intval($row['plains_category_id']) . "' 
                                             LIMIT 1");
        if ($plain_categoryQuery && $plain_categoryQuery->num_rows > 0) {
            $plain_category = mysqli_fetch_assoc($plain_categoryQuery);
            $plain_category_name = $plain_category['name'];
            $plain_categoryProductId = $plain_category['products_id']; // single value
        }
    }

    $program_name = '';
    if (!empty($plain_categoryProductId)) {
        $productQuery = $conn->query("SELECT name  
                                      FROM products 
                                      WHERE id = '" . intval($plain_categoryProductId) . "' 
                                      LIMIT 1");
        if ($productQuery && $productQuery->num_rows > 0) {
            $product = mysqli_fetch_assoc($productQuery);
            $program_name = $product['name'];
        }
    }

    $data[] = [
        "No"          => $i++,
        "ID"          => $row['id'],
        "ProductName" => $program_name,
        "CategoryName" => $plain_category_name,
        "ActualPrice"       => $row['actual_price'],
        "Discountprice"       => $row['discout_price'],
        "Status"      => $row['status'],
        "Created_At"  => $row['created_at'],
    ];
}

echo json_encode(['data' => $data]);
