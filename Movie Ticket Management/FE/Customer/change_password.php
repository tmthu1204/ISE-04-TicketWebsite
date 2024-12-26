<?php
include "database.php";
header('Content-Type: application/json');

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    session_start();
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'customer') {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Customer not logged in"]);
        exit;
    }
    
    $userId = $_SESSION["user"]["id"];

    $currentPassword = $db->link->real_escape_string($data['oldPassword']);
    $newPassword = $db->link->real_escape_string($data['newPassword']);

    $query = "SELECT password FROM customer WHERE customerID = $userId";
    $result = $db->select($query);

    if ($result) {
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        if (!password_verify($currentPassword, $hashedPassword)) {
            echo json_encode(['success' => false, 'message' => 'Mật khẩu hiện tại không đúng!']);
            exit;
        }

        $newHashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);


        $updateQuery = "UPDATE customer SET password = '$newHashedPassword' WHERE customerID = $userId";

        if ($db->update($updateQuery)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không thể cập nhật mật khẩu!']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Người dùng không tồn tại!']);
    }
}

?>
