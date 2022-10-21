<!DOCTYPE html>
<?php
session_start();
ob_start();
?>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script> -->

<!-- <script src="http://parsleyjs.org/dist/parsley.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script> -->
 
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">


  
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script> -->

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> 

<!-- <script defer src="https://use.fontawesome.com/releases/v5.15.1/js/solid.js" integrity="sha384-oKbh94nlFq571cjny1jaIBlQwzTJW4KYExGYjslYSoG/J/w68zUI+KHPRveXB6EY" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.1/js/regular.js" integrity="sha384-i9Vys31h0tPXNeAe12HKp4zkBi0S3LAH4OGYRSWKSrdnPYTS4pQgCc/HakrenJBh" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.1/js/brands.js" integrity="sha384-GUtlu2Qit8cdodM5DbKnbDIWFJA8nWCVEwETZXY2xvKV1TFLtD/AL+bCOsPyh05M" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.1/js/fontawesome.js" integrity="sha384-v0OPwyxrMWxEgAVlmUqvjeEr48Eh/SOZ2DRtVYJCx1ZNDfWBfNMWUjwUwBCJgfO4" crossorigin="anonymous"></script>
<script src="https://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script> -->

<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/solid.css" integrity="sha384-yo370P8tRI3EbMVcDU+ziwsS/s62yNv3tgdMqDSsRSILohhnOrDNl142Df8wuHA+" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/regular.css" integrity="sha384-APzfePYec2VC7jyJSpgbPrqGZ365g49SgeW+7abV1GaUnDwW7dQIYFc+EuAuIx0c" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/fontawesome.css" integrity="sha384-ijEtygNrZDKunAWYDdV3wAZWvTHSrGhdUfImfngIba35nhQ03lSNgfTJAKaGFjk2" crossorigin="anonymous">
<link href="http://ee.nsysu.edu.tw/key/bootstrap/css/bootstrap-clockpicker.min.css" rel="stylesheet"/> -->
<!-- This library creates alignment issue, might need to fix later -->
<!-- <link rel="stylesheet" href="./styles/style.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script> -->

    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



</head>

    
<style>
  body
  {
   margin:0;
   padding:0;
   /*  Web background--beige */
   background: #EEEEEE;
  }
/* add background-color to active links--Navy Blue */
.navbar-fixed-top, .navbar-collapse, .nav {
   /* Navbar */
    background-color: #293E6A !important;
}

ul a {
color: #C0C0C0;
}

h3 {
  padding-top: 50px;
}

/* change the brand and text color--Gold #B6A754, now silver #C0C0C0 */
.navbar-fixed-top .navbar-brand,
.navbar-nav .nav-link,
.nav-item .btn {
    color: #C0C0C0 !important;  
}
/* Card title--Navy Blue */
.card-title.custom {
  background: #293E6A;
}
/* Card title text--Gold */
.card-title .text-center.custom,
.card-body {
  color: #C0C0C0;
}
/* Card body--Navy Blue*/
.card-body.custom {
  background: #293E6A;
}
/* Card body strip--Gold */
.card.custom {
  background: #C0C0C0;
}
.box
{
  width:1200px;
  padding:20px;
  background-color:#fff;
  border:1px solid #ccc;
  border-radius:5px;
  margin-top:25px;
  box-sizing:border-box;
}
table.dataTable thead .none.sorting:after {
  display: none;
  input.parsley-success,
select.parsley-success,
textarea.parsley-success {
  color: #468847;
  background-color: #DFF0D8;
  border: 1px solid #D6E9C6;
}

 input.parsley-error,
 select.parsley-error,
 textarea.parsley-error {
   color: #B94A48;
   background-color: #F2DEDE;
   border: 1px solid #EED3D7;
 }

 .parsley-errors-list {
   margin: 2px 0 3px;
   padding: 0;
   list-style-type: none;
   font-size: 0.9em;
   line-height: 0.9em;
   opacity: 0;

   transition: all .3s ease-in;
   -o-transition: all .3s ease-in;
   -moz-transition: all .3s ease-in;
   -webkit-transition: all .3s ease-in;
 }

 .parsley-errors-list.filled {
   opacity: 1;
 }
 
 .parsley-type, .parsley-required, .parsley-equalto{
  color:#ff0000;
 }

 input.parsley-error,
 select.parsley-error,
 textarea.parsley-error {
   color: #B94A48;
   background-color: #F2DEDE;
   border: 1px solid #EED3D7;
 }

 .parsley-errors-list {
   margin: 2px 0 3px;
   padding: 0;
   list-style-type: none;
   font-size: 0.7em;
   color: #B94A48;
   line-height: 0.9em;
   opacity: 0;

   transition: all .3s ease-in;
   -o-transition: all .3s ease-in;
   -moz-transition: all .3s ease-in;
   -webkit-transition: all .3s ease-in;
 }

 .parsley-errors-list.filled {
   opacity: 1;
 }
 
 .parsley-type, .parsley-required, .parsley-equalto{
     color:#ff0000;
 }

 .data-parsley-pattern-message, .data-parsley-regex-message, .data-parsley-checkemail-message{
  font-size: 0.7em;
  color: #B94A48;
 }
}
.btn-group-xs > .btn, .btn-xs {
  padding: .38rem .18rem;
  font-size: .875rem;
  line-height: .5;
  border-radius: .2rem;
  font-size:10px
}


</style>

<!DOCTYPE html>
<html lang="en">

<html>   
<body> 
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
      <a class="navbar-brand" href="#">&nbsp;&nbsp;&nbsp;Team Titan Statistic </a>
  <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->
      <!-- <a href="login.php" class="navbar-brand"><h3>Team Titan Statistic</h3>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar" type="button" name="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        </a> -->
          <div class="collapse navbar-collapse" id ="Navbar">
          <ul class="nav nav-tabs">
            <li class="<?php if($page=='index') {echo 'active';}?>"><a href="index.php"> Home </a></li>
            <li class="<?php if($page=='game') {echo 'active';}?>"><a href="newGame.php"> Insert Game </a></li>
            <li class="<?php if($page=='stat') {echo 'active';}?>"><a href="statistic.php" > Player Statistic </a></li>
            <li class="<?php if($page=='roaster') {echo 'active';}?>"><a href="roaster.php"> Add Player </a></li>
            <li class="<?php if($page=='addteam') {echo 'active';}?>"><a href="addteam.php"> Add team </a></li>
          </ul>
          </div>
      </div>
    </nav>

