<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $products_id = mysqli_real_escape_string($conn, $_POST['products_id']);
    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }

    // ✅ Check duplicate name (excluding current ID)
    $check = $conn->query("SELECT id FROM plains_category WHERE name LIKE '$name' AND id <> $id");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
        exit();
    }

    // ✅ Update record
    $update = $conn->query("UPDATE plains_category SET name = '$name', products_id  ='$products_id' WHERE id = $id");
    if ($update) {
        echo json_encode(['status' => 200, 'message' => $name . 'Category Plains Updated Successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
