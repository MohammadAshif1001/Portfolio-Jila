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
        $user_mNo = mysqli_real_escape_string($conn, $data['mob_num']);
        $user_add = mysqli_real_escape_string($conn, $data['addres']);
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
        $update_details = $conn->prepare("INSERT INTO `users`(`user_name`, `user_email`,`m_no`,`address`, `user_bio`, `profesion`, `ab_1`, `ab_2`, `resume_link`, `token`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $update_details->bind_param("sssssssssss", $user_name, $user_email, $user_mNo, $user_add, $bio, $profession, $a_bt, $ab_t, $cv_l, $uniq_Id, $date);

        $profile_created = $update_details->execute();



        // Insert data in 'social_links' table
        $social_links = $conn->prepare("INSERT INTO `socila_links`(`s_id`, `L_in`, `In_ta`, `tw_er`, `g_h`, `w_a`, `t_g`, `f_b`, `y_t`, `p_s`, `d_s`, `r_d`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $social_links->bind_param("ssssssssssss", $uniq_Id, $L_in, $In_ta, $tw_er, $g_h, $w_a, $t_g, $f_b, $y_t, $p_s, $d_s, $r_d);

        $inserted_social_links = $social_links->execute();

        if (isset($_POST['project'])) {
            $title = mysqli_real_escape_string($conn, $data['tittle']);
            $description = mysqli_real_escape_string($conn, $data['descrip']);
            $fe = mysqli_real_escape_string($conn, $data['frontE']);
            $be = mysqli_real_escape_string($conn, $data['backE']);
            $db = mysqli_real_escape_string($conn, $data['dataB']);
            $repo = mysqli_real_escape_string($conn, $data['repoL']);


            if (isset($_FILES["N_img"])) {
                $img_name = $_FILES["N_img"]["name"];
                $img_temp_loc = $_FILES["N_img"]["tmp_name"];

                $temp_extension = explode(".", $img_name);
                $N_img_extension = strtolower(end($temp_extension));
                $allowed_extensions = array("jpg", "png", "jpeg");

                if (in_array($N_img_extension, $allowed_extensions)) {
                    $new_file_name = uniqid("", true) . "." . $N_img_extension;
                    $location = "project-image/" . $new_file_name;

                    if (move_uploaded_file($img_temp_loc, $location)) {
                        // Image uploaded successfully, now you can process it further if needed
                    } else {
                        echo "Error uploading image";
                    }
                } else {
                    $img_err = "<p style='color:red'> * Only JPG, JPEG, and PNG files are accepted </p>";
                }
            }

            if (!empty($description) && !empty($title) && !empty($img_name)) {

                $project_data  = $conn->prepare("INSERT INTO `projects`(`un_id`, `pr_tittle`, `pr_desc`, `pr_img`, `pr_repo`, `frontend`, `backend`, `dbase`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $project_data->bind_param("ssssssss", $uniq_Id, $title, $description, $new_file_name, $repo, $fe, $be, $db);
                $inserted_project = $project_data->execute();
                $project_data->close(); 
            }
            
        }

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
                    <label class="block text-sm font-medium text-gray-300" for="Profession">Profession</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="profe" name="prof">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="email">Email Address</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="email" id="email" name="mail">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="mo_num">Mobile Number</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="number" id="mo_num" name="mob_num">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="adrs">Email Address</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="adrs" name="addres">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="Bio">Bio - Title</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="bio" name="bio">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="Summary">Summary</label>
                    <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="3" id="summary" name="ab_1"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="Summary">Summary 2</label>
                    <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="3" id="summary" name="ab_2"></textarea>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="Resume">Resume</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="resume" name="cv">
                </div>

                <!-- Social Meidia Link Update -->

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">LinkdIn Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="LinkdIn" name="L_in">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">Instagram Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Instagram" name="In_ta">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">X (Twitter) Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Twitter" name="tw_er">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">Git Hub Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="GH" name="g_h">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">WhatsApp No</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="WP" name="w_a">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">Teligram Profile Id</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="TG" name="t_g">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">Facebook Profile Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="FB" name="f_b">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">Youtube Channel Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Yt" name="y_t">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">Pintrest</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Pn" name="p_s">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">Discord Server Link</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Dis" name="d_s">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300" for="social">Redit Profile</label>
                    <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Redit " name="r_d">
                </div>





                <script>
                    function showForm(selectedOption) {
                        var form1 = document.getElementById("form1");


                        if (selectedOption === "1") {
                            form1.style.display = "block";
                        } else if (selectedOption === "2") {
                            form1.style.display = "none";
                        } else {
                            form1.style.display = "none";
                        }
                    }
                </script>


                <div class="mb-16">
                    <div class="relative inline-flex">
                        <svg class="w-2 h-2 absolute top-0 right-0 m-4 pointer-events-none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 412 232">
                            <path d="M206 171.144L42.678 7.822c-9.763-9.763-25.592-9.763-35.355 0-9.763 9.764-9.763 25.592 0 35.355l181 181c4.88 4.882 11.279 7.323 17.677 7.323s12.796-2.441 17.678-7.322l181-181c9.763-9.764 9.763-25.592 0-35.355-9.763-9.763-25.592-9.763-35.355 0L206 171.144z" fill="#648299" fill-rule="nonzero" />
                        </svg>
                        <select id="projects" onchange="showForm(this.value)" class="border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                            <option value="0">You Have any Projects</option>
                            <option value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                    </div>
                </div>



                <div class="mb-4" id="form1" style="display: none;">
                    <?php $_SESSION['project']=1; ?>
                    <h2 class="text-2xl font-bold text-white mb-6">Update Poject Details</h2>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="title">Project Heading</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="title" name="tittle">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="dess">Project Description</label>
                        <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="5" id="descrip" name="descrip"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="fE">Frontend</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="fE" name="frontE">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="bE">Backend</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="bE" name="backE">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="db">Database</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="db" name="dataB">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="img">Image</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="file" id="img" name="N_img">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="repo">Reposetry or Live Link</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="rep" name="repoL">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="repo">Reposetry or Live Link</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="hidden" id="rep" name="project" value="1">
                    </div>

                </div>








                <div class="flex justify-center">
                    <input class="mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" type="submit" Value="Update Profile">
                </div>

            </form>
        </div>
    </div>
</body>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>