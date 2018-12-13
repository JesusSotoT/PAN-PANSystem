<?php

 include "conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id',
    1 => 'fecha_solicitud', 
	2 => 'fecha_entrega',
    3 => 'medida_tamano',
    4 => 'no_personas',
    5 => 'calidad',
    6 => 'nombre_cliente',
    7 => 'sabor',
    8 => 'diseno',
    9 => 'estatus_pedido' 
);

// getting total number records without any search
$sql = "SELECT a.id , a.fecha_solicitud , a.fecha_entrega , b.sabor, a.diseno, a.nombre_cliente  ";
$sql.=" FROM orden_pedido a LEFT JOIN sabores b on b.id = a.sabor WHERE a.estatus_pedido = 1 ";
$query=mysqli_query($conn, $sql) or die("por_pagar-ajax-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT a.id , a.fecha_solicitud , a.fecha_entrega , b.sabor , a.diseno , a.nombre_cliente  ";
	$sql.=" FROM orden_pedido a LEFT JOIN sabores b on b.id = a.sabor WHERE a.estatus_pedido = 1 ";
	$sql.=" WHERE id_cliente LIKE '".$requestData['search']['value']."%' ";
	$sql.=" WHERE id LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
    $sql.=" OR fecha_fin LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conn, $sql) or die("360-ajax-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conn, $sql) or die("por_pagar-ajax-data.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT a.id , a.fecha_solicitud , a.fecha_entrega , b.sabor, a.diseno, a.nombre_cliente ";
	$sql.=" FROM orden_pedido a LEFT JOIN sabores b on b.id = a.sabor WHERE a.estatus_pedido = 1 ";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conn, $sql) or die("por_pagar-ajax-data.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] =  '<a href="verSolicitud.php?id='.$row['id'].'" title="Ver Solicitud" class="btn btn-info">'.$row["id"].'</a>';
    $nestedData[] = $row["nombre_cliente"];
    $nestedData[] = $row["fecha_solicitud"];
    $nestedData[] = $row["fecha_entrega"];
     $nestedData[] = $row["sabor"];
     $nestedData[] = $row["diseno"];
      $nestedData[] = "En Proceso";
     
	
	$data[] = $nestedData;
    
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
