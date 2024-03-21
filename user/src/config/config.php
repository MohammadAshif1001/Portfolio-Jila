<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "protfolio_jila";

$conn = mysqli_connect($dbhost , $dbuser , $dbpass , $dbname);
$localhost = "http://localhost/Project2024/Portfolio-Jila/";
if(!isset($conn)){
    echo die("Database connection failed");
}

$hostname = "http://localhost/protfolio-jila";
?>