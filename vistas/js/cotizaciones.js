
$('.cotizacion').DataTable({
    
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
        var min = parseInt( $('#mincotizacion').val(), 10 );
        var max = parseInt( $('#maxcotizacion').val(), 10 );
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
        var min = parseInt( $('#mindiacotizacion').val(), 10 );
        var max = parseInt( $('#maxdiacotizacion').val(), 10 );
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
    var table = $('.cotizacion').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#mincotizacion, #maxcotizacion').keyup( function() {
        table.draw();
    } );
    $('#mindiacotizacion, #maxdiacotizacion').keyup( function() {
        table.draw();
    } );
   


 } );
/***********************************
ACTIVAR O DESACTIVIAR USUARIO
***********************************/

$(document).on("click", ".btnActivarCotizacion" ,function(){
	var idCotizacion = $(this).attr("idCotizacion");
	var estadoCotizacion = $(this).attr("estadoCotizacion");

	var datos = new FormData();

	datos.append("idCotizacion", idCotizacion);
	datos.append("estadoCotizacion", estadoCotizacion);

	$.ajax({
		url:"ajax/cotizaciones.ajax.php",
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
						window.location="cotizaciones";}
				});
			
		}
	});

})
$("#NCotizacion").on('keyup', function () {
	$(".alert").remove(); 

	var Ncaracteres = $(this);
   
    this.value = this.value.replace(/[^COT0-9]/g,'');

     num1=this.value.charAt(0);
     num2=this.value.charAt(1);
     num3=this.value.charAt(2);

  if(num1!='C'){
  	$("#NCotizacion").after('<div class="alert alert-danger">ATENCION..!! EL N° de CORRELATIVO Debe comenzar por COT En MAYUSCULA, sino, el sistema no le permitira escribir en el campo</div>');
	 Ncaracteres.prop('maxLength', 1);		
      
  }else if(num2!='O'){
  	$("#NCotizacion").after('<div class="alert alert-danger">ATENCION..!! EL N° de CORRELATIVO Debe comenzar por COT En MAYUSCULA, sino, el sistema no le permitira escribir en el campo</div>');
	 Ncaracteres.prop('maxLength', 2);	


  }else if(num3!='T'){
  	$("#NCotizacion").after('<div class="alert alert-danger">ATENCION..!! EL N° de CORRELATIVO Debe comenzar por COT En MAYUSCULA, sino, el sistema no le permitira escribir en el campo</div>');
	 Ncaracteres.prop('maxLength', 11);	


  }


});


/*************************************
	EDITAR CATEGORIAS
**************************************/
$(document).on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

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

			
			$("#idCliente").val(respuesta["id"]);
			
			if(respuesta["Tipo_Cliente"] == "1"){
			    
			 $("#JuridicoUsuarioCliente").attr('checked', true);
			 $("#fisicoUsuarioCliente").attr('checked', false);
			    
			    
			}else {
			$("#fisicoUsuarioCliente").attr('checked', true);
			$("#JuridicoUsuarioCliente").attr('checked', false);
			    
			}
			
			
			$("#editarCliente").val(respuesta["Nombre_Cliente"]);
			$("#editarDocumentoId").val(respuesta["Documento"]);
			$("#editarEmail").val(respuesta["Email"]);
			$("#editarTelefono").val(respuesta["Telefono"]);
			$("#editarDireccion").val(respuesta["Direccion"]);
			$("#editarFechaNacimiento").val(respuesta["Fecha_Nacimiento"]);
			
			

		}




	});


})
$(document).on("click", ".btnEliminarCotizacion", function(){

	var idCotizacion = $(this).attr("idCotizacion");
	
	swal({
			title: '¿Esta usted Seguro de Borrar la Cotización?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Cotizacion",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=cotizaciones&idCotizacion="+idCotizacion;
					}
		});



	})

$(".cotizacion").on("click", ".btnImprimirCotizacion", function(){

	var idCotizacion = $(this).attr("idCotizacion");
	var ModeloFactura = $(this).attr("ModeloFactura");


	 switch (ModeloFactura) {
  case "1":
  window.open("extensiones/tcpdf/pdf/EstandarCotizacion.php?Cotizacion="+idCotizacion, "_blank");

   
    break;
  case "2":
    window.open("extensiones/tcpdf/pdf/EjecutivaCotizacion.php?Cotizacion="+idCotizacion, "_blank");

    break;

    case "3":
    window.open("extensiones/tcpdf/pdf/ComercialCotizacion.php?Cotizacion="+idCotizacion, "_blank");

    break;

}

})
$(".cotizacion").on("click", ".btnFacturarCotizacion", function(){
   
    var NCotizacion = $(this).attr("NCotizacion");
    var ModeloFactura = $(this).attr("ModeloFactura");

   

    swal({
            title: '¿Desea Factura Fiscal?',
            text: '¡Si desea que la factura sea Fiscal presiona Boton Si, Factura Fiscal',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "No",
            confirmButtonText: "Si,Factura Fiscal",
            }).then(function(result){

        if(result.value){

        window.location = "index.php?ruta=crear-ventas-cotizacion&NCotizacion="+NCotizacion;

            
            }else {
        window.location = "index.php?ruta=crear-ventas-pro-cotizacion&NCotizacion="+NCotizacion;

         


        }
        
        })
});

$(".cotizacion").on("click", ".btnVerCotizacion", function(){
    $(".TASA").empty().append();
    $(".Estado").empty().append();
    $(".productos").empty().append();
    
            
    
    var idCotizacion = $(this).attr("idCotizacion");
    var Rnc_Empresa_Cotizacion = $(this).attr("Rnc_Empresa_Cotizacion");
    var Rnc_Cliente = $(this).attr("Rnc_Cliente");
    var NCF_Cotizacion = $(this).attr("NCF_Cotizacion");
    

    var datos = new FormData();
    datos.append("idCotizacion", idCotizacion);

    $.ajax({
        url:"ajax/cotizaciones.ajax.php",
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
            $("#NCF_Cotizacion").val(respuesta["NCF_Cotizacion"]);
            $("#Observaciones").val(respuesta["Observaciones"]);
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
            var Producto = JSON.parse(respuesta["Producto"]);
            
 if(respuesta["Estado_Cotizacion"] == 0){

 $(".Estado").append(
    '<div class="input-group">'+
        '<span class="input-group-addon"><i class="fa fa-key">Estado</i></span>'+
        
        '<input "type="text" class="form-control" value="EMITIDA" readonly>'+

         
    '</div>'
);
}else if(respuesta["Estado_Cotizacion"] == 1){
 $(".Estado").append(
    '<div class="input-group">'+
        '<span class="input-group-addon"><i class="fa fa-key">Estado</i></span>'+
        
        '<input  "type="text" class="form-control" value="APROBADA" readonly>'+

         
    '</div>'
);
            
}else {
 $(".Estado").append(
    '<div class="input-group">'+
        '<span class="input-group-addon"><i class="fa fa-key">Estado</i></span>'+
        
        '<input "type="text" class="form-control" value="RECHAZADA" readonly>'+

         
    '</div>'
);
            
}

            
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
});