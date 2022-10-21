<style>
.nav ul {
  list-style:none;
  text-align:center;
  padding:0;
  margin:0;
}
.nav li {
  display: inline-block;
}
.nav a {
  text-decoration:none;
  color:#fff;
  width: 180px;
  display: block;
  padding-top:8px;
  padding-bottom:8px;
  transition: 0.4s;
}
.nav a:hover {
  background:yellow;
  transition:0.6s;
  color:black;
}
.active, .btn:hover {
  background-color: darkgrey;
  color: white;
}

.navbar {
  background: #293E6A;
}
</style>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
 

<nav class="navbar navbar-expand-md text-white mt-5">              
      <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="nav">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="" class="btn active">Refresh Page</a></li>  
                <li><a href="game.php">Game Time</a></li>
                <li><a>Player Stat</a></li> 
                <li><button type="button" " class="btn btn-outline-danger admin_schedule btn-xs">Add New Schedule</button> </li> 
              </ul>
          </div>
      </div>
  </nav>

