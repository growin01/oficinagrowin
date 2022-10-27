$(document).on("click", ".btnEliminarSuplidorGrowinDGII", function(){
	
	var idSuplidorGrowindgii = $(this).attr("idSuplidorGrowindgii");
	

	swal({
			title: '¿Esta usted Seguro de Eliminar el Suplidor?',
			text: '¡Si no lo esta puede cancelar la acción',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelmButtonText: "Cancelar",
			confirmButtonText: "Si, borrar Suplidor",
			}).then(function(result){

		if(result.value){
			window.location = "index.php?ruta=agregarsuplidorgrowindgii&idSuplidorGrowindgii="+idSuplidorGrowindgii;
					}
		});



})