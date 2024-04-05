<?php 
session_start();

include_once("config/config.php");
$bg_color = "slate-950";

if (isset($_GET["id"]) && $_GET["id"] != '') {
    $temp = $_GET["id"];
    $Id = substr($temp, 8, -12);
    $_SESSION['profile'] = $temp;
} else {
    $Id = 99;
    $_SESSION['profile'] = "Mohammad99Ashif9696841";
}

$user_data_query = "SELECT * FROM `users` WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $user_data_query);
mysqli_stmt_bind_param($stmt, "i", $Id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) { // Check if user exists
    $data = mysqli_fetch_assoc($result);

    // Assign user data
    $usr_name =  $data['user_name'];
    $user_email =  $data['user_email'];
    $user_mob =  $data['m_no'];
    $user_add =  $data['address'];
    $bio = $data['user_bio'];
    $profession =  $data['profesion'];
    $a_bt = $data['ab_1'];
    $ab_t =  $data['ab_2'];
    $cv_l =  $data['resume_link'];
    $gen = $data['gen'];
    $apikey =  $data['token'];

    // Fetch social links
    $social_links_query = "SELECT * FROM `socila_links` WHERE s_id = ?";
    $stmt_social = mysqli_prepare($conn, $social_links_query);
    mysqli_stmt_bind_param($stmt_social, "i", $apikey);
    mysqli_stmt_execute($stmt_social);
    $result_social = mysqli_stmt_get_result($stmt_social);

    if (mysqli_num_rows($result_social) > 0) {
        $link = mysqli_fetch_assoc($result_social);
        $insta =  $link['In_ta'];
        $linkdIn = $link['L_in'];
        $x =  $link['tw_er'];
        $whatsapp =  $link['w_a'];
        $gitHub = $link['g_h'];
    }

    $sql = "SELECT p.*, s1.service_name AS service_name1, s1.service_description AS service_description1, s1.price_range AS price_range1,
                s2.service_name AS service_name2, s2.service_description AS service_description2, s2.price_range AS price_range2,
                s3.service_name AS service_name3, s3.service_description AS service_description3, s3.price_range AS price_range3
        FROM PricingServices p
        LEFT JOIN Services s1 ON p.service_id1 = s1.service_id
        LEFT JOIN Services s2 ON p.service_id2 = s2.service_id
        LEFT JOIN Services s3 ON p.service_id3 = s3.service_id
        WHERE p.s_id = ?";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the s_id parameter
    mysqli_stmt_bind_param($stmt, "s", $apikey);

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Store the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the data
        $row = mysqli_fetch_assoc($result);
        $service_name1 = $row['service_name1'];
        $service_description1 = $row['service_description1'];
        $price_range1 = $row['price_range1'];
        $service_name2 = $row['service_name2'];
        $service_description2 = $row['service_description2'];
        $price_range2 = $row['price_range2'];
        $service_name3 = $row['service_name3'];
        $service_description3 = $row['service_description3'];
        $price_range3 = $row['price_range3'];
    } else {
        echo "No data found";
    }
    


    // Include necessary components
    include_once("components/header.php");
    include_once("components/social.php");
    include_once("components/project.php");
    // include_once("components/timeline.php");
    include_once("components/service.php");
    include_once("components/contact-us.php");
    include_once("components/footer.php");
} else {
    echo "<script>alert('ID not found. Lets Create Your Profile First.');
    window.location.href = 'https://labs.cashjila.com/portfolio-jila/create-your-portfolio/';
</script>";
}
// Close the statement
mysqli_stmt_close($stmt);

// Close the database connection
mysqli_close($conn);
