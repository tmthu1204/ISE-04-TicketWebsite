<?php
session_start();
header('Content-Type: application/json');
require_once '../Common/config.php';
require_once '../Common/database.php';

// Kiểm tra nếu có transactionID trong session
if (!isset($_SESSION['transactionID'])) {
    echo "Không tìm thấy thông tin giao dịch.";
    exit();
}

// Lấy transactionID từ session
$transactionID = $_SESSION['transactionID'];

// Khởi tạo đối tượng Database
$db = new Database();

// Truy vấn thông tin giao dịch từ bảng 'transactions' bằng transactionID
$query = "SELECT 
        t.seatsBooked, t.snack, t.snackAmount, t.ticketAmount, 
        t.showtimeID, s.movieID, s.theaterID, s.roomID, s.startTime,
        m.title, m.description, m.duration
        FROM transaction t 
        INNER JOIN showtime s ON t.showtimeID = s.showtimeID
        INNER JOIN movie m ON s.movieID = m.movieID
        WHERE t.transaction_id = '$transactionID'";

$result = $db->select($query);

// Kiểm tra kết quả truy vấn và trả về dữ liệu dưới dạng JSON
if ($result) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "Không tìm thấy thông tin giao dịch.";
}
?>
