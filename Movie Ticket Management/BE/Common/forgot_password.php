<?php
// Include configuration and database classes
require_once "config.php";
require_once "database.php";

// Include PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Start session
session_start();

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Initialize Database instance
$db = new Database();

// Function to send password via email
function sendPassword($email, $password) {
    $mail = new PHPMailer(true);

    try {
        // Setup PHPMailer
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chuquynh2004@gmail.com'; // Your Gmail address
        $mail->Password = 'oltukhsmikrcyiej'; // Application-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('chuquynh2004@gmail.com', 'TicketWebsite');
        $mail->addAddress($email); // Recipient's email address

        $mail->isHTML(true);
        $mail->Subject = 'Your Account Password';
        $mail->Body = "Your account password is: <strong>$password</strong>";

        $mail->send(); // Send the email
        return true;
    } catch (Exception $e) {
        // Log error and return false if sending fails
        error_log("Failed to send password email: " . $mail->ErrorInfo);
        return false;
    }
}

// Handle forgot password request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    if (empty($email)) {
        echo json_encode( ["field" => "email", "message" => "Email không được để trống"]);
    } elseif (!validateEmail($email)) {
        echo json_encode( ["field" => "email", "message" => "Email không hợp lệ"]);
    } else {
        // Check if the email exists in the admin table
        $adminQuery = "SELECT password FROM admin WHERE email = '{$db->link->real_escape_string($email)}'";
        $adminResult = $db->select($adminQuery);

        if ($adminResult) {
            $admin = $adminResult->fetch_assoc();
            $password = $admin['password'];

            // Send the password to the email
            if (sendPassword($email, $password)) {
                echo json_encode(['success' => true, 'message' => 'Mật khẩu đã được gửi đến email của bạn']);
            } else {
                echo json_encode( ["field" => "general", "message" => "Không thể gửi email. Vui lòng thử lại sau."]);
            }
        } else {
            // Check if the email exists in the customer table
            $customerQuery = "SELECT password FROM customer WHERE email = '{$db->link->real_escape_string($email)}'";
            $customerResult = $db->select($customerQuery);

            if ($customerResult) {
                $customer = $customerResult->fetch_assoc();
                $password = $customer['password'];

                // Send the password to the email
                if (sendPassword($email, $password)) {
                    echo json_encode(['success' => true, 'message' => 'Mật khẩu đã được gửi đến email của bạn']);
                } else {
                    echo json_encode(["field" => "general", "message" => "Không thể gửi email. Vui lòng thử lại sau."]);
                }
            }else {
                echo json_encode(["field"=> "email", "message"=> "Email không tồn tại trong hệ thống."]);
            }
        }
    }

    // Return response as JSON
    header('Content-Type: application/json');
}
?>
