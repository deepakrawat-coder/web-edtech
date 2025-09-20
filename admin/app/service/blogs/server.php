<?php
## Database configuration
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');

session_start();
## Fetch records
$result_record = "SELECT ID, Name, Status,Products_ID, Created_At, Photo, Description FROM blogs_service ORDER BY ID ASC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
  $no = $i++;
  $program_name = '';
  if (!empty($row['Products_ID'])) {
    $productQuery = $conn->query("SELECT name FROM products WHERE id = '" . intval($row['Products_ID']) . "' LIMIT 1");
    if ($productQuery && $productQuery->num_rows > 0) {
      $product = mysqli_fetch_assoc($productQuery);
      $program_name = $product['name'];
    }
  }
  if (strlen($row['Description']) > 20) {
    $destext = substr($row['Description'], 0, 20) . "...";
  } else {
    $destext = $row['Description'];
  }

  $data[] = array(
    "No" => $no,
    "ID" => $row['ID'],
    "ProductName"=> $program_name,
    "Name" => $row["Name"],
    "Description" => $destext,
    "Photo" => $row['Photo'],
    "Status" => $row["Status"],
    "Created_At" => $row["Created_At"],
  );
}


echo json_encode(['data' => $data]);
