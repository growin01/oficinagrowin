<?php 	

class ControladorDiario{

static public function ctrMostrarPeriodo($Rnc_Empresa_LD){

			$tabla = "librodiario_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_LD";
			$taFecha_AnoMes_LD = "Fecha_AnoMes_LD";

		$respuesta = ModeloDiario::mdlMostrarPeriodo($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha_AnoMes_LD);

		return $respuesta;


	}

static function ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod){
		$tabla = "correlativos_no_fiscal";
		$taRncEmpresa = "Rnc_Empresa";
		$taTipo_NCF = "Tipo_NCF";

		$respuesta = ModeloDiario::mdlCodigoAsientoDiario($tabla, $taRncEmpresa, $taTipo_NCF, $Rnc_Empresa_Diario, $tipocod);

		return $respuesta;

}/*CIERRE FUNCION*/
static public function ctrMostrarLibroMayor($Rnc_Empresa_LD, $Orden, $periodolibromayor){

	$tabla = "librodiario_empresas";
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";

	$respuesta = ModeloDiario::mdlMostrarLibroMayor($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $Orden, $periodolibromayor);

		return $respuesta;

}
static public function ctrMostrarEstadoResultado($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Orden){
		$tabla = "librodiario_empresas";
		$taRnc_Empresa_LD = "Rnc_Empresa_LD";
		$taFecha = "Fecha_AnoMes_LD";
		
	
		$respuesta = ModeloDiario::mdlMostrarEstadoResultado($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $Orden);

		return $respuesta;


	}

static public function ctrVerDetalle($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $idgrupoDetalle, $idcategoriaDetalle, $idgenericaDetalle, $idcuentaDetalle, $Orden){
		$tabla = "librodiario_empresas";
		$taRnc_Empresa_LD = "Rnc_Empresa_LD";
		$taFecha = "Fecha_AnoMes_LD";
		$taidgrupo = "id_grupo";
		$taidcategoria = "id_categoria";
		$taidgenerica = "id_generica";
		$taidcuenta = "id_cuenta";
	
		$respuesta = ModeloDiario::mdlVerDetalle($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $taidgrupo, $idgrupoDetalle, $taidcategoria, $idcategoriaDetalle, $taidgenerica, $idgenericaDetalle, $taidcuenta, $idcuentaDetalle, $Orden);

		return $respuesta;

	}
static public function ctrVerAuxiliar($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $idgrupoDetalle, $idcategoriaDetalle, $idgenericaDetalle, $idcuentaDetalle, $extraer){
		$tabla = "librodiario_empresas";
		$taRnc_Empresa_LD = "Rnc_Empresa_LD";
		$taFecha = "Fecha_AnoMes_LD";
		$taidgrupo = "id_grupo";
		$taidcategoria = "id_categoria";
		$taidgenerica = "id_generica";
		$taidcuenta = "id_cuenta";
		$taextraer = "Extraer_NAsiento";
	
		$respuesta = ModeloDiario::mdlVerAuxiliar($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $taidgrupo, $idgrupoDetalle, $taidcategoria, $idcategoriaDetalle, $taidgenerica, $idgenericaDetalle, $taidcuenta, $idcuentaDetalle, $taextraer, $extraer);

		return $respuesta;

	}

static public function ctrMostrarResumenProyectos($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Proyecto, $Orden){
		$tabla = "librodiario_empresas";
		$taRnc_Empresa_LD = "Rnc_Empresa_LD";
		$taFecha = "Fecha_AnoMes_LD";
		$taProyecto = "id_Proyecto";
	
		$respuesta = ModeloDiario::mdlMostrarResumenProyectos($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $Proyecto, $taProyecto, $Orden);

		return $respuesta;

	}


static function ctringresodiario(){

	if(isset($_POST["Rnc_Factura_607"]) && isset($_POST["NAsiento"])){

		$_SESSION["FechaFacturames_607"] = $_POST["FechaFacturames_607"];
		$_SESSION["FechaFacturadia_607"] = $_POST["FechaFacturadia_607"];
		$_SESSION["Rnc_Factura_607"] = $_POST["Rnc_Factura_607"];
		$_SESSION["NCF607"] = $_POST["NCF607"];
        $_SESSION["CodigoNCF607"] = $_POST["CodigoNCF607"];
		$_SESSION["NCF_Modificado_607"] = $_POST["NCF_Modificado_607"];
		$_SESSION["Monto_Facturado_607"] = $_POST["Monto_Facturado_607"];
		$_SESSION["ITBIS_Facturado_607"] = $_POST["ITBIS_Facturado_607"];
		$_SESSION["Otros_Impuestos_607"] = $_POST["Otros_Impuestos_607"];
		$_SESSION["Nombre_Empresa_607"] = $_POST["Nombre_Empresa_607"];
		$_SESSION["Tipo_cliente_607"] = $_POST["Tipo_cliente_607"];
		$_SESSION["Forma_De_Pago_607"] = $_POST["Forma_De_Pago_607"];
		$_SESSION["Transaccion_607"] = $_POST["Transaccion_607"];
		$_SESSION["FechaPagomes607"] = $_POST["FechaPagomes607"];
		$_SESSION["FechaPagodia607"] = $_POST["FechaPagodia607"];
		$_SESSION["Referencia_607"] = $_POST["Referencia_607"];
		$_SESSION["agregarBanco"] = $_POST["agregarBanco"];
		$_SESSION["Descripcion"] = $_POST["Descripcion"];
		$_SESSION["listaCuentas"] = $_POST["listaCuentas"];
		$_SESSION["ModuloBanco"] = $_POST["ModuloBanco"];

		if(isset($_POST["B04MeMa_607"]) && ($_POST["B04MeMa_607"] == 1 || $_POST["B04MeMa_607"] == 2)){
			$_SESSION["B04MeMa_607"] = $_POST["B04MeMa_607"];
		}else{
			$_SESSION["B04MeMa_607"] = "";

		}

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO  INICIO ****************************************************************************************************************/
$NCF607 = $_POST["NCF607"];
$CodigoNCF = $_POST["CodigoNCF607"];				
				
$NCF_607 = $NCF607.$CodigoNCF;		

		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		/*VALIDACION QUE LA FACUTRA NO SE REPITA */

				$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Empresa_607";
				$Rnc_Empresa_607 = $_POST["RncEmpresa607"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["Rnc_Factura_607"];
				$taNCF_607 = "NCF_607";
				
			

			$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);

		if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["NCF_607"] == $NCF_607){
				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "ingresodiario";
											}

											});

								</script>';
				exit;

		}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */
	$tabla = "608_empresas";
		$taRnc_Empresa_608 = "Rnc_Empresa_608";
		$Rnc_Empresa_608 = $_POST["RncEmpresa607"];
		$taNCF_608 = "NCF_608";
		$NCF_608 = $NCF_607;

$FacturaRepetida = Modelo608::MdlfacturaRepetida608($tabla, $taRnc_Empresa_608, $Rnc_Empresa_608, $taNCF_608, $NCF_608);

if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida["NCF_608"] == $NCF_608 && $FacturaRepetida["Estatus"] != "2"){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 608 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "registro-607";
											}

											});

								</script>';


		exit;

}
if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida["NCF_608"] == $NCF_608 && $FacturaRepetida["Estatus"] == "2"){
$tabla = "608_empresas";
$id = "id";
$id_608 = $FacturaRepetida["id"];

$respuesta = Modelo608::mdlBorrar608($tabla, $id, $id_608);
		
 }


		/***INICIO VALIDACION QUE EL ASIENTO NO SE REPITA***/

				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa= $_POST["RncEmpresa607"];
				$taNAsiento = "NAsiento";
				$NAsiento = $_POST["NAsiento"];
			

			$AsientoRepetido = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento);

		foreach ($AsientoRepetido  as $key => $value) {
		
				if($value["Rnc_Empresa_LD"] == $Rnc_Empresa &&  $value["NAsiento"] == $NAsiento){

						echo '<script>
										swal({

											type: "error",
											title: "Este Código de Asiento ya esta registrado!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ingresodiario";
													}

													});

										</script>';
								exit;

				}
		}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */



		/*** INICIO DE ASIENTOS VACIOS***************/

				if(empty($_POST["listaCuentas"]) || $_POST["listaCuentas"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN ASIENTO DIARIO REGISTRADO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ingresodiario";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/
		/*** INICIO MONTO DE DEBITO Y CREDITO IGUALES***************/

				if($_POST["totaldebito"] != $_POST["totalcredito"]){

						echo '<script>
										swal({

											type: "error",
											title: "El Saldo de Total Debito y Total Credito deben ser Iguales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ingresodiario";
													}

													});

										</script>';
								exit;

				
			}
		/****FIN MONTO DE DEBITO Y CREDITO IGUALES ************/

		/*****VALIDACION DE LOS ASIENTOS DIARIOS*******/

		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			if($value["debito"] == 0 && $value["credito"] == 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ingresodiario";
													}

													});

										</script>';
								exit;

			}
			if($value["debito"] != 0 && $value["credito"] != 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor mayor a cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ingresodiario";
													}

													});

										</script>';
								exit;

			}

		}
		/*****FIN DE LOS ASIENTOS DIARIOS*******/
		



		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/


		$Extraer_NCF_607 = substr($NCF607 , 0, 3);

		if($Extraer_NCF_607 == "B04" && $_POST["NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "B03" && $_POST["NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO B03 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "E34" && $_POST["NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "E33" && $_POST["NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO E33 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;  
		}

		/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturadia_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Rnc_Factura_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[0-9]+$/', $CodigoNCF))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;
	}	
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/
	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaFacturames_607"], 0, 4);
	$fechames = substr($_POST["FechaFacturames_607"], -2);

	if(strlen($_POST["FechaFacturames_607"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
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
									window.location = "ingresodiario";
													
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
									window.location = "ingresodiario";
													
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
									window.location = "ingresodiario";
													
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
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia_607"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "ingresodiario";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_607"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_607"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_cliente_607"] == 1 && strlen($_POST["Rnc_Factura_607"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_cliente_607"] == 2 && strlen($_POST["Rnc_Factura_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["NCF_607"], 0, 1) == "B" && strlen($_POST["NCF_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["NCF_607"], 0, 1) == "E" && strlen($_POST["NCF_607"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/

	$Monto_Facturado_607 = $_POST["Monto_Facturado_607"];
								
	$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

	$Otros_Impuestos_607 = $Monto_Facturado_607 * 0.1;
	
	
	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	$CalculoOtros = bcdiv($Otros_Impuestos_607 , '1', 2);

	if($_POST["ITBIS_Facturado_607"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
				

			exit; 
		 }
		 
	if($_POST["Otros_Impuestos_607"] > $CalculoOtros){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO De Otros Impuestos no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
								</script>';	
				

			exit; 
	}




	$Forma_De_Pago_607 = $_POST["Forma_De_Pago_607"];

	$totalFacturado = $_POST["ITBIS_Facturado_607"] + $Monto_Facturado_607;


						switch ($Forma_De_Pago_607){
							case "01":
       							$Tipo_Pago_607 = "01-EFECTIVO";
       							$Efectivo = $totalFacturado;
       							$CHEQUES = "0.00";
       							$TARJETA = "0.00";
       							$CREDITO = "0.00";
       							$BONOS = "0.00";
       							$PERMUTAS = "0.00";
       							$OTRASFORMAS = "0.00";
							break;

        					case "02":
       							$Tipo_Pago_607 = "02-CHEQUES/TRANSFERENCIAS/DEPOSITO";
       							$Efectivo = "0.00";
       							$CHEQUES = $totalFacturado;
       							$TARJETA = "0.00";
       							$CREDITO = "0.00";
       							$BONOS = "0.00";
       							$PERMUTAS = "0.00";
       							$OTRASFORMAS = "0.00";

        					break;

        					case "03":
       							$Tipo_Pago_607 = "03-TARJETA CREDITO/DEBITO";
       							$Efectivo = "0.00";
       							$CHEQUES = "0.00";
       							$TARJETA = $totalFacturado;
       							$CREDITO = "0.00";
       							$BONOS = "0.00";
       							$PERMUTAS = "0.00";
       							$OTRASFORMAS = "0.00";
        					break;

        					case "04":
       							$Tipo_Pago_607 = "04-VENTA A CREDITO";
       							$Efectivo = "0.00";
       							$CHEQUES = "0.00";
       							$TARJETA = "0.00";
       							$CREDITO = $totalFacturado;
       							$BONOS = "0.00";
       							$PERMUTAS = "0.00";
       							$OTRASFORMAS = "0.00";
        					break;

        					case "05":
       							$Tipo_Pago_607 = "05-BONOS CERTIFICADOS REGALOS";
       							$Efectivo = "0.00";
       							$CHEQUES = "0.00";
       							$TARJETA = "0.00";
       							$CREDITO = "0.00";
       							$BONOS = $totalFacturado;
       							$PERMUTAS = "0.00";
       							$OTRASFORMAS = "0.00";
        					break;
        										
        					case "06":       											
       							$Tipo_Pago_607 = "06-PERMUTAS";
       							$Efectivo = "0.00";
       							$CHEQUES = "0.00";
       							$TARJETA = "0.00";
       							$CREDITO = "0.00";
       							$BONOS = "0.00";
       							$PERMUTAS = $totalFacturado;
       							$OTRASFORMAS = "0.00";
        					break;

							case "07":       											
       							$Tipo_Pago_607 = "07-OTRAS FORMAS DE VENTAS";
       							$Efectivo = "0.00";
       							$CHEQUES = "0.00";
       							$TARJETA = "0.00";
       							$CREDITO = "0.00";
       							$BONOS = "0.00";
       							$PERMUTAS = "0.00";
       							$OTRASFORMAS = $totalFacturado;
        					break;

        										
							}

											
						if($Extraer_NCF_607 == "B04"){

								$NCF_Modificado_607 = $_POST["NCF_Modificado_607"];
						}else{
									$NCF_Modificado_607 = "";
						}

											
						if(isset($_POST["B04MeMa_607"]) && $_POST["B04MeMa_607"] > 0){
								$B04MeMa_607 = $_POST["B04MeMa_607"];
						}else{
								$B04MeMa_607 = "";
						} 

						$Transaccion_607 = $_POST["Transaccion_607"];
						if(!empty($Transaccion_607)){

							$Transaccion_607 = $_POST["Transaccion_607"];
						} else{

							$Transaccion_607 = "3";
						}


										
				$Fecha_AnoMesDia_607  = $_POST["FechaFacturames_607"].$_POST["FechaFacturadia_607"];
				$Fecha_Ret_AnoMesDia_607 = "";
				$Fecha_Retencion_AnoMes = "";
				$Fecha_Retencion_Dia_607 = "";
				$ITBIS_Retenido_Tercero_607 = "0.00";			
				$ITBIS_Percibido_607 = "0.00";			
				$Retencion_Renta_por_Terceros_607 = "0.00";			
				$ISR_Percibido_607 = "0.00";			
				$Impuesto_Selectivo_al_Consumo_607 = "0.00";			
				$Otros_Impuestos_607 = $_POST["Otros_Impuestos_607"];
				$Monto_Propina_Legal_607 = "0.00";
				$Estatus_607 = "";
				$Fecha_Retencion_AnoMes_607 = "";
				$Fecha_Retencion_Dia_607 = "";
				$Porc_ITBIS_Retenido_607 = "0.00";
				$Porc_ISR_Retenido_607 = "0.00";
				$Accion_607 = "CREADO";
				$Codigo_Factura = 0;
				$Modulo = "DIARIO";
			
$tabla = "607_empresas";
$datos = array("Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Tipo_cliente_607"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $_POST["Tipo_de_Ingreso"],
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => $Monto_Facturado_607,
"ITBIS_Facturado_607" => $_POST["ITBIS_Facturado_607"],
"ITBIS_Retenido_Tercero_607" => $ITBIS_Retenido_Tercero_607,
"ITBIS_Percibido_607" => $ITBIS_Percibido_607,
"Retencion_Renta_por_Terceros_607" => $Retencion_Renta_por_Terceros_607,
"ISR_Percibido_607" => $ISR_Percibido_607,
"Impuesto_Selectivo_al_Consumo_607" => $Impuesto_Selectivo_al_Consumo_607,
"Otros_Impuestos_607" => $_POST["Otros_Impuestos_607"],
"Monto_Propina_Legal_607" => $Monto_Propina_Legal_607,
"Efectivo" => $Efectivo,
"Cheque_Transferencia_Deposito_607" => $CHEQUES,
"Tarjeta_Debito_Credito_607" => $TARJETA,
"Venta_a_Credito_607" => $CREDITO,
"Bonos_607" => $BONOS,
"Permuta_607" => $PERMUTAS,
"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
"Estatus_607" => $Estatus_607,
"Fecha_comprobante_AnoMes_607" => $_POST["FechaFacturames_607"],
"Fecha_Comprobante_Dia_607" => $_POST["FechaFacturadia_607"],
"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes,
"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
"EXTRAER_NCF_607" => $NCF607,
"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Transaccion_607" => $Transaccion_607,
"Referencia_Pago_607" => $_POST["Referencia_607"],
"Banco_607" => $_POST["agregarBanco"],
"Fecha_Trans_AnoMes_607" => $_POST["FechaPagomes607"],
"Fecha_trans_dia_607" => $_POST["FechaPagodia607"],
"Descripcion_607" => $_POST["Descripcion"],
"Nombre_Empresa_607" => $_POST["Nombre_Empresa_607"],
"Usuario_Creador" => $_POST["UsuarioLogueado"],
"Accion_607" => $Accion_607,
"Codigo_Factura" => $Codigo_Factura,
"Modulo" => $Modulo);

$respuesta =  Modelo607::MdlRegistrar607($tabla, $datos);

	if($respuesta == "ok"){

		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["FechaFacturames_607"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";

$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);

	}else{
					echo '<script>
								swal({

									type: "error",
									title: "¡No se Realizo el Registro de la Factura correctamente!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ingresodiario";
													
													});
												
								</script>';	
					exit;

		}


		/**********************FIN DE CARGA DEL 607 *************************************/
		/**********************CONSULTAS DE FACTURA RNC Y NCF Y ID******************/
			$tabla = "607_empresas";
			$taRnc_Empresa_607 = "Rnc_Empresa_607";
			$Rnc_Empresa_607 = $_POST["RncEmpresa607"];
			$taRnc_Factura_607 = "Rnc_Factura_607";
			$Rnc_Factura_607 = $_POST["Rnc_Factura_607"];
			$taNCF_607 = "NCF_607";
			

			$Consulta607 = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);


			if($Consulta607 != false && $Consulta607["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $Consulta607["Rnc_Factura_607"] == $Rnc_Factura_607 && $Consulta607["NCF_607"] == $NCF_607){

			
			$id_registro607 = $Consulta607["id"];
			
			}else{

	$tabla = "607_empresas";
	$taRnc_Empresa_607 = "Rnc_Empresa_607";
	$taRnc_Factura_607 = "Rnc_Factura_607";
	$taNCF_607 = "NCF_607";


	$respuesta = Modelo607::mdlBorrarLD607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607, $taNCF_607, $NCF_607);
				

				echo '<script>
								swal({

									type: "error",
									title: "¡Error en la consulta a la base de datos de la factura!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;




			}

		/**********************FIN CONSULTAS DE FACTURA RNC Y NCF Y ID******************/


		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {
				/**consulta proyecto***/
			if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $value["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $value["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}

			/*******consultar banco*******************/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			$Rnc_Empresa_LD = $_POST["RncEmpresa607"];
            $valorid_grupo = $value["idgrupo"];
            $valorid_categoria = $value["idcategoria"];
            $valorid_generica = $value["idgenerica"];
            $valorid_cuenta = $value["idcuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco !=false){
             	$id_banco = $banco["id"];


             }else{
             	$id_banco = $_POST["agregarBanco"];


             }
			

	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DDI";
	$Accion = "CREADA";
	$debito = bcdiv($value["debito"], '1', 2);
	$credito = bcdiv($value["credito"], '1', 2);


	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresa607"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Empresa_607"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $value["idgrupo"],
					"id_categoria" => $value["idcategoria"],
					"id_generica" => $value["idgenerica"],
					"id_cuenta" => $value["idcuenta"],
					"Nombre_Cuenta" => $value["nombrecuenta"],
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_607"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes607"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia607"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	
		}
		if($respuesta == "ok"){
		/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DDI";
			
			
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa606"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" =>  $_POST["CodAsiento"]);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
									
		if($respuesta == "ok"){
				unset($_SESSION["FechaFacturadia_607"]); 
				unset($_SESSION["Rnc_Factura_607"] ); 
				unset($_SESSION["CodigoNCF607"]);
				unset($_SESSION["NCF_Modificado_607"]); 
				unset($_SESSION["Monto_Facturado_607"]); 
				unset($_SESSION["ITBIS_Facturado_607"]); 
				unset($_SESSION["Otros_Impuestos_607"]); 
				unset($_SESSION["Nombre_Empresa_607"]);
				unset($_SESSION["B04MeMa_607"]);
				unset($_SESSION["FechaPagodia607"]);
				unset($_SESSION["Referencia_607"]);
				unset($_SESSION["Descripcion"]);
 		 		unset($_SESSION["listaCuentas"]);
 		 		

 		 								
				echo '<script>
						swal({			
							type: "success",
							title: "¡El Registro 607 con los Asientos Se Guardo Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "ingresodiario";
							}
							});
						</script>';


	}
	}

	}/*CIERRE DE ISSET*/


}/*CIERRE DE FUNCION ctringresodiario*/

static function ctrEditaringresodiario(){

	if(isset($_POST["Editar_id_607"])){
/******* VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO I
****************************************************************************************************************/

		if($_POST["Proyecto"] == 1){
			$libromayor = "libromayorpro";

		}else{
			$libromayor = "libromayor";	
		}
				/*VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Empresa_607";
				$Rnc_Empresa_607 = $_POST["Editar-RncEmpresa607"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["Editar-Rnc_Factura_607"];
				$taNCF_607 = "NCF_607";
				$NCF_607 = $_POST["Editar-NCF_607"];

			

			$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607, $taNCF_607, $NCF_607);

		if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["NCF_607"] == $NCF_607 && $FacturaRepetida["id"] != $_POST["Editar_id_607"]){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "'.$libromayor.'";
											}

											});

								</script>';



								exit;

		}

		/*** INICIO MONTO DE DEBITO Y CREDITO IGUALES***************/

				if($_POST["totaldebito"] != $_POST["totalcredito"]){

						echo '<script>
										swal({

											type: "error",
											title: "El Saldo de Total Debito y Total Credito deben ser Iguales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

				
			}
		/****FIN MONTO DE DEBITO Y CREDITO IGUALES ************/

		/*****VALIDACION DE LOS ASIENTOS DIARIOS*******/

		if($_POST["listaCuentas"] != ""){

		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			if($value["debito"] == 0 && $value["credito"] == 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

			}
			if($value["debito"] != 0 && $value["credito"] != 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor mayor a cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

			}

		}
		}
		/*****FIN DE LOS ASIENTOS DIARIOS*******/
		

		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_607 = substr($_POST["Editar-NCF_607"], 0, 3);

			if($Extraer_NCF_607 == "B04" && $_POST["Editar-NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_607 == "E34" && $_POST["Editar-NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;			
			}
			if($Extraer_NCF_607 == "B03" && $_POST["Editar-NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO B03 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_607 == "E33" && $_POST["Editar-NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO E33 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;									
			}

	/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-FechaFacturames_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-FechaFacturadia_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-Rnc_Factura_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[BE0-9]+$/', $_POST["Editar-NCF_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}	
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["Editar-FechaFacturames_607"], 0, 4);
	$fechames = substr($_POST["Editar-FechaFacturames_607"], -2);

	if(strlen($_POST["Editar-FechaFacturames_607"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;

	}
	if($fechames >  12){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["Editar-FechaFacturadia_607"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "'.$libromayor.'";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["Editar-FechaFacturadia_607"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["Editar-FechaFacturadia_607"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Editar-Tipo_cliente_607"] == 1 && strlen($_POST["Editar-Rnc_Factura_607"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Editar-Tipo_cliente_607"] == 2 && strlen($_POST["Editar-Rnc_Factura_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";


													
													});


												
								</script>';	
			exit;	

							
	}


	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["Editar-NCF_607"], 0, 1) == "B" && strlen($_POST["Editar-NCF_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["Editar-NCF_607"], 0, 1) == "E" && strlen($_POST["Editar-NCF_607"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
								});

	
								</script>';
				exit;
	}



	$Monto_Facturado_607 = $_POST["Editar-Monto_Facturado_607"];
								
	$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

	$Otros_Impuestos_607 = $Monto_Facturado_607 * 0.1;

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	$CalculoOtros = bcdiv($Otros_Impuestos_607 , '1', 2);

	if($_POST["Editar-ITBIS_Facturado_607"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
				

			exit; 
		 }
		 
	if($_POST["Editar-Otros_Impuestos_607"] > $CalculoOtros){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO De Otros Impuestos no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
								</script>';	
				

			exit; 
	}
$Forma_De_Pago_607 = $_POST["Editar-Forma_De_Pago_607"];
$totalFacturado = $_POST["Editar-ITBIS_Facturado_607"] + $Monto_Facturado_607;


											switch ($Forma_De_Pago_607){
												case "01":
       											$Tipo_Pago_607 = "01-EFECTIVO";
       											$Efectivo = $totalFacturado;
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";


        										break;

        										case "02":
       											$Tipo_Pago_607 = "02-CHEQUES/TRANSFERENCIAS/DEPOSITO";
       											$Efectivo = "0.00";
       											$CHEQUES = $totalFacturado;
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";

        										break;

        										case "03":
       											$Tipo_Pago_607 = "03-TARJETA CREDITO/DEBITO";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = $totalFacturado;
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";
        										break;

        										case "04":
       											$Tipo_Pago_607 = "04-VENTA A CREDITO";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = $totalFacturado;
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";
        										break;

        										case "05":
       											$Tipo_Pago_607 = "05-BONOS CERTIFICADOS REGALOS";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = $totalFacturado;
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";
        										break;
        										
        										case "06":       											
       											$Tipo_Pago_607 = "06-PERMUTAS";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = $totalFacturado;
       											$OTRASFORMAS = "0.00";
        										break;

        										case "07":       											
       											$Tipo_Pago_607 = "07-OTRAS FORMAS DE VENTAS";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = $totalFacturado;
        										break;

        										
											}

											$Extraer_NCF_607 = substr($_POST["Editar-NCF_607"], 0, 3);

											if($Extraer_NCF_607 == "B04"){

												$NCF_Modificado_607 = $_POST["Editar-NCF_Modificado_607"];
											}else{
													$NCF_Modificado_607 = "";
												 }

											
											if(isset($_POST["Editar-B04MeMa_607"]) && !empty($_POST["Editar-B04MeMa_607"])){
												$B04MeMa_607 = $_POST["Editar-B04MeMa_607"];
											}else{
												$B04MeMa_607 = "";
											} 

											$Transaccion_607 = $_POST["Editar-Transaccion_607"];
											if(!empty($Transaccion_607)){

												$Transaccion_607 = $_POST["Editar-Transaccion_607"];
											} else{

												$Transaccion_607 = "3";
											}

										
$Fecha_AnoMesDia_607  = $_POST["Editar-FechaFacturames_607"];
$_POST["Editar-FechaFacturadia_607"];
$Fecha_Ret_AnoMesDia_607 = "";
$Fecha_Retencion_AnoMes = "";
$Fecha_Retencion_Dia_607 = "";
$ITBIS_Retenido_Tercero_607 = "0.00";
$ITBIS_Percibido_607 = "0.00";
$Retencion_Renta_por_Terceros_607 = "0.00";
$ISR_Percibido_607 = "0.00";
$Impuesto_Selectivo_al_Consumo_607 = "0.00";
$Otros_Impuestos_607 = $_POST["Editar-Otros_Impuestos_607"];
$Monto_Propina_Legal_607 = "0.00";
$Estatus_607 = "";
$Fecha_Retencion_AnoMes_607 = "";
$Fecha_Retencion_Dia_607 = "";
$Porc_ITBIS_Retenido_607 = "0.00";
$Porc_ISR_Retenido_607 = "0.00";
$Accion_607 = "EDITADO";
$Codigo_Factura = 0;
$Modulo = "DIARIO";
      											
$tabla = "607_empresas";
$datos = array("id" => $_POST["Editar_id_607"],
"Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Editar-Tipo_cliente_607"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $_POST["Editar-Tipo_de_Ingreso"],
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => $Monto_Facturado_607,
"ITBIS_Facturado_607" => $_POST["Editar-ITBIS_Facturado_607"],
"ITBIS_Retenido_Tercero_607" => $ITBIS_Retenido_Tercero_607,
"ITBIS_Percibido_607" => $ITBIS_Percibido_607,
"Retencion_Renta_por_Terceros_607" => $Retencion_Renta_por_Terceros_607,
"ISR_Percibido_607" => $ISR_Percibido_607,
"Impuesto_Selectivo_al_Consumo_607" => $Impuesto_Selectivo_al_Consumo_607,
"Otros_Impuestos_607" => $_POST["Editar-Otros_Impuestos_607"],
"Monto_Propina_Legal_607" => $Monto_Propina_Legal_607,
"Efectivo" => $Efectivo,
"Cheque_Transferencia_Deposito_607" => $CHEQUES,
"Tarjeta_Debito_Credito_607" => $TARJETA,
"Venta_a_Credito_607" => $CREDITO,
"Bonos_607" => $BONOS,
"Permuta_607" => $PERMUTAS,
"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
"Estatus_607" => $Estatus_607,
"Fecha_comprobante_AnoMes_607" => $_POST["Editar-FechaFacturames_607"],
"Fecha_Comprobante_Dia_607" => $_POST["Editar-FechaFacturadia_607"],
"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes,
"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
"EXTRAER_NCF_607" => $Extraer_NCF_607,
"extraer_forma_de_pago_607" => $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Transaccion_607" => $Transaccion_607,
"Referencia_Pago_607" => $_POST["Editar-Referencia"],
"Banco_607" => $_POST["Editar-agregarBanco"],
"Fecha_Trans_AnoMes_607" => $_POST["Editar-FechaPagomes607"],
"Fecha_trans_dia_607" => $_POST["Editar-FechaPagodia607"],
"Descripcion_607" => $_POST["Editar-Descripcion"],
"Nombre_Empresa_607" => $_POST["Nombre_Empresa_607"],
"Usuario_Creador" => $_POST["UsuarioLogueado"],
"Accion_607" => $Accion_607,
"Codigo_Factura" => $Codigo_Factura,
"Modulo" => $Modulo);


$respuesta =  Modelo607::MdlEditar607($tabla, $datos);

	if($respuesta == "ok"){

		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["Editar-FechaFacturames_607"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";
		
		$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);
	}

/************FIN FIN FIN FIN FIN FIN FIN FIN EDITAR 607 607 607 607 *************************************/

if(empty($_POST["listaCuentas"])){

     
    
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_607"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_607;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDI";

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $Rnc_Factura_607;

	$taNCF = "NCF";
	$NCF = $NCF_607;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	$Accion = "EDITADO";

	foreach ($respuesta as $key => $value) {

			$datos = array("id" => $value["id"],
			"Rnc_Factura" => $Rnc_Factura_607,
			"NCF" => $NCF_607,
			"Nombre_Empresa" => $_POST["Nombre_Empresa_607"],
			"Fecha_AnoMes_LD" => $_POST["Editar-FechaFacturames_607"],
			"Fecha_dia_LD" => $_POST["Editar-FechaFacturadia_607"],
			"ObservacionesLD" => $_POST["Editar-Descripcion"],
			"Tipo_Transaccion" => $Transaccion_607,
			"Fecha_AnoMes_Trans" => $_POST["Editar-FechaPagomes607"],
			"Fecha_dia_Trans" => $_POST["Editar-FechaPagodia607"],
			"id_banco" => $_POST["Editar-agregarBanco"],
			"referencia" => $_POST["Editar-Referencia"],
			"Usuario_Creador" => $_POST["UsuarioLogueado"],
			"Accion" => $Accion);

	$respuesta = ModeloDiario::mdlEditarGastoDiarioSinAsientos($tabla, $datos);

	} 
	if($respuesta == "ok"){
		echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el registro 607 Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";


													}

													});

										</script>';
			exit;
		}


} else {


	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_607"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_607;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDI";

	 
	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

	$listaCuentas =  json_decode($_POST["listaCuentas"], true);
	foreach ($listaCuentas as $key => $value) {
			/**consulta proyecto***/
			if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $value["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $value["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}

			/*******consultar banco*******************/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			$Rnc_Empresa_LD = $Rnc_Empresa_607;
            $valorid_grupo = $value["idgrupo"];
            $valorid_categoria = $value["idcategoria"];
            $valorid_generica = $value["idgenerica"];
            $valorid_cuenta = $value["idcuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco !=false){
             	
             	$id_banco = $banco["id"];

             }else{
             	$id_banco = $_POST["Editar-agregarBanco"];


             }


	$tabla = "librodiario_empresas";
	$ObservacionesLD =  $_POST["Editar-Descripcion"];
	$Extraer = "DDI";
	$Accion = "EDITADA";
	$debito = bcdiv($value["debito"], '1', 2);
	$credito = bcdiv($value["credito"], '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $_POST["Editar_id_607"],
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Empresa_607"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $value["idgrupo"],
					"id_categoria" => $value["idcategoria"],
					"id_generica" => $value["idgenerica"],
					"id_cuenta" => $value["idcuenta"],
					"Nombre_Cuenta" => $value["nombrecuenta"],
					"Fecha_AnoMes_LD" => $_POST["Editar-FechaFacturames_607"],
					"Fecha_dia_LD" => $_POST["Editar-FechaFacturadia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["Editar-FechaPagomes607"],
					"Fecha_dia_Trans" => $_POST["Editar-FechaPagodia607"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Editar-Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	
		}
		

	if($respuesta == "ok"){
		if($_POST["Proyecto"] == 1){
				
				echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el 607 con los Asientos Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayorpro";


													}

													});

										</script>';

			

			}else{
				echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el 607 con los Asientos Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayor";


													}

													});

										</script>';
			

			}

					
							}


}/*CIERRE ELSE*/


}/*CIERRE ISSET*/

}/*CIERRE FUNCION */
static function ctrAsignaringresodiario(){

	if(isset($_POST["Editar_id_607"])){

		
/*******VALIDACIONES DEL FORMULARIO *****************************************/
		
				/*VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Empresa_607";
				$Rnc_Empresa_607 = $_POST["Editar-RncEmpresa607"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["Editar-Rnc_Factura_607"];
				$taNCF_607 = "NCF_607";
				$NCF_607 = $_POST["Editar-NCF_607"];

			

			$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607, $taNCF_607, $NCF_607);

		if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["NCF_607"] == $NCF_607 && $FacturaRepetida["id"] != $_POST["Editar_id_607"]){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "registro-607";
											}

											});

								</script>';



								exit;

		}

		/*** INICIO MONTO DE DEBITO Y CREDITO IGUALES***************/

				if($_POST["totaldebito"] != $_POST["totalcredito"]){

						echo '<script>
										swal({

											type: "error",
											title: "El Saldo de Total Debito y Total Credito deben ser Iguales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "registro-607";
													}

													});

										</script>';
								exit;

				
			}
		/****FIN MONTO DE DEBITO Y CREDITO IGUALES ************/
		/*****VALIDACION DE LOS ASIENTOS DIARIOS*******/

		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			if($value["debito"] == 0 && $value["credito"] == 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "registro-607";
													}

													});

										</script>';
								exit;

			}
			if($value["debito"] != 0 && $value["credito"] != 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor mayor a cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "registro-607";
													}

													});

										</script>';
								exit;

			}

		}
		/*****FIN DE LOS ASIENTOS DIARIOS*******/
		/*** INICIO DE ASIENTOS VACIOS***************/

		if(empty($_POST["listaCuentas"]) || $_POST["listaCuentas"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UNA CUENTA REGISTRADO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "reporte-607";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/


		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_607 = substr($_POST["Editar-NCF_607"], 0, 3);

			if($Extraer_NCF_607 == "B04" && $_POST["Editar-NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_607 == "E34" && $_POST["Editar-NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;			
			}
			if($Extraer_NCF_607 == "B03" && $_POST["Editar-NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO B03 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_607 == "E33" && $_POST["Editar-NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO E33 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;									
			}

	/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-FechaFacturames_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-FechaFacturadia_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-Rnc_Factura_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[BE0-9]+$/', $_POST["Editar-NCF_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;
	}	
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["Editar-FechaFacturames_607"], 0, 4);
	$fechames = substr($_POST["Editar-FechaFacturames_607"], -2);

	if(strlen($_POST["Editar-FechaFacturames_607"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano <  2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["Editar-FechaFacturadia_607"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "registro-607";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["Editar-FechaFacturadia_607"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["Editar-FechaFacturadia_607"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Editar-Tipo_cliente_607"] == 1 && strlen($_POST["Editar-Rnc_Factura_607"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Editar-Tipo_cliente_607"] == 2 && strlen($_POST["Editar-Rnc_Factura_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["Editar-NCF_607"], 0, 1) == "B" && strlen($_POST["Editar-NCF_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["Editar-NCF_607"], 0, 1) == "E" && strlen($_POST["Editar-NCF_607"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
								});

	
								</script>';
				exit;
	}

	$Monto_Facturado_607 = $_POST["Editar-Monto_Facturado_607"];
								
	$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

	$Otros_Impuestos_607 = $Monto_Facturado_607 * 0.1;

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	$CalculoOtros = bcdiv($Otros_Impuestos_607 , '1', 2);

	if($_POST["Editar-ITBIS_Facturado_607"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
												
								</script>';	
				

			exit; 
		 }
		 
	if($_POST["Editar-Otros_Impuestos_607"] > $CalculoOtros){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO De Otros Impuestos no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});
								</script>';	
				

			exit; 
	}
$Forma_De_Pago_607 = $_POST["Editar-Forma_De_Pago_607"];

											switch ($Forma_De_Pago_607){
												case "01":
       											$Tipo_Pago_607 = "01-EFECTIVO";
       											$Efectivo = $_POST["Editar-Monto_Facturado_607"];
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";


        										break;

        										case "02":
       											$Tipo_Pago_607 = "02-CHEQUES/TRANSFERENCIAS/DEPOSITO";
       											$Efectivo = "0.00";
       											$CHEQUES = $_POST["Editar-Monto_Facturado_607"];
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";

        										break;

        										case "03":
       											$Tipo_Pago_607 = "03-TARJETA CREDITO/DEBITO";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = $_POST["Editar-Monto_Facturado_607"];
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";
        										break;

        										case "04":
       											$Tipo_Pago_607 = "04-VENTA A CREDITO";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = $_POST["Editar-Monto_Facturado_607"];
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";
        										break;

        										case "05":
       											$Tipo_Pago_607 = "05-BONOS CERTIFICADOS REGALOS";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = $_POST["Editar-Monto_Facturado_607"];
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = "0.00";
        										break;
        										
        										case "06":       											
       											$Tipo_Pago_607 = "06-PERMUTAS";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = $_POST["Editar-Monto_Facturado_607"];
       											$OTRASFORMAS = "0.00";
        										break;

        										case "07":       											
       											$Tipo_Pago_607 = "07-OTRAS FORMAS DE VENTAS";
       											$Efectivo = "0.00";
       											$CHEQUES = "0.00";
       											$TARJETA = "0.00";
       											$CREDITO = "0.00";
       											$BONOS = "0.00";
       											$PERMUTAS = "0.00";
       											$OTRASFORMAS = $_POST["Editar-Monto_Facturado_607"];
        										break;

        										
											}

											$Extraer_NCF_607 = substr($_POST["Editar-NCF_607"], 0, 3);

											if($Extraer_NCF_607 == "B04"){

												$NCF_Modificado_607 = $_POST["Editar-NCF_Modificado_607"];
											}else{
													$NCF_Modificado_607 = "";
												 }

											
											if(isset($_POST["Editar-B04MeMa_607"]) && !empty($_POST["Editar-B04MeMa_607"])){
												$B04MeMa_607 = $_POST["Editar-B04MeMa_607"];
											}else{
												$B04MeMa_607 = "";
											} 

											$Transaccion_607 = $_POST["Editar-Transaccion_607"];
											if(!empty($Transaccion_607)){

												$Transaccion_607 = $_POST["Editar-Transaccion_607"];
											} else{

												$Transaccion_607 = "3";
											}


										
									$Fecha_AnoMesDia_607  = $_POST["Editar-FechaFacturames_607"].$_POST["Editar-FechaFacturadia_607"];
									$Fecha_Ret_AnoMesDia_607 = "";
									$Fecha_Retencion_AnoMes = "";
									$Fecha_Retencion_Dia_607 = "";
									$ITBIS_Retenido_Tercero_607 = "0.00";
									$ITBIS_Percibido_607 = "0.00";
									$Retencion_Renta_por_Terceros_607 = "0.00";
									$ISR_Percibido_607 = "0.00";
									$Impuesto_Selectivo_al_Consumo_607 = "0.00";
									$Otros_Impuestos_607 = $_POST["Editar-Otros_Impuestos_607"];
									$Monto_Propina_Legal_607 = "0.00";
									$Estatus_607 = "";
									$Fecha_Retencion_AnoMes_607 = "";
									$Fecha_Retencion_Dia_607 = "";
									$Porc_ITBIS_Retenido_607 = "0.00";
									$Porc_ISR_Retenido_607 = "0.00";
									$Accion_607 = "EDITADO";
									$Codigo_Factura = 0;
									$Modulo = "DIARIO";

	
       								    											
$tabla = "607_empresas";
$datos = array("id" => $_POST["Editar_id_607"],
"Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Editar-Tipo_cliente_607"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $_POST["Editar-Tipo_de_Ingreso"],
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => $Monto_Facturado_607,
"ITBIS_Facturado_607" => $_POST["Editar-ITBIS_Facturado_607"],
"ITBIS_Retenido_Tercero_607" => $ITBIS_Retenido_Tercero_607,
"ITBIS_Percibido_607" => $ITBIS_Percibido_607,
"Retencion_Renta_por_Terceros_607" => $Retencion_Renta_por_Terceros_607,
"ISR_Percibido_607" => $ISR_Percibido_607,
"Impuesto_Selectivo_al_Consumo_607" => $Impuesto_Selectivo_al_Consumo_607,
"Otros_Impuestos_607" => $_POST["Editar-Otros_Impuestos_607"],
"Monto_Propina_Legal_607" => $Monto_Propina_Legal_607,
"Efectivo" => $Efectivo,
"Cheque_Transferencia_Deposito_607" => $CHEQUES,
"Tarjeta_Debito_Credito_607" => $TARJETA,
"Venta_a_Credito_607" => $CREDITO,
"Bonos_607" => $BONOS,
"Permuta_607" => $PERMUTAS,
"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
"Estatus_607" => $Estatus_607,
"Fecha_comprobante_AnoMes_607" => $_POST["Editar-FechaFacturames_607"],
"Fecha_Comprobante_Dia_607" => $_POST["Editar-FechaFacturadia_607"],
"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes,
"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
"EXTRAER_NCF_607" => $Extraer_NCF_607,
"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Transaccion_607" => $Transaccion_607,
"Referencia_Pago_607" => $_POST["Editar-Referencia_607"],
"Banco_607" => $_POST["Editar-agregarBanco"],
"Fecha_Trans_AnoMes_607" => $_POST["Editar-FechaPagomes607"],
"Fecha_trans_dia_607" => $_POST["Editar-FechaPagodia607"],
"Descripcion_607" => $_POST["Editar-Descripcion"],
"Nombre_Empresa_607" => $_POST["Nombre_Empresa_607"],
"Usuario_Creador" => $_POST["UsuarioLogueado"],
"Accion_607" => $Accion_607,
"Codigo_Factura" => $Codigo_Factura,
"Modulo" => $Modulo);


$respuesta =  Modelo607::MdlEditar607($tabla, $datos);

	if($respuesta == "ok"){

		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["Editar-FechaFacturames_607"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";
		
		$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);
	}

/************FIN FIN FIN FIN FIN FIN FIN FIN EDITAR 607 607 607 607 *************************************/

if(empty($_POST["listaCuentas"])){

     
    
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_607"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_607;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDI";

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $Rnc_Factura_607;

	$taNCF = "NCF";
	$NCF = $NCF_607;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	$Accion = "EDITADO";

	

	foreach ($respuesta as $key => $value) {

			$datos = array("id" => $value["id"],
			"Rnc_Factura" => $Rnc_Factura_607,
			"NCF" => $NCF_607,
			"Nombre_Empresa" => $_POST["Nombre_Empresa_607"],
			"Fecha_AnoMes_LD" => $_POST["Editar-FechaFacturames_607"],
			"Fecha_dia_LD" => $_POST["Editar-FechaFacturadia_607"],
			"ObservacionesLD" => $_POST["Editar-Descripcion"],
			"Tipo_Transaccion" => $Transaccion_607,
			"Fecha_AnoMes_Trans" => $_POST["Editar-FechaPagomes607"],
			"Fecha_dia_Trans" => $_POST["Editar-FechaPagodia607"],
			"id_banco" => $_POST["Editar-agregarBanco"],
			"Usuario_Creador" => $_POST["UsuarioLogueado"],
			"Accion" => $Accion);

	$respuesta = ModeloDiario::mdlEditarGastoDiarioSinAsientos($tabla, $datos);

	} 
	if($respuesta == "ok"){
		if($_POST["Proyecto"] == 1){
			echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el registro 607 Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayorpro";


													}

													});

										</script>';
			exit;
		
		}else{
			echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el registro 607 Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayor";


													}

													});

										</script>';
			exit;
		
		}
		
		}


} else {


	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_607"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_607;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDI";

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $Rnc_Factura_607;

	$taNCF = "NCF";
	$NCF = $NCF_607;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

	$listaCuentas =  json_decode($_POST["listaCuentas"], true);
	foreach ($listaCuentas as $key => $value) {
				/**consulta proyecto***/
			if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $value["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $value["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}

			/*******consultar banco*******************/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			$Rnc_Empresa_LD = $Rnc_Empresa_607;
            $valorid_grupo = $value["idgrupo"];
            $valorid_categoria = $value["idcategoria"];
            $valorid_generica = $value["idgenerica"];
            $valorid_cuenta = $value["idcuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco !=false){
             	
             	$id_banco = $banco["id"];

             }else{
             	$id_banco = $_POST["Editar-agregarBanco"];


             }


	$tabla = "librodiario_empresas";
	$ObservacionesLD =  $_POST["Editar-Descripcion"];
	$Extraer = "DDI";
	$Accion = "EDITADA";
	$debito = bcdiv($value["debito"], '1', 2);
	$credito = bcdiv($value["credito"], '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $_POST["Editar_id_607"],
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Empresa_607"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $value["idgrupo"],
					"id_categoria" => $value["idcategoria"],
					"id_generica" => $value["idgenerica"],
					"id_cuenta" => $value["idcuenta"],
					"Nombre_Cuenta" => $value["nombrecuenta"],
					"Fecha_AnoMes_LD" => $_POST["Editar-FechaFacturames_607"],
					"Fecha_dia_LD" => $_POST["Editar-FechaFacturadia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["Editar-FechaPagomes607"],
					"Fecha_dia_Trans" => $_POST["Editar-FechaPagodia607"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Editar-Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	
		}
		

	if($respuesta == "ok"){
			$tabla = "correlativos_no_fiscal";
			$Tipo_NCF = "DDI";
			$datos = array("Rnc_Empresa" => $_POST["Editar-RncEmpresa607"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $_POST["CodAsiento"]);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);

			if($_POST["Proyecto"] == 1){echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el 607 con los Asientos Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayorpro";


													}

													});

										</script>';
			}else{
				echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el 607 con los Asientos Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayor";


													}

													});

										</script>';
			}


					
							}


}/*CIERRE ELSE*/


}/*CIERRE ISSET*/

}/*CIERRE FUNCION */

static function ctrgastodiario(){

	if(isset($_POST["Rnc_Factura_606"]) && isset($_POST["NAsiento"])){

		 $_SESSION["error"] = "Activo";
		 $_SESSION["FechaFacturames606"] = $_POST["FechaFacturames_606"];
		 $_SESSION["FechaFacturadia_606"] = $_POST["FechaFacturadia_606"];
		 $_SESSION["Rnc_Factura_606"] = $_POST["Rnc_Factura_606"];
		 $_SESSION["NCF606"] = $_POST["NCF606"];
		 $_SESSION["CodigoNCF606"] =  $_POST["CodigoNCF606"];
		 $_SESSION["NCF_Modificado_606"] = $_POST["NCF_Modificado_606"];
		 $_SESSION["Montototalbienes"] = $_POST["Montototalbienes"];
		 $_SESSION["Montototalservicios"] = $_POST["Montototalservicios"];
		 $_SESSION["MontoITBIS"] = $_POST["MontoITBIS"];
		 $_SESSION["Propinalegal"] = $_POST["Propinalegal"];
		 $_SESSION["ImpuestoSelectivo"] = $_POST["ImpuestoSelectivo"];
		 $_SESSION["OtrosImpuestos"] = $_POST["OtrosImpuestos"];
		 $_SESSION["Nombre_Empresa_606"] = $_POST["Nombre_Empresa_606"];
		 $_SESSION["Tipo_Suplidor_606"] = $_POST["Tipo_Suplidor_606"];
		 $_SESSION["Tipo_Gasto_606"] = $_POST["Tipo_Gasto_606"];
		 $_SESSION["Forma_De_Pago_606"] = $_POST["Forma_De_Pago_606"];
		 $_SESSION["Transaccion_606"] = $_POST["Transaccion_606"];
 		 $_SESSION["FechaPagomes606"] = $_POST["FechaPagomes606"];
 		 $_SESSION["FechaPagodia606"] = $_POST["FechaPagodia606"];
 		 $_SESSION["Referencia"] = $_POST["Referencia"];
		 $_SESSION["Descripcion"] = $_POST["Descripcion"];
		 $_SESSION["listaCuentas"] = $_POST["listaCuentas"];
		 $_SESSION["ModuloBanco"] = $_POST["ModuloBanco"];
		

		 if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){
		 	 $_SESSION["ITBIS_LLEVADO_A_COSTO"] = $_POST["ITBIS_LLEVADO_A_COSTO"];
		 }

		  if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1){
		 	 $_SESSION["ITBIS_Sujeto_a_Propocionalidad"] = $_POST["ITBIS_Sujeto_a_Propocionalidad"];

		 }

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO  INICIO ****************************************************************************************************************/
$NCF606 = $_POST["NCF606"];
$CodigoNCF = $_POST["CodigoNCF606"];				
				
$NCF_606 = $NCF606.$CodigoNCF;	

		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */

				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 = $_POST["RncEmpresa606"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $_POST["Rnc_Factura_606"];
				$taNCF_606 = "NCF_606";
				
			

			$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);



		if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["Rnc_Factura_606"] == $Rnc_Factura_606 && $FacturaRepetida["NCF_606"] == $NCF_606){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "gastodiario";
											}

											});

								</script>';
						exit;

		}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

		/***INICIO VALIDACION QUE EL ASIENTO NO SE REPITA***/

				$tabla = "librodiario_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_LD";
				$Rnc_Empresa_606 = $_POST["RncEmpresa606"];
				$taNAsiento = "NAsiento";
				$NAsiento = $_POST["NAsiento"];
			

			$AsientoRepetido = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taNAsiento, $NAsiento);

		foreach ($AsientoRepetido  as $key => $value) {
		
				if($value["Rnc_Empresa_LD"] == $Rnc_Empresa_606 &&  $value["NAsiento"] == $NAsiento){

						echo '<script>
										swal({

											type: "error",
											title: "Este Código de Asiento ya esta registrado!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "gastodiario";
													}

													});

										</script>';
								exit;

				}
		}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */



		/*** INICIO DE ASIENTOS VACIOS***************/

				if(empty($_POST["listaCuentas"]) || $_POST["listaCuentas"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN ASIENTO DIARIO REGISTRADO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "gastodiario";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/
		/*** INICIO MONTO DE DEBITO Y CREDITO IGUALES***************/

				if($_POST["totaldebito"] != $_POST["totalcredito"]){

						echo '<script>
										swal({

											type: "error",
											title: "El Saldo del Total Debito y Total Credito deben ser Iguales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "gastodiario";
													}

													});

										</script>';
								exit;

				
			}
		/****FIN MONTO DE DEBITO Y CREDITO IGUALES ************/

		
/*****VALIDACION DE LOS ASIENTOS DIARIOS*******/

		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			if($value["debito"] == 0 && $value["credito"] == 0){

				echo '<script>
										swal({

											type: "error",
											title: "Tiene un asiento Contable donde Debito y Credito son igual a cero!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "gastodiario";
													}

													});

										</script>';
								exit;

			}
			if($value["debito"] != 0 && $value["credito"] != 0){

				echo '<script>
										swal({

											type: "error",
											title: "Tiene un asiento Contable donde Debito y Credito los dos son tienen monto!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "gastodiario";
													}

													});

										</script>';
								exit;

			}

		}
		/*****FIN DE LOS ASIENTOS DIARIOS*******/


		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_606 = $_POST["NCF606"];

			if($Extraer_NCF_606 == "B04" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_606 == "E34" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;			
			}
			if($Extraer_NCF_606 == "B03" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO B03 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_606 == "E33" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO E33 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;									
			}

	/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturadia_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Rnc_Factura_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[0-9]+$/', $_POST["CodigoNCF606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;
	}	
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaFacturames_606"], 0, 4);
	$fechames = substr($_POST["FechaFacturames_606"], -2);

	if(strlen($_POST["FechaFacturames_606"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
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
									window.location = "gastodiario";
													
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
									window.location = "gastodiario";
													
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
									window.location = "gastodiario";
													
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
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia_606"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "gastodiario";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_606"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_606"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Suplidor_606"] == 1 && strlen($_POST["Rnc_Factura_606"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Suplidor_606"] == 2 && strlen($_POST["Rnc_Factura_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["NCF606"], 0, 1) == "B" && strlen($_POST["CodigoNCF606"]) != 8){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["NCF606"], 0, 1) == "E" && strlen($_POST["CodigoNCF606"]) != 10){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
	$Montototalbienes = $_POST["Montototalbienes"];
	$Montototalservicios = $_POST["Montototalservicios"];

	$suma = $Montototalbienes + $Montototalservicios;

	$PorcentajeITBIS = $suma * 0.18;
	$PropinaLegal = $suma * 0.1;

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	$CalculoPropina = bcdiv($PropinaLegal, '1', 2);

	if($_POST["MontoITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});


												
								</script>';	
				

			exit;	


	}
	if($_POST["Propinalegal"] > $CalculoPropina){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO de Propina legal no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});


												
								</script>';	
			exit;	
	}

	

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN ****************************************************************************************************************/
		/* INICIO AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["Rnc_Factura_606"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Empresa_606"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);
			
			if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
				$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

					$respuesta = ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

			}
		/* FIN AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/

		/**********************INICIO DE CARGA DEL 606 **********************************/
		$ValorTipo_Gasto_606 = $_POST["Tipo_Gasto_606"];

											switch ($ValorTipo_Gasto_606){
												case "01":
       											$Tipo_Gasto_606 = "01-GASTOS DE PERSONAL";
       											
        										break;

        										case "02":
       											$Tipo_Gasto_606 = "02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO";
       											
        										break;

        										case "03":
       											$Tipo_Gasto_606 = "03-ARRENDAMIENTOS";
       											
        										break;

        										case "04":
       											$Tipo_Gasto_606 = "04-GASTOS DE ACTIVOS FIJO";
       											
        										break;

        										case "05":
       											$Tipo_Gasto_606 = "05-GASTOS DE REPRESENTACIÓN";
       											
        										break;
        										
        										case "06":       											
       											$Tipo_Gasto_606 = "06-OTRAS DEDUCCIONES ADMITIDAS";
       											
        										break;

        										case "07":       											
       											$Tipo_Gasto_606 = "07-GASTOS FINANCIEROS ";
       											
        										break;

        										case "08":       											
       											$Tipo_Gasto_606 = "08-GASTOS EXTRAORDINARIOS";
       											
        										break;

        										case "09":       											
       											$Tipo_Gasto_606 = "09-COMPRA FORMARA PARTE COSTO DE VENTA ";
       											
        										break;

        										case "10":       											
       											$Tipo_Gasto_606 = "10-ADQUISICIONES DE ACTIVOS";
       											
        										break;

        										case "11":       											
       											$Tipo_Gasto_606 = "11-GASTOS DE SEGUROS";
       											
        										break;

											}

											

	if($Extraer_NCF_606 == "B04"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];

	}elseif($Extraer_NCF_606 == "E34"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
	
	}elseif($Extraer_NCF_606 == "B03"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
											
	}elseif($Extraer_NCF_606 == "E33"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
	
	}else{
		
		$NCF_Modificado_606 = "";
	}

	$Fecha_Ret_AñoMes_606  = "";
	$Fecha_Ret_Dia_606 = "";


if($Montototalbienes > 0){
			
	$Montototalbienes = $_POST["Montototalbienes"];
	$Montototalservicios = "0";
	$ITBIS_Compras_606 =$_POST["MontoITBIS"];
	$ITBIS_Servicios_606 = "0.00";
	

} else{
	
	$Montototalbienes = "0.00";
	$Montototalservicios = $_POST["Montototalservicios"];
	$ITBIS_Compras_606 = "0.00";
	$ITBIS_Servicios_606 = $_POST["MontoITBIS"];


}

													

	$totalFactura = $Montototalbienes + $Montototalservicios;
										

								
if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){								

	$ITBIS_alcosto_606 = $_POST["MontoITBIS"];
	$ITBIS_Adelantar_606 = "0.00";

}else { 

	$ITBIS_alcosto_606 = "0.00";
	$ITBIS_Adelantar_606 = $_POST["MontoITBIS"];
										
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $Montototalbienes > 0){ 
										
	$ITBIS_Proporcional_606 = $_POST["MontoITBIS"];
	$ITBIS_Proporcional_Compras_606 = $_POST["MontoITBIS"];
	$ITBIS_Proporcional_Servicion_606 = "0";

									}
elseif(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $Montototalservicios > 0){ 
										
	$ITBIS_Proporcional_606 = $_POST["MontoITBIS"];
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = $_POST["MontoITBIS"];
										}
else { 
	
	$ITBIS_Proporcional_606 = "0.00";
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = "0.00";
									
}

									$ITBIS_Retenido_606 = "0.00";
									$ITBIS_Percibido_Compras_606 = "0.00";
									$Tipo_Retencion_ISR_606 = "0";
									$Monto_Retencion_Renta_606 = "0.00";
									$ISR_Percibido_606 = "0.00";

									$ValorForma_De_Pago_606 = $_POST["Forma_De_Pago_606"];									

									switch ($ValorForma_De_Pago_606 ){ 
												
												case "01":
       											$ValorForma_De_Pago_606 = "01-EFECTIVO";
        										break;

        										case "02":
       											$ValorForma_De_Pago_606 = "02-CHEQUES/TRANSFERENCIAS/DEPOSITO";
        										break;

        										case "03":
       											$ValorForma_De_Pago_606 = "03-TARJETA CREDITO/DEBITO";
        										break;
        										
        										case "04":
       											$ValorForma_De_Pago_606 = "04-COMPRA A CREDITO";
        										break;

        										case "05":
       											$ValorForma_De_Pago_606 = "05-PERMUTA";
        										break;
        										
        										case "06":
       											$ValorForma_De_Pago_606 = "06-NOTA DE CREDITO";
        										break;

        										case "07":
       											$ValorForma_De_Pago_606 = "07-MIXTO";
        										break;


        							}

        							if(!empty($_POST["Transaccion_606"])){
        								$Tipo_Transaccion_606 = $_POST["Transaccion_606"];

        							}else {

        								$Tipo_Transaccion_606 = "3";


        							}

        							$Estatus_606 = "";
        							$Extrar_Tipo_Retencion_606 = 0;
									$Porc_ITBIS_Retenido_606 = 0;
									$Porc_ISR_Retenido_606 = 0;
									$B04_Periodo_606 = 0;
									$CodigoCompra = 0;
									$Modulo = "DIARIO";
									$Accion_606 = "Creado";

			$tabla = "606_empresas";

            $datos = array("Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Tipo_Suplidor_606"],
"Tipo_Gasto_606" => $Tipo_Gasto_606,
"NCF_606" => $NCF_606,
"NCF_Modificado_606" => $NCF_Modificado_606,
"Fecha_AnoMes_606" => $_POST["FechaFacturames_606"],
"Fecha_Dia_606" => $_POST["FechaFacturadia_606"],
"Fecha_Ret_AnoMes_606" => $Fecha_Ret_AñoMes_606,
"Fecha_Ret_Dia_606" => $Fecha_Ret_Dia_606,
"Monto_Servicios_606" => $Montototalservicios,
"Monto_Bienes_606" => $Montototalbienes,
"Total_Monto_Factura_606" => $totalFactura,
"ITBIS_Factura_606" => $_POST["MontoITBIS"],
"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $_POST["ImpuestoSelectivo"],
"Otro_Impuesto_606" => $_POST["OtrosImpuestos"],
"Monto_Propina_606" => $_POST["Propinalegal"],
"Forma_Pago_606" => $ValorForma_De_Pago_606 ,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $_POST["Forma_De_Pago_606"],
"Extraer_Tipo_Gasto_606" => $_POST["Tipo_Gasto_606"],
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $ITBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"Porc_ITBIS_Retenido_606" => $Porc_ITBIS_Retenido_606,
"Porc_ISR_Retenido_606" => $Porc_ISR_Retenido_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $_POST["FechaPagomes606"],
"Fecha_Trans_Dia_606" => $_POST["FechaPagodia606"],
"Referencia_606" => $_POST["Referencia"],
"Banco_606" => $_POST["agregarBanco"],
"Descripcion_606" => $_POST["Descripcion"],
"Nombre_Empresa_606" => $_POST["Nombre_Empresa_606"],
"Usuario_Creador" => $_POST["UsuarioLogueado"],
"Accion_606" => $Accion_606,
"CodigoCompra" => $CodigoCompra,
"Modulo" => $Modulo);


	$respuesta =  Modelo606::MdlRegistrar606($tabla, $datos);
	/* ACTUALIZAR ESTATUS DE CONTROL 606*/

	if($respuesta == "ok"){

		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_606;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["FechaFacturames_606"];
		$tacontrol_Empresa = "606_Empresa";
		$valorestado = "1";


		$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);
									
				}else{
					echo '<script>
								swal({

									type: "error",
									title: "¡No se Realizo el Registro de la Factura correctamente!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;


				}


		/**********************FIN DE CARGA DEL 606 *************************************/

		/**********************CONSULTAS DE FACTURA RNC Y NCF Y ID******************/
		

				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 = $_POST["RncEmpresa606"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $_POST["Rnc_Factura_606"];
				$taNCF_606 = "NCF_606";
				

			$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

			if($Consulta606 != false && $Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){

			
			$id_registro606 = $Consulta606["id"];
			
			}else{

				$tabla = "606_empresas";

				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$taNCF_606 = "NCF_606";


				$respuesta = Modelo606::mdlBorrarLD606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);
				

				echo '<script>
								swal({

									type: "error",
									title: "¡Error en la consulta a la base de datos de la factura!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;




			}

		/**********************FIN CONSULTAS DE FACTURA RNC Y NCF Y ID******************/


		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {
				/**consulta proyecto***/
			if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $value["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $value["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}
			/********consultar banco*************/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			$Rnc_Empresa_LD = $_POST["RncEmpresa606"];
            $valorid_grupo = $value["idgrupo"];
            $valorid_categoria = $value["idcategoria"];
            $valorid_generica = $value["idgenerica"];
            $valorid_cuenta = $value["idcuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco !=false){
             	$id_banco = $banco["id"];


             }else{
             	$id_banco = $_POST["agregarBanco"];


             }
			



	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DDG";
	$Accion = "CREADA";
	$debito = bcdiv($value["debito"], '1', 2);
	$credito = bcdiv($value["credito"], '1', 2);


	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresa606"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Empresa_606"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $value["idgrupo"],
					"id_categoria" => $value["idcategoria"],
					"id_generica" => $value["idgenerica"],
					"id_cuenta" => $value["idcuenta"],
					"Nombre_Cuenta" => $value["nombrecuenta"],
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Tipo_Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes606"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia606"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	
		}
		if($respuesta == "ok"){
		/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DDG";
			
			
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa606"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" =>  $_POST["CodAsiento"]);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
									
		if($respuesta == "ok"){

if($_POST["NCF606"] == "B11" || $_POST["NCF606"] == "B13"){ 
			$tabla = "correlativos_empresas";
	
				$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
								"Tipo_NCF" => $_POST["NCF606"],
								"NCF_Cons" =>  $_POST["CodigoNCF606"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
				}
if($_POST["NCF606"] == "E41" || $_POST["NCF606"] == "E43"){ 
			$tabla = "correlativos_empresas";
	
				$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
								"Tipo_NCF" => $_POST["NCF606"],
								"NCF_Cons" =>  $_POST["CodigoNCF606"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
				}
				unset($_SESSION["error"]);
				unset($_SESSION["FechaFacturadia_606"]); 
				unset($_SESSION["Rnc_Factura_606"]); 
				unset($_SESSION["CodigoNCF606"]);
				unset($_SESSION["NCF_Modificado_606"]); 
				unset($_SESSION["Montototalbienes"]); 
				unset($_SESSION["Montototalservicios"]);
				unset($_SESSION["MontoITBIS"]); 
				unset($_SESSION["Propinalegal"]); 
				unset($_SESSION["ImpuestoSelectivo"]); 
				unset($_SESSION["OtrosImpuestos"]);
				unset($_SESSION["ITBIS_LLEVADO_A_COSTO"]);
		 	 	unset($_SESSION["ITBIS_Sujeto_a_Propocionalidad"]);
				unset($_SESSION["Nombre_Empresa_606"]);
 		 		unset($_SESSION["FechaPagodia606"]);
 		 		unset($_SESSION["Referencia"]); 
 		 		unset($_SESSION["Descripcion"]);
 		 		unset($_SESSION["listaCuentas"]);
 		 		
				echo '<script>
						swal({			
							type: "success",
							title: "¡El Registro 606 con los Asientos Se Guardo Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "gastodiario";
							}
							});
						</script>';


	}
	}

	

	} /*CIERRE ISSET*/

	

}/*CIERRE FUNCION*/

static public function ctrMostrarGastoDiarioEditar($id_registro, $Rnc_Empresa_LD, $Rnc_Factura, $NCF, $Extraer){
	$tabla = "librodiario_empresas";
	$taid_registro = "id_registro";
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$taRnc_Factura = "Rnc_Factura";
	$taNCF = "NCF";
	$taExtraer = "Extraer_NAsiento";

	$respuesta = ModeloDiario::mdlMostrarGastoDiarioEditar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF, $taExtraer, $Extraer); 

	return $respuesta;


}
static public function ctrVerAsientosCompras($Rnc_Empresa_LD, $Rnc_Factura, $NCF, $NAsiento){
	
	$tabla = "librodiario_empresas";
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$taRnc_Factura = "Rnc_Factura";
	$taNCF = "NCF";
	$taNAsiento = "NAsiento";

	$respuesta = ModeloDiario::mdlVerAsientosCompras($tabla, $taRnc_Empresa_LD, $taRnc_Factura, $taNCF, $taNAsiento, $Rnc_Empresa_LD, $Rnc_Factura, $NCF, $NAsiento); 

	return $respuesta;


}
static public function ctrVerAsientosNAsientos($Rnc_Empresa_LD, $Rnc_Factura, $NAsiento){
	
	$tabla = "librodiario_empresas";
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$taRnc_Factura = "Rnc_Factura";
	$taNAsiento = "NAsiento";

	$respuesta = ModeloDiario::mdlVerAsientosNasientos($tabla, $taRnc_Empresa_LD, $taRnc_Factura, $taNAsiento, $Rnc_Empresa_LD, $Rnc_Factura,  $NAsiento); 

	return $respuesta;


}
static public function ctrEditargastodiario(){

	if(isset($_POST["Editar_id_606"])){
		if($_POST["Proyecto"] == 1){
			$libromayor = "libromayorpro";

		}else{
			$libromayor = "libromayor";	
		}

/*******VALIDACIONES DEL FORMULARIO INICIO **************************/
		
				/*VALIDACION QUE LA FACUTRA NO SE REPITA */

				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 = $_POST["RncEmpresa606"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $_POST["Rnc_Factura_606"];
				$taNCF_606 = "NCF_606";
				$NCF_606 = $_POST["NCF_606"];

		$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

		if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["Rnc_Factura_606"] == $Rnc_Factura_606 && $FacturaRepetida["NCF_606"] == $NCF_606 && $FacturaRepetida["id"] != $_POST["Editar_id_606"]){


				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "'.$libromayor.'";
											}

											});

								</script>';
						exit;

		}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

		/*** INICIO MONTO DE DEBITO Y CREDITO IGUALES***************/

				if($_POST["totaldebito"] != $_POST["totalcredito"]){

						echo '<script>
										swal({

											type: "error",
											title: "El Saldo de Total Debito y Total Credito deben ser Iguales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

				
			}
		/****FIN MONTO DE DEBITO Y CREDITO IGUALES ************/
			/*****VALIDACION DE LOS ASIENTOS DIARIOS*******/

		if($_POST["listaCuentas"] != ""){

		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			if($value["debito"] == 0 && $value["credito"] == 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

			}
			if($value["debito"] != 0 && $value["credito"] != 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor mayor a cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

			}

		}
		}

		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_606 = substr($_POST["NCF_606"], 0, 3);

			if($Extraer_NCF_606 == "B04" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_606 == "E34" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;			
			}
			if($Extraer_NCF_606 == "B03" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO B03 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_606 == "E33" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO E33 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;									
			}

	/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturadia_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Rnc_Factura_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[BE0-9]+$/', $_POST["NCF_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}	
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaFacturames_606"], 0, 4);
	$fechames = substr($_POST["FechaFacturames_606"], -2);

	if(strlen($_POST["FechaFacturames_606"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia_606"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "'.$libromayor.'";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_606"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_606"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Suplidor_606"] == 1 && strlen($_POST["Rnc_Factura_606"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Suplidor_606"] == 2 && strlen($_POST["Rnc_Factura_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["NCF_606"], 0, 1) == "B" && strlen($_POST["NCF_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["NCF_606"], 0, 1) == "E" && strlen($_POST["NCF_606"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
	$Montototalbienes = $_POST["Montototalbienes"];
	$Montototalservicios = $_POST["Montototalservicios"];

	$suma = $Montototalbienes + $Montototalservicios;

	$PorcentajeITBIS = $suma * 0.18;
	$PropinaLegal = $suma * 0.1;

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	$CalculoPropina = bcdiv($PropinaLegal, '1', 2);


	if($_POST["MontoITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});


												
								</script>';	
				

			exit;	
	}
	if($_POST["Propinalegal"] > $CalculoPropina){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO de Propina legal no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});


												
								</script>';	
			exit;	
	}

	

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN ****************************************************************************************************************/
$ValorTipo_Gasto_606 = $_POST["Tipo_Gasto_606"];

	switch ($ValorTipo_Gasto_606){
		
		case "01":
       		$Tipo_Gasto_606 = "01-GASTOS DE PERSONAL";
       		$Extraer_Tipo_Gasto_606 = "01";
        break;

        case "02":
       	$Tipo_Gasto_606 = "02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO";
       	$Extraer_Tipo_Gasto_606 = "02";
        break;

        case "03":
       	$Tipo_Gasto_606 = "03-ARRENDAMIENTOS";
       	$Extraer_Tipo_Gasto_606 = "03";
        break;

        case "04":
       	$Tipo_Gasto_606 = "04-GASTOS DE ACTIVOS FIJO";
       	$Extraer_Tipo_Gasto_606 = "04";
        break;

        case "05":
       	$Tipo_Gasto_606 = "05-GASTOS DE REPRESENTACIÓN";
       	$Extraer_Tipo_Gasto_606 = "05";
        break;
        										
        case "06":       											
       	$Tipo_Gasto_606 = "06-OTRAS DEDUCCIONES ADMITIDAS";
       	$Extraer_Tipo_Gasto_606 = "06";
        break;

        case "07":       											
       	$Tipo_Gasto_606 = "07-GASTOS FINANCIEROS ";
       	$Extraer_Tipo_Gasto_606 = "07";
        break;

        case "08":       											
       	$Tipo_Gasto_606 = "08-GASTOS EXTRAORDINARIOS";
       	$Extraer_Tipo_Gasto_606 = "08";
        break;

        case "09":       											
       	$Tipo_Gasto_606 = "09-COMPRA FORMARA PARTE COSTO DE VENTA ";
       	$Extraer_Tipo_Gasto_606 = "09";
        break;

        case "10":       											
       	$Tipo_Gasto_606 = "10-ADQUISICIONES DE ACTIVOS";
       	$Extraer_Tipo_Gasto_606 = "10";
        break;

        case "11":       											
       	$Tipo_Gasto_606 = "11-GASTOS DE SEGUROS";
       	$Extraer_Tipo_Gasto_606 = "11";
        break;

	}

											
	if($Extraer_NCF_606 == "B04"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];

	}elseif($Extraer_NCF_606 == "E34"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];

	}elseif($Extraer_NCF_606 == "B03"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];

	}elseif($Extraer_NCF_606 == "E33"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];

	}else{

		$NCF_Modificado_606 = "";

	}

if($Montototalbienes > 0){
	
	$Montototalbienes = $_POST["Montototalbienes"];
	$Montototalservicios = "0";
	$ITBIS_Compras_606 =$_POST["MontoITBIS"];
	$TBIS_Servicios_606 = "0";
	
} else{
	
	$Montototalbienes = "0.00";
	$Montototalservicios = $_POST["Montototalservicios"];
	$ITBIS_Compras_606 = "0.00";
	$TBIS_Servicios_606 = $_POST["MontoITBIS"];

}

	$totalFactura = $Montototalbienes + $Montototalservicios;
							
								
if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){
										
	$ITBIS_alcosto_606 = $_POST["MontoITBIS"];
	$ITBIS_Adelantar_606 = "0.00";

}else { 
	
	$ITBIS_alcosto_606 = "0.00";
	$ITBIS_Adelantar_606 = $_POST["MontoITBIS"];
										
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $Montototalbienes > 0){ 
										
	$ITBIS_Proporcional_606 = $_POST["MontoITBIS"];
	$ITBIS_Proporcional_Compras_606 = $_POST["MontoITBIS"];
	$ITBIS_Proporcional_Servicion_606 = "0.00";

}elseif(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $Montototalservicios > 0){ 
	$ITBIS_Proporcional_606 = $_POST["MontoITBIS"];
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = $_POST["MontoITBIS"];
}
else { 

	$ITBIS_Proporcional_606 = "0.00";

	$ITBIS_Proporcional_Compras_606 = "0.00";

	$ITBIS_Proporcional_Servicion_606 = "0.00";

}

$ITBIS_Retenido_606 = "0.00";
$ITBIS_Percibido_Compras_606 = "0.00";
$Tipo_Retencion_ISR_606 = "0";
$Monto_Retencion_Renta_606 = "0.00";
$ISR_Percibido_606 = "0.00";

$ValorForma_De_Pago_606 = $_POST["Forma_De_Pago_606"];									

									switch ($ValorForma_De_Pago_606 ){ 
												
												case "01":
       											$ValorForma_De_Pago_606 = "01-EFECTIVO";
       											$Extraer_Tipo_Pago_606 = "01";
        										break;

        										case "02":
       											$ValorForma_De_Pago_606 = "02-CHEQUES/TRANSFERENCIAS/DEPOSITO";
       											$Extraer_Tipo_Pago_606 = "02";
        										break;

        										case "03":
       											$ValorForma_De_Pago_606 = "03-TARJETA CREDITO/DEBITO";
       											$Extraer_Tipo_Pago_606 = "03";
        										break;
        										
        										case "04":
       											$ValorForma_De_Pago_606 = "04-COMPRA A CREDITO";
       											$Extraer_Tipo_Pago_606 = "04";
        										break;

        										case "05":
       											$ValorForma_De_Pago_606 = "05-PERMUTA";
       											$Extraer_Tipo_Pago_606 = "05";
        										break;
        										
        										case "06":
       											$ValorForma_De_Pago_606 = "06-NOTA DE CREDITO";
       											$Extraer_Tipo_Pago_606 = "06";
        										break;

        										case "07":
       											$ValorForma_De_Pago_606 = "07-MIXTO";
       											$Extraer_Tipo_Pago_606 = "07";
        										break;


        							}

        							if(!empty($_POST["Transaccion_606"])){
        								$Tipo_Transaccion_606 = $_POST["Transaccion_606"];

        							}else {

        								$Tipo_Transaccion_606 = "3";


        							}

$Estatus_606 = "";
$Extrar_Tipo_Retencion_606 = 0;
$Porc_ITBIS_Retenido_606 = 0;
$Porc_ISR_Retenido_606 = 0;
$B04_Periodo_606 = 0;
$CodigoCompra = 0;
$Modulo = "DIARIO";
$Accion_606 = "Editado";

$datos = array("id" => $_POST["Editar_id_606"],
"Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Tipo_Suplidor_606"],
"Tipo_Gasto_606" => $Tipo_Gasto_606,
"NCF_606" => $NCF_606,
"NCF_Modificado_606" => $NCF_Modificado_606,
"Fecha_AnoMes_606" => $_POST["FechaFacturames_606"],
"Fecha_Dia_606" => $_POST["FechaFacturadia_606"],
"Monto_Servicios_606" => $Montototalservicios,
"Monto_Bienes_606" => $Montototalbienes,
"Total_Monto_Factura_606" => $totalFactura,
"ITBIS_Factura_606" => $_POST["MontoITBIS"],
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $_POST["ImpuestoSelectivo"],
"Otro_Impuesto_606" => $_POST["OtrosImpuestos"],
"Monto_Propina_606" => $_POST["Propinalegal"],
"Forma_Pago_606" => $ValorForma_De_Pago_606,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $Extraer_Tipo_Pago_606,
"Extraer_Tipo_Gasto_606" => $Extraer_Tipo_Gasto_606,
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $TBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $_POST["FechaPagomes606"],
"Fecha_Trans_Dia_606" => $_POST["FechaPagodia606"],
"Referencia_606" => $_POST["Referencia"],
"Descripcion_606" => $_POST["Descripcion"],
"Banco_606" => $_POST["agregarBanco"],
"Nombre_Empresa_606" => $_POST["Nombre_Empresa_606"],
"Usuario_Creador" => $_POST["UsuarioLogueado"],
"Accion_606" => $Accion_606,
"CodigoCompra" => $CodigoCompra,
"Modulo" => $Modulo);

	$respuesta =  Modelo606::MdlEditar606($tabla, $datos);

	if($respuesta == "ok"){

	$tabla = "control_empresas";
	$taRnc_Empresa = "Rnc_Empresa";
	$Rnc_Empresa = $Rnc_Empresa_606;
	$taPeriodo_Empresa = "Periodo_Empresa";
	$Periodo_Empresa = $_POST["FechaFacturames_606"];
	$tacontrol_Empresa = "606_Empresa";
	$valorestado = "1";


	$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);
		}

/************FIN FIN FIN FIN FIN FIN FIN FIN EDITAR 606 606 606 606 606 606 606****************************************/

if(empty($_POST["listaCuentas"])){
 
    
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_606"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_606;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDG";

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $Rnc_Factura_606;

	$taNCF = "NCF";
	$NCF = $NCF_606;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	$Accion = "EDITADO";

	

	foreach ($respuesta as $key => $value) {

			$datos = array("id" => $value["id"],
			"Rnc_Factura" => $Rnc_Factura_606,
			"NCF" => $NCF_606,
			"Nombre_Empresa" => $_POST["Nombre_Empresa_606"],
			"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
			"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
			"ObservacionesLD" => $_POST["Descripcion"],
			"Tipo_Transaccion" => $Tipo_Transaccion_606,
			"Fecha_AnoMes_Trans" => $_POST["FechaPagomes606"],
			"Fecha_dia_Trans" => $_POST["FechaPagodia606"],
			"id_banco" =>  $_POST["agregarBanco"],
			"Usuario_Creador" => $_POST["UsuarioLogueado"],
			"Accion" => $Accion);

	$respuesta = ModeloDiario::mdlEditarGastoDiarioSinAsientos($tabla, $datos);

	} 
	if($respuesta == "ok"){
		echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el registro 606 Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";


													}

													});

										</script>';
			exit;
		}


} else {


	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_606"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_606;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDG";

	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

	$listaCuentas =  json_decode($_POST["listaCuentas"], true);
	foreach ($listaCuentas as $key => $value) {
		/**consulta proyecto***/
			if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $value["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $value["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}

			/********consultar banco*************/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			$Rnc_Empresa_LD = $Rnc_Empresa_606;
            $valorid_grupo = $value["idgrupo"];
            $valorid_categoria = $value["idcategoria"];
            $valorid_generica = $value["idgenerica"];
            $valorid_cuenta = $value["idcuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco !=false){
             	$id_banco = $banco["id"];


             }else{
             	$id_banco = $_POST["agregarBanco"];


             }
			
				


	$tabla = "librodiario_empresas";
	$ObservacionesLD =  $_POST["Descripcion"];
	$Extraer = "DDG";
	$Accion = "EDITADA";
	$debito = bcdiv($value["debito"], '1', 2);
	$credito = bcdiv($value["credito"], '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $_POST["Editar_id_606"],
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Empresa_606"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $value["idgrupo"],
					"id_categoria" => $value["idcategoria"],
					"id_generica" => $value["idgenerica"],
					"id_cuenta" => $value["idcuenta"],
					"Nombre_Cuenta" => $value["nombrecuenta"],
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer,
					"Tipo_Transaccion" => $Tipo_Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes606"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia606"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	
		}
		

	if($respuesta == "ok"){
		if($_POST["Proyecto"] == 1){
			echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el 606 con los Asientos Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayorpro";


													}

													});

										</script>';
		
		}else{
			echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el 606 con los Asientos Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayor";


													}

													});

										</script>';
		
		}

					
	}


}/*CIERRE ELSE*/




	}/*CIERRE ISSET*/


}/*CIERRE FUNCION EDITAR GASTOS DIARIOS*/
static public function ctrAsignargastodiario(){

	if(isset($_POST["Editar_id_606"])){

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO  INICIO ****************************************************************************************************************/
		
				/*VALIDACION QUE LA FACUTRA NO SE REPITA */

				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 = $_POST["Editar-RncEmpresa606"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $_POST["Editar-Rnc_Factura_606"];
				$taNCF_606 = "NCF_606";
				$NCF_606 = $_POST["Editar-NCF_606"];

		$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

		if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["Rnc_Factura_606"] == $Rnc_Factura_606 && $FacturaRepetida["NCF_606"] == $NCF_606 && $FacturaRepetida["id"] != $_POST["Editar_id_606"]){


				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "reporte-606";
											}

											});

								</script>';
						exit;

		}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

		/*** INICIO MONTO DE DEBITO Y CREDITO IGUALES***************/

				if($_POST["totaldebito"] != $_POST["totalcredito"]){

						echo '<script>
										swal({

											type: "error",
											title: "El Saldo de Total Debito y Total Credito deben ser Iguales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "reporte-606";
													}

													});

										</script>';
								exit;

				
			}
		/****FIN MONTO DE DEBITO Y CREDITO IGUALES ************/
		/*****VALIDACION DE LOS ASIENTOS DIARIOS*******/

		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			if($value["debito"] == 0 && $value["credito"] == 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "reporte-606";
													}

													});

										</script>';
								exit;

			}
			if($value["debito"] != 0 && $value["credito"] != 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor mayor a cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "reporte-606";
													}

													});

										</script>';
								exit;

			}

		}
		/*****FIN DE LOS ASIENTOS DIARIOS*******/
		/*** INICIO DE ASIENTOS VACIOS***************/

		if(empty($_POST["listaCuentas"]) || $_POST["listaCuentas"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UNA CUENTA REGISTRADO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "reporte-606";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/


		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_606 = substr($_POST["Editar-NCF_606"], 0, 3);

			if($Extraer_NCF_606 == "B04" && $_POST["Editar-NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_606 == "E34" && $_POST["Editar-NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;			
			}
			if($Extraer_NCF_606 == "B03" && $_POST["Editar-NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO B03 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;						
			}
			if($Extraer_NCF_606 == "E33" && $_POST["Editar-NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO E33 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;									
			}

	/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-FechaFacturames_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-FechaFacturadia_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-Rnc_Factura_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[BE0-9]+$/', $_POST["Editar-NCF_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;
	}	
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["Editar-FechaFacturames_606"], 0, 4);
	$fechames = substr($_POST["Editar-FechaFacturames_606"], -2);

	if(strlen($_POST["Editar-FechaFacturames_606"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["Editar-FechaFacturadia_606"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "reporte-606";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["Editar-FechaFacturadia_606"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["Editar-FechaFacturadia_606"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Editar-Tipo_Suplidor_606"] == 1 && strlen($_POST["Editar-Rnc_Factura_606"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Editar-Tipo_Suplidor_606"] == 2 && strlen($_POST["Editar-Rnc_Factura_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";


													
													});


												
								</script>';	
			exit;	

							
	}


	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["Editar-NCF_606"], 0, 1) == "B" && strlen($_POST["Editar-NCF_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["Editar-NCF_606"], 0, 1) == "E" && strlen($_POST["Editar-NCF_606"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
	$Montototalbienes = $_POST["Editar-Montototalbienes"];
	$Montototalservicios = $_POST["Editar-Montototalservicios"];

	$suma = $Montototalbienes + $Montototalservicios;

	$PorcentajeITBIS = $suma * 0.18;
	$PropinaLegal = $suma * 0.1;

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	$CalculoPropina = bcdiv($PropinaLegal, '1', 2);


	if($_POST["Editar-MontoITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});


												
								</script>';	
				

			exit;	
	}
	if($_POST["Editar-Propinalegal"] > $CalculoPropina){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO de Propina legal no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});


												
								</script>';	
			exit;	
	}

	

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN ****************************************************************************************************************/
$ValorTipo_Gasto_606 = $_POST["Editar-Tipo_Gasto_606"];

											switch ($ValorTipo_Gasto_606){
												case "01":
       											$Tipo_Gasto_606 = "01-GASTOS DE PERSONAL";
       											$Extraer_Tipo_Gasto_606 = "01";
        										break;

        										case "02":
       											$Tipo_Gasto_606 = "02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO";
       											$Extraer_Tipo_Gasto_606 = "02";
        										break;

        										case "03":
       											$Tipo_Gasto_606 = "03-ARRENDAMIENTOS";
       											$Extraer_Tipo_Gasto_606 = "03";
        										break;

        										case "04":
       											$Tipo_Gasto_606 = "04-GASTOS DE ACTIVOS FIJO";
       											$Extraer_Tipo_Gasto_606 = "04";
        										break;

        										case "05":
       											$Tipo_Gasto_606 = "05-GASTOS DE REPRESENTACIÓN";
       											$Extraer_Tipo_Gasto_606 = "05";
        										break;
        										
        										case "06":       											
       											$Tipo_Gasto_606 = "06-OTRAS DEDUCCIONES ADMITIDAS";
       											$Extraer_Tipo_Gasto_606 = "06";
        										break;

        										case "07":       											
       											$Tipo_Gasto_606 = "07-GASTOS FINANCIEROS ";
       											$Extraer_Tipo_Gasto_606 = "07";
        										break;

        										case "08":       											
       											$Tipo_Gasto_606 = "08-GASTOS EXTRAORDINARIOS";
       											$Extraer_Tipo_Gasto_606 = "08";
        										break;

        										case "09":       											
       											$Tipo_Gasto_606 = "09-COMPRA FORMARA PARTE COSTO DE VENTA ";
       											$Extraer_Tipo_Gasto_606 = "09";
        										break;

        										case "10":       											
       											$Tipo_Gasto_606 = "10-ADQUISICIONES DE ACTIVOS";
       											$Extraer_Tipo_Gasto_606 = "10";
        										break;

        										case "11":       											
       											$Tipo_Gasto_606 = "11-GASTOS DE SEGUROS";
       											$Extraer_Tipo_Gasto_606 = "11";
        										break;

											}

											
											if($Extraer_NCF_606 == "B04"){

												$NCF_Modificado_606 = $_POST["Editar-NCF_Modificado_606"];
											}elseif($Extraer_NCF_606 == "E34"){
													$NCF_Modificado_606 = $_POST["Editar-NCF_Modificado_606"];
											}elseif($Extraer_NCF_606 == "B03"){
													$NCF_Modificado_606 = $_POST["Editar-NCF_Modificado_606"];
											}elseif($Extraer_NCF_606 == "E33"){
													$NCF_Modificado_606 = $_POST["Editar-NCF_Modificado_606"];
											}else{
												 	$NCF_Modificado_606 = "";

												 }

												 	

													if($Montototalbienes > 0){
														$Montototalbienes = $_POST["Editar-Montototalbienes"];
														$Montototalservicios = "0";
														$ITBIS_Compras_606 =$_POST["Editar-MontoITBIS"];
														$TBIS_Servicios_606 = "0";
	

													} else{
														$Montototalbienes = "0.00";
														$Montototalservicios = $_POST["Editar-Montototalservicios"];
														$ITBIS_Compras_606 = "0.00";
														$TBIS_Servicios_606 = $_POST["Editar-MontoITBIS"];


													}

													

								$totalFactura = $Montototalbienes + $Montototalservicios;
							
								
						

			if(isset($_POST["Editar-ITBIS_LLEVADO_A_COSTO"]) && $_POST["Editar-ITBIS_LLEVADO_A_COSTO"] == 1){
										

										$ITBIS_alcosto_606 = $_POST["Editar-MontoITBIS"];
										$ITBIS_Adelantar_606 = "0.00";

									}else { 
										$ITBIS_alcosto_606 = "0.00";
										$ITBIS_Adelantar_606 = $_POST["Editar-MontoITBIS"];
										


									}


									if(isset($_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"] == 1 && $Montototalbienes > 0){ 
										$ITBIS_Proporcional_606 = $_POST["Editar-MontoITBIS"];
										$ITBIS_Proporcional_Compras_606 = $_POST["Editar-MontoITBIS"];
										$ITBIS_Proporcional_Servicion_606 = "0.00";

									}if(isset($_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"] == 1 && $Montototalservicios > 0){ 
										$ITBIS_Proporcional_606 = $_POST["Editar-MontoITBIS"];
										$ITBIS_Proporcional_Compras_606 = "0.00";
										$ITBIS_Proporcional_Servicion_606 = $_POST["Editar-MontoITBIS"];
										}
									else { 
										$ITBIS_Proporcional_606 = "0.00";
										$ITBIS_Proporcional_Compras_606 = "0.00";
										$ITBIS_Proporcional_Servicion_606 = "0.00";
									}

									$ITBIS_Retenido_606 = "0.00";
									$ITBIS_Percibido_Compras_606 = "0.00";
									$Tipo_Retencion_ISR_606 = "0";
									$Monto_Retencion_Renta_606 = "0.00";
									$ISR_Percibido_606 = "0.00";

									$ValorForma_De_Pago_606 = $_POST["Editar-Forma_De_Pago_606"];									

									switch ($ValorForma_De_Pago_606 ){ 
												
												case "01":
       											$ValorForma_De_Pago_606 = "01-EFECTIVO";
       											$Extraer_Tipo_Pago_606 = "01";
        										break;

        										case "02":
       											$ValorForma_De_Pago_606 = "02-CHEQUES/TRANSFERENCIAS/DEPOSITO";
       											$Extraer_Tipo_Pago_606 = "02";
        										break;

        										case "03":
       											$ValorForma_De_Pago_606 = "03-TARJETA CREDITO/DEBITO";
       											$Extraer_Tipo_Pago_606 = "03";
        										break;
        										
        										case "04":
       											$ValorForma_De_Pago_606 = "04-COMPRA A CREDITO";
       											$Extraer_Tipo_Pago_606 = "04";
        										break;

        										case "05":
       											$ValorForma_De_Pago_606 = "05-PERMUTA";
       											$Extraer_Tipo_Pago_606 = "05";
        										break;
        										
        										case "06":
       											$ValorForma_De_Pago_606 = "06-NOTA DE CREDITO";
       											$Extraer_Tipo_Pago_606 = "06";
        										break;

        										case "07":
       											$ValorForma_De_Pago_606 = "07-MIXTO";
       											$Extraer_Tipo_Pago_606 = "07";
        										break;


        							}

        							if(!empty($_POST["Editar-Transaccion_606"])){
        								$Tipo_Transaccion_606 = $_POST["Editar-Transaccion_606"];

        							}else {

        								$Tipo_Transaccion_606 = "3";


        							}

$Estatus_606 = "";
$Extrar_Tipo_Retencion_606 = 0;
$Porc_ITBIS_Retenido_606 = 0;
$Porc_ISR_Retenido_606 = 0;
$B04_Periodo_606 = 0;
$CodigoCompra = 0;
$Modulo = "DIARIO";
$Accion_606 = "Editado";

$datos = array("id" => $_POST["Editar_id_606"],
"Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Editar-Tipo_Suplidor_606"],
"Tipo_Gasto_606" => $Tipo_Gasto_606,
"NCF_606" => $NCF_606,
"NCF_Modificado_606" => $NCF_Modificado_606,
"Fecha_AnoMes_606" => $_POST["Editar-FechaFacturames_606"],
"Fecha_Dia_606" => $_POST["Editar-FechaFacturadia_606"],
"Monto_Servicios_606" => $Montototalservicios,
"Monto_Bienes_606" => $Montototalbienes,
"Total_Monto_Factura_606" => $totalFactura,
"ITBIS_Factura_606" => $_POST["Editar-MontoITBIS"],
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $_POST["Editar-ImpuestoSelectivo"],
"Otro_Impuesto_606" => $_POST["Editar-OtrosImpuestos"],
"Monto_Propina_606" => $_POST["Editar-Propinalegal"],
"Forma_Pago_606" => $ValorForma_De_Pago_606,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $Extraer_Tipo_Pago_606,
"Extraer_Tipo_Gasto_606" => $Extraer_Tipo_Gasto_606,
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $TBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $_POST["Editar-FechaPagomes606"],
"Fecha_Trans_Dia_606" => $_POST["Editar-FechaPagodia606"],
"Referencia_606" => $_POST["Editar-Referencia"],
"Descripcion_606" => $_POST["Editar-Descripcion"],
"Banco_606" => $_POST["Editar-agregarBanco"],
"Nombre_Empresa_606" => $_POST["Editar-Nombre_Empresa_606"],
"Usuario_Creador" => $_POST["Editar-UsuarioLogueado"],
"Accion_606" => $Accion_606,
"CodigoCompra" => $CodigoCompra,
"Modulo" => $Modulo);




$respuesta =  Modelo606::MdlEditar606($tabla, $datos);

									if($respuesta == "ok"){

									$tabla = "control_empresas";
									$taRnc_Empresa = "Rnc_Empresa";
									$Rnc_Empresa = $Rnc_Empresa_606;
									$taPeriodo_Empresa = "Periodo_Empresa";
									$Periodo_Empresa = $_POST["Editar-FechaFacturames_606"];
									$tacontrol_Empresa = "606_Empresa";
									$valorestado = "1";


									$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);
									 }

/************FIN FIN FIN FIN FIN FIN FIN FIN EDITAR 606 606 606 606 606 606 606****************************************/

if(empty($_POST["listaCuentas"])){

     
    
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_606"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_606;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDG";

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $Rnc_Factura_606;

	$taNCF = "NCF";
	$NCF = $NCF_606;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	$Accion = "EDITADO";

	

	foreach ($respuesta as $key => $value) {

			$datos = array("id" => $value["id"],
			"Rnc_Factura" => $Rnc_Factura_606,
			"NCF" => $NCF_606,
			"Nombre_Empresa" => $_POST["Editar-Nombre_Empresa_606"],
			"Fecha_AnoMes_LD" => $_POST["Editar-FechaFacturames_606"],
			"Fecha_dia_LD" => $_POST["Editar-FechaFacturadia_606"],
			"ObservacionesLD" => $_POST["Editar-Descripcion"],
			"Tipo_Transaccion" => $Tipo_Transaccion_606,
			"Fecha_AnoMes_Trans" => $_POST["Editar-FechaPagomes606"],
			"Fecha_dia_Trans" => $_POST["Editar-FechaPagodia606"],
			"id_banco" =>  $_POST["Editar-agregarBanco"],
			"Usuario_Creador" => $_POST["Editar-UsuarioLogueado"],
			"Accion" => $Accion);

	$respuesta = ModeloDiario::mdlEditarGastoDiarioSinAsientos($tabla, $datos);

	} 
	if($respuesta == "ok"){

		if($_POST["Proyecto"] == 1){
			echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el registro 606 Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayorpro";


													}

													});

										</script>';
			exit;
			}else{
				echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el registro 606 Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayor";


													}

													});

										</script>';
			exit;

			}
		
		}


} else {


	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_606"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_606;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDG";

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $Rnc_Factura_606;

	$taNCF = "NCF";
	$NCF = $NCF_606;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

	$listaCuentas =  json_decode($_POST["listaCuentas"], true);
	foreach ($listaCuentas as $key => $value) {
				/**consulta proyecto***/
			if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $value["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $value["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}
			/********consultar banco*************/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			$Rnc_Empresa_LD = $Rnc_Empresa_606;
            $valorid_grupo = $value["idgrupo"];
            $valorid_categoria = $value["idcategoria"];
            $valorid_generica = $value["idgenerica"];
            $valorid_cuenta = $value["idcuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco !=false){
             	$id_banco = $banco["id"];


             }else{
             	$id_banco = $_POST["Editar-agregarBanco"];


             }
			


	$tabla = "librodiario_empresas";
	$ObservacionesLD =  $_POST["Editar-Descripcion"];
	$Extraer = "DDG";
	$Accion = "EDITADA";
	$debito = bcdiv($value["debito"], '1', 2);
	$credito = bcdiv($value["credito"], '1', 2);
	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $_POST["Editar_id_606"],
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Editar-Nombre_Empresa_606"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $value["idgrupo"],
					"id_categoria" => $value["idcategoria"],
					"id_generica" => $value["idgenerica"],
					"id_cuenta" => $value["idcuenta"],
					"Nombre_Cuenta" => $value["nombrecuenta"],
					"Fecha_AnoMes_LD" => $_POST["Editar-FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["Editar-FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer,
					"Tipo_Transaccion" => $Tipo_Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["Editar-FechaPagomes606"],
					"Fecha_dia_Trans" => $_POST["Editar-FechaPagodia606"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Editar-Referencia"],
					"Usuario_Creador" => $_POST["Editar-UsuarioLogueado"],
					"Accion" => $Accion);



	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	
		}
		

	if($respuesta == "ok"){


		/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
		***************************************************************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DDG";
			
			
			$datos = array("Rnc_Empresa" => $_POST["Editar-RncEmpresa606"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" =>  $_POST["CodAsiento"]);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);

				if($_POST["Proyecto"] == 1){
					echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el 606 con los Asientos Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayorpro";


													}

													});

										</script>';
				

				}else{
					echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el 606 con los Asientos Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "libromayor";


													}

													});

										</script>';
				


				}
					
		}


}/*CIERRE ELSE*/




	}/*CIERRE ISSET*/


}/*CIERRE FUNCION EDITAR GASTOS DIARIOS*/
static function ctrajustediario(){

	if(isset($_POST["idAjuste"])){

		$_SESSION["Rnc_Factura"] = $_POST["Rnc_Factura"];
		$_SESSION["Nombre_Empresa"] = $_POST["Nombre_Empresa"];
		$_SESSION["FechaFacturames_607"] = $_POST["FechaFacturames_607"];
		$_SESSION["FechaFacturadia_607"] = $_POST["FechaFacturadia_607"];
		$_SESSION["Descripcion"] = $_POST["Descripcion"];
		$_SESSION["listaCuentas"] = $_POST["listaCuentas"];
		

		
		/***INICIO VALIDACION QUE EL ASIENTO NO SE REPITA***/

				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa= $_POST["RncEmpresa606"];
				$taNAsiento = "NAsiento";
				$NAsiento = $_POST["NAsiento"];
			

			$AsientoRepetido = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento);

		foreach ($AsientoRepetido  as $key => $value) {
		
				if($value["Rnc_Empresa_LD"] == $Rnc_Empresa &&  $value["NAsiento"] == $NAsiento){

							echo '<script>
								swal({
									type: "error",
									title: "Este Código de Asiento ya esta registrado!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ajustediario";
													
													});
												
								</script>';		



				exit;

				}
		}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */



		/*** INICIO DE ASIENTOS VACIOS***************/

			if(empty($_POST["listaCuentas"])){
			
					echo '<script>
								swal({
								type: "error",
								title: "DEBE TENER POR LO MENOS UN ASIENTO DIARIO REGISTRADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ajustediario";
													
													});
												
								</script>';		


					exit;
		
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/
		/*** INICIO MONTO DE DEBITO Y CREDITO IGUALES***************/

				if($_POST["totaldebito"] != $_POST["totalcredito"]){

				echo '<script>
						swal({
							type: "error",
							title: "El Saldo de Total Debito y Total Credito deben ser Iguales!",
							type: "error",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ajustediario";
													
													});
												
							</script>';		

				


				exit;

				
			}
		/****FIN MONTO DE DEBITO Y CREDITO IGUALES ************/
		/*****VALIDACION DE LOS ASIENTOS DIARIOS*******/

		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			if($value["debito"] == 0 && $value["credito"] == 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ajustediario";
													}

													});

										</script>';
								exit;

			}
			if($value["debito"] != 0 && $value["credito"] != 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor mayor a cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ajustediario";
													}

													});

										</script>';
								exit;

			}

		}
		/*****FIN DE LOS ASIENTOS DIARIOS*******/


		
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ajustediario";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturadia_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ajustediario";
													
									});
												
								</script>';	
					exit;	
	} 
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/
	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaFacturames_607"], 0, 4);
	$fechames = substr($_POST["FechaFacturames_607"], -2);

	if(strlen($_POST["FechaFacturames_607"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ajustediario";
													
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
									window.location = "ajustediario";
													
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
									window.location = "ajustediario";
													
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
									window.location = "ajustediario";
													
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
									window.location = "ajustediario";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia_607"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "ajustediario";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_607"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ajustediario";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaFacturadia_607"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ajustediario";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			/*consultar banco*/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			$Rnc_Empresa_LD = $_POST["RncEmpresa606"];
            $valorid_grupo = $value["idgrupo"];
            $valorid_categoria = $value["idcategoria"];
            $valorid_generica = $value["idgenerica"];
            $valorid_cuenta = $value["idcuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco !=false){
             	$id_banco = $banco["id"];


             }else{
             	$id_banco = 0;


             }
			

			/**consulta proyecto***/
			

		if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $value["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $value["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}
				
			

	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DDA";
	$Transaccion = 1;
	$Accion = "CREADA";
	$debito = bcdiv($value["debito"], '1', 2);
	$credito = bcdiv($value["credito"], '1', 2);

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresa606"],
					"id_registro" => $_POST["idAjuste"],
					"Rnc_Factura" => $_POST["Rnc_Factura"],
					"NCF" => $_POST["NAsiento"],
					"Nombre_Empresa" => $_POST["Nombre_Empresa"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $value["idgrupo"],
					"id_categoria" => $value["idcategoria"],
					"id_generica" => $value["idgenerica"],
					"id_cuenta" => $value["idcuenta"],
					"Nombre_Cuenta" => $value["nombrecuenta"],
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_607"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_607"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_607"],
					"id_banco" => $id_banco,
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	
		}
		if($respuesta == "ok"){
		/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DDA";
			
			
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa606"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" =>  $_POST["CodAsiento"]);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
									
		if($respuesta == "ok"){


				unset($_SESSION["FechaFacturadia_607"]); 
				unset($_SESSION["Rnc_Factura"]);
				unset($_SESSION["Nombre_Empresa"]);
				unset($_SESSION["Descripcion"]);
 		 		unset($_SESSION["listaCuentas"]);

 		 		
 		 								
				echo '<script>
						swal({			
							type: "success",
							title: "¡El Registro de Ajuste con los Asientos Se Guardo Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "ajustediario";
							}
							});
						</script>';


	}/*cierre respuesta ok*/
	}

	}/*CIERRE DE ISSET*/


}/*CIERRE DE FUNCION ctringresodiario*/

static function ctrEditarajustediario(){

	if(isset($_POST["Editar_id_Ajuste"])){
		
if($_POST["Proyecto"] == 1){
  $libromayor = "libromayorpro";

}else{
 $libromayor = "libromayor";	
}

		/*** INICIO MONTO DE DEBITO Y CREDITO IGUALES***************/

				if($_POST["totaldebito"] != $_POST["totalcredito"]){

						echo '<script>
										swal({

											type: "error",
											title: "El Saldo de Total Debito y Total Credito deben ser Iguales!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

				
			}
		/****FIN MONTO DE DEBITO Y CREDITO IGUALES ************/

		/*****VALIDACION DE LOS ASIENTOS DIARIOS*******/

		if($_POST["listaCuentas"] != ""){

		$listaCuentas =  json_decode($_POST["listaCuentas"], true);

		foreach ($listaCuentas as $key => $value) {

			if($value["debito"] == 0 && $value["credito"] == 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

			}
			if($value["debito"] != 0 && $value["credito"] != 0){

				echo '<script>
										swal({

											type: "error",
											title: "Error en Cuenta Contable, una o mas cuenta tienen valor mayor a cero en Debito y Credito!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";
													}

													});

										</script>';
								exit;

			}

		}
		}
		

	/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-FechaFacturames_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-FechaFacturadia_607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
									});
												
								</script>';	
					exit;	
	} 
	
	
	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["Editar-FechaFacturames_607"], 0, 4);
	$fechames = substr($_POST["Editar-FechaFacturames_607"], -2);

	if(strlen($_POST["Editar-FechaFacturames_607"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
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
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["Editar-FechaFacturadia_607"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "'.$libromayor.'";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["Editar-FechaFacturadia_607"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["Editar-FechaFacturadia_607"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$libromayor.'";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	
if(empty($_POST["listaCuentas"])){
  
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_Ajuste"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_POST["Editar-RncEmpresa607"];

	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_POST["Editar-RncEmpresa607"];


	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDA";

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_POST["Editar-RncEmpresa607"];

	$taNCF = "NCF";
	$NCF = $_POST["NAsiento"];

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	$Transaccion = 1;
	$Accion = "EDITADO";

	

	foreach ($respuesta as $key => $value) {
		/*consultar banco*/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			 $Rnc_Empresa_LD = $_POST["Editar-RncEmpresa607"];
             $valorid_grupo = $value["id_grupo"];
             $valorid_categoria = $value["id_categoria"];
             $valorid_generica = $value["id_generica"];
             $valorid_cuenta = $value["id_cuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco != false && $banco["id_grupo"] == $valorid_grupo){
             	$id_banco = $banco["id"];


             }else{
             	$id_banco = 0;


             }
			
            $tabla = "librodiario_empresas";
			$datos = array("id" => $value["id"],
			"Rnc_Factura" => $Rnc_Factura,
			"NCF" => $NCF,
			"Nombre_Empresa" => $_POST["Nombre_Empresa"],
			"Fecha_AnoMes_LD" => $_POST["Editar-FechaFacturames_607"],
			"Fecha_dia_LD" => $_POST["Editar-FechaFacturadia_607"],
			"ObservacionesLD" => $_POST["Editar-Descripcion"],
			"Tipo_Transaccion" => $Transaccion,
			"Fecha_AnoMes_Trans" => $_POST["Editar-FechaFacturames_607"],
			"Fecha_dia_Trans" => $_POST["Editar-FechaFacturadia_607"],
			"id_banco" => $id_banco,
			"Usuario_Creador" => $_POST["UsuarioLogueado"],
			"Accion" => $Accion);

	$respuesta = ModeloDiario::mdlEditarGastoDiarioSinAsientos($tabla, $datos);

	} 
	if($respuesta == "ok"){
		echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el registro de Ajuste Diario Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";


													}

													});

										</script>';
			exit;
		}


} else {

	   
    
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_Ajuste"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_POST["Editar-RncEmpresa607"];

	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_POST["Editar-RncEmpresa607"];


	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DDA";

	 
	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

	$listaCuentas =  json_decode($_POST["listaCuentas"], true);
	foreach ($listaCuentas as $key => $value) {
		/*conculta banco*/
		/*consultar banco*/
			$tabla = "banco_empresas";
			$taRnc_Empresa_LD = "Rnc_Empresa_Banco";
			$taid_grupo = "id_grupo";
			$taid_categoria = "id_categoria";
			$taid_generica = "id_generica";
			$taid_cuenta = "id_cuenta";

			 $Rnc_Empresa_LD = $Rnc_Empresa_LD;
             $valorid_grupo = $value["idgrupo"];
             $valorid_categoria = $value["idcategoria"];
             $valorid_generica = $value["idgenerica"];
             $valorid_cuenta = $value["idcuenta"];
           

             $banco = ModeloBanco::mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta);
             if($banco != false){
             	$id_banco = $banco["id"];


             }else{
             	$id_banco = 0;


             }
			
			
				/**consulta proyecto***/
			if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $value["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $value["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}

	$tabla = "librodiario_empresas";

	$NCF = $_POST["NAsiento"];

	$ObservacionesLD =  $_POST["Editar-Descripcion"];
	$Extraer = "DDA";
	$Transaccion = 1;
	$Accion = "EDITADA";
	$debito = bcdiv($value["debito"], '1', 2);
	$credito = bcdiv($value["credito"], '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_LD,
					"id_registro" => $_POST["Editar_id_Ajuste"],
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $_POST["Nombre_Empresa"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $value["idgrupo"],
					"id_categoria" => $value["idcategoria"],
					"id_generica" => $value["idgenerica"],
					"id_cuenta" => $value["idcuenta"],
					"Nombre_Cuenta" => $value["nombrecuenta"],
					"Fecha_AnoMes_LD" => $_POST["Editar-FechaFacturames_607"],
					"Fecha_dia_LD" => $_POST["Editar-FechaFacturadia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer,
					"Tipo_Transaccion" => $Transaccion,
					"Fecha_AnoMes_Trans" => $_POST["Editar-FechaFacturames_607"],
					"Fecha_dia_Trans" => $_POST["Editar-FechaFacturadia_607"],
					"id_banco" => $id_banco,
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	
		}
		

	if($respuesta == "ok"){


					echo '<script>

										swal({
							
											type: "success",
											title: "¡Se ha Modificado el Ajuste Diario Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$libromayor.'";


													}

													});

										</script>';
							}


}/*CIERRE ELSE*/


}/*CIERRE ISSET*/

}/*CIERRE FUNCION */
/***************************************************
		BORRAR CATEGORIAS
	*****************************************************/

static public function ctrBorrarGastosLD(){
	if(isset($_GET["id_606"]) && isset($_GET["Rnc_Factura_606"])){
				
if($_GET["Proyecto"] == 1){
  $libromayor = "libromayorpro";

}else{
 $libromayor = "libromayor";	
}
				$tabla = "606_empresas";
				$id = "id";
				$id_606 = $_GET["id_606"];

		$respuesta = Modelo606::mdlBorrar606($tabla, $id, $id_606);

	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_GET["id_606"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_GET["Rnc_Empresa_LD"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = $_GET["Extraer"];
	
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_GET["Rnc_Factura_606"];
	
	$taNCF = "NCF";
	$NCF = $_GET["NCF_606"];

	
	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}
				
				if($borrar == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Registro 606 y los Asientos se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "'.$libromayor.'";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/

		}


	}
static public function ctrBorrarIngresosLD(){
	if(isset($_GET["id_607"]) && isset($_GET["Rnc_Factura_607"])){
		if($_GET["Proyecto"] == 1){
  $libromayor = "libromayorpro";

}else{
 $libromayor = "libromayor";	
}
$tabla = "607_empresas";
				$id_607 = "id";
				$Valor_id607 = $_GET["id_607"];

$crear608 =  Modelo607::mdlMostrar607Retener($tabla, $id_607, $Valor_id607);

$Fecha_AnoMesDia_608  = $crear608["Fecha_AnoMesDia_607"];
$Estatus_608 = "";
$Accion_608 = "CREADO";
$Modulo = "DIARIO";
$Estatus = "1";//1- no disponible 2- disponible 3 declarada//
						 

$tabla = "608_empresas";
$datos = array("Rnc_Empresa_608" => $crear608["Rnc_Empresa_607"],
"NCF_608" => $crear608["NCF_607"],
"Fecha_AnoMesDia_608" => $crear608["Fecha_AnoMesDia_607"],
"Extraer_Tipo_Anulacion_608" => "03",
"Estatus_608" => $Estatus_608,
"EXTRAER_NCF_608" => $crear608["EXTRAER_NCF_607"],
"Fecha_comprobante_AnoMes_608" => $crear608["Fecha_comprobante_AnoMes_607"],
"Fecha_Comprobante_Dia_608" => $crear608["Fecha_Comprobante_Dia_607"],
"Tipo_de_Anulacion_608" => "03-Impresión defectuosa",
"Descripcion_608" => $crear608["Descripcion_607"],
"Usuario_Creador" => $_SESSION["Nombre"],
"Accion_608" => $Accion_608,
"Modulo" => $Modulo,
"Estatus" => $Estatus);

$respuesta =  Modelo608::MdlRegistrar608($tabla, $datos);

		$tabla = "607_empresas";
		$id = "id";
		$id_607 = $_GET["id_607"];

		$respuesta = Modelo607::mdlBorrar607($tabla, $id, $id_607);


				
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_GET["id_607"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_GET["Rnc_Empresa_LD"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = $_GET["Extraer"];
	
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_GET["Rnc_Factura_607"];
	
	$taNCF = "NCF";
	$NCF = $_GET["NCF_607"];

	
	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}


				
				if($borrar == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Diario de Ingresos se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "'.$libromayor.'";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/

		}


	}

static public function ctrBorrarAjusteLD(){
	if(isset($_GET["id_Ajuste"]) && isset($_GET["Rnc_Factura_Ajuste"])){
		if($_GET["Proyecto"] == 1){
  $libromayor = "libromayorpro";

}else{
 $libromayor = "libromayor";	
}
			

	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_GET["id_Ajuste"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_GET["Rnc_Empresa_LD"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = $_GET["Extraer"];
	
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_GET["Rnc_Factura_Ajuste"];
	
	$taNCF = "NCF";
	$NCF = $_GET["NCF_Ajuste"];

	
	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];
		

		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}
				
				if($borrar == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Diario de Ajuste se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "'.$libromayor.'";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/
		}
	}
	static public function ctrMostrarGastoCompra($Rnc_Empresa_LD, $Rnc_Factura, $NCF, $Extraer){
	$tabla = "librodiario_empresas";
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$taRnc_Factura = "Rnc_Factura";
	$taNCF = "NCF";
	$taExtraer = "Extraer_NAsiento";

	$respuesta = ModeloDiario::mdlMostrarGastoCompra($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF, $taExtraer, $Extraer); 

	return $respuesta;

}

}/*CIERRE DE CLASE*/