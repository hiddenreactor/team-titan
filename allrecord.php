<?php 
include "config_BD.php";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"></script>

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
  font-size: 1.5rem;
  /* border-radius: 4px; */
  background: white;
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
  font-size: 2rem;
  font-weight: 1rem;
  color: white;
  border-radius: 0 4px 4px 0;
  /* line-height: 1.6 */
  background: #a9ba9d ;
}

.quantity-button.quantity-down {
  position: absolute;  
  right: 20px;
  height: 100%;
  font-size: 2rem;
  font-weight: 1rem;
  font-family: "FontAwesome";
  border-radius: 4px 0 0 4px;
  background: #ffe4e1 ;
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
        input[type="number"]
{
    background: transparent;
    border: none;
}
	</style>



<!-- <div class="table-repsonsive" id='employee_div'></div> -->
<div class="table table-striped table-responsive" id='employee_div'></div>
              
              <table width='100%' border='0'>
              <tr>
                  <th style="display:none;">Game ID</th>
                  <th style="display:none;"> Player ID4</th>
                  <th> &nbsp;Player</th>
                  <th>Verse Team</th>
                  <th>&nbsp;Point</th> 
                  <th>&nbsp;Assist</th>                 
                  <th>&nbsp;Steal</th>
                  <th>Rebound</th>
                  <th>&nbsp;Block</th>
                  <th>&nbsp;Turnover</th>
                  <th>Play Time</th>
              </tr>
              <?php 
                  // $query = "select * from users order by name";
                  $query="SELECT players.playerID, players.playerName, team.team, gamestat.gamedate, playerstat.gameID, playerstat.statID, playerstat.point, playerstat.rb, playerstat.assist, playerstat.blk, playerstat.steal, playerstat.playtime, playerstat.turnover FROM team
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
                      $steal = $row['steal'];
		      $turnover = $row['turnover'];
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
                              <input type="number" id='point_<?php echo $id; ?>' value='<?php echo $point; ?>' readonly="readonly">
                            </div>
                          </td>
                          <!-- <td> <div contentEditable='true' class='edit' id='assist_<?php echo $id; ?>'><?php echo $assist; ?> </div> </td> -->
                          <td>
                            <div class="quantity" id='assist_<?php echo $id; ?>'>
                              <input type="number" id='assist_<?php echo $id; ?>' value='<?php echo $assist; ?>' readonly="readonly">
                            </div>
                          </td>                          
                          <td>
                            <div class="quantity" id='steal_<?php echo $id; ?>'>
                              <input type="number" id='steal_<?php echo $id; ?>' value='<?php echo $steal; ?>' readonly="readonly">
                            </div>
                          </td>
                          <td>
                            <div class="quantity" id='rb_<?php echo $id; ?>'>
                              <input type="number" id='rb_<?php echo $id; ?>' value='<?php echo $rb; ?>' readonly="readonly">
                            </div>
                          </td>
                          <td>
                            <div class="quantity" id='blk_<?php echo $id; ?>'>
                              <input type="number" id='blk_<?php echo $id; ?>' value='<?php echo $blk; ?>' readonly="readonly">
                            </div>
                          </td>
			  <td>
                            <div class="quantity" id='turnover_<?php echo $id; ?>'>
                              <input type="number" id='turnover_<?php echo $id; ?>' value='<?php echo $turnover; ?>' readonly="readonly">
                            </div>
                          </td>    
                            <!-- <td> <div contentEditable='true' class='clickme' id='playtime_<?php echo $id; ?>'> <?php echo $row['playtime'] ?></div> </td> -->
                            <!-- <td>
                              <div class='edit' ><?php echo $playtime; ?> </div> 
                              <input type='time' class='txtedit basic stopwatch' value='<?php echo $playtime; ?>' id='playtime_<?php echo $id; ?>' >
                            </td> -->
                          <td>
                            <div class="stopwatch" id='playtime_<?php echo $id; ?>'>
                              <input name='form-control stopwatch' type="text" value='<?php echo $playtime; ?>'>    
                            </div>
                          </td>                         
                      </tr>
              <?php
                      $count ++;
                  }
              ?>  
              </table>
               
          </div> 
<!-- <script>          
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
</script> -->

