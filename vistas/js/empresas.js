

/***************************************
		RANGO DE FECHA
****************************************/
$(document).on("change", "#FechaControl", function(){
     
       
      	var Fechacontrol = $(this).val();
      	

        window.location = "index.php?ruta=control-procesos&Fechacontrol="+Fechacontrol;

      
  })
$(document).on("change", "#NombreEmpresaControl", function(){
     
       
      	var NombreControl = $(this).val();
      	

        window.location = "index.php?ruta=control-procesos&NombreControl="+NombreControl;

      
  })
$(document).on("change", "#FechaControlTSS", function(){
     
       
      	var FechacontrolTSS = $(this).val();
      	

        window.location = "index.php?ruta=control-TSS&FechacontrolTSS="+FechacontrolTSS;

      
  })
$(document).on("change", "#NombreEmpresaControlTSS", function(){
     
       
      	var NombreControlTSS = $(this).val();
      	

        window.location = "index.php?ruta=control-TSS&NombreControlTSS="+NombreControlTSS;

      
  })

/****************************
EDITAR USUARIO
******************************/
$(document).on("click", ".btnAgregarUsuarioEmpresa", function(){

	var Rnc_Empresa = $(this).attr("Rnc_Empresa");

	console.log(Rnc_Empresa);
	
			$("#RncEmpresaUsuario").val(Rnc_Empresa);


})

/************************************
	VALIDACION DE RNC Solo numeros
**************************************/
$("input[name=nuevoRncEmpresa]").on('input', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');
	 var Ncaracteres = $(this);

	

	  
    if ($(".Juridico").is(':checked') || $(".Fisico").is(':checked')){
    	$(".alert").remove(); 


	    if($(".Juridico").is(':checked') && this.value.length!=9){
	    	var Ncaracteres = $(this);

		$("input[name=nuevoRncEmpresa]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 9</div>');
		
		} else if($(".Fisico").is(':checked') && this.value.length!=11){
			var Ncaracteres = $(this);
		$("input[name=nuevoRncEmpresa]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 11</div>');
		}
	
		} else{

			$(".alert").remove(); 


			$(".TipoIdEmpresa").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');


			
		}

});

/*VALIDACION DE RNC Caracteres en los Botones*/

$('.TipoIdEmpresa').on('input', function () {

	var RncSuplidor = $("input[name=nuevoRncEmpresa]").val();

	

	  
    if ($(".Juridico").is(':checked') || $(".Fisico").is(':checked')){
    	$(".alert").remove(); 


	    if($(".Juridico").is(':checked') && RncSuplidor.length!=9){
	    	RncSuplidor.prop('maxLength', 9);


		$("input[name=nuevoRncEmpresa]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 9</div>');
		
		} else if($(".Fisico").is(':checked') && RncSuplidor.length!=11){

			RncSuplidor.prop('maxLength', 11);

		$("input[name=nuevoRncEmpresa]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 11</div>');
		}
	
		} else{


			$(".TipoIdEmpresa").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');


			
		}

});

/*VALIDAR RNC NO SE REPITA*/
$("#nuevoRncEmpresa").keyup(function(){
	$(".alert").remove();
	
	
	var nuevoRncEmpresa = $("#nuevoRncEmpresa").val();
	
	
	
	var datos = new FormData();
	datos.append("nuevoRncEmpresa", nuevoRncEmpresa);
	
	$.ajax({
		url:"ajax/empresas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
			if(respuesta){

		$(".input-RNC").after('<div class="alert  alert-warning">ALERTA !! Esta Empresas ya esta registrada</div>');
		$("#nuevoRncEmpresa").val("");
		

			}


			}
		 })

})
/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("#nuevoRncEmpresa").change(function(){
	
	var RncEmpresaDGII = $("#nuevoRncEmpresa").val();
	
	
	
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

				
				$("#Nombre_Empresa").val(respuesta["Nombre_Empresa_DGII"]);	
				

			}
		 }
	});
});





/***********************************
Proceso de  TSS
***********************************/

$(document).on("click", ".btnTSS" ,function(){
	var idcontrolTSS = $(this).attr("idcontrolTSS");
	var estadoTSS = $(this).attr("estadoTSS");
	var FechacontrolTSS = $(this).attr("FechacontrolTSS");
	var estadoColor = $(this).attr("estadoColor");

	var datos = new FormData();

	datos.append("idcontrolTSS", idcontrolTSS);
	datos.append("estadoTSS", estadoTSS);

	$.ajax({
		url:"ajax/empresas.ajax.php",
		type:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			if(window.matchMedia("(max-width:767px)").matches){
				swal({
					type:"success",
					title:"¡Ok!",
					text:"¡La información fue actualizada con éxito!",
					showConfirmButton:true,
					confirmButtonText:"Cerrar"
				}).then((result)=>{
					if(result.value){
						window.location="control-TSS";}
				});
			}
		window.location = "index.php?ruta=control-TSS&FechacontrolTSS="+FechacontrolTSS;
		}
	});

	
		


})

$(document).on("click", ".btnIR3" ,function(){
	var idcontrolIR3 = $(this).attr("idcontrolIR3");
	var estadoIR3 = $(this).attr("estadoIR3");
	var FechacontrolTSS = $(this).attr("FechacontrolTSS");

	var datos = new FormData();

	datos.append("idcontrolIR3", idcontrolIR3);
	datos.append("estadoIR3", estadoIR3);

	$.ajax({
		url:"ajax/empresas.ajax.php",
		type:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			if(window.matchMedia("(max-width:767px)").matches){
				swal({
					type:"success",
					title:"¡Ok!",
					text:"¡La información fue actualizada con éxito!",
					showConfirmButton:true,
					confirmButtonText:"Cerrar"
				}).then((result)=>{
					if(result.value){
						window.location="control-TSS";}
				});
			}
			window.location = "index.php?ruta=control-TSS&FechacontrolTSS="+FechacontrolTSS;
		}
	});

})

/***********************************
Proceso de  TSS
***********************************/

$(document).on("click", ".btnTSSind" ,function(){
	var idcontrolTSS = $(this).attr("idcontrolTSS");
	var estadoTSS = $(this).attr("estadoTSS");
	var FechacontrolTSS = $(this).attr("FechacontrolTSS");
	

	var datos = new FormData();

	datos.append("idcontrolTSS", idcontrolTSS);
	datos.append("estadoTSS", estadoTSS);

	$.ajax({
		url:"ajax/empresas.ajax.php",
		type:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			if(window.matchMedia("(max-width:767px)").matches){
				swal({
					type:"success",
					title:"¡Ok!",
					text:"¡La información fue actualizada con éxito!",
					showConfirmButton:true,
					confirmButtonText:"Cerrar"
				}).then((result)=>{
					if(result.value){
						window.location="control-TSS";}
				});
			}
		window.location = "index.php?ruta=Control-TSS-Empresa";
		}
	});

	
		


})

$(document).on("click", ".btnIR3ind" ,function(){
	var idcontrolIR3 = $(this).attr("idcontrolIR3");
	var estadoIR3 = $(this).attr("estadoIR3");
	var FechacontrolTSS = $(this).attr("FechacontrolTSS");

	var datos = new FormData();

	datos.append("idcontrolIR3", idcontrolIR3);
	datos.append("estadoIR3", estadoIR3);

	$.ajax({
		url:"ajax/empresas.ajax.php",
		type:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){
			if(window.matchMedia("(max-width:767px)").matches){
				swal({
					type:"success",
					title:"¡Ok!",
					text:"¡La información fue actualizada con éxito!",
					showConfirmButton:true,
					confirmButtonText:"Cerrar"
				}).then((result)=>{
					if(result.value){
						window.location="control-TSS";}
				});
			}
			window.location = "index.php?ruta=Control-TSS-Empresa";
		}
	});

})

/*********************************
VALIDACION Login Emoresa
**********************************/
$("#ingRncEmpresa").keyup(function(){
	$("#NombreEmpresa").val("");
	
	var RncEmpresa = $("#ingRncEmpresa").val();
	
	
	
	
	var datos = new FormData();
	datos.append("RncEmpresa", RncEmpresa);



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

				
				$("#NombreEmpresa").val(respuesta["Nombre_Empresa"]);	
				

			}
		 }
	});
});

$(document).on("mouseup", "#CuadreITBIS", function(){ 
	
	var RncEmpresaControl = $("#RncEmpresapremisas").val();
	var PeriodoControl = $("#Fechacuadre").val();
	
	var datos = new FormData();
	
	datos.append("RncEmpresaControl", RncEmpresaControl);
	datos.append("PeriodoControl", PeriodoControl);
	console.log("RncEmpresaControl", RncEmpresaControl);
	console.log("PeriodoControl", PeriodoControl);
	
	

	$.ajax({
		url:"ajax/empresas.ajax.php",
		type:"POST",
		data:datos,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){

			
		}
	});

});