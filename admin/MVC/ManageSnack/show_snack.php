<?php
require_once '../database.php';

$db = new Database();

// Lấy danh sách đồ ăn nhẹ
function ShowSnack($db) {
    $sql = "SELECT * FROM snack ORDER BY snackID DESC"; // Truy vấn bảng 'snack'
    $result = $db->select($sql);
    $snacks = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $snacks[] = $row; // Thêm từng hàng vào mảng $snacks
        }
    }
    return $snacks;
}

$response = ShowSnack($db);

// Set content type to JSON
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($response);
?>
