<?php
if (isset($_POST['client_name']) && isset($_POST['id'])) {
  require '../../includes/db-config.php';
  require '../../includes/helper.php';

  session_start();

  $id = intval($_POST['id']);
  $name = mysqli_real_escape_string($conn, $_POST['client_name']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $websitelink = mysqli_real_escape_string($conn, $_POST['link_url']);
  $updated_file = mysqli_real_escape_string($conn, $_POST['updated_file']);

  if(isset($_FILES["photo"]["name"]) && $_FILES["photo"]["name"]!=''){ 
    $photo = uploadImage($conn, "photo", "WhoWeServe");
  } else {
    $photo = $updated_file;
  }

  $check = $conn->query("SELECT id FROM who_we_serve WHERE client_name LIKE '$name' AND ID <> $id");
  if ($check->num_rows > 0) {
    echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
    exit();
  }

  $update = $conn->query("UPDATE `who_we_serve` SET `client_name` = '$name', `description` = '$description', `link_url` = '$websitelink', `photo` = '$photo' WHERE ID = $id");
  if ($update) {
    echo json_encode(['status' => 200, 'message' => $name . ' updated successfully!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
?>
