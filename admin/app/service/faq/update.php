



<?php
if (isset($_POST['id'])) {
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
  session_start();
  // echo ('<pre>');
  // print_r($_POST);
  // die;
  $id = intval($_POST['id']);
  $products_id = mysqli_real_escape_string($conn, $_POST['products_id']);
  $questions = mysqli_real_escape_string($conn, $_POST['questions']);
  $answers = mysqli_real_escape_string($conn, $_POST['answers']);

  // if (empty($id) || empty($blog_id) || empty($questions) || empty($answers)) {
  //   echo json_encode(['status' => 403, 'message' => 'All fields are mandatory!']);
  //   exit();
  // }

  $add = $conn->query("UPDATE `faq_service` SET `products_id` = '$products_id',`questions`='$questions',`answers`='$answers' WHERE ID = $id");
  if ($add) {
    echo json_encode(['status' => 200, 'message' => 'FAQ updated successfully!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
?>
