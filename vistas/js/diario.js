
/**********************************
   DATATABLE DATATABLE DATATABLE
************************************/
$('.tabladiariogasto').DataTable({

  lengthMenu : [[25, 100, 150, 200, 250, 300, -1],[25, 100, 150, 200, 250, 300, "Todo"]],

   "aaSorting": [],
  "columnDefs": [ {
        "targets": 0,
        "orderable": false
        } ],

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

/**********************************
   DATATABLE DATATABLE DATATABLE
************************************/
$('.tabladiario606').DataTable({

 lengthMenu : [[25, 100, 150, 200, 250, 300, -1],[25, 100, 150, 200, 250, 300, "Todo"]],


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

$('.tabladiario607').DataTable({

 lengthMenu : [[25, 100, 150, 200, 250, 300, -1],[25, 100, 150, 200, 250, 300, "Todo"]],


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



$('.libromayor').DataTable({

 
  lengthMenu : [[25, 100, 150, 200, 250, 300, -1],[25, 100, 150, 200, 250, 300, "Todo"]],

    "aaSorting": [],
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
        nb_cols = 10;
        var j = 8;
        while(j < nb_cols){
          var pageTotal = api.column( j, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return Number(a) + Number(b);
                }, 0 );
          // Update footer
          if(j == 8){
            var debito = pageTotal;

          }
          if(j == 9){
            var credito = pageTotal;
          }
          var total = debito - credito;
         
          $( api.column( j ).footer() ).html(pageTotal.toLocaleString("en-US"));
         
          j++;
        }
        $( api.column( 10 ).footer() ).html(total.toLocaleString("en-US"));
          j++;
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
        var min = parseInt( $('#minlibromayor').val(), 10 );
        var max = parseInt( $('#maxlibromayor').val(), 10 );
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
        var min = parseInt( $('#mindialibromayor').val(), 10 );
        var max = parseInt( $('#maxdialibromayor').val(), 10 );
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
    var table = $('.libromayor').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minlibromayor, #maxlibromayor').keyup( function() {
        table.draw();
    } );
    $('#mindialibromayor, #maxdialibromayor').keyup( function() {
        table.draw();
    } );
   


 } );
$('.libromayorpro').DataTable({


  lengthMenu : [[25, 100, 150, 200, 250, 300, -1],[25, 100, 150, 200, 250, 300, "Todo"]],

    "aaSorting": [],
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
        nb_cols = 11;
        var j = 9;
        while(j < nb_cols){
          var pageTotal = api.column( j, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return Number(a) + Number(b);
                }, 0 );
          // Update footer
          if(j == 9){
            var debito = pageTotal;

          }
          if(j == 10){
            var credito = pageTotal;
          }
          var total = debito - credito;
         
          $( api.column( j ).footer() ).html(pageTotal.toLocaleString("en-US"));
         
          j++;
        }
        $( api.column( 11 ).footer() ).html(total.toLocaleString("en-US"));
          j++;
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
                'Proyecto',
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
        var min = parseInt( $('#minlibromayorpro').val(), 10 );
        var max = parseInt( $('#maxlibromayorpro').val(), 10 );
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
        var min = parseInt( $('#mindialibromayorpro').val(), 10 );
        var max = parseInt( $('#maxdialibromayorpro').val(), 10 );
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
    var table = $('.libromayorpro').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minlibromayorpro, #maxlibromayorpro').keyup( function() {
        table.draw();
    } );
    $('#mindialibromayorpro, #maxdialibromayorpro').keyup( function() {
        table.draw();
    } );
   


 } );
/********************************************************************************************************************/
/*LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO
/********************************************************************************************************************/
var numProyecto = 0;

$(document).on("click", ".agregarCuenta", function (){
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
       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "0" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "0" placeholder="Credito" required>'+ 
                        
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
              sumardebito();
              sumarcredito();
            // AGRUPAR productos JSON

              listarCuentas();

        } 

    });
 
  }/* cierre if de proyecto*/  
  else {

       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-leftt:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "0" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "0" placeholder="Credito" required>'+ 
                        '<input type="hidden" class="form-control proyecto" id="proyecto'+numProyecto+'" idProyecto name="proyecto" value="0">'+
                      '</div>'+
                      '</div>'+
                 

                    '</div>');
             

            
                  //SUMAR PRODUCTOS
                  sumardebito();
                  sumarcredito();
                  
                  // AGRUPAR productos JSON

                  listarCuentas();


  } /*cierre else de proyecto*/ 
       
      
});



/* clikc forma de pago en ingresos*/
$(".IngresoCuenta").on("change", "input[name=Otros_Impuestos_607]", function (){
  numProyecto ++;
  
  var ITBIS_Facturado_607 = $("#ITBIS_Facturado_607").val();
  
if(ITBIS_Facturado_607 > 0){

  var grupo = 2;
  var categoria = 4; 
  var generica = "01";
  var cuenta = "001";
  var nombrecuenta = "ITBIS en ventas por pagar";

   
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
       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "0" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "'+ITBIS_Facturado_607+'" placeholder="Credito" required>'+ 
                        
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
              sumardebito();
              sumarcredito();
            // AGRUPAR productos JSON

              listarCuentas();

        } 

    });
 
  }/* cierre if de proyecto*/  
  else {

       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-leftt:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "0" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "'+ITBIS_Facturado_607+'" placeholder="Credito" required>'+ 
                        '<input type="hidden" class="form-control proyecto" id="proyecto'+numProyecto+'" idProyecto name="proyecto" value="0">'+
                      '</div>'+
                      '</div>'+
                 

                    '</div>');
             

            
                  //SUMAR PRODUCTOS
                  sumardebito();
                  sumarcredito();
                  
                  // AGRUPAR productos JSON

                  listarCuentas();


  } /*cierre else de proyecto*/ 
      



   }/*if de ITBIS DE FACTURA*/
         
         
  
});
/*******************************************************************************************/
$(".formularioCuenta").on("change", "input[name=Propinalegal]", function (){
  numProyecto ++;
  
  var MontoITBIS = $("#MontoITBIS").val();
  
if(MontoITBIS > 0){

  var grupo = 1;
  var categoria = 3; 
  var generica = "01";
  var cuenta = "001";
  var nombrecuenta = "ITBIS pagados en compras";

   
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
       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "'+MontoITBIS+'" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "0" placeholder="Credito" required>'+ 
                        
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
              sumardebito();
              sumarcredito();
            // AGRUPAR productos JSON

              listarCuentas();

        } 

    });
 
  }/* cierre if de proyecto*/  
  else {

       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-leftt:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "'+MontoITBIS+'" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "0" placeholder="Credito" required>'+ 
                        '<input type="hidden" class="form-control proyecto" id="proyecto'+numProyecto+'" idProyecto name="proyecto" value="0">'+
                      '</div>'+
                      '</div>'+
                 

                    '</div>');
             

            
                  //SUMAR PRODUCTOS
                  sumardebito();
                  sumarcredito();
                  
                  // AGRUPAR productos JSON

                  listarCuentas();


  } /*cierre else de proyecto*/ 
      


         
         
  

}     
      
});
$(document).on("change", "#agregarBanco", function (){
  numProyecto ++;

  var idBanco = $(this).val();


  var datos = new FormData();
  datos.append("idBanco", idBanco);
  
  $.ajax({
    url: "ajax/banco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
  
  var grupo = respuesta["id_grupo"];
  var categoria = respuesta["id_categoria"]; 
  var generica = respuesta["id_generica"];
  var cuenta = respuesta["id_cuenta"];
  var nombrecuenta = respuesta["Nombre_CuentaContable"];


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
       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "0" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "0" placeholder="Credito" required>'+ 
                        
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
              sumardebito();
              sumarcredito();
            // AGRUPAR productos JSON

              listarCuentas();

        } 

    });
 
  }/* cierre if de proyecto*/  
  else {

       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-leftt:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "0" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "0" placeholder="Credito" required>'+ 
                        '<input type="hidden" class="form-control proyecto" id="proyecto'+numProyecto+'" idProyecto name="proyecto" value="0">'+
                      '</div>'+
                      '</div>'+
                 

                    '</div>');
             

            
                  //SUMAR PRODUCTOS
                  sumardebito();
                  sumarcredito();
                  
                  // AGRUPAR productos JSON

                  listarCuentas();


  } /*cierre else de proyecto*/ 
      
         
         
 
   }/*respuesta banco*/
     
  })/*cierre ajax banco*/
      
});
$(document).on("change", "#Editar-agregarBanco", function (){
  numProyecto ++;

  var idBanco = $(this).val();


  var datos = new FormData();
  datos.append("idBanco", idBanco);
  
  $.ajax({
    url: "ajax/banco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){ 
  
  var grupo = respuesta["id_grupo"];
  var categoria = respuesta["id_categoria"]; 
  var generica = respuesta["id_generica"];
  var cuenta = respuesta["id_cuenta"];
  var nombrecuenta = respuesta["Nombre_CuentaContable"];


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
       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "0" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "0" placeholder="Credito" required>'+ 
                        
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
              sumardebito();
              sumarcredito();
            // AGRUPAR productos JSON

              listarCuentas();

        } 

    });
 
  }/* cierre if de proyecto*/  
  else {

       $(".nuevaCuenta").append(
            '<div class="row" style="padding:5px 15px">'+
                  '<div class="col-xs-2" style="padding-right:0px">'+
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
                      
                      '<div class="col-xs-2" style="padding-leftt:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito"  name="debito" value = "0" placeholder="Debito" required>'+ 
                        
                      '</div>'+
                      '</div>'+
                      '<div class="col-xs-2" style="padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" name="credito" value = "0" placeholder="Credito" required>'+ 
                        '<input type="hidden" class="form-control proyecto" id="proyecto'+numProyecto+'" idProyecto name="proyecto" value="0">'+
                      '</div>'+
                      '</div>'+
                 

                    '</div>');
             

            
                  //SUMAR PRODUCTOS
                  sumardebito();
                  sumarcredito();
                  
                  // AGRUPAR productos JSON

                  listarCuentas();


  } /*cierre else de proyecto*/ 
      
         
         
 
   }/*respuesta banco*/
     
  })/*cierre ajax banco*/
      
});

/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarCuenta = [];

localStorage.removeItem("quitarcuenta");


                   
                    
$(".formularioCuenta").on("click", "button.quitarcuenta", function (){

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
        $("#totaldebitovi").val(0);
        $("#totaldebito").val(0);
        $("#totalcreditovi").val(0);
        $("#totalcredito").val(0);


  }

//SUMAR PRODUCTOS
                  sumardebito();
                  sumarcredito();
             // AGRUPAR productos JSON

                  listarCuentas();
  

});

$(".IngresoCuenta").on("click", "button.quitarcuenta", function (){

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
        $("#totaldebitovi").val(0);
        $("#totaldebito").val(0);
        $("#totalcreditovi").val(0);
        $("#totalcredito").val(0);


  }

//SUMAR PRODUCTOS
                  sumardebito();
                  sumarcredito();
             // AGRUPAR productos JSON

                  listarCuentas();
  
});



function listarCuentas(){

  var listaCuentas = [];

  var idgrupo = $(".idgrupo");

  var idcategoria = $(".idcategoria");

  var idgenerica = $(".idgenerica");

  var idcuenta = $(".idcuenta");

  var nombrecuenta = $(".nombrecuenta");

  var debito = $(".debito");

  var credito = $(".credito");

  var proyecto = $(".proyecto")


  for(var i = 0; i < idgrupo.length; i++){

    listaCuentas.push({ "id" : $(idcuenta[i]).attr("idcuenta"), 
                "idgrupo" : $(idgrupo[i]).val(),
                "idcategoria" : $(idcategoria[i]).val(),
                "idgenerica" : $(idgenerica[i]).val(),
                "idcuenta" : $(idcuenta[i]).val(),
                "nombrecuenta" : $(nombrecuenta[i]).val(),
                "debito" : $(debito[i]).val(),
                "credito" : $(credito[i]).val(),
                "proyecto" : $(proyecto[i]).val()})


  }

  $("#listaCuentas").val(JSON.stringify(listaCuentas)); 

}


/***********************************
SUMAR DEBITOS

************************************/
function sumardebito(){

  var debitoItem = $(".debito");
  var arraySumaDebito = [];

  if(debitoItem.length > 0){ 


  for (var i = 0; i < debitoItem.length; i++){

    arraySumaDebito.push(Number($(debitoItem[i]).val()));


  }

  function sumaArrayDebitos(total, numero){

    return total + numero;


  }
   var sumarDebitos = arraySumaDebito.reduce(sumaArrayDebitos);
  let t = sumarDebitos.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var sumarTotalDebitos = t.match(regex)[0];


}/*cierre de if*/

 
  // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

 
  $("#totaldebitovi").val(sumarTotalDebitos);
  $("#totaldebitovi").number(true, 2);
      

  $("#totaldebito").val(sumarTotalDebitos);
  // PONER FORMATO AL PRECIO DE LOS PRODUCTOS

  listarCuentas();


}
/***********************************
SUMAR CREDTIOS

************************************/
function sumarcredito(){

  var creditoItem = $(".credito");
  var arraySumaCredito = [];

  if(creditoItem.length > 0){ 

  for (var i = 0; i < creditoItem.length; i++){

    arraySumaCredito.push(Number($(creditoItem[i]).val()));



  }

  function sumaArrayCredito(total, numero){

    return total + numero;


  }
  var sumarCredito = arraySumaCredito.reduce(sumaArrayCredito);

  let t = sumarCredito.toFixed(5);
  let regex=/(\d*.\d{0,2})/;
  var sumarTotalCredito  = t.match(regex)[0];

  
  }/*cierre if*/
 

  $("#totalcreditovi").val(sumarTotalCredito);
  $("#totalcreditovi").number(true, 2);
  
  $("#totalcredito").val(sumarTotalCredito);
  
 listarCuentas();

}
/***********************************
  MODIFICAR CANTIDAD DE PRODUCTO
************************************/

$(".formularioCuenta").mousemove(function(){
  // SUMAR PRODUCTOS
sumardebito();
sumarcredito();
   
// AGRUPAR productos JSON

listarCuentas();

});
$(".formularioCuenta").on("keyup", ".debito", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  

  
    
// SUMAR PRODUCTOS
sumardebito();
sumarcredito();
   
// AGRUPAR productos JSON

listarCuentas();

      

});
/***********************************
  MODIFICAR CANTIDAD DE PRODUCTO
************************************/

$(".formularioCuenta").on("keyup", ".credito", function(){
  
this.value = this.value.replace(/[^0-9.]/g,'');




// SUMAR PRODUCTOS
sumardebito();
sumarcredito();
   
// AGRUPAR productos JSON

listarCuentas();

      

});

$(".formularioCuenta").on("click", ".proyecto", function(){
  

// SUMAR PRODUCTOS
sumardebito();
sumarcredito();
   
// AGRUPAR productos JSON

listarCuentas();

      

});



/***********************************
  MODIFICAR CANTIDAD DE PRODUCTO
************************************/
$(".IngresoCuenta").mousemove(function(){
  // SUMAR PRODUCTOS
sumardebito();
sumarcredito();
   
// AGRUPAR productos JSON

listarCuentas();

}) ;

$(".IngresoCuenta").on("keyup", ".debito", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
  
    
// SUMAR PRODUCTOS
sumardebito();
sumarcredito();
   
// AGRUPAR productos JSON

listarCuentas();

      

});
/***********************************
  MODIFICAR CANTIDAD DE PRODUCTO
************************************/
$(".IngresoCuenta").on("keyup", ".credito", function(){
  
this.value = this.value.replace(/[^0-9.]/g,'');

// SUMAR PRODUCTOS
sumardebito();
sumarcredito();
   
// AGRUPAR productos JSON

listarCuentas();

      

});

$(".IngresoCuenta").on("click", ".proyecto", function(){
  

// SUMAR PRODUCTOS
sumardebito();
sumarcredito();
   
// AGRUPAR productos JSON

listarCuentas();

      

});



$(document).on("click", ".btnEditarGastoDiario", function(){

  var id_606 = $(this).attr("id_606");
  var Extraer = $(this).attr("Extraer");


  window.location = "index.php?ruta=Editar-gastodiario&id_606="+id_606+"&Extraer="+Extraer; 


})
$(document).on("click", ".btnCopiarGastoDiario", function(){

  var id_606 = $(this).attr("id_606");
  var Extraer = $(this).attr("Extraer");


  window.location = "index.php?ruta=Copiar-gastodiario&id_606="+id_606+"&Extraer="+Extraer; 


})
$(document).on("click", ".btnEditarIngresoDiario", function(){

  var id_607 = $(this).attr("id_607");
  var Extraer = $(this).attr("Extraer");


  window.location = "index.php?ruta=Editar-ingresodiario&id_607="+id_607+"&Extraer="+Extraer; 


})
$(document).on("click", ".btnCopiarIngresoDiario", function(){

  var id_607 = $(this).attr("id_607");
  var Extraer = $(this).attr("Extraer");


  window.location = "index.php?ruta=Copiar-ingresodiario&id_607="+id_607+"&Extraer="+Extraer; 


})
$(document).on("click", ".btnEditarAjusteDiario", function(){

  var id_Ajuste = $(this).attr("id_Ajuste");
  var Extraer = $(this).attr("Extraer");
  var NCF = $(this).attr("NCF");
  var Rnc_Factura = $(this).attr("Rnc_Factura");



  window.location = "index.php?ruta=Editar-ajustediario&id_Ajuste="+id_Ajuste+"&Extraer="+Extraer+"&NCF="+NCF+"&Rnc_Factura="+Rnc_Factura; 


})
$(document).on("click", ".btnCopiarAjusteDiario", function(){

  var id_Ajuste = $(this).attr("id_Ajuste");
  var Extraer = $(this).attr("Extraer");
  var NCF = $(this).attr("NCF");
  var Rnc_Factura = $(this).attr("Rnc_Factura");



  window.location = "index.php?ruta=Copiar-ajustediario&id_Ajuste="+id_Ajuste+"&Extraer="+Extraer+"&NCF="+NCF+"&Rnc_Factura="+Rnc_Factura; 


})
$(document).on("click", ".btnAsignarIngresoDiario", function(){

  var id_607 = $(this).attr("id_607");

  window.location = "index.php?ruta=Asignar-ingresodiario&id_607="+id_607; 


})

$(document).on("click", ".btnAsignarGastoDiario", function(){

  var id_606 = $(this).attr("id_606");

  window.location = "index.php?ruta=Asignar-gastodiario&id_606="+id_606; 

})

$(document).on("click", ".btnEliminarGastosLD", function(){

  var id_606 = $(this).attr("id_606");
  var Rnc_Empresa_LD = $(this).attr("Rnc_Empresa_LD");
  var Extraer = $(this).attr("Extraer");
  var Rnc_Factura_606 = $(this).attr("Rnc_Factura_606");
  var NCF_606 = $(this).attr("NCF_606");
  var Proyecto = $("#Proyecto").val();
  
  swal({
      title: '¿Esta usted Seguro de Borrar Todos los Asientes que corresponde a la factura?',
      text: '¡Si no lo esta puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelmButtonText: "Cancelar",
      confirmButtonText: "Si, borrar Diario de Gasto",
      }).then(function(result){

    if(result.value){
      if(Proyecto == "1"){
window.location = "index.php?ruta=libromayorpro&id_606="+id_606+"&Rnc_Empresa_LD="+Rnc_Empresa_LD+"&Extraer="+Extraer+"&Rnc_Factura_606="+Rnc_Factura_606+"&NCF_606="+NCF_606+"&Proyecto="+Proyecto;

      }else{ 
window.location = "index.php?ruta=libromayor&id_606="+id_606+"&Rnc_Empresa_LD="+Rnc_Empresa_LD+"&Extraer="+Extraer+"&Rnc_Factura_606="+Rnc_Factura_606+"&NCF_606="+NCF_606+"&Proyecto="+Proyecto;
          }}
    });

  
})

$(document).on("click", ".btnEliminarIngresoLD", function(){

  var id_607 = $(this).attr("id_607");
  var Rnc_Empresa_LD = $(this).attr("Rnc_Empresa_LD");
  var Extraer = $(this).attr("Extraer");
  var Rnc_Factura_607 = $(this).attr("Rnc_Factura_607");
  var NCF_607 = $(this).attr("NCF_607");
  var Proyecto = $("#Proyecto").val();
  
  swal({
      title: '¿Esta usted Seguro de Borrar Todos los Asientes que corresponde a la factura?',
      text: '¡Si no lo esta puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelmButtonText: "Cancelar",
      confirmButtonText: "Si, borrar Diario de Ingreso",
      }).then(function(result){

    if(result.value){
      if(Proyecto == "1"){ 
window.location = "index.php?ruta=libromayorpro&id_607="+id_607+"&Rnc_Empresa_LD="+Rnc_Empresa_LD+"&Extraer="+Extraer+"&Rnc_Factura_607="+Rnc_Factura_607+"&NCF_607="+NCF_607+"&Proyecto="+Proyecto;

      }else{
window.location = "index.php?ruta=libromayor&id_607="+id_607+"&Rnc_Empresa_LD="+Rnc_Empresa_LD+"&Extraer="+Extraer+"&Rnc_Factura_607="+Rnc_Factura_607+"&NCF_607="+NCF_607+"&Proyecto="+Proyecto;

      }
          }
    });

  
})

$(document).on("click", ".btnEliminarAjusteLD", function(){

  var id_Ajuste = $(this).attr("id_Ajuste");
  var Rnc_Empresa_LD = $(this).attr("Rnc_Empresa_LD");
  var Extraer = $(this).attr("Extraer");
  var Rnc_Factura_Ajuste = $(this).attr("Rnc_Factura_Ajuste");
  var NCF_Ajuste = $(this).attr("NCF_Ajuste");
  var Proyecto = $("#Proyecto").val();
  
  swal({
      title: '¿Esta usted Seguro de Borrar Todos los Asientes que corresponde a la factura?',
      text: '¡Si no lo esta puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelmButtonText: "Cancelar",
      confirmButtonText: "Si, borrar Diario de Ajuste",
      }).then(function(result){

    if(result.value){
      if(Proyecto == "1") { 
window.location = "index.php?ruta=libromayorpro&id_Ajuste="+id_Ajuste+"&Rnc_Empresa_LD="+Rnc_Empresa_LD+"&Extraer="+Extraer+"&Rnc_Factura_Ajuste="+Rnc_Factura_Ajuste+"&NCF_Ajuste="+NCF_Ajuste+"&Proyecto="+Proyecto;

      }else{
window.location = "index.php?ruta=libromayor&id_Ajuste="+id_Ajuste+"&Rnc_Empresa_LD="+Rnc_Empresa_LD+"&Extraer="+Extraer+"&Rnc_Factura_Ajuste="+Rnc_Factura_Ajuste+"&NCF_Ajuste="+NCF_Ajuste+"&Proyecto="+Proyecto;

      }
          }
    });

  
})


$(document).on("click", ".btnEstadoResultado", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  var Nivel =  $('input[name="Nivel"]:checked').val();



  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else{

  window.location = "index.php?ruta=EstadoResultado&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&Nivel="+Nivel;


}


  
})
$(document).on("click", ".btnimpEstadoResultado", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  


  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else{

  window.location = "index.php?ruta=impEstadoResultado&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta;



}


  
})
$(document).on("click", ".btnPDFEstadoResultado", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  var RncEmpresa = $("#RncEmpresa").val();
  


  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else{
   swal({
      title: '¿Desea que El Estado de Resultado Tenga Su Identidad Corporativa?',
      text: '¡Si desea que tenga la información presiona Boton Si, Con Informacion',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "No",
      confirmButtonText: "Si, Con Información",
      }).then(function(result){

    if(result.value){
       window.open("extensiones/tcpdf/pdf/EstadoResultado.php?FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&RncEmpresa="+RncEmpresa, "_blank");


    }else {
       window.open("extensiones/tcpdf/pdf/EstadoResultadoNo.php?FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&RncEmpresa="+RncEmpresa, "_blank");

    
    }
    });
 
 }

  
})
$(document).on("click", ".btnEstadoSituacion", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  var Nivel =  $('input[name="Nivel"]:checked').val();



  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else{
  window.location = "index.php?ruta=EstadoSituacion&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&Nivel="+Nivel;



}


  
})

$(document).on("click", ".btnimpEstadoSituacion", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  
  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else{
  window.location = "index.php?ruta=impEstadoSituacion&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta;



}
})


$(document).on("click", ".btnPDFEstadoSituacion", function(){

 
  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  var RncEmpresa = $("#RncEmpresa").val();
  


  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else{

  swal({
      title: '¿Desea que El Estado de Resultado Tenga Su Identidad Corporativa?',
      text: '¡Si desea que tenga la información presiona Boton Si, Con Informacion',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "No",
      confirmButtonText: "Si, Con Información",
      }).then(function(result){

    if(result.value){
     window.open("extensiones/tcpdf/pdf/EstadoSituacion.php?FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&RncEmpresa="+RncEmpresa, "_blank");


    }else {
     window.open("extensiones/tcpdf/pdf/EstadoSituacionNo.php?FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&RncEmpresa="+RncEmpresa, "_blank");

    
    }
    });
 
 

}

  
})
$(document).on("click", ".btnPDFProyectoResumen", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  var RncEmpresa = $("#RncEmpresa").val();
  var codproyecto = $("#Codproyecto").val();
  


  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡digite una fecha válida!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else if(codproyecto == ""){
    swal({
      type: "error",
      title: "¡Error Debe Seleccionar un Proyecto valido!",
      text: "¡Seleccione un proyecto!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else{
 window.open("extensiones/tcpdf/pdf/EstadoResultadoProyecto.php?FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&RncEmpresa="+RncEmpresa+"&codproyecto="+codproyecto, "_blank");
}

  
})

$(document).on("click", ".btnBalanceComprobacion", function(){

  var FechaDesde = $("#FechaDesde").val();
  var FechaHasta = $("#FechaHasta").val();
  var Nivel =  $('input[name="Nivel"]:checked').val();



  if(FechaDesde == "" ){
     swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      confirmButtonText: "¡Cerrar!"
          
    });

  } else if(FechaHasta == ""){
    swal({
      type: "error",
      title: "¡Error Debe Colocar una Fecha Desde y una Fecha Hasta Válida!",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      confirmButtonText: "¡Cerrar!"
          
    });

} else{
  window.location = "index.php?ruta=BalanceComprobacion&FechaDesde="+FechaDesde+"&FechaHasta="+FechaHasta+"&Nivel="+Nivel;



}


  
})
/************************************************************************************************/
$(".IngresoCuenta").on("click", "input[name=Forma_De_Pago_607]", function (){
  $(".banco").empty().append();
  
var RncEmpresaTrans = $("#RncEmpresa606").val();
var formadepago = $(this).val();
var FechaFacturames607 = $("#FechaFacturames_607").val();
var FechaFacturadia607 = $("#FechaFacturadia_607").val();

if(FechaFacturames607 != "" && FechaFacturadia607 != ""){ 
if(formadepago != "04"){ 
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

      $(".banco").append(
      '<div class="form-group">'+
        '<div class="input-group form-control">'+ 
                           
         '<label>BANCO</label><br>'+

        '<label class="col-xs-4">Fecha de Pago</label>'+
        '<label class="col-xs-4">Referencia</label>'+
        '<label class="col-xs-4">Agregar Banco</label>'+
        '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes607" name="FechaPagomes607" placeholder="Año/Mes" value="'+FechaFacturames607+'" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia607" name="FechaPagodia607" placeholder="Día" value="'+FechaFacturadia607+'" required><br>'+
        
        '<input type="text" class="col-xs-3" maxlength="6" id="Referencia_607" name="Referencia_607" placeholder="Referencia del Pago" value="" required>'+
        
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

        $("#agregarBanco").append(
        '<option value="'+item.id+'">'+item.Nombre_Cuenta+'</option>'

                        );


                      
       
            } 
    
      }/*cierre respuesta*/
      

      });/*cierre ajax*/

}/*cierre si de forma de pago*/
  else{
    $(".banco").append(
      '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes607" name="FechaPagomes607" value="'+FechaFacturames607+'" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia607" name="FechaPagodia607" value="'+FechaFacturadia607+'" required readonly><br>'+
        '<input type="hidden" class="col-xs-3" maxlength="6" id="Referencia_607" name="Referencia_607" placeholder="Referencia del Pago" value="NO APLICA">'+
        '<input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="0" required>'
        );



  }/*else de si de forma de pago*/

} else {
  swal({
      type: "error",
      title: "¡Debe colocar una fecha de factura Valida!",
      text: "¡El campo de Fecha de la Factura esta en blanco!",
      confirmButtonText: "¡Cerrar!"
          
    });
  $(this).prop('checked', false);



}

  
});

$(document).on("change", "input[name=FechaFacturames_607]", function (){
  var FechaFacturames_607 = $(this).val();

  $("#FechaPagomes607").val(FechaFacturames_607);

});
$(document).on("change", "input[name=FechaFacturadia_607]", function (){
  var FechaFacturadia_607 = $(this).val();

  $("#FechaPagodia607").val(FechaFacturadia_607);

});

/********************************EDITAR INGRESOS****************************************/
$(".IngresoCuenta").on("click", "input[name=Editar-Forma_De_Pago_607]", function (){
  $(".editarbanco").empty().append();
  
var RncEmpresaTrans = $("#RncEmpresa606").val();
var formadepago = $(this).val();
var FechaFacturames607 = $("#Editar-FechaFacturames_607").val();
var FechaFacturadia607 = $("#Editar-FechaFacturadia_607").val();

if(FechaFacturames607 != "" && FechaFacturadia607 != ""){ 
if(formadepago != "04"){ 
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

      $(".editarbanco").append(
      '<div class="form-group">'+
        '<div class="input-group form-control">'+ 
                           
         '<label>BANCO</label><br>'+

        '<label class="col-xs-4">Fecha de Pago</label>'+
        '<label class="col-xs-4">Referencia</label>'+
        '<label class="col-xs-4">Agregar Banco</label>'+
        '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="Editar-FechaPagomes607" name="Editar-FechaPagomes607" placeholder="Año/Mes" value="'+FechaFacturames607+'" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_Dia" id="Editar-FechaPagodia607" name="Editar-FechaPagodia607" placeholder="Día" value="'+FechaFacturadia607+'" required><br>'+
        
        '<input type="text" class="col-xs-3" maxlength="6" id="Editar-Referencia" name="Editar-Referencia" placeholder="Referencia del Pago" value="" required>'+
        
        '<div class="col-xs-5">'+
        '<select type="text" class="form-control col-xs-12" id="Editar-agregarBanco" name="Editar-agregarBanco" required>'+
        '<option value="">Seleccionar Banco</option>'+
        '</select>'+
         '</div>'+
        '</div>'+
                            
      '</div>' 
                            

        );
       respuesta.forEach(funcionForEach);

      function funcionForEach(item, index){

        $("#Editar-agregarBanco").append(
        '<option value="'+item.id+'">'+item.Nombre_Cuenta+'</option>'

                        );


                      
       
            } 
    
      }/*cierre respuesta*/
      

      });/*cierre ajax*/

}/*cierre si de forma de pago*/
  else{
    $(".editarbanco").append(
      '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="Editar-FechaPagomes607" name="Editar-FechaPagomes607" value="'+FechaFacturames607+'" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="Editar-FechaPagodia607" name="Editar-FechaPagodia607" value="'+FechaFacturadia607+'" required readonly><br>'+
        '<input type="hidden" class="col-xs-3" maxlength="6" id="Editar-Referencia_607" name="Editar-Referencia_607" placeholder="Referencia del Pago" value="NO APLICA">'+
        '<input type="hidden" class="form-control col-xs-12" id="Editar-agregarBanco" name="Editar-agregarBanco" value="" required>'
        );



  }/*else de si de forma de pago*/

} else {
  swal({
      type: "error",
      title: "¡Debe colocar una fecha de factura Valida!",
      text: "¡El campo de Fecha de la Factura esta en blanco!",
      confirmButtonText: "¡Cerrar!"
          
    });
  $(this).prop('checked', false);



}

  
});

$(document).on("change", "input[name=Editar-FechaFacturames_607]", function (){
  var FechaFacturames_607 = $(this).val();

  $("#Editar-FechaPagomes607").val(FechaFacturames_607);

});
$(document).on("change", "input[name=Editar-FechaFacturadia_607]", function (){
  var FechaFacturadia_607 = $(this).val();

  $("#Editar-FechaPagodia607").val(FechaFacturadia_607);

});



/****************************GASTOS DIARIO*****************************************************/
/************************************************************************************************/
$(".formularioCuenta").on("click", "input[name=Forma_De_Pago_606]", function (){
  $(".banco606").empty().append();
  
var RncEmpresaTrans = $("#RncEmpresa606").val();
var formadepago = $(this).val();
var FechaFacturames606 = $("#FechaFacturames_606").val();
var FechaFacturadia606 = $("#FechaFacturadia_606").val();


if(FechaFacturames606 != "" && FechaFacturadia606 != ""){ 


if(formadepago != "04"){ 

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

    $("#agregarBanco").append('<option value="'+item.id+'">'+item.Nombre_Cuenta+'</option>');


    } 


      

      }/*cierre respuesta*/


   });/*cierre ajax*/

   }/*cierre if forma de pago*/
   else{

    $(".banco606").append(
      '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes606" name="FechaPagomes606" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" value="'+FechaFacturadia606+'" required><br>'+
        '<input type="hidden" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="NO APLICA">'+
        '<input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="" required>'
        );




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

$(document).on("change", "input[name=FechaFacturames_606]", function (){
  var FechaFacturames_606 = $(this).val();

  $("#FechaPagomes606").val(FechaFacturames_606);

});
$(document).on("change", "input[name=FechaFacturadia_606]", function (){
  var FechaFacturadia_606 = $(this).val();

  $("#FechaPagodia606").val(FechaFacturadia_606);

});

/*********************************************EDITAR GASTO*/

$(".formularioCuenta").on("click", "input[name=Editar-Forma_De_Pago_606]", function (){
  $(".editarbanco606").empty().append();
  
var RncEmpresaTrans = $("#RncEmpresa606").val();
var formadepago = $(this).val();
var FechaFacturames606 = $("#Editar-FechaFacturames_606").val();
var FechaFacturadia606 = $("#Editar-FechaFacturadia_606").val();



if(FechaFacturames606 != "" && FechaFacturadia606 != ""){ 
if(formadepago != "04"){ 
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

      $(".editarbanco606").append(
      '<div class="form-group">'+
        '<div class="input-group form-control">'+ 
                           
         '<label>BANCO</label><br>'+

        '<label class="col-xs-4">Fecha de Pago</label>'+
        '<label class="col-xs-4">Referencia</label>'+
        '<label class="col-xs-4">Agregar Banco</label>'+
        '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="Editar-FechaPagomes606" name="Editar-FechaPagomes606" placeholder="Año/Mes" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="text" class="col-xs-2 Fecha_Trans_Dia" id="Editar-FechaPagodia606" name="Editar-FechaPagodia606" placeholder="Día" value="'+FechaFacturadia606+'" required><br>'+
        
        '<input type="text" class="col-xs-3" maxlength="6" id="Editar-Referencia" name="Editar-Referencia" placeholder="Referencia del Pago" value="" required>'+
        
        '<div class="col-xs-5">'+
        '<select type="text" class="form-control col-xs-12" id="Editar-agregarBanco" name="Editar-agregarBanco" required>'+
        '<option value="">Seleccionar Banco</option>'+
        '</select>'+
         '</div>'+
        '</div>'+
                            
      '</div>' 
                            

        );
       respuesta.forEach(funcionForEach);

      function funcionForEach(item, index){

        $("#Editar-agregarBanco").append(
        '<option value="'+item.id+'">'+item.Nombre_Cuenta+'</option>'

                        );


                      
       
            } 
    
      }/*cierre respuesta*/
      

      });/*cierre ajax*/

}/*cierre si de forma de pago*/
  else{
    $(".editarbanco606").append(
      '<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="Editar-FechaPagomes606" name="Editar-FechaPagomes606" value="'+FechaFacturames606+'" required readonly>'+
        '<input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="Editar-FechaPagodia606" name="Editar-FechaPagodia606" value="'+FechaFacturadia606+'" required readonly><br>'+
        '<input type="hidden" class="col-xs-3" maxlength="6" id="Editar-Referencia" name="Editar-Referencia" placeholder="Referencia del Pago" value="NO APLICA">'+
        '<input type="hidden" class="form-control col-xs-12" id="Editar-agregarBanco" name="Editar-agregarBanco" value="" required>'
        );



  }/*else de si de forma de pago*/

} else {
  swal({
      type: "error",
      title: "¡Debe colocar una fecha de factura Valida!",
      text: "¡El campo de Fecha de la Factura esta en blanco!",
      confirmButtonText: "¡Cerrar!"
          
    });
  $(this).prop('checked', false);



}

  
});

$(document).on("change", "input[name=Editar-FechaFacturames_606]", function (){
  var FechaFacturames_606 = $(this).val();

  $("#Editar-FechaPagomes606").val(FechaFacturames_606);

});
$(document).on("change", "input[name=Editar-FechaFacturadia_606]", function (){
  var FechaFacturadia_607 = $(this).val();

  $("#Editar-FechaPagodia606").val(FechaFacturadia_606);

});
$("input[name=Rnc_Factura]").on('keyup', function (){ 
   this.value = this.value.replace(/[^0-9]/g,'');
    $("#Nombre_Empresa").val("");

 });

/*********************************
VALIDACION DE USUARIO NO SE REPITA
**********************************/

$("#Rnc_Factura").change(function(){
  
  $("#Nombre_Empresa").val("");
        
  var RncSuplidor = $(this).val();
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

      
        $("#Nombre_Empresa").val(respuesta["Nombre_Suplidor"]);
        

      }else{
        var RncCliente = RncSuplidor;
        
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
              $("#Nombre_Empresa").val(respuesta["Nombre_Empresa_DGII"]);



            }


    
      }


      });
      }
     }
  });
});



$(document).on("click", ".btnVerdetalleDiario", function(){
    $(".Contabilidadrecibopago").empty().append();

var Nombre = $(this).attr("Nombre");
var fechaañomes = $(this).attr("fechaañomes");
var fechadia = $(this).attr("fechadia");
var observaciones = $(this).attr("observaciones");
var Rnc_Empresa_LD1 = $(this).attr("Rnc_Empresa_LD");
var Rnc_Factura1 = $(this).attr("Rnc_Factura");
var NCF = $(this).attr("NCF");
var NAsiento1 = $(this).attr("NAsiento");
    
$("#Nombre_Empresa").val(Nombre);
$("#Rnc_Factura").val(Rnc_Factura1);
$("#NAsiento").val(NAsiento1);

$("#FechaAnoMes").val(fechaañomes);
$("#FechaDia").val(fechadia);
$("#Descripcion").val(observaciones);

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
 
 }/*cierre respuesta*/


 }); /*cierre ajax librodiario*/




});

$(document).on("click", ".btnVerdetalleDiarioModulos", function(){
    $(".Contabilidadrecibopago").empty().append();

var Nombre = $(this).attr("Nombre");
var fechaañomes = $(this).attr("fechaañomes");
var fechadia = $(this).attr("fechadia");
var observaciones = $(this).attr("observaciones");
var Rnc_Empresa_LD = $(this).attr("Rnc_Empresa_LD");
var Rnc_Factura = $(this).attr("Rnc_Factura");
var NCF = $(this).attr("NCF");
var NAsiento = $(this).attr("NAsiento");
    
$("#Nombre_Empresa").val(Nombre);
$("#Rnc_Factura").val(Rnc_Factura);
$("#NAsiento").val(NAsiento);

$("#FechaAnoMes").val(fechaañomes);
$("#FechaDia").val(fechadia);
$("#Descripcion").val(observaciones);

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
 
 }/*cierre respuesta*/


 }); /*cierre ajax librodiario*/




});