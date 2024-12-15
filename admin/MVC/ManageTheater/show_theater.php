<?php
require_once 'database.php';

$db = new Database();

// Lấy phim đang chiếu (releaseDate <= ngày hiện tại)
function ShowTheater($db) {
    $sql = "SELECT * FROM theater ORDER BY theaterID DESC";
    $result = $db->select($sql);
    $theater = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            // Chuyển đổi description JSON thành mảng
            $description = json_decode($row['description'], true);
            $row['description'] = $description;
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