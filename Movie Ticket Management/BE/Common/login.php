<?php
// Include configuration and database classes
require_once "config.php";
require_once "database.php";


// Start session
session_start();

// Initialize Database instance
$db = new Database();

// Initialize response
$response = [
    "success" => false,
    "errors" => []
];


// Retrieve and sanitize input
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Input validation
if (empty($email)) {
    $response["errors"][] = [
        "field" => "email",
        "message" => "Email không được để trống."
    ];
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $response["errors"][] = [
        "field" => "email",
        "message" => "Email không hợp lệ."
    ];
}

if (empty($password)) {
    $response["errors"][] = [
        "field" => "password",
        "message" => "Mật khẩu không được để trống."
    ];
}

// If no errors, proceed to database query
if (empty($response["errors"])) {
    // Check in the admin table first
    $adminQuery = "SELECT * FROM admin WHERE email = '{$db->link->real_escape_string($email)}'";
    $adminResult = $db->select($adminQuery);

    if ($adminResult) {
        $admin = $adminResult->fetch_assoc();

        // Verify password for admin
        if ($password === $admin['password']) { // Compare plain text passwords
            // Admin authentication successful
            $response["success"] = true;
            $response["role"] = "admin";

            $_SESSION['user'] = [
                "role" => "admin",
                "username" => $admin['username'],
                "email" => $admin['email']
            ];
        } else {
            // Incorrect admin password
            $response["errors"][] = [
                "field" => "general",
                "message" => "Email hoặc mật khẩu không chính xác."
            ];
        }
    } else {
        // If not admin, check in the customer table
        $customerQuery = "SELECT * FROM customer WHERE email = '{$db->link->real_escape_string($email)}'";
        $customerResult = $db->select($customerQuery);

        if ($customerResult) {
            $customer = $customerResult->fetch_assoc();

            // Verify password for customer
            if ($password === $customer['password']) { // Compare plain text passwords
                // Customer authentication successful
                $response["success"] = true;
                $response["role"] = "customer";

                $_SESSION['user'] = [
                    "role" => "customer",
                    "id" => $customer['customerID'],
                    "username" => $customer['username'],
                    "email" => $customer['email']
                ];
            } else {
                // Incorrect customer password
                $response["errors"][] = [
                    "field" => "general",
                    "message" => "Email hoặc mật khẩu không chính xác."
                ];
            }
        } else {
            // Email not found in either table
            $response["errors"][] = [
                "field" => "general",
                "message" => "Email hoặc mật khẩu không chính xác."
            ];
        }
    }
}

// Return response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
