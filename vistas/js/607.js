
/*****************
	 DATATABLE
******************/

$('.tablareporte607').DataTable({
    
	lengthMenu : [[25, 100, 150, 200, 250, 300, -1],[25, 100, 150, 200, 250, 300, "Todo"]],

    "scrollX": true,
    "scrollY": true,
    "deferRender": true,
		"retrieve": true,
		"processing": true,
		"paging": true,
		"autoWidth": true,
        initComplete:function(){
            this.api().columns().every(function(){
                var column = this;
                var select = $('<select class="form-control"><option value=""></option></select>').appendTo( $(column.header()).empty() ).on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
 
                        column.search( val ? '^'+val+'$' : '', true, false ).draw();} );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>')
                });
            });
        
    },
     "footerCallback": function ( row, data, start, end, display ) {
				var api = this.api();
				nb_cols = api.columns().nodes().length;
				var j = 9;
				while(j < nb_cols){
					var pageTotal = api
                .column( j, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return Number(a) + Number(b);
                }, 0 );
          // Update footer
          $( api.column( j ).footer() ).html(pageTotal.toLocaleString("en-US"));
					j++;
				} 
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
            {extend:'excel',
             text:'Excel', 
             excelStyles: {
             template: 'blue_medium',

            },
             insertCells: [
                                {
                                    cells: 's1',
                                    content: ['#',
                                    'RNC',
                                    'NCF',
                                    'NCF A',
                                    'Año/Mes',
                                    'NCF',
                                    'Forma de Pago',
                                    '% RET ITBIS',
                                    '% RET ISR',
                                    'Sub Total',
                                    'ITBIS',
                                    'Total Facturado',
                                    'Retención ITBIS',
                                    'Retención ISR',
                                    'Módulo',
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
    var table = $('.tablareporte607').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
 
    } );


$("#Rnc_Factura_607").change(function(){
    
    var RncEmpresaDGII = $("#Rnc_Factura_607").val();
    var RncEmpresaDGIIGrowin = $("#Rnc_Factura_607").val();
    
    var datos = new FormData();
    datos.append("RncEmpresaDGIIGrowin", RncEmpresaDGIIGrowin);

    $.ajax({
        url:"ajax/empresas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
if(respuesta){

    
    $("#Nombre_Empresa_607").val(respuesta["Nombre_Empresa_Growin"]);   
    

}else{
    var datos = new FormData();
    datos.append("RncEmpresaDGII", RncEmpresaDGII);

    $.ajax({
        url:"ajax/empresas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
if(respuesta){

    
$("#Nombre_Empresa_607").val(respuesta["Nombre_Empresa_DGII"]); 
    

        }
    



}
         });
    }
    }
});

});
/*********************************/

    
/************************************
    VALIDACION DE RNC Solo numeros
**************************************/
$("input[name=Rnc_Factura_607]").on('keyup', function (){ 
     this.value = this.value.replace(/[^0-9]/g,'');
     var Ncaracteres = $(this);
     
      
    if ($(".Juridico_607").is(':checked') || $(".Fisico_607").is(':checked')){
        $(".alert").remove(); 


        if($(".Juridico_607").is(':checked') && this.value.length!=9){
            Ncaracteres.prop('maxLength', 9);

        $("input[name=Rnc_Factura_607]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 9</div>');
        
        } else if($(".Fisico_607").is(':checked') && this.value.length!=11){
            Ncaracteres.prop('maxLength', 11);
        $("input[name=Rnc_Factura_607]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 11</div>');
        }
    
        } else{

            $(".alert").remove(); 


            $(".TipoCliente").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');
            Ncaracteres.prop('maxLength', 1);

            
        }
  var RncEmpresa607 = $("#RncEmpresa607").val();
  
  var Rnc_Factura_607 = $("#Rnc_Factura_607").val();
  var NCF607 = $("#NCF607").val();

    if(RncEmpresa607 == Rnc_Factura_607 && NCF607 != "B12" && NCF607 != "B02"){
    swal({
      type: 'warning',
        position: 'top-end',
      title: 'ATENCIÓN..!! se esta Colocando El RNC el mismo RNC de la Empresa',
        showConfirmButton: true,
        allowEnterKey: true,
      confirmButtonText: "Aceptar",
      closeOnConfirm: false,
      
    }).then((result)=>{

      if(result.value){
        swal.close();
        $("#Rnc_Factura_607").val("");

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

/*VALIDACION DE RNC Caracteres en los Botones*/

$('.TipoCliente').on('input', function () {

    var rncCliente = $("input[name=Rnc_Factura_607]").val();
   
    

      
    if ($(".Juridico_607").is(':checked') || $(".Fisico_607").is(':checked')){
        $(".alert").remove(); 


        if($(".Juridico_607").is(':checked') && rncCliente.length!=9){
            rncCliente.prop('maxLength', 9);

        $("input[name=Rnc_Factura_607]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 9</div>');
        
        } else if($(".Fisico_607").is(':checked') && rncCliente.length!=11){
            rncCliente.prop('maxLength', 9);

        $("input[name=Rnc_Factura_607]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 11</div>');
        }
    
        } else{


            $(".TipoCliente").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');
            rncCliente.prop('maxLength', 1);
            
        }

});

/*VALIDACION DE NCF*/

$("input[name=CodigoNCF607]").on('input', function () {
$(".alert").remove(); 

var Ncaracteres = $(this);
this.value = this.value.replace(/[^0-9]/g,'');
var cadena = $("#NCF607").val();
var num = cadena.charAt(0);
    
    
  if(num!='B' && num!='E'){
    $("input[name=NCF_607]").after('<div class="alert alert-danger">Debe comenzar por B o E el NCF</div>');
                    
      Ncaracteres.prop('maxLength', 1);
  }else{
        if(num =='B'){
            Ncaracteres.prop('maxLength', 8);
            if(this.value.length!=8){
                $("input[name=NCF_607]").after('<div class="alert alert-info">Debe Tener 11 digitos</div>');
                this.focus();
                
                } 

        } 
        if(num == 'E'){
            Ncaracteres.prop('maxLength', 10);
            if(this.value.length!=10){
                $("input[name=NCF_607]").after('<div class="alert alert-info">Debe Tener 13 digitos</div>');
                this.focus();
                
                } 


        }

}


});


/*VALIDACION DE NCF Modificado*/

$("input[name=NCF_Modificado_607]").on('input', function () {
    $(".alert").remove(); 
    
    var Ncaracteres = $(this);
   
    this.value = this.value.replace(/[^BE0-9]/g,'');

     num=this.value.charAt(0);
  
  if(num!='B' && num!='E'){
    $("input[name=NCF_Modificado_607]").after('<div class="alert alert-danger">Debe comenzar por B o E el NCF</div>');
                    
      Ncaracteres.prop('maxLength', 1);
  }else{
        if(num =='B'){
            Ncaracteres.prop('maxLength', 11);
            if(this.value.length!=11){
                $("input[name=NCF_Modificado_607]").after('<div class="alert alert-info">Debe Tener 11 digitos</div>');
                this.focus();
                
                } 

        } 
        if(num == 'E'){
            Ncaracteres.prop('maxLength', 13);
            if(this.value.length!=13){
                $("input[name=NCF_Modificado_607]").after('<div class="alert alert-info">Debe Tener 13 digitos</div>');
                this.focus();
                
                } 


        }

}


});

   
$("input[name=FechaFacturadia_607]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fechadia = $(this).val();
     
         
     if(Fechadia.length<2){

        $(".Fechadia_607").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


     }else if(Fechadia.length=2){
        
        $(".alert").remove(); 

        if((Fechadia < 1) || (Fechadia >31)){
            $(".Fechadia_607").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


        }
       

     }



});
$("input[name=FechaReteneciondia_607]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fechadia = $(this).val();
     
         
     if(Fechadia.length<2){

        $(".FechaRetencion").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


     }else if(Fechadia.length=2){
        
        $(".alert").remove(); 

        if((Fechadia < 1) || (Fechadia >31)){
            $(".FechaRetencion").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


        }
       

     }



});


$("input[name=FechaPagodia607]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fechadia = $(this).val();
     
         
     if(Fechadia.length<2){

        $(".Fecha_Trans_Dia").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


     }else if(Fechadia.length=2){
        
        $(".alert").remove(); 

        if((Fechadia < 1) || (Fechadia >31)){
            $(".Fecha_Trans_Dia").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


        }
       

     }



});

/*********************************
VALIDACION FECHA
**********************************/
$("input[name=FechaFacturames_607]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fecha = $(this).val();
     var ano = Fecha.substr(0,4);
     var mes =  Fecha.substr(4,2);
     
     
     if(Fecha.length<6){

     $(".Fechames_607").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



     }else if(Fecha.length=6){
        
        $(".alert").remove(); 

        if((ano < 2018) || (ano > 2026) || (mes == 0) || (mes > 12)){
            $(".Fechames_607").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


        }     

     }
    



});

$("input[name=FechaRetenecionmes_607").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fecha = $(this).val();
     var ano = Fecha.substr(0,4);
     var mes =  Fecha.substr(4,2);
     
     
     if(Fecha.length<6){

     $(".FechaRetencion").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



     }else if(Fecha.length=6){
        
        $(".alert").remove(); 

        if((ano < 2018) || (ano > 2026) || (mes == 0) || (mes > 12)){
            $(".FechaRetencion").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


        }     

     }
    



});

$("input[name=FechaPagomes607]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fecha = $(this).val();
     var ano = Fecha.substr(0,4);
     var mes =  Fecha.substr(4,2);
     
     
     if(Fecha.length<6){

     $(".Fecha_Trans_AnoMes").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



     }else if(Fecha.length=6){
        
        $(".alert").remove(); 

        if((ano < 2018) || (ano > 2026) || (mes == 0) || (mes > 12)){
            $(".Fecha_Trans_AnoMes").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


        }     

     }
    



});





/**VALIDACION DIAS DE CREDITO*/


$("input[name=Forma_De_Pago_607]").change(function(event){
        
        var valor = $(event.target).val();
        
        if(valor =="04" && $(".Dias_Credito").is(':checked')){
            $("#div1").show().html( 
                '<div input-group form-control class="col-xs-12 right">'+
                        '<input type="radio" name="diaCredito" id="dias15" value="15" required checked>15'+
                         '<input type="radio" name="diaCredito" id="dias30" value="30" required>30'+
                         '<input type="radio" name="diaCredito" id="dias45" value="45" required>45'+
                         '<input type="radio" name="diaCredito" id="dias90" value="90" required>90</div>');

           
            
            
        } else 
         $("#div1").hide().html();
            


           
 });




$("input[name=Monto_Facturado_607]").keyup(function(event){

     this.value = this.value.replace(/[^0-9.]/g,'');
     
    var Monto_Facturado_607 = $(this).val();

    var extraerNCF = $("#NCF607").val();
  
   
    
     if(extraerNCF.substring(0,3) == "B14" ){

      $("#ITBIS_Facturado_607").val(0.0);
      
     }else if(extraerNCF.substring(0,3) == "E44" ){

      $("#ITBIS_Facturado_607").val(0.0);
      

     }else{

       if(Monto_Facturado_607 > 0){ 

          var suma = $("#Monto_Facturado_607").val();
          var porcentajeITBIS =  (Number(suma) * 18)/100;

          let t = porcentajeITBIS.toFixed(5);
          let regex=/(\d*.\d{0,2})/;
          var MontoITBISPOR = t.match(regex)[0];

        $("#ITBIS_Facturado_607").val(MontoITBISPOR);
        
     
    } 




     }
$("#Impuesto_Selectivo_al_Consumo_607").val(0);
$("#Otros_Impuestos_607").val(0);

 totalfactura607();  

})



$("input[name=ITBIS_Facturado_607]").keyup(function(event){
    $(".alert").remove(); 
     this.value = this.value.replace(/[^0-9.]/g,'');


    
    var ITBIS_Facturado_607  = $(this).val();

    
    var Monto_Facturado_607 = $("#Monto_Facturado_607").val();

    
    var suma = Number($("#Monto_Facturado_607").val());

    var porcentajeITBIS =  (Number(suma) * 18)/100;

    let t = porcentajeITBIS.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var MontoITBISPOR = t.match(regex)[0];
    

    if(ITBIS_Facturado_607 >  MontoITBISPOR){

        $("#ITBIS_Facturado_607").after('<div class="alert alert-warning">El ITBIS no debe ser mayor al 18 % y la propina legal no debe ser mayor al 1 %</div>');

    }

totalfactura607();
});

$(".Registro607").on("keyup", "#Monto_Propina_Legal_607", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
 


totalfactura607();
      

});
$(".Registro607").on("keyup", "#Impuesto_Selectivo_al_Consumo_607", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
 


totalfactura607();
      

});
$(".Registro607").on("keyup", "#Otros_Impuestos_607", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
 


totalfactura607();
      

});
function totalfactura607(){


var Monto_Facturado_607 = $("#Monto_Facturado_607").val();

var ITBIS_Facturado_607 = $("#ITBIS_Facturado_607").val();

var Monto_Propina_Legal_607 = $("#Monto_Propina_Legal_607").val();

var Impuesto_Selectivo_al_Consumo_607 = $("#Impuesto_Selectivo_al_Consumo_607").val();

var Otros_Impuestos_607 = $("#Otros_Impuestos_607").val();




var totalfactura = Number($("#Monto_Facturado_607").val()) + Number($("#ITBIS_Facturado_607").val()) + Number($("#Monto_Propina_Legal_607").val()) + Number($("#Impuesto_Selectivo_al_Consumo_607").val()) + Number($("#Otros_Impuestos_607").val());
console.log("totalfactura", totalfactura);

let z = totalfactura.toFixed(5);
let regex1=/(\d*.\d{0,2})/;
var totalfacturavi = z.match(regex1)[0];


    

    $("#TotalFacturavi607").val(totalfacturavi);
    $("#TotalFacturavi607").number(true, 2);
    

 }
/*************************************
    EDITAR CATEGORIAS
**************************************/
$(document).on("click", ".btnRetener607", function(){

    var id_607 = $(this).attr("id_607");
    
    console.log("id_607", id_607);
    
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
            console.log("respuesta", respuesta);

            
            
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


$("input[name=ITBIS_Retenido_607]").change(function(event){
    $(".alert").remove(); 
        
        var valor = $(event.target).val();
        var MontoITBIS_Retener = $("#MontoITBIS_Retener_607").val();
        
        if(valor =="30"){       
    
    var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 30)/100;
    let t = porcentajeRetenerITBIS.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var MontoITBISPOR = t.match(regex)[0];

    $("#Monto_ITBIS_Retenido_607").val(MontoITBISPOR);
        
           
            
      } else if(valor =="75"){
    var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 75)/100;

    let t = porcentajeRetenerITBIS.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var MontoITBISPOR = t.match(regex)[0];

   
    

        $("#Monto_ITBIS_Retenido_607").val(MontoITBISPOR);



        }else if(valor =="100"){
            var porcentajeRetenerITBIS =  Number((MontoITBIS_Retener) * 100)/100;

    let t = porcentajeRetenerITBIS.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var MontoITBISPOR = t.match(regex)[0];

   
    

        $("#Monto_ITBIS_Retenido_607").val(MontoITBISPOR);

        



            
        }

           
 });

/**VALIDACION DE ITBIS RETENIDO*/

$("input[name=ISR_RETENIDO_607]").change(function(event){
    
        var valor = $(event.target).val();
         var MontoFacturadoRetener = $("#MontoFacturadoRetener_607").val();
         
        if(valor =="2"){    
    
        var porcentajeRetenerISR =  Number((MontoFacturadoRetener) * 2)/100;

    let t = porcentajeRetenerISR.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var MontoISRPOR = t.match(regex)[0];

   

    

        $("#Monto_ISR_Retenido_607").val(MontoISRPOR);
        
           
            
        } else if(valor =="10"){
    var porcentajeRetenerISR =  Number((MontoFacturadoRetener) * 10)/100;

    let t = porcentajeRetenerISR.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var MontoISRPOR = t.match(regex)[0];

    

        $("#Monto_ISR_Retenido_607").val(MontoISRPOR);
        
           


        }

       

           
 });



/**********************************************************************************************************************
    EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  
***********************************************************************************************************************/



$(".tablareporte607").on("click", ".btnEditar607", function(){

    var id_607 = $(this).attr("id_607");
    var modulo = $(this).attr("modulo");

    window.location = "index.php?ruta=Editar-registro-607&id_607="+id_607+"&modulo="+modulo; 


})
$(".tablareporte607").on("click", ".btnCopiar607", function(){

    var id_607 = $(this).attr("id_607");
    var modulo = $(this).attr("modulo");

    window.location = "index.php?ruta=Copiar-registro-607&id_607="+id_607+"&modulo="+modulo; 


})
$(".tablas").on("click", ".btnEditar607", function(){

    var id_607 = $(this).attr("id_607");
    var modulo = $(this).attr("modulo");


    window.location = "index.php?ruta=Editar-registro-607&id_607="+id_607+"&modulo="+modulo; 


})
$(".tablas").on("click", ".btnCopiar607", function(){

    var id_607 = $(this).attr("id_607");
    var modulo = $(this).attr("modulo");


    window.location = "index.php?ruta=Copiar-registro-607&id_607="+id_607+"&modulo="+modulo; 

})


/*************************************
    Eliminar Registro 606
**************************************/
$(document).on("click", ".btnEliminar607", function(){

    var id_607 = $(this).attr("id_607");

    swal({
            title: '¿Esta usted Seguro de Borrar El Registro del 607?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, Borrar Registro 607",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=reporte-607&id_607="+id_607;
                    }
        });

    
})
/*************************************
    Desacrgar TXT 606
**************************************/
$(document).on("click", "#descargartxt607", function(){ 
    
    var RncEmpresa607Rango = $("#RncEmpresa607Rango").val();
    var Periodoreporte607 = $("#Periodoreporte607").val();

    var datos = new FormData();
    datos.append("RncEmpresa607Rango", RncEmpresa607Rango);
    datos.append("Periodoreporte607", Periodoreporte607);
    

    
    $.ajax({
        url:"ajax/607.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            

            // CICLO FOR PARA CONTAR NUMERO DE REGISTROS

            var registro = 0;


            for(let item of respuesta){ 

                if(item.EXTRAER_NCF_607 != 'B02' && item.EXTRAER_NCF_607 != 'FP1' && item.EXTRAER_NCF_607 != 'BCF'){

                    var registro = registro+1;  
                }else if(item.EXTRAER_NCF_607 == 'B02' && item.Monto_Facturado_607 >= 250000.00){
                    var registro = registro+1;  


                }
                
            }
        

    var nombre = RncEmpresa607Rango+"_"+Periodoreporte607; // NOMBRE DEL ARCHIVO TXT


    var head = "607|"+RncEmpresa607Rango+"|"+Periodoreporte607+"|"+registro; // INCIO DE LA CABEZA DEL ARCHIVO

    var contenidoDeArchivo = [head+"\n"]; // IMPRECION DEL HEAD

    var temporal = [];

// CICLO FOR PARA IMPRIMIR CONTENIDO DE 606

    for(let item of respuesta){ 

 

if(item.EXTRAER_NCF_607 != 'B02' && item.EXTRAER_NCF_607 != 'FP1' && item.EXTRAER_NCF_607 != 'BCF'){
    
    if(item.Fecha_Retencion_AnoMes_607 == ''){ 
    contenidoDeArchivo.push(item.Rnc_Factura_607+"|"+item.Tipo_Id_Factura_607+"|"+item.NCF_607+"|"
    +item.NCF_Modificado_607+"|"+item.Tipo_de_Ingreso_607+"|"+item.Fecha_AnoMesDia_607+"|"
    +item.Fecha_Ret_AnoMesDia_607+"|"+item.Monto_Facturado_607+"|"+item.ITBIS_Facturado_607+"|"
    +item.ITBIS_Retenido_Tercero_607+"|"+""+"|"+item.Retencion_Renta_por_Terceros_607+"|"
    +""+"|"+item.Impuesto_Selectivo_al_Consumo_607+"|"+item.Otros_Impuestos_607+"|"
    +item.Monto_Propina_Legal_607+"|"+item.Efectivo+"|"+item.Cheque_Transferencia_Deposito_607+"|"
    +item.Tarjeta_Debito_Credito_607+"|"+item.Venta_a_Credito_607+"|"+item.Bonos_607+"|"+item.Permuta_607+"|"
    +item.Otras_Formas_de_Ventas_607+"\n");

    }else{
        if(item.Fecha_Retencion_AnoMes_607 > Periodoreporte607){
     contenidoDeArchivo.push(item.Rnc_Factura_607+"|"+item.Tipo_Id_Factura_607+"|"+item.NCF_607+"|"
    +item.NCF_Modificado_607+"|"+item.Tipo_de_Ingreso_607+"|"+item.Fecha_AnoMesDia_607+"|"
    +""+"|"+item.Monto_Facturado_607+"|"+item.ITBIS_Facturado_607+"|"
    +"0.00"+"|"+""+"|"+"0.00"+"|"
    +""+"|"+item.Impuesto_Selectivo_al_Consumo_607+"|"+item.Otros_Impuestos_607+"|"
    +item.Monto_Propina_Legal_607+"|"+item.Efectivo+"|"+item.Cheque_Transferencia_Deposito_607+"|"
    +item.Tarjeta_Debito_Credito_607+"|"+item.Venta_a_Credito_607+"|"+item.Bonos_607+"|"+item.Permuta_607+"|"
    +item.Otras_Formas_de_Ventas_607+"\n");


        }else{
    contenidoDeArchivo.push(item.Rnc_Factura_607+"|"+item.Tipo_Id_Factura_607+"|"+item.NCF_607+"|"
    +item.NCF_Modificado_607+"|"+item.Tipo_de_Ingreso_607+"|"+item.Fecha_AnoMesDia_607+"|"
    +item.Fecha_Ret_AnoMesDia_607+"|"+item.Monto_Facturado_607+"|"+item.ITBIS_Facturado_607+"|"
    +item.ITBIS_Retenido_Tercero_607+"|"+""+"|"+item.Retencion_Renta_por_Terceros_607+"|"
    +""+"|"+item.Impuesto_Selectivo_al_Consumo_607+"|"+item.Otros_Impuestos_607+"|"
    +item.Monto_Propina_Legal_607+"|"+item.Efectivo+"|"+item.Cheque_Transferencia_Deposito_607+"|"
    +item.Tarjeta_Debito_Credito_607+"|"+item.Venta_a_Credito_607+"|"+item.Bonos_607+"|"+item.Permuta_607+"|"
    +item.Otras_Formas_de_Ventas_607+"\n");

            
        }


    }



}else if(item.EXTRAER_NCF_607 == 'B02' && item.Monto_Facturado_607 >= 250000.00){
    contenidoDeArchivo.push(item.Rnc_Factura_607+"|"+item.Tipo_Id_Factura_607+"|"+item.NCF_607+"|"
                +item.NCF_Modificado_607+"|"+item.Tipo_de_Ingreso_607+"|"+item.Fecha_AnoMesDia_607+"|"
                +item.Fecha_Ret_AnoMesDia_607+"|"+item.Monto_Facturado_607+"|"+item.ITBIS_Facturado_607+"|"
                +item.ITBIS_Retenido_Tercero_607+"|"+""+"|"+item.Retencion_Renta_por_Terceros_607+"|"
                +""+"|"+item.Impuesto_Selectivo_al_Consumo_607+"|"+item.Otros_Impuestos_607+"|"
                +item.Monto_Propina_Legal_607+"|"+item.Efectivo+"|"+item.Cheque_Transferencia_Deposito_607+"|"
                +item.Tarjeta_Debito_Credito_607+"|"+item.Venta_a_Credito_607+"|"+item.Bonos_607+"|"+item.Permuta_607+"|"
                +item.Otras_Formas_de_Ventas_607+"\n");


                }
    }
    
    

    
    var contenido = contenidoDeArchivo.join("");


    var elem = document.getElementById('descargartxt607');

    
    elem.download = "DGII_F_607_"+nombre+".txt";
    elem.href = "data:application/octet-stream,"  + encodeURIComponent(contenido);
                     



            }
            })      
                        

    })
    


$(document).on("mouseup", "#descargartxt607", function(){ 
    
    var RncEmpresa607 = $("#RncEmpresa607Rango").val();
    var Periodoreporte607 = $("#Periodoreporte607").val();
    
    var datos = new FormData();
    datos.append("RncEmpresa607", RncEmpresa607);
    datos.append("Periodoreporte607", Periodoreporte607);
    

    $.ajax({
        url:"ajax/empresas.ajax.php",
        type:"POST",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){

            
        }
    });

});

/*************************************
    Desacrgar TXT 606
**************************************/
$(document).on("click", "#numeraciontxt607", function(){ 
    
    var RncEmpresa607Rango = $("#RncEmpresa607Rango").val();
    var Periodoreporte607 = $("#Periodoreporte607").val();

    var datos = new FormData();
    datos.append("RncEmpresa607Rango", RncEmpresa607Rango);
    datos.append("Periodoreporte607", Periodoreporte607);
    

    
    $.ajax({
        url:"ajax/607.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            

            // CICLO FOR PARA CONTAR NUMERO DE REGISTROS

            var registro = 0;


            for(let item of respuesta){ 

                if(item.EXTRAER_NCF_607 != 'B02' && item.EXTRAER_NCF_607 != 'FP1' && item.EXTRAER_NCF_607 != 'BCF'){

                    var registro = registro+1;  
                }else if(item.EXTRAER_NCF_607 == 'B02' && item.Monto_Facturado_607 >= 250000.00){
                    var registro = registro+1;  


                }
                
            }
        

    var nombre = RncEmpresa607Rango+"_"+Periodoreporte607; // NOMBRE DEL ARCHIVO TXT


    var head = "607|"+RncEmpresa607Rango+"|"+Periodoreporte607+"|"+registro; // INCIO DE LA CABEZA DEL ARCHIVO

    var contenidoDeArchivo = [head+"\n"]; // IMPRECION DEL HEAD

    var temporal = [];

// CICLO FOR PARA IMPRIMIR CONTENIDO DE 606
var lineas = 0;


    for(let item of respuesta){ 
        var lineas = lineas+1;

if(item.EXTRAER_NCF_607 != 'B02' && item.EXTRAER_NCF_607 != 'FP1' && item.EXTRAER_NCF_607 != 'BCF'){
    
    if(item.Fecha_Retencion_AnoMes_607 == ''){ 
    contenidoDeArchivo.push(lineas+"__"+item.Rnc_Factura_607+"|"+item.Tipo_Id_Factura_607+"|"+item.NCF_607+"|"
    +item.NCF_Modificado_607+"|"+item.Tipo_de_Ingreso_607+"|"+item.Fecha_AnoMesDia_607+"|"
    +item.Fecha_Ret_AnoMesDia_607+"|"+item.Monto_Facturado_607+"|"+item.ITBIS_Facturado_607+"|"
    +item.ITBIS_Retenido_Tercero_607+"|"+""+"|"+item.Retencion_Renta_por_Terceros_607+"|"
    +""+"|"+item.Impuesto_Selectivo_al_Consumo_607+"|"+item.Otros_Impuestos_607+"|"
    +item.Monto_Propina_Legal_607+"|"+item.Efectivo+"|"+item.Cheque_Transferencia_Deposito_607+"|"
    +item.Tarjeta_Debito_Credito_607+"|"+item.Venta_a_Credito_607+"|"+item.Bonos_607+"|"+item.Permuta_607+"|"
    +item.Otras_Formas_de_Ventas_607+"\n");

    }else{
        if(item.Fecha_Retencion_AnoMes_607 > Periodoreporte607){
     contenidoDeArchivo.push(lineas+"__"+item.Rnc_Factura_607+"|"+item.Tipo_Id_Factura_607+"|"+item.NCF_607+"|"
    +item.NCF_Modificado_607+"|"+item.Tipo_de_Ingreso_607+"|"+item.Fecha_AnoMesDia_607+"|"
    +""+"|"+item.Monto_Facturado_607+"|"+item.ITBIS_Facturado_607+"|"
    +"0.00"+"|"+""+"|"+"0.00"+"|"
    +""+"|"+item.Impuesto_Selectivo_al_Consumo_607+"|"+item.Otros_Impuestos_607+"|"
    +item.Monto_Propina_Legal_607+"|"+item.Efectivo+"|"+item.Cheque_Transferencia_Deposito_607+"|"
    +item.Tarjeta_Debito_Credito_607+"|"+item.Venta_a_Credito_607+"|"+item.Bonos_607+"|"+item.Permuta_607+"|"
    +item.Otras_Formas_de_Ventas_607+"\n");


        }else{
    contenidoDeArchivo.push(lineas+"__"+item.Rnc_Factura_607+"|"+item.Tipo_Id_Factura_607+"|"+item.NCF_607+"|"
    +item.NCF_Modificado_607+"|"+item.Tipo_de_Ingreso_607+"|"+item.Fecha_AnoMesDia_607+"|"
    +item.Fecha_Ret_AnoMesDia_607+"|"+item.Monto_Facturado_607+"|"+item.ITBIS_Facturado_607+"|"
    +item.ITBIS_Retenido_Tercero_607+"|"+""+"|"+item.Retencion_Renta_por_Terceros_607+"|"
    +""+"|"+item.Impuesto_Selectivo_al_Consumo_607+"|"+item.Otros_Impuestos_607+"|"
    +item.Monto_Propina_Legal_607+"|"+item.Efectivo+"|"+item.Cheque_Transferencia_Deposito_607+"|"
    +item.Tarjeta_Debito_Credito_607+"|"+item.Venta_a_Credito_607+"|"+item.Bonos_607+"|"+item.Permuta_607+"|"
    +item.Otras_Formas_de_Ventas_607+"\n");

            
        }


    }



}else if(item.EXTRAER_NCF_607 == 'B02' && item.Monto_Facturado_607 >= 250000.00){
            contenidoDeArchivo.push(lineas+"__"+item.Rnc_Factura_607+"|"+item.Tipo_Id_Factura_607+"|"+item.NCF_607+"|"
                +item.NCF_Modificado_607+"|"+item.Tipo_de_Ingreso_607+"|"+item.Fecha_AnoMesDia_607+"|"
                +item.Fecha_Ret_AnoMesDia_607+"|"+item.Monto_Facturado_607+"|"+item.ITBIS_Facturado_607+"|"
                +item.ITBIS_Retenido_Tercero_607+"|"+""+"|"+item.Retencion_Renta_por_Terceros_607+"|"
                +""+"|"+item.Impuesto_Selectivo_al_Consumo_607+"|"+item.Otros_Impuestos_607+"|"
                +item.Monto_Propina_Legal_607+"|"+item.Efectivo+"|"+item.Cheque_Transferencia_Deposito_607+"|"
                +item.Tarjeta_Debito_Credito_607+"|"+item.Venta_a_Credito_607+"|"+item.Bonos_607+"|"+item.Permuta_607+"|"
                +item.Otras_Formas_de_Ventas_607+"\n");


                }
                
    }
    
   
    var contenido = contenidoDeArchivo.join("");


    var elem = document.getElementById('numeraciontxt607');

    
    elem.download = "Numeracion_De_Lineas"+nombre+".txt";
    elem.href = "data:application/octet-stream,"  + encodeURIComponent(contenido);
                     

          }
      })      
                        
    })
$(document).on("click", ".btnLimpiar607", function(){

    var Limpiar607 ="SI" ;

    swal({
            title: '¿Esta usted Seguro de limpiar el Formulario del Registro del 607?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, limpiar el Formulario de Registro 607",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=registro-607&Limpiar607="+Limpiar607;
                    }
        });

    
})