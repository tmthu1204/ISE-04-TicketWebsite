<?php

require_once '../Common/config.php';
require_once '../Common/database.php';


// Tạo đối tượng Database
$snackDB = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;

    // Dữ liệu chuẩn bị để insert vào database
    $data = [
        'name' => $name,
        'price' => $price,
    ];

    // Gọi hàm insertSnack
    $response = insertSnack($snackDB, $data);

    // Đặt content-type là JSON để trả kết quả
    header('Content-Type: application/json');

    // Trả về kết quả dưới dạng JSON
    echo json_encode($response);
}

// Hàm insertSnack để thêm đồ ăn nhẹ vào cơ sở dữ liệu
function insertSnack($db, $data) {
    // Chuẩn bị câu truy vấn SQL
    $query = "INSERT INTO snack (name, price) 
              VALUES (
                  '{$data['name']}', 
                  '{$data['price']}'
              )";

    // Gọi phương thức insert() để thực hiện câu truy vấn
    if ($db->insert($query)) {
        return ['status' => 'success', 'message' => 'Snack inserted successfully'];
    } else {
        return ['status' => 'error', 'message' => $db->getLastError()];
    }
}
?>
