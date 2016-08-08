<?php
session_start();
include 'confi.php';

$repuesta = array();
$response = new stdClass();

	$cat=$_REQUEST['cat'];
	$id_empresa=$_SESSION["id_empresa"];

         $clientes="SELECT * from articulos WHERE Categoria='$cat' and id_empresa=$id_empresa";
         $consulta=mysql_query($clientes);
         $num= mysql_num_rows($consulta);
      //var_dump($clientes);

      if ( $num >0) {
		
		for($i=0;$i<$num;$i++){
		
				$codigo=mysql_result($consulta,$i,"Codigo");
				$Descripcion=mysql_result($consulta,$i,"Descripcion");
				$Categoria=mysql_result($consulta,$i,"Categoria");
				
			    $rows[] = array(
			    "Codigo"=>$codigo,
			    "Descripcion"=>$Descripcion,
			    "Categoria"=>utf8_encode($Categoria)
			  	 
		          );
		        $response->rows = $rows;
				
			}
 }
echo json_encode ($response);




?>