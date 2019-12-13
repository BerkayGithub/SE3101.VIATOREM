<?php
error_reporting(0);
session_start();

include('connection.php');

if($_POST){
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
		
	$login= "SELECT * FROM Users WHERE emaill='$email' and pwd='$password'";
	$sql = $connection ->query($login);
	if($sql -> num_rows>0){
		while($row = $sql ->fetch_assoc()){
			$_SESSION["email"]= $row=["emaill"];
			$_SESSION["userType"]= $row["userType"];
		    if($_SESSION["userType"] == "admin"){
					
			header("location: yeniadminpage.php");
			} else if($_SESSION["userType"] == "officer"){
					header("location: officerhomepage.php");
				} else if($_SESSION["userType"] == "registered"){
					header("location: Registered.php");
				}
			
		}
	}
}
?>










