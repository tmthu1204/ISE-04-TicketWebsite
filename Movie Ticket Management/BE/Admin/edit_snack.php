<?php
require_once '../Common/config.php';
require_once '../Common/database.php';


// Function to update snack details
function update_snack($snackID, $name, $price) {
    // Build the query for updating snack details
    $query = "UPDATE snack SET 
        name = '" . ($name !== null ? $name : 'name') . "', 
        price = '" . ($price !== null ? $price : 'price') . "'
    WHERE snackID = '$snackID'";

    $db = new Database();
    if ($db->update($query)) {
        return ['status' => 'success', 'message' => 'Snack updated successfully'];
    } else {
        return ['status' => 'error', 'message' => 'Database update failed'];
    }
}

// Function to fetch snack details
function get_snack($snackID) {
    $query = "SELECT * FROM snack WHERE snackID = '$snackID'";
    $db = new Database();
    $result = $db->select($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc(); // Fetch a single row as an associative array
    } else {
        return null; // No snack found
    }
}

// Handle GET request to fetch snack details
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $snackID = $_GET["snackID"];

    // Fetch snack details
    $snack = get_snack($snackID);

    header('Content-Type: application/json');
    if ($snack) {
        echo json_encode($snack); // Return snack data as JSON
    } else {
        echo json_encode(['error' => 'Snack not found']);
    }
}

// Handle POST request to update snack details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $snackID = $_POST['snackID'] ?? null;
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';

    // Update the snack record
    $response = update_snack($snackID, $name, $price);

    // Set content-type as JSON
    header('Content-Type: application/json');

    // Return response as JSON
    echo json_encode($response);
}
?>
