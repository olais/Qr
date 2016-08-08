$(document).ready(function() {
    var MaxInputs       = 100; 
    var contenedor       = $("#contenedor"); 
    var AddButton       = $("#agregarCampo");

    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos
    var data="";
    $("#articulo").change(function(){

            $.post("datos.php",'articulo='+$(this).val(),
                function(data){
                    //$(AddButton).trigger("click");
                    if(x <= MaxInputs) 
        {
            FieldCount++;
            //agregar campo

  $("#campos").append('<div id="contenedor"><tr class="dato"><td id="sku'+x+'"><input type="text" name="sku[]" readonly placeholder="sku" value="'+data.rows[0].Codigo+'" size="10"></td><td><input type="text" name="descripcion[]" value="'+data.rows[0].Descripcion+'" size="60" placeholder="Descripción" readonly/></td><td><input type="text" name="cantidad['+data.rows[0].Codigo+']" placeholder="Cantidad" size="5" required id="can'+x+'"></td><td><input type="text" name="descuento['+data.rows[0].Codigo+']" placeholder="Descuento" size="10" id="des'+x+'"></td><td><input type="text" name="precio[]" placeholder="precio" readonly value="'+data.rows[0].Importe+'" size="10" id="pre'+x+'"></td><td><td ><input type="text" name="subtotal[]" size="10" placeholder="Subtotal" readonly id="sub'+x+'" ></td><td><a href="#" class="eliminar">&times;</a></td></tr></div>');
           
            $("#articulo").val("");
             $("#articulo").focus();
            x++; //text box increment
        }
        return false;
                    
                },'json' );

        });

    $("body").on("click",".eliminar", function(e){ //click en eliminar campo

        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
    
  $("body").on("click","div", function(e){ 
            var total=0;
            var totalDescuento=0;
            var sumarSub=0;
            for(k=1;k<x;k++)    {
        var values = $('input[id="can'+k+'"]')
              .map(function(){



                if($('input[id="can'+k+'"]').val() !=""){
            var cantidad=parseInt($('input[id="can'+k+'"]').val());
            var precio=parseInt($('input[id="pre'+k+'"]').val());

                 if($("#descGlobal").val()>0){

                   //  $("#decfin").val($("#descGlobal").val());
                    $('input[id="des'+k+'"]').val("");

                     porcentaje= parseFloat($("#descGlobal").val());

                     if($('input[id="des'+k+'"]').val() !=""){
                        porcentajeDescuentosUnitarios=($('input[id="des'+k+'"]').val());

                     }
                   
                    $("#sub"+k).val(cantidad*precio);
                    var importeNormal=$("#sub"+k).val();
                    //var por=$('input[id="des'+k+'"]').val();


                    var descuento=(importeNormal*porcentaje)/100;
                    totalDescuento+=descuento;
                    //alert(descuento);
               $("#sub"+k).val((cantidad*precio)-descuento);
                 $("#decfin").val(totalDescuento); 
               if($('input[id="des'+k+'"]').val()!="" && $('input[id="can'+k+'"]').val() >0){
                
                $("#decfin").val(totalDescuento); 



               }else{
                //$("#decfin").val("");

               }
              


               var importeTotal= parseFloat ($("#sub"+k).val());
               total+=importeTotal;
              
               $("#tot").val(total);

               var im=total-totalDescuento;

               var valorDescuento= parseFloat($("#decfin").val());

              $("#tofin").val(total);

              return false;

                  }else{
                    $("#descGlobal").val("");
                  }


               if( $('input[id="des'+k+'"]').val()=="" && $("#descGlobal").val() ==""){
                 $("#decfin").val(0);
                       
               }
              /*if($("#descGlobal").val()!=""){
                //$("#decfin").val($("#descGlobal").val());
                var porcentaje=$("#descGlobal").val();
              }*/

                    
                 if($('input[id="des'+k+'"]').val() !=""){

                     porcentaje=($('input[id="des'+k+'"]').val());
                    $("#sub"+k).val(cantidad*precio);
                    var importeNormal=$("#sub"+k).val();
                    //var por=$('input[id="des'+k+'"]').val();


                    var descuento=(importeNormal*porcentaje)/100;
                    totalDescuento+=descuento;
                    //alert(descuento);
               $("#sub"+k).val((cantidad*precio)-descuento);


               if($('input[id="des'+k+'"]').val()!="" && $('input[id="can'+k+'"]').val() >0){
                
               // $("#decfin").val(totalDescuento); 



               }else{
                $("#decfin").val("");

               }
              


               var importeTotal= parseFloat ($("#sub"+k).val());
               total+=importeTotal;
              
               $("#tot").val(total);

               var im=total-totalDescuento;

               var valorDescuento= parseFloat($("#decfin").val());

              $("#tofin").val(total);
               

            

                   }//fin desc


                   else{

              
              
                $("#sub"+k).val(cantidad*precio);
                var subt= $("#sub"+k).val();

                total+=parseFloat(subt);
                $("#tot").val(total);

                var im=total-totalDescuento;
                $("#tofin").val(total);
                
                   }

                  

            }else{

                  $('input[id="can'+k+'"]').val("");
                  // $("#sub"+k).val("");
                   //$("#tot").val("");
                    if($('input[id="des'+k+'"]').val() == "" && $('input[id="can'+k+'"]').val()!=""){
                       $("#decfin").val(totalDescuento);
                      // $("#tofin").val("");

                    }else{
                     $("#tofin").val(total);
                     //$("#decfin").val("")
                    }
                   }

                           
              //$("#sub"+k).val(

                    });
            }
       
    });
   /* var values = $("input[id='can']")
              .map(function(){
               // alert($(this).val());

                    });
        return false;
    })*/

  
    


});