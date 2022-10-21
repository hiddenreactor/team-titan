<?php 
//  include "config_BD.php"; 

// $connect = mysqli_connect("localhost", "root", "", "titan");
$connect = mysqli_connect("us-cdbr-east-04.cleardb.com", "b4a111629544d9", "059962b1", "heroku_22c64d3e4214282");
if (!empty($_POST)) {
    $output = '';
    $team = mysqli_real_escape_string($connect, $_POST["team"]);
    $group = mysqli_real_escape_string($connect, $_POST["groupID"]);
    $year = mysqli_real_escape_string($connect, $_POST["yearID"]);
   
    $query = "
    INSERT INTO team (team,groupID, yearID)  
     VALUES('$team', '$group', '$year')
    ";
    if (mysqli_query($connect, $query)) {
        $output .= '<label class="text-success">Data Inserted</label>';
        $select_query = "SELECT * FROM team ORDER BY teamID DESC";
        $result = mysqli_query($connect, $select_query);
        $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Student Name</th>  
                         <th width="30%">View</th>  
                    </tr>
     ';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
       <tr>  
                         <td>' . $row["team"] . '</td>  
                         <td><input type="button" name="view" value="view" teamID="' . $row["teamID"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
        }
        $output .= '</table>';
    }
    echo $output;
}
