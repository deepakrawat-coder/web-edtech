<?php
if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id'])) {
    include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
    session_start();

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $check = $conn->query("SELECT ID FROM testimonial_service WHERE ID = $id");
    if ($check->num_rows > 0) {
        $delete = $conn->query("DELETE FROM testimonial_service WHERE ID = $id");
        if ($delete) {
            echo json_encode(['status' => 200, 'message' => 'Client Logo Deleted Successfully!']);
        } else {
            echo json_encode(['status' => 302, 'message' => 'Something went wrong!']);
        }
    } else {
        echo json_encode(['status' => 302, 'message' => 'Logo not exists!']);
    }
}
