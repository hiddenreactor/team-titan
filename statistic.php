<?php 
$page='stat';
 require_once('includes/header.php');
 include "config_BD.php"; 
?>


<!DOCTYPE html>
<html>

<script type="text/javascript">
    $(document).ready(function(){
        $("#employee_div").load("allrecord.php");
        $("#depart_dropdown").change(function(){
            var selected=$(this).val();
            $("#desig_div").load("desig.php",{selected_depart: selected});
        });
        $("#refresh").click(function(){
            $("#employee_div").load("allrecord.php");
        });

    });
</script>	

    <head>
        <title>Team Titan</title>
        <link href='style_BD.css' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>

<body>

<div class="container">
      <h3 align="center">New Player Statistic</h3>
      <br />
      <div class="row">
      <form method="post" class="form-horizontal">
	  <div class="col-sm-2" >     
					
						<select name="department" class="form-control" id="depart_dropdown">
							<option>Select Team</option>
							<?php
								require('config.php');
								$db = new db;
								$result=$db->getGame();
								while($row=mysqli_fetch_array($result)){
									echo "<option value=".$row['teamID'].">".$row['team']."</option>";	
								}
								$db->closeCon();
							?>
						</select>
						
					</div>
					<div class="col-sm-2" id="desig_div">
					</br>
					</div>
						<button type="button" name="refresh" id="refresh" class="btn btn-primary">Refresh</button>
                        <button type="button" name="reload" id="reload" class="btn btn-info">Reload Script</button>
			</form>
</br>
      <div id="alert_message"></div>
      <div class="table-repsonsive" id='employee_div'></div>
      
</div>
</div>
</body>
</html>

<script>
$(document).ready(function(){
    
    // Add Class
    $('.edit').click(function(){
        $(this).addClass('editMode');
    
    });

    // Save data
    $(".edit").focusout(function(){
        $(this).removeClass("editMode");
 
        var id = this.id;
        var split_id = id.split("_");
        var field_name = split_id[0];
        var edit_id = split_id[1];

        var value = $(this).text();
     
        $.ajax({
            url: 'update_BD.php',
            type: 'post',
            data: { field:field_name, value:value, id:edit_id },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully'); 
                    
                }else{ 
                    console.log("Not saved."); 
                    
                }             
            }
        });
                
    });

});
</script>

<script type="text/javascript">
    $("#reload").click(function(){
        // $("#employee_div").load("allrecord.php");
        // alert("hello");
    jQuery('<div class="quantity-nav"><button class="quantity-button quantity-up">+</button><button class="quantity-button quantity-down">-</button></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function () {
    var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max'),
        id = this.id,
        split_id = id.split("_"),
        field_name1 = split_id[0],
        edit_id1 = split_id[1];

    btnUp.click(function () {
      var oldValue = parseFloat(input.val());
      if (oldValue >= max) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
    
        $.ajax({
            url: 'update_BD.php',
            type: 'post',
            data: { field:field_name1, value:newVal, id:edit_id1 },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully');                     
                }else{ 
                    console.log("Not saved.");                     
                }             
            }
        });

      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

    btnDown.click(function () {
      var oldValue = parseFloat(input.val());
      if (oldValue <= min) {
        var newVal = oldValue;
      } else {
        var newVal = oldValue - 1;


        
        $.ajax({
            url: 'update_BD.php',
            type: 'post',
            data: { field:field_name1, value:newVal, id:edit_id1 },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully'); 
                    
                }else{ 
                    console.log("Not saved."); 
                    
                }             
            }
        });

      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
    });

  });

  
    $('.start-timer-btn').on('click', function() {



              hasTimer = true;
              $(this).prev("input").timer({
                  editable: true
              });
      $(this).addClass('hidden');
      // $(this).next('.pause-timer-btn, .reset-timer-btn').removeClass('hidden');
      $(this).closest('.start-timer-btn').siblings('.pause-timer-btn, .reset-timer-btn').removeClass('hidden');
              // $('.pause-timer-btn, .reset-timer-btn').removeClass('hidden');

});
    // Init timer pause
          $('.pause-timer-btn').on('click', function() { 
      var id = $(this).siblings('input').attr('id');
var split_id = id.split("_"); 
var field_name1 = split_id[0];
var edit_id1 = split_id[1];
var inputValue =$(this).prevAll("input[type=text]").val();


$.ajax({
          url: 'update_BD.php',
          type: 'post',
          data: { field:field_name1, value:inputValue, id:edit_id1 },
          success:function(response){
              if(response == 1){ 
                  console.log('Save successfully'); 
                  
              }else{ 
                  console.log("Not saved."); 
                  
              }             
          }
      });

              $(this).siblings("input").timer('pause');
              $(this).addClass('hidden');
              // $('.resume-timer-btn').removeClass('hidden');
       $(this).closest('.pause-timer-btn').siblings('.resume-timer-btn').removeClass('hidden');
          });

// Init timer resume
$('.resume-timer-btn').on('click', function() {
      // alert($(this).siblings('input').attr('id'));
      $(this).siblings("input").timer('resume');
              $(this).addClass('hidden');
              // $('.pause-timer-btn, .reset-timer-btn').removeClass('hidden');
      $(this).closest('.resume-timer-btn').siblings('.pause-timer-btn, .reset-timer-btn').removeClass('hidden');
          });

        // Remove timer
          $('.reset-timer-btn').on('click', function() {
      var id = $(this).siblings('input').attr('id');
var split_id = id.split("_"); 
var field_name1 = split_id[0];
var edit_id1 = split_id[1];
var inputValue =$(this).prevAll("input[type=text]").val();

$.ajax({
          url: 'update_BD.php',
          type: 'post',
          data: { field:field_name1, value:inputValue, id:edit_id1 },
          success:function(response){
              if(response == 1){ 
                  console.log('Save successfully'); 
                  
              }else{ 
                  console.log("Not saved."); 
                  
              }             
          }
      });

              hasTimer = false;
              $(this).siblings("input").timer('remove');
      $(this).siblings('input').val('');
              $(this).addClass('hidden');
              $('.start-timer-btn').removeClass('hidden');
              $('.pause-timer-btn, .resume-timer-btn').addClass('hidden');
   
          });

        
    });


</script>	