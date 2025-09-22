<?php
## Database configuration
// include '../.../includes/db-config.php';
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
session_start();
## Fetch records
$result_record = "SELECT id, name,email,phone_no,address,updated_at FROM demo_user ORDER BY ID ASC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
    $productName = '';   
    $no = $i++;
    $updated_at = '';
    if (!empty($row['updated_at'])) {
        $date = new DateTime($row['updated_at']);
        $updated_at = $date->format('d M Y (h:i A)'); // e.g., 18 Sep 2025 (02:30 PM)
    }
    $data[] = array(
        "No" => $no,
        "ID" => $row['id'],
        "Name" => $row["name"],
        // "Email" => substr($row["message"],0,90).'...',
        "Email" => $row["email"],
        "PhoneNo" => $row['phone_no'],
        "Address"=> substr($row["address"],0,120).'...',        
        "UpdateAt" => $updated_at,
    );
    // print_r($data);die;
}


echo json_encode(['data' => $data]);
