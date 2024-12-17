<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

// Fetch the showtime data
$showtimeID = isset($_GET['showtimeID']) ? intval($_GET['showtimeID']) : 0;

if ($showtimeID === 0) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Invalid showtimeID"]);
    exit;
}

// Fetch the showtime details
$sql_showtime = "SELECT startTime, movieID FROM showtime WHERE showtimeID = ?";
$stmt_showtime = $db->link->prepare($sql_showtime);
$stmt_showtime->bind_param("i", $showtimeID);
$stmt_showtime->execute();
$result_showtime = $stmt_showtime->get_result();
$showtime = $result_showtime->fetch_assoc();

if (!$showtime) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Showtime not found"]);
    exit;
}

// Fetch movie details (name and show date)
$sql_movie = "SELECT title, releaseDate FROM movie WHERE movieID = ?";
$stmt_movie = $db->link->prepare($sql_movie);

if ($stmt_movie === false) {
    die("Error preparing movie query: " . $db->link->error); // Debugging movie query
}

$stmt_movie->bind_param("i", $showtime['movieID']);
$stmt_movie->execute();
$result_movie = $stmt_movie->get_result();
$movie = $result_movie->fetch_assoc();

if (!$movie) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Movie not found"]);
    exit;
}

// Fetch seat availability for the selected showtime
$sql_seats = "SELECT isAvailable FROM seatshowtime WHERE showtimeID = ?";
$stmt_seats = $db->link->prepare($sql_seats);
$stmt_seats->bind_param("i", $showtimeID);
$stmt_seats->execute();
$result_seats = $stmt_seats->get_result();
$seatData = $result_seats->fetch_assoc();

if (!$seatData) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Seat availability data not found"]);
    exit;
}

// Decode the isAvailable JSON (seat availability status)
$isAvailable = json_decode($seatData['isAvailable'], true);

if (json_last_error() !== JSON_ERROR_NONE) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Failed to parse seat availability data"]);
    exit;
}

// Pass data to frontend
header('Content-Type: application/json');
echo json_encode([
    'seats' => $isAvailable,
    'startTime' => $showtime['startTime'],
    'movieTitle' => $movie['title'],
    'movieReleaseDate' => $movie['releaseDate']
]);
?>
