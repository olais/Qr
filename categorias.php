<?php
session_start();
include 'confi.php';

$repuesta = array();
$response = new stdClass();
$id_empresa=$_SESSION["id_empresa"];


         $clientes="SELECT * from categorias where id_empresa=$id_empresa";
         $consulta=mysql_query($clientes);
         $num= mysql_num_rows($consulta);
     

      if ( $num >0) {
		
		for($i=0;$i<$num;$i++){
		
				//$id_categoria=mysql_result($consulta,$i,"id_categoria");
				$Categoria=mysql_result($consulta,$i,"Categoria");
				
			    $rows[] = array(
			    
			    "Categoria"=>utf8_encode($Categoria)
			  	 
		          );
		        $response->rows = $rows;
				
			}
 }
echo json_encode ($response);




?>