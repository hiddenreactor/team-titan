<?php

//index.php
$page='index';
require_once('includes/header.php');
include('statConn.php');

// function fill_unit_select_box($connect)
// { 
//  $output = '';
//  $query = "SELECT * FROM players ORDER BY playerID ASC";
//  $statement = $connect->prepare($query);
//  $statement->execute();
//  $result = $statement->fetchAll();
//  foreach($result as $row)
//  {
//   $output .= '<option value="'.$row["playerID"].'">'.$row["playerName"].'</option>';
//  }
//  return $output;
// }

// function fill_select_section($connect)
// { 
//  $output = '';
//  $query = "SELECT * FROM team ";
//  $statement = $connect->prepare($query);
//  $statement->execute();
//  $result = $statement->fetchAll();
//  foreach($result as $row)
//  {
//   $output .= '<option value="'.$row["teamID"].'">'.$row["team"].'</option>';
//  }
//  return $output;
// }

// function fill_select_level_box($connect)          // Make this to display the latest game ONLY, get rid of select box
// { 
//  $output = '';
//  $query = "SELECT * FROM gamestat ORDER BY gameID DESC LIMIT 1";
//  $statement = $connect->prepare($query);
//  $statement->execute();
//  $result = $statement->fetchAll();
//  foreach($result as $row)
//  {
//   $output .= $row["gameID"];
//  }
//  return $output;
// }
?>

<!DOCTYPE html>
<html>

  <body>

    <div class="container">
    <br />
      <h3 align="center">Game Status</h3>
      <br />
      <!-- <h4 align="center">Insert players to upcoming game</h4>
      <br />
      
      <form method="post" id="insert_form">
        <div class="table-repsonsive">
          <span id="error"></span>
          <table class="table table-bordered" id="item_table">
            <thead>
              <tr>
                <th width="1%"></th>
                <th width="30%">Player Name</th>
                <th width="30%">Verse</th>
                <th width="30%">Game Date</th>
                <th><button type="button" name="add" class="btn btn-success btn-xs add">Add Player</button></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div align="center">
            <input type="submit" name="submit" class="btn btn-info" value="Add Game" />
            <input type="button" class="btn btn-secondary" onclick="location.href='test_statistic.php';" value="Player Statistic" />
          </div>
        </div>
      </form> -->
</br>
      <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Verse</th>
       <th>Game Date</th>
       <th>Final</th>
       <th>Status</th>
       <th width="8%" style="border-right:none;">Action</th>
       <th width="8%" style="border-right:none;"></th>
       <p id="msg" style="display:none">Saved</p>
      </tr>
     </thead>
    </table>
   </div>
    </div>
    
  </body>
  </html>  
<?php
include('modal/updatemodal.php');
?>  
<script>
    $(document).ready(function(){

  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"gameFetch.php",
     type:"POST"
    }
   });
  }
      
      
      
    });

</script>

<!-- //Activate Update Modal -->
<script type="text/javascript" language="javascript" >
$(document).on('click', '.update_game', function(){ 
      let user_id = $(this).attr("id"); 
      // alert (user_id); 
      $.ajax({  
          url:"updateGameFront.php",  
          method:"POST",  
          data:{user_id:user_id},  
          dataType:"json",  
          success:function(data){  
                $('#game').val(data.gameID);  
                $('#team').val(data.team);  
                $('#gamedate').val(data.gamedate);  
                $('#final').val(data.final);  
                $('#status').val(data.statusID);  
                $('.modal-title').text("Update Game");
                $('#user_id').val(user_id);
                $('#action').val("Update");
                $('#operation').val("Update");
                $('#action').removeClass('btn btn-success').addClass('btn btn-danger'); 
                $('#UpdateModal').modal('show'); 
                $('#user_data').DataTable().ajax.reload(); 
          }  
      });  
}); 

$(document).on('submit', '#update_form', function(event){
//   $('#update_form').parsley(); 
// event.preventDefault();
var user_id = $(this).attr("id");
 $.ajax({
  url:"updateGameSingleBackEnd.php",
  method:'POST',
  data:new FormData(this),
  contentType:false,
  processData:false,
  beforeSend:function(){  
  $('#action').val("Updating..");  
  },
  success:function(data)
  {
   alert(data);
   $('#update_form')[0].reset();
   $('#UpdateModal').modal('hide');
   $('#user_data').DataTable().ajax.reload(); 
   location.reload();
  }
 });
});
</script>
