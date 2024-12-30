<?php

require_once '../../Common/config.php';
require_once '../../Common/database.php';

$config = [
    "app_id" => 2553,
    "key1" => "PcY4iZIKFCIdgZvA6ueMcMHHUbRLYjPL",
    "key2" => "kLtgPl8HHhfvMuDHPwKfgfsY4Ydm9eIz",
    "endpoint" => "https://sb-openapi.zalopay.vn/v2/create"
];

session_start();

// Kiểm tra sự tồn tại của các khóa trong $_SESSION
$ticketAmount = isset($_SESSION['ticketAmount']) ? (int)$_SESSION['ticketAmount'] : 0;
$snackAmount = isset($_SESSION['snackAmount']) ? (int)$_SESSION['snackAmount'] : 0;
$transactionID = isset($_SESSION['transactionID']) ? $_SESSION['transactionID'] : 'unknown';
$customerID = isset($_SESSION['customerID']) ? $_SESSION['customerID'] : 'unknown';

// Calculate total amount
$totalAmount = $ticketAmount + $snackAmount;

// Initialize Database instance
$db = new Database();

// Fetch username from the database
$username = 'unknown_user';
if ($customerID !== 'unknown') {
    $stmt = $db->link->prepare("SELECT username FROM customer WHERE customerID = ?");
    $stmt->bind_param("s", $customerID);
    $stmt->execute();
    $stmt->bind_result($dbUsername);
    if ($stmt->fetch()) {
        $username = $dbUsername;
    }
    $stmt->close();
}

$embeddata = json_encode([
    'redirecturl' => 'http://localhost/Accounts/FE/Customer/payment-res.html',
    'customerID' => $customerID,
    'ticketAmount' => $ticketAmount,
    'snackAmount' => $snackAmount,
    'transactionID' => $transactionID
]);

$items = '[]'; // Merchant's data
$order = [
    "app_id" => $config["app_id"],
    "app_time" => round(microtime(true) * 1000), // milliseconds
    "app_trans_id" => date("ymd") . "_" . $transactionID, // Unique transaction ID
    "app_user" => $username, // Replace with customer's username
    "item" => $items,
    "embed_data" => $embeddata,
    "amount" => 200000, // Replace with calculated total amount
    "description" => "Lazada - Payment for the order #$transactionID"
];

// Generate MAC
$data = $order["app_id"] . "|" . $order["app_trans_id"] . "|" . $order["app_user"] . "|" . $order["amount"]
    . "|" . $order["app_time"] . "|" . $order["embed_data"] . "|" . $order["item"];
$order["mac"] = hash_hmac("sha256", $data, $config["key1"]);

// Make API request
$context = stream_context_create([
    "http" => [
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($order)
    ]
]);

$resp = file_get_contents($config["endpoint"], false, $context);
$result = json_decode($resp, true);

if ($result['return_code'] == 1) {
    // Redirect to the payment confirmation page
    header('Location: ' . $result['order_url']);
    exit;
} else {
    // Handle errors from ZaloPay
    foreach ($result as $key => $value) {
        echo "$key: $value<br>";
    }
}

$db->link->close();

?>
