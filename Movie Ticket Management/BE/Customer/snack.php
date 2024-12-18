<?php
require_once '../Common/config.php';
require_once '../Common/database.php';

// Initialize Database instance
$db = new Database();

// Fetch snacks
$sql = "SELECT * FROM snack";
$result = $db->select($sql);

$snacks = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $snacks[] = $row;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($snacks);
?>