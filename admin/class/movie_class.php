<?php
include "database.php";
?>

<?php
class Movie{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function insert_movie($title, $description, $duration, $genre, $release_date){
        $query = "INSERT INTO movie (title, description, duration, genre, releaseDate) 
        VALUES ('$title', " . ($description ? "'$description'" : "NULL") . ", " . ($duration ? $duration : "NULL") . ", " . ($genre ? "'$genre'" : "NULL") . ", " . ($release_date ? "'$release_date'" : "NULL") . ")";
        $result = $this->db->insert($query);
        return $result;
    }
}
?>