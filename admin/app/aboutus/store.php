<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require '../../includes/db-config.php';
  require '../../includes/helper.php';
  session_start();

  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $order_index = isset($_POST['order_index']) ? intval($_POST['order_index']) : null;
  // $status = 1; // Default status to 1 (active)

  if (empty($title) || empty($description)) {
    echo json_encode(['status' => 403, 'message' => 'Title and Description are mandatory!']);
    exit();
  }

  if ($_FILES["image_url"]["name"]) {
    $filename = uploadImage($conn, "image_url", "aboutUs");
  } else {
    $filename = "/admin-assets/img/default-program.jpg";
  }

  $add = $conn->query("INSERT INTO `about_us`(`title`, `description`, `image_url`, `order_index`, `created_at`, `updated_at`) VALUES ('$title', '$description', '$filename', '$order_index', NOW(), NOW())");

  if ($add) {
    echo json_encode(['status' => 200, 'message' => $title . ' added successfully!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
?>
