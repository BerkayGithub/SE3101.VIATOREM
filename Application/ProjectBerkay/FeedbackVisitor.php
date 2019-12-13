
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


<div style="margin:50px 150px 50px;">
<?php 

$user = 'root';
$pass = '';
$dbc = 'viatorem_database';

$dbc = new mysqli('localhost',$user,$pass,$dbc) or die("Unable to connect to database");

$query = mysqli_query($dbc, "SELECT UserID,Content FROM FeedBack");

if($query){
	while($row = mysqli_fetch_array($query)){
		$query2 = mysqli_query($dbc,"SELECT emaill FROM users WHERE UserID=".$row['UserID']);
		while($row2 = mysqli_fetch_array($query2)){
			echo '<p style="border-style:solid; border-width:1px;">FROM:'.$row2['emaill'].' <br> Comment: '.$row['Content'].'<br></p>';	
		}
	}
}else {	
	echo "Couldn't issue database query";
	echo mysqli_error($dbc);
}

mysqli_close($dbc);

?>
<label style="border-style:solid; border-width:1px;">You need to be <a href="loginpage.php" target="_top">logged!</a> in for writing FeedBack.</label>
</div>


</body>
</html>