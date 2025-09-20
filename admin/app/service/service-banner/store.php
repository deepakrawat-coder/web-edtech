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

    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $highlight_heading = mysqli_real_escape_string($conn, $_POST['highlight_heading']);
    $sub_heading = mysqli_real_escape_string($conn, $_POST['sub_heading']);
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    if (!empty($_FILES["image"]["name"])) {
        $filename = uploadImageService($conn, "image", "service_banner");
    } else {
        // Use default image if nothing uploaded
        $filename = "/admin/admin-assets/images/default-program.jpg";
    }

    // ✅ Validation
    if (empty($heading)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }

    // ✅ Check duplicate
    $check = $conn->query("SELECT id FROM hero_banner WHERE heading LIKE '$heading'");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $heading . ' already exists!']);
        exit();
    }

    // ✅ Insert new record
    $add = $conn->query("INSERT INTO hero_banner (heading,sub_heading,product_id,image,highlight_heading) VALUES ('$heading','$sub_heading','$product_id','$filename','$highlight_heading')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => $heading . ' Banner Added Successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
