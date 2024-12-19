<?php
header('Content-Type: application/json');
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

// Get the transactionID from the request
$transactionID = isset($_GET['transactionID']) ? intval($_GET['transactionID']) : 0;

if ($transactionID === 0) {
    echo json_encode(['error' => 'Transaction ID is required.']);
    exit;
}

// Query to get transaction details
$transactionQuery = "
    SELECT 
        t.seatsBooked, t.snack, t.snackAmount, t.ticketAmount, 
        t.showtimeID, s.movieID, s.theaterID, s.roomID, s.startTime,
        m.title, m.description, m.duration
    FROM transaction t 
    INNER JOIN showtime s ON t.showtimeID = s.showtimeID
    INNER JOIN movie m ON s.movieID = m.movieID
    WHERE t.transactionID = ?
";

$stmt = $db->link->prepare($transactionQuery);
$stmt->bind_param('i', $transactionID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['error' => 'Transaction not found.']);
    exit;
}

$row = $result->fetch_assoc();

// Ensure movie duration is present and valid
$movieDuration = $row['duration'];
if (!$movieDuration || !is_numeric($movieDuration)) {
    echo json_encode(['error' => 'Invalid or missing movie duration.']);
    exit;
}

// Calculate end time
$startTime = new DateTime($row['startTime']);
$endTime = clone $startTime;
$endTime->add(new DateInterval('PT' . $movieDuration . 'M'));

// Fetch theater name
$theaterQuery = "SELECT name FROM theater WHERE theaterID = ?";
$stmt_theater = $db->link->prepare($theaterQuery);
$stmt_theater->bind_param('i', $row['theaterID']);
$stmt_theater->execute();
$theaterResult = $stmt_theater->get_result();
$theaterName = $theaterResult->fetch_assoc()['name'] ?? 'Unknown Theater';

// Decode the snack data (which is a JSON object)
$snackData = json_decode($row['snack'], true);

// Prepare the snack query to fetch names based on snack IDs
$snackIDs = array_keys($snackData); // Get snack IDs
$snackQuery = "SELECT snackID, name FROM snack WHERE snackID IN (" . implode(",", $snackIDs) . ")";
$stmt_snack = $db->link->prepare($snackQuery);
$stmt_snack->execute();
$snackResult = $stmt_snack->get_result();

// Fetch snack names and map them to their IDs
$snackNames = [];
while ($snackRow = $snackResult->fetch_assoc()) {
    $snackNames[$snackRow['snackID']] = $snackRow['name'];
}

// Prepare snack details as an array of 'name x quantity' format
$snackDetails = [];
foreach ($snackData as $snackID => $quantity) {
    if (isset($snackNames[$snackID])) {
        $snackDetails[] = $snackNames[$snackID] . ' x' . $quantity;
    }
}

// Raw seatsBooked (as a string, no decoding)
$seatsBookedRaw = $row['seatsBooked'];  // Get seatsBooked as a raw string

// If seatsBooked contains an array-like string (e.g., "[\"R5C2\"]"), strip escape characters
$seatsBookedFormatted = trim($seatsBookedRaw, '["\ \"]'); // Remove surrounding brackets and extra spaces

// Replace the escaped quotes with normal quotes if necessary
$seatsBookedFormatted = str_replace('\\"', '', $seatsBookedFormatted);

// If there are multiple seats, split them by commas (optional)
$seatsBookedFormatted = str_replace(',', ', ', $seatsBookedFormatted);

// If seatsBooked is empty, set to 'N/A'
if (empty($seatsBookedFormatted)) {
    $seatsBookedFormatted = 'N/A';
}

// Prepare the response data
$response = [
    "title" => $row['title'],
    "poster" => json_decode($row['description'], true)['image'] ?? null, // Poster from JSON description
    "showtime" => [
        "theater" => $theaterName,
        "room" => $row['roomID'],
        "startTime" => $startTime->format('H:i'),
        "endTime" => $endTime->format('H:i'),
    ],
    "seatsBooked" => $seatsBookedFormatted,  // Seats without decoding
    "snack" => $snackDetails, // Snacks as a formatted array
    "totalAmount" => $row['snackAmount'] + $row['ticketAmount']
];

// Send the JSON response
echo json_encode($response);

$stmt->close();
$stmt_theater->close();
$stmt_snack->close();
$db->link->close();
?>
