<?php

$host = "us-cdbr-east-04.cleardb.com"; /* Host name */
$user = "ba932adfb213b7"; /* User */
$password = "7ee70427"; /* Password */
$dbname = "heroku_573ed5910b2ee50"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 	die("Connection failed: " . mysqli_connect_error());
}
