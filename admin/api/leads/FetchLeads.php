<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

require '../../includes/db-config.php';
  
$obj = new FetchLeads();
$obj->conn = $conn;
$obj->request = base64_decode($_SERVER['HTTP_X_CUSTOM_DATA'],true);;

try {
    $obj->request = json_decode($obj->request,true);
    $obj->fetchData();
} catch (Exception $e) {
    echo "Error : " . $e->getMessage() . " on line : " . $e->getLine();
} 

class FetchLeads {

    public $conn;
    public $draw;
    public $row;
    public $rowperpage;
    public $orderby;
    public $request;
    public $finRes; 
    public $searchQuery;
    public $totalRecords;
    public $totalRecordwithFilter;
    public $data = [];

    public function setFilterData() {

        $this->draw = $this->request['draw'];
        $this->row = $this->request['start'];
        $this->rowperpage = $this->request['length'] ?? "all"; // Rows display per page

        if (isset($this->request['order'])) {
            $columnIndex = $this->request['order'][0]['column']; // Column index
            $columnName = $this->request['columns'][$columnIndex]['data']; // Column name 
            $columnSortOrder = $this->request['order'][0]['dir']; // asc or desc
        }
        $this->orderby = (isset($columnSortOrder)) ? "ORDER BY $columnName $columnSortOrder" : "ORDER BY id DESC";
        $searchValue = $this->request['searchtext'] ?? "";

        if (!empty($searchValue)) {
            $this->searchQuery = "WHERE (name LIKE '%$searchValue%' OR email LIKE '%$searchValue%' OR phone LIKE '%$searchValue%' OR subject LIKE '%$searchValue%')"; 
        }
    }

    public function fetchData() {

        $this->setFilterData();

        ## Total number of records without filtering
        $all_count = $this->conn->query("SELECT COUNT(ID) as `allcount` FROM leads");
        $records = mysqli_fetch_assoc($all_count);
        $this->totalRecords = $records['allcount'];
        if ($this->rowperpage == "all") {
            $this->rowperpage = $this->totalRecords;
        }

        ## Total number of record with filtering    
        $filter_count = $this->conn->query("SELECT COUNT(ID) as `filtered` FROM leads $this->searchQuery");
        $records = mysqli_fetch_assoc($filter_count);
        $this->totalRecordwithFilter = $records['filtered'];

        ## Fetch Record
        $leadsLists = $this->conn->query("SELECT * FROM leads $this->searchQuery $this->orderby LIMIT $this->row , $this->rowperpage");
        if ($leadsLists->num_rows > 0) {
            while($row = mysqli_fetch_assoc($leadsLists)) {
                $this->data[] = array(
                    "ID" => $row["id"], 
                    "name" => $row["name"],
                    "email" => $row["email"],
                    "phone" => $row['phone'],
                    "subject" => $row['subject'], 
                    "message" => $row['message'],
                    "address" => $row['Address'] ?? "",
                    "employment_status" => $row['Employment_Status'] ?? "",
                    "created_at" => date_format(date_create($row['created_at']),"d-M-Y")
                );
            }
        }

        $this->sendResponse();
    }

    public function sendResponse() {

        $this->finRes = array(
            "draw" => intval($this->draw),
            "iTotalRecords" => $this->totalRecords,
            "iTotalDisplayRecords" => $this->totalRecordwithFilter,
            "aaData" => $this->data
        );
        
        echo json_encode($this->finRes);
    }

}
?>