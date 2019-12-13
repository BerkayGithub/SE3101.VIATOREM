<?php
error_reporting(0);
session_start();


include('connection.php');


if($connection -> connect_error){
	die("Connection failed: " .$connection -> connect_error);
}

//$userid= $_SESSION["ID"];

/*$query = "SELECT * FROM Users WHERE UserID=".$_SESSION["ID"];
$sql = $connection ->query($query);

$officer= "SELECT * FROM Users WHERE userType='officer'";
$officer_query= $connection ->query($officer);

if($officer_query-> num_rows>0){
	    
	    $row2 = $officer_query ->fetch_assoc();
		$officer_email= $row2["emaill"];
	
		$name_officer= $row2["name"];
		$officer_id= $row2["UserID"];
	
	
}
if($sql -> num_rows>0){
	    $row = $sql ->fetch_assoc();
		$messages= "SELECT * FROM message WHERE FromID='$officer_id', ToID=".$row["UserID"];
		$sql_messages= $connection ->query($messages);
		while($row3 = $sql_messages->fetch_assoc()){
			echo '<p style="border-style:solid; border-width:1px;">FROM:'.$name_officer.' '.$officer_email.' <br> Message: '.$row3['Content'].'<br></p>';
		
	
		}


} */
//$userID = $_SESSION["ID"];

$userID = 1;
$query = mysqli_query($connection, "SELECT * FROM Message WHERE ToID=".$userID);
if($query){
	while($row = mysqli_fetch_array($query)){
		echo '<p style="border-style:solid; border-width:1px;">FROM: <br> Content: '.$row['Content'].'<br></p>';
	}
}

$messages= mysqli_query($connection, "SELECT * From message WHERE ToID='$userID'");





?>