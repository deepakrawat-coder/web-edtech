<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // session_start();
    // print_r($_POST);
    // die;
    // echo ('<pre>');
    // print_r($_POST);
    // die;

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $message = mysqli_real_escape_string($conn, $_POST['editor']);
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    if (!empty($_FILES["image"]["name"])) {
        $filename = uploadImageService($conn, "image", "aboutService");
    } else {
        // Use default image if nothing uploaded
        $filename = "/admin/admin-assets/images/default-program.jpg";
    }

    // ✅ Validation
    if (empty($title)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }

    // ✅ Check duplicate
    $check = $conn->query("SELECT id FROM service_about WHERE title LIKE '$title'");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $title . ' already exists!']);
        exit();
    }

    // ✅ Insert new record
    $add = $conn->query("INSERT INTO service_about (title,message,product_id,image) VALUES ('$title','$message','$product_id','$filename')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => $title . ' Banner Added Successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
