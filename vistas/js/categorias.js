
/*************************************
	EDITAR CATEGORIAS
**************************************/
$(document).on("click", ".btnEditarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);
	

	$.ajax({
		url:"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

		
			$("#editarCategoria").val(respuesta["Nombre_Categoria"]);
			$("#idCategoria").val(respuesta["id"]);

	
		
		}




	});


})
$(document).on("click", ".btnEditarCategoriaActivoF", function(){

	var idCategoriaActivoF = $(this).attr("idCategoriaActivoF");

	var datos = new FormData();
	datos.append("idCategoriaActivoF", idCategoriaActivoF);
	

	$.ajax({
		url:"ajax/categoriasActivoF.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
		
		
			$("#editarCategoria").val(respuesta["Nombre_Categoria_ActivoF"]);
			$("#editarcodigocategorias").val(respuesta["Codigo_CategoriaActivoF"]);
			$("#idCategoria").val(respuesta["id"]);

	
		
		}




	});


})
$(document).on("click", ".btnEditarCategoriaActivoR", function(){

	var idCategoriaActivoR = $(this).attr("idCategoriaActivoR");

	var datos = new FormData();
	datos.append("idCategoriaActivoR", idCategoriaActivoR);
	

	$.ajax({
		url:"ajax/categoriasActivoR.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
		
		
			$("#editarCategoria").val(respuesta["Nombre_Categoria_ActivoR"]);
			$("#editarcodigocategorias").val(respuesta["Codigo_CategoriaActivoR"]);
			$("#idCategoria").val(respuesta["id"]);

	
		
		}




	});


})
/*************************************
	Eliminar CATEGORIAS
**************************************/
$(document).on("click", ".btnEliminarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");

	swal({
			title: '¿Esta usted Seguro de Borrar la Categoria?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Categoria",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
					}
		});

	
})
$(document).on("click", ".btnEliminarCategoriaActivoR", function(){

	var idCategoriaActivoR = $(this).attr("idCategoriaActivoR");

	swal({
			title: '¿Esta usted Seguro de Borrar la Categoria?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Categoria",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=CategoriasActivoRotativos&idCategoriaActivoR="+idCategoriaActivoR;
					}
		});

	
})
$(document).on("click", ".btnEliminarCategoriaActivoF", function(){

	var idCategoriaActivoF = $(this).attr("idCategoriaActivoF");

	swal({
			title: '¿Esta usted Seguro de Borrar la Categoria?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Categoria",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=CategoriasActivoFijo&idCategoriaActivoF="+idCategoriaActivoF;
					}
		});

	
})
/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("#nuevaCategoria").change(function(){
	$(".alert").remove();
	
	var Categoria = $(this).val();
	var RncEmpresaCategoria = $("#RncEmpresaCategoria").val();

	var datos = new FormData();
	datos.append("validarCategoria", Categoria);
	datos.append("RncEmpresaCategoria", RncEmpresaCategoria);

	$.ajax({
		url:"ajax/categorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			if(respuesta){

				$("#nuevaCategoria").parent().after('<div class="alert alert-warning">Esta Categoria ya existe en la Bases de datos</div>');
				$("#nuevaCategoria").val("");


			}


			}
		 })

})


