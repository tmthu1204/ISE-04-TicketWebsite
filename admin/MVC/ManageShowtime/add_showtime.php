<?php
include "../database.php";
header('Content-Type: application/json');

// Lấy dữ liệu từ phía client
$data = json_decode(file_get_contents('php://input'), true);
$theaterID = intval($data['theaterID']);
$movieID = intval($data['movieID']);
$roomID = intval($data['roomID']);
$startTime = $data['startTime'];

// Kiểm tra dữ liệu đầu vào
if ($theaterID <= 0 || $movieID <= 0 || $roomID <= 0 || !$startTime) {
    echo json_encode(['success' => false, 'message' => 'Dữ liệu đầu vào không hợp lệ']);
    exit;
}

// Khởi tạo kết nối cơ sở dữ liệu
$db = new Database();

// Lấy thông tin seatLayout từ bảng room
$seatQuery = "SELECT seatLayout FROM room WHERE roomID = $roomID";
$seatResult = $db->select($seatQuery);

if ($seatResult) {
    // Lấy seatLayout từ kết quả truy vấn
    $seatLayout = $seatResult->fetch_assoc()['seatLayout'];
    
    $isAvailable = $seatLayout;


// Chèn dữ liệu vào bảng showtime
$queryShowtime = "INSERT INTO showtime (movieID, theaterID, roomID, startTime) 
                  VALUES ($movieID, $theaterID, $roomID, '$startTime')";

if ($db->insert($queryShowtime)) {
    // Lấy showtimeID vừa được chèn
    $showtimeID = $db->link->insert_id;

    // Chèn dữ liệu vào bảng seatShowtime
    $querySeatShowtime = "INSERT INTO seatshowtime (roomID, showtimeID, movieID, theaterID, isAvailable) 
                          VALUES ($roomID, $showtimeID, $movieID, $theaterID, '$isAvailable')";

    if ($db->insert($querySeatShowtime)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Có lỗi khi lưu dữ liệu vào seatShowtime']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Có lỗi khi lưu dữ liệu vào showtime']);
}
} else {
echo json_encode(['success' => false, 'message' => 'Không tìm thấy thông tin phòng chiếu']);
}
?>
