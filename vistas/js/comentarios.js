
/**********************************
	 DATATABLE DATATABLE DATATABLE
************************************/

$('.tablaComentarios').DataTable({

	

	lengthMenu : [25, 100, 150, 200, 250, 300, -1],

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
    var table = $('.tablaComentarios').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );


    } );

var letras=0;

function check(e) {	      
      tecla = (document.all) ? e.keyCode : e.which;
      if(tecla>32)
	      letras++;
      if(letras==60){
        letras=0;
        document.getElementById("Comentario").value+='\n';
      }
      return true;
}
 

$(document).on("click", ".btnbandejadeentrada", function(){

	var idComentario = $(this).attr("idComentario");
	

	var datos = new FormData();
	datos.append("idComentario", idComentario);
	

	$.ajax({
		url:"ajax/comentarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
		}

	});
	
	var idVerComentario = $(this).attr("idComentario");
	
	var datos = new FormData();
	datos.append("idVerComentario", idVerComentario);
	


	$.ajax({
		url:"ajax/comentarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);


			$("#NombreCreador").val(respuesta["Nombre_Usuario"]);
			$("#NReporte").val(respuesta["NReporte"]);
			$("#FechaAnoMes").val(respuesta["FechaAnoMes"]);
			$("#Fechadia").val(respuesta["Fechadia"]);
			$("#tipo").val(respuesta["TipoComentario"]);
			$("#AsuntoRecibido").val(respuesta["Asunto"]);
			$("#VerComentario").val(respuesta["Comentario"]);

			


		}




	});



})
$(document).on("click", ".btnbandejadeContestar", function(){

	
	var idVerComentario = $(this).attr("idComentarioCon");
	
	var datos = new FormData();
	datos.append("idVerComentario", idVerComentario);
	


	$.ajax({
		url:"ajax/comentarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);


			$("#NombreCreadorCon").val(respuesta["Nombre_Usuario_Dirigito"]);
			$("#Dirigidopara").val(respuesta["Nombre_Usuario"]);
			$("#NReporteCon").val(respuesta["NReporte"]);
			$("#tipoCon").val(respuesta["TipoComentario"]);
			$("#AsuntoContestar").val(respuesta["Asunto"]);
			$("#FechaAnoMes").val(respuesta["FechaAnoMes"]);
			$("#Fechadia").val(respuesta["Fechadia"]);
			
			
			$("#VerComentario").val(respuesta["Comentario"]);

		
		}


	});


})
$(document).on("click", ".btnenviados", function(){

	
	var idVerComentario = $(this).attr("idComentario");
	
	var datos = new FormData();
	datos.append("idVerComentario", idVerComentario);
	


	$.ajax({
		url:"ajax/comentarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);


			$("#NombreDirigido").val(respuesta["Nombre_Usuario_Dirigito"]);
			$("#NReporte").val(respuesta["NReporte"]);
			$("#FechaAnoMes").val(respuesta["FechaAnoMes"]);
			$("#Fechadia").val(respuesta["Fechadia"]);
			$("#tipo").val(respuesta["TipoComentario"]);
			$("#AsuntoRecibido").val(respuesta["Asunto"]);
			$("#VerComentario").val(respuesta["Comentario"]);

		}

	});

})

$(document).on("click", ".btnComentarios", function(){
	$("#VerDiscucion").empty().append();

	var Nombre_Usuario = $(this).attr("Nombre_Usuario");
	var NombreDirigito = $(this).attr("NombreDirigito");
	var fechames = $(this).attr("fechames");
	var fechadia = $(this).attr("fechadia");
	var tipo = $(this).attr("tipo");
	var AsuntoComentario = $(this).attr("AsuntoComentario");
	$("#NombreCreador").val(Nombre_Usuario);
$("#NombreDirigido").val(NombreDirigito);
$("#FechaMes").val(fechames);
$("#FechaDia").val(fechadia);
$("#N").val(NReporte);
$("#tipoC").val(tipo);
$("#AsuntoComentario").val(AsuntoComentario);



	var Rnc_Empresa_Comentario = $(this).attr("Rnc_Empresa_Comentario");
	var NReporte = $(this).attr("NReporte");
	
	var datos = new FormData();
	datos.append("NReporte", NReporte);
	datos.append("Rnc_Empresa_Comentario", Rnc_Empresa_Comentario);
	


	$.ajax({
		url:"ajax/comentarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			console.log("respuesta", respuesta);
		

for(let item of respuesta){
       
  


    $("#VerDiscucion").append(
      '<tr>'+
                '<td>'+item.Nombre_Usuario+'</td>'+
                '<td>'+item.Nombre_Usuario_Dirigito+'</td>'+
                '<td>'+item.FechaAnoMes+'</td>'+
                '<td>'+item.Fechadia+'</td>'+
                '<td>'+item.Comentario+'</td>'+
                  
                
      '</tr>'
      );
        
   
   
   }/*cierre for*/



  

			

		}/*cierre respuesta*/

	});

})
