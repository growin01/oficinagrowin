$("input[name=RncCliente]").on('input', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');
	 var Ncaracteres = $(this);


	

	  
    if ($(".JuridicoUserCliente").is(':checked') || $(".FisicoUserCliente").is(':checked')){
    	$(".alert").remove(); 


	    if($(".JuridicoUserCliente").is(':checked') && this.value.length!=9){
	    	Ncaracteres.prop('maxLength', 9);

		$("input[name=RncCliente]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 9</div>');
		
		} else if($(".FisicoUserCliente").is(':checked') && this.value.length!=11){
			Ncaracteres.prop('maxLength', 11);
		$("input[name=RncCliente]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 11</div>');
		}
	
	} else{

			$(".alert").remove(); 


			$(".TipoUserCliente").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');


			
		}

});

$('.TipoUserCliente').on('input', function () {
	


	var RncCliente = $("input[name=RncCliente]").val();

    if ($(".JuridicoUserCliente").is(':checked') || $(".FisicoUserCliente").is(':checked')){
    	$(".alert").remove(); 


	    if($(".JuridicoUserCliente").is(':checked') && RncSuplidor.length!=9){
	    	RncCliente.prop('maxLength', 9);

		$("input[name=RncCliente]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 9</div>');
		 
		} else if($(".FisicoUserCliente").is(':checked') && RncSuplidor.length!=11){
		$("input[name=RncCliente]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 11</div>');
		RncCliente.prop('maxLength', 11);
		}
	
		} else{

			$(".TipoUserCliente").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');


			
		}

});

/*************************************
	EDITAR CATEGORIAS
**************************************/
$(document).on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
	datos.append("idCliente", idCliente);
	

	$.ajax({
		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			
			$("#idCliente").val(respuesta["id"]);
			
			if(respuesta["Tipo_Cliente"] == "1"){
			    
			 $("#JuridicoCliente").attr('checked', true);
			 $("#fisicoCliente").attr('checked', false);
			    
			    
			}else {
			$("#JuridicoCliente").attr('checked', false);
			$("#fisicoCliente").attr('checked', true);
			
			    
			}
			
			
			$("#editarCliente").val(respuesta["Nombre_Cliente"]);
			$("#DocumentoAnterior").val(respuesta["Documento"]);
			$("#editarDocumentoId").val(respuesta["Documento"]);
			$("#editarEmail").val(respuesta["Email"]);
			$("#editarTelefono").val(respuesta["Telefono"]);
			$("#editarDireccion").val(respuesta["Direccion"]);
			$("#editarFechaNacimiento").val(respuesta["Fecha_Nacimiento"]);
			
			

		}




	});


})
/******************************************
		ELMINAR CLIENTE
*******************************************/

$(document).on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	swal({
			title: '¿Esta usted Seguro de Borrar eL Cliente?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Cliente",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=clientes&idCliente="+idCliente;
					}
		});

	
})

/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("#RncCliente").change(function(){
	$(".alert").remove();
	
	var Cliente = $(this).val();
	var RncEmpresaCliente = $("#RncEmpresaCliente").val();

	var datos = new FormData();
	datos.append("validarCliente", Cliente);
	datos.append("RncEmpresaCliente", RncEmpresaCliente);

	console.log("Cliente", Cliente);
	console.log("RncEmpresaCliente", RncEmpresaCliente);


	$.ajax({
		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			if(respuesta){

				$("#nuevoCliente").parent().after('<div class="alert alert-warning">Este Nombre de Usuario ya existe en la Bases de datos</div>');
				$("#nuevoCliente").val("");
				$("#RncCliente").parent().after('<div class="alert alert-warning">Este Nombre de Usuario ya existe en la Bases de datos</div>');
				$("#RncCliente").val("");

			}else{
				var RncCliente = $("#RncCliente").val();
				
				var datos = new FormData();
				datos.append("RncCliente", RncCliente);
				
				$.ajax({
					url:"ajax/clientes.ajax.php",
					method: "POST",
					data: datos,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function(respuesta){
						console.log("respuesta", respuesta);
						if(respuesta){
							$("#nuevoCliente").val(respuesta["Nombre_Empresa_DGII"]);



						}


		
			}


			})
			}
		 }
	})
})