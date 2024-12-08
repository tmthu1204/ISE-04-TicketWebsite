<?php
require_once 'config.php';
require_once 'database.php';

$db = new Database();

// Lấy phim đang chiếu (releaseDate <= ngày hiện tại)
function getNowShowingMovies($db) {
    $sql = "SELECT * FROM movie WHERE releaseDate <= CURDATE()";
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

// Lấy phim sắp chiếu (releaseDate > ngày hiện tại)
function getUpcomingMovies($db) {
    $sql = "SELECT * FROM movie WHERE releaseDate > CURDATE()";
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

// Fetch movies
$nowShowingMovies = getNowShowingMovies($db);
$upcomingMovies = getUpcomingMovies($db);

// Prepare the data for JSON output
$response = [
    'now_showing' => $nowShowingMovies,
    'upcoming' => $upcomingMovies
];

// Set content type to JSON
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($response);
?>
