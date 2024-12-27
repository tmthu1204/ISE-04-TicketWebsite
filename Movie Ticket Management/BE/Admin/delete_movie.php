<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

function delete_movie($db, $movieID){
    $query = "DELETE FROM movie WHERE movieID = '$movieID'";
    $result = $db->delete($query);
    return $result;
}


$movie = new Database();
if (!isset($_POST['movieID']) || !is_numeric($_POST['movieID'])) {
    // Nếu không hợp lệ, trả về thông báo lỗi
    header('Content-Type: application/json');
    echo json_encode(['status' => 'failure', 'message' => 'Invalid or missing movieID.']);
    exit();
} else {
    // Lấy movieID từ POST
    $movieID = $_POST['movieID'];
}

// Gọi hàm xóa phim
$response = delete_movie($movie, $movieID);

// Thiết lập kiểu dữ liệu trả về là JSON
header('Content-Type: application/json');

// Trả về phản hồi dưới dạng JSON
echo json_encode(['status' => 'success', 'message' => 'Movie deleted successfully.']);
?>