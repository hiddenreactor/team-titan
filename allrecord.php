<?php 
include "config_BD.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"></script>

<!-- <script type="text/javascript">
	console.log("Thank You Jesus!");

$(document).ready(function() {

  /* alert("ready");//Thank You Saviour */
  var minusButton = $(".spinnerMinus"); //to aquire all minus buttons
  var plusButton = $(".spinnerPlus"); //to aquire all plus buttons

  //Handle click
  minusButton.click(function() {
    trigger_Spinner($(this), "-", {
      max: 999999,
      min: 0
    }); //Triggers the Spinner Actuator
  }); /*end Handle Minus Button click*/

  plusButton.click(function() {
    trigger_Spinner($(this), "+", {
      max: 999999,
      min: 0
    }); //Triggers the Spinner Actuator    
  }); /*end Handle Plus Button Click*/

});


//This function will take the clicked button and actuate the spinner based on the provided function/operator
// - this allows you to adjust the limits of specific spinners based on classnames
function trigger_Spinner(clickedButton, plus_minus, limits) {

  var valueElement = clickedButton.closest('.customSpinner').find('.spinnerVal'); //gets the closest value element to this button
  var controllerbuttons = {
    minus: clickedButton.closest('.customSpinner').find('.spinnerMinus'),
    plus: clickedButton.closest('.customSpinner').find('.spinnerPlus')
  }; //to get the button pair associated only with this set of input controls//THank You Jesus!

  //Activate Spinner
  updateSpinner(limits, plus_minus, valueElement, controllerbuttons); //to update the Spinner
 
}


/*
	max - maxValue
  min - minValue
  operator - +/-
  elem - the element that will be used to update the count
*/ //Thank You Jesus!
function updateSpinner(limits, operator, elem, buttons) {

  var currentVal = parseInt(elem.val()); //get the current val

  // alert (currentVal);

  //Operate on value -----------------
  if (operator == "+") {
    currentVal += 1; //Increment by one  
    //Thank You Jesus ----------------
    if (currentVal <= limits.max) {
      elem.val(currentVal);
    }
  } else if (operator == "-") {
    currentVal -= 1; //Decrement by one
    //Thank You Jesus ----------------
    if (currentVal >= limits.min) {
      elem.val(currentVal);
    }
  }
  

  //Independent Controllers - Handle Buttons disable toggle ------------------------
  buttons.plus.prop('disabled', (currentVal >= limits.max)); //enable/disable button
  buttons.minus.prop('disabled', (currentVal <= limits.min)); //enable/disable button  

}
</script>	 -->

<!-- <style>
.spinnerVal {
  text-align: center;
  background-color: yellow !important;
}

.customSpinner {
  display: flex;
  margin-bottom: 10px;
  border-style: solid;
  border-color: red;
}


/*Apply individual Styles to one*/

.spinner-roundVal {
  margin: auto 2px;
  border-radius: 10px !important;
  width: 20px !important;
}

.spinner-roundbutton {
  border-radius: 10px !important;
}
</style> -->

<style>
.quantity {
  position: relative;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}

.quantity input {
  width: 50px;
  height: 30px;
  /* line-height: 1.65; */
  float: left;
  display: block;
  padding: 0;
  margin: 0;
  padding-left: 20px;
  border: none;
  /* box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.08); */
  font-size: 0.8rem;
  /* border-radius: 4px; */
  background: lightyellow;
  padding-left: 15px;
}

.quantity input:focus {
  /* outline: 0; */
}

.quantity-nav {
  float: left;
  position: relative;
  height: 30px;
}

.quantity-button {
  position: relative;
  cursor: pointer;
  border: none;
  /* border-left: 1px solid rgba(0, 0, 0, 0.08); */
  width: 30px;
  text-align: center;
  color: #333;
  font-size: 13px;
  font-family: "FontAwesome" !important;
  /* line-height: 1.5; */
  padding: 0;
  background: #FAFAFA;
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.quantity-button:active {
  background: #EAEAEA;
}

.quantity-button.quantity-up {
  position: absolute;
  height: 100%;
  left: 25px;
  /* border-bottom: 1px solid rgba(0, 0, 0, 0.08); */
  font-family: "FontAwesome";
  border-radius: 0 4px 4px 0;
  /* line-height: 1.6 */
  background: #E0FFFF;
}

.quantity-button.quantity-down {
  position: absolute;  
  right: 20px;
  height: 100%;
  font-family: "FontAwesome";
  border-radius: 4px 0 0 4px;
  background: #FFEEEE;
}
</style>

<style>
.stopwatch {
  position: relative;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type=number] {
  -moz-appearance: textfield;
}

.stopwatch input {
  width: 80px;
  height: 30px;
  /* line-height: 1.65; */
  float: left;
  display: block;
  padding: 0;
  margin: 0;
  padding-left: 20px;
  border: none;
  /* box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.08); */
  font-size: 0.8rem;
  /* border-radius: 4px; */
  background: white;
  padding-left: 15px;
}

.stopwatch input:focus {
  /* outline: 0; */
}

.stopwatch-nav {
  float: left;
  position: relative;
  height: 30px;
}

.stopwatch-button {
  position: relative;
  cursor: pointer;
  border: none;
  /* border-left: 1px solid rgba(0, 0, 0, 0.08); */
  width: 30px;
  text-align: center;
  color: #333;
  font-size: 13px;
  font-family: "FontAwesome" !important;
  /* line-height: 1.5; */
  padding: 0;
  background: #FAFAFA;
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.stopwatch-button:active {
  background: #EAEAEA;
}

.stopwatch-button.stopwatch-up {
  position: absolute;
  height: 100%;
  left: 25px;
  /* border-bottom: 1px solid rgba(0, 0, 0, 0.08); */
  font-family: "FontAwesome";
  border-radius: 0 4px 4px 0;
  /* line-height: 1.6 */
  background: #E0FFFF;
}

.stopwatch-button.stopwatch-down {
  position: absolute;  
  right: 20px;
  height: 100%;
  font-family: "FontAwesome";
  border-radius: 4px 0 0 4px;
  background: #FFEEEE;
}
</style>

<!-- Stopwatch styling by input tag -->
<style>
        a:hover {
            color: #333;
        }

		pre {
			background-color: #e0e0e0;
			border: none;
			margin-bottom: 20px;
		}

		pre, .btn, .form-control {
			border-radius: 0;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
		}


		.top-bar {
			background: #000;
			padding: 10px 0;
		}

		.timer {
			background: #f2f3f4;
			margin-bottom: 10px;
			font-weight: bold;
			font-size: 16px;
			text-shadow: -1px 0 1px #fff;
		}

		.action {
			font-style: italic;
		}

        .highlight {
            color: #a80000;
        }

        .highlight:hover {
            text-decoration: none;
        }
	</style>

<head>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 -->

  <!-- <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
		<script src='https://code.jquery.com/jquery-1.12.4.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/timer.jquery/0.6.5/timer.jquery.min.js'></script>
	<script src='js/timer.jquery/timer.jquery.js'></script> -->
  
</head>

<!-- <div class="table-repsonsive" id='employee_div'></div> -->
<div class="table table-striped table-responsive" id='employee_div'></div>
              
              <table width='100%' border='0'>
              <tr>
                  <th style="display:none;">Game ID</th>
                  <th style="display:none;">Player ID4</th>
                  <th>Player</th>
                  <th>Verse Team</th>
                  <th>Point</th>
                  <th>Rebound</th>
                  <th>Assist</th>
                  <th>Block</th>
                  <th>On Floor</th>
                  <th>Play Time</th>
              </tr>
              <?php 
                  // $query = "select * from users order by name";
                  $query="SELECT players.playerID, players.playerName, team.team, gamestat.gamedate, playerstat.gameID, playerstat.statID, playerstat.point, playerstat.rb, playerstat.assist, playerstat.blk, playerstat.onfloor, playerstat.playtime FROM team
                          INNER JOIN gamestat ON gamestat.teamID = team.teamID
                          INNER JOIN playerstat ON gamestat.gameID = playerstat.gameID
                          INNER JOIN players on playerstat.playerID = players.playerID 
                          ORDER BY playerstat.statID DESC
                          ";
                  $result = mysqli_query($con,$query);
                  $count = 1;
                  while($row = mysqli_fetch_array($result) ){
                      $id = $row['statID'];
                      $playerid = $row['playerID'];
                      $name = $row['playerName'];
                      $team = $row['team'];
                      $point = $row['point'];
                      $rb = $row['rb'];
                      $assist = $row['assist'];
                      $blk = $row['blk'];
                      $onfloor = $row['onfloor'];
                      $playtime = $row['playtime'];
              ?>
                      <tr>
                          <td style="display:none;"><?php echo $count; ?></td>
                          <td style="display:none;"> <div class='edit'><?php echo $playerid; ?></div> </td>
                          <td> <div class='edit' ><?php echo $name; ?></div> </td>
                          <td> <div class='edit'><?php echo $team; ?> </div> </td>
                          <!-- <td><div contentEditable='true' class='edit' id='point_<?php echo $id; ?>'><?php echo $point; ?> </div></td> -->
                          <td>
                            <div class="quantity" id='point_<?php echo $id; ?>'>
                              <input type="number" id='point_<?php echo $id; ?>' value='<?php echo $point; ?>' >
                            </div>
                          </td>
                          <td>
                            <div class="quantity" id='rb_<?php echo $id; ?>'>
                              <input type="number" id='rb_<?php echo $id; ?>' value='<?php echo $rb; ?>' >
                            </div>
                          </td>
                          <!-- <td> <div contentEditable='true' class='edit' id='assist_<?php echo $id; ?>'><?php echo $assist; ?> </div> </td> -->
                          <td>
                            <div class="quantity" id='assist_<?php echo $id; ?>'>
                              <input type="number" id='assist_<?php echo $id; ?>' value='<?php echo $assist; ?>' >
                            </div>
                          </td>
                          <td>
                            <div class="quantity" id='blk_<?php echo $id; ?>'>
                              <input type="number" id='blk_<?php echo $id; ?>' value='<?php echo $blk; ?>' >
                            </div>
                          </td>
                          <td>
                            <div class="quantity" id='onfloor_<?php echo $id; ?>'>
                              <input type="number" id='onfloor_<?php echo $id; ?>' value='<?php echo $onfloor; ?>' >
                            </div>
                          </td>
                            <!-- <td> <div contentEditable='true' class='clickme' id='playtime_<?php echo $id; ?>'> <?php echo $row['playtime'] ?></div> </td> -->
                            <!-- <td>
                              <div class='edit' ><?php echo $playtime; ?> </div> 
                              <input type='time' class='txtedit basic stopwatch' value='<?php echo $playtime; ?>' id='playtime_<?php echo $id; ?>' >
                            </td> -->
                          <!-- <td>
                            <div class="stopwatch" id='playtime_<?php echo $id; ?>'>
                              <input name='form-control stopwatch' type="text" value='<?php echo $playtime; ?>'>    
                            </div>
                          </td> -->
                          <td>
                            <div class="stopwatch" id='playtime_<?php echo $id; ?>'>
                              <input id='playtime_<?php echo $id; ?>' name='timer' class='form-control timer-demo' type="text" > 
                              <!-- <input type='text' name='timer' class='form-control timer-demo' placeholder='0 sec' /> -->
                              <button type="button" data-set="<?php echo $id; ?>" class="btn btn-primary start-timer-btn btn-xs">Start</button>
                              <button class='btn btn-primary resume-timer-btn btn-xs hidden'>Resume</button>
                              <button class='btn pause-timer-btn btn-xs hidden'>Pause</button>
                              <button class='btn btn-danger reset-timer-btn btn-xs hidden'>Reset Timer</button>
					<!-- <button class='btn btn-primary resume-timer-btn hidden'>Resume</button>
					<button class='btn pause-timer-btn hidden'>Pause</button>
					<button class='btn btn-danger remove-timer-btn hidden'>Remove Timer</button>  -->
                            </div>
                          </td>
                      </tr>
              <?php
                      $count ++;
                  }
              ?>  
              </table>
               
          </div> 
<script>          
$(document).ready(function () {
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
        // alert (id);
        // alert (split_id);
        // alert ("field = " + field_name1);
        // alert ("id = " + edit_id1);
        // alert ("value = " + newVal);

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
        // alert (split_id);
        // alert ("field = " + field_name1);
        // alert ("id = " + edit_id1);
        // alert ("value = " + newVal);

        
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
});          
</script>

<script>          
$(document).ready(function () {
  
  // var split_id = id.split("_"); 
  // var field_name1 = split_id[0];
  // var edit_id1 = split_id[1];
  // alert (id);
  // alert (split_id);
  // alert ("field = " + field_name1);
  // alert ("id = " + edit_id1);
  // alert ("value = " + newVal);
  // $('.start-timer-btn').on('click', function(){
  //   alert($(this).prev('input').attr('id'));
  // $('.editbtn3').click(function() { 
    $('.start-timer-btn').on('click', function() {

  // var edit = $(this).text().trim() == 'Start';
      // alert($(this).prev('input').attr('id'));
  // $(this).html($(this).text().trim() == 'Start' ? 'Pause' : 'Re-Start');

  // alert($(this).prev('input').attr('id'));
 
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
        // alert($(this).siblings('input').attr('id'));
        var id = $(this).siblings('input').attr('id');
  var split_id = id.split("_"); 
  var field_name1 = split_id[0];
  var edit_id1 = split_id[1];
  var inputValue =$(this).prevAll("input[type=text]").val();
  // alert (id);
  // alert (split_id);
  // alert ("field = " + field_name1);
  // alert ("id = " + edit_id1);
  // alert (inputValue);

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
        // alert($(this).siblings('input').attr('id'));
        // $(this).prev('input').attr('id').val('');
			});

      // // Additional focus event for this demo
			// $('.timer-demo').on('focus', function() {
			// 	if(hasTimer) {
			// 		$('.pause-timer-btn').addClass('hidden');
			// 		$('.resume-timer-btn').removeClass('hidden');
			// 	}
			// });

});
</script>

