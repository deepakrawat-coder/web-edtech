<?php
ini_set('display_errors', 1);

if (isset($_POST['username']) && isset($_POST['password'])) {
  require '../../includes/db-config.php';
  session_start();

  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  if (empty($username) || empty($password)) {
    echo json_encode(['status' => 403, 'message' => 'Fields cannot be empty!']);
    session_destroy();
    exit();
  }

  $check = $conn->query("SELECT * FROM users WHERE Code = '$username' AND Password = AES_ENCRYPT('$password','60ZpqkOnqn0UQQ2MYTlJ') $logged_in_users $not_able_to_logged_in_users");

  if ($check->num_rows > 0) {
    $user_details = mysqli_fetch_assoc($check);
    if ($user_details['Status'] == 1) {
      foreach ($user_details as $key => $user_detail) {
        $_SESSION[$key] = $user_detail;
      }
      // echo json_encode(['status' => 200, 'message' => 'Welcome ' . $user_details['Name'], 'url' => '/admin/streams/']);
      echo json_encode(['status' => 200, 'message' => 'Welcome ' . $user_details['Name'], 'url' => '/admin/blogs.php']);

    } else {
      echo json_encode(['status' => 403, 'message' => 'Access denied! Please contact administrator.']);
      session_destroy();
    }
  } else {
    $check_online_cenetr = $conn->query("SELECT * FROM Online_Center_Partner WHERE Mobile = '$username' AND Password = md5('$password') AND Status=1");
    if ($check_online_cenetr->num_rows > 0) {
      $user_details = mysqli_fetch_assoc($check_online_cenetr);
      
      if ($user_details['Status'] == 1) {
        foreach ($user_details as $key => $user_detail) {
          $_SESSION[$key] = $user_detail;
        }
        echo json_encode(['status' => 200, 'message' => 'Welcome ' . $user_details['Name'], 'url' => '/admin/center-online-partner']);

      } else {
        echo json_encode(['status' => 403, 'message' => 'Access denied! Please contact administrator.']);
        session_destroy();
      }
    } else {
      echo json_encode(['status' => 400, 'message' => 'Invalid credentials!']);
      session_destroy();
    }
  }
} else {
  echo json_encode(['status' => 403, 'message' => 'Forbidden']);
  session_destroy();
}
