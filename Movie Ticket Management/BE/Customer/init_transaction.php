<?php
// Start the session at the top
session_start();

// Set timezone to ensure correct datetime
date_default_timezone_set('Asia/Ho_Chi_Minh');

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

// Decode the JSON input (expected in POST request)
$data = json_decode(file_get_contents('php://input'), true);
error_log("Received data: " . print_r($data, true));

// Validate required data
$requiredFields = ['showtimeID', 'selectedSeats', 'ticketAmount', 'selectedSnacks', 'snackAmount', 'paymentInfo'];
foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || empty($data[$field])) {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Missing or empty field: $field"]);
        exit;
    }
}

// Extract data from the JSON input
$showtimeID = intval($data['showtimeID']);
$selectedSeats = $data['selectedSeats']; // Array of seats
$ticketAmount = floatval($data['ticketAmount']);
$selectedSnacks = $data['selectedSnacks']; // Array of snacks
$snackAmount = floatval($data['snackAmount']);
$paymentInfo = json_encode($data['paymentInfo']); // Get the payment info and encode it as JSON

// Serialize seats and snacks for storage in the database
$seatsSerialized = json_encode($selectedSeats);
$snacksSerialized = json_encode($selectedSnacks);

// Insert data into the transaction table
$sql = "INSERT INTO transaction (customerID, showtimeID, seatsBooked, ticketAmount, snack, snackAmount, paymentInfo) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $db->link->prepare($sql);

// Check if the preparation of the statement failed
if ($stmt === false) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Failed to prepare SQL statement: " . $db->link->error]);
    exit;
}

// Bind parameters
$stmt->bind_param("iisdsds", $customerID, $showtimeID, $seatsSerialized, $ticketAmount, $snacksSerialized, $snackAmount, $paymentInfo);

// Execute the statement
if ($stmt->execute()) {
    // Get the last inserted transactionID (AUTO_INCREMENT)
    $transactionID = $db->link->insert_id;

    // Save session details (add start time for timeout management)
    $_SESSION['transactionID'] = $transactionID;
    $_SESSION['startTime'] = time(); // Save current timestamp
    error_log("Received data: " . json_encode($_POST));

    // Success: Return the transaction ID and other details
    header('Content-Type: application/json');
    echo json_encode([
        'transactionID' => $transactionID,
        'customerID' => $customerID,
        'showtimeID' => $showtimeID,
        'selectedSeats' => $selectedSeats,
        'ticketAmount' => $ticketAmount,
        'selectedSnacks' => $selectedSnacks,
        'snackAmount' => $snackAmount,
        'paymentInfo' => json_decode($paymentInfo), // Return paymentInfo as an object
    ]);
} else {
    // Failure: Return the error
    header('Content-Type: application/json');
    echo json_encode(["error" => "Failed to execute SQL statement: " . $stmt->error]);
}
?>
