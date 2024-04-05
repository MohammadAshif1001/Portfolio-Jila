<?php
session_start();
// Check if the session variable 'user_status' is not set
if (!isset($_SESSION['user_status'])) {
    // Redirect the user to a specific page or display an error message
    header("Location: https://www.labs.cashjila.com/error-page/404");
    exit; // Stop script execution after redirection
}

require('Config/Config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail($Email, $key, $Name)

{

    require("src/PHPMailer.php");
    require("src/SMTP.php");
    require("src/Exception.php");

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'portfoliojila@gmail.com';                     //SMTP username
        $mail->Password   = 'uujdwlhqfulojtcz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('portfoliojila@gmail.com', 'labs.cashjila.com');
        $mail->addAddress($Email);     //Add a recipient



        //Content
        $mail->isHTML(true);                                 
        $mail->Subject = 'Congratulations on Your Portfolio Creation'; // Email subject
        $mail->Body = "
            <p>Dear $Name,</p>
            <p>We are delighted to inform you that your portfolio has been successfully created. Congratulations!</p>
            <p>Here is your API key: $key</p>
            <p>You can visit your profile <a href='https://www.labs.cashjila.com/portfolio-jila/src/?id=$key'>here</a>.</p>
            <p>Thank you for choosing our platform.</p>
            <p>Best regards,<br>Portfolio Jila</p>
        "; // Email body

        $mail->send();
        // echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generating your portfolio....</title>
</head>

<body>

    <?php
    include_once('config/config.php');

    // Check if the session variable 'user_status' exists
    if (isset($_SESSION['user_status'])) {
        $APIKEY = mysqli_real_escape_string($conn, $_SESSION['user_status']);

        $query = "SELECT `user_id`, `user_email` , `user_name` FROM `users` WHERE `token` = '$APIKEY'"; 

        $result = mysqli_query($conn, $query); // Execute the query

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id']; 
            $Email = $row['user_email']; 
            $Name = $row['user_name'];
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
            $front = generateRandomString(8);
            $end = generateRandomString(12);
            $key = $front . $user_id . $end;

            // Send mail with generated key
            
            if (sendMail($Email, $key, $Name)) {
                // Redirect the user to the specified URL
                echo "<script>
                        alert('Please note your API key: $key');
                        window.location.href = '$host/portfolio-jila/src/?id=$key';
                      </script>";
                exit;
            } else {
                echo "<script>
                        alert('Failed to send email. Please try again later.');
                        window.location.href = 'index';
                      </script>";
                exit;
            }
        } else {
            echo "<script>
                    alert('Failed to retrieve user ID from database.');
                    window.location.href = 'index';
                  </script>";
            exit;
        }
    } else {
        echo "<script>
                alert('Session Expire.');
                window.location.href = 'index';
              </script>";
        exit;
    }
    ?>

</body>

</html>