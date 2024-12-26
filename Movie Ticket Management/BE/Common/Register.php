<?php
session_start();
header('Content-Type: application/json');
include 'config.php';
include 'database.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function sendOTP($email) {
    $otp = rand(100000, 999999); // Tạo OTP
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_email'] = $email;

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'chuquynh2004@gmail.com'; // Gmail của bạn
        $mail->Password = 'oltukhsmikrcyiej'; // Mật khẩu ứng dụng
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('chuquynh2004@gmail.com', 'TicketWebsite');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body = "Your OTP code is: <strong>$otp</strong>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Failed to send OTP email: " . $mail->ErrorInfo);
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $repass = trim($_POST['repass'] ?? '');
    $otp = trim($_POST['otp'] ?? '');
    $username = trim($_POST['username'] ?? '');

    $errors = [];

    $db = new Database();

    if ($action === "register") {
        if (empty($username)) {
            $errors[] = ["field" => "username", "message" => "Tên đăng nhập không được để trống"];
        }
    
        if (empty($email)) {
            $errors[] = ["field" => "email", "message" => "Email không được để trống"];
        } elseif (!validateEmail($email)) {
            $errors[] = ["field" => "email", "message" => "Email không hợp lệ"];
        } elseif ($db->select("SELECT * FROM customer WHERE email = '$email'")) {
            $errors[] = ["field" => "email", "message" => "Email đã tồn tại"];
        }
    
        if (empty($password)) {
            $errors[] = ["field" => "password", "message" => "Mật khẩu không được để trống"];
        }
    
        if ($password !== $repass) {
            $errors[] = ["field" => "repass", "message" => "Mật khẩu nhập lại không khớp"];
        }
    
        if (empty($errors)) {
            // Lưu thông tin vào session
            $_SESSION['username'] = $username;
            $_SESSION['password'] = password_hash($password, PASSWORD_BCRYPT); // Băm mật khẩu
    
            if (sendOTP($email)) {
                echo json_encode(['success' => true, 'message' => 'OTP đã được gửi đến email của bạn']);
                exit();
            } else {
                $errors[] = ["field" => null, "message" => "Không thể gửi OTP. Vui lòng thử lại."];
            }
        }
    
    } elseif ($action === "verify") {
        $username = $_SESSION['username'];
        $hashedPassword = $_SESSION['password'];
        if ((string)$otp === (string)$_SESSION['otp'] && $email === $_SESSION['otp_email']) {
            // Insert username, email, and password into the database without hashing
            if ($db->insert("INSERT INTO customer (username, email, password) VALUES ('$username', '$email', '$hashedPassword')")) {
                unset($_SESSION['otp'], $_SESSION['otp_email'], $_SESSION['username'], $_SESSION['password']);
                echo json_encode(['success' => true, 'message' => 'Đăng ký thành công. Vui lòng đăng nhập.']);
                exit();
            } else {
                $errors[] = ["field" => null, "message" => "Đăng ký thất bại. Vui lòng thử lại."];
            }
        } else {
            $errors[] = ["field" => "otp", "message" => "Mã OTP không chính xác"];
        }
    }

    echo json_encode(['success' => false, 'errors' => $errors]);
    exit();
}
?>
