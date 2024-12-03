<?php
    // Include the configuration and database files
    include 'config.php';
    include 'database.php';
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if all required fields are set
        if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Create a new Database object
            $db = new Database();
    
            // Prepare the SQL query to insert data
            $query = "INSERT INTO customer(username, email, password) VALUES('$username', '$email', '$password')";
    
            // Execute the query
            $insert = $db->insert($query);
    
            // Check if the insert was successful
            if ($insert) {
                echo "Registration successful!";
            } else {
                echo "Registration failed!";
            }
        } else {
            echo "All fields are required.";
        }
    } else {
        echo "Invalid request method.";
    }
?>
