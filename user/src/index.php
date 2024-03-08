<?php

include_once("config/config.php");
$bg_color = "slate-950";

$Id = $_GET["id"];
$user_data = "SELECT * FROM `users` WHERE user_id = '$Id'";
$result = mysqli_query($conn, $user_data);
if ($user_data) {
    $data = mysqli_fetch_assoc($result);
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
}
$social_links = "SELECT * FROM `socila_links` WHERE s_id = '$apikey'";
$result1 = mysqli_query($conn, $social_links);
if ($social_links) {
    $link = mysqli_fetch_assoc($result1);
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


include_once("components/header.php");

include_once("components/social.php");

include_once("components/project.php");
include_once("components/service.php");
include_once("components/contact-us.php");
?>
<?php 
include_once("components/footer.php");
?>