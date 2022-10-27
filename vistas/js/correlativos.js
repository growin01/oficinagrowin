
$(document).on("click", ".btnEditarCorrelativo", function(){

	var idCorrelativo = $(this).attr("idCorrelativo");

	var datos = new FormData();
	datos.append("idCorrelativo", idCorrelativo);
	
	$.ajax({
		url:"ajax/correlativos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#idCorrelativos").val(respuesta["id"]);
			$("#NCF_DesdeAntes").val(respuesta["NCF_Desde"]);
			$("#NCF_HastaAntes").val(respuesta["NCF_Hasta"]);
			$("#NCF_ConsAntes").val(respuesta["NCF_Cons"]);
			$("#Fecha_Comprobante_AnoMes").val(respuesta["Fecha_Comprobante_AnoMes"]);
			$("#Fecha_Comprobante_Dia").val(respuesta["Fecha_Comprobante_Dia"]);
			$("#Tipo_NCF").val(respuesta["Tipo_NCF"]);
			$("#NCF_Desde").val(respuesta["NCF_Desde"]);
			$("#NCF_Hasta").val(respuesta["NCF_Hasta"]);
			$("#Fecha_Vencimiento_AnoMes").val(respuesta["Fecha_Vencimiento_AnoMes"]);
			$("#Fecha_Vencimiento_Dia").val(respuesta["Fecha_Vencimiento_Dia"]);
			$("#N_Autorizacion").val(respuesta["N_Autorizacion"]);
				
				

		}
	});
})

$("input[name=Fecha_Comprobante_Dia]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fechadia = $(this).val();
	 
	 	 
	 if(Fechadia.length<2){

	 	$(".Fecha").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


	 }else if(Fechadia.length=2){
	 	
	 	$(".alert").remove(); 

	 	if((Fechadia < 1) || (Fechadia >31)){
	 		$(".Fecha").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');
	 	}
	 }
});

$("input[name=Fecha_Vencimiento_Dia]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fechadia = $(this).val();
	 
	 	 
	 if(Fechadia.length<2){

	 	$(".FechaVen").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


	 }else if(Fechadia.length=2){
	 	
	 	$(".alert").remove(); 

	 	if((Fechadia < 1) || (Fechadia >31)){
	 		$(".FechaVen").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');

	 	}
	 }
});


$("input[name=Fecha_Comprobante_AnoMes]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fecha = $(this).val();
	 var ano = Fecha.substr(0,4);
	 var mes =  Fecha.substr(4,2);
	 
	 
	 if(Fecha.length<6){

	 $(".Fecha").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');

	 }else if(Fecha.length=6){
	 	
	 	$(".alert").remove(); 

	 	if((ano < 2018) || (ano > 2022) || (mes == 0) || (mes > 12)){
	 		$(".Fecha").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');
	 	}     
	 }
});

$("input[name=Fecha_Vencimiento_AnoMes]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fecha = $(this).val();
	 var ano = Fecha.substr(0,4);
	 var mes =  Fecha.substr(4,2);
	  
	 if(Fecha.length<6){

	 $(".FechaVen").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');

	 }else if(Fecha.length=6){
	 
	 $(".alert").remove(); 

	 	if((ano < 2018) || (ano > 2022) || (mes == 0) || (mes > 12)){
	 		$(".FechaVen").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');

	 	}     
	 }
});

$("input[name=NCF_Hasta]").on('input', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');   
});

$("input[name=NCF_Desde]").on('input', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');   
});

$("input[name=N_Autorizacion]").on('input', function (){ 
	 this.value = this.value.replace(/[^-0-9]/g,'');
});
/***********CONTROL DE CORRELATIVOS*****************/
$("#NCFFactura").change(function(){
	$("#CodigoNCF").prop('readonly', true);
    $(".NCFanterior").empty().append();
	$("#HabilitarNCF").prop("checked", false);

	var NCFFactura = $("#NCFFactura").val();
	var RncEmpresaVentas = $("#RncEmpresaVentas").val();
	chart = this.value.charAt(0);
	
	
	var datos = new FormData();
	datos.append("RncEmpresaVentas", RncEmpresaVentas);
	datos.append("NCFFactura", NCFFactura);

	
	$.ajax({
		url:"ajax/correlativos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			

				var codigo = respuesta["NCF_Cons"];
				var codigoNCF = +codigo + 1;

				if(respuesta["NCF_Hasta"] > codigoNCF){
					
					if(chart == "B"){
						
						const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();
						var numero = fill(codigoNCF, 8);
						$("#CodigoNCF").val(numero);




						}else{
							
							const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();
							var numero = fill(codigoNCF, 10);
							$("#CodigoNCF").val(numero);
						   

					}



				} else{
					 $("#NCFFactura").val("");
					 $("#CodigoNCF").val("");
						   

					swal({
						type: "error",
						title: "NO PUEDE FACTURAR CON ESTE CORRELATIVO",
						text: "¡Usted Alcanzo El Maximo Número de Correlativos Aprobado Por La DGII debe solicitarlos a la DGII!",
						confirmButtonText: "¡Cerrar!"
								
					});


				}

						
		
		}

})

	


})
$("#NCFFacturaNo").change(function(){

	$("#CodigoNCFNo").prop('readonly', true);
    $(".NCFanteriorNo").empty().append();
	$("#HabilitarNCFNo").prop("checked", false);
	
	var NCFFacturaNo = $("#NCFFacturaNo").val();
	var RncEmpresaVentasNo = $("#RncEmpresaVentas").val();
	chart = this.value.charAt(0);
	
	
	var datos = new FormData();
	datos.append("RncEmpresaVentasNo", RncEmpresaVentasNo);
	datos.append("NCFFacturaNo", NCFFacturaNo);

	
	$.ajax({
		url:"ajax/correlativos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			

				var codigo = respuesta["NCF_Cons"];
				var codigoNCF = +codigo + 1;
				const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();


				var numero = fill(codigoNCF, 8);

				
					$("#CodigoNCFNo").val(numero);
					$("#CodigoNCFNo").prop('maxLength', 8);	


				
				}

						
		
		})

})
$("#NCFCompraNo").change(function(){
	
	var NCFFacturaNo = $("#NCFCompraNo").val();
	var RncEmpresaVentasNo = $("#RncEmpresaCompras").val();
	chart = this.value.charAt(0);
	
	
	var datos = new FormData();
	datos.append("RncEmpresaVentasNo", RncEmpresaVentasNo);
	datos.append("NCFFacturaNo", NCFFacturaNo);

	
	$.ajax({
		url:"ajax/correlativos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
			

				var codigo = respuesta["NCF_Cons"];
				var codigoNCF = +codigo + 1;
				const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();


				var numero = fill(codigoNCF, 8);

				
					$("#CodigoNCFNo").val(numero);
					$("#CodigoNCFNo").prop('maxLength', 8);	
					var ncfunido = NCFFacturaNo + numero;
					$("#CodigoNCFCompra").val(ncfunido);


				
				}

						
		
		})
	

})


$("#FechaFacturames_607").change(function(){
	
	var NCFFacturaNo = "BCF";
	var RncEmpresaVentasNo = $("#Rnc_Factura_607").val();
	
	
	
	var datos = new FormData();
	datos.append("RncEmpresaVentasNo", RncEmpresaVentasNo);
	datos.append("NCFFacturaNo", NCFFacturaNo);

	
	$.ajax({
		url:"ajax/correlativos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
			

				var codigo = respuesta["NCF_Cons"];
				var codigoNCF = +codigo + 1;
				const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();


				var numero = fill(codigoNCF, 8);
				BCF = "BCF"+numero;

				
					$("#NCF_BCF").val(BCF);
					$("#NCF_BCF").prop('maxLength', 11);	


				
				}

						
		
		})

})
/***********CONTROL DE CORRELATIVOS*****************/
$("#NCFCompra").change(function(){
	chart = this.value.charAt(0);
	
	var NCFFactura = $("#NCFCompra").val();

if(NCFFactura == "B11" || NCFFactura == "B13"){ 

	if(NCFFactura == "B13"){
		var RncEmpresaVentas = $("#RncEmpresaCompras").val();
		var NombreEmpresaCompras = $("#NombreEmpresaCompras").val();
		var Tipo_Id_Empresa = $("#Tipo_Id_Empresa").val();

		$("#RncSuplidorFactura").val(RncEmpresaVentas);
		$("#Nombre_Suplidor").val(NombreEmpresaCompras);
		$("#RncSuplidorFactura").prop('readonly', true);
		$("#Nombre_Suplidor").prop('readonly', true);

		if(Tipo_Id_Empresa == 1){
			$("#JuridicoSuplidorFactura").prop("checked", true);
			$("#JuridicoSuplidorFactura").prop('readonly', true);
			$("#FisicoSuplidorFactura").prop("checked", false);
			$("#FisicoSuplidorFactura").prop('readonly', true);


		}else{
			$("#FisicoSuplidorFactura").prop("checked", true);
			$("#FisicoSuplidorFactura").prop('readonly', true);
			$("#JuridicoSuplidorFactura").prop("checked", false);
			$("#JuridicoSuplidorFactura").prop('readonly', true);


		}
	

	}else{
		
		$("#CodigoNCFCompra").val("");
		$("#CodigoNCFCompra").prop('readonly', false);
		$("#RncSuplidorFactura").val("");
		$("#Nombre_Suplidor").val("");
		$("#RncSuplidorFactura").prop('readonly', false);
		$("#Nombre_Suplidor").prop('readonly', false);


	}
		
$("#CodigoNCFCompra").prop('readonly', true);
       
	
	var RncEmpresaVentas = $("#RncEmpresaCompras").val();
	
	
	var datos = new FormData();
	datos.append("RncEmpresaVentas", RncEmpresaVentas);
	datos.append("NCFFactura", NCFFactura);

	
	$.ajax({
		url:"ajax/correlativos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			

				var codigo = respuesta["NCF_Cons"];
				var codigoNCF = +codigo + 1;
				

			if(respuesta["NCF_Hasta"] > codigoNCF){
					
		
			const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();
			var numero = fill(codigoNCF, 8);
			$("#CodigoNCFCompra").val(numero);





				} else{
					 $("#NCFCompra").val("");
					 $("#CodigoNCFCompra").val("");
						   

					swal({
						type: "error",
						title: "NO PUEDE FACTURAR CON ESTE CORRELATIVO",
						text: "¡Usted Alcanzo El Maximo Número de Correlativos Aprobado Por La DGII debe solicitarlos a la DGII!",
						confirmButtonText: "¡Cerrar!"
								
					});

				}
	
		}

})

}/*cierre de if de ncf*/	
else if(NCFFactura == "E41" || NCFFactura == "E43"){ 
		
	$("#CodigoNCFCompra").prop('readonly', true);
	if(NCFFactura == "E43"){
		var RncEmpresaVentas = $("#RncEmpresaCompras").val();
		var NombreEmpresaCompras = $("#NombreEmpresaCompras").val();
		var Tipo_Id_Empresa = $("#Tipo_Id_Empresa").val();

		$("#RncSuplidorFactura").val(RncEmpresaVentas);
		$("#Nombre_Suplidor").val(NombreEmpresaCompras);
		$("#RncSuplidorFactura").prop('readonly', true);
		$("#Nombre_Suplidor").prop('readonly', true);


		if(Tipo_Id_Empresa == 1){
			$("#JuridicoSuplidorFactura").prop("checked", true);
			$("#JuridicoSuplidorFactura").prop('readonly', true);
			$("#FisicoSuplidorFactura").prop("checked", false);
			$("#FisicoSuplidorFactura").prop('readonly', true);


		}else{
			$("#FisicoSuplidorFactura").prop("checked", true);
			$("#FisicoSuplidorFactura").prop('readonly', true);
			$("#JuridicoSuplidorFactura").prop("checked", false);
			$("#JuridicoSuplidorFactura").prop('readonly', true);

		}
	

	}else{
		
		$("#CodigoNCFCompra").val("");
		$("#CodigoNCFCompra").prop('readonly', false);
		$("#RncSuplidorFactura").val("");
		$("#Nombre_Suplidor").val("");
		$("#RncSuplidorFactura").prop('readonly', false);
		$("#Nombre_Suplidor").prop('readonly', false);


	}
       
	
	var RncEmpresaVentas = $("#RncEmpresaCompras").val();
	
	
	var datos = new FormData();
	datos.append("RncEmpresaVentas", RncEmpresaVentas);
	datos.append("NCFFactura", NCFFactura);

	
	$.ajax({
		url:"ajax/correlativos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			

				var codigo = respuesta["NCF_Cons"];
				var codigoNCF = +codigo + 1;
				console.log("codigo", codigo);

			if(respuesta["NCF_Hasta"] > codigoNCF){
		
							
							const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();
							var numero = fill(codigoNCF, 10);
							$("#CodigoNCFCompra").val(numero);
						   


			} else{
				$("#NCFCompra").val("");
				$("#CodigoNCFCompra").val("");
						   

			swal({
				type: "error",
				title: "NO PUEDE FACTURAR CON ESTE CORRELATIVO",
				text: "¡Usted Alcanzo El Maximo Número de Correlativos Aprobado Por La DGII debe solicitarlos a la DGII!",
			    confirmButtonText: "¡Cerrar!"
								
			});

				}
	
		}

})
 } 

else{
$("#CodigoNCFCompra").val("");
$("#CodigoNCFCompra").prop('readonly', false);
$("#RncSuplidorFactura").val("");
$("#Nombre_Suplidor").val("");
$("#RncSuplidorFactura").prop('readonly', false);
$("#Nombre_Suplidor").prop('readonly', false);

}


})	

