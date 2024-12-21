<?php
// Include configuration and database classes
require_once "config.php";
require_once "database.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Start session
session_start();

// Initialize Database instance
$db = new Database();

// Initialize response
$response = [
    "success" => false,
    "errors" => []
];

// function sendPassword($email, $password) {
//     $mail = new PHPMailer(true);

//     try {
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'chuquynh2004@gmail.com'; // Gmail của bạn
//         $mail->Password = 'oltukhsmikrcyiej'; // Mật khẩu ứng dụng
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port = 587;

//         $mail->setFrom('chuquynh2004@gmail.com', 'TicketWebsite');
//         $mail->addAddress($email);

//         $mail->isHTML(true);
//         $mail->Subject = 'Your Account Password';
//         $mail->Body = "Your account password is: <strong>$password</strong>";

//         $mail->send();
//         return true;
//     } catch (Exception $e) {
//         error_log("Failed to send password email: " . $mail->ErrorInfo);
//         return false;
//     }
// }

// $email = isset($_POST['action']) ? trim($_POST['action']) : '';
// if ('action' === "sendpass") {
//     $email = isset($_POST['email']) ? trim($_POST['email']) : '';

//     if (empty($email)) {
//         $response["errors"][] = [
//             "field" => "email",
//             "message" => "Email không được để trống."
//         ];
//     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $response["errors"][] = [
//             "field" => "email",
//             "message" => "Email không hợp lệ."
//         ];
//     } else {
//         // Check if the email exists in admin table
//         $adminQuery = "SELECT password FROM admin WHERE email = '{$db->link->real_escape_string($email)}'";
//         $adminResult = $db->select($adminQuery);

//         if ($adminResult) {
//             $admin = $adminResult->fetch_assoc();
//             $password = $admin['password'];

//             if (sendPassword($email, $password)) {
//                 $response["success"] = true;
//                 $response["message"] = "Mật khẩu đã được gửi đến email của bạn.";
//             } else {
//                 $response["errors"][] = [
//                     "field" => "general",
//                     "message" => "Không thể gửi email. Vui lòng thử lại sau."
//                 ];
//             }
//         } else {
//             // Check if the email exists in customer table
//             $customerQuery = "SELECT password FROM customer WHERE email = '{$db->link->real_escape_string($email)}'";
//             $customerResult = $db->select($customerQuery);

//             if ($customerResult) {
//                 $customer = $customerResult->fetch_assoc();
//                 $password = $customer['password'];

//                 if (sendPassword($email, $password)) {
//                     $response["success"] = true;
//                     $response["message"] = "Mật khẩu đã được gửi đến email của bạn.";
//                 } else {
//                     $response["errors"][] = [
//                         "field" => "general",
//                         "message" => "Không thể gửi email. Vui lòng thử lại sau."
//                     ];
//                 }
//             } else {
//                 $response["errors"][] = [
//                     "field" => "email",
//                     "message" => "Email không tồn tại trong hệ thống."
//                 ];
//             }
//         }
//     }

//     // Return response as JSON
//     header('Content-Type: application/json');
//     echo json_encode($response);
//     exit;
// }

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
