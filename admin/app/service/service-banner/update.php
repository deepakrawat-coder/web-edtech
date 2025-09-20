<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $id = intval($_POST['id']);
    $heading = mysqli_real_escape_string($conn, $_POST['heading']);
    $highlight_heading = mysqli_real_escape_string($conn, $_POST['highlight_heading']);
    $sub_heading = mysqli_real_escape_string($conn, $_POST['sub_heading']);
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $existingFileName = $_POST['image'];
    if (!empty($_FILES["updatedbanner"]["name"])) {
        // Use helper to upload new image
        $filename = uploadImageService($conn, "updatedbanner", "service_banner");

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
    if (empty($heading)) {
        echo json_encode(['status' => 403, 'message' => 'Name is mandatory!']);
        exit();
    }
    // ✅ Check duplicate name (excluding current ID)
    $check = $conn->query("SELECT id FROM hero_banner WHERE  heading ='$heading' AND id <> $id");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
        exit();
    }

    // ✅ Update record
    // $update = $conn->query("UPDATE hero_banner SET heading = '$heading', product_id  =>'$product_id',sub_heading=>'$sub_heading','image'=>'$filename' WHERE id = $id");
   $update = $conn->query("UPDATE hero_banner 
    SET heading = '$heading',
        product_id = '$product_id',
        sub_heading = '$sub_heading',
        image = '$filename',
        highlight_heading='$highlight_heading'
    WHERE id = $id");
    if ($update) {
        echo json_encode(['status' => 200, 'message' => $heading . 'Category Plains Updated Successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
