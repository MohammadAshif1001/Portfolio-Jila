<?php
session_start();

include_once("config/config.php");
$key = $_SESSION['profile'];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($adminEmail, $adminName, $clientName, $clientEmail, $message)
{
    require("src/PHPMailer.php");
    require("src/SMTP.php");
    require("src/Exception.php");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'portfoliojila@gmail.com';
        $mail->Password   = 'uujdwlhqfulojtcz';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('portfoliojila@gmail.com', 'Portfolio Jila');
        $mail->addAddress($adminEmail);

        $mail->isHTML(true);
        $mail->Subject = '[Portfolio Jila] New Message from Client';
        $mail->Body = "
            <p>Dear $adminName,</p>
            <p>We are pleased to inform you that $clientName has visited your profile and has sent you a message. Below are the details:</p>
            <p><strong>Client's Email:</strong> $clientEmail</p>
            <p><strong>Message:</strong> $message</p>
            <p>You can view your profile and respond to the message <a href='https://www.labs.cashjila.com/portfolio-jila/src/?id={$_SESSION['profile']}'>here</a>.</p>
            <p>Thank you for being a part of our platform.</p>
            <p>Best regards,<br>Portfolio Jila</p>
        ";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}


if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['msg'])) {
    $adminName = mysqli_real_escape_string($conn, $_POST['admin_name']);
    $adminEmail = mysqli_real_escape_string($conn, $_POST['admin_email']);
    $clientName = mysqli_real_escape_string($conn, $_POST['name']);
    $clientEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['msg']);


    if (sendMail($adminEmail, $adminName, $clientName, $clientEmail, $message)) {
        $_SESSION['message'] = "We note your query will get back to you as soon as possible";
        echo "<script>
            alert('We will get back to you as soon as possible');
            window.location.href = '$host/portfolio-jila/src/?id=$key';
        </script>";
    } else {
        echo "<script>
            alert('Check your network connection & try again!');
            window.location.href = '$host/portfolio-jila/src/?id=$key';
        </script>";
    }
}
