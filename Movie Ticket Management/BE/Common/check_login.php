<?php
session_start();

$response = [
    "loggedIn" => false,
    "role" => null,
    "user" => null,
    "customerID" => null, // Added customerID to the response
];

if (isset($_SESSION['user'])) {
    $response['loggedIn'] = true;
    $response['role'] = $_SESSION['user']['role']; // 'admin' or 'customer'
    $response['user'] = [
        "username" => $_SESSION['user']['username'],
        "email" => $_SESSION['user']['email'],
    ];

    // If the role is 'customer', include the customerID
    if ($_SESSION['user']['role'] === 'customer') {
        $response['customerID'] = $_SESSION['user']['id']; // Fetch customerID
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
