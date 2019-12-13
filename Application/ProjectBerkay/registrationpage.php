<?php
error_reporting(0);
session_start();


include('connection.php');
/*$servername= "localhost";
$username ="root";
$password ="12345";
$db_name="viatorem";

//Create connection

$connection= new mysqli($servername,$username,$password,$db_name);
$new=  mysqli_set_charset($connection,"utf8"); */
if($connection -> connect_error){
	die("Connection failed: " .$connection -> connect_error);
}

if($_POST){
	$name = $_POST['name'];
    $surname = $_POST['surname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $phonenmb=$_POST['phonenmb'];
    $birthdate=$_POST['birthdate'];
	
	$password= md5($password);
	
	
	//$hash = password_hash($password, PASSWORD_DEFAULT);
	
	if((!empty($email)) &&  (!empty($name)) && (!empty($surname)) && (!empty($password))){
	
		$registration = "INSERT INTO users(emaill,pwd,name,surname,userType,birtDate,gender,phoneNumber) 
                         VALUES ('$email','$password','$name','$surname','registered','$birthdate','$gender','$phonenmb')";
	} else{
		echo "<center>"."Email address, name, surname and password are required.";
	}

	
	//$sql = $connection ->query($registration);
	$result=mysqli_query($connection,$registration);
	/*if($sql -> num_rows>0){
		while($row = $sql ->fetch_assoc()){
			$_SESSION["ID"]= $row=["UserID"];
			
			header("location: loginpage.php");
			 
			
		}
	} */
	header("location: loginpage.php");
}

?>