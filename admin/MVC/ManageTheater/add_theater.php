<?php

require_once('../database.php');
;
// Tạo đối tượng Database
$theater = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $name = $_POST['name'];
    $location = $_POST['location'] ?? '';

    // Dữ liệu chuẩn bị để insert vào database
    $data = [
        'name' => $name,
        'location' => $location,
    ];

    // Gọi hàm insertTheater
    $response = insertTheater($theater, $data);

    // Đặt content-type là JSON để trả kết quả
    header('Content-Type: application/json');

    // Trả về kết quả dưới dạng JSON
    echo json_encode($response);
}

// Hàm insertTheater để thêm rạp vào cơ sở dữ liệu
function insertTheater($db, $data) {
    // Chuẩn bị câu truy vấn SQL
    $query = "INSERT INTO theater (name, location) 
                VALUES (
                    '{$data['name']}', 
                    " . ($data['location'] ? "'{$data['location']}'" : "NULL") . "
                )";
   
    // Gọi phương thức insert() để thực hiện câu truy vấn
    if ($db->insert($query)) {
        return ['status' => 'success', 'message' => 'Theater inserted successfully'];
    } else {
        return ['status' => 'error', 'message' => $db->getLastError()];
    }
}
?>
