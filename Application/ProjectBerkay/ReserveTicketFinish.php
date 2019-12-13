<!DOCTYPE html>
<html>
<head>
<style>
.btn {
  
  border-width: 1px;
  border-style: solid;
  color: black;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}

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

<?php

$user = 'root';
$pass = '';
$dbc = 'viatorem_database2';
$dbc = new mysqli('localhost',$user,$pass,$dbc) or die("Unable to connect to database");

if(isset($_POST['Seat'])){
	$seatNum = $_POST['Seat'];
}

if($_POST){
	if(!$seatNum){
		echo "Select Seat";
	}else{
		$ekle = mysqli_query($dbc,"INSERT INTO Reservation SET TripID = '2', UserID = '2', SeatNumber = '$seatNum' ");
		if($ekle){
			$query = mysqli_query($dbc,"SELECT * FROM Trip WHERE TripID = '2'");
			if($query){
				while($row = mysqli_fetch_array($query)){
					echo '<span>
					<label style="border-style:solid;border-width:1px;">Reservation Detail:</label>
					<span style="border-style:solid;border-width:1px;padding:5px;">
					<label style="border-style:solid;border-width:1px;margin:10px;">'.$row['TripTime'].'</label>
					<label style="border-style:solid;border-width:1px;margin:10px;">'.$row['StartLocation'].'</label>
					<label style="border-style:solid;border-width:1px;margin:10px;">'.$row['Price'].'</label>
					<label style="border-style:solid;border-width:1px;margin:10px;">'.$row['TripDate'].'</label>
					</span>
					</span>';
				}
			}else {	
				echo "Couldn't issue database query";
				echo mysqli_error($dbc);
			}
		}else{
			echo "Olmadı";
		}
	}
}

mysqli_close($dbc);
?>

</body>
</html>
