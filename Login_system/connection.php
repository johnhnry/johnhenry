<?php  

$server = "localhost";
$username = "root";
$password = "";
$database_name = "user";

$db = mysqli_connect($server, $username, $password, $database_name);

if($db == false){
	die("Error: connection error." .mysqli_connect_error());
}
?>