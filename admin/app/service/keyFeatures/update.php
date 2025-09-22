<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $id = intval($_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $message = mysqli_real_escape_string($conn, $_POST['editor']);
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $existingFileName = $_POST['image'];
    if (!empty($_FILES["updatedKeyFeatures"]["name"])) {
        // Use helper to upload new image
        $filename = uploadImageService($conn, "updatedKeyFeatures", "serviceKeyFeatures");

        // Delete old file if it exists and is not default
        if (
            !empty($existingFileName) &&
            file_exists($_SERVER['DOCUMENT_ROOT'] . $existingFileName) &&
            $existingFileName !== "/admin/admin-assets/img/default-program.jpg"
        ) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $existingFileName);
        }
    } else {
        // Keep existing image if no new one uploaded
        $filename = $existingFileName;
    }
    if (empty($title)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }
    // ✅ Check duplicate name (excluding current ID)
    $check = $conn->query("SELECT id FROM key_features WHERE  title ='$title' AND id <> $id");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $title . ' already exists!']);
        exit();
    }

    // ✅ Update record
    // $update = $conn->query("UPDATE hero_banner SET heading = '$heading', product_id  =>'$product_id',sub_heading=>'$sub_heading','image'=>'$filename' WHERE id = $id");
    $update = $conn->query("UPDATE key_features 
    SET title = '$title',
        product_id = '$product_id',
        message = '$message',
        image = '$filename'
    WHERE id = $id");
    if ($update) {
        echo json_encode(['status' => 200, 'message' => $title . 'Category Plains Updated Successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
