<?php
## Database configuration
include '../../includes/db-config.php';
session_start();
## Fetch records
$result_record = "SELECT id, client_name, status, created_At, photo,link_url, description FROM who_we_serve ORDER BY ID DESC";
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
        "Name" => $row["client_name"],
        "Description"=> $destext,
        "Photo"=>$row['photo'],
        "Link"=>$row['link_url'],
        "Status" => $row["status"],
        "Created_At" => $row["created_At"],
      );
  }


echo json_encode(['data' => $data]);

