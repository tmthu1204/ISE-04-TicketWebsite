<?php
include "header.php";
include "slider.php";
include "class/movie_class.php";
?>

<?php
$movie = new Movie;
$showMovie = $movie ->show_movie();
?>
<div class="admin-content-right">
    <div class="admin-content-right-movie-list">
        <h1> Danh sách phim</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Trailer</th>
                <th>Duration</th>
                <th>genre</th>
                <th>Realease Date</th>
            </tr> 
            <?php
            if($showMovie){$i=0;
                while($result = $showMovie->fetch_assoc()){$i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $result['movieID']?></td>
                <td><?php echo $result['title']?></td>
                <td><?php echo $result['description']?></td>
                <td><?php echo $result['trailerURL']?></td>
                <td><?php echo $result['duration']?></td>
                <td><?php echo $result['genre']?></td>
                <td><?php echo $result['releaseDate']?></td>
                <td><a href="editMovie.php?movieID=<?php echo $result['movieID']?>">Sửa</a>|<a href="deleteMovie.php?movieID=<?php echo $result['movieID']?>">Xóa</a></td>
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