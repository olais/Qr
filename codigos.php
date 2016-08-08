<html>
<title>Genera Codigo</title>
<head>  
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
    	<script type="text/javascript" src="js/JsBarcode.all.js"></script>
    	<link rel="stylesheet" type="text/css" media="print" title="Vista impresión" href="css/impresion.css" />
		<script type="text/javascript">
			
			window.print();
		</script>
<script type="text/javascript">
$(document).ready(function(){
	 var idFolio= sessionStorage.getItem("folio");
	 nuevo=parseInt(idFolio)+1;
	 sessionStorage.setItem("folio",nuevo);
	<?php

	$cantidad=$_REQUEST['cantidad'];


		foreach ($cantidad as $key => $value) {
			for ($j=0; $j < $value; $j++) { 
		echo "JsBarcode('#barcode$key$j', '$key');";
	       }
		
		}
	
?>
    

});
</script>

</head>
<body>



<?php

	//echo $resumen=$_REQUEST['datos_a_enviar'];
	

	$cantidad=$_REQUEST['cantidad'];
	$descripcion=$_REQUEST['descripcion'];
	$sku=$_REQUEST['sku'];
	$cliente=$_REQUEST['cliente'];
	$folio=$_REQUEST['foli'];
	$Descuento=$_REQUEST['descuento'];
	$descGlobal=$_REQUEST['descGlobal'];
	include 'confi.php';

	//para el resumen 




//fin de resumen
         $clientes="SELECT * from Clientes where id_cliente=$cliente";
         $consulta=mysql_query($clientes);
         $num= mysql_num_rows($consulta);
     	 $Direccion=utf8_encode(mysql_result($consulta,0,"Direccion"));

     	

	foreach ($cantidad as $key => $value) {
		 $articulos="SELECT * from articulos where Codigo='$key'";
			         $consultaArt=mysql_query($articulos);
			         $num= mysql_num_rows($consultaArt);
			     	 $precio=utf8_encode(mysql_result($consultaArt,0,"Importe"));

			     	 $Subtotal=$value*$precio;
		

			for ($i=0; $i <$value; $i++) { 
					 $articulos="SELECT * from articulos where Codigo='$key'";
			         $consultaArt=mysql_query($articulos);
			         $num= mysql_num_rows($consultaArt);
			     	 $descripcion=utf8_encode(mysql_result($consultaArt,0,"Descripcion"));

			

			echo date("d-m-Y h:i:s");
			echo "&nbsp;&nbsp;Pedido: $folio<br>";
			echo "<img id='barcode$key$i' class='codigo'><div id='dir'> Dirección: $Direccion </div>
			<div id='desc'>Articulo: $descripcion</div><br><br><br><br><br><br><br><br>";
		}
	}
  
	$clientes="SELECT * from Clientes where id_cliente=$cliente";
         $consulta=mysql_query($clientes);
         $num= mysql_num_rows($consulta);
     	 $Direccion=utf8_encode(mysql_result($consulta,0,"Direccion"));
     	 echo "<br><hr style='border:1px dotted red; width:100%' />Pedido: $folio&nbsp;&nbsp;";
     	 echo date("d-m-Y h:i:s");
     	 echo "<table border='1' id='impt'><tr><td>Sku</td><td>Cantidad</td><td>Precio</td><td>Descuento</td><td>Subtotal</td></tr>";
     	 $totall=0;
foreach ($Descuento as $k => $desc) {
	foreach ($cantidad as $key => $value) {
		 $articulos="SELECT * from articulos where Codigo='$key'";
			         $consultaArt=mysql_query($articulos);
			         $num= mysql_num_rows($consultaArt);
			     	 $precio=utf8_encode(mysql_result($consultaArt,0,"Importe"));

	 $Subtotal=$value*$precio;


	 $descuentoTo=($desc*$Subtotal)/100;
	 $total=$Subtotal-$descuentoTo;
			   
			     	 if($k==$key){
			     	 	$totall+=$total;
		 echo "<tr><td>$key</td><td>$value</td><td>$$precio</td><td>$$descuentoTo</td><td>$$total</td></tr>";
			     	 	}
		
		 					}

			
	}
     echo "</table>";
     echo "<br><br>";
     if(isset($descGlobal) && $descGlobal !=""){

     	$valorCon=($descGlobal*$totall)/100;
     	$totall=$totall-$valorCon;
     	echo "DescuentoGlobal: ".$descGlobal."%<br>";
     	echo "Total: $".$totall;

     }else{
     	 echo "Total: $".$totall;
     }
    

?>

<meta http-equiv="Refresh" content="0;index.php">

</body>
</html>
