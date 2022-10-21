
 <?php  
 //fetch.php  
//  $connect = mysqli_connect("localhost", "root", "", "titan");  
 $connect = mysqli_connect("us-cdbr-east-04.cleardb.com", "b4a111629544d9", "059962b1", "heroku_22c64d3e4214282");
 if(isset($_POST["user_id"]))  
 {  
    //   $query = "SELECT * FROM gamestat WHERE gamestat.gameID = '".$_POST["user_id"]."'"; 
      $query = "SELECT * FROM gamestat, team, status WHERE 
      gamestat.gameID = '".$_POST["user_id"]."' AND
      gamestat.teamID = team.teamID AND
      gamestat.statusID = status.statusID
      ";   
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 
