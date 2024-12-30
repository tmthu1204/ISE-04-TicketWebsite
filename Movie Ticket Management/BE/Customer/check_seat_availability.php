<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

// Parse the JSON body
$data = json_decode(file_get_contents("php://input"), true);
$showtimeID = isset($data['showtimeID']) ? intval($data['showtimeID']) : 0;
$selectedSeats = isset($data['selectedSeats']) ? $data['selectedSeats'] : [];

if ($showtimeID === 0 || empty($selectedSeats)) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "error" => "Invalid input data"]);
    exit;
}

// Fetch the current seat layout
$sql_fetch = "SELECT isAvailable FROM seatshowtime WHERE showtimeID = ?";
$stmt_fetch = $db->link->prepare($sql_fetch);
$stmt_fetch->bind_param("i", $showtimeID);
$stmt_fetch->execute();
$result_fetch = $stmt_fetch->get_result();
$seatData = $result_fetch->fetch_assoc();

if (!$seatData) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "error" => "Showtime not found"]);
    exit;
}

// Decode the current seat layout (assuming it's a valid 2D JSON array)
$isAvailable = json_decode($seatData['isAvailable'], true);
if (json_last_error() !== JSON_ERROR_NONE) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "error" => "Failed to parse seat layout"]);
    exit;
}

// Initialize a flag to track availability
$isAnySeatUnavailable = false;

// Initialize an array to hold the seat availability status for each seat
$seatsStatus = [];

foreach ($selectedSeats as $seat) {
    // Extract row and column from seat code (e.g., "R1C14")
    preg_match('/R(\d+)C(\d+)/', $seat, $matches);

    // Check if we successfully matched the seat format
    if (count($matches) < 3) {
        echo json_encode(['error' => 'Invalid seat format']);
        exit;
    }

    // Row and column from the seat code (R1C14 -> row=1, col=14)
    $row = intval($matches[1]) - 1; // Zero-based index
    $col = intval($matches[2]) - 1; // Zero-based index

    // Check if the seat exists in the layout
    if (isset($isAvailable[$row][$col])) {
        // Check if the seat is available (0 = available, 1 = unavailable)
        $isAvailableFlag = $isAvailable[$row][$col] == 0;  // 0 = available, 1 = unavailable
        $seatsStatus[] = [
            'row' => $row + 1,  // Convert back to 1-based index for display
            'col' => $col + 1,  // Convert back to 1-based index for display
            'isAvailable' => $isAvailableFlag
        ];

        // If any seat is unavailable, set the flag
        if (!$isAvailableFlag) {
            $isAnySeatUnavailable = true;
        }
    } else {
        // Seat not found in the layout
        $seatsStatus[] = [
            'row' => $row + 1,  // Convert back to 1-based index for display
            'col' => $col + 1,  // Convert back to 1-based index for display
            'isAvailable' => false  // Mark as unavailable
        ];
        $isAnySeatUnavailable = true;
    }
}

// If any seat is unavailable, return false
if ($isAnySeatUnavailable) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "error" => "One or more selected seats are unavailable"]);
    exit;
}

header('Content-Type: application/json');
echo json_encode(["success" => true, "seatsStatus" => $seatsStatus]);
?>
