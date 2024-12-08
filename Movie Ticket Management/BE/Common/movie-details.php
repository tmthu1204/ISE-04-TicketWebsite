<?php
require_once 'config.php';
require_once 'database.php';

$db = new Database();

if (isset($_GET['movieID'])) {
    $movieID = $_GET['movieID'];

    // Fetch movie data
    $sql = "SELECT * FROM movie WHERE movieID = $movieID";
    $result = $db->select($sql);

    if ($result) {
        $movie = $result->fetch_assoc();
        
        // Convert the description from JSON to an array
        $description = json_decode($movie['description'], true);
        
        // Prepare the data to return
        $movieData = [
            'movieID' => $movie['movieID'],
            'title' => $movie['title'],
            'description' => $description,
            'trailerURL' => $movie['trailerURL'],
            'duration' => $movie['duration'],
            'genre' => $movie['genre'],
            'releaseDate' => $movie['releaseDate']
        ];

        // Return the movie data as JSON
        echo json_encode($movieData);
    } else {
        echo json_encode(['error' => 'Movie not found']);
    }
} else {
    echo json_encode(['error' => 'No movieID provided']);
}
?>