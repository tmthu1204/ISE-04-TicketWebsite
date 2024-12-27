<?php
header('Content-Type: application/json');
require_once '../Common/config.php';
require_once '../Common/database.php';

// Khởi tạo đối tượng Database
$db = new Database();

// Lấy showtimeID từ request
$showtimeID = isset($_POST['showtimeID']) ? $_POST['showtimeID'] : null;
if ($showtimeID) {
        // Xóa các bản ghi liên quan trong bảng seatshowtime
    $deleteSeatsQuery = "
    DELETE FROM seatshowtime
    WHERE showtimeID = $showtimeID 
    OR movieID IN (SELECT movieID FROM showtime WHERE showtimeID = $showtimeID)
    OR theaterID IN (SELECT theaterID FROM showtime WHERE showtimeID = $showtimeID)
    OR roomID IN (SELECT roomID FROM showtime WHERE showtimeID = $showtimeID)
    ";
    $db->delete($deleteSeatsQuery);

    // Sau đó xóa suất chiếu trong bảng showtime
    $deleteShowtimeQuery = "DELETE FROM showtime WHERE showtimeID = $showtimeID";
    $deleteResult = $db->delete($deleteShowtimeQuery);

    if ($deleteResult) {
        echo json_encode(['success' => true, 'message' => 'Suất chiếu đã được xóa thành công.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Có lỗi khi xóa suất chiếu.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Không tìm thấy suất chiếu cần xóa.']);
}
?>
