<?php
include "header.php";
include "class/movie_class.php";
?>

<?php
$movie = new Movie;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'] ?? '';
    $duration = $_POST['duration'] ?? null; // Sử dụng null nếu không có giá trị
    $genre = $_POST['genre'] ?? '';
    $release_date = $_POST['release_date'] ?? '';
    
    if (empty($description)) {
        $description = null; // Nếu description rỗng, gán là NULL
    }
    
    if (empty($genre)) {
        $genre = null; // Nếu genre rỗng, gán là NULL
    }
    
    if ($duration === '') {
        $duration = null; // Nếu duration rỗng, gán là NULL
    }
    
    if (empty($release_date)) {
        $release_date = null; // Nếu release_date rỗng, gán là NULL
    }
    

    $insert_movie = $movie->insert_movie($title, $description, $duration, $genre, $release_date);

    if ($insert_movie) {
        echo "Thêm phim thành công!";
    } else {
        echo "Có lỗi xảy ra khi thêm phim.";
    }
}
?>

<section class="admin-content">
        <div class="admin-content-movie">
            <h1> Thêm phim</h1>
            <form action="" method="POST">
                <input type="text" name="title" placeholder="Nhập tên phim">
                <input type="text" name="description" placeholder="Mô tả">
                <input type="number" name="duration" placeholder="Thời lượng (phút)">
                <input type="text" name="genre" placeholder="Thể loại">
                <input type="date" name="release_date" placeholder="Ngày công chiếu">
                <button type="submit">ADD</button>
            </form>
        </div>
    </section>
</body>
</html>