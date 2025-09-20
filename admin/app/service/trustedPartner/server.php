<?php
## Database configuration
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
session_start();

## Fetch records
$result_record = "SELECT id, name, logo, status, products_id, created_at FROM clients_logos ORDER BY id ASC";
$results = mysqli_query($conn, $result_record);

$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
    $program_id = $row['products_id'];

    // Get related product name
    $product_name = '';
    if (!empty($program_id)) {
        $productQuery = $conn->query("SELECT name FROM products WHERE id = '$program_id' LIMIT 1");
        if ($productQuery && $productQuery->num_rows > 0) {
            $product = mysqli_fetch_assoc($productQuery);
            $product_name = $product['name'];
        }
    }

    $data[] = array(
        "No"         => $i++,
        "ID"         => $row['id'],
        "Name"       => $row["name"],
        "ProgramName"=> $product_name,
        "Logo"       => $row["logo"],   // you can prepend full URL if needed
        "Status"     => $row["status"],
        "Created_At" => $row["created_at"],
    );
}

echo json_encode(['data' => $data]);
