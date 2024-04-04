<?php
session_start();

include_once("config/config.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form for service 1
    $service_name_1 = mysqli_real_escape_string($conn, $_POST['service_name_1']);
    $service_description_1 = mysqli_real_escape_string($conn, $_POST['service_description_1']);
    $price_range_1 = mysqli_real_escape_string($conn, $_POST['price_range_1']);

    // Retrieve data from the form for service 2
    $service_name_2 = mysqli_real_escape_string($conn, $_POST['service_name_2']);
    $service_description_2 = mysqli_real_escape_string($conn, $_POST['service_description_2']);
    $price_range_2 = mysqli_real_escape_string($conn, $_POST['price_range_2']);

    // Retrieve data from the form for service 3
    $service_name_3 = mysqli_real_escape_string($conn, $_POST['service_name_3']);
    $service_description_3 = mysqli_real_escape_string($conn, $_POST['service_description_3']);
    $price_range_3 = mysqli_real_escape_string($conn, $_POST['price_range_3']);

    $s_id = mysqli_real_escape_string($conn, $_SESSION['user_status']);

    // Insert into Services table
    $sql_services = "INSERT INTO Services (service_name, service_description, price_range) 
                     VALUES ('$service_name_1', '$service_description_1', '$price_range_1'),
                            ('$service_name_2', '$service_description_2', '$price_range_2'),
                            ('$service_name_3', '$service_description_3', '$price_range_3')";
    mysqli_query($conn, $sql_services);

    // Get the last inserted service IDs
    $service_id1 = mysqli_insert_id($conn);
    $service_id2 = $service_id1 + 1;
    $service_id3 = $service_id1 + 2;

    // Insert into PricingServices table
    $sql_pricing_services = "INSERT INTO PricingServices (s_id, service_id1, service_id2, service_id3) 
                             VALUES ('$s_id', '$service_id1', '$service_id2', '$service_id3')";
    mysqli_query($conn, $sql_pricing_services);

    // Close the database connection
    mysqli_close($conn);

    echo "<script>
                            alert('Congratulations! Your Profile Successfully Created.');
                            window.location.href = 'congratulation.php';
                          </script>";
                          
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Services and PricingServices</title>
</head>

<body>
    <h2>Insert Services and PricingServices</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <!-- Service 1 Details -->
        <h3>Service 1 Details</h3>
        <label for="service_name_1">Service Name:</label>
        <input type="text" id="service_name_1" name="service_name_1" required><br>
        <label for="service_description_1">Service Description:</label><br>
        <textarea id="service_description_1" name="service_description_1" rows="4" cols="50" required></textarea><br>
        <label for="price_range_1">Price Range:</label>
        <input type="text" id="price_range_1" name="price_range_1" required><br><br>

        <!-- Service 2 Details -->
        <h3>Service 2 Details</h3>
        <label for="service_name_2">Service Name:</label>
        <input type="text" id="service_name_2" name="service_name_2" required><br>
        <label for="service_description_2">Service Description:</label><br>
        <textarea id="service_description_2" name="service_description_2" rows="4" cols="50" required></textarea><br>
        <label for="price_range_2">Price Range:</label>
        <input type="text" id="price_range_2" name="price_range_2" required><br><br>

        <!-- Service 3 Details -->
        <h3>Service 3 Details</h3>
        <label for="service_name_3">Service Name:</label>
        <input type="text" id="service_name_3" name="service_name_3" required><br>
        <label for="service_description_3">Service Description:</label><br>
        <textarea id="service_description_3" name="service_description_3" rows="4" cols="50" required></textarea><br>
        <label for="price_range_3">Price Range:</label>
        <input type="text" id="price_range_3" name="price_range_3" required><br><br>

        <!-- Hidden input for S_ID -->
        <input type="hidden" id="s_id" name="s_id" value="<?php echo $_SESSION['user_status']; ?>">

        <input type="submit" value="Submit">
    </form>
</body>

</html>
