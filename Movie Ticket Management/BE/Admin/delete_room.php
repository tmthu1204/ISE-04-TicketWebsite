<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

// Hàm xóa phòng
function delete_room($db, $roomID) {
    // Truy vấn xóa phòng
    $query = "DELETE FROM room WHERE roomID = '$roomID'";
    $result = $db->delete($query); // Gọi hàm delete từ lớp Database
    return $result;
}

// Khởi tạo đối tượng cơ sở dữ liệu
$database = new Database();

// Kiểm tra và xác minh roomID
if (!isset($_POST['roomID']) || !is_numeric($_POST['roomID'])) {
    // Nếu roomID không hợp lệ, trả về lỗi
    header('Content-Type: application/json');
    echo json_encode(['status' => 'failure', 'message' => 'Invalid or missing roomID.']);
    exit();
} else {
    // Lấy roomID từ POST
    $roomID = $_POST['roomID'];
}

// Gọi hàm để xóa phòng
$response = delete_room($database, $roomID);

// Đặt header loại phản hồi JSON
header('Content-Type: application/json');

// Trả về kết quả dưới dạng JSON
if ($response) {
    echo json_encode(['status' => 'success', 'message' => 'Room deleted successfully.']);
} else {
    echo json_encode(['status' => 'failure', 'message' => 'Failed to delete room.']);
}
?>
