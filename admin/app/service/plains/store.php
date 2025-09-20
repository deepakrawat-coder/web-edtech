<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    // print_r($_POST);
    // die;
    $category_plain_id = mysqli_real_escape_string($conn, $_POST['category_plain_id']);
    $actual_price = mysqli_real_escape_string($conn, $_POST['actual_price']);
    $discout_price = mysqli_real_escape_string($conn, $_POST['discout_price']);
    $plain_type = mysqli_real_escape_string($conn, $_POST['plain_type']);
    $features = $_POST['features'];
    $statuses = $_POST['feature_status'];
    $featuresData = [];
    foreach ($features as $i => $feature) {
        $featuresData[] = [
            "status"  => $statuses[$i] ?? 0,
            "feature" => $feature

        ];
    }
    $featuresJson = json_encode($featuresData, JSON_UNESCAPED_UNICODE);   

    // ✅ Check duplicate
    // $check = $conn->query("SELECT id FROM plains WHERE name LIKE '$name'");
    // if ($check !== false && $check->num_rows > 0) {
    //     echo json_encode(['status' => 400, 'message' => $name . ' already exists!']);
    //     exit();
    // }

    // ✅ Insert new record
    $add = $conn->query("INSERT INTO plains (plains_category_id , actual_price,discout_price,key_features,plain_type) VALUES ('$category_plain_id', '$actual_price','$discout_price','$featuresJson','$plain_type')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => ' Plains Added Successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
