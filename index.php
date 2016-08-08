<?php
session_start();
		$id_empresa=$_SESSION["id_empresa"];
		if(isset($_SESSION["id_empresa"])){ ?>

<html>
<title>Genera Codigo</title>
<head>  
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
		<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
		 <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/campos.js"></script>
		<style type="text/css">
		#agregarCampo{
			margin-left: 200px;

		}#pre{
    	width: 100px;
    float: right;
    margin-right: 200px;
    }
		</style>

		<script type="text/javascript">
			
		$(document).ready(function(){

		
	    

		$.post("clientes.php",
			function(data){

				
					for(i=0;i<data.rows.length;i++){
	$("#cliente").append("<option value='"+data.rows[i].id_cliente+"'>"+data.rows[i].nombre+"</option>");
					}

		},'json');

	
		//categorias

		$.post("categorias.php",
			function(data){

					for(i=0;i<data.rows.length;i++){
	  $("#categoria").append("<option value='"+data.rows[i].Categoria+"'>"+data.rows[i].Categoria+"</option>");
					}

		},'json');

		$("#categoria").change(function(){
			var categoria=$(this).val();
				$("#articulo").empty()
				$("#articulo").html("<option>Seleccionar...</option>");
			$.get("articulos.php",'cat='+categoria,
				function(data){
					for(i=0;i<data.rows.length;i++){
$("#articulo").append("<option value='"+data.rows[i].Codigo+"'>"+data.rows[i].Descripcion+"</option>");
						}
				},'json'

				);


		});

        $("#reg").submit(function(){

       //  $("#datos_a_enviar").val( $("<div>").append( $("#campos").eq(0).clone()).html());//tabla

          //   sessionStorage.setItem("tabla",tabla);
   //var resume= sessionStorage.getItem("tabla");
        //	alert(tabla);
        	if( $('#valida').prop('checked') ) {
             window.location='codigos.php?'+$(this).serialize();
            }
     		

     		return false;
         });
        

		});

		</script>
		<style type="text/css">
		.container{

			background-color: #E6E6E6;
			height: auto;
			margin-top: 20px;
		}
		#barra{
			padding-top: 10px;
		}
		#folio{
			width: 100px;
			height: 50px;
			font-size: 14px;
			border-radius: 7px;
			margin-left: 13px;

		}

		</style>
		<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>
</head>
<body>

<div class="container">
<div id="barra">
	

</div>

  <h2>Genera pedido</h2>
  <button type="submit" class="btn btn-primary" id="salir" style="float:right;margin-right: 200px;">Salir</button>
  <form  name="reg" id="reg" method="POST">
  <input type="hidden" name="datos_a_enviar" id="datos_a_enviar">
 <div id="folio">
 <b>Pedido: </b><input type="text" name="foli" id="foli" size="8" required>
 </div>
    <div class="col-xs-3">
  <label for="cliente">Cliente:</label>
  <select class="form-control" id="cliente" name="cliente" required>
    <option>seleccionar...</option>
   
  </select>
</div>
  <div class="col-xs-3">
  <label for="categoria">Categoría:</label>
  <select class="form-control" id="categoria" name="categoria">
    <option>seleccionar...</option>
  
  </select>
</div>
    <div class="col-xs-3">
  <label for="articulo">Artículo:</label>
  <select class="form-control" id="articulo" name="articulo">
    <option>seleccionar...</option>
  
  </select>
</div>
 <br>
 <button type="submit" class="btn btn-primary">Realiza pedido</button>
<br><br>
<div class="checkbox">
  <label><input type="checkbox" value="1" id="valida" required>Ingresar</label>
</div>
   <div class="col-xs-2" >
  <label for="descGlobal">Descuento Global: </label>
  <input class="form-control" id="descGlobal" name='descGlobal' type="text">
</div>

<br><br><br>
<b>Listado de Artículos:</b>
<div id='muestra'>
<table id='campos' style="width: 100%;">
<!--input type="text" name="subtotall" id="subtotall"-->
</form>
</table>
</div>
<br>
<div id='pre'>
<b>SubTotal</b><input type="text" name="tot" id="tot">
<b>Descuento</b><input type="text" name="decfin" id="decfin">
<b>Total</b><input type="text" name="tofin" id="tofin">

</div>
</div>

<a href="javascript:imprSelec('muestra')">Imprimir Tabla</a>


</body>
</html>

	<?php }else{ header('Location: login.php'); } ?>
