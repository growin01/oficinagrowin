 /**********************
 SIDEBAR MENU
 ***********************/

 $('.sidebar-menu').tree();
 
// Call carousel manually
$('#myCarousel').carousel();

// Go to the previous item
$("#prevBtn").click(function(){
    $("#myCarouselCustom").carousel("prev");
});
// Go to the previous item
$("#nextBtn").click(function(){
    $("#myCarouselCustom").carousel("next");
});
$('.carousel').carousel({
     interval: 2500,
     pause:true,
     wrap:false
});

  /**********************
 DATA TABLES
 ***********************/

 $(".tablas").DataTable({

 		lengthMenu : [25, 100, 150, 200, 250, 300, -1],
 		
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

 
 $(".tablaTodos").DataTable({

 		lengthMenu : [-1],
 		"aaSorting": [],
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
 

 //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
/***************************************************************
		INPUT MASK
*******************************************************************/

 //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
    

    /*FORMATERAR FORMATOS NUMERICOS */

/***************************************************************
		PERIODOS EN TODO EL SISTEMA 
*******************************************************************/
$(document).on("change", "#periodoinicio", function(){

var periodoinicio = $("#periodoinicio").val();

window.location = "index.php?ruta=inicio&periodoinicio="+periodoinicio;
	

});

$(document).on("change", "#periodocotizacion", function(){

var periodocotizacion = $("#periodocotizacion").val();

window.location = "index.php?ruta=cotizaciones&periodocotizacion="+periodocotizacion;
	

});


$(document).on("change", "#periodoventas", function(){

var periodoventas = $("#periodoventas").val();

window.location = "index.php?ruta=ventas&periodoventas="+periodoventas;
	

});
$(document).on("change", "#periodocompras", function(){

var periodocompras = $("#periodocompras").val();

window.location = "index.php?ruta=compras&periodocompras="+periodocompras;
	

});
$(document).on("change", "#periodolibrobanco", function(){

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


});
$(document).on("change", "#periodolibrobancoestado", function(){

 var Banco = $("#EstadoCuenta").val();
 var periodolibrobancoestado = $("#periodolibrobancoestado").val();

if(Banco > 0){
   window.location = "index.php?ruta=estadocuenta&Banco="+Banco+"&periodolibrobancoestado="+periodolibrobancoestado;

}else{

	swal({
			type: "error",
			title: "¡Debe Seleccionar un Banco!",
			confirmButtonText: "¡Cerrar!"
					
		});
}


});
$(document).on("change", "#periodolibromayor", function(){

var periodolibromayor = $("#periodolibromayor").val();

window.location = "index.php?ruta=libromayor&periodolibromayor="+periodolibromayor;
	

});
$(document).on("change", "#periodolibromayorpro", function(){

var periodolibromayor = $("#periodolibromayorpro").val();

window.location = "index.php?ruta=libromayorpro&periodolibromayor="+periodolibromayor;
	

});
$(document).on("change", "#periodoreporte606", function(){

var periodoreporte606 = $("#periodoreporte606").val();

window.location = "index.php?ruta=reporte-606&periodoreporte606="+periodoreporte606;
	

});
$(document).on("change", "#periodoreporte607", function(){

var periodoreporte607 = $("#periodoreporte607").val();

window.location = "index.php?ruta=reporte-607&periodoreporte607="+periodoreporte607;
	

});
$(document).on("change", "#periodoreporte608", function(){

var periodoreporte608 = $("#periodoreporte608").val();

window.location = "index.php?ruta=reporte-608&periodoreporte608="+periodoreporte608;
	

});
$(document).on("change", "#periodoCXC", function(){

var periodoCXC = $("#periodoCXC").val();

window.location = "index.php?ruta=reportecxc&periodoCXC="+periodoCXC;
	

});
$(document).on("change", "#periodoCXP", function(){

var periodoCXP = $("#periodoCXP").val();

window.location = "index.php?ruta=reportecxp&periodoCXP="+periodoCXP;
	

});
$(document).on("change", "#periodoVentaContado", function(){

var periodoVentaContado = $("#periodoVentaContado").val();

window.location = "index.php?ruta=reportevc&periodoVentaContado="+periodoVentaContado;
	

});