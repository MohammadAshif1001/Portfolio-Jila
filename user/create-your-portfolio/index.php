<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/include/style.css">

    <title>Multi-Step Form</title>

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
    $date = date("Y/m/d");

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        // File path
        $upload_dir = "resumes/";
        $file_name = basename($_FILES["cv"]["name"]);
        $cv_l = $upload_dir . $file_name;
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $cv_l)) {
            echo "CV uploaded successfully.";
        } else {
            echo "Error in uploading your Resume.";
        }
    } else {
        echo "No file uploaded or an error occurred.";
    }

    $L_in = mysqli_real_escape_string($conn, $data['L_in']);
    $In_ta = mysqli_real_escape_string($conn, $data['In_ta']);
    $tw_er = mysqli_real_escape_string($conn, $data['tw_er']);
    $g_h = mysqli_real_escape_string($conn, $data['g_h']);
    $w_n = mysqli_real_escape_string($conn, $data['w_a']);
    $w_a = "https://wa.me/" . $w_n;
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


    // Assuming $conn is your MySQLi database connection

    if (isset($_POST['project'])) {
        // Retrieve form data
        $data = $_POST;

        // Retrieve file data
        $file_data = array(
            "N_img" => array($_FILES["N_img"]["name"], $_FILES["N_img"]["tmp_name"]),
            "N_img2" => array($_FILES["N_img2"]["name"], $_FILES["N_img2"]["tmp_name"]),
            "N_img3" => array($_FILES["N_img3"]["name"], $_FILES["N_img3"]["tmp_name"])
        );

        $allowed_extensions = array("jpg", "png", "jpeg");
        $inserted_projects = 0;

        foreach ($file_data as $key => $file) {
            $img_name = $file[0];
            $img_temp_loc = $file[1];
            $N_img_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

            if (in_array($N_img_extension, $allowed_extensions)) {
                $new_file_name = uniqid("", true) . "." . $N_img_extension;
                $location = "project-image/" . $new_file_name;

                if (move_uploaded_file($img_temp_loc, $location)) {
                    // Assign the new file name dynamically
                    ${'new_file_name_' . $key} = $new_file_name;
                    $inserted_projects++;
                } else {
                    echo "Error uploading image";
                }
            } else {
                echo "Invalid file format";
            }
        }

        if ($inserted_projects == count($file_data)) {
            // All files uploaded successfully, insert project data into the database
            $title = mysqli_real_escape_string($conn, $data['tittle']);
            $title2 = mysqli_real_escape_string($conn, $data['tittle2']);
            $title3 = mysqli_real_escape_string($conn, $data['tittle3']);
            $description = mysqli_real_escape_string($conn, $data['descrip']);
            $description2 = mysqli_real_escape_string($conn, $data['descrip2']);
            $description3 = mysqli_real_escape_string($conn, $data['descrip3']);
            $repo = mysqli_real_escape_string($conn, $data['repoL']);
            $repo2 = mysqli_real_escape_string($conn, $data['repoL2']);
            $repo3 = mysqli_real_escape_string($conn, $data['repoL3']);

            $project_data = $conn->prepare("INSERT INTO `projects`(`un_id`, `pr_tittle`, `pr_tittle2`, `pr_tittle3`, `pr_desc`, `pr_desc2`, `pr_desc3`, `pr_img`, `pr_img2`, `pr_img3`, `pr_repo`, `pr_repo2`, `pr_repo3`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $project_data->bind_param("sssssssssssss", $uniq_Id,  $title, $title2, $title3, $description, $description2, $description3, $new_file_name_N_img, $new_file_name_N_img2, $new_file_name_N_img3, $repo, $repo2, $repo3);
            $inserted = $project_data->execute();

            if ($inserted) {
                $_SESSION['status'] = $uniq_Id;
                echo "<script>
                            alert('Congratulations! Your Profile Successfully Created.');
                            window.location.href = 'congratulation.php?';
                          </script>";
            } else {
                echo "Error inserting projects";
            }


            $project_data->close();
        } else {
            echo "Error inserting projects";
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

<body>
    <div id="app" class="flex flex-col items-center gap-5">
        <div id="regiration_form" class="w-full mx-auto relative overflow-hidden z-10 bg-slate-950 p-8 rounded-lg shadow-md before:w-24 before:h-24 before:absolute before:bg-purple-600 before:rounded-full before:-z-10 before:blur-2xl after:w-32 after:h-32 after:absolute after:bg-sky-400 after:rounded-full after:-z-10 after:blur-xl after:top-24 after:-right-12">
            <div class="flex justify-center">
                <h2 class="text-2xl font-bold text-white mb-6">Update Your Profile</h2>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                <fieldset>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="name">Full Name</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="name" name="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="Profession">Profession</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="profe" name="prof" placeholder="What's your profession or occupation?" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="email">Email Address</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="email" id="email" name="mail" placeholder="xyz@gmail.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="mo_num">Mobile Number</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="number" id="mo_num" name="mob_num" placeholder="+91 987456123" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="adrs">Your Address (Current Location)</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="adrs" name="addres" placeholder="India" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="Bio">Bio - Title</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="bio" name="bio" placeholder="Your Creative Vision, My Technical Expertise" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="Summary">Summary</label>
                        <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="3" id="summary" name="ab_1" placeholder="Introduce yourself briefly" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="Summary">Summary 2</label>
                        <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="3" id="summary" name="ab_2" placeholder="Highlight your skills and achievements" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="Resume">Resume</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="file" id="resume" name="cv" accept=".pdf" required>
                        <p class="text-cyan-400 text-xs">Upload PDF (Max 50 KB)</p>
                    </div>
                    <div class="flex justify-center">
                        <input type="button" name="next" class="next mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" value="Next" />
                    </div>
                </fieldset>




                <fieldset>
                    <h1 class="text-2xl font-bold text-white mb-6">Share Your Online Presence</h1>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">LinkdIn Profile Link</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="LinkdIn" name="L_in" placeholder="https://www.linkedin.com/your-profile" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">Instagram Profile Link</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Instagram" name="In_ta" placeholder="https://www.instagram.com/user-name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">X (Twitter) Profile Link</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Twitter" name="tw_er" placeholder="https://twitter.com/user-name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">Git Hub Profile Link</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="GH" name="g_h" placeholder="https://github.com/user-name" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">WhatsApp No</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="WP" name="w_a" placeholder="+9198987456123 (use country code compulsory)" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">Teligram Profile Id</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="TG" name="t_g" placeholder="Enter Teligram Profile Id" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">Facebook Profile Link</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="FB" name="f_b" placeholder="Enter Facebook Profile Link" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">Youtube Channel Link</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Yt" name="y_t" placeholder="Enter Youtube Channel Link" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">Pintrest</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Pn" name="p_s" placeholder="Enter Pintrest Profile" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">Discord Server Link</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Dis" name="d_s" placeholder="Enter Discord Server Link" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="social">Redit Profile</label>
                        <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="Redit" name="r_d" placeholder="Enter Redit Profile" required>
                    </div>

                    <div class="flex justify-center">
                        <input type="button" name="previous" class="previous mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" value="Previous" />
                        <div class="ml-4"></div> <!-- Adjusted margin here -->
                        <input type="button" name="next" class="next mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" value="Next" />
                    </div>

                </fieldset>




                <fieldset>
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
                                <option value="0">You Have 3 Projects</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-4" id="form1" style="display: none;">
                        <?php $_SESSION['project'] = 1; ?>
                        <h2 class="text-2xl font-bold text-white mb-6">Update Poject Details</h2>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="title">Project Heading</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="title" name="tittle" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="dess">Project Description</label>
                            <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="5" id="descrip" name="descrip" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="img">Image</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="file" id="img" name="N_img" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="repo">Reposetry or Live Link</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="rep" name="repoL" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="title">Project Heading</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="title" name="tittle2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="dess">Project Description</label>
                            <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="5" id="descrip" name="descrip2" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="img">Image</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="file" id="img" name="N_img2" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="repo">Reposetry or Live Link</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="rep" name="repoL2" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="title">Project Heading</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="title" name="tittle3" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="dess">Project Description</label>
                            <textarea class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" rows="5" id="descrip" name="descrip3" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="img">Image</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="file" id="img" name="N_img3" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-300" for="repo">Reposetry or Live Link</label>
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="rep" name="repoL3" required>
                        </div>

                        <div class="mb-4">
                            <input class="  mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="hidden" id="rep" name="project" value="1">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <input type="button" name="previous" class="previous mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" value="Previous" />
                        <div class="ml-4"></div>
                        <input class="btn mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" type="submit" Value="Update Profile">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var currentStep = 0;
            var steps = $("fieldset").length;

            $(".next").on("click", function() {
                var currentFieldset = $("fieldset").eq(currentStep);
                var nextFieldset = $("fieldset").eq(currentStep + 1);
                currentFieldset.hide();
                nextFieldset.show();
                currentStep++;
                updateProgressBar();
            });

            $(".previous").on("click", function() {
                var currentFieldset = $("fieldset").eq(currentStep);
                var prevFieldset = $("fieldset").eq(currentStep - 1);
                currentFieldset.hide();
                prevFieldset.show();
                currentStep--;
                updateProgressBar();
            });

            function updateProgressBar() {
                var percent = (currentStep / steps) * 100;
                $(".progress-bar").css("width", percent + "%").html(percent.toFixed(0) + "%");
            }

            // Initialize progress bar
            updateProgressBar();
        });


        function checkFileSize() {
            var fileInput = document.getElementById('resume');
            var fileSize = fileInput.files[0].size; // Size in bytes

            // Convert bytes to kilobytes
            var fileSizeKB = fileSize / 1024;

            if (fileSizeKB > 500) {
                alert("File size exceeds the limit of 50 KB.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>

</body>

</html>