<?php

// include('config_BD.php');
// $connect = mysqli_connect("localhost", "root", "", "titan");
$connect = new PDO("mysql:host=localhost; dbname=titan", "root", "");
if(isset($_POST["teamID "]))
{

 $statement = $connect->prepare(
  "DELETE FROM team WHERE teamID = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["teamID"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>