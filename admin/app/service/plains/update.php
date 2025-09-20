<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();

    $id = intval($_POST['id']);
    $category_plain_id = mysqli_real_escape_string($conn, $_POST['category_plain_id']);
    $actual_price      = mysqli_real_escape_string($conn, $_POST['actual_price']);
    $discout_price     = mysqli_real_escape_string($conn, $_POST['discout_price']);
    $plain_type        = mysqli_real_escape_string($conn, $_POST['plain_type']);

    // ✅ Build features JSON
    $featuresArr = [];
    if (!empty($_POST['features']) && is_array($_POST['features'])) {
        foreach ($_POST['features'] as $index => $featureText) {
            $status = isset($_POST['feature_status'][$index]) ? intval($_POST['feature_status'][$index]) : 0;
            if (!empty(trim($featureText))) {
                $featuresArr[] = [
                    'feature' => trim($featureText),
                    'status'  => $status
                ];
            }
        }
    }
    $featuresJson = json_encode($featuresArr, JSON_UNESCAPED_UNICODE);

    // ✅ Validation
    if (empty($category_plain_id)) {
        echo json_encode(['status' => 403, 'message' => 'Product is mandatory!']);
        exit();
    }
    if (empty($actual_price)) {
        echo json_encode(['status' => 403, 'message' => 'Actual price is mandatory!']);
        exit();
    }
    if (empty($plain_type)) {
        echo json_encode(['status' => 403, 'message' => 'Plain type is mandatory!']);
        exit();
    }

    // ✅ Update query
    $update = $conn->query("
        UPDATE plains 
        SET plains_category_id = '$category_plain_id',
            actual_price       = '$actual_price',
            discout_price      = '$discout_price',
            plain_type         = '$plain_type',
            key_features           = '$featuresJson'
        WHERE id = $id
    ");

    if ($update) {
        echo json_encode(['status' => 200, 'message' => 'Plain updated successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
?>
