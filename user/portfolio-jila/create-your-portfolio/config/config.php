<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "protfolio_jila";

$conn = mysqli_connect($dbhost , $dbuser , $dbpass , $dbname);
$host = "https://localhost/project-2024/Portfolio-Jila/user";
if(!isset($conn)){
    echo die("Database connection failed");
}
?>