<?php
// init_transaction.php
include 'database_connection.php'; // Include your DB connection script

$data = json_decode(file_get_contents("php://input"), true);

$customerID = $data['customerID'];
$selectedSeats = $data['selectedSeats'];
$selectedSnacks = $data['selectedSnacks'];
$ticketAmount = $data['ticketAmount'];
$snackAmount = $data['snackAmount'];
$showtimeID = $data['showtimeID'];
$paymentInfo = $data['paymentInfo'];

// Validate data
if (!$customerID || !$showtimeID || !$paymentInfo) {
    echo json_encode(['success' => false, 'error' => 'Missing required data.']);
    exit;
}

// Insert transaction into the database
$sql = "INSERT INTO transaction (customerID, showtimeID, seatsBooked, snack, ticketAmount, snackAmount, paymentInfo) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssdds", $customerID, $showtimeID, json_encode($selectedSeats), json_encode($selectedSnacks), $ticketAmount, $snackAmount, $paymentInfo);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}
?>
