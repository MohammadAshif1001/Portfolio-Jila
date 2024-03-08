<?php
include_once('config/config.php');

session_start(); // Start the session

$APIKEY = mysqli_real_escape_string($conn, $_SESSION['status']); // Escape the API key for security

$query = "SELECT `user_id` FROM `users` WHERE `token` = '$APIKEY'"; // Properly format the SQL query

$result = mysqli_query($conn, $query); // Execute the query

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id']; // Retrieve the user_id from the result set
    
    // Redirect the user to the specified URL
    header("Location: http://localhost/MArch24/Portfolio-Jila/frontend/src/?id=$user_id");
    exit; // Ensure script stops executing after redirection
} else {
    // Handle query execution errors
    echo "Error executing query: " . mysqli_error($conn);
}




?>