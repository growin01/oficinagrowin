
var RncEmpresaVentas = $("#RncEmpresaVentas").val();
var UsuarioDescuento = $("#UsuarioDescuento").val();

$('.ventas').DataTable({
    
    
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
    
    total = api
                .column(14)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 14, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 14 ).footer() ).html(pageTotal.toLocaleString("en-US"));
    total = api
                .column(15)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 15, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 15 ).footer() ).html(pageTotal.toLocaleString("en-US"));

    total = api
                .column(16)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 16, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
    $( api.column( 16 ).footer() ).html(pageTotal.toLocaleString("en-US"));

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
        var min = parseInt( $('#minventas').val(), 10 );
        var max = parseInt( $('#maxventas').val(), 10 );
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
        var min = parseInt( $('#mindiaventas').val(), 10 );
        var max = parseInt( $('#maxdiaventas').val(), 10 );
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
    var table = $('.ventas').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minventas, #maxventas').keyup( function() {
        table.draw();
    } );
    $('#mindiaventas, #maxdiaventas').keyup( function() {
        table.draw();
    } );
   


 } );

$('.ventasrecurrentes').DataTable({
    
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
        var min = parseInt( $('#minventasrecurrentes').val(), 10 );
        var max = parseInt( $('#maxventasrecurrentes').val(), 10 );
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
        var min = parseInt( $('#mindiaventasrecurrentes').val(), 10 );
        var max = parseInt( $('#maxdiaventasrecurrentes').val(), 10 );
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
    var table = $('.ventasrecurrentes').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minventasrecurrentes, #maxventasrecurrentes').keyup( function() {
        table.draw();
    } );
    $('#mindiaventasrecurrentes, #maxdiaventasrecurrentes').keyup( function() {
        table.draw();
    } );
   


 } );

$('.AdministrarVenta').DataTable({
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

/******************************************************
			CARGAR TABLA DINAMICA
*******************************************************/
if(localStorage.getItem("capturarRango") != null){

	$("#daterange-btn span").html(localStorage.getItem("capturarRango"));


}else
{
	$("#daterange-btn span").html('<i class="fa fa-calender"></i>Rango de fecha');


 }

$(document).on("change", "#TipoDeInventario", function(){
	var Inventario = $(this).val();


window.location = "index.php?ruta=crear-ventas&Inventario="+Inventario;
	
});

/*******************************************************
CARGAR LA TABLA DINAMICA DE PRODUCTOS
*********************************************************/
	var RncEmpresaVentas = $("#RncEmpresaVentas").val();
	var CambiarInventario = $("#CambiarInventario").val();
    var UsuarioDescuento = $("#UsuarioDescuento").val();


$('.tablaVentas').DataTable({

        "ajax": "ajax/datatable-ventas.ajax.php?RncEmpresaVentas="+RncEmpresaVentas+"&CambiarInventario="+CambiarInventario+"&UsuarioDescuento="+UsuarioDescuento,
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

$("#tablaVentas_filter input").focus();

$("#tablaVentas_filter input").on('keydown', function (){ 

     var codigo = $(this).val();
     var RncEmpresaLector = $("#RncEmpresaVentas").val();

     var UsuarioDescuento = $("#UsuarioDescuento").val();
     var tipodeinventario = $("#TipoDeInventario").val();

    if(tipodeinventario == 1){
        var inventario = "ajax/productos.ajax.php";


    }else{
        var inventario = "ajax/productosactivor.ajax.php";


    }
  
    var datos = new FormData();
    datos.append("codigo", codigo);
    datos.append("RncEmpresaLector", RncEmpresaLector);

   
            $.ajax({
                url: inventario,
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(respuesta){
                    
   
if(codigo == respuesta["Codigo"]){ 

                    var idProducto = respuesta["id"];

                    var descripcion = respuesta["Descripcion"];
                    var stock = respuesta["Stock"];
                    var precio = respuesta["Precio_Venta"]; 
                    var compra = respuesta["Precio_Compra"];    
                    var idgrupo = respuesta["id_grupo_Venta"];
                    var idcategoria = respuesta["id_categoria_Venta"];
                    var idgenerica = respuesta["id_generica_Venta"]; 
                    var idcuenta = respuesta["id_cuenta_Venta"];
                    var nombrecuenta = respuesta["Nombre_CuentaContable_Venta"];
                    var tipoproducto = respuesta["tipoproducto"];
                          

                    /*EVITAR AGREGAR PRODUCTO CUANDO EL STOCK ESTA EN CERO*/
                    if(stock == 0){

                        swal({

                            title: "No hay stock disponible",
                            type: "error",
                            confirmButtonText: "¡Cerrar!"


                        });
                        $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-default agregarProducto');

                        return;



                    }
  if(idcategoria == ""){

            swal({

                title: "No Reconocio la cuenta Contable del producto, vuelva a intentarlo",
                type: "error",
                confirmButtonText: "¡Cerrar!"


            });
            $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

            return;

        }

        if(idgrupo == ""){

        swal({

        title: "No Reconocio la cuenta Contable del producto, vuelva a intentarlo",
        type: "error",
        confirmButtonText: "¡Cerrar!"


        });
        $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

        return;



    }
    if(tipoproducto == ""){

        swal({

            title: "No Reconocio el Tipo de producto del producto, vuelva a intentarlo",
            type: "error",
            confirmButtonText: "¡Cerrar!"


        });
        $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

        return;



                    }
if(UsuarioDescuento == "1"){ 

    $("button.agregarProducto[idProducto='"+idProducto+"']").removeClass("btn-primary agregarProducto");
    $("button.agregarProducto[idProducto='"+idProducto+"']").addClass("btn-default");


        $(".nuevoProducto").append(
                        '<div class="row" style="padding:5px 15px">'+

                        '<div class="col-xs-4" style="padding-right:0px">'+
                      
                        '<div class="input-group">'+
                     

                        
'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

'<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+
    
'<input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'+idgrupo+'" readonly required>'+
 '<input type="hidden" class="idcategoria" name ="idcategoria" value="'+idcategoria+'" required readonly>'+
 '<input type="hidden" class="idgenerica" name="idgenerica" value="'+idgenerica+'" required readonly>'+ 
 '<input type="hidden" class="idcuenta" name="idcuenta" value="'+idcuenta+'" required readonly>'+ 
 '<input type="hidden" class="nombrecuenta" name="nombrecuenta" value="'+nombrecuenta+'" required readonly>'+ 
'<input type="hidden" class="tipoproducto" name="tipoproducto" value="'+tipoproducto+'" required readonly>'+ 
                      
                        '</div>'+
                      

                    '</div>'+

                    

                   '<div class="col-xs-2 ingresoCantidad">'+

                      '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" Stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+
                  
                    '</div>'+
                    

                     '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        

                        
                        '<input type="text"  class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" required>'+ 
                         '<input type="hidden"  class="form-control PrecioProductoCompra"  name="PrecioProductoCompra" value="'+compra+'" required>'+ 
                      '</div>'+
                      
                      

                    '</div>'+
                    
                    '<div class="col-xs-3 ingresoTotal" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        
                        
                        '<input type="text" class="form-control TotalPrecioProducto" name="TotalPrecioProducto" value="'+precio+'" required readonly>'+ 
                        '<input type="hidden" class="form-control TotalPrecioCompra" name="TotalPrecioCompra" value="'+compra+'" required readonly>'+
                      '</div>'+
                      '</div>'+

                    '</div>');
         listarProductos();
         $("#tablaVentas_filter input").val("");

} else {
        $("button.agregarProducto[idProducto='"+idProducto+"']").removeClass("btn-primary agregarProducto");
    $("button.agregarProducto[idProducto='"+idProducto+"']").addClass("btn-default");

    $(".nuevoProducto").append(
                        '<div class="row" style="padding:5px 15px">'+

                        '<div class="col-xs-4" style="padding-right:0px">'+
                      
                        '<div class="input-group">'+
                     

                        
'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+
'<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+  
'<input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'+idgrupo+'" readonly required>'+
'<input type="hidden" class="idcategoria" name ="idcategoria" value="'+idcategoria+'" required readonly>'+
'<input type="hidden" class="idgenerica" name="idgenerica" value="'+idgenerica+'" required readonly>'+ 
'<input type="hidden" class="idcuenta" name="idcuenta" value="'+idcuenta+'" required readonly>'+ 
'<input type="hidden" class="nombrecuenta" name="nombrecuenta" value="'+nombrecuenta+'" required readonly>'+ 
'<input type="hidden" class="tipoproducto" name="tipoproducto" value="'+tipoproducto+'" required readonly>'+ 
                        
                        '</div>'+
                      

                    '</div>'+

                    

                   '<div class="col-xs-2 ingresoCantidad">'+

                      '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" Stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+
                  
                    '</div>'+
                    

                     '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        

                        
                        '<input type="text"  class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" required readonly>'+ 
                         '<input type="hidden"  class="form-control PrecioProductoCompra"  name="PrecioProductoCompra" value="'+compra+'" required readonly>'+ 
                      '</div>'+
                      
                      

                    '</div>'+
                    
                    '<div class="col-xs-3 ingresoTotal" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        
                        
                        '<input type="text" class="form-control TotalPrecioProducto" name="TotalPrecioProducto" value="'+precio+'" required readonly>'+ 
                        '<input type="hidden" class="form-control TotalPrecioCompra" name="TotalPrecioCompra" value="'+compra+'" required readonly>'+
                      '</div>'+
                      '</div>'+

                    '</div>');

     $("#Descuentovi").prop('readonly', true);
     $("#tablaVentas_filter input").val("");
    
 

}
                    listarProductos();
                    // SUMAR PRODUCTOS
                    sumarTotalPrecios();

                    //AGREGAR IMPUESTO

                    agregarImpuesto();

                    // AGRUPAR productos JSON

                   

                    // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

                    $(".nuevoPrecioProducto").number(true, 2);
            

                    
                    $(".TotalPrecioProducto").number(true, 2);
            
            }
            }/*if respuesta*/

                })
});
/****************************************
AGREGAR PRODCUTO DESDE LA TABLA
******************************************/
$(".tablaVentas tbody").on("click", "button.agregarProducto", function (){
	
	var idProducto = $(this).attr("idProducto");
	var tipodeinventario = $(this).attr("tipodeinventario");
    var UsuarioDescuento = $("#UsuarioDescuento").val();

	
    if(tipodeinventario == 1){
		var inventario = "ajax/productos.ajax.php";


	}else{
		var inventario = "ajax/productosactivor.ajax.php";


	}



	$(this).removeClass("btn-primary agregarProducto");
	$(this).addClass("btn-default");

	var datos = new FormData();
	datos.append("idProducto", idProducto);

			$.ajax({
				url: inventario,
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){

					var descripcion = respuesta["Descripcion"];
					var stock = respuesta["Stock"];
					var precio = respuesta["Precio_Venta"];	
					var compra = respuesta["Precio_Compra"];	
					var idgrupo = respuesta["id_grupo_Venta"];
                    var idcategoria = respuesta["id_categoria_Venta"];
                    var idgenerica = respuesta["id_generica_Venta"]; 
                    var idcuenta = respuesta["id_cuenta_Venta"];
                    var nombrecuenta = respuesta["Nombre_CuentaContable_Venta"];
                    var tipoproducto = respuesta["tipoproducto"];
					/*EVITAR AGREGAR PRODUCTO CUANDO EL STOCK ESTA EN CERO*/
		if(stock == 0){

			swal({

			 title: "No hay stock disponible",
			 type: "error",
			confirmButtonText: "¡Cerrar!"


			});
		$("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

			return;
        }
        if(idcategoria == ""){

            swal({

                title: "No Reconocio la cuenta Contable del producto, vuelva a intentarlo",
                type: "error",
                confirmButtonText: "¡Cerrar!"


            });
            $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

            return;

        }

        if(idgrupo == ""){

        swal({

        title: "No Reconocio la cuenta Contable del producto, vuelva a intentarlo",
        type: "error",
        confirmButtonText: "¡Cerrar!"


        });
        $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

        return;



    }
    if(tipoproducto == ""){

        swal({

            title: "No Reconocio el Tipo de producto del producto, vuelva a intentarlo",
            type: "error",
            confirmButtonText: "¡Cerrar!"


        });
        $("button.recuperarBoton[idProducto='"+idProducto+"']").addClass('btn-primary agregarProducto');

        return;



                    }
if(UsuarioDescuento == "1"){ 
					$(".nuevoProducto").append(
						'<div class="row" style="padding:5px 15px">'+

						'<div class="col-xs-4" style="padding-right:0px">'+
                      
                     	'<div class="input-group">'+
                     

                        
'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

'<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+
'<input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'+idgrupo+'" readonly required>'+
'<input type="hidden" class="idcategoria" name ="idcategoria" value="'+idcategoria+'" required readonly>'+
'<input type="hidden" class="idgenerica" name="idgenerica" value="'+idgenerica+'" required readonly>'+ 
'<input type="hidden" class="idcuenta" name="idcuenta" value="'+idcuenta+'" required readonly>'+ 
'<input type="hidden" class="nombrecuenta" name="nombrecuenta" value="'+nombrecuenta+'" required readonly>'+ 
'<input type="hidden" class="tipoproducto" name="tipoproducto" value="'+tipoproducto+'" required readonly>'+ 
                       
                      	'</div>'+
                      

                    '</div>'+

                    

                   '<div class="col-xs-2 ingresoCantidad">'+

                      '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" Stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+
                  
                    '</div>'+
                    

                     '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        

                        
                        '<input type="text"  class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" required>'+ 
                         '<input type="hidden"  class="form-control PrecioProductoCompra"  name="PrecioProductoCompra" value="'+compra+'" required>'+ 
                      '</div>'+
                      
                      

                    '</div>'+
                    
                    '<div class="col-xs-3 ingresoTotal" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        
                        
                        '<input type="text" class="form-control TotalPrecioProducto" name="TotalPrecioProducto" value="'+precio+'" required readonly>'+ 
                        
                        '<input type="hidden" class="form-control TotalPrecioCompra" name="TotalPrecioCompra" value="'+compra+'" required readonly>'+
                      '</div>'+
                      '</div>'+

                    '</div>');

} else {
    $(".nuevoProducto").append(
                        '<div class="row" style="padding:5px 15px">'+

                        '<div class="col-xs-4" style="padding-right:0px">'+
                      
                        '<div class="input-group">'+
                     

                        
'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'+idProducto+'"><i class="fa fa-times"></i></button></span>'+

'<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+idProducto+'" name="agregarProducto" value="'+descripcion+'" readonly required>'+   
'<input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'+idgrupo+'" readonly required>'+
 '<input type="hidden" class="idcategoria" name ="idcategoria" value="'+idcategoria+'" required readonly>'+
 '<input type="hidden" class="idgenerica" name="idgenerica" value="'+idgenerica+'" required readonly>'+ 
 '<input type="hidden" class="idcuenta" name="idcuenta" value="'+idcuenta+'" required readonly>'+ 
 '<input type="hidden" class="nombrecuenta" name="nombrecuenta" value="'+nombrecuenta+'" required readonly>'+ 
 '<input type="hidden" class="tipoproducto" name="tipoproducto" value="'+tipoproducto+'" required readonly>'+ 
                        
                        '</div>'+
                      

                    '</div>'+

                    

                   '<div class="col-xs-2 ingresoCantidad">'+

                      '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" Stock="'+stock+'" nuevoStock="'+Number(stock-1)+'" required>'+
                  
                    '</div>'+
                    

                     '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        

                        
                        '<input type="text"  class="form-control nuevoPrecioProducto" precioReal="'+precio+'" name="nuevoPrecioProducto" value="'+precio+'" required readonly>'+ 
                         '<input type="hidden"  class="form-control PrecioProductoCompra"  name="PrecioProductoCompra" value="'+compra+'" required readonly>'+ 
                      '</div>'+
                      
                      

                    '</div>'+
                    
                    '<div class="col-xs-3 ingresoTotal" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+
                       '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        
                        
                        '<input type="text" class="form-control TotalPrecioProducto" name="TotalPrecioProducto" value="'+precio+'" required readonly>'+ 
                        
                        '<input type="hidden" class="form-control TotalPrecioCompra" name="TotalPrecioCompra" value="'+compra+'" required readonly>'+
                      '</div>'+
                      '</div>'+

                    '</div>');

     $("#Descuentovi").prop('readonly', true);
    


}

   
                  // SUMAR PRODUCTOS
                    sumarTotalPrecios();

                    //AGREGAR IMPUESTO

                    agregarImpuesto();

                    // AGRUPAR productos JSON

                    listarProductos();
    

                    // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

                    $(".nuevoPrecioProducto").number(true, 2);
			
			

					
					$(".TotalPrecioProducto").number(true, 2);
			
			}

				})

});


/***************************************************
CUANDO CARGUE LA TABLA U NAVEGUE EN ELLA
***************************************************/
$(".tablaVentas").on("draw.dt", function(){

	if(localStorage.getItem("quitarProducto") != null){

		var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

		for(var i = 0; i < listaIdProductos.length; i++){


$("button.recuperarBoton[idProducto'"+listaIdProductos[i]["idProductos"]+"']").removeClass('btn-default');
$("button.recuperarBoton[idProducto'"+listaIdProductos[i]["idProductos"]+"']").addClass('btn-primary agregarProducto');

		}
	}
})


/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");


$(".formularioVenta").on("click", "button.quitarProducto", function (){

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
	

	if($(".nuevoProducto").children().length == 0){

		$("#nuevoImpuestoVenta").val(0);
		$("#nuevoTotalVenta").val(0);
		$("#nuevoTotalVenta").attr("total", 0);
		$("#totalVenta").val(0);
	


	} else {

		// SUMAR PRODUCTOS
                  sumarTotalPrecios();

         //AGREGAR IMPUESTO
                  agregarImpuesto();

           // AGRUPAR productos JSON

                    listarProductos();


	}
				
			

});

/**********************************************************
AGREGANDO PRODUCTO DESDE EL BOTON PARA DISPOSITIVOS MOBILES
************************************************************/
var numProducto = 0;

$(".btnAgregarProducto").click(function(){

	numProducto ++;

	var RncEmpresaVentas = $("#RncEmpresaVentas").val();

	var datos = new FormData();
	datos.append("traerProductos", "ok");
	datos.append("RncEmpresaVentas", RncEmpresaVentas);


	$.ajax({

		url: "ajax/productos.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){
					$(".nuevoProducto").append(
						'<div class="row" style="padding:5px 15px">'+

						'<div class="col-xs-6" style="padding-right:0px">'+
                      
                     '<div class="input-group">'+
                        
                        '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto><i class="fa fa-times"></i></button>'+
                        '</span>'+

                        '<select class="form-control nuevaDescripcionProducto" id="producto'+numProducto+'" idProducto name="nuevaDescripcionProducto" required>'+
                        
                        '<option>Seleccionar el Producto</option>'+
                        
                        '</select>'+

                        
                      '</div>'+
                      

                    '</div>'+

                    

                   '<div class="col-xs-3 ingresoCantidad">'+

                      '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" stock nuevoStock required>'+
                  
                    '</div>'+
                    

                     '<div class="col-xs-3 ingresoPrecio" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+

                        '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        
                        '<input type="text" class="form-control nuevoPrecioProducto" precioReal="" name="nuevoPrecioProducto" required>'+ 
                        '<input type="hidden"  class="form-control PrecioProductoCompra"  name="PrecioProductoCompra" required>'+ 
                      '</div>'+
                      '<div class="col-xs-3 ingresoTotal" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+

                        '<span class="input-group-addon">'+
                        '<i class="ion ion-social-usd">'+
                        '</i>'+
                        '</span>'+

                        
                        '<input type="text" class="form-control TotalPrecioProducto" precioReal="" name="TotalPrecioProducto" required>'+ 
                        '<input type="hidden" class="form-control TotalPrecioCompra" name="TotalPrecioCompra" required readonly>'+ 
                      '</div>'+

                    '</div>'+
                    '<div class="col-xs-6" style="padding-left:0px">'+
                      
                      '<div class="input-group">'+


                        
                        '<input type="text" class="form-control" name="ObservacionesProducto" required>'+ 
                        
                      '</div>'+

                    '</div>'+
                    '</div>');

                    /*AGREGAR LOS PRODUCTOS AL SELECT*/

                    respuesta.forEach(funcionForEach);

                    function funcionForEach(item, index){

                    	if(item.Stock != 0){
                    		$("#producto"+numProducto).append(
                    		'<option idProducto="'+item.id+'"value="'+item.Descripcion+'">'+item.Descripcion+'</option>'

                    		)



                    	}
                    	// SUMAR PRODUCTOS
                  		sumarTotalPrecios();

                  		//AGREGAR IMPUESTO

                  		agregarImpuesto();

                  		


                  		// PONER FORMATO AL PRECIO DE LOS PRODUCTOS

                    	$(".nuevoPrecioProducto").number(true, 2);
			
			



                    	
                    }

				}

	})

})
$(".formularioVenta").ready(function(){
 

     listarProductos();

}) ;

/************************************************
	SELECCIONAR PRODUCTOS
*************************************************/

$(".formularioVenta").on("change", "select.nuevaDescripcionProducto", function(){

	var nombreProducto = $(this).val();
	var RncEmpresaVentasProducto = $("#RncEmpresaVentas").val();

	var nuevoPrecioProducto = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var PrecioProductoCompra = $(this).parent().parent().parent().children(".ingresoPrecio").children().children(".PrecioProductoCompra");
	
	var nuevaCantidadProducto = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");

	

	var datos = new FormData;
	datos.append("nombreProducto", nombreProducto);
	datos.append("RncEmpresaVentasProducto", RncEmpresaVentasProducto);




	$.ajax({

		url: "ajax/productos.ajax.php",
				method: "POST",
				data: datos,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function(respuesta){

					$(nuevaCantidadProducto).attr("stock", respuesta["Stock"]);
					$(nuevaCantidadProducto).attr("nuevoStock", Number(respuesta["Stock"])-1);
					$(nuevoPrecioProducto).val(respuesta["Precio_Venta"]);
					$(PrecioProductoCompra).val(respuesta["Precio_Compra"]);
					$(nuevoPrecioProducto).attr("precioReal",respuesta["Precio_Venta"]);

					 // AGRUPAR productos JSON

                    	listarProductos();

				}
			})

})


/***********************************
	MODIFICAR CANTIDAD DE PRODUCTO
************************************/
$(".formularioVenta").on("keyup", "input.nuevoPrecioProducto", function(){
	

	
	var cantidad = $(this).parent().parent().parent().children(".ingresoCantidad").children(".nuevaCantidadProducto");
	var totalproducto = $(this).parent().parent().parent().children(".ingresoTotal").children().children(".TotalPrecioProducto");
	
	
	var precioFinal = $(this).val() * cantidad.val();

	totalproducto.val(precioFinal);
	
	
	

	var nuevoStock = Number($(this).attr("stock")) - $(this).val();

	$(this).attr("nuevoStock", nuevoStock);




	if(Number($(this).val()) > Number($(this).attr("stock"))){

		/**********************************************************
		SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VAÑORES INICIALES
		************************************************************/


		$(this).val(1);

		var precioFinal = $(this).val();

		

		sumarTotalPrecios();



		swal({

			title: "La Cantidad supera el Stock Disponible",
			text: "¡Solo hay!"+$(this).attr("stock")+"unidades!",
			type: "error",
			confirmButtonText: "¡Cerrar!"

		});


	}
	// SUMAR PRODUCTOS
    sumarTotalPrecios();

    //AGREGAR IMPUESTO

    agregarImpuesto();

     // AGRUPAR productos JSON

     listarProductos();

			

});

$(".formularioVenta").on("keyup", "input.nuevaCantidadProducto", function(){
	
	var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
	var compra = $(this).parent().parent().children(".ingresoPrecio").children().children(".PrecioProductoCompra");
	var totalproducto = $(this).parent().parent().children(".ingresoTotal").children().children(".TotalPrecioProducto");
	var totalPrecioCompra = $(this).parent().parent().children(".ingresoTotal").children().children(".TotalPrecioCompra");
	
	var precioFinal = $(this).val() * precio.val();
	var precioFinalCompra = $(this).val() * compra.val();

	totalproducto.val(precioFinal);
	totalPrecioCompra.val(precioFinalCompra);
	
	
	var nuevoStock = Number($(this).attr("stock")) - $(this).val();

	$(this).attr("nuevoStock", nuevoStock);




	if(Number($(this).val()) > Number($(this).attr("stock"))){

		/**********************************************************
		SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VAÑORES INICIALES
		************************************************************/


		$(this).val(1);

		var precioFinal = $(this).val() * precio;

		precio.val(precioFinal);

		sumarTotalPrecios();



		swal({

			title: "La Cantidad supera el Stock Disponible",
			text: "¡Solo hay!"+$(this).attr("stock")+"unidades!",
			type: "error",
			confirmButtonText: "¡Cerrar!"

		});


	}
	// SUMAR PRODUCTOS
    sumarTotalPrecios();

    //AGREGAR IMPUESTO

    agregarImpuesto();

     // AGRUPAR productos JSON

     listarProductos();

			

})
$(".formularioVenta").on("click", "input.nuevaCantidadProducto", function(){
    
    var precio = $(this).parent().parent().children(".ingresoPrecio").children().children(".nuevoPrecioProducto");
    var compra = $(this).parent().parent().children(".ingresoPrecio").children().children(".PrecioProductoCompra");
    var totalproducto = $(this).parent().parent().children(".ingresoTotal").children().children(".TotalPrecioProducto");
    var totalPrecioCompra = $(this).parent().parent().children(".ingresoTotal").children().children(".TotalPrecioCompra");
    
    var precioFinal = $(this).val() * precio.val();
    var precioFinalCompra = $(this).val() * compra.val();

    totalproducto.val(precioFinal);
    totalPrecioCompra.val(precioFinalCompra);
    
    
    
    
    

    var nuevoStock = Number($(this).attr("stock")) - $(this).val();

    $(this).attr("nuevoStock", nuevoStock);




    if(Number($(this).val()) > Number($(this).attr("stock"))){

        /**********************************************************
        SI LA CANTIDAD ES SUPERIOR AL STOCK REGRESAR VAÑORES INICIALES
        ************************************************************/


        $(this).val(1);

        var precioFinal = $(this).val() * precio;

        precio.val(precioFinal);

        sumarTotalPrecios();



        swal({

            title: "La Cantidad supera el Stock Disponible",
            text: "¡Solo hay!"+$(this).attr("stock")+"unidades!",
            type: "error",
            confirmButtonText: "¡Cerrar!"

        });


    }
    // SUMAR PRODUCTOS
    sumarTotalPrecios();

    //AGREGAR IMPUESTO

    agregarImpuesto();

     // AGRUPAR productos JSON

     listarProductos();

            

})
/***********************************
SUMAR TODOS LOS PRECIOS

************************************/
function sumarTotalPrecios(){

	var precioItem = $(".TotalPrecioProducto");
	var arraySumaPrecio = [];

	if(precioItem.length > 0){ 

	for (var i = 0; i < precioItem.length; i++){

		arraySumaPrecio.push(Number($(precioItem[i]).val()));


	}

	function sumaArrayPrecios(total, numero){

		return total + numero;


	}
	
	
	var sumarTotalPrecios = arraySumaPrecio.reduce(sumaArrayPrecios);

	}/*cierre de if*/

	$("#nuevoTotalVenta").val(sumarTotalPrecios);
	$("#totalVenta").val(sumarTotalPrecios);
	$("#nuevoTotalVenta").attr("total", sumarTotalPrecios);


}

/*************************************
	FUNCION AGREGAR IMPUESTO
***************************************/

function agregarImpuesto(){
var isChecked = document.getElementById('HabilitarITBIS').checked;

	var impuesto = $("#nuevoImpuestoVenta").val();

	
	var precioNeto = Number($("#nuevoTotalVenta").attr("total"));

	var descuento = $("#Descuento").val();

	var TotalRet = $("#TotalRet").val();


	precioTotal = Number(precioNeto) - Number(descuento);
	

	var impuesto = Number(precioTotal * impuesto/100);

	let t = impuesto.toFixed(5);
  	let regex=/(\d*.\d{0,2})/;
    var precioImpuesto = t.match(regex)[0];

	
	var totalConImpuesto = Number(precioImpuesto) + Number(precioTotal) - Number(TotalRet);

if(isChecked){


var totalConImpuesto = Number($("#nuevoPrecioImpuesto").val()) + Number(precioTotal) - Number(TotalRet);

	$("#nuevoTotalVenta").val(totalConImpuesto);
	$("#nuevoTotalVenta").number(true, 2);
	$("#totalVenta").val(totalConImpuesto);

}else{

	$("#nuevoTotalVenta").val(totalConImpuesto);
	$("#totalVenta").val(totalConImpuesto);
	$("#nuevoPrecioImpuestovi").val(precioImpuesto);
	$("#nuevoPrecioImpuesto").val(precioImpuesto);

	$("#nuevoPrecioNetovi").val(precioNeto);
	$("#nuevoPrecioNetovi").number(true, 2);

	$("#nuevoPrecioNeto").val(precioNeto);

 }
}

/********************************
CUANDO CAMBIA EL IMPUESTO
********************************/
$("#nuevoImpuestoVenta").change(function(){

	agregarImpuesto();



})
$(".formularioVenta").on("click", "#nuevoImpuestoVenta", function(){
	
	// SUMAR PRODUCTOS
    sumarTotalPrecios();

    //AGREGAR IMPUESTO

    agregarImpuesto();

     // AGRUPAR productos JSON
	

});
$(".formularioVenta").on("keyup", "#nuevoImpuestoVenta", function(){
	
	// SUMAR PRODUCTOS
    sumarTotalPrecios();

    //AGREGAR IMPUESTO

    agregarImpuesto();

     // AGRUPAR productos JSON
	

});

$(".formularioVenta").on("click", "#HabilitarITBIS", function(){
	
	$("#nuevoPrecioImpuestovi").val(); 
	$("#nuevoPrecioImpuesto").val(); 

  
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
     $("#nuevoPrecioImpuestovi").prop('readonly', false);
       
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
         
        $("#nuevoPrecioImpuestovi").prop('readonly', true);
    }
});



$(".formularioVenta").on("keyup", "#nuevoPrecioImpuestovi", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  var totalITBISvi = $("#nuevoPrecioImpuestovi").val();

 
 $("#nuevoPrecioImpuesto").val(totalITBISvi);
	
	// SUMAR PRODUCTOS
    sumarTotalPrecios();

    //AGREGAR IMPUESTO

    agregarImpuesto();

     // AGRUPAR productos JSON

});
$(".formularioVenta").on("click", "#HabilitarDESC", function(){

    var habilitarDES = $("#HabilitarDESC").val();

    if(habilitarDES == 1){ 
    
    $("#Descuentovi").val(); 
    $("#Descuento").val(); 

  
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
     $("#Descuentovi").prop('readonly', false);
       
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
         
        $("#Descuentovi").prop('readonly', true);
    }

    }
});

$(".formularioVenta").on("click", "#nuevoporDescuento", function(){

this.value = this.value.replace(/[^0-9]/g,'');
var PorDescuentoConf = $("#PorDescuentoConf").val();
if(PorDescuentoConf >= this.value){ 

 
var subtotal = $("#nuevoPrecioNeto").val();
var porcentaje = $("#nuevoporDescuento").val();

 
var porcentaje = $("#nuevoporDescuento").val();
var descuento = (subtotal*porcentaje)/100;

    let t = descuento.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var totaldescuento = t.match(regex)[0];

 
 $("#Descuento").val(totaldescuento);
 $("#Descuentovi").val(totaldescuento);
    
    
    sumarTotalPrecios();
    //AGREGAR IMPUESTO

    agregarImpuesto();

      // AGRUPAR productos JSON
}else{
    swal({
            type: "error",
            title: "¡Usted no Puede Aplicar un Porcentaje de Descuento Mayor al Autorizado!",
            
            confirmButtonText: "¡Cerrar!"
                    
        });

 $("#nuevoporDescuento").val("0");
 $("#Descuentovi").val("0");
 $("#Descuento").val("0");
 sumarTotalPrecios();
    //AGREGAR IMPUESTO

    agregarImpuesto();

}
});

$(".formularioVenta").on("keyup", "#nuevoporDescuento", function(){


this.value = this.value.replace(/[^0-9]/g,'');

var PorDescuentoConf = $("#PorDescuentoConf").val();
if(PorDescuentoConf >= this.value){ 

var subtotal = $("#nuevoPrecioNeto").val();
var porcentaje = $("#nuevoporDescuento").val();

 
var porcentaje = $("#nuevoporDescuento").val();
var descuento = (subtotal*porcentaje)/100;

    let t = descuento.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var totaldescuento = t.match(regex)[0];

 
 $("#Descuento").val(totaldescuento);
 $("#Descuentovi").val(totaldescuento);
 
    
    sumarTotalPrecios();
    //AGREGAR IMPUESTO

    agregarImpuesto();

     // AGRUPAR productos JSON
} else{
    swal({
            type: "error",
            title: "¡Usted no Puede Aplicar un Porcentaje de Descuento Mayor al Autorizado!",
            
            confirmButtonText: "¡Cerrar!"
                    
        });

 $("#nuevoporDescuento").val("0");
 $("#Descuentovi").val("0");
 $("#Descuento").val("0");
 sumarTotalPrecios();
    //AGREGAR IMPUESTO

    agregarImpuesto();

}

});
$(".formularioVenta").on("keyup", "#Descuentovi", function(){
var isChecked = document.getElementById('HabilitarDESC').checked;

this.value = this.value.replace(/[^0-9.]/g,'');
var totalDescuento = $("#Descuentovi").val();
var subtotal = $("#nuevoPrecioNeto").val();

var PorDescuentoConf = $("#PorDescuentoConf").val();

porDescuentoMax =  (PorDescuentoConf*subtotal)/100;
if(isChecked){ 
 
 if(porDescuentoMax >= totalDescuento){

$("#Descuento").val(totalDescuento);
    
    // SUMAR PRODUCTOS
sumarTotalPrecios();

 //AGREGAR IMPUESTO

agregarImpuesto();
 

porcentaje = (totalDescuento*100)/subtotal;

let t = porcentaje.toFixed(0);
let regex=/(\d*.\d{0,2})/;
var totalporcentaje = t.match(regex)[0];

$("#nuevoporDescuento").val(totalporcentaje);

} else{
    swal({
            type: "error",
            title: "¡Usted no Puede Aplicar un Porcentaje de Descuento Mayor al Autorizado!",
            
            confirmButtonText: "¡Cerrar!"
                    
        });

 $("#nuevoporDescuento").val("0");
 $("#Descuentovi").val("0");
 $("#Descuento").val("0");
 sumarTotalPrecios();
    //AGREGAR IMPUESTO

    agregarImpuesto();

}

}



});

/**********************************************
		PONER FORMATO AL PRECIO DE LOS PRODUCTOS
***********************************************/
$("#nuevoTotalVenta").number(true, 2);

/***************************************************
	SELECCIONAR METODE PAGO
*****************************************************/
$("#nuevoMetodoPago").change(function(){

	var metodo = $(this).val();

	if(metodo == "01"){

		$(this).parent().parent().removeClass("col-xs-6");
		$(this).parent().parent().addClass("col-xs-4");

		$(this).parent().parent().parent().children(".cajasMetodoPago").html(
			
			'<div class="col-xs-4">'+

				'<div class="input-group">'+

				'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
				
				'<input type="text" class="form-control" id="nuevoValorEfectivo" placecholder="000000" required>'+



				'</div>'+




			'</div>'+

			'<div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">'+

				'<div class="input-group">'+

					'<span class="input-group-addon"><i class="ion ion-social-usd"></i></span>'+
				
						'<input type="text" class="form-control" id="nuevoCambioEfectivo" name="nuevoCambioEfectivo" placecholder="000000" readonly required>'+



				'</div>'+

			'</div>'


			);
		/* AGREGAR FORMATO DE PRECIO*/

		$('#nuevoValorEfectivo').number(true, 2);
		$('#nuevoCambioEfectivo').number(true, 2);




		/*LISTAR METODOS*/
		listarMetodos();

	}else if(metodo == "04"){
		$(this).parent().parent().removeClass("col-xs-4");
		$(this).parent().parent().addClass("col-xs-6");

		$(this).parent().parent().parent().children(".cajasMetodoPago").html(
			
			'<div class="col-xs-6" style="padding-left:0px">'+

                      '<div class="input-group">'+

                       '<input type="text" class="form-control" maxlength="3" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" required>'+
                        '<span class="input-group-addon"><i class="fa fa-calendar"></i></span>'+
                        

                      '</div>'+

                      '</div>')


	} else{

		$(this).parent().parent().removeClass("col-xs-4");
		$(this).parent().parent().addClass("col-xs-6");

		$(this).parent().parent().parent().children(".cajasMetodoPago").html(
			
			'<div class="col-xs-6" style="padding-left:0px">'+

                      '<div class="input-group">'+

                       '<input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Codigo Transaccion" required>'+
                        '<span class="input-group-addon"><i class="fa fa-lock"></i></span>'+
                        

                      '</div>'+

                      '</div>')


	}


})


$(".formularioVenta").on("keyup", "input#DiasdeCredito", function(){  

		 this.value = this.value.replace(/[^0-9]/g,'');



})
/****************************************************
				CAMBIO EN EFECTIVO
*****************************************************/
$(".formularioVenta").on("change", "input#nuevoValorEfectivo", function(){  

	var efectivo = $(this).val();

	var Cambio = Number(efectivo) - Number($('#nuevoTotalVenta').val());


	var nuevoCambioEfectivo = $(this).parent().parent().parent().children('#capturarCambioEfectivo').children().children('#nuevoCambioEfectivo');


	nuevoCambioEfectivo.val(Cambio);


})
/****************************************************
				CAMBIO TRANSACCION
*****************************************************/
$(".formularioVenta").on("change", "input#nuevoCodigoTransaccion", function(){ 

	/*LISTAR METODOS*/
		listarMetodos();


	
})

/**********************************************************
				LISTAR TODOS LOS PRODUCTOS
***********************************************************/

function listarProductos(){

	var listaProductos = [];
	var idgrupo = $(".idgrupo");
    var idcategoria = $(".idcategoria");
    var idgenerica = $(".idgenerica"); 
    var idcuenta = $(".idcuenta");
    var nombrecuenta = $(".nombrecuenta");
    var tipoproducto = $(".tipoproducto");

	var descripcion = $(".nuevaDescripcionProducto");

	var cantidad = $(".nuevaCantidadProducto");

	var precio = $(".nuevoPrecioProducto");

	var preciocompra = $(".PrecioProductoCompra");

	var total = $(".TotalPrecioProducto");

	var totalcompra = $(".TotalPrecioCompra");

	for(var i = 0; i < descripcion.length; i++){

		listaProductos.push({ "id" : $(descripcion[i]).attr("idProducto"),
			"idgrupo" : $(idgrupo[i]).val(),
                "idcategoria" : $(idcategoria[i]).val(),
                "idgenerica" : $(idgenerica[i]).val(),
                "idcuenta" : $(idcuenta[i]).val(),
                "nombrecuenta" : $(nombrecuenta[i]).val(),
                "tipoproducto" : $(tipoproducto[i]).val(),
				"descripcion" : $(descripcion[i]).val(),	
				"cantidad" : $(cantidad[i]).val(),
				"Stock" : $(cantidad[i]).attr("nuevoStock"),
				"preciocompra" : $( preciocompra[i]).val(),
				"totalcompra" : $(totalcompra[i]).val(),
				"precio" : $(precio[i]).val(),
				"total" : $(total[i]).val()})

	}



	$("#listaProductos").val(JSON.stringify(listaProductos)); 

    $('#DataTables_Table_0_filter input').val("");
    
}

/**********************************************************
				LISTA METODODS DE PAGO
***********************************************************/
function listarMetodos(){

	var listarMetodos = "";

	if($("#nuevoMetodoPago").val() == "01"){

		$("#listaMetodoPago").val("01");

	}else if($("#nuevoMetodoPago").val() == "04"){ 
		$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());



	}else{ 

		$("#listaMetodoPago").val($("#nuevoMetodoPago").val()+"-"+$("#nuevoCodigoTransaccion").val());


	}


}

/********************************************
		BOTON EDITAR VENTA
********************************************/

$(".ventas").on("click", ".btnEditarVenta", function(){

	var idVenta = $(this).attr("idVenta");
	var ExtraerAsiento= $(this).attr("ExtraerAsiento");
	var contabilidad = $("#Contabilidad").val();
	
if(contabilidad == 1){

	window.location = "index.php?ruta=editar-ventas&idVenta="+idVenta+"&ExtraerAsiento="+ExtraerAsiento;
}else{
	window.location = "index.php?ruta=editar-ventas&idVenta="+idVenta;

} 


})
$(".ventasrecurrentes").on("click", ".btnEditarVentaRecurrente", function(){

    var idVenta = $(this).attr("idVenta");
    var ExtraerAsiento= $(this).attr("ExtraerAsiento");
   
    

    window.location = "index.php?ruta=editar-ventasrecurrentes&idVenta="+idVenta;




})
$(".ventas").on("click", ".btnCopiarVenta", function(){

    var idVenta = $(this).attr("idVenta");
    var ExtraerAsiento= $(this).attr("ExtraerAsiento");
    var contabilidad = $("#Contabilidad").val();
    
if(contabilidad == 1){

    window.location = "index.php?ruta=Copiar-ventas&idVenta="+idVenta+"&ExtraerAsiento="+ExtraerAsiento;
}else{
    window.location = "index.php?ruta=Copiar-ventas&idVenta="+idVenta;

} 


})
$(".ventas").on("click", ".btnCopiarVentaNo", function(){

    var idVenta = $(this).attr("idVenta");
    var ExtraerAsiento= $(this).attr("ExtraerAsiento");
    var contabilidad = $("#Contabilidad").val();
    
if(contabilidad == 1){

    window.location = "index.php?ruta=Copiar-ventasNo&idVenta="+idVenta+"&ExtraerAsiento="+ExtraerAsiento;
}else{
    window.location = "index.php?ruta=Copiar-ventasNo&idVenta="+idVenta;

} 


})
$(".ventas").on("click", ".btnReciclarVenta", function(){

    var idVenta = $(this).attr("idVenta");
    var ExtraerAsiento= $(this).attr("ExtraerAsiento");
    var contabilidad = $("#Contabilidad").val();
    
if(contabilidad == 1){

    window.location = "index.php?ruta=Reciclar-ventas&idVenta="+idVenta+"&ExtraerAsiento="+ExtraerAsiento;
}else{
    window.location = "index.php?ruta=Reciclar-ventas&idVenta="+idVenta;

} 


})
$(".cotizacion").on("click", ".btnEditarCotizacion", function(){

	var idCotizacion = $(this).attr("idCotizacion");

	window.location = "index.php?ruta=editar-cotizacion&idCotizacion="+idCotizacion; 


})
$(".cotizacion").on("click", ".btnCopiarCotizacion", function(){

    var idCotizacion = $(this).attr("idCotizacion");

    window.location = "index.php?ruta=Copiar-cotizacion&idCotizacion="+idCotizacion; 


})

$(".ventas").on("click", ".btnEliminarVenta", function(){

	var idVenta = $(this).attr("idVenta");
	var codigoVenta = $(this).attr("codigoVenta");
	var RncEmpresaVenta = $(this).attr("Rnc_Empresa_Venta");
	var idregistro607 = $(this).attr("id_registro607"); 
	var NCF607 = $(this).attr("NCF_607");
	var RNCFactura = $(this).attr("RNC_Factura");
	var ExtrarNCF = $(this).attr("ExtrarNCF");


	swal({
			title: '¿Esta usted Seguro de Borrar la Venta?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar venta",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=ventas&idVenta="+idVenta+"&codigoVenta="+codigoVenta+"&RncEmpresaVenta="+RncEmpresaVenta+"&NCF607="+NCF607+"&idregistro607="+idregistro607+"&RNCFactura="+RNCFactura+"&ExtrarNCF="+ExtrarNCF;
					}
		});



	})

$(".ventas").on("click", ".btnDGIIVenta", function(){

    var idVenta = $(this).attr("idVenta");
    var codigoVenta = $(this).attr("codigoVenta");
    var RncEmpresaVenta = $(this).attr("Rnc_Empresa_Venta");
    var idregistro607 = $(this).attr("id_registro607"); 
    var NCF607 = $(this).attr("NCF_607");
    var RNCFactura = $(this).attr("RNC_Factura");
    var ExtrarNCF = $(this).attr("ExtrarNCF");


    swal({
            title: '¿Esta usted Seguro de Enviar el Archivo a la DGII?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, Enviar Venta a la DGII",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=ventas&DGIIventa="+"ENVIARVENTADGII"+"&idVentaDGII="+idVenta+"&codigoVenta="+codigoVenta+"&RncEmpresaVenta="+RncEmpresaVenta+"&NCF607="+NCF607+"&idregistro607="+idregistro607+"&RNCFactura="+RNCFactura+"&ExtrarNCF="+ExtrarNCF;
                    }
        });



    })
$(".ventasrecurrentes").on("click", ".btnEliminarVentaRecurrente", function(){

    var idVentaRecurrente = $(this).attr("idVentaRecurrente");
    var RncEmpresaVenta = $(this).attr("Rnc_Empresa_Venta");
    


    swal({
            title: '¿Esta usted Seguro de Borrar la Venta Recurrente?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, borrar venta",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=ventasrecurrentes&idVentaRecurrente="+idVentaRecurrente+"&RncEmpresaVenta="+RncEmpresaVenta;
                    }
        });



    })

/**************************************************************
		IMPRIMIR FACTURA
***************************************************************/


$(".ventas").on("click", ".btnImprimirFactura", function(){

	var codigoVenta = $(this).attr("idVenta");
    var ModeloFactura = $(this).attr("ModeloFactura");
    var observaciones = $(this).attr("observaciones");

  switch (ModeloFactura) {
  case "1":
    window.open("extensiones/tcpdf/pdf/Estandar.php?Codigo="+codigoVenta, "_blank");

    break;
  case "2":
    window.open("extensiones/tcpdf/pdf/Ejecutiva.php?Codigo="+codigoVenta, "_blank");

    break;
case "3":
    window.open("extensiones/tcpdf/pdf/Comercial.php?Codigo="+codigoVenta, "_blank");

    break;


}


if(observaciones == "MODULO POS"){

    var nuevoRncEmpresa = $(this).attr("Rnc_Empresa_Venta");
    var idVenta = $(this).attr("idVenta");
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

    nompreempresa = respuesta["Nombre_Empresa"];
    Impresoratermica = respuesta["Impresora"];
    rncempresa = respuesta["Rnc_Empresa"];
    DireccionEmpresaVentas = respuesta["Direccion_Empresa"];
    correo = respuesta["Correo_Empresa"];
    telefono = respuesta["Telefono_Empresa"];
    fecha = respuesta[""];
    
        

            }


            }
         })/*cierre ajax*/




    var datos = new FormData();
    datos.append("idVenta", idVenta);

    $.ajax({
        url:"ajax/ventas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            ncf = respuesta["NCF_Factura"];
            rnccliente = respuesta["Rnc_Cliente"];
            nombrecliente = respuesta["Nombre_Cliente"];
            subtotal = respuesta["Neto"];
            descuentos = respuesta["Descuento"];
            itbis = respuesta["Impuesto"];
            total = respuesta["Total"];
            nuevoMetodoPago = respuesta["Metodo_Pago"];
            nuevoVendedor = respuesta["Nombre_Vendedor"];
    
    switch (nuevoMetodoPago) {
                          
        case '01':                 
            var formapago = "EFECTIVO";
        break;
        case '02':                  
            var formapago = "CHEQUES_TRANSFERENCIAS_DEPOSITO";            
         break;
        case '03':
            var formapago = "TARJETA_CREDITO_DEBITO";
                        
        break;
        case '04':
            var formapago = "VENTA A CREDITO"; 
        break;
                         
    }

 

  if(respuesta["EXTRAER_NCF"] == "FP1"){
        
        texto = "RECIBO";
    
    }else if(respuesta["EXTRAER_NCF"] == "B02"){

        texto = "FACTURA VALIDA PARA CONSUMIDOR FINAL";

    }else{

        texto = "FACTURA PARA CREDITO FISCAL";
    }

let nombreImpresora = Impresoratermica;            
let impresora = new Impresora();
impresora.setFontSize(2, 1);
impresora.setAlign("center");
impresora.setEmphasize(1);
impresora.write(nompreempresa);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("RNC: "+rncempresa);
impresora.feed(1);
impresora.setFontSize(1, 1);
impresora.setEmphasize(0);
impresora.write(DireccionEmpresaVentas);
impresora.feed(1);
impresora.write("Correo: "+correo);
impresora.feed(1);
impresora.write("Telef.: "+telefono);
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Fecha: "+fecha);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("NCF: "+ncf);
impresora.feed(1);
impresora.write("RNC : "+rnccliente);
impresora.feed(1);
impresora.write("Nombre o Razon Social : "+nombrecliente);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("------------------------------------------");
impresora.feed(1);
impresora.write(texto);
impresora.feed(1);
impresora.write("------------------------------------------");
impresora.feed(1);

var listarproductos = respuesta["Producto"];
var productos = JSON.parse(listarproductos);
for (let item of productos){ 
    impresora.setAlign("left");
    impresora.write(item.descripcion);
    impresora.feed(1);
    impresora.write("                  "+item.cantidad+" Cant."+" * "+item.precio+" = "+item.total);
    impresora.feed(1);
}
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Sub total  = "+subtotal);
impresora.feed(1);
impresora.write("Descuentos = "+descuentos);
impresora.feed(1);
impresora.write("ITBIS 18%  = "+itbis);
impresora.feed(1);
impresora.write("   Total   = "+total);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("Forma de Pago = "+formapago);
impresora.feed(1);
impresora.write("Vendedor = "+nuevoVendedor);
impresora.feed(1);
impresora.setAlign("center");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.write("GRACIAS POR SU COMPRA REGRESE PRONTO");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.cut();
impresora.cutPartial();
/**********************RECIBO 2*************************/
/**********************RECIBO 2*************************/
/**********************RECIBO 2*************************/
impresora.setFontSize(2, 1);
impresora.setAlign("center");
impresora.setEmphasize(1);
impresora.write(nompreempresa);
impresora.feed(1);
impresora.setAlign("center");
impresora.write(rncempresa);
impresora.feed(1);
impresora.setFontSize(1, 1);
impresora.setEmphasize(0);
impresora.write(DireccionEmpresaVentas);
impresora.feed(1);
impresora.write("Correo: "+correo);
impresora.feed(1);
impresora.write("Telef.: "+telefono);
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Fecha: "+fecha);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("NCF: "+ncf);
impresora.feed(1);
impresora.write("RNC : "+rnccliente);
impresora.feed(1);
impresora.write("Nombre o Razon Social : "+nombrecliente);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("------------------------------------------");
impresora.feed(1);
impresora.write(texto);
impresora.feed(1);
impresora.write("------------------------------------------");
impresora.feed(1);

var listarproductos = respuesta["Producto"];
var productos = JSON.parse(listarproductos);
for (let item of productos){ 
    impresora.setAlign("left");
    impresora.write(item.descripcion);
    impresora.feed(1);
    impresora.write("                  "+item.cantidad+" Cant."+" * "+item.precio+" = "+item.total);
    impresora.feed(1);
}
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Sub total  = "+subtotal);
impresora.feed(1);
impresora.write("Descuentos = "+descuentos);
impresora.feed(1);
impresora.write("ITBIS 18%  = "+itbis);
impresora.feed(1);
impresora.write("   Total   = "+total);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("Forma de Pago = "+formapago);
impresora.feed(1);
impresora.write("Vendedor = "+nuevoVendedor);
impresora.feed(1);
impresora.setAlign("center");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.write("GRACIAS POR SU COMPRA REGRESE PRONTO");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.cut();
impresora.cutPartial();
impresora.imprimirEnImpresora(nombreImpresora)
    .then(valor => {
        console.log("Al imprimir: " + valor);
    });



 }
})



$("#imprimirfacturaPOS").val(2);

}



	

})


$(".ventas").on("click", ".btnImprimirFacturaNo", function(){
	var codigoVenta = $(this).attr("idVenta");
    var ModeloFactura = $(this).attr("ModeloFactura");

   

	swal({
			title: '¿Desea que la Factura Proforma Tenga Su informacion Fiscal?',
			text: '¡Si desea que tenga la información presiona Boton Si, Con Informacion',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: "No",
			confirmButtonText: "Si, Con Información",
			}).then(function(result){

		if(result.value){

    

  switch (ModeloFactura) {
  case "1":
  window.open("extensiones/tcpdf/pdf/EstandarCon.php?Codigo="+codigoVenta, "_blank");

   
    break;
  case "2":
    window.open("extensiones/tcpdf/pdf/EjecutivaCon.php?Codigo="+codigoVenta, "_blank");

    break;

    case "3":
    window.open("extensiones/tcpdf/pdf/ComercialCon.php?Codigo="+codigoVenta, "_blank");

    break;

if(observaciones == "MODULO POS"){

    var nuevoRncEmpresa = $(this).attr("Rnc_Empresa_Venta");
    var idVenta = $(this).attr("idVenta");
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

    nompreempresa = respuesta["Nombre_Empresa"];
    Impresoratermica = respuesta["Impresora"];
    rncempresa = respuesta["Rnc_Empresa"];
    DireccionEmpresaVentas = respuesta["Direccion_Empresa"];
    correo = respuesta["Correo_Empresa"];
    telefono = respuesta["Telefono_Empresa"];
    fecha = respuesta[""];
    
        

            }


            }
         })/*cierre ajax*/




    var datos = new FormData();
    datos.append("idVenta", idVenta);

    $.ajax({
        url:"ajax/ventas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            ncf = respuesta["NCF_Factura"];
            rnccliente = respuesta["Rnc_Cliente"];
            nombrecliente = respuesta["Nombre_Cliente"];
            subtotal = respuesta["Neto"];
            descuentos = respuesta["Descuento"];
            itbis = respuesta["Impuesto"];
            total = respuesta["Total"];
            nuevoMetodoPago = respuesta["Metodo_Pago"];
            nuevoVendedor = respuesta["Nombre_Vendedor"];
    
    switch (nuevoMetodoPago) {
                          
        case '01':                 
            var formapago = "EFECTIVO";
        break;
        case '02':                  
            var formapago = "CHEQUES_TRANSFERENCIAS_DEPOSITO";            
         break;
        case '03':
            var formapago = "TARJETA_CREDITO_DEBITO";
                        
        break;
        case '04':
            var formapago = "VENTA A CREDITO"; 
        break;
                         
    }

 

  if(respuesta["EXTRAER_NCF"] == "FP1"){
        
        texto = "RECIBO";
    
    }else if(respuesta["EXTRAER_NCF"] == "B02"){

        texto = "FACTURA VALIDA PARA CONSUMIDOR FINAL";

    }else{

        texto = "FACTURA PARA CREDITO FISCAL";
    }

let nombreImpresora = Impresoratermica;            
let impresora = new Impresora();
impresora.setFontSize(2, 1);
impresora.setAlign("center");
impresora.setEmphasize(1);
impresora.write(nompreempresa);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("RNC: "+rncempresa);
impresora.feed(1);
impresora.setFontSize(1, 1);
impresora.setEmphasize(0);
impresora.write(DireccionEmpresaVentas);
impresora.feed(1);
impresora.write("Correo: "+correo);
impresora.feed(1);
impresora.write("Telef.: "+telefono);
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Fecha: "+fecha);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("NCF: "+ncf);
impresora.feed(1);
impresora.write("RNC : "+rnccliente);
impresora.feed(1);
impresora.write("Nombre o Razon Social : "+nombrecliente);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("------------------------------------------");
impresora.feed(1);
impresora.write(texto);
impresora.feed(1);
impresora.write("------------------------------------------");
impresora.feed(1);

var listarproductos = respuesta["Producto"];
var productos = JSON.parse(listarproductos);
for (let item of productos){ 
    impresora.setAlign("left");
    impresora.write(item.descripcion);
    impresora.feed(1);
    impresora.write("                  "+item.cantidad+" Cant."+" * "+item.precio+" = "+item.total);
    impresora.feed(1);
}
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Sub total  = "+subtotal);
impresora.feed(1);
impresora.write("Descuentos = "+descuentos);
impresora.feed(1);
impresora.write("ITBIS 18%  = "+itbis);
impresora.feed(1);
impresora.write("   Total   = "+total);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("Forma de Pago = "+formapago);
impresora.feed(1);
impresora.write("Vendedor = "+nuevoVendedor);
impresora.feed(1);
impresora.setAlign("center");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.write("GRACIAS POR SU COMPRA REGRESE PRONTO");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.cut();
impresora.cutPartial();
/**********************RECIBO 2*************************/
/**********************RECIBO 2*************************/
/**********************RECIBO 2*************************/
impresora.setFontSize(2, 1);
impresora.setAlign("center");
impresora.setEmphasize(1);
impresora.write(nompreempresa);
impresora.feed(1);
impresora.setAlign("center");
impresora.write(rncempresa);
impresora.feed(1);
impresora.setFontSize(1, 1);
impresora.setEmphasize(0);
impresora.write(DireccionEmpresaVentas);
impresora.feed(1);
impresora.write("Correo: "+correo);
impresora.feed(1);
impresora.write("Telef.: "+telefono);
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Fecha: "+fecha);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("NCF: "+ncf);
impresora.feed(1);
impresora.write("RNC : "+rnccliente);
impresora.feed(1);
impresora.write("Nombre o Razon Social : "+nombrecliente);
impresora.feed(1);
impresora.setAlign("center");
impresora.write("------------------------------------------");
impresora.feed(1);
impresora.write(texto);
impresora.feed(1);
impresora.write("------------------------------------------");
impresora.feed(1);

var listarproductos = respuesta["Producto"];
var productos = JSON.parse(listarproductos);
for (let item of productos){ 
    impresora.setAlign("left");
    impresora.write(item.descripcion);
    impresora.feed(1);
    impresora.write("                  "+item.cantidad+" Cant."+" * "+item.precio+" = "+item.total);
    impresora.feed(1);
}
impresora.feed(1);
impresora.setAlign("right");
impresora.write("Sub total  = "+subtotal);
impresora.feed(1);
impresora.write("Descuentos = "+descuentos);
impresora.feed(1);
impresora.write("ITBIS 18%  = "+itbis);
impresora.feed(1);
impresora.write("   Total   = "+total);
impresora.feed(1);
impresora.setAlign("left");
impresora.write("Forma de Pago = "+formapago);
impresora.feed(1);
impresora.write("Vendedor = "+nuevoVendedor);
impresora.feed(1);
impresora.setAlign("center");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.write("GRACIAS POR SU COMPRA REGRESE PRONTO");
impresora.feed(1);
impresora.write("******************************************");
impresora.feed(1);
impresora.cut();
impresora.cutPartial();
impresora.imprimirEnImpresora(nombreImpresora)
    .then(valor => {
        console.log("Al imprimir: " + valor);
    });



 }
})



$("#imprimirfacturaPOS").val(2);

}


    


}
		

		}else {
switch (ModeloFactura) {
  case "1":
  window.open("extensiones/tcpdf/pdf/EstandarNo.php?Codigo="+codigoVenta, "_blank");

   
    break;
  case "2":
    window.open("extensiones/tcpdf/pdf/EjecutivaNo.php?Codigo="+codigoVenta, "_blank");

    break;

case "2":
    window.open("extensiones/tcpdf/pdf/ComercialNo.php?Codigo="+codigoVenta, "_blank");

    break;



}
		
		}
		});



})
$(".ventas").on("click", ".btnCorreoFactura", function(){

	var codigoVenta = $(this).attr("idVenta");
	var correocliente = $(this).attr("correocliente");
	var nombreCliente = $(this).attr("nombreCliente");

	$("#CorreoEmpresaDirigida").val(correocliente);
	$("#codigoVenta").val(codigoVenta);
	$("#nombreCliente").val(nombreCliente);


})
$(".ventas").on("click", ".btnCorreoFacturaNo", function(){

	var codigoVenta = $(this).attr("idVenta");
	var correocliente = $(this).attr("correocliente");
	var nombreCliente = $(this).attr("nombreCliente");

	$("#CorreoEmpresaDirigidaNo").val(correocliente);
	$("#codigoVentaNo").val(codigoVenta);
	$("#nombreClienteNo").val(nombreCliente);


})
/***************************************
		RANGO DE FECHA
****************************************/
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
          'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
          'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
          'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment(),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      	
        	var fechaInicial = start.format('YYYY-MM-DD');
        	var fechaFinal = end.format('YYYY-MM-DD');

        	var capturarRango = $("#daterange-btn span").html();

        	localStorage.setItem("capturarRango", capturarRango);

        	window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

      }
    )

/**********************************************
		CANCELAR RANGO DE FECHAS
***********************************************/
$(".daterangepicker.opensleft .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango");
	localStorage.clear();

	window.location = "reportes";

})	

/*****************************
	CAPTURAR EL DIA DE HOY
******************************/
$(".daterangepicker.opensleft .ranges li").on("click", function(){

		var textoHoy = $(this).attr("data-range-key");

		if(textoHoy == "Hoy"){

			var d = new Date();

			var dia = d.getDate();
			var mes = d.getMonth()+1;
			var año = d.getFullYear();

			if(mes < 10){

				var fechaInicial = año+"-0"+mes+"-"+dia;
				var fechaFinal = año+"-0"+mes+"-"+dia;


			}else if(dia < 10){

				var fechaInicial = año+"-"+mes+"-0"+dia;
				var fechaFinal = año+"-"+mes+"-0"+dia;



			}else if(mes < 10 && dia < 10){

				var fechaInicial = año+"-0"+mes+"-0"+dia;
				var fechaFinal = año+"-0"+mes+"-0"+dia;



			} else{

			var fechaInicial = año+"-"+mes+"-"+dia;
			var fechaFinal = año+"-"+mes+"-"+dia;

			}



			localStorage.setItem("capturarRango", "Hoy");

			window.location = "index.php?ruta=ventas&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;


		}


	})

$("input[name=FechaFacturames]").on('input', function(){
	$(".alert").remove(); 

	 this.value = this.value.replace(/[^0-9]/g,'');

	 var Fecha = $(this).val();
	 var ano = Fecha.substr(0,4);
	 var mes =  Fecha.substr(4,2);
	 
	 
	 if(Fecha.length<6){

	 $(".Fecha").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



	 }else if(Fecha.length=6){
	 	
	 	$(".alert").remove(); 

	 	if((ano < 2018) || (ano > 2026) || (mes == 0) || (mes > 12)){
	 		$(".Fecha").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


	 	}     

	 }
	



});
$("input[name=FechaFacturadia]").on('input', function(){
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

/***********************************
VALIDACIONES DE CLIENTES DE FACTURA
*************************************/
$("input[name=nuevoTelefono]").on('input', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');

	 	var Ncaracteres = $(this);
	 	

	  
	    	Ncaracteres.prop('maxLength', 10);

		
});

$("input[name=RncClienteFactura]").on('input', function (){ 
	 this.value = this.value.replace(/[^0-9]/g,'');

	 	var Ncaracteres = $(this);
	 	var Ncaracteres = $(this);

	

	  
    if ($(".JuridicoClienteFactura").is(':checked') || $(".FisicoClienteFactura").is(':checked')){
    	$(".alert").remove(); 


	    if($(".JuridicoClienteFactura").is(':checked') && this.value.length!=9){
	    	Ncaracteres.prop('maxLength', 9);

		$("input[name=RncClienteFactura]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 9</div>');
		
		} else if($(".FisicoClienteFactura").is(':checked') && this.value.length!=11){
		$("input[name=RncClienteFactura]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 11</div>');
			Ncaracteres.prop('maxLength', 11);
		
		}
	
		} else{

			$(".alert").remove(); 


			$(".TipoClienteFactura").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');
			Ncaracteres.prop('maxLength', 1);


			
		}

});
/*VALIDACION DE RNC Caracteres en los Botones*/

$('.TipoClienteFactura').click(function(){

	var RncSuplidor = $("input[name=RncClienteFactura]").val();

	var RncSuplidor = $("input[name=RncClienteFactura]").val("");
    $("#agregarCliente").val("");
    $("#Nombre_Cliente").val("");
    $("#nuevoTelefono").val("");
    $("#nuevoEmail").val("");


	  
    if ($(".JuridicoClienteFactura").is(':checked') || $(".FisicoClienteFactura").is(':checked')){
    	$(".alert").remove(); 


	    if($(".JuridicoClienteFactura").is(':checked') && RncSuplidor.length!=9){
	    	RncSuplidor.prop('maxLength', 9);

		$("input[name=RncClienteFactura]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 9</div>');
		 
		} else if($(".FisicoClienteFactura").is(':checked') && RncSuplidor.length!=11){
		$("input[name=RncClienteFactura]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 11</div>');
		RncSuplidor.prop('maxLength', 11);
		}
	
		} else{


			$(".TipoClienteFactura").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');


			
		}

});

/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/


$("#RncClienteFactura").keyup(function(){

    if (event.keyCode === 8) {
    $("#agregarCliente").val("");
    $("#Nombre_Cliente").val("");
    $("#nuevoTelefono").val("");
    $("#nuevoEmail").val("");
                    
    }
   	
    $("#Nombre_Cliente").val("");
	$("#nuevoTelefono").val("");
	$("#nuevoEmail").val("");

	
	var Cliente = $(this).val();
	var RncEmpresaCliente = $("#RncEmpresaCliente").val();
    

	var datos = new FormData();
	datos.append("validarCliente", Cliente);
	datos.append("RncEmpresaCliente", RncEmpresaCliente);

	

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

				if(respuesta["Tipo_Cliente"] == "1"){
						$("#JuridicoUsuarioCliente").attr('checked', true);
						$("#fisicoUsuarioCliente").attr('checked', false);  
				}else{
                    $("#JuridicoUsuarioCliente").attr('checked', false);

					 $("#fisicoUsuarioCliente").attr('checked', true);
					  
				}

				$("#agregarCliente").val(respuesta["id"]);
				$("#Nombre_Cliente").val(respuesta["Nombre_Cliente"]);
				$("#nuevoTelefono").val(respuesta["Telefono"]);
				$("#nuevoEmail").val(respuesta["Email"]);

			}else{
				var RncCliente = $("#RncClienteFactura").val();
				
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
					$("#Nombre_Cliente").val(respuesta["Nombre_Empresa_DGII"]);
                    $("#agregarCliente").val("");

					}
		
			}


			});
			}
		 }
	});

    
});


/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("#agregarCliente").change(function(){
    
	var idCliente = $(this).val();
	
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
			if(respuesta){

				if(respuesta["Tipo_Cliente"] == "1"){
						$("#JuridicoClienteFactura").attr('checked', true);
						$("#FisicoClienteFactura").attr('checked', false);  
				}else{

					 $("#JuridicoClienteFactura").attr('checked', false);
					 $("#FisicoClienteFactura").attr('checked', true); 
				}

				$("#RncClienteFactura").val(respuesta["Documento"]);	
				$("#Nombre_Cliente").val(respuesta["Nombre_Cliente"]);
				$("#nuevoTelefono").val(respuesta["Telefono"]);
				$("#nuevoEmail").val(respuesta["Email"]);
               
			} else{
                $("#RncClienteFactura").val("");    
                $("#Nombre_Cliente").val("");
                $("#nuevoTelefono").val("");
                $("#nuevoEmail").val("");



            }
		 }
	});

    

});

$("input[name=Comision_Factura]").click(function(event){
	 $(".Vendedor").empty().append();
  
        
      var valor = $(event.target).val();

if(valor == "2"){
  $(".Vendedor").append(
   '<input type="hidden" class="form-control col-xs-12" id="idVendedor" name="idVendedor" value="0" readonly>');
                        
        }else{
        	window.location = "index.php?ruta=crear-ventas";

        }
        
           
 });

$(".formularioVenta").on("change", "#nuevoMetodoPago", function (){
   $(".divretenciones").empty().append();
   $(".FacturacionRecurrente").empty().append();

   var nuevoMetodoPago = $("#nuevoMetodoPago").val();
   

  if(nuevoMetodoPago != "04"){ 
   $(".divretenciones").append(
    '<div class="input-group">'+

      '<span class="input-group"><h4>¿Desea Realizar una Retención a esta Factura?</h4></span>'+
          '<div class="input-group form-control Retencion">'+
                '<input type="radio" class="opcionretencion" name="Retencion" id="si" value="1" required> SI'+

                '<input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required checked> NO'+
      
          '</div>'+
          
     '</div>'

    );
    $(".FacturacionRecurrente").append(
    '<div class="input-group">'+
      '<span class="input-group"><h4>¿Desea Realizar esta Factura Recurrentemente?</h4></span>'+
          '<div class="input-group form-control">'+
            
            '<input type="radio"  name="VentaRecurrente" id= "no" value="2" required checked> NO'+
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
   
     $(".FacturacionRecurrente").append(
    '<div class="input-group">'+
      '<span class="input-group"><h4>¿Desea Realizar esta Factura Recurrentemente?</h4></span>'+
          '<div class="input-group form-control">'+
            '<input type="radio"  name="VentaRecurrente" id="si" value="1" required> SI'+
            '<input type="radio"  name="VentaRecurrente" id= "no" value="2" required checked> NO'+
          '</div>'+ 
     '</div>'

    );

$(".FormularioRetencion").empty().append();

}
 


 });



$(".formularioVenta").on("click", ".Retencion", function (){
   $(".FormularioRetencion").empty().append();


  var retencion = $('input[name="Retencion"]:checked').val();
   		$("#TotalRet").val(0);
		$("#TotalRetvi").val(0);
		$("#TotalRetvi").number(true, 2);

		agregarImpuesto();
     console.log("retencion", retencion);      
if(retencion == 1){ 

     $(".FormularioRetencion").append(

     	'<div class="col-xs-6 left">'+
     	  '<div class="form-group">'+

                   '<div class="input-group form-control">'+

                      '<label>% ITBIS RETENIDO</label><br>'+

                   
'<input type="radio" class="ITBISRetenido_Ventas" name="ITBISRetenido_Ventas" id="ITBIS30" value="30">30 %<br>'+
'<input type="radio" class="ITBISRetenido_Ventas" name="ITBISRetenido_Ventas" id="ITBIS100" value="100">100 %<br>'+
'<input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" value="0" required>'+
                        
                    '</div>'+

                '</div>'+
             '</div>'+
      '<div class="col-xs-6  right">'+

          '<div class="form-group">'+

               '<div class="input-group form-control">'+

                   '<label>% ISR RETENIDO</label><br>'+

'<input type="radio" class="ISR_RETENIDO_Ventas" name="ISR_RETENIDO_Ventas" id="ISR2_Ventas" value="2">2 %<br>'+
'<input type="radio" class="ISR_RETENIDO_Ventas" name="ISR_RETENIDO_Ventas" id="ISR2_Ventas" value="10">10 %<br>'+
'<input type="text" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" value="0" required><br>'+

                
          '</div>'+
        '</div>'+
        '</div>'      
 );


}/*cierre de if */

});
/**VALIDACION DE ITBIS RETENIDO*/

$(".formularioVenta").on("click", "input.ITBISRetenido_Ventas", function(){
	$(".alert").remove(); 

	 var valor = $(event.target).val();
       var MontoITBIS_Retener = $("#nuevoPrecioImpuesto").val();
        
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


		var ISR_RETENIDO_Ventas = $("#Monto_ISR_Retenido").val();
	
        var TotalRet = Number(MontoITBISPOR) + Number(ISR_RETENIDO_Ventas);
        $("#TotalRet").val(TotalRet);
		$("#TotalRetvi").val(TotalRet);
		$("#TotalRetvi").number(true, 2);


		agregarImpuesto();

           
 });
       
 $(".formularioVenta").on("click", "input.ISR_RETENIDO_Ventas", function(){
	$(".alert").remove(); 

	var valor = $(event.target).val();
    var precioneto = $("#nuevoPrecioNeto").val();
    var descuento = $("#Descuento").val();

    var MontoFacturadoRetener = precioneto - descuento;
         
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

       

       var ITBIS_Retenido = $("#Monto_ITBIS_Retenido").val();
	
        var TotalRet = Number(MontoISRPOR) + Number(ITBIS_Retenido);
        $("#TotalRet").val(TotalRet);
		$("#TotalRetvi").val(TotalRet);
		$("#TotalRetvi").number(true, 2);


		agregarImpuesto();
           
 });  

$(".formularioVenta").on("click", "#HabilitarNCF", function(){
	var NCFanterior = $("#CodigoNCF").val();
	
if(NCFanterior != ""){ 
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
     $("#CodigoNCF").prop('readonly', false);
     $(".NCFanterior").append(
 '<input type="hidden" name="CodigoNCFanterior" id="CodigoNCFanterior" value="'+NCFanterior+'" required>'
 );

       
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
         
        $("#CodigoNCF").prop('readonly', true);
        $(".NCFanterior").empty().append();
         
    }
    
}
});
$(".formularioVenta").on("click", "#HabilitarNCFNo", function(){
	var NCFanterior = $("#CodigoNCFNo").val();
	
	
if(NCFanterior != ""){ 
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
     $("#CodigoNCFNo").prop('readonly', false);
     $(".NCFanteriorNo").append(
 '<input type="text" name="CodigoNCFanterior" id="CodigoNCFanterior" value="'+NCFanterior+'" required>'
 );

       
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
         
        $("#CodigoNCFNo").prop('readonly', true);
        $(".NCFanteriorNo").empty().append();
         
    }
    
}
});
$(document).on("click", ".btnRetenerVentas", function(){

    var id_607 = $(this).attr("id_607");
    
    
    var datos = new FormData();
    datos.append("id_607", id_607);
    
    $.ajax({
        url:"ajax/607.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
           
            
            $("#Rnc_Retener_607").val(respuesta["Rnc_Factura_607"]);
            $("#id_607_Retener").val(respuesta["id"]);
            $("#Codigo_Factura").val(respuesta["Codigo_Factura"]);
            $("#Forma_De_Pago").val(respuesta["extraer_forma_de_pago_607"]);
            $("#NCF_607_Retener").val(respuesta["NCF_607"]);
            $("#FechaFacturames_607_Retener").val(respuesta["Fecha_comprobante_AnoMes_607"]);
            $("#FechaFacturadia_606_Retener").val(respuesta["Fecha_Comprobante_Dia_607"]);
            $("#FechaRetenecionmes_607").val(respuesta["Fecha_Retencion_AnoMes_607"]);
            $("#FechaReteneciondia_607").val(respuesta["Fecha_Retencion_Dia_607"]);         
            $("#MontoFacturadoRetener_607").val(respuesta["Monto_Facturado_607"]);
            $("#MontoITBIS_Retener_607").val(respuesta["ITBIS_Facturado_607"]);
            $("#Monto_ITBIS_Retenido_607").val(respuesta["ITBIS_Retenido_Tercero_607"]);
            $("#Monto_ISR_Retenido_607").val(respuesta["Retencion_Renta_por_Terceros_607"]);


            if(respuesta["Porc_ITBIS_Retenido_607"] == "30"){

             $("#ITBIS30_607").attr('checked', true);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', false);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "75"){

             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', true);
             $("#ITBIS100_607").attr('checked', false);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "100"){

             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', true);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "0"){

             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', false);

            }

            if(respuesta["Porc_ISR_Retenido_607"] == "2"){

             $("#ISR2_607").attr('checked', true);
             $("#ISR10_607").attr('checked', false);
             
            }else if(respuesta["Porc_ISR_Retenido_607"] == "10"){

             $("#ISR2_607").attr('checked', false);
             $("#ISR10_607").attr('checked', true);
            
            }else if(respuesta["Porc_ISR_Retenido_607"] == "0"){

             $("#ISR2_607").attr('checked', false);
             $("#ISR10_607").attr('checked', false);
             
            }
            
            
             }

            
    });


})


/**VALIDACION DE ITBIS RETENIDO*/


$(".formularioVenta").on("click", ".Moneda", function(){

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
$(".formularioVentaRecurrente").on("click", "#observentasrecurrentes", function(){

 $(".textobservaciones").empty().append();
 
 var Obrservacion = $(event.target).val();
 

if(Obrservacion  == "1"){ 

     $(".textobservaciones").append(

'<input type="text" class="form-control col-xs-12"  maxlength="150" id="Observaciones" name="Observaciones" placeholder=" Observaciones de Factura">'

        );
     
 }else{
    $(".textobservaciones").append(
'<input type="hidden" class="form-control col-xs-12"  maxlength="150" id="Observaciones" name="Observaciones" placeholder=" Observaciones de Factura">'


        );


 }
})
$(".formularioVenta").on("click", "input[name=VentaRecurrente]", function(){  
    var facturarecurrente = $(this).val();
    var Cliente = $("#RncClienteFactura").val();  
    var RncEmpresaCliente = $("#RncEmpresaCliente").val();
   

    var datos = new FormData();
    datos.append("validarCliente", Cliente);
    datos.append("RncEmpresaCliente", RncEmpresaCliente);

    $.ajax({
        url:"ajax/ventas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
             
            if(respuesta){
                 switch (facturarecurrente) {
case "1":
swal({
            title: '¿Este Cliente ya esta con una Factura Recurrente ?',
            text: '¡Si desea Agregar otra factura del mismo cliente como recurrente presionar el Boton Si, Agregar Factura',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "No",
            confirmButtonText: "Si, Agregar Factura",
            }).then(function(result){ 


        if(result.value){ 
            $(".FacturacionRecurrente").empty().append();

$(".FacturacionRecurrente").append(
    '<div class="input-group">'+
      '<span class="input-group"><h4>¿Desea Realizar esta Factura Recurrentemente?</h4></span>'+
          '<div class="input-group form-control">'+
            '<input type="radio"  name="VentaRecurrente" id="si" value="1" required checked> SI'+
            '<input type="radio"  name="VentaRecurrente" id= "no" value="2" required > NO'+
          '</div>'+ 
     '</div>'

    );
            
        
        }else{
$(".FacturacionRecurrente").empty().append();

$(".FacturacionRecurrente").append(
    '<div class="input-group">'+
      '<span class="input-group"><h4>¿Desea Realizar esta Factura Recurrentemente?</h4></span>'+
          '<div class="input-group form-control">'+
            '<input type="radio"  name="VentaRecurrente" id="si" value="1" required > SI'+
            '<input type="radio"  name="VentaRecurrente" id= "no" value="2" required checked> NO'+
          '</div>'+ 
     '</div>'

    );
}
        
         
        })
       
   
break;
  
   

}
                

            }
        }
        });


})
$(".ventas").on("click", ".btnVerVentas", function(){
    $(".TASA").empty().append();
    $(".Estado").empty().append();
    $(".productos").empty().append();
    $(".ContabilidadVentas").empty().append();
    
            
    var idVenta = $(this).attr("idVenta");
    var Rnc_Empresa_Venta = $(this).attr("Rnc_Empresa_Venta");
    var RNC_Factura = $(this).attr("RNC_Factura");
    var NCF_607 = $(this).attr("NCF_607");
    var NAsiento = $(this).attr("NAsiento");
    var NAsientoRET = $(this).attr("NAsientoRET");

    var proyecto = $(this).attr("Proyecto");

    var datos = new FormData();
    datos.append("idVenta", idVenta);

    $.ajax({
        url:"ajax/ventas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){



            $("#Nombre_Vendedor").val(respuesta["Nombre_Vendedor"]);
            $("#Tipo_Cliente").val(respuesta["Tipo_Cliente"]);
            $("#Rnc_Cliente").val(respuesta["Rnc_Cliente"]);
            $("#Nombre_Cliente").val(respuesta["Nombre_Cliente"]);
            $("#FechaAnoMes").val(respuesta["FechaAnoMes"]);
            $("#FechaDia").val(respuesta["FechaDia"]);
            $("#Codigo").val(respuesta["Codigo"]);
            $("#NCF_Factura").val(respuesta["NCF_Factura"]);
            $("#Observaciones").val(respuesta["Observaciones"]);
            $("#CodigoProyecto").val(respuesta["CodigoProyecto"]);
            $("#nuevoPrecioNetovi").val(respuesta["Neto"]);
            $("#nuevoPrecioNetovi").number(true, 2);
            $("#Pordescuento").val(respuesta["Pordescuento"]);
            $("#Descuento").val(respuesta["Descuento"]);
            $("#Descuento").number(true, 2);
            $("#Porimpuesto").val(respuesta["Porimpuesto"]);
            $("#Impuesto").val(respuesta["Impuesto"]);
            $("#Impuesto").number(true, 2);
            $("#Total").val(respuesta["Total"]);
            $("#Total").number(true, 2);
            $("#Moneda").val(respuesta["Moneda"]);
            $("#NAsiento").val(respuesta["NAsiento"]);
            $("#NAsientoRET").val(respuesta["NAsientoRET"]);
            var Producto = JSON.parse(respuesta["Producto"]);
            var NAsientoRET = respuesta["NAsientoRET"];
            
 
            
if(respuesta["Moneda"] == "USD"){
    $(".TASA").append(
        

        '<span class="input-group-addon"><i class="ion ion-social-usd">&nbsp;DOP</i></span>'+

        '<input type="text" class="form-control" id="tasaUS" name="tasaUS" readonly>'
         

        );
    $("#tasaUS").val(respuesta["Tasa"]);

}

var ver = 0;


for(let item of Producto){
    var ver = ver+1;

$(".productos").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
'<div class="col-xs-1" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+ver+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
        
  '<div class="col-xs-4" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+item.descripcion+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+item.cantidad+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
   '<div class="col-xs-2" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+item.precio+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
                          
      '<div input-group">'+
                            
   '<input type="text" class="form-control" value="'+item.total+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  
'</div>'
);
 }


 var idCliente = respuesta[" id_Cliente"];
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
                if(respuesta["Tipo_Cliente"] = 1){
                    $("#Tipo_Cliente").val("Jurídico");

                }else{
                    $("#Tipo_Cliente").val("Físico");

                }
        }
    
    })

 }


});
var RncEmpresa607 = Rnc_Empresa_Venta;

var Rnc_Factura_607 = RNC_Factura;



var datos = new FormData();
    datos.append("RncEmpresa607", RncEmpresa607);
    datos.append("Rnc_Factura_607", Rnc_Factura_607);
    datos.append("NCF_607", NCF_607);

$.ajax({
        url:"ajax/607.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
 $("#Forma_Pago_607").val(respuesta["Forma_de_Pago_607"]);

 var TotalRet =  Number(respuesta["ITBIS_Retenido_606"]) + Number(respuesta["Monto_Retencion_Renta_606"]);  
            $("#TotalRetvi").val(TotalRet);
            $("#TotalRetvi").number(true, 2);
            $("#ITBIS_Retenido_607").val(respuesta["ITBIS_Retenido_Tercero_607"]);
            $("#ITBIS_Retenido_607").number(true, 2);
            $("#Porc_ITBIS_Retenido_607").val(respuesta["Porc_ITBIS_Retenido_607"]);
            $("#Monto_Retencion_Renta_607").val(respuesta["Retencion_Renta_por_Terceros_607"]);
            $("#Monto_Retencion_Renta_607").number(true, 2);
            $("#Porc_ISR_Retenido_607").val(respuesta["Porc_ISR_Retenido_607"]);
            $("#Tipo_Retencion_ISR_607").val(respuesta["Tipo_Retencion_ISR_607"]);

}/*cierre respuesta*/
});/*cierre ajax 606*/

var Rnc_Empresa_LD = Rnc_Empresa_Venta;
var Rnc_Factura = RNC_Factura;
var NCF = NCF_607;
        

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
$(".ContabilidadVentas").append(
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

    $(".ContabilidadVentas").append(
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

$(".ContabilidadVentas").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
    '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-4" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">TOTAL</label>'+  
                            
     '</div>'+
  '</div>'+

'<div class="col-xs-3" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" id="debito" value="'+debito+'" required readonly>'+ 
              
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-3" style="padding-left:0px">'+
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




        
});


