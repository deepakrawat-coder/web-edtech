<?php
## Database configuration
// include '../.../includes/db-config.php';
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
session_start();
## Fetch records
$result_record = "SELECT id, name,status,products_id, created_at FROM plains_category ORDER BY ID ASC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
    $program_name = '';
    if (!empty($row['products_id'])) {
        $productQuery = $conn->query("SELECT name FROM products WHERE id = '" . intval($row['products_id']) . "' LIMIT 1");
        if ($productQuery && $productQuery->num_rows > 0) {
            $product = mysqli_fetch_assoc($productQuery);
            $program_name = $product['name'];
        }
    }
    $no = $i++;
    $data[] = array(
        "No" => $no,
        "ID" => $row['id'],
        "Name" => $row["name"],
        "ProgramName" => $program_name,
        "Status" => $row["status"],
        "Created_At" => $row["created_at"],
    );
}


echo json_encode(['data' => $data]);
