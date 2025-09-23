<?php
// Allow requests from React frontend
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");
//  "surl" => "http://edtech-web.local/admin/app/service/payments/payment-response",
//         "furl" => "http://edtech-web.local/admin/app/service/payments/payment-response",
// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include($_SERVER['DOCUMENT_ROOT'] . '/admin/includes/db-config.php');

if (!$conn) {
    echo json_encode(['status' => 0, 'message' => 'Database connection failed']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    echo json_encode(['status' => 0, 'message' => 'No data received']);
    exit;
}
if ($data['plan_name'] === 'Free Trial') {
    // print_r($data);die;
    $name    = $conn->real_escape_string($data['name'] ?? '');
    $email   = $conn->real_escape_string($data['email'] ?? '');
    $company_name   = $conn->real_escape_string($data['company_name'] ?? '');
    $number  = $conn->real_escape_string($data['number'] ?? '');
    $address = $conn->real_escape_string($data['message'] ?? '');

    if (!$name || !$email || !$number) {
        echo json_encode(['status' => 0, 'message' => 'All fields are required for Free Trial']);
        exit;
    }

    $sql = $conn->query("
        INSERT INTO demo_user (name, email, phone_no, address,company_name) 
        VALUES ('$name', '$email', '$number', '$address','$company_name')
    ");

    if ($sql) {
        $id = $conn->insert_id;
        $freeDemo = 'freeDemo';

        // include mail logic
        include($_SERVER['DOCUMENT_ROOT'] . '/admin/app/service/payments/freeDemoMail.php');

        // ✅ Return JSON instead of redirect
        echo json_encode(['status' => 1, 'message' => 'Free trial request submitted successfully!']);
        exit;
    } else {
        echo json_encode(['status' => 0, 'message' => 'Error inserting free trial user: ' . $conn->error]);
        exit;
    }
}

$plan_id    = $conn->real_escape_string($data['plan_id'] ?? '');
$plan_name  = $conn->real_escape_string($data['plan_name'] ?? '');
$company_name  = $conn->real_escape_string($data['company_name'] ?? '');
$plan_price = $conn->real_escape_string(intval($data['plan_price']) ?? 0);
$name       = $conn->real_escape_string($data['name'] ?? '');
$email      = $conn->real_escape_string($data['email'] ?? '');
$phone_no     = $conn->real_escape_string($data['number'] ?? '');
$address    = $conn->real_escape_string($data['message'] ?? '');

if (!$plan_id || !$plan_name || !$plan_price || !$name || !$email || !$phone_no || !$address) {
    echo json_encode(['status' => 0, 'message' => 'All fields are required']);
    exit;
}

// Insert order
$sql = "INSERT INTO orders (plan_id, plan_name, plan_price, name, email, phone_no, address, company_name) 
        VALUES ('$plan_id','$plan_name','$plan_price','$name','$email','$phone_no','$address','$company_name')";

if ($conn->query($sql) === TRUE) {
    $order_id = $conn->insert_id;

    // =========================
    // Easebuzz Payment Gateway
    // =========================
    $easebuzz_key  = "3XDM1KLGSE";  // test key
    $easebuzz_salt = "5XFZ6OOLBF";  // test salt
    $txn_id        = "TXN" . $order_id . time();
    $split_accounts = json_encode(array("Edtech Innovate Pvt Ltd." => $plan_price));
    $hash_string = $easebuzz_key . "|" . $txn_id . "|" . $plan_price . "|" . $plan_name . "|" . $name . "|" . $email . "|||||||||||" . $easebuzz_salt;
    $hash = strtolower(hash('sha512', $hash_string));

    $postData = array(
        "key" => $easebuzz_key,
        "txnid" => $txn_id,
        "amount" => $plan_price,
        "productinfo" => $plan_name,
        "firstname" => $name,
        "email" => $email,
        "phone" => $phone_no,
        "surl" => "https://www.edtechinnovate.com/admin/app/service/payments/payment-response",
        "furl" => "https://www.edtechinnovate.com/admin/app/service/payments/payment-response",
        "hash" => $hash,
        "split_payments" => $split_accounts,
    );

    // ✅ Use TEST URL now
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => 'https://pay.easebuzz.in/payment/initiateLink',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($postData),
        CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded"),
    ));
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo json_encode(["status" => 0, "message" => "Easebuzz API error: " . curl_error($ch)]);
        exit;
    }
    curl_close($ch);

    $paymentResponse = json_decode($response, true);
    $easebuzz_response = $conn->real_escape_string($response);

    // ✅ status logic fix
    $status = isset($paymentResponse["data"]) ? 'pending' : 'failed';
    $easebuzz_payment_id = $paymentResponse["data"]["easebuzz_id"] ?? null;

    // ✅ Correct insert into payments
    $conn->query("
        INSERT INTO payments (order_id, txn_id, amount, status, easebuzz_payment_id, easebuzz_response)
        VALUES (
            '$order_id',
            '$txn_id',
            '$plan_price',
            '$status',
            " . ($easebuzz_payment_id ? "'$easebuzz_payment_id'" : "NULL") . ",
            '$easebuzz_response'
        )
    ");

    if (isset($paymentResponse["data"])) {
        echo json_encode([
            "status" => 1,
            "message" => "Order created & payment link generated",
            "order_id" => $order_id,
            "txn_id" => $txn_id,
            "amount" => $plan_price,
            "token" => $paymentResponse["data"] // ✅ unchanged
        ]);
    } else {
        echo json_encode([
            "status" => 0,
            "message" => "Failed to generate payment link",
            "easebuzz_response" => $paymentResponse
        ]);
    }
} else {
    echo json_encode(['status' => 0, 'message' => 'Failed to create order: ' . $conn->error]);
}

$conn->close();
