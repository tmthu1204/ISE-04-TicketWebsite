<?php
require_once '../Common/config.php';
require_once '../Common/database.php';


// Hàm xóa snack
function delete_snack($db, $snackID) {
    // Chuẩn bị câu truy vấn xóa
    $query = "DELETE FROM snack WHERE snackID = '$snackID'";
    // Thực thi câu truy vấn
    $result = $db->delete($query);
    return $result;
}

// Tạo đối tượng Database
$snack = new Database();

// Xác thực snackID từ yêu cầu POST
if (!isset($_POST['snackID']) || !is_numeric($_POST['snackID'])) {
    // Trả về lỗi nếu không hợp lệ
    header('Content-Type: application/json');
    echo json_encode(['status' => 'failure', 'message' => 'Invalid or missing snackID.']);
    exit();
} else {
    // Lấy snackID từ POST
    $snackID = $_POST['snackID'];
}

// Gọi hàm xóa snack
$response = delete_snack($snack, $snackID);

// Thiết lập kiểu phản hồi JSON
header('Content-Type: application/json');

// Trả về phản hồi dạng JSON
if ($response) {
    echo json_encode(['status' => 'success', 'message' => 'Snack deleted successfully.']);
} else {
    echo json_encode(['status' => 'failure', 'message' => 'Failed to delete snack.']);
}
?>
