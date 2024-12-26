<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

$transactionID = $_GET['transactionID'] ?? null;

if ($transactionID) {
    // Delete the transaction from the database
    $query = "DELETE FROM transaction WHERE transactionID = ?";
    $stmt = $db->link->prepare($query);
    $stmt->bind_param("i", $transactionID);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        http_response_code(200);
        echo json_encode(["success" => true]);
    } else {
        http_response_code(400);
        echo json_encode(["success" => false, "error" => "Transaction not found."]);
    }
    $stmt->close();
} else {
    http_response_code(400);
    echo json_encode(["success" => false, "error" => "Invalid transaction ID."]);
}

$db->link->close();
?>