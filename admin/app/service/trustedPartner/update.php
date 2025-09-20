<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $id = intval($_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $products_id = mysqli_real_escape_string($conn, $_POST['products_id']);
    $existingFileName = $_POST['logo'];

    // ✅ Handle file upload
    if (!empty($_FILES["updatedlogo"]["name"])) {
        // Use helper to upload new image
        $filename = uploadImageService($conn, "updatedlogo", "clients_logos");

        // Delete old file if it exists and is not default
        if (!empty($existingFileName) &&
            file_exists($_SERVER['DOCUMENT_ROOT'] . $existingFileName) &&
            $existingFileName !== "/admin/admin-assets/img/default-program.jpg") {
            unlink($_SERVER['DOCUMENT_ROOT'] . $existingFileName);
        }
    } else {
        // Keep existing image if no new one uploaded
        $filename = $existingFileName;
    }

    // ✅ Validation
    if (empty($name)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }

    // ✅ Check duplicate name (excluding current ID)
    $check = $conn->query("SELECT id FROM clients_logos WHERE name LIKE '$name' AND id <> $id");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
        exit();
    }

    // ✅ Update record
    $update = $conn->query("UPDATE clients_logos SET name = '$name', logo = '$filename', products_id = '$products_id '  WHERE id = $id");
    if ($update) {
        echo json_encode(['status' => 200, 'message' => $name . ' updated successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
?>
