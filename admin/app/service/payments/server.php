<?php
// Include database configuration
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
session_start();

// Fetch records
$result_record = "
    SELECT orders.plan_name, orders.name, orders.email, orders.number, orders.status, payments.txn_id, payments.updated_at 
    FROM `orders` 
    LEFT JOIN payments ON payments.order_id = orders.id 
    ORDER BY orders.id ASC
";

$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;

while ($row = mysqli_fetch_assoc($results)) {
    // Format the date
    $updated_at = '';
    if (!empty($row['updated_at'])) {
        $date = new DateTime($row['updated_at']);
        $updated_at = $date->format('d M Y (h:i A)'); // e.g., 18 Sep 2025 (02:30 PM)
    }

    $data[] = array(
        'no' => $i++, // Serial number
        'plan_name' => $row['plan_name'],
        'name' => $row['name'],
        'email' => $row['email'],
        'number' => $row['number'],
        'status' => $row['status'],
        'txn_id' => $row['txn_id'],
        'updated_at' => $updated_at
    );
}

// Return JSON response
echo json_encode(['data' => $data]);
