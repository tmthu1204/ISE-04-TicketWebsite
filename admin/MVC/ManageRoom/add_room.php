<?php

require_once('../database.php');

// Tạo đối tượng Database
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy theaterID từ dữ liệu POST
    $theaterID = $_POST['theaterID'];
    // Kiểm tra theaterID có tồn tại không
    if (!$theaterID) {
        // Đặt content-type là JSON để trả kết quả
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Theater ID is required']);
        exit;
    }

    // Chuẩn bị dữ liệu để thêm phòng
    $data = [
        'theaterID' => $theaterID
    ];

    // Gọi hàm insertRoom
    $response = insertRoom($db, $data);

    // Đặt content-type là JSON để trả kết quả
    header('Content-Type: application/json');

    // Trả về kết quả dưới dạng JSON
    echo json_encode($response);
}

// Hàm insertRoom để thêm phòng vào cơ sở dữ liệu
function insertRoom($db, $data) {
    // Chuẩn bị câu truy vấn SQL
    $query = "INSERT INTO room (theaterID) VALUES ('{$data['theaterID']}')";

    // Thực thi câu truy vấn
    if ($db->insert($query)) {
        return ['status' => 'success', 'message' => 'Room added successfully'];
    } else {
        return ['status' => 'error', 'message' => $db->getLastError()];
    }
}
?>
