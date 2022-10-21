<?php
//fetch.php
// $connect = mysqli_connect("localhost", "root", "", "titan");
$connect = mysqli_connect("us-cdbr-east-04.cleardb.com", "b4a111629544d9", "059962b1", "heroku_22c64d3e4214282");
$columns = array('playerID', 'playerName', 'teamID', 'groupID', 'yearID');   //this has to match with the db

// $query = "SELECT * FROM inventory ";

$query = "SELECT * FROM (((players
INNER JOIN team ON players.teamID = team.teamID) 
INNER JOIN groupsec ON players.groupID = groupsec.groupID)
INNER JOIN joinyear ON players.yearID = joinyear.yearID)
";

$query .= " WHERE ";
// if (isset($_POST['filter_section']) && $_POST['filter_section'] != '') {
//     $query .= "playerName = '".$_POST["filter_section"]."' AND ";
// }
if (isset($_POST["search"]["value"])) {
    $query .= '(players.playerName LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR team.team LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR groupsec.groupsec LIKE "%'.$_POST["search"]["value"].'%") ';
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
} else {
    $query .= 'ORDER BY playerID DESC ';
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
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["playerName"].'" data-column="playerName">' . $row["playerName"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["team"].'" data-column="team">' . $row["team"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["groupsec"].'" data-column="groupsec">' . $row["groupsec"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="'.$row["year"].'" data-column="year">' . $row["year"] . '</div>';
    $sub_array[] = '<input type="button" name="Delete" value="Delete" id="'.$row["playerID"].'" class="btn btn-danger btn-xs delete" />';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT * FROM players";
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

