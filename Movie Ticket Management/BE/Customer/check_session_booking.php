<?php
session_start();
require_once '../Common/database.php';

$db = new Database();
$timeout = 15 * 60; // 15 minutes

if (isset($_SESSION['transactionID'], $_SESSION['startTime'])) {
    if (time() - $_SESSION['startTime'] > $timeout) {
        // Timeout reached, delete transaction and reset seats
        $transactionID = $_SESSION['transactionID'];

        // Fetch seats booked for this transaction
        $sql = "SELECT seatsBooked, showtimeID FROM transaction WHERE transactionID = ?";
        $stmt = $db->link->prepare($sql);
        $stmt->bind_param("i", $transactionID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        $seats = json_decode($result['seatsBooked'], true);
        $showtimeID = $result['showtimeID'];

        // Reset seat availability
        $sql = "SELECT isAvailable FROM seatshowtime WHERE showtimeID = ?";
        $stmt = $db->link->prepare($sql);
        $stmt->bind_param("i", $showtimeID);
        $stmt->execute();
        $seatData = $stmt->get_result()->fetch_assoc();
        $isAvailable = json_decode($seatData['isAvailable'], true);

        foreach ($seats as $seat) {
            list($row, $col) = explode('-', $seat);
            $isAvailable[$row][$col] = 0; // Reset seat to available
        }

        // Update the seatshowtime table
        $updatedSeats = json_encode($isAvailable);
        $stmt = $db->link->prepare("UPDATE seatshowtime SET isAvailable = ? WHERE showtimeID = ?");
        $stmt->bind_param("si", $updatedSeats, $showtimeID);
        $stmt->execute();

        // Delete transaction
        $stmt = $db->link->prepare("DELETE FROM transaction WHERE transactionID = ?");
        $stmt->bind_param("i", $transactionID);
        $stmt->execute();

        // End session
        session_destroy();

        echo json_encode(["success" => false, "message" => "Session expired."]);
        exit;
    }
}
