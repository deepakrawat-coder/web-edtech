<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');

session_start();

## Fetch records
$result_record = "SELECT id,products_id , questions, answers, status, Created_At FROM faq_service ORDER BY ID ASC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;
while ($row = mysqli_fetch_assoc($results)) {
    $no = $i++;
    $program_name = '';
    if (!empty($row['products_id'])) {
        $productQuery = $conn->query("SELECT name FROM products WHERE id = '" . intval($row['products_id']) . "' LIMIT 1");
        if ($productQuery && $productQuery->num_rows > 0) {
            $product = mysqli_fetch_assoc($productQuery);
            $program_name = $product['name'];
        }
    }
    $questiontext = strlen($row['questions']) > 20 ? substr($row['questions'], 0, 20) . "..." : $row['questions'];
    $answertext = strlen($row['answers']) > 20 ? substr($row['answers'], 0, 20) . "..." : $row['answers'];
    $data[] = array(
        "No" => $no,
        "ID" => $row['id'],
        "ProgramName" => $program_name,
        "Question" => $questiontext,
        "Answer" => $answertext,
        "Status" => $row["status"],
        "Created_At" => $row["Created_At"],
    );
}
echo json_encode(['data' => $data]);
