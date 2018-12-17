<?php
include "conexion.php";
foreach ($_POST['usuario'] as $key => $values) {

$insert = mysqli_query($conn,"INSERT INTO prueba(nombre, no_fase, dias_duracion, precio) VALUES ('".$values['nombre']."','".$values['nofase']."','".$values['diasdu']."','".$values['presio']."')") or die(mysqli_error());
}

if ($insert) {
	echo "SI SE PUDO SI SE PUDO";
}
else{
	echo "valio Caberna";
}
?>