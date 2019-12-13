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
			//$_SESSION["ID"]= $row=["UserID"];
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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>
<style>
	body {font-family: Arial, Helvetica, sans-serif;}


.error {color: #FF0000;}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 15px;
}
input[type=password]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
 font-size: 15px;
}
	input[type=email]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
 font-size: 15px;
}


#submit {
  background-color: black ;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  font-size:15px;
}

#submit:hover {
  opacity: 0.7;
}

#form1 {
  border-radius: 5px;
  display: inline-block;
  background-color: #f2f2f2;
  padding: 20px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
	
</style>
<body>

	<center><h1>Login To The Viatorem</h1></center>
	
	<center>	
<form id="form1" name="form1" action="login.php" method="post">
<table align="center">
    <tbody>
      <tr>
        <td>Email Address:</td>
        <td ><input type="email" name="email" id="email" placeholder="Enter your e-mail address" required ></td>
		  
      </tr>
      <tr>
        <td>Password:</td>
        <td><input type="password" name="password" id="password" placeholder="Enter your password" required></td>
		 
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" value="Login"></td>
      </tr>
    </tbody>
  </table>
	<span class="psw"> <a href="enter_email.php">Forgot password?</a> </span>
    <input type="checkbox" onclick="myFunction()">Show Password
</form><center><a href="registration.php"><br>
  REGISTRATION</a></center>
	</center>
	
	<script>
		function myFunction() {
			var x = document.getElementById("password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		} 
	</script>
</body>
</html>