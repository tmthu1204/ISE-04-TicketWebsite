<?php
session_start();

// Xóa thông tin người dùng trong session
session_unset();
session_destroy();

// Trả về phản hồi JSON
$response = [
    "loggedIn" => false,
    "role" => null,
    "user" => null,
];

header('Content-Type: application/json');
echo json_encode($response);
?>
