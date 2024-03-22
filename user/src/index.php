<?php

include_once("config/config.php");
$bg_color = "slate-950";

if (isset($_GET["id"]) && $_GET["id"] != '') {
    $Id = $_GET["id"];
} else {
    $Id = 99;
    echo '<script>alert("ID not found. Defaulting to ID 99.");</script>'; // Alert message
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
        $fb =  $link['f_b'];
        $linkdIn = $link['L_in'];
        $x =  $link['tw_er'];
        $yt = $link['y_t'];
        $disc =  $link['d_s'];
        $whatsapp =  $link['w_a'];
        $gitHub = $link['g_h'];
        $redit =  $link['r_d'];
        $pintrest =  $link['p_s'];
    }

    // Include necessary components
    include_once("components/header.php");
    include_once("components/social.php");
    include_once("components/project.php");
    include_once("components/service.php");
    include_once("components/contact-us.php");
    include_once("components/footer.php");
} else {
    echo "<script>alert('ID not found. Lets Create Your Profile First.');
    window.location.href = 'http://localhost/Project2024/Portfolio-Jila/user/create-your-portfolio/';
</script>";

}
?>
