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
  background-color: #808080;
  color: white;
}

.dropbtn {
  background-color: black;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  opacity:0.8;
}

.dropdown {
  float: right;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>
</head>
<body>

<h1>Welcome to user page</h1>

<ul>
  <li><a class="active" href="">FeedBack</a></li>
  <li><a href="">Contact Us</a></li>
  <li><a href="">Help</a></li>
  <li><a href="">Campaigns</a></li>
  <li><a href="">View Ticket Detail</a></li>
  <li><a href="">View Trip</a></li>
  <li style="float:left"><a href="">VIATOREM</a></li>
</ul>

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Username</button>
  <div id="myDropdown" class="dropdown-content">
    <a>Edit Profile</a>
    <a>View My All Ticket</a>
    <a>Message Box</a>
    <a>Logout</a>
  </div>
</div>
<br>
<br>
<br>
<br>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

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

if(isset($_POST["comment"])){
	$comment = $_POST["comment"];
}

if($_POST){
	if(!$comment){
		echo 'Missing Information';
	}else{
		$ekle=mysqli_query($dbc,"INSERT INTO feedback SET UserID = '1', Content = '$comment' ");
		if($ekle){
			header("location: FeedBackRegUser.php");
		}else{
			echo "Olmadı";
		}
	}
}



mysqli_close($dbc);

?>

<form action="" method="POST">
	<input type="text" id="comment" name="comment" placeholder="Enter comment" required>
	<input type="submit" value="Send" /><br>
</form>
</div>


</body>
</html>