<?php
include "header.php";
include "slider.php";
include "class/movie_class.php";
?>

<?php
$movie = new Movie;
$showMovie = $movie->show_movie();
?>
<div class="admin-content-right">
    <div class="admin-content-right-movie-list">
        <h1>Danh sách phim</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Country</th>
                <th>Language</th>
                <th>Intro</th>
                <th>Trailer</th>
                <th>Duration</th>
                <th>Genre</th>
                <th>Release Date</th>
                <th>Action</th>
            </tr>
            <?php
            if($showMovie){
                $i = 0;
                while($result = $showMovie->fetch_assoc()){
                    $i++;
                    // Giải mã description JSON để lấy các giá trị cần thiết
                    $description = json_decode($result['description'], true);
                    $image = $description['image'] ?? null;
                    $country = $description['country'] ?? null;
                    $language = $description['language'] ?? null;
                    $intro = $description['intro'] ?? null;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $result['movieID']; ?></td>
                <td><?php echo $result['title']; ?></td>
                <td><img src="images/<?php echo $image; ?>" alt="Poster" width="100" height="150"></td>
                <td><?php echo $country; ?></td>
                <td><?php echo $language; ?></td>
                <td><?php echo $intro; ?></td>
                <td><?php echo $result['trailerURL']; ?></td>
                <td><?php echo $result['duration']; ?></td>
                <td><?php echo $result['genre']; ?></td>
                <td><?php echo $result['releaseDate']; ?></td>
                <td><a href="editMovie.php?movieID=<?php echo $result['movieID']; ?>">Sửa</a> | 
                    <a href="deleteMovie.php?movieID=<?php echo $result['movieID']; ?>">Xóa</a></td>
            </tr>
            <?php
                }   
            }
            ?>
        </table>
    </div>
</div>
</section>
</body>
</html>
