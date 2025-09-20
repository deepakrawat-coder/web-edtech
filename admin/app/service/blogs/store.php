<?php
// echo ('<pre>');
// print_r($_POST);
// die;
if (isset($_POST['name'])) {
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');
  session_start();
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $products_id = mysqli_real_escape_string($conn, $_POST['products_id']);
  $slug = mysqli_real_escape_string($conn, $_POST['slug']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);
  $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
  $meta_key = mysqli_real_escape_string($conn, $_POST['meta_key']);
  $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);

  // if ($_FILES["photo"]["name"]) {
  //   $filename = uploadImage($conn, "photo", "blogs_service");
  // } else {
  //   $filename = "/admin-assets/img/default-program.jpg";
  // }
 if (!empty($_FILES["photo"]["name"])) {
        $filename = uploadImageService($conn, "photo", "blogs_service");
    } else {
        // Use default image if nothing uploaded
        $filename = "/admin/admin-assets/images/default-program.jpg";
    }
  if (empty($name)) {
    echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
    exit();
  }

  $check = $conn->query("SELECT ID FROM blogs WHERE (Name like '$name')");

  if (($check !== false && $check->num_rows > 0)) {
    echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
    exit();
  }

  $add = $conn->query("INSERT INTO `blogs_service`(`Name`,`Slug`,`Photo`,`Description`,`Content`,`Meta_Title`,`Meta_Key`,`Meta_Description`,`Products_ID`) VALUES ('$name','$slug','$filename','$description','$content','$meta_title','$meta_key','$meta_description','$products_id')");
  if ($add) {
    echo json_encode(['status' => 200, 'message' => $name . ' added successlly!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
