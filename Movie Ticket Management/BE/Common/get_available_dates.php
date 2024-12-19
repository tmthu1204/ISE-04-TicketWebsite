<?php
require_once 'config.php';
require_once 'database.php';

// Initialize Database instance
$db = new Database();

// Get parameters
$movieID = $_GET['movieID'];
$theaterID = $_GET['theaterID'];

$currentDate = date('Y-m-d');

// Query to fetch available dates
$sql = "SELECT DISTINCT DATE(startTime) as availableDate 
        FROM showtime 
        WHERE movieID = ? AND theaterID = ? AND DATE(startTime) >= ?";
$stmt = $db->link->prepare($sql);
$stmt->bind_param("iis", $movieID, $theaterID, $currentDate);
$stmt->execute();
$result = $stmt->get_result();

$dates = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $dates[] = $row['availableDate'];
    }
}

header('Content-Type: application/json');
echo json_encode($dates);
?>
