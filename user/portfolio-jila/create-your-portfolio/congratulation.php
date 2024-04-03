<?php
session_start();

// Check if the session variable 'user_status' is not set
if (!isset($_SESSION['user_status'])) {
    // Redirect the user to a specific page or display an error message
    header("Location: https://www.labs.cashjila.com/error-page/404");
    exit; // Stop script execution after redirection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generating your portfolio....</title>
</head>
<body>

<?php 
include_once('config/config.php');

$APIKEY = mysqli_real_escape_string($conn, $_SESSION['user_status']); // Escape the API key for security

$query = "SELECT `user_id` FROM `users` WHERE `token` = '$APIKEY'"; // Properly format the SQL query

$result = mysqli_query($conn, $query); // Execute the query

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id']; // Retrieve the user_id from the result set
    
    // Redirect the user to the specified URL
    echo "<script>
            alert('Congratulations! Your Profile Successfully Created.  $user_id;');
            window.location.href = 'https://www.labs.cashjila.com/portfolio-jila/src/?id=$user_id';
          </script>";
    exit; // Ensure script stops executing after redirection
} else {
    // Handle query execution errors
    echo "Error executing query: " . mysqli_error($conn);
}

?>
    
</body>
</html>
