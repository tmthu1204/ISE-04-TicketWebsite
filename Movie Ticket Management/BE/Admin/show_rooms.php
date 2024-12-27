<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

$db = new Database();

// Lấy phim đang chiếu (releaseDate <= ngày hiện tại)
function ShowRoom($db, $theaterID) {
    $sql = "SELECT * FROM room  WHERE theaterID = $theaterID ORDER BY roomID ASC";
    $result = $db->select($sql);
    $room = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $room[] = $row;
        }
    }
    return $room;
}

$theaterID = isset($_GET['theaterID']) ? $_GET['theaterID'] : null;

// Nếu không có theaterID, trả về lỗi
if (!$theaterID) {
    http_response_code(400); // Mã lỗi Bad Request
    echo json_encode(['error' => 'Missing theaterID parameter']);
    exit();
}

$response = ShowRoom($db, $theaterID);

// Set content type to JSON
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($response);
?>