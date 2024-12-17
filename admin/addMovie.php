<?php
include "header.php";
include "slider.php";
include "class/movie_class.php";
?>

<?php
$movie = new Movie;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $title = $_POST['title'];
    $trailerURL = $_POST['trailerURL'] ?? null;
    $duration = $_POST['duration'] ?? null;
    $genre = $_POST['genre'] ?? '';
    $releaseDate = $_POST['releaseDate'] ?? '';
    $poster = $_FILES['poster']['name'] ?? null;
    $country = $_POST['country'] ?? '';
    $language = $_POST['language'] ?? '';
    $intro = $_POST['intro'] ?? '';
    move_uploaded_file($_FILES['poster']['tmp_name'],"images/".$_FILES['poster']['name']);
    
    // $title = empty($title) ? null : $title;
    // $description = empty($description) ? null : $description;
    // $trailerURL = empty($trailerURL) ? null : $trailerURL;
    // $duration = empty($duration) ? null : $duration;
    // $genre = empty($genre) ? null : $genre;
    // $releaseDate = empty($releaseDate) ? null : $releaseDate;
    // $poster = empty($poster) ? null : $poster;
    // $country = empty($country) ? null : $country;
    // $language = empty($language) ? null : $language;
    // $intro = empty($intro) ? null : $intro;
    
    // Insert movie
    $insert_movie = $movie->insert_movie($title, $trailerURL, $duration, $genre, $releaseDate, $poster, $country, $language, $intro);

}
?>

<div class="admin-content-right">
<div class="admin-content-right-movie">
                <h1> Thêm phim</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="text" required name="title" placeholder="Nhập tên phim">               
                    <input type="url" name="trailerURL" placeholder="URL trailer">
                    <input type="number" name="duration" placeholder="Thời lượng (phút)">
                    <input type="text" name="genre" placeholder="Thể loại">
                    <input type="date" name="releaseDate" placeholder="Ngày công chiếu">
                    <input type="text" name="country" placeholder="Quốc gia">
                    <input type="text" name="language" placeholder="Ngôn ngữ">
                    <textarea name="intro" placeholder="Giới thiệu phim"></textarea>
                    <input type="file" name="poster" placeholder="Poster">
                    <button type="submit">ADD</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>