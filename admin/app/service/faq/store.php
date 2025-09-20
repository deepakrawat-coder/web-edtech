<?php
if (isset($_POST['questions'], $_POST['answers'], $_POST['products_id'])) {
   include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');

    session_start();

    $products_id = mysqli_real_escape_string($conn, $_POST['products_id']);
    $question = mysqli_real_escape_string($conn, $_POST['questions']);
    $answer = mysqli_real_escape_string($conn, $_POST['answers']);

    if (empty($question) || empty($answer)) {
        echo json_encode(['status'=>403, 'message'=>'All fields are mandatory!']);
        exit();
    } 

    // Insert the new FAQ entry
    $insertQuery = "INSERT INTO `faq_service`(`products_id`, `questions`, `answers`) VALUES ('$products_id', '$question', '$answer')";
    $insertResult = $conn->query($insertQuery);
    if ($insertResult) {
        echo json_encode(['status'=>200, 'message'=>'FAQ added successfully!']);
    } else {
        echo json_encode(['status'=>400, 'message'=>'Failed to add FAQ!']);
    }
} else {
    echo json_encode(['status'=>400, 'message'=>'Invalid request!']);
}
?>
