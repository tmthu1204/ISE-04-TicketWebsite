<?php
require_once '../database.php';

// Function to update theater details
function update_theater($theaterID, $name, $location) {
    // Build the query for updating theater details
    $query = "UPDATE theater SET 
        name = '" . ($name !== null ? $name : 'name') . "', 
        location = '" . ($location !== null ? $location : 'location') . "'
    WHERE theaterID = '$theaterID'";

    $db = new Database();
    if ($db->update($query)) {
        return ['status' => 'success', 'message' => 'Theater updated successfully'];
    } else {
        return ['status' => 'error', 'message' => 'Database update failed'];
    }
}

// Function to fetch theater details
function get_theater($theaterID) {
    $query = "SELECT * FROM theater WHERE theaterID = '$theaterID'";
    $db = new Database();
    $result = $db->select($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc(); // Fetch a single row as an associative array
    } else {
        return null; // No theater found
    }
}

// Handle GET request to fetch theater details
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $theaterID = $_GET["theaterID"];

    // Fetch theater details
    $theater = get_theater($theaterID);

    header('Content-Type: application/json');
    if ($theater) {
        echo json_encode($theater); // Return theater data as JSON
    } else {
        echo json_encode(['error' => 'Theater not found']);
    }
}

// Handle POST request to update theater details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $theaterID = $_POST['theaterID'] ?? null;
    $name = $_POST['name'] ?? '';
    $location = $_POST['location'] ?? '';

    // Update the theater record
    $response = update_theater($theaterID, $name, $location);

    // Set content-type as JSON
    header('Content-Type: application/json');

    // Return response as JSON
    echo json_encode($response);
}
?>
