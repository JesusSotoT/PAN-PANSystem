<?php
$host="sql157.main-hosting.eu";
$user="u770524618_admin";
$password="F:Py7^WG|f+Tg[9Dy&";
$db="u770524618_panp";
$con = new mysqli($host,$user,$password,$db);
$conn = mysqli_connect($host,$user,$password,$db);

if(mysqli_connect_errno()){
	echo 'Error, no se pudo conectar a la base de datos: '.mysqli_connect_error();
}   

?>