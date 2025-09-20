<?php
if (isset($_POST['name']) && isset($_POST['id'])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

    session_start();

    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = !empty($_POST['slug']) ? mysqli_real_escape_string($conn, $_POST['slug']) : baseurl($name);
    $products_id = intval($_POST['Products_ID']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_key = mysqli_real_escape_string($conn, $_POST['meta_key']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $updated_file = $_POST['updated_file'] ?? '';

    // Handle photo
    if (!empty($_FILES["photo"]["name"])) {
        $photo = uploadImageService($conn, "photo", "blogs_service");
    } else {
        $photo = $updated_file;
    }

    // Duplicate check
    $check = $conn->query("SELECT ID FROM blogs_service WHERE Name = '$name' AND ID <> $id");
    if ($check && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
        exit();
    }

    // Update query
    $update = $conn->query("
        UPDATE `blogs_service` 
        SET 
            `Name` = '$name',
            `Slug` = '$slug',
            `Photo` = '$photo',
            `Description` = '$description',
            `Content` = '$content',
            `Meta_Title` = '$meta_title',
            `Meta_Key` = '$meta_key',
            `Meta_Description` = '$meta_description',
            `Products_ID` = '$products_id'
        WHERE ID = $id
    ");

    if ($update) {
        echo json_encode(['status' => 200, 'message' => $name . ' updated successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
