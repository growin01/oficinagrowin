<?php 


class ControladorCXP{


	static public function ctrMostarCXP($Rnc_Empresa_CXP){

		$tabla = "cxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";


		$respuesta =  ModeloCXP::mdlMostarCXP($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP);

		return $respuesta;

	}
	static public function ctrMostarCXPidSuplidor($Rnc_Empresa_CXP, $id_Suplidor){

		$tabla = "cxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";
		$taidSuplidor = "id_Suplidor";


		$respuesta =  ModeloCXP::mdlMostarCXPidSuplidor($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP, $taidSuplidor, $id_Suplidor);

		return $respuesta;

	}
	static public function ctrMostarCXPSuplidor($Rnc_Empresa_CXP, $Suplidor){

		$tabla = "cxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";
		$taid_Suplidor = "id_Suplidor";


		$respuesta =  ModeloCXP::mdlMostarCXPSuplidor($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP, $taid_Suplidor, $Suplidor);

		return $respuesta;

	}
	static public function ctrMostarCXPPeriodo($Rnc_Empresa_CXP, $PeriodoCXP){

		$tabla = "cxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";
		$taPeriodoCXP = "FechaAnoMes_cxp";


		$respuesta =  ModeloCXP::mdlMostarCXPPeriodo($tabla, $taRncEmpresaCXP, $taPeriodoCXP, $Rnc_Empresa_CXP, $PeriodoCXP);

		return $respuesta;

	}
	static public function ctrMostarCXPPeriodoSuplidor($Rnc_Empresa_CXP, $PeriodoCXP, $Suplidor){

		$tabla = "cxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";
		$taPeriodoCXP = "FechaAnoMes_cxp";
		$taid_Suplidor = "id_Suplidor";


		$respuesta =  ModeloCXP::mdlMostarCXPPeriodoSuplidor($tabla, $taRncEmpresaCXP, $taPeriodoCXP, $Rnc_Empresa_CXP, $PeriodoCXP, $taid_Suplidor, $Suplidor);

		return $respuesta;

	}
	static public function ctrReporteCXP($Rnc_Empresa_CXP, $periodoCXP){

		$tabla = "cxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";


		$respuesta =  ModeloCXP::mdlReporteMostarCXP($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP, $periodoCXP);

		return $respuesta;


}
	static public function ctrMostarRecibodepago($Rnc_Empresa_CXP){

		$tabla = "recibocxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";


		$respuesta =  ModeloCXP::mdlMostarRecibodepago($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP);

		return $respuesta;

	}
	static public function ctrMostaridRecibodepago($Rnc_Empresa_CXP, $id, $NAsiento){

		$tabla = "recibocxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";
		$taid = "id"; 
		$taNAsiento = "NAsiento";

		$respuesta =  ModeloCXP::mdlMostaridRecibodepago($tabla, $taRncEmpresaCXP, $taid, $taNAsiento, $Rnc_Empresa_CXP, $id, $NAsiento);

		return $respuesta;

	}
	static public function ctrMostarDetallepago($Rnc_Empresa_CXP){

		$tabla = "pagocxp_empresas";
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";


		$respuesta =  ModeloCXP::mdlMostarDetalledepago($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP);

		return $respuesta;

	}
	static public function ctrMostarPagosCXP($Rnc_Empresa_cxp, $CodigoCompra, $id_Suplidor, $Rnc_Suplidor, $NCF_cxp, $Tipo){

		$tabla = "pagocxp_empresas";
		$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
		$taCodigoCompra = "CodigoCompra";
		$taid_Suplidor = "id_Suplidor";
		$taRnc_Suplidor = "Rnc_Suplidor";
		$taNCF_cxp = "NCF_cxp";
		$taTipo = "Tipo";

		$respuesta = ModeloCXP::mdlMostarPagosCXP($tabla, $Rnc_Empresa_cxp, $taRnc_Empresa_cxp, $CodigoCompra, $taCodigoCompra, $id_Suplidor, $taid_Suplidor, $Rnc_Suplidor, $taRnc_Suplidor, $NCF_cxp, $taNCF_cxp, $taTipo, $Tipo);

		return $respuesta;

	}

	static public function ctrMostrarRecibirPago($id, $valoridCXP){

		$tabla = "cxp_empresas";
		

		$respuesta = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXP);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/



static public function ctrEmitirPago(){

	if(isset($_POST["RncEmpresaCXP"])){
		/***INICIO VALIDACION QUE EL ASIENTO NO SE REPITA***/

		$url = $_SERVER["REQUEST_URI"];

	$tabla = "recibocxp_empresas";
				$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
				$Rnc_Empresa_cxp = $_POST["RncEmpresaCXP"];
				$taCodigoReciboCXP = "CodigoReciboCXP";
				$CodigoReciboCXP = $_POST["nuevoReciboCXP"];
				

$ReciboCXPRepetida = ModeloCXP::MdlReciboCXPRepetido($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoReciboCXP, $CodigoReciboCXP);

if($ReciboCXPRepetida != false && $ReciboCXPRepetida["Rnc_Empresa_cxp"] == $Rnc_Empresa_cxp && $ReciboCXPRepetida["CodigoReciboCXP"] == $CodigoReciboCXP){

				echo '<script>
								swal({
									type: "error",
									title: "ESTE RECIBO YA ESTA REGISTRADO DEBE REVISAR EL DETALLE DE RECIBO DE PAGO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "detallerecibodepago";
											}

											});

								</script>';



			exit;

		} 				

		/*** INICIO DE ASIENTOS VACIOS***************/

				if(empty($_POST["listaFacturasCXP"]) || $_POST["listaFacturasCXP"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "Debe tener por lo menos una factura para pagar!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "'.$url.'";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/
		if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturadia"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
									});
												
								</script>';	
					exit;	
	} 

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaFacturames"], 0, 4);
	$fechames = substr($_POST["FechaFacturames"], -2);

	if(strlen($_POST["FechaFacturames"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
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
									window.location = "'.$url.'";
													
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
									window.location = "'.$url.'";
													
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
									window.location = "'.$url.'";
													
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
									window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "'.$url.'";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaFacturadia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaFacturadia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
	if($_POST["Contabilidad"] == 1 && $_POST["Diferencia"] != 0){
	if($_POST["Tipodiferencia"] == ""){ 
		
	echo '<script>
								swal({

									type: "error",
									title: "¡Debe Seleccionar un tipo de Diferencia!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
								window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;

}

}
$NAsiento = "";

if($_POST["Contabilidad"] == 1){

$Rnc_Empresa_Diario = $_POST["RncEmpresaCXP"];
$tipocod = "EPC";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "EPC".$N;


}else{
	
	$Rnc_Empresa = $_POST["RncEmpresaCXC"];
                
	$Tipo_NCF = "EPC";

	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


if($respuesta == false){
	$N = 1;
    $NAsiento = "EPC".$N;


} else{ 
 	$N = $respuesta["NCF_Cons"]+1;
    $NAsiento = "EPC".$N;

   }

}



	$listaFacturasCXP =  json_decode($_POST["listaFacturasCXP"], true);

		
if($_POST["Contabilidad"] == 1){

	$Totalbanco = 0;
	$Totaldiferencia = 0;

		foreach ($listaFacturasCXP as $key1 => $value) {

			if($_POST["ReciboPagoMoneda"] == "USD" && $_POST["MonedaParaPago"] == "USD"){
				$cxppesos = $value["cxppesos"];
				$tasahistorica = $value["tasahistorica"];
				$MontopesosCXP = $cxppesos * $tasahistorica;
				$ingbanco = $value["ingbanco"] * $tasahistorica;
				$Totalbanco = $Totalbanco + $ingbanco;
				$diferencia = $MontopesosCXP - $ingbanco;
				$Totaldiferencia = $Totaldiferencia + $diferencia;

			}
			
			if($_POST["ReciboPagoMoneda"] == "DOP" && $_POST["MonedaParaPago"] == "DOP"){
				$cxppesos = $value["cxppesos"];
				$tasahistorica = 1;
				$MontopesosCXP = $cxppesos * $tasahistorica;
				$Totalbanco = $_POST["TotalPago"];
				$Totaldiferencia =$_POST["Diferencia"];


			}
			if($_POST["ReciboPagoMoneda"] == "USD" && $_POST["MonedaParaPago"] == "DOP"){
				$MontopesosCXP = $value["cxppesos"];
				$Totalbanco = $_POST["TotalPago"];
				$Totaldiferencia =$_POST["Diferencia"];


			}
			if($_POST["ReciboPagoMoneda"] == "DOP" && $_POST["MonedaParaPago"] == "USD"){
				$MontopesosCXP = $value["cxppesos"];
				$Totalbanco = $_POST["TotalPago"];
				$Totaldiferencia =$_POST["Diferencia"];


			}


				
/*****Consulta Proyecto******/
		if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $_POST["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $_POST["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 
			}

$id_registro606 = $value["id_606"];
$Rnc_Factura_606 = $value["rnc_Factura"];
$NCF_606 = $value["ncf_factura"];

$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Observaciones"];
	$Extraer_NAsiento = "EPC";
		$idgrupo = "2";
		$idcategoria = "2";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "proveedores nacionales";
		$debito = bcdiv($MontopesosCXP, '1', 2);
		$credito = 0;
		$Transaccion_607 = 1;
		$Nombre_Empresa = $value["nombre_suplidor"];

	$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXP"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturames"],
					"id_banco" => $_POST["agregarBanco"],
					"referencia" =>  $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



}/*cierre for lista*/

$tabla = "banco_empresas";
$id = "id";
$valorid = $_POST["agregarBanco"];

$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
$NombreBanco = $banco["Nombre_Cuenta"];

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$Accion = "PAGO";
$Transaccion_607 = 1;
$idbanco = $_POST["agregarBanco"];
$idgrupo = $banco["id_grupo"];
$idcategoria = $banco["id_categoria"];
$idgenerica = $banco["id_generica"];
$idcuenta = $banco["id_cuenta"];
$nombrecuenta = $banco["Nombre_CuentaContable"];
$debito = 0;
$credito = bcdiv($Totalbanco, '1', 2);



$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXP"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

if($Totaldiferencia != 0){
	if($Totaldiferencia < 0){
		if($_POST["Tipodiferencia"] == 1){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "10";
$idcuenta = "004";
$nombrecuenta = "diferencial cambiario";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_suplidor"];
$debito = bcdiv(abs($Totaldiferencia), '1', 3);
$credito = 0;
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXP"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	 }
	if($_POST["Tipodiferencia"] == 2){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "10";
$idcuenta = "005";
$nombrecuenta = "gastos por cobros y pagos";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_suplidor"];
$debito = bcdiv(abs($Totaldiferencia), '1', 3);
$credito = 0;
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXP"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	 }

	}else{
		if($_POST["Tipodiferencia"] == 1){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$idgrupo = "4";
$idcategoria = "9";
$idgenerica = "02";
$idcuenta = "001";
$nombrecuenta = "ingresos diferencial cambiario";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_suplidor"];
$debito = 0;
$credito = bcdiv(abs($Totaldiferencia), '1', 3);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXP"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }

if($_POST["Tipodiferencia"] == 2){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$idgrupo = "4";
$idcategoria = "9";
$idgenerica = "02";
$idcuenta = "002";
$nombrecuenta = "Ingresos por cobros y pagos";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_suplidor"];
$debito = 0;
$credito = bcdiv(abs($Totaldiferencia), '1', 3);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXP"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }

	}


}
}/*if contabilidad*/
if($respuesta == "ok"){
		/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "EPC";
			
			
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresaCXP"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
			 }




/****************************pagos *************************************/
foreach ($listaFacturasCXP as $key => $value) {

$tabla = "pagocxp_empresas";
$tipo = "FACTURA";
				
$datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_cxp" => $value["ncf_factura"],
"Tipo" => $tipo);
					
          
  $Npago = ModeloCXP::mdlMostrarPago($tabla, $datos);
  $MontoPagado = 0;  
  $sumaPagado = 0;  

              
          if(!$Npago){

                $pago = 1;
                $MontoPagado = $value["monto"];
                    
              } else{

                 foreach ($Npago as $key => $n) {
                  	$sumaPagado = $sumaPagado + $n["Monto"];
                  }
                          
                   $pago = $n["Pago"]+1;  
                   $MontoPagado = $sumaPagado + $value["monto"];

              }

          /*****Consulta Proyecto******/
              if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $_POST["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $_POST["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 

			}
			if($_POST["Banco"] == 2){
				$Banco = 2;

				
				
			}else{
				$Banco = 1;

			}
$idbanco = $_POST["agregarBanco"];
$tabla = "pagocxp_empresas";
$datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"id_Suplidor" => $value["id_suplidor"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"Nombre_Suplidor"  => $value["nombre_suplidor"],
"NCF_cxp" => $value["ncf_factura"],
"Pago" => $pago,
"FechaAnoMes" => $_POST["FechaFacturames"],	
"FechaDia" => $_POST["FechaFacturadia"],
"FacturaCXP" => $_POST["ReciboPagoMoneda"],
"ReciboCXP" => $_POST["MonedaParaPago"],
"Tasa" => $value["tasa"],
"Tipodiferencia" => $_POST["Tipodiferencia"],	
"Monto" => bcdiv($value["monto"], '1', 3),
"MontoDiferencia" => bcdiv($value["diferencia"], '1', 3),
"Referencia" => $_POST["Referencia_607"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],	
"NAsiento" => $NAsiento,
"Tipo" => $tipo,
"banco" => $Banco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto);
	
$respuesta = ModeloCXP::mdlEmitirPago($tabla, $datos);

/*********************ACTUALIZAR CXP*************************/

$tabla = "cxp_empresas";
$id = "id";
$valoridCXC = $value["id"];

$CXC = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);

$Deuda = $CXC["Neto"] + $CXC["Impuesto"] + $CXC["impuestoISC"] + $CXC["otrosimpuestos"] - $CXC["ITBIS_Retenido"] - $CXC["Retencion_Renta"];


$PorPagar = $Deuda - $MontoPagado;

if($PorPagar <= 0){
$Estado = "Pagado";

}else{
$Estado = "PorPagar";

}

$tabla = "cxp_empresas";

			
$datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_cxp" => $value["ncf_factura"],
"MontoPagado" => bcdiv($MontoPagado, '1', 3),
"Estado" => $Estado);
$Actualizar = ModeloCXP::mdlActualizarCXP($tabla, $datos);

/************CERRAR ACTUALIZAR CXC ****************/

$tabla = "compras_empresas";
$Estado = 2;
				
$datos = array("Rnc_Empresa_Compras" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_Factura" => $value["ncf_factura"],
"Estado" => $Estado);
					
          
   $bloqueo = ModeloCXP::mdlActualizarCompra($tabla, $datos);



 }/*cierre for de pagos*/

$tabla = "recibocxp_empresas";
$Modulo = "recibodepago";
$Accion = "CREADO";
 $datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"CodigoReciboCXP" => $_POST["nuevoReciboCXP"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"Nombre_Suplidor"  => $value["nombre_suplidor"],
"NAsiento" => $NAsiento,
"FechaAnoMes" => $_POST["FechaFacturames"],	
"FechaDia" => $_POST["FechaFacturadia"],	
"Facturas" => $_POST["listaFacturasCXP"],
"FacturaCXP" => $_POST["ReciboPagoMoneda"],
"ReciboCXP" => $_POST["MonedaParaPago"],
"Tipodiferencia" => $_POST["Tipodiferencia"],
"Monto" =>  bcdiv($_POST["TotalPago"], '1', 3),	
"MontoDiferencia" => bcdiv($_POST["Diferencia"], '1', 3),	
"Referencia" => $_POST["Referencia_607"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],
"Modulo" => $Modulo,
"banco" => $Banco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto,
"Accion" => $Accion);

$respuesta = ModeloCXP::mdlReciboPago($tabla, $datos);
if($respuesta == "ok"){

	if($_POST["Contabilidad"] == 1){
		echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>¡El Pago Se Registro Correctamente!</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "reportecxp";
		}

		});

</script>';	



	}else{

											echo '<script>
										swal({
											type: "success",
											title: "¡El Pago Se Registro Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "reportecxp";
													}

													});

										</script>';



	}


				}





	}/*cierre isset*/


}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/
static public function ctrEditarEmitirPago(){

	if(isset($_POST["RncEmpresaCXP"]) && isset($_POST["NAsiento"])){
		
		/*** INICIO DE ASIENTOS VACIOS***************/

		if(empty($_POST["listaFacturasCXP"]) || $_POST["listaFacturasCXP"] == "[]"){

			echo '<script>
					swal({
						type: "error",
						title: "Debe tener por lo menos una factura para pagar!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{

						if(result.value){
							window.location = "detallerecibodepago";
						}

						});

					</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/
		if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodepago";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturadia"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodepago";
													
									});
												
								</script>';	
					exit;	
	} 

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaFacturames"], 0, 4);
	$fechames = substr($_POST["FechaFacturames"], -2);

	if(strlen($_POST["FechaFacturames"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodepago";
													
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
									window.location = "detallerecibodepago";
													
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
									window.location = "detallerecibodepago";
													
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
									window.location = "detallerecibodepago";
													
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
									window.location = "detallerecibodepago";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "detallerecibodepago";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaFacturadia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodepago";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaFacturadia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodepago";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

/*************BORRAR ANTES****************************************/
$tabla = "recibocxp_empresas";
$id = "id";
$valoridCXP = $_POST["idrecibodepago"];

$RecibodePago = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXP);

$RecibodecobroCXPAntes = json_decode($RecibodePago["Facturas"], true);

foreach ($RecibodecobroCXPAntes as $key => $value) { 
	
$MontoPagado = 0;
/*********************ACTUALIZAR CXC*************************/
$tabla = "cxp_empresas";
$id = "id";
$valoridCXP = $value["id"];

$CXP = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXP);

$MontoPagado = $CXP["MontoPagado"] - $value["monto"];

$Deuda = $CXP["Neto"] + $CXP["Impuesto"] + $CXP["impuestoISC"] + $CXP["otrosimpuestos"] - $CXP["ITBIS_Retenido"] - $CXP["Retencion_Renta"];


$Porcobrar = $Deuda - $MontoPagado;

if($Porcobrar <= 0){

$Estado = "Pagado";

}else{

$Estado = "PorPagar";

}

$tabla = "cxp_empresas";
				
$datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_cxp" => $value["ncf_factura"],
"MontoPagado" => bcdiv($MontoPagado, '1', 3),
"Estado" => $Estado);
$Actualizar = ModeloCXP::mdlActualizarCXP($tabla, $datos);

 }



	/*BORRAR ASIENTOS DIARIOS*/

foreach ($RecibodecobroCXPAntes as $key1 => $value) {
	
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $value["id_606"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_POST["RncEmpresaCXP"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "EPC";

	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key2 => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

 }
 /*BORRAR ASIENTOS DIARIOS*/

foreach ($RecibodecobroCXPAntes as $key3 => $value) {
 	$tabla = "compras_empresas";
	$Estado = 1;
				
		$datos = array("Rnc_Empresa_Compras" => $_POST["RncEmpresaCXP"],
			"CodigoCompra" => $value["codigo"],
			"Rnc_Suplidor" => $value["rnc_Factura"],
			"NCF_Factura" => $value["ncf_factura"],
			"Estado" => $Estado);
					
          
   		$bloqueo = ModeloCXP::mdlActualizarCompra($tabla, $datos);

    }

    /*Borrar pagos*/
foreach ($RecibodecobroCXPAntes as $key4 => $value) {
$tabla = "pagocxp_empresas";
$tipo = "FACTURA";
$datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"NAsiento" => $_POST["NAsiento"],
"Tipo" => $tipo);

$borrarpago = ModeloCXP::mdlMostrarBorrarPago($tabla, $datos);

foreach ($borrarpago as $key5 => $value){
		
		$valorid = $value["id"];


		$borrar = ModeloCXP::mdlBorrarpago($tabla, $valorid);

		
	}
 }

 $listaFacturasCXP =  json_decode($_POST["listaFacturasCXP"], true);

$Totalbanco = 0;
$Totaldiferencia = 0;

foreach ($listaFacturasCXP as $key6=> $value) {

	if($_POST["ReciboPagoMoneda"] == "USD" && $_POST["MonedaParaPago"] == "USD"){
				$cxppesos = $value["cxppesos"];
				$tasahistorica = $value["tasahistorica"];
				$MontopesosCXP = $cxppesos * $tasahistorica;
				$ingbanco = $value["ingbanco"] * $tasahistorica;
				$Totalbanco = $Totalbanco + $ingbanco;
				$diferencia = $MontopesosCXP - $ingbanco;
				$Totaldiferencia = $Totaldiferencia + $diferencia;

			}
			
			if($_POST["ReciboPagoMoneda"] == "DOP" && $_POST["MonedaParaPago"] == "DOP"){
				$cxppesos = $value["cxppesos"];
				$tasahistorica = 1;
				$MontopesosCXP = $cxppesos * $tasahistorica;
				$Totalbanco = $_POST["TotalPago"];
				$Totaldiferencia =$_POST["Diferencia"];


			}
			if($_POST["ReciboPagoMoneda"] == "USD" && $_POST["MonedaParaPago"] == "DOP"){
				$MontopesosCXP = $value["cxppesos"];
				$Totalbanco = $_POST["TotalPago"];
				$Totaldiferencia =$_POST["Diferencia"];


			}
			if($_POST["ReciboPagoMoneda"] == "DOP" && $_POST["MonedaParaPago"] == "USD"){
				$MontopesosCXP = $value["cxppesos"];
				$Totalbanco = $_POST["TotalPago"];
				$Totaldiferencia =$_POST["Diferencia"];


			}


/*****Consulta Proyecto******/
		if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $_POST["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $_POST["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 
		}
$Rnc_Empresa_606 = $_POST["RncEmpresaCXP"];
$id_registro606 = $value["id_606"];
$Rnc_Factura_606 = $value["rnc_Factura"];
$NCF_606 = $value["ncf_factura"];


$tabla = "librodiario_empresas";
		$ObservacionesLD = $_POST["Observaciones"];
		$Extraer_NAsiento = "EPC";
		$idgrupo = "2";
		$idcategoria = "2";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "proveedores nacionales";
		$debito = bcdiv($MontopesosCXP, '1', 2);
		$credito = 0;
		$Transaccion_607 = 1;
		$Nombre_Empresa = $value["nombre_suplidor"];
		$Accion = "PAGO";
	
		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturames"],
					"id_banco" => $_POST["Editar-agregarBanco"],
					"referencia" =>  $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}/*cierre for lista*/

$tabla = "banco_empresas";
$id = "id";
$valorid = $_POST["Editar-agregarBanco"];

$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
$NombreBanco = $banco["Nombre_Cuenta"];

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$Accion = "PAGO";
$Transaccion_607 = 1;
$idbanco = $_POST["Editar-agregarBanco"];
$idgrupo = $banco["id_grupo"];
$idcategoria = $banco["id_categoria"];
$idgenerica = $banco["id_generica"];
$idcuenta = $banco["id_cuenta"];
$nombrecuenta = $banco["Nombre_CuentaContable"];
$debito = 0;
$credito = bcdiv($Totalbanco, '1', 2);
$NAsiento = $_POST["NAsiento"];


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


if($Totaldiferencia != 0){
	if($Totaldiferencia < 0){
		if($_POST["Tipodiferencia"] == 1){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "10";
$idcuenta = "004";
$nombrecuenta = "diferencial cambiario";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_suplidor"];
$debito = bcdiv(abs($Totaldiferencia), '1', 3);
$credito = 0;
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	 }
	if($_POST["Tipodiferencia"] == 2){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "10";
$idcuenta = "005";
$nombrecuenta = "gastos por cobros y pagos";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_suplidor"];
$debito = bcdiv(abs($Totaldiferencia), '1', 3);
$credito = 0;
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	 }

	}else{
		if($_POST["Tipodiferencia"] == 1){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$idgrupo = "4";
$idcategoria = "9";
$idgenerica = "02";
$idcuenta = "001";
$nombrecuenta = "ingresos diferencial cambiario";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_suplidor"];
$debito = 0;
$credito = bcdiv(abs($Totaldiferencia), '1', 3);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);



$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }

if($_POST["Tipodiferencia"] == 2){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "EPC";
$idgrupo = "4";
$idcategoria = "9";
$idgenerica = "02";
$idcuenta = "002";
$nombrecuenta = "Ingresos por cobros y pagos";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_suplidor"];
$debito = 0;
$credito = bcdiv(abs($Totaldiferencia), '1', 3);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $Nombre_Empresa,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia_607"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);



$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }

	}


}
	
/****************************pagos *************************************/
foreach ($listaFacturasCXP as $key7 => $value) {

$tabla = "pagocxp_empresas";
$tipo = "FACTURA";
				
$datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_cxp" => $value["ncf_factura"],
"Tipo" => $tipo);
					
          
 $Npago = ModeloCXP::mdlMostrarPago($tabla, $datos);

  $MontoPagado = 0;  
  $sumaPagado = 0;  
          
          if(!$Npago){

                $pago = 1;
                $MontoPagado = $value["monto"];
                    
              } else{

                  foreach ($Npago as $key => $n) {}
                          
               $pago = $n["Pago"]+1;  
              $MontoPagado = $sumaPagado + $value["monto"];

              }

          /*****Consulta Proyecto******/
              if($_POST["Proyecto"] == 2){
				$idproyecto = "NO APLICA";
				$codproyecto = "NO APLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $_POST["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $_POST["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 

			}
			if($_POST["Banco"] == 2){
				$Banco = 2;

				
				
			}else{
				$Banco = 1;

			}

$tabla = "pagocxp_empresas";
$datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"id_Suplidor" => $value["id_suplidor"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"Nombre_Suplidor"  => $value["nombre_suplidor"],
"NCF_cxp" => $value["ncf_factura"],
"Pago" => $pago,
"FechaAnoMes" => $_POST["FechaFacturames"],	
"FechaDia" => $_POST["FechaFacturadia"],	
"FacturaCXP" => $_POST["ReciboPagoMoneda"],
"ReciboCXP" => $_POST["MonedaParaPago"],
"Tasa" => $value["tasa"],
"Tipodiferencia" => $_POST["Tipodiferencia"],	
"Monto" => bcdiv($value["monto"], '1', 3),
"MontoDiferencia" => bcdiv($value["diferencia"], '1', 3),
"Referencia" => $_POST["Referencia_607"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],	
"NAsiento" => $NAsiento,
"Tipo" => $tipo,
"banco" => $Banco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto);
	
$respuesta = ModeloCXP::mdlEmitirPago($tabla, $datos);


/*********************ACTUALIZAR CXP*************************/

$tabla = "cxp_empresas";
$id = "id";
$valoridCXC = $value["id"];

$CXC = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);

$Deuda = $CXC["Neto"] + $CXC["Impuesto"] + $CXC["impuestoISC"] + $CXC["otrosimpuestos"] - $CXC["ITBIS_Retenido"] - $CXC["Retencion_Renta"];


$PorPagar = $Deuda - $MontoPagado;

if($PorPagar <= 0){
$Estado = "Pagado";

}else{
$Estado = "PorPagar";

}

$tabla = "cxp_empresas";

			
$datos = array("Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_cxp" => $value["ncf_factura"],
"MontoPagado" => bcdiv($MontoPagado, '1', 3),
"Estado" => $Estado);
$Actualizar = ModeloCXP::mdlActualizarCXP($tabla, $datos);

/************CERRAR ACTUALIZAR CXC ****************/

$tabla = "compras_empresas";
$Estado = 2;
				
$datos = array("Rnc_Empresa_Compras" => $_POST["RncEmpresaCXP"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_Factura" => $value["ncf_factura"],
"Estado" => $Estado);
					
          
   $bloqueo = ModeloCXP::mdlActualizarCompra($tabla, $datos);



 }/*cierre for de pagos*/
/*borrar recibo*/

//$tabla = "recibocxp_empresas";
//$valorid = $_POST["idrecibodepago"],
//$borrar = ModeloCXP::mdlBorrarpago($tabla, $valorid);

$tabla = "recibocxp_empresas";
$Modulo = "recibodepago";
$Accion = "EDITADO";
 $datos = array("id" => $_POST["idrecibodepago"],
 "Rnc_Empresa_cxp" => $_POST["RncEmpresaCXP"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"Nombre_Suplidor"  => $value["nombre_suplidor"],
"NAsiento" => $NAsiento,
"FechaAnoMes" => $_POST["FechaFacturames"],	
"FechaDia" => $_POST["FechaFacturadia"],	
"Facturas" => $_POST["listaFacturasCXP"],
"FacturaCXP" => $_POST["ReciboPagoMoneda"],
"ReciboCXP" => $_POST["MonedaParaPago"],
"Tipodiferencia" => $_POST["Tipodiferencia"],
"Monto" =>  bcdiv($_POST["TotalPago"], '1', 3),	
"MontoDiferencia" => bcdiv($_POST["Diferencia"], '1', 3),	
"Referencia" => $_POST["Referencia_607"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],
"Modulo" => $Modulo,
"banco" => $Banco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto,
"Accion" => $Accion);

$respuesta = ModeloCXP::mdlEditarReciboPago($tabla, $datos);

if($respuesta == "ok"){

											echo '<script>
										swal({
											type: "success",
											title: "¡Se ha Modificado el Recibo de Pago Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "detallerecibodepago";
													}

													});

										</script>';

				}



}/*cierre isset*/
	

}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/


static public function ctrEliminarRecibo(){
 if(isset($_GET["accion"]) && isset($_GET["NAsiento"])){

	
		$tabla = "recibocxp_empresas";
		$taid = "id";
		$id = $_GET["id"];
		
		$taRncEmpresaCXP = "Rnc_Empresa_cxp";
		$Rnc_Empresa_CXP = $_GET["Rnc_Empresa_cxp"]; 
		
		$taNAsiento = "NAsiento";
		$NAsiento = $_GET["NAsiento"];

		
		
$Recibodepago = ModeloCXP::mdlMostaridRecibodepago($tabla, $taRncEmpresaCXP, $taid, $taNAsiento, $Rnc_Empresa_CXP, $id, $NAsiento);
/*************BORRAR ANTES****************************************/


$RecibodecobroCXPAntes = json_decode($Recibodepago["Facturas"], true);

foreach ($RecibodecobroCXPAntes as $key => $value) { 
	
$MontoPagado = 0;
/*********************ACTUALIZAR CXC*************************/
$tabla = "cxp_empresas";
$id = "id";
$valoridCXP = $value["id"];

$CXP = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXP);

$MontoPagado = $CXP["MontoPagado"] - $value["monto"];

$Deuda = $CXP["Neto"] + $CXP["Impuesto"] + $CXP["impuestoISC"] + $CXP["otrosimpuestos"] - $CXP["ITBIS_Retenido"] - $CXP["Retencion_Renta"];

$Porcobrar = $Deuda - $MontoPagado;

if($Porcobrar <= 0){

$Estado = "Pagado";

}else{

$Estado = "PorPagar";

}

$tabla = "cxp_empresas";
				
$datos = array("Rnc_Empresa_cxp" => $_GET["Rnc_Empresa_cxp"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_cxp" => $value["ncf_factura"],
"MontoPagado" => $MontoPagado,
"Estado" => $Estado);
$Actualizar = ModeloCXP::mdlActualizarCXP($tabla, $datos);

 }

$tabla= "librodiario_empresas"; 
$taRnc_Empresa_LD= "Rnc_Empresa_LD"; 
$Rnc_Empresa_LD= $_GET["Rnc_Empresa_cxp"]; 
$taRnc_Factura= "Rnc_Factura"; 
$Rnc_Factura= $_GET["Rnc_Suplidor"];
$taNCF= "NAsiento"; 
$NCF= $_GET["NAsiento"];
$taExtraer= "Extraer_NAsiento"; 
$Extraer = "EPC";

$librodiario = ModeloDiario::mdlMostrarGastoCompra($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF, $taExtraer, $Extraer);
foreach ($librodiario as $key => $value) {

$valorid = $value["id"];
$borrardiario = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);
}


$pagocxp = json_decode($Recibodepago["Facturas"], true);

foreach ($pagocxp as $key => $value) {

	$tabla = "pagocxp_empresas";
	$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
	$taRnc_Factura_cxp = "Rnc_Suplidor";
	$taNCF_cxp = "NCF_cxp";
	$taNAsiento = "NAsiento";
	
	
	$Rnc_Empresa_cxp = $_GET["Rnc_Empresa_cxp"];
	$Rnc_Factura_cxp = $value["rnc_Factura"]; 
	$NCF_cxp = $value["ncf_factura"];
	$NAsiento = $_GET["NAsiento"];

$mostarpago = ModeloCXP::MdlMostrarCXPNAsiento($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taNAsiento, $NAsiento);

$valorid = $mostarpago["id"];
$Borrarpago = ModeloCXP::mdlBorrarpago($tabla, $valorid);


$tabla = "compras_empresas";
$Estado = 1;
				
$datos = array("Rnc_Empresa_Compras" => $_GET["Rnc_Empresa_cxp"],
"CodigoCompra" => $value["codigo"],
"Rnc_Suplidor" => $value["rnc_Factura"],
"NCF_Factura" => $value["ncf_factura"],
"Estado" => $Estado);
					
          
 $bloqueo = ModeloCXP::mdlActualizarCompra($tabla, $datos);

}


$tabla = "recibocxp_empresas";
$valorid = $_GET["id"];
$Borrarpago = ModeloCXP::mdlBorrarpago($tabla, $valorid);

if($Borrarpago == "ok"){
	echo '<script>
		swal({
			type: "success",
			title: "¡Se ha Eliminado el Recibo de pago Correctamente!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{

			if(result.value){
				window.location = "detallerecibodepago";
			}

			});

		</script>';

	

}


	
}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/



 }/*cierre funcion */


static public function ctrMostrarCodigoReciboCXP($Rnc_Empresa_cxp){

		$tabla = "recibocxp_empresas";
		$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";

$respuesta = ModeloCXP::mdlMostrarCodigoReciboCXP($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/


static public function ctrVerificarCXP(){

	if(isset($_GET["verificarCXP"])){

		$url = $_SERVER["REQUEST_URI"];

		$tabla = "compras_empresas";

  $datos = array("Rnc_Empresa_Compras" => $_GET["Rnc_Empresa_606"],
  "CodigoCompra" => $_GET["CodigoCompra"],
  "NCF_Factura" => $_GET["NCF_606"]); 

$compras = ModeloCompras::MdlValidarVentasVerificarCXP($tabla, $datos);


$Deuda = $compras["Neto"] + $compras["Propinalegal"] + $compras["Impuesto"] + $compras["impuestoISC"]  + $compras["otrosimpuestos"] - $compras["Monto_Retencion_Renta_606"] - $compras["ITBIS_Retenido_606"];

$tabla = "cxp_empresas";
$id = "id";
$valoridCXP = $_GET["id"];

$CXP = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXP);



$tabla = "pagocxp_empresas";
$tipo = "FACTURA";
				
$datos = array("Rnc_Empresa_cxp" => $CXP["Rnc_Empresa_cxp"],
"CodigoCompra" => $CXP["CodigoCompra"],
"Rnc_Suplidor" => $CXP["Rnc_Suplidor"],
"NCF_cxp" => $CXP["NCF_cxp"],
"Tipo" => $tipo);
					
          
  $Npago = ModeloCXP::mdlMostrarPago($tabla, $datos);
  $MontoPagado = 0;  
  $sumaPagado = 0;  

         

                 foreach ($Npago as $key => $n) {
                  	$sumaPagado = $sumaPagado + $n["Monto"];
                  }
                   
 $MontoPagado = $sumaPagado;
 $PorPagar = $Deuda - $MontoPagado;

if($PorPagar <= 0){
$Estado = "Pagado";

}else{
$Estado = "PorPagar";

}

$tabla = "cxp_empresas";

			
$datos = array("Rnc_Empresa_cxp" => $CXP["Rnc_Empresa_cxp"],
"CodigoCompra" => $CXP["CodigoCompra"],
"Rnc_Suplidor" => $CXP["Rnc_Suplidor"],
"NCF_cxp" => $CXP["NCF_cxp"],
"MontoPagado" => bcdiv($MontoPagado, '1', 3),
"Estado" => $Estado);
$Actualizar = ModeloCXP::mdlActualizarCXP($tabla, $datos);

$tabla = "cxp_empresas";

$datos = array("id_Suplidor" => $compras["id_Suplidor"],
		"Rnc_Empresa_cxp" => $_GET["Rnc_Empresa_606"],
		"NCF_cxp" => $_GET["NCF_606"],
		"Rnc_Suplidor" => $compras["Rnc_Suplidor"],
		"Nombre_Suplidor" => $compras["Nombre_Suplidor"]);

$respuesta = ModeloCXP::mdlUdateverificarCXPSuplidor($tabla, $datos);

              
                                 
if($MontoPagado > 0){

$tabla = "compras_empresas";
$Estado = 2;
				
$datos = array("Rnc_Empresa_Compras" => $_GET["Rnc_Empresa_606"],
"CodigoCompra" => $_GET["CodigoCompra"],
"Rnc_Suplidor" => $compras["Rnc_Suplidor"],
"NCF_Factura" => $_GET["NCF_606"],
"Estado" => $Estado);
					
          
   $bloqueo = ModeloCXP::mdlActualizarCompra($tabla, $datos);

 }

	
if($Actualizar == "ok"){

echo '<script>
		swal({
			type: "success",
			title: "¡Se ha Verificado los pagos de esta factura Correctamente!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{

			if(result.value){
				window.location = "reportecxp";
			}

			});

		</script>';

 }



	}// cierre if

 	





}


static public function ctrAgregarretencionRecibopago(){
	
	if(isset($_POST["id_606_Retener"])){
/***********INICIO VALIDACION FECHA AÑOS MES**************************/

$url = $_SERVER["REQUEST_URI"];
$_POST["Moneda"] = $_POST["Monedarecibopago"];

	$fechaano = substr($_POST["FechaRetenecionmes_606"], 0, 4);
	$fechames = substr($_POST["FechaRetenecionmes_606"], -2);

	if(strlen($_POST["FechaRetenecionmes_606"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
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
									window.location = "'.$url.'";
													
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
									window.location = "'.$url.'";
													
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
									window.location = "'.$url.'";
													
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
									window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;
	}

	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaReteneciondia_606"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "'.$url.'";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaReteneciondia_606"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaReteneciondia_606"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/


/*********************RETENCION 607************************************/
$ValorTipo_Retencion_ISR_606 = $_POST["tipo_de_seleccionretener"];

	switch ($ValorTipo_Retencion_ISR_606){
		case "0":
       		$Tipo_Retencion_ISR_606 = "";
        	break;
			case "01":
       		$Tipo_Retencion_ISR_606 = "01 - ALQUILERES";
        	break;

        	case "02":
       		$Tipo_Retencion_ISR_606 = "02 - HONORARIOS POR SERVICIOS";
        	break;

        	case "03":
       		$Tipo_Retencion_ISR_606 = "03 - OTRAS RENTAS";
        	break;

        	case "04":
       		$Tipo_Retencion_ISR_606 = "04 - OTRAS RENTAS (Rentas Presuntas)";
        	break;

        	case "05":
       		$Tipo_Retencion_ISR_606 = "05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES";
        	break;

        	case "06":
       		$Tipo_Retencion_ISR_606 = "06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES";
        	break;

        	case "07":
       		$Tipo_Retencion_ISR_606 = "07 - RETENCION POR PROVEEDORES DEL ESTADO";
        	break;

        	case "08":
       		$Tipo_Retencion_ISR_606 = "08 - JUEGOS TELEFONICOS";
        	break;

        									       										

	}
				
$tabla = "606_empresas";
											
					
date_default_timezone_set('America/Santo_Domingo');
$fecha = date('Y-m-d');
$hora = date('H:i:s');
$fechaActual = $fecha.' '.$hora;

$Fecha_Registro = $fechaActual;

$Accion_606 = "RETENER";

if(isset($_POST["ISR_RETENIDO"]) && $_POST["ISR_RETENIDO"] == "2"){
	$ISR_RETENIDO = $_POST["ISR_RETENIDO"];


}elseif(isset($_POST["ISR_RETENIDO"]) && $_POST["ISR_RETENIDO"] == "10"){

	$ISR_RETENIDO = $_POST["ISR_RETENIDO"];


}else{
	$ISR_RETENIDO = 0;

}

if(isset($_POST["ITBIS_Retenido"]) && $_POST["ITBIS_Retenido"] == "30"){
	$ITBIS_Retenido = $_POST["ITBIS_Retenido"];


}elseif(isset($_POST["ITBIS_Retenido"]) && $_POST["ITBIS_Retenido"] == "75"){

	$ITBIS_Retenido = $_POST["ITBIS_Retenido"];


}elseif(isset($_POST["ITBIS_Retenido"]) && $_POST["ITBIS_Retenido"] == "100"){

	$ITBIS_Retenido = $_POST["ITBIS_Retenido"];


}else{
	$ITBIS_Retenido = 0;

}

if($_POST["Moneda"] == "USD"){

		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$ITBIS_Retenido_606 = $USDITBIS_Retenido_606 * $_POST["Tasa"];
		$USDMonto_Retencion_Renta_606 =$_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $USDMonto_Retencion_Renta_606 * $_POST["Tasa"];


	}else{
		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$USDMonto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
	}

$datos = array("id" => $_POST["id_606_Retener"], 
		"Usuario_Creador" => $_POST["Usuariologueado"], 
		"Fecha_Registro" => $Fecha_Registro, 
		"Accion_606" => $Accion_606, 
		"Fecha_Ret_AnoMes_606" => $_POST["FechaRetenecionmes_606"], 
		"Fecha_Ret_Dia_606" => $_POST["FechaReteneciondia_606"], 
		"ITBIS_Retenido_606" => $ITBIS_Retenido_606, 
		"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606, 
		"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606, 
		"Extrar_Tipo_Retencion_606" => $_POST["tipo_de_seleccionretener"], 
		"Porc_ITBIS_Retenido_606" => $ITBIS_Retenido, 
		"Porc_ISR_Retenido_606" => $ISR_RETENIDO);

$respuesta = Modelo606::MdlAgregarretencion606($tabla, $datos);
/*********************FIN RETENCION 607************************************/
/*********************RETENCION CXC************************************/
if($_POST["Forma_Pago_606"] == "04"){

		$tabla = "cxp_empresas";
		$taCodigo = "CodigoCompra";
		$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
		$taNCF_cxp = "NCF_cxp";

		$CodigoCompra = $_POST["CodigoCompra"];
		$Rnc_Empresa_cxp = $_POST["RncEmpresaRetener"];
		$NCF_cxp = $_POST["NCF_606_Retener"];

$CXP = ModeloCXP::mdlMostarCXPFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxp, $taNCF_cxp, $CodigoCompra, $Rnc_Empresa_cxp, $NCF_cxp);
									
									
if($CXP["Rnc_Empresa_cxp"] == $Rnc_Empresa_cxp && $CXP["CodigoCompra"] == $CodigoCompra && $CXP["NCF_cxp"] == $NCF_cxp){
$Retenciones = "1";
	$datos = array("CodigoCompra" => $CodigoCompra, 
				"Rnc_Empresa_cxp" => $Rnc_Empresa_cxp,
				"NCF_cxp" => $NCF_cxp,
				"Fecha_Ret_AnoMes_cxp" => $_POST["FechaRetenecionmes_606"], 
				"Fecha_Ret_Dia_cxp" => $_POST["FechaReteneciondia_606"], 
				"ITBIS_Retenido" => $USDITBIS_Retenido_606, 
				"Retencion_Renta" => $USDMonto_Retencion_Renta_606,
				"Retenciones" => $Retenciones);
				/*editar cxc*/

$respuesta = ModeloCXP::mdlEDITARCXPRETENCION($tabla, $datos);
		} 

}
/*********************FIN RETENCION CXC************************************/
/*********************FIN RETENCION CXC************************************/
$NAsientoRet = "";
if($_POST["Contabilidad"] == 1){


$tabla = "librodiario_empresas";
	
$taid_registro = "id_registro";
$id_registro = $_POST["id_606_Retener"];

$taRnc_Empresa_LD = "Rnc_Empresa_LD";
$Rnc_Empresa_LD = $_POST["RncEmpresaRetener"];

$taExtraer = "Extraer_NAsiento";
$Extraer = "REC";

	 
$taRnc_Factura = "Rnc_Factura";
$Rnc_Factura = $_POST["Rnc_Retener_606"];

$taNCF = "NCF";
$NCF = $_POST["NCF_606_Retener"];


$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

foreach ($respuesta as $key => $value){
		
if($value["Extraer_NAsiento"] == $Extraer && $value["Rnc_Empresa_LD"] == $Rnc_Empresa_LD && $value["Rnc_Factura"] == $Rnc_Factura && $value["NCF"] == $NCF){
	$NAsientoRet = $value["NAsiento"];
	$ASIENTOS = "2";


}
 }
if($NAsientoRet == ""){
	/****Consulta asiento factura retecion*****/

	$Rnc_Empresa = $Rnc_Empresa_LD;
	$Tipo_NCF = "REC";
	$codigoRet = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);
	
	
    $NRet = $codigoRet["NCF_Cons"] + 1;
    $NAsientoRet = "REC".$NRet;
    $ASIENTOS = "1";

}

foreach ($respuesta as $key => $value){
		
	$valorid = $value["id"];
	$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
}


		$tabla = "suplidor_empresas";
		$taRnc_Empresa_Suplidor = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Suplidor = $Rnc_Empresa_LD;
		$taDocumento = "Documento_Suplidor";
		$Documento = $Rnc_Factura;

		
		$respuesta = ModeloSuplidores::mdlMostrarSuplidorFact($tabla, $taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, $taDocumento, $Documento);
	
		$id_Suplidor = $respuesta["id"];
		$NombreSuplidor = $respuesta["Nombre_Suplidor"];




$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 
$id_banco = 0;
$tabla = "librodiario_empresas";

$Extraer_NAsiento = "REC";
$Accion = "COMPRAS";
$Transaccion_606 = 1;
$idbanco = 0;
$ObservacionesLD = "Retencion Factura ".$_POST["NCF_606_Retener"];


if($_POST["Forma_Pago_606"] == "04"){ 

$TotalRetencion = $ITBIS_Retenido_606 + $Monto_Retencion_Renta_606;
		
	$idgrupo = "2";
	$idcategoria = "2";
	$idgenerica = "01";
	$idcuenta = "001";
	$nombrecuenta = "proveedores nacionales";
	$debito = bcdiv($TotalRetencion, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaRetener"],
					"id_registro" => $_POST["id_606_Retener"],
					"Rnc_Factura" => $_POST["Rnc_Retener_606"],
					"NCF" => $_POST["NCF_606_Retener"],
					"Nombre_Empresa" => $NombreSuplidor,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_606"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaRetenecionmes_606"],
					"Fecha_dia_Trans" => $_POST["FechaReteneciondia_606"],
					"id_banco" => $id_banco,
					"referencia" => $ObservacionesLD,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}
if($ITBIS_Retenido_606 > 0){
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido por pagar";
		$debito = 0;
		$credito = bcdiv($ITBIS_Retenido_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaRetener"],
					"id_registro" => $_POST["id_606_Retener"],
					"Rnc_Factura" => $_POST["Rnc_Retener_606"],
					"NCF" => $_POST["NCF_606_Retener"],
					"Nombre_Empresa" => $NombreSuplidor,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_606"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606_Retener"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606_Retener"],
					"id_banco" => $id_banco,
					"referencia" => $ObservacionesLD,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	
	}

	if($Monto_Retencion_Renta_606 > 0){
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "02";
		$idcuenta = "002";
		$nombrecuenta = "retenciones de ISR IR17 por pagar";
		$debito = 0;
		$credito = bcdiv($Monto_Retencion_Renta_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaRetener"],
					"id_registro" => $_POST["id_606_Retener"],
					"Rnc_Factura" => $_POST["Rnc_Retener_606"],
					"NCF" => $_POST["NCF_606_Retener"],
					"Nombre_Empresa" => $NombreSuplidor,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_606"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606_Retener"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606_Retener"],
					"id_banco" => $id_banco,
					"referencia" => $ObservacionesLD,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		



	}



if($respuesta == "ok"){
/*******************************************************************************
					ACTUALIZAR CORRELATIVOS ACTUALIZAR CORRELATIVOS
*******************************************************************************/

		if($ASIENTOS == 1){
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "REC";
			
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_LD,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $NRet);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos); 


		} 

 }



}/*CIERRE CONTABILIDAD*/

$tabla = "compras_empresas";
		
		$Retenciones = "1";

	$datos = array("Rnc_Empresa_Compras" => $_POST["RncEmpresaRetener"], 
				"Rnc_Suplidor" => $_POST["Rnc_Retener_606"],
				"NCF_Factura" => $_POST["NCF_606_Retener"], 
				"Retenciones" => $Retenciones,
				"Porc_ITBIS_Retenido" => $ITBIS_Retenido,	
				"Porc_ISR_Retenido" => $ISR_RETENIDO,	
				"ITBIS_Retenido_606" => $USDITBIS_Retenido_606,
				"Monto_Retencion_Renta_606" => $USDMonto_Retencion_Renta_606,
				"NAsientoRET" => $NAsientoRet);
				/*editar cxc*/

$respuesta = ModeloCompras::mdlRETENCIONCOMPRA($tabla, $datos);

if($respuesta == "ok"){

$modulo = $_POST["Modulo"];
	
switch ($modulo) {
	case 'compras':
		echo '<script>
						swal({			
							type: "success",
							title: "¡La Retención fue realizada Exitosamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "'.$url.'";
							}
							});
						</script>';
			
			break;
		
	
	case 'reportecxp':
		echo '<script>
						swal({			
							type: "success",
							title: "¡La Retención fue realizada Exitosamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "'.$url.'";
							}
							});
						</script>';
			
			break;

			case 'recibodepago':
		echo '<script>
						swal({			
							type: "success",
							title: "¡La Retención fue realizada Exitosamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "'.$url.'";
							}
							});
						</script>';
			
			break;

			
		
	}

}



}/*cierre isset*/ 
}/*cierre funcion*/

}/*class*/




