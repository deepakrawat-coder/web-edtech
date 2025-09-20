<?php
## Database configuration
include '../../includes/db-config.php';
session_start();
## Fetch records
$result_record = "SELECT id, title, description, image_url, order_index	,status	, created_at FROM about_us ORDER BY ID DESC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
  $no = $i++;
  if(strlen($row['description']) > 20){
    $destext = substr($row['description'], 0, 20) . "...";
  }else{
    $destext = $row['description'];
  }
  
      $data[] = array( 
        "No" => $no,
        "ID"=>$row['id'],
        "Name" => $row["title"],
        "Description"=> $destext,
        "Photo"=>$row['image_url'],
        "Order"=>$row['order_index'],
        // "Link"=>$row['link_url'],
        "Status" => $row["status"],
        "Created_At" => $row["created_at"],
      );
  }


echo json_encode(['data' => $data]);

