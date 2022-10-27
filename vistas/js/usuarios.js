
$('.logueos').DataTable({
	

	lengthMenu : [25, 100, 150, 200, 250, 300, -1],

	
    "deferRender": true,
		"retrieve": true,
		"processing": true,
		"paging": true,
		"autoWidth": true,
    "language": {
    	
	    "sProcessing":     "Procesando...",
	    "sLengthMenu":     "Mostrar _MENU_ registros",
	    "sZeroRecords":    "No se encontraron resultados",
	    "sEmptyTable":     "Ningún dato disponible en esta tabla",
	    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	    "sInfoPostFix":    "",
	    "sSearch":         "Buscar:",
	    "sUrl":            "",
	    "sInfoThousands":  ",",
	    "sLoadingRecords": "Cargando...",
	    "oPaginate": {
	        "sFirst":    "Primero",
	        "sLast":     "Último",
	        "sNext":     "Siguiente",
	        "sPrevious": "Anterior"
	    },
	    "oAria": {
	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	    }
	    
	},
	dom:"Blfrtip",
            buttons:[
                {extend:'excel',text:'Excel'},
                {extend:'csv',text:'CSV'}    
            ]
 });

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#minlogueos').val(), 10 );
        var max = parseInt( $('#maxlogueos').val(), 10 );
        var age = parseFloat( data[3] ) || 0; // use data for the age column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);
 
$(document).ready(function() {
    var table = $('.logueos').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minlogueos, #maxlogueos').keyup( function() {
        table.draw();
    } );

    } );

/****************************
SUBIENDO FOTO DE USUARIO
******************************/
$(".nuevaFoto").change(function(){
	var imagen = this.files[0];
	
	/***********************************************
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	************************************************/

	if(imagen["type"] !="image/jpeg" && imagen["type"] != "image/png"){

		$(".nuevaFoto").val("");

		/* OJO LAURA ALERTA SUAVE SIN RECARGAR LA PAGINA*/

		swal({
			type: "error",
			title: "¡Error Al subir la imagen!",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			confirmButtonText: "¡Cerrar!"
					
		});

	}/* CIERRE DE SI DE VERIFICAR EL FORMATO DE LA FOTO*/
	else if (imagen["size"] > 5000000){
		$(".nuevaFoto").val("");
		
		swal({
			type: "error",
			title: "¡Error Al subir la imagen!",
			text: "¡La imagen debe NO debe pesar más de 2MB!",
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
EDITAR USUARIO
******************************/
$(document).on("click", ".btnEditarUsuario", function(){

	var idUsuario = $(this).attr("idUsuario");

	var datos = new FormData();
	datos.append("idUsuario", idUsuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			$("#RncEmpresaUsuario").val(respuesta["Rnc_Empresa_Usuario"])
			$("#editarNombre").val(respuesta["Nombre"]);
			$("#editarUsuario").val(respuesta["Usuario"]);
			$("#editaremailusuario").val(respuesta["emailusuario"])
			$("#editarPerfil").val(respuesta["Perfil"]);
			$("#fotoActual").val(respuesta["Foto"]);
			$("#editarPassword").val(respuesta["Password"]);
		

			$("#passwordActual").val(respuesta["Password"]);
		


			

			
			
			if(respuesta["Foto"] != ""){
				$(".previsualizar").attr("src", respuesta["Foto"])

			}

		}




	});


})

/***********************************
ACTIVAR O DESACTIVIAR USUARIO
***********************************/
$(document).on("focus", "#editarPassword" ,function(){

$("#editarPassword").val("");
 });

$(document).on("click", ".btnActivar" ,function(){
	var idUsuario = $(this).attr("idUsuario");
	var estadoUsuario = $(this).attr("estadoUsuario");

	var datos = new FormData();

	datos.append("activarId", idUsuario);
	datos.append("activarUsuario", estadoUsuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
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
						window.location="usuarios";}
				});
			}
		}
	});

	if(estadoUsuario == 0){
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoUsuario', 1);

		
	}
	else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estadoUsuario', 0);

	}

})
$(document).on("click", ".btndescuento" ,function(){
	var descuentoId = $(this).attr("idUsuario");
	var descuentoUsuario = $(this).attr("descuentoUsuario");

	var datos = new FormData();

	datos.append("descuentoId", descuentoId);
	datos.append("descuentoUsuario", descuentoUsuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
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
						window.location="usuarios";}
				});
			}
		}
	});

	if(descuentoUsuario == 0){
		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('No Autorizado');
		$(this).attr('descuentoUsuario', 1);

		
	}
	else{
		$(this).removeClass('btn-danger');
		$(this).addClass('btn-success');
		$(this).html('Autorizado');
		$(this).attr('descuentoUsuario', 0);

	}

})
/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("#nuevoUsuario").change(function(){
	$(".alert").remove();
	
	var usuario = $(this).val();
	var RncEmpresaUsuario = $("#RncEmpresaUsuario").val();

	var datos = new FormData();
	datos.append("validarUsuario", usuario);
	datos.append("RncEmpresaUsuario", RncEmpresaUsuario);

	$.ajax({
		url:"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			if(respuesta){

				$("#nuevoUsuario").parent().after('<div class="alert alert-warning">Este Usuario ya existe en la Bases de datos</div>');
				$("#nuevoUsuario").val("");


			}


			}
		 })

})
/************************************
ELIMINAR USUARIO
**************************************/
$(document).on("click", ".btnEliminarUsuario", function(){
	
	var idUsuario = $(this).attr("idUsuario");
	var usuario = $(this).attr("usuario");
	var fotoUsuario = $(this).attr("fotoUsuario");

	swal({
			title: '¿Esta usted Seguro de Eliminar el usuario?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar usuario",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=usuarios&usuario="+usuario+"&idUsuario="+idUsuario+"&fotoUsuario="+fotoUsuario;
					}
		});



})
$(document).on("click", "#nuevoPerfil", function(){
	$(".alert").remove(); 


var texto = $("#emailusuario").val();
  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
  if (!regex.test(texto)) {
      $("input[name=emailusuario]").after('<div class="alert alert-warning">Correo Invalido</div>');
		$("#emailusuario").val("");
  } 


})

$(document).on("click", "#editarPerfil", function(){
	$(".alert").remove(); 


var texto = $("#editaremailusuario").val();
  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
  if (!regex.test(texto)) {
      $("input[name=editaremailusuario]").after('<div class="alert alert-warning">Correo Invalido</div>');
		$("#editaremailusuario").val("");
  } 


})




