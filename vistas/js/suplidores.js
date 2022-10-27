/*********************************
VALIDACION de RncSuplidor
**********************************/
$("#nuevoDocumentoIdsuplidor").keyup(function(){
	$(".alert").remove();
	
	
	var RncSuplidor = $(this).val();
	var RncEmpresasuplidorvalidar = $("#RncEmpresasuplidor").val();

	var datos = new FormData();
	datos.append("RncSuplidor", RncSuplidor);
	datos.append("RncEmpresasuplidorvalidar", RncEmpresasuplidorvalidar);

	$.ajax({
		url:"ajax/suplidores.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			if(respuesta){

				$("#nuevoDocumentoIdsuplidor").parent().after('<div class="alert alert-warning">Este RNC suplidor ya existe en la Bases de datos</div>');
				$("#nuevoDocumentoIdsuplidor").val("");


			}

			}
		 })


	});
/*********************************/
$("#nuevoDocumentoIdsuplidor").change(function(){
	
	var RncEmpresaDGII = $(this).val();
	var RncEmpresaDGIIGrowin = $(this).val();

	
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

	
			$("#nuevoSuplidor").val(respuesta["Nombre_Empresa_Growin"]);	
	

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

	
					$("#nuevoSuplidor").val(respuesta["Nombre_Empresa_DGII"]);	
	

				}
	



}
		 });
	}
	}
});

});


$("#EditarDocumentoIdsuplidor").change(function(){
	
	var RncEmpresaDGII = $("#EditarDocumentoIdsuplidor").val();
	var RncEmpresaDGIIGrowin = $("#EditarDocumentoIdsuplidor").val();
	
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

	
	$("#EditarSuplidor").val(respuesta["Nombre_Empresa_Growin"]);	
	

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

	
$("#EditarSuplidor").val(respuesta["Nombre_Empresa_DGII"]);	
	

		}
	



}
		 });
	}
	}
});

});
/*************************************
	EDITAR SUPLIDORES
**************************************/

$(document).on("click", ".btnEditarSuplidor", function(){

	
	var idsuplidor = $(this).attr("idsuplidor");
	var RncEmpresasuplidoreditar = $("#RncEmpresasuplidor").val();


	var datos = new FormData();
	datos.append("idsuplidor", idsuplidor);
	datos.append("RncEmpresasuplidoreditar", RncEmpresasuplidoreditar);
	

	$.ajax({
		url:"ajax/suplidores.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			

			if(respuesta["Tipo_Suplidor"] == "1"){

				$("#Editarjuridico").prop("checked", true);    
                   
                  

			} else{
				$("#Editarfisico").prop("checked", true);

			}



-			$("#idsuplidor").val(respuesta["id"]);	
			$("#DocumentoAnterior").val(respuesta["Documento_Suplidor"]);
			$("#EditarDocumentoIdsuplidor").val(respuesta["Documento_Suplidor"]);
			$("#EditarSuplidor").val(respuesta["Nombre_Suplidor"]);
			$("#EditarEmailSuplidor").val(respuesta["Email"]);
			$("#EditarTelefonoSuplidor").val(respuesta["Telefono"]);
			$("#EditarDireccionSuplidor").val(respuesta["Direccion"]);


			
			

		}




	});


});


/*************************
ELIMINAR SUPLIDOR
***********************/

$(document).on("click", ".btnEliminarSuplidor", function(){

	var idsuplidor = $(this).attr("idsuplidor");
	console.log("idsuplidor", idsuplidor);

	swal({
			title: '¿Esta usted Seguro de Borrar eL Suplidor?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Suplidor",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=suplidores&idsuplidor="+idsuplidor;
					}
		});

	
});







