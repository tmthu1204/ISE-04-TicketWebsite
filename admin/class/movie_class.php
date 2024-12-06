<?php
include "database.php";
?>

<?php
class Movie{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function insert_movie($title, $description, $trailerURL, $duration, $genre, $releaseDate) {
        $query = "INSERT INTO movie (title, description, trailerURL, duration, genre, releaseDate) 
                  VALUES (
                      '$title', 
                      " . ($description ? "'$description'" : "NULL") . ", 
                      " . ($trailerURL ? "'$trailerURL'" : "NULL") . ", 
                      " . ($duration ? $duration : "NULL") . ", 
                      " . ($genre ? "'$genre'" : "NULL") . ", 
                      " . ($releaseDate ? "'$releaseDate'" : "NULL") . "
                  )";
        
        $result = $this->db->insert($query);
        header('Location: showMovie.php');
        return $result;
    }

    public function show_movie(){
        $query = "SELECT * FROM movie ORDER BY movieID DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_movie($movieID){
        $query = "SELECT * FROM movie WHERE movieID = '$movieID'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_movie($title, $description, $trailerURL, $duration, $genre, $releaseDate,$movieID){
        $query = "UPDATE movie SET 
            title = " . ($title !== NULL ? "'$title'" : "title") . ", 
            description = " . ($description !== NULL ? "'$description'" : "description") . ", 
            trailerURL = " . ($trailerURL !== NULL ? "'$trailerURL'" : "trailerURL") . ", 
            duration = " . ($duration !== NULL ? $duration : "duration") . ", 
            genre = " . ($genre !== NULL ? "'$genre'" : "genre") . ", 
            releaseDate = " . ($releaseDate !== NULL ? "'$releaseDate'" : "releaseDate") . " 
        WHERE movieID = '$movieID'";
        header('Location: showMovie.php');
        $result = $this->db->update($query);
        return $result;
    }

    public function delete_movie($movieID){
        $query = "DELETE FROM movie WHERE movieID = '$movieID'";
        header('Location: showMovie.php');
        $result = $this->db->delete($query);
        return $result;
    }
}

?>