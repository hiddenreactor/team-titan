<?php 
include_once 'config_BD.php';

if (isset($_POST['groupID'])) {
	$query = "SELECT * FROM team where groupID=".$_POST['groupID'];
	$result = $con->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Team</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['teamID'].'>'.$row['team'].'</option>';
		 }
	}else{

		echo '<option>No Team Found!</option>';
	}

}elseif (isset($_POST['teamID'])) {
	 

	$query = "SELECT * FROM players where teamID=".$_POST['teamID'];
	$result = $con->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Player</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['playerID'].'>'.$row['playerName'].'</option>';
		 }
	}else{

		echo '<option>No Player Found!</option>';
	}

}


?>