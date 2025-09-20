<?php
if (isset($_POST['title']) && isset($_POST['id'])) {
  require '../../includes/db-config.php';
  require '../../includes/helper.php';

  session_start();

  $id = intval($_POST['id']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $order_index = isset($_POST['order_index']) ? intval($_POST['order_index']) : null;
  $updated_file = mysqli_real_escape_string($conn, $_POST['updated_file']);

  if(isset($_FILES["image_url"]["name"]) && $_FILES["image_url"]["name"] != '') { 
    $photo = uploadImage($conn, "image_url", "aboutUs");
  } else {
    $photo = $updated_file;
  }

  $check = $conn->query("SELECT id FROM about_us WHERE title LIKE '$title' AND id <> $id");
  if ($check->num_rows > 0) {
    echo json_encode(['status' => 400, 'message' => $title . ' already exists!']);
    exit();
  }

  $update = $conn->query("UPDATE `about_us` SET `title` = '$title', `description` = '$description', `order_index` = '$order_index', `image_url` = '$photo' WHERE id = $id");
  if ($update) {
    echo json_encode(['status' => 200, 'message'=> 'About Us  updated successfully!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
?>