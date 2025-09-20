<?php
if (isset($_POST['title']) && isset($_POST['id'])) {
    require '../../includes/db-config.php';
    require '../../includes/helper.php';

    session_start();

    // Get and sanitize input data
    $id = intval($_POST['id']);
    $category_id = intval($_POST['category_id']);
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
    
    // Check for an existing job with the same title but a different ID
    $check = $conn->query("SELECT id FROM jobs WHERE title LIKE '$title' AND id <> $id");
    if ($check->num_rows > 0) {
        echo json_encode(['status' => 400, 'message' => $title . ' already exists!']);
        exit();
    }

    // Update the job details in the database
    $update = $conn->query("UPDATE jobs SET 
                            category_id = '$category_id', 
                            title = '$title', 
                            description = '$description', 
                            responsibilities = '$responsibilities', 
                            qualifications = '$qualifications', 
                            experience = '$experience', 
                            employment_type = '$employment_type', 
                            location = '$location', 
                            short_location = '$short_location', 
                            salary = '$salary', 
                            schedule = '$schedule' 
                            WHERE id = $id");

    if ($update) {
        echo json_encode(['status' => 200, 'message' => $title . ' updated successfully!']);
    } else {
        echo json_encode(['status' => 400, 'message' => 'Something went wrong!']);
    }
}
?>
