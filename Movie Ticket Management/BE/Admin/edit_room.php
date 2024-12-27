<?php
header('Content-Type: application/json');
require_once '../Common/config.php';
require_once '../Common/database.php';

// Tạo đối tượng Database
$db = new Database();

// Kiểm tra dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomID = isset($_POST['roomID']) ? intval($_POST['roomID']) : null;
    $theaterID = isset($_POST['theaterID']) ? intval($_POST['theaterID']) : null;
    $seatLayout = isset($_POST['seatLayout']) ? $_POST['seatLayout'] : null;

    if (!$theaterID) {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu theaterID']);
        exit();
    }

    if (!$roomID) {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu roomID', 'roomID' => $roomID,
    'theaterID' => $theaterID,]);
        exit();
    }
    
    
    if (!$seatLayout) {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu seatLayout']);
        exit();
    }
    

    // Chuyển đổi layout ghế thành dạng chuỗi JSON
    $seatLayoutJson = $db->link->real_escape_string($seatLayout);
    $query = "UPDATE room SET seatLayout = '$seatLayoutJson' WHERE roomID = '$roomID'AND theaterID = '$theaterID'";

    $result = $db->update($query);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Lưu layout thành công']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Lỗi khi lưu layout hoặc không tìm thấy phòng']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
?>