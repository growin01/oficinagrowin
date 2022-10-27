<?php 

class ControladorProgramador{ 

	static public function ctrDgiiGrowin($tabla){
		
		
    
     $respuesta = ModeloProgramador::MdlGrowinDgii($tabla);
     return $respuesta;
     

	}

	static public function ctrDepurarsuplidorGrowinDGII(){
		if(isset($_POST["Rnc_Growin_DGIIDepurar"])){

	$tabla = "growin_dgii";
			
	$respuesta = ModeloProgramador::MdlGrowinDgii($tabla);

	$eliminar = 0;
	$coinsidensia = 0;

	foreach ($respuesta as $key => $value) {
	if($value["Nombre_Empresa_Growin"] == "" || 
			$value["Nombre_Empresa_Growin"] == "0" ||
			$value["Nombre_Empresa_Growin"] == "00" ||
			$value["Nombre_Empresa_Growin"] == "000" ||
			$value["Nombre_Empresa_Growin"] == "0000" ||
			$value["Nombre_Empresa_Growin"] == "00000" ||
			$value["Nombre_Empresa_Growin"] == "000000" ||
			$value["Nombre_Empresa_Growin"] == "0000000"){ 
	

	$id = "id";
	$valorid = $value["id"];
		
	$borrar = ModeloProgramador::mdlBorrarGrowinDgii($tabla, $id, $valorid);

	$eliminar = $eliminar + 1;
	


	}else if(strlen($value["Rnc_Growin_DGII"]) < 9){

	$id = "id";
	$valorid = $value["id"];
		
	$borrar = ModeloProgramador::mdlBorrarGrowinDgii($tabla, $id, $valorid);

	$eliminar = $eliminar + 1;
	$coinsidensia = $coinsidensia + 1;

	
	}else if(strlen($value["Rnc_Growin_DGII"]) == 10){

	$id = "id";
	$valorid = $value["id"];
		
	$borrar = ModeloProgramador::mdlBorrarGrowinDgii($tabla, $id, $valorid);

	$eliminar = $eliminar + 1;
	$coinsidensia = $coinsidensia + 1;




	}



}/*cierre for*/
	



echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>Registros que Coinsidieron :<u>'.$coinsidensia.'</u></strong></h1>",
			html: "<h3>Registros Eliminados: '.$eliminar.'</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "agregarsuplidorgrowindgii";
		}

		});

</script>';	
		




		}/*Cierre de isset*/
    
    

	}

static public function ctrAgregarsuplidorGrowinDGII(){
		if(isset($_POST["Rnc_Growin_DGIIAgregar"])){

			$tabla = "growin_dgii";
			$taNombre_Empresa_Growin = "Nombre_Empresa_Growin";
			$Nombre_Empresa_Growin = "";

	$respuesta = ModeloProgramador::MdlGrowinDgiivacio($tabla, $taNombre_Empresa_Growin, $Nombre_Empresa_Growin);

	foreach ($respuesta as $key => $value) {
		$id = "id";
		$valorid = $value["id"];
		
	$borrar = ModeloProgramador::mdlBorrarGrowinDgii($tabla, $id, $valorid);


	}

	$tabla = "growin_dgii";
	$taNombre_Empresa_Growin = "Nombre_Empresa_Growin";
	$Nombre_Empresa_Growin = "0";

	$respuesta = ModeloProgramador::MdlGrowinDgiivacio($tabla, $taNombre_Empresa_Growin, $Nombre_Empresa_Growin);

	foreach ($respuesta as $key => $value) {
		$id = "id";
		$valorid = $value["id"];
		
	$borrar = ModeloProgramador::mdlBorrarGrowinDgii($tabla, $id, $valorid);


	}
	
		$tabla = "growin_dgii";
		$id = "Rnc_Growin_DGII";
		$valorid = $_POST["Rnc_Growin_DGIIAgregar"];

		
	$respuesta = ModeloProgramador::mdlSelectGrowinDgii($tabla, $id, $valorid);


if($respuesta != false && $respuesta["Rnc_Growin_DGII"] == $_POST["Rnc_Growin_DGIIAgregar"]){
		echo '<script>
								swal({

									type: "error",
									title: "ESTE SUPLIDOR YA ESTA REGISTRADO VERIFIQUE EL RNC ..!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "agregarsuplidorgrowindgii";
											}

											});

								</script>';
						exit;



	

 }
$tabla = "growin_dgii";
$taRnc_Growin_DGII= "Rnc_Growin_DGII";
$taNombre_Empresa_Growin ="Nombre_Empresa_Growin";
$Rnc_Growin_DGII = $_POST["Rnc_Growin_DGIIAgregar"];
$Nombre_Empresa_Growin = $_POST["Nombre_Empresa_Growin"];
 
$respuesta = ModeloProgramador::mdlAgregarSuplidor($tabla, $taRnc_Growin_DGII, $Rnc_Growin_DGII, $taNombre_Empresa_Growin, $Nombre_Empresa_Growin);


if($respuesta = "ok"){


		echo '<script>

			swal({
							
				type: "success",
				title: "¡El Registro Se Guardo Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
					}).then((result)=>{

						if(result.value){
							window.location = "agregarsuplidorgrowindgii";


						}

						});
						onOpen: (modal) => {
      		confirmOnEnter = (event) => {
        		if (event.keyCode === 13) {
         			event.preventDefault();
          			modal.querySelector(".swal2-confirm").click();
        		}
      		} 
      	}

			</script>';

	

 }



		





		}/*Cierre de isset*/
    
    

	}


static public function ctrSuplidorGrowindgii(){
    
    if(isset($_GET["idSuplidorGrowindgii"])){
     	$tabla = "growin_dgii";
		$id = "id";
		$valorid = $_GET["idSuplidorGrowindgii"];
		
	$borrar = ModeloProgramador::mdlBorrarGrowinDgii($tabla, $id, $valorid);
	
    if($borrar ==  "ok"){
      echo '<script>
          swal({
            type: "success",
            title: "¡El Suplidor ha sido Borrado Correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
              }).then((result)=>{

                if(result.value){
                  window.location = "agregarsuplidorgrowindgii";
                }

                });

          </script>';


    }/*cierra el si de respuesta*/
       
    }/*cierra el si de isset get*/
    

  }/*CIERRA FUNCION borrar USUARIO*/  

}/*CIERRE DE la CLASE PROGRAMADOR*/
      



 