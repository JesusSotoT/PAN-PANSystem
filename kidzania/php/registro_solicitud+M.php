<?php 
include 'conexion.php';

//print_r($_POST['pedido']);
var_dump($_FILES['pedido']);

foreach ($_POST['pedido'] as $key => $values) {

$insert = mysqli_query($conn,"INSERT INTO orden_pedido(id, fecha_solicitud, fecha_entrega, medida_tamano, no_personas,  nombre_cliente, sabor, diseno, estatus_pedido) VALUES ('".$values['id']."','".$values['fecha_solicitud']."', '".$values['fecha_entrega']."', '".$values['medidas_pastel']."', '".$values['no_personas']."', '".$values['nombre_cliente']."', '".$values['sabor_pastel']."', '".$values['diseno']."', '".$values['estatus']."')") or die(mysqli_error());





}

if ($insert) {
	echo "SI SE PUDO SI SE PUDO";
}
else{
	echo "valio Caberna";
}
//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
    foreach($_FILES["pedido"]['imagen'] as $key => $tmp_name)
    {
        //Validamos que el archivo exista
        if($_FILES["pedido"]["name"][$key]) {
            $filename = $_FILES["pedido"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["pedido"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo

            $directorio = 'img_ordenes/'; //Declaramos un  variable con la ruta donde guardaremos los archivos


            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo

            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                } else {    
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos el directorio de destino


        }

        if ($_FILES) {
	echo "SI SE PUDO SI SE PUDO";
}
else{
	echo "valio Caberna";
}
    }



 ?>