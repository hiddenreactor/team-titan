<?php
error_reporting(0);
class db{
	var $con;
	function __construct(){
		$this->$con=mysqli_connect("localhost","root","") or die(mysqli_error());
		// mysqli_select_db($this->$con,"mydb") or die(mysqli_error());
		mysqli_select_db($this->$con,"titan") or die(mysqli_error());
	}

	public function getGame(){
		// $query="SELECT * from department_master";
		$query="SELECT * from team";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}
	public function getDesignation($department){
		$query="SELECT * from gamestat where teamID=".$department."";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}
	public function getAllEmployee(){
		// $query="SELECT e.emp_id ,e.name ,e.phone ,e.email ,e.emp_address ,d.desig_name from employee AS e,designation_master AS d where e.desig_id=d.desig_id ";
		$query="SELECT players.playerID, players.playerName, team.team, gamestat.gamedate, playerstat.gameID, playerstat.point, playerstat.rb, playerstat.assist, playerstat.blk,playerstat.onfloor FROM team
		INNER JOIN gamestat ON gamestat.teamID = team.teamID
		INNER JOIN playerstat ON gamestat.gameID = playerstat.gameID
		INNER JOIN players on playerstat.playerID = players.playerID 
		ORDER BY gamestat.gameID DESC
		 ";
		$result=mysqli_query($this->$con,$query) or die(mysqli_error());
		return $result;
	}
	// public function getEmployee($designation){
	// 	$query="SELECT players.playerID, players.playerName, team.team, gamestat.gamedate, playerstat.point, playerstat.rb, playerstat.assist, playerstat.blk,playerstat.onfloor FROM team
	// 	INNER JOIN gamestat ON gamestat.teamID = team.teamID
	// 	INNER JOIN playerstat ON gamestat.gameID = playerstat.gameID
	// 	INNER JOIN players on playerstat.playerID = players.playerID
	// 	WHERE gamestat.gameID = ".$designation."";
	// 	$result=mysqli_query($this->$con,$query);
	// 	return $result;
	// }
	public function getEmployee($designation){
		$query="SELECT players.playerID, players.playerName, team.team, gamestat.gamedate, playerstat.gameID, playerstat.statID, playerstat.point, playerstat.rb, playerstat.assist, playerstat.blk,playerstat.onfloor,playerstat.playtime FROM team
		INNER JOIN gamestat ON gamestat.teamID = team.teamID
		INNER JOIN playerstat ON gamestat.gameID = playerstat.gameID
		INNER JOIN players on playerstat.playerID = players.playerID
		WHERE gamestat.gameID = ".$designation."";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}
	public function closeCon(){
		mysqli_close($this->$con);
	}
}
?>
