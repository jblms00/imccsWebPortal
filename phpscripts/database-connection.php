<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "imccs_webportal_db";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
    die("failed to connect!");
}