<?php
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');
include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/helper.php');
session_start();

## Fetch records
$result_record = "SELECT id, blogs_id, question, answer, status, Created_At FROM blogfaq_service ORDER BY ID DESC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;
while ($row = mysqli_fetch_assoc($results)) {
    $no = $i++;
    $blogs_id = $row['blogs_id'];
    $blogQuery = $conn->query("SELECT Name FROM blogs_service WHERE ID = $blogs_id");
    $blogArr = $blogQuery->fetch_assoc();

    $questiontext = strlen($row['question']) > 20 ? substr($row['question'], 0, 20) . "..." : $row['question'];
    $answertext = strlen($row['answer']) > 20 ? substr($row['answer'], 0, 20) . "..." : $row['answer'];
    

    $data[] = array(
        "No" => $no,
        "ID" => $row['id'],
        "Blog_Name" => $blogArr["Name"],
        "Question" => $questiontext,
        "Answer" => $answertext,
        "Status" => $row["status"],
        "Created_At" => $row["Created_At"],
    );
}
echo json_encode(['data' => $data]);
?>

