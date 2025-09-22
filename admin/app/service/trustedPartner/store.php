<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // session_start();
    // print_r($_POST);
    // die;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $product_id = mysqli_real_escape_string($conn, $_POST['products_id']);

    // ✅ Handle file upload (field name: "logo")
    if (!empty($_FILES["image"]["name"])) {
        $filename = uploadImageService($conn, "image", "clients_logos");
    } else {
        // Use default image if nothing uploaded
        $filename = "/admin/admin-assets/images/default-program.jpg";
    }

    // ✅ Validation
    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }

    // ✅ Check duplicate
    $check = $conn->query("SELECT id FROM clients_logos WHERE name LIKE '$name'");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
        exit();
    }

    // ✅ Insert new record
    $add = $conn->query("INSERT INTO clients_logos (name, logo,products_id) VALUES ('$name', '$filename','$product_id')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => $name . ' Client Logo Added Successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
