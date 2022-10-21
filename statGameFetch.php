<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "titan");
$columns = array('team', 'gamedate', 'final', 'status');

// $query = "SELECT * FROM gamestat INNER JOIN team ON gamestat.teamID = team.teamID ORDER BY gamestat.gameID DESC";

$query = "SELECT * FROM ( (gamestat
INNER JOIN team ON gamestat.teamID = team.teamID) 
INNER JOIN status ON gamestat.statusID = status.statusID)
";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE team LIKE "%'.$_POST["search"]["value"].'%" 
 OR gamedate LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY gameID DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div data-id="'.$row["gameID"].'" data-column="team">' . $row["team"] . '</div>';
 $sub_array[] = '<div data-id="'.$row["gameID"].'" data-column="gamedate">' . $row["gamedate"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["gameID"].'" data-column="final">' . $row["final"] . '</div>';
 $sub_array[] = '<div contenteditable class="update" data-id="'.$row["gameID"].'" data-column="status">' . $row["status"] . '</div>';
 $sub_array[] = '<button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row["gameID"].'">Delete</button>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM gamestat";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>