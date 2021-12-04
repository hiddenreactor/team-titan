<?php
// $con  = mysqli_connect('localhost','root','','titan');
$con  = mysqli_connect("us-cdbr-east-04.cleardb.com", "ba932adfb213b7", "7ee70427", "heroku_573ed5910b2ee50");
if(mysqli_connect_errno())
{
    echo 'Database Connection Error!!';
}
