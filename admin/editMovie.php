<?php
include "header.php";
include "slider.php";
include "class/movie_class.php";
?>

<?php
$movie = new Movie;
if (!isset($_GET["movieID"])||$_GET["movieID"]==NULL) {
    echo "<script>window.location = 'showMovie.php'</script>";
}
else {
    $movieID = $_GET["movieID"];
}
    $get_movie = $movie -> get_movie($movieID);
    if($get_movie){
        $result = $get_movie -> fetch_assoc();
    }
?>

<?php
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
    $update_movie = $movie->update_movie($title, $description, $trailerURL, $duration, $genre, $releaseDate,$movieID);
    if ($update_movie) {
        echo "Cập nhật thành công!";
    } else {
        echo "Có lỗi xảy ra khi cập nhật.";
    }
}
?>

<div class="admin-content-right">
<div class="admin-content-right-movie">
                <h1> Chỉnh sửa phim</h1>
                <form action="" method="POST">
                    <input type="text" required name="title" placeholder="Nhập tên phim"
                    value = "<?php echo $result['title']?>">    
                    <input type="text" name="description" placeholder="Mô tả"
                    value = "<?php echo $result['description']?>">
                    <input type="url" name="trailerURL" placeholder="URL trailer"
                    value = "<?php echo $result['trailerURL']?>">
                    <input type="number" name="duration" placeholder="Thời lượng (phút)"
                    value = "<?php echo $result['duration']?>">
                    <input type="text" name="genre" placeholder="Thể loại"
                    value = "<?php echo $result['genre']?>">
                    <input type="date" name="releaseDate" placeholder="Ngày công chiếu"
                    value = "<?php echo $result['releaseDate']?>">
                    <button type="submit">ADD</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>