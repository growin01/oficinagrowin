

/**********************************
   DATATABLE DATATABLE DATATABLE
************************************/
$('.tablaplandecuenta').DataTable({

  lengthMenu : [300, 350, 400, -1],
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
                                    content: ['Grupo',
                                    'Categoria',
                                    'Genérica',
                                    'Cuenta',
                                    'Nombre de Cuenta',
                                    ''],
                                    pushRow: true

                                },

                            ],

            },
                {extend:'csv',text:'CSV'},
                
            ]
 });
$('.tablaContabilidad607').DataTable({
  lengthMenu : [25, 100, 150, 200, 250, 300, -1],

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
        var j = 6;
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
                'RNC o Cédula',
                'Nombre Empresa',
                'NCF',
                'Fecha Año/Mes',
                'NCF A',
                'Total Factura',                  
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
    var table = $('.tablaContabilidad607').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
 
    } );


$(document).on("click", "#grupocuenta", function(){
  
	var grupocuenta = $(this).val();
 
if (grupocuenta == 1) {
  
    $("#cuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriacuenta" name="categoriacuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_ACTIVO DISPONIBLE</option>'+
                '<option value="2">2_ACTIVO EXIGIBLE</option>'+
                '<option value="3">3_CREDITOS TRIBUTARIOS EXIGIBLES</option>'+
                '<option value="4">4_INVENTARIOS</option>'+
                '<option value="5">5_PROVICIONES</option>'+
                '<option value="6">6_PROPIEDAD, EQUIPOS E INTANGIBLES</option>'+
                '<option value="7">7_DEPRECIACIONES</option>'+
                '<option value="9">9_OTROS ACTIVOS</option>'+

              '</select>'+

            '</div>');
   
   } else if (grupocuenta == 2){ 
    $("#cuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriacuenta" name="categoriacuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_OBLIGACIONES FINANCIERAS</option>'+
                '<option value="2">2_PROVEEDORES POR PAGAR</option>'+
                '<option value="3">3_OBLIGACIONES LABORALES POR PAGAR</option>'+
                '<option value="4">4_OBLIGACIONES TRIBUTARIAS POR PAGAR</option>'+
                '<option value="5">5_ESTIMACIONES</option>'+
                '<option value="6">6_ACCIONISTAS POR PAGAR</option>'+
                '<option value="7">7_ANTICIPOS DE CLIENTES</option>'+  
                '<option value="9">9_OTROS PASIVO</option>'+       
              '</select>'+

            '</div>');
     }   else if (grupocuenta == 3){
    $("#cuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriacuenta" name="categoriacuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_CAPITAL</option>'+
                '<option value="2">2_RESERVA LEGAL Y ESTATUTARIA</option>'+
                '<option value="3">3_APORTES, DONACIONES Y ACTUALIZACIONES</option>'+
                '<option value="4">4_REVALORIZACIONES DE PATRIMONIO</option>'+  
                '<option value="5">5_RESULTADOS ACUMULADOS</option>'+
                '<option value="6">6_RESULTADOS DEL EJERCICIO</option>'+
                '<option value="9">9_OTRAS PARTIDAS DE PATRIMONIO</option>'+
                     
              '</select>'+

            '</div>');
    
    
} else if (grupocuenta == 4){
    $("#cuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriacuenta" name="categoriacuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_INGRESOS POR VENTAS</option>'+
                '<option value="2">2_INGRESOS POR SERVICIOS</option>'+
                '<option value="3">3_APORTES Y DONACIONES</option>'+
                '<option value="8">8_DESCUENTOS Y DEVOLUCIONES EN VENTAS</option>'+
                '<option value="9">9_OTROS INGRESOS</option>'+

                    
              '</select>'+

            '</div>');
    
    
} else if (grupocuenta == 5){
    $("#cuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriacuenta" name="categoriacuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_COSTOS POR COMPRAS</option>'+
                '<option value="2">2_COSTOS POR SERVICIOS</option>'+
                '<option value="3">3_COSTOS DIRECTOS</option>'+
                '<option value="4">4_COSTOS INDIRECTOS</option>'+
                '<option value="9">9_OTROS COSTOS</option>'+

                    
              '</select>'+

            '</div>');
    
    
} 

else if (grupocuenta == 6){
    $("#cuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriacuenta" name="categoriacuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_GASTOS ADMINISTRATIVOS</option>'+
                '<option value="2">2_GASTOS OPERATIVOS</option>'+
                '<option value="3">3_GASTOS NO FINANCIEROS</option>'+
                '<option value="9">9_OTROS GASTOS</option>'+
              '</select>'+

            '</div>');

    } 
   

})

$(document).on("click", "#categoriacuenta", function(){

  var RncEmpresa = $("#RncEmpresacuentas").val();
  var grupocuenta = $("#grupocuenta").val();
  var categoriacuenta = $("#categoriacuenta").val();

 var datos = new FormData();
  datos.append("RncEmpresa", RncEmpresa);
  datos.append("grupocuenta", grupocuenta);
  datos.append("categoriacuenta", categoriacuenta);

  

    
  $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
    

    if(!respuesta){
        var nuevoCodigo = 1;
         const fill = (nuevoCodigo, len) => "0".repeat(len - nuevoCodigo.toString().length) + nuevoCodigo.toString();
        var numero = fill(nuevoCodigo, 2);
        $("#numerogenerico").val(numero);

      } else {

        var nuevoCodigo = Number(respuesta["id_generica"]) + 1;
        const fill = (nuevoCodigo, len) => "0".repeat(len - nuevoCodigo.toString().length) + nuevoCodigo.toString();
        var numero = fill(nuevoCodigo, 2);
        $("#numerogenerico").val(numero);

      } 



    }
    });
  



  })




$(document).on("click", "#gruposubcuenta", function(){
  
  var grupocuenta = $(this).val();
 
if (grupocuenta == 1) {
  
    $("#subcuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriasubcuenta" name="categoriasubcuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_ACTIVO DISPONIBLE</option>'+
                '<option value="2">2_ACTIVO EXIGIBLE</option>'+
                '<option value="3">3_CREDITOS TRIBUTARIOS EXIGIBLES</option>'+
                '<option value="4">4_INVENTARIOS</option>'+
                '<option value="5">5_PROVICIONES</option>'+
                '<option value="6">6_PROPIEDAD, EQUIPOS E INTANGIBLES</option>'+
                '<option value="7">7_DEPRECIACIONES</option>'+
                '<option value="9">9_OTROS ACTIVOS</option>'+

              '</select>'+

            '</div>');
   
   } else if (grupocuenta == 2){ 
    $("#subcuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriasubcuenta" name="categoriasubcuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_OBLIGACIONES FINANCIERAS</option>'+
                '<option value="2">2_PROVEEDORES POR PAGAR</option>'+
                '<option value="3">3_OBLIGACIONES LABORALES POR PAGAR</option>'+
                '<option value="4">4_OBLIGACIONES TRIBUTARIAS POR PAGAR</option>'+
                '<option value="5">5_ESTIMACIONES</option>'+
                '<option value="6">6_ACCIONISTAS POR PAGAR</option>'+ 
                '<option value="7">7_ANTICIPOS DE CLIENTES</option>'+  
                '<option value="9">9_OTROS PASIVO</option>'+       
              '</select>'+

            '</div>');
     }   else if (grupocuenta == 3){
    $("#subcuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriasubcuenta" name="categoriasubcuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_CAPITAL</option>'+
                '<option value="2">2_RESERVA LEGAL Y ESTATUTARIA</option>'+
                '<option value="3">3_APORTES, DONACIONES Y ACTUALIZACIONES</option>'+
                '<option value="4">4_REVALORIZACIONES DE PATRIMONIO</option>'+  
                '<option value="5">5_RESULTADOS ACUMULADOS</option>'+
                '<option value="6">6_RESULTADOS DEL EJERCICIO</option>'+
                '<option value="9">9_OTRAS PARTIDAS DE PATRIMONIO</option>'+
                     
              '</select>'+

            '</div>');
    
    
} else if (grupocuenta == 4){
    $("#subcuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriasubcuenta" name="categoriasubcuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_INGRESOS POR VENTAS</option>'+
                '<option value="2">2_INGRESOS POR SERVICIOS</option>'+
                '<option value="3">3_APORTES Y DONACIONES</option>'+
                '<option value="8">8_DESCUENTOS Y DEVOLUCIONES EN VENTAS</option>'+
                '<option value="9">9_OTROS INGRESOS</option>'+

                    
              '</select>'+

            '</div>');
    
    
} else if (grupocuenta == 5){
    $("#subcuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriasubcuenta" name="categoriasubcuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_COSTOS POR COMPRAS</option>'+
                '<option value="2">2_COSTOS POR SERVICIOS</option>'+
                '<option value="3">3_COSTOS DIRECTOS</option>'+
                '<option value="4">4_COSTOS INDIRECTOS</option>'+
                '<option value="9">9_OTROS COSTOS</option>'+

                    
              '</select>'+

            '</div>');
    
    
} 

else if (grupocuenta == 6){
    $("#subcuenta").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="categoriasubcuenta" name="categoriasubcuenta" required>'+
              '<option value="">Selecionar Categoria</option>'+
                '<option value="1">1_GASTOS ADMINISTRATIVOS</option>'+
                '<option value="2">2_GASTOS OPERATIVOS</option>'+
                '<option value="3">3_GASTOS NO FINANCIEROS</option>'+
                '<option value="9">9_OTROS GASTOS</option>'+
              '</select>'+

            '</div>');

    } 
   

})

$(document).on("click", "#categoriasubcuenta", function(){

  var RncsubEmpresa = $("#RncEmpresacuentas").val();
  var gruposubcuenta = $("#gruposubcuenta").val();
  var categoriasubcuenta = $("#categoriasubcuenta").val();

 
 var datos = new FormData();
  datos.append("RncsubEmpresa", RncsubEmpresa);
  datos.append("gruposubcuenta", gruposubcuenta);
  datos.append("categoriasubcuenta", categoriasubcuenta);

 
    
  $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);
      
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

$(document).on("change", "#generica", function(){

  var NRncsubEmpresa = $("#RncEmpresacuentas").val();
  var Ngruposubcuenta = $("#gruposubcuenta").val();
  var Ncategoriasubcuenta = $("#categoriasubcuenta").val();
  var Ngenerica = $("#generica").val();

  
 var datos = new FormData();
  datos.append("NRncsubEmpresa", NRncsubEmpresa);
  datos.append("Ngruposubcuenta", Ngruposubcuenta);
  datos.append("Ncategoriasubcuenta", Ncategoriasubcuenta);
  datos.append("Ngenerica", Ngenerica);


  $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){


       
       if(!respuesta){
        var nuevoCodigo = 1;
         const fill = (nuevoCodigo, len) => "0".repeat(len - nuevoCodigo.toString().length) + nuevoCodigo.toString();
        var numero = fill(nuevoCodigo, 3);
        $("#numerosubgenerico").val(numero);

      } else {

        var nuevoCodigo = Number(respuesta["id_subgenerica"]) + 1;
        const fill = (nuevoCodigo, len) => "0".repeat(len - nuevoCodigo.toString().length) + nuevoCodigo.toString();
        var numero = fill(nuevoCodigo, 3);
        $("#numerosubgenerico").val(numero);

      } 
   

    }
    })
  
  })

$(document).on("click", ".btneditarCuenta", function(){

  var idgenerica = $(this).attr("idgenerica");
  var RncEmpresaEG = $(this).attr("Rnc_Empresa_Cuentas");


  var datos = new FormData();
  datos.append("idgenerica", idgenerica);
   datos.append("RncEmpresaEG", RncEmpresaEG);
    
  $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){


      if(respuesta["id_grupo"] == 1){ 


      $("#Editargrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editargrupocuenta" name="Editargrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">1_ACTIVO</option>'+
                
              '</select>'+

            '</div>');
      }
      else if(respuesta["id_grupo"] == 2){ 


      $("#Editargrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editargrupocuenta" name="Editargrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">2_PASIVO</option>'+
                
              '</select>'+

            '</div>');
      }
       else if(respuesta["id_grupo"] == 3){ 


      $("#Editargrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editargrupocuenta" name="Editargrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">3_PATRIMONIO</option>'+
                
              '</select>'+

            '</div>');
      }
      else if(respuesta["id_grupo"] == 4){ 


      $("#Editargrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editargrupocuenta" name="Editargrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">4_INGRESOS</option>'+
                
              '</select>'+

            '</div>');
      }
       else if(respuesta["id_grupo"] == 5){ 


      $("#Editargrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editargrupocuenta" name="Editargrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">5_COSTOS</option>'+
                
              '</select>'+

            '</div>');
      }
      else if(respuesta["id_grupo"] == 6){ 


      $("#Editargrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editargrupocuenta" name="Editargrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">6_GASTOS</option>'+
                
              '</select>'+

            '</div>');
      }

      $("#idcuenta").val(respuesta["id"]);
      $("#Editar-numerogenerico").val(respuesta["id_generica"]);
      $("#Editar-nuevacuentagenerica").val(respuesta["Nombre_Cuenta"]);

       var idgrupo = respuesta["id_grupo"];
       var idCategoria = respuesta["id_categoria"];
       


      var datos = new FormData();
      datos.append("idgrupo", idgrupo);
      datos.append("idCategoria", idCategoria);
     
       $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      $("#Editarcuenta").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editar-categoriacuenta" name="Editar-categoriacuenta" required>'+
              '<option value="'+respuesta["id_categoria"]+'">'+respuesta["Nombre_Categoria"]+'</option>'+
                
              '</select>'+

            '</div>');
}
      })  


       }


     })
 


})



$(document).on("click", ".btneditarSubCuenta", function(){
  
  var RncEmpresaEC = $(this).attr("Rnc_Empresa_Cuentas");
  var idcuenta = $(this).attr("idcuenta");
 
  var datos = new FormData();
  datos.append("idcuenta", idcuenta);
  datos.append("RncEmpresaEC", RncEmpresaEC);
   
   console.log("RncEmpresaEC", RncEmpresaEC);
    
  $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
     
      if(respuesta["id_grupo"] == 1){ 


      $("#Editarsubgrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editargrupocuenta" name="Editargrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">1_ACTIVO</option>'+
                
              '</select>'+

            '</div>');
      }
      else if(respuesta["id_grupo"] == 2){ 


      $("#Editarsubgrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editarsubgrupocuenta" name="Editarsubgrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">2_PASIVO</option>'+
                
              '</select>'+

            '</div>');
      }
       else if(respuesta["id_grupo"] == 3){ 


      $("#Editarsubgrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editarsubgrupocuenta" name="Editarsubgrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">3_PATRIMONIO</option>'+
                
              '</select>'+

            '</div>');
      }
      else if(respuesta["id_grupo"] == 4){ 


      $("#Editarsubgrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editarsubgrupocuenta" name="Editarsubgrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">4_INGRESOS</option>'+
                
              '</select>'+

            '</div>');
      }
       else if(respuesta["id_grupo"] == 5){ 


      $("#Editarsubgrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editarsubgrupocuenta" name="Editarsubgrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">5_COSTOS</option>'+
                
              '</select>'+

            '</div>');
      }
      else if(respuesta["id_grupo"] == 6){ 


      $("#Editarsubgrupo").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editarsubgrupocuenta" name="Editarsubgrupocuenta" required>'+
              '<option value="'+respuesta["id_grupo"]+'">6_GASTOS</option>'+
                
              '</select>'+

            '</div>');
      }



      $("#idsubcuenta").val(respuesta["id"]);
      $("#Editar-numerosubgenerico").val(respuesta["id_subgenerica"]);
      $("#Editar-nuevasubcuenta").val(respuesta["Nombre_subCuenta"]);

       var idgrupo = respuesta["id_grupo"];
       var idCategoria = respuesta["id_categoria"];
       


      var datos = new FormData();
      datos.append("idgrupo", idgrupo);
      datos.append("idCategoria", idCategoria);

       $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      $("#Editarsubcuenta").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" id="Editar-subcategoriacuenta" name="Editar-subcategoriacuenta" required>'+
              '<option value="'+respuesta["id_categoria"]+'">'+respuesta["Nombre_Categoria"]+'</option>'+
                
              '</select>'+

            '</div>');

    }
      })

       var idgrupoCon = respuesta["id_grupo"];
       var idCategoriaCon = respuesta["id_categoria"]; 
       var idgenericaCon = respuesta["id_generica"];
       var RncEmpresaCon = RncEmpresaEC;
       console.log("RncEmpresaCon", RncEmpresaCon);

      var datos = new FormData();
      datos.append("idgrupoCon", idgrupoCon);
      datos.append("idCategoriaCon", idCategoriaCon);
      datos.append("idgenericaCon", idgenericaCon);
      datos.append("RncEmpresaCon", RncEmpresaCon);


       $.ajax({
    url: "ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);
      
      $("#Editarsubgenerica").show().html('<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input-lg" required>'+
              '<option value="'+respuesta["id_generica"]+'">'+respuesta["Nombre_Cuenta"]+'</option>'+
                
              '</select>'+

            '</div>');

    }
      })

       }


     })
 


})

$(document).on("click", ".btnVerEstadoResultado", function(){
  
  $("#VerEstadoResultado").empty().append();

  var idgrupoDetalle = $(this).attr("idgrupo");
  var idcategoriaDetalle = $(this).attr("idcategoria");
  var idgenericaDetalle = $(this).attr("idgenerica");
  var idcuentaDetalle = $(this).attr("idcuenta");
  var idNombre = $(this).attr("idNombre");
  var RncEmpresaLD = $(this).attr("Rnc_Empresa_LD");;
  var FechaDesde =  $(this).attr("fechadesde");
  var FechaHasta = $(this).attr("fechahasta");

  var datos = new FormData();
  datos.append("RncEmpresaLD", RncEmpresaLD);
  datos.append("FechaDesde", FechaDesde);
  datos.append("FechaHasta", FechaHasta);
  datos.append("idgrupoDetalle", idgrupoDetalle);
  datos.append("idcategoriaDetalle", idcategoriaDetalle);
  datos.append("idgenericaDetalle", idgenericaDetalle);
  datos.append("idcuentaDetalle", idcuentaDetalle);
  
 
  $.ajax({
    url:"ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      
$("#NombreCuenta").val(idNombre);
var totaldebito = 0;
var totalcredito = 0;

 

for(let item of respuesta){
    

    
    var totaldebito = totaldebito + Number(item.debito);
    var totalcredito = totalcredito + Number(item.credito);
    

    $("#VerEstadoResultado").append(
      '<tr>'+
                '<td>'+item.NAsiento+'</td>'+
                '<td>'+item.Fecha_AnoMes_LD+'</td>'+
                '<td>'+item.Nombre_Empresa+'</td>'+
                '<td>'+item.NCF+'</td>'+
                '<td>'+item.debito+'</td>'+
                '<td>'+item.credito+'</td>'+
                '<td>'+item.ObservacionesLD+'</td>'+  
      '</tr>'
      );
        
      
   }/*cierre for*/

   $("#debito").val(totaldebito);
   $("#debito").number(true, 2);
   $("#credito").val(totalcredito);
   $("#credito").number(true, 2);
 


 }/*cierre respuesta*/

});

});


$(document).on("click", ".btnVerEstadoSituacion", function(){
  
  $("#VerEstadoSituacion").empty().append();

  var idgrupoDetalle = $(this).attr("idgrupo");
  var idcategoriaDetalle = $(this).attr("idcategoria");
  var idgenericaDetalle = $(this).attr("idgenerica");
  var idcuentaDetalle = $(this).attr("idcuenta");
  var idNombre = $(this).attr("idNombre");
  var RncEmpresaLD = $(this).attr("Rnc_Empresa_LD");;
  var FechaDesde =  $(this).attr("fechadesde");
  var FechaHasta = $(this).attr("fechahasta");

 
 
  var datos = new FormData();
  datos.append("RncEmpresaLD", RncEmpresaLD);
  datos.append("FechaDesde", FechaDesde);
  datos.append("FechaHasta", FechaHasta);
  datos.append("idgrupoDetalle", idgrupoDetalle);
  datos.append("idcategoriaDetalle", idcategoriaDetalle);
  datos.append("idgenericaDetalle", idgenericaDetalle);
  datos.append("idcuentaDetalle", idcuentaDetalle);

  $.ajax({
    url:"ajax/contabilidad.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){

   

$("#NombreSituacion").val(idNombre);
var totaldebito = 0;
var totalcredito = 0;

 

for(let item of respuesta){
       
    var totaldebito = totaldebito + Number(item.debito);
    var totalcredito = totalcredito + Number(item.credito);


    $("#VerEstadoSituacion").append(
      '<tr>'+
                '<td>'+item.NAsiento+'</td>'+
                '<td>'+item.Fecha_AnoMes_LD+'</td>'+
                '<td>'+item.Nombre_Empresa+'</td>'+
                '<td>'+item.NCF+'</td>'+
                '<td>'+item.debito+'</td>'+
                '<td>'+item.credito+'</td>'+
                '<td>'+item.ObservacionesLD+'</td>'+  
      '</tr>'
      );
        
   
   
   }/*cierre for*/

   $("#debitoSituacion").val(totaldebito);
   $("#debitoSituacion").number(true, 2);
   $("#creditoSituacion").val(totalcredito);
   $("#creditoSituacion").number(true, 2);
 

 }/*cierre respuesta*/

});

});


