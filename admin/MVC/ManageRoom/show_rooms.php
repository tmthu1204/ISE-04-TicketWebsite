<?php
require_once '../database.php';

$db = new Database();

// Lấy phim đang chiếu (releaseDate <= ngày hiện tại)
function ShowRoom($db) {
    $sql = "SELECT * FROM room ORDER BY roomID ASC";
    $result = $db->select($sql);
    $room = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $room[] = $row;
        }
    }
    return $room;
}

$response = ShowRoom($db);

// Set content type to JSON
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($response);
?>