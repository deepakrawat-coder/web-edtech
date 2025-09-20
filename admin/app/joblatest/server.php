<?php
include('../../includes/db-config.php');
session_start();

## Fetch records
$result_record = "SELECT id, category_id , title, description, responsibilities, qualifications,  status, created_at FROM jobs ORDER BY id DESC";
$results = mysqli_query($conn, $result_record);
$data = array();
$i = 1;
while ($row = mysqli_fetch_assoc($results)) {
  $no = $i++;
  $category_id  = $row['category_id'];
  $categoryQuery = $conn->query("SELECT name FROM job_categories WHERE id = $category_id");
  $categoryArr = $categoryQuery->fetch_assoc();

  $descriptiontext = strlen($row['description']) > 20 ? substr($row['description'], 0, 20) . "..." : $row['description'];
  $responsibilitiestext = strlen($row['responsibilities']) > 20 ? substr($row['responsibilities'], 0, 20) . "..." : $row['responsibilities'];
  $qualificationstext = strlen($row['qualifications']) > 20 ? substr($row['qualifications'], 0, 20) . "..." : $row['qualifications'];



  $data[] = array(
    "No" => $no,
    "ID" => $row['id'],
    "Category_Name" => $categoryArr["name"],
    "Title" => $row['title'],
    "Description" => $descriptiontext,
    "Responsibilities" => $responsibilitiestext,
    "Qualifications" => $qualificationstext,
    "Status" => $row["status"],
    "Created_At" => $row["created_at"],
  );
}
echo json_encode(['data' => $data]);
