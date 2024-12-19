<?php
require_once 'config.php';
require_once 'database.php';

// Initialize Database instance
$db = new Database();

// Get parameters
$movieID = $_GET['movieID'];
$theaterID = $_GET['theaterID'];
$selectedDate = $_GET['selectedDate'];

// Add logging for debugging purposes
error_log("MovieID: " . $movieID);
error_log("TheaterID: " . $theaterID);
error_log("Selected Date: " . $selectedDate);

// Query to fetch showtimes and available seats
$sql = "SELECT s.showtimeID, s.startTime, 
        (
            SELECT SUM(
                CHAR_LENGTH(seatshowtime.isAvailable) - 
                CHAR_LENGTH(REPLACE(seatshowtime.isAvailable, '0', ''))
            )
            FROM seatshowtime 
            WHERE seatshowtime.showtimeID = s.showtimeID
        ) AS availableSeats
        FROM showtime s
        WHERE s.movieID = ? AND s.theaterID = ? AND DATE(s.startTime) = ?";

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

// Check for empty or null results and log for debugging
if (empty($showtimes)) {
    error_log("No showtimes found for MovieID: $movieID, TheaterID: $theaterID, Date: $selectedDate");
}

header('Content-Type: application/json');
echo json_encode($showtimes);
?>
