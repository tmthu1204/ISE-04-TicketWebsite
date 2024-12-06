<?php
include "class/movie_class.php";
$movie = new Movie;
if (!isset($_GET["movieID"])||$_GET["movieID"]==NULL) {
    echo "<script>window.location = 'showMovie.php'</script>";
}
else {
    $movieID = $_GET["movieID"];
}
    $delete_movie = $movie -> delete_movie($movieID);
    
?>
