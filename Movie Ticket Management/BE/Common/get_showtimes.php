<?php
require_once 'config.php';
require_once 'database.php';

// Initialize Database instance
$db = new Database();

// Get parameters
$movieID = $_GET['movieID'];
$theaterID = $_GET['theaterID'];
$selectedDate = $_GET['selectedDate'];

// Query to fetch showtimes
$sql = "SELECT showtimeID, startTime, availableSeats 
        FROM showtime 
        WHERE movieID = ? AND theaterID = ? AND DATE(startTime) = ? AND availableSeats > 0";
$stmt = $db->link->prepare($sql);
$stmt->bind_param("iis", $movieID, $theaterID, $selectedDate);
$stmt->execute();
$result = $stmt->get_result();

$showtimes = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $showtimes[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($showtimes);
?>
