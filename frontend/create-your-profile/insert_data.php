<?php
// insert_data.php

session_start(); // Start the session
$expectedApiKey = 'key';

include_once("config/config.php");

// Check if the request has a valid API key
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $apiKey = isset($_SERVER['HTTP_API_KEY']) ? $_SERVER['HTTP_API_KEY'] : null;
    

    if ($apiKey === $expectedApiKey) {
        // Get the raw JSON data
        $json_data = file_get_contents("php://input");

        // Decode JSON data
        $data = json_decode($json_data, true);

        // Sanitize and validate data (you should do more validation depending on your requirements)
        $user_name = mysqli_real_escape_string($conn, $data['name']);
        $user_email = mysqli_real_escape_string($conn, $data['mail']);
        $bio = mysqli_real_escape_string($conn, $data['bio']);
        $profession = mysqli_real_escape_string($conn, $data['prof']);
        $a_bt = mysqli_real_escape_string($conn, $data['ab_1']);
        $ab_t = mysqli_real_escape_string($conn, $data['ab_2']);
        $cv_l = mysqli_real_escape_string($conn, $data['cv']);
        $date = date("Y/m/d");

        $L_in = mysqli_real_escape_string($conn, $data['L_in']);
        $In_ta = mysqli_real_escape_string($conn, $data['In_ta']);
        $tw_er = mysqli_real_escape_string($conn, $data['tw_er']);
        $g_h = mysqli_real_escape_string($conn, $data['g_h']);
        $w_a = mysqli_real_escape_string($conn, $data['w_a']);
        $t_g = mysqli_real_escape_string($conn, $data['t_g']);
        $f_b = mysqli_real_escape_string($conn, $data['f_b']);
        $y_t = mysqli_real_escape_string($conn, $data['y_t']);
        $p_s = mysqli_real_escape_string($conn, $data['p_s']);
        $d_s = mysqli_real_escape_string($conn, $data['d_s']);
        $r_d = mysqli_real_escape_string($conn, $data['r_d']);


        $pr_title = mysqli_real_escape_string($conn, $data['p_title']);
        $pr_img = mysqli_real_escape_string($conn, $data['p_img']);
        $pr_dec = mysqli_real_escape_string($conn, $data['p_dec']);
        $pr_repo = mysqli_real_escape_string($conn, $data['p_repo']);


        // For Uniqly Identify table with user Id:)
        $uniq_Id = bin2hex(random_bytes(4));

        // Isert Data in 'users' table:)
        $update_details = $conn->prepare("INSERT INTO `users`(`user_name`, `user_email`, `user_bio`, `profesion`, `ab_1`, `ab_2`, `resume_link`, `token`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $update_details->bind_param("sssssssss", $user_name, $user_email, $bio, $profession, $a_bt, $ab_t, $cv_l, $uniq_Id, $date);

        $profile_created = $update_details->execute();



        // Insert data in 'social_links' table
        $social_links = $conn->prepare("INSERT INTO `socila_links`(`s_id`, `L_in`, `In_ta`, `tw_er`, `g_h`, `w_a`, `t_g`, `f_b`, `y_t`, `p_s`, `d_s`, `r_d`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $social_links->bind_param("ssssssssssss", $uniq_Id, $L_in, $In_ta, $tw_er, $g_h, $w_a, $t_g, $f_b, $y_t, $p_s, $d_s, $r_d);
       
        $inserted_social_links = $social_links->execute();


        // Insert data in 'Projects' table
        $pr_query = $conn->prepare("INSERT INTO `projects`(`un_id`, `pr_tittle`, `pr_desc`, `pr_img`, `pr_repo`) VALUES (?, ?, ?, ?,?)");
        $pr_query->bind_param("sssss", $uniq_Id, $pr_title, $pr_dec, $pr_img,  $pr_repo);

        $inserted_project_details = $pr_query->execute();

        if ($profile_created && $inserted_social_links && $inserted_project_details) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Profile creation failed']);
            error_log("Error: " . $conn->error);
        }

        // Close the prepared statements:) 
        $update_details->close();
        $social_links->close();
        $pr_query->close();

        // Close the database connection
        $conn->close();
    } else {
        // Invalid API key
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized']);
    }
} else {
    // Invalid request method
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>
