<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $name = mysqli_real_escape_string($conn, $_POST['name']);    
    // ✅ Validation
    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }

    // ✅ Check duplicate
    $check = $conn->query("SELECT id FROM products WHERE name LIKE '$name'");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
        exit();
    }

    // ✅ Insert new record
    $add = $conn->query("INSERT INTO products (name) VALUES ('$name')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => $name . ' Products Added Successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
?>
