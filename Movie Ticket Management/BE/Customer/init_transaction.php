<?php
// Start the session at the top
session_start();

// Include configuration and database files
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

// Check if customer is logged in
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'customer') {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Customer not logged in"]);
    exit;
}

// Get the customer ID from session
$customerID = $_SESSION['user']['id'];

// Get the showtimeID from the GET parameter
if (!isset($_GET['showtimeID'])) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Missing showtime ID"]);
    exit;
}
$showtimeID = intval($_GET['showtimeID']);

// Insert customerID and showtimeID into the transaction table
$sql = "INSERT INTO transaction (customerID, showtimeID) VALUES (?, ?)";
$stmt = $db->link->prepare($sql);

// Check if the preparation of the statement failed
if ($stmt === false) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Failed to prepare SQL statement: " . $db->link->error]);
    exit;
}

$stmt->bind_param("ii", $customerID, $showtimeID);

// Execute the statement
if ($stmt->execute()) {
    // Get the last inserted transactionID (AUTO_INCREMENT)
    $transactionID = $db->link->insert_id;

    // Success: Return the transaction ID
    header('Content-Type: application/json');
    echo json_encode(['transactionID' => $transactionID]);
} else {
    // Failure: Return the error
    header('Content-Type: application/json');
    echo json_encode(["error" => "Failed to execute SQL statement: " . $stmt->error]);
}
?>
