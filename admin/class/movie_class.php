<?php
include "database.php";
?>

<?php
class Movie{
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    // public function insert_movie($title, $description, $trailerURL, $duration, $genre, $releaseDate) {
    //     $query = "INSERT INTO movie (title, description, trailerURL, duration, genre, releaseDate) 
    //               VALUES (
    //                   '$title', 
    //                   " . ($description ? "'$description'" : "NULL") . ", 
    //                   " . ($trailerURL ? "'$trailerURL'" : "NULL") . ", 
    //                   " . ($duration ? $duration : "NULL") . ", 
    //                   " . ($genre ? "'$genre'" : "NULL") . ", 
    //                   " . ($releaseDate ? "'$releaseDate'" : "NULL") . "
    //               )";
        
    //     $result = $this->db->insert($query);
    //     header('Location: showMovie.php');
    //     return $result;
    // }

    public function insert_movie($title, $trailerURL, $duration, $genre, $releaseDate, $poster, $country, $language, $intro) {
        // Tạo JSON từ các dữ liệu
        $jsonData = json_encode([
            'image' => $poster,
            'country' => $country,
            'language' => $language,
            'intro' => $intro
        ]);
        
        // Xử lý cột description và đảm bảo rằng JSON không phải là NULL
        $description = $jsonData ? "'$jsonData'" : "NULL"; 
    
        // Xây dựng câu lệnh SQL
        $query = "INSERT INTO movie (title, description, trailerURL, duration, genre, releaseDate) 
                  VALUES (
                      '$title', 
                      $description, 
                      " . ($trailerURL ? "'$trailerURL'" : "NULL") . ", 
                      " . ($duration ? $duration : "NULL") . ", 
                      " . ($genre ? "'$genre'" : "NULL") . ", 
                      " . ($releaseDate ? "'$releaseDate'" : "NULL") . "
                  )";
    
        // In câu lệnh SQL để kiểm tra
        echo $query;
    
        // Thực thi câu lệnh SQL
        $result = $this->db->insert($query);
        header('Location: showMovie.php');
        return $result;
    }
    

    public function show_movie(){
        $query = "SELECT * FROM movie ORDER BY movieID DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_movie($movieID) {
        $query = "SELECT * FROM movie WHERE movieID = '$movieID'";
        $result = $this->db->select($query);
    
        // Assuming $result is a mysqli_result object, fetch the first row
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc(); // Fetch a single row as an associative array
        } else {
            return null; // No movie found
        }
    }
    

    

    // public function update_movie($title, $description, $trailerURL, $duration, $genre, $releaseDate,$movieID){
    //     $query = "UPDATE movie SET 
    //         title = " . ($title !== NULL ? "'$title'" : "title") . ", 
    //         description = " . ($description !== NULL ? "'$description'" : "description") . ", 
    //         trailerURL = " . ($trailerURL !== NULL ? "'$trailerURL'" : "trailerURL") . ", 
    //         duration = " . ($duration !== NULL ? $duration : "duration") . ", 
    //         genre = " . ($genre !== NULL ? "'$genre'" : "genre") . ", 
    //         releaseDate = " . ($releaseDate !== NULL ? "'$releaseDate'" : "releaseDate") . " 
    //     WHERE movieID = '$movieID'";
    //     header('Location: showMovie.php');
    //     $result = $this->db->update($query);
    //     return $result;
    // }

    public function update_movie($title, $trailerURL, $duration, $genre, $releaseDate, $poster, $country, $language, $intro, $movieID) {
        // Prepare JSON data for description
        $descriptionData = [
            'image' => $poster,
            'country' => $country,
            'language' => $language,
            'intro' => $intro
        ];
        $description = json_encode($descriptionData, JSON_UNESCAPED_UNICODE);
    
        // Build the query for updating movie details
        $query = "UPDATE movie SET 
            title = '" . ($title !== NULL ? $title : 'title') . "', 
            description = '$description', 
            trailerURL = '" . ($trailerURL !== NULL ? $trailerURL : 'trailerURL') . "', 
            duration = '" . ($duration !== NULL ? $duration : 'duration') . "', 
            genre = '" . ($genre !== NULL ? $genre : 'genre') . "', 
            releaseDate = '" . ($releaseDate !== NULL ? $releaseDate : 'releaseDate') . "' 
        WHERE movieID = '$movieID'";
    
        // Execute the query and update the movie
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