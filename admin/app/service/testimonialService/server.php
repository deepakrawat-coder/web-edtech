<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
session_start();

// Fetch records
$sql = "SELECT id, name, image, status, products_id, title, message, created_at 
        FROM testimonial_service 
        ORDER BY id ASC";

$results = mysqli_query($conn, $sql);

$data = [];
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
    $program_name = '';
    if (!empty($row['products_id'])) {
        $productQuery = $conn->query("SELECT name FROM products WHERE id = '".intval($row['products_id'])."' LIMIT 1");
        if ($productQuery && $productQuery->num_rows > 0) {
            $product = mysqli_fetch_assoc($productQuery);
            $program_name = $product['name'];
        }
    }

    // Optional: truncate message to 80 characters
    $message = $row['message'];
    $maxLength = 80;
    if ($message && strlen($message) > $maxLength) {
        $message = substr($message, 0, $maxLength) . '...';
    }

    $data[] = [
        "No"          => $i++,
        "ID"          => $row['id'],
        "Name"        => $row['name'],
        "ProgramName" => $program_name,
        "title"       => $row['title'],
        "Image"       => $row['image'],
        "Message"     => $message,
        "Status"      => $row['status'],
        "Created_At"  => $row['created_at'],
    ];
}

echo json_encode(['data' => $data]);
