
$('.TablaVentaContado').DataTable({

  
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
                .column( 11 )
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
            
            // otra columna
             // Total over all pages
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
            // otra columna
             // Total over all pages
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
            // otra columna
             // Total over all pages
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
            // otra columna
             // Total over all pages
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
    var table = $('.TablaVentaContado').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#mincxc, #maxcxc').keyup( function() {
        table.draw();
    } );
    $('#mindiacxc, #maxdiacxc').keyup( function() {
        table.draw();
    } );
   


 } );
$(".cargamasivaventas").ready(function(){
 
listardeposito();


}) ;

$(document).on("change", "#tipoventa", function(){


  var tipoventa = $(this).val();

  
  if(tipoventa == "VentaCredito"){
   window.location = "index.php?ruta=reportecxc";

    }else{
        window.location = "index.php?ruta=reportevc";

    }
  
})


$(document).on("click", "#FiltrarVentaContado", function(){

    var EstadoVentaContado = $("#EstadoVentaContado").val();
   
if(EstadoVentaContado == ""){
  window.location = "index.php?ruta=reportevc";
  
}else{
window.location = "index.php?ruta=reportevc&EstadoVentaContado="+EstadoVentaContado; 

}


 
   

 })
$(document).on("click", ".ventacontado", function (){

  
  
window.location = "index.php?ruta=cargamasivacontado";


});
$(document).on("click", ".btnEditarCargamasivacontado", function (){
 var id = $(this).attr("id");
 var NAsiento = $(this).attr("NAsiento");
 var Metododepago = $(this).attr("Metododepago");

window.location = "index.php?ruta=Editar-cargamasivacontado&id="+id+"&NAsiento="+NAsiento+"&Metododepago="+Metododepago;


 
 });
$(document).on("click", ".btnEliminarCargamasivacontado", function(){
  
  var id = $(this).attr("id");
  var NAsiento = $(this).attr("NAsiento");
  var Rnc_Empresa_VentaContado = $(this).attr("Rnc_Empresa_VentaContado");
  var accionCargamasivacontado = "eliminar";
  

  swal({
      title: '¿Esta usted Seguro de Borrar el Deposito?',
      text: '¡Si no lo esta puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelmButtonText: "Cancelar",
      confirmButtonText: "Si, borrar Recibo",
      }).then(function(result){

    if(result.value){
      window.location = "index.php?ruta=detallerecibodedeposito&id="+id+"&NAsiento="+NAsiento+"&Rnc_Empresa_VentaContado="+Rnc_Empresa_VentaContado+"&accionCargamasivacontado="+accionCargamasivacontado;
          }
    });
});


var car = 0;
$(document).on("click", ".agregarpordepositar", function (){
  car ++;

  $(this).removeClass("btn-primary agregarpordepositar");
  $(this).addClass("btn-default");

  var id = $(this).attr("id");
  var RncEmpresaVenta = $(this).attr("RncEmpresaVenta");
  var RncCliente = $(this).attr("RncCliente");
  var NombreCliente = $(this).attr("NombreCliente");
  var NCFFactura = $(this).attr("NCFFactura");
  var TotalFac = $(this).attr("TotalFac");
  var FechaAnoMes = $(this).attr("FechaAnoMes");
  var FechaDia = $(this).attr("FechaDia");
  var ITBIS = $(this).attr("ITBIS");
  var subtotal = $(this).attr("subtotal");
  var idProyecto = $(this).attr("idProyecto");
  var CodigoProyecto = $(this).attr("CodigoProyecto");

$("#totalITBISvi").val(ITBIS);
$("#totalITBISvi").number(true, 2);
$("#porretitbis").val(0);
$("#totalret").val(0);
$("#totalfacvi").val(TotalFac);
$("#totalfacvi").number(true, 2);
$("#totalNetovi").val(subtotal);
$("#totalNetovi").number(true, 2);
$("#porretisr").val(0);
$("#totalretisr").val(0);
  
$(".cargapordepositar").append(
  '<div class="row" style="padding:5px 15px">'+
    '<div class="col-xs-3" style="padding-right:0px">'+
      '<div class="input-group">'+
'<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitardeposito" id="'+id+'" car="'+car+'"><i class="fa fa-times"></i></button>'+'</span>'+
'<input type="hidden" class="form-control id" id="'+id+'"" name="'+id+'"" value="'+id+'" required readonly>'+
'<input type="hidden" class="form-control RncCliente" id="RncCliente" name="RncCliente" value="'+RncCliente+'" required readonly>'+
'<input type="hidden" class="form-control NombreCliente" id="NombreCliente" name="NombreCliente" value="'+NombreCliente+'" required readonly>'+
'<input type="hidden" class="form-control car" car="'+car+'"" value="'+car+'" required readonly>'+
'<input type="hidden" class="form-control idProyecto" id="idProyecto" name="idProyecto" value="'+idProyecto+'" required readonly>'+
'<input type="hidden" class="form-control CodigoProyecto" id="CodigoProyecto" name="CodigoProyecto" value="'+CodigoProyecto+'" required readonly>'+

                      '<input type="text" class="form-control NCFFactura" name="NCFFactura" value="'+NCFFactura+'" required readonly>'+ 
                            
                      '</div>'+
                       '</div>'+
                       '<div class="col-xs-1" style="padding-left:0px;padding-right:0px">'+
                          
                        '<div input-group">'+
                            
                          '<input type="text" class="form-control FechaAnoMes" name="FechaAnoMes" value="'+FechaAnoMes+'" required readonly>'+ 
                            
                        '</div>'+
                    '</div>'+
                      '<div class="col-xs-1" style="padding-left:0px;padding-right:0px">'+
                          
                        '<div input-group">'+
                            
                          '<input type="text" class="form-control FechaDia" name="FechaDia" value="'+FechaDia+'" required readonly>'+ 
                            
                        '</div>'+
                    '</div>'+
                   
                       '<div class="col-xs-2 totalFac" style="padding-left:0px;padding-right:0px">'+
                          
                        '<div input-group">'+
                            
                          '<input type="text" class="form-control TotalFac" name="TotalFac" value="'+TotalFac+'" required readonly>'+ 
                            
                        '</div>'+
                    '</div>'+
                      '<div class="col-xs-1" style="padding-left:0px;padding-right:0px">'+
                     
                         '<select type="text" class="form-control ITBISRetenido" id="ITBISRetenido" name="ITBISRetenido" required>'+
                               '<option value="0">0</option>'+
                               '<option value="30">30</option>'+
                               '<option value="100">100</option>'+

                            '</select>'+
                        
                     
                      '</div>'+
                     
                            
                      
                       '<div class="col-xs-1" style="padding-left:0px;padding-right:0px">'+
                      
                     
                        
                         '<select type="text" class="form-control ISRRetenido" id="ISRRetenido" name="ISRRetenido" required>'+
                               '<option value="0">0</option>'+
                               '<option value="2">2</option>'+
                               '<option value="5">5</option>'+
                               '<option value="10">10</option>'+

                            '</select>'+
                        
                     
                      '</div>'+
                      
                      
                       '<div class="col-xs-2" style="padding-left:0px;padding-right:0px">'+
                          
                        '<div input-group">'+

                          '<input type="hidden" class="form-control itbis" id="itbis" name="itbis" value="'+ITBIS+'" required readonly>'+
                          '<input type="hidden" class="form-control subtotal" id="subtotal" name="subtotal" value="'+subtotal+'" required readonly>'+
                          '<input type="hidden" class="form-control Valoritbisret" name="Valoritbisret" value="0" required readonly>'+ 
                             
                          '<input type="hidden" class="form-control Valorisrret" name="Valorisrret" value="0" required readonly>'+ 
                       
                      
                          '<input type="text" class="form-control Totaldeposito" id="totaldeposito" name="totaldeposito" value="'+TotalFac+'" required readonly>'+ 
                            
                        '</div>'+
                    '</div>'+

     


'</div>');

listardeposito();
sumadeposito();


});

/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarDeposito = [];

localStorage.removeItem("quitardeposito");
                    
$(".cargamasivaventas").on("click", "button.quitardeposito", function (){

  $(this).parent().parent().parent().parent().remove();

  var id = $(this).attr("id");

  /******************************************
  ALMACENAR EL ID DEL PORDUCTO A QUITAR
  *******************************************/

  if(localStorage.getItem("quitardeposito") == null){

    idQuitarDeposito = [];


  } else {

      idQuitarDeposito.concat(localStorage.getItem("quitardeposito"))

  }

    idQuitarDeposito.push({"id":id});

  localStorage.setItem("quitardeposito", JSON.stringify(idQuitarDeposito));

$("button.recuperardeposito[id='"+id+"']").removeClass('btn-default');
$("button.recuperardeposito[id='"+id+"']").addClass('btn-primary agregarpordepositar');
     
  if($(".cargapordepositar").children().length == 0){
       
  }
        // AGRUPAR productos JSON
    listardeposito();
    sumadeposito();


 
});


function listardeposito(){

  var listadeposito = [];
  var id = $(".id");
  var rncCliente = $(".RncCliente");
  var nombreCliente = $(".NombreCliente");
  var nCFFactura = $(".NCFFactura");
  var fechaAnoMes = $(".FechaAnoMes");
  var fechaDia = $(".FechaDia");
  var itbis = $(".itbis");
  var subtotal = $(".subtotal");
  var totalFac = $(".TotalFac");
  var iTBISRetenido = $(".ITBISRetenido");
  var valoritbisret = $(".Valoritbisret");
  var iSRRetenido = $(".ISRRetenido");
  var valorisrret = $(".Valorisrret");
  var totaldeposito = $(".Totaldeposito");
  var idProyecto = $(".idProyecto");
  var codigoProyecto = $(".CodigoProyecto");
  for(var i = 0; i < id.length; i++){

    listadeposito.push({ "id" : $(id[i]).attr("id"),
      "rncCliente" : $(rncCliente[i]).val(),
      "nombreCliente" : $(nombreCliente[i]).val(),
      "idProyecto" : $(idProyecto[i]).val(),
      "codigoProyecto" : $(codigoProyecto[i]).val(),
      "nCFFactura" : $(nCFFactura[i]).val(),
      "fechaAnoMes" : $(fechaAnoMes[i]).val(),
      "fechaDia" : $(fechaDia[i]).val(),
      "subtotal" : $(subtotal[i]).val(),
      "itbis" : $(itbis[i]).val(),
      "totalFac" : $(totalFac[i]).val(),
      "iTBISRetenido" : $(iTBISRetenido[i]).val(),
      "valoritbisret" : $(valoritbisret[i]).val(),
      "iSRRetenido" : $(iSRRetenido[i]).val(),
      "valorisrret" : $(valorisrret[i]).val(),
      "totaldeposito" : $(totaldeposito[i]).val()
  })

  }


$("#listadeposito").val(JSON.stringify(listadeposito)); 

}

$(".cargamasivaventas").on("click", "#ISRRetenido", function(){
 
  var iTBISRetenido = $(this).parent().parent().children().children(".ITBISRetenido");
  var itbis = $(this).parent().parent().children().children().children(".itbis");
  var subtotal = $(this).parent().parent().children().children().children(".subtotal");
  var totalFac = $(this).parent().parent().children().children().children(".TotalFac");
  var total = $(this).parent().parent().children().children().children(".Totaldeposito");

  var valorisrret = $(this).parent().parent().children().children().children(".Valorisrret");

isrporcentaje = $(this).val() / 100;

itbisporcentaje = iTBISRetenido.val() / 100;


var valoritbis =  itbis.val() * itbisporcentaje;
let b = valoritbis.toFixed(5);
let regexb=/(\d*.\d{0,2})/;
var totalvaloritbis = b.match(regexb)[0];

var valorisr = subtotal.val() * isrporcentaje; 

let a = valorisr.toFixed(5);
let regexa=/(\d*.\d{0,2})/;
var totalvalorisr = a.match(regexa)[0];

valorisrret.val(totalvalorisr);


var totaldeposito = totalFac.val() - totalvaloritbis - totalvalorisr;

  let t = totaldeposito.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var TotalDeposito = t.match(regex)[0];
  
total.val(TotalDeposito);

$("#totalNetovi").val(subtotal.val());
$("#totalNetovi").number(true, 2);
$("#totalITBISvi").val(itbis.val());
$("#totalITBISvi").number(true, 2);
$("#porretisr").val($(this).val());
$("#totalretisr").val(totalvalorisr);
$("#totalretisr").number(true, 2);
$("#totalfacvi").val(TotalDeposito);
$("#totalfacvi").number(true, 2);


listardeposito();
sumadeposito();

});

$(".cargamasivaventas").on("click", "#ITBISRetenido", function(){

  var iSRRetenido = $(this).parent().parent().children().children(".ISRRetenido");
  var itbis = $(this).parent().parent().children().children().children(".itbis");
  var subtotal = $(this).parent().parent().children().children().children(".subtotal");
  var totalFac = $(this).parent().parent().children().children().children(".TotalFac");
  var total = $(this).parent().parent().children().children().children(".Totaldeposito");
  var valoritbisret = $(this).parent().parent().children().children().children(".Valoritbisret");
   
isrporcentaje =  iSRRetenido.val() / 100;

itbisporcentaje = $(this).val() / 100;




var valorisr = subtotal.val() * isrporcentaje; 
let b = valorisr.toFixed(5);
let regexb=/(\d*.\d{0,2})/;
var totalvalorisr = b.match(regexb)[0];

var valoritbis =  itbis.val() * itbisporcentaje;


let a = valoritbis.toFixed(5);
let regexa=/(\d*.\d{0,2})/;
var totalvaloritbis = a.match(regexa)[0];

valoritbisret.val(totalvaloritbis);

var totaldeposito = totalFac.val() - totalvaloritbis - totalvalorisr;

  let t = totaldeposito.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var TotalDeposito = t.match(regex)[0];


total.val(TotalDeposito);


$("#totalITBISvi").val(itbis.val());
$("#totalITBISvi").number(true, 2);
$("#totalNetovi").val(subtotal.val());
$("#totalNetovi").number(true, 2);
$("#porretitbis").val($(this).val());
$("#totalret").val(totalvaloritbis);
$("#totalret").number(true, 2);
$("#totalfacvi").val(TotalDeposito);
$("#totalfacvi").number(true, 2);


listardeposito();
sumadeposito();

});


function sumadeposito(){

  var depositoItem = $(".Totaldeposito");
  var arraySumaDeposito = [];

  for (var i = 0; i < depositoItem.length; i++){

     arraySumaDeposito.push(Number($(depositoItem[i]).val()));



  }

  function sumaArrayDeposito(total, numero){

    return total + numero;


  }
  var sumarDeposito =  arraySumaDeposito.reduce(sumaArrayDeposito);

  let t = sumarDeposito.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var sumarTotalDeposito  = t.match(regex)[0];

  $("#subtotaldepositovi").val(sumarTotalDeposito);
  $("#subtotaldepositovi").number(true, 2);
  
  $("#subdeposito").val(sumarTotalDeposito);
  
  $("#totaldepositovi").val(sumarTotalDeposito);
  $("#totaldepositovi").number(true, 2);
  
  $("#deposito").val(sumarTotalDeposito);
  

listardeposito();

}

$(document).on("click", "#comisioncobro", function(){
var comision = $(this).val();
var subdeposito = $("#subdeposito").val();

var comisioncobro = (subdeposito * comision)/100;

  let t = comisioncobro.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var comision = t.match(regex)[0];


$("#totalcomisioncobrovi").val(comision);
$("#totalcomisioncobrovi").number(true, 2);
$("#totalcomisioncobro").val(comision);

var totalotrosimpuestos = $("#totalotrosimpuestos").val()

var deposito = subdeposito - comisioncobro - totalotrosimpuestos;

let valor = deposito.toFixed(5);
let trun=/(\d*.\d{0,2})/;
var totaldeposito = valor.match(regex)[0];


  
$("#totaldepositovi").val(totaldeposito);
$("#totaldepositovi").number(true, 2);
  
$("#deposito").val(totaldeposito);

});

$(document).on("click", "#otrosimpuestos", function(){
var otrosimpuestos= $(this).val();
var subdeposito = $("#subdeposito").val();

var comision = (subdeposito * otrosimpuestos)/100;

  let t = comision.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var totalimpuestos = t.match(regex)[0];


$("#totalotrosimpuestosvi").val(totalimpuestos);
$("#totalotrosimpuestosvi").number(true, 2);
$("#totalotrosimpuestos").val(totalimpuestos);

var totalcomisioncobro = $("#totalcomisioncobro").val();

var deposito = subdeposito - comision - totalcomisioncobro;

let valor = deposito.toFixed(5);
let trun=/(\d*.\d{0,2})/;
var totaldeposito = valor.match(regex)[0];
  
$("#totaldepositovi").val(totaldeposito);
$("#totaldepositovi").number(true, 2);
$("#deposito").val(totaldeposito);

});


