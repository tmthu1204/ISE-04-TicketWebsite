<?php
session_start();
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

// Check if transactionID is passed
if (isset($_GET['transactionID'])) {
    $transactionID = intval($_GET['transactionID']);

    // Query the database for the transaction details
    $sql = "SELECT 
                t.transactionID, t.customerID, t.seatsBooked, t.snack, t.snackAmount, t.totalAmount, 
                m.movieTitle, m.moviePoster, s.showtimeDate, r.roomName
            FROM transaction t
            JOIN movie m ON t.movieID = m.movieID
            JOIN showtime s ON t.showtimeID = s.showtimeID
            JOIN room r ON s.roomID = r.roomID
            WHERE t.transactionID = ?";
    
    $stmt = $db->link->prepare($sql);
    $stmt->bind_param("i", $transactionID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the data and return it as a JSON response
        $row = $result->fetch_assoc();
        $response = [
            'movieTitle' => $row['movieTitle'],
            'moviePoster' => $row['moviePoster'],
            'showtimeDate' => $row['showtimeDate'],
            'showtimeRoom' => $row['roomName'],
            'selectedSeats' => explode(',', $row['seatsBooked']),  // Assuming seats are stored as a comma-separated list
            'selectedSnacks' => explode(',', $row['snack']),  // Assuming snacks are stored as a comma-separated list
            'totalAmount' => $row['totalAmount']
        ];
        echo json_encode($response);
    } else {
        echo json_encode(['error' => 'Transaction not found']);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'No transaction ID provided']);
}

$db->link->close();
?>