<?php
session_start();
require_once '../Common/config.php';
require_once '../Common/database.php';

$db = new Database();

// Check if customer is logged in
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'customer') {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Customer not logged in"]);
    exit;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log POST data for debugging
file_put_contents('debug_log.txt', "POST Data: " . json_encode($_POST) . PHP_EOL, FILE_APPEND);

// Retrieve transaction data from POST
// Retrieve transaction data from POST
$transactionID = $_POST['transactionID'] ?? null;
$selectedSeats = $_POST['seats'] ?? null;  // The array of selected seats from frontend
$selectedSnacks = isset($_POST['snacks']) ? json_decode($_POST['snacks'], true) : null;  // The JSON string for snacks
$ticketAmount = $_POST['ticketAmount'] ?? 0;  // The ticket amount from frontend

// Log received data for debugging
file_put_contents('debug_log.txt', "Selected Seats: " . json_encode($selectedSeats) . PHP_EOL, FILE_APPEND);
file_put_contents('debug_log.txt', "Selected Snacks: " . json_encode($selectedSnacks) . PHP_EOL, FILE_APPEND);
file_put_contents('debug_log.txt', "Ticket Amount: " . $ticketAmount . PHP_EOL, FILE_APPEND);

// Convert selected seats array to JSON format for storage in the database
$seats = json_encode($selectedSeats);

// Update selected seats and ticketAmount in the transaction table
$sql = "UPDATE transaction SET seatsBooked = ?, ticketAmount = ? WHERE transactionID = ?";
$stmt = $db->link->prepare($sql);

if ($stmt === false) {
    echo json_encode(["error" => "Failed to prepare SQL statement: " . $db->link->error]);
    exit;
}

// Bind parameters - Make sure ticketAmount is treated as an integer
$stmt->bind_param("sii", $seats, $ticketAmount, $transactionID);

if (!$stmt->execute()) {
    echo json_encode(["error" => "Failed to execute SQL statement: " . $stmt->error]);
    exit;
}

$sqlGetTicketAmount = "SELECT ticketAmount FROM transaction WHERE transactionID = ?";
$stmtGetTicketAmount = $db->link->prepare($sqlGetTicketAmount);
$stmtGetTicketAmount->bind_param("i", $transactionID);
$stmtGetTicketAmount->execute();
$result = $stmtGetTicketAmount->get_result();
$row = $result->fetch_assoc();
$currentTicketAmount = $row['ticketAmount'];

// If snack data is provided, update snack-related fields
if ($selectedSnacks) {
    // Check if the snack data is already in the proper format (associative array)
    if (!is_array($selectedSnacks)) {
        echo json_encode(["error" => "Invalid snack data format"]);
        exit;
    }

    // Fetch the prices of the selected snacks from the database
    $snackPrices = [];
    $placeholders = implode(",", array_fill(0, count($selectedSnacks), "?"));
    $sqlPrices = "SELECT snackID, price FROM snack WHERE snackID IN ($placeholders)";
    $stmtPrices = $db->link->prepare($sqlPrices);

    if ($stmtPrices === false) {
        echo json_encode(["error" => "Failed to prepare SQL statement for snack prices: " . $db->link->error]);
        exit;
    }

    // Bind the snack IDs to the SQL query
    $stmtPrices->bind_param(str_repeat("i", count($selectedSnacks)), ...array_keys($selectedSnacks));

    if (!$stmtPrices->execute()) {
        echo json_encode(["error" => "Failed to execute SQL statement for snack prices: " . $stmtPrices->error]);
        exit;
    }

    $resultPrices = $stmtPrices->get_result();
    while ($row = $resultPrices->fetch_assoc()) {
        $snackPrices[$row['snackID']] = $row['price'];
    }

    // Calculate the total snack amount (total price)
    $totalSnackAmount = 0;
    foreach ($selectedSnacks as $snackID => $quantity) {
        if (isset($snackPrices[$snackID])) {
            // Multiply the quantity of the snack by its price
            $totalSnackAmount += $snackPrices[$snackID] * $quantity;
        }
    }

    // Store the snack data as a JSON string in the transaction
    $snackDataJson = json_encode($selectedSnacks);
    $sqlSnacks = "UPDATE transaction SET snack = ?, snackAmount = ?, ticketAmount = ? WHERE transactionID = ?";
    $stmtSnacks = $db->link->prepare($sqlSnacks);

    if ($stmtSnacks === false) {
        echo json_encode(["error" => "Failed to prepare SQL statement for snacks: " . $db->link->error]);
        exit;
    }

    // Bind parameters and execute the query
    $stmtSnacks->bind_param("siii", $snackDataJson, $totalSnackAmount, $currentTicketAmount, $transactionID);

    if (!$stmtSnacks->execute()) {
        echo json_encode(["error" => "Failed to execute SQL statement for snacks: " . $stmtSnacks->error]);
        exit;
    }
}

// Return success response
echo json_encode(["success" => true]);
exit;

?>
