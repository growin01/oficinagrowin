
/***************** DATATABLE *****************/

$('.tablareporte608').DataTable({

    deferRender: true,
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
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min608').val(), 10 );
        var max = parseInt( $('#max608').val(), 10 );
        var age = parseFloat( data[2] ) || 0; // use data for the age column
 
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
    var table = $('.tablareporte608').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min608, #max608').keyup( function() {
        table.draw();
    });
 
    });


$("input[name=CodigoNCF608]").on('input', function () {
$(".alert").remove(); 

var Ncaracteres = $(this);
this.value = this.value.replace(/[^0-9]/g,'');
var cadena = $("#NCF608").val();
var num = cadena.charAt(0);
    
    
  if(num!='B' && num!='E'){
    $("input[name=NCF_608]").after('<div class="alert alert-danger">Debe comenzar por B o E el NCF</div>');
                    
      Ncaracteres.prop('maxLength', 1);
  }else{
        if(num =='B'){
            Ncaracteres.prop('maxLength', 8);
            if(this.value.length!=8){
                $("input[name=NCF_608]").after('<div class="alert alert-info">Debe Tener 11 digitos</div>');
                this.focus();
                
                } 

        } 
        if(num == 'E'){
            Ncaracteres.prop('maxLength', 10);
            if(this.value.length!=10){
                $("input[name=NCF_608]").after('<div class="alert alert-info">Debe Tener 13 digitos</div>');
                this.focus();
                
                } 


        }

}


});



   
$("input[name=FechaFacturadia_608]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fechadia = $(this).val();
     
         
     if(Fechadia.length<2){

        $(".Fechadia_608").after('<div class="alert alert-info">Fecha Debe tener 2 digitos el Formato DD Ejmplo 01 </div>');


     }else if(Fechadia.length=2){
        
        $(".alert").remove(); 

        if((Fechadia < 1) || (Fechadia >31)){
            $(".Fechadia_608").after('<div class="alert  alert-warning">Fecha Dia es Invalida debe ser de 01 a 31 los valores</div>');


        }
       

     }



});



/*********************************
VALIDACION FECHA
**********************************/
$("input[name=FechaFacturames_608]").on('input', function(){
    $(".alert").remove(); 

     this.value = this.value.replace(/[^0-9]/g,'');

     var Fecha = $(this).val();
     var ano = Fecha.substr(0,4);
     var mes =  Fecha.substr(4,2);
     
     
     if(Fecha.length<6){

     $(".Fechames_608").after('<div class="alert alert-info">Fecha Debe tener 6 Digitos el Formato es YYYY/MM Ejemplo "201810" </div>');



     }else if(Fecha.length=6){
        
        $(".alert").remove(); 

        if((ano < 2018) || (ano > 2026) || (mes == 0) || (mes > 12)){
            $(".Fechames_608").after('<div class="alert  alert-warning">Fecha Invalida el Formato es YYYY/MM Ejemplo "201810" </div>');


        }     

     }
    



});





$(".tablareporte608").on("click", ".btnEditar608", function(){

    var id_608 = $(this).attr("id_608");
    var modulo = $(this).attr("modulo");

    window.location = "index.php?ruta=Editar-registro-608&id_608="+id_608+"&modulo="+modulo; 


})
$(".tablareporte608").on("click", ".btnCopiar608", function(){

    var id_608 = $(this).attr("id_608");
    var modulo = $(this).attr("modulo");

    window.location = "index.php?ruta=Copiar-registro-608&id_608="+id_608+"&modulo="+modulo; 


})
$(".tablas").on("click", ".btnEditar608", function(){

    var id_608 = $(this).attr("id_608");
    var modulo = $(this).attr("modulo");


    window.location = "index.php?ruta=Editar-registro-608&id_608="+id_608+"&modulo="+modulo; 


})
$(".tablas").on("click", ".btnCopiar608", function(){

    var id_608 = $(this).attr("id_608");
    var modulo = $(this).attr("modulo");


    window.location = "index.php?ruta=Copiar-registro-608&id_608="+id_608+"&modulo="+modulo; 

})



$(document).on("click", "#descargartxt608", function(){ 
    
    var RncEmpresa608Rango = $("#RncEmpresa608Rango").val();
    var Periodoreporte608 = $("#Periodoreporte608").val();

   
  var datos = new FormData();
    datos.append("RncEmpresa608Rango", RncEmpresa608Rango);
    datos.append("Periodoreporte608", Periodoreporte608);
    

    
    $.ajax({
        url:"ajax/608.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){

    for(let item of respuesta){
    var id608 = item.id;
    var estatus608 = "3";

    var datos = new FormData();

    datos.append("id608", id608);
    datos.append("estatus608", estatus608);

    $.ajax({
        url:"ajax/608.ajax.php",
        type:"POST",
        data:datos,
        cache:false,
        contentType:false,
        processData:false,
        success:function(respuesta){
        }
     })


    }

            var registro = 0;


            for(let item of respuesta){ 

                if(item.EXTRAER_NCF_608 != 'FP1' && item.EXTRAER_NCF_608 != 'BCF'){

                    var registro = registro+1;  
                }
                
            }
        

    var nombre = RncEmpresa608Rango+"_"+Periodoreporte608; // NOMBRE DEL ARCHIVO TXT


    var head = "608|"+RncEmpresa608Rango+"|"+Periodoreporte608+"|"+registro; // INCIO DE LA CABEZA DEL ARCHIVO

    var contenidoDeArchivo = [head+"\n"]; // IMPRECION DEL HEAD

    var temporal = [];

// CICLO FOR PARA IMPRIMIR CONTENIDO DE 606

    for(let item of respuesta){ 

 

if(item.EXTRAER_NCF_608 != 'FP1' && item.EXTRAER_NCF_608 != 'BCF'){
    

    contenidoDeArchivo.push(item.NCF_608+"|"+item.Fecha_AnoMesDia_608+"|"
    +item.Extraer_Tipo_Anulacion_608+"\n");

            
  
    }



    }
    
    
var contenido = contenidoDeArchivo.join("");


    var elem = document.getElementById('descargartxt608');

    
    elem.download = "DGII_F_608_"+nombre+".txt";
    elem.href = "data:application/octet-stream,"  + encodeURIComponent(contenido);
                                
  
 }/*respuesta*/
  
    })/*ajax*/
    
 })
    
$(document).on("click", ".btnEstatus608" ,function(){
    var id608 = $(this).attr("id608");
    var estatus608 = $(this).attr("estatus608");

    var datos = new FormData();

    datos.append("id608", id608);
    datos.append("estatus608", estatus608);

    $.ajax({
        url:"ajax/608.ajax.php",
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
                        window.location="reporte-608";}
                });
            
        }
    });

    if(estatus608 == 1){
        $(this).removeClass('btn-warning');
        $(this).addClass('btn-success');
        $(this).html('Disponible');
        $(this).attr('estatus608', 2);

        
    }
    else{
        $(this).removeClass('btn-success');
        $(this).addClass('btn-warning');
        $(this).html('No Disponible');
        $(this).attr('estatus608', 1);

    }

});
$(".tablareporte608").on("click", ".btnEditar608", function(){

    var id_608 = $(this).attr("id_608");
    var modulo = $(this).attr("modulo");

    window.location = "index.php?ruta=Editar-registro-608&id_608="+id_608+"&modulo="+modulo; 


})
$(document).on("click", ".btnLimpiar608", function(){

    var Limpiar608 ="SI" ;

    swal({
            title: '¿Esta usted Seguro de limpiar el Formulario del Registro del 608?',
            text: '¡Si no lo esta puede cancelar la acción',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelmButtonText: "Cancelar",
            confirmButtonText: "Si, limpiar el Formulario de Registro 608",
            }).then(function(result){

        if(result.value){
            window.location = "index.php?ruta=registro-608&Limpiar608="+Limpiar608;
                    }
        });

    
})
$(".tablareporte608").on("click", ".btnVerFactura608", function(){
   

    var id_608 = $(this).attr("id_608");
    var ver = 0; 
   


    var datos = new FormData();
    datos.append("id_608", id_608);

    $.ajax({
        url:"ajax/608.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            $("#Rnc_Cliente").val(respuesta["Rnc_Cliente"]);
            $("#Nombre_Cliente").val(respuesta["Nombre_Cliente"]);
            $("#Fecha_comprobante_AnoMes_608").val(respuesta["Fecha_comprobante_AnoMes_608"]);
            $("#Fecha_Comprobante_Dia_608").val(respuesta["Fecha_Comprobante_Dia_608"]);
            $("#Codigo").val(respuesta["Codigo"]);
            $("#NCF_608").val(respuesta["NCF_608"]);
            $("#Descripcion_608").val(respuesta["Descripcion_608"]);
            $("#Moneda").val(respuesta["Moneda"]);
            $("#Tasa").val(respuesta["Tasa"]);
            $("#Tipo_de_Anulacion_608").val(respuesta["Tipo_de_Anulacion_608"]);
            $("#Netovi").val(respuesta["Neto"]);
            $("#Netovi").number(true, 2);
            $("#Descuentovi").val(respuesta["Descuento"]);
            $("#Descuentovi").number(true, 2);
            $("#Impuestovi").val(respuesta["Impuesto"]);
            $("#Impuestovi").number(true, 2);
            $("#Total").val(respuesta["Total"]);
            $("#Total").number(true, 2);
            $("#Usuario_Creador").val(respuesta["Usuario_Creador"]);
           
            
            var Producto = JSON.parse(respuesta["Producto"]);

var ver = 0;

           for(let item of Producto){
    
                var ver = ver+1;
    


        $(".Productos").append(
'<div class="row">'+

        '<div class="col-xs-5" style="padding-right:0px">'+
                      
          '<div class="input-group">'+
                        
            '<span class="input-group-addon">'+ver+'</span>'+
            
            '<input type="text" class="form-control nuevaDescripcionProducto" idProducto="'+item["id"]+'" name="agregarProducto" value="'+item["descripcion"]+'" readonly required>'+

          '</div>'+
        '</div>'+

        '<div class="col-xs-1 ingresoCantidad" style="padding:0px">'+
        
        '<input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" Stock="'+item["stockanterior"]+'" nuevoStock="'+item["cantidad"]+'" readonly required>'+
                  
                  
        '</div>'+
                    

      
            
            '<div class="col-xs-3 ingresoPrecioVenta" style="padding:0px">'+
                      
              '<div class="input-group">'+
                '<span class="input-group-addon">'+
                  '<i class="ion ion-social-usd">'+
                  '</i>'+
                  '</span>'+

                '<input type="text"  class="form-control nuevoPrecioVenta"  name="nuevoPrecioVenta" value="'+item["precio"]+'" required readonly>'+ 
                        
                '</div>'+
              '</div>'+
                    
              '<div class="col-xs-3 ingresoTotal" style="padding-left:0px">'+
                      
                '<div class="input-group">'+
                  '<span class="input-group-addon">'+
                    '<i class="ion ion-social-usd">'+
                      '</i>'+
                      '</span>'+

                        
                        
                    '<input type="text" class="form-control TotalPrecioProducto" name="TotalPrecioProducto" value="'+item["total"]+'" required readonly>'+ 
                        
                      '</div>'+
                      '</div>'+

                    '</div>'
);


    } 

      }/*respuesta*/



})/*cierre ajax*/

    

});

$(".tablareporte608").on("click", ".btnVerRegistro608", function(){
   

    var id_608 = $(this).attr("id_608");
    var ver = 0; 
   


    var datos = new FormData();
    datos.append("id_608", id_608);

    $.ajax({
        url:"ajax/608.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            
            $("#Fecha_comprobante_AnoMes_608REGISTRO").val(respuesta["Fecha_comprobante_AnoMes_608"]);
            $("#Fecha_Comprobante_Dia_608REGISTRO").val(respuesta["Fecha_Comprobante_Dia_608"]);
            $("#NCF_608REGISTRO").val(respuesta["NCF_608"]);
            $("#Tipo_de_Anulacion_608REGISTRO").val(respuesta["Tipo_de_Anulacion_608"]);
            $("#Descripcion_608REGISTRO").val(respuesta["Descripcion_608"]);
            $("#Usuario_CreadorREGISTRO").val(respuesta["Usuario_Creador"]);
           
            


      }/*respuesta*/



})/*cierre ajax*/

    

});