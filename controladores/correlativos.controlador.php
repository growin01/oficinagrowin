<?php 

class ControladorCorrelativos{

static public function ctrMostrarEmpresas($tabla, $Rnc_Empresa){

			
			$taRncEmpresa = "Rnc_Empresa";
			
$respuesta = ModeloCorrelativos::mdlMostrarEmpresasCorrelativos($tabla, $taRncEmpresa, $Rnc_Empresa);

		return $respuesta;




}

	static public function ctrMostrarCorrelativos($taRncEmpresa, $RncEmpresa, $orden){
		
		$tabla = 'correlativos_empresas';
				
		$respuesta = ModeloCorrelativos::MdlMostrarCorrelativos($tabla, $taRncEmpresa, $RncEmpresa, $orden);
		return $respuesta;		





	}/* CIERRO FUNCION DE MOSTAR CORRELATIVOS*/
	static public function ctrMostrarhistoricosCorrelativos($taRncEmpresa, $RncEmpresa, $orden){
		
		$tabla = 'historicos_correlativos_empresas';
				
		$respuesta = ModeloCorrelativos::MdlMostrarHistoricoCorrelativos($tabla, $taRncEmpresa, $RncEmpresa, $orden);
		return $respuesta;		





	}/* CIERRO FUNCION DE MOSTAR CORRELATIVOS*/
	static public function ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF){
		
		$tabla = 'correlativos_no_fiscal';
		$taRncEmpresa = "Rnc_Empresa";
		$taTipo_NCF = "Tipo_NCF";
				
		$respuesta = ModeloCorrelativos::MdlMostrarCorrelativosNoFiscal($tabla, $taRncEmpresa, $taTipo_NCF, $Rnc_Empresa, $Tipo_NCF);
		return $respuesta;		





	}/* CIERRO FUNCION DE MOSTAR CORRELATIVOS*/

	static public function ctrModalEditarCorrelativos($id, $idCorrelativo){
		$tabla = 'correlativos_empresas';

				
		$respuesta = ModeloCorrelativos::MdlModalEditarCorrelativos($tabla, $id, $idCorrelativo);
		return $respuesta;		





	}/* CIERRO FUNCION DE MODAL EDITAR USUARIOS*/

	static public function ctreditarCorrelativos(){
		if(isset($_POST["idCorrelativos"])){

			
			$fechaano = substr($_POST["Fecha_Comprobante_AnoMes"], 0, 4);
			$fechames = substr($_POST["Fecha_Comprobante_AnoMes"], -2);
			

/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	

	if(strlen($_POST["Fecha_Comprobante_AnoMes"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
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
									window.location = "correlativos";
													
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
									window.location = "correlativos";
													
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
									window.location = "correlativos";
													
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
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/
	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["Fecha_Comprobante_Dia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "correlativos";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["Fecha_Comprobante_Dia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["Fecha_Comprobante_Dia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;
	}

	
$fechaanovencimiento = substr($_POST["Fecha_Vencimiento_AnoMes"], 0, 4);
$fechamesvencimiento = substr($_POST["Fecha_Vencimiento_AnoMes"], -2);


	if(strlen($_POST["Fecha_Vencimiento_AnoMes"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaanovencimiento < 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaanovencimiento > 2026){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser menor a 2026!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;

	} 				
	if($fechamesvencimiento < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;

	}
	if($fechamesvencimiento > 12){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/
	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["Fecha_Vencimiento_Dia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "correlativos";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["Fecha_Vencimiento_Dia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["Fecha_Vencimiento_Dia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["NCF_Desde"] < $_POST["NCF_ConsAntes"]){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Correlativo de NCF Desde no puede ser menor a los Correlativo de NCF Consumidos!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;

	}

if($_POST["NCF_Hasta"] < $_POST["NCF_Desde"]){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Correlativo de NCF Hasta no puede ser menor a los correlativos de NCF Desde!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "correlativos";
													
													});
												
								</script>';	
					exit;

	}

$tabla = "correlativos_empresas";
							$NCF_Desde = $_POST["NCF_Desde"];
							$NCF_Cons = $NCF_Desde-1;
							$Accion = "Modificado";

$datos = array("id" => $_POST["idCorrelativos"],
	"Tipo_NCF" => $_POST["Tipo_NCF"], 
	"Fecha_Comprobante_AnoMes" => $_POST["Fecha_Comprobante_AnoMes"], 
	"Fecha_Comprobante_Dia" => $_POST["Fecha_Comprobante_Dia"],
	"Fecha_Vencimiento_AnoMes" => $_POST["Fecha_Vencimiento_AnoMes"], 
	"Fecha_Vencimiento_Dia" => $_POST["Fecha_Vencimiento_Dia"], 
	"NCF_Desde" => $NCF_Desde, 
	"NCF_Hasta" => $_POST["NCF_Hasta"],
	"NCF_Cons" => $NCF_Cons,
	"N_Autorizacion" => $_POST["N_Autorizacion"], 
	"Usuario" => $_POST["UsuarioLoguedo"], 
	"Accion" => $Accion);

$respuesta =  ModeloCorrelativos::MdlEditarCorrelativos($tabla, $datos);
	if($respuesta = "ok"){

		$tabla = "historicos_correlativos_empresas";
		$datos = array("Rnc_Empresa" => $_POST["RncEmpresaCorrelativos"],
			"Tipo_NCF" => $_POST["Tipo_NCF"], 
			"Fecha_Comprobante_AnoMes" => $_POST["Fecha_Comprobante_AnoMes"], 
			"Fecha_Comprobante_Dia" => $_POST["Fecha_Comprobante_Dia"],
			"Fecha_Vencimiento_AnoMes" => $_POST["Fecha_Vencimiento_AnoMes"], 
			"Fecha_Vencimiento_Dia" => $_POST["Fecha_Vencimiento_Dia"], 
			"NCF_Desde" => $NCF_Desde, 
			"NCF_Hasta" => $_POST["NCF_Hasta"],
			"NCF_Cons" => $NCF_Cons,
			"N_Autorizacion" => $_POST["N_Autorizacion"], 
			"Usuario" => $_POST["UsuarioLoguedo"], 
			"Accion" => $Accion);

		$respuesta =  ModeloCorrelativos::MdlhistoricoCorrelativos($tabla, $datos);

		if($respuesta = "ok"){

						 	echo '<script>
					swal({
						type: "success",
						title: "¡Se Actualizo el Correaltivo Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "correlativos";
								}

								});

					</script>';



				}/*respuesta ok*/
				}/*respuesta ok*/



		}/*CIERRE DE ISSET*/
					

	}/*CIERRE DE FUNCION EDITAR CORRELTIVOS*/


static public function ctrCorrelativosFac($RncEmpresaVentas, $NCFFactura){

		$tabla = "correlativos_empresas";
		$Rnc_Empresa = "Rnc_Empresa";
		$Tipo_NCF = "Tipo_NCF";
				
	$respuesta = ModeloCorrelativos::MdlCorrelativosFac($tabla, $Rnc_Empresa, $RncEmpresaVentas, $Tipo_NCF, $NCFFactura);
		return $respuesta;		





}/* CIERRO FUNCION DE MODAL EDITAR USUARIOS*/
static public function ctrCorrelativosFacNo($RncEmpresaVentas, $NCFFactura){

		$tabla = "correlativos_no_fiscal";
		$Rnc_Empresa = "Rnc_Empresa";
		$Tipo_NCF = "Tipo_NCF";
				
	$respuesta = ModeloCorrelativos::MdlCorrelativosFac($tabla, $Rnc_Empresa, $RncEmpresaVentas, $Tipo_NCF, $NCFFactura);
		return $respuesta;		





}/* CIERRO FUNCION DE MODAL EDITAR USUARIOS*/
static public function ctreditarCorrelativosNoFiscal(){
		if(isset($_POST["RncEmpresaCorrelativosNo"])){
			$tabla = "correlativos_no_fiscal";

			


							$NCF_Cons = $_POST["NCF_Cons"];
							$Accion = "CREADO";


					$datos = array("Rnc_Empresa" => $_POST["RncEmpresaCorrelativosNo"],
						"Tipo_NCF" => $_POST["Tipo_NCF"], 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["UsuarioLoguedo"], 
					  	"Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
						 if($respuesta = "ok"){


						 	$Tipo_NCF = $_POST["Tipo_NCF"] ;

							switch ($Tipo_NCF){
										case "BCF":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "bcf";
																}

																});

												</script>';

       											
        								break;
        								case "FP1":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "crear-ventas-pro";
																}

																});

												</script>';

       											
        								break;
        								case "COT":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "crear-cotizacion";
																}

																});

												</script>';

       											
        								break;
        								case "DDG":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "gastodiario";
																}

																});

												</script>';

       											
        								break;
        								case "DDI":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "ingresodiario";
																}

																});

												</script>';

       											
        								break;
        								case "DDA":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "librodiario";
																}

																});

												</script>';

       											
        								break;
        								case "RPC":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "reportecxc";
																}

																});

												</script>';

       											
        								break;
        								case "RPG":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "cargamasivacontado";
																}

																});

												</script>';

       											
        								break;
        								case "DCI":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "crear-compra-inventario";
																}

																});

												</script>';

       											
        								break;
        								case "DCG":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "crear-compra-gastosgenerales";
																}

																});

												</script>';

       											
        								break;
        								case "CP1":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "crear-compra-gastosgeneralesNo";
																}

																});

												</script>';

       											
        								break;
        								
        								case "EPC":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "reportecxp";
																}

																});

												</script>';

       											
        								break;
        								
        								case "DOA":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "anticipos";
																}

																});

												</script>';

       											
        								break;
        								case "RDF":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "rendiranticipos";
																}

																});

												</script>';

       											
        								break;
        								case "SMS":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "comentarios";
																}

																});

												</script>';

       											
        								break;
        								case "REC":
       											echo '<script>
													swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "crear-compra-gastosgenerales";
																}

																});

												</script>';

       											
        								break;
								} 

							 }






		}/*CIERRE DE ISSET*/
					

	}/*CIERRE DE FUNCION EDITAR CORRELTIVOS*/


static public function ctreditarCorrelativosNoFiscalMasivo(){
		if(isset($_POST["RncEmpresaNoMasivo"])){ 
$tabla = "correlativos_no_fiscal";
$taRncEmpresa = "Rnc_Empresa";


$Empresas = ModeloCorrelativos::mdlMostrarEmpresasCorrelativos($tabla, $taRncEmpresa);

foreach ($Empresas as $key => $value) {
		$Tipo_NCF = $_POST["Tipo_NCF"];/*FACTURA PROFORMA*/

		$Rnc_Empresa = $value["Rnc_Empresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){
         $Accion = "CREADO";
			$datos = array("Rnc_Empresa" => $value["Rnc_Empresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $_POST["NCF_Cons"],
					  	"Usuario" => $_POST["UsuarioLoguedo"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}




	
}




			echo '<script>
						swal({
														type: "success",
														title: "¡Se Actualizo el Correaltivo Correctamente!",
														showConfirmButton: true,
														confirmButtonText: "Cerrar",
														closeOnConfirm: false
															}).then((result)=>{

																if(result.value){
																	window.location = "correlativos";
																}

																});

												</script>';


		}

	}


}/*CIERRE DE CLASE DE CONTROLADOR DE CORRELATIVOS*/

