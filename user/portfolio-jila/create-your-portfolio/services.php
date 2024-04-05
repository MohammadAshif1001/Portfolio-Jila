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
    <link rel="stylesheet" href="../src/include/style.css">

    <title>Showcase Your Work to the World: Publish Your Portfolio</title>

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #regiration_form fieldset:not(:first-of-type) {
            display: none;
        }

        .progress {
            height: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #f8f9fa;
            border-radius: 4px;
        }

        .progress-bar {
            float: left;
            width: 0;
            height: 100%;
            font-size: 12px;
            color: #fff;
            text-align: center;
            background-color: #007bff;
            transition: width 0.6s ease;
        }
    </style>
</head>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input[type="text"]');
        const textareas = document.querySelectorAll('textarea');
        const inputWordLimit = 50; // Word limit for input fields
        const textareaWordLimit = 200; // Word limit for textarea

        // Function to handle word limit for input fields
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const words = this.value.trim().split(/\s+/);
                if (words.length > inputWordLimit) {
                    alert(`Word limit exceeded! Maximum ${inputWordLimit} words allowed.`);
                    this.value = words.slice(0, inputWordLimit).join(' ');
                }
            });
        });

        // Function to handle word limit for textarea fields
        textareas.forEach(textarea => {
            textarea.addEventListener('input', function() {
                const words = this.value.trim().split(/\s+/);
                if (words.length > textareaWordLimit) {
                    alert(`Word limit exceeded! Maximum ${textareaWordLimit} words allowed.`);
                    this.value = words.slice(0, textareaWordLimit).join(' ');
                }
            });
        });
    });
</script>

<body>
    <div id="app" class="flex flex-col items-center gap-5">
        <div id="regiration_form" class="w-full mx-auto relative overflow-hidden z-10 bg-slate-950 p-8 rounded-lg shadow-md before:w-24 before:h-24 before:absolute before:bg-purple-600 before:rounded-full before:-z-10 before:blur-2xl after:w-32 after:h-32 after:absolute after:bg-sky-400 after:rounded-full after:-z-10 after:blur-xl after:top-24 after:-right-12">
            <div class="flex justify-center">
                <h2 class="text-2xl font-bold text-white mb-6">Step into the Spotlight: Publish Your Portfolio</h2>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <!-- Service 1 Details -->
                <h3 class="text-white text-xl mb-2">Service 1 Details</h3>
                <div class="mb-4">
                    <label for="service_name_1" class="block text-sm font-medium text-gray-300">Service Name:</label>
                    <input type="text" id="service_name_1" name="service_name_1" required placeholder="e.g. Web Design" class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"><br>
                </div>
                <div class="mb-4">
                    <label for="service_description_1" class="block text-sm font-medium text-gray-300">Service Description:</label><br>
                    <textarea id="service_description_1" name="service_description_1" rows="4" cols="50" required placeholder="e.g. We design stunning websites tailored to your business needs." class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"></textarea><br>
                </div>
                <div class="mb-4">
                    <label for="price_range_1" class="block text-sm font-medium text-gray-300">Price Range:</label>
                    <input type="text" id="price_range_1" name="price_range_1" required placeholder="e.g. $500 - $1000" class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"><br><br>
                </div>
                <!-- Service 2 Details -->
                <h3 class="text-white text-xl mb-2">Service 2 Details</h3>
                <div class="mb-4">
                    <label for="service_name_2" class="block text-sm font-medium text-gray-300">Service Name:</label>
                    <input type="text" id="service_name_2" name="service_name_2" required placeholder="e.g. Graphic Design" class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"><br>
                </div>
                <div class="mb-4">
                    <label for="service_description_2" class="block text-sm font-medium text-gray-300">Service Description:</label><br>
                    <textarea id="service_description_2" name="service_description_2" rows="4" cols="50" required placeholder="e.g. We create eye-catching graphics for your brand." class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"></textarea><br>
                </div>
                <div class="mb-4">
                    <label for="price_range_2" class="block text-sm font-medium text-gray-300">Price Range:</label>
                    <input type="text" id="price_range_2" name="price_range_2" required placeholder="e.g. $200 - $500" class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"><br><br>
                </div>
                <!-- Service 3 Details -->
                <h3 class="text-white text-xl mb-2">Service 3 Details</h3>
                <div class="mb-4">
                    <label for="service_name_3" class="block text-sm font-medium text-gray-300">Service Name:</label>
                    <input type="text" id="service_name_3" name="service_name_3" required placeholder="e.g. Content Writing" class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"><br>
                </div>
                <div class="mb-4">
                    <label for="service_description_3" class="block text-sm font-medium text-gray-300">Service Description:</label><br>
                    <textarea id="service_description_3" name="service_description_3" rows="4" cols="50" required placeholder="e.g. We provide high-quality content for your website and marketing materials." class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"></textarea><br>
                </div>
                <div class="mb-4">
                    <label for="price_range_3" class="block text-sm font-medium text-gray-300">Price Range:</label>
                    <input type="text" id="price_range_3" name="price_range_3" required placeholder="e.g. $50 - $100" class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white"><br><br>
                </div>
                <input type="hidden" id="s_id" name="s_id" value="<?php echo $_SESSION['user_status']; ?>">
                <div class="flex justify-center">
                    <input type="submit" value="Update" class="btn mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80">
                </div>
            </form>




        </div>
    </div>
</body>
<?php

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

</html>