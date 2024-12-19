<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

// Parse the JSON body
$data = json_decode(file_get_contents("php://input"), true);
$showtimeID = isset($data['showtimeID']) ? intval($data['showtimeID']) : 0;
$row = isset($data['row']) ? intval($data['row']) : null;
$col = isset($data['col']) ? intval($data['col']) : null;
$status = isset($data['status']) ? $data['status'] : null;

if ($showtimeID === 0 || $row === null || $col === null || $status === null) {
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

// Decode the current seat layout JSON
$isAvailable = json_decode($seatData['isAvailable'], true);
if (json_last_error() !== JSON_ERROR_NONE) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "error" => "Failed to parse seat layout"]);
    exit;
}

// Update the specific seat's status
$isAvailable[$row][$col] = $status;

// Encode the updated layout back to JSON
$updatedSeatLayout = json_encode($isAvailable);
if (json_last_error() !== JSON_ERROR_NONE) {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "error" => "Failed to encode updated seat layout"]);
    exit;
}

// Update the seat layout in the database
$sql_update = "UPDATE seatshowtime SET isAvailable = ? WHERE showtimeID = ?";
$stmt_update = $db->link->prepare($sql_update);
$stmt_update->bind_param("si", $updatedSeatLayout, $showtimeID);

if ($stmt_update->execute()) {
    header('Content-Type: application/json');
    echo json_encode(["success" => true]);
} else {
    header('Content-Type: application/json');
    echo json_encode(["success" => false, "error" => "Failed to update seat layout"]);
}
?>
