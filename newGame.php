<?php

//index.php
$page='game';
require_once('includes/header.php');
include('statConn.php');

function fill_player($connect)
{ 
 $output = '';
 $query = "SELECT * FROM players ORDER BY playerID ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["playerID"].'">'.$row["playerName"].'</option>';
 }
 return $output;
}

function fill_team($connect)
{ 
 $output = '';
 $query = "SELECT * FROM team ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["teamID"].'">'.$row["team"].'</option>';
 }
 return $output;
}

function fill_group($connect)
{ 
 $output = '';
 $query = "SELECT * FROM groupsec ORDER BY groupID ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["groupID"].'">'.$row["groupsec"].'</option>';
 }
 return $output;
}

function fill_game($connect)          // Make this to display the latest game ONLY, get rid of select box
{ 
 $output = '';
 $query = "SELECT * FROM gamestat ORDER BY gameID DESC LIMIT 1";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= $row["gameID"];
 }
 return $output;
}
?>

<!DOCTYPE html>
<html>

  <body>

    <div class="container">
    <br />
      <h3 align="center">Insert players to upcoming game</h3>
      <br />
   
      
      <form method="post" id="insert_form">
        <div class="table-repsonsive">
          <span id="error"></span>
          <table class="table table-bordered" id="item_table">
            <thead>
              <tr>
                <th width="1%"></th>
<!--                 <th width="20%">Group</th>
                <th width="20%">Team</th> -->
                <th width="20%">Player Name</th>
                <th width="20%">Verse</th>
                <th width="10%">Game Date</th>
                <th><button type="button" name="add" class="btn btn-success btn-xs add">Enter Player</button></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <div align="center">
            <input type="submit" id="submits" name="submit" class="btn btn-info" value="Add New Game" disabled/>
            <!-- <input type="button" class="btn btn-secondary" onclick="location.href='statistic.php';" value="Player Statistic" /> -->
          </div>
        </div>
      </form>
</br>
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
      
      var count = 0;

      $(document).on('click', '.add', function(){
        document.getElementById("submits").disabled = false;
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="hidden" name="gameID[]" class="form-control gameID" value="<?php echo fill_game($connect); ?>"/></td>';
//         html += '<td><select name="groupsec[]" id="groupsec" class="form-control groupsec" onchange="FetchTeam(this.value)"  required><option value="">Select Group</option><?php echo fill_group($connect); ?></select></td>';
//         html += '<td><select name="team[]" id="team" class="form-control team" onchange="FetchPlayer(this.value)"  required><option value="">Select Team</option></select></td>';
//         html += '<td><select name="playername[]" id="playername" class="form-control playername"><option value="">Select player</option></select></td>';
        html += '<td><select name="playername[]" id="playername" class="form-control playername"><option value="">Select player</option><?php echo fill_player($connect); ?></select></td>'; 
        html += '<td><select name="verse[]" class="form-control verse"><option value="">Select Team</option><?php echo fill_team($connect); ?></select></td>';
        html += '<td><input type="date" name="gamedate[]" class="form-control gamedate" /></td>';        
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove">Remove</button></td>';
        // $('tbody').append(html);
        $('#item_table').append(html);
      });

      $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
      });

      $('#insert_form').on('submit', function(event){
        event.preventDefault();
        var error = '';
        $('.playername').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Enter player name at '+count+' row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.gameID').each(function(){
          var count = 1;
          if($(this).val() == '')
          {
            error += '<p>Enter player name at '+count+' row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.verse').each(function(){
          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select verse team '+count+' row</p>';
            return false;
          }

          count = count + 1;
        });

        $('.team').each(function(){
          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select verse team '+count+' row</p>';
            return false;
          }

          count = count + 1;
        });

        $('.gamedate').each(function(){

          var count = 1;

          if($(this).val() == '')
          {
            error += '<p>Select verse date '+count+' row</p> ';
            return false;
          }

          count = count + 1;

        });
        var form_data = $(this).serialize();
        alert (form_data);
        if(error == '')
        {
          $.ajax({
            url:"gameInsert.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
              if(data == 'ok')
              {
                $('#item_table').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
                $('#error').delay(2000).fadeOut('slow');
                location.reload();
              }

            }
          });
        }
        else
        {
          $('#error').html('<div class="alert alert-danger">'+error+'</div>');
        }

      });
      
    });

</script>
<script type="text/javascript">
  function FetchTeam(id){
    $('#team').html('');
    $('#playername').html('<option>Select Player</option>');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { groupID : id},
      success : function(data){
         $('#team').html(data);
      }

    })
  }

  function FetchPlayer(id){ 
    $('#playername').html('');
    $.ajax({
      type:'post',
      url: 'ajaxdata.php',
      data : { teamID : id},
      success : function(data){
         $('#playername').html(data);
      }

    })
  }

  
</script>

