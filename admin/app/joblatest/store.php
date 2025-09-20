<?php
require '../../includes/db-config.php';
require '../../includes/helper.php';

if (isset($_POST['title'])) {
    session_start();

    // Sanitize and escape user inputs
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $responsibilities = mysqli_real_escape_string($conn, $_POST['responsibilities']);
    $qualifications = mysqli_real_escape_string($conn, $_POST['qualifications']);
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $employment_type = mysqli_real_escape_string($conn, $_POST['employment_type']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $short_location = mysqli_real_escape_string($conn, $_POST['short_location']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $schedule = mysqli_real_escape_string($conn, $_POST['schedule']);

    // Validate mandatory fields
    if (empty($title) || empty($description)  ) {
        echo json_encode(['status' => 403, 'message' => 'All fields are mandatory!']);
        exit();
    }

    // Insert job into database
    $sql = "INSERT INTO jobs (category_id, title, description, responsibilities, qualifications, experience, employment_type, location,short_location, salary, schedule) VALUES ('$category_id', '$title', '$description', '$responsibilities', '$qualifications', '$experience', '$employment_type', '$location','$short_location', '$salary', '$schedule')";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(['status' => 200, 'message' => 'Job added successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
}
?>
