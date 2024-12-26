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

// Generate a random temporary password
function generateTemporaryPassword($length = 8) {
    return bin2hex(random_bytes($length / 2)); // Generate a random string
}

// Hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Function to send password via email
function sendPassword($email, $tempPassword) {
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
        $mail->Subject = 'Your Temporary Password';
        $mail->Body = "Your temporary password is: <strong>$tempPassword</strong>. Please log in and change your password.";

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
        $adminQuery = "SELECT * FROM admin WHERE email = '{$db->link->real_escape_string($email)}'";
        $adminResult = $db->select($adminQuery);

        if ($adminResult) {
            $admin = $adminResult->fetch_assoc();
            $tempPassword = generateTemporaryPassword();
            $hashedPassword = hashPassword($tempPassword);

            // Update the password in the database
            $updateQuery = "UPDATE admin SET password = '{$hashedPassword}' WHERE adminID = {$admin['adminID']}";
            if ($db->update($updateQuery)) {
                if (sendPassword($email, $tempPassword)) {
                    echo json_encode(['success' => true, 'message' => 'Mật khẩu tạm thời đã được gửi đến email của bạn']);
                } else {
                    echo json_encode(["field" => "general", "message" => "Không thể gửi email. Vui lòng thử lại sau."]);
                }
            } else {
                echo json_encode(["field" => "general", "message" => "Không thể cập nhật mật khẩu."]);
            }
        } else {
            // Check if the email exists in the customer table
            $customerQuery = "SELECT * FROM customer WHERE email = '{$db->link->real_escape_string($email)}'";
            $customerResult = $db->select($customerQuery);

            if ($customerResult) {
                $customer = $customerResult->fetch_assoc();
                $tempPassword = generateTemporaryPassword();
                $hashedPassword = hashPassword($tempPassword);

                // Update the password in the database
                $updateQuery = "UPDATE customer SET password = '{$hashedPassword}' WHERE customerID = {$customer['customerID']}";
                if ($db->update($updateQuery)) {
                    if (sendPassword($email, $tempPassword)) {
                        echo json_encode(['success' => true, 'message' => 'Mật khẩu tạm thời đã được gửi đến email của bạn']);
                    } else {
                        echo json_encode(["field" => "general", "message" => "Không thể gửi email. Vui lòng thử lại sau."]);
                    }
                } else {
                    echo json_encode(["field" => "general", "message" => "Không thể cập nhật mật khẩu."]);
                }
            } else {
                echo json_encode(["field" => "email", "message" => "Email không tồn tại trong hệ thống."]);
            }
        }
    }

    // Return response as JSON
    header('Content-Type: application/json');
}
?>
