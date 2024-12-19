<?php
session_start();
include 'database.php';  // Bao gồm tệp cấu hình, nơi DB_HOST, DB_USER, DB_PASS, DB_NAME được định nghĩa

// Tạo đối tượng kết nối với cơ sở dữ liệu
$db = new Database();

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'customer') {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Customer not logged in"]);
    exit;
}

$userID = $_SESSION["user"]["id"];

// Câu truy vấn SQL
$sql = "
    SELECT t.transactionID, m.title AS movieTitle, t.seatsBooked, t.paymentInfo, t.snack, t.snackAmount, t.ticketAmount, th.name AS theaterName
    FROM transaction t
    JOIN customer c ON t.customerID = c.customerID
    JOIN showtime s ON t.showtimeID = s.showtimeID
    JOIN movie m ON s.movieID = m.movieID
    JOIN theater th ON s.theaterID = th.theaterID
    WHERE c.customerID = $userID
";

// Thực thi câu truy vấn và lấy kết quả
$result = $db->select($sql);

$response = [];
$uniqueTransactions = []; // Mảng lưu các giao dịch duy nhất

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $transactionID = $row['transactionID']; // Giả sử mỗi giao dịch có một transactionID

        if (!isset($uniqueTransactions[$transactionID])) {
            // Nếu giao dịch chưa được thêm vào mảng
            $uniqueTransactions[$transactionID] = true;

            // Đặt lại snackNames cho giao dịch mới
            $snackNames = [];

            $snackDetails = ($row['snack'] !== null) ? json_decode($row['snack'], true) : [];

            // Nếu snackDetails là một mảng hợp lệ, duyệt qua các phần tử
            if (is_array($snackDetails)) {
                foreach ($snackDetails as $snackID => $quantity) {
                    // Truy vấn lấy tên snack
                    $snackNameQuery = "SELECT name FROM snack WHERE snackID = $snackID";
                    $snackResult = $db->select($snackNameQuery);
                    if ($snackResult) {
                        $snackName = $snackResult->fetch_assoc()['name'];
                        $snackNames[$snackName] = $quantity;
                    }
                }
            }

            // Thêm thông tin giao dịch vào mảng response
            $response[] = [
                "theaterName" => $row['theaterName'],
                "movieTitle" => $row['movieTitle'],
                "seatsBooked" => json_decode($row['seatsBooked'], true),
                "paymentInfo" => json_decode($row['paymentInfo'], true),
                "snackDetails" => $snackNames,
                "total" => $row['snackAmount'] + $row['ticketAmount']
            ];
        }
    }
    // Trả về kết quả dưới dạng JSON
    echo json_encode($response);
} else {
    // Nếu không có kết quả từ truy vấn
    echo json_encode([]);
}

?>
