<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: black;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  opacity:0.5;
}
</style>
</head>

<body>

<ul>
  <li><a class="active" href="">FeedBack</a></li>
  <li><a href="">Contact Us</a></li>
  <li><a href="">Help</a></li>
  <li><a href="">Campaigns</a></li>
  <li><a href="">View Ticket Detail</a></li>
  <li><a href="">View Trip</a></li>
  <li style="float:left"><a href="">VIATOREM</a></li>
</ul>
<ul>
  <li><a class="active" href="">Registration</a></li>
  <li><a href="">Login</a></li>
</ul>

<h1>Campaigns</h1>
<div style="margin:50px 150px 50px;">
<?php
$user = 'root';
$pass = '';
$dbc = 'viatorem_database';

$dbc = new mysqli('localhost',$user,$pass,$dbc) or die("Unable to connect to database");

$currentDate = date('Y-m-d');
//We use CAST for time comparison
$query = mysqli_query($dbc,"SELECT * FROM campaign WHERE EndDate > CAST($currentDate as TIME)");
if($query){
	while($row = mysqli_fetch_array($query)){
		$edDate = date("d/m/Y",strtotime($row['EndDate']));
		echo '<p style="border-style:solid;border-width:1px;">Campaign Description: <br>'.$row['Content'].'<br>EndDate : '.$edDate.'</p>';
	}
}

mysqli_close($dbc);
?>

<p>You need to <a href="loginpage.php" target="_top">Sign in</a> in order to take advantage of the campaigns!</p>
</div>

</body>
</html>