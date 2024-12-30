<?php
header('Content-Type: application/json');
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

// Get the necessary information from the sessionStorage
$showtimeID = isset($_GET['showtimeID']) ? intval($_GET['showtimeID']) : 0;
$selectedSeats = isset($_GET['selectedSeats']) ? json_decode($_GET['selectedSeats'], true) : [];
$ticketAmount = isset($_GET['ticketAmount']) ? floatval($_GET['ticketAmount']) : 0;
$selectedSnacks = isset($_GET['selectedSnacks']) ? json_decode($_GET['selectedSnacks'], true) : [];
$snackAmount = isset($_GET['snackAmount']) ? floatval($_GET['snackAmount']) : 0;

if ($showtimeID === 0 || empty($selectedSeats)) {
    echo json_encode(['error' => 'Missing required information.']);
    exit;
}

// Query to get showtime and movie details
$showtimeQuery = "
    SELECT 
        s.showtimeID, s.movieID, s.theaterID, s.roomID, s.startTime, 
        m.title, m.description, m.duration
    FROM showtime s 
    INNER JOIN movie m ON s.movieID = m.movieID
    WHERE s.showtimeID = ?
";

$stmt = $db->link->prepare($showtimeQuery);
$stmt->bind_param('i', $showtimeID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo json_encode(['error' => 'Showtime not found.']);
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
$snackData = $selectedSnacks;  // Directly using selected snacks from sessionStorage

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

// Raw seatsBooked (from sessionStorage as a string)
$seatsBookedRaw = json_encode($selectedSeats);  // Chuyển mảng thành JSON
$seatsBookedFormatted = preg_replace('/["\[\]]/', '', $seatsBookedRaw);

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
    "totalAmount" => $snackAmount + $ticketAmount
];

// Send the JSON response
echo json_encode($response);

$stmt->close();
$stmt_theater->close();
$stmt_snack->close();
$db->link->close();
?>
