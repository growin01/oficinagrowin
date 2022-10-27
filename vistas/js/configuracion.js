/****************************
SUBIENDO LOGO DE EMPRESA
******************************/
$(".nuevoLogo").change(function(){

	var imagen = this.files[0];
	console.log("imagen", imagen);
	
	/***********************************************
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	************************************************/

	if(imagen["type"] !="image/jpeg" && imagen["type"] != "image/png"){

		$(".nuevoLogo").val("");

		/* OJO LAURA ALERTA SUAVE SIN RECARGAR LA PAGINA*/

		swal({
			type: "error",
			title: "¡Error Al subir la imagen!",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			confirmButtonText: "¡Cerrar!"
					
		});

	}/* CIERRE DE SI DE VERIFICAR EL FORMATO DE LA FOTO*/
	else if (imagen["size"] > 8000000){
		$(".nuevoLogo").val("");
		
		swal({
			type: "error",
			title: "¡Error Al subir la imagen!",
			text: "¡La imagen debe NO debe pesar más de 8MB!",
			confirmButtonText: "¡Cerrar!"
					
		});
	}/* CIERRE DE SI DE VERIFICAR EL TAMAÑO DE LA FOTO*/

	else {
		var datosImagen = new FileReader;

		datosImagen.readAsDataURL(imagen);

			$(datosImagen).on("load", function(event){

				var rutaImagen = event.target.result;

				$(".previsualizar").attr("src", rutaImagen);

		})

	}

})
/****************************
SUBIENDO LOGO DE EMPRESA
******************************/
$(".nuevoSello").change(function(){

	var imagen = this.files[0];
	console.log("imagen", imagen);
	
	/***********************************************
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	************************************************/

	if(imagen["type"] !="image/jpeg" && imagen["type"] != "image/png"){

		$(".nuevoSello").val("");

		/* OJO LAURA ALERTA SUAVE SIN RECARGAR LA PAGINA*/

		swal({
			type: "error",
			title: "¡Error Al subir la imagen!",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			confirmButtonText: "¡Cerrar!"
					
		});

	}/* CIERRE DE SI DE VERIFICAR EL FORMATO DE LA FOTO*/
	else if (imagen["size"] > 8000000){
		$(".nuevoSello").val("");
		
		swal({
			type: "error",
			title: "¡Error Al subir la imagen!",
			text: "¡La imagen debe NO debe pesar más de 8MB!",
			confirmButtonText: "¡Cerrar!"
					
		});
	}/* CIERRE DE SI DE VERIFICAR EL TAMAÑO DE LA FOTO*/

	else {
		var datosImagen = new FileReader;

		datosImagen.readAsDataURL(imagen);

			$(datosImagen).on("load", function(event){

				var rutaImagen = event.target.result;

				$(".previsualizar").attr("src", rutaImagen);

		})

	}

})
$('.Correlativos').on('input', function () {
	this.value = this.value.replace(/[^0-9]/g,'');
		var Ncaracteres = $(this);
		Ncaracteres.prop('maxLength', 10);
		



	
});
$("input[name=ancho]").on('input', function(){
	$(".alert").remove(); 
	
	 this.value = this.value.replace(/[^0-9]/g,'');
	 var vacio = "";

	 if(this.value > 540){
	 	$("input[name=ancho]").after('<div class="alert alert-info"> el Ancho No Puede ser mayor a 540 px</div>');
			$("#ancho").val(vacio);
	 }

}); 
$("input[name=largo]").on('input', function(){
	$(".alert").remove(); 
	
	 this.value = this.value.replace(/[^0-9]/g,'');
	 var vacio = "";

	 if(this.value > 540){
	 	$("input[name=largo]").after('<div class="alert alert-info"> el largo No Puede ser mayor a 540 px</div>');
			$("#largo").val(vacio);
	 }

}); 
$("input[name=FechaIngresomes]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fecha = $(this).val();
	 var ano = Fecha.substr(0,4);
	 var mes =  Fecha.substr(4,2);
	 
	 
	 if(Fecha.length<6){

	 $("input[name=FechaIngresomes]").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



	 }else if(Fecha.length=6){
	 	
	 	$(".alert").remove(); 

	 	if((mes == 0) || (mes > 12)){
	 		$("input[name=FechaIngresomes]").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


	 	}     

	 }

});
$("input[name=FechaIngresoDia]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fechadia = $(this).val();
	 
	 	 
	 if(Fechadia.length<2){

	 	$("input[name=FechaIngresoDia]").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


	 }else if(Fechadia.length=2){
	 	
	 	$(".alert").remove(); 

	 	if((Fechadia < 1) || (Fechadia >31)){
	 		$("input[name=FechaIngresoDia]").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


	 	}
       

	 }



});
$("input[name=nuevaCedulaTSS]").on('keyup', function (){ 
	this.value = this.value.replace(/[^0-9]/g,'');
	var Ncaracteres = $(this);
    
    if(this.value.length!=11){
    	$(".alert").remove(); 
	   
	   Ncaracteres.prop('maxLength', 11);

	$("input[name=nuevaCedulaTSS]").after('<div class="alert alert-warning">La cantidad de Caracteres de la  Cédula debe ser igual a 11</div>');
		
	} 
});
$("input[name=SueldoTSS]").on('keyup', function (){ 
	this.value = this.value.replace(/[^0-9.]/g,'');
	
});
$(document).on("click", ".btnEditarEmpleado", function(){

	var idEmpleado = $(this).attr("idEmpleado");

	var datos = new FormData();
	datos.append("idEmpleado", idEmpleado);

	$.ajax({
		url:"ajax/empresas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#idEmpleado").val(respuesta["id"])
			$("#EditarNombreTSS").val(respuesta["Nombre_TSS"])
			$("#EditarApellidoTSS").val(respuesta["Apellido_TSS"])
			$("#EditarCedulaTSS").val(respuesta["Cedula_TSS"])
			$("#EditarFechaIngresomes").val(respuesta["AnoMes_Ingreso_TSS"])
			$("#EditarFechaIngresoDia").val(respuesta["Dia_Ingreso_TSS"])
			$("#EditarcargoTSS").val(respuesta["cargo_TSS"])
			$("#EditarSueldoTSS").val(respuesta["sueldo_TSS"])

		}


	});


})
$("input[name=EditarFechaIngresomes]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fecha = $(this).val();
	 var ano = Fecha.substr(0,4);
	 var mes =  Fecha.substr(4,2);
	 
	 
	 if(Fecha.length<6){

	 $("input[name=EditarFechaIngresomes]").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



	 }else if(Fecha.length=6){
	 	
	 	$(".alert").remove(); 

	 	if((mes == 0) || (mes > 12)){
	 		$("input[name=EditarFechaIngresomes]").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


	 	}     

	 }

});
$("input[name=EditarFechaIngresoDia]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fechadia = $(this).val();
	 
	 	 
	 if(Fechadia.length<2){

	 	$("input[name=EditarFechaIngresoDia]").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


	 }else if(Fechadia.length=2){
	 	
	 	$(".alert").remove(); 

	 	if((Fechadia < 1) || (Fechadia >31)){
	 		$("input[name=EditarFechaIngresoDia]").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


	 	}
       

	 }



});
$("input[name=EditarCedulaTSS]").on('keyup', function (){ 
	this.value = this.value.replace(/[^0-9]/g,'');
	var Ncaracteres = $(this);
    
    if(this.value.length!=11){
    	$(".alert").remove(); 
	   
	   Ncaracteres.prop('maxLength', 11);

	$("input[name=EditarCedulaTSS]").after('<div class="alert alert-warning">La cantidad de Caracteres de la  Cédula debe ser igual a 11</div>');
		
	} 
});
$("input[name=EditarSueldoTSS]").on('keyup', function (){ 
	this.value = this.value.replace(/[^0-9.]/g,'');
	
});
$(document).on("click", ".btnEliminarEmpleado", function(){
	
	var idEmpleado = $(this).attr("idEmpleado");
	var RncEmprasaTSS = $(this).attr("RncEmprasaTSS");
	

	swal({
			title: '¿Esta usted Seguro de Borrar el Empleado?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Empleado",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=empleados&idEmpleado="+idEmpleado+"&RncEmprasaTSS="+RncEmprasaTSS;
					}
		});



})