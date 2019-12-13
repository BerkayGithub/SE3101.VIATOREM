<?php 

/* 
Veritabani baglantimizi yapiyoruz
*/

$servername= "localhost";
$username ="root";
$password ="";
$db_name="viatorem_database2";

$connection= new mysqli($servername,$username,$password,$db_name);
$new=  mysqli_set_charset($connection,"utf8");


if($connection -> connect_error){
	die("Connection failed: " .$connection -> connect_error);
}


?>