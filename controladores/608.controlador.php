<?php 

class Controlador608{
	static public function ctrMostrar608($Rnc_Empresa_608, $id_608, $Valor_id608, $Orden){

			$tabla = "608_empresas";
			$taRncEmpresa608 = "Rnc_Empresa_608";


		$respuesta = Modelo608::mdlMostrar608($tabla, $taRncEmpresa608, $Rnc_Empresa_608, $id_608, $Valor_id608, $Orden);

		return $respuesta;



	}
static public function ctrMostrarReporte608($Rnc_Empresa_608, $Orden, $periodoreporte608){

			$tabla = "608_empresas";
			$taRncEmpresa608 = "Rnc_Empresa_608";


		$respuesta = Modelo608::mdlMostrarReporte608($tabla, $taRncEmpresa608, $Rnc_Empresa_608, $Orden, $periodoreporte608);

		return $respuesta;



	}
	static public function ctrMostrarPeriodo608($Rnc_Empresa_608){

			$tabla = "608_empresas";
			$taRncEmpresa608 = "Rnc_Empresa_608";
			$taFecha_AnoMes_608 = "Fecha_AnoMes_608";

		$respuesta = Modelo608::mdlMostrarPeriodo608($tabla, $taRncEmpresa608, $Rnc_Empresa_608, $taFecha_AnoMes_608);

		return $respuesta;




	}

static public function ctrRegistrar608(){
	
	if(isset($_POST["NCF608"])){
		$_SESSION["FechaFacturames_608"] = $_POST["FechaFacturames_608"];
		$_SESSION["FechaFacturadia_608"] = $_POST["FechaFacturadia_608"];
		$_SESSION["NCF608"] = $_POST["NCF608"];
        $_SESSION["CodigoNCF608"] = $_POST["CodigoNCF608"];
		$_SESSION["Descripcion"] = $_POST["Descripcion_608"];

		
		
$NCF608 = $_POST["NCF608"];
$CodigoNCF = $_POST["CodigoNCF608"];				
				
$NCF_608 = $NCF608.$CodigoNCF;
$NCF_607 = $NCF608.$CodigoNCF;
/*VALIDACION QUE LA FACUTRA NO SE REPITA */

		$tabla = "607_empresas";
		$taRnc_Empresa_607 = "Rnc_Empresa_607";
		$Rnc_Empresa_607 = $_POST["RncEmpresa608"];
		$taNCF_607 = "NCF_607";

$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);

if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["NCF_607"] == $NCF_607){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 607 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "registro-608";
											}

											});

								</script>';


		exit;

}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

		$tabla = "608_empresas";
		$taRnc_Empresa_608 = "Rnc_Empresa_608";
		$Rnc_Empresa_608 = $_POST["RncEmpresa608"];
		$taNCF_608 = "NCF_608";

$FacturaRepetida = Modelo608::MdlfacturaRepetida608($tabla, $taRnc_Empresa_608, $Rnc_Empresa_608, $taNCF_608, $NCF_608);

if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida["NCF_608"] == $NCF_608){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 608 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "registro-608";
											}

											});

								</script>';


		exit;

}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

$Extraer_NCF_608 = $_POST["NCF608"];


			
/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_608"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturadia_608"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
									});
												
								</script>';	
					exit;	
	} 
	
	
	
	if(!(preg_match('/^[0-9]+$/', $_POST["CodigoNCF608"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;
	}	
			
	

	$fechaano = substr($_POST["FechaFacturames_608"], 0, 4);
	$fechames = substr($_POST["FechaFacturames_608"], -2);

	if(strlen($_POST["FechaFacturames_608"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano < 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano > 2026){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser menor a 2026!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;

	} 				
	if($fechames < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;

	}
	if($fechames > 12){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/
	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia_608"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "registro-608";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_608"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_608"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/	
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["NCF608"], 0, 1) == "B" && strlen($_POST["CodigoNCF608"]) != 8){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["NCF608"], 0, 1) == "E" && strlen($_POST["CodigoNCF608"]) != 10){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-608";
								});

	
								</script>';
				exit;
	}	

		

$Extraer_Tipo_de_Anulacion = $_POST["Tipo_de_Anulacion"];


	switch ($Extraer_Tipo_de_Anulacion){
		case "01":
       		$Tipo_de_Anulacion = "01-Deterioro de factura Pre-impresa";
       		
		break;

        case "02":
       		$Tipo_de_Anulacion = "02-Errores de impresión (factura Pre-impresa)";
       		
        break;

        case "03":
       		$Tipo_de_Anulacion = "03-Impresión defectuosa";
       		
        break;

        case "04":
       		$Tipo_de_Anulacion = "04-Corrección de la información";
       		
        break;

        case "05":
       		$Tipo_de_Anulacion = "05-Cambio de productos";
       		
        break;
        										
        case "06":       											
       		$Tipo_de_Anulacion = "06-Devolución de productos";
       		
        break;

        case "07":       											
       		$Tipo_de_Anulacion = "07-Omisión de productos";
       		
        break;
        case "08":       											
       		$Tipo_de_Anulacion = "08-Errores en secuencia de NCF";
       		
        break;
        case "09":       											
       		$Tipo_de_Anulacion = "09-Por cese de operaciones";
       		
        break;
        case "10":       											
       		$Tipo_de_Anulacion = "10-Pérdida o hurto de talonarios(S)";
       		
        break;
       
        										
}

											
	

$Fecha_AnoMesDia_608  = $_POST["FechaFacturames_608"].$_POST["FechaFacturadia_608"];
$Estatus_608 = "";
$Accion_608 = "CREADO";
$Modulo = "608";
$Estatus = "1";//1- no disponible 2- disponible 3 declarada//
      											 

$tabla = "608_empresas";
$datos = array("Rnc_Empresa_608" => $Rnc_Empresa_608,
"NCF_608" => $NCF_608,
"Fecha_AnoMesDia_608" => $Fecha_AnoMesDia_608,
"Extraer_Tipo_Anulacion_608" => $_POST["Tipo_de_Anulacion"],
"Estatus_608" => $Estatus_608,
"EXTRAER_NCF_608" => $Extraer_NCF_608,
"Fecha_comprobante_AnoMes_608" => $_POST["FechaFacturames_608"],
"Fecha_Comprobante_Dia_608" => $_POST["FechaFacturadia_608"],
"Tipo_de_Anulacion_608" =>  $Tipo_de_Anulacion,
"Descripcion_608" => $_POST["Descripcion_608"],
"Usuario_Creador" => $_POST["UsuarioLogueado"],
"Accion_608" => $Accion_608,
"Modulo" => $Modulo,
"Estatus" => $Estatus);

$respuesta =  Modelo608::MdlRegistrar608($tabla, $datos);

	if($respuesta == "ok"){

                        unset($_SESSION["FechaFacturadia_608"]); 
                        unset($_SESSION["Rnc_Factura_608"] ); 
                        unset($_SESSION["NCF608"]);
                        unset($_SESSION["CodigoNCF608"]);
                        unset($_SESSION["Descripcion"]);
                 


		echo '<script>

			swal({
							
				type: "success",
				title: "¡El Registro 608 Se Guardo Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
					}).then((result)=>{

						if(result.value){
							window.location = "registro-608";


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
										
										
							}/* CIERRO SI DE RESPUESTA */




}/* CERRAR ISSET*/

}/* CERRAR FUNCION ctrRegistrar606*/ 



static public function ctrEditar608(){
	
	if(isset($_POST["Editar_id_608"])){
		
		
		
$NCF608 = $_POST["NCF608"];
$CodigoNCF = $_POST["CodigoNCF608"];				
				
$NCF_608 = $NCF608.$CodigoNCF;
$NCF_607 = $NCF608.$CodigoNCF;
/*VALIDACION QUE LA FACUTRA NO SE REPITA */

		$tabla = "607_empresas";
		$taRnc_Empresa_607 = "Rnc_Empresa_607";
		$Rnc_Empresa_607 = $_POST["RncEmpresa608"];
		$taNCF_607 = "NCF_607";

$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);

if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["NCF_607"] == $NCF_607){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 607 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "reporte-608";
											}

											});

								</script>';


		exit;

}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

		$tabla = "608_empresas";
		$taRnc_Empresa_608 = "Rnc_Empresa_608";
		$Rnc_Empresa_608 = $_POST["RncEmpresa608"];
		$taNCF_608 = "NCF_608";

$FacturaRepetida = Modelo608::MdlfacturaRepetida608($tabla, $taRnc_Empresa_608, $Rnc_Empresa_608, $taNCF_608, $NCF_608);

if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida["NCF_608"] == $NCF_608 && $FacturaRepetida["id"] != $_POST["Editar_id_608"]){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 608 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "reporte-608";
											}

											});

								</script>';


		exit;

}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

$Extraer_NCF_608 = $_POST["NCF608"];


			
/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_608"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturadia_608"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
									});
												
								</script>';	
					exit;	
	} 
	
	
	
	if(!(preg_match('/^[0-9]+$/', $_POST["CodigoNCF608"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;
	}	
			
	

	$fechaano = substr($_POST["FechaFacturames_608"], 0, 4);
	$fechames = substr($_POST["FechaFacturames_608"], -2);

	if(strlen($_POST["FechaFacturames_608"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano < 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano > 2026){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser menor a 2026!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;

	} 				
	if($fechames < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;

	}
	if($fechames > 12){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/
	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia_608"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "reporte-608";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_608"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_608"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/	
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["NCF608"], 0, 1) == "B" && strlen($_POST["CodigoNCF608"]) != 8){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["NCF608"], 0, 1) == "E" && strlen($_POST["CodigoNCF608"]) != 10){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-608";
								});

	
								</script>';
				exit;
	}	

		

$Extraer_Tipo_de_Anulacion = $_POST["Tipo_de_Anulacion"];


	switch ($Extraer_Tipo_de_Anulacion){
		case "01":
       		$Tipo_de_Anulacion = "01-Deterioro de factura Pre-impresa";
       		
		break;

        case "02":
       		$Tipo_de_Anulacion = "02-Errores de impresión (factura Pre-impresa)";
       		
        break;

        case "03":
       		$Tipo_de_Anulacion = "03-Impresión defectuosa";
       		
        break;

        case "04":
       		$Tipo_de_Anulacion = "04-Corrección de la información";
       		
        break;

        case "05":
       		$Tipo_de_Anulacion = "05-Cambio de productos";
       		
        break;
        										
        case "06":       											
       		$Tipo_de_Anulacion = "06-Devolución de productos";
       		
        break;

        case "07":       											
       		$Tipo_de_Anulacion = "07-Omisión de productos";
       		
        break;
        case "08":       											
       		$Tipo_de_Anulacion = "08-Errores en secuencia de NCF";
       		
        break;
        case "09":       											
       		$Tipo_de_Anulacion = "09-Por cese de operaciones";
       		
        break;
        case "10":       											
       		$Tipo_de_Anulacion = "10-Pérdida o hurto de talonarios(S)";
       		
        break;
       
        										
}

											
	

$Fecha_AnoMesDia_608  = $_POST["FechaFacturames_608"].$_POST["FechaFacturadia_608"];
$Estatus_608 = "";
$Accion_608 = "Editado";
$Estatus = "1";//1- no disponible 2- disponible 3 declarada//
      											 

$tabla = "608_empresas";
$datos = array("id" => $_POST["Editar_id_608"],
"Rnc_Empresa_608" => $Rnc_Empresa_608,
"NCF_608" => $NCF_608,
"Fecha_AnoMesDia_608" => $Fecha_AnoMesDia_608,
"Extraer_Tipo_Anulacion_608" => $_POST["Tipo_de_Anulacion"],
"Estatus_608" => $Estatus_608,
"EXTRAER_NCF_608" => $Extraer_NCF_608,
"Fecha_comprobante_AnoMes_608" => $_POST["FechaFacturames_608"],
"Fecha_Comprobante_Dia_608" => $_POST["FechaFacturadia_608"],
"Tipo_de_Anulacion_608" =>  $Tipo_de_Anulacion,
"Descripcion_608" => $_POST["Descripcion_608"],
"Usuario_Creador" => $_POST["UsuarioLogueado"],
"Accion_608" => $Accion_608,
"Estatus" => $Estatus);

$respuesta =  Modelo608::MdlEditar608($tabla, $datos);

	if($respuesta == "ok"){

                   
$modulo = $_POST["modulo"];
		switch ($modulo) {
			case 'reporte-608':

		echo '<script>

			swal({
							
				type: "success",
				title: "¡El Registro 608 Se Modifico Correctamente Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
					}).then((result)=>{

						if(result.value){
							window.location = "reporte-608";


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
										
		break;
		case 'registro-608':

		echo '<script>

			swal({
							
				type: "success",
				title: "¡El Registro 608 Se Modifico Correctamente Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
					}).then((result)=>{

						if(result.value){
							window.location = "registro-608";


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
										
		break;

			 }				



							}/* CIERRO SI DE RESPUESTA */




}/* CERRAR ISSET*/

}/* CERRAR FUNCION ctrRegistrar606*/ 


}/*CIERRE CLASSE*/


