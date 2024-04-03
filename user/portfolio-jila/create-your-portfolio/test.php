<?php session_start()?>


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
