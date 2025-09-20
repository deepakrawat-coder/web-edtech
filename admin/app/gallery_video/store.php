<?php
require '../../includes/db-config.php';
require '../../includes/helper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  session_start();

  $video = mysqli_real_escape_string($conn, $_POST['video_links']);
  $position = mysqli_real_escape_string($conn, $_POST['position']);

  
  $valid_positions = ['left', 'right'];
  if (!in_array($position, $valid_positions)) {
    echo json_encode(['status' => 400, 'message' => 'Invalid position selected!']);
    exit;
  }

  $add = $conn->query("INSERT INTO gallery_video (video_link, position) VALUES ('$video', '$position')");
  if ($add) {
    echo json_encode(['status' => 200, 'message' => 'Gallery Video added successfully!']);
  } else {
    echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
  }
}
?>
