<?php
include "database.php";

class MovieModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insertMovie($data) {
        $jsonData = json_encode([
            'image' => $data['poster'],
            'country' => $data['country'],
            'language' => $data['language'],
            'intro' => $data['intro']
        ]);

        $description = $jsonData ? "'$jsonData'" : "NULL";

        $query = "INSERT INTO movie (title, description, trailerURL, duration, genre, releaseDate) 
                  VALUES (
                      '{$data['title']}', 
                      $description, 
                      " . ($data['trailerURL'] ? "'{$data['trailerURL']}'" : "NULL") . ", 
                      " . ($data['duration'] ? $data['duration'] : "NULL") . ", 
                      " . ($data['genre'] ? "'{$data['genre']}'" : "NULL") . ", 
                      " . ($data['releaseDate'] ? "'{$data['releaseDate']}'" : "NULL") . "
                  )";

        return $this->db->insert($query);
    }

    public function getMovie($movieID) {
        $query = "SELECT * FROM movie WHERE movieID = '$movieID'";
        $result = $this->db->select($query);
        return $result ? $result->fetch_assoc() : null;
    }

    public function getAllMovies() {
        $query = "SELECT * FROM movie ORDER BY movieID DESC";
        $result = $this->db->select($query);
        $movies = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $description = json_decode($row['description'], true);
                $row['description'] = $description;
                $movies[] = $row;
            }
        }
        // Log the result
        error_log(print_r($movies, true));  // Log the movies array for debugging
        return $movies;
    }

    public function updateMovie($data, $movieID) {
        $jsonData = json_encode([
            'image' => $data['poster'],
            'country' => $data['country'],
            'language' => $data['language'],
            'intro' => $data['intro']
        ]);

        $description = $jsonData ? "'$jsonData'" : "NULL";

        $query = "UPDATE movie SET 
                      title = '{$data['title']}', 
                      description = $description, 
                      trailerURL = " . ($data['trailerURL'] ? "'{$data['trailerURL']}'" : "NULL") . ", 
                      duration = " . ($data['duration'] ? $data['duration'] : "NULL") . ", 
                      genre = '{$data['genre']}', 
                      releaseDate = '{$data['releaseDate']}' 
                  WHERE movieID = '$movieID'";

        return $this->db->update($query);
    }

    public function deleteMovie($movieID) {
        $query = "DELETE FROM movie WHERE movieID = '$movieID'";
        return $this->db->delete($query);
    }


}
?>
