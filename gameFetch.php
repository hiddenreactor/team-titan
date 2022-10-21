<?php
//fetch.php
// $connect = mysqli_connect("localhost", "root", "", "titan");
$connect = mysqli_connect("us-cdbr-east-04.cleardb.com", "b4a111629544d9", "059962b1", "heroku_22c64d3e4214282");
$columns = array('gameID', 'teamID', 'gamedate', 'final', 'statusID');   //this has to match with the db

// $query = "SELECT * FROM inventory ";

$query = "SELECT * FROM ((gamestat
INNER JOIN team ON gamestat.teamID = team.teamID) 
INNER JOIN status ON gamestat.statusID = status.statusID)
";

$query .= " WHERE ";
if (isset($_POST['filter_section']) && $_POST['filter_section'] != '') {
    $query .= "team = '".$_POST["filter_section"]."' AND ";
}
if (isset($_POST["search"]["value"])) {
    $query .= '(gamestat.gamedate LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR team.team LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR status.status LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR gamestat.final LIKE "%'.$_POST["search"]["value"].'%") ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
} else {
    $query .= 'ORDER BY gameID DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    // $sub_array[] = '<div contenteditable class="update" data-id="'.$row["gameID"].'" data-column="gameID">' . $row["gameID"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["team"].'" data-column="team">' . $row["team"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["gamedate"].'" data-column="gamedate">' . $row["gamedate"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["final"].'" data-column="final">' . $row["final"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["status"].'" data-column="status">' . $row["status"] . '</div>';
    $sub_array[] = '<button type="button" name="update_game" class="btn btn-warning btn-xs update_game" id="'.$row["gameID"].'">Update Game</button>';
    $sub_array[] = '<button type="button" name="remove" class="btn btn-danger btn-xs remove" id="'.$row["gameID"].'">Hide Game</button>';
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

