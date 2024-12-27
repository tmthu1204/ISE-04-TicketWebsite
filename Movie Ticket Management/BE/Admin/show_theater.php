<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

$db = new Database();

// Lấy phim đang chiếu (releaseDate <= ngày hiện tại)
function ShowTheater($db) {
    $sql = "SELECT * FROM theater ORDER BY theaterID ASC";
    $result = $db->select($sql);
    $theater = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $theater[] = $row;
        }
    }
    return $theater;
}

$response = ShowTheater($db);

// Set content type to JSON
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($response);
?>