<?php include('connection.php');?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/af-2.3.7/date-1.1.0/r-2.2.9/rg-1.1.3/sc-2.0.4/sp-1.3.0/datatables.min.css"/>

 
  <title>Team Titan Statistic!!</title>
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
  </style>
</head>
<body>
  <div class="container-fluid" style="width=800px">
    <h2 class="text-center">Team Titan</h2>
    <p class="datatable design text-center">On Floor Player</p>
    <div class="row">
      <div class="container">
        <div class="btnAdd">
         <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addPlayerModal"   class="btn btn-success btn-sm" >Add Player</a>
       </div>
       <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
         <table id="example" class="table">
          <thead>
            <th width="50px">Id</th>
            <th width="800px">Player</th>
            <th width="50px" style="border-right:none;">Action</th>
            <th width="50px" style="border-right:none;"></th>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</div>
</div>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/af-2.3.7/date-1.1.0/r-2.2.9/rg-1.1.3/sc-2.0.4/sp-1.3.0/datatables.min.js"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->

  
  <script type="text/javascript">
    
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function( nRow, aData, iDataIndex ) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide':'true',
        'processing':'true',
        'paging':'true',
        'order':[],
        'ajax': {
          'url':'fetch_data.php',
          'type':'post',
        },
        "columnDefs": [{
          'targets':[2,3],
          'orderable' :false,
        }]
      });
    } );

    $(document).on('submit','#addUser',function(e){
      e.preventDefault();
      var playerName= $('#playerName').val();
      if(playerName != '' )
      {
       $.ajax({
         url:"add_user.php",
         type:"post",
         data:{playerName:playerName},
         success:function(data)
         {
           var json = JSON.parse(data);
           var status = json.status;
           if(status=='true')
           {
            mytable =$('#example').DataTable();
            mytable.draw();
            $('#addPlayerModal').modal('hide');
          }
          else
          {
            alert('failed');
          }
        }
      });
     }
     else {
      alert('Fill all the required fields');
    }
  });


    $(document).on('submit','#updateUser',function(e){
      e.preventDefault();
       //var tr = $(this).closest('tr');
       var city= $('#cityField').val();
       var username= $('#nameField').val();
       var mobile= $('#mobileField').val();
       var email= $('#emailField').val();
       var trid= $('#trid').val();
       var id= $('#id').val();
       if(city != '' && username != '' && mobile != '' && email != '' )
       {
         $.ajax({
           url:"update_user.php",
           type:"post",
           data:{city:city,username:username,mobile:mobile,email:email,id:id},
           success:function(data)
           {
             var json = JSON.parse(data);
             var status = json.status;
             if(status=='true')
             {
              table =$('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              var button =   '<td><a href="javascript:void();" data-id="' +id + '" class="btn btn-info btn-sm editbtn">Edit</a>  <a href="#!"  data-id="' +id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='"+trid+"']");
              row.row("[id='" + trid + "']").data([id,username,email,mobile,city,button]);
              $('#exampleModal').modal('hide');
            }
            else
            {
              alert('failed');
            }
          }
        });
       }
       else {
        alert('Fill all the required fields');
      }
    });

    $('#example').on('click','.editbtn ',function(event){
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
     // console.log(selectedRow);
     var id = $(this).data('id');
     $('#exampleModal').modal('show');

     $.ajax({
      url:"get_single_data.php",
      data:{id:id},
      type:'post',
      success:function(data)
      {
       var json = JSON.parse(data);
       $('#nameField').val(json.username);
       $('#emailField').val(json.email);
       $('#mobileField').val(json.mobile);
       $('#cityField').val(json.city);
       $('#id').val(id);
       $('#trid').val(trid);
     }
   })
   });

    $(document).on('click','.deleteBtn',function(event){
       var table = $('#example').DataTable();
      event.preventDefault();
      var playerID = $(this).data('id');
      if(confirm("Are you sure want to delete this User ? "))
      {
      $.ajax({
        url:"delete_user.php",
        data:{playerID:playerID},
        type:"post",
        success:function(data)
        {
          var json = JSON.parse(data);
          status = json.status;
          if(status=='success')
          {
            //table.fnDeleteRow( table.$('#' + id)[0] );
             //$("#example tbody").find(id).remove();
             //table.row($(this).closest("tr")) .remove();
             $("#"+id).closest('tr').remove();
          }
          else
          {
            alert('Failed');
            return;
          }
        }
      });
      }
      else
      {
        return null;
      }

      $('#example').DataTable().ajax.reload(); 


    })

    
 </script>
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="updateUser" >
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="trid" id="trid" value="">
          <div class="mb-3 row">
            <label for="nameField" class="col-md-3 form-label">Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="nameField" name="name" >
            </div>
          </div>
          <div class="mb-3 row">
            <label for="emailField" class="col-md-3 form-label">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" id="emailField" name="email">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="mobileField" class="col-md-3 form-label">Mobile</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="mobileField" name="mobile">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="cityField" class="col-md-3 form-label">City</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="cityField" name="City">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Add user Modal -->
<div class="modal fade" id="addPlayerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Player</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addUser" action="">
          <div class="mb-3 row">
            <label for="playerName" class="col-md-3 form-label">Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="playerName" name="name" >
            </div>
          </div>
          
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
