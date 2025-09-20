<?php
## Database configuration
include '../../includes/db-config.php';
session_start();
## Fetch records
$result_record = "SELECT id  , name, email, phone, subject, message,created_at FROM leads ORDER BY id DESC";
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
        "Phone" => $row["phone"],
        "Subject"=>$row['email'],
        "Message" => $row["message"],
        "Created_At" => $row["created_at"],
      );
  }


echo json_encode(['data' => $data]);

