

/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("#CodigoProyecto").change(function(){
	$(".alert").remove();
	
	var CodigoProyecto = $(this).val();
	var RncEmpresaProyecto = $("#RncEmpresaProyecto").val();

	var datos = new FormData();
	datos.append("CodigoProyecto", CodigoProyecto);
	datos.append("RncEmpresaProyecto", RncEmpresaProyecto);

	$.ajax({
		url:"ajax/proyecto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			if(respuesta){

				$("#CodigoProyecto").parent().after('<div class="alert alert-warning">Este Codigo de Proyecto ya existe en la Bases de datos</div>');
				$("#CodigoProyecto").val("");


			}


			}
		 })

})
$("#NcotizacionProyecto").on('keyup', function () {
	$(".alert").remove(); 

	var Ncaracteres = $(this);
   
    this.value = this.value.replace(/[^COT0-9]/g,'');

     num1=this.value.charAt(0);
     num2=this.value.charAt(1);
     num3=this.value.charAt(2);

  if(num1!='C'){
  	$("#NcotizacionProyecto").after('<div class="alert alert-danger">ATENCION..!! EL N° de CORRELATIVO Debe comenzar por COT En MAYUSCULA, sino, el sistema no le permitira escribir en el campo</div>');
	 Ncaracteres.prop('maxLength', 1);		
      
  }else if(num2!='O'){
  	$("#NcotizacionProyecto").after('<div class="alert alert-danger">ATENCION..!! EL N° de CORRELATIVO Debe comenzar por COT En MAYUSCULA, sino, el sistema no le permitira escribir en el campo</div>');
	 Ncaracteres.prop('maxLength', 2);	


  }else if(num3!='T'){
  	$("#NcotizacionProyecto").after('<div class="alert alert-danger">ATENCION..!! EL N° de CORRELATIVO Debe comenzar por COT En MAYUSCULA, sino, el sistema no le permitira escribir en el campo</div>');
	 Ncaracteres.prop('maxLength', 11);	


  }


});
/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("#nuevoProyecto").change(function(){
	$(".alert").remove();
	
	var nuevoProyecto = $(this).val();
	var RncEmpresaNombre = $("#RncEmpresaProyecto").val();

	var datos = new FormData();
	datos.append("nuevoProyecto", nuevoProyecto);
	datos.append("RncEmpresaNombre", RncEmpresaNombre);

	$.ajax({
		url:"ajax/proyecto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			if(respuesta){

				$("#nuevoProyecto").parent().after('<div class="alert alert-warning">Este Nombre de Proyecto ya existe en la Bases de datos</div>');
				$("#nuevoProyecto").val("");


			}


			}
		 })

})
$("input[name=FechamesProyectoInicio]").on('input', function(){
  $(".alert").remove(); 

   this.value = this.value.replace(/[^0-9]/g,'');

   var Fecha = $(this).val();
   var ano = Fecha.substr(0,4);
   var mes =  Fecha.substr(4,2);
   
   
   if(Fecha.length<6){

   $(".FechaInicio").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



   }else if(Fecha.length=6){
    
    $(".alert").remove(); 

    if((ano < 2018) || (ano > 2021) || (mes == 0) || (mes > 12)){
      $(".FechaInicio").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


    }     

   }

});
$("input[name=FechadiaProyectoInicio]").on('input', function(){
  $(".alert").remove(); 

   this.value = this.value.replace(/[^0-9]/g,'');

   var Fechadia = $(this).val();
   
     
   if(Fechadia.length<2){

    $(".FechaInicio").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


   }else if(Fechadia.length=2){
    
    $(".alert").remove(); 

    if((Fechadia < 1) || (Fechadia >31)){
      $(".FechaInicio").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


    }
       

   }

});

$("input[name=FechamesProyectoFin]").on('input', function(){
  $(".alert").remove(); 

   this.value = this.value.replace(/[^0-9]/g,'');

   var Fecha = $(this).val();
   var ano = Fecha.substr(0,4);
   var mes =  Fecha.substr(4,2);
   
   
   if(Fecha.length<6){

   $(".FechaFin").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



   }else if(Fecha.length=6){
    
    $(".alert").remove(); 

    if((ano < 2018) || (ano > 2021) || (mes == 0) || (mes > 12)){
      $(".FechaFin").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


    }     

   }

});
$("input[name=FechadiaProyectoFin]").on('input', function(){
  $(".alert").remove(); 

   this.value = this.value.replace(/[^0-9]/g,'');

   var Fechadia = $(this).val();
   
     
   if(Fechadia.length<2){

    $(".FechaFin").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


   }else if(Fechadia.length=2){
    
    $(".alert").remove(); 

    if((Fechadia < 1) || (Fechadia >31)){
      $(".FechaFin").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


    }
       

   }

});
$("input[name=SaldoInicialProyecto]").on('keyup', function (){ 
   this.value = this.value.replace(/[^0-9.]/g,'');

   
});
$(document).on("click", ".btnActivarProyecto" ,function(){
	var idProyecto = $(this).attr("idProyecto");
	var estadoProyecto = $(this).attr("estadoProyecto");

	var datos = new FormData();

	datos.append("idProyecto", idProyecto);
	datos.append("estadoProyecto", estadoProyecto);

	console.log("idProyecto", idProyecto);
	console.log("estadoProyecto", estadoProyecto);

	$.ajax({
		url:"ajax/proyecto.ajax.php",
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
						window.location="proyectos";}
				});
			
		}
	});

})




/*************************************
	EDITAR CATEGORIAS
**************************************/
$(document).on("click", ".btnEditarProyecto", function(){

	var idProyecto = $(this).attr("idProyecto");

	var datos = new FormData();
	datos.append("idProyecto", idProyecto);
	

	$.ajax({
		url:"ajax/proyecto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			console.log("respuesta", respuesta);

		
			$("#idProyecto").val(respuesta["id"]);
			$("#Editar-CodigoProyecto").val(respuesta["CodigoProyecto"]);
			$("#Editar-NcotizacionProyecto").val(respuesta["Corre_Cotizacion"]);
			$("#Editar-nuevoProyecto").val(respuesta["NombreProyecto"]);
			$("#Editar-descripcionProyecto").val(respuesta["DescripcionProyecto"]);
			$("#Editar-FechamesProyectoInicio").val(respuesta["Fecha_anomes_inicio"]);
			$("#Editar-FechadiaProyectoInicio").val(respuesta["Fecha_dia_inicio"]);
			$("#Editar-FechamesProyectoFin").val(respuesta["Fecha_anomes_fin"]);
			$("#Editar-FechadiaProyectoFin").val(respuesta["Fecha_dia_fin"]);
			$("#Editar-SaldoInicial").val(respuesta["SaldoInicial"]);
			


	
		
		}




	});


})

/*************************************
	Eliminar CATEGORIAS
**************************************/

$(document).on("click", ".btnEliminarProyecto", function(){ 

	var idProyecto = $(this).attr("idProyecto");

	swal({
			title: '¿Esta usted Seguro de Borrar El Proyecto?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Categoria",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=proyectos&idProyecto="+idProyecto;
					}
		});

	
})



$(document).on("click", ".btnProyectoResumen", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  var Nivel = $('input[name="Nivel"]:checked').val();
  var Proyecto = $("#Codproyecto").val();

  
  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡ERROR EN LAS FECHAS!",
      text: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡ERROR EN LAS FECHAS!",
      text: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

}else if(Proyecto == ""){
    swal({
      type: "error",
      title: "¡ERROR EN El PROYECTO!",
      text: "¡Error Debe Seleccionar un Proyecto Válido!",
      confirmButtonText: "¡Cerrar!"
          
    });

}
 else{
 window.location = "index.php?ruta=resumenproyectos&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&Nivel="+Nivel+"&Proyecto="+Proyecto;



}


  
})
$(document).on("click", ".btnProyectoSuplidor", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  var Proyecto = $("#Codproyecto").val();

  
  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡ERROR EN LAS FECHAS!",
      text: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡ERROR EN LAS FECHAS!",
      text: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

}else if(Proyecto == ""){
    swal({
      type: "error",
      title: "¡ERROR EN El PROYECTO!",
      text: "¡Error Debe Seleccionar un Proyecto Válido!",
      confirmButtonText: "¡Cerrar!"
          
    });

}
 else{
 window.location = "index.php?ruta=proyectosuplidor&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&Proyecto="+Proyecto;



}


  
})


$(document).on("click", ".btnVerdetalle", function(){
	
	$("#detalle").empty().append();

	var idgrupo = $(this).attr("idgrupo");
	var idcategoria = $(this).attr("idcategoria");
	var idgenerica = $(this).attr("idgenerica");
	var idcuenta = $(this).attr("idcuenta");
	var idNombre = $(this).attr("idNombre");
	var proyecto = $(this).attr("idproyecto");
	var fechadesde = $(this).attr("fechadesde");
	var fechahasta = $(this).attr("fechahasta");
	var RncProyectos = $(this).attr("Rnc_Empresa_LD");

	var datos = new FormData();
	datos.append("RncProyectos", RncProyectos);
	datos.append("proyecto", proyecto);
	datos.append("fechadesde", fechadesde);
	datos.append("fechahasta", fechahasta);
	

	$.ajax({
		url:"ajax/proyecto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

for(let item of respuesta){
		
	if(item.id_grupo == idgrupo && item.id_categoria == idcategoria && item.id_generica == idgenerica && item.id_cuenta == idcuenta){ 
	
		$("#detalle").append(
			'<tr>'+
				'<td>'+item.NAsiento+'</td>'+
                '<td>'+item.Fecha_AnoMes_LD+'</td>'+
                '<td>'+item.Nombre_Empresa+'</td>'+
                '<td>'+item.NCF+'</td>'+
                '<td>'+item.debito+'</td>'+
                '<td>'+item.credito+'</td>'+
                '<td>'+item.ObservacionesLD+'</td>'+  
             '</tr>'
			);
				
       }/*cierre if*/
   }/*cierre for*/

 }/*cierre respuesta*/

})

})
