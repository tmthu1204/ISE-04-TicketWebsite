<?php
session_start();

// Xóa thông tin người dùng trong session
session_unset();
session_destroy();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

// Trả về phản hồi JSON
$response = [
    "loggedIn" => false,
    "role" => null,
    "user" => null,
];

header('Content-Type: application/json');
echo json_encode($response);
?>
