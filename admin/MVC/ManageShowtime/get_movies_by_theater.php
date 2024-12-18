<?php
header('Content-Type: application/json');
include "../database.php";

$theaterID = intval($_GET['theaterID']);
$db = new Database();

$query = "SELECT DISTINCT movie.movieID, movie.title AS name 
          FROM movie
          INNER JOIN showtime ON movie.movieID = showtime.movieID 
          WHERE showtime.theaterID = $theaterID";

$result = $db->select($query);

$movies = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $movies[] = $row;
    }
}
echo json_encode($movies);
?>
