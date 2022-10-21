<style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }

    .switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: grey;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: blue;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{display: block;}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 4px;
}

.slider.round:before {
  border-radius: 5%;}


  .item {
  display: inline-block;
  margin: 15px 0;
  padding: 8px;
  border: 2px solid teal;
  user-select: none;
}

.item .counting {
  display: inline-block;
  background-color: #181818;
  color: #fff;
  font-size: 1.2rem;
  font-weight: bold;
  padding: 8px;
  border-radius: 4px;
}
button { padding: 0px; border: none; background: transparent; }

<style>
    * {
  padding: 0;
  margin: 0;
  font-family: 'IBM Plex Sans', sans-serif;
}

.counter {
    width: 150px;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
}
.counter input {
    width: 50px;
    border: 0;
    line-height: 30px;
    font-size: 20px;
    text-align: center;
    background: #0052cc;
    color: #fff;
    appearance: none;
    outline: 0;
}
.counter span {
    display: block;
    font-size: 25px;
    padding: 0 10px;
    cursor: pointer;
    color: #0052cc;
    user-select: none;
}

.btn-danger {
  margin-top:2px;
  position: relative;
}

.container{
        max-width: 970px !important;
    }

.container-xxl{
    max-width: 100% !important;
}  


</style> 
<?php
$page='game';
require_once('includes/header.php');
?>

<div class="container"> 
      <form method="post" id="update_form">    
         <h3 align="center" >Team Titan On Floor Tracker</h3> 
    
      <button type="submit" name="multiple_update" id="multiple_update" class="btn btn-info btn-lg pull-left" value="Update" />Update</button>  
   
     
     
      <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-warning btn-lg pull-right">Add Player</button>
   
      <br /><br /><br />
          <table id="example" class="table table-bordered table-striped">
              <thead>
                  <th width="10%"><input type="checkbox" name="select_all" id="select_all" class="select_all" hidden /></th>
                  <th width="40%">Name</th>
                  <th width="20%">On Floor</th>
                  <th colspan="2" width="18%">Action</th>
              </thead>
              <tbody></tbody>
          </table>
      </form>                
  </div>
</div>     

  <!-- <div class="container-xxl">    
          <div class="row">
              <div class="col">
                  <div style="float:left;"> 
                      <label for="color">Verse Team</label>
                          <select name="color" id="color">
                              <option value="">--- Choose a team ---</option>
                              <option value="red">Lion</option>
                              <option value="green">Titan</option>
                              <option value="blue">Bear</option>
                          </select>     
                  </div> 
              </div>
              <div class="col-6">
                  <h3 align="center">Player Statistic</h3>
              </div>
              <div class="col">
                  <div align="right">
                      <label for="birthday">Game Date:</label>
                      <input type="date" id="date" name="date">
                  </div> 
              </div>
          </div>
      
          <form method="post" id="update_form">                
          <br />
              <table id="example" class="table table-bordered table-striped">
                  <thead>
                      <th width="10%"><input type="checkbox" name="select_all" id="select_all" class="select_all" hidden /></th>
                      <th width="10%">Player</th>
                      <th width="10%">Position</th>
                      <th width="5%">FG</th>
                      <th width="5%">Assist</th>
                      <th width="5%">Block</th>
                      <th width="5%">Rebound</th>
                      <th width="5%">Steal</th>
                      <th width="10%">Minutes</th>
                  </thead>
                  <tbody></tbody>
              </table>
          </form>
  </div>            -->
<?php 
include('modal/addplayerModal.php'); 
?>
</body>  
</html> 
     
<script> 
 
$(document).ready(function(){  
    
    function fetch_data()
    {
        $.ajax({
            url:"game1_select.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" id="'+data[count].playerID+'" data-name="'+data[count].playerName+'" data-floor="'+data[count].onFloor+'" class="check_box" /></td>';
                    html += '<td>'+data[count].playerName+'</td>';
                    html += '<td>'+data[count].onFloor+'</td>';
                    html += '<td style="width:9%"><label class="switch"><input type="checkbox" id="togBtn" ><div class="slider round">';
                    html += '<span class="on">1st</span><span class="off">OFF</span></div></label></td>';  
                    html += '<td><button type="button" name="delete" id="'+data[count].playerID+'" class="btn btn-danger btn-lg delete">Delete</button></td></tr>';   
                }
                $('tbody').html(html);
            }
        });
    }

    fetch_data();


    $(document).on('change', '.check_box', function(){
      // alert ("Check-box")  
        var html = '';
        if(this.checked===true)
        {
          
            html = '<td><input type="checkbox" id="'+$(this).attr('playerID')+'" data-name="'+$(this).data('name')+'" data-floor="'+$(this).data('floor')+'" class="check_box" checked /></td>';
            html += '<td><input type="text" name="playerName[]" class="form-control" value="'+$(this).data("name")+'" /></td>';
            html += '<td><div class="counter"><span class="down" onClick="decreaseCount(event, this)">-</span>';
            html += '<input type="text" name="onFloor[]" value="'+$(this).data("floor")+'" />';
            html += '<span class="up"  onClick="increaseCount(event, this)">+</span>';
            html += '<input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
            html += '<td style="width:9%"><label class="switch"><input type="checkbox" checked="true"><div class="slider round">';
            html += '<span class="on">chk</span><span class="off">OFF</span></div></label></td>';  
            html += '<td><button type="button" name="delete" id="'+$(this).attr('id')+'" class="btn btn-danger btn-lg delete">Delete</button></td></tr>';   
          }        
          if(this.checked === false)
        {
            html = '<td><input type="checkbox" id="'+$(this).attr('playerID')+'" data-name="'+$(this).data('name')+'" data-floor="'+$(this).data('floor')+'" class="check_box"  /></td>';
            html += '<td>'+$(this).data('name')+'</td>';
            html += '<td>'+$(this).data('floor')+'</td>';
            // html += '<td>'+$(this).data('floor')+'</td>'; 
            // html += '<td><div class="counter"><span class="down" onClick="decreaseCount(event, this)">-</span><input type="text" value="0"><span class="up"  onClick="increaseCount(event, this)">+</span></div></td>';
            html += '<td style="width:9%"><label class="switch"><input type="checkbox" ><div class="slider round">';
            html += '<span class="off">WTF</span><span class="on">OFF</span></div></label></td>'; 
            html += '<td><button type="button" name="delete" id="'+$(this).attr('playerID')+'" class="btn btn-danger btn-lg delete">Delete</button></td></tr>'; 
            window.location.reload();
        }    
        $(this).closest('tr').html(html);
    });

    // $(document).on('change', '.check_box', function(){ 
    //   alert ("hello");  
    //   var html = '';
    //             html = '<td><input type="checkbox" id="'+$(this).attr('playerID')+'" data-name="'+$(this).data('name')+'" data-floor="'+$(this).data('floor')+'" class="check_box"  /></td>';
    //         html += '<td>'+$(this).data('name')+'</td>';
    //         html += '<td>'+$(this).data('floor')+'</td>';
    //         html += '<td style="width:9%"><label class="switch"><input type="checkbox" checked="false"><div class="slider round">';
    //         html += '<span class="on">uncheck</span><span class="off">OFF</span></div></label></td>'; 
    //         html += '<td><button type="button" name="delete" id="'+$(this).attr('playerID')+'" class="btn btn-danger btn-lg delete">Delete</button></td></tr>';  
    //                 $(this).closest('tr').html(html);
    //   // window.location.reload();
    // });

   

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"game1_multiple_update.php",
                method:"POST",
                data:$(this).serialize(),
                success:function()
                {
                    alert('Data Updated');
                    fetch_data();
                }
            })
        }
    });

});  
</script>


<script type="text/javascript" language="javascript" >
$(document).ready(function(){
 $('#add_button').click(function(){
  $('#user_form')[0].reset();
  $('.modal-title').text("Add Userasdf");
  $('#action').val("Add");
  $('#operation').val("Add");
 });
});

$(document).on('submit', '#user_form', function(event){
  event.preventDefault();
  if(playerName != '')
  {
   $.ajax({
    url:"game1_insert.php",
    method:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
     alert(data);
     $('#user_form')[0].reset();
     $('#user_form').modal('hide');
     window.location.reload();
    }
   });
  }
  else
  {
   alert("Enter player's name");
  }
 });

  </script>
<script>
  $(document).on('click', '.delete', function(){
  var user_id = $(this).attr("id");
  // alert (user_id);
  // if(confirm("Are you sure you want to delete this?"))

   $.ajax({
    url:"game1_delete.php",
    method:"POST",
    data:{user_id:user_id},
    success:function(data)
    {
     alert(data);
     window.location.reload();
    }
   });  
 });
</script>

<script type="text/javascript">
      function increaseCount(a, b) {
        var input = b.previousElementSibling;
        var value = parseInt(input.value, 10); 
        value = isNaN(value)? 0 : value;
        value ++;
        input.value = value;
      }
      function decreaseCount(a, b) {
        var input = b.nextElementSibling;
        var value = parseInt(input.value, 10); 
        if (value > 0) {
          value = isNaN(value)? 0 : value;
          value --;
          input.value = value;
        }
      }
    </script>

<script language="JavaScript">
$('#select_all').click(function(event) {  
  var user_id = $(this).attr("id"); 
  if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
}); 
</script>
