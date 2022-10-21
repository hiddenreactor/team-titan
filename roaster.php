<?php

//index.php
$page='roaster';
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
    <h3 align="center">Edit Team Titan Roaster</h3>
        <br />
        <h4 align="center">add teamID to players table, </h4>
        <br />
        <div class="table-responsive">
            <div align="right">
                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add</button>
            </div>
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
        <th width="25%" style="text-align: center;">Player</th>
        <th width="25%" style="text-align: center;">Team</th>
        <th width="25%" style="text-align: center;">Group</th>
        <th width="25%" style="text-align: center;">Year</th>
        <th width="10%" style="text-align: center;">Action</th>
       <p id="msg" style="display:none">Saved</p>
      </tr>
     </thead>
    </table>
   </div>
    </div>
    </div>
  </body>
  </html>  
<?php
include('modal/roasterModal.php');
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
     url:"roasterFetch.php",
     type:"POST"
    }
   });
  }
      
            
    });

</script>

<script>
    $(document).ready(function() {
        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#playerName').val() == "") {
                alert("Name is required");
            } else {
                $.ajax({
                    url: "insert.php",

                   method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Inserting");
                    },
                    success: function(data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        window.location.reload();
                    }
                });
            }
        });
                $(document).on('click', '.delete', function(){
  var playerID = $(this).attr("id");
//   alert(playerID);
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"select.php",
    method:"POST",
    data:{playerID:playerID},
    success:function(data)
    {
     alert(data);
     window.location.reload();
    }
   });
  }
  else
  {
   return false; 
  }
 });
    });
</script>

<!-- //Activate Update Modal -->
<!-- <script type="text/javascript" language="javascript" >
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
</script> -->
