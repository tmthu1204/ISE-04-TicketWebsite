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

// First insert: Store the customer ID in the database (without transactionID, it will auto-generate)
$sql = "INSERT INTO transaction (customerID) VALUES (?)";
$stmt = $db->link->prepare($sql);

// Check if the preparation of the statement failed
if ($stmt === false) {
    // If there's an error in preparing the statement, show the error
    header('Content-Type: application/json');
    echo json_encode(["error" => "Failed to prepare SQL statement: " . $db->link->error]);
    exit;
}

$stmt->bind_param("i", $customerID);

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
