<?php 
session_start();

// Include PHPMailer dependencies
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Function to send mail
function sendMail($otp_mail, $otp)
{
    require("src/PHPMailer.php");
    require("src/SMTP.php");
    require("src/Exception.php");

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP(); // Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true; // Enable SMTP authentication
        $mail->Username   = 'portfoliojila@gmail.com'; // SMTP username
        $mail->Password   = 'uujdwlhqfulojtcz'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
        $mail->Port       = 465; // TCP port

        // Recipients
        $mail->setFrom('portfoliojila@gmail.com', 'labs.cashjila.com');
        $mail->addAddress($otp_mail); // Add recipient

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'OTP Verification'; // Email subject
        $mail->Body = "<p>Dear User,</p>
                        <p>Your One Time Password (OTP) for verification:</p>
                        <h2>$otp</h2>
                        <p>Thank you for choosing our platform.</p>
                        <p>Best regards,<br>Portfolio Jila</p>"; // Email body

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/include/style.css">

    <title>Lets Create Your Profile</title>

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
    <script>
        $(window).bind("pageshow", function() {
            var form = $('form');
            form[0].reset();
            form.find(':input').not(':button,:submit,:reset,:hidden').trigger('change');
        });
    </script>
</head>

<body>
    <div id="app" class="flex flex-col items-center gap-5">
        <div id="regiration_form" class="w-full mx-auto relative overflow-hidden z-10 bg-slate-950 p-8 rounded-lg shadow-md before:w-24 before:h-24 before:absolute before:bg-purple-600 before:rounded-full before:-z-10 before:blur-2xl after:w-32 after:h-32 after:absolute after:bg-sky-400 after:rounded-full after:-z-10 after:blur-xl after:top-24 after:-right-12">
            <div class="flex justify-center">
                <h2 class="text-2xl font-bold text-white mb-6">Update Your Profile</h2>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" id="dataForm">
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
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="adrs" name="addres" placeholder="India" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-300" for="Bio">Bio - Title</label>
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="text" id="bio" name="bio" placeholder="Your Creative Vision, My Technical Expertise" required>
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
                        <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="file" id="resume" name="cv" accept=".pdf" required>
                        <p class="text-cyan-400 text-xs">Upload PDF (Max 50 KB)</p>
                    </div>

                    <div class="mb-4">
                        <select name="gender" id="gender" class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white">
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95a1 1 0 0 1-1.414 1.414l-3.536-3.535a1 1 0 0 1 0-1.414l3.536-3.536a1 1 0 1 1 1.414 1.414L6.414 8.95H18a1 1 0 1 1 0 2H6.414l2.879 2.879z" />
                            </svg>
                        </div>
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



                    <div class="flex justify-center">
                        <input type="button" name="previous" class="previous mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" value="Previous" />
                        <div class="ml-4"></div> <!-- Adjusted margin here -->
                        <input type="button" name="next" class="next mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" value="Next" />
                    </div>

                </fieldset>

                <fieldset>
                    <div class="mb-4" id="form1">
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
                            <input class="mt-1 p-2 w-full bg-gray-700 border border-gray-600 rounded-md text-white" type="hidden" id="rep" name="project" value="1">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <input type="button" name="previous" class="previous mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" value="Previous" />
                        <div class="ml-4"></div>
                        <input class="btn mt-4 bg-gradient-to-r from-purple-600 via-purple-400 to-blue-500 text-white px-4 py-2 font-bold rounded-md hover:opacity-80" id="submitBtn" type="submit" Value="Update Profile">
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
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input[type="text"]');
            const textareas = document.querySelectorAll('textarea');
            const inputWordLimit = 100; // Word limit for input fields
            const textareaWordLimit = 500; // Word limit for textarea

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

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>


</body>

<?php
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
    $gen = mysqli_real_escape_string($conn, $data['gender']);
    $date = date("Y/m/d");

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        // File path
        $upload_dir = "resumes/";
        $file_name = basename($_FILES["cv"]["name"]);
        $cv_l = $upload_dir . $file_name;
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $cv_l)) {
            echo " ";
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


    // For Uniqly Identify table with user Id:)
    $uniq_Id = bin2hex(random_bytes(4));


    // Isert Data in 'users' table:)
    $update_details = $conn->prepare("INSERT INTO `users`(`user_name`, `user_email`,`m_no`,`address`, `user_bio`, `profesion`, `ab_1`, `ab_2`, `resume_link`,`gen`, `token`, `date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $update_details->bind_param("ssssssssssss", $user_name, $user_email, $user_mNo, $user_add, $bio, $profession, $a_bt, $ab_t, $cv_l, $gen, $uniq_Id, $date);

    $profile_created = $update_details->execute();



    // Insert data in 'social_links' table
    $social_links = $conn->prepare("INSERT INTO `socila_links`(`s_id`, `L_in`, `In_ta`, `tw_er`, `g_h`, `w_a`) VALUES (?, ?, ?, ?, ?,?)");
    $social_links->bind_param("ssssss", $uniq_Id, $L_in, $In_ta, $tw_er, $g_h, $w_a);

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


            //gen rand string
            function generateRandomString($length = 10)
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
                return $randomString;
            }

            // gen key ou user id
            $otp = generateRandomString(6);

            // Send mail with generated key
            if ($inserted && sendMail($user_email, $otp)) {
                $_SESSION['user_status'] = $uniq_Id;
                $_SESSION['otp'] = $otp;
                session_write_close();
                echo "<script>
                            alert('Last Step Update Your Service Section & Fill OTP');
                            window.location.href = 'services';
                      </script>";
            } else {
                echo "Error inserting projects";
            }
        } else {
            echo "Error inserting projects";
        }
    }






    // Close the prepared statements:) 


    $project_data->close();
    $update_details->close();
    $social_links->close();
    // Close the database connection
    $conn->close();
} else {
    // Invalid request method
    http_response_code(405);
}
?>

</html>