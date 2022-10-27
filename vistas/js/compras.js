
var RncEmpresaCompras = $("#RncEmpresaCompras").val();
$(".compras").DataTable({

	

 	 lengthMenu : [[100, 150, 200,250, 300, -1],[100, 150, 200,250, 300, "Todo"]],
 	 	"aaSorting": [],
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
    
total = api
                .column(11)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 11, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 11 ).footer() ).html(pageTotal.toLocaleString("en-US"));
    
    total = api
                .column(12)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 12, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 12 ).footer() ).html(pageTotal.toLocaleString("en-US"));
    total = api
                .column(13)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 13, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 13 ).footer() ).html(pageTotal.toLocaleString("en-US"));

    

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

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#mincompras').val(), 10 );
        var max = parseInt( $('#maxcompras').val(), 10 );
        var age = parseFloat( data[4] ) || 0; // use data for the age column
 
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
        var min = parseInt( $('#mindiacompras').val(), 10 );
        var max = parseInt( $('#maxdiacompras').val(), 10 );
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

$(document).ready(function() {
    var table = $('.compras').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#mincompras, #maxcompras').keyup( function() {
        table.draw();
    } );
    $('#mindiacompras, #maxdiacompras').keyup( function() {
        table.draw();
    } );
   


 } );

$(".tablaCompras").DataTable({


		
        "ajax": "ajax/datatable-compras.ajax.php?RncEmpresaCompras="+RncEmpresaCompras,
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



$("#agregarSuplidor").change(function(){
	
	var idsuplidor = $(this).val();
	var RncEmpresasuplidoreditar = $("#RncEmpresaCompras").val()

	var datos = new FormData();
	datos.append("idsuplidor", idsuplidor);
	datos.append("RncEmpresasuplidoreditar", RncEmpresasuplidoreditar);
	console.log("idsuplidor", idsuplidor);
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

				if(respuesta["Tipo_Suplidor"] == "1"){
						$("#JuridicoSuplidorFactura").attr('checked', true);
						$("#FisicoSuplidorFactura").attr('checked', false);  
				}else{

					 $("#JuridicoSuplidorFactura").attr('checked', false);
					 $("#FisicoSuplidorFactura").attr('checked', true); 
				}

				$("#RncSuplidorFactura").val(respuesta["Documento_Suplidor"]);	
				$("#Nombre_Suplidor").val(respuesta["Nombre_Suplidor"]);
				$("#nuevoTelefono").val(respuesta["Telefono"]);
				$("#nuevoEmail").val(respuesta["Email"]);

			}else{

				$("#RncSuplidorFactura").val("");	
				$("#Nombre_Suplidor").val("");
				$("#nuevoTelefono").val("");
				$("#nuevoEmail").val("");

	

			}
		 }
	});
	
});

/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("#RncSuplidorFactura").keyup(function(){

	if (event.keyCode === 8) {
    $("#agregarSuplidor").val("");
    $("#Nombre_Suplidor").val("");
    
    }
	
	$("#Nombre_Suplidor").val("");
				
	var RncSuplidor = $(this).val();
	var RncEmpresasuplidorvalidar = $("#RncEmpresaCompras").val();

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

				if(respuesta["Tipo_Suplidor"] == "1"){
						$("#JuridicoSuplidorFactura").attr('checked', true);
						$("#fisicoSuplidorFactura").attr('checked', false);  
				}else{

					 $("#JuridicoSuplidorFactura").attr('checked', false);
					 $("#fisicoSuplidorFactura").attr('checked', true); 
				}

				$("#agregarSuplidor").val(respuesta["id"]);
				$("#Nombre_Suplidor").val(respuesta["Nombre_Suplidor"]);
				

			}else{
				var RncCliente = $("#RncSuplidorFactura").val();
				
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
						
				if(respuesta){
					$("#Nombre_Suplidor").val(respuesta["Nombre_Empresa_DGII"]);

				}
			}


			});
			}
		 }
	});
});

$(".tablaCompras tbody").on("click", "button.agregarProducto", function (){

	var idProducto = $(this).attr("idProducto");

	$(this).removeClass("btn-primary agregarProducto");
	$(this).addClass("btn-default");

	var datos = new FormData();
	datos.append("idProducto", idProducto);

			$.ajax({
				url: "ajax/productos.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){

					var descripcion = respuesta["Descripcion"];
					var tipoproducto = respuesta["tipoproducto"];
					var stock = respuesta["Stock"];
					var preciocompra = respuesta["Precio_Compra"];
					var porcentaje = respuesta["Porcentaje"];
					var precioventa = respuesta["Precio_Venta"];
					
				
		$(".CompraProducto").append(
			'<div class="row">'+

				'<div class="col-xs-3" style="padding-right:0px">'+
                      
                     '<div class="input-group">'+
                        
                        '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button>'+'</span>'+
                        '<input type="hidden" class="form-control tipoproducto" tipoproducto="'+tipoproducto+'" name="tipoproducto" value="'+tipoproducto+'" readonly required>'+    
                        '<input type="hidden" class="form-control stockanterior" name="stockanterior" value="'+stock+'" readonly required>'+
                        '<input title = "Descripcion Producto" type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+

                      '</div>'+
                      

                  '</div>'+


                  '<div class="col-xs-1 ingresoCantidad" style="padding:0px">'+
                  

                      '<input title = "Cantidad de Producto a agregar al inventario" type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" Stock="'+stock+'" nuevoStock="'+Number(stock+1)+'" required>'+
                  
                  
                   '</div>'+
                    

                   '<div class="col-xs-2 ingresoPrecio" style="padding:0px">'+
                      
                    '<div class="input-group">'+
                     '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        '<input title = "Precio de Compra del producto" type="text"  class="form-control nuevoPrecioProducto"  name="nuevoPrecioProducto" value="'+preciocompra+'" required>'+ 
                        
                      '</div>'+
                    '</div>'+

               '<div class="col-xs-1" style="padding:0px">'+
                '<div class="input-group">'+
                  '<input title = "Porcentaje de Gananacia del Producto" type="number" class="form-control nuevoPorcentaje" id="nuevoPorcentaje" name="nuevoPorcentaje" min="0" value="'+porcentaje+'" required>'+
                  
                  
                '</div>'+
                
              '</div>'+
               '<div class="col-xs-2 ingresoPrecioVenta" style="padding:0px">'+
                      
                     '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        '<input title = "Precio de Venta del Producto" type="text"  class="form-control nuevoPrecioVenta"  name="nuevoPrecioVenta" value="'+precioventa+'" required readonly>'+ 
                        
                     '</div>'+
                '</div>'+
                    
                    '<div class="col-xs-2 ingresoTotal" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        
                        
                        '<input title = "Total compra del Producto" type="text" class="form-control TotalPrecioProducto" name="TotalPrecioProducto" value="'+preciocompra+'" required readonly>'+ 
                        
                      '</div>'+
                      '</div>'+

                    '</div>');

                    // SUMAR PRODUCTOS
                    sumarTotalPreciosCompras();
                    listarProductosCompras();              
					agregarImpuestoCompras();
			
			}

					
				
				

				})

});
/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");


$(".comprasinventario").on("click", "button.quitarProducto", function (){

	$(this).parent().parent().parent().parent().remove();

	var idProducto = $(this).attr("idProducto");

	/******************************************
	ALMACENAR EL ID DEL PORDUCTO A QUITAR
	*******************************************/

	if(localStorage.getItem("quitarProducto") == null){

		idQuitarProducto = [];


	} else {

			idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

	}

		idQuitarProducto.push({"idProducto":idProducto});

		localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

	$("button.recuperarBoton[idProducto='"+idProducto+"']").removeClass('btn-default');

	$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');
	

	if($(".CompraProducto").children().length == 0){

		$("#NetoTotalCompra").val(0);
		$("#NetoCompra").val(0);
		$("#TotalCompravi").val(0);
		$("#TotalCompra").val(0);
		$("#TotalITBISvi").val(0);
		$("#TotalITBIS").val(0);
	

	} else {

	
	}
	listarProductosCompras();
	sumarTotalPreciosCompras();
	agregarImpuestoCompras();

				
			

});

$(".comprasinventario").on("keyup", "input.nuevaCantidadProducto", function(){
	
	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var totalproducto = $(this).parent().parent().children(".ingresoTotal").children().children(".TotalPrecioProducto");
	var porcentaje = $(this).parent().parent().children().children().children(".nuevoPorcentaje");

	
	var ingresoPrecioVenta = $(this).parent().parent().children(".ingresoPrecioVenta").children().children(".nuevoPrecioVenta");

	
	var precioFinal = $(this).val() * precio.val();
	totalproducto.val(precioFinal);

	/*porcetaje de ganancia*/
	var ganancia = (precio.val() * porcentaje.val())/100;
	
	/*precio venta*/

	var precioventa = Number(precio.val()) + Number(ganancia);

	ingresoPrecioVenta.val(precioventa);

	 listarProductosCompras();
	 sumarTotalPreciosCompras();
	 agregarImpuestoCompras();
	


});
$(".comprasinventario").on("click", "input.nuevaCantidadProducto", function(){
	
	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var totalproducto = $(this).parent().parent().children(".ingresoTotal").children().children(".TotalPrecioProducto");
	var porcentaje = $(this).parent().parent().children().children().children(".nuevoPorcentaje");

	
	var ingresoPrecioVenta = $(this).parent().parent().children(".ingresoPrecioVenta").children().children(".nuevoPrecioVenta");

	
	var precioFinal = $(this).val() * precio.val();
	totalproducto.val(precioFinal);

	/*porcetaje de ganancia*/
	var ganancia = (precio.val() * porcentaje.val())/100;
	
	/*precio venta*/

	var precioventa = Number(precio.val()) + Number(ganancia);

	ingresoPrecioVenta.val(precioventa);

	 listarProductosCompras();
	 sumarTotalPreciosCompras();
	 agregarImpuestoCompras();
	


});
$(".comprasinventario").on("keyup", "input.nuevoPrecioProducto", function(){
	this.value = this.value.replace(/[^0-9.]/g,'');
	var cantidad = $(this).parent().parent().parent().children().children(".nuevaCantidadProducto");
	var totalproducto = $(this).parent().parent().parent().children(".ingresoTotal").children().children(".TotalPrecioProducto");
	var porcentaje = $(this).parent().parent().parent().children().children().children(".nuevoPorcentaje");

	
	var ingresoPrecioVenta = $(this).parent().parent().parent().children(".ingresoPrecioVenta").children().children(".nuevoPrecioVenta");
	var precioFinal = $(this).val() * cantidad.val();
	totalproducto.val(precioFinal);

	/*porcetaje de ganancia*/
	var ganancia = ($(this).val() * porcentaje.val())/100;
	
	/*precio venta*/

	var precioventa = Number($(this).val()) + Number(ganancia);

	ingresoPrecioVenta.val(precioventa);


	 listarProductosCompras();
	 sumarTotalPreciosCompras();
	 agregarImpuestoCompras();
	


});

$(".comprasinventario").on("keyup", "input.nuevoPorcentaje", function(){
	
	var precio = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var cantidad = $(this).parent().parent().parent().children().children(".nuevaCantidadProducto");
	var totalproducto = $(this).parent().parent().parent().children(".ingresoTotal").children().children(".TotalPrecioProducto");
	var ingresoPrecioVenta = $(this).parent().parent().parent().children(".ingresoPrecioVenta").children().children(".nuevoPrecioVenta");
	
	
var precioFinal = Number(precio.val()) * Number(cantidad.val());
	totalproducto.val(precioFinal);

	/*porcetaje de ganancia*/
	var ganancia = (Number(precio.val()) * $(this).val())/100;
	
	/*precio venta*/

	var precioventa = Number(precio.val()) + Number(ganancia);

	ingresoPrecioVenta.val(precioventa);


	 listarProductosCompras();
	 sumarTotalPreciosCompras();
	 agregarImpuestoCompras();
	

});
$(".comprasinventario").on("click", "input.nuevoPorcentaje", function(){
	
	var precio = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var cantidad = $(this).parent().parent().parent().children().children(".nuevaCantidadProducto");
	var totalproducto = $(this).parent().parent().parent().children(".ingresoTotal").children().children(".TotalPrecioProducto");
	var ingresoPrecioVenta = $(this).parent().parent().parent().children(".ingresoPrecioVenta").children().children(".nuevoPrecioVenta");
	
	
var precioFinal = Number(precio.val()) * Number(cantidad.val());
	totalproducto.val(precioFinal);

	/*porcetaje de ganancia*/
	var ganancia = (Number(precio.val()) * $(this).val())/100;
	
	/*precio venta*/

	var precioventa = Number(precio.val()) + Number(ganancia);

	ingresoPrecioVenta.val(precioventa);


	 listarProductosCompras();
	 sumarTotalPreciosCompras();
	 agregarImpuestoCompras();
	

});

function sumarTotalPreciosCompras(){

	var precioItem = $(".TotalPrecioProducto");
	var arraySumaPrecio = [];

	for (var i = 0; i < precioItem.length; i++){

		arraySumaPrecio.push(Number($(precioItem[i]).val()));


	}

	function sumaArrayPrecios(total, numero){

		return total + numero;


	}

	var sumarTotalPrecios = arraySumaPrecio.reduce(sumaArrayPrecios);

	$("#NetoTotalCompra").val(sumarTotalPrecios);
	$("#NetoTotalCompra").number(true, 2);
	$("#NetoCompra").val(sumarTotalPrecios);
	
}
function agregarImpuestoCompras(){
var isChecked = document.getElementById('HabilitarITBIS').checked;
	var impuesto = $("#PORITBIS").val();

	var isc = $("#TotalISC").val();

	var otrosImp = $("#TotalOtrosImp").val();

	var precioNeto = $("#NetoCompra").val();

	var TotalRet = $("#TotalRet").val();

	var impuesto = Number(precioNeto * impuesto/100);

	let t = impuesto.toFixed(5);
  	let regex=/(\d*.\d{0,2})/;
    var TotalITBIS = t.match(regex)[0];
var totalConImpuesto = Number(TotalITBIS) + Number(isc)+ Number(otrosImp) + Number(precioNeto) - Number(TotalRet);
	
	

if(isChecked){
  
	var totalConImpuesto = Number($("#TotalITBIS").val()) + Number($("#TotalISC").val())+ Number($("#TotalOtrosImp").val()) + Number(precioNeto) - Number(TotalRet);

	$("#TotalCompravi").val(totalConImpuesto);
	$("#TotalCompravi").number(true, 2);
	$("#TotalCompra").val(totalConImpuesto);
}else{
	
	$("#TotalITBIS").val(TotalITBIS);
	$("#TotalITBISvi").val(TotalITBIS);
	$("#TotalISC").val(isc);
	$("#TotalISCvi").val(isc);
	$("#TotalOtrosImpvi").val(otrosImp);
	$("#TotalOtrosImp").val(otrosImp);
	
	$("#TotalCompravi").val(totalConImpuesto);
	$("#TotalCompravi").number(true, 2);
	$("#TotalCompra").val(totalConImpuesto);

}

}
$(".comprasinventario").on("click", "#PORITBIS", function(){
	
	agregarImpuestoCompras();
	listarProductosCompras();
	sumarTotalPreciosCompras();
	

});
$(".comprasinventario").on("keyup", "#PORITBIS", function(){
	
	agregarImpuestoCompras();
	listarProductosCompras();
	sumarTotalPreciosCompras();
	

});
$(".comprasinventario").on("click", "#HabilitarITBIS", function(){
	
	$("#TotalITBISvi").val(); 
	$("#TotalITBIS").val(); 

  
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
     $("#TotalITBISvi").prop('readonly', false);
       
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
         
        $("#TotalITBISvi").prop('readonly', true);
    }
});

$(".comprasinventario").on("keyup", "#TotalITBISvi", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  var totalITBISvi = $("#TotalITBISvi").val();

 
 $("#TotalITBIS").val(totalITBISvi);
	
	agregarImpuestoCompras();
	listarProductosCompras();
	sumarTotalPreciosCompras();
      

});
$(".comprasinventario").on("keyup", "#TotalISCvi", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  var TotalISCvi = $("#TotalISCvi").val();

 
 $("#TotalISC").val(TotalISCvi);
	
	agregarImpuestoCompras();
	listarProductosCompras();
	sumarTotalPreciosCompras();
      

});
$(".comprasinventario").on("keyup", "#TotalOtrosImpvi", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  var TotalOtrosImpvi = $("#TotalOtrosImpvi").val();

 
 $("#TotalOtrosImp").val(TotalOtrosImpvi);
	
	agregarImpuestoCompras();
	listarProductosCompras();
	sumarTotalPreciosCompras();
      

});

/**************************proyecto  proyecto proyecto proyecto******/
var numProyecto = 0;
$(".comprasinventario").on("click", ".agregarproyecto", function (){

 numProyecto ++;

	var RncEmpresaProyectos = $("#RncEmpresaCompras").val();
	var datos = new FormData();
  
  datos.append("RncEmpresaProyectos", RncEmpresaProyectos);
  $.ajax({
    url: "ajax/proyecto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

       $(".ProyectoGastos").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-1" style="padding-right:0px">'+
                    '<div class="input-group">'+
                            
                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarproyecto" id="'+numProyecto+'"><i class="fa fa-times"></i></button>'+
                          '</span>'+
                          '<input type="text" class="form-control num" id="num" num="'+numProyecto+'" name="num" value="'+numProyecto+'" required readonly>'+ 
                            
                      '</div>'+
                      '</div>'+

                      '<div input-group class="col-xs-2" style="padding-left:0px">'+
                         '<select type="text" class="form-control proyecto"  id="proyecto'+numProyecto+'" name="proyecto" required>'+
                               '<option value="">Proyecto</option>'+
                          '</select>'+
                        
                      '</div>'+
                       '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control MontoDistribuido" id="MontoDistribuido" name="MontoDistribuido" value = "0" required>'+ 
                        
                      '</div>'+
                      '</div>'+

                       

                    '</div>');
             respuesta.forEach(funcionForEach);

                    function funcionForEach(item, index){

                  if(item.estatus == 1){
                      $("#proyecto"+numProyecto).append(
                        '<option idProyecto="'+item.id+'" value="'+item.id+'">'+item.CodigoProyecto+'</option>'

                        )


                   }
       
            } 

            
            //AGRUPAR productos JSON

              listarProyecto();

        } 

    });


});


function listarProyecto(){

	var listaProyecto = [];

	var num = $(".num");
	var proyecto = $(".proyecto");
	var montoDistribuido = $(".MontoDistribuido")

	for(var i = 0; i < proyecto.length; i++){

		listaProyecto.push({ "id" : $(num[i]).attr("num"), 
							  "proyecto" : $(proyecto[i]).val(),
							  "montoDistribuido" : $(montoDistribuido[i]).val()
							  

	})


}
$("#listaProyecto").val(JSON.stringify(listaProyecto)); 

}

$(".comprasinventario").on("click", ".proyecto", function(){
	
	listarProyecto();

});
$(".comprasinventario").on("keyup", ".MontoDistribuido", function(){
	 this.value = this.value.replace(/[^0-9.]/g,'');
	
	listarProyecto();
	sumarMontoDistribuido();

});



function sumarMontoDistribuido(){

	var montoproyecto = $(".MontoDistribuido");
	var arraySumaPrecio = [];

	 if(montoproyecto.length > 0){ 

	for (var i = 0; i < montoproyecto.length; i++){

		arraySumaPrecio.push(Number($(montoproyecto[i]).val()));

	}

	function sumaArrayPrecios(total, numero){

		return total + numero;

	}

	var sumarTotalPrecios = arraySumaPrecio.reduce(sumaArrayPrecios);

 }/*cierre if*/
 

	$("#montodisvi").val(sumarTotalPrecios);
	$("#montodisvi").number(true, 2);
	$("#montodis").val(sumarTotalPrecios);
	
	var montodis = $("#montodis").val();
	var subtotal = $("#NetoCompra").val();
	
	

}

$("#CodigoNCFCompra").keydown(function(){
	$(".alert").remove();
	
	var codigoNCFCompra = $(this).val();
	var ExtraerNCF = $("#NCFCompra").val();

	var NCF_606 = ExtraerNCF+codigoNCFCompra;
	
	var Rnc_Factura_606 = $("#RncSuplidorFactura").val();
	
	var RncEmpresa606 = $("#RncEmpresaCompras").val();

	var datos = new FormData();
	datos.append("Rnc_Factura_606", Rnc_Factura_606);
	datos.append("NCF_606", NCF_606);
	datos.append("RncEmpresa606", RncEmpresa606);

	$.ajax({
		url:"ajax/606.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
		if(respuesta){

		$(".input-RNC").after('<div class="alert  alert-warning">ALERTA !! RNC Y NCF ya estan registrado en el 606</div>');
		$(".input-NCF").after('<div class="alert  alert-warning">ALERTA !! RNC Y NCF ya estan registrado en el 606</div>');
 
		}

			}
		 })

})
$("#RncSuplidorFactura").keydown(function(){
	$(".alert").remove();
	
	var codigoNCFCompra = $("#CodigoNCFCompra").val();
	var ExtraerNCF = $("#NCFCompra").val();

	var NCF_606 = ExtraerNCF+codigoNCFCompra;

	var Rnc_Factura_606 = $("#RncSuplidorFactura").val();
	var RncEmpresa606 = $("#RncEmpresaCompras").val();

	var datos = new FormData();
	datos.append("Rnc_Factura_606", Rnc_Factura_606);
	datos.append("NCF_606", NCF_606);
	datos.append("RncEmpresa606", RncEmpresa606);

	$.ajax({
		url:"ajax/606.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
		if(respuesta){
		$(".input-RNC").after('<div class="alert  alert-warning">ALERTA !! RNC Y NCF ya estan registrado en el 606</div>');
		$(".input-NCF").after('<div class="alert  alert-warning">ALERTA !! RNC Y NCF ya estan registrado en el 606</div>');
 	
		}
	
	}
		 })

})
$("#Descripcion").keydown(function(){
	$(".alert").remove();
	var codigoNCFCompra = $("#CodigoNCFCompra").val();
	var ExtraerNCF = $("#NCFCompra").val();

	var NCF_606 = ExtraerNCF+codigoNCFCompra;
	
	var Rnc_Factura_606 = $("#RncSuplidorFactura").val();
	
	var RncEmpresa606 = $("#RncEmpresaCompras").val();

	
	var datos = new FormData();
	datos.append("Rnc_Factura_606", Rnc_Factura_606);
	datos.append("NCF_606", NCF_606);
	datos.append("RncEmpresa606", RncEmpresa606);

	$.ajax({
		url:"ajax/606.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
			if(respuesta){

		swal({
			type: "error",
			title: "¡Esta Factura Ya esta Registrada!",
			text: "¡Revisar Datos de NCF y Numero de Documento del Suplidor!",
			confirmButtonText: "¡Cerrar!"
					
		});
		
			}

			}
		 })
})

$("input[name=RncSuplidorFactura]").on('keyup', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');
	 var Ncaracteres = $(this);

	 if ($(".JuridicoSuplidorFactura").is(':checked') || $(".FisicoSuplidorFactura").is(':checked')){
    	$(".alert").remove(); 


	    if($(".JuridicoSuplidorFactura").is(':checked') && this.value.length!=9){
	    	Ncaracteres.prop('maxLength', 9);

		$("input[name=RncSuplidorFactura]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 9</div>');
		
		} else if($(".FisicoSuplidorFactura").is(':checked') && this.value.length!=11){
		$("input[name=RncSuplidorFactura]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 11</div>');
			Ncaracteres.prop('maxLength', 11);
		
		}
	
		} else{

			$(".alert").remove(); 


			$(".TipoSuplidorFactura").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');
			Ncaracteres.prop('maxLength', 1);


			
		}
	var RncEmpresa606 = $("#RncEmpresaCompras").val();
	
	var Rnc_Factura_606 = $("#RncSuplidorFactura").val();

		if(RncEmpresa606 == Rnc_Factura_606){
		swal({
			type: 'warning',
		  	position: 'top-end',
			title: 'ATENCIÓN..!! se esta Registrando un GASTO MENOR, Debe Cambiar el NCF',
		  	showConfirmButton: true,
		  	allowEnterKey: true,
		 	confirmButtonText: "Aceptar",
		 	closeOnConfirm: false,
		 	
		}).then((result)=>{

			if(result.value){
				swal.close();
				$("#RncSuplidorFactura").val("");

			 }/*cierre si resultado ajax*/
			 

  
		});
		onOpen: (modal) => {
      		confirmOnEnter = (event) => {
        		if (event.keyCode === 13) {
         			event.preventDefault();
          			modal.querySelector(".swal2-confirm").click();
        		}
      		} 
      	}

	}


 });
$("input[name=CodigoNCFCompra]").on('keyup', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');
	  
	  var Ncaracteres = $(this);
	  var cadena = $("#NCFCompra").val();

	  var num = cadena.charAt(0);
	  
	
	 if(num =='B'){
			Ncaracteres.prop('maxLength', 8);
			if(this.value.length!=8){
				$("input[name=CodigoNCFCompra]").after('<div class="alert alert-info">EL NCF Debe Tener 8 digitos</div>');
				this.focus();
				
				} 

		} 
		if(num == 'E'){
			Ncaracteres.prop('maxLength', 10);
			if(this.value.length!=10){
				$("input[name=CodigoNCFCompra]").after('<div class="alert alert-info">EL NCF Debe Tener 10 digitos</div>');
				this.focus();
				
				} 


		}





 });

$(".compras").on("click", ".editarcomprainventario", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Editar-compra-inventario&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });
$(".compras").on("click", ".editarcomprainventarioNo", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Editar-compra-inventarioNo&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });
$(".compras").on("click", ".editarcompragenerales", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Editar-compra-gastosgenerales&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });
$(".compras").on("click", ".copiarcompragenerales", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Copiar-compra-gastosgenerales&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });
$(".compras").on("click", ".copiarcomprageneralesNo", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Copiar-compra-gastosgeneralesNo&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });

$(".compras").on("click", ".copiarcomprainventario", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Copiar-compra-inventario&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });

$(".compras").on("click", ".editarcomprageneralesNo", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Editar-compra-gastosgeneralesNo&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });

$(".compras").on("click", ".copiarcomprainventarioNo", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Copiar-compra-inventarioNo&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });


$(".tabladiariogasto").on("click", ".copiarcompragenerales", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Copiar-compra-gastosgenerales&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });
$(".tabladiariogasto").on("click", ".copiarcomprageneralesNo", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Copiar-compra-gastosgeneralesNo&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });
$(".tabladiariogasto").on("click", ".copiarcomprainventario", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Copiar-compra-inventario&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });
$(".tabladiariogasto").on("click", ".copiarcomprainventarioNo", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");

	window.location = "index.php?ruta=Copiar-compra-inventarioNo&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606; 

 });

$(document).on("click", "#cuentagasto", function(){ 
$("#tipogasto").empty().append();


 var RncsubEmpresa = $("#RncEmpresaCompras").val();
 var categoriasubcuenta = $("#cuentagasto").val();

console.log("categoriasubcuenta", categoriasubcuenta);
switch(categoriasubcuenta) {
	case '12':
   var gruposubcuenta = 1;
	var categoriasubcuenta = 2;
    break;
    case '14':
   var gruposubcuenta = 1;
	var categoriasubcuenta = 4;
    break;
      case '16':
   var gruposubcuenta = 1;
	var categoriasubcuenta = 6;
    break;
  
  case '52':
   var gruposubcuenta = 5;
	var categoriasubcuenta = 2;
    break;
  
  case '53':
     var gruposubcuenta = 5;
	var categoriasubcuenta = 3;
    break;
    case '54':
     var gruposubcuenta = 5;
	var categoriasubcuenta = 4;
    break;
  
  default:
   	var gruposubcuenta = 6;
	var categoriasubcuenta = $("#cuentagasto").val();
}
 
 

 var datos = new FormData();
  datos.append("RncsubEmpresa", RncsubEmpresa);
  datos.append("gruposubcuenta", gruposubcuenta);
  datos.append("categoriasubcuenta", categoriasubcuenta);

  $.ajax({
    url:"ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
    	 $("#subgenerica").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="generica" name="generica" required>'+
              '<option value="">Selecionar generica</option>'+
              '</select>'+

            '</div>');
 

              var registro = 0;
              select = document.getElementById("generica");

                      for (let item of respuesta){ 
                      
                      		 var registro = registro + 1; 

                          option = document.createElement("option");
                          option.value = item.id_generica;
                          option.text = item.id_generica+'_'+item.Nombre_Cuenta;
                          select.appendChild(option);

                      		

            			}   

     


      }
    });

    

})


$(document).on("click", "#generica", function(){
	 $("#tipogasto").empty().append();

  var Rncgenerica = $("#RncEmpresaCompras").val();
  var categoriasgenerica = $("#cuentagasto").val();
  var generica = $("#generica").val();
  
  switch(categoriasgenerica) {
  	case '12':
    var grupogenerica = 1;
  var categoriasgenerica = 2;
  var generica = $("#generica").val();
    break;
    case '14':
    var grupogenerica = 1;
  var categoriasgenerica = 4;
  var generica = $("#generica").val();
    break;
      case '16':
    var grupogenerica = 1;
  var categoriasgenerica = 6;
  var generica = $("#generica").val();
    break;
  
  case '52':
  var grupogenerica = 5;
  var categoriasgenerica = 2;
  var generica = $("#generica").val();
    break;
  
  case '53':
    var grupogenerica = 5;
  var categoriasgenerica = 3;
  var generica = $("#generica").val();
    break;
    case '54':
    var grupogenerica = 5;
  var categoriasgenerica = 4;
  var generica = $("#generica").val();
    break;
  
  default:
   var grupogenerica = 6;
  var categoriasgenerica = $("#cuentagasto").val();
  var generica = $("#generica").val();

}
  
 var datos = new FormData();
  datos.append("Rncgenerica", Rncgenerica);
  datos.append("grupogenerica", grupogenerica);
  datos.append("categoriasgenerica", categoriasgenerica);
  datos.append("generica", generica);


  $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
    	for(let item of respuesta){
    	$("#tipogasto").append(
      '<tr>'+
          '<td>'+item.Nombre_subCuenta+'</td>'+
'<td><button class="btn btn-primary btn-xs agregarGasto recuperarGasto" idgrupo="'+item.id_grupo+'" idcategoria="'+item.id_categoria+'" idgenerica="'+item.id_generica+'" idcuenta="'+item.id_subgenerica+'" NombreCuenta="'+item.Nombre_subCuenta+'">+</button></td>'+
                          
      '</tr>'
      );



    }
     }
    });

    

})

/********************************************************************************************************************/
/*GASTOS DIARIO GASTOS DIARIO GASTOS DIARIO GASTOS DIARIO GASTOS DIARIO GASTOS DIARIO GASTOS DIARIO GASTOS DIARIO GASTOS
/********************************************************************************************************************/
var numProyecto = 0;

$(document).on("click", ".agregarGasto", function (){
  numProyecto ++;

  var grupo = $(this).attr("idgrupo");
  var categoria = $(this).attr("idcategoria"); 
  var generica = $(this).attr("idgenerica");
  var cuenta = $(this).attr("idcuenta");
  var nombrecuenta = $(this).attr("NombreCuenta");

   
  var plancuenta = grupo+"."+categoria+"."+generica+"."+cuenta;
  var RncEmpresaProyectos = $("#RncEmpresa606").val();
  var Proyecto = $("#Proyecto").val();

  if(Proyecto == 1){
  var datos = new FormData();
  datos.append("RncEmpresaProyectos", RncEmpresaProyectos);
  $.ajax({
    url: "ajax/proyecto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
       $(".nuevoGasto").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-3" style="padding-right:0px">'+
                    '<div class="input-group">'+
                            
                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta="'+plancuenta+'"><i class="fa fa-times"></i></button>'+
                          '</span>'+
                          '<input type="text" class="form-control plancuenta" idcuenta="'+plancuenta+'" name="plancuenta" value="'+plancuenta+'" required readonly>'+ 
                            
                      '</div>'+
                      '</div>'+

                         '<input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'+grupo+'" readonly required>'+
                         '<input type="hidden" class="idcategoria" name ="idcategoria" value="'+categoria+'" required readonly>'+
                         '<input type="hidden"  class="idgenerica" name="idgenerica" value="'+generica+'" required readonly>'+ 
                          '<input type="hidden" class="idcuenta" name="idcuenta" value="'+cuenta+'" required readonly>'+ 
                            
                     
                          '<div class="col-xs-3" style="padding-left:0px">'+
                          
                            '<div input-group">'+
                            
                            '<input type="text" class="form-control nombrecuenta" name="nombrecuenta" value="'+nombrecuenta+'" required readonly>'+ 
                            
                          '</div>'+
                          '</div>'+
                      
                      '<div class="col-xs-3" style="padding:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control gasto" name="gasto" value = "0" placeholder="Total Gasto" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      
                      '<div class="col-xs-3" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                         '<select type="text" class="form-control proyecto" id="proyecto'+numProyecto+'" idProyecto name="proyecto" required>'+
                               '<option value="">Proyecto</option>'+
                          '</select>'+
                        
                      '</div>'+
                      '</div>'+

                    '</div>');
             respuesta.forEach(funcionForEach);

                    function funcionForEach(item, index){

                      if(item.estatus == 1){
                        $("#proyecto"+numProyecto).append(
                        '<option idProyecto="'+item.id+'"value="'+item.id+'">'+item.CodigoProyecto+'</option>'

                        )


                      }
       
            } 
            //SUMAR PRODUCTOS
             
            // AGRUPAR productos JSON

              listarGastos();
              sumargasto();
   

        } 

    });
 
  }/* cierre if de proyecto*/  
  else {

       $(".nuevoGasto").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-3" style="padding-right:0px">'+
                    '<div class="input-group">'+
                            
                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta="'+plancuenta+'"><i class="fa fa-times"></i></button>'+
                          '</span>'+
                          '<input type="text" class="form-control plancuenta" idcuenta="'+plancuenta+'" name="plancuenta" value="'+plancuenta+'" required readonly>'+ 
                            
                      '</div>'+
                      '</div>'+

                         '<input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'+grupo+'" readonly required>'+
                         '<input type="hidden" class="idcategoria" name ="idcategoria" value="'+categoria+'" required readonly>'+
                         '<input type="hidden"  class="idgenerica" name="idgenerica" value="'+generica+'" required readonly>'+ 
                          '<input type="hidden" class="idcuenta" name="idcuenta" value="'+cuenta+'" required readonly>'+ 
                            
                     
                          '<div class="col-xs-4" style="padding-left:0px">'+
                          
                            '<div input-group">'+
                            
                            '<input type="text" class="form-control nombrecuenta" name="nombrecuenta" value="'+nombrecuenta+'" required readonly>'+ 
                            
                          '</div>'+
                          '</div>'+
                      
                      '<div class="col-xs-3" style="padding:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control gasto" name="gasto" value = "0" placeholder="Total Gasto" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="hidden" class="form-control proyecto" id="proyecto'+numProyecto+'" idProyecto name="proyecto" value="0">'+
                      '</div>'+
                      '</div>'+
                 

                    '</div>');
             

            
                  //SUMAR PRODUCTOS
                 
                  // AGRUPAR productos JSON

                  listarGastos();
                  sumargasto();
   


  } /*cierre else de proyecto*/ 
      
         
         
  
      
});

/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarCuenta = [];

localStorage.removeItem("quitarcuenta");
                  
$(".formularioGastos").on("click", "button.quitarcuenta", function (){

  $(this).parent().parent().parent().parent().remove();

  var idcuenta = $(this).attr("idcuenta");

  /******************************************
  ALMACENAR EL ID DEL PORDUCTO A QUITAR
  *******************************************/

  if(localStorage.getItem("quitarcuenta") == null){

    idQuitarCuenta = [];


  } else {

      idQuitarCuenta.concat(localStorage.getItem("quitarcuenta"))

  }

    idQuitarCuenta.push({"idcuenta":idcuenta});

    localStorage.setItem("quitarcuenta", JSON.stringify(idQuitarCuenta));
     if($(".nuevoCuenta").children().length == 0){
        $("#NetoTotalGasto").val(0);
        $("#NetoGasto").val(0);
		$("#PropinaLegal").val(0);
        $("#NetoPropinaLegal").val(0);
        $("#TotalITBISvi").val(0);
        $("#TotalITBIS").val(0);
        $("#TotalGastovi").val(0);
        $("#TotalGasto").val(0);
        
        


  }

    			listarGastos();
                 sumargasto();
   



});

function listarGastos(){

  var listaGastos = [];

  var idgrupo = $(".idgrupo");

  var idcategoria = $(".idcategoria");

  var idgenerica = $(".idgenerica");

  var idcuenta = $(".idcuenta");

  var nombrecuenta = $(".nombrecuenta");

  var gasto = $(".gasto");

  var proyecto = $(".proyecto");


  for(var i = 0; i < idgrupo.length; i++){

    listaGastos.push({ "id" : $(idcuenta[i]).attr("idcuenta"), 
                "idgrupo" : $(idgrupo[i]).val(),
                "idcategoria" : $(idcategoria[i]).val(),
                "idgenerica" : $(idgenerica[i]).val(),
                "idcuenta" : $(idcuenta[i]).val(),
                "nombrecuenta" : $(nombrecuenta[i]).val(),
                "gasto" : $(gasto[i]).val(),
                "proyecto" : $(proyecto[i]).val()})


  }

  $("#listaGastos").val(JSON.stringify(listaGastos)); 

}
/***********************************
SUMAR DEBITOS

************************************/
function sumargasto(){

  var gastoItem = $(".gasto");
  var arraySumaGasto = [];

  if(gastoItem.length > 0){ 


  for (var i = 0; i < gastoItem.length; i++){

    arraySumaGasto.push(Number($(gastoItem[i]).val()));


  }

  function sumaArrayGastos(total, numero){

    return total + numero;


  }
   var sumarGastos = arraySumaGasto.reduce(sumaArrayGastos);
  let t = sumarGastos.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var sumarTotalGastos = t.match(regex)[0];




}/*cierre de if*/
 
  // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

  $("#NetoTotalGasto").val(sumarTotalGastos);
  $("#NetoTotalGasto").number(true, 2);
  $("#NetoGasto").val(sumarTotalGastos);
  // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

   listarGastos();

}
function agregarImpuestoGasto(){

var isChecked = document.getElementById('HabilitarITBIS').checked;

var impuesto = $("#PORITBIS").val();

var isc = $("#TotalISC").val();

var otrosImp = $("#TotalOtrosImp").val();

var netogasto = $("#NetoGasto").val();

var propinalegal = $("#NetoPropinaLegal").val();

var precioNeto =  Number(netogasto) + Number(propinalegal);

console.log("precioNeto", precioNeto);

var TotalRet = $("#TotalRet").val();

var impuesto = Number(netogasto * impuesto/100);



let t = impuesto.toFixed(5);
let regex=/(\d*.\d{0,2})/;
var TotalITBIS = t.match(regex)[0];


var conimpuesto = Number(TotalITBIS) + Number(isc) + Number(otrosImp) + Number(precioNeto) - Number(TotalRet);


let z = conimpuesto.toFixed(5);
let regex1=/(\d*.\d{0,2})/;
var totalConImpuesto = z.match(regex1)[0];

if(isChecked){
  
	var conimpuesto = Number($("#TotalITBIS").val()) + Number($("#TotalISC").val()) + Number($("#TotalOtrosImp").val()) + Number(precioNeto) - Number(TotalRet);
	let x = conimpuesto.toFixed(5);
    let regex2=/(\d*.\d{0,2})/;
    var totalConImpuesto = x.match(regex2)[0];

	$("#TotalGastovi").val(totalConImpuesto);
	$("#TotalGastovi").number(true, 2);
	$("#TotalGasto").val(totalConImpuesto);
}else{
	$("#TotalITBIS").val(TotalITBIS);
	$("#TotalITBISvi").val(TotalITBIS);
	$("#TotalISC").val(isc);
	$("#TotalISCvi").val(isc);
	$("#TotalOtrosImpvi").val(otrosImp);
	$("#TotalOtrosImp").val(otrosImp);
	

	$("#TotalGastovi").val(totalConImpuesto);
	$("#TotalGastovi").number(true, 2);
	$("#TotalGasto").val(totalConImpuesto, 2);

}



 }
$(".formularioGastos").on("keyup", "#TotalITBISvi", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  var totalITBISvi = $("#TotalITBISvi").val();

 
 $("#TotalITBIS").val(totalITBISvi);
// SUMAR PRODUCTOS
sumargasto();
   
// AGRUPAR productos JSON

listarGastos();
agregarImpuestoGasto();
      

});
$(".formularioGastos").on("keyup", "#PropinaLegal", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  var PropinaLegal = $("#PropinaLegal").val();

 
 $("#NetoPropinaLegal").val(PropinaLegal);
// SUMAR PRODUCTOS
sumargasto();
   
// AGRUPAR productos JSON

listarGastos();
agregarImpuestoGasto();
      

});
$(".formularioGastos").on("keyup", "#TotalISCvi", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  var TotalISCvi = $("#TotalISCvi").val();

 
 $("#TotalISC").val(TotalISCvi);
// SUMAR PRODUCTOS
sumargasto();
   
// AGRUPAR productos JSON

listarGastos();
agregarImpuestoGasto();
      

});
$(".formularioGastos").on("keyup", "#TotalOtrosImpvi", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  var TotalOtrosImpvi = $("#TotalOtrosImpvi").val();

 
 $("#TotalOtrosImp").val(TotalOtrosImpvi);
// SUMAR PRODUCTOS
sumargasto();
   
// AGRUPAR productos JSON

listarGastos();
agregarImpuestoGasto();
      

});
$(".formularioGastos").on("click", "#HabilitarITBIS", function(){
	
	$("#TotalITBISvi").val(); 
	$("#TotalITBIS").val(); 

  
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
     $("#TotalITBISvi").prop('readonly', false);
       
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
         
        $("#TotalITBISvi").prop('readonly', true);
    }
});

$(".formularioGastos").on("keyup", ".gasto", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  
   
// SUMAR PRODUCTOS
sumargasto();
   
// AGRUPAR productos JSON

listarGastos();
agregarImpuestoGasto();
      

});


$(".formularioGastos").on("click", "#PORITBIS", function(){
	
	// SUMAR PRODUCTOS
sumargasto();
   
// AGRUPAR productos JSON

listarGastos();
agregarImpuestoGasto();
      

});
$(".formularioGastos").on("keyup", "#PORITBIS", function(){
	
sumargasto();
listarGastos();
agregarImpuestoGasto();
      

});
$(".formularioGastos").on("keyup", "#TotalISCvi", function(){
	this.value = this.value.replace(/[^0-9.]/g,'');
	
sumargasto();
listarGastos();
agregarImpuestoGasto();
      

});

$(".formularioGastos").on("keyup", "#TotalOtrosImpvi", function(){
	this.value = this.value.replace(/[^0-9.]/g,'');
	
sumargasto();
listarGastos();
agregarImpuestoGasto();
      

});
/******************EDITAR COMPRAS******************************************/
function listarProductosCompras(){

	var listaProductos = [];

	var descripcion = $(".nuevaDescripcionProducto");

	var tipoproducto = $(".tipoproducto");

	var stockanterior = $(".stockanterior");

	var cantidad = $(".nuevaCantidadProducto");

	var preciocompra = $(".nuevoPrecioProducto");

	var porcentajegan = $(".nuevoPorcentaje");

	var precioventa = $(".nuevoPrecioVenta");

	var total = $(".TotalPrecioProducto");

	for(var i = 0; i < descripcion.length; i++){

		listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"), 
							  "descripcion" : $(descripcion[i]).val(),
							  "tipoproducto" : $(tipoproducto[i]).val(),
							  "stockanterior" : $(stockanterior[i]).val(),
							  "cantidad" : $(cantidad[i]).val(),
							  "preciocompra" : $(preciocompra[i]).val(),
							  "porcentajegan" : $(porcentajegan[i]).val(),
							  "precioventa" : $(precioventa[i]).val(),
							  "total" : $(total[i]).val()})

	}



	$("#listaCuentas").val(JSON.stringify(listaProductos)); 

}
$(".comprasinventario").mousemove(function(){

listarProyecto();
sumarMontoDistribuido();
listarProductosCompras();


})
$(".formularioGastos").mousemove(function(){

listarGastos();
sumargasto();
agregarImpuestoGasto();    

})


$(".compras").on("click", ".eliminarcomprainventario", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var Codigo = $(this).attr("Codigo");
	var NCF_606 = $(this).attr("NCF_606");
	var RncFactura606 = $(this).attr("RncFactura606");
	var ExtrarNCF = $(this).attr("ExtrarNCF");
	var Modulo = $(this).attr("Modulo");
	

	swal({
			title: '¿Esta usted Seguro de Borrar la Compra?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Compra",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=compras&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&Codigo="+Codigo+"&NCF_606="+NCF_606+"&RncFactura606="+RncFactura606+"&ExtrarNCF="+ExtrarNCF+"&Modulo="+Modulo;
					}
		});



	})

$(".compras").on("click", ".eliminarcomprageneral", function(){

	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var Codigo = $(this).attr("Codigo");
	var NCF_606 = $(this).attr("NCF_606");
	var RncFactura606 = $(this).attr("RncFactura606");
	var ExtrarNCF = $(this).attr("ExtrarNCF");
	var Modulo = $(this).attr("Modulo");
	

	swal({
			title: '¿Esta usted Seguro de Borrar la Compra?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Compra",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=compras&idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&Codigo="+Codigo+"&NCF_606="+NCF_606+"&RncFactura606="+RncFactura606+"&ExtrarNCF="+ExtrarNCF+"&Modulo="+Modulo;
					}
		});



	})




$(".comprasinventario").on("click", ".Retencion", function (){
   $(".FormularioRetencion").empty().append();

  var retencion = $('input[name="Retencion"]:checked').val();
   		$("#TotalRet").val(0);
		$("#TotalRetvi").val(0);
		$("#TotalRetvi").number(true, 2);

	agregarImpuestoCompras();
           
      
if(retencion == 1){ 

     $(".FormularioRetencion").append(

     	'<div class="col-xs-6 left">'+
     	  '<div class="form-group">'+

                   '<div class="input-group form-control">'+

                      '<label>% ITBIS RETENIDO</label><br>'+

                   
'<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS30" value="30">30 %<br>'+
'<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS100" value="100">100 %<br>'+
'<input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" value="0" required>'+
                        
                    '</div>'+

                '</div>'+
             '</div>'+
      '<div class="col-xs-6  right">'+

          '<div class="form-group">'+

               '<div class="input-group form-control">'+

                   '<label>% ISR RETENIDO</label><br>'+

'<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="2">2 %<br>'+
'<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="10">10 %<br>'+
'<input type="text" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" value="0" required><br>'+
'<select type="text" class="form-control" id="tipo_de_seleccionretener" name="tipo_de_seleccionretener">'+
        '<option value="0">TIPO DE SELECCION</option>'+
        '<option value="01">01 - ALQUILERES</option>'+
        '<option value="02">02 - HONORARIOS POR SERVICIOS</option>'+
        '<option value="03">03 - OTRAS RENTAS</option>'+
        '<option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>'+
    	'<option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>'+
        '<option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>'+
        '<option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>'+
        '<option value="08">08 - JUEGOS TELEFONICOS</option>'+


'</select>'+



 

                        
          '</div>'+

                  

        '</div>'+
        '</div>'

        

         
       
 );




}/*cierre de if */

 });
/**VALIDACION DE ITBIS RETENIDO*/
$(".comprasinventario").on("click", ".Formapago", function (){
   $(".divretenciones").empty().append();

   var Forma_De_Pago_606 = $('input[name="Forma_De_Pago_606"]:checked').val();
   

  if(Forma_De_Pago_606 != "04"){ 
   $(".divretenciones").append(
   	'<div class="input-group">'+

      '<span class="input-group"><h4>¿Desea Realizar una Retención a esta Factura?</h4></span>'+
      	  '<div class="input-group form-control Retencion">'+
      			'<input type="radio" class="opcionretencion" name="Retencion" id="si" value="1" required> SI'+

      			'<input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required checked> NO'+
      
          '</div>'+
          
     '</div>'

   	);
}else {
	$(".divretenciones").append(
   	'<div class="input-group">'+

      '<span class="input-group"><h4>¿Desea Realizar una Retención a esta Factura?</h4></span>'+
      	  '<div class="input-group form-control Retencion">'+
      			
  '<input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required checked> NO'+
      
          '</div>'+
          
     '</div>'



   	);

$(".FormularioRetencion").empty().append();

}
 


 });


$(".formularioGastos").on("click", ".Formapago", function (){
   $(".divretenciones").empty().append();

   var Forma_De_Pago_606 = $('input[name="Forma_De_Pago_606"]:checked').val();
   
  if(Forma_De_Pago_606 != "04"){ 
   $(".divretenciones").append(
   	'<div class="input-group">'+

      '<span class="input-group"><h4>¿Desea Realizar una Retención a esta Factura?</h4></span>'+
      	  '<div class="input-group form-control Retencion">'+
      			'<input type="radio" class="opcionretencion" name="Retencion" id="si" value="1" required> SI'+

      			'<input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required checked> NO'+
      
          '</div>'+
          
     '</div>'

   	);
}else {
	$(".divretenciones").append(
   	'<div class="input-group">'+

      '<span class="input-group"><h4>¿Desea Realizar una Retención a esta Factura?</h4></span>'+
      	  '<div class="input-group form-control Retencion">'+
      			
  '<input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required checked> NO'+
      
          '</div>'+
          
     '</div>'



   	);
   		$("#TotalRet").val(0);
		$("#TotalRetvi").val(0);
		$("#TotalRetvi").number(true, 2);


		agregarImpuestoGasto();
           

$(".FormularioRetencion").empty().append();

}
 


 });


$(".formularioGastos").on("click", ".Retencion", function (){
   $(".FormularioRetencion").empty().append();

  var retencion = $('input[name="Retencion"]:checked').val();
   		$("#TotalRet").val(0);
		$("#TotalRetvi").val(0);
		$("#TotalRetvi").number(true, 2);


		agregarImpuestoGasto();
           



       
if(retencion == 1){ 

     $(".FormularioRetencion").append(

     	'<div class="col-xs-6 left">'+
     	  '<div class="form-group">'+

                   '<div class="input-group form-control">'+

                      '<label>% ITBIS RETENIDO</label><br>'+

                   
'<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS30" value="30">30 %<br>'+
'<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS100" value="100">100 %<br>'+
'<input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" value="0" required>'+
                        
                    '</div>'+

                '</div>'+
             '</div>'+
      '<div class="col-xs-6  right">'+

          '<div class="form-group">'+

               '<div class="input-group form-control">'+

                   '<label>% ISR RETENIDO</label><br>'+

'<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="2">2 %<br>'+
'<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="10">10 %<br>'+
'<input type="text" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" value="0" required><br>'+
'<select type="text" class="form-control" id="tipo_de_seleccionretener" name="tipo_de_seleccionretener">'+
        '<option value="0">TIPO DE SELECCION</option>'+
        '<option value="01">01 - ALQUILERES</option>'+
        '<option value="02">02 - HONORARIOS POR SERVICIOS</option>'+
        '<option value="03">03 - OTRAS RENTAS</option>'+
        '<option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>'+
    	'<option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>'+
        '<option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>'+
        '<option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>'+
        '<option value="08">08 - JUEGOS TELEFONICOS</option>'+


'</select>'+


                        
          '</div>'+

                  

        '</div>'+
        '</div>'

        
       
 );


}/*cierre de if */

});
/**VALIDACION DE ITBIS RETENIDO*/



$(".comprasinventario").on("click", "input.ITBISRetenido_Compras", function(){
	$(".alert").remove(); 

	 var valor = $(event.target).val();
       var MontoITBIS_Retener = $("#TotalITBIS").val();
        
        if(valor =="30"){   	
	
	var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 30)/100;
	
		let t = porcentajeRetenerITBIS.toFixed(5);
  		let regex=/(\d*.\d{0,2})/;
      	var MontoITBISPOR = t.match(regex)[0];

	

		$("#Monto_ITBIS_Retenido").val(MontoITBISPOR);
           
            
        } else if(valor =="75"){
        	var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 75)/100;
        	let t = porcentajeRetenerITBIS.toFixed(5);
  			let regex=/(\d*.\d{0,2})/;
      		var MontoITBISPOR = t.match(regex)[0];

		$("#Monto_ITBIS_Retenido").val(MontoITBISPOR);

        }else if(valor =="100"){
        	var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 100)/100;

		let t = porcentajeRetenerITBIS.toFixed(5);
  		let regex=/(\d*.\d{0,2})/;
      	var MontoITBISPOR = t.match(regex)[0];


		$("#Monto_ITBIS_Retenido").val(MontoITBISPOR);

		$("#Monto_ITBIS_Retenido").after('<div class="alert alert-warning">ALERTA !! Si la Factura no es de empresa de seguridad o Este en Régimen RST, usted NO DEBE  retener el 100 %</div>');
	
        }


		var ISR_RETENIDO_Compras = $("#Monto_ISR_Retenido").val();
	
        var TotalRet = Number(MontoITBISPOR) + Number(ISR_RETENIDO_Compras);
        $("#TotalRet").val(TotalRet);
		$("#TotalRetvi").val(TotalRet);
		$("#TotalRetvi").number(true, 2);


		agregarImpuestoCompras();

           
 });
       
           
$(".formularioGastos").on("click", "input.ITBISRetenido_Compras", function(){
	$(".alert").remove(); 

	 var valor = $(event.target).val();
       var MontoITBIS_Retener = $("#TotalITBIS").val();
        
        if(valor =="30"){   	
	
	var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 30)/100;
	
		let t = porcentajeRetenerITBIS.toFixed(5);
  		let regex=/(\d*.\d{0,2})/;
      	var MontoITBISPOR = t.match(regex)[0];

	

		$("#Monto_ITBIS_Retenido").val(MontoITBISPOR);
           
            
        } else if(valor =="75"){
        	var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 75)/100;
        	let t = porcentajeRetenerITBIS.toFixed(5);
  			let regex=/(\d*.\d{0,2})/;
      		var MontoITBISPOR = t.match(regex)[0];

		$("#Monto_ITBIS_Retenido").val(MontoITBISPOR);

        }else if(valor =="100"){
        	var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 100)/100;

		let t = porcentajeRetenerITBIS.toFixed(5);
  		let regex=/(\d*.\d{0,2})/;
      	var MontoITBISPOR = t.match(regex)[0];


		$("#Monto_ITBIS_Retenido").val(MontoITBISPOR);

		$("#Monto_ITBIS_Retenido").after('<div class="alert alert-warning">ALERTA !! Si la Factura no es de empresa de seguridad o Este en Régimen RST, usted NO DEBE  retener el 100 %</div>');
	
        }

       
		var ISR_RETENIDO_Compras = $("#Monto_ISR_Retenido").val();
	
        var TotalRet = Number(MontoITBISPOR) + Number(ISR_RETENIDO_Compras);
        $("#TotalRet").val(TotalRet);
		$("#TotalRetvi").val(TotalRet);
		$("#TotalRetvi").number(true, 2);



		agregarImpuestoGasto();
           

           
 });
       
           

/**VALIDACION DE ITBIS RETENIDO*/
$(".comprasinventario").on("click", "input.ISR_RETENIDO_Compras", function(){
	$(".alert").remove(); 

	     var valor = $(event.target).val();
        var MontoFacturadoRetener = $("#NetoCompra").val();
         var retener = $("#tipo_de_seleccionretener").val();
        
        if(valor =="2"){   	
	
		var porcentajeRetenerISR =  Number((MontoFacturadoRetener) * 2)/100;

		let t = porcentajeRetenerISR.toFixed(5);
  		let regex=/(\d*.\d{0,2})/;
      	var MontoISRPOR = t.match(regex)[0];
	

		$("#Monto_ISR_Retenido").val(MontoISRPOR);
        
           
            
        } else if(valor =="10"){
        var porcentajeRetenerISR =  Number((MontoFacturadoRetener) * 10)/100;

		let t = porcentajeRetenerISR.toFixed(5);
  		let regex=/(\d*.\d{0,2})/;
      	var MontoISRPOR = t.match(regex)[0];
	
	

		$("#Monto_ISR_Retenido").val(MontoISRPOR);
        
           


        }

        if(retener == ""){

         $("#tipo_de_seleccionretener").after('<div class="alert alert-warning">DEBE SELECCIONAR UN TIPO DE RETENCION</div>');

		}else{
			$(".alert").remove(); 


		}

       var ITBIS_Retenido = $("#Monto_ITBIS_Retenido").val();
	
        var TotalRet = Number(MontoISRPOR) + Number(ITBIS_Retenido);
        $("#TotalRet").val(TotalRet);
		$("#TotalRetvi").val(TotalRet);
		$("#TotalRetvi").number(true, 2);


		agregarImpuestoCompras();
           
 });
$(".formularioGastos").on("click", "input.ISR_RETENIDO_Compras", function(){
	$(".alert").remove(); 

	     var valor = $(event.target).val();
        var MontoFacturadoRetener = $("#NetoGasto").val();
         var retener = $("#tipo_de_seleccionretener").val();
        
        if(valor =="2"){   	
	
		var porcentajeRetenerISR =  Number((MontoFacturadoRetener) * 2)/100;

		let t = porcentajeRetenerISR.toFixed(5);
  		let regex=/(\d*.\d{0,2})/;
      	var MontoISRPOR = t.match(regex)[0];
	

		$("#Monto_ISR_Retenido").val(MontoISRPOR);
        
           
            
        } else if(valor =="10"){
        var porcentajeRetenerISR =  Number((MontoFacturadoRetener) * 10)/100;

		let t = porcentajeRetenerISR.toFixed(5);
  		let regex=/(\d*.\d{0,2})/;
      	var MontoISRPOR = t.match(regex)[0];
	
	

		$("#Monto_ISR_Retenido").val(MontoISRPOR);
        
           


        }

        if(retener == ""){

         $("#tipo_de_seleccionretener").after('<div class="alert alert-warning">DEBE SELECCIONAR UN TIPO DE RETENCION</div>');

		}else{
			$(".alert").remove(); 


		}

		var ITBIS_Retenido = $("#Monto_ITBIS_Retenido").val();
	
        var TotalRet = Number(MontoISRPOR) + Number(ITBIS_Retenido);
        $("#TotalRet").val(TotalRet);
		$("#TotalRetvi").val(TotalRet);
		$("#TotalRetvi").number(true, 2);


		agregarImpuestoGasto();
           
      
        
       
           
 });

$(".comprasinventario").on("click", "input[name=Forma_De_Pago_606]", function (){
  $(".banco606").empty().append();
  
var RncEmpresaTrans = $("#RncEmpresaCompras").val();
var formadepago = $(this).val();
var FechaFacturames606 = $("#FechaFacturames_606").val();
var FechaFacturadia606 = $("#FechaFacturadia_606").val();


if(FechaFacturames606 != "" && FechaFacturadia606 != ""){ 


if(formadepago == "04"){ 
	$(".banco606").append(
      '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes606" name="FechaPagomes606" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" value="'+FechaFacturadia606+'" required><br>'+
        '<input type="hidden" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="NO APLICA">'+
        '<input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="" required>'
        );





   }/*cierre if forma de pago*/
   
   else if(formadepago == "01"){
   	var datos = new FormData();
datos.append("RncEmpresaTrans", RncEmpresaTrans);
  
  $.ajax({
    url: "ajax/banco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){


$(".banco606").append(
  '<div class="form-group">'+
    '<div class="input-group form-control">'+ 
      '<label>BANCO</label><br>'+
        '<label class="col-xs-4">Fecha de Pago</label>'+
        '<label class="col-xs-4">Referencia</label>'+
        '<label class="col-xs-4">Agregar Banco</label>'+
        '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" placeholder="Año/Mes" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" placeholder="Día" value="'+FechaFacturadia606+'" required><br>'+
        
        '<input type="text" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="" required>'+
        
        '<div class="col-xs-5">'+
        '<select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>'+
        '<option value="">Seleccionar Banco</option>'+
        '</select>'+
         '</div>'+
        '</div>'+
                            
      '</div>' 
                            

        );
       respuesta.forEach(funcionForEach);

    function funcionForEach(item, index){
    	if(item.TipoCuenta == "ANTICIPOPARAGASTO"){ 

    $("#agregarBanco").append('<option value="'+item.id+'">'+item.Nombre_Cuenta+'</option>');


    } }


      

      }/*cierre respuesta*/


   });/*cierre ajax*/


   }
   else{
   	var datos = new FormData();
datos.append("RncEmpresaTrans", RncEmpresaTrans);
  
  $.ajax({
    url: "ajax/banco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){


$(".banco606").append(
  '<div class="form-group">'+
    '<div class="input-group form-control">'+ 
      '<label>BANCO</label><br>'+
        '<label class="col-xs-4">Fecha de Pago</label>'+
        '<label class="col-xs-4">Referencia</label>'+
        '<label class="col-xs-4">Agregar Banco</label>'+
        '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" placeholder="Año/Mes" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" placeholder="Día" value="'+FechaFacturadia606+'" required><br>'+
        
        '<input type="text" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="" required>'+
        
        '<div class="col-xs-5">'+
        '<select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>'+
        '<option value="">Seleccionar Banco</option>'+
        '</select>'+
         '</div>'+
        '</div>'+
                            
      '</div>' 
                            

        );
       respuesta.forEach(funcionForEach);

    function funcionForEach(item, index){

   if(item.TipoCuenta != "ANTICIPOPARAGASTO"){ 

    $("#agregarBanco").append('<option value="'+item.id+'">'+item.Nombre_Cuenta+'</option>');


    } }



      

      }/*cierre respuesta*/


   });/*cierre ajax*/

    


   }/* else de forma de pago*/
  }
  else {
  swal({
      type: "error",
      title: "¡Debe colocar una fecha de factura Valida!",
      text: "¡El campo de Fecha de la Factura esta en blanco!",
      confirmButtonText: "¡Cerrar!"
          
    });
  $(this).prop('checked', false);



}



  
});/*cierre funcion*/
$(".formularioGastos").on("click", "input[name=Forma_De_Pago_606]", function (){
  $(".banco606").empty().append();
  
var RncEmpresaTrans = $("#RncEmpresaCompras").val();
var formadepago = $(this).val();
var FechaFacturames606 = $("#FechaFacturames_606").val();
var FechaFacturadia606 = $("#FechaFacturadia_606").val();


if(FechaFacturames606 != "" && FechaFacturadia606 != ""){ 


if(formadepago == "04"){ 
	$(".banco606").append(
      '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes606" name="FechaPagomes606" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" value="'+FechaFacturadia606+'" required><br>'+
        '<input type="hidden" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="NO APLICA">'+
        '<input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="" required>'
        );





   }/*cierre if forma de pago*/
   
   else if(formadepago == "01"){
   	var datos = new FormData();
datos.append("RncEmpresaTrans", RncEmpresaTrans);
  
  $.ajax({
    url: "ajax/banco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){


$(".banco606").append(
  '<div class="form-group">'+
    '<div class="input-group form-control">'+ 
      '<label>BANCO</label><br>'+
        '<label class="col-xs-4">Fecha de Pago</label>'+
        '<label class="col-xs-4">Referencia</label>'+
        '<label class="col-xs-4">Agregar Banco</label>'+
        '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" placeholder="Año/Mes" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" placeholder="Día" value="'+FechaFacturadia606+'" required><br>'+
        
        '<input type="text" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="" required>'+
        
        '<div class="col-xs-5">'+
        '<select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>'+
        '<option value="">Seleccionar Banco</option>'+
        '</select>'+
         '</div>'+
         '<div id="otorgamiento">'+
        
         '</div>'+


        '</div>'+
                            
      '</div>' 
                            

        );
       respuesta.forEach(funcionForEach);

    function funcionForEach(item, index){
    	if(item.TipoCuenta == "ANTICIPOPARAGASTO"){ 

    $("#agregarBanco").append('<option value="'+item.id+'">'+item.Nombre_Cuenta+'</option>');


    } }


      

      }/*cierre respuesta*/


   });/*cierre ajax*/


   }
   else{
   	var datos = new FormData();
datos.append("RncEmpresaTrans", RncEmpresaTrans);
  
  $.ajax({
    url: "ajax/banco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){


$(".banco606").append(
  '<div class="form-group">'+
    '<div class="input-group form-control">'+ 
      '<label>BANCO</label><br>'+
        '<label class="col-xs-4">Fecha de Pago</label>'+
        '<label class="col-xs-4">Referencia</label>'+
        '<label class="col-xs-4">Agregar Banco</label>'+
        '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" placeholder="Año/Mes" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" placeholder="Día" value="'+FechaFacturadia606+'" required><br>'+
        
        '<input type="text" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="" required>'+
        
        '<div class="col-xs-5">'+
        '<select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>'+
        '<option value="">Seleccionar Banco</option>'+
        '</select>'+
         '</div>'+
        '</div>'+
                            
      '</div>' 
                            

        );
       respuesta.forEach(funcionForEach);

    function funcionForEach(item, index){

   if(item.TipoCuenta != "ANTICIPOPARAGASTO"){ 

    $("#agregarBanco").append('<option value="'+item.id+'">'+item.Nombre_Cuenta+'</option>');


    } }



      

      }/*cierre respuesta*/


   });/*cierre ajax*/

    


   }/* else de forma de pago*/
  }
  else {

  swal({
      type: "error",
      title: "¡Debe colocar una fecha de factura Valida!",
      text: "¡El campo de Fecha de la Factura esta en blanco!",
      confirmButtonText: "¡Cerrar!"
          
    });
  $(this).prop('checked', false);
  $(".divretenciones").empty().append();



}



  
});/*cierre funcion*/

$(".compras").on("click", ".CartaRetenciones", function(){

	
var idcompra = $(this).attr("idcompra");
var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
var RncFactura606 = $(this).attr("RncFactura606");
var NCF_606 = $(this).attr("NCF_606");
var Suplidor = $(this).attr("Suplidor");

window.open("extensiones/tcpdf/pdf/CartaRetenciones.php?idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606+"&Suplidor="+Suplidor, "_blank");


});

$(".formularioGastos").on("click", ".Moneda", function(){

 $(".TASA").empty().append();
 $(".TITULOMONEDA").empty().append();
 var moneda = $(event.target).val();
 

if(moneda == "USD"){ 

     $(".TASA").append(

        '<span class="input-group-addon"><i class="ion ion-social-usd">&nbsp;DOP</i></span>'+

        '<input type="text" class="form-control" id="tasaUS" name="tasaUS" placeholder="Tasa de Cambio"required>'

        );
     $(".TITULOMONEDA").append(

        
      '<div class="form-group col-xs-8 pull-right" style="background-color: #71B86D">'+

        '<h4 style="text-align: center;"><b>TOTAL FACTURA  $ USD</b></h4>'+
      '</div>'

        );

 }else{
    $(".TITULOMONEDA").append(

        
        '<div class="form-group col-xs-8 pull-right" style="background-color: #BEEDB6">'+

        '<h4 style="text-align: center;"><b>TOTAL FACTURA  $ DOP</b></h4>'+
        '</div>'

        );


 }
})
$(".comprasinventario").on("click", ".Moneda", function(){

 $(".TASA").empty().append();
 $(".TITULOMONEDA").empty().append();
 var moneda = $(event.target).val();
 

if(moneda == "USD"){ 

     $(".TASA").append(

        '<span class="input-group-addon"><i class="ion ion-social-usd">&nbsp;DOP</i></span>'+

        '<input type="text" class="form-control" id="tasaUS" name="tasaUS" placeholder="Tasa de Cambio"required>'

        );
     $(".TITULOMONEDA").append(

        
      '<div class="form-group col-xs-8 pull-right" style="background-color: #71B86D">'+

        '<h4 style="text-align: center;"><b>TOTAL FACTURA  $ USD</b></h4>'+
      '</div>'

        );

 }else{
    $(".TITULOMONEDA").append(

        
        '<div class="form-group col-xs-8 pull-right" style="background-color: #BEEDB6">'+

        '<h4 style="text-align: center;"><b>TOTAL FACTURA  $ DOP</b></h4>'+
        '</div>'

        );


 }
})



$(".compras").on("click", ".btnVerCompraGeneral", function(){
	$(".TASA").empty().append();
	$(".BANCO").empty().append();
	$(".nuevoGasto").empty().append();
	$(".ContabilidadCompras").empty().append();
	
			
	
	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");
	var Proyecto = $("#Proyecto").val();
	var NAsiento = $(this).attr("NAsiento");
	var Rnc_Empresa_cxp  = RncEmpresaCompras;
	var Rnc_Suplidor = RncFactura606;
	var NCF_cxp = NCF_606;
    var Tipo = "FACTURA";



	var datos = new FormData();
	datos.append("idcompra", idcompra);

	$.ajax({
		url:"ajax/compras.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

var CodigoCompra = respuesta["CodigoCompra"];
var id_Suplidor = respuesta["id_Suplidor"];
			
    		

			$("#Rnc_Suplidor").val(respuesta["Rnc_Suplidor"]);
			$("#Nombre_Suplidor").val(respuesta["Nombre_Suplidor"]);
			$("#FechaFacturames_606").val(respuesta["FechaAnoMes"]);
			$("#FechaFacturadia_606").val(respuesta["FechaDia"]);
			$("#CodigoCompra").val(respuesta["CodigoCompra"]);
			$("#NCF_Factura").val(respuesta["NCF_Factura"]);
			$("#NAsiento").val(respuesta["NAsiento"]);
			$("#Moneda").val(respuesta["Moneda"]);
			$("#Descripcion").val(respuesta["Referencia"]);
			$("#NetoTotalGasto").val(respuesta["Neto"]);
			$("#NetoTotalGasto").number(true, 2);
			$("#propinalegal").val(respuesta["Propinalegal"]);
			$("#propinalegal").number(true, 2);
			$("#PORITBIS").val(respuesta["Porimpuesto"]);
			$("#TotalITBISvi").val(respuesta["Impuesto"]);
			$("#TotalITBISvi").number(true, 2);
			$("#TotalISCvi").val(respuesta["impuestoISC"]);
			$("#TotalISCvi").number(true, 2);
			$("#TotalOtrosImpvi").val(respuesta["otrosimpuestos"]);
			$("#TotalOtrosImpvi").number(true, 2);
			$("#TotalGastovi").val(respuesta["Total"]);
			$("#TotalGastovi").number(true, 2);
			var Producto = JSON.parse(respuesta["Producto"]);
			var idBanco = respuesta["id_banco"];



			
if(respuesta["Moneda"] == "USD"){
	$(".TASA").append(
		

        '<span class="input-group-addon"><i class="ion ion-social-usd">&nbsp;DOP</i></span>'+

        '<input type="text" class="form-control" id="tasaUS" name="tasaUS" readonly>'
         

        );
	$("#tasaUS").val(respuesta["Tasa"]);

}
if(respuesta["Metodo_Pago"] != "04"){
	
	
	var datos = new FormData();

	datos.append("idBanco", idBanco);

	$.ajax({
		url:"ajax/banco.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){ 
			var banco = respuesta["Nombre_Cuenta"];
			$(".BANCO").append(
		

        '<span class="input-group-addon">Banco</span>'+

        '<input type="text" class="form-control col-xs-6" id="Banco" name="Banco" readonly>'
       

        );
	$("#Banco").val(banco);

		}
		});

	

}
var ver = 0;

if(Proyecto == 1){ 
	
for(let item of Producto){
	
	
	var datos = new FormData();
	var idProyecto = item.proyecto;
  datos.append("idProyecto", idProyecto);
  $.ajax({
    url: "ajax/proyecto.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){


    	$(".nuevoGasto").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+

		
  '<div class="col-xs-4" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+item.nombrecuenta+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+item.gasto+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-4" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+respuesta["NombreProyecto"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+respuesta["CodigoProyecto"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'</div>'
);


    } 
})
 } /*cierre for let*/
} else{
for(let item of Producto){
	var ver = ver+1;

$(".nuevoGasto").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
'<div class="col-xs-1" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+ver+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
		
  '<div class="col-xs-4" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+item.nombrecuenta+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-3" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+item.gasto+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  
'</div>'
);
 }


}
var RncEmpresa606 = RncEmpresaCompras;

var Rnc_Factura_606 = RncFactura606;

var datos = new FormData();
	datos.append("RncEmpresa606", RncEmpresa606);
	datos.append("Rnc_Factura_606", Rnc_Factura_606);
	datos.append("NCF_606", NCF_606);

$.ajax({
		url:"ajax/606.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){ 

			var tipo = respuesta["Tipo_Id_Factura_606"];
			
			if(tipo == 1){
				$("#Tipo_Id_Factura_606").val("Jurídico");

			}else{
				$("#Tipo_Id_Factura_606").val("Físico");
				
			}
			
$("#Forma_Pago_606").val(respuesta["Forma_Pago_606"]);

 if(respuesta["Monto_Servicios_606"] > 0){
			
		$("#tipo_de_monto").val("Servicios");

	}else{

		$("#tipo_de_monto").val("Compras");

	}

$("#Tipo_Gasto_606").val(respuesta["Tipo_Gasto_606"]);


 if(respuesta["ITBIS_alcosto_606"] == 0){

		$("#ITBIS_alcosto_606").prop('checked', false);

 	}else{

		$("#ITBIS_alcosto_606").prop('checked', true);;
 }
if(respuesta["ITBIS_Proporcional_606"] == 0){

		$("#ITBIS_Sujeto_a_Propocionalidad").prop('checked', false);

 	}else{

		$("#ITBIS_Sujeto_a_Propocionalidad").prop('checked', true);;
 }

 var TotalRet =  Number(respuesta["ITBIS_Retenido_606"]) + Number(respuesta["Monto_Retencion_Renta_606"]); 	
			$("#TotalRetvi").val(TotalRet);
			$("#TotalRetvi").number(true, 2);
			$("#ITBIS_Retenido_606").val(respuesta["ITBIS_Retenido_606"]);
			$("#ITBIS_Retenido_606").number(true, 2);
			$("#Porc_ITBIS_Retenido_606").val(respuesta["Porc_ITBIS_Retenido_606"]);
			$("#Monto_Retencion_Renta_606").val(respuesta["Monto_Retencion_Renta_606"]);
			$("#Monto_Retencion_Renta_606").number(true, 2);
			$("#Porc_ISR_Retenido_606").val(respuesta["Porc_ISR_Retenido_606"]);
			$("#Tipo_Retencion_ISR_606").val(respuesta["Tipo_Retencion_ISR_606"]);

}/*cierre respuesta*/
});/*cierre ajax 606*/
		
if(respuesta["Metodo_Pago"] != "04"){

  $("#detallePagosCompras").empty().append();


   
    var datos = new FormData();
    datos.append("Rnc_Empresa_cxp", Rnc_Empresa_cxp);
    datos.append("CodigoCompra", CodigoCompra);
    datos.append("id_Suplidor", id_Suplidor);
    datos.append("Rnc_Suplidor", Rnc_Suplidor);
    datos.append("NCF_cxp", NCF_cxp);
    datos.append("Tipo", Tipo);
    
    $.ajax({
        url:"ajax/cxp.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

     console.log("respuesta", respuesta);      

for(let item of respuesta){
        
    if(item.Rnc_Empresa_cxp == Rnc_Empresa_cxp && item.CodigoCompra == CodigoCompra && item.id_Suplidor == id_Suplidor && item.Rnc_Suplidor == Rnc_Suplidor && item.NCF_cxp == NCF_cxp && item.Tipo == Tipo){ 
    
        var idBanco = item.EntidadBancaria;
        var datos = new FormData();
        datos.append("idBanco", idBanco);
         
         $.ajax({
        url:"ajax/banco.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            var banco = respuesta["Nombre_Cuenta"];
          

        $("#detallePagosCompras").append(
            '<tr>'+
                
                
                '<td>'+item.NAsiento+'</td>'+
                '<td>'+item.FechaAnoMes+'</td>'+
                '<td>'+item.FechaDia+'</td>'+
                '<td>'+item.Pago+'</td>'+
                '<td>'+item.Monto+'</td>'+
                '<td>'+item.Referencia+'</td>'+
                '<td>'+banco+'</td>'+
               


             '</tr>');
          } })
                
       }/*cierre if*/
   }/*cierre for*/

 }/*cierre respuesta*/

})
} /*if metodo de pago 04*/
var Rnc_Empresa_LD = RncEmpresaCompras;
var Rnc_Factura = RncFactura606;
var NCF = NCF_606;
		

var datos = new FormData();

	datos.append("Rnc_Empresa_LD", Rnc_Empresa_LD);
	datos.append("Rnc_Factura", Rnc_Factura);
	datos.append("NCF", NCF);	
	datos.append("NAsiento", NAsiento);

$.ajax({
		url:"ajax/contabilidad.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			var debito = 0;
			var credito = 0;
$(".ContabilidadCompras").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
	'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">Plan de Cuenta</label>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-4" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">Nombre de Cuenta</label>'+  
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">N° Asiento</label>'+  
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">Debito</label>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">Credito</label>'+  
                            
     '</div>'+
  '</div>'+


'</div>'		
);
			
for(let item of respuesta){
	 var plancuenta = item.id_grupo+"."+item.id_categoria+"."+item.id_generica+"."+item.
	 id_cuenta;

	$(".ContabilidadCompras").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
	'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" value="'+plancuenta+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-4" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" value="'+item.Nombre_Cuenta+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" value="'+item.NAsiento+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control"  value="'+item.debito+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" value="'+item.credito+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+


'</div>'		
);
	
	var debito =  Number(debito) +  Number(item.debito);
	var credito =  Number(credito) +  Number(item.credito);
}/*cierre for*/

$(".ContabilidadCompras").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
	'<div class="col-xs-6" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">TOTAL</label>'+  
                            
     '</div>'+
  '</div>'+

'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" id="debito" value="'+debito+'" required readonly>'+ 
              
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" id="credito" value="'+credito+'" required readonly>'+
                            
     '</div>'+
  '</div>'+


'</div>'		
);
$("#debito").number(true, 2);
$("#credito").number(true, 2);
 }


 }); /*cierre ajax librodiario*/





		}



});
});
$(".compras").on("click", ".btnVerCompraInventario", function(){
	$(".TASAInventario").empty().append();
	$(".BANCOInventario").empty().append();
	$(".Productos").empty().append();
	$(".ContabilidadCompras").empty().append();
	
			
	
	var idcompra = $(this).attr("idcompra");
	var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
	var RncFactura606 = $(this).attr("RncFactura606");
	var NCF_606 = $(this).attr("NCF_606");
	var Proyecto = $("#Proyecto").val();
	var NAsiento = $(this).attr("NAsiento");
	var Rnc_Empresa_cxp  = RncEmpresaCompras;
	var Rnc_Suplidor = RncFactura606;
	var NCF_cxp = NCF_606;
    var Tipo = "FACTURA";


	var datos = new FormData();
	datos.append("idcompra", idcompra);

	$.ajax({
		url:"ajax/compras.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){

			var CodigoCompra = respuesta["CodigoCompra"];
			var id_Suplidor = respuesta["id_Suplidor"];
			
    		
    		

			$("#Rnc_SuplidorInventario").val(respuesta["Rnc_Suplidor"]);
			$("#Nombre_SuplidorInventario").val(respuesta["Nombre_Suplidor"]);
			$("#FechaFacturames_606Inventario").val(respuesta["FechaAnoMes"]);
			$("#FechaFacturadia_606Inventario").val(respuesta["FechaDia"]);
			$("#CodigoCompraInventario").val(respuesta["CodigoCompra"]);
			$("#NCF_FacturaInventario").val(respuesta["NCF_Factura"]);
			$("#NAsientoInventario").val(respuesta["NAsiento"]);
			$("#MonedaInventario").val(respuesta["Moneda"]);
			$("#DescripcionInventario").val(respuesta["Referencia"]);
			$("#NetoTotalGastoInventario").val(respuesta["Neto"]);
			$("#NetoTotalGastoInventario").number(true, 2);
			$("#propinalegalInventario").val(respuesta["Propinalegal"]);
			$("#propinalegalInventario").number(true, 2);
			$("#PORITBISInventario").val(respuesta["Porimpuesto"]);
			$("#TotalITBISviInventario").val(respuesta["Impuesto"]);
			$("#TotalITBISviInventario").number(true, 2);
			$("#TotalISCviInventario").val(respuesta["impuestoISC"]);
			$("#TotalISCviInventario").number(true, 2);
			$("#TotalOtrosImpviInventario").val(respuesta["otrosimpuestos"]);
			$("#TotalOtrosImpviInventario").number(true, 2);
			$("#TotalGastoviInventario").val(respuesta["Total"]);
			$("#TotalGastoviInventario").number(true, 2);
			var Producto = JSON.parse(respuesta["Producto"]);
			var idBanco = respuesta["id_banco"];



			
if(respuesta["Moneda"] == "USD"){
	$(".TASAInventario").append(
		

        '<span class="input-group-addon"><i class="ion ion-social-usd">&nbsp;DOP</i></span>'+

        '<input type="text" class="form-control" id="tasaUS" name="tasaUS" readonly>'
         

        );
	$("#tasaUS").val(respuesta["Tasa"]);

}
if(respuesta["Metodo_Pago"] != "04"){
	
	
	var datos = new FormData();

	datos.append("idBanco", idBanco);

	$.ajax({
		url:"ajax/banco.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){ 
			var banco = respuesta["Nombre_Cuenta"];
			$(".BANCOInventario").append(
		

        '<span class="input-group-addon">Banco</span>'+

        '<input type="text" class="form-control col-xs-6" id="Banco" name="Banco" readonly>'
       

        );
	$("#Banco").val(banco);

		}
		});

	

}
var ver = 0;


for(let item of Producto){
	
	var ver = ver+1;
	


    	$(".Productos").append(
'<div class="row">'+

        '<div class="col-xs-4" style="padding-right:0px">'+
                      
          '<div class="input-group">'+
                        
            '<span class="input-group-addon">'+ver+'</span>'+
            
            '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+item["id"]+'" name="agregarProducto" value="'+item["descripcion"]+'" readonly required>'+

          '</div>'+
        '</div>'+

        '<div class="col-xs-1 ingresoCantidad" style="padding:0px">'+
        
        '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" Stock="'+item["stockanterior"]+'" nuevoStock="'+item["cantidad"]+'" readonly required>'+
                  
                  
        '</div>'+
                    

        '<div class="col-xs-2 ingresoPrecio" style="padding:0px">'+
                      
          '<div class="input-group">'+
            '<span class="input-group-addon">'+
              '<i class="ion ion-social-usd">'+
                '</i>'+   
              '</span>'+

              '<input type="text"  class="form-control nuevoPrecioProducto"  name="nuevoPrecioProducto" value="'+item["preciocompra"]+'" readonly required>'+ 
                        
              '</div>'+
            '</div>'+

            '<div class="col-xs-1" style="padding:0px">'+
                '<div class="input-group">'+
            '<input type="number" class="form-control nuevoPorcentaje" id="nuevoPorcentaje" name="nuevoPorcentaje" min="0" value="'+item["porcentajegan"]+'" readonly required>'+
                  
                  
            '</div>'+
                
          '</div>'+
            
            '<div class="col-xs-2 ingresoPrecioVenta" style="padding:0px">'+
                      
              '<div class="input-group">'+
                '<span class="input-group-addon">'+
                  '<i class="ion ion-social-usd">'+
                  '</i>'+
                  '</span>'+

                '<input type="text"  class="form-control nuevoPrecioVenta"  name="nuevoPrecioVenta" value="'+item["precioventa"]+'" required readonly>'+ 
                        
                '</div>'+
              '</div>'+
                    
              '<div class="col-xs-2 ingresoTotal" style="padding-left:0px">'+
                      
                '<div class="input-group">'+
                  '<span class="input-group-addon">'+
                    '<i class="ion ion-social-usd">'+
                      '</i>'+
                      '</span>'+

                        
                        
                    '<input type="text" class="form-control TotalPrecioProducto" name="TotalPrecioProducto" value="'+item["total"]+'" required readonly>'+ 
                        
                      '</div>'+
                      '</div>'+

                    '</div>'
);


    } 


  if(respuesta["Metodo_Pago"] != "04"){

  $("#detallePagosInventario").empty().append();


   
    var datos = new FormData();
    datos.append("Rnc_Empresa_cxp", Rnc_Empresa_cxp);
    datos.append("CodigoCompra", CodigoCompra);
    datos.append("id_Suplidor", id_Suplidor);
    datos.append("Rnc_Suplidor", Rnc_Suplidor);
    datos.append("NCF_cxp", NCF_cxp);
    datos.append("Tipo", Tipo);
    
    $.ajax({
        url:"ajax/cxp.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

     console.log("respuesta", respuesta);      

for(let item of respuesta){
        
    if(item.Rnc_Empresa_cxp == Rnc_Empresa_cxp && item.CodigoCompra == CodigoCompra && item.id_Suplidor == id_Suplidor && item.Rnc_Suplidor == Rnc_Suplidor && item.NCF_cxp == NCF_cxp && item.Tipo == Tipo){ 
    
        var idBanco = item.EntidadBancaria;
        var datos = new FormData();
        datos.append("idBanco", idBanco);
         
         $.ajax({
        url:"ajax/banco.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            var banco = respuesta["Nombre_Cuenta"];
          

        $("#detallePagosInventario").append(
            '<tr>'+
                
                
                '<td>'+item.NAsiento+'</td>'+
                '<td>'+item.FechaAnoMes+'</td>'+
                '<td>'+item.FechaDia+'</td>'+
                '<td>'+item.Pago+'</td>'+
                '<td>'+item.Monto+'</td>'+
                '<td>'+item.Referencia+'</td>'+
                '<td>'+banco+'</td>'+
               


             '</tr>');
          } })
                
       }/*cierre if*/
   }/*cierre for*/

 }/*cierre respuesta*/

})
} /*if metodo de pago 04*/
var RncEmpresa606 = RncEmpresaCompras;

var Rnc_Factura_606 = RncFactura606;

var datos = new FormData();
	datos.append("RncEmpresa606", RncEmpresa606);
	datos.append("Rnc_Factura_606", Rnc_Factura_606);
	datos.append("NCF_606", NCF_606);

$.ajax({
		url:"ajax/606.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){ 

			var tipo = respuesta["Tipo_Id_Factura_606"];
			
			if(tipo == 1){
				$("#Tipo_Id_Factura_606Inventario").val("Jurídico");

			}else{
				$("#Tipo_Id_Factura_606Inventario").val("Físico");
				
			}
			
$("#Forma_Pago_606Inventario").val(respuesta["Forma_Pago_606"]);

 if(respuesta["Monto_Servicios_606"] > 0){
			
		$("#tipo_de_montoInventario").val("Servicios");

	}else{

		$("#tipo_de_montoInventario").val("Compras");

	}

$("#Tipo_Gasto_606Inventario").val(respuesta["Tipo_Gasto_606"]);


 if(respuesta["ITBIS_alcosto_606"] == 0){

		$("#ITBIS_alcosto_606Inventario").prop('checked', false);

 	}else{

		$("#ITBIS_alcosto_606Inventario").prop('checked', true);;
 }
if(respuesta["ITBIS_Proporcional_606"] == 0){

		$("#ITBIS_Sujeto_a_PropocionalidadInventario").prop('checked', false);

 	}else{

		$("#ITBIS_Sujeto_a_PropocionalidadInventario").prop('checked', true);;
 }

 var TotalRet =  Number(respuesta["ITBIS_Retenido_606"]) + Number(respuesta["Monto_Retencion_Renta_606"]); 	
			$("#TotalRetviInventario").val(TotalRet);
			$("#TotalRetviInventario").number(true, 2);
			$("#ITBIS_Retenido_606Inventario").val(respuesta["ITBIS_Retenido_606"]);
			$("#ITBIS_Retenido_606Inventario").number(true, 2);
			$("#Porc_ITBIS_Retenido_606Inventario").val(respuesta["Porc_ITBIS_Retenido_606"]);
			$("#Monto_Retencion_Renta_606Inventario").val(respuesta["Monto_Retencion_Renta_606"]);
			$("#Monto_Retencion_Renta_606Inventario").number(true, 2);
			$("#Porc_ISR_Retenido_606Inventario").val(respuesta["Porc_ISR_Retenido_606"]);
			$("#Tipo_Retencion_ISR_606Inventario").val(respuesta["Tipo_Retencion_ISR_606"]);

}/*cierre respuesta*/
});/*cierre ajax 606*/
		

var Rnc_Empresa_LD = RncEmpresaCompras;
var Rnc_Factura = RncFactura606;
var NCF = NCF_606;
		

var datos = new FormData();

	datos.append("Rnc_Empresa_LD", Rnc_Empresa_LD);
	datos.append("Rnc_Factura", Rnc_Factura);
	datos.append("NCF", NCF);	
	datos.append("NAsiento", NAsiento);

$.ajax({
		url:"ajax/contabilidad.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			var debito = 0;
			var credito = 0;
$(".ContabilidadCompras").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
	'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">Plan de Cuenta</label>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-4" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">Nombre de Cuenta</label>'+  
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">N Asiento</label>'+  
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">Debito</label>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">Credito</label>'+  
                            
     '</div>'+
  '</div>'+


'</div>'		
);
			
for(let item of respuesta){
	 var plancuenta = item.id_grupo+"."+item.id_categoria+"."+item.id_generica+"."+item.
	 id_cuenta;

	$(".ContabilidadCompras").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
	'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" value="'+plancuenta+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-4" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" value="'+item.Nombre_Cuenta+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" value="'+item.NAsiento+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+

'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control"  value="'+item.debito+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" value="'+item.credito+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+


'</div>'		
);
	
	var debito =  Number(debito) +  Number(item.debito);
	var credito =  Number(credito) +  Number(item.credito);
}/*cierre for*/

$(".ContabilidadCompras").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
	'<div class="col-xs-6" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<label style="text-align: center">TOTAL</label>'+  
                            
     '</div>'+
  '</div>'+

'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" id="debito" value="'+debito+'" required readonly>'+ 
              
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
   		'<input type="text" class="form-control" id="credito" value="'+credito+'" required readonly>'+
                            
     '</div>'+
  '</div>'+


'</div>'		
);
$("#debito").number(true, 2);
$("#credito").number(true, 2);
 }


 }); /*cierre ajax librodiario*/





		}



});
});