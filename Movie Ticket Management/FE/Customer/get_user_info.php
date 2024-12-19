<?php
session_start();

require_once 'database.php';

$db = new Database();

// Check if customer is logged in
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'customer') {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Customer not logged in"]);
    exit;
}

$userId = $_SESSION["user"]["id"];
   
// Truy vấn cơ sở dữ liệu
$query = "SELECT username, email FROM customer WHERE customerID = $userId";
$result = $db->select($query);

if ($result) {
    $user = $result->fetch_assoc();
    echo json_encode(['success' => true, 'user' => $user]);
} else {
    echo json_encode(['success' => false, 'message' => 'Không tìm thấy thông tin người dùng!']);
}



?>
