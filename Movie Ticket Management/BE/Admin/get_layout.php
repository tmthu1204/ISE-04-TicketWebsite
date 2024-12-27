<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

$database = new Database();

if (isset($_GET['roomID'])) {
    $roomID = $_GET['roomID'];

    // Fetch seat layout from the database
    $query = "SELECT seatLayout FROM room WHERE roomID = $roomID";
    $result = $database->select($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $seatLayout = $row['seatLayout'];
        
        echo json_encode([
            'status' => 'success',
            'layout' => $seatLayout
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Không tìm thấy layout cho roomID'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'roomID is required'
    ]);
}
?>
