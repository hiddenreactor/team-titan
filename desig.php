<?php 
 include "config_BD.php";
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"></script>


</head>
<script type="text/javascript">
	$(document).ready(function(){
		$("#gamedate").change(function(){				
				var selected=$(this).val();
				$("#employee_div").load("search.php",{selected_desig: selected});		
			});
	});
</script>

<!-- <script type="text/javascript">
		$("#gamedate").change(function(){						
			alert ("hello2");
			});				
</script> -->

</br>
	<select name="designation" class="form-control" id="gamedate">
		<option>Select Date</option>
		<?php
			require('config_BD2.php');
			$db = new db;
			$result=$db->getDesignation($_POST['selected_depart']);
			while($row=mysqli_fetch_array($result)){
				echo "<option value=".$row['gameID'].">".$row['gamedate']."</option>";	
			}
			$db->closeCon();
		?>
	</select>
	</br>
						
