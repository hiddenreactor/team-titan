<?php
// $con  = mysqli_connect('localhost','root','','titan');
$con = mysqli_connect("us-cdbr-east-04.cleardb.com", "b4a111629544d9", "059962b1", "heroku_22c64d3e4214282");
if(mysqli_connect_errno())
{
    echo 'Database Connection Error!!';
}
