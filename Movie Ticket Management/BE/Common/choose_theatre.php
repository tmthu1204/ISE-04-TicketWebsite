<?php
require_once 'config.php';
require_once 'database.php';

// Initialize Database instance
$db = new Database();

// Get movieID from the query string
$movieID = isset($_GET['movieID']) ? intval($_GET['movieID']) : 0;

if ($movieID === 0) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Invalid movieID"]);
    exit;
}

// Query to fetch theaters that have showtimes for the specific movie
$sql = "SELECT DISTINCT t.theaterID, t.name, t.location 
        FROM theater t
        INNER JOIN showtime s ON t.theaterID = s.theaterID
        WHERE s.movieID = ? AND s.availableSeats > 0";
$stmt = $db->link->prepare($sql);
$stmt->bind_param("i", $movieID);
$stmt->execute();
$result = $stmt->get_result();

$theaters = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $theaters[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($theaters);
?>
