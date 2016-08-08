<?php
include 'confi.php';

$repuesta = array();
$response = new stdClass();

$articulo=$_REQUEST['articulo'];

         $clientes="SELECT * from articulos where Codigo='$articulo'";
         $consulta=mysql_query($clientes);
         $num= mysql_num_rows($consulta);
     

      if ( $num >0) {
		
		for($i=0;$i<$num;$i++){
		
				$id_articulo=mysql_result($consulta,$i,"id_articulo");
				$Codigo=mysql_result($consulta,$i,"Codigo");
				$Descripcion=mysql_result($consulta,$i,"Descripcion");
				$Descuento=mysql_result($consulta,$i,"Descuento");
				$Importe=mysql_result($consulta,$i,"Importe");
				
			    $rows[] = array(
			    "id_articulo"=>$id_articulo,
			    "Codigo"=>$Codigo,
			  	"Descripcion"=>utf8_encode($Descripcion),
			  	"Descuento"=>$Descuento,
		        "Importe"=>$Importe
		        
		          );
		        $response->rows = $rows;
				
			}
 }
echo json_encode ($response);




?>