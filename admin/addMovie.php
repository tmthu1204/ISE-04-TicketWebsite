<?php
include "header.php";
include "slider.php";
include "class/movie_class.php";
?>

<?php
$movie = new Movie;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'] ?? '';
    $trailerURL = $_POST['trailerURL'] ?? null;
    $duration = $_POST['duration'] ?? null; // Sử dụng null nếu không có giá trị
    $genre = $_POST['genre'] ?? '';
    $releaseDate = $_POST['releaseDate'] ?? '';
    
    $description = empty($description) ? null : $description;
    $trailerURL = empty($trailerURL) ? null : $trailerURL;
    $genre = empty($genre) ? null : $genre;
    $duration = $duration === '' ? null : $duration;
    $releaseDate = empty($releaseDate) ? null : $releaseDate;
    $insert_movie = $movie->insert_movie($title, $description, $trailerURL, $duration, $genre, $releaseDate);
    if ($insert_movie) {
        echo "Thêm phim thành công!";
    } else {
        echo "Có lỗi xảy ra khi thêm phim.";
    }
}
?>

<div class="admin-content-right">
<div class="admin-content-right-movie">
            <h1> Thêm phim</h1>
            <form action="" method="POST">
                <input type="text" required name="title" placeholder="Nhập tên phim">
                <input type="text" name="description" placeholder="Mô tả">
                <input type="url" name="trailerURL" placeholder="URL trailer">
                <input type="number" name="duration" placeholder="Thời lượng (phút)">
                <input type="text" name="genre" placeholder="Thể loại">
                <input type="date" name="releaseDate" placeholder="Ngày công chiếu">
                <button type="submit">ADD</button>
            </form>
        </div>
    </div>
    </section>
</body>
</html>