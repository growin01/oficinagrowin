
$('.librobanco').DataTable({

   
    
    lengthMenu : [[100, 150, 200,250, 300, -1],[100, 150, 200,250, 300, "Todo"]],
        "DisplayLength": 100,
      "paging": true,
        "pageLength": 100,
      "processing": true,
        "deferRender": true,
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
        var min = parseInt( $('#minlibrobanco').val(), 10 );
        var max = parseInt( $('#maxlibrobanco').val(), 10 );
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
        var min = parseInt( $('#mindialibrobanco').val(), 10 );
        var max = parseInt( $('#maxdialibrobanco').val(), 10 );
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
    var table = $('.librobanco').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#minlibrobanco, #maxlibrobanco').keyup( function() {
        table.draw();
    } );
    $('#mindialibrobanco, #maxdialibrobanco').keyup( function() {
        table.draw();
    } );
   


 } );
$('.conciliar').DataTable({

  lengthMenu : [-1],

    "aaSorting": [],
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

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#FechaConMin').val(), 10 );
        var max = parseInt( $('#FechaConMax').val(), 10 );
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
$(document).ready(function() {
    var table = $('.conciliar').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#FechaConMin, #FechaConMax').keyup( function() {
        table.draw();
    } );


    } );
$('.depositar').DataTable({

  lengthMenu : [-1],

    "aaSorting": [],
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

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#FechaDepoMin').val(), 10 );
        var max = parseInt( $('#FechaDepoMax').val(), 10 );
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
        var min = parseInt( $('#FechaDepoMindia').val(), 10 );
        var max = parseInt( $('#FechaDepoMaxdia').val(), 10 );
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
    var table = $('.depositar').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#FechaDepoMin, #FechaDepoMax').keyup( function() {
        table.draw();
    } );
    $('#FechaDepoMindia, #FechaDepoMaxdia').keyup( function() {
        table.draw();
    } );


    } );
$('.disponibilidad').DataTable({

  lengthMenu : [-1],

    "aaSorting": [],
    "scrollX": true,
    "scrollY": true,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "paging": false,
    "autoWidth": true,
    "searching": false,
    "ordering": false,
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
      "oAria": false,
  },
  dom:"Blfrtip",
            buttons:[
                {extend:'excel',text:'Excel'},
                {extend:'csv',text:'CSV'}    
            ]
 });


$("input[name=NCuentaBancaria]").on('keyup', function (){ 
   this.value = this.value.replace(/[^0-9]/g,'');

   
});
$("input[name=FechamesBanco]").on('input', function(){
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

$("input[name=FechadiaBanco]").on('input', function(){
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
$("input[name=saldoInicial]").on('keyup', function (){ 
   this.value = this.value.replace(/[^0-9.]/g,'');

   
});
$("input[name=saldoEstado]").on('keyup', function (){ 
   this.value = this.value.replace(/[^0-9.]/g,'');

   
});

/*************************************
  EDITAR CATEGORIAS
**************************************/
$(document).on("click", ".btnEditarBanco", function(){

  var idBanco = $(this).attr("idBanco");

  var datos = new FormData();
  datos.append("idBanco", idBanco);
  
console.log("idBanco", idBanco);
  
  $.ajax({
    url:"ajax/banco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      $("#idBanco").val(respuesta["id"]);
      $("#Editar-NCuentaBancaria").val(respuesta["NumeroCuenta"]);
      $("#Editar-NombreCuenta").val(respuesta["Nombre_Cuenta"]);
      $("#Editar-TelefonoBanco").val(respuesta["TelefonoBanco"]);
      $("#Editar-FechamesBanco").val(respuesta["FechamesBanco"]);
      $("#Editar-FechadiaBanco").val(respuesta["FechadiaBanco"]);
      $("#Editar-saldoInicial").val(respuesta["saldoInicial"]);
      $("#Editar-saldoEstado").val(respuesta["saldoEstado"]);

$("#cuentacontablebanco").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-plancuentabanco" name= "Editar-plancuentabanco" required>'+
    '<option value="'+respuesta["id_subgenerica"]+'">'+respuesta["id_grupo"]+'.'+respuesta["id_categoria"]+'.'+respuesta["id_generica"]+'.'+respuesta["id_cuenta"]+'_'+respuesta["Nombre_CuentaContable"]+'</option>'+
  '</select>'+
'</div>');

if(respuesta["TipoCuenta"] == "AHORRO"){
  $("#editartipocuenta").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-TipobancoCuenta" name= "Editar-TipobancoCuenta" required>'+
    '<option value="'+respuesta["TipoCuenta"]+'">'+respuesta["TipoCuenta"]+'</option>'+ 
    '<option value="CORRIENTE">CORRIENTE</option>'+
    '<option value="CAJA CHICA">CAJA CHICA</option>'+
    '<option value="FIDEICOMISO">FIDEICOMISO</option>'+
    '<option value="ANTICIPOPARAGASTO">ANTICIPO PARA GASTO</option>'+
    '<option value="TC">TARJETA DE CREDITO</option>'+
    '<option value="NINGUNA">NINGUNA</option>'+                   
  '</select>'+
'</div>');
 

}else if(respuesta["TipoCuenta"] == "CORRIENTE"){
  $("#editartipocuenta").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-TipobancoCuenta" name= "Editar-TipobancoCuenta" required>'+
    '<option value="'+respuesta["TipoCuenta"]+'">'+respuesta["TipoCuenta"]+'</option>'+ 
    '<option value="AHORRO">AHORRO</option>'+
    '<option value="CAJA CHICA">CAJA CHICA</option>'+
    '<option value="FIDEICOMISO">FIDEICOMISO</option>'+
    '<option value="ANTICIPOPARAGASTO">ANTICIPO PARA GASTO</option>'+
    '<option value="TC">TARJETA DE CREDITO</option>'+
    '<option value="NINGUNA">NINGUNA</option>'+                   
  '</select>'+
'</div>');
 

}else if(respuesta["TipoCuenta"] == "CAJA CHICA"){
  $("#editartipocuenta").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-TipobancoCuenta" name= "Editar-TipobancoCuenta" required>'+
    '<option value="'+respuesta["TipoCuenta"]+'">'+respuesta["TipoCuenta"]+'</option>'+ 
    '<option value="AHORRO">AHORRO</option>'+
    '<option value="CORRIENTE">CORRIENTE</option>'+
    '<option value="FIDEICOMISO">FIDEICOMISO</option>'+
    '<option value="ANTICIPOPARAGASTO">ANTICIPO PARA GASTO</option>'+
    '<option value="TC">TARJETA DE CREDITO</option>'+
    '<option value="NINGUNA">NINGUNA</option>'+                   
  '</select>'+
'</div>');
 

}else if(respuesta["TipoCuenta"] == "FIDEICOMISO"){
  $("#editartipocuenta").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-TipobancoCuenta" name= "Editar-TipobancoCuenta" required>'+
    '<option value="'+respuesta["TipoCuenta"]+'">'+respuesta["TipoCuenta"]+'</option>'+ 
    '<option value="AHORRO">AHORRO</option>'+
    '<option value="CORRIENTE">CORRIENTE</option>'+
    '<option value="CAJA CHICA">CAJA CHICA</option>'+
    '<option value="ANTICIPOPARAGASTO">ANTICIPO PARA GASTO</option>'+
    '<option value="TC">TARJETA DE CREDITO</option>'+
    '<option value="NINGUNA">NINGUNA</option>'+                   
  '</select>'+
'</div>');
 

}else if(respuesta["TipoCuenta"] == "ANTICIPOPARAGASTO"){
  $("#editartipocuenta").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-TipobancoCuenta" name= "Editar-TipobancoCuenta" required>'+
    '<option value="'+respuesta["TipoCuenta"]+'">'+respuesta["TipoCuenta"]+'</option>'+ 
    '<option value="AHORRO">AHORRO</option>'+
    '<option value="CORRIENTE">CORRIENTE</option>'+
    '<option value="CAJA CHICA">CAJA CHICA</option>'+
    '<option value="FIDEICOMISO">FIDEICOMISO</option>'+
    '<option value="TC">TARJETA DE CREDITO</option>'+
    '<option value="NINGUNA">NINGUNA</option>'+                   
  '</select>'+
'</div>');
 

}else if(respuesta["TipoCuenta"] == "TC"){
  $("#editartipocuenta").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-TipobancoCuenta" name= "Editar-TipobancoCuenta" required>'+
    '<option value="'+respuesta["TipoCuenta"]+'">'+respuesta["TipoCuenta"]+'</option>'+ 
    '<option value="AHORRO">AHORRO</option>'+
    '<option value="CORRIENTE">CORRIENTE</option>'+
    '<option value="CAJA CHICA">CAJA CHICA</option>'+
    '<option value="FIDEICOMISO">FIDEICOMISO</option>'+
    '<option value="ANTICIPOPARAGASTO">ANTICIPO PARA GASTO</option>'+
    '<option value="NINGUNA">NINGUNA</option>'+                   
  '</select>'+
'</div>');
 

}else if(respuesta["TipoCuenta"] == "NINGUNA"){
  $("#editartipocuenta").show().html('<div class="input-group">'+
'<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
  '<select class="form-control input" id="Editar-TipobancoCuenta" name= "Editar-TipobancoCuenta" required>'+
    '<option value="'+respuesta["TipoCuenta"]+'">'+respuesta["TipoCuenta"]+'</option>'+ 
    '<option value="AHORRO">AHORRO</option>'+
    '<option value="CORRIENTE">CORRIENTE</option>'+
    '<option value="CAJA CHICA">CAJA CHICA</option>'+
    '<option value="FIDEICOMISO">FIDEICOMISO</option>'+
    '<option value="ANTICIPOPARAGASTO">ANTICIPO PARA GASTO</option>'+
    '<option value="TC">TARJETA DE CREDITO</option>'+                   
  '</select>'+
'</div>');
 

}



             




     }/*CIERRE PRIMER AJAX*/


  });


$(document).on("click", "#Editar-plancuentabanco", function(){
 
  var RncEmpresaBanco = $("#Editar-RncEmpresaBanco").val();
  var idgrupo = 1;
  var idcategoria = 1;

 var datos = new FormData();
  datos.append("RncEmpresaBanco", RncEmpresaBanco);
  datos.append("idgrupo", idgrupo);
  datos.append("idcategoria", idcategoria);
  
  $.ajax({
    url: "ajax/banco.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(respuesta){
      console.log("respuesta", respuesta);
      
         $("#cuentacontablebanco").show().html( 
            '<div class="input-group">'+
              '<span class="input-group-addon"><i class="fa fa-th"></i></span>'+
              '<select class="form-control input" id="Editarplancuentabanco" name="Editarplancuentabanco" required>'+
              '<option value="">Selecionar Cuenta Contable de Banco</option>'+
              
              '</select>'+

            '</div>');
 

              var registro = 0;
              select = document.getElementById("Editarplancuentabanco");

                      for (let item of respuesta){ 
                        var registro = registro + 1; 

                          option = document.createElement("option");
                          option.value = item.id;
                          option.text = item.id_grupo+'.'+item.id_categoria+'.'+item. id_generica+'.'+item.id_subgenerica+'_'+item.Nombre_subCuenta;
                          select.appendChild(option);
            }     
        } 

    });
  


  })



})

$(document).on("change", "#Banco", function(){


  var Banco = $("#Banco").val();
  var periodolibrobanco = $("#periodolibrobanco").val();


  
  if(Banco > 0){
   window.location = "index.php?ruta=librobanco&Banco="+Banco+"&periodolibrobanco="+periodolibrobanco;

}else{

  swal({
      type: "error",
      title: "¡Debe Seleccionar un Banco!",
      confirmButtonText: "¡Cerrar!"
          
    });
}
  
})

$(document).on("change", "#FondoAnticipos", function(){

  var Banco = $("#FondoAnticipos").val();

  if(Banco > 0){
   window.location = "index.php?ruta=reporteanticipos&Banco="+Banco;
}
  
})
$(document).on("change", "#Conciliacion", function(){


  var Banco = $("#Conciliacion").val();

  
  if(Banco > 0){
   window.location = "index.php?ruta=conciliacion&Banco="+Banco;

}
  
})
$(document).on("change", "#rendiranticipos", function(){


  var Banco = $("#rendiranticipos").val();

  
  if(Banco > 0){
   window.location = "index.php?ruta=rendiranticipos&Banco="+Banco;

}
  
})
$(document).on("change", "#EstadoCuenta", function(){


  var Banco = $("#EstadoCuenta").val();

  
  if(Banco > 0){
   window.location = "index.php?ruta=estadocuenta&Banco="+Banco;

}
  
})
$(document).on("click", "#disponibilidad", function(){


  var Banco = $("#bancodisponibilidad").val();
  var Fecha = $("#fechadisponibilidad").val();

  
  if(Banco != "" && Fecha != ""){
   window.location = "index.php?ruta=disponibilidad&Banco="+Banco+"&Fecha="+Fecha;

}else{
  swal({
      type: "error",
      title: "¡Error en la Busqueda!",
      text: "¡Debe seleccionar un Banco y una Fecha Valida!",
      confirmButtonText: "¡Cerrar!"
          
    });
 }
  
})

/********************************************************************************************************************/
/*CONCILIACION CONCILIACION CONCILIACION CONCILIACION CONCILIACION CONCILIACION CONCILIACION CONCILIACION 
/********************************************************************************************************************/
$(".formularioConciliacion").on("keyup", "#SaldoInicial", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');


      

});



var num = 0;
$(document).on("click", ".agregarconciliacion", function (){
  num ++;

  $(this).removeClass("btn-primary agregarconciliacion");
  $(this).addClass("btn-default");


  if(num == 1 && $("#SaldoInicial").val() == 0){
    num = 0;
    swal({
      type: "error",
      title: "¡Error en el Saldo inicial!",
      text: "¡El Saldo Incial es igual a cero!",
      confirmButtonText: "¡Cerrar!"
          
    });


  }else{
    if(num == 1 && $("#SaldoInicial").val() != 0){
      saldo = $("#SaldoInicial").val(); 
      total = Number(saldo);
  }

  var id = $(this).attr("id");
  var nombre = $(this).attr("nombre");
  var referencia = $(this).attr("referencia");
  var fechames = $(this).attr("fechames");
  var fechadia = $(this).attr("fechadia");
  var debito = $(this).attr("debito");
  var credito = $(this).attr("credito");

  
  var calculo = Number(total) + Number(debito) - Number(credito);

  let t = calculo.toFixed(3);
  let regex=/(\-?[1-9]\d*.\d{0,2})/;// regex de numero positivos y negativos dos decimales
  var saldo = t.match(regex)[0];
  
  
       $(".nuevaconciliacion").append(
            '<div class="row" style="padding:5px 15px">'+
                  
                  '<div class="col-xs-3" style="padding-right:0px">'+
                    '<div class="input-group">'+
                            
                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarbanco" idbanco="'+id+'" num="'+num+'"><i class="fa fa-times"></i></button>'+
                          '</span>'+
                      '<input type="hidden" class="form-control idbanco" idbanco="'+id+'"" value="'+id+'" required readonly>'+
                      '<input type="hidden" class="form-control num" num="'+num+'"" value="'+num+'" required readonly>'+
                      '<input type="text" class="form-control" name="nombre" value="'+nombre+'" required readonly>'+

                            
                      '</div>'+
                    '</div>'+

                    '<div class="col-xs-1" style="padding-left:0px;padding-right:0px">'+
                          
                        '<div input-group">'+
                            
                          '<input type="text" class="form-control referencia" name="referencia" value="'+referencia+'" required readonly>'+ 
                            
                        '</div>'+
                    '</div>'+

                    '<div class="col-xs-1" style="padding-right:0px;padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control fechames"  name="fechames" value = "'+fechames+'" required>'+ 
                        
                      '</div>'+
                    '</div>'+

                    '<div class="col-xs-1" style="padding-left:0px;padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control fechadia"  name="fechadia" value = "'+fechadia+'" required>'+ 
                        
                      '</div>'+
                    '</div>'+
                     '<div class="col-xs-2" style="padding-right:0px;padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito" id="debito'+num+'" name="debito" value = "'+credito+'" required readonly>'+ 
                        
                      '</div>'+
                    '</div>'+
                    '<div class="col-xs-2" style="padding-left:0px;padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" id="credito'+num+'" name="credito" value = "'+debito+'" required readonly>'+ 
                        
                      '</div>'+
                    '</div>'+
                     '<div class="col-xs-2" style="padding-right:0px;padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control saldo" id="saldo'+num+'" name="saldo" value = "'+saldo+'" required readonly>'+ 
                        
                      '</div>'+
                    '</div>'+

              '</div>');


                  listarConciliacion();

      }
      total = saldo;



});



function listarConciliacion(){

  var listaConciliacion = [];

  var idbanco = $(".idbanco");

  var referencia = $(".referencia");

  var fechames = $(".fechames");

  var fechadia = $(".fechadia");

  var debito = $(".debito");

  var credito = $(".credito");

  var saldo = $(".saldo");

 


  for(var i = 0; i < idbanco.length; i++){

    listaConciliacion.push({ "id" : $(idbanco[i]).attr("idbanco"), 
                "referencia" : $(referencia[i]).val(),
                "fechames" : $(fechames[i]).val(),
                "fechadia" : $(fechadia[i]).val(),
                "debito" : $(debito[i]).val(),
                "credito" : $(credito[i]).val(),
                "saldo" : $(saldo[i]).val()})


  }


  $("#listaConciliacion").val(JSON.stringify(listaConciliacion)); 

}
function sumarCalculo(){

  saldo = $("#SaldoInicial").val(); 
  total = Number(saldo);

  

  for (var i = 1; i <= num ; i++) {

    var debito = $("#debito"+i).val();
    var credito = $("#credito"+i).val();

  
if(debito > 0 ){

  var calculo = Number(total) + Number(credito) - Number(debito);

  let t = calculo.toFixed(3);
  let regex=/(\-?[1-9]\d*.\d{0,2})/;// regex de numero positivos y negativos dos decimales
  var saldo = t.match(regex)[0];

  $("#saldo"+i).val(saldo);

  total = saldo;
} else if(credito > 0 ){

  var calculo = Number(total) + Number(credito) - Number(debito);

  let t = calculo.toFixed(3);
  let regex=/(\-?[1-9]\d*.\d{0,2})/;// regex de numero positivos y negativos dos decimales
  var saldo = t.match(regex)[0];

  $("#saldo"+i).val(saldo);

  total = saldo;
} else {

  total = saldo;


}
  

  }


}
    
      


$(".formularioConciliacion").on("keyup", ".fechames", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
    
});
$(".formularioConciliacion").on("change", ".fechames", function(){
   listarConciliacion();
     
});
$(".formularioConciliacion").on("keyup", ".fechadia", function(){
  this.value = this.value.replace(/[^0-9.]/g,'');
    
});
$(".formularioConciliacion").on("change", ".fechadia", function(){
   listarConciliacion();
     
});

/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarBanco = [];

localStorage.removeItem("quitarbanco");
                 
$(".formularioConciliacion").on("click", "button.quitarbanco", function (){

  $(this).parent().parent().parent().parent().remove();

  var idbanco = $(this).attr("idbanco");
  

  /******************************************
  ALMACENAR EL ID DEL PORDUCTO A QUITAR
  *******************************************/

  if(localStorage.getItem("quitarbanco") == null){

    idQuitarBanco = [];


  } else {

      idQuitarBanco.concat(localStorage.getItem("quitarbanco"))

  }

    idQuitarBanco.push({"idbanco":idbanco});

    localStorage.setItem("quitarbanco", JSON.stringify(idQuitarBanco));
$("button.recuperarCuenta[id='"+idbanco+"']").removeClass('btn-default');
$("button.recuperarCuenta[id='"+idbanco+"']").addClass('btn-primary agregarconciliacion');

  
 
listarConciliacion();

sumarCalculo();


  
 
});

/***************************************************
CUANDO CARGUE LA TABLA U NAVEGUE EN ELLA
***************************************************/
$(".conciliar").on("draw.dt", function(){

  if(localStorage.getItem("quitarbanco") != null){

    var listaIdConciliacion = JSON.parse(localStorage.getItem("quitarbanco"));

    for(var i = 0; i < listaIdConciliacion.length; i++){


$("button.recuperarCuenta[idbanco'"+listaIdConciliacion[i]["idbanco"]+"']").removeClass('btn-default');
$("button.recuperarCuenta[idbanco'"+listaIdConciliacion[i]["idbanco"]+"']").addClass('btn-primary agregarconciliacion');

    }


  }



})

/*******************************por depositar***************************************************/
$(document).on("click", ".btnMetodoPago", function (){
  var Metododepago = $("#MetodoPago").val();

if(Metododepago != ""){
   window.location = "index.php?ruta=cargamasivacontado&Metododepago="+Metododepago;

}else{
  swal({
      type: "error",
      title: "¡Error en la Busqueda!",
      text: "¡Debe seleccionar Metodo de Pago Valido!",
      confirmButtonText: "¡Cerrar!"
          
    });
 }
  

});




$("input[name=FechaPagodia]").on('input', function(){
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
$("input[name=FechaPagomes]").on('input', function(){
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


$(document).on("click", ".LBdesconcilicar", function(){
  var Banco = $(this).attr("Banco");
  var iddesconciliar = $(this).attr("id");
  var desconciliar = $(this).attr("Estado");
 


  var datos = new FormData();

  datos.append("iddesconciliar", iddesconciliar);
  datos.append("desconciliar", desconciliar);

  $.ajax({
    url:"ajax/banco.ajax.php",
    type:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,
    success:function(respuesta){
       swal({
          type:"success",
          title:"¡El Banco!",
          text:"¡fue Desconsiliado con éxito!",
          showConfirmButton:true,
          confirmButtonText:"Cerrar"
        }).then((result)=>{
          if(result.value){
             window.location = "index.php?ruta=librobanco&Banco="+Banco;}
        });
      

    }
    })
  

})



/*******************redicion de fondos********************************************/
rendir = 0;
$(document).on("click", ".rendicionfondos", function (){
  var rendir = Number($("#Rendir").val())+1;

  
if(rendir == 1){
      saldo = $("#SaldoInicial").val(); 
      total = Number(saldo);
}

    
  var id = $(this).attr("id");
  var nombre = $(this).attr("nombre");
  var ncf = $(this).attr("ncf");
  var referencia = $(this).attr("referencia");
  var fechames = $(this).attr("fechames");
  var fechadia = $(this).attr("fechadia");
  var debito = $(this).attr("debito");
  var credito = $(this).attr("credito");
  var observacionesLD = $(this).attr("observacionesLD");

  
  var calculo = Number(total) + Number(debito) - Number(credito);

  let t = calculo.toFixed(3);
  let regex=/(\-?[0-9]\d*.\d{0,2})/;// regex de numero positivos y negativos dos decimales
  var saldo = t.match(regex)[0];
  
  if(id == "" || ncf == "" ){
    swal({

        title: "No se reconocio la factura vuelva a intentarlo",
        type: "error",
        confirmButtonText: "¡Cerrar!"


            });
    

  }else{
    $(this).removeClass("btn-primary rendicionfondos");
    $(this).addClass("btn-default");


  }
  
       $(".rendirfondos").append(
            '<div class="row" style="padding:5px 15px">'+
                  
                  '<div class="col-xs-4" style="padding-right:0px">'+
                    '<div class="input-group">'+
                            
                      '<span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarbanco" idbanco="'+id+'" num="'+rendir+'"><i class="fa fa-times"></i></button>'+
                          '</span>'+
                      '<input type="hidden" class="form-control idbanco" idbanco="'+id+'"" value="'+id+'" required readonly>'+
                      '<input type="hidden" class="form-control num" num="'+rendir+'"" value="'+rendir+'" required readonly>'+
                      '<input type="text" class="form-control nombre" name="nombre" value="'+nombre+'" required readonly>'+ 
                      '<input type="hidden" class="form-control ncf" name="ncf" value="'+ncf+'" required readonly>'+
                      '<input type="hidden" class="form-control observacionesLD" name="observacionesLD" value="'+observacionesLD+'" required readonly>'+
                          

                      '</div>'+
                    '</div>'+

                    '<div class="col-xs-2" style="padding-left:0px;padding-right:0px">'+
                          
                        '<div input-group">'+
                            
                          '<input type="text" class="form-control referencia" name="referencia" value="'+referencia+'" required readonly>'+ 
                            
                        '</div>'+
                    '</div>'+

                    '<div style="padding-right:0px;padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="hidden" class="form-control fechames"  name="fechames" value = "'+fechames+'" required>'+ 
                        
                      '</div>'+
                    '</div>'+

                    '<div style="padding-left:0px;padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="hidden" class="form-control fechadia"  name="fechadia" value = "'+fechadia+'" required>'+ 
                        
                      '</div>'+
                    '</div>'+
                     '<div class="col-xs-2" style="padding-right:0px;padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control debito" id="debito'+rendir+'" name="debito" value = "'+credito+'" required readonly>'+ 
                        
                      '</div>'+
                    '</div>'+
                    '<div class="col-xs-2" style="padding-left:0px;padding-right:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control credito" id="credito'+rendir+'" name="credito" value = "'+debito+'" required readonly>'+ 
                        
                      '</div>'+
                    '</div>'+
                     '<div class="col-xs-2" style="padding-right:0px;padding-left:0px">'+
                      
                      '<div input-group">'+
                        
                        '<input type="text" class="form-control saldo" id="saldo'+rendir+'" name="saldo" value = "'+saldo+'" required readonly>'+ 
                        
                      '</div>'+
                    '</div>'+

              '</div>');


                  
                  listarFondosAnticipos();
                  sumarRendicion();

      
      total = saldo;

$("#Rendir").val(rendir);
});



function listarFondosAnticipos(){

  var listaFondosAnticipos = [];

  var idbanco = $(".idbanco");

  var nombre = $(".nombre");

  var observacionesLD = $(".observacionesLD");

  var ncf = $(".ncf");

  var referencia = $(".referencia");

  var fechames = $(".fechames");

  var fechadia = $(".fechadia");

  var debito = $(".debito");

  var credito = $(".credito");

  var saldo = $(".saldo");

 


  for(var i = 0; i < idbanco.length; i++){

    listaFondosAnticipos.push({ "id" : $(idbanco[i]).attr("idbanco"), 
                "nombre" : $(nombre[i]).val(),
                "observacionesLD" : $(observacionesLD[i]).val(),
                "ncf" : $(ncf[i]).val(),
                "referencia" : $(referencia[i]).val(),
                "fechames" : $(fechames[i]).val(),
                "fechadia" : $(fechadia[i]).val(),
                "debito" : $(debito[i]).val(),
                "credito" : $(credito[i]).val(),
                "saldo" : $(saldo[i]).val()})


  }


  $("#listaRedicion").val(JSON.stringify(listaFondosAnticipos)); 

}
function sumarRendicion(){

  saldo = $("#SaldoInicial").val(); 
  total = Number(saldo);
  var rendir =  $("#Rendir").val();
  
  for (var i = 1; i <= rendir; i++) {

    var debito = $("#debito"+i).val();
    var credito = $("#credito"+i).val();

  
if(debito > 0 ){

  var calculo = Number(total) + Number(credito) - Number(debito);

  let t = calculo.toFixed(3);
  let regex=/(\-?[0-9]\d*.\d{0,2})/;// regex de numero positivos y negativos dos decimales
  var saldo = t.match(regex)[0];

  $("#saldo"+i).val(saldo);

  total = saldo;
} else if(credito > 0 ){

  var calculo = Number(total) + Number(credito) - Number(debito);

  let t = calculo.toFixed(3);
  let regex=/(\-?[0-9]\d*.\d{0,2})/;// regex de numero positivos y negativos dos decimales
  var saldo = t.match(regex)[0];

  $("#saldo"+i).val(saldo);

  total = saldo;
} else {

  total = saldo;


}
  

  }


}

/**********************************************
QUITAR PRODUCTO DE VENTA Y RECUPERAR EL BOTON
***********************************************/
var idQuitarBanco = [];

localStorage.removeItem("quitarbanco");
                 
$(".formulariorendirfondos").on("click", "button.quitarbanco", function (){

  $(this).parent().parent().parent().parent().remove();

  var idbanco = $(this).attr("idbanco");
  

  /******************************************
  ALMACENAR EL ID DEL PORDUCTO A QUITAR
  *******************************************/

  if(localStorage.getItem("quitarbanco") == null){

    idQuitarBanco = [];


  } else {

      idQuitarBanco.concat(localStorage.getItem("quitarbanco"))

  }
listarFondosAnticipos();
sumarRendicion();

    idQuitarBanco.push({"idbanco":idbanco});

    localStorage.setItem("quitarbanco", JSON.stringify(idQuitarBanco));
$("button.recuperarCuenta[id='"+idbanco+"']").removeClass('btn-default');
$("button.recuperarCuenta[id='"+idbanco+"']").addClass('btn-primary rendicionfondos');

  
 

listarFondosAnticipos();
sumarRendicion();
  
 
});
$(".formulariorendirfondos").mousemove(function(){
listarFondosAnticipos();
sumarRendicion();

});

$(".formulariorendirfondos").on("keyup", "#SaldoInicial", function(){
this.value = this.value.replace(/[^0-9.]/g,'');

listarFondosAnticipos();
sumarRendicion();

});
   
$(".tablas").on("click", ".btnRendicionFondos", function(){

  var idRendido = $(this).attr("idRendido");
 

  window.open("extensiones/tcpdf/pdf/FondosRendidos.php?idRendido="+idRendido, "_blank");





})
$(".tablas").on("click", ".btnEditarRendicionFondos", function(){

  var idRendido = $(this).attr("idRendido");
  console.log("idRendido", idRendido);
  

  window.location = "index.php?ruta=Editarrendiranticipos&idRendido="+idRendido;





})
$(document).on("click", ".btnEliminarRendicionFondos", function(){
  
  var idRendidoEliminar = $(this).attr("idRendidoEliminar");
  var RncRendirFondos = $(this).attr("RncRendirFondos");
  var UsuarioConciliacion = $(this).attr("UsuarioConciliacion");
  

  swal({
      title: '¿Esta usted Seguro de Borrar el Los Anticipos rendidos?',
      text: '¡Si no lo esta puede cancelar la acción',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelmButtonText: "Cancelar",
      confirmButtonText: "Si, borrar Rendición de Fondos",
      }).then(function(result){

    if(result.value){
      window.location = "index.php?ruta=reporteranticiposrendidos&idRendidoEliminar="+idRendidoEliminar+"&RncRendirFondos="+RncRendirFondos+"&UsuarioConciliacion="+UsuarioConciliacion;
          }
    });



})


