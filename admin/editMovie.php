<?php
include "header.php";
include "slider.php";
include "class/movie_class.php";
?>

<?php
$movie = new Movie;
$movieID = $_GET["movieID"];

// Fetch movie details from the database
$get_movie = $movie->get_movie($movieID);
if ($get_movie) {
    $result = $get_movie; // If the `get_movie` function returns an array, use it directly
    // Decode the description field (it may be JSON encoded)
    $description = json_decode($result['description'], true);
    
    // Check if description was decoded correctly and has the 'image' field
    if ($description === null) {
        // Handle error if JSON is invalid
        echo "<script>alert('Không thể giải mã dữ liệu mô tả!'); window.location = 'showMovie.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Không tìm thấy thông tin phim!'); window.location = 'showMovie.php';</script>";
    exit();
}

?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $title = $_POST['title'];
    $trailerURL = $_POST['trailerURL'] ?? null;
    $duration = $_POST['duration'] ?? null;
    $genre = $_POST['genre'] ?? '';
    $releaseDate = $_POST['releaseDate'] ?? '';
    $poster = $_FILES['poster']['name'] ?? null; // New image upload
    $country = $_POST['country'] ?? '';
    $language = $_POST['language'] ?? '';
    $intro = $_POST['intro'] ?? '';
    
    // If a new poster image is uploaded
    if ($poster) {
        // Move the new poster to the 'images' folder
        move_uploaded_file($_FILES['poster']['tmp_name'], "images/" . $_FILES['poster']['name']);
        $poster = $_FILES['poster']['name']; // Store the new image path
    } else {
        // If no new poster image is uploaded, retain the current one
        // Use the current image from the description, fallback to the result if needed
        $poster = $description['image'] ?? $result['description']['image']; 
    }
    
    // Update the movie record with the new details (poster will be the new or current image)
    $update_movie = $movie->update_movie($title, $trailerURL, $duration, $genre, $releaseDate, $poster, $country, $language, $intro, $movieID);
}
?>

<div class="admin-content-right">
    <div class="admin-content-right-movie">
        <h1> Chỉnh sửa phim</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" required name="title" placeholder="Nhập tên phim" value="<?php echo $result['title']?>">
            <textarea name="description" placeholder="Mô tả"><?php echo htmlspecialchars($description['intro'] ?? ''); ?></textarea>
            <input type="url" name="trailerURL" placeholder="URL trailer" value="<?php echo $result['trailerURL']?>">
            <input type="number" name="duration" placeholder="Thời lượng (phút)" value="<?php echo $result['duration']?>">
            <input type="text" name="genre" placeholder="Thể loại" value="<?php echo $result['genre']?>">
            <input type="date" name="releaseDate" placeholder="Ngày công chiếu" value = "<?php echo $result['releaseDate']?>">                     
            <input type="file" name="poster" id="poster">
            <input type="text" name="country" placeholder="Quốc gia" value="<?php echo $description['country'] ?? '' ?>">
            <input type="text" name="language" placeholder="Ngôn ngữ" value="<?php echo $description['language'] ?? '' ?>">
            <input type="text" name="intro" placeholder="Giới thiệu" value="<?php echo $description['intro'] ?? '' ?>">
            <button type="submit">Cập nhật</button>
        </form>
    </div>
</div>
</section>
</body>
</html>
