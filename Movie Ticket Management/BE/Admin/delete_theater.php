<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

function delete_theater($db, $theaterID) {
    $query = "DELETE FROM theater WHERE theaterID = '$theaterID'";
    $result = $db->delete($query);
    return $result;
}

$theater = new Database();

// Validate the theaterID
if (!isset($_POST['theaterID']) || !is_numeric($_POST['theaterID'])) {
    // If invalid, return an error message
    header('Content-Type: application/json');
    echo json_encode(['status' => 'failure', 'message' => 'Invalid or missing theaterID.']);
    exit();
} else {
    // Retrieve theaterID from POST
    $theaterID = $_POST['theaterID'];
}

// Call the function to delete the theater
$response = delete_theater($theater, $theaterID);

// Set response type to JSON
header('Content-Type: application/json');

// Return response as JSON
if ($response) {
    echo json_encode(['status' => 'success', 'message' => 'Theater deleted successfully.']);
} else {
    echo json_encode(['status' => 'failure', 'message' => 'Failed to delete theater.']);
}
?>
