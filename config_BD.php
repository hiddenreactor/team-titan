<?php

$con = mysqli_connect("us-cdbr-east-04.cleardb.com", "b4a111629544d9", "059962b1", "heroku_22c64d3e4214282");
// Check connection
if (!$con) {
 	die("Connection failed: " . mysqli_connect_error());
}
