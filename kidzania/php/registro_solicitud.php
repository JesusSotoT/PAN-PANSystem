<?php 
include 'conexion.php';


			    // Recibo los datos de la imagen
				$nombre_img = $_FILES['imagen']['name'];
				$tipo = $_FILES['imagen']['type'];
				$tamano = $_FILES['imagen']['size'];
//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 2000000000)) 
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {
      // Ruta donde se guardarán las imágenes que subamos
      $directorio = "img_ordenes/";
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    } 
    else 
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
} 

if(isset($_POST['registro'])){
	//recibo los datos de texto y selects
				$fechaHoy = date("Y-m-d H:i:s");
				$fechaEntrega = mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_entrega'],ENT_QUOTES)));
				$nombreCliente = mysqli_real_escape_string($conn,(strip_tags($_POST['nombre_cliente'],ENT_QUOTES)));
			    $saborPastel = mysqli_real_escape_string($conn,(strip_tags($_POST['sabor_pastel'],ENT_QUOTES)));
			    $medidasPastel = mysqli_real_escape_string($conn,(strip_tags($_POST['medidas_pastel'],ENT_QUOTES)));
			    $observaciones = mysqli_real_escape_string($conn,(strip_tags($_POST['observaciones'],ENT_QUOTES)));
			    $noPersonas = mysqli_real_escape_string($conn,(strip_tags($_POST['no_personas'],ENT_QUOTES)));
			    $diseno = mysqli_real_escape_string($conn,(strip_tags($_POST['diseno'],ENT_QUOTES)));


		
				$insert = mysqli_query($conn, "INSERT INTO orden_pedido(id, fecha_solicitud, fecha_entrega, medida_tamano, no_personas, calidad, nombre_cliente, sabor, diseno, url, observaciones, tecnica, estatus_pedido)

					VALUES(NULL,'$fechaHoy', '$fechaEntrega', '$medidasPastel', '$noPersonas', '1', '$nombreCliente', '$saborPastel' , '$diseno', '$nombre_img', '$observaciones', '0' , '1' )") or die(mysqli_error());



						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
						}
				
			}
header("Location: ../home2-user.php");
 ?>