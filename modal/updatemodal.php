<div id="UpdateModal" class="modal fade" > 
 <?php 
 include('style/modal.php');
 ?>
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">                        
                     <h4 class="modal-title">Update Member  
                     </h4>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="update_form">      
                          <label>Verse Team</label>  
                          <!-- <input type="text" name="MemberName" id="MemberName" class="form-control validate" required>   -->
                          <input type="text" id="team" class="form-control input-value" name="team" disabled> 
                          <br /> 
                          <label>Game Date</label>   
                          <input type="text" id="gamedate" class="form-control input-value" name="gamedate" disabled placeholder="Full Name" data-parsley-pattern="^[A-Z][a-z]+\s[A-Z][a-z]+$" data-parsley-trigger="focusout" data-parsley-pattern-message="Must contain First and Last name beginning with a capital letter and seprate by a space" data-parsley-member="membername"  data-parsley-updatemember>
                          <br />
                          <label>Final Point</label>   
                          <input type="text" id="final" class="form-control input-value" name="final" >
                          <br /> 
                          <!-- <label>Status</label>  
                          <input type="text" id="status" class="form-control input-value" name="status" disabled placeholder="Full Name" data-parsley-pattern="^[A-Z][a-z]+\s[A-Z][a-z]+$" data-parsley-trigger="focusout" data-parsley-pattern-message="Must contain First and Last name beginning with a capital letter and seprate by a space" data-parsley-member="membername"  data-parsley-updatemember>
                          <br />  -->
                          <label>Status</label>  
                          <select name='status' id='status' class="form-control input-value">
                            <option value="">Select Status</option>
                              <?php 
                              $query = "SELECT * FROM status ORDER BY statusID ASC";
                              $statement = $connect->prepare($query);
                              $statement->execute();
                              $result = $statement->fetchALL();
                                foreach($result as $row)
                                {
                                  echo '<option value="'.$row["statusID"].'">'.$row["status"].'</option>';
                                }
                              ?>        
                            </select> 
                          <br />  
                          
                          <input type="hidden" name="user_id" id="user_id" />  
                          <input type="hidden" name="operation" id="operation" />
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add Member" />
                          <!-- <input type="submit" name="operation" id="operation" value="Update" class="btn btn-primary" />   -->
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
