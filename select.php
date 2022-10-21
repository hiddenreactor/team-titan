<?php

// include('config_BD.php');
// $connect = new PDO("mysql:host=localhost; dbname=titan", "root", "");
$connect = new PDO('mysql:host=us-cdbr-east-04.cleardb.com; dbname=heroku_22c64d3e4214282;', 'b4a111629544d9', '059962b1');
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
