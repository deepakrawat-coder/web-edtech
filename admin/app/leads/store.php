<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require '../../includes/db-config.php';
    require '../../includes/helper.php';
    session_start();

    // Santization of  form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Input validation
    if (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($message)) {
        echo json_encode(['status' => 403, 'message' => 'All fields are mandatory!']);
        exit();
    }

    // Combine first name and last name in  name
    $name = $firstname . ' ' . $lastname;

    // Check by  email 
    $check = $conn->query("SELECT id FROM leads WHERE email = '$email'");
    if ($check !== false && $check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => 'Lead with email ' . $email . ' already exists!']);
        exit();
    }

    
    $add = $conn->query("INSERT INTO `leads`(`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$phone', '$message')");
    if ($add) {
        echo json_encode(['status' => 200, 'message' => 'Lead added successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
} else {
    echo json_encode(['status' => 405, 'message' => 'Method Not Allowed']);
}
?>
