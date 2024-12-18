<?php
session_start();
include 'config.php';
include 'database.php';

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $repass = trim($_POST['repass'] ?? '');

    $errors = [];

    // Validate username
    if (empty($username)) {
        $errors[] = ["field" => "username", "message" => "Tên đăng nhập không được để trống"];
    }

    // Validate email
    if (empty($email)) {
        $errors[] = ["field" => "email", "message" => "Email không được để trống"];
    } elseif (!validateEmail($email)) {
        $errors[] = ["field" => "email", "message" => "Email không hợp lệ"];
    }

    // Validate password
    if (empty($password)) {
        $errors[] = ["field" => "password", "message" => "Mật khẩu không được để trống"];
    }

    // Validate repass
    if ($password !== $repass) {
        $errors[] = ["field" => "repass", "message" => "Mật khẩu nhập lại không khớp"];
    }

    // Check if email exists
    $db = new Database();
    $query = "SELECT * FROM customer WHERE email = '$email'";
    if ($db->select($query)) {
        $errors[] = ["field" => "email", "message" => "Email đã tồn tại"];
    }
    
    // Nếu không có lỗi, chèn dữ liệu vào cơ sở dữ liệu
    if (empty($errors)) {
        $db = new Database();
        $query = "INSERT INTO customer (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($db->insert($query)) {
            echo json_encode(['success' => true]);
            exit();
        } else {
            $errors[] = ["field" => null, "message" => "Đăng ký thất bại. Vui lòng thử lại."];
        }
    }

    // Trả về danh sách lỗi
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit();
} else {
    echo json_encode(['success' => false, 'errors' => [["field" => null, "message" => "Phương thức không hợp lệ"]]]);
    exit();
}
