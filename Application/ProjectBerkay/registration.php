<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTRATION</title>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}


.error {color: #FF0000;}
input[type=text] {
  width: 200%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 15px;
}
input[type=password]{
  width: 200%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
 font-size: 15px;
}

input[type=date] {
  width: 200%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid black;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 15px;
}
input[type=email] {
  width: 200%;
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
 border: 2px solid black;
	width: 50%;

	}
	

</style>
<body>
<center><h1>REGISTRATION</h1></center>
	<center>
<form id="form1" name="form1" action="registrationpage.php" method="post">
  <table  align="center">
    <tbody>
      <tr>
        <td >Name:</td>
        <td ><input type="text" name="name" id="name" required></td>
      </tr>
      <tr>
        <td>Surname:</td>
        <td><input type="text" name="surname" id="surname" required></td>
	  </tr>
	  <tr>
        <td >Email Adress:</td>
        <td ><input type="email" name="email" id="email" placeholder="Enter an email address in the correct form" required></td>
      </tr>
      <tr>
        <td >Password:</td>
        <td ><input type="password" name="password" id="password" required></td>
      </tr>
	  <tr>
        <td >Gender:</td>
        <td ><input type="text" name="gender" id="gender" placeholder="Enter 'M' for male or 'F' for female"></td>
      </tr>
	  <tr>
        <td >Cellphone Number:</td>
        <td ><input type="text" name="phonenmb" id="phonenmb"></td>
      </tr>

      <tr>
        <td >BirthDate:</td>
        <td ><input type="date" name="birthdate" id="birthdate" placeholder="Enter 'YYYY-MM-DD' format"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" value="SIGN UP"></td>
      </tr>
    </tbody>
  </table>
	<input " type="checkbox" onclick="myFunction()" >Show Password
</form>
		</center>
	<center>
	  <p>&nbsp;</p>
	  <p><a href="loginpage.php">Have Already An Account?</a></p>
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
