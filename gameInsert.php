<?php

 include('statConn.php');

//insert.php;

if(isset($_POST["playername"]))
{
    
 for($count = 0; $count < count($_POST["playername"]); $count++)
 {
  $data = array(
   ':playername'   => $_POST["playername"][$count],
   ':verse'   => $_POST["gameID"][$count] + 4,                           //this is WRONG, it should be insert gameID not verseID
   ':point' => 0,
   ':rb' => 0,
   ':assist' => 0,
   ':blk' => 0,
   ':onfloor' => 0,
   ':playtime' => 0
  );

  $query = "
   INSERT INTO playerstat 
       (playerID, gameID, point, rb, assist, blk, onfloor, playtime) 
       VALUES (:playername, :verse, :point, :rb , :assist, :blk, :onfloor, :playtime)
  ";

  $statement = $connect->prepare($query);

  $statement->execute($data);
  
 }

 for($count = 0; $count < count($_POST["verse"]); $count++)
 {
  $data1 = array(      
   ':team'   => $_POST["verse"][$count],
   ':gamedate'   => $_POST["gamedate"][$count],   
   ':fpoint'   => '0-0',
   ':status'   => 1
  );

  $query1 = "
   INSERT INTO gamestat 
   (teamID, gamedate, final, statusID) 
       VALUES (:team, :gamedate, :fpoint, :status)
  ";

  $statement1 = $connect->prepare($query1);

  $statement1->execute($data1);
  break;
 }

 echo 'ok';
}


?>
