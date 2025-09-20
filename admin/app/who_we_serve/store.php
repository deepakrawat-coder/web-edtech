<?php

if (isset($_POST['client_name'])) {
  require '../../includes/db-config.php';
  require '../../includes/helper.php';
  session_start();

  $name = mysqli_real_escape_string($conn, $_POST['client_name']);
  // $slug = baseurl($name); 
  $description =mysqli_real_escape_string($conn, $_POST['description']);
  $websitelink =mysqli_real_escape_string($conn, $_POST['link_url']);



  if ($_FILES["photo"]["name"]) {
    $filename = uploadImage($conn, "photo", "WhoWeServe");
  } else {
    $filename = "/admin-assets/img/default-program.jpg";
  }


  if (empty($name)) {
    echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
    exit();
  }

  $check = $conn->query("SELECT id FROM who_we_serve WHERE (client_name like '$name')");

  if (($check !== false && $check->num_rows > 0)) {
    echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
    exit();
  }

  $add = $conn->query("INSERT INTO `who_we_serve`(`client_name`,`photo`,`description`,`link_url`) VALUES ('$name','$filename','$description','$websitelink')");
  if ($add) {
    echo json_encode(['status' => 200, 'message' => $name . ' added successlly!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
