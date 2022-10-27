
/**********************************
     DATATABLE DATATABLE DATATABLE
************************************/

$('.tablaReporteCXP').DataTable({

    lengthMenu : [100, 100, 150, 200, 250, 300, -1],
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
 
            // Total over all pages
            total = api
                .column( 7 )//
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 7, { page: 'current'} )//
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 7 ).footer() ).html(pageTotal.toLocaleString("en-US"));
            
            // otra columna
             // Total over all pages
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
            // otra columna
             // Total over all pages
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
 })

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#mincxp').val(), 10 );
        var max = parseInt( $('#maxcxp').val(), 10 );
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
        var min = parseInt( $('#mindiacxp').val(), 10 );
        var max = parseInt( $('#maxdiacxp').val(), 10 );
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
    var table = $('.tablaReporteCXP').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#mincxp, #maxcxp').keyup( function() {
        table.draw();
    } );
    $('#mindiacxp, #maxdiacxp').keyup( function() {
        table.draw();
    } );
   


 } );

$('.ReporteCXP').DataTable({

    
     lengthMenu : [[25, 100, 200,250, 300, -1],[25, 100, 200,250, 300, "Todo"]],


        "scrollX": true,
        "scrollY": true,
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
    var table = $('.ReporteCXP').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );


    } );
$(".tablaReporteCXP").on("click", ".btnRegistrarCXP", function(){

   
    var id_CXP = $(this).attr("id_CXP");
    var idsuplidor = $(this).attr("idsuplidor");
    var Moneda = $(this).attr("Moneda");
    window.location = "index.php?ruta=recibodepago&id_CXP="+id_CXP+"&idsuplidor="+idsuplidor+"&Moneda="+Moneda; 

})

$(document).on("change", "#agregarSuplidorCXP", function(){

    var idsuplidor = $(this).val();
    var Moneda = "DOP";
   

   
    window.location = "index.php?ruta=recibodepago&idsuplidor="+idsuplidor+"&Moneda="+Moneda; 

})


$(document).on("click", ".agregarFacturaCXP", function (){
    



    var id_CXP = $(this).attr("id_CXP");
    var id_606 = $(this).attr("id_606");
    var codigo = $(this).attr("codigo");
    var rnc_Factura = $(this).attr("rnc_Factura");
    var id_suplidor = $(this).attr("id_suplidor");
    var nombre_suplidor = $(this).attr("nombre_suplidor");
    var ncf_factura = $(this).attr("ncf_factura");
    var monto = $(this).attr("monto");
    var retencion = $(this).attr("retencion");

   var ReciboPagoMoneda = $("#ReciboPagoMoneda").val();
   var MonedaParaPago = $('input[name=MonedaParaPago]:checked').val()

   var tasahistorica = $(this).attr("tasa");
   


   if(!document.querySelector('input[name="MonedaParaPago"]:checked')) {


        swal({

            title: "Error, Debe Seleccionar la Moneda Con que se Efectua el cobro",
            type: "error",
            confirmButtonText: "¡Cerrar!"

        });

    
   


   }else{
        $(this).removeClass("btn-primary agregarFacturaCXP");
        $(this).addClass("btn-default");

     if(ReciboPagoMoneda == MonedaParaPago){
         tasa = 1;
         var cxppesos =  monto * tasa;
      }else{ 

        if(ReciboPagoMoneda == "DOP" && MonedaParaPago == "USD"){
         tasa = 1;
         var cxppesos =  monto * tasa;
        }

      if(ReciboPagoMoneda == "USD" && MonedaParaPago == "DOP"){
         var tasa = $(this).attr("tasa");
        var cxppesos =  monto * tasa;
       
        }



    }


    $(".nuevafacturaCXP").append(
'<div class="row" style="padding:1px 20px">'+
    '<div class="col-xs-3" style="padding-right:0px">'+
        '<div class="input-group">'+
            '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarFactura" id_CXP="'+id_CXP+'"><i class="fa fa-times"></i></button>'+
                          '</span>'+
'<input type="hidden" class="form-control id_CXP" id_CXP="'+id_CXP+'" name="id_CXP" value="'+id_CXP+'" required readonly>'+ 
'<input type="hidden" class="form-control id_606" id_606="'+id_606+'" name="id_606" value="'+id_606+'" required readonly>'+ 
'<input type="hidden" class="form-control codigo" name="codigo" value="'+codigo+'" required readonly>'+ 
    '<input type="hidden" class="form-control id_suplidor" name="id_suplidor" value="'+id_suplidor+'" required readonly>'+ 
    '<input type="hidden" class="form-control nombre_suplidor" name="nombre_suplidor" value="'+nombre_suplidor+'" required readonly>'+ 
        
    '<input type="hidden" class="form-control retencion" name="retencion" value="'+retencion+'" required readonly>'+ 
            
        '<input type="hidden" class="form-control rnc_Factura" name="rnc_Factura" value="'+rnc_Factura+'" required readonly>'+ 
     '<input title="NCF Factura" type="text" class="form-control ncf_factura" name="ncf_factura" value="'+ncf_factura+'" required readonly>'+ 
                                         
        '</div>'+
    '</div>'+
    

'<div class="col-xs-2" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
        '<input title="Monto de Cuenta por Pagar" type="text" class="form-control monto" name="monto" value="'+monto+'" required>'+ 
       
                  
        '</div>'+
'</div>'+
'<div class="col-xs-1 tasaCXP" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="Tasa Cambiaria" type="text" class="form-control tasa" name="tasa" value="'+tasa+'" required readonly>'+ 
        '<input type="hidden" class="form-control tasahistorica" name="tasahistorica" value="'+tasahistorica+'" required readonly>'+ 
                   
        '</div>'+
'</div>'+
'<div class="col-xs-2" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="CXP en Pesos" type="text" class="form-control cxppesos" name="cxppesos" value="'+cxppesos+'" required readonly>'+ 
                  
        '</div>'+
     '</div>'+
       
        '<div class="col-xs-2" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="Ingreso en Banco" type="text" class="form-control ingbanco" name="ingbanco" value="'+cxppesos+'" required>'+ 
                  
        '</div>'+
     '</div>'+
     '<div class="col-xs-2" style="padding-left:0px; padding-right:0px">'+
        '<div input-group">'+
       
        '<input title="Diferencia entre la CXP y el Ingreso al Banco" type="text" class="form-control diferencia" name="diferencia" value="0" required>'+ 
                  
        '</div>'+
     '</div>'+
'</div>'
    );
 
    listarFacturasCXP();
    sumarmontoCXP();
    sumarDiferenciaCXP();
       
  } 
      
});
/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarCuenta = [];

localStorage.removeItem("quitarFactura");

                
                    
$(".formularioPagoCXP").on("click", "button.quitarFactura", function (){

  $(this).parent().parent().parent().parent().remove();

  var id_CXP = $(this).attr("id_CXP");

  /******************************************
  ALMACENAR EL ID DEL PORDUCTO A QUITAR
  *******************************************/

  if(localStorage.getItem("quitarFactura") == null){

    idQuitarCuenta = [];


  } else {

      idQuitarCuenta.concat(localStorage.getItem("quitarFactura"))

  }

    idQuitarCuenta.push({"id_CXP":id_CXP});
    localStorage.setItem("quitarFactura", JSON.stringify(idQuitarCuenta));

    $("button.recuperarFacturaCXP[id_CXP='"+id_CXP+"']").removeClass('btn-default');

    $("button.recuperarFacturaCXP[id_CXP='"+id_CXP+"']").addClass('btn-primary agregarFacturaCXP');
    

    localStorage.setItem("quitarFactura", JSON.stringify(idQuitarCuenta));
     if($(".nuevafacturaCXP").children().length == 0){
        $("#TotalPagovi").val(0);
        $("#TotalPagovi").number(true, 2);
        $("#TotalPago").val(0);


  }

//SUMAR PRODUCTOS
                listarFacturasCXP();
                sumarmonto();

});

function listarFacturasCXP(){

  var listaFacturas = [];

  var id_CXP = $(".id_CXP");
  var id_606 = $(".id_606");
  var codigo = $(".codigo");
  var id_suplidor = $(".id_suplidor");
  var rnc_Factura = $(".rnc_Factura");
  var nombre_suplidor = $(".nombre_suplidor");
  var ncf_factura = $(".ncf_factura");
  var monto = $(".monto");
  var tasa =  $(".tasa");
  var tasahistorica = $(".tasahistorica");
  var cxppesos = $(".cxppesos");
  var ingbanco = $(".ingbanco");
  var diferencia = $(".diferencia");
  var retencion = $(".retencion");
  
 
  var monto = $(".monto");

  for(var i = 0; i < id_CXP.length; i++){

    listaFacturas.push({ "id" : $(id_CXP[i]).attr("id_CXP"),
                        "id_606" : $(id_606[i]).val(),
                        "codigo" : $(codigo[i]).val(),
                        "id_suplidor" : $(id_suplidor[i]).val(),
                        "rnc_Factura" : $(rnc_Factura[i]).val(),
                        "nombre_suplidor" : $(nombre_suplidor[i]).val(),
                        "ncf_factura" : $(ncf_factura[i]).val(),
                        "monto" : $(monto[i]).val(),
                        "tasa" : $(tasa[i]).val(),
                        "tasahistorica" : $(tasahistorica[i]).val(),
                        "cxppesos" : $(cxppesos[i]).val(),
                        "ingbanco" : $(ingbanco[i]).val(),
                        "diferencia" : $(diferencia[i]).val(),
                        "retencion" : $(retencion[i]).val()})


  }

  $("#listaFacturasCXP").val(JSON.stringify(listaFacturas)); 

}
/***********************************
SUMAR Montos
************************************/
function sumarmontoCXP(){

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

 

 
  // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

 
  $("#TotalPagovi").val(sumarTotalMontos);
  $("#TotalPagovi").number(true, 2);
      

  $("#TotalPago").val(sumarTotalMontos);
  // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

 

   listarFacturasCXP();


}
function sumarDiferenciaCXP(){

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

 

   listarFacturasCXP();
  

 
  
 }

$(".formularioPagoCXP").on("keyup", ".monto", function(){
    this.value = this.value.replace(/[^0-9.]/g,'');
  
  var monto = $(this).val();
  var tasa = $(this).parent().parent().parent().children(".tasaCXP").children().children(".tasa");
  var cxppesos = $(this).parent().parent().parent().children().children().children(".cxppesos");
  var ingbanco = $(this).parent().parent().parent().children().children().children(".ingbanco");
  var diferencia = $(this).parent().parent().parent().children().children().children(".diferencia");
   

    var calculomonto = $(this).val() * tasa.val();
    

    cxppesos.val(calculomonto);
    ingbanco.val(calculomonto);
    diferencia.val("0");

   
   
   // SUMAR PRODUCTOS
sumarmontoCXP();
   
// AGRUPAR productos JSON
 listarFacturasCXP();
 sumarDiferenciaCXP();
      

});
$(".formularioPagoCXP").on("keyup", ".ingbanco", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  
    var ingbanco = $(this).val();
    var cxppesos = $(this).parent().parent().parent().children().children().children(".cxppesos");
     var diferencia = $(this).parent().parent().parent().children().children().children(".diferencia");
   

    var calculodiferencia = cxppesos.val() - $(this).val();

   

        let t = calculodiferencia.toFixed(5);
        let regex=/[+-]?[0-9]{1,9}(\.\d{0,2})/;
        var Montodiferencia = t.match(regex)[0];

        
    
    diferencia.val(Montodiferencia);
   
   
   
   // SUMAR PRODUCTOS
sumarmontoCXP();
   
// AGRUPAR productos JSON
 listarFacturasCXP();
 sumarDiferenciaCXP();
            

})
$(document).on("click", ".btnRetenerCXP", function(){

     var URLactual = window.location.href;

    var Estado  = $(this).attr("Estado");

    if(Estado == "PorPagar"){ 

    var Moneda = $(this).attr("Moneda"); 
    var Tasa = $(this).attr("Tasa");

    var Rnc_Empresa_606 = $(this).attr("Rnc_Empresa_606");
    var Rnc_Factura_606 = $(this).attr("Rnc_Factura_606");
    var NCF_606 = $(this).attr("NCF_606");
   
    var datos = new FormData();
    datos.append("Rnc_Empresa_606", Rnc_Empresa_606);
    datos.append("Rnc_Factura_606", Rnc_Factura_606);
    datos.append("NCF_606", NCF_606);


    $.ajax({
        url:"ajax/cxp.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            $("#Moneda").val(Moneda);
            $("#Tasa").val(Tasa);
            $("#Rnc_Retener_606").val(respuesta["Rnc_Factura_606"]);
            $("#id_606_Retener").val(respuesta["id"]);
            $("#CodigoCompra").val(respuesta["CodigoCompra"]);
            $("#Forma_Pago_606").val(respuesta["Extraer_Tipo_Pago_606"]);
            $("#NCF_606_Retener").val(respuesta["NCF_606"]);
            $("#FechaFacturames_606_Retener").val(respuesta["Fecha_AnoMes_606"]);
      $("#FechaFacturadia_606_Retener").val(respuesta["Fecha_Dia_606"]);
      $("#FechaRetenecionmes_606").val(respuesta["Fecha_Ret_AnoMes_606"]);
      $("#FechaReteneciondia_606").val(respuesta["Fecha_Ret_Dia_606"]);     
      $("#MontoFacturadoRetener").val(respuesta["Total_Monto_Factura_606"]);
      $("#MontoITBIS_Retener").val(respuesta["ITBIS_Factura_606"]);
      $("#Monto_ITBIS_Retenido").val(respuesta["ITBIS_Retenido_606"]);
      $("#Monto_ISR_Retenido").val(respuesta["Monto_Retencion_Renta_606"]);

       if(Moneda == "USD"){
                var MontoFacturado = respuesta["Total_Monto_Factura_606"]/Tasa;
                var MontoITBIS = respuesta["ITBIS_Factura_606"]/Tasa;

            $("#MontoFacturadoRetener").val(MontoFacturado);
            $("#MontoITBIS_Retener").val(MontoITBIS);

            }else{
            $("#MontoFacturadoRetener").val(respuesta["Total_Monto_Factura_606"]);
            $("#MontoITBIS_Retener").val(respuesta["ITBIS_Factura_606"]);


            }
      
      if(respuesta["Porc_ITBIS_Retenido_606"] == "30"){

       $("#ITBIS30").attr('checked', true);
       $("#ITBIS75").attr('checked', false);
       $("#ITBIS100").attr('checked', false);

      }else if(respuesta["Porc_ITBIS_Retenido_606"] == "75"){

       $("#ITBIS30").attr('checked', false);
       $("#ITBIS75").attr('checked', true);
       $("#ITBIS100").attr('checked', false);

      }else if(respuesta["Porc_ITBIS_Retenido_606"] == "100"){

       $("#ITBIS30").attr('checked', false);
       $("#ITBIS75").attr('checked', false);
       $("#ITBIS100").attr('checked', true);

      }else if(respuesta["Porc_ITBIS_Retenido_606"] == "0"){

       $("#ITBIS30").attr('checked', false);
       $("#ITBIS75").attr('checked', false);
       $("#ITBIS100").attr('checked', false);

      }

      if(respuesta["Porc_ISR_Retenido_606"] == "2"){

       $("#ISR2").attr('checked', true);
       $("#ISR10").attr('checked', false);
       
      }else if(respuesta["Porc_ISR_Retenido_606"] == "10"){

       $("#ISR2").attr('checked', false);
       $("#ISR10").attr('checked', true);
      
      }else if(respuesta["Porc_ISR_Retenido_606"] == "0"){

       $("#ISR2").attr('checked', false);
       $("#ISR10").attr('checked', false);
       
      }

      if(respuesta["Extrar_Tipo_Retencion_606"] == "0"){
        $("#tipo_de_seleccionretener").val('0');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "01"){
        $("#tipo_de_seleccionretener").val('01');

        }
        else if(respuesta["Extrar_Tipo_Retencion_606"] == "02"){
        $("#tipo_de_seleccionretener").val('02');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "03"){
        $("#tipo_de_seleccionretener").val('03');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "04"){
        $("#tipo_de_seleccionretener").val('04');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "05"){
        $("#tipo_de_seleccionretener").val('05');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "06"){
        $("#tipo_de_seleccionretener").val('06');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "07"){
        $("#tipo_de_seleccionretener").val('07');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "08"){
        $("#tipo_de_seleccionretener").val('08');

        }





        }
            
    });

 }/*cierr if*/
 else{
    
    swal({
            title: "¡Usted no puede aplicarle Retención a esta factura!",
            text: "¡ esta en estatus Pagada!",
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

$(document).on("click", ".btnRetenerCXPrecibopago", function(){
    var Moneda = $(this).attr("Moneda"); 
    var Tasa = $(this).attr("Tasa");

    var Rnc_Empresa_606 = $(this).attr("Rnc_Empresa_606");
    var Rnc_Factura_606 = $(this).attr("Rnc_Factura_606");
    var NCF_606 = $(this).attr("NCF_606");
   
    var datos = new FormData();
    datos.append("Rnc_Empresa_606", Rnc_Empresa_606);
    datos.append("Rnc_Factura_606", Rnc_Factura_606);
    datos.append("NCF_606", NCF_606);


    $.ajax({
        url:"ajax/cxp.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            $("#Monedarecibopago").val(Moneda);
            $("#Tasa").val(Tasa);
            $("#Rnc_Retener_606").val(respuesta["Rnc_Factura_606"]);
            $("#id_606_Retener").val(respuesta["id"]);
            $("#CodigoCompra").val(respuesta["CodigoCompra"]);
            $("#Forma_Pago_606").val(respuesta["Extraer_Tipo_Pago_606"]);
            $("#NCF_606_Retener").val(respuesta["NCF_606"]);
            $("#FechaFacturames_606_Retener").val(respuesta["Fecha_AnoMes_606"]);
      $("#FechaFacturadia_606_Retener").val(respuesta["Fecha_Dia_606"]);
      $("#FechaRetenecionmes_606").val(respuesta["Fecha_Ret_AnoMes_606"]);
      $("#FechaReteneciondia_606").val(respuesta["Fecha_Ret_Dia_606"]);     
      $("#MontoFacturadoRetener").val(respuesta["Total_Monto_Factura_606"]);
      $("#MontoITBIS_Retener").val(respuesta["ITBIS_Factura_606"]);
      $("#Monto_ITBIS_Retenido").val(respuesta["ITBIS_Retenido_606"]);
      $("#Monto_ISR_Retenido").val(respuesta["Monto_Retencion_Renta_606"]);

       if(Moneda == "USD"){
                var MontoFacturado = respuesta["Total_Monto_Factura_606"]/Tasa;
                var MontoITBIS = respuesta["ITBIS_Factura_606"]/Tasa;

            $("#MontoFacturadoRetener").val(MontoFacturado);
            $("#MontoITBIS_Retener").val(MontoITBIS);

            }else{
            $("#MontoFacturadoRetener").val(respuesta["Total_Monto_Factura_606"]);
            $("#MontoITBIS_Retener").val(respuesta["ITBIS_Factura_606"]);


            }
      
      if(respuesta["Porc_ITBIS_Retenido_606"] == "30"){

       $("#ITBIS30").attr('checked', true);
       $("#ITBIS75").attr('checked', false);
       $("#ITBIS100").attr('checked', false);

      }else if(respuesta["Porc_ITBIS_Retenido_606"] == "75"){

       $("#ITBIS30").attr('checked', false);
       $("#ITBIS75").attr('checked', true);
       $("#ITBIS100").attr('checked', false);

      }else if(respuesta["Porc_ITBIS_Retenido_606"] == "100"){

       $("#ITBIS30").attr('checked', false);
       $("#ITBIS75").attr('checked', false);
       $("#ITBIS100").attr('checked', true);

      }else if(respuesta["Porc_ITBIS_Retenido_606"] == "0"){

       $("#ITBIS30").attr('checked', false);
       $("#ITBIS75").attr('checked', false);
       $("#ITBIS100").attr('checked', false);

      }

      if(respuesta["Porc_ISR_Retenido_606"] == "2"){

       $("#ISR2").attr('checked', true);
       $("#ISR10").attr('checked', false);
       
      }else if(respuesta["Porc_ISR_Retenido_606"] == "10"){

       $("#ISR2").attr('checked', false);
       $("#ISR10").attr('checked', true);
      
      }else if(respuesta["Porc_ISR_Retenido_606"] == "0"){

       $("#ISR2").attr('checked', false);
       $("#ISR10").attr('checked', false);
       
      }

      if(respuesta["Extrar_Tipo_Retencion_606"] == "0"){
        $("#tipo_de_seleccionretener").val('0');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "01"){
        $("#tipo_de_seleccionretener").val('01');

        }
        else if(respuesta["Extrar_Tipo_Retencion_606"] == "02"){
        $("#tipo_de_seleccionretener").val('02');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "03"){
        $("#tipo_de_seleccionretener").val('03');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "04"){
        $("#tipo_de_seleccionretener").val('04');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "05"){
        $("#tipo_de_seleccionretener").val('05');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "06"){
        $("#tipo_de_seleccionretener").val('06');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "07"){
        $("#tipo_de_seleccionretener").val('07');

        }else if(respuesta["Extrar_Tipo_Retencion_606"] == "08"){
        $("#tipo_de_seleccionretener").val('08');

        }





        }
            
    });


});

$(document).on("click", ".btnVerdetallePagos", function(){
    
    $("#detallePagos").empty().append();


    var Rnc_Empresa_cxp  = $(this).attr("Rnc_Empresa_cxp");
    var CodigoCompra = $(this).attr("CodigoCompra");
    var id_Suplidor = $(this).attr("id_Suplidor");
    var Rnc_Suplidor = $(this).attr("Rnc_Suplidor");
    var NCF_cxp = $(this).attr("NCF_cxp");
    var Tipo = $(this).attr("Tipo");
   
    var datos = new FormData();
    datos.append("Rnc_Empresa_cxp", Rnc_Empresa_cxp);
    datos.append("CodigoCompra", CodigoCompra );
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
          

        $("#detallePagos").append(
            '<tr>'+
                
                '<td>'+item.Rnc_Suplidor+'</td>'+
                '<td>'+item.Nombre_Suplidor+'</td>'+
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
$(document).on("click", ".btnVerdetalleReciboPagos", function(){
    
    
    $(".facturasCompras").empty().append();
    $(".totalesRecibos").empty().append();
    $(".Retenciones").empty().append();
    $(".Contabilidadrecibopago").empty().append();
    
   
        
    var id_reciboCXP = $(this).attr("id");
    var NAsiento= $(this).attr("NAsiento"); 
    var Rnc_Empresa_cxp= $(this).attr("Rnc_Empresa_cxp"); 
    var Rnc_Suplidor= $(this).attr("Rnc_Suplidor");
    
   
    var datos = new FormData(); 
    datos.append("id_reciboCXP", id_reciboCXP);
    
    $.ajax({
        url:"ajax/cxp.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

var Facturas = JSON.parse(respuesta["Facturas"]);
var FacturaCXP = respuesta["FacturaCXP"];
var ReciboCXP = respuesta["ReciboCXP"]; 
var monto = respuesta["Monto"]*1; 
var montoDiferencia =  respuesta["MontoDiferencia"]*1;

 $("#Nombre_Suplidor").val(respuesta["Nombre_Suplidor"]);
 $("#Rnc_Suplidor").val(respuesta["Rnc_Suplidor"]);
 $("#FechaAnoMes").val(respuesta["FechaAnoMes"]);
 $("#FechaDia").val(respuesta["FechaDia"]);
 $("#NAsiento ").val(respuesta["NAsiento"]);
 $("#Descripcion").val(respuesta["Descripcion"]);
 $("#Referencia").val(respuesta["Referencia"]);
 $("#FacturaCXP").val(respuesta["FacturaCXP"]);
 $("#ReciboCXP").val(respuesta["ReciboCXP"]);


 if (respuesta["Tipodiferencia"] == "0") {
    $("#Diferencia").val("NO APLICA");

 
 } else if(respuesta["Tipodiferencia"] == "1"){
$("#Diferencia").val("Diferencia Cambiaria");



 }else{

    $("#Diferencia").val("Diferencia por Pago");

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
                
       
var RncEmpresasuplidorvalidar = Rnc_Empresa_cxp;

var RncSuplidor = Rnc_Suplidor;


var datos = new FormData();
    datos.append("RncEmpresasuplidorvalidar", RncEmpresasuplidorvalidar);
    datos.append("RncSuplidor", RncSuplidor);
   

$.ajax({
        url:"ajax/suplidores.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){ 

            var tipo = respuesta["Tipo_Suplidor"];
            
            if(tipo == 1){
                $("#Tipo_Suplidor").val("Jurídico");

            }else{
                $("#Tipo_Suplidor").val("Físico");
                
            }
          } }) /*CIERRE AJAX 606*/  


  /* //////////////////////////////////////////////////////// */

  $(".facturasCompras").append(
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

var id_CXP = item.id;
var montopesosrecibo = item.tasa*item.monto;  

var ingbanco = item.ingbanco*1;
var diferencia = item.diferencia*1;
var totalfac = 0;

var Rnc_Empresa_LD1 = Rnc_Empresa_cxp;
var Rnc_Factura1 = Rnc_Suplidor;
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
    datos.append("id_CXP", id_CXP);
   

$.ajax({
        url:"ajax/cxp.ajax.php",
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

        if(respuesta["Estado"] == "Pagado"){

            var color = '#378E11';
            var text = "Pagado";



        }else{

             var color = '#CC3918';
             var text = "Por pagar";


        }
       
  
    
 

       $(".facturasCompras").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+

    '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+respuesta["NCF_cxp"]+'" required readonly>'+ 
                            
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
     
var RncEmpresa606 = respuesta["Rnc_Empresa_cxp"];

var Rnc_Factura_606 = respuesta["Rnc_Suplidor"];

var NCF_606 = respuesta["NCF_cxp"];

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
var fechasRet = respuesta["Fecha_Ret_AnoMes_606"]+"-"+respuesta["Fecha_Ret_Dia_606"];

var TotalRet =  Number(respuesta["ITBIS_Retenido_606"]) + Number(respuesta["Monto_Retencion_Renta_606"]);   
if (TotalRet > 0) {         
 $(".Retenciones").append(
'<div class="row col-xs-12" style="padding:5px 15px">'+
 '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+NCF_606+'"  required readonly>'+ 
                            
     '</div>'+
  '</div>'+

    '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+fechasRet+'"  required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+respuesta["Porc_ITBIS_Retenido_606"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
'<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+respuesta["ITBIS_Retenido_606"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+

'<div class="col-xs-1" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control"  value="'+respuesta["Porc_ISR_Retenido_606"]+'" required readonly>'+ 
                            
     '</div>'+
  '</div>'+
  '<div class="col-xs-2" style="padding-left:0px">'+
        '<div input-group">'+
                            
        '<input type="text" class="form-control" value="'+respuesta["Monto_Retencion_Renta_606"]+'" required readonly>'+ 
                            
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
$(document).on("click", ".btnEditarRecibodePago", function(){

    
    var id = $(this).attr("id");
    var nasiento = $(this).attr("NAsiento");
    var Rnc_Empresa_cxp= $(this).attr("Rnc_Empresa_cxp"); 
    var Rnc_Suplidor= $(this).attr("Rnc_Suplidor"); 
    
    
    var Moneda =  $(this).attr("Moneda");
 

window.location = "index.php?ruta=Editar-recibodepago&id="+id+"&nasiento="+nasiento+"&Rnc_Empresa_cxp="+Rnc_Empresa_cxp+"&Rnc_Suplidor="+Rnc_Suplidor+"&Moneda="+Moneda; 

 
   

 })

$(".formularioPagoCXP").mousemove(function(){
 // SUMAR PRODUCTOS
sumarmontoCXP();
   
// AGRUPAR productos JSON
 listarFacturasCXP();
      

});

$(document).on("click", ".btnEstatusCXP" ,function(){
    
    var URLactual = window.location.href;
    var aprobaridCXP = $(this).attr("id_cxp");
    var Estatus = $(this).attr("Estatus");
    

    var datos = new FormData();

    datos.append("aprobaridCXP", aprobaridCXP);
    datos.append("Estatus",  Estatus);

   
    $.ajax({
        url:"ajax/cxp.ajax.php",
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
                        window.location=URLactual;}
                });
            
        }
    });

  
})
$(document).on("click", ".btnEliminarRecibodePago", function(){
  
  var id = $(this).attr("id");
  var NAsiento = $(this).attr("NAsiento");
  var Rnc_Empresa_cxp = $(this).attr("Rnc_Empresa_cxp");
  var Rnc_Suplidor = $(this).attr("Rnc_Suplidor");
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
      window.location = "index.php?ruta=detallerecibodepago&id="+id+"&NAsiento="+NAsiento+"&Rnc_Empresa_cxp="+Rnc_Empresa_cxp+"&Rnc_Suplidor="+Rnc_Suplidor+"&accion="+accion;
          }
    });
});
$(document).on("click", "#ReportePDFCXP", function(){ 

    var RncEmpresaPDFCXP = $("#RncEmpresaPDFCXP").val();
    var PeriodoCXP = $("#PeriodoCXP").val();
    var EstadoCXP = $("#EstadoCXP").val();
     console.log("PeriodoCXP", PeriodoCXP);
     console.log("EstadoCXP", EstadoCXP);

     if(PeriodoCXP == "Todo"){
        if(EstadoCXP == "PorPagar"){
             window.open("extensiones/tcpdf/pdf/ReportePDFCXPTodoPorpagar.php?RncEmpresaPDFCXP="+RncEmpresaPDFCXP+"&PeriodoCXP="+PeriodoCXP+"&EstadoCXP="+EstadoCXP, "_blank");



        }/*Pagado*/else{
             window.open("extensiones/tcpdf/pdf/ReportePDFCXPTodoPagado.php?RncEmpresaPDFCXP="+RncEmpresaPDFCXP+"&PeriodoCXP="+PeriodoCXP+"&EstadoCXP="+EstadoCXP, "_blank");



        
        }


     }/*periodo*/else{
        if(EstadoCXP == "PorPagar"){
             window.open("extensiones/tcpdf/pdf/ReportePDFCXPPeridoPorpagar.php?RncEmpresaPDFCXP="+RncEmpresaPDFCXP+"&PeriodoCXP="+PeriodoCXP+"&EstadoCXP="+EstadoCXP, "_blank");


        }/*Pagado Periodo*/else{
             window.open("extensiones/tcpdf/pdf/ReportePDFCXPPeridoPagado.php?RncEmpresaPDFCXP="+RncEmpresaPDFCXP+"&PeriodoCXP="+PeriodoCXP+"&EstadoCXP="+EstadoCXP, "_blank");

        
        }



     }

   

 });
$(document).on("click", "#ReportePDFCXPSUPLIDOR", function(){ 

    var RncEmpresaPDFCXP = $("#RncEmpresaPDFCXPSuplidor").val();
    var PeriodoCXP = $("#PeriodoCXPSuplidor").val();
    var EstadoCXP = $("#EstadoCXPSuplidor").val();
    var Suplidor = $("#agregarSuplidor").val();

    if(Suplidor != ""){ 

     if(PeriodoCXP == "Todo"){
        if(EstadoCXP == "PorPagar"){
             window.open("extensiones/tcpdf/pdf/ReportePDFCXPSuplidorTodoPorpagar.php?RncEmpresaPDFCXP="+RncEmpresaPDFCXP+"&PeriodoCXP="+PeriodoCXP+"&EstadoCXP="+EstadoCXP+"&Suplidor="+Suplidor, "_blank");



        }/*Pagado*/else{
             window.open("extensiones/tcpdf/pdf/ReportePDFCXPSuplidorTodoPagado.php?RncEmpresaPDFCXP="+RncEmpresaPDFCXP+"&PeriodoCXP="+PeriodoCXP+"&EstadoCXP="+EstadoCXP+"&Suplidor="+Suplidor, "_blank");



        
        }


     }/*periodo*/else{
        if(EstadoCXP == "PorPagar"){
             window.open("extensiones/tcpdf/pdf/ReportePDFCXPSuplidorPeridoPorpagar.php?RncEmpresaPDFCXP="+RncEmpresaPDFCXP+"&PeriodoCXP="+PeriodoCXP+"&EstadoCXP="+EstadoCXP+"&Suplidor="+Suplidor, "_blank");


        }/*Pagado Periodo*/else{
             window.open("extensiones/tcpdf/pdf/ReportePDFCXPSuplidorPeridoPagado.php?RncEmpresaPDFCXP="+RncEmpresaPDFCXP+"&PeriodoCXP="+PeriodoCXP+"&EstadoCXP="+EstadoCXP+"&Suplidor="+Suplidor, "_blank");

        
        }

     }
} else{

   
        
        swal({
            type: "error",
            title: "¡Seleccione un Suplidor!",
            text: "¡Debe Selecionar un suplidor!",
            confirmButtonText: "¡Cerrar!"
                    
        });
}
   

 });
$(document).on("click", "#FiltrarCXP", function(){

    var EstadoCXP = $("#EstadoCXPSelect").val();
   
if(EstadoCXP == ""){
  window.location = "index.php?ruta=reportecxp";
  
}else{
window.location = "index.php?ruta=reportecxp&EstadoCXP="+EstadoCXP; 

}


 })




$(".ReporteCXP").on("click", ".btnImprimirRecibodepago", function(){
    var id_reciboCXP = $(this).attr("id");
    var NAsiento= $(this).attr("NAsiento"); 
    var Rnc_Empresa_cxp= $(this).attr("Rnc_Empresa_cxp"); 
    var Rnc_Suplidor= $(this).attr("Rnc_Suplidor");
    
   


  window.open("extensiones/tcpdf/pdf/RecibodePago.php?id_reciboCXP="+id_reciboCXP+"&NAsiento="+NAsiento+"&Rnc_Empresa_cxp="+Rnc_Empresa_cxp+"&Rnc_Suplidor="+Rnc_Suplidor, "_blank");



});

$(document).on("click", "#pagoperiodo", function(){ 

    var EstatusCXP = $("#EstatusCXP").val();
    var fechapagoperiodo = $("#fechapagoperiodo").val();
   console.log(fechapagoperiodo, "fechapagoperiodo");
if(EstatusCXP != ""){ 
    if(fechapagoperiodo != ""){

window.location = "index.php?ruta=pagoperiodo&EstatusCXP="+EstatusCXP+"&fechapagoperiodo="+fechapagoperiodo; 
      
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

$(document).on("click", ".btnVerificarCXP", function(){

    
    var Rnc_Empresa_606 = $(this).attr("Rnc_Empresa_cxp");
    var Rnc_Factura_606 = $(this).attr("Rnc_Suplidor");
    var NCF_606 = $(this).attr("NCF_cxp");
    var id = $(this).attr("id");
    var CodigoCompra =$(this).attr("CodigoCompra");
    var verificarCXP = "SI";

   


    swal({
            title: '¿Esta usted Seguro de Verificar la Cuenta por Pagar?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, Verificar la Cuenta por Pagar",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=reportecxp&verificarCXP="+verificarCXP+"&id="+id+"&Rnc_Empresa_606="+Rnc_Empresa_606+"&Rnc_Factura_606="+Rnc_Factura_606+"&NCF_606="+NCF_606+"&CodigoCompra="+CodigoCompra;
                    }
        });
   

});
