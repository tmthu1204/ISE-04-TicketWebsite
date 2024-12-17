<?php
require_once '../database.php';

// Tạo đối tượng Database
$movie = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $title = $_POST['title'];
    $trailerURL = $_POST['trailerURL'] ?? null;
    $duration = $_POST['duration'] ?? null;
    $genre = $_POST['genre'] ?? '';
    $releaseDate = $_POST['releaseDate'] ?? '';
    $poster = $_FILES['poster']['name'] ?? null;
    $country = $_POST['country'] ?? '';
    $language = $_POST['language'] ?? '';
    $intro = $_POST['intro'] ?? '';

    // Di chuyển file ảnh poster vào thư mục 'images'
    if ($poster) {
        move_uploaded_file($_FILES['poster']['tmp_name'], "images/" . $_FILES['poster']['name']);
    }

    // Dữ liệu chuẩn bị để insert vào database
    $data = [
        'title' => $title,
        'poster' => $poster,  // Lưu tên file ảnh poster
        'country' => $country,
        'language' => $language,
        'intro' => $intro,
        'trailerURL' => $trailerURL,
        'duration' => $duration,
        'genre' => $genre,
        'releaseDate' => $releaseDate
    ];

    // Gọi hàm insertMovie
    $response = insertMovie($movie, $data);

    // Đặt content-type là JSON để trả kết quả
    header('Content-Type: application/json');

    // Trả về kết quả dưới dạng JSON
    echo json_encode($response);
}

// Hàm insertMovie để thêm phim vào cơ sở dữ liệu
function insertMovie($db, $data) {
    // Mã hóa description thành JSON
    $jsonData = json_encode([
        'image' => $data['poster'], // Lưu tên ảnh poster
        'country' => $data['country'],
        'language' => $data['language'],
        'intro' => $data['intro']
    ]);

    // Kiểm tra xem mã hóa JSON có thành công không
    $description = $jsonData ? "'$jsonData'" : "NULL";

    // Chuẩn bị câu truy vấn SQL
    $query = "INSERT INTO movie (title, description, trailerURL, duration, genre, releaseDate) 
                VALUES (
                    '{$data['title']}', 
                    $description, 
                    " . ($data['trailerURL'] ? "'{$data['trailerURL']}'" : "NULL") . ", 
                    " . ($data['duration'] ? $data['duration'] : "NULL") . ", 
                    " . ($data['genre'] ? "'{$data['genre']}'" : "NULL") . ", 
                    " . ($data['releaseDate'] ? "'{$data['releaseDate']}'" : "NULL") . "
                )";

    // Gọi phương thức insert() để thực hiện câu truy vấn
    if ($db->insert($query)) {
        return ['status' => 'success', 'message' => 'Movie inserted successfully'];
    } else {
        return ['status' => 'error', 'message' => 'Database insertion failed'];
    }
}
?>
