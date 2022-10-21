<div id="userModal" class="modal fade">
 <div class="modal-dialog">
  <form method="post" id="user_form" enctype="multipart/form-data">
   <div class="modal-content">
    <div class="modal-header">
     <h4 class="modal-title">Add User</h4>
     <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
     <label>Enter First Name</label>
     <input type="text" name="playerName" id="playerName" class="form-control" />
     <br />
     <label>Floor Time</label>
     <input type="text" name="onFloor" id="onFloor" class="form-control" value="0" disabled/>
     <br />
     <label>Played Minutes</label>
     <input type="text" name="playTime" id="playTime" class="form-control" value="0:00:000" disabled/>
     <br />
    </div>
    <div class="modal-footer">
     <input type="hidden" name="user_id" id="user_id" />
     <input type="hidden" name="operation" id="operation" />
     <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
   </div>
  </form>
 </div>
</div>