<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

// Khởi tạo đối tượng Database
$db = new Database();

// Lấy movieID từ request
$movieID = isset($_GET['movieID']) ? $_GET['movieID'] : null;
$theaterID = isset($_GET['theaterID']) ? $_GET['theaterID'] : null;

if ($movieID) {
    // Truy vấn danh sách suất chiếu của phim từ bảng showtime
    $query = "SELECT * FROM showtime WHERE movieID = $movieID AND theaterID = $theaterID ORDER BY startTime ASC";
    $result = $db->select($query);

    if ($result) {
        $showtimes = [];
        while ($row = $result->fetch_assoc()) {
            $showtimes[] = $row;  // Lưu kết quả vào mảng
        }
        // Trả về dữ liệu dưới dạng JSON
        echo json_encode($showtimes);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>
