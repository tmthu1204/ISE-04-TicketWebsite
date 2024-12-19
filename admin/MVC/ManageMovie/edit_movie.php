<?php
require_once '../database.php';

function update_movie($title, $trailerURL, $duration, $genre, $releaseDate, $poster, $country, $language, $intro, $movieID) {
    // Prepare JSON data for description
    $descriptionData = [
        'image' => $poster,
        'country' => $country,
        'language' => $language,
        'intro' => $intro
    ];
    $description = json_encode($descriptionData, JSON_UNESCAPED_UNICODE);

    // Build the query for updating movie details
    $query = "UPDATE movie SET 
        title = '" . ($title !== null ? $title : 'title') . "', 
        description = '$description', 
        trailerURL = '" . ($trailerURL !== null ? $trailerURL : 'trailerURL') . "', 
        duration = '" . ($duration !== null ? $duration : 'duration') . "', 
        genre = '" . ($genre !== null ? $genre : 'genre') . "', 
        releaseDate = '" . ($releaseDate !== null ? $releaseDate : 'releaseDate') . "' 
    WHERE movieID = '$movieID'";

    $db = new Database();
    if ($db->update($query)) {
        return ['status' => 'success', 'message' => 'Movie updated successfully'];
    } else {
        return ['status' => 'error', 'message' => 'Database update failed'];
    }
}

function get_movie($movieID) {
    $query = "SELECT * FROM movie WHERE movieID = '$movieID'";
    $db = new Database();
    $result = $db->select($query);

    // Assuming $result is a mysqli_result object, fetch the first row
    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc(); // Fetch a single row as an associative array
    } else {
        return null; // No movie found
    }
}

// Handle GET request to fetch movie details
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get movieID from query string
    $movieID = $_GET["movieID"];
    
    // Fetch movie details from the database
        $movie = get_movie($movieID);
        if ($movie) {
            $description = json_decode($movie['description'], true);
            if ($description !== null) {
                $movie['description'] = $description; // Attach decoded description back to movie data
                
                echo json_encode($movie); // Return movie data as JSON
            } else {
                echo json_encode(['error' => 'Cannot decode movie description']);
            }
        } else {
            echo json_encode(['error' => 'Movie not found']);
        }
}

// Handle POST request to update movie details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $title = $_POST['title'] ?? '';
    $trailerURL = $_POST['trailerURL'] ?? null;
    $duration = $_POST['duration'] ?? null;
    $genre = $_POST['genre'] ?? '';
    $releaseDate = $_POST['releaseDate'] ?? '';
    $poster = $_FILES['poster']['name'] ?? null;
    $country = $_POST['country'] ?? '';
    $language = $_POST['language'] ?? '';
    $intro = $_POST['intro'] ?? '';
    $movieID = $_POST['movieID'] ?? null;

    $currentMovie = get_movie($movieID);
    $currentDescription = json_decode($currentMovie['description'], true);
    $existingPoster = $currentDescription['image'] ?? null;

    // Handle the poster image
    if (isset($_FILES['poster']) && $_FILES['poster']['name']) {
        // A new poster is uploaded
        $poster = $_FILES['poster']['name'];
        move_uploaded_file($_FILES['poster']['tmp_name'], "images/" . $poster);
    } else {
        // Use the existing poster or fallback to the hidden input if provided
        $poster = $existingPoster;
    }


    // Update the movie record
    $response = update_movie($title, $trailerURL, $duration, $genre, $releaseDate, $poster, $country, $language, $intro, $movieID);

    // Set content-type as JSON
    header('Content-Type: application/json');

    // Return response as JSON
    echo json_encode($response);
}
?>
