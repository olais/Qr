<?php
session_start();
include 'confi.php';

$repuesta = array();
$response = new stdClass();

		$id_empresa=$_SESSION["id_empresa"];

         $clientes="SELECT * from clientes where id_empresa=$id_empresa";
         $consulta=mysql_query($clientes);
         $num= mysql_num_rows($consulta);
     

      if ( $num >0) {
		
		for($i=0;$i<$num;$i++){
		
				$id_cliente=mysql_result($consulta,$i,"id_cliente");
				$nombre=mysql_result($consulta,$i,"Nombre");
				
			    $rows[] = array(
			    "id_cliente"=>$id_cliente,
			    "nombre"=>utf8_encode($nombre)
			  	 
		          );
		        $response->rows = $rows;
				
			}
 }
echo json_encode ($response);




?>