

/*******************************************************
CARGAR LA TABLA DINAMICA DE PRODUCTOS
*********************************************************/
    var RncEmpresaCXC = $("#RncEmpresaCXC").val();
   
// $.ajax({
    //url: "ajax/datatable-productos.ajax.php?RncEmpresaProductos="+RncEmpresaProductos,
        
        
        //success: function(respuesta){
        //  console.log("respuesta", respuesta);
            
        //}

//})

/**********************************
     DATATABLE DATATABLE DATATABLE
************************************/

$('.tablaReporteCXC').DataTable({

  
     lengthMenu : [[50, 100, 200,250, 300, -1],[50, 100, 200,250, 300, "Todo"]],
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
                .column( 9 )
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
            
            // otra columna
             // Total over all pages
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
            // otra columna
             // Total over all pages
    
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
        var min = parseInt( $('#mincxc').val(), 10 );
        var max = parseInt( $('#maxcxc').val(), 10 );
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
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#mindiacxc').val(), 10 );
        var max = parseInt( $('#maxdiacxc').val(), 10 );
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

$(document).ready(function() {
    var table = $('.tablaReporteCXC').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#mincxc, #maxcxc').keyup( function() {
        table.draw();
    } );
    $('#mindiacxc, #maxdiacxc').keyup( function() {
        table.draw();
    } );
   


 } );



$('.ReporteCXC').DataTable({

    
     lengthMenu : [[25, 100, 200,250, 300, -1],[25, 100, 200,250, 300, "Todo"]],


        
        "deferRender": true,
        "retrieve": true,
        "processing": true,
        "paging": true,
        "autoWidth": true,
    "footerCallback": function ( row, data, start, end, display ) {
              var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 7 )
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
    dom:"Blfrtip",
            buttons:[
                {extend:'excel',text:'Excel'},
                {extend:'csv',text:'CSV'}    
            ]
 });

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
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
 
$(document).ready(function() {
    var table = $('.ReporteCXC').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );


    } );
$(".tablaReporteCXC").on("click", ".btnRegistrarCXC", function(){

    var id_CXC = $(this).attr("id_CXC");
    var idCliente = $(this).attr("idCliente");
    var Moneda = $(this).attr("Moneda");
  
    
    window.location = "index.php?ruta=recibodecobro&id_CXC="+id_CXC+"&idCliente="+idCliente+"&Moneda="+Moneda; 


});
$(document).on("change", "#ReciboCobroMoneda", function(){

    var id_CXC = $("#idCXC").val();
    var idCliente = $("#idCliente").val();
    
    var Moneda = $(event.target).val();
 
  
window.location="index.php?ruta=recibodecobro&id_CXC="+id_CXC+"&idCliente="+idCliente+"&Moneda="+Moneda; 


})

$(document).on("change", "#MonedaParaCobro", function(){

    var id_CXC = $("#idCXC").val();
    var idCliente = $("#idCliente").val();
    
    var Moneda = $(event.target).val();
 
  
 listarFacturasCXC();

})

$(document).on("click", "#ReportePDFCXC", function(){ 

    var RncEmpresaPDFCXC = $("#RncEmpresaPDFCXC").val();
    var PeriodoCXC = $("#PeriodoCXC").val();
    var EstadoCXC = $("#EstadoCXC").val();
    

     if(PeriodoCXC == "Todo"){
        if(EstadoCXC == "PorCobrar"){
              window.open("extensiones/tcpdf/pdf/ReportePDFCXCTodoPorCobrar.php?RncEmpresaPDFCXC="+RncEmpresaPDFCXC+"&PeriodoCXC="+PeriodoCXC+"&EstadoCXC="+EstadoCXC, "_blank");



        }/*Pagado*/else{
            window.open("extensiones/tcpdf/pdf/ReportePDFCXCTodoCobrado.php?RncEmpresaPDFCXC="+RncEmpresaPDFCXC+"&PeriodoCXC="+PeriodoCXC+"&EstadoCXC="+EstadoCXC, "_blank");



        
        }


     }/*periodo*/else{
        if(EstadoCXC == "PorCobrar"){
            window.open("extensiones/tcpdf/pdf/ReportePDFCXCPeriodoPorCobrar.php?RncEmpresaPDFCXC="+RncEmpresaPDFCXC+"&PeriodoCXC="+PeriodoCXC+"&EstadoCXC="+EstadoCXC, "_blank");

             

        }/*Pagado Periodo*/else{
             window.open("extensiones/tcpdf/pdf/ReportePDFCXCPeriodoCobrado.php?RncEmpresaPDFCXC="+RncEmpresaPDFCXC+"&PeriodoCXC="+PeriodoCXC+"&EstadoCXC="+EstadoCXC, "_blank");

             
        
        }



     }

   

 });

$(document).on("click", "#ReportePDFCXCCliente", function(){ 

    var RncEmpresaPDFCXC = $("#RncEmpresaPDFCXCCliente").val();
    var PeriodoCXC = $("#PeriodoCXCCliente").val();
    var EstadoCXC = $("#EstadoCXCCliente").val();
    var Cliente = $("#agregarcliente").val();
    
    if(Cliente != ""){ 

     if(PeriodoCXC == "Todo"){
        if(EstadoCXC == "PorCobrar"){
              window.open("extensiones/tcpdf/pdf/ReportePDFCXCClienteTodoPorCobrar.php?RncEmpresaPDFCXC="+RncEmpresaPDFCXC+"&PeriodoCXC="+PeriodoCXC+"&EstadoCXC="+EstadoCXC+"&Cliente="+Cliente, "_blank");



        }/*Pagado*/else{
            window.open("extensiones/tcpdf/pdf/ReportePDFCXCClienteTodoCobrado.php?RncEmpresaPDFCXC="+RncEmpresaPDFCXC+"&PeriodoCXC="+PeriodoCXC+"&EstadoCXC="+EstadoCXC+"&Cliente="+Cliente, "_blank");



        
        }


     }/*periodo*/else{
        if(EstadoCXC == "PorCobrar"){
            window.open("extensiones/tcpdf/pdf/ReportePDFCXCClientePeriodoPorCobrar.php?RncEmpresaPDFCXC="+RncEmpresaPDFCXC+"&PeriodoCXC="+PeriodoCXC+"&EstadoCXC="+EstadoCXC+"&Cliente="+Cliente, "_blank");

             

        }/*Pagado Periodo*/else{
             window.open("extensiones/tcpdf/pdf/ReportePDFCXCClientePeriodoCobrado.php?RncEmpresaPDFCXC="+RncEmpresaPDFCXC+"&PeriodoCXC="+PeriodoCXC+"&EstadoCXC="+EstadoCXC+"&Cliente="+Cliente, "_blank");

             
        
        }



     }
 }else{

        
        swal({
            type: "error",
            title: "¡Seleccione un Cliente!",
            text: "¡Debe Selecionar un Cliente!",
            confirmButtonText: "¡Cerrar!"
                    
        });



 }
   

 });
$(document).on("click", ".btnRetenerCXC", function(){

     var URLactual = window.location.href;

    var Estado  = $(this).attr("Estado");

    if(Estado == "Porcobrar"){ 


    var Moneda = $(this).attr("Moneda"); 
    var Tasa = $(this).attr("Tasa");
     

    var Rnc_Empresa_607 = $(this).attr("Rnc_Empresa_607");
    var Rnc_Factura_607 = $(this).attr("Rnc_Factura_607");
    var NCF_607 = $(this).attr("NCF_607");
   
    var datos = new FormData();
    datos.append("Rnc_Empresa_607", Rnc_Empresa_607);
    datos.append("Rnc_Factura_607", Rnc_Factura_607);
    datos.append("NCF_607", NCF_607);
    
    $.ajax({
        url:"ajax/cxc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
           
           $("#Moneda").val(Moneda);
            $("#Tasa").val(Tasa);
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


            if(Moneda == "USD"){
                var MontoFacturado = respuesta["Monto_Facturado_607"]/Tasa;
                var MontoITBIS = respuesta["ITBIS_Facturado_607"]/Tasa;

            $("#MontoFacturadoRetener_607").val(MontoFacturado);
            $("#MontoITBIS_Retener_607").val(MontoITBIS);

            }else{
            $("#MontoFacturadoRetener_607").val(respuesta["Monto_Facturado_607"]);
            $("#MontoITBIS_Retener_607").val(respuesta["ITBIS_Facturado_607"]);


            }



            if(respuesta["Porc_ITBIS_Retenido_607"] == "30"){
             
             $("#ITBIS0_607").attr('checked', false);
             $("#ITBIS30_607").attr('checked', true);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', false);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "75"){
             $("#ITBIS0_607").attr('checked', false);
             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', true);
             $("#ITBIS100_607").attr('checked', false);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "100"){

             $("#ITBIS0_607").attr('checked', false);
             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', true);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "0"){
             
             $("#ITBIS0_607").attr('checked', true);
             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', false);

            }

            if(respuesta["Porc_ISR_Retenido_607"] == "2"){
             $("#ISR0_607").attr('checked', false);
             $("#ISR2_607").attr('checked', true);
             $("#ISR10_607").attr('checked', false);
             
            }else if(respuesta["Porc_ISR_Retenido_607"] == "10"){
             $("#ISR0_607").attr('checked', false);
             $("#ISR2_607").attr('checked', false);
             $("#ISR10_607").attr('checked', true);
            
            }else if(respuesta["Porc_ISR_Retenido_607"] == "0"){
             $("#ISR0_607").attr('checked', true);
             $("#ISR2_607").attr('checked', false);
             $("#ISR10_607").attr('checked', false);
             
            }
            
            
             }

            
    });

 }/*porcobrar*/
 else{
    
    swal({
            title: "¡Usted no puede aplicarle Retención a esta factura!",
            text: "¡ esta en estatus cobrada!",
            type: 'error',
            confirmButtonColor: '#d33',
            confirmButtonText: "Cerrar",
            }).then(function(result){

        if(result.value){
            window.location = URLactual;
                    }
        });
  

 
 }


});
$(document).on("click", ".btnRetenerCXCrecibocobro", function(){

     var URLactual = window.location.href;

    

    var Moneda = $(this).attr("Moneda"); 
    var Tasa = $(this).attr("Tasa");
     

    var Rnc_Empresa_607 = $(this).attr("Rnc_Empresa_607");
    var Rnc_Factura_607 = $(this).attr("Rnc_Factura_607");
    var NCF_607 = $(this).attr("NCF_607");
   
    var datos = new FormData();
    datos.append("Rnc_Empresa_607", Rnc_Empresa_607);
    datos.append("Rnc_Factura_607", Rnc_Factura_607);
    datos.append("NCF_607", NCF_607);
    
    $.ajax({
        url:"ajax/cxc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
           
           $("#Monedarecibocobro").val(Moneda);
            $("#Tasa").val(Tasa);
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


            if(Moneda == "USD"){
                var MontoFacturado = respuesta["Monto_Facturado_607"]/Tasa;
                var MontoITBIS = respuesta["ITBIS_Facturado_607"]/Tasa;

            $("#MontoFacturadoRetener_607").val(MontoFacturado);
            $("#MontoITBIS_Retener_607").val(MontoITBIS);

            }else{
            $("#MontoFacturadoRetener_607").val(respuesta["Monto_Facturado_607"]);
            $("#MontoITBIS_Retener_607").val(respuesta["ITBIS_Facturado_607"]);


            }



            if(respuesta["Porc_ITBIS_Retenido_607"] == "30"){
             
             $("#ITBIS0_607").attr('checked', false);
             $("#ITBIS30_607").attr('checked', true);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', false);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "75"){
             $("#ITBIS0_607").attr('checked', false);
             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', true);
             $("#ITBIS100_607").attr('checked', false);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "100"){

             $("#ITBIS0_607").attr('checked', false);
             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', true);

            }else if(respuesta["Porc_ITBIS_Retenido_607"] == "0"){
             
             $("#ITBIS0_607").attr('checked', true);
             $("#ITBIS30_607").attr('checked', false);
             $("#ITBIS75_607").attr('checked', false);
             $("#ITBIS100_607").attr('checked', false);

            }

            if(respuesta["Porc_ISR_Retenido_607"] == "2"){
             $("#ISR0_607").attr('checked', false);
             $("#ISR2_607").attr('checked', true);
             $("#ISR10_607").attr('checked', false);
             
            }else if(respuesta["Porc_ISR_Retenido_607"] == "10"){
             $("#ISR0_607").attr('checked', false);
             $("#ISR2_607").attr('checked', false);
             $("#ISR10_607").attr('checked', true);
            
            }else if(respuesta["Porc_ISR_Retenido_607"] == "0"){
             $("#ISR0_607").attr('checked', true);
             $("#ISR2_607").attr('checked', false);
             $("#ISR10_607").attr('checked', false);
             
            }
            
            
             }

            
    });



});
$(document).on("change", "#agregarClienteCXC", function(){

    var idCliente = $(this).val();
    var Moneda = "DOP";
   
    window.location = "index.php?ruta=recibodecobro&idCliente="+idCliente+"&Moneda="+Moneda; 

});

$(".formularioCobroCXC").ready(function() {
   listarFacturasCXC();
    sumarmontoCXC();
    sumarDiferenciaCXC();

 });

$(document).on("click", ".agregarFacturaCXC", function (){
   

    var id_CXC = $(this).attr("id_CXC");
    var id_607 = $(this).attr("id_607");
    var codigo = $(this).attr("codigo");
    var rnc_Factura = $(this).attr("rnc_Factura");

    var id_cliente = $(this).attr("id_cliente");
    var nombre_cliente = $(this).attr("nombre_cliente");
    var ncf_factura = $(this).attr("ncf_factura");

   var ReciboCobroMoneda = $("#ReciboCobroMoneda").val();
   var MonedaParaCobro = $('input[name=MonedaParaCobro]:checked').val()

   var tasahistorica = $(this).attr("tasa");
   var monto = $(this).attr("monto");


   

   if(!document.querySelector('input[name="MonedaParaCobro"]:checked')) {


        swal({

            title: "Error, Debe Seleccionar la Moneda Con que se Efectua el cobro",
            type: "error",
            confirmButtonText: "¡Cerrar!"

        });

    
   


   }else{
        $(this).removeClass("btn-primary agregarFacturaCXC");
        $(this).addClass("btn-default");

     if(ReciboCobroMoneda == MonedaParaCobro){
         tasa = 1;
         var cxcpesos =  monto * tasa;
      }else{ 

        if(ReciboCobroMoneda == "DOP" && MonedaParaCobro == "USD"){
         tasa = 1;
         var cxcpesos =  monto * tasa;
        }

      if(ReciboCobroMoneda == "USD" && MonedaParaCobro == "DOP"){
         var tasa = $(this).attr("tasa");
        var cxcpesos =  monto * tasa;
       
        }



    }

        $(".nuevafacturaCXC").append(
'<div class="row" style="padding:1px 20px">'+
    '<div class="col-xs-3" style="padding-right:0px">'+
        '<div class="input-group">'+
            '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarFactura" id_CXC="'+id_CXC+'"><i class="fa fa-times"></i></button>'+
                          '</span>'+
'<input type="hidden" class="form-control id_CXC" id_CXC="'+id_CXC+'" name="id_CXC" value="'+id_CXC+'" required readonly>'+ 
    '<input type="hidden" class="form-control id_607" name="id_607" value="'+id_607+'" required readonly>'+ 
    '<input type="hidden" class="form-control codigo" name="codigo" value="'+codigo+'" required readonly>'+ 
    '<input type="hidden" class="form-control id_cliente" name="id_cliente" value="'+id_cliente+'" required readonly>'+ 
           
        '<input type="hidden" class="form-control rnc_Factura" name="rnc_Factura" value="'+rnc_Factura+'" required readonly>'+ 
        '<input type="hidden" class="form-control nombre_cliente" name="nombre_cliente" value="'+nombre_cliente+'" required readonly>'+ 
        
        '<input title="NCF Factura" type="text" class="form-control ncf_factura" name="ncf_factura" value="'+ncf_factura+'" required readonly>'+ 
                                            
        '</div>'+
    '</div>'+
    

'<div class="col-xs-2" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="Monto de Cuenta por Cobrar" type="text" class="form-control monto" name="monto" value="'+monto+'" required>'+ 
                  
        '</div>'+
     '</div>'+
     
'<div class="col-xs-1 tasaCXC" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="Tasa Cambiaria" type="text" class="form-control tasa" name="tasa" value="'+tasa+'" required readonly>'+ 
        '<input type="hidden" class="form-control tasahistorica" name="tasahistorica" value="'+tasahistorica+'" required readonly>'+ 
                   
        '</div>'+
'</div>'+
'<div class="col-xs-2" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="CXC en Pesos" type="text" class="form-control cxcpesos" name="cxcpesos" value="'+cxcpesos+'" required readonly>'+ 
                  
        '</div>'+
     '</div>'+
'<div class="col-xs-2" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="Ingreso en Banco" type="text" class="form-control ingbanco" name="ingbanco" value="'+cxcpesos+'" required>'+ 
                  
        '</div>'+
     '</div>'+
     '<div class="col-xs-2" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="Diferencia entre la CXC y el Ingreso al Banco" type="text" class="form-control diferencia" name="diferencia" value="0" required>'+ 
                  
        '</div>'+
     '</div>'+
'</div>'
    );
 
    listarFacturasCXC();
    sumarmontoCXC();
    sumarDiferenciaCXC();
       


    

    }

   
    
   

   
  
      
});
/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarCuenta = [];

localStorage.removeItem("quitarFactura");

                
                    
$(".formularioCobroCXC").on("click", "button.quitarFactura", function (){

  $(this).parent().parent().parent().parent().remove();

  var id_CXC = $(this).attr("id_CXC");

  /******************************************
  ALMACENAR EL ID DEL PORDUCTO A QUITAR
  *******************************************/

  if(localStorage.getItem("quitarFactura") == null){

    idQuitarCuenta = [];


  } else {

      idQuitarCuenta.concat(localStorage.getItem("quitarFactura"))

  }

    idQuitarCuenta.push({"id_CXC":id_CXC});
    localStorage.setItem("quitarFactura", JSON.stringify(idQuitarCuenta));

    $("button.recuperarFacturaCXC[id_CXC='"+id_CXC+"']").removeClass('btn-default');

    $("button.recuperarFacturaCXC[id_CXC='"+id_CXC+"']").addClass('btn-primary agregarFacturaCXC');
    

    localStorage.setItem("quitarFactura", JSON.stringify(idQuitarCuenta));
     if($(".nuevafacturaCXC").children().length == 0){
        $("#TotalCobrovi").val(0);
        $("#TotalCobrovi").number(true, 2);
        $("#TotalCobro").val(0);


  }

//SUMAR PRODUCTOS
                listarFacturasCXC();
                sumarmontoCXC();
                sumarDiferenciaCXC();

});
$(".formularioCobroCXC").on("keyup", ".monto", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  
    var monto = $(this).val();
    var tasa = $(this).parent().parent().parent().children(".tasaCXC").children().children(".tasa");
    var cxcpesos = $(this).parent().parent().parent().children().children().children(".cxcpesos");
    var ingbanco = $(this).parent().parent().parent().children().children().children(".ingbanco");
   var diferencia = $(this).parent().parent().parent().children().children().children(".diferencia");
   

    var calculomonto = $(this).val() * tasa.val();
    

    cxcpesos.val(calculomonto);
    ingbanco.val(calculomonto);
    diferencia.val("0");

   
   
   // SUMAR PRODUCTOS
sumarmontoCXC();
   
// AGRUPAR productos JSON
 listarFacturasCXC();
 sumarDiferenciaCXC();
            

})

$(".formularioCobroCXC").on("keyup", ".ingbanco", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  
    var ingbanco = $(this).val();
    var cxcpesos = $(this).parent().parent().parent().children().children().children(".cxcpesos");
     var diferencia = $(this).parent().parent().parent().children().children().children(".diferencia");
   

    var calculodiferencia = cxcpesos.val() - $(this).val();

   

        let t = calculodiferencia.toFixed(5);
        let regex=/[+-]?[0-9]{1,9}(\.\d{0,2})/;
        var Montodiferencia = t.match(regex)[0];

        
    
    diferencia.val(Montodiferencia);
   
   
   
   // SUMAR PRODUCTOS
sumarmontoCXC();
   
// AGRUPAR productos JSON
 listarFacturasCXC();
 sumarDiferenciaCXC();
            

})

function listarFacturasCXC(){

  var listaFacturas = [];

  var id_CXC = $(".id_CXC");
  var id_607 = $(".id_607");
  var codigo = $(".codigo");
  var id_cliente = $(".id_cliente");
  var rnc_Factura = $(".rnc_Factura");
  var nombre_cliente = $(".nombre_cliente");
  var ncf_factura = $(".ncf_factura");
  var monto = $(".monto");
  var tasa =  $(".tasa");
  var tasahistorica = $(".tasahistorica");
  var cxcpesos = $(".cxcpesos");
  var ingbanco = $(".ingbanco");
  var diferencia = $(".diferencia");

  for(var i = 0; i < id_CXC.length; i++){

    listaFacturas.push({"id" : $(id_CXC[i]).attr("id_CXC"),
                        "id_607" : $(id_607[i]).val(),
                        "codigo" : $(codigo[i]).val(),
                        "id_cliente" : $(id_cliente[i]).val(),
                        "rnc_Factura" : $(rnc_Factura[i]).val(),
                        "nombre_cliente" : $(nombre_cliente[i]).val(),
                        "ncf_factura" : $(ncf_factura[i]).val(),
                        "monto" : $(monto[i]).val(),
                        "tasa" : $(tasa[i]).val(),
                        "tasahistorica" : $(tasahistorica[i]).val(),
                        "cxcpesos" : $(cxcpesos[i]).val(),
                        "ingbanco" : $(ingbanco[i]).val(),
                        "diferencia" : $(diferencia[i]).val()})


  }

  $("#listaFacturasCXC").val(JSON.stringify(listaFacturas)); 

}
/***********************************
SUMAR Montos
************************************/
function sumarmontoCXC(){

  var montoItem = $(".ingbanco");
  var arraySumaMonto = [];

  if(montoItem.length > 0){ 


  for (var i = 0; i < montoItem.length; i++){

    arraySumaMonto.push(Number($(montoItem[i]).val()));


  }

  function sumaArrayMontos(total, numero){

    return total + numero;


  }
   var sumarMontos = arraySumaMonto.reduce(sumaArrayMontos);
  let t = sumarMontos.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var sumarTotalMontos = t.match(regex)[0];




}/*cierre de if*/

 
$("#TotalCobrovi").val(sumarTotalMontos);
$("#TotalCobrovi").number(true, 2);
      

$("#TotalCobro").val(sumarTotalMontos);

 
  
  listarFacturasCXC();


}

function sumarDiferenciaCXC(){

  var diferenciaItem = $(".diferencia");
 
  
  var arraySumadiferencia = [];

  if(diferenciaItem.length > 0){ 


  for (var i = 0; i < diferenciaItem.length; i++){

    arraySumadiferencia.push(Number($(diferenciaItem[i]).val()));

   


  }

  function sumaArraydiferencias(total, numero){

    return total + numero;


  }
   var sumardiferencias = arraySumadiferencia.reduce(sumaArraydiferencias);
  let  t = sumardiferencias.toFixed(5);
  let regex=/[+-]?[0-9]{1,9}(\.\d{0,2})/;
  var sumarTotaldiferencias = t.match(regex)[0];


}/*cierre de if*/

$("#Diferenciavi").val(sumarTotaldiferencias);
$("#Diferenciavi").number(false, 2);
$("#Diferencia").val(sumarTotaldiferencias);
  // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

 if(sumarTotaldiferencias > 0){

$("#Tipodiferencia").attr('required', true);

  }else{
$("#Tipodiferencia").attr('required', false);

  }


   listarFacturasCXC();
  

 
  
 }
$(document).on("click", ".btnEditarRecibodeCobro", function(){

    var id = $(this).attr("id");
    var nasiento = $(this).attr("NAsiento");
    var Rnc_Empresa_cxc= $(this).attr("Rnc_Empresa_cxc"); 
    var Rnc_Cliente= $(this).attr("Rnc_Cliente"); 
    
    
    var Moneda =  $(this).attr("Moneda");
 
  
//window.location="index.php?ruta=recibodecobro&id_CXC="+id_CXC+"&idCliente="+idCliente+"&Moneda="+Moneda; 


window.location = "index.php?ruta=Editar-recibodecobro&id="+id+"&nasiento="+nasiento+"&Rnc_Empresa_cxc="+Rnc_Empresa_cxc+"&Rnc_Cliente="+Rnc_Cliente+"&Moneda="+Moneda; 

 
   

 })
$(document).on("click", ".btnEliminarRecibodeCobro", function(){
  
  var id = $(this).attr("id");
  var NAsiento = $(this).attr("NAsiento");
  var Rnc_Empresa_cxc = $(this).attr("Rnc_Empresa_cxc");
  var Rnc_Cliente = $(this).attr("Rnc_Cliente");
  var accion = "eliminar";
  

  swal({
      title: '¿Esta usted Seguro de Borrar el Recibo de pago?',
      text: '¡Si no lo esta puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelmButtonText: "Cancelar",
      confirmButtonText: "Si, borrar Recibo",
      }).then(function(result){

    if(result.value){
      window.location = "index.php?ruta=detallerecibodecobro&id="+id+"&NAsiento="+NAsiento+"&Rnc_Empresa_cxc="+Rnc_Empresa_cxc+"&Rnc_Cliente="+Rnc_Cliente+"&accion="+accion;
          }
    });
});

$(document).on("click", "#FiltrarCXC", function(){

    var EstadoCXC = $("#EstadoCXCSelect").val();
   
if(EstadoCXC == ""){
  window.location = "index.php?ruta=reportecxc";
  
}else{
window.location = "index.php?ruta=reportecxc&EstadoCXC="+EstadoCXC; 

}

    

 })


$(document).on("click", "#cobroperiodo", function(){ 

    var EstatusCXC = $("#EstatusCXC").val();
    var fechacobroperiodo = $("#fechacobroperiodo").val();
   console.log(fechacobroperiodo, "fechacobroperiodo");
if(EstatusCXC != ""){ 
    if(fechacobroperiodo != ""){

window.location = "index.php?ruta=cobroperiodo&EstatusCXC="+EstatusCXC+"&fechacobroperiodo="+fechacobroperiodo; 
 

     
 }else{

        
        swal({
            type: "error",
            title: "¡Seleccione una Fecha!",
            text: "¡Debe Selecionar una Fecha!",
            confirmButtonText: "¡Cerrar!"
                    
        });



 }

 

     
 }else{

        
        swal({
            type: "error",
            title: "¡Seleccione un Estado!",
            text: "¡Debe Selecionar un Estado!",
            confirmButtonText: "¡Cerrar!"
                    
        });



 }

 
   

 });
$(document).on("click", ".btnVerdetalleCobros", function(){
    
    $("#detallePagos").empty().append();


    var Rnc_Empresa_cxc  = $(this).attr("Rnc_Empresa_cxc");
    var CodigoVenta = $(this).attr("Codigo");
    var id_Cliente = $(this).attr("id_Cliente");
    var Rnc_Cliente = $(this).attr("Rnc_Cliente");
    var NCF_cxc = $(this).attr("NCF_cxc");
    
   
    var datos = new FormData();
    datos.append("Rnc_Empresa_cxc", Rnc_Empresa_cxc);
    datos.append("CodigoVenta", CodigoVenta);
    datos.append("id_Cliente", id_Cliente);
    datos.append("Rnc_Cliente", Rnc_Cliente);
    datos.append("NCF_cxc", NCF_cxc);

    

    $.ajax({
        url:"ajax/cxc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            console.log("respuesta", respuesta);

           

for(let item of respuesta){
        
    if(item.Rnc_Empresa_cxc == Rnc_Empresa_cxc && item.CodigoVenta == CodigoVenta && item.id_Cliente == id_Cliente && item.Rnc_Cliente == Rnc_Cliente && item.NCF_cxc == NCF_cxc){ 
    
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
          

        $("#detallePagos").append(
            '<tr>'+
                
                '<td>'+item.Rnc_Cliente+'</td>'+
                '<td>'+item.Nombre_Cliente+'</td>'+
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

})
$(document).on("click", ".btnVerdetalleReciboCobros", function(){
    
    
    $(".facturasVentas").empty().append();
    $(".totalesRecibos").empty().append();
    $(".Retenciones").empty().append();
    $(".Contabilidadrecibopago").empty().append();
    
   
        
    var id_reciboCXC = $(this).attr("id");
    var NAsiento = $(this).attr("NAsiento"); 
    var Rnc_Empresa_cxc= $(this).attr("Rnc_Empresa_cxc"); 
    var Rnc_Cliente= $(this).attr("Rnc_Cliente");
    
   
    var datos = new FormData(); 
    datos.append("id_reciboCXC", id_reciboCXC);
    
    $.ajax({
        url:"ajax/cxc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            

var Facturas = JSON.parse(respuesta["Facturas"]);
var FacturaCXC = respuesta["FacturaCXC"];
var ReciboCXC = respuesta["ReciboCXc"]; 
var monto = respuesta["Monto"]*1; 
var montoDiferencia =  respuesta["MontoDiferencia"]*1;

 $("#Nombre_Cliente").val(respuesta["Nombre_Cliente"]);
 $("#Rnc_Cliente").val(respuesta["Rnc_Cliente"]);
 $("#FechaAnoMes").val(respuesta["FechaAnoMes"]);
 $("#FechaDia").val(respuesta["FechaDia"]);
 $("#NAsiento ").val(respuesta["NAsiento"]);
 $("#Descripcion").val(respuesta["Descripcion"]);
 $("#Referencia").val(respuesta["Referencia"]);
 $("#FacturaCXC").val(respuesta["FacturaCXC"]);
 $("#ReciboCXC").val(respuesta["ReciboCXC"]);


 if (respuesta["Tipodiferencia"] == "0") {
    $("#Diferencia").val("NO APLICA");

 
 } else if(respuesta["Tipodiferencia"] == "1"){
$("#Diferencia").val("Diferencia Cambiaria");



 }else{

    $("#Diferencia").val("Diferencia por Cobro");

 }
    
var idBanco = respuesta["EntidadBancaria"];
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
           
          
        $("#Banco").val(respuesta["Nombre_Cuenta"]);
   
        
          } }) /*CIERRE AJAX BANCO*/
                
       
var RncEmpresaCliente = Rnc_Empresa_cxc;

var validarCliente = Rnc_Cliente;


var datos = new FormData();
    datos.append("RncEmpresaCliente", RncEmpresaCliente);
    datos.append("validarCliente", validarCliente);
   

$.ajax({
        url:"ajax/clientes.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 

            var tipo = respuesta["Tipo_Cliente"];
            
            if(tipo == 1){
                $("#Tipo_Cliente").val("Jurídico");

            }else{
                $("#Tipo_Cliente").val("Físico");
                
            }
          } }) /*CIERRE AJAX 606*/  


  /* //////////////////////////////////////////////////////// */

  $(".facturasVentas").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
    '<div class="col-xs-2">'+
        
                            
        '<label style="text-align: center">NCF</label>'+ 
     
  '</div>'+
  '<div class="col-xs-2">'+
      
                            
        '<label style="text-align: center">Monto Factura</label>'+  
                            
    
  '</div>'+
'<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">Tasa Fac.</label>'+  
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">Monto Por Pagar</label>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">Monto Pagado</label>'+  
                            
     '</div>'+
     '</div>'+
     '<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">Tasa</label>'+  
                            
     '</div>'+
     
  '</div>'+

 '<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">Diferencia</label>'+  
                            
     '</div>'+
     
  '</div>'+
'<div class="col-xs-1" style="padding-left:0px">'+
        
     
  '</div>'+
'</div>'        
);
  
    $(".Retenciones").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">NCF</label>'+  
                            
     '</div>'+
      '</div>'+
    '<div class="col-xs-2">'+
        
                            
        '<label style="text-align: center">Fecha</label>'+ 
     
  '</div>'+
  '<div class="col-xs-1">'+
      
                            
        '<label style="text-align: center">% ITBIS</label>'+  
                            
    
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">Monto Ret.ITBIS</label>'+  
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">% ISR</label>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">Monto Ret.ISR</label>'+  
                            
     '</div>'+
     '</div>'+
     
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<label style="text-align: center">Total Ret.</label>'+  
                            
     '</div>'+
     '</div>'+
     
  '</div>'+
'</div>'        
);
  
var ver = 0;


for(let item of Facturas){
    
var ver = ver+1;         

var id_CXC = item.id;
var montopesosrecibo = item.tasa*item.monto;  

var ingbanco = item.ingbanco*1;
var diferencia = item.diferencia*1;
var totalfac = 0;

var Rnc_Empresa_LD1 = Rnc_Empresa_cxc;
var Rnc_Factura1 = Rnc_Cliente;
var NCF1 = item.ncf_factura;
var NAsiento1 = NAsiento;
        
 
    
if(item.tasa == "1"){

var tasarecibo = 1;

}else{
    var calculomonto = item.ingbanco/item.monto;
    let t = calculomonto.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var tasarecibo = t.match(regex)[0];

    
}

    var datos = new FormData();
    datos.append("id_CXC", id_CXC);
   

$.ajax({
        url:"ajax/cxc.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 
            

            if(respuesta["Moneda"] == "DOP"){

                var tasa = 1;
            }else{

                var tasa = respuesta["Tasa"];
            }
        var total = respuesta["Total"]*1;
        var montopesos = respuesta["Total"]*tasa;

        var totalfac = totalfac + montopesos;

        if(respuesta["Estado"] == "Cobrado"){

            var color = '#378E11';
            var text = "Cobrado";



        }else{

             var color = '#CC3918';
             var text = "Por Cobrar";


        }
       
  
    
 

       $(".facturasVentas").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+

    '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+respuesta["NCF_cxc"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+total.toLocaleString("en-US")+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+tasa+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+

'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control"  value="'+montopesos.toLocaleString("en-US")+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+ingbanco.toLocaleString("en-US")+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control"  value="'+tasarecibo+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+diferencia.toLocaleString("en-US")+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-1" style="padding-left:0px">'+
       
       
         '<h5 style="text-align: center; color: '+color+'"><b>'+text+'</b></h5>'+ 
         
  '</div>'+
'</div>'  

);
    
  
   
   
    //var credito =  Number(credito) +  Number(item.credito);
     
var RncEmpresa607 = respuesta["Rnc_Empresa_cxc"];

var Rnc_Factura_607 = respuesta["Rnc_Cliente"];

var NCF_607 = respuesta["NCF_cxc"];

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
var fechasRet = respuesta["Fecha_Retencion_AnoMes_607"]+"-"+respuesta["Fecha_Retencion_Dia_607"];

var TotalRet =  Number(respuesta["ITBIS_Retenido_Tercero_607"]) + Number(respuesta["Retencion_Renta_por_Terceros_607"]);   
if (TotalRet > 0) {         
 $(".Retenciones").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
 '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+NCF_607+'"  required readonly>'+ 
                            
     '</div>'+
  '</div>'+

    '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+fechasRet+'"  required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+respuesta["Porc_ITBIS_Retenido_607"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+respuesta["ITBIS_Retenido_Tercero_607"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+

'<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control"  value="'+respuesta["Porc_ISR_Retenido_607"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+respuesta["Retencion_Renta_por_Terceros_607"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+


  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+TotalRet+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  
'</div>'  

);
} /*si retenciones*/
    

        } }); /*CIERRE 606 cxp*/ 
} }) /*CIERRE AJAX cxp*/






}/*cierre for*/
var datos = new FormData();

    datos.append("Rnc_Empresa_LD1", Rnc_Empresa_LD1);
    datos.append("Rnc_Factura1", Rnc_Factura1);  
    datos.append("NAsiento1", NAsiento1);


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
            console.log("respuesta", respuesta);
$(".Contabilidadrecibopago").append(
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

    $(".Contabilidadrecibopago").append(
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

$(".Contabilidadrecibopago").append(
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
 $(".totalesRecibos").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
    '<div class="col-xs-7">'+
        
    '<h4 style="text-align: center">Totales</h4>'+ 
     
  '</div>'+
  


  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
      '<input type="text" class="form-control" value="'+monto.toLocaleString("en-US")+'" required readonly>'+ 
                            
     '</div>'+
     '</div>'+
     '<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
       
                            
     '</div>'+
     
  '</div>'+

 '<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
         '<input type="text" class="form-control" value="'+montoDiferencia.toLocaleString("en-US")+'" required readonly>'+ 
         
                            
     '</div>'+
     
  '</div>'+

'</div>'        
);
  /* //////////////////////////////////////////////////////// */         

 }/*cierre respuesta*/

})



})
$(".ReporteCXC").on("click", ".btnImprimirRecibodeCobro", function(){
    var id_reciboCXC = $(this).attr("id");
    var NAsiento= $(this).attr("NAsiento"); 
    var Rnc_Empresa_cxc= $(this).attr("Rnc_Empresa_cxc"); 
    var Rnc_Cliente= $(this).attr("Rnc_Cliente");
    
   


  window.open("extensiones/tcpdf/pdf/RecibodeCobro.php?id_reciboCXC="+id_reciboCXC+"&NAsiento="+NAsiento+"&Rnc_Empresa_cxc="+Rnc_Empresa_cxc+"&Rnc_Cliente="+Rnc_Cliente, "_blank");



});

$(document).on("click", ".btnVerificarCXC", function(){
    
    var Rnc_Empresa_607 = $(this).attr("Rnc_Empresa_607");
    var Rnc_Factura_607 = $(this).attr("Rnc_Factura_607");
    var NCF_607 = $(this).attr("NCF_607");
    var id = $(this).attr("id");
    var Codigo =$(this).attr("Codigo");
    var verificarCXC = "SI";

   
    swal({
            title: '¿Esta usted Seguro de Verificar la Cuenta por cobrar?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, Verificar la Cuenta por cobrar",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=reportecxc&verificarCXC="+verificarCXC+"&id="+id+"&Rnc_Empresa_607="+Rnc_Empresa_607+"&Rnc_Factura_607="+Rnc_Factura_607+"&NCF_607="+NCF_607+"&Codigo="+Codigo;
                    }
        });


   
    

});

