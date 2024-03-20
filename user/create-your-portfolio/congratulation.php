<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generating your portfolio....</title>
</head>
<body>

<!-- <h1><span class='typing-animation'>Generating your portfolio........ <br>
</span></h1>-->
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
   
    header("Location: http://localhost/Project2024/Portfolio-Jila/user/src/?id=$user_id");
    exit; // Ensure script stops executing after redirection
} else {
    // Handle query execution errors
    echo "Error executing query: " . mysqli_error($conn);
}

?>
    
</body>
</html>
