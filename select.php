<?php

// include('config_BD.php');
// $connect = mysqli_connect("localhost", "root", "", "titan");
$connect = new PDO("mysql:host=localhost; dbname=titan", "root", "");
if(isset($_POST["playerID"]))
{

 $statement = $connect->prepare(
  "DELETE FROM players WHERE playerID = :id"
 );
 $result = $statement->execute(
  array(
   ':id' => $_POST["playerID"]
  )
 );
 
 if(!empty($result))
 {
  echo 'Data Deleted';
 }
}



?>