

var RncEmpresaActivoR = $("#RncEmpresaActivoR").val();


$('.tablaProductosActivoR').DataTable({
			
		
       "ajax": "ajax/datatable-productosActivoR.ajax.php?RncEmpresaActivoR="+RncEmpresaActivoR,
    	"deferRender": true,
    	"retrieve": true,
    	"processing": true,

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
	}


    });


$(document).on("change", "#nuevaCategoriaActivoR", function(){

	var RncEmpresa = $("#RncEmpresaActivoR").val();
	var idcategoria = $(this).val();

	var datos = new FormData();
	datos.append("RncEmpresa", RncEmpresa);
	datos.append("idcategoria", idcategoria);
	
	$.ajax({
		url: "ajax/productosactivor.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
	if(!respuesta){

			var nuevoCodigo = "0001";
			var codigocompleto =  idcategoria+nuevoCodigo;
			var maqueta = idcategoria+'-'+nuevoCodigo;
			$("#nuevoCodigoActivoR").val(nuevoCodigo);
			
			$("#CodigoCompletoActivoR").val(codigocompleto);
			$("#maquetaCompletoActivoR").val(maqueta);
	
	} else {

		var codigo = respuesta["codigo_categorias"];
		var codigoProducto = +codigo + 1;
		const fill = (codigoNCF, len) => "0".repeat(len - codigoProducto.toString().length) + codigoProducto.toString();
		
		var numero = fill(codigoProducto, 4);

		var nuevoCodigo = numero;	
		$("#nuevoCodigoActivoR").val(nuevoCodigo);
		
		var codigocompleto =  idcategoria+nuevoCodigo;
		var maqueta = idcategoria+'-'+nuevoCodigo;
			
		$("#CodigoCompletoActivoR").val(codigocompleto);
		$("#maquetaCompletoActivoR").val(maqueta);
	
	}
			
		}

	})

})

$(document).on("keyup", "#UbicacionProducto", function(){
var idempresa = $("#id_Empresa").val();
var nuevaCategoriaActivoR = $("#nuevaCategoriaActivoR").val();
var nuevoCodigoActivoR = $("#nuevoCodigoActivoR").val();
var UbicacionProducto = $(this).val();

var codigo = UbicacionProducto+nuevaCategoriaActivoR+nuevoCodigoActivoR;
var maqueta = UbicacionProducto+"-"+nuevaCategoriaActivoR+"-"+nuevoCodigoActivoR;

$("#CodigoCompletoActivoR").val(codigo);	
$("#maquetaCompletoActivoR").val(maqueta);

 var data = $("#CodigoCompletoActivoR").val();
   $("#imagen").html('<img src="extensiones/phpbarcode/barcode.php?text='+data+'&size=90&codetype=Code39&print=true"/>');
	
})


 




$(".tablaProductosActivoR").on("click", ".btnCodigoBarra", function(){

	var CodigoBarra = $(this).attr("CodigoBarra");
	var MaquetaBarra = $(this).attr("MaquetaBarra");

	window.open("extensiones/tcpdf/pdf/CodigoBarra.php?CodigoBarra="+CodigoBarra+"&MaquetaBarra="+MaquetaBarra, "_blank");


})

$(document).on("click", "#disparacodigo", function(){

	var CodigoBarra = $("#CodigoCompletoActivoR").val();
	var MaquetaBarra = $("#maquetaCompletoActivoR").val();

	window.open("extensiones/tcpdf/pdf/CodigoBarra.php?CodigoBarra="+CodigoBarra+"&MaquetaBarra="+MaquetaBarra, "_blank");


})


/********************************************
		EDITAR PRODCUTOS
*******************************************/
$(".tablaProductosActivoR tbody").on("click", "button.btnEditarActivor", function(){

	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
	datos.append("idProducto", idProducto);


	$.ajax({
		url:"ajax/productosactivor.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			var codigocategorias = respuesta["codigo_categorias"];
			var RncEmpresaActivoR = $("#RncEmpresaActivoR").val();

			var datosCategorias = new FormData();
			datosCategorias.append("codigocategorias", codigocategorias);
			datosCategorias.append("RncEmpresaActivoR", RncEmpresaActivoR);
					
					$.ajax({
							url:"ajax/categoriasActivoR.ajax.php",
							method: "POST",
							data: datosCategorias,
							cache: false,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function(respuesta){
								$("#editarCategoria").val(respuesta["Codigo_CategoriaActivoR"]);
								$("#editarCategoria").html(respuesta["Nombre_Categoria_ActivoR"]);
								
								
							}
					})
			$("#idActivoR").val(respuesta["id"]);
			$("#editarCodigoActivoR").val(respuesta["codigo_producto"]);
			$("#EditarUbicacionProducto").val(respuesta["ubicacion"]);
			$("#EditarmaquetaCompletoActivoR").val(respuesta["maquetacodigo_completo"]);
			$("#AntesEditarmaquetaCompletoActivoR").val(respuesta["maquetacodigo_completo"]);
			$("#EditarCodigoCompletoActivoR").val(respuesta["Codigo"]);
			$("#editarDescripcion").val(respuesta["Descripcion"]);
			$("#editarStock").val(respuesta["Stock"]);
			$("#editarPrecioCompra").val(respuesta["Precio_Compra"]);
			$("#editarPrecioVenta").val(respuesta["Precio_Venta"]);
			$("#cuentaProducto").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-plancuentaProducto" name= "Editar-plancuentaProducto" required>'+
    '<option value="'+respuesta["id_subgenerica_Venta"]+'">'+respuesta["id_grupo_Venta"]+'.'+respuesta["id_categoria_Venta"]+'.'+respuesta["id_generica_Venta"]+'.'+respuesta["id_cuenta_Venta"]+'_'+respuesta["Nombre_CuentaContable_Venta"]+'</option>'+
  '</select>'+
'</div>');



	var data = respuesta["codigo_completo_productos"];
   $("#Editarimagen").html('<img src="extensiones/phpbarcode/barcode.php?text='+data+'&size=90&codetype=Code39&print=true"/>');

					if(respuesta["Imagen"] != ""){ 

					$("#imagenActual").val(respuesta["Imagen"]);
					$(".previsualizar").attr("src", respuesta["Imagen"]);

					}



					
		}
})


})


$(document).on("keyup", "#EditarUbicacionProducto", function(){
var idempresa = $("#id_Empresa").val();
var nuevaCategoriaActivoR = $("#editarCategoria").val();
var nuevoCodigoActivoR = $("#editarCodigoActivoR").val();
var UbicacionProducto = $(this).val();

var codigo = UbicacionProducto+nuevaCategoriaActivoR+nuevoCodigoActivoR;
var maqueta = UbicacionProducto+"-"+nuevaCategoriaActivoR+"-"+nuevoCodigoActivoR;

$("#EditarCodigoCompletoActivoR").val(codigo);	
$("#EditarmaquetaCompletoActivoR").val(maqueta);

 var data = $("#EditarCodigoCompletoActivoR").val();
   $("#Editarimagen").html('<img src="extensiones/phpbarcode/barcode.php?text='+data+'&size=90&codetype=Code39&print=true"/>');
	
})


$("#habilitarubicacion").change(function(){
	if($("#habilitarubicacion").prop("checked")){
		$("#EditarUbicacionProducto").prop("readonly", false);

	}else{
		$("#EditarUbicacionProducto").prop("readonly", true);

	}
 })
$(".tablaProductosActivoR tbody").on("click", "button.btnEliminarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	var Codigo = $(this).attr("Codigo");
	var Imagen = $(this).attr("Imagen");

	swal({
			title: '¿Esta usted Seguro de Borrar El Producto?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Producto",
			}).then(function(result){

		if(result.value){
			
			window.location = "index.php?ruta=ProductosActivoRotativos&idProducto="+idProducto+"&Imagen="+Imagen+"&Codigo="+Codigo;
					}
		
		});


	})
