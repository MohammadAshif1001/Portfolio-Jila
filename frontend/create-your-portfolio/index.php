<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/include/style.css">
    <title>Document</title>
</head>

<body>



    <?php
    session_start(); // Start the session

    include_once("config/config.php");

    // Check if the request has a valid API key
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        // Retrieve POST data
        $data = $_POST;

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



        if ($profile_created && $inserted_social_links) {
             json_encode(['success' => true]);
        } else {
             json_encode(['error' => 'Profile creation failed']);
            error_log("Error: " . $conn->error);
        }

        // Close the prepared statements:) 
        $update_details->close();
        $social_links->close();

        // Close the database connection
        $conn->close();
    } else {
        // Invalid request method
        http_response_code(405);
        echo json_encode(['error' => 'Method Not Allowed']);
    }
    ?>


    <div id="app" class="flex flex-col items-center gap-5">
        <div class="w-full mx-auto relative overflow-hidden z-10 bg-slate-950 p-8 rounded-lg shadow-md before:w-24 before:h-24 before:absolute before:bg-purple-600 before:rounded-full before:-z-10 before:blur-2xl after:w-32 after:h-32 after:absolute after:bg-sky-400 after:rounded-full after:-z-10 after:blur-xl after:top-24 after:-right-12">
            <div class="flex justify-center">
                <h2 class="text-2xl font-bold text-white mb-6">Update Your Profile</h2>
            </div>
            <form method="POST" enctype="multipart/form-data" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Full Name</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="name">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Profession</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="prof">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="email">Email Address</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="email" id="email" name="mail">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Bio - Title</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="bio">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="bio">Summary</label>
                    <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="3" id="bio" name="ab_1"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="bio">Summary 2</label>
                    <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="3" id="bio" name="ab_2"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Resume</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="cv">
                </div>

                <!-- Social Meidia Link Update -->

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">LinkdIn Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="L_in">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Instagram Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="In_ta">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">X (Twitter) Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="tw_er">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Git Hub Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="g_h">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">WhatsApp No</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="w_a">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Teligram Profile Id</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="t_g">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Facebook Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="f_b">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Youtube Channel Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="y_t">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Pixel</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="p_s">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Discord Server Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="d_s">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="name">Redit Profile</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="r_d">
                </div>


                <div class="flex justify-center">
                    <input class="bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" type="submit" Value="Update Profile">
                </div>
            </form>
        </div>
    </div>
</body>

</html>