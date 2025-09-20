<?php
## Database configuration
// include '../.../includes/db-config.php';
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
session_start();
## Fetch records
$result_record = "SELECT id, name,status, created_at FROM products ORDER BY ID ASC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
    $no = $i++;
    $data[] = array(
        "No" => $no,
        "ID" => $row['id'],
        "Name" => $row["name"],      
        "Status" => $row["status"],
        "Created_At" => $row["created_at"],
    );
}


echo json_encode(['data' => $data]);
