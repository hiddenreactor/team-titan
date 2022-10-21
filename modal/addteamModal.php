<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Team</h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Enter Team Name</label>
                    <input type="text" name="team" id="team" class="form-control" />
                    <br />
                    <label>Select Group</label>  
                    <select name='groupID' id='groupID' class="form-control input-value" >
                    <option value="">Select Group</option>
                        <?php
                         require_once('config_BD.php');
                            $query = "SELECT * FROM groupsec ";
                            $result = mysqli_query($con, $query);   
                            while($team=mysqli_fetch_assoc($result))
                            { 
                        ?>
                        <option value ="<?php echo $team['groupID']; ?>"><?php echo $team['groupsec']; ?></option>
                        <?php    
                            }
                        ?>                  
                    </select> 
                    </br>
                    <label>Select Year</label>  
                    <select name='yearID' id='yearID' class="form-control input-value" >
                    <option value="">Select Year</option>
                        <?php
                         require_once('config_BD.php');
                            $query = "SELECT * FROM joinyear ";
                            $result = mysqli_query($con, $query);   
                            while($team=mysqli_fetch_assoc($result))
                            { 
                        ?>
                        <option value ="<?php echo $team['yearID']; ?>"><?php echo $team['year']; ?></option>
                        <?php    
                            }
                        ?>                  
                    </select> 
                    </br>
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Student Details</h4>
            </div>
            <div class="modal-body" id="student_detail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>