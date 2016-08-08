$(document).ready(function(){

	$("#login").submit(function(){

		var datos=$(this).serialize();

		$.post("validar.php",datos,
			function(data){
				if(data.validacion=="true"){
					window.location="index.php";
				}else{
					$("#msj").html("datos incorrectos");
					//window.location='login.php';
				}
			},'json'


			);
		return false;

	});

	$("#salir").click(function(){

		window.location="salir.php";

	});


});