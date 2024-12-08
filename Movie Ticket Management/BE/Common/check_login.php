<?php
session_start();

$response = [
    "loggedIn" => false,
    "role" => null,
    "user" => null,
];

if (isset($_SESSION['user'])) {
    $response['loggedIn'] = true;
    $response['role'] = $_SESSION['user']['role']; // 'admin' or 'customer'
    $response['user'] = [
        "username" => $_SESSION['user']['username'],
        "email" => $_SESSION['user']['email'],
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
