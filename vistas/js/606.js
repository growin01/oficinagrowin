
/**********************************
     DATATABLE DATATABLE DATATABLE
************************************/
$('.tablareporte606').DataTable({

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
    total = api
                
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
                                    'Tipos de Gastos',
                                    'NCF',
                                    'Año/Mes',
                                    'NCF MOD',
                                    'NCF',
                                    'RET. Año/Mes',
                                    '% RET ITBIS',
                                    '% RET ISR',
                                    'Total Factura',
                                    'Total ITBIS',
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
    var table = $('.tablareporte606').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );

    } );

/**********************************
     DATATABLE DATATABLE DATATABLE
************************************/

$('.tablagastos606').DataTable({

    
        
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
                var j = 7;
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
                'Nombre Empresa',
                'NCF',
                'Año/Mes',
                'NCF MOD', 
                'Total Factura', 
                'Total ITBIS',                 
                ''],
                                    pushRow: true

                                },

                            ],

            },
                {extend:'csv',text:'CSV'},
                
            ]
 });


$(document).ready(function() {
    var table = $('.tablagastos606').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );


    } );
$("#NCF606").change(function(){
    chart = this.value.charAt(0);
    
    var NCFFactura = $("#NCF606").val();
    $("#operador1").val("");
    $("#operador2").val("");
 

if(NCFFactura == "B11" || NCFFactura == "B13"){ 
        $("#operador1").val(0);
        $("#operador2").val(0);
        
    if(NCFFactura == "B13"){
        var RncEmpresa606 = $("#RncEmpresa606").val();
        var NombreEmpresa606 = $("#NombreEmpresa606").val();
        var Tipo_Id_Empresa = $("#Tipo_Id_Empresa").val();

        $("#Rnc_Factura_606").val(RncEmpresa606);
        $("#Nombre_Empresa_606").val(NombreEmpresa606);
        $("#Rnc_Factura_606").prop('readonly', true);
        $("#Nombre_Empresa_606").prop('readonly', true);
        $("#Montototalbienes").focus();

        if(Tipo_Id_Empresa == 1){
            $("#juridico_606").prop("checked", true);
            $("#juridico_606").prop('readonly', true);
            $("#fisico_606").prop("checked", false);
            $("#fisico_606").prop('readonly', true);


        }else{
            $("#fisico_606").prop("checked", true);
            $("#fisico_606").prop('readonly', true);
            $("#juridico_606").prop("checked", false);
            $("#juridico_606").prop('readonly', true);
        }

    }else{
            $("#CodigoNCF606").val("");
            $("#CodigoNCF606").prop('readonly', false);
            $("#Rnc_Factura_606").val("");
            $("#Nombre_Empresa_606").val("");
            $("#Rnc_Factura_606").prop('readonly', false);
            $("#Nombre_Empresa_606").prop('readonly', false);

    }
        
$("#CodigoNCF606").prop('readonly', true);
       
    
    var RncEmpresaVentas = $("#RncEmpresa606").val();
    
    
    var datos = new FormData();
    datos.append("RncEmpresaVentas", RncEmpresaVentas);
    datos.append("NCFFactura", NCFFactura);

    
    $.ajax({
        url:"ajax/correlativos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            

                var codigo = respuesta["NCF_Cons"];
                var codigoNCF = +codigo + 1;
                

            if(respuesta["NCF_Hasta"] > codigoNCF){
                    
        
            const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();
            var numero = fill(codigoNCF, 8);
            $("#CodigoNCF606").val(numero);





                } else{
                     $("#NCF606").val("");
                     $("#CodigoNCF606").val("");
                           

                    swal({
                        type: "error",
                        title: "NO PUEDE FACTURAR CON ESTE CORRELATIVO",
                        text: "¡Usted Alcanzo El Maximo Número de Correlativos Aprobado Por La DGII debe solicitarlos a la DGII!",
                        confirmButtonText: "¡Cerrar!"
                                
                    });

                }
    
        }

})

}/*cierre de if de ncf*/    
else if(NCFFactura == "E41" || NCFFactura == "E43"){ 
    $("#operador1").val(0);
    $("#operador2").val(0);
        
    $("#CodigoNCF606").prop('readonly', true);
    if(NCFFactura == "E43"){
        var RncEmpresa606 = $("#RncEmpresa606").val();
        var NombreEmpresa606 = $("#NombreEmpresa606").val();
        var Tipo_Id_Empresa = $("#Tipo_Id_Empresa").val();

        $("#Rnc_Factura_606").val(RncEmpresa606);
        $("#Nombre_Empresa_606").val(NombreEmpresa606);
        $("#Rnc_Factura_606").prop('readonly', true);
        $("#Nombre_Empresa_606").prop('readonly', true);

        if(Tipo_Id_Empresa == 1){
            $("#juridico_606").prop("checked", true);
            $("#juridico_606").prop('readonly', true);
            $("#fisico_606").prop("checked", false);
            $("#fisico_606").prop('readonly', true);


        }else{
            $("#fisico_606").prop("checked", true);
            $("#fisico_606").prop('readonly', true);
            $("#juridico_606").prop("checked", false);
            $("#juridico_606").prop('readonly', true);


        }

    } else{
            $("#CodigoNCF606").val("");
            $("#CodigoNCF606").prop('readonly', false);
            $("#Rnc_Factura_606").val("");
            $("#Nombre_Empresa_606").val("");
            $("#Rnc_Factura_606").prop('readonly', false);
            $("#Nombre_Empresa_606").prop('readonly', false);

    }
        
    var RncEmpresaVentas = $("#RncEmpresaCompras").val();
    
    var datos = new FormData();
    datos.append("RncEmpresaVentas", RncEmpresaVentas);
    datos.append("NCFFactura", NCFFactura);

    
    $.ajax({
        url:"ajax/correlativos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            

                var codigo = respuesta["NCF_Cons"];
                var codigoNCF = +codigo + 1;
                console.log("codigo", codigo);

            if(respuesta["NCF_Hasta"] > codigoNCF){
        
                            
                            const fill = (codigoNCF, len) => "0".repeat(len - codigoNCF.toString().length) + codigoNCF.toString();
                            var numero = fill(codigoNCF, 10);
                            $("#CodigoNCFCompra").val(numero);
                           


            } else{
                $("#NCF606").val("");
                $("#CodigoNCF606").val("");
                           

            swal({
                type: "error",
                title: "NO PUEDE FACTURAR CON ESTE CORRELATIVO",
                text: "¡Usted Alcanzo El Maximo Número de Correlativos Aprobado Por La DGII debe solicitarlos a la DGII!",
                confirmButtonText: "¡Cerrar!"
                                
            });

                }
    
        }

})
 } else if(NCFFactura == "B04" || NCFFactura == "E34"){ 
    $("#NCF_Modificado_606").prop('required', true);
    $("#operador1").val(0);
    $("#operador2").val(0);
 

 }else{
$("#CodigoNCF606").val("");
$("#CodigoNCF606").prop('readonly', false);
$("#Rnc_Factura_606").val("");
$("#Nombre_Empresa_606").val("");
$("#Rnc_Factura_606").prop('readonly', false);
$("#Nombre_Empresa_606").prop('readonly', false);

}


})  


/************************************
    VALIDACION DE RNC Solo numeros
**************************************/

/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/
$("input[name=Rnc_Factura_606]").on('keyup', function (){ 
    $("#Nombre_Empresa_606").val("");

this.value = this.value.replace(/[^0-9]/g,'');

/**VERIFICACION DE NUEMROS DE CARACTERES**/

if ($(".Juridico").is(':checked') || $(".Fisico").is(':checked')){ 

    if ($(".Juridico").is(':checked') && this.value.length!=9){
       
         
        $(".alert").remove(); 

        $("input[name=Rnc_Factura_606]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 9</div>');


    } else if ($(".Fisico").is(':checked') && this.value.length != 11){
        
       

         $(".alert").remove(); 
          

    $("input[name=Rnc_Factura_606]").after('<div class="alert alert-warning">La cantidad de Caracteres del RNC debe ser igual a 11</div>');
    
    } 
} else {
        $(".alert").remove(); 


        $(".TipoSuplidor").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');
          
         $("#Rnc_Factura_606").val("");

    }
/**VERIFICACION DE GASTOS MENORES**/
  
    var RncEmpresa606 = $("#RncEmpresa606").val();
    
    var Rnc_Factura_606 = $("#Rnc_Factura_606").val();

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
                $("#Rnc_Factura_606").val("");

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

/**VERIFICACION DE GASTOS MENORES**/
if(($(".Juridico").is(':checked') && this.value.length == 9) || ($(".Fisico").is(':checked') && this.value.length == 11)){
   
    var RncSuplidor = $("#Rnc_Factura_606").val();
    var RncEmpresasuplidorvalidar = $("#RncEmpresa606").val();

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


                $("#Nombre_Empresa_606").val(respuesta["Nombre_Suplidor"]);

                return;
                

        }else { 


        var RncEmpresaDGII = $("#Rnc_Factura_606").val();
        var RncEmpresaDGIIGrowin = $("#Rnc_Factura_606").val();

        
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

                
                    $("#Nombre_Empresa_606").val(respuesta["Nombre_Empresa_Growin"]); 
                    return;  
                

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

                
                $("#Nombre_Empresa_606").val(respuesta["Nombre_Empresa_DGII"]);
                return; 
                

                }else{
                    setTimeout(function(){ var Nombre_Empresa_606 = $("#Nombre_Empresa_606").val();

    if(Nombre_Empresa_606 == ""){
    
        $("input[name=Nombre_Empresa_606]").after('<div class="alert alert-warning">El RNC digitado no coinside con las empresas Registradas en la DGII</div>');
    
    } }, 3000);




                }
            }/*tercera respuesta*/
         });/*tercera ajax*/
    }/*else*/



    }/*segunda respuesta*/
});/*segundo ajax*/


        

        }/*cierre else de suplidores*/

        }/*cierre primera respuesta */
        }); /*cierre primmer ajax*/

    
  

}/*if de igual  9 o igual 11*/ 


});/*cierre funcion*/

/*VALIDACION DE RNC Caracteres en los Botones*/

$('.TipoSuplidor').on('input', function () {

    var rncSuplidor = $("input[name=Rnc_Factura_606]").val();

    
 
    if ($(".Juridico").is(':checked') || $(".Fisico").is(':checked')){
        $(".alert").remove(); 


        if($(".Juridico").is(':checked') && rncSuplidor.length!=9){
            rncSuplidor.prop('maxLength', 9);

        $("input[name=Rnc_Factura_606]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 9</div>');
         
        } else if($(".Fisico").is(':checked') && rncSuplidor.length!=11){
        $("input[name=Rnc_Factura_606]").after('<div class="alert alert-info" role="alert">La cantidad de Caracteres del Rnc debe ser igual a 11</div>');
        rncSuplidor.prop('maxLength', 11);
        }
    
        } else{


            $(".TipoSuplidor").after('<div class="alert alert-warning">Debe Seleccionar Un Tipo de Suplidor</div>');

        
        }

});

/*VALIDACION DE NCF*/

$("input[name=CodigoNCF606]").on('input', function () {
$(".alert").remove(); 
    
    var Ncaracteres = $(this);
   
    this.value = this.value.replace(/[^0-9]/g,'');

    var cadena = $("#NCF606").val();

    var num = cadena.charAt(0);

  if(num!='B' && num!='E'){
    $("input[name=NCF_606]").after('<div class="alert alert-danger">ATENCION..!! EL NCF Debe comenzar por B o E En MAYUSCULA, sino, el sistema no le permitira escribir en el campo</div>');
            Ncaracteres.prop('maxLength', 1);       
      
  }else{
        if(num =='B'){
            Ncaracteres.prop('maxLength', 8);
            if(this.value.length!=8){
                $("input[name=NCF_606]").after('<div class="alert alert-info">EL NCF Debe Tener 11 digitos</div>');
                this.focus();
                
                } 

        } 
        if(num == 'E'){
            Ncaracteres.prop('maxLength', 10);
            if(this.value.length!=10){
                $("input[name=NCF_606]").after('<div class="alert alert-info">EL NCF Debe Tener 13 digitos</div>');
                this.focus();
                
                } 


        }

}



});

/*VALIDACION DE NCF Modificado*/

$("input[name=NCF_Modificado_606]").on('input', function () {
$(".alert").remove(); 
    
    var Ncaracteres = $(this);
   
    this.value = this.value.replace(/[^BE0-9]/g,'');

     num=this.value.charAt(0);
  
  if(num!='B' && num!='E'){
    $("input[name=NCF_Modificado_606]").after('<div class="alert alert-danger">ATENCION..!! EL NCF Debe comenzar por B o E En MAYUSCULA, sino, el sistema no le permitira escribir en el campo</div>');
                    
      Ncaracteres.prop('maxLength', 1);
  }else{
        if(num =='B'){
            Ncaracteres.prop('maxLength', 11);
            if(this.value.length!=11){
                $("input[name=NCF_Modificado_606]").after('<div class="alert alert-info"> EL NCF Debe Tener 11 digitos</div>');
                this.focus();
                
                } 

        } 
        if(num == 'E'){
            Ncaracteres.prop('maxLength', 13);
            if(this.value.length!=13){
                $("input[name=NCF_Modificado_606]").after('<div class="alert alert-info"> EL NCF Debe Tener 13 digitos</div>');
                this.focus();
                
                } 


        }

}

});

   
$("input[name=FechaFacturadia_606]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fechadia = $(this).val();
     
         
     if(Fechadia.length<2){

        $(".Fechadia").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


     }else if(Fechadia.length=2){
        
        $(".alert").remove(); 

        if((Fechadia < 1) || (Fechadia >31)){
            $(".Fechadia").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


        }
       

     }



});
$("input[name=FechaReteneciondia_606]").on('input', function(){
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


$("input[name=FechaPagodia606]").on('input', function(){
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
$("input[name=FechaFacturames_606]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fecha = $(this).val();
     var ano = Fecha.substr(0,4);
     var mes =  Fecha.substr(4,2);
     
     
     if(Fecha.length<6){

     $(".Fechames").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



     }else if(Fecha.length=6){
        
        $(".alert").remove(); 

        if((ano < 2018) || (ano > 2026) || (mes == 0) || (mes > 12)){
            $(".Fechames").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


        }     

     }
    



});

$("input[name=FechaRetenecionmes_606]").on('input', function(){
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

$("input[name=FechaPagomes606]").on('input', function(){
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


$("input[name=Forma_De_Pago_606]").change(function(event){
        
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



$("input[name=Montototalbienes]").change(function(event){

    var extraerNCF = $("#NCF606").val();
    var Montototalbienes = $(this).val();
    
     if(extraerNCF.substring(0,3) == "B13" ){

        $("#MontoITBIS").val(0.00);
        $("#ImpuestoSelectivo").val(0.00);
        $("#OtrosImpuestos").val(0.00);

     }else if (extraerNCF.substring(0,3) == "B14"){
        $("#MontoITBIS").val(0.0);
        $("#ImpuestoSelectivo").val(0.00);
        $("#OtrosImpuestos").val(0.00);

     } else{ 
        
    if(Montototalbienes > 0){
        
    var Montototalservicios = $("#Montototalservicios").val(0);
    
    var suma = Number($("#Montototalbienes").val()) + Number($("#Montototalservicios").val());

        var porcentajeITBIS =  (Number(suma) * 18)/100;
        
        let t = porcentajeITBIS.toFixed(5);
        let regex=/(\d*.\d{0,2})/;
        var MontoITBISPOR = t.match(regex)[0];


        $("#MontoITBIS").val(MontoITBISPOR);
        $("#ImpuestoSelectivo").val(0.00);
        $("#OtrosImpuestos").val(0.00);
        
    } 
    }
totalfactura606();

})

$("input[name=Montototalservicios]").change(function(event){

    var extraerNCF = $("#NCF606").val();
    var Montototalservicios = $(this).val();

      if(extraerNCF.substring(0,3) == "B13"){

        $("#MontoITBIS").val(0.00);
        $("#ImpuestoSelectivo").val(0.00);
        $("#OtrosImpuestos").val(0.00);

     }else if (extraerNCF.substring(0,3) == "B14"){
        $("#MontoITBIS").val(0.0);
        $("#ImpuestoSelectivo").val(0.00);
        $("#OtrosImpuestos").val(0.00);

     }else if(extraerNCF.substring(0,3) == "E43"){

        $("#MontoITBIS").val(0.00);
        $("#ImpuestoSelectivo").val(0.00);
        $("#OtrosImpuestos").val(0.00);

     }else if (extraerNCF.substring(0,3) == "E44"){
        $("#MontoITBIS").val(0.0);
        $("#ImpuestoSelectivo").val(0.00);
        $("#OtrosImpuestos").val(0.00);

     }else{ 
        
    if(Montototalservicios > 0){
        var Montototalbienes = $("#Montototalbienes").val(0);
        var suma = Number($("#Montototalbienes").val()) + Number($("#Montototalservicios").val());

        var porcentajeITBIS =  (Number(suma) * 18)/100;
        let t = porcentajeITBIS.toFixed(5);
        let regex=/(\d*.\d{0,2})/;
        var MontoITBISPOR = t.match(regex)[0];
    
        $("#MontoITBIS").val(MontoITBISPOR);
        $("#ImpuestoSelectivo").val(0.00);
        $("#OtrosImpuestos").val(0.00);
        
    }
    }
totalfactura606();

})

$("input[name=MontoITBIS]").change(function(event){
    $(".alert").remove(); 
    var MontoITBIS  = $(this).val();
    var Montototalservicios = $("#Montototalbienes").val();
    var Montototalbienes = $("#Montototalservicios").val();
    var suma = Number($("#Montototalbienes").val()) + Number($("#Montototalservicios").val());

    var porcentajeITBIS =  (Number(suma) * 18)/100;
    let t = porcentajeITBIS.toFixed(5);
    let regex=/(\d*.\d{0,2})/;
    var MontoITBISPOR = t.match(regex)[0];
    
if(MontoITBIS > MontoITBISPOR){

    $("#MontoITBIS").after('<div class="alert alert-warning">El ITBIS no debe ser mayor al 18 % y la propina legal no debe ser mayor al 1 %</div>');

}
totalfactura606();

});

function totalfactura606(){


var montototalbienes = $("#Montototalbienes").val();

var montototalservicios = $("#Montototalservicios").val();

var montoITBIS = $("#MontoITBIS").val();

var propinalegal = $("#Propinalegal").val();

var impuestoSelectivo = $("#ImpuestoSelectivo").val();

var otrosImpuestos = $("#OtrosImpuestos").val();



var totalfactura = Number($("#Montototalbienes").val()) + Number($("#Montototalservicios").val()) + Number($("#MontoITBIS").val()) +Number($("#Propinalegal").val()) + Number($("#ImpuestoSelectivo").val()) + Number($("#OtrosImpuestos").val());


let z = totalfactura.toFixed(5);
let regex1=/(\d*.\d{0,2})/;
var totalfacturavi = z.match(regex1)[0];


    

    $("#TotalFacturavi").val(totalfacturavi);
    $("#TotalFacturavi").number(true, 2);
    

 }
 $(".Registro606").on("keyup", "#Montototalbienes", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  $("#operador1").val(0);
  $("#operador2").val(0);
 

 


totalfactura606();
      

});



 $(".Registro606").on("keyup", "#Montototalbienes", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  $("#operador1").val(0);
  $("#operador2").val(0);
 
 
totalfactura606();
      
});
$(".Registro606").on("keyup", "#Montototalservicios", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
 
totalfactura606();
      
});
$(".Registro606").on("keyup", "#MontoITBIS", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
 
totalfactura606();
      
});
$(".Registro606").on("keyup", "#Propinalegal", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
 
totalfactura606();
      
});
$(".Registro606").on("keyup", "#ImpuestoSelectivo", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
 
totalfactura606();
      
});
$(".Registro606").on("keyup", "#OtrosImpuestos", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
 
totalfactura606();
      
});
$(".Registro606").on("keyup", "#operador1", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  
   
    calculosubtotal606();
    totalfactura606();
      
    


});
$(".Registro606").on("keyup", "#operador2", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  
   
    calculosubtotal606();
    totalfactura606();
      
    


});
function calculosubtotal606(){



var montoITBIS = $("#operador2").val();
var operador1 = $("#operador1").val();

var subtotalfactura = Number($("#operador1").val()) - Number($("#operador2").val());

let z = subtotalfactura.toFixed(5);
let regex1=/(\d*.\d{0,2})/;
var subtotalfacturavi = z.match(regex1)[0];


    

    $("#Montototalbienes").val(subtotalfacturavi);
    $("#MontoITBIS").val(montoITBIS);
    $("#Montototalservicios").val(0);
    $("#ImpuestoSelectivo").val(0);
    $("#OtrosImpuestos").val(0);
    
if(operador1 == "0"){

$("#Montototalbienes").val("");
$("#MontoITBIS").val("");
$("#operador2").val(0);
$("#Montototalservicios").val("");
$("#ImpuestoSelectivo").val("");
$("#OtrosImpuestos").val("");



}
if(operador1 == ""){

$("#Montototalbienes").val("");
$("#MontoITBIS").val("");
$("#operador2").val("");
$("#Montototalservicios").val("");
$("#ImpuestoSelectivo").val("");
$("#OtrosImpuestos").val("");



}
 }


$(document).on("click", ".btnRetener606", function(){

    var id_606 = $(this).attr("id_606");
    
    console.log("id_606", id_606);
    
    var datos = new FormData();
    datos.append("id_606", id_606);
    
    $.ajax({
        url:"ajax/606.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            
            
            $("#Rnc_Retener").val(respuesta["Rnc_Factura_606"]);
            $("#id_606_Retener").val(respuesta["id"]);
            $("#NCF_606_Retener").val(respuesta["NCF_606"]);
            $("#FechaFacturames_606_Retener").val(respuesta["Fecha_AnoMes_606"]);
            $("#FechaFacturadia_606_Retener").val(respuesta["Fecha_Dia_606"]);
            $("#FechaRetenecionmes_606").val(respuesta["Fecha_Ret_AnoMes_606"]);
            $("#FechaReteneciondia_606").val(respuesta["Fecha_Ret_Dia_606"]);           
            $("#MontoFacturadoRetener").val(respuesta["Total_Monto_Factura_606"]);
            $("#MontoITBIS_Retener").val(respuesta["ITBIS_Factura_606"]);
            $("#Monto_ITBIS_Retenido").val(respuesta["ITBIS_Retenido_606"]);
            $("#Monto_ISR_Retenido").val(respuesta["Monto_Retencion_Renta_606"]);
            
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


})


/**VALIDACION DE ITBIS RETENIDO*/


$("input[name=ITBIS_Retenido]").change(function(event){
    $(".alert").remove(); 
        
        var valor = $(event.target).val();
        var MontoITBIS_Retener = $("#MontoITBIS_Retener").val();
        
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

        $("#Monto_ITBIS_Retenido").after('<div class="alert alert-warning">ALERTA !! Si la Factura no es de empresa de seguridad, usted NO DEBE  retener el 100 %</div>');
    
        }

           
 });

/**VALIDACION DE ITBIS RETENIDO*/

$("input[name=ISR_RETENIDO]").change(function(event){
    
        var valor = $(event.target).val();
        var MontoFacturadoRetener = $("#MontoFacturadoRetener").val();
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
      
                   
 });

$("select[name=tipo_de_seleccionretener]").change(function(event){
    $(".alert").remove(); 

     var valor = $(event.target).val();

     if(valor == ""){

         $("#tipo_de_seleccionretener").after('<div class="alert alert-warning">DEBE SELECCIONAR UN TIPO DE RETENCION</div>');


     } else{

        $(".alert").remove(); 


     }
   
           
 });

/**********************************************************************************************************************
    EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  EDITAR 606  
***********************************************************************************************************************/
$(".tablareporte606").on("click", ".btnEditar606", function(){

    var id_606 = $(this).attr("id_606");
    var modulo = $(this).attr("modulo");


    window.location = "index.php?ruta=Editar-registro-606&id_606="+id_606+"&modulo="+modulo; 


});
$(".tablareporte606").on("click", ".btnCopiar606", function(){

    var id_606 = $(this).attr("id_606");
    var modulo = $(this).attr("modulo");


    window.location = "index.php?ruta=Copiar-registro-606&id_606="+id_606+"&modulo="+modulo; 


});
$(".tablareporte606").on("click", ".btnVerRegistro606", function(){
    $(".ITBISALCOSTO").empty().append();
    $(".ITBISPROPORCIONAL").empty().append();

    var id_606 = $(this).attr("id_606");
    var tipo = 0;
    var itbiscosto = 0;
    var itbisproporcional = 0;



    var datos = new FormData();
    datos.append("id_606", id_606);

    $.ajax({
        url:"ajax/606.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

            $("#Rnc_Factura_606").val(respuesta["Rnc_Factura_606"]);

            var tipo = respuesta["Tipo_Id_Factura_606"];
            
            if(tipo == 1){
                $("#Tipo_Id_Factura_606").val("Jurídico");

            }else{
                $("#Tipo_Id_Factura_606").val("Físico");
                
            }
            

            $("#NCF_606").val(respuesta["NCF_606"]);
            $("#NCF_Modificado_606").val(respuesta["NCF_Modificado_606"]);
            $("#Fecha_AnoMes_606").val(respuesta["Fecha_AnoMes_606"]);
            $("#Fecha_Dia_606").val(respuesta["Fecha_Dia_606"]);
            $("#Nombre_Empresa_606").val(respuesta["Nombre_Empresa_606"]);
            $("#Tipo_Gasto_606  ").val(respuesta["Tipo_Gasto_606"]);
            $("#Forma_Pago_606").val(respuesta["Forma_Pago_606"]);
            $("#Monto_Bienes_606").val(respuesta["Monto_Bienes_606"]);
            $("#Monto_Servicios_606").val(respuesta["Monto_Servicios_606"]);
            $("#ITBIS_Factura_606").val(respuesta["ITBIS_Factura_606"]);
            $("#Monto_Propina_606").val(respuesta["Monto_Propina_606"]);
            $("#Impuestos_Selectivo_606").val(respuesta["Impuestos_Selectivo_606"]);
            

            var itbiscosto = respuesta["ITBIS_alcosto_606"];

if(itbiscosto != 0){
        $(".ITBISALCOSTO").append(
        '<label><input type="checkbox" checked readonly>ITBIS LLEVADO A COSTO</label>');
}else{
                

}

var itbisproporcional = respuesta["ITBIS_Proporcional_606"];

    if(itbisproporcional != 0){
        $(".ITBISPROPORCIONAL").append(
        '<label><input type="checkbox" checked readonly>ITBIS Sujeto a Propocionalidad</label>');
}else{
                

}



            $("#ITBIS_Retenido_606").val(respuesta["ITBIS_Retenido_606"]);
            $("#Porc_ITBIS_Retenido_606").val(respuesta["Porc_ITBIS_Retenido_606"]);
            $("#Monto_Retencion_Renta_606").val(respuesta["Monto_Retencion_Renta_606"]);
            $("#Porc_ISR_Retenido_606").val(respuesta["Porc_ISR_Retenido_606"]);
            $("#Tipo_Retencion_ISR_606").val(respuesta["Tipo_Retencion_ISR_606"]);
            


        }

     


});
});
$(".tablas").on("click", ".btnEditar606", function(){

    var id_606 = $(this).attr("id_606");
    var modulo = $(this).attr("modulo");


    window.location = "index.php?ruta=Editar-registro-606&id_606="+id_606+"&modulo="+modulo; 



})
$(".tablas").on("click", ".btnCopiar606", function(){

    var id_606 = $(this).attr("id_606");
    var modulo = $(this).attr("modulo");


    window.location = "index.php?ruta=Copiar-registro-606&id_606="+id_606+"&modulo="+modulo; 



})
$(".tablagastos606").on("click", ".btnEditar606", function(){

    var id_606 = $(this).attr("id_606");

    window.location = "index.php?ruta=Editar-registro-606&id_606="+id_606; 


})
$(".tablagastos606").on("click", ".btnCopiar606", function(){

    var id_606 = $(this).attr("id_606");

    window.location = "index.php?ruta=Copiar-registro-606&id_606="+id_606; 


})



/*************************************
    Eliminar Registro 606
**************************************/
$(document).on("click", ".btnEliminar606", function(){

    var id_606 = $(this).attr("id_606");

    swal({
            title: '¿Esta usted Seguro de Borrar El Registro del 606?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, borrar Registro 606",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=reporte-606&id_606="+id_606;
                    }
        });

    
})
/*VALIDAR NCF Y RNC NO SE REPITAN*/


$("#CodigoNCF606").keydown(function(){
    $(".alert").remove();
    var codigoNCF606 = $(this).val();
    var ExtraerNCF = $("#NCF606").val();

    var NCF_606 = ExtraerNCF+codigoNCF606;
    
    var Rnc_Factura_606 = $("#Rnc_Factura_606").val();
    
    var RncEmpresa606 = $("#RncEmpresa606").val();

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

$("#Rnc_Factura_606").keydown(function(){
    $(".alert").remove();

    var codigoNCF606 = $("#CodigoNCF606").val();
    var ExtraerNCF = $("#NCF606").val();

    var NCF_606 = ExtraerNCF+codigoNCF606;

    
    
    var Rnc_Factura_606 = $("#Rnc_Factura_606").val();
    
    var RncEmpresa606 = $("#RncEmpresa606").val();

    
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


/*************************************
    Desacrgar TXT 606
**************************************/
$(document).on("click", "#descargartxt606", function(){ 


    var RncEmpresa606Rango = $("#RncEmpresa606Rango").val();
    var Periodoreporte606 = $("#Periodoreporte606").val();

    var datos = new FormData();
    datos.append("RncEmpresa606Rango", RncEmpresa606Rango);
    datos.append("Periodoreporte606", Periodoreporte606);
    
    
    
    $.ajax({
        url:"ajax/606.ajax.php",
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

                if(item.Extraer_NCF_606 != 'CP1'){

                    var registro = registro+1;  
                }
            }
        

    var nombre = RncEmpresa606Rango+"_"+Periodoreporte606; // NOMBRE DEL ARCHIVO TXT


    var head = "606|"+RncEmpresa606Rango+"|"+Periodoreporte606+"|"+registro; // INCIO DE LA CABEZA DEL ARCHIVO

    var contenidoDeArchivo = [head+"\n"]; // IMPRECION DEL HEAD

// CICLO FOR PARA IMPRIMIR CONTENIDO DE 606

    for(let item of respuesta){ 

        if(item.Extraer_NCF_606 != 'CP1'){  

            if(item.Fecha_Ret_AnoMes_606 == ''){
                contenidoDeArchivo.push(item.Rnc_Factura_606+"|"+item.Tipo_Id_Factura_606+"|"+item.Extraer_Tipo_Gasto_606+
            "|"+item.NCF_606+"|"+item.NCF_Modificado_606+"|"+item.Fecha_AnoMes_606+item.Fecha_Dia_606+"|"
            +item.Fecha_Ret_AnoMes_606+item.Fecha_Ret_Dia_606+"|"+item.Monto_Servicios_606+"|"
            +item.Monto_Bienes_606+"|"+item.Total_Monto_Factura_606+"|"+item.ITBIS_Factura_606+"|"
            +item.ITBIS_Retenido_606+"|"+item.ITBIS_Proporcional_606+"|"+item.ITBIS_alcosto_606+"|"
            +item.ITBIS_Adelantar_606+"|"+item.ITBIS_Percibido_Compras_606+"|"+item.Extrar_Tipo_Retencion_606+"|"
            +item.Monto_Retencion_Renta_606+"|"+item.ISR_Percibido_606+"|"+item.Impuestos_Selectivo_606+"|"
            +item.Otro_Impuesto_606+"|"+item.Monto_Propina_606+"|"+item.Extraer_Tipo_Pago_606+"\n");

            }else{
                if(item.Fecha_Ret_AnoMes_606 > Periodoreporte606){
                    contenidoDeArchivo.push(item.Rnc_Factura_606+"|"+item.Tipo_Id_Factura_606+"|"+item.Extraer_Tipo_Gasto_606+
            "|"+item.NCF_606+"|"+item.NCF_Modificado_606+"|"+item.Fecha_AnoMes_606+item.Fecha_Dia_606+"|"
            +""+"|"+item.Monto_Servicios_606+"|"+item.Monto_Bienes_606+"|"+item.Total_Monto_Factura_606+"|"+item.ITBIS_Factura_606+"|"
            +"0.00"+"|"+item.ITBIS_Proporcional_606+"|"+item.ITBIS_alcosto_606+"|"
            +item.ITBIS_Adelantar_606+"|"+item.ITBIS_Percibido_Compras_606+"|"+"0"+"|"
            +"0.00"+"|"+item.ISR_Percibido_606+"|"+item.Impuestos_Selectivo_606+"|"
            +item.Otro_Impuesto_606+"|"+item.Monto_Propina_606+"|"+item.Extraer_Tipo_Pago_606+"\n");
        

                }else{
                    contenidoDeArchivo.push(item.Rnc_Factura_606+"|"+item.Tipo_Id_Factura_606+"|"+item.Extraer_Tipo_Gasto_606+
            "|"+item.NCF_606+"|"+item.NCF_Modificado_606+"|"+item.Fecha_AnoMes_606+item.Fecha_Dia_606+"|"
            +item.Fecha_Ret_AnoMes_606+item.Fecha_Ret_Dia_606+"|"+item.Monto_Servicios_606+"|"
            +item.Monto_Bienes_606+"|"+item.Total_Monto_Factura_606+"|"+item.ITBIS_Factura_606+"|"
            +item.ITBIS_Retenido_606+"|"+item.ITBIS_Proporcional_606+"|"+item.ITBIS_alcosto_606+"|"
            +item.ITBIS_Adelantar_606+"|"+item.ITBIS_Percibido_Compras_606+"|"+item.Extrar_Tipo_Retencion_606+"|"
            +item.Monto_Retencion_Renta_606+"|"+item.ISR_Percibido_606+"|"+item.Impuestos_Selectivo_606+"|"
            +item.Otro_Impuesto_606+"|"+item.Monto_Propina_606+"|"+item.Extraer_Tipo_Pago_606+"\n");
        }



                }


            }/*si distinto de cp1*/

        
    }/*respuesta*/

    
    var contenido = contenidoDeArchivo.join("");
    var elem = document.getElementById('descargartxt606');
    elem.download = "DGII_F_606_"+nombre+".txt";
    elem.href = "data:application/octet-stream,"  + encodeURIComponent(contenido);
                     



            }
            })  

    
                        

    })

$(document).on("mouseup", "#descargartxt606", function(){ 
    
    var RncEmpresa606 = $("#RncEmpresa606Rango").val();
    var Periodoreporte606 = $("#Periodoreporte606").val();
    
    var datos = new FormData();
    datos.append("RncEmpresa606", RncEmpresa606);
    datos.append("Periodoreporte606", Periodoreporte606);
    
    

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

$(document).on("click", "#numeraciontxt606", function(){ 


    var RncEmpresa606Rango = $("#RncEmpresa606Rango").val();
    var Periodoreporte606 = $("#Periodoreporte606").val();

    var datos = new FormData();
    datos.append("RncEmpresa606Rango", RncEmpresa606Rango);
    datos.append("Periodoreporte606", Periodoreporte606);
    

    
    $.ajax({
        url:"ajax/606.ajax.php",
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

                if(item.Extraer_NCF_606 != 'CP1'){

                    var registro = registro+1;  
                }
            }
        

    var nombre = RncEmpresa606Rango+"_"+Periodoreporte606; // NOMBRE DEL ARCHIVO TXT


    var head = "606|"+RncEmpresa606Rango+"|"+Periodoreporte606+"|"+registro; // INCIO DE LA CABEZA DEL ARCHIVO

    var contenidoDeArchivo = [head+"\n"]; // IMPRECION DEL HEAD

// CICLO FOR PARA IMPRIMIR CONTENIDO DE 606
var lineas = 0;

    for(let item of respuesta){ 

        if(item.Extraer_NCF_606 != 'CP1'){  
            var lineas = lineas+1;

        
            contenidoDeArchivo.push(lineas+"__"+item.Rnc_Factura_606+"|"+item.Tipo_Id_Factura_606+"|"+item.Extraer_Tipo_Gasto_606+
            "|"+item.NCF_606+"|"+item.NCF_Modificado_606+"|"+item.Fecha_AnoMes_606+item.Fecha_Dia_606+"|"
            +item.Fecha_Ret_AnoMes_606+item.Fecha_Ret_Dia_606+"|"+item.Monto_Servicios_606+"|"
            +item.Monto_Bienes_606+"|"+item.Total_Monto_Factura_606+"|"+item.ITBIS_Factura_606+"|"
            +item.ITBIS_Retenido_606+"|"+item.ITBIS_Proporcional_606+"|"+item.ITBIS_alcosto_606+"|"
            +item.ITBIS_Adelantar_606+"|"+item.ITBIS_Percibido_Compras_606+"|"+item.Extrar_Tipo_Retencion_606+"|"
            +item.Monto_Retencion_Renta_606+"|"+item.ISR_Percibido_606+"|"+item.Impuestos_Selectivo_606+"|"
            +item.Otro_Impuesto_606+"|"+item.Monto_Propina_606+"|"+item.Extraer_Tipo_Pago_606+"\n");
        }
    
    }

    
    var contenido = contenidoDeArchivo.join("");
    var elem = document.getElementById('numeraciontxt606');
    elem.download = "Numeracion_De_Lineas"+nombre+".txt";
    elem.href = "data:application/octet-stream,"  + encodeURIComponent(contenido);
                     



            }
            })  

                
                        

    });
  

$(".Registro606").on("click", ".Retencion", function (){
   $(".FormularioRetencion").empty().append();

  var retencion = $('input[name="Retencion"]:checked').val();
    

       
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
$(".Registro606").on("click", "input.ITBISRetenido_Compras", function(){
    $(".alert").remove(); 

     var valor = $(event.target).val();
     var MontoITBIS_Retener = $("#MontoITBIS").val();
        
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

 });
       
 $(".Registro606").on("click", "input.ISR_RETENIDO_Compras", function(){
    $(".alert").remove(); 

        var valor = $(event.target).val();
        var Montototalservicio = $("#Montototalservicios").val();
        var Montototalbienes = $("#Montototalbienes").val();
        
        var MontoFacturadoRetener = Number(Montototalservicio) + Number(Montototalbienes);
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

        
           
 });
    


    

$(".tablareporte606").on("click", ".CartaRetenciones", function(){

    
var idcompra = $(this).attr("idcompra");
var RncEmpresaCompras = $(this).attr("RncEmpresaCompras");
var RncFactura606 = $(this).attr("RncFactura606");
var NCF_606 = $(this).attr("NCF_606");

window.open("extensiones/tcpdf/pdf/CartaRetenciones.php?idcompra="+idcompra+"&RncEmpresaCompras="+RncEmpresaCompras+"&RncFactura606="+RncFactura606+"&NCF_606="+NCF_606, "_blank");


    


});

$(document).on("click", ".btnLimpiar606", function(){

    var Limpiar606 ="SI" ;

    swal({
            title: '¿Esta usted Seguro de limpiar el Formulario del Registro del 606?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, limpiar el Formulario de Registro 606",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=registro-606&Limpiar606="+Limpiar606;
                    }
        });

    
})
/*VALIDAR NCF Y RNC NO SE REPITAN*/