<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "protfolio_jila";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!isset($conn)) {
    echo die("Database connection failed");
}

$hostname = "https://portfolio.cashjila.com";
