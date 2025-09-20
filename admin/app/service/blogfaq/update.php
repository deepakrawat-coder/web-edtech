



<?php
if (isset($_POST['id'])) {
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
  include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');
  session_start();

  $id = intval($_POST['id']);
  $blog_id = mysqli_real_escape_string($conn, $_POST['blog_id']);
  $questions = mysqli_real_escape_string($conn, $_POST['question']);
  $answers = mysqli_real_escape_string($conn, $_POST['answer']);

  if (empty($id) || empty($blog_id) || empty($questions) || empty($answers)) {
    echo json_encode(['status' => 403, 'message' => 'All fields are mandatory!']);
    exit();
  }

  $add = $conn->query("UPDATE `blogfaq_service` SET `blogs_id` = '$blog_id',`question`='$questions',`answer`='$answers' WHERE ID = $id");
  if ($add) {
    echo json_encode(['status' => 200, 'message' => 'FAQ updated successfully!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
?>
