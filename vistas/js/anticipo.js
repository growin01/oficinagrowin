
$('.TipoSuplidor').on('input', function () {

	var RncSuplidor = $("input[name=RncAnticipo]").val();

	var RncSuplidor = $("input[name=RncAnticipo]").val("");


	  
    if ($(".Juridico").is(':checked') || $(".Fisico").is(':checked')){
    	$(".alert").remove(); 


	    if($(".Juridico").is(':checked') && RncSuplidor.length!=9){
	    	RncSuplidor.prop('maxLength', 9);

		$("input[name=RncAnticipo]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 9</div>');
		 
		} else if($(".Fisico").is(':checked') && RncSuplidor.length!=11){
		$("input[name=RncAnticipo]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 11</div>');
		RncSuplidor.prop('maxLength', 11);
		}
	
		} else{


			$(".TipoSuplidor").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');


			
		}

});
/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/

$("input[name=RncAnticipo]").on('keyup', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');

	 	var Ncaracteres = $(this);

	

	  
    if ($(".Juridico").is(':checked') || $(".Fisico").is(':checked')){
    	$(".alert").remove(); 


	    if($(".Juridico").is(':checked') && this.value.length!=9){
	    	Ncaracteres.prop('maxLength', 9);

		$("input[name=RncAnticipo]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 9</div>');
		
		} else if($(".Fisico").is(':checked') && this.value.length!=11){
		$("input[name=RncAnticipo]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 11</div>');
			Ncaracteres.prop('maxLength', 11);
		
		}
	
		} else{

			$(".alert").remove(); 


			$(".TipoSuplidor").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');
			Ncaracteres.prop('maxLength', 1);


			
		}
	

});
$("#RncAnticipo").change(function(){

	
	var RncEmpresaDGII = $("#RncAnticipo").val();
	var RncEmpresaDGIIGrowin = $("#RncAnticipo").val();

		
	var datos = new FormData();
	datos.append("RncEmpresaDGIIGrowin", RncEmpresaDGIIGrowin);

	$.ajax({
		url:"ajax/empresas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			if(respuesta){

				
				$("#Nombre_Cuenta").val(respuesta["Nombre_Empresa_Growin"]);	
				

			}else{
				var datos = new FormData();
				datos.append("RncEmpresaDGII", RncEmpresaDGII);

				$.ajax({
					url:"ajax/empresas.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(respuesta){
						if(respuesta){

				
						$("#Nombre_Cuenta").val(respuesta["Nombre_Empresa_DGII"]);	
				

					}
			}
		 });
	}



	}
});

});
$(document).on("click", ".btnVerDetalleFondo", function(){
  
  $("#VerDetalleFondo").empty().append();

  var idRendido= $(this).attr("idRendido");
 

  var datos = new FormData();
  datos.append("idRendido", idRendido);
 
  
 
  $.ajax({
    url:"ajax/anticipo.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);
      
$("#NRendido").val(respuesta["NAsiento"]);
$("#NombreFondo").val(respuesta["Nombre_Cuenta"]);
var Fecha = respuesta["Fecha_AnoMes"]+"-"+respuesta["Fecha_dia"];

$("#Fecha").val(Fecha);
$("#descripcion").val(respuesta["Descripcion"]);
$("#Responsable").val(respuesta["Responsable"]);

$("#credito").val(respuesta["credito"]);
$("#debito").val(respuesta["debito"]);
$("#saldo").val(respuesta["Monto"]);


var facturas = jQuery.parseJSON(respuesta["Facturas"]);
$.each(facturas, function(index, item) {


    $("#VerDetalleFondo").append(
      '<tr>'+
                '<td>'+item.nombre+'</td>'+
                '<td>'+item.ncf+'</td>'+
                '<td>'+item.fechames+"-"+item.fechadia+'</td>'+
                '<td>'+item.credito+'</td>'+
                '<td>'+item.debito+'</td>'+
                '<td>'+item.saldo+'</td>'+
               
      '</tr>'
      );
        


    })
       
             



 }/*cierre respuesta*/

});

});
/***********************************
ACTIVAR O DESACTIVIAR USUARIO
***********************************/

$(document).on("click", ".btnActivarFondo" ,function(){
	var idFondo = $(this).attr("idFondo");
	var estadoFondo = $(this).attr("estadoFondo");

	var datos = new FormData();

	datos.append("idFondo", idFondo);
	datos.append("estadoFondo", estadoFondo);

	$.ajax({
		url:"ajax/anticipo.ajax.php",
		type:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			
				swal({
					type:"success",
					title:"¡Ok!",
					text:"¡La información fue actualizada con éxito!",
					showConfirmButton:true,
					confirmButtonText:"Cerrar"
				}).then((result)=>{
					if(result.value){
						window.location="anticipos";}
				});
			
		}
	});

	if(estadoFondo == 0){
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoFondo', 1);

		
	}
	else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoFondo', 0);

	}

});
$(document).on("click", ".btnActivarRendirFondo" ,function(){
	var idRendirFondo = $(this).attr("idRendirFondo");
	var estadoRendirFondo = $(this).attr("estadoRendirFondo");

	var datos = new FormData();

	datos.append("idRendirFondo", idRendirFondo);
	datos.append("estadoRendirFondo", estadoRendirFondo);

	$.ajax({
		url:"ajax/anticipo.ajax.php",
		type:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			
				swal({
					type:"success",
					title:"¡Ok!",
					text:"¡La información fue actualizada con éxito!",
					showConfirmButton:true,
					confirmButtonText:"Cerrar"
				}).then((result)=>{
					if(result.value){
						window.location="reporteranticiposrendidos";}
				});
			
		}
	});

	if(estadoFondo == 1){
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoFondo', 1);

		
	}
	else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoFondo', 0);

	}

});
$(document).on("click", ".btnEditarOtorgarAnticipo", function(){

	var Rnc_Empresa_LD = $(this).attr("Rnc_Empresa_LD");
	var Extraer_NAsiento = $(this).attr("Extraer_NAsiento");
	var NAsiento = $(this).attr("NAsiento");

	

	var datos = new FormData();
	datos.append("Rnc_Empresa_LD", Rnc_Empresa_LD); 
	datos.append("Extraer_NAsiento", Extraer_NAsiento);  
	datos.append("NAsiento", NAsiento);

	$.ajax({
		url:"ajax/anticipo.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
	respuesta.forEach(funcionForEach);

         function funcionForEach(item, index){
    $("#FechamesAnticipo").val(item.Fecha_AnoMes_LD);
	$("#FechadiaAnticipo").val(item.Fecha_dia_LD);		 
	$("#EditarRncAnticipo").val(item.Rnc_Factura);
	$("#MontoAnticipo").val(item.debito);
	$("#idOtorgarAnticipa").val(item.id_registro);
	$("#NAsiento").val(item.NAsiento);
	$("#Nombre_Cuenta").val(item.Nombre_Empresa);
	$("#Referencia").val(item.referencia);
	$("#Descripcion").val(item.ObservacionesLD);
	var rnc_Factura = item.Rnc_Factura;
	console.log("rnc_Factura", rnc_Factura);
			
		if(rnc_Factura.length == 9){
			$("#juridico").attr('checked', true);


		}else{
			$("#fisico").attr('checked', true);


		}	


			
 }
			
			

		}




	});


})
$(document).on("click", ".btnOtorgarAnticipo", function(){
	
	var id_registro = $(this).attr("id_registro");
	var Rnc_Empresa_LD = $(this).attr("Rnc_Empresa_LD");
	var Rnc_Factura = $(this).attr("Rnc_Factura");
	var NAsiento = $(this).attr("NAsiento");
	var eliminarOtorgar = "EliminarOtrogar";

	swal({
			title: '¿Esta usted Seguro de Borrar el Otorgamiento de Anticipo?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Otrogamiento de Anticipo",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=reporteanticipos&id_registro="+id_registro+"&Rnc_Empresa_LD="+Rnc_Empresa_LD+"&Rnc_Factura="+Rnc_Factura+"&NAsiento="+NAsiento+"&eliminarOtorgar="+eliminarOtorgar;
					}
		});



})
$("input[name=MontoAnticipo]").on('keyup', function (){ 
	 this.value = this.value.replace(/[^0-9.]/g,'');

});