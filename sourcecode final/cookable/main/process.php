<?php
$servername = "localhost";
$username = "root";
$password = ""; // thay bằng mật khẩu cơ sở dữ liệu của bạn
$dbname = "ingredients_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingredient = $_POST['nguyenlieu'];
    $quantity = $_POST['soluong'];

    $sql = "SELECT quantity FROM ingredients WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $ingredient);
    $stmt->execute();
    $stmt->bind_result($available_quantity);
    $stmt->fetch();

    if ($available_quantity !== null && $available_quantity >= $quantity) {
        echo "Bạn có đủ $ingredient.";
    } else {
        echo "Bạn không có đủ $ingredient. Số lượng hiện có là $available_quantity grams.";
    }

    $stmt->close();
}

$conn->close();
?>
