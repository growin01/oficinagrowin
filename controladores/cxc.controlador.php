<?php 


class ControladorCXC{


static public function ctrMostarCXC($Rnc_Empresa_CXC){

		$tabla = "cxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";


		$respuesta =  ModeloCXC::mdlMostarCXC($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC);

		return $respuesta;


}
static public function ctrMostarCXCidCliente($Rnc_Empresa_CXC, $id_Cliente){

		$tabla = "cxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";
		$taidCliente = "id_Cliente";


		$respuesta =  ModeloCXC::mdlMostarCXCidCliente($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC, $taidCliente, $id_Cliente);

		return $respuesta;


}
static public function ctrMostarCXCCliente($Rnc_Empresa_CXC, $Cliente){

		$tabla = "cxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxC";
		$taid_Cliente = "id_Cliente";


		$respuesta =  ModeloCXC::mdlMostarCXPCliente($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC, $taid_Cliente, $Cliente);

		return $respuesta;

	}
static public function ctrMostarCXCPeriodo($Rnc_Empresa_CXC, $PeriodoCXC){

		$tabla = "cxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";
		$taPeriodoCXC = "FechaAnoMes_cxc";


		$respuesta = ModeloCXC::mdlMostarCXCPeriodo($tabla, $taRncEmpresaCXC, $taPeriodoCXC, $Rnc_Empresa_CXC, $PeriodoCXC);

		return $respuesta;

	}
	static public function ctrMostarCXPPeriodoCliente($Rnc_Empresa_CXC, $PeriodoCXC, $Cliente){

		$tabla = "cxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";
		$taPeriodoCXC = "FechaAnoMes_cxc";
		$taid_Cliente = "id_Cliente";


		$respuesta =  ModeloCXC::mdlMostarCXCPeriodoCliente($tabla, $taRncEmpresaCXC, $taPeriodoCXC, $Rnc_Empresa_CXC, $PeriodoCXC, $taid_Cliente, $Cliente);

		return $respuesta;

	}
static public function ctrReporteCXC($Rnc_Empresa_CXC, $periodoCXC){

		$tabla = "cxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";


		$respuesta =  ModeloCXC::mdlReporteMostarCXC($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC, $periodoCXC);

		return $respuesta;


}
	static public function ctrMostarDetallecobro($Rnc_Empresa_CXC){

		$tabla = "pagocxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";


		$respuesta = ModeloCXC::mdlMostarDetalledecobro($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC);

		return $respuesta;

	}
	static public function ctrMostarPagosCXC($Rnc_Empresa_cxc, $CodigoVenta, $id_Cliente, $Rnc_Cliente, $NCF_cxc, $Tipo){

		$tabla = "pagocxc_empresas";
		$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";
		$taCodigoVenta = "CodigoVenta";
		$taid_Cliente = "id_Cliente";
		$taRnc_Cliente = "Rnc_Cliente";
		$taNCF_cxc = "NCF_cxc";
		$taTipo = "Tipo";

		$respuesta = ModeloCXC::mdlMostarPagosCXC($tabla, $Rnc_Empresa_cxc, $taRnc_Empresa_cxc, $CodigoVenta, $taCodigoVenta, $id_Cliente, $taid_Cliente, $Rnc_Cliente, $taRnc_Cliente, $NCF_cxc, $taNCF_cxc, $taTipo, $Tipo);

		return $respuesta;

	}
	static public function ctrMostrarRecibirPago($id, $valoridCXC){

		$tabla = "cxc_empresas";
		

		$respuesta = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/

static public function ctrEmitirCobro(){

	if(isset($_POST["RncEmpresaCXC"])){
		/***INICIO VALIDACION QUE EL ASIENTO NO SE REPITA***/
$url = $_SERVER["REQUEST_URI"];

				$tabla = "recibocxc_empresas";
				$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";
				$Rnc_Empresa_cxc = $_POST["RncEmpresaCXC"];
				$taCodigoReciboCXC = "CodigoReciboCXC";
				$CodigoReciboCXC = $_POST["nuevoReciboCXC"];
				

$ReciboCXCRepetida = ModeloCXC::MdlReciboCXCRepetido($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_cxc, $taCodigoReciboCXC, $CodigoReciboCXC);

if($ReciboCXCRepetida != false && $ReciboCXCRepetida["Rnc_Empresa_cxc"] == $Rnc_Empresa_cxc && $ReciboCXCRepetida["CodigoReciboCXC"] == $CodigoReciboCXC){

				echo '<script>
								swal({
									type: "error",
									title: "ESTE RECIBO YA ESTA REGISTRADO DEBE REVISAR EL DETALLE DE RECIBO DE COBRO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "detallerecibodecobro";
											}

											});

								</script>';



			exit;

		} 	

		/*** INICIO DE ASIENTOS VACIOS***************/

				if(empty($_POST["listaFacturasCXC"]) || $_POST["listaFacturasCXC"] == "[]"){

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

/**********FIN VALIDACION FECHA DIA ******************************/
$NAsiento = "";

 

if($_POST["Contabilidad"] == 1){

$Rnc_Empresa_Diario = $_POST["RncEmpresaCXC"];
$tipocod = "RPC";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "RPC".$N;


}else{
	
	$Rnc_Empresa = $_POST["RncEmpresaCXC"];
                
	$Tipo_NCF = "RPC";

	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


if($respuesta == false){
	$N = 1;
    $NAsiento = "RPC".$N;
    $respuesta == "ok";


} else{ 
 	$N = $respuesta["NCF_Cons"]+1;
    $NAsiento = "RPC".$N;
    $respuesta == "ok";

   }

}



$listaFacturasCXC = json_decode($_POST["listaFacturasCXC"], true);
if($_POST["Contabilidad"] == 1){

	$Totalbanco = 0;
	$Totaldiferencia = 0;

foreach ($listaFacturasCXC as $key1 => $value) {
			
			if($_POST["ReciboCobroMoneda"] == "USD" && $_POST["MonedaParaCobro"] == "USD"){
				$cxcpesos = $value["cxcpesos"];
				$tasahistorica = $value["tasahistorica"];
				$MontopesosCXC = $cxcpesos * $tasahistorica;
				$ingbanco = $value["ingbanco"] * $tasahistorica;
				$Totalbanco = $Totalbanco + $ingbanco;
				$diferencia = $MontopesosCXC - $ingbanco;
				$Totaldiferencia = $Totaldiferencia + $diferencia;

			}
			
			if($_POST["ReciboCobroMoneda"] == "DOP" && $_POST["MonedaParaCobro"] == "DOP"){
				$cxcpesos = $value["cxcpesos"];
				$tasahistorica = 1;
				$MontopesosCXC = $cxcpesos * $tasahistorica;
				$Totalbanco = $_POST["TotalCobro"];
				$Totaldiferencia =$_POST["Diferencia"];


			}
			if($_POST["ReciboCobroMoneda"] == "USD" && $_POST["MonedaParaCobro"] == "DOP"){
				$MontopesosCXC = $value["cxcpesos"];
				$Totalbanco = $_POST["TotalCobro"];
				$Totaldiferencia =$_POST["Diferencia"];


			}
			if($_POST["ReciboCobroMoneda"] == "DOP" && $_POST["MonedaParaCobro"] == "USD"){
				$MontopesosCXC = $value["cxcpesos"];
				$Totalbanco = $_POST["TotalCobro"];
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

$id_registro607 = $value["id_607"];
$Rnc_Factura_607 = $value["rnc_Factura"];
$NCF_607 = $value["ncf_factura"];

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "RPC";
$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = 0;
$credito = bcdiv($MontopesosCXC, '1', 2);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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
$Extraer_NAsiento = "RPC";
$Accion = "PAGO";
$Transaccion_607 = 1;
$idbanco = $_POST["agregarBanco"];
$idgrupo = $banco["id_grupo"];
$idcategoria = $banco["id_categoria"];
$idgenerica = $banco["id_generica"];
$idcuenta = $banco["id_cuenta"];
$nombrecuenta = $banco["Nombre_CuentaContable"];
$debito = bcdiv($Totalbanco, '1', 2);
$credito = 0;



$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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
	if($Totaldiferencia > 0){
		if($_POST["Tipodiferencia"] == 1){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "RPC";
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "10";
$idcuenta = "004";
$nombrecuenta = "diferencial cambiario";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = bcdiv($Totaldiferencia, '1', 2);
$credito = 0;
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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


	 }
	if($_POST["Tipodiferencia"] == 2){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "RPC";
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "10";
$idcuenta = "005";
$nombrecuenta = "gastos por cobros y pagos";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = bcdiv($Totaldiferencia, '1', 2);
$credito = 0;
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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


	 }

	}else{
		if($_POST["Tipodiferencia"] == 1){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "RPC";
$idgrupo = "4";
$idcategoria = "9";
$idgenerica = "02";
$idcuenta = "001";
$nombrecuenta = "ingresos diferencial cambiario";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = 0;
$credito = bcdiv(abs($Totaldiferencia), '1', 2);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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


 }

if($_POST["Tipodiferencia"] == 2){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "RPC";
$idgrupo = "4";
$idcategoria = "9";
$idgenerica = "02";
$idcuenta = "002";
$nombrecuenta = "Ingresos por cobros y pagos";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = 0;
$credito = bcdiv(abs($Totaldiferencia), '1', 2);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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


 }

	}


}
}/*if contabilidad*/
if($respuesta == "ok"){
/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
**************************************************************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "RPC";
			
			
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresaCXC"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" =>  $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
}
 
 
/****************************pagos *************************************/
foreach ($listaFacturasCXC as $key2 => $value) {

$tabla = "pagocxc_empresas";
$tipo = "FACTURA";
				
$datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"CodigoVenta" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_cxc" => $value["ncf_factura"],
"Tipo" => $tipo);
					
          
     $Npago = ModeloCXC::mdlMostrarCobro($tabla, $datos);

  $MontoCobrado = 0;  
  $sumaCobrado = 0;          
          if(!$Npago){

                $pago = 1;
                $MontoCobrado = $value["monto"];

                    
              } else{

                  foreach ($Npago as $key => $n) {
                  	$sumaCobrado = $sumaCobrado + $n["Monto"];
                  }
                          
                  $pago = $n["Pago"]+1;  
                   $MontoCobrado = $sumaCobrado + $value["monto"];

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
$tabla = "pagocxc_empresas";
$datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"CodigoVenta" => $value["codigo"],
"id_Cliente" => $value["id_cliente"],
"Rnc_Cliente" => $value["rnc_Factura"],
"Nombre_Cliente"  => $value["nombre_cliente"],
"NCF_cxc" => $value["ncf_factura"],
"Pago" => $pago,
"FechaAnoMes" => $_POST["FechaFacturames"],	
"FechaDia" => $_POST["FechaFacturadia"],
"FacturaCXC" => $_POST["ReciboCobroMoneda"],
"ReciboCXC" => $_POST["MonedaParaCobro"],
"Tasa" => $value["tasa"],
"Tipodiferencia" => $_POST["Tipodiferencia"],
"Monto" => bcdiv($value["monto"], '1', 2),
"MontoDiferencia" =>bcdiv($value["diferencia"], '1', 2),
"Referencia" => $_POST["Referencia_607"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],	
"NAsiento" => $NAsiento,
"Tipo" => $tipo,
"banco" => $Banco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto);
	
$respuesta = ModeloCXC::mdlEmitirCobro($tabla, $datos);

/*********************ACTUALIZAR CXC*************************/

$tabla = "cxc_empresas";
$id = "id";
$valoridCXC = $value["id"];

$CXC = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);

$Deuda = $CXC["Neto"] + $CXC["Impuesto"] - $CXC["Descuento"] - $CXC["ITBIS_Retenido"] - $CXC["Retencion_Renta"];


$Porcobrar = $Deuda - $MontoCobrado;

if($Porcobrar <= 0){
$Estado = "Cobrado";

}else{
$Estado = "PorCobrar";

}

$tabla = "cxc_empresas";

				
$datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"Codigo" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_cxc" => $value["ncf_factura"],
"MontoCobrado" => bcdiv($MontoCobrado, '1', 2),
"Estado" => $Estado);
$Actualizar = ModeloCXC::mdlActualizarCXC($tabla, $datos);

/************CERRAR ACTUALIZAR CXC ****************/
$tabla = "ventas_empresas";
$Estado = 2;
				
$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaCXC"],
"Codigo" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_Factura" => $value["ncf_factura"],
"Estado" => $Estado);
					
          
  $bloqueo = ModeloCXC::mdlActualizarVenta($tabla, $datos);



 }/*cierre for de pagos*/

$tabla = "recibocxc_empresas";
$Modulo = "recibodecobro";
$Accion = "CREADO";
 $datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"CodigoReciboCXC" => $_POST["nuevoReciboCXC"],
"Rnc_Cliente" => $value["rnc_Factura"],
"Nombre_Cliente"  => $value["nombre_cliente"],
"NAsiento" => $NAsiento,
"FechaAnoMes" => $_POST["FechaFacturames"],	
"FechaDia" => $_POST["FechaFacturadia"],	
"Facturas" => $_POST["listaFacturasCXC"],
"FacturaCXC" => $_POST["ReciboCobroMoneda"],
"ReciboCXC" => $_POST["MonedaParaCobro"],
"Tipodiferencia" => $_POST["Tipodiferencia"],
"Monto" => bcdiv($_POST["TotalCobro"], '1', 2),	
"MontoDiferencia" =>bcdiv($_POST["Diferencia"], '1', 2),
"Referencia" => $_POST["Referencia_607"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],
"Modulo" => $Modulo,
"banco" => $Banco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto,
"Accion" => $Accion);

$respuesta = ModeloCXC::mdlReciboCobro($tabla, $datos);



	
if($respuesta == "ok"){

	if($_POST["Contabilidad"] == 1){
		echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>¡El Cobro Se Registro Correctamente!</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "reportecxc";
		}

		});

</script>';	



	}else{

											echo '<script>
										swal({
											type: "success",
											title: "¡El Cobro Se Registro Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "reportecxc";
													}

													});

										</script>';



	}



				}

}/*CIERRE isset*/
 }/*cierre class*/

static public function ctrMostarRecibodecobro($Rnc_Empresa_CXC){

		$tabla = "recibocxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";


		$respuesta =  ModeloCXC::mdlMostarRecibodecobro($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC);

		return $respuesta;

	}

static public function ctrMostaridRecibodecobro($Rnc_Empresa_CXC, $id, $NAsiento){

		$tabla = "recibocxc_empresas";
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";
		$taid = "id"; 
		$taNAsiento = "NAsiento";

$respuesta = ModeloCXC::mdlMostaridRecibodecobro($tabla, $taRncEmpresaCXC, $taid, $taNAsiento, $Rnc_Empresa_CXC, $id, $NAsiento);

		return $respuesta;

	}	


static public function ctrEditarEmitirCobro(){

	if(isset($_POST["RncEmpresaCXC"]) && isset($_POST["NAsiento"])){
		
		/*** INICIO DE ASIENTOS VACIOS***************/

	if(empty($_POST["listaFacturasCXC"]) || $_POST["listaFacturasCXC"] == "[]"){

		echo '<script>
					swal({
					type: "error",
					title: "Debe tener por lo menos una factura para pagar!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
					}).then((result)=>{
						if(result.value){
							window.location = "detallerecibodecobro";
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
									window.location = "detallerecibodecobro";
													
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
									window.location = "detallerecibodecobro";
													
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
									window.location = "detallerecibodecobro";
													
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
									window.location = "detallerecibodecobro";
													
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
									window.location = "detallerecibodecobro";
													
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
									window.location = "detallerecibodecobro";
													
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
									window.location = "detallerecibodecobro";
													
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
						window.location = "detallerecibodecobro";
													
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
									window.location = "detallerecibodecobro";
													
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
									window.location = "detallerecibodecobro";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["Contabilidad"] == 1 && $_POST["Diferencia"] != 0){
	if($_POST["Tipodiferencia"] == 0){ 
		
	echo '<script>
								swal({

									type: "error",
									title: "¡Debe Seleccionar un tipo de Diferencia!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
								window.location = "detallerecibodecobro";
													
													});
												
								</script>';	
					exit;

}

}

/**********FIN VALIDACION FECHA DIA ******************************/

/*************BORRAR ANTES****************************************/
$tabla = "recibocxc_empresas";
$id = "id";
$valoridCXC = $_POST["idrecibodecobro"];

$Recibodecobro = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);

$RecibodecobroCXCAntes = json_decode($Recibodecobro["Facturas"], true);

foreach ($RecibodecobroCXCAntes as $key => $value) { 
	
$MontoCobrado = 0;
/*********************ACTUALIZAR CXC*************************/
$tabla = "cxc_empresas";
$id = "id";
$valoridCXC = $value["id"];

$CXC = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);

$MontoCobrado = $CXC["MontoCobrado"] - $value["monto"];

$Deuda = $CXC["Neto"] + $CXC["Impuesto"] - $CXC["Descuento"] - $CXC["ITBIS_Retenido"] - $CXC["Retencion_Renta"];


$Porcobrar = $Deuda - $MontoCobrado;

if($Porcobrar <= 0){

$Estado = "Cobrado";

}else{

$Estado = "PorCobrar";

}

$tabla = "cxc_empresas";
				
$datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"Codigo" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_cxc" => $value["ncf_factura"],
"MontoCobrado" => bcdiv($MontoCobrado, '1', 2),
"Estado" => $Estado);
$Actualizar = ModeloCXC::mdlActualizarCXC($tabla, $datos);

 }


foreach ($RecibodecobroCXCAntes as $key1 => $value) { 
	
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $value["id_607"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_POST["RncEmpresaCXC"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "RPC";

	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	
$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key2 => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}
 }
foreach ($RecibodecobroCXCAntes as $key3 => $value) { 
$tabla = "ventas_empresas";
$Estado = 1;
				
$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaCXC"],
"Codigo" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_Factura" => $value["ncf_factura"],
"Estado" => $Estado);
					
          
  $bloqueo = ModeloCXC::mdlActualizarVenta($tabla, $datos);

  }

 /*BORRAR ASIENTOS DIARIOS*/
foreach ($RecibodecobroCXCAntes as $key4 => $value) { 


$tabla = "pagocxc_empresas";
$tipo = "FACTURA";
$datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"NAsiento" => $_POST["NAsiento"],
"Tipo" => $tipo);

$borrarpago = ModeloCXC::mdlMostrarBorrarCobro($tabla, $datos);

foreach ($borrarpago as $key5 => $value){
		
	$valorid = $value["id"];
	$borrar = ModeloCXP::mdlBorrarpago($tabla, $valorid);
		
	}
}

/*******************fin borrar*******************/
$listaFacturasCXC =  json_decode($_POST["listaFacturasCXC"], true);	
if($_POST["Contabilidad"] == 1){

$Totalbanco = 0;
$Totaldiferencia = 0;
foreach ($listaFacturasCXC as $key6 => $value) {

	if($_POST["ReciboCobroMoneda"] == "USD" && $_POST["MonedaParaCobro"] == "USD"){
				$cxcpesos = $value["cxcpesos"];
				$tasahistorica = $value["tasahistorica"];
				$MontopesosCXC = $cxcpesos * $tasahistorica;
				$ingbanco = $value["ingbanco"] * $tasahistorica;
				$Totalbanco = $Totalbanco + $ingbanco;
				$diferencia = $MontopesosCXC - $ingbanco;
				$Totaldiferencia = $Totaldiferencia + $diferencia;

			}
			
			if($_POST["ReciboCobroMoneda"] == "DOP" && $_POST["MonedaParaCobro"] == "DOP"){
				$cxcpesos = $value["cxcpesos"];
				$tasahistorica = 1;
				$MontopesosCXC = $cxcpesos * $tasahistorica;
				$Totalbanco = $_POST["TotalCobro"];
				$Totaldiferencia =$_POST["Diferencia"];


			}
			if($_POST["ReciboCobroMoneda"] == "USD" && $_POST["MonedaParaCobro"] == "DOP"){
				$MontopesosCXC = $value["cxcpesos"];
				$Totalbanco = $_POST["TotalCobro"];
				$Totaldiferencia =$_POST["Diferencia"];


			}
			if($_POST["ReciboCobroMoneda"] == "DOP" && $_POST["MonedaParaCobro"] == "USD"){
				$MontopesosCXC = $value["cxcpesos"];
				$Totalbanco = $_POST["TotalCobro"];
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

$id_registro607 = $value["id_607"];
$Rnc_Factura_607 = $value["rnc_Factura"];
$NCF_607 = $value["ncf_factura"];

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "RPC";
$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = 0;
$credito = bcdiv($MontopesosCXC, '1', 2);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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
$Extraer_NAsiento = "RPC";
$Accion = "PAGO";
$Transaccion_607 = 1;
$idbanco = $_POST["Editar-agregarBanco"];
$idgrupo = $banco["id_grupo"];
$idcategoria = $banco["id_categoria"];
$idgenerica = $banco["id_generica"];
$idcuenta = $banco["id_cuenta"];
$nombrecuenta = $banco["Nombre_CuentaContable"];

$debito = bcdiv($Totalbanco, '1', 2);
$credito = 0;

$NAsiento = $_POST["NAsiento"];


$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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
	if($Totaldiferencia > 0){
		if($_POST["Tipodiferencia"] == 1){
		
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "RPC";
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "10";
$idcuenta = "004";
$nombrecuenta = "diferencial cambiario";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = bcdiv($Totaldiferencia, '1', 2);
$credito = 0;
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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
$Extraer_NAsiento = "RPC";
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "10";
$idcuenta = "005";
$nombrecuenta = "gastos por cobros y pagos";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = bcdiv($Totaldiferencia, '1', 2);
$credito = 0;
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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
$Extraer_NAsiento = "RPC";
$idgrupo = "4";
$idcategoria = "9";
$idgenerica = "02";
$idcuenta = "001";
$nombrecuenta = "ingresos diferencial cambiario";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = 0;
$credito = bcdiv(abs($Totaldiferencia), '1', 2);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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
$Extraer_NAsiento = "RPC";
$idgrupo = "4";
$idcategoria = "9";
$idgenerica = "02";
$idcuenta = "002";
$nombrecuenta = "Ingresos por cobros y pagos";
$Transaccion_607 = 1;
$Nombre_Empresa = $value["nombre_cliente"];
$debito = 0;
$credito = bcdiv(abs($Totaldiferencia), '1', 2);
$Accion = "PAGO";
	

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCXC"],
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
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

 } /*if total diferencia*/

 }	/*cierre contabilidad*/

/****************************pagos *************************************/
foreach ($listaFacturasCXC as $key7 => $value) {

$tabla = "pagocxc_empresas";
$tipo = "FACTURA";
				
$datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"CodigoVenta" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_cxc" => $value["ncf_factura"],
"Tipo" => $tipo);
					
 $MontoCobrado = 0;  
 $sumaCobrado = 0;          
     $Npago = ModeloCXC::mdlMostrarCobro($tabla, $datos);

              
          if(!$Npago){

                $pago = 1;
 		$MontoCobrado = $value["monto"];
                    
              } else{

                  foreach ($Npago as $key8 => $n) {
	$sumaCobrado = $sumaCobrado + $n["Monto"];

			}
                          
                  $pago = $n["Pago"]+1;  
$MontoCobrado = $sumaCobrado + $value["monto"];


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
$NAsiento = $_POST["NAsiento"];
$idbanco = $_POST["Editar-agregarBanco"];
$tabla = "pagocxc_empresas";
$datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"CodigoVenta" => $value["codigo"],
"id_Cliente" => $value["id_cliente"],
"Rnc_Cliente" => $value["rnc_Factura"],
"Nombre_Cliente"  => $value["nombre_cliente"],
"NCF_cxc" => $value["ncf_factura"],
"Pago" => $pago,
"FechaAnoMes" => $_POST["FechaFacturames"],	
"FechaDia" => $_POST["FechaFacturadia"],	
"FacturaCXC" => $_POST["ReciboCobroMoneda"],
"ReciboCXC" => $_POST["MonedaParaCobro"],
"Tasa" => $value["tasa"],
"Tipodiferencia" => $_POST["Tipodiferencia"],
"Monto" => bcdiv($value["monto"], '1', 2),
"MontoDiferencia" =>bcdiv($value["diferencia"], '1', 2),
"Referencia" => $_POST["Referencia_607"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],	
"NAsiento" => $NAsiento,
"Tipo" => $tipo,
"banco" => $Banco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto);
	
$respuesta = ModeloCXC::mdlEmitirCobro($tabla, $datos);

 /*********************ACTUALIZAR CXC*************************/

$tabla = "cxc_empresas";
$id = "id";
$valoridCXC = $value["id"];

$CXC = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);

$Deuda = $CXC["Neto"] + $CXC["Impuesto"] - $CXC["Descuento"] - $CXC["ITBIS_Retenido"] - $CXC["Retencion_Renta"];


$Porcobrar = $Deuda - $MontoCobrado;

if($Porcobrar <= 0){
$Estado = "Cobrado";

}else{
$Estado = "PorCobrar";

}

$tabla = "cxc_empresas";

				
$datos = array("Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"Codigo" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_cxc" => $value["ncf_factura"],
"MontoCobrado" => bcdiv($MontoCobrado, '1', 2),
"Estado" => $Estado);
$Actualizar = ModeloCXC::mdlActualizarCXC($tabla, $datos);

/************CERRAR ACTUALIZAR CXC ****************/


$tabla = "ventas_empresas";
$Estado = 2;
				
$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaCXC"],
"Codigo" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_Factura" => $value["ncf_factura"],
"Estado" => $Estado);
					
          
  $bloqueo = ModeloCXC::mdlActualizarVenta($tabla, $datos);


 }

/****************************fin pagos *************************************/

$tabla = "recibocxc_empresas";
$Modulo = "recibodecobro";
$Accion = "EDITADO";
 $datos = array("id" => $_POST["idrecibodecobro"],
"Rnc_Empresa_cxc" => $_POST["RncEmpresaCXC"],
"Rnc_Cliente" => $value["rnc_Factura"],
"Nombre_Cliente"  => $value["nombre_cliente"],
"NAsiento" => $NAsiento,
"FechaAnoMes" => $_POST["FechaFacturames"],	
"FechaDia" => $_POST["FechaFacturadia"],	
"Facturas" => $_POST["listaFacturasCXC"],
"FacturaCXC" => $_POST["ReciboCobroMoneda"],
"ReciboCXC" => $_POST["MonedaParaCobro"],
"Tipodiferencia" => $_POST["Tipodiferencia"],
"Monto" => bcdiv($_POST["TotalCobro"], '1', 2),	
"MontoDiferencia" => bcdiv($_POST["Diferencia"], '1', 2),
"Referencia" => $_POST["Referencia_607"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],
"Modulo" => $Modulo,
"banco" => $Banco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto,
"Accion" => $Accion);

$respuesta = ModeloCXC::mdlEditarReciboCobro($tabla, $datos);

if($respuesta == "ok"){

		echo '<script>
						swal({
						type: "success",
						title: "¡Se Modifico Correctamente el Recibo!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{

						if(result.value){
							window.location = "detallerecibodecobro";
						}

					});

			</script>';

				}

}/*cierre isset*/
	

}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/


static public function ctrEliminarRecibo(){
 if(isset($_GET["accion"]) && isset($_GET["NAsiento"])){

	
		$tabla = "recibocxc_empresas";
		$taid = "id";
		$id = $_GET["id"];
		
		$taRncEmpresaCXC = "Rnc_Empresa_cxc";
		$Rnc_Empresa_CXC = $_GET["Rnc_Empresa_cxc"]; 
		
		$taNAsiento = "NAsiento";
		$NAsiento = $_GET["NAsiento"];

		
		
$Recibodecobro = ModeloCXC::mdlMostaridRecibodecobro($tabla, $taRncEmpresaCXC, $taid, $taNAsiento, $Rnc_Empresa_CXC, $id, $NAsiento);


$RecibodecobroCXCAntes = json_decode($Recibodecobro["Facturas"], true);

foreach ($RecibodecobroCXCAntes as $key => $value) { 
	
$MontoCobrado = 0;
/*********************ACTUALIZAR CXC*************************/
$tabla = "cxc_empresas";
$id = "id";
$valoridCXC = $value["id"];

$CXC = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);

$MontoCobrado = $CXC["MontoCobrado"] - $value["monto"];

$Deuda = $CXC["Neto"] + $CXC["Impuesto"] - $CXC["Descuento"] - $CXC["ITBIS_Retenido"] - $CXC["Retencion_Renta"];


$Porcobrar = $Deuda - $MontoCobrado;

if($Porcobrar <= 0){

$Estado = "Cobrado";

}else{

$Estado = "PorCobrar";

}

$tabla = "cxc_empresas";
				
$datos = array("Rnc_Empresa_cxc" => $_GET["Rnc_Empresa_cxc"],
"Codigo" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_cxc" => $value["ncf_factura"],
"MontoCobrado" => $MontoCobrado,
"Estado" => $Estado);
$Actualizar = ModeloCXC::mdlActualizarCXC($tabla, $datos);

 }


$tabla= "librodiario_empresas"; 
$taRnc_Empresa_LD= "Rnc_Empresa_LD"; 
$Rnc_Empresa_LD= $_GET["Rnc_Empresa_cxc"]; 
$taRnc_Factura= "Rnc_Factura"; 
$Rnc_Factura= $_GET["Rnc_Cliente"];
$taNCF= "NAsiento"; 
$NCF= $_GET["NAsiento"];
$taExtraer= "Extraer_NAsiento"; 
$Extraer = "RPC";

$librodiario = ModeloDiario::mdlMostrarGastoCompra($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF, $taExtraer, $Extraer);
foreach ($librodiario as $key => $value) {

$valorid = $value["id"];
$borrardiario = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);
}



$pagocxc = json_decode($Recibodecobro["Facturas"], true);




foreach ($pagocxc as $key => $value) {

	$tabla = "pagocxc_empresas";
	$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";
	$taRnc_Factura_cxc = "Rnc_Cliente";
	$taNCF_cxc = "NCF_cxc";
	$taNAsiento = "NAsiento";
	
	
	$Rnc_Empresa_cxc = $_GET["Rnc_Empresa_cxc"];
	$Rnc_Factura_cxc = $value["rnc_Factura"]; 
	$NCF_cxc = $value["ncf_factura"];
	$NAsiento = $_GET["NAsiento"];

$mostarpago = ModeloCXC::MdlMostrarCXCNAsiento($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_cxc, $taRnc_Factura_cxc, $Rnc_Factura_cxc, $taNCF_cxc, $NCF_cxc, $taNAsiento, $NAsiento);

$valorid = $mostarpago["id"];
$Borrarpago = ModeloCXP::mdlBorrarpago($tabla, $valorid);



$tabla = "ventas_empresas";
$Estado = 1;
				
$datos = array("Rnc_Empresa_Venta" => $_GET["Rnc_Empresa_cxc"],
"Codigo" => $value["codigo"],
"Rnc_Cliente" => $value["rnc_Factura"],
"NCF_Factura" => $value["ncf_factura"],
"Estado" => $Estado);
					
          
 $bloqueo = ModeloCXC::mdlActualizarVenta($tabla, $datos);




}


$tabla = "recibocxc_empresas";
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
				window.location = "detallerecibodecobro";
			}

			});

		</script>';

}

	
}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/



 }/*cierre funcion */

 static public function ctrMostrarCodigoReciboCXC($Rnc_Empresa_cxc){

		$tabla = "recibocxc_empresas";
		$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";

$respuesta = ModeloCXC::mdlMostrarCodigoReciboCXC($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_cxc);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/


static public function ctrVerificarCXC(){

 if(isset($_GET["verificarCXC"])){

$url = $_SERVER["REQUEST_URI"];
 	
$tabla = "ventas_empresas";

  $datos = array("Rnc_Empresa_Venta" => $_GET["Rnc_Empresa_607"],
  "Codigo" => $_GET["Codigo"],
  "NCF_Factura" => $_GET["NCF_607"]); 

$ventas = ModeloVentas::MdlValidarVentasVerificarCXC($tabla, $datos);



$Deuda = $ventas["Neto"] + $ventas["Impuesto"] - $ventas["Descuento"] - $ventas["ITBIS_Retenido_Tercero"] - $ventas["RetencionRenta_por_Terceros"];


$tabla = "cxc_empresas";
$id = "id";
$valoridCXC = $_GET["id"];

$CXC = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);


$tabla = "pagocxc_empresas";
$tipo = "FACTURA";
				
$datos = array("Rnc_Empresa_cxc" => $CXC["Rnc_Empresa_cxc"],
"CodigoVenta" => $CXC["Codigo"],
"Rnc_Cliente" => $CXC["Rnc_Cliente"],
"NCF_cxc" => $CXC["NCF_cxc"],
"Tipo" => $tipo);
					
          
    $Npago = ModeloCXC::mdlMostrarCobro($tabla, $datos);

  $MontoCobrado = 0;  
  $sumaCobrado = 0;          
        

             foreach ($Npago as $key => $n) {
                 $sumaCobrado = $sumaCobrado + $n["Monto"];
               }
                          
                  
 $MontoCobrado = $sumaCobrado;
$Porcobrar = $Deuda - $MontoCobrado;

if($Porcobrar <= 0){

$Estado = "Cobrado";

}else{

$Estado = "PorCobrar";

}              

$tabla = "cxc_empresas";

				
$datos = array("Rnc_Empresa_cxc" => $CXC["Rnc_Empresa_cxc"],
"Codigo" => $CXC["Codigo"],
"Rnc_Cliente" => $CXC["Rnc_Cliente"],
"NCF_cxc" => $CXC["NCF_cxc"],
"MontoCobrado" => bcdiv($MontoCobrado, '1', 2),
"Estado" => $Estado);
$Actualizar = ModeloCXC::mdlActualizarCXC($tabla, $datos);

$tabla = "cxc_empresas";

$datos = array("id_Cliente" => $ventas["id_Cliente"],
		"Rnc_Empresa_cxc" => $_GET["Rnc_Empresa_607"],
		"NCF_cxc" => $_GET["NCF_607"],
		"Rnc_Cliente" => $ventas["Rnc_Cliente"],
		"Nombre_Cliente" => $ventas["Nombre_Cliente"]);

$respuesta = ModeloCXC::mdlUdateverificarCXCCliente($tabla, $datos);

if($MontoCobrado > 0){

$tabla = "ventas_empresas";
$Estado = 2;
				
$datos = array("Rnc_Empresa_Venta" => $_GET["Rnc_Empresa_607"],
"Codigo" => $_GET["Codigo"],
"Rnc_Cliente" => $ventas["Rnc_Cliente"],
"NCF_Factura" => $_GET["NCF_607"],
"Estado" => $Estado);
					
          
  $bloqueo = ModeloCXC::mdlActualizarVenta($tabla, $datos);
 }


if($Actualizar == "ok"){

echo '<script>
		swal({
			type: "success",
			title: "¡Se ha Verificado los cobros de esta factura Correctamente!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{

			if(result.value){
				window.location = "reportecxc";
			}

			});

		</script>';

 }

}/*CIERRE DE ISSET $_GET["idVenta"]*/


}/*Cierre FUNCCION DE BORRAR VENTA*/


static public function ctrAgregarretencionReciboCobro(){
	
	if(isset($_POST["id_607_Retener"])){

		$url = $_SERVER["REQUEST_URI"];

		$_POST["Moneda"] = $_POST["Monedarecibocobro"];

		
/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaRetenecionmes_607"], 0, 4);
	$fechames = substr($_POST["FechaRetenecionmes_607"], -2);

	if(strlen($_POST["FechaRetenecionmes_607"]) != 6){
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
	if(strlen($_POST["FechaReteneciondia_607"]) != 2){
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
	if($_POST["FechaReteneciondia_607"] < 0){
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
	if($_POST["FechaReteneciondia_607"] > 31){
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

$tabla = "607_empresas";
											
					
date_default_timezone_set('America/Santo_Domingo');
$fecha = date('Y-m-d');
$hora = date('H:i:s');
$fechaActual = $fecha.' '.$hora;

$Fecha_Registro = $fechaActual;

$Accion_607 = "RETENER";
$Fecha_Ret_AnoMesDia_607 = $_POST["FechaRetenecionmes_607"].$_POST["FechaReteneciondia_607"];


if(isset($_POST["ISR_RETENIDO_607"]) && $_POST["ISR_RETENIDO_607"] = "2"){
	$ISR_RETENIDO = $_POST["ISR_RETENIDO_607"];


}elseif(isset($_POST["ISR_RETENIDO_607"]) && $_POST["ISR_RETENIDO_607"] = "10"){

	$ISR_RETENIDO = $_POST["ISR_RETENIDO_607"];


}else{
	$ISR_RETENIDO = "0";

}

if(isset($_POST["ITBIS_Retenido_607"]) && $_POST["ITBIS_Retenido_607"] = "30"){
	$ITBIS_Retenido = $_POST["ITBIS_Retenido_607"];


}elseif(isset($_POST["ITBIS_Retenido_607"]) && $_POST["ITBIS_Retenido_607"] = "75"){

	$ITBIS_Retenido = $_POST["ITBIS_Retenido_607"];


}elseif(isset($_POST["ITBIS_Retenido_607"]) && $_POST["ITBIS_Retenido_607"] = "100"){

	$ITBIS_Retenido = $_POST["ITBIS_Retenido_607"];


}else{
	$ITBIS_Retenido = "0";

}

if($_POST["Moneda"] == "USD"){

$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido_607"];
$ITBIS_Retenido_Tercero_607 = $USDITBIS_Retenido_Tercero_607 * $_POST["Tasa"];


$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido_607"] ;

$Retencion_Renta_por_Terceros_607 = $USDRetencion_Renta_por_Terceros_607 * $_POST["Tasa"];
	}else{
$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido_607"];
$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido_607"];
$ITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido_607"];
$Retencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido_607"];
	
	}

$datos = array("id" => $_POST["id_607_Retener"], 
	"Usuario_Creador" => $_POST["Usuariologueado"], 
	"Fecha_Registro" => $Fecha_Registro, 
	"Accion_607" => $Accion_607, 
	"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607, 
	"Fecha_Retencion_AnoMes_607" => $_POST["FechaRetenecionmes_607"], 
	"Fecha_Retencion_Dia_607" => $_POST["FechaReteneciondia_607"],  
	"ITBIS_Retenido_Tercero_607" => $ITBIS_Retenido_Tercero_607, 
	"Retencion_Renta_por_Terceros_607" => $Retencion_Renta_por_Terceros_607, 
	"Porc_ITBIS_Retenido_607" => $ITBIS_Retenido, 
	"Porc_ISR_Retenido_607" => $ISR_RETENIDO);

$respuesta = Modelo607::MdlAgregarretencion607($tabla, $datos);
/*********************FIN RETENCION 607************************************/
/*********************RETENCION CXC************************************/
if($_POST["Forma_De_Pago"] == "04"){

		$tabla = "cxc_empresas";
		$taCodigo = "Codigo";
		$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";

		$Codigo_Factura = $_POST["Codigo_Factura"];
		$Rnc_Empresa_cxc = $_POST["RncEmpresaRetener"];
		$NCF_607 = $_POST["NCF_607_Retener"];

$CXC = ModeloCXC::mdlMostarCXCFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa_cxc);
									
									
if($CXC["Rnc_Empresa_cxc"] == $Rnc_Empresa_cxc && $CXC["Codigo"] == $Codigo_Factura){
$Retenciones = "1";
	$datos = array("Codigo" => $Codigo_Factura, 
				"Rnc_Empresa_cxc" => $Rnc_Empresa_cxc,
				"Fecha_Ret_AnoMes_cxc" => $_POST["FechaRetenecionmes_607"], 
				"Fecha_Ret_Dia_cxc" => $_POST["FechaReteneciondia_607"], 
				"ITBIS_Retenido" => $USDITBIS_Retenido_Tercero_607, 
				"Retencion_Renta" => $USDRetencion_Renta_por_Terceros_607,
				"Retenciones" => $Retenciones);
				/*editar cxc*/

$respuesta = ModeloCXC::mdlEDITARCXCRETENCION($tabla, $datos);
		} 

}
/*********************FIN RETENCION CXC************************************/
$NAsientoRet = "";
if($_POST["Contabilidad"] == 1){


$tabla = "librodiario_empresas";
	
$taid_registro = "id_registro";
$id_registro = $_POST["id_607_Retener"];

$taRnc_Empresa_LD = "Rnc_Empresa_LD";
$Rnc_Empresa_LD = $_POST["RncEmpresaRetener"];

$taExtraer = "Extraer_NAsiento";
$Extraer = "REI";

	 
$taRnc_Factura = "Rnc_Factura";
$Rnc_Factura = $_POST["Rnc_Retener_607"];

$taNCF = "NCF";
$NCF = $_POST["NCF_607_Retener"];


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
	$Tipo_NCF = "REI";
	$codigoRet = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);
	
	
    $NRet = $codigoRet["NCF_Cons"] + 1;
    $NAsientoRet = "REI".$NRet;
    $ASIENTOS = "1";

}

foreach ($respuesta as $key => $value){
		
	$valorid = $value["id"];
	$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
}

		$tabla = "clientes_empresas";
		$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_LD;
		$taDocumento = "Documento";
		$Documento = $Rnc_Factura;

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
	
		$id_Cliente = $respuesta["id"];
		$NombreCliente = $respuesta["Nombre_Cliente"];



$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 

$tabla = "librodiario_empresas";

$Extraer_NAsiento = "REI";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
if($_POST["Forma_De_Pago"] == "04"){


$totalretencion = $ITBIS_Retenido_Tercero_607 + $Retencion_Renta_por_Terceros_607;

$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$debito = 0;
$credito = bcdiv($totalretencion, '1', 2);


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_LD,
					"id_registro" => $id_registro,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $NombreCliente,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => "Retencion Factura ".$NCF,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_Trans" => $_POST["FechaReteneciondia_607"],
					"id_banco" => $idbanco,
					"referencia" => "Retencion Factura ".$NCF,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
	
if($ITBIS_Retenido_Tercero_607 > 0){

	$idgrupo = "1";
	$idcategoria = "3";
	$idgenerica = "01";
	$idcuenta = "002";
	$nombrecuenta = "ITBIS retenido en ventas N.02-05";
	$debito = bcdiv($ITBIS_Retenido_Tercero_607, '1', 2);;
	$credito = 0;
 
		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_LD,
					"id_registro" => $id_registro,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $NombreCliente,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => "Retencion Factura ".$NCF,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_Trans" => $_POST["FechaReteneciondia_607"],
					"id_banco" => $idbanco,
					"referencia" => "Retencion Factura ".$NCF,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);

		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}
	
if($Retencion_Renta_por_Terceros_607 != 0){
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "02";
		$idcuenta = "001";
		$nombrecuenta = "ISR Retenido en Ventas";
		$debito = bcdiv($Retencion_Renta_por_Terceros_607, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_LD,
					"id_registro" => $id_registro,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $NombreCliente,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => "Retencion Factura ".$NCF,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_Trans" => $_POST["FechaReteneciondia_607"],
					"id_banco" => $idbanco,
					"referencia" => "Retencion Factura ".$NCF,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);

		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
		

	}

}/*cierre retencion*/
if($_POST["Forma_De_Pago"] != "04"){

	$totalretencion = $ITBIS_Retenido_Tercero_607 + $Retencion_Renta_por_Terceros_607;

$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = 0;
$credito = bcdiv($totalretencion, '1', 2);


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_LD,
					"id_registro" => $id_registro,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $NombreCliente,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => "Retencion Factura ".$NCF,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_Trans" => $_POST["FechaReteneciondia_607"],
					"id_banco" => $idbanco,
					"referencia" => "Retencion Factura ".$NCF,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

if($ITBIS_Retenido_Tercero_607 > 0){
	$idgrupo = "1";
	$idcategoria = "3";
	$idgenerica = "01";
	$idcuenta = "002";
	$nombrecuenta = "ITBIS retenido en ventas N.02-05";
	$debito = bcdiv($ITBIS_Retenido_Tercero_607, '1', 2);;
	$credito = 0;
		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_LD,
					"id_registro" => $id_registro,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $NombreCliente,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => "Retencion Factura ".$NCF,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_Trans" => $_POST["FechaReteneciondia_607"],
					"id_banco" => $idbanco,
					"referencia" => "Retencion Factura ".$NCF,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);

		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}
	
if($Retencion_Renta_por_Terceros_607 != 0){
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "02";
		$idcuenta = "001";
		$nombrecuenta = "ISR Retenido en Ventas";
		$debito = bcdiv($Retencion_Renta_por_Terceros_607, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_LD,
					"id_registro" => $id_registro,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $NombreCliente,
					"NAsiento" => $NAsientoRet,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_LD" => $_POST["FechaReteneciondia_607"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => "Retencion Factura ".$NCF,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaRetenecionmes_607"],
					"Fecha_dia_Trans" => $_POST["FechaReteneciondia_607"],
					"id_banco" => $idbanco,
					"referencia" => "Retencion Factura ".$NCF,
					"Usuario_Creador" => $_POST["Usuariologueado"],
					"Accion" => $Accion);

		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
		

	}





}/*cierre retencion*/

/*********************ASIENTOS CONTABLES***********************************/
if($respuesta == "ok"){
/*******************************************************************************
					ACTUALIZAR CORRELATIVOS ACTUALIZAR CORRELATIVOS
*******************************************************************************/

		if($ASIENTOS == 1){
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "REI";
			
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_LD,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $NRet);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos); 


		} 

 }



}/*cierre if contabilidad*/

		$tabla = "ventas_empresas";
		
		$Retenciones = "1";

	$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaRetener"], 
				"Rnc_Cliente" => $_POST["Rnc_Retener_607"],
				"NCF_Factura" => $_POST["NCF_607_Retener"], 
				"Retenciones" => $Retenciones,
				"Porc_ITBIS_Retenido" => $_POST["ITBIS_Retenido_607"],	
				"Porc_ISR_Retenido" => $_POST["ISR_RETENIDO_607"],	
				"ITBIS_Retenido_Tercero" => $USDITBIS_Retenido_Tercero_607,
				"RetencionRenta_por_Terceros" => $USDRetencion_Renta_por_Terceros_607,
				"NAsientoRET" => $NAsientoRet);
				/*editar cxc*/

$respuesta = ModeloVentas::mdlRETENCIONVENTA($tabla, $datos);

if($respuesta == "ok"){

$modulo = $_POST["Modulo"];
	
switch ($modulo) {
	case 'ventas':
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
		
	
	case 'reportecxc':
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
			case 'recibodecobro':
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
 

}/*CIERRE SI ISSET*/

}/*CIERRE FUNCION DE CTRAGREGARRETENCION606*/






}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/






















