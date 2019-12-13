<?php include("config_messageBox.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Message Box</title>
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
  background-color: blue;
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
	
input[type=email] {
  width: 250px;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 15px;
}
#form1 {
  border-radius: 5px;
  display: inline-block;
  background-color: #f2f2f2;
  padding: 20px;
  margin: 70px 0;
  border: 2px solid black;
  width: 40%;

}
#submit {
  background-color: black ;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
  font-size:15px;
}
#submit:hover{
	background-color: #49264B;
}
</style>
</head>
<body>

<h1>Welcome to user page</h1>

<ul>
  <li><a class="active" href="">FeedBack</a></li>
  <li><a href="Base_contactUs.php">Contact Us</a></li>
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
    <a href="Base_contactUs.php">Message Box</a>
    <a>Logout</a>
  </div>
</div>
	<br>
	<br>
<h2>Messages:</h2>
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
	
	
--> <?php
error_reporting(0);
session_start();


include('connection.php');


if($connection -> connect_error){
	die("Connection failed: " .$connection -> connect_error);
}
$userid= $_SESSION["ID"];
	echo "canın cehenneme php".$_SESSION["ID"];
	
$query = "SELECT * FROM Users WHERE UserID=".$_SESSION["ID"];
$sql = $connection ->query($query);

$officer= "SELECT emaill FROM Users WHERE userType='officer'";
$officer_query= $connection ->query($officer);

if($officer_query-> num_rows>0){
	    
	    $row2 = $officer_query ->fetch_assoc();
		$officer_email= $row2["emaill"];
		$name_officer= $row2["name"];
		$officer_id= $row2["UserID"];
	
}
if($sql -> num_rows>0){
	    $row = $sql ->fetch_assoc();
		$messages= "SELECT * FROM message WHERE FromID='$officer_id', ToID=".$row[UserID];
		$sql_messages= $connection ->query($messages);
		while($row3 = $sql_messages->fetch_assoc()){
			echo '<p style="border-style:solid; border-width:1px;">FROM:'.$name_officer.' '.$officer_email.' <br> Message: '.$row3['Content'].'<br></p>';
		
	
		}
} 
/*$officer= "SELECT emaill FROM Users WHERE userType='officer'";
	$sql = $connection ->query($query);
	if($sql){
	    $row_officer = mysqli_fetch_array($sql);
	  
		$officer_email= $row_officer["emaill"];
		echo "officer email".$officer_email;
	//	$name_officer= $row2["name"];
		$officer_id= $row_officer["UserID"];
		echo "officer id".$officer_id;
	
}
	$query = mysqli_query($connection, "SELECT Content FROM message");

if($query){
	while($row = mysqli_fetch_array($query)){
		$query2 = mysqli_query($connection,"SELECT * FROM message WHERE ToID=''$userid', FromID='$officer_id'");
		while($row2 = mysqli_fetch_array($query2)){
			echo '<p style="border-style:solid; border-width:1px;">FROM:'.$officer_email.' <br> Message: '.$row['Content'].'<br></p>';	
		}
	}
} */
?>	</--!>
	
	
	

</body>
</html>