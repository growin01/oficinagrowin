
/*******************************************************
CARGAR LA TABLA DINAMICA DE PRODUCTOS
*********************************************************/
	var RncEmpresaProductos = $("#RncEmpresaProductos").val();
   



$('.tablaProductos').DataTable({
	  lengthMenu : [[100, 150, 200,250, 300, -1],[100, 150, 200,250, 300, "Todo"]],

		
        "ajax": "ajax/datatable-productos.ajax.php?RncEmpresaProductos="+RncEmpresaProductos,
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
	},
	dom:"Blfrtip",
            buttons:[
                {extend:'excel',text:'Excel'},
                {extend:'csv',text:'CSV'}    
            ]


    });
$('.productosresumen').DataTable({
    
    lengthMenu : [[100, 150, 200,250, 300, -1],[100, 150, 200,250, 300, "Todo"]],
        "DisplayLength": 100,
     	"paging": true,
        "pageLength": 100,
    	"processing": true,
        "deferRender": true,
        "footerCallback": function ( row, data, start, end, display ) {
              var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
             total = api
                .column(5)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 5 ).footer() ).html(pageTotal.toLocaleString("en-US"));
 
           total = api
                .column(6)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 6, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 6 ).footer() ).html(pageTotal.toLocaleString("en-US"));
    
     total = api
                .column(7)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 7, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 7 ).footer() ).html(pageTotal.toLocaleString("en-US"));
    
total = api
                .column(8)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 8 ).footer() ).html(pageTotal.toLocaleString("en-US"));
    
    total = api
                .column(9)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 9, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 9 ).footer() ).html(pageTotal.toLocaleString("en-US"));
    total = api
                .column(10)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 10, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 10 ).footer() ).html(pageTotal.toLocaleString("en-US"));
   
    },
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
        "retrieve": true,       
        "autoWidth": true,
    dom:"Blfrtip",
            buttons:[
                {extend:'excel',text:'Excel'},
                {extend:'csv',text:'CSV'}    
            ]
 });

$('.librodeinventario').DataTable({


  lengthMenu : [[100, 150, 200, 250, 300, -1],[100, 150, 200, 250, 300, "Todo"]],

    "aaSorting": [],
    "scrollX": true,
    "scrollY": true,
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
      "decimal": ".",//separador decimales
      "thousands": ",",//Separador miles
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
            {extend:'excel',
             text:'Excel', 
             excelStyles: {
             template: 'blue_medium',

            },
             insertCells: [
                                {
                                    cells: 's1',
                                    content: ['Nombre',
                'N°',
                'Cuenta',
                'Nombre Cuenta',
                'Año/Mes',
                'Dia', 
                'Documento',
                'Descripción',
                'Debe',
                'Haber',
                'Fecha Registro',
                ''],
                                    pushRow: true

                                },

                            ],

            },
                {extend:'csv',text:'CSV'},
                
            ]
 });


$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#minlibroinventario').val(), 10 );
        var max = parseInt( $('#maxlibroinventario').val(), 10 );
        var age = parseFloat( data[5] ) || 0; // use data for the age column
 
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
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#mindialibroinventario').val(), 10 );
        var max = parseInt( $('#maxdialibroinventario').val(), 10 );
        var age = parseFloat( data[6] ) || 0; // use data for the age column
 
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
    var table = $('.librodeinventario').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minlibroinventario, #maxlibroinventario').keyup( function() {
        table.draw();
    } );
    $('#mindialibroinventario, #maxdialibroinventario').keyup( function() {
        table.draw();
    } );
   


 } );
/*******************************************************
	CAPTURAR LA CATEGORIA PARA ASIGNAR EL CODIGO
*******************************************************/
$(document).on("change", "#nuevaCategoria", function(){

	var idcategoria = $(this).val();

	var datos = new FormData();
	datos.append("idcategoria", idcategoria);
	console.log("idcategoria", idcategoria);

	$.ajax({
		url: "ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			if(!respuesta){

				var nuevoCodigo = idcategoria+"01";
				$("#nuevoCodigo").val(nuevoCodigo);

			} else {

				var nuevoCodigo = Number(respuesta["Codigo"]) + 1;
				$("#nuevoCodigo").val(nuevoCodigo);

			}
			

		}

	})

})
/*=================================================
	AGREGANDO PRECIO DE COMPRA
===================================================*/
$("#nuevoPrecioCompra, #editarPrecioCompra").change(function(){
	if($(".porcentaje").prop("checked")){

	var valorporcentaje = $(".nuevoPorcentaje").val();

	var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorporcentaje/100))+Number($("#nuevoPrecioCompra").val());

	var editarporcentaje = Number(($("#editarPrecioCompra").val()*valorporcentaje/100))+Number($("#editarPrecioCompra").val());


	$("#nuevoPrecioVenta").val(porcentaje);
	$("#nuevoPrecioVenta").prop("readonly", true);

	$("#editarPrecioVenta").val(editarporcentaje);
	$("#editarPrecioVenta").prop("readonly", true);

	}

	
})




$("input[name=nuevoCodigo]").on('keyup', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');

});
$("input[name=editarCodigo]").on('keyup', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');

});
/*=================================================
	CAMBIO DE PORCENTAJE
===================================================*/
$(".nuevoPorcentaje").change(function(){
	if($(".porcentaje").prop("checked")){

	var valorporcentaje = $(this).val();

	var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorporcentaje/100))+Number($("#nuevoPrecioCompra").val());

	var editarporcentaje = Number(($("#editarPrecioCompra").val()*valorporcentaje/100))+Number($("#editarPrecioCompra").val());

	var nuevoporcentaje = Number(($("#PrecioCompra").val()*valorporcentaje/100))+Number($("#PrecioCompra").val());

	$("#nuevoPrecioVenta").val(porcentaje);
	$("#nuevoPrecioVenta").prop("readonly", true);

	$("#editarPrecioVenta").val(editarporcentaje);
	$("#editarPrecioVenta").prop("readonly", true);

	$("#PrecioVenta").val(nuevoporcentaje);
	$("#PrecioVenta").prop("readonly", true);

	

	}

})
$(".porcentaje").on("ifUnchecked", function(){

	$("#nuevoPrecioVenta").prop("readonly", false);
	$("#editarPrecioVenta").prop("readonly", false);
	$("#PrecioVenta").prop("readonly", false);



})

$(".porcentaje").on("ifChecked", function(){
	var valorporcentaje = $(".nuevoPorcentaje").val();

	var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorporcentaje/100))+Number($("#nuevoPrecioCompra").val());

	var editarporcentaje = Number(($("#editarPrecioCompra").val()*valorporcentaje/100))+Number($("#editarPrecioCompra").val());


	$("#nuevoPrecioVenta").val(porcentaje);
	$("#nuevoPrecioVenta").prop("readonly", true);

	$("#editarPrecioVenta").val(editarporcentaje);
	$("#editarPrecioVenta").prop("readonly", true);

	
	
	$("#nuevoPrecioVenta").prop("readonly", true);
	$("#editarPrecioVenta").prop("readonly", true);


})

/****************************
SUBIENDO FOTO DE USUARIO
******************************/
$(".nuevaImagen").change(function(){
	var imagen = this.files[0];
	
	/***********************************************
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	************************************************/

	if(imagen["type"] !="image/jpeg" && imagen["type"] != "image/png"){

		$(".nuevaImagen").val("");

		/* OJO LAURA ALERTA SUAVE SIN RECARGAR LA PAGINA*/

		swal({
			type: "error",
			title: "¡Error Al subir la imagen!",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			confirmButtonText: "¡Cerrar!"
					
		});

	}/* CIERRE DE SI DE VERIFICAR EL FORMATO DE LA FOTO*/
	else if (imagen["size"] > 10000000){
		$(".nuevaImagen").val("");
		
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

/********************************************
		EDITAR PRODCUTOS
*******************************************/
$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function(){

	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
	datos.append("idProducto", idProducto);


	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			var datosCategorias = new FormData();
			datosCategorias.append("idCategoria", respuesta["id_categorias"]);
								$.ajax({
							url:"ajax/categorias.ajax.php",
							method: "POST",
							data: datosCategorias,
							cache: false,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function(respuesta){
								$("#editarCategoria").val(respuesta["id"]);
								$("#editarCategoria").html(respuesta["Nombre_Categoria"]);
								
								
							}
					})

					$("#idproducto").val(respuesta["id"]);
					$("#editarCodigo").val(respuesta["Codigo"]);
					$("#editarDescripcion").val(respuesta["Descripcion"]);
					$("#editarDescripcion").val(respuesta["Descripcion"]);
					$("#PrecioCompra").val(respuesta["Precio_Compra"]);
					$("#PrecioVenta").val(respuesta["Precio_Venta"]);


if(respuesta["tipoproducto"] == "1"){
	$("#TipoProducto").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select title="Tipo de Producto" class="form-control input" id="Editartipoproducto" name= "Editartipoproducto" required>'+
    '<option value="1">Venta</option>'+
    '<option value="2">Servicio</option>'+
    '<option value="3">Alquiler</option>'+
  '</select>'+
'</div>');



}else if(respuesta["tipoproducto"] == "2"){
	$("#TipoProducto").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select title="Tipo de Producto" class="form-control" id="Editartipoproducto" name= "Editartipoproducto" required>'+
    '<option value="2">Servicio</option>'+
    '<option value="1">Venta</option>'+
    '<option value="3">Alquiler</option>'+
  '</select>'+
'</div>');


}else{

$("#TipoProducto").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select title="Tipo de Producto" class="form-control" id="Editartipoproducto" name= "Editartipoproducto" required>'+
    '<option value="3">Alquiler</option>'+
    '<option value="1">Venta</option>'+
    '<option value="2">Servicio</option>'+
  '</select>'+
'</div>');

}

					
	$("#cuentaProducto").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select title="Partida Contable del Producto" class="form-control" id="Editar-plancuentaProducto" name= "Editar-plancuentaProducto" required>'+
    '<option value="'+respuesta["id_subgenerica_Venta"]+'">'+respuesta["id_grupo_Venta"]+'.'+respuesta["id_categoria_Venta"]+'.'+respuesta["id_generica_Venta"]+'.'+respuesta["id_cuenta_Venta"]+'_'+respuesta["Nombre_CuentaContable_Venta"]+'</option>'+
  '</select>'+
'</div>');

					if(respuesta["Imagen"] != ""){ 

					$("#imagenActual").val(respuesta["Imagen"]);
					$(".previsualizar").attr("src", respuesta["Imagen"]);

					}


					
		}
})


})
$(".tablaProductos tbody").on("click", "button.btnsumarProducto", function(){

	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
	datos.append("idProducto", idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			var datosCategorias = new FormData();
			datosCategorias.append("idCategoria", respuesta["id_categorias"]);
								$.ajax({
							url:"ajax/categorias.ajax.php",
							method: "POST",
							data: datosCategorias,
							cache: false,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function(respuesta){
								$("#editarCategoria").val(respuesta["id"]);
								$("#editarCategoria").html(respuesta["Nombre_Categoria"]);
								
								
							}
					})

					$("#Sumaidproducto").val(idProducto);
					$("#sumarTipoProducto").val(respuesta["tipoproducto"]);
					$("#tipoproducto").val(idProducto);
					$("#sumarproductoCodigo").val(respuesta["Codigo"]);
					$("#sumarproductoDescripcion").val(respuesta["Descripcion"]);
					$("#StockAnteriorsuma").val(respuesta["Stock"]);
					$("#nuevoPrecioCompra").val(respuesta["Precio_Compra"]);
					$("#nuevoPrecioVenta").val(respuesta["Precio_Venta"]);
	

					if(respuesta["Imagen"] != ""){ 

					$("#imagenActual").val(respuesta["Imagen"]);
					$(".previsualizar").attr("src", respuesta["Imagen"]);

					}


					
		}
})


})
$(".tablaProductos tbody").on("click", "button.btnrestarProducto", function(){

	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
	datos.append("idProducto", idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			var datosCategorias = new FormData();
			datosCategorias.append("idCategoria", respuesta["id_categorias"]);
								$.ajax({
							url:"ajax/categorias.ajax.php",
							method: "POST",
							data: datosCategorias,
							cache: false,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function(respuesta){
								$("#editarCategoria").val(respuesta["id"]);
								$("#editarCategoria").html(respuesta["Nombre_Categoria"]);
								
								
							}
					})

					$("#Restaidproducto").val(idProducto);
					$("#RestaTipoProducto").val(respuesta["tipoproducto"]);
					$("#tipoproducto").val(idProducto);
					$("#restarproductoCodigo").val(respuesta["Codigo"]);
					$("#restarproductoDescripcion").val(respuesta["Descripcion"]);
					$("#StockAnteriorrestar").val(respuesta["Stock"]);
					$("#editarPrecioCompra").val(respuesta["Precio_Compra"]);
					$("#editarPrecioVenta").val(respuesta["Precio_Venta"]);
	

					if(respuesta["Imagen"] != ""){ 

					$("#imagenActual").val(respuesta["Imagen"]);
					$(".previsualizar").attr("src", respuesta["Imagen"]);

					}


					
		}
})


})
/******************************************************
				ELIMINAR PRODUCTO
********************************************************/
$(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function(){

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
			
			window.location = "index.php?ruta=productos&idProducto="+idProducto+"&Imagen="+Imagen+"&Codigo="+Codigo;
					}
		
		});


	})
$(document).on("click", ".btnresumenproductos", function(){

  var FechaanomesDesde = $("#FechaDesdeproductos").val();
  var FechaanomesHasta = $("#FechaHastaproductos").val();
  var FechadiaDesde = $("#Fechadiadesde").val();
  var FechadiaHasta = $("#Fechadiahasta").val();

  var FechaDesde = FechaanomesDesde+FechadiaDesde;
  var FechaHasta = FechaanomesHasta+FechadiaHasta;
  



  if(FechaanomesDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaanomesHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      confirmButtonText: "¡Cerrar!"
          
    });

}else if(FechadiaDesde == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha día Desde y una Fecha Hasta Válida!",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      confirmButtonText: "¡Cerrar!"
          
    });

} 
else if(FechadiaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha día Desde y una Fecha Hasta Válida!",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      confirmButtonText: "¡Cerrar!"
          
    });

} 
else{
  window.location = "index.php?ruta=productosresumen&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&FechaanomesDesde="+FechaanomesDesde+"&FechaanomesHasta="+FechaanomesHasta+"&FechadiaDesde="+FechadiaDesde+"&FechadiaHasta="+FechadiaHasta;



}


  
})


$("input[name=nuevaDescripcion]").on('input', function(){
	
	 this.value = this.value.replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.()%*-+ ]/g,'');

});
$("input[name=nuevoStock]").on('input', function(){
	
	 this.value = this.value.replace(/[^0-9]/g,'');

});
$("input[name=nuevoPrecioCompra]").on('input', function(){
	
	 this.value = this.value.replace(/[^0-9.]/g,'');

}); 
$("input[name=nuevoPrecioVenta]").on('input', function(){
	
	 this.value = this.value.replace(/[^0-9.]/g,'');

}); 
$("input[name=editarDescripcion]").on('input', function(){
	
	 this.value = this.value.replace(/[^a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.()%*-+ ]/g,'');

});
$("input[name=editarStock]").on('input', function(){
	
	 this.value = this.value.replace(/[^0-9]/g,'');

});
$("input[name=editarPrecioCompra]").on('input', function(){
	
	 this.value = this.value.replace(/[^0-9.]/g,'');

}); 
$("input[name=editarPrecioVenta]").on('input', function(){
	
	 this.value = this.value.replace(/[^0-9.]/g,'');

}); 

$(document).on("click", "#Editar-plancuentaProducto", function(){
 
  var RncEmpresaProducto = $("#RncEmpresaProductos").val();
  var idgrupo = 4;
 
 var datos = new FormData();
  datos.append("RncEmpresaProducto", RncEmpresaProducto);
  datos.append("idgrupo", idgrupo);
  
  
  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);
      
      if(respuesta != false){ 
         $("#cuentaProducto").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input" id="EditarplancuentaProducto" name="EditarplancuentaProducto" required>'+
              '<option value="">Selecionar Cuenta Contable del Producto</option>'+
              
              '</select>'+

            '</div>');
 

              var registro = 0;
              select = document.getElementById("EditarplancuentaProducto");

                      for (let item of respuesta){ 
                        var registro = registro + 1; 

                          option = document.createElement("option");
                          option.value = item.id;
                          option.text = item.id_grupo+'.'+item.id_categoria+'.'+item. id_generica+'.'+item.id_subgenerica+'_'+item.Nombre_subCuenta;
                          select.appendChild(option);
            }     
        } 
        }

    });
  


  })



$(".tablaProductos").on("click", ".btnCodigoBarra", function(){

	var CodigoBarra = $(this).attr("CodigoBarra");
	var MaquetaBarra = $(this).attr("MaquetaBarra");

	window.open("extensiones/tcpdf/pdf/CodigoBarra.php?CodigoBarra="+CodigoBarra+"&MaquetaBarra="+MaquetaBarra, "_blank");


})
