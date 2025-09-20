<?php
## Database configuration
include '../../includes/db-config.php';
session_start();
## Fetch records
$result_record = "SELECT id, name, status, created_at FROM job_categories ORDER BY id DESC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
  $no = $i++;

  // if(strlen($row['Description']) > 20){
  //   $destext = substr($row['Description'], 0, 20) . "...";
  // }else{
  //   $destext = $row['Description'];
  // }
  
      $data[] = array( 
        "No" => $no,
        "ID"=>$row['id'],
        "Name" => $row["name"],
        // "Description"=> $destext,
        // "Photo"=>$row['Photo'],
        "Status" => $row["status"],
        "Created_At" => $row["created_at"],
      );
  }


echo json_encode(['data' => $data]);

