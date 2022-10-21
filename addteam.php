<?php
$page='addteam';
require_once('includes/header.php');
include('statConn.php');
?>

<!DOCTYPE html>
<html>

  <body>

    <div class="container">
    <h3 align="center">Insert new team</h3>
        <br />
        <h4 align="center">add teamID to players table, </h4>
        <br />
        <div class="table-responsive">
            <div align="right">
                <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">Add</button>
            </div>
            <br />
    
</br>
      <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th width="25%" style="text-align: center;">Current Team</th>
        <th width="25%" style="text-align: center;">Group</th>
        <th width="25%" style="text-align: center;">Registration Year</th>
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
include('modal/addteamModal.php');
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
     url:"addteamFetch.php",
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
                    url: "insertteam.php",

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
  var teamID = $(this).attr("id");
//   alert(playerID);
  if(confirm("Are you sure you want to delete this?"))
  {
   $.ajax({
    url:"deleteteam.php",
    method:"POST",
    data:{teamID:teamID},
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
