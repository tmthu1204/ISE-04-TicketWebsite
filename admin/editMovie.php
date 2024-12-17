<?php
require_once 'database.php';

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

// Check if movieID is set in URL
if (isset($_GET["movieID"])) {
    $movieID = $_GET["movieID"];
} else {
    echo json_encode(['error' => 'Invalid movie ID']);
    exit();
}

// Fetch movie details from the database
$get_movie = get_movie($movieID);
if ($get_movie) {
    $result = $get_movie;
    // Decode the description field (it may be JSON encoded)
    $description = json_decode($result['description'], true);

    if ($description === null) {
        echo json_encode(['error' => 'Cannot decode movie description!']);
        exit();
    }

    // Return the movie data as JSON
    $response = [
        'title' => $result['title'],
        'trailerURL' => $result['trailerURL'],
        'duration' => $result['duration'],
        'genre' => $result['genre'],
        'releaseDate' => $result['releaseDate'],
        'description' => $description
    ];

    // Return movie data as JSON
    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Movie not found']);
}

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

    if ($poster) {
        // Move the new poster to the 'images' folder
        move_uploaded_file($_FILES['poster']['tmp_name'], "images/" . $poster);
    } else {
        // Retain current poster if no new poster is uploaded
        $poster = $description['image'] ?? '';
    }

    // Update the movie record
    $response = update_movie($title, $trailerURL, $duration, $genre, $releaseDate, $poster, $country, $language, $intro, $movieID);

    // Set content-type as JSON
    header('Content-Type: application/json');

    // Return response as JSON
    echo json_encode($response);
}
?>
