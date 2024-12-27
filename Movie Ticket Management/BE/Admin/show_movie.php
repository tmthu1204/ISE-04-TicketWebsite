<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

$db = new Database();

// Lấy phim đang chiếu (releaseDate <= ngày hiện tại)
function ShowMovies($db) {
    $sql = "SELECT * FROM movie ORDER BY movieID DESC";
    $result = $db->select($sql);
    $movies = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            // Chuyển đổi description JSON thành mảng
            $description = json_decode($row['description'], true);
            $row['description'] = $description;
            $movies[] = $row;
        }
    }
    return $movies;
}

$response = ShowMovies($db);

// Set content type to JSON
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($response);
?>