<?php 
include('connection.php');

$playerID = $_POST['playerID'];
$sql = "DELETE FROM players WHERE playerID='$playerID'";
$delQuery =mysqli_query($con,$sql);
if($delQuery==true)
{
	 $data = array(
        'status'=>'success',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'failed',
      
    );

    echo json_encode($data);
} 

?>