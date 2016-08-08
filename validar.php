<?php
	session_start();
	$usuario=$_REQUEST['user'];
	$password=$_REQUEST['password'];
	
	include 'confi.php';
	     $response= new stdClass();
         $clientes="SELECT * from usuarios where usuario='$usuario' and password='$password'";
         $consulta=mysql_query($clientes);
         $num= mysql_num_rows($consulta);

         if($num>0){
         	
         	 $_SESSION["id_empresa"] =$id_empresa=utf8_encode(mysql_result($consulta,0,"id_empresa"));
			 $_SESSION["usuario"] = $user=utf8_encode(mysql_result($consulta,0,"usuario"));
         	 $response->validacion="true";
			  }else{
			 $response->validacion="false";

			  }
    
			  echo json_encode($response);




     	

    
    ?>