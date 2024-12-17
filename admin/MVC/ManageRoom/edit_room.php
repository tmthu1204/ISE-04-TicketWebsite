<?php
header('Content-Type: application/json');
include "../database.php"; // Import lớp Database

// Tạo đối tượng Database
$db = new Database();

// Kiểm tra dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roomID = isset($_POST['roomID']) ? $_POST['roomID'] : null;
    $seatLayout = isset($_POST['seatLayout']) ? $_POST['seatLayout'] : null;

    if (!$roomID || !$seatLayout) {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu roomID hoặc seatLayout']);
        exit();
    }

    // Chuyển đổi layout ghế thành dạng chuỗi JSON
    $seatLayoutJson = $db->link->real_escape_string($seatLayout);
    $query = "UPDATE room SET seatLayout = '$seatLayoutJson' WHERE roomID = '$roomID'";

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