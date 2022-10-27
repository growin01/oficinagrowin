<?php 

class ControladorVentas{
	static public function ctrMostarVentas($Rnc_Empresa_Venta, $periodoventas){

		$tabla = "ventas_empresas";
		$taRncEmpresaVenta = "Rnc_Empresa_Venta";


		$respuesta = ModeloVentas::mdlMostarVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $periodoventas);

		return $respuesta;

	}

	static public function ctrMostrarCodigoVentas($Rnc_Empresa_Venta){

		$tabla = "ventas_empresas";
		$taRncEmpresaVenta = "Rnc_Empresa_Venta";

		$respuesta = ModeloVentas::mdlMostrarCodigoVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/

	/**********************************************
					CREAR VENTAS
	***********************************************/
static public function ctrCrearVenta(){

	if(isset($_POST["nuevaVenta"])){

$url = $_SERVER["REQUEST_URI"];


$_SESSION["FechaFacturames"] = $_POST["FechaFacturames"];
$_SESSION["FechaFacturadia"] = $_POST["FechaFacturadia"];
$_SESSION["Comision_Factura"] = $_POST["Comision_Factura"];


	/*CARGA DE CLIENTES DE TABLA GROWIN_DGII*/
		$tabla = "growin_dgii";
		$taRnc_Growin_DGII = "Rnc_Growin_DGII";
		$ValorRnc_Growin_DGII = $_POST["RncClienteFactura"];
		$ValorNombreGrowin_DGII = $_POST["Nombre_Cliente"];
		$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

		if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
			$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

			$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

		}
	/*CIERRE  DE CARGA GROWIN DGII*/

	/************************************************
			INICIO 607
	*************************************************/
		
	/****VALIDACION QUE LA FACUTRA NO SE REPITA****/

				$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Empresa_607";
				$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["RncClienteFactura"];
				$taNCF_607 = "NCF_607";

				$NCFFactura = $_POST["NCFFactura"];
				$CodigoNCF = $_POST["CodigoNCF"];
				
				$NCF_607 = $NCFFactura.$CodigoNCF;

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
												window.location = "crear-ventas";
											}

											});

								</script>';

			exit;

		} 
/************************VALIDACION 608***************************/
		$tabla = "608_empresas";
		$taRnc_Empresa_608 = "Rnc_Empresa_608";
		$Rnc_Empresa_608 = $_POST["RncEmpresaVentas"];
		$taNCF_608 = "NCF_608";
		$NCF_608 = $NCF_607;

$FacturaRepetida608 = Modelo608::MdlfacturaRepetida608($tabla, $taRnc_Empresa_608, $Rnc_Empresa_608, $taNCF_608, $NCF_608);

if($FacturaRepetida608 != false && $FacturaRepetida608["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida608["NCF_608"] == $NCF_608 && $FacturaRepetida608["Estatus"] != "2"){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 608 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-ventas";
											}

											});

								</script>';
		exit;

}
if($FacturaRepetida608 != false && $FacturaRepetida608["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida608["NCF_608"] == $NCF_608 && $FacturaRepetida608["Estatus"] == "2"){
$tabla = "608_empresas";
$id = "id";
$id_608 = $FacturaRepetida608["id"];

$respuesta = Modelo608::mdlBorrar608($tabla, $id, $id_608);
		
 }
 $tabla = "607_empresas";
 /************************FIN VALIDACION 608***************************/

		/************************lista de productos***************************/
		if(empty($_POST["listaProductos"]) || $_POST["listaProductos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PRODUCTO A LA VENTA!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventas";
													}

													});

										</script>';
								exit;

				
			}

		$listaProductos =  json_decode($_POST["listaProductos"], true);

		foreach ($listaProductos as $key => $value) {

			if($value["idgrupo"] == "" || $value["idcategoria"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventas";
													}

													});

										</script>';
								exit;



			}

			if($value["tipoproducto"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventas";
													}

													});

										</script>';
								exit;



			}

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
									window.location = "crear-ventas";
													
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
									window.location = "crear-ventas";
													
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
									window.location = "crear-ventas";
													
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
									window.location = "crear-ventas";
													
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
									window.location = "crear-ventas";
													
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
						window.location = "crear-ventas";
													
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
									window.location = "crear-ventas";
													
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
									window.location = "crear-ventas";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

///*****************************Validar CLIENTE*********************************///

$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
$id = "Documento";
$valorid = $_POST["RncClienteFactura"];
$cliente = ControladorClientes::ctrBuscarCliente($Rnc_Empresa_Cliente, $id, $valorid);

if($cliente != false && $cliente["Rnc_Empresa_Cliente"] == $Rnc_Empresa_Cliente && $cliente["Documento"] == $_POST["RncClienteFactura"] && $cliente["id"] != $_POST["agregarCliente"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Cliente no Coinciden con el RNC del cliente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-ventas";
											}

											});

								</script>';


		exit;

}


			
/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Cliente_Factura"] == 1 && strlen($_POST["RncClienteFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente_Factura"] == 2 && strlen($_POST["RncClienteFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/
/*******INICIO VALIDACION DE NCF*****/
if(isset($_POST["CodigoNCFanterior"])){ 
	if($_POST["CodigoNCF"] > $_POST["CodigoNCFanterior"]){
		echo '<script>
								swal({

									type: "error",
									title: "El Codigo de NCF no Puede ser mayor al que corresponde, si desea modificarlo debe ser menor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas";
								});

	
								</script>';
				exit;
	}
	}
	if(isset($_POST["CodigoNCFanterior"])){ 
	if($_POST["CodigoNCF"] == $_POST["CodigoNCFanterior"]){
		echo '<script>
								swal({

									type: "error",
									title: "Para este correlativo de NCF NO DEBE habilitar el checklist que esta al lado del campo numerico del NCF",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas";
								});

	
								</script>';
				exit;
	}
	}
	

	if(substr($NCF_607, 0, 1) == "B" && strlen($NCF_607) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas";
								});

	
								</script>';
				exit;
	}
	if(substr($NCF_607, 0, 1) == "E" && strlen($NCF_607) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
                   

$Monto_Facturado_607 = $_POST["nuevoPrecioNeto"] - $_POST["Descuento"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	

if($_POST["nuevoPrecioImpuesto"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas";
													
													});
												
								</script>';	
				

			exit; 
		 }




if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
		$Moneda = "DOP";
		$tasa = "0.00";
		$TotalPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];


	}
		 
	$Forma_De_Pago_607 = $_POST["nuevoMetodoPago"];
	
$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;

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

if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"] ;
$ITBIS_Retenido_Tercero_607 = $USDITBIS_Retenido_Tercero_607 * $_POST["tasaUS"];


$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"] ;

$Retencion_Renta_por_Terceros_607 = $USDRetencion_Renta_por_Terceros_607 * $_POST["tasaUS"];
	}else{
$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
$ITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$Retencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
	
	}

		
$Fecha_Ret_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
$Fecha_Retencion_AnoMes_607 = $_POST["FechaFacturames"];
$Fecha_Retencion_Dia_607 = $_POST["FechaFacturadia"];

		
} else{ 

		$Fecha_Ret_AnoMesDia_607  = "";
		$Fecha_Retencion_AnoMes_607 = "";
		$Fecha_Retencion_Dia_607 = "";
		$USDITBIS_Retenido_Tercero_607 = "0.00";
		$USDRetencion_Renta_por_Terceros_607 = "0.00";
		$ITBIS_Retenido_Tercero_607 = "0.00";
		$Retencion_Renta_por_Terceros_607 = "0.00";
		$Porc_ITBIS_Retenido_607 = 0;
		$Porc_ISR_Retenido_607 = 0; 

}



if(isset($_POST["ITBISRetenido_Ventas"]) && $_POST["ITBISRetenido_Ventas"] != ""){
	
	$Porc_ITBIS_Retenido_607 = $_POST["ITBISRetenido_Ventas"];

}else{

	$Porc_ITBIS_Retenido_607 = "0";

}
		
if(isset($_POST["ISR_RETENIDO_Ventas"]) && $_POST["ISR_RETENIDO_Ventas"] != ""){
	
	$Porc_ISR_Retenido_607 = $_POST["ISR_RETENIDO_Ventas"];
}else{

	$Porc_ISR_Retenido_607 = "0";

}

	$Extraer_NCF_607 = $_POST["NCFFactura"];
	$B04MeMa_607 = "";
	$Transaccion_607 = "1";
	$NCF_Modificado_607 = "";
	$Tipo_de_Ingreso_607 = "01";
	$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
	
	$Otros_Impuestos_607 = "0";
	$Monto_Propina_Legal_607 = "0";	
	
	$ITBIS_Percibido_607 = "0.00";
	
	$ISR_Percibido_607 = "0.00";
	$Impuesto_Selectivo_al_Consumo_607 = "0.00";
	$Otros_Impuestos_607 = "0";
	$Monto_Propina_Legal_607 = "0.00";
	$Estatus_607 = "";
	
	$Accion_607 = "CREADO";
	$Modulo = "FACTURA";
	$banco = 0;


$datos = array("Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Tipo_Cliente_Factura"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $Tipo_de_Ingreso_607,
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
"ITBIS_Facturado_607" => bcdiv($TotalPrecioImpuesto, '1', 2),
"ITBIS_Retenido_Tercero_607" => bcdiv($ITBIS_Retenido_Tercero_607, '1', 2),
"ITBIS_Percibido_607" => $ITBIS_Percibido_607,
"Retencion_Renta_por_Terceros_607" => bcdiv($Retencion_Renta_por_Terceros_607, '1', 2),
"ISR_Percibido_607" => $ISR_Percibido_607,
"Impuesto_Selectivo_al_Consumo_607" => $Impuesto_Selectivo_al_Consumo_607,
"Otros_Impuestos_607" => $Otros_Impuestos_607,
"Monto_Propina_Legal_607" => $Monto_Propina_Legal_607,
"Efectivo" => $Efectivo,
"Cheque_Transferencia_Deposito_607" => $CHEQUES,
"Tarjeta_Debito_Credito_607" => $TARJETA,
"Venta_a_Credito_607" => $CREDITO,
"Bonos_607" => $BONOS,
"Permuta_607" => $PERMUTAS,
"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
"Estatus_607" => $Estatus_607,
"Fecha_comprobante_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_Comprobante_Dia_607" => $_POST["FechaFacturadia"],
"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes_607,
"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
"EXTRAER_NCF_607" => $Extraer_NCF_607,
"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Transaccion_607" => $Transaccion_607,
"Referencia_Pago_607" => $_POST["Observaciones"],
"Banco_607" => $banco,
"Fecha_Trans_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_trans_dia_607" => $_POST["FechaFacturadia"],
"Descripcion_607" => $_POST["Observaciones"], 
"Nombre_Empresa_607" => $_POST["Nombre_Cliente"],
"Usuario_Creador" => $_POST["nuevoVendedor"],
"Accion_607" => $Accion_607,
"Codigo_Factura" =>$_POST["nuevaVenta"],
"Modulo" => $Modulo);

$respuesta =  Modelo607::MdlRegistrar607($tabla, $datos);

	
	if($respuesta != "ok"){
		echo '<script>
				swal({

				type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
				showConfirmButton: false,
				timer: 6000
				}).then(()=>{
				window.location = "crear-ventas";
													
								});
												
					</script>';	
		exit;

	}

		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["FechaFacturames"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";

$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);

if(!isset($_POST["CodigoNCFanterior"]) && $_POST["HabilitarNCF"] == ""){
	$tabla = "correlativos_empresas";
	
	$datos = array("Rnc_Empresa" => $_POST["RncEmpresaVentas"],
					"Tipo_NCF" => $_POST["NCFFactura"],
					"NCF_Cons" =>  $_POST["CodigoNCF"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);


}
$tabla = "607_empresas";
$taRnc_Empresa_607 = "Rnc_Empresa_607";
$Rnc_Empresa_607 = $Rnc_Empresa_607;
$taRnc_Factura_607 = "Rnc_Factura_607";
$Rnc_Factura_607 = $Rnc_Factura_607;
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
									title: "¡Error en la consulta a la base de datos de la factura consultar con el programador!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;




			}

		/**********************FIN CONSULTAS DE FACTURA RNC Y NCF Y ID******************/

	/***************************************
			agregar Cliente 
	***************************************/
	$id_Cliente = $_POST["agregarCliente"];
	if(empty($_POST["agregarCliente"])){
				$tabla = "clientes_empresas";
				$Fecha_Nacimiento = "";

		$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaVentas"],
		"Tipo_Cliente" => $_POST["Tipo_Cliente_Factura"],
		"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
		"Documento" => $_POST["RncClienteFactura"],
		"Email" => $_POST["nuevoEmail"], 
		"Telefono" => $_POST["nuevoTelefono"],
		"Direccion" => $_POST["nuevaDireccion"], 
		"Fecha_Nacimiento" => $Fecha_Nacimiento);
		$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

		$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
		$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
		$taDocumento = "Documento";
		$Documento = $_POST["RncClienteFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
	
		$id_Cliente = $respuesta["id"];
				   
			}
if(isset($_POST["Comision_Factura"]) && $_POST["Comision_Factura"] == 2){
				$id_Vendedor = "0";
				$Nombre_Vendedor = "";

	}else{

	$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];

	}


/*****************************************************
	Carga de Bases de Datos de Cuentas Por Cobrar 
******************************************************/
if($_POST["nuevoMetodoPago"] == "04"){



	$tabla = "cxc_empresas";
	$Dia_Credito_cxc = $_POST["nuevoCodigoTransaccion"];
	$datos = array("id_607" => $id_registro607,
		"Codigo" => $_POST["nuevaVenta"],
		"Rnc_Empresa_cxc" => $_POST["RncEmpresaVentas"], 
		"id_Cliente" => $id_Cliente,
		"Rnc_Cliente" => $_POST["RncClienteFactura"],
		"Nombre_Cliente" => $_POST["Nombre_Cliente"],
		"NCF_cxc" => $NCF_607,
		"id_Vendedor" => $id_Vendedor,
		"Nombre_Vendedor" => $Nombre_Vendedor,
		"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
		"FechaDia_cxc" => $_POST["FechaFacturadia"], 
		"Dia_Credito_cxc" => $Dia_Credito_cxc, 
		"Moneda" => $Moneda,
		"Tasa" => $tasa,
		"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
		"Descuento"  => bcdiv($_POST["Descuento"], '1', 2), 
		"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
		"Total" => bcdiv($_POST["totalVenta"], '1', 2),
		"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
		"Retencion_Renta" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
		"Observaciones" => $_POST["Observaciones"],
		"Retenciones" => $_POST["Retencion"],
		"MontoCobrado" => 0,
		"Estado" => "PorCobrar");
$respuesta = ModeloCXC::mdlIngresarcxc($tabla, $datos); 

}
$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 

/************************************************ CARGAR CUENTAS CONTABLES****************************/
$NAsiento = "";
$NAsientoRet = "";
/****Consulta asiento factura *****/
	$Rnc_Empresa_Diario = $Rnc_Empresa_607;
	$tipocod = "DFF";
	$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DFF".$N;

 /**********************CONSULTAS DE FACTURA RNC Y NCF Y ID******************/
if($_POST["Contabilidad"] == 1){ 

	
/*PROYECTO*/
if($_POST["proyecto"] == 0){
	$idproyecto = "NOAPLICA";
	$codproyecto = "NOAPLICA"; 

	}else{
		$tabla = "proyectos_empresas";
		$id = "id";
		$valorid = $_POST["proyecto"];
				
		$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
		$idproyecto = $_POST["proyecto"];
		$codproyecto = $respuesta["CodigoProyecto"]; 
}

/********************************************************************************/

///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////

$listaProductos =  json_decode($_POST["listaProductos"], true);

$cuentasproductos = [];	
$costoventa = 0;

foreach ($listaProductos as $pro => $value){
		/*establecer costo de venta*/
		if($value["tipoproducto"] == "1"){
			$costoventa = $costoventa + $value["preciocompra"];
			}
		/* fin establecer costo de venta*/
if($pro = 0){
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}

	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);


}else{

$variable = "DISTINTO";
	
foreach ($cuentasproductos as $key => $cuentas){

if($cuentas["idgrupo"] == $value["idgrupo"] && $cuentas["idcategoria"] == $value["idcategoria"] && $cuentas["idgenerica"] == $value["idgenerica"] && $cuentas["idcuenta"] == $value["idcuenta"]){
		if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

		}

		$suma = $cuentas["credito"] + $value["total"];
		$cuentasproductos[$key]["credito"] = $suma;
		$variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

		}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);

}
}


}/*****cierre for de comparar cuentas********/


///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////
foreach ($cuentasproductos as $key => $value) {
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "DFF";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = $value["idgrupo"];
$idcategoria = $value["idcategoria"];
$idgenerica = $value["idgenerica"];
$idcuenta = $value["idcuenta"];
$nombrecuenta = $value["nombrecuenta"];
$debito = $value["debito"];
$credito = bcdiv($value["credito"], '1', 2);
$ObservacionesLD = $value["ObservacionesLD"];

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }


if($_POST["nuevoMetodoPago"] == "04"){
	$totalVentas = $_POST["totalVenta"];
	if($_POST["Moneda_Factura"] == "USD"){
		$totalVentas = $_POST["totalVenta"] * $tasa;
		

		}
	
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "DFF";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}/*CIERRE CUENTA CONTABLE*/
else{

$totalVentas = $_POST["totalVenta"];

	if($_POST["Moneda_Factura"] == "USD"){
		$USDtotalVentas = $_POST["totalVenta"] * $tasa;
		$totalVentas = $USDtotalVentas;

		}

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "DFF";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*CIERRE ELSE CUENTA CONTABLE*/
 if ($_POST["nuevoPrecioImpuesto"] > 0) {
 	$nuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];
 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
	$nuevoPrecioImpuesto = $USDnuevoPrecioImpuesto;

	}

$idgrupo = "2";
$idcategoria = "4";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "ITBIS en ventas por pagar";
$debito = 0;
$credito = bcdiv($nuevoPrecioImpuesto, '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }
 if($_POST["Descuento"] > 0){
 	$Descuento = $_POST["Descuento"];

 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDDescuento = $_POST["Descuento"] * $tasa;
	$Descuento = $USDDescuento;

	}
		$idgrupo = "4";
		$idcategoria = "8";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "descuentos en ventas";
		$debito = bcdiv($Descuento, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 
 }
 if($costoventa > 0){ /*costos de ventas*/
 		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "005";
		$nombrecuenta = "costos de ventas";
		$debito = bcdiv($costoventa, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = 0;
		$credito = bcdiv($costoventa, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*costos de ventas*/
  
if($_POST["Retencion"] == 1){


if($ITBIS_Retenido_Tercero_607 > 0){
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido en ventas N.02-05";
		$debito = bcdiv($ITBIS_Retenido_Tercero_607, '1', 2);;
		$credito = 0;
 

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"ObservacionesLD" => "Retencion Factura".$NCF_607,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
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

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"ObservacionesLD" => "Retencion Factura".$NCF_607,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
		

	}

}/*cierre retencion*/
 

	 
 } /* cierre de if de Contabilidad de si la empresa tiene contabilidad*/
 if($respuesta == "ok"){

/***** ACTUALIZAR CORRELATIVOS ***********************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DFF";
			
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_607,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos); 
	
 }
/***********CIERRE DE CUENTAS POR COBRAR **********************************/

	if($_POST["idCotizaccion"] != "") {
				$tabla = "cotizaciones_empresas";
				$id = "id";
				$valoridCotizacion = $_POST["idCotizaccion"];

				$respuesta =  ModeloCotizacion::mdlMostrarCotizacionesEditar($tabla, $id, $valoridCotizacion);

		
				$_POST["listaProductos"] = $respuesta["Producto"];

				$Estado = "Accion_Cotizacion";
				
				$estadoCotizacion = "FACTURADA";
				$idCotizacion = $_POST["idCotizaccion"];


				$cambioEstatus =  ModeloCotizacion::MdlEstadoCotizacion($tabla, $Estado, $id, $estadoCotizacion, $idCotizacion);

				$Estado = "Estado_Cotizacion";
				
				$estadoCotizacion = "1";
				

				$cambioEstatus =  ModeloCotizacion::MdlEstadoCotizacion($tabla, $Estado, $id, $estadoCotizacion, $idCotizacion);

				$Estado = "NCF_FACTURA";
				
				$estadoCotizacion = $NCF_607;
				

				$cambioEstatus =  ModeloCotizacion::MdlEstadoCotizacion($tabla, $Estado, $id, $estadoCotizacion, $idCotizacion);



			}
								
/************************************************************************
ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STCKO DE LAS VENTAS PRODUCTOS
*************************************************************************/

			$listaProductos =  json_decode($_POST["listaProductos"], true);

			$totalProductosComprados = array();

			if($_POST["CambiarInventario"] == "1"){
				$tablaProductos = "productos_empresas";


			}else {
				$tablaProductos = "productos_activor_empresas";


			}


			
			foreach ($listaProductos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);



				$id = "id";

				$valorid = $value["id"];

				$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

				

				$item1a = "Ventas";

				$valor1a = $value["cantidad"] + $traerProductos["Ventas"];

				$nuevasVentas = ModeloProductos::MdlActualizarProductoVentas($tablaProductos, $item1a, $valor1a, $id, $valorid);

				$item1b = "Stock";
				$valor1b = $value["Stock"];

				$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1b, $id, $valorid);
if($value["tipoproducto"] == "1"){
$tabla = "productos_empresas";
$id = "id";
$valoridProducto = $value["id"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];


$tabla = "historico_productos_empresas";
$Accion = "VENTA";

$datos = array ("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => "0", 
      "Precio_Venta" => $value["precio"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames"],
      "Fecha_dia" => $_POST["FechaFacturadia"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_607,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["nuevoVendedor"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);	
 }/*CIERRE DE IF TIPO PRODUCTO*/
			
}/*CIERRO FOREACH*/

			$tablaClientes = "clientes_empresas";

			$id = "id";

			$valorid = $id_Cliente;

			$traeCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);
			

			$item = "Compras";
			$valor = array_sum($totalProductosComprados) + $traeCliente["Compras"];

			
			$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);

				/*FECHA ULTIMA COMPRA CLIENTE */

			$item = "Ultima_Compra";

			date_default_timezone_set('America/Santo_Domingo');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$fechaActual = $fecha.' '.$hora;

			$valor = $fechaActual;

			
			$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);


			/**********************************************
						GUARDAR LA COMPRA
			***********************************************/
			$NCF = $_POST["NCFFactura"];
			$Correlativo = $_POST["CodigoNCF"]; 
			$NCF_Factura = $NCF.$Correlativo;
			$Comision = $_POST["Comision_Factura"];
			$Usuario_Creador = $_POST["nuevoVendedor"];

			$Accion_Factura = "Creada";

			if($_POST["nuevoMetodoPago"] == "04"){
				$Estatus = "CREDITO";

			} else{
				
				$Estatus = "POR DEPOSITAR";

			}
			
			if($_POST["Retencion"] == 1){ 

				$NAsientoRet = $NAsiento;
			 }else{

			 	$NAsientoRet = "";
			 }

	
			

	$tabla = "ventas_empresas";
	$Estado = "1";

$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"],
	"id_607" => $id_registro607, 
	"Codigo" => $_POST["nuevaVenta"],
	"Rnc_Cliente" => $_POST["RncClienteFactura"],
	"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
	"NCF_Factura" => $NCF_Factura, 
	"FechaAnoMes" => $_POST["FechaFacturames"], 
	"FechaDia" => $_POST["FechaFacturadia"], 
	"id_Cliente" => $id_Cliente,
	"Correo_Cliente" => $_POST["nuevoEmail"], 
	"id_Vendedor" => $id_Vendedor,
	"Nombre_Vendedor" => $Nombre_Vendedor, 
	"Producto" => $_POST["listaProductos"],
	"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
	"Pordescuento" => $_POST["nuevoporDescuento"],
	"Moneda" => $_POST["Moneda_Factura"],
	"Tasa" => $tasa,
	"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
	"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
	"Descuento" => bcdiv($_POST["Descuento"], '1', 2),
	"Total" => bcdiv($_POST["totalVenta"], '1', 2), 
	"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
	"Comision" => $Comision,
	"Estatus" => $Estatus,
	"Referencia" => $_POST["listaMetodoPago"],
	"id_Proyecto" => $idproyecto,
	"CodigoProyecto" => $codproyecto,
	"Observaciones" => $_POST["Observaciones"], 
	"Retenciones" => $_POST["Retencion"],
	"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_607,
	"Porc_ISR_Retenido" => $Porc_ISR_Retenido_607,
	"ITBIS_Retenido_Tercero" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
	"RetencionRenta_por_Terceros" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
	"EXTRAER_NCF" => $NCF, 
	"NAsiento" => $NAsiento,
	"NAsientoRet" => $NAsientoRet,
	"TipodeInventario" => $_POST["CambiarInventario"],
	"Estado" => $Estado,
	"Usuario_Creador" => $Usuario_Creador, 
	"Accion_Factura" => $Accion_Factura);
		
$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);


if($_POST["VentaRecurrente"] == 1){
	$tabla = "ventasrecurrentes_empresas";
	$Estado = "1";

$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"],
	"Rnc_Cliente" => $_POST["RncClienteFactura"],
	"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
	"FechaAnoMes" => $_POST["FechaFacturames"], 
	"FechaDia" => $_POST["FechaFacturadia"], 
	"id_Cliente" => $id_Cliente,
	"Correo_Cliente" => $_POST["nuevoEmail"], 
	"id_Vendedor" => $id_Vendedor,
	"Nombre_Vendedor" => $Nombre_Vendedor, 
	"Producto" => $_POST["listaProductos"],
	"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
	"Pordescuento" => $_POST["nuevoporDescuento"],
	"Moneda" => $_POST["Moneda_Factura"],
	"Tasa" => $tasa,
	"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
	"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
	"Descuento" => bcdiv($_POST["Descuento"], '1', 2),
	"Total" => bcdiv($_POST["totalVenta"], '1', 2), 
	"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
	"Comision" => $Comision,
	"Estatus" => $Estatus,
	"Referencia" => $_POST["listaMetodoPago"],
	"id_Proyecto" => $idproyecto,
	"CodigoProyecto" => $codproyecto,
	"Observaciones" => $_POST["Observaciones"], 
	"EXTRAER_NCF" => $NCF, 
	"TipodeInventario" => $_POST["CambiarInventario"],
	"Estado" => $Estado,
	"Usuario_Creador" => $Usuario_Creador, 
	"Accion_Factura" => $Accion_Factura);
		
$respuesta = ModeloVentas::mdlIngresarVentaRecurrente($tabla, $datos);
}/*factura Recurrentes*/

if($respuesta == "ok"){

	unset($_SESSION["FechaFacturadia"]);

	if($_POST["Contabilidad"] == 1){
		echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>La Factura Se Registro Correctamente<br>N° DE CONTROL De LA FACTURA: '.$_POST["nuevaVenta"].'</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "crear-ventas";
		}

		});

</script>';			

	}else { 

	echo '<script>
			swal({
				type: "success",
				title: "¡la Venta Se Registro Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
				
				}).then((result)=>{

				if(result.value){
					window.location = "crear-ventas";
				}

				});

			</script>';
		}
}
										

		}/*CIERRE DE ISSET NUEVA VENTA*/

	}/*CIERRE DE FUNCION CREAR VENTAS*/

static public function ctrCrearVentaNo(){
	if(isset($_POST["nuevaVenta"])){

$_SESSION["FechaFacturames"] = $_POST["FechaFacturames"];
$_SESSION["FechaFacturadia"] = $_POST["FechaFacturadia"];
$_SESSION["Comision_Factura"] = $_POST["Comision_Factura"];
/*CARGA DE CLIENTES DE TABLA GROWIN_DGII*/
	$tabla = "growin_dgii";
	$taRnc_Growin_DGII = "Rnc_Growin_DGII";
	$ValorRnc_Growin_DGII = $_POST["RncClienteFactura"];
	$ValorNombreGrowin_DGII = $_POST["Nombre_Cliente"];
	$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

	if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
		
		$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII,
			"Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

	$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);



	}
/*CIERRE  DE CARGA GROWIN DGII*/
/****VALIDACION QUE LA FACUTRA NO SE REPITA****/

				$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Empresa_607";
				$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["RncClienteFactura"];
				$taNCF_607 = "NCF_607";

				$NCFFactura = $_POST["NCFFacturaNo"];
				$CodigoNCF = $_POST["CodigoNCFNo"];
				
				$NCF_607 = $NCFFactura.$CodigoNCF;

			$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);

		if($FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["NCF_607"] == $NCF_607){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-ventas-pro";
											}

											});

								</script>';
			exit;
		} 
		/************************VALIDACION 608***************************/
		$tabla = "608_empresas";
		$taRnc_Empresa_608 = "Rnc_Empresa_608";
		$Rnc_Empresa_608 = $_POST["RncEmpresaVentas"];
		$taNCF_608 = "NCF_608";
		$NCF_608 = $NCF_607;

$FacturaRepetida608 = Modelo608::MdlfacturaRepetida608($tabla, $taRnc_Empresa_608, $Rnc_Empresa_608, $taNCF_608, $NCF_608);

if($FacturaRepetida608 != false && $FacturaRepetida608["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida608["NCF_608"] == $NCF_608 && $FacturaRepetida608["Estatus"] != "2"){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 608 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-ventas-pro";
											}

											});

								</script>';


		exit;

}
if($FacturaRepetida608 != false && $FacturaRepetida608["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida608["NCF_608"] == $NCF_608 && $FacturaRepetida608["Estatus"] == "2"){
$tabla = "608_empresas";
$id = "id";
$id_608 = $FacturaRepetida608["id"];

$respuesta = Modelo608::mdlBorrar608($tabla, $id, $id_608);
		
 }
 $tabla = "607_empresas";
 /************************FIN VALIDACION 608***************************/
/************************lista de productos***************************/
		if(empty($_POST["listaProductos"]) || $_POST["listaProductos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PRODUCTO A LA VENTA!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventas-pro";
													}

													});

										</script>';
								exit;

				
			}

			$listaProductos =  json_decode($_POST["listaProductos"], true);

		foreach ($listaProductos as $key => $value) {

			if($value["idgrupo"] == "" || $value["idcategoria"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventas-pro";
													}

													});

										</script>';
								exit;



			}

			if($value["tipoproducto"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, el Tipo de producto no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventas-pro";
													}

													});

										</script>';
								exit;



			}


			
			// code...
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
									window.location = "crear-ventas-pro";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano <= 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas-pro";
													
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
									window.location = "crear-ventas-pro";
													
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
									window.location = "crear-ventas-pro";
													
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
									window.location = "crear-ventas-pro";
													
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
						window.location = "crear-ventas-pro";
													
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
									window.location = "crear-ventas-pro";
													
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
									window.location = "crear-ventas-pro";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	///****Validar CLIENTE****///

$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
$id = "Documento";
$valorid = $_POST["RncClienteFactura"];
$cliente = ControladorClientes::ctrBuscarCliente($Rnc_Empresa_Cliente, $id, $valorid);

if($cliente != false && $cliente["Rnc_Empresa_Cliente"] == $Rnc_Empresa_Cliente && $cliente["Documento"] == $_POST["RncClienteFactura"] && $cliente["id"] != $_POST["agregarCliente"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Cliente no Coinciden con el RNC del cliente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-ventas-pro";
											}

											});

								</script>';


		exit;

}

			
/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Cliente_Factura"] == 1 && strlen($_POST["RncClienteFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas-pro";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente_Factura"] == 2 && strlen($_POST["RncClienteFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas-pro";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/
if(isset($_POST["CodigoNCFanterior"])){ 
	if($_POST["CodigoNCFNo"] > $_POST["CodigoNCFanterior"]){
		echo '<script>
								swal({

									type: "error",
									title: "El Codigo de NCF no Puede ser mayor al que corresponde, si desea modificarlo debe ser menor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas-pro";
								});

	
								</script>';
				exit;
	}
	}

	/*******INICIO VALIDACION DE NCF*****/

	if(substr($NCF_607, 0, 1) == "F" && strlen($NCF_607) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas-pro";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
                   

$Monto_Facturado_607 = $_POST["nuevoPrecioNeto"] - $_POST["Descuento"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	

if($_POST["nuevoPrecioImpuesto"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas-pros";
													
													});
												
								</script>';	
				

			exit; 
		 }
		 
if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
		$Moneda = "DOP";
		$tasa = "0.00";
		$TotalPrecioImpuesto =  $_POST["nuevoPrecioImpuesto"];


	}

$Forma_De_Pago_607 = $_POST["nuevoMetodoPago"];

$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;

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

if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"] ;
$ITBIS_Retenido_Tercero_607 = $USDITBIS_Retenido_Tercero_607 * $_POST["tasaUS"];


$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"] ;

$Retencion_Renta_por_Terceros_607 = $USDRetencion_Renta_por_Terceros_607 * $_POST["tasaUS"];
	}else{
$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
$ITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$Retencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
	
	}

		
$Fecha_Ret_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
$Fecha_Retencion_AnoMes_607 = $_POST["FechaFacturames"];
$Fecha_Retencion_Dia_607 = $_POST["FechaFacturadia"];

		
} else{ 

		$Fecha_Ret_AnoMesDia_607  = "";
		$Fecha_Retencion_AnoMes_607 = "";
		$Fecha_Retencion_Dia_607 = "";
		$USDITBIS_Retenido_Tercero_607 = "0.00";
		$USDRetencion_Renta_por_Terceros_607 = "0.00";
		$ITBIS_Retenido_Tercero_607 = "0.00";
		$Retencion_Renta_por_Terceros_607 = "0.00";
		$Porc_ITBIS_Retenido_607 = 0;
		$Porc_ISR_Retenido_607 = 0; 

}




if(isset($_POST["ITBISRetenido_Ventas"]) && $_POST["ITBISRetenido_Ventas"] != ""){
	
	$Porc_ITBIS_Retenido_607 = $_POST["ITBISRetenido_Ventas"];

}else{

	$Porc_ITBIS_Retenido_607 = "0";

}
		
if(isset($_POST["ISR_RETENIDO_Ventas"]) && $_POST["ISR_RETENIDO_Ventas"] != ""){
	
	$Porc_ISR_Retenido_607 = $_POST["ISR_RETENIDO_Ventas"];
}else{

	$Porc_ISR_Retenido_607 = "0";

}


$Extraer_NCF_607 = $_POST["NCFFacturaNo"];
$B04MeMa_607 = "";
$Transaccion_607 = "1";
$NCF_Modificado_607 = "";
$Tipo_de_Ingreso_607 = "01";
$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];

$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0";	

$ITBIS_Percibido_607 = "0.00";

$ISR_Percibido_607 = "0.00";
$Impuesto_Selectivo_al_Consumo_607 = "0.00";
$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0.00";
$Estatus_607 = "";
$Accion_607 = "CREADO";
$Modulo = "FACTURA";

$banco = 0;
$datos = array("Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Tipo_Cliente_Factura"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $Tipo_de_Ingreso_607,
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
"ITBIS_Facturado_607" => bcdiv($TotalPrecioImpuesto, '1', 2),
"ITBIS_Retenido_Tercero_607" => bcdiv($ITBIS_Retenido_Tercero_607, '1', 2),
"ITBIS_Percibido_607" => $ITBIS_Percibido_607,
"Retencion_Renta_por_Terceros_607" => bcdiv($Retencion_Renta_por_Terceros_607, '1', 2),
"ISR_Percibido_607" => $ISR_Percibido_607,
"Impuesto_Selectivo_al_Consumo_607" => $Impuesto_Selectivo_al_Consumo_607,
"Otros_Impuestos_607" => $Otros_Impuestos_607,
"Monto_Propina_Legal_607" => $Monto_Propina_Legal_607,
"Efectivo" => $Efectivo,
"Cheque_Transferencia_Deposito_607" => $CHEQUES,
"Tarjeta_Debito_Credito_607" => $TARJETA,
"Venta_a_Credito_607" => $CREDITO,
"Bonos_607" => $BONOS,
"Permuta_607" => $PERMUTAS,
"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
"Estatus_607" => $Estatus_607,
"Fecha_comprobante_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_Comprobante_Dia_607" => $_POST["FechaFacturadia"],
"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes_607,
"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
"EXTRAER_NCF_607" => $Extraer_NCF_607,
"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Transaccion_607" => $Transaccion_607,
"Referencia_Pago_607" => $_POST["Observaciones"],
"Banco_607" => $banco,
"Fecha_Trans_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_trans_dia_607" => $_POST["FechaFacturadia"],
"Descripcion_607" => $_POST["Observaciones"], 
"Nombre_Empresa_607" => $_POST["Nombre_Cliente"],
"Usuario_Creador" => $_POST["nuevoVendedor"],
"Accion_607" => $Accion_607,
"Codigo_Factura" =>$_POST["nuevaVenta"],
"Modulo" => $Modulo);


$respuesta =  Modelo607::MdlRegistrar607($tabla, $datos);
/*****************************ACTUALIZAR ESTATUS 607******************************************/
if($respuesta != "ok"){
		echo '<script>
				swal({

				type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
				showConfirmButton: false,
				timer: 6000
				}).then(()=>{
				window.location = "crear-ventas-pro";
													
								});
												
					</script>';	
		exit;



	}

$tabla = "control_empresas";
$taRnc_Empresa = "Rnc_Empresa";
$Rnc_Empresa = $Rnc_Empresa_607;
$taPeriodo_Empresa = "Periodo_Empresa";
$Periodo_Empresa = $_POST["FechaFacturames"];
$tacontrol_Empresa = "607_Empresa";
$valorestado = "1";


$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);
/*****************************ACTUALIZAR CORRELATIVOS******************************************/
if($respuesta == "ok"){
	if(!isset($_POST["CodigoNCFanterior"]) && empty($_POST["HabilitarNCFNo"])){
$tabla = "correlativos_no_fiscal";

$datos = array("Rnc_Empresa" => $_POST["RncEmpresaVentas"],
"Tipo_NCF" => $_POST["NCFFacturaNo"],
"NCF_Cons" =>  $_POST["CodigoNCFNo"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
 }
 $tabla = "607_empresas";
$taRnc_Empresa_607 = "Rnc_Empresa_607";
$Rnc_Empresa_607 = $Rnc_Empresa_607;
$taRnc_Factura_607 = "Rnc_Factura_607";
$Rnc_Factura_607 = $Rnc_Factura_607;
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
									title: "¡Error en la consulta a la base de datos de la factura consultar con el programador!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;




			}

		/**********************FIN CONSULTAS DE FACTURA RNC Y NCF Y ID******************/
/**********************************agregar Cliente************************************/
$id_Cliente = $_POST["agregarCliente"];
if(empty($_POST["agregarCliente"])){
	$tabla = "clientes_empresas";
	$Fecha_Nacimiento = "";

$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaVentas"],
"Tipo_Cliente" => $_POST["Tipo_Cliente_Factura"],
"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
"Documento" => $_POST["RncClienteFactura"],
"Email" => $_POST["nuevoEmail"], 
"Telefono" => $_POST["nuevoTelefono"],
"Direccion" => $_POST["nuevaDireccion"], 
"Fecha_Nacimiento" => $Fecha_Nacimiento);
$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
$taDocumento = "Documento";
$Documento = $_POST["RncClienteFactura"];


$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);




$id_Cliente = $respuesta["id"];

}

if(isset($_POST["Comision_Factura"]) && $_POST["Comision_Factura"] == "2"){
	$id_Vendedor = "0";
	$Nombre_Vendedor = "";


}else{

	$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];



}


}/*cierre respuesta ok*/

/*****************************************************
Carga de Bases de Datos de Cuentas Por Cobrar 

******************************************************/

if($_POST["nuevoMetodoPago"] == "04"){
	

$tabla = "cxc_empresas";
$Dia_Credito_cxc = $_POST["nuevoCodigoTransaccion"];
	$datos = array("id_607" => $id_registro607,
"Codigo" => $_POST["nuevaVenta"], 
"Rnc_Empresa_cxc" => $_POST["RncEmpresaVentas"], 
"id_Cliente" => $id_Cliente,
"Rnc_Cliente" => $_POST["RncClienteFactura"],
"Nombre_Cliente" => $_POST["Nombre_Cliente"],
"NCF_cxc" => $NCF_607,
"id_Vendedor" => $id_Vendedor,
"Nombre_Vendedor" => $Nombre_Vendedor,
"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
"FechaDia_cxc" => $_POST["FechaFacturadia"], 
"Dia_Credito_cxc" => $Dia_Credito_cxc, 
"Moneda" => $Moneda,
"Tasa" => $tasa,	
"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
"Descuento"  => bcdiv($_POST["Descuento"], '1', 2), 
"Total" => bcdiv($_POST["totalVenta"], '1', 2),
"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
"Retencion_Renta" => bcdiv($USDRetencion_Renta_por_Terceros_607 , '1', 2),
"Observaciones" => $_POST["Observaciones"],
"Retenciones" => $_POST["Retencion"],
"MontoCobrado" => 0,
"Estado" => "PorCobrar");
$respuesta = ModeloCXC::mdlIngresarcxc($tabla, $datos);
}
/*********************** CIERRE DE CUENTAS POR COBRAR **************************************/
/************************************************ CARGAR CUENTAS CONTABLES****************************/
$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 
$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $Rnc_Empresa_607;
	$tipocod = "DFP";
	$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DFP".$N;
if($_POST["Contabilidad"] == 1){ 



/**********************CONSULTAS DE FACTURA RNC Y NCF Y ID******************/
	$tabla = "607_empresas";
	$taRnc_Empresa_607 = "Rnc_Empresa_607";
	$Rnc_Empresa_607 = $Rnc_Empresa_607;
	$taRnc_Factura_607 = "Rnc_Factura_607";
	$Rnc_Factura_607 = $Rnc_Factura_607;
	$taNCF_607 = "NCF_607";
	$NCF_607 = $NCF_607;

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

/*PROYECTO*/
if($_POST["proyecto"] == 0){
	$idproyecto = "NOAPLICA";
	$codproyecto = "NOAPLICA"; 

	}else{
		$tabla = "proyectos_empresas";
		$id = "id";
		$valorid = $_POST["proyecto"];
				
		$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
		$idproyecto = $_POST["proyecto"];
		$codproyecto = $respuesta["CodigoProyecto"]; 


}

/********************************************************************************/
///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////

$listaProductos =  json_decode($_POST["listaProductos"], true);

$cuentasproductos = [];	
$costoventa = 0;

foreach ($listaProductos as $pro => $value){

		/*establecer costo de venta*/
		if($value["tipoproducto"] == "1"){
			$costoventa = $costoventa + ($value["preciocompra"]*$value["cantidad"]);
			}
		/* fin establecer costo de venta*/




if($pro = 0){

		if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $value["total"] * $tasa;
			$value["total"] = $cambioMoneda;

		}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);


}else{

$variable = "DISTINTO";
	
foreach ($cuentasproductos as $key => $cuentas){

if($cuentas["idgrupo"] == $value["idgrupo"] && $cuentas["idcategoria"] == $value["idcategoria"] && $cuentas["idgenerica"] == $value["idgenerica"] && $cuentas["idcuenta"] == $value["idcuenta"]){

		if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $value["total"] * $tasa;
			$value["total"] = $cambioMoneda;

		}

		$suma = $cuentas["credito"] + $value["total"];
		$cuentasproductos[$key]["credito"] = $suma;
		$variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);

}
}


}/*****cierre for de comparar cuentas********/


///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////
foreach ($cuentasproductos as $key => $value) {
	$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "DFP";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;

$idgrupo = $value["idgrupo"];
$idcategoria = $value["idcategoria"];
$idgenerica = $value["idgenerica"];
$idcuenta = $value["idcuenta"];
$nombrecuenta = $value["nombrecuenta"];
$debito = bcdiv($value["debito"], '1', 2);
$credito = bcdiv($value["credito"], '1', 2);
$ObservacionesLD = $value["ObservacionesLD"];

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }
 
	
	
if($_POST["nuevoMetodoPago"] == "04"){
	$totalVentas = $_POST["totalVenta"];
			if($_POST["Moneda_Factura"] == "USD"){
				$totalVentas = $_POST["totalVenta"] * $tasa;
			}
	
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "DFP";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
			



}/*CIERRE CUENTA CONTABLE*/
else{

	$totalVentas = $_POST["totalVenta"];

	if($_POST["Moneda_Factura"] == "USD"){
		$USDtotalVentas = $_POST["totalVenta"] * $tasa;
		$totalVentas = $USDtotalVentas;

		}

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = "DFP";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);




 }/*CIERRE ELSE CUENTA CONTABLE*/
 if($_POST["nuevoPrecioImpuesto"] > 0){
 	$nuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];
 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
	$nuevoPrecioImpuesto = $USDnuevoPrecioImpuesto;

	}
$idgrupo = "2";
$idcategoria = "4";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "ITBIS en ventas por pagar";
$debito = 0;
$credito = bcdiv($nuevoPrecioImpuesto, '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

 }
 if($_POST["Descuento"] > 0){
 	$Descuento = $_POST["Descuento"];

 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDDescuento = $_POST["Descuento"] * $tasa;
	$Descuento = $USDDescuento;

	}
		$idgrupo = "4";
		$idcategoria = "8";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "descuentos en ventas";
		$debito = bcdiv($Descuento, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}
if($costoventa > 0){ /*costos de ventas*/
 		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "005";
		$nombrecuenta = "costos de ventas";
		$debito = bcdiv($costoventa, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = 0;
		$credito = bcdiv($costoventa, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*costos de ventas*/

 if($_POST["Retencion"] == 1){


if($ITBIS_Retenido_Tercero_607 > 0){
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido en ventas N.02-05";
		$debito = bcdiv($ITBIS_Retenido_Tercero_607, '1', 2);;
		$credito = 0;
 

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"ObservacionesLD" => "Retencion Factura".$NCF_607,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
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

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"ObservacionesLD" => "Retencion Factura".$NCF_607,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
		

	}

}/*cierre retencion*/

}/* cierre de if de Contabilidad de si la empresa tiene contabilidad*/

if($respuesta == "ok"){
		/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DFP";
			
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_607,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);  

 }
if($_POST["idCotizaccion"] != "") {
	$tabla = "cotizaciones_empresas";
	$id = "id";
	$valoridCotizacion = $_POST["idCotizaccion"];

	$respuesta =  ModeloCotizacion::mdlMostrarCotizacionesEditar($tabla, $id, $valoridCotizacion);


	$_POST["listaProductos"] = $respuesta["Producto"];

	$Estado = "Accion_Cotizacion";
	
	$estadoCotizacion = "FACTURADA";
	$idCotizacion = $_POST["idCotizaccion"];


	$cambioEstatus =  ModeloCotizacion::MdlEstadoCotizacion($tabla, $Estado, $id, $estadoCotizacion, $idCotizacion);

	$Estado = "Estado_Cotizacion";
	
	$estadoCotizacion = "1";
	

	$cambioEstatus =  ModeloCotizacion::MdlEstadoCotizacion($tabla, $Estado, $id, $estadoCotizacion, $idCotizacion);
	
	$Estado = "NCF_FACTURA";
				
	$estadoCotizacion = $NCF_607;
				

	$cambioEstatus =  ModeloCotizacion::MdlEstadoCotizacion($tabla, $Estado, $id, $estadoCotizacion, $idCotizacion);


}
/*****************************************************************************
ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STCKO DE LAS VENTAS PRODUCTOS
*******************************************************************************/

$listaProductos =  json_decode($_POST["listaProductos"], true);

$totalProductosComprados = array();


			if($_POST["CambiarInventario"] == "1"){
				$tablaProductos = "productos_empresas";


			}else {
				$tablaProductos = "productos_activor_empresas";


			}




foreach ($listaProductos as $key => $value) {

	array_push($totalProductosComprados, $value["cantidad"]);



	$tablaProductos = "productos_empresas";

	$id = "id";

	$valorid = $value["id"];

	

	$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

	

	$item1a = "Ventas";

	$valor1a = $value["cantidad"] + $traerProductos["Ventas"];

	$nuevasVentas = ModeloProductos::MdlActualizarProductoVentas($tablaProductos, $item1a, $valor1a, $id, $valorid);

	$item1b = "Stock";
	$valor1b = $value["Stock"];

	$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1b, $id, $valorid);

if($value["tipoproducto"] == "1"){
$tabla = "productos_empresas";
$id = "id";
$valoridProducto = $value["id"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];


$tabla = "historico_productos_empresas";
$Accion = "VENTA";

$datos = array ("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => "0", 
      "Precio_Venta" => $value["precio"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames"],
      "Fecha_dia" => $_POST["FechaFacturadia"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_607,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["nuevoVendedor"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);	
 }/*CIERRE DE IF TIPO PRODUCTO*/

}/*CIERRO FOREACH*/

$tablaClientes = "clientes_empresas";

$id = "id";

$valorid = $id_Cliente;

$traeCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);


$item = "Compras";
$valor = array_sum($totalProductosComprados) + $traeCliente["Compras"];


$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);

	/*FECHA ULTIMA COMPRA CLIENTE */

$item = "Ultima_Compra";

date_default_timezone_set('America/Santo_Domingo');

$fecha = date('Y-m-d');
$hora = date('H:i:s');
$fechaActual = $fecha.' '.$hora;

$valor = $fechaActual;


$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);


/**********************************************
GUARDAR LA COMPRA
***********************************************/
$NCF = $_POST["NCFFacturaNo"];
$Correlativo = $_POST["CodigoNCFNo"]; 
$NCF_Factura = $NCF.$Correlativo;
$Comision = $_POST["Comision_Factura"];
$Usuario_Creador = $_POST["nuevoVendedor"];
$Accion_Factura = "Creada";

if($_POST["nuevoMetodoPago"] == "04"){
	$Estatus = "CREDITO";
} else{
	$Estatus = "POR DEPOSITAR";

}

if($_POST["Retencion"] == 1){ 

	$NAsientoRet = $NAsiento;
	$ITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
	$Retencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
}else{

	$NAsientoRet = "";
	$ITBIS_Retenido_Tercero_607 = "0.00";
	$Retencion_Renta_por_Terceros_607 = "0.00";
}


$Estado = "1";
$tabla = "ventas_empresas";

	$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"],
		"id_607" => $id_registro607, 
		"Codigo" => $_POST["nuevaVenta"],
		"Rnc_Cliente" => $_POST["RncClienteFactura"], 
		"Nombre_Cliente" => $_POST["Nombre_Cliente"],
		"NCF_Factura" => $NCF_Factura, 
		"FechaAnoMes" => $_POST["FechaFacturames"], 
		"FechaDia" => $_POST["FechaFacturadia"], 
		"id_Cliente" => $id_Cliente,
		"Correo_Cliente" => $_POST["nuevoEmail"], 
		"id_Vendedor" => $id_Vendedor,
		"Nombre_Vendedor" => $Nombre_Vendedor,  
		"Producto" => $_POST["listaProductos"], 
		"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
		"Pordescuento" => $_POST["nuevoporDescuento"],
		"Moneda" => $_POST["Moneda_Factura"],
		"Tasa" => $tasa,
		"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
		"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2),
		"Descuento" => bcdiv($_POST["Descuento"], '1', 2), 
		"Total" => bcdiv($_POST["totalVenta"], '1', 2), 
		"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
		"Comision" => $Comision,
		"Estatus" => $Estatus, 
		"Referencia" => $_POST["listaMetodoPago"], 
		"Observaciones" => $_POST["Observaciones"],
		"id_Proyecto" => $idproyecto,
		"CodigoProyecto" => $codproyecto,
		"Retenciones" => $_POST["Retencion"],
		"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_607,
		"Porc_ISR_Retenido" => $Porc_ISR_Retenido_607,
		"ITBIS_Retenido_Tercero" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
		"RetencionRenta_por_Terceros" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
		"EXTRAER_NCF" => $NCF, 
		"NAsiento" => $NAsiento,
		"TipodeInventario" => $_POST["CambiarInventario"],
		"Estado" => $Estado,
		"Usuario_Creador" => $Usuario_Creador, 
		"Accion_Factura" => $Accion_Factura);


$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

if($_POST["VentaRecurrente"] == 1){
	$tabla = "ventasrecurrentes_empresas";
	$Estado = "1";

$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"],
	"Rnc_Cliente" => $_POST["RncClienteFactura"],
	"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
	"FechaAnoMes" => $_POST["FechaFacturames"], 
	"FechaDia" => $_POST["FechaFacturadia"], 
	"id_Cliente" => $id_Cliente,
	"Correo_Cliente" => $_POST["nuevoEmail"], 
	"id_Vendedor" => $id_Vendedor,
	"Nombre_Vendedor" => $Nombre_Vendedor, 
	"Producto" => $_POST["listaProductos"],
	"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
	"Pordescuento" => $_POST["nuevoporDescuento"],
	"Moneda" => $_POST["Moneda_Factura"],
	"Tasa" => $tasa,
	"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
	"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
	"Descuento" => bcdiv($_POST["Descuento"], '1', 2),
	"Total" => bcdiv($_POST["totalVenta"], '1', 2), 
	"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
	"Comision" => $Comision,
	"Estatus" => $Estatus,
	"Referencia" => $_POST["listaMetodoPago"],
	"id_Proyecto" => $idproyecto,
	"CodigoProyecto" => $codproyecto,
	"Observaciones" => $_POST["Observaciones"], 
	"EXTRAER_NCF" => $NCF, 
	"TipodeInventario" => $_POST["CambiarInventario"],
	"Estado" => $Estado,
	"Usuario_Creador" => $Usuario_Creador, 
	"Accion_Factura" => $Accion_Factura);
		
$respuesta = ModeloVentas::mdlIngresarVentaRecurrente($tabla, $datos);
}/*factura Recurrentes*/

if($respuesta == "ok"){
unset($_SESSION["FechaFacturadia"]);
		
				


	if($_POST["Contabilidad"] == 1){
		echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>La Factura Se Registro Correctamente<br>N° DE CONTROL De LA FACTURA: '.$_POST["nuevaVenta"].'</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "crear-ventas-pro";
		}

		});

</script>';			

	}else { 

	echo '<script>
			swal({
				type: "success",
				title: "¡la Venta Se Registro Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
				
				}).then((result)=>{

				if(result.value){
					window.location = "crear-ventas-pro";
				}

				});

			</script>';
		} 


}

	

	}/*CIERRE ISSET*/

}/*CIERRE DE FUNCION CREAR VENTAS*/



	/*********************************************************
				MOSTAR VENTAS EDITAR

	************************************************************/


static public function ctrMostrarVentaEditar($id, $valoridVenta){

		$tabla = "ventas_empresas";
		

		$respuesta = ModeloVentas::mdlMostrarVentaEditar($tabla, $id, $valoridVenta);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/
static public function ctrMostrarVentaRecurrenteEditar($id, $valoridVenta){

		$tabla = "ventasrecurrentes_empresas";
		

		$respuesta = ModeloVentas::mdlMostrarVentaEditar($tabla, $id, $valoridVenta);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/

	/****************************************
		EDITAR VENTAS
	*****************************************/
static public function ctrEditarVenta(){

	if(isset($_POST["editarVenta"])){

		$url = $_SERVER["REQUEST_URI"];


		/*CARGA DE CLIENTES DE TABLA GROWIN_DGII*/
		$tabla = "growin_dgii";
		$taRnc_Growin_DGII = "Rnc_Growin_DGII";
		$ValorRnc_Growin_DGII = $_POST["RncClienteFactura"];
		$ValorNombreGrowin_DGII = $_POST["Nombre_Cliente"];
		$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

		if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
		$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

		$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

		}
		/*CIERRE  DE CARGA GROWIN DGII*/
if($_POST["Contabilidad"] == 1){ 
 if($_POST["NAsiento"] == ""){
 	echo '<script>
								swal({

									type: "error",
									title: "¡Existe un Error con el Asiento contable de esta factura Contacte a los tecnicos de GROWIN!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
													});
												
								</script>';	
					exit;
 }
 }

 /************************lista de productos***************************/
		if(empty($_POST["listaProductos"]) || $_POST["listaProductos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PRODUCTO A LA VENTA!",
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

		$listaProductos =  json_decode($_POST["listaProductos"], true);

		foreach ($listaProductos as $key => $value) {

			if($value["idgrupo"] == "" || $value["idcategoria"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
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

			if($value["tipoproducto"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
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


			
			// code...
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
$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
$id = "Documento";
$valorid = $_POST["RncClienteFactura"];
$cliente = ControladorClientes::ctrBuscarCliente($Rnc_Empresa_Cliente, $id, $valorid);

if($cliente != false && $cliente["Rnc_Empresa_Cliente"] == $Rnc_Empresa_Cliente && $cliente["Documento"] == $_POST["RncClienteFactura"] && $cliente["id"] != $_POST["agregarCliente"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Cliente no Coinciden con el RNC del cliente!",
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
	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Cliente_Factura"] == 1 && strlen($_POST["RncClienteFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente_Factura"] == 2 && strlen($_POST["RncClienteFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	
	
$totalVenta = $_POST["totalVenta"];


$Monto_Facturado_607 = $_POST["nuevoPrecioNeto"] - $_POST["Descuento"];

								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);

if($_POST["nuevoPrecioImpuesto"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "'.$url.'";
													
													});
												
								</script>';	
				

			exit; 
}
/************** CARGA DE 607 *******************************************/
if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
	$Moneda = "DOP";
	$tasa = "0.00";
	$TotalPrecioImpuesto =  $_POST["nuevoPrecioImpuesto"];


}
$Forma_De_Pago_607 = $_POST["nuevoMetodoPago"];

$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;
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
if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"] ;
$ITBIS_Retenido_Tercero_607 = $USDITBIS_Retenido_Tercero_607 * $_POST["tasaUS"];


$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"] ;

$Retencion_Renta_por_Terceros_607 = $USDRetencion_Renta_por_Terceros_607 * $_POST["tasaUS"];
	}else{
$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
$ITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$Retencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
	
	}

		
$Fecha_Ret_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
$Fecha_Retencion_AnoMes_607 = $_POST["FechaFacturames"];
$Fecha_Retencion_Dia_607 = $_POST["FechaFacturadia"];

		
} else{ 

		$Fecha_Ret_AnoMesDia_607  = "";
		$Fecha_Retencion_AnoMes_607 = "";
		$Fecha_Retencion_Dia_607 = "";
		$USDITBIS_Retenido_Tercero_607 = "0.00";
		$USDRetencion_Renta_por_Terceros_607 = "0.00";
		$ITBIS_Retenido_Tercero_607 = "0.00";
		$Retencion_Renta_por_Terceros_607 = "0.00";
		$Porc_ITBIS_Retenido_607 = 0;
		$Porc_ISR_Retenido_607 = 0; 

}



if(isset($_POST["ITBISRetenido_Ventas"]) && $_POST["ITBISRetenido_Ventas"] != ""){
	
	$Porc_ITBIS_Retenido_607 = $_POST["ITBISRetenido_Ventas"];

}else{

	$Porc_ITBIS_Retenido_607 = "0";

}
		
if(isset($_POST["ISR_RETENIDO_Ventas"]) && $_POST["ISR_RETENIDO_Ventas"] != ""){
	
	$Porc_ISR_Retenido_607 = $_POST["ISR_RETENIDO_Ventas"];
}else{

	$Porc_ISR_Retenido_607 = "0";

}

$Extraer_NCF_607 = $_POST["Extraer_NCF_Factura"];
$B04MeMa_607 = "";
$Transaccion_607 = "1";
$NCF_Modificado_607 = "";
$Tipo_de_Ingreso_607 = "01";
$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];

$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0";	

$ITBIS_Percibido_607 = "0.00";

$ISR_Percibido_607 = "0.00";
$Impuesto_Selectivo_al_Consumo_607 = "0.00";
$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0.00";
$Estatus_607 = "";

$Accion_607 = "EDITADO";
$Codigo_Factura = $_POST["editarVenta"];
$Modulo = "FACTURA";

$tabla = "607_empresas";
$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
$Rnc_Factura_607 = $_POST["RncClienteFactura"];
	
$datos = array("Codigo_Factura" => $Codigo_Factura,
	"Rnc_Empresa_607" => $Rnc_Empresa_607,
	"Rnc_Factura_607" => $Rnc_Factura_607,
	"Tipo_Id_Factura_607" => $_POST["Tipo_Cliente_Factura"],
	"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
	"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
	"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
	"ITBIS_Facturado_607" => bcdiv($TotalPrecioImpuesto, '1', 2),
	"ITBIS_Retenido_Tercero_607" => bcdiv($ITBIS_Retenido_Tercero_607, '1', 2),
	"Retencion_Renta_por_Terceros_607" => bcdiv($Retencion_Renta_por_Terceros_607, '1', 2),
	"Otros_Impuestos_607" => $Otros_Impuestos_607,
	"Efectivo" => $Efectivo,
	"Cheque_Transferencia_Deposito_607" => $CHEQUES,
	"Tarjeta_Debito_Credito_607" => $TARJETA,
	"Venta_a_Credito_607" => $CREDITO,
	"Bonos_607" => $BONOS,
	"Permuta_607" => $PERMUTAS,
	"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
	"Fecha_comprobante_AnoMes_607" => $_POST["FechaFacturames"],
	"Fecha_Comprobante_Dia_607" => $_POST["FechaFacturadia"],
	"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes_607,
	"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
	"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
	"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
	"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
	"Forma_de_Pago_607" => $Tipo_Pago_607,
	"Nombre_Empresa_607" => $_POST["Nombre_Cliente"],
	"Usuario_Creador" => $_POST["nuevoVendedor"],
	"Accion_607" => $Accion_607,
	"Modulo" => $Modulo);


$respuesta =  Modelo607::MdlEditar607FACTURA($tabla, $datos);

/*******************************************CARGA DE 607 ********************************************/
/*ACTUALIZO ESTADO DE PROCESOS EN 607*/
if($respuesta == "ok"){
		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["FechaFacturames"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";
		$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);

}else{
	echo '<script>
								swal({

									type: "error",
									title: "¡Error en la Conexión de la bases de datos en el 607, por favor verifique esta factura!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ventas";
													
													});
												
								</script>';	
				

			exit; 


}

if($respuesta == "ok"){

/***************************************agregar Cliente ***************************************/
	$id_Cliente = $_POST["agregarCliente"];
	if(empty($_POST["agregarCliente"])){
		$tabla = "clientes_empresas";
		$Fecha_Nacimiento = "";

		$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaVentas"],
		"Tipo_Cliente" => $_POST["Tipo_Cliente_Factura"],
		"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
		"Documento" => $_POST["RncClienteFactura"],
		"Email" => $_POST["nuevoEmail"], 
		"Telefono" => $_POST["nuevoTelefono"],
		"Direccion" => $_POST["nuevaDireccion"], 
		"Fecha_Nacimiento" => $Fecha_Nacimiento);
		$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

		$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
		$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
		$taDocumento = "Documento";
		$Documento = $_POST["RncClienteFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		



		$id_Cliente = $respuesta["id"];
		
	}


 }

 
	if(isset($_POST["Comision_Factura"]) && $_POST["Comision_Factura"] == "2"){
		$id_Vendedor = "0";
		$Nombre_Vendedor = "";
	}else{
		$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];

	}


/*************************** carga cuentas por cobrar *****************/
if($_POST["nuevoMetodoPago"] == "04"){
		
		$tabla = "cxc_empresas";
		$taCodigo = "Codigo";
		$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";
		$Codigo = $Codigo_Factura;
		$Rnc_Empresa_cxc = $Rnc_Empresa;
		$Dia_Credito_cxc = $_POST["nuevoCodigoTransaccion"];
		$NCF_607 = $_POST["NCF_Factura"];
	
$CXC = ModeloCXC::mdlMostarCXCFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa);

if($CXC["Rnc_Empresa_cxc"] == $Rnc_Empresa_cxc && $CXC["Codigo"] == $Codigo){

	$datos = array("id_607" => $_POST["id_registro607"],
			"Codigo" => $Codigo, 
			"Rnc_Empresa_cxc" => $Rnc_Empresa_cxc, 
			"id_Cliente" => $id_Cliente,
			"Rnc_Cliente" => $_POST["RncClienteFactura"],
			"Nombre_Cliente" => $_POST["Nombre_Cliente"],
			"id_Vendedor" => $id_Vendedor,
			"Nombre_Vendedor" => $Nombre_Vendedor,
			"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
			"FechaDia_cxc" => $_POST["FechaFacturadia"], 
			"Dia_Credito_cxc" => $Dia_Credito_cxc, 
			"Moneda" => $Moneda,
			"Tasa" => $tasa,
			"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
			"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
			"Descuento"  => bcdiv($_POST["Descuento"], '1', 2),
			"Total" => bcdiv($totalVenta, '1', 2),
			"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
			"Retencion_Renta" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
			"Observaciones" => $_POST["Observaciones"],
			"Retenciones" => $_POST["Retencion"],);
		

		/*editar cxc*/

		$respuesta = ModeloCXC::mdlEDITARCXCFACTURA($tabla, $datos);



		}else{
		

			$datos = array("id_607" => $_POST["id_registro607"],
				"Codigo" => $Codigo, 
			"Rnc_Empresa_cxc" => $Rnc_Empresa_cxc, 
			"id_Cliente" => $id_Cliente,
			"Rnc_Cliente" => $_POST["RncClienteFactura"],
			"Nombre_Cliente" => $_POST["Nombre_Cliente"],
			"id_Vendedor" => $id_Vendedor,
			"Nombre_Vendedor" => $Nombre_Vendedor,
			"NCF_cxc" => $NCF_607,
			"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
			"FechaDia_cxc" => $_POST["FechaFacturadia"], 
			"Dia_Credito_cxc" => $Dia_Credito_cxc, 
			"Moneda" => $Moneda,
			"Tasa" => $tasa,
			"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
			"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2),
			"Descuento"  => bcdiv($_POST["Descuento"], '1', 2), 
			"Total" => bcdiv($totalVenta, '1', 2),
			"ITBIS_Retenido" => bcdiv($_POST["Monto_ITBIS_Retenido"], '1', 2),
			"Retencion_Renta" => bcdiv($_POST["Monto_ISR_Retenido"], '1', 2),
			"Observaciones" => $_POST["Observaciones"],
			"Retenciones" => $_POST["Retencion"],
			"MontoCobrado" => 0,
			"Estado" => "PorCobrar");
			$respuesta = ModeloCXC::mdlIngresarcxc($tabla, $datos);

			}

}/*cierre cuentas por cobrar*/
else{

	$tabla = "cxc_empresas";
	$taCodigo = "Codigo";
	$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";
	$Codigo = $Codigo_Factura;
	$Rnc_Empresa_cxc = $Rnc_Empresa;

$CXC =  ModeloCXC::mdlMostarCXCFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa);

if($CXC["Rnc_Empresa_cxc"] == $Rnc_Empresa_cxc && $CXC["Codigo"] == $Codigo){


	$borrar = ModeloCXC::mdlBorrarCXC($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa);

}
}/*cierre cuentas por cobrar */

$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 


/***************************VALIDACVION CUENTAS CONTABLES******************************************/
if($_POST["Contabilidad"] == 1){ 

$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
$Rnc_Factura_607 = $_POST["RncClienteFactura"];

/************* Validacion para el dirario *************************/
	$tabla = "607_empresas";
	$taRnc_Empresa_607 = "Rnc_Empresa_607";
	$Rnc_Empresa_607 = $Rnc_Empresa_607;
	$taRnc_Factura_607 = "Rnc_Factura_607";
	$Rnc_Factura_607 = $Rnc_Factura_607;
	$taNCF_607 = "NCF_607";
	$NCF_607 = $_POST["NCF_Factura"];
	
	$Consulta607 = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);


	if($Consulta607 != false && $Consulta607["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $Consulta607["Rnc_Factura_607"] == $Rnc_Factura_607 && $Consulta607["NCF_607"] == $NCF_607){

		$id_registro607 = $Consulta607["id"];
			
	}

/**********************FIN CONSULTAS DE FACTURA RNC Y NCF Y ID******************/



/****************************BORRAR LIBRO DIARIO*******************************/
$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $id_registro607;

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_607;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = $_POST["ExtraerAsiento"];

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_POST["RNCanteriror"];

	$taNCF = "NCF";
	$NCF = $NCF_607;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}


		/* borrar ret*/
	$taExtraer = "Extraer_NAsiento";
	$Extraer = "REI";

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

/******************************************************************************/
/**************************BORRAR HISTORICO DE PRODUCTOS ************************/

$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $id_registro607;

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_607;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = $_POST["ExtraerAsiento"];

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_POST["RNCanteriror"];

	$taNCF = "NCF";
	$NCF = $NCF_607;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}



/******************************************************************************/
		if($_POST["proyecto"] == 0){
				$idproyecto = "NOAPLICA";
				$codproyecto = "NOAPLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $_POST["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $_POST["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}

/************************************************************************************////*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////

$listaProductos =  json_decode($_POST["listaProductos"], true);

$cuentasproductos = [];	
$costoventa = 0;

foreach ($listaProductos as $pro => $value){

		/*establecer costo de venta*/
		if($value["tipoproducto"] == "1"){
			$costoventa = $costoventa + ($value["preciocompra"]*$value["cantidad"]);
			}
		/* fin establecer costo de venta*/




if($pro = 0){
	if($_POST["Moneda_Factura"] == "USD"){
	$cambioMoneda = $value["total"] * $tasa;
	$value["total"] = $cambioMoneda;

}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);


}else{

$variable = "DISTINTO";
	
foreach ($cuentasproductos as $key => $cuentas){

if($cuentas["idgrupo"] == $value["idgrupo"] && $cuentas["idcategoria"] == $value["idcategoria"] && $cuentas["idgenerica"] == $value["idgenerica"] && $cuentas["idcuenta"] == $value["idcuenta"]){

	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}

		$suma = $cuentas["credito"] + $value["total"];
		$cuentasproductos[$key]["credito"] = $suma;
		$variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);

}
}


}/*****cierre for de comparar cuentas********/


///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////
$NAsiento = $_POST["NAsiento"];

$Rnc_Factura_607 = $_POST["RncClienteFactura"];

foreach ($cuentasproductos as $key => $value) {

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = $_POST["ExtraerAsiento"];
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;

$idgrupo = $value["idgrupo"];
$idcategoria = $value["idcategoria"];
$idgenerica = $value["idgenerica"];
$idcuenta = $value["idcuenta"];
$nombrecuenta = $value["nombrecuenta"];
$debito = bcdiv($value["debito"], '1', 2);
$credito = bcdiv($value["credito"], '1', 2);
$ObservacionesLD = $value["ObservacionesLD"];

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }

/*******************************FIN VALIDACION CUENTAS CONTABLES***********************************/
if($_POST["nuevoMetodoPago"] == "04"){ 
	
	$totalVentas = $_POST["totalVenta"];
	if($_POST["Moneda_Factura"] == "USD"){
		$totalVentas = $_POST["totalVenta"] * $tasa;
	}

$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



}else{
	$totalVentas = $_POST["totalVenta"];

	if($_POST["Moneda_Factura"] == "USD"){
		$USDtotalVentas = $_POST["totalVenta"] * $tasa;
		$totalVentas = $USDtotalVentas;

	}
$tabla = "librodiario_empresas";


$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = $_POST["ExtraerAsiento"];
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }

if($_POST["nuevoPrecioImpuesto"] > 0){ 
	$nuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];
 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
	$nuevoPrecioImpuesto = $USDnuevoPrecioImpuesto;

	}

$idgrupo = "2";
$idcategoria = "4";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "ITBIS en ventas por pagar";
$debito = 0;
$credito = bcdiv($nuevoPrecioImpuesto, '1', 2);

$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}
			

if($_POST["Descuento"] > 0){
	$Descuento = $_POST["Descuento"];

 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDDescuento = $_POST["Descuento"] * $tasa;
	$Descuento = $USDDescuento;

	}
		$idgrupo = "4";
		$idcategoria = "8";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "descuentos en ventas";
		$debito = bcdiv($Descuento, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	

	}

 if($costoventa > 0){ /*costos de ventas*/
 		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "005";
		$nombrecuenta = "costos de ventas";
		$debito = bcdiv($costoventa, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = 0;
		$credito = bcdiv($costoventa, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*costos de ventas*/
  
if($_POST["Retencion"] == 1){
	
	if($ITBIS_Retenido_Tercero_607 > 0){
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido en ventas N.02-05";
		$debito = bcdiv($ITBIS_Retenido_Tercero_607, '1', 2);;
		$credito = 0;
 

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"ObservacionesLD" => "Retenciones Factura ".$NCF_607,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
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

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"ObservacionesLD" => "Retenciones Factura ".$NCF_607,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


		

	}

}/*cierre retencion*/


	

 
}/*cierre if de contabilidad si la empresa tiene o no contabilidad*/

	
/*VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA */

			/************************************************
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			*************************************************/
			$tabla = "ventas_empresas";

				$id = "id";

				$valoridVenta = $_POST["idVenta"];

	$traerVenta = ModeloVentas::mdlMostrarVentaEditar($tabla, $id, $valoridVenta);

			/******************************************
			REVISAR SI VIENEN PRODUCTOS EDITADOS
			******************************************/
			$CambioProducto = false;

	

			if($_POST["CambiarInventario"] == "1"){
				$tablaProductos = "productos_empresas";
				$tablaProductos_2 = "productos_empresas";


			}else {
				$tablaProductos = "productos_activor_empresas";
				$tablaProductos_2 = "productos_activor_empresas";


			}

			if($_POST["listaProductos"] == ""){

				$listaProductos = $traerVenta["Producto"];
				$CambioProducto = false;


			}else{

				$listaProductos = $_POST["listaProductos"];
				$CambioProducto = true;

			}

			if($CambioProducto){




						$Productos =  json_decode($traerVenta["Producto"], true);

						$totalProductosComprados = array();


						foreach ($Productos as $key => $value) {

							array_push($totalProductosComprados, $value["cantidad"]);


							
								
							$id = "id";
							$valorid = $value["id"];

						$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

						$item1a = "Ventas";

						$valor1a = $traerProductos["Ventas"] - $value["cantidad"];

						$nuevasVentas = ModeloProductos::MdlActualizarProductoVentas($tablaProductos, $item1a, $valor1a, $id, $valorid);

						
						$item1b = "Stock";
						$valor1b = $value["cantidad"] + $traerProductos["Stock"];

						$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1b, $id, $valorid);

$tabla = "historico_productos_empresas";

$datos = array("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
	"NCF" => $NCF_607,
	"NAsiento" => $NAsiento);


	$eliminarhistorico = ModeloProductos::mdlEliminarhistoricoProductosVENTAS($tabla, $datos);


						}/*CIEERE FOREACH*/

						$tablaClientes = "clientes_empresas";

						$id = "id";

						$valorid = $_POST["agregarCliente"];

						$traeCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);

						$item = "Compras";
						$valor = $traeCliente["Compras"] - array_sum($totalProductosComprados);

					
						$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);

						/************************************************************************
						ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STCKO DE LAS VENTAS PRODUCTOS
					*************************************************************************/

					$listaProductos_2 =  json_decode($listaProductos, true);

					$totalProductosComprados_2 = array();


					
					foreach ($listaProductos_2 as $key => $value) {

						array_push($totalProductosComprados_2, $value["cantidad"]);



						
						$id_2 = "id";

						$valorid_2 = $value["id"];


						$traerProductos_2 = ModeloProductos::mdlMostrarProductosid_2($tablaProductos_2, $id_2, $valorid_2);

						

						$item1a_2 = "Ventas";

						$valor1a_2 = $value["cantidad"] + $traerProductos_2["Ventas"];

						$nuevasVentas_2 = ModeloProductos::MdlActualizarProductoVentas_2($tablaProductos_2, $item1a_2, $valor1a_2, $id_2, $valorid_2);

						$item1b_2 = "Stock";
						$valor1b_2 = $value["Stock"];

						$nuevoStock_2 = ModeloProductos::MdlActualizarProductoStock_2($tablaProductos_2, $item1b_2, $valor1b_2, $id_2, $valorid_2);

if($value["tipoproducto"] == "1"){
$tabla = "productos_empresas";
$id = "id";
$valoridProducto = $value["id"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];


$tabla = "historico_productos_empresas";
$Accion = "VENTA";

$datos = array ("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => "0", 
      "Precio_Venta" => $value["precio"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames"],
      "Fecha_dia" => $_POST["FechaFacturadia"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_607,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["nuevoVendedor"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);	
 }/*CIERRE DE IF TIPO PRODUCTO*/
					
					}/*CIERRO FOREACH*/

					$tablaClientes_2 = "clientes_empresas";

					$id_2 = "id";

					$valorid_2 = $_POST["agregarCliente"];

					$traeCliente_2 = ModeloClientes::mdlMostrarClientesid_2($tablaClientes_2, $id_2, $valorid_2);
					

					$item_2 = "Compras";
					$valor_2 = array_sum($totalProductosComprados_2) + $traeCliente_2["Compras"];

					
					$comprasCliente_2 =ModeloClientes::MdlActualizarClienteComprar_2($tablaClientes_2, $item_2, $valor_2, $id_2, $valorid_2);

						/*FECHA ULTIMA COMPRA CLIENTE */

					$item_2 = "Ultima_Compra";

					date_default_timezone_set('America/Santo_Domingo');

							$fecha_2 = date('Y-m-d');
							$hora_2 = date('H:i:s');
							$fechaActual_2 = $fecha_2.' '.$hora_2;

					$valor_2 = $fechaActual_2;

					
					$comprasCliente_2 =ModeloClientes::MdlActualizarClienteComprar_2($tablaClientes_2, $item_2, $valor_2, $id_2, $valorid_2);



			}/* CIERRE DE IF CAMBIO PRODUCTO*/

			/**********************************************
					editar	 LA COMPRA
			***********************************************/

			if($_POST["nuevoMetodoPago"] == "04"){
				$Estatus = "CREDITO";

			} else{
				
				$Estatus = "POR DEPOSITAR";

			}
if($_POST["Retencion"] == 1){ 

				$NAsientoRet = $NAsiento;
			 }else{

			 	$NAsientoRet = "";
			 }
$tabla = "ventas_empresas";
$Estado = 1;
			$datos = array("id" => $valoridVenta,
				"Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"], 
				"Codigo" => $_POST["editarVenta"],
				"Rnc_Cliente" => $_POST["RncClienteFactura"],
				"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
				"FechaAnoMes" => $_POST["FechaFacturames"], 
				"FechaDia" => $_POST["FechaFacturadia"], 
				"id_Cliente" => $_POST["agregarCliente"], 
				"Correo_Cliente" => $_POST["nuevoEmail"],
				"id_Vendedor" => $_POST["idVendedor"], 
				"Nombre_Vendedor" => $Nombre_Vendedor, 
				"Producto" => $listaProductos, 
				"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
				"Pordescuento" => $_POST["nuevoporDescuento"],
				"Moneda" => $_POST["Moneda_Factura"],
				"Tasa" => $tasa,
				"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
				"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
				"Descuento" => bcdiv($_POST["Descuento"], '1', 2),
				"Total" => bcdiv($totalVenta, '1', 2), 
				"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
				"Referencia" => $_POST["listaMetodoPago"], 
				"Comision" => $_POST["Comision_Factura"], 
				"Estatus" => $Estatus,
				"Observaciones" => $_POST["Observaciones"],
				"id_Proyecto" => $idproyecto,
				"CodigoProyecto" => $codproyecto,
				"Retenciones" => $_POST["Retencion"],
				"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_607,
				"Porc_ISR_Retenido" => $Porc_ISR_Retenido_607,
				"ITBIS_Retenido_Tercero" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
				"RetencionRenta_por_Terceros" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
				"NAsiento" => $NAsiento,
				"NAsientoRET" => $NAsientoRet,
				"Estado" => $Estado);

			$respuesta = ModeloVentas::mdlEditarVenta($tabla, $datos);

			if($respuesta == "ok"){

						echo '<script>
swal({
	type: "success",
	title: "¡la Venta Se Editado Correctamente!",
	showConfirmButton: true,
	confirmButtonText: "Cerrar",
	closeOnConfirm: false
		}).then((result)=>{

			if(result.value){
				window.location = "ventas";
			}

			});

</script>';


			}

	 	
	
	}/*CIERRE DE ISSET NUEVA VENTA*/


}/*CIERRE DE FUNCION CREAR VENTAS*/


static public function ctrReciclarVenta(){

	if(isset($_POST["editarVenta"])){

		/*CARGA DE CLIENTES DE TABLA GROWIN_DGII*/
		$tabla = "growin_dgii";
		$taRnc_Growin_DGII = "Rnc_Growin_DGII";
		$ValorRnc_Growin_DGII = $_POST["RncClienteFactura"];
		$ValorNombreGrowin_DGII = $_POST["Nombre_Cliente"];
		$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

		if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
		$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

		$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

		}
		/*CIERRE  DE CARGA GROWIN DGII*/

/************************************************
			INICIO 607
	*************************************************/
	$NCFanterior = $_POST["NCFanterior"];
	/****VALIDACION QUE LA FACUTRA NO SE REPITA****/

				$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Empresa_607";
				$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["RncClienteFactura"];
				$taNCF_607 = "NCF_607";

				$NCFFactura = $_POST["NCFFactura"];
				$CodigoNCF = $_POST["CodigoNCF"];
				
				$NCF_607 = $NCFFactura.$CodigoNCF;

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
												window.location = "ventas";
											}

											});

								</script>';



			exit;

		} 
if($_POST["Contabilidad"] == 1){ 
 if($_POST["NAsiento"] == ""){
 	echo '<script>
								swal({

									type: "error",
									title: "¡Existe un Error con el Asiento contable de esta factura Contacte a los tecnicos de GROWIN!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ventas";
													
													});
												
								</script>';	
					exit;
 }
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
									window.location = "ventas";
													
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
									window.location = "ventas";
													
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
									window.location = "ventas";
													
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
									window.location = "ventas";
													
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
									window.location = "ventas";
													
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
						window.location = "ventas";
													
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
									window.location = "ventas";
													
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
									window.location = "ventas";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Cliente_Factura"] == 1 && strlen($_POST["RncClienteFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ventas";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente_Factura"] == 2 && strlen($_POST["RncClienteFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ventas";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	
	
$totalVenta = $_POST["totalVenta"];


$Monto_Facturado_607 = $_POST["nuevoPrecioNeto"] - $_POST["Descuento"];

								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);

if($_POST["nuevoPrecioImpuesto"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ventas";
													
													});
												
								</script>';	
				

			exit; 
}
/************** CARGA DE 607 *******************************************/
if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
	$Moneda = "DOP";
	$tasa = "0.00";
	$TotalPrecioImpuesto =  $_POST["nuevoPrecioImpuesto"];


}
$Forma_De_Pago_607 = $_POST["nuevoMetodoPago"];
$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;

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
if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"] ;
$ITBIS_Retenido_Tercero_607 = $USDITBIS_Retenido_Tercero_607 * $_POST["tasaUS"];


$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"] ;

$Retencion_Renta_por_Terceros_607 = $USDRetencion_Renta_por_Terceros_607 * $_POST["tasaUS"];
	}else{
$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
$ITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$Retencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
	
	}

		
$Fecha_Ret_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
$Fecha_Retencion_AnoMes_607 = $_POST["FechaFacturames"];
$Fecha_Retencion_Dia_607 = $_POST["FechaFacturadia"];

		
} else{ 

		$Fecha_Ret_AnoMesDia_607  = "";
		$Fecha_Retencion_AnoMes_607 = "";
		$Fecha_Retencion_Dia_607 = "";
		$USDITBIS_Retenido_Tercero_607 = "0.00";
		$USDRetencion_Renta_por_Terceros_607 = "0.00";
		$ITBIS_Retenido_Tercero_607 = "0.00";
		$Retencion_Renta_por_Terceros_607 = "0.00";
		$Porc_ITBIS_Retenido_607 = 0;
		$Porc_ISR_Retenido_607 = 0; 

}



if(isset($_POST["ITBISRetenido_Ventas"]) && $_POST["ITBISRetenido_Ventas"] != ""){
	
	$Porc_ITBIS_Retenido_607 = $_POST["ITBISRetenido_Ventas"];

}else{

	$Porc_ITBIS_Retenido_607 = "0";

}
		
if(isset($_POST["ISR_RETENIDO_Ventas"]) && $_POST["ISR_RETENIDO_Ventas"] != ""){
	
	$Porc_ISR_Retenido_607 = $_POST["ISR_RETENIDO_Ventas"];
}else{

	$Porc_ISR_Retenido_607 = "0";

}

$Extraer_NCF_607 = $NCFFactura;
$B04MeMa_607 = "";
$Transaccion_607 = "1";
$NCF_Modificado_607 = "";
$Tipo_de_Ingreso_607 = "01";
$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];

$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0";	

$ITBIS_Percibido_607 = "0.00";

$ISR_Percibido_607 = "0.00";
$Impuesto_Selectivo_al_Consumo_607 = "0.00";
$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0.00";
$Estatus_607 = "";

$Accion_607 = "EDITADO";
$Codigo_Factura = $_POST["editarVenta"];
$Modulo = "FACTURA";

$tabla = "607_empresas";
$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
$Rnc_Factura_607 = $_POST["RncClienteFactura"];
	
$datos = array("Codigo_Factura" => $Codigo_Factura,
	"Rnc_Empresa_607" => $Rnc_Empresa_607,
	"Rnc_Factura_607" => $Rnc_Factura_607 ,
	"NCF_607" => $NCF_607,
	"Tipo_Id_Factura_607" => $_POST["Tipo_Cliente_Factura"],
	"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
	"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
	"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
	"ITBIS_Facturado_607" => bcdiv($TotalPrecioImpuesto, '1', 2),
	"ITBIS_Retenido_Tercero_607" => bcdiv($ITBIS_Retenido_Tercero_607, '1', 2),
	"Retencion_Renta_por_Terceros_607" => bcdiv($Retencion_Renta_por_Terceros_607, '1', 2),
	"Otros_Impuestos_607" => $Otros_Impuestos_607,
	"Efectivo" => $Efectivo,
	"Cheque_Transferencia_Deposito_607" => $CHEQUES,
	"Tarjeta_Debito_Credito_607" => $TARJETA,
	"Venta_a_Credito_607" => $CREDITO,
	"Bonos_607" => $BONOS,
	"Permuta_607" => $PERMUTAS,
	"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
	"Fecha_comprobante_AnoMes_607" => $_POST["FechaFacturames"],
	"Fecha_Comprobante_Dia_607" => $_POST["FechaFacturadia"],
	"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes_607,
	"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
	"EXTRAER_NCF_607" => $Extraer_NCF_607,
	"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
	"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
	"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
	"Forma_de_Pago_607" => $Tipo_Pago_607,
	"Nombre_Empresa_607" => $_POST["Nombre_Cliente"],
	"Usuario_Creador" => $_POST["nuevoVendedor"],
	"Accion_607" => $Accion_607,
	"Modulo" => $Modulo);


$respuesta =  Modelo607::MdlReciclar607FACTURA($tabla, $datos);

/*******************************************CARGA DE 607 ********************************************/
/*ACTUALIZO ESTADO DE PROCESOS EN 607*/
if($respuesta == "ok"){
		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["FechaFacturames"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";
		$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);

}else{
	echo '<script>
								swal({

									type: "error",
									title: "¡Error en la Conexión de la bases de datos en el 607, por favor verifique esta factura!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ventas";
													
													});
												
								</script>';	
				

			exit; 


}

		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["FechaFacturames"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";

$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);

if(!isset($_POST["CodigoNCFanterior"]) && $_POST["HabilitarNCF"] == ""){
	$tabla = "correlativos_empresas";
	
	$datos = array("Rnc_Empresa" => $_POST["RncEmpresaVentas"],
					"Tipo_NCF" => $_POST["NCFFactura"],
					"NCF_Cons" =>  $_POST["CodigoNCF"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);


}

if($respuesta == "ok"){

/***************************************agregar Cliente ***************************************/
	$id_Cliente = $_POST["agregarCliente"];
	if(empty($_POST["agregarCliente"])){
		$tabla = "clientes_empresas";
		$Fecha_Nacimiento = "";

		$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaVentas"],
		"Tipo_Cliente" => $_POST["Tipo_Cliente_Factura"],
		"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
		"Documento" => $_POST["RncClienteFactura"],
		"Email" => $_POST["nuevoEmail"], 
		"Telefono" => $_POST["nuevoTelefono"],
		"Direccion" => $_POST["nuevaDireccion"], 
		"Fecha_Nacimiento" => $Fecha_Nacimiento);
		$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

		$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
		$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
		$taDocumento = "Documento";
		$Documento = $_POST["RncClienteFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		



		$id_Cliente = $respuesta["id"];
		
	}


 }

 
	if(isset($_POST["Comision_Factura"]) && $_POST["Comision_Factura"] == "2"){
		$id_Vendedor = "0";
		$Nombre_Vendedor = "";
	}else{
		$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];

	}


/*************************** carga cuentas por cobrar *****************/
if($_POST["nuevoMetodoPago"] == "04"){
		
		$tabla = "cxc_empresas";
		$taCodigo = "Codigo";
		$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";
		$Codigo = $Codigo_Factura;
		$Rnc_Empresa_cxc = $Rnc_Empresa;
		$Dia_Credito_cxc = $_POST["nuevoCodigoTransaccion"];
		
$CXC = ModeloCXC::mdlMostarCXCFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa);

if($CXC["Rnc_Empresa_cxc"] == $Rnc_Empresa_cxc && $CXC["Codigo"] == $Codigo){

	$datos = array("id_607" => $_POST["id_registro607"],
			"Codigo" => $Codigo, 
			"Rnc_Empresa_cxc" => $Rnc_Empresa_cxc, 
			"id_Cliente" => $id_Cliente,
			"Rnc_Cliente" => $_POST["RncClienteFactura"],
			"Nombre_Cliente" => $_POST["Nombre_Cliente"],
			"id_Vendedor" => $id_Vendedor,
			"Nombre_Vendedor" => $Nombre_Vendedor,
			"NCF_cxc" => $NCF_607,
			"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
			"FechaDia_cxc" => $_POST["FechaFacturadia"], 
			"Dia_Credito_cxc" => $Dia_Credito_cxc, 
			"Moneda" => $Moneda,
			"Tasa" => $tasa,
			"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
			"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
			"Descuento"  => bcdiv($_POST["Descuento"], '1', 2),
			"Total" => bcdiv($totalVenta, '1', 2),
			"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
			"Retencion_Renta" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
			"Observaciones" => $_POST["Observaciones"],
			"Retenciones" => $_POST["Retencion"],);
		

	$respuesta = ModeloCXC::mdlReciclarCXCFACTURA($tabla, $datos);



		}else{
		

			$datos = array("id_607" => $_POST["id_registro607"],
				"Codigo" => $Codigo, 
			"Rnc_Empresa_cxc" => $Rnc_Empresa_cxc, 
			"id_Cliente" => $id_Cliente,
			"Rnc_Cliente" => $_POST["RncClienteFactura"],
			"Nombre_Cliente" => $_POST["Nombre_Cliente"],
			"id_Vendedor" => $id_Vendedor,
			"Nombre_Vendedor" => $Nombre_Vendedor,
			"NCF_cxc" => $NCF_607,
			"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
			"FechaDia_cxc" => $_POST["FechaFacturadia"], 
			"Dia_Credito_cxc" => $Dia_Credito_cxc, 
			"Moneda" => $Moneda,
			"Tasa" => $tasa,
			"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
			"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2),
			"Descuento"  => bcdiv($_POST["Descuento"], '1', 2), 
			"Total" => bcdiv($totalVenta, '1', 2),
			"ITBIS_Retenido" => bcdiv($_POST["Monto_ITBIS_Retenido"], '1', 2),
			"Retencion_Renta" => bcdiv($_POST["Monto_ISR_Retenido"], '1', 2),
			"Observaciones" => $_POST["Observaciones"],
			"Retenciones" => $_POST["Retencion"],
			"MontoCobrado" => 0,
			"Estado" => "PorCobrar");
			$respuesta = ModeloCXC::mdlIngresarcxc($tabla, $datos);

			}

}/*cierre cuentas por cobrar*/
else{

	$tabla = "cxc_empresas";
	$taCodigo = "Codigo";
	$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";
	$Codigo = $Codigo_Factura;
	$Rnc_Empresa_cxc = $Rnc_Empresa;

$CXC =  ModeloCXC::mdlMostarCXCFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa);

if($CXC["Rnc_Empresa_cxc"] == $Rnc_Empresa_cxc && $CXC["Codigo"] == $Codigo){


	$borrar = ModeloCXC::mdlBorrarCXC($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa);

}
}/*cierre cuentas por cobrar */

$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 


/***************************VALIDACVION CUENTAS CONTABLES******************************************/
if($_POST["Contabilidad"] == 1){ 

$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
$Rnc_Factura_607 = $_POST["RncClienteFactura"];



		$id_registro607 = $_POST["id_registro607"];
			
	

/****************************BORRAR LIBRO DIARIO*******************************/
$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $id_registro607;

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $Rnc_Empresa_607;

	$taExtraer = "Extraer_NAsiento";
	$Extraer = $_POST["ExtraerAsiento"];

	 
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_POST["RNCanteriror"];

	$taNCF = "NCF";
	$NCF = $NCFanterior;

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}


		/* borrar ret*/
	$taExtraer = "Extraer_NAsiento";
	$Extraer = "REI";

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

/******************************************************************************/

		if($_POST["proyecto"] == 0){
				$idproyecto = "NOAPLICA";
				$codproyecto = "NOAPLICA"; 

			}else{
				$tabla = "proyectos_empresas";
				$id = "id";
				$valorid = $_POST["proyecto"];
				
				$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
				$idproyecto = $_POST["proyecto"];
				$codproyecto = $respuesta["CodigoProyecto"]; 


			}

/************************************************************************************////*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////

$listaProductos =  json_decode($_POST["listaProductos"], true);

$cuentasproductos = [];	
$costoventa = 0;

foreach ($listaProductos as $pro => $value){
	
	/*establecer costo de venta*/
		if($value["tipoproducto"] == "1"){
			$costoventa = $costoventa + $value["preciocompra"];
			}
		/* fin establecer costo de venta*/



if($pro = 0){
	if($_POST["Moneda_Factura"] == "USD"){
	$cambioMoneda = $value["total"] * $tasa;
	$value["total"] = $cambioMoneda;

}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);


}else{

$variable = "DISTINTO";
	
foreach ($cuentasproductos as $key => $cuentas){

if($cuentas["idgrupo"] == $value["idgrupo"] && $cuentas["idcategoria"] == $value["idcategoria"] && $cuentas["idgenerica"] == $value["idgenerica"] && $cuentas["idcuenta"] == $value["idcuenta"]){

	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}

		$suma = $cuentas["credito"] + $value["total"];
		$cuentasproductos[$key]["credito"] = $suma;
		$variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);

}
}


}/*****cierre for de comparar cuentas********/


///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////
$NAsiento = $_POST["NAsiento"];

$Rnc_Factura_607 = $_POST["RncClienteFactura"];

foreach ($cuentasproductos as $key => $value) {

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = $_POST["ExtraerAsiento"];
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;

$idgrupo = $value["idgrupo"];
$idcategoria = $value["idcategoria"];
$idgenerica = $value["idgenerica"];
$idcuenta = $value["idcuenta"];
$nombrecuenta = $value["nombrecuenta"];
$debito = bcdiv($value["debito"], '1', 2);
$credito = bcdiv($value["credito"], '1', 2);
$ObservacionesLD = $value["ObservacionesLD"];

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }

/*******************************FIN VALIDACION CUENTAS CONTABLES***********************************/
if($_POST["nuevoMetodoPago"] == "04"){ 
	
	$totalVentas = $_POST["totalVenta"];
	if($_POST["Moneda_Factura"] == "USD"){
		$totalVentas = $_POST["totalVenta"] * $tasa;
	}

$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



}else{
	$totalVentas = $_POST["totalVenta"];

	if($_POST["Moneda_Factura"] == "USD"){
		$USDtotalVentas = $_POST["totalVenta"] * $tasa;
		$totalVentas = $USDtotalVentas;

	}
$tabla = "librodiario_empresas";


$ObservacionesLD = $_POST["Observaciones"];
$Extraer_NAsiento = $_POST["ExtraerAsiento"];
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }

if($_POST["nuevoPrecioImpuesto"] > 0){ 
	$nuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];
 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
	$nuevoPrecioImpuesto = $USDnuevoPrecioImpuesto;

	}

$idgrupo = "2";
$idcategoria = "4";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "ITBIS en ventas por pagar";
$debito = 0;
$credito = bcdiv($nuevoPrecioImpuesto, '1', 2);

$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}
			

if($_POST["Descuento"] > 0){
	$Descuento = $_POST["Descuento"];

 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDDescuento = $_POST["Descuento"] * $tasa;
	$Descuento = $USDDescuento;

	}
		$idgrupo = "4";
		$idcategoria = "8";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "descuentos en ventas";
		$debito = bcdiv($Descuento, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	

	}
if($costoventa > 0){ /*costos de ventas*/
 		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "005";
		$nombrecuenta = "costos de ventas";
		$debito = bcdiv($costoventa, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = 0;
		$credito = bcdiv($costoventa, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*costos de ventas*/
  

if($_POST["Retencion"] == 1){
	
	if($ITBIS_Retenido_Tercero_607 > 0){
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido en ventas N.02-05";
		$debito = bcdiv($ITBIS_Retenido_Tercero_607, '1', 2);;
		$credito = 0;
 

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"ObservacionesLD" => "Retenciones Factura ".$NCF_607,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
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

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"ObservacionesLD" => "Retenciones Factura ".$NCF_607,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


		

	}

}/*cierre retencion*/


	

 
}/*cierre if de contabilidad si la empresa tiene o no contabilidad*/

	
/*VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA */

			/************************************************
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			*************************************************/
			$tabla = "ventas_empresas";

				$id = "id";

				$valoridVenta = $_POST["idVenta"];

	$traerVenta = ModeloVentas::mdlMostrarVentaEditar($tabla, $id, $valoridVenta);

			/******************************************
			REVISAR SI VIENEN PRODUCTOS EDITADOS
			******************************************/
			$CambioProducto = false;

	

			if($_POST["CambiarInventario"] == "1"){
				$tablaProductos = "productos_empresas";
				$tablaProductos_2 = "productos_empresas";


			}else {
				$tablaProductos = "productos_activor_empresas";
				$tablaProductos_2 = "productos_activor_empresas";


			}

			if($_POST["listaProductos"] == ""){

				$listaProductos = $traerVenta["Producto"];
				$CambioProducto = false;


			}else{

				$listaProductos = $_POST["listaProductos"];
				$CambioProducto = true;

			}

			if($CambioProducto){




						$Productos =  json_decode($traerVenta["Producto"], true);

						$totalProductosComprados = array();


						foreach ($Productos as $key => $value) {

							array_push($totalProductosComprados, $value["cantidad"]);


							
								
							$id = "id";
							$valorid = $value["id"];

						$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

						$item1a = "Ventas";

						$valor1a = $traerProductos["Ventas"] - $value["cantidad"];

						$nuevasVentas = ModeloProductos::MdlActualizarProductoVentas($tablaProductos, $item1a, $valor1a, $id, $valorid);

						
						$item1b = "Stock";
						$valor1b = $value["cantidad"] + $traerProductos["Stock"];

						$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1b, $id, $valorid);

$tabla = "historico_productos_empresas";

$datos = array("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
	"NCF" => $NCF_607,
	"NAsiento" => $NAsiento);


	$eliminarhistorico = ModeloProductos::mdlEliminarhistoricoProductosVENTAS($tabla, $datos);


						}/*CIEERE FOREACH*/

						$tablaClientes = "clientes_empresas";

						$id = "id";

						$valorid = $_POST["agregarCliente"];

						$traeCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);

						$item = "Compras";
						$valor = $traeCliente["Compras"] - array_sum($totalProductosComprados);

					
						$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);

						/************************************************************************
						ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STCKO DE LAS VENTAS PRODUCTOS
					*************************************************************************/

					$listaProductos_2 =  json_decode($listaProductos, true);

					$totalProductosComprados_2 = array();


					
					foreach ($listaProductos_2 as $key => $value) {

						array_push($totalProductosComprados_2, $value["cantidad"]);



						
						$id_2 = "id";

						$valorid_2 = $value["id"];


						$traerProductos_2 = ModeloProductos::mdlMostrarProductosid_2($tablaProductos_2, $id_2, $valorid_2);

						

						$item1a_2 = "Ventas";

						$valor1a_2 = $value["cantidad"] + $traerProductos_2["Ventas"];

						$nuevasVentas_2 = ModeloProductos::MdlActualizarProductoVentas_2($tablaProductos_2, $item1a_2, $valor1a_2, $id_2, $valorid_2);

						$item1b_2 = "Stock";
						$valor1b_2 = $value["Stock"];

						$nuevoStock_2 = ModeloProductos::MdlActualizarProductoStock_2($tablaProductos_2, $item1b_2, $valor1b_2, $id_2, $valorid_2);

if($value["tipoproducto"] == "1"){
$tabla = "productos_empresas";
$id = "id";
$valoridProducto = $value["id"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];


$tabla = "historico_productos_empresas";
$Accion = "VENTA";

$datos = array ("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => "0", 
      "Precio_Venta" => $value["precio"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames"],
      "Fecha_dia" => $_POST["FechaFacturadia"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_607,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["nuevoVendedor"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);	
 }/*CIERRE DE IF TIPO PRODUCTO*/
					
					}/*CIERRO FOREACH*/

					$tablaClientes_2 = "clientes_empresas";

					$id_2 = "id";

					$valorid_2 = $_POST["agregarCliente"];

					$traeCliente_2 = ModeloClientes::mdlMostrarClientesid_2($tablaClientes_2, $id_2, $valorid_2);
					

					$item_2 = "Compras";
					$valor_2 = array_sum($totalProductosComprados_2) + $traeCliente_2["Compras"];

					
					$comprasCliente_2 =ModeloClientes::MdlActualizarClienteComprar_2($tablaClientes_2, $item_2, $valor_2, $id_2, $valorid_2);

						/*FECHA ULTIMA COMPRA CLIENTE */

					$item_2 = "Ultima_Compra";

					date_default_timezone_set('America/Santo_Domingo');

							$fecha_2 = date('Y-m-d');
							$hora_2 = date('H:i:s');
							$fechaActual_2 = $fecha_2.' '.$hora_2;

					$valor_2 = $fechaActual_2;

					
					$comprasCliente_2 =ModeloClientes::MdlActualizarClienteComprar_2($tablaClientes_2, $item_2, $valor_2, $id_2, $valorid_2);



			}/* CIERRE DE IF CAMBIO PRODUCTO*/

			/**********************************************
					editar	 LA COMPRA
			***********************************************/

			if($_POST["nuevoMetodoPago"] == "04"){
				$Estatus = "CREDITO";

			} else{
				
				$Estatus = "POR DEPOSITAR";

			}
if($_POST["Retencion"] == 1){ 

				$NAsientoRet = $NAsiento;
			 }else{

			 	$NAsientoRet = "";
			 }
$tabla = "ventas_empresas";
$Estado = 1;
			$datos = array("id" => $valoridVenta,
				"Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"], 
				"Codigo" => $_POST["editarVenta"],
				"Rnc_Cliente" => $_POST["RncClienteFactura"],
				"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
				"NCF_Factura" => $NCF_607,
				"FechaAnoMes" => $_POST["FechaFacturames"], 
				"FechaDia" => $_POST["FechaFacturadia"], 
				"id_Cliente" => $_POST["agregarCliente"], 
				"Correo_Cliente" => $_POST["nuevoEmail"],
				"id_Vendedor" => $_POST["idVendedor"], 
				"Nombre_Vendedor" => $Nombre_Vendedor, 
				"Producto" => $listaProductos, 
				"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
				"Pordescuento" => $_POST["nuevoporDescuento"],
				"Moneda" => $_POST["Moneda_Factura"],
				"Tasa" => $tasa,
				"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
				"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
				"Descuento" => bcdiv($_POST["Descuento"], '1', 2),
				"Total" => bcdiv($totalVenta, '1', 2), 
				"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
				"Referencia" => $_POST["listaMetodoPago"], 
				"Comision" => $_POST["Comision_Factura"], 
				"Estatus" => $Estatus,
				"Observaciones" => $_POST["Observaciones"],
				"id_Proyecto" => $idproyecto,
				"CodigoProyecto" => $codproyecto,
				"Retenciones" => $_POST["Retencion"],
				"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_607,
				"Porc_ISR_Retenido" => $Porc_ISR_Retenido_607,
				"ITBIS_Retenido_Tercero" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
				"RetencionRenta_por_Terceros" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
				"NAsiento" => $NAsiento,
				"NAsientoRET" => $NAsientoRet,
				"EXTRAER_NCF" => $_POST["NCFFactura"], 
				"Estado" => $Estado);

	$respuesta = ModeloVentas::mdlReciclarVenta($tabla, $datos);

			if($respuesta == "ok"){
				echo '<script>
swal({
	type: "success",
	title: "¡la Venta Se a Reciclado Correctamente!",
	showConfirmButton: true,
	confirmButtonText: "Cerrar",
	closeOnConfirm: false
		}).then((result)=>{

			if(result.value){
				window.location = "ventas";
			}

			});

</script>';


			



			}
	 	
	
	}/*CIERRE DE ISSET NUEVA VENTA*/


}/*CIERRE DE FUNCION CREAR VENTAS*/




	/**********************************************
			ELIMINAR VENTA
	***********************************************/

static public function ctrEliminarVenta(){

 if(isset($_GET["idVenta"])){



 	/**libro diario*/

$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_GET["idregistro607"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_GET["RncEmpresaVenta"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = $_GET["ExtrarNCF"];
	
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_GET["RNCFactura"];
	
	$taNCF = "NCF";
	$NCF = $_GET["NCF607"];

	
	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}
	$taExtraer = "Extraer_NAsiento";
	$Extraer = "RPC";
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}
	$taExtraer = "Extraer_NAsiento";
	$Extraer = "REI";
	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}
/*cierre libro diario*/

	$tabla = "ventas_empresas";
	$id = "id";
	$valoridVenta = $_GET["idVenta"];
	$traerVenta = ModeloVentas::mdlMostrarVentaEditar($tabla, $id, $valoridVenta);
	$guardarFechas = array();

	$id607para608 = $traerVenta["id_607"];

$Descripcionpara608 = $traerVenta["Observaciones"];
$Codigo608 = $traerVenta["Codigo"];
$Rnc_Cliente608 = $traerVenta["Rnc_Cliente"];
$Nombre_Cliente608 = $traerVenta["Nombre_Cliente"];
$id_Vendedor608 = $traerVenta["id_Vendedor"];
$Nombre_Vendedor608 = $traerVenta["Nombre_Vendedor"];
$Producto608 = $traerVenta["Producto"];
$Moneda608 = $traerVenta["Moneda"];
$Tasa608 = $traerVenta["Tasa"];
$Impuesto608 = $traerVenta["Impuesto"];
$Neto608 = $traerVenta["Neto"];
$Descuento608 = $traerVenta["Descuento"];
$Total608 = $traerVenta["Total"];

$NAsiento = $traerVenta["NAsiento"];
/******************************************
	ACTUALIZAR FECHA ÚLTIMA COMPRA
 ******************************************/
	$tablaClientes = "clientes_empresas";


	 $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];

	 $taRncEmpresaVenta = "Rnc_Empresa_Venta";

	 $traerVentas = ModeloVentas::mdlMostrarCodigoVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta);


	 foreach ($traerVentas as $key => $value) {

	 	if($value["id_Cliente"] == $traerVenta["id_Cliente"]){

	 		array_push($guardarFechas, $value["Fecha"]);
	 	
	 	}


	 }

	if(count($guardarFechas) > 1){

	 if($traerVenta["Fecha"] > $guardarFechas[count($guardarFechas)-2]){

	 		$id = "id";

$valorid = $traerVenta["id_Cliente"];

$item = "Ultima_Compra";
$valor = $guardarFechas[count($guardarFechas)-2];
		
$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);



	 	}else{

	 		$id = "id";

$valorid = $traerVenta["id_Cliente"];

$item = "Ultima_Compra";
$valor = $guardarFechas[count($guardarFechas)-1];
		
$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);


	 	}
 	

	}else{

	 		$id = "id";

$valorid = $traerVenta["id_Cliente"];

$item = "Ultima_Compra";
$valor = "0000-00-00 00:00:00";
		
$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);


	 }

	 /**************************************************
FORMATEAR TABLA DE PRODUCTOS
	 ***************************************************/
$Productos =  json_decode($traerVenta["Producto"], true);

$totalProductosComprados = array();


foreach ($Productos as $key => $value) {

	array_push($totalProductosComprados, $value["cantidad"]);


	$tablaProductos = "productos_empresas";

		
	$id = "id";
	$valorid = $value["id"];

	$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

$item1a = "Ventas";

$valor1a = $traerProductos["Ventas"] - $value["cantidad"];

$nuevasVentas = ModeloProductos::MdlActualizarProductoVentas($tablaProductos, $item1a, $valor1a, $id, $valorid);


$item1b = "Stock";
$valor1b = $value["cantidad"] + $traerProductos["Stock"];

$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1b, $id, $valorid);

$tabla = "historico_productos_empresas";

$datos = array("Rnc_Empresa_Productos" => $_GET["RncEmpresaVenta"],
	"NCF" => $_GET["NCF607"],
	"NAsiento" => $NAsiento);


$eliminarhistorico = ModeloProductos::mdlEliminarhistoricoProductosVENTAS($tabla, $datos);
}/*CIEERE FOREACH*/
$tablaClientes = "clientes_empresas";

$id = "id";

$valorid = $traerVenta["id_Cliente"];

$traeCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);

$item = "Compras";
$valor = $traeCliente["Compras"] - array_sum($totalProductosComprados);

		
$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);

/****************************
	ELIMINAR VENTA
******************************/
$tabla = "ventas_empresas";
$respuesta = ModeloVentas::mdlBorrarVenta($tabla, $id, $valoridVenta);

				
/****************************
	ELIMINAR VENTA CXC
******************************/

$tabla = "cxc_empresas";
$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";

$id = "Codigo";
$valoridVenta = $_GET["codigoVenta"];

$respuesta =  ModeloVentas::mdlBorrarVenta607CXC($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_Venta, $id, $valoridVenta);


/*crear 608*/

$tabla = "607_empresas";
$id_607 = "id";
$Valor_id607 = $id607para608;

$crear608 =  Modelo607::mdlMostrar607Retener($tabla, $id_607, $Valor_id607);

$Fecha_AnoMesDia_608  = $crear608["Fecha_AnoMesDia_607"];
$Estatus_608 = "";
$Accion_608 = "CREADO";
$Modulo = "FACTURA";
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
"Descripcion_608" => $Descripcionpara608,
"Codigo" => $Codigo608,
"Rnc_Cliente" => $Rnc_Cliente608,
"Nombre_Cliente" => $Nombre_Cliente608,
"id_Vendedor" => $id_Vendedor608,
"Nombre_Vendedor" => $Nombre_Vendedor608,
"Producto" => $Producto608,
"Moneda" => $Moneda608,
"Tasa" => $Tasa608,
"Impuesto" => $Impuesto608,
"Neto" => $Neto608,
"Descuento" => $Descuento608,
"Total" => $Total608,
"Usuario_Creador" => $_SESSION["Nombre"],
"Accion_608" => $Accion_608,
"Modulo" => $Modulo,
"Estatus" => $Estatus);

$respuesta =  Modelo608::MdlRegistrar608Ventas($tabla, $datos);

/****************************
	ELIMINAR VENTA 607
******************************/
$tabla = "607_empresas";
$taRnc_Empresa_cxc = "Rnc_Empresa_607";

$id = "Codigo_Factura";
$valoridVenta = $_GET["codigoVenta"];
$respuesta =  ModeloVentas::mdlBorrarVenta607CXC($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_Venta, $id, $valoridVenta);


			
				if($respuesta == "ok"){

							echo '<script>
					swal({
						type: "success",
						title: "¡La venta ha sido Borrada Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "ventas";
								}

								});

					</script>';


						}



		}/*CIERRE DE ISSET $_GET["idVenta"]*/


	}/*Cierre FUNCCION DE BORRAR VENTA*/
	static public function ctrEliminarVentaRecurrente(){

 if(isset($_GET["idVentaRecurrente"])){

 	/**libro diario*/


	

	$tabla = "ventasrecurrentes_empresas";
	$id = "id";
	$valoridVenta = $_GET["idVentaRecurrente"];
	
	
$respuesta = ModeloVentas::mdlBorrarVenta($tabla, $id, $valoridVenta);



			
				if($respuesta == "ok"){

							echo '<script>
					swal({
						type: "success",
						title: "¡La venta Recurrente ha sido Borrada Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "ventasrecurrentes";
								}

								});

					</script>';


						}



		}/*CIERRE DE ISSET $_GET["idVenta"]*/


	}/*Cierre FUNCCION DE BORRAR VENTA*/
	/*********************************************************
				MOSTAR VENTAS IMPRIMIR FACTURA

	************************************************************/


	static public function ctrMostrarVentaImprimirFactura($id, $valorCodigo){

		$tabla = "ventas_empresas";
		

		$respuesta = ModeloVentas::mdlMostrarImprimirFactura($tabla, $id, $valorCodigo);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/

	/***********************************
			RANGO DE FECHA
	************************************/
	static public function ctrRangoVentasMetodopago($Rnc_Empresa_Venta, $Metododepago){

		$tabla = "ventas_empresas";
		$taRncEmpresaVenta = "Rnc_Empresa_Venta";
		$taMetodo_Pago = "Metodo_Pago";


	$respuesta = ModeloVentas::mdlRangoVentasMetodopago($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $taMetodo_Pago, $Metododepago);

		return $respuesta;


	}


	static public function ctrRangoFechasVentas($Rnc_Empresa_Venta, $fechaInicial, $fechaFinal){

		$tabla = "ventas_empresas";
		$taRncEmpresaVenta = "Rnc_Empresa_Venta";


		$respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);

		return $respuesta;



	}
	static public function ctrRangoFechasVentasRecurrentes($Rnc_Empresa_Venta, $fechaInicial, $fechaFinal){

		$tabla = "ventasrecurrentes_empresas";
		$taRncEmpresaVenta = "Rnc_Empresa_Venta";


		$respuesta = ModeloVentas::mdlRangoFechasVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);

		return $respuesta;



	}

	/****************************
		MOSTRAR VENTs REPORTES
	*****************************/


	static public function ctrMostrarVentasReporte($Rnc_Empresa_Venta){

		$tabla = "ventas_empresas";
		$taRncEmpresaVenta = "Rnc_Empresa_Venta";

		$respuesta = ModeloVentas::mdlMostrarVentasReportes($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/
	static public function ctrMostrarVentasReporteCliente($Rnc_Empresa_cxc, $Rnc_Cliente){

		$tabla = "cxc_empresas";
		$taRncEmpresacxc = "Rnc_Empresa_cxc";
		$taRnc_Cliente = "Rnc_Cliente";

		$respuesta = ModeloVentas::mdlMostrarVentasReportesCliente($tabla, $taRncEmpresacxc, $taRnc_Cliente, $Rnc_Empresa_cxc, $Rnc_Cliente);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/

	/**************************
			DESCARGAR EXCEL
	***************************/

	static public function ctrDescargarReporte(){

		if(isset($_GET["reporte"])){

			$tabla = "ventas_empresas";
			$taRncEmpresaVenta = "Rnc_Empresa_Venta";
			$Rnc_Empresa_Venta = $_GET["Rnc_Empresa_Venta"];


			if (isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])) {

				$fechaInicial = $_GET["fechaInicial"];
				$fechaFinal = $_GET["fechaFinal"];


				$ventas = ModeloVentas::mdlRangoFechasVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);



			} else {

				$ventas = ModeloVentas::mdlMostrarVentasReportes($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta);




			}

				/*CREAMOS UN ARCHIVO DE EXCEL*/

				$Name = $_GET["reporte"].$Rnc_Empresa_Venta.'.xls';

				
			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'> 

				

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>CÓDIGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NCF</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CLIENTE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>VENDEDOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA AÑO/MES</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DÍA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>
					<td style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>IMPUESTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>NETO</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>		
					<td style='font-weight:bold; border:1px solid #eee;'>METODO DE PAGO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>REFERENCIA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>OBSERVACIONES</td>	
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EXTRAER NCF</td>				
					</tr>");

			foreach ($ventas as $key => $item) {

				$id = "id";
				$valorid = $item["id_Cliente"]; 
				$idUsuario = $item["id_Vendedor"];


				$cliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);
				$vendedor = ControladorUsuarios::ctrModalEditarUsuario($id, $idUsuario);

				echo utf8_decode("<tr>

					<td style='border:1px solid #eee;'>".$item["Codigo"]."</td>
					<td style='border:1px solid #eee;'>".$item["NCF_Factura"]."</td>
					<td style='border:1px solid #eee;'>".$cliente["Nombre_Cliente"]."</td>
					<td style='border:1px solid #eee;'>".$vendedor["Nombre"]."</td>
					<td style='border:1px solid #eee;'>".$item["FechaAnoMes"]."</td>
					<td style='border:1px solid #eee;'>".$item["FechaDia"]."</td>
					<td style='border:1px solid #eee;'>");

					$productos = json_decode($item["Producto"], true);

					foreach ($productos as $key => $valueProductos) {

						echo utf8_decode($valueProductos["cantidad"]."<br>");

						
						}

						echo utf8_decode("</td><td style='border:1px solid #eee;'>");
						foreach ($productos as $key => $valueProductos) {

						echo utf8_decode($valueProductos["descripcion"]."<br>");

						
						}

						echo utf8_decode("</td>
							<td style='border:1px solid #eee;'>$".number_format($item["Impuesto"],2)."</td>
							<td style='border:1px solid #eee;'>$".number_format($item["Neto"],2)."</td>
							<td style='border:1px solid #eee;'>$".number_format($item["Total"],2)."</td>
							<td style='border:1px solid #eee;'>".$item["Metodo_Pago"]."</td>
							<td style='border:1px solid #eee;'>".$item["Referencia"]."</td>
							<td style='border:1px solid #eee;'>".$item["Observaciones"]."</td>
							<td style='border:1px solid #eee;'>".substr($item["Fecha"],0,10)."</td>
							<td style='border:1px solid #eee;'>".$item["EXTRAER_NCF"]."</td>
							</tr>");
				
			}

			echo "</table>";



		}





	}

	/***********************************************
		SUMA TOTAL VENTAS
	************************************************/


	static public function ctrSumaTotalVentas($Rnc_Empresa_Venta, $periodo){

		$tabla = "607_empresas";
		$taRncEmpresaVenta = "Rnc_Empresa_607";

		$respuesta = ModeloVentas::mdlSumaTotalVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $periodo);

		return $respuesta;


	}/*CIERRE FUNCION SUMA TOTAL VENTAS*/
	static public function ctrSumaTotalGastos($Rnc_Empresa_Venta, $periodo){

		$tabla = "606_empresas";
		$taRncEmpresaVenta = "Rnc_Empresa_606";

		$respuesta = ModeloVentas::mdlSumaTotalGastos($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $periodo);

		return $respuesta;


	}/*CIERRE FUNCION SUMA TOTAL VENTAS*/

static public function ctrcargamasivadeposito(){

	if(isset($_POST["RncDeposito"])){ 

		if(empty($_POST["listadeposito"])){

				echo '<script>
								swal({
									type: "error",
									title: "DEBE TENER POR LO MENOS UN ASIENTO DIARIO REGISTRADO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
									}).then((result)=>{

										if(result.value){
											window.location = "cargamasivacontado";
										}

											});

								</script>';
					exit;

				
			}

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaPagomes"], 0, 4);
	$fechames = substr($_POST["FechaPagomes"], -2);

	if(strlen($_POST["FechaPagomes"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "cargamasivacontado";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano <= 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "cargamasivacontado";
													
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
									window.location = "cargamasivacontado";
													
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
									window.location = "cargamasivacontado";
													
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
									window.location = "cargamasivacontado";
													
													});
												
								</script>';	
					exit;
	}

/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaPagodia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "cargamasivacontado";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaPagodia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "cargamasivacontado";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaPagodia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "cargamasivacontado";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	$NAsiento = "";

 

if($_POST["Contabilidad"] == 1){

$Rnc_Empresa_Diario = $_POST["RncDeposito"];
$tipocod = "RPG";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "RPG".$N;


}else{
	
	$Rnc_Empresa = $_POST["RncDeposito"];
                
	$Tipo_NCF = "RPG";

	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


if($respuesta == false){
	$N = 1;
    $NAsiento = "RPG".$N;


} else{ 
 	$N = $respuesta["NCF_Cons"]+1;
    $NAsiento = "RPG".$N;

   }

}

	$Rnc_Empresa_Venta = $_POST["RncDeposito"];
	$listadeposito =  json_decode($_POST["listadeposito"], true);
	$Rnc_Empresa_Diario = $Rnc_Empresa_Venta;
	
   
   

	foreach ($listadeposito as $key => $value){
		$tabla = "ventas_empresas";
		$Rnc_Factura = $value["rncCliente"];
		$NCF = $value["nCFFactura"];
		$Estatus = "DEPOSITADO";


	/***************************Estatus venta*****************************/
		$datos = array("Rnc_Empresa_Venta" => $Rnc_Empresa_Venta,
				   "Rnc_Cliente" => $Rnc_Factura, 
				   "NCF_Factura" => $NCF,
				   "Estatus" => $Estatus);


	$respuesta = ModeloVentas::mdlEditarEstatusVenta($tabla, $datos);
	$tabla = "607_empresas";
			$taRnc_Empresa_607 = "Rnc_Empresa_607";
			$Rnc_Empresa_607 = $Rnc_Empresa_Venta;
			$taRnc_Factura_607 = "Rnc_Factura_607";
			$Rnc_Factura_607 = $Rnc_Factura;
			$taNCF_607 = "NCF_607";
			$NCF_607 =  $NCF;

			$Consulta607 = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);


			if($Consulta607 != false && $Consulta607["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $Consulta607["Rnc_Factura_607"] == $Rnc_Factura_607 && $Consulta607["NCF_607"] == $NCF_607){

			
			$id_registro607 = $Consulta607["id"];
			$nombreCliente = $Consulta607["Nombre_Empresa_607"];
			
			}
		

	/***************************Cierre estatus*****************************/
	/**************************RETENER 607***************************/
	if($value["iTBISRetenido"] != 0 || $value["iSRRetenido"] != 0){ 

			

		date_default_timezone_set('America/Santo_Domingo');

		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;

		$Fecha_Registro = $fechaActual;

		$Accion_607 = "Retener";
		$Fecha_Ret_AnoMesDia_607 = $_POST["FechaPagomes"].$_POST["FechaPagodia"];

		$datos = array("id" => $id_registro607, 
			"Usuario_Creador" => $_POST["UsuarioDeposito"], 
			"Fecha_Registro" => $Fecha_Registro, 
			"Accion_607" => $Accion_607, 
			"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607, 
			"Fecha_Retencion_AnoMes_607" => $_POST["FechaPagomes"], 
			"Fecha_Retencion_Dia_607" => $_POST["FechaPagodia"],  
			"ITBIS_Retenido_Tercero_607" => $value["valoritbisret"], 
			"Retencion_Renta_por_Terceros_607" => $value["valorisrret"], 
			"Porc_ITBIS_Retenido_607" => $value["iTBISRetenido"], 
			"Porc_ISR_Retenido_607" => $value["iSRRetenido"]);

		$respuesta = Modelo607::MdlAgregarretencion607($tabla, $datos);

	}/*CIERRE RETENER*/
/**************************RETENER 607***************************/

	$idproyecto = $value["idProyecto"];
	$codproyecto = $value["codigoProyecto"]; 


$tabla = "librodiario_empresas";
$ObservacionesLD =  "RECIBO DE PAGO";
$Extraer_NAsiento = "RPG";
$Accion = "RECIBO DE PAGO";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = 0;
$credito = bcdiv($value["totalFac"], '1', 2);
		
$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

if($value["iTBISRetenido"] != 0){
$idgrupo = "1";
$idcategoria = "3";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "ITBIS retenido en ventas N.02-05";
$debito =  bcdiv($value["valoritbisret"], '1', 2);
$credito = 0;
		
$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}
if($value["iSRRetenido"] != 0){
$idgrupo = "1";
$idcategoria = "3";
$idgenerica = "02";
$idcuenta = "001";
$nombrecuenta = "ISR Retenido en Ventas";
$debito =  bcdiv($value["valorisrret"], '1', 2);
$credito = 0;
		
$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}
}/*cierre foreach */

if(isset($_POST["Metododepago"]) && $_POST["Metododepago"] == "03"){
	if($_POST["totalcomisioncobro"]){
$tabla = "banco_empresas";
$id = "id";
$valorid = $_POST["agregarBanco"];

$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
$NombreBanco = $banco["Nombre_Cuenta"];

$tabla = "librodiario_empresas";

$idbanco = $_POST["agregarBanco"];
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "07";
$idcuenta = "001";
$nombrecuenta = "suscripcion punto de venta";
$debito = bcdiv($_POST["totalcomisioncobro"], '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Empresa_Venta,
					"NCF" => $NAsiento,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}
if($_POST["otrosimpuestos"]){
		$tabla = "banco_empresas";
$id = "id";
$valorid = $_POST["agregarBanco"];

$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
$NombreBanco = $banco["Nombre_Cuenta"];

$tabla = "librodiario_empresas";

$idbanco = $_POST["agregarBanco"];
$idgrupo = "1";
$idcategoria = "3";
$idgenerica = "01";
$idcuenta = "003";
$nombrecuenta = "impuesto norma 804";
$debito = bcdiv($_POST["totalotrosimpuestos"], '1', 2);
$credito = 0;

$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Empresa_Venta,
					"NCF" => $NAsiento,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		
	}


}

$tabla = "banco_empresas";
$id = "id";
$valorid = $_POST["agregarBanco"];

$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
$NombreBanco = $banco["Nombre_Cuenta"];

$tabla = "librodiario_empresas";

$idbanco = $_POST["agregarBanco"];
$idgrupo = $banco["id_grupo"];
$idcategoria = $banco["id_categoria"];
$idgenerica = $banco["id_generica"];
$idcuenta = $banco["id_cuenta"];
$nombrecuenta = $banco["Nombre_CuentaContable"];
$debito = bcdiv($_POST["deposito"], '1', 2);
$credito = 0;

$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Empresa_Venta,
					"NCF" => $NAsiento,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


$tabla = "correlativos_no_fiscal";

$Tipo_NCF = "RPG";
			
$datos = array("Rnc_Empresa" => $Rnc_Empresa_Venta,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);  


/************CERRAR ACTUALIZAR CXC ****************/
/****************************pagos *************************************/
$listadeposito = json_decode($_POST["listadeposito"], true);
foreach ($listadeposito as $key2 => $value) {
$tabla = "ventas_empresas";
$Estado = 2;
				
$datos = array("Rnc_Empresa_Venta" => $Rnc_Empresa_Venta,
"id" => $value["id"],
"Rnc_Cliente" => $value["rncCliente"],
"NCF_Factura" => $value["nCFFactura"],
"Estado" => $Estado);
					
          
  $bloqueo = ModeloVentas::mdlActualizarVentaContado($tabla, $datos);



 }/*cierre for de pagos*/
 
$tabla = "reciboventascontado_empresas";
$Modulo = "recibodeventascontado";
$Accion = "CREADO";
 $datos = array("Rnc_Empresa_VentaContado" => $Rnc_Empresa_Venta,
"NAsiento" => $NAsiento,
"Metododepago" => $_POST["Metododepago"],
"FechaAnoMes" => $_POST["FechaPagomes"],	
"FechaDia" => $_POST["FechaPagodia"],	
"Facturas" => $_POST["listadeposito"],
"Tipodiferencia" => "0",
"Subdeposito" => bcdiv($_POST["subdeposito"], '1', 2),	
"Deposito" =>bcdiv($_POST["deposito"], '1', 2),
"Referencia" => $_POST["Referencia"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],
"Modulo" => $Modulo,
"banco" => $NombreBanco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto,
"Accion" => $Accion);

$respuesta = ModeloVentas::mdlReciboVentasContado($tabla, $datos);



	
if($respuesta == "ok"){

	if($_POST["Contabilidad"] == 1){
		echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>¡El Deposito Se Registro Correctamente!</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "cargamasivacontado";
		}

		});

</script>';	



	}else{

											echo '<script>
										swal({
											type: "success",
											title: "¡El Deposito Se Registro Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "cargamasivacontado";
													}

													});

										</script>';



	}



				}


}/*cierre isset*/
}/**cierre funcion**/

static public function ctreditarcargamasivadeposito(){

	if(isset($_POST["idventascontado"])){ 

		if(empty($_POST["listadeposito"])){

				echo '<script>
								swal({
									type: "error",
									title: "DEBE TENER POR LO MENOS UN ASIENTO DIARIO REGISTRADO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
									}).then((result)=>{

										if(result.value){
											window.location = "detallerecibodedeposito";
										}

											});

								</script>';
					exit;

				
			}

	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechaPagomes"], 0, 4);
	$fechames = substr($_POST["FechaPagomes"], -2);

	if(strlen($_POST["FechaPagomes"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodedeposito";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano <= 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodedeposito";
													
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
									window.location = "detallerecibodedeposito";
													
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
									window.location = "detallerecibodedeposito";
													
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
									window.location = "detallerecibodedeposito";
													
													});
												
								</script>';	
					exit;
	}

/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaPagodia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "detallerecibodedeposito";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaPagodia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodedeposito";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaPagodia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "detallerecibodedeposito";
													
													});
												
								</script>';	
					exit;
	}

/**********FIN VALIDACION FECHA DIA ******************************/

/*************BORRAR ANTES****************************************/


$id = "id";  
$idventascontado = $_POST["idventascontado"];

$ventascontado = ControladorVentas::ctrEditarReciboDeposito($id, $idventascontado);

$ventascontadoAntes = json_decode($ventascontado["Facturas"], true); 

foreach ($ventascontadoAntes as $key => $value) { 

$tabla = "ventas_empresas";
$Estado = 1;
				
$datos = array("Rnc_Empresa_Venta" => $_POST["RncDeposito"],
"id" => $value["id"],
"Rnc_Cliente" => $value["rncCliente"],
"NCF_Factura" => $value["nCFFactura"],
"Estado" => $Estado);
					
          
  $bloqueo = ModeloVentas::mdlActualizarVentaContado($tabla, $datos);
	
	$tabla = "librodiario_empresas";
	
	
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_POST["RncDeposito"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "RPG";

	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	
$respuesta = ModeloDiario::mdlBorrarReciboVentascontado($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key1 => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}


 }


$NAsiento = $_POST["NAsiento"];

 

if($_POST["Contabilidad"] == 1){

$Rnc_Empresa_Venta = $_POST["RncDeposito"];
$listadeposito =  json_decode($_POST["listadeposito"], true);
$Rnc_Empresa_Diario = $Rnc_Empresa_Venta;


foreach ($listadeposito as $key => $value){


		$tabla = "ventas_empresas";
		$Rnc_Factura = $value["rncCliente"];
		$NCF = $value["nCFFactura"];
		$Estatus = "DEPOSITADO";


	/***************************Estatus venta*****************************/
		$datos = array("Rnc_Empresa_Venta" => $Rnc_Empresa_Venta,
				   "Rnc_Cliente" => $Rnc_Factura, 
				   "NCF_Factura" => $NCF,
				   "Estatus" => $Estatus);


	$respuesta = ModeloVentas::mdlEditarEstatusVenta($tabla, $datos);
	$tabla = "607_empresas";
			$taRnc_Empresa_607 = "Rnc_Empresa_607";
			$Rnc_Empresa_607 = $Rnc_Empresa_Venta;
			$taRnc_Factura_607 = "Rnc_Factura_607";
			$Rnc_Factura_607 = $Rnc_Factura;
			$taNCF_607 = "NCF_607";
			$NCF_607 =  $NCF;

			$Consulta607 = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);


			if($Consulta607 != false && $Consulta607["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $Consulta607["Rnc_Factura_607"] == $Rnc_Factura_607 && $Consulta607["NCF_607"] == $NCF_607){

			
			$id_registro607 = $Consulta607["id"];
			$nombreCliente = $Consulta607["Nombre_Empresa_607"];
			
			}
		

	/***************************Cierre estatus*****************************/
	/**************************RETENER 607***************************/
	if($value["iTBISRetenido"] != 0 || $value["iSRRetenido"] != 0){ 

			

		date_default_timezone_set('America/Santo_Domingo');

		$fecha = date('Y-m-d');
		$hora = date('H:i:s');
		$fechaActual = $fecha.' '.$hora;

		$Fecha_Registro = $fechaActual;

		$Accion_607 = "Retener";
		$Fecha_Ret_AnoMesDia_607 = $_POST["FechaPagomes"].$_POST["FechaPagodia"];

		$datos = array("id" => $id_registro607, 
			"Usuario_Creador" => $_POST["UsuarioDeposito"], 
			"Fecha_Registro" => $Fecha_Registro, 
			"Accion_607" => $Accion_607, 
			"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607, 
			"Fecha_Retencion_AnoMes_607" => $_POST["FechaPagomes"], 
			"Fecha_Retencion_Dia_607" => $_POST["FechaPagodia"],  
			"ITBIS_Retenido_Tercero_607" => $value["valoritbisret"], 
			"Retencion_Renta_por_Terceros_607" => $value["valorisrret"], 
			"Porc_ITBIS_Retenido_607" => $value["iTBISRetenido"], 
			"Porc_ISR_Retenido_607" => $value["iSRRetenido"]);

		$respuesta = Modelo607::MdlAgregarretencion607($tabla, $datos);

	}/*CIERRE RETENER*/
/**************************RETENER 607***************************/
$idproyecto = $value["idProyecto"];
	$codproyecto = $value["codigoProyecto"]; 


$tabla = "librodiario_empresas";
$ObservacionesLD =  "RECIBO DE PAGO";
$Extraer_NAsiento = "RPG";
$Accion = "RECIBO DE PAGO";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = 0;
$credito = bcdiv($value["totalFac"], '1', 2);
		
$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

if($value["iTBISRetenido"] != 0){
$idgrupo = "1";
$idcategoria = "3";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "ITBIS retenido en ventas N.02-05";
$debito =  bcdiv($value["valoritbisret"], '1', 2);
$credito = 0;
		
$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}
if($value["iSRRetenido"] != 0){
$idgrupo = "1";
$idcategoria = "3";
$idgenerica = "02";
$idcuenta = "001";
$nombrecuenta = "ISR Retenido en Ventas";
$debito =  bcdiv($value["valorisrret"], '1', 2);
$credito = 0;
		
$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura,
					"NCF" => $NCF,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}

} /*FORECH*/
 if(isset($_POST["Metododepago"]) && $_POST["Metododepago"] == "03"){
	if($_POST["totalcomisioncobro"]){
$tabla = "banco_empresas";
$id = "id";
$valorid = $_POST["agregarBanco"];

$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
$NombreBanco = $banco["Nombre_Cuenta"];

$tabla = "librodiario_empresas";

$idbanco = $_POST["agregarBanco"];
$idgrupo = "6";
$idcategoria = "1";
$idgenerica = "07";
$idcuenta = "001";
$nombrecuenta = "suscripcion punto de venta";
$debito = bcdiv($_POST["totalcomisioncobro"], '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Empresa_Venta,
					"NCF" => $NAsiento,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}
if($_POST["otrosimpuestos"]){
		$tabla = "banco_empresas";
$id = "id";
$valorid = $_POST["agregarBanco"];

$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
$NombreBanco = $banco["Nombre_Cuenta"];

$tabla = "librodiario_empresas";

$idbanco = $_POST["agregarBanco"];
$idgrupo = "1";
$idcategoria = "3";
$idgenerica = "01";
$idcuenta = "003";
$nombrecuenta = "impuesto norma 804";
$debito = bcdiv($_POST["totalotrosimpuestos"], '1', 2);
$credito = 0;

$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Empresa_Venta,
					"NCF" => $NAsiento,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		
	}


}

$tabla = "banco_empresas";
$id = "id";
$valorid = $_POST["agregarBanco"];

$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
$NombreBanco = $banco["Nombre_Cuenta"];

$tabla = "librodiario_empresas";

$idbanco = $_POST["agregarBanco"];
$idgrupo = $banco["id_grupo"];
$idcategoria = $banco["id_categoria"];
$idgenerica = $banco["id_generica"];
$idcuenta = $banco["id_cuenta"];
$nombrecuenta = $banco["Nombre_CuentaContable"];
$debito = bcdiv($_POST["deposito"], '1', 2);
$credito = 0;

$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Venta,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Empresa_Venta,
					"NCF" => $NAsiento,
					"Nombre_Empresa" => $nombreCliente ,
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaPagomes"],
					"Fecha_dia_LD" => $_POST["FechaPagodia"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaPagomes"],
					"Fecha_dia_Trans" => $_POST["FechaPagodia"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioDeposito"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
} /*CIERRE CONTABILIDAD*/
/****************************pagos *************************************/
$listadeposito = json_decode($_POST["listadeposito"], true);
foreach ($listadeposito as $key2 => $value) {
$tabla = "ventas_empresas";
$Estado = 2;
				
$datos = array("Rnc_Empresa_Venta" => $Rnc_Empresa_Venta,
"id" => $value["id"],
"Rnc_Cliente" => $value["rncCliente"],
"NCF_Factura" => $value["nCFFactura"],
"Estado" => $Estado);
					
          
  $bloqueo = ModeloVentas::mdlActualizarVentaContado($tabla, $datos);



 }/*cierre for de pagos*/
 
$tabla = "reciboventascontado_empresas";
$Modulo = "recibodeventascontado";
$Accion = "EDITADO";
 $datos = array("id" => $_POST["idventascontado"],
"Rnc_Empresa_VentaContado" => $Rnc_Empresa_Venta,
"NAsiento" => $NAsiento,
"Metododepago" => $_POST["Metododepago"],
"FechaAnoMes" => $_POST["FechaPagomes"],	
"FechaDia" => $_POST["FechaPagodia"],	
"Facturas" => $_POST["listadeposito"],
"Tipodiferencia" => "0",
"Subdeposito" => bcdiv($_POST["subdeposito"], '1', 2),	
"Deposito" =>bcdiv($_POST["deposito"], '1', 2),
"Referencia" => $_POST["Referencia"],
"EntidadBancaria" => $idbanco,
"Descripcion" => $_POST["Observaciones"],
"Modulo" => $Modulo,
"banco" => $NombreBanco,
"id_Proyecto" => $idproyecto,
"CodigoProyecto" => $codproyecto,
"Accion" => $Accion);

$respuesta = ModeloVentas::mdlEditarReciboVentasContado($tabla, $datos);



if($respuesta == "ok"){

	if($_POST["Contabilidad"] == 1){
		echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>¡El Deposito Se Registro Correctamente!</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "cargamasivacontado";
		}

		});

</script>';	



	}else{

											echo '<script>
										swal({
											type: "success",
											title: "¡El Deposito Se Registro Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "cargamasivacontado";
													}

													});

										</script>';



	}



}


}/*cierre isset*/
}/**cierre funcion**/


static public function ctrMostrarVentasProductos($Rnc_Empresa_Venta, $FechaDesde, $FechaHasta, $Orden){
		$tabla = "ventas_empresas";
		$taRnc_Empresa_Venta = "Rnc_Empresa_Venta";
		$taFecha = "FechaAnoMes";
	
		$respuesta = ModeloVentas::mdlMostrarVentasProductos($tabla, $taRnc_Empresa_Venta, $Rnc_Empresa_Venta, $taFecha, $FechaDesde, $FechaHasta, $Orden);

		return $respuesta;


	}

static public function ctrAgregarretencionVentas(){
	
	if(isset($_POST["id_607_Retener"])){

		$url = $_SERVER["REQUEST_URI"];
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
		
	}

}
 

}/*CIERRE SI ISSET*/

}/*CIERRE FUNCION DE CTRAGREGARRETENCION606*/


/***********************************************************************************/
/***********************************************************************************/
/*CREAR VENTAS POS CREAR VENTAS POS CREAR VENTAS POS CREAR VENTAS POS CREAR VENTAS */
/***********************************************************************************/
/***********************************************************************************/


static public function ctrCrearVentaPos(){

	if(isset($_POST["nuevaVenta"])){



$_SESSION["FechaFacturames"] = $_POST["FechaFacturames"];
$_SESSION["FechaFacturadia"] = $_POST["FechaFacturadia"];
$_SESSION["Comision_Factura"] = $_POST["Comision_Factura"];
$_SESSION["NCFFactura"] = $_POST["NCFFactura"];
$_SESSION["Tipo_Cliente_Factura"] = $_POST["Tipo_Cliente_Factura"];
$_SESSION["nuevoMetodoPago"] = $_POST["nuevoMetodoPago"];

if($_POST["NCFFactura"] == "B02"){
	$_SESSION["agregarCliente"] = $_POST["agregarCliente"];
	$_SESSION["RncClienteFactura"] = $_POST["RncClienteFactura"];
	$_SESSION["Nombre_Cliente"] = $_POST["Nombre_Cliente"];


}else{
	unset($_SESSION["agregarCliente"]);
	unset($_SESSION["RncClienteFactura"]);
	unset($_SESSION["Nombre_Cliente"]);


}

	/*CARGA DE CLIENTES DE TABLA GROWIN_DGII*/
		$tabla = "growin_dgii";
		$taRnc_Growin_DGII = "Rnc_Growin_DGII";
		$ValorRnc_Growin_DGII = $_POST["RncClienteFactura"];
		$ValorNombreGrowin_DGII = $_POST["Nombre_Cliente"];
		$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

		if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
			$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

			$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

		}
	/*CIERRE  DE CARGA GROWIN DGII*/

	/************************************************
			INICIO 607
	*************************************************/
		
	/****VALIDACION QUE LA FACUTRA NO SE REPITA****/

				$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Empresa_607";
				$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["RncClienteFactura"];
				$taNCF_607 = "NCF_607";

				$NCFFactura = $_POST["NCFFactura"];
				$CodigoNCF = $_POST["CodigoNCF"];
				
				$NCF_607 = $NCFFactura.$CodigoNCF;

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
												window.location = "crear-pos";
											}

											});

								</script>';



			exit;

		} 
		/************************VALIDACION 608***************************/
		$tabla = "608_empresas";
		$taRnc_Empresa_608 = "Rnc_Empresa_608";
		$Rnc_Empresa_608 = $_POST["RncEmpresaVentas"];
		$taNCF_608 = "NCF_608";
		$NCF_608 = $NCF_607;

$FacturaRepetida608 = Modelo608::MdlfacturaRepetida608($tabla, $taRnc_Empresa_608, $Rnc_Empresa_608, $taNCF_608, $NCF_608);

if($FacturaRepetida608 != false && $FacturaRepetida608["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida608["NCF_608"] == $NCF_608 && $FacturaRepetida608["Estatus"] != "2"){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 608 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-pos";
											}

											});

								</script>';


		exit;

}
if($FacturaRepetida608 != false && $FacturaRepetida608["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida608["NCF_608"] == $NCF_608 && $FacturaRepetida608["Estatus"] == "2"){
$tabla = "608_empresas";
$id = "id";
$id_608 = $FacturaRepetida608["id"];

$respuesta = Modelo608::mdlBorrar608($tabla, $id, $id_608);
		
 }
 $tabla = "607_empresas";
 /************************FIN VALIDACION 608***************************/
		/************************lista de productos***************************/
		if(empty($_POST["listaProductos"]) || $_POST["listaProductos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PRODUCTO A LA VENTA!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-pos";
													}

													});

										</script>';
								exit;

				
			}

			$listaProductos =  json_decode($_POST["listaProductos"], true);

		foreach ($listaProductos as $key => $value) {

			if($value["idgrupo"] == "" || $value["idcategoria"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-pos";
													}

													});

										</script>';
								exit;



			}

			if($value["tipoproducto"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, el Tipo de producto no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-pos";
													}

													});

										</script>';
								exit;



			}


			
			// code...
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
									window.location = "crear-pos";
													
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
									window.location = "crear-pos";
													
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
									window.location = "crear-pos";
													
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
									window.location = "crear-pos";
													
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
									window.location = "crear-pos";
													
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
						window.location = "crear-pos";
													
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
									window.location = "crear-pos";
													
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
									window.location = "crear-pos";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
			
/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Cliente_Factura"] == 1 && strlen($_POST["RncClienteFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente_Factura"] == 2 && strlen($_POST["RncClienteFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/
/*******INICIO VALIDACION DE NCF*****/
if(isset($_POST["CodigoNCFanterior"])){ 
	if($_POST["CodigoNCF"] > $_POST["CodigoNCFanterior"]){
		echo '<script>
								swal({

									type: "error",
									title: "El Codigo de NCF no Puede ser mayor al que corresponde, si desea modificarlo debe ser menor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos";
								});

	
								</script>';
				exit;
	}
	}
	if(isset($_POST["CodigoNCFanterior"])){ 
	if($_POST["CodigoNCF"] == $_POST["CodigoNCFanterior"]){
		echo '<script>
								swal({

									type: "error",
									title: "Para este correlativo de NCF NO DEBE habilitar el checklist que esta al lado del campo numerico del NCF",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventas";
								});

	
								</script>';
				exit;
	}
	}

	if(substr($NCF_607, 0, 1) == "B" && strlen($NCF_607) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos";
								});

	
								</script>';
				exit;
	}
	if(substr($NCF_607, 0, 1) == "E" && strlen($NCF_607) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
                   

$Monto_Facturado_607 = $_POST["nuevoPrecioNeto"] - $_POST["Descuento"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	

if($_POST["nuevoPrecioImpuesto"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos";
													
													});
												
								</script>';	
				

			exit; 
		 }




if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
		$Moneda = "DOP";
		$tasa = "0.00";
		$TotalPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];


	}
		 
$Forma_De_Pago_607 = $_POST["nuevoMetodoPago"];
$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;
	
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



		


		$Fecha_Ret_AnoMesDia_607  = "";
		$Fecha_Retencion_AnoMes_607 = "";
		$Fecha_Retencion_Dia_607 = "";
		$USDITBIS_Retenido_Tercero_607 = "0.00";
		$USDRetencion_Renta_por_Terceros_607 = "0.00";
		$ITBIS_Retenido_Tercero_607 = "0.00";
		$Retencion_Renta_por_Terceros_607 = "0.00";
		$Porc_ITBIS_Retenido_607 = 0;
		$Porc_ISR_Retenido_607 = 0; 


	$Extraer_NCF_607 = $_POST["NCFFactura"];
	$B04MeMa_607 = "";
	$Transaccion_607 = "1";
	$NCF_Modificado_607 = "";
	$Tipo_de_Ingreso_607 = "01";
	$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
	
	$Otros_Impuestos_607 = "0";
	$Monto_Propina_Legal_607 = "0";	
	
	$ITBIS_Percibido_607 = "0.00";
	
	$ISR_Percibido_607 = "0.00";
	$Impuesto_Selectivo_al_Consumo_607 = "0.00";
	$Otros_Impuestos_607 = "0";
	$Monto_Propina_Legal_607 = "0.00";
	$Estatus_607 = "";
	$observaciones = "MODULO POS";
	$Accion_607 = "CREADO";
	$Modulo = "FACTURAPOS";
	$banco = 0;


$datos = array("Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Tipo_Cliente_Factura"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $Tipo_de_Ingreso_607,
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
"ITBIS_Facturado_607" => bcdiv($TotalPrecioImpuesto, '1', 2),
"ITBIS_Retenido_Tercero_607" => bcdiv($ITBIS_Retenido_Tercero_607, '1', 2),
"ITBIS_Percibido_607" => $ITBIS_Percibido_607,
"Retencion_Renta_por_Terceros_607" => bcdiv($Retencion_Renta_por_Terceros_607, '1', 2),
"ISR_Percibido_607" => $ISR_Percibido_607,
"Impuesto_Selectivo_al_Consumo_607" => $Impuesto_Selectivo_al_Consumo_607,
"Otros_Impuestos_607" => $Otros_Impuestos_607,
"Monto_Propina_Legal_607" => $Monto_Propina_Legal_607,
"Efectivo" => $Efectivo,
"Cheque_Transferencia_Deposito_607" => $CHEQUES,
"Tarjeta_Debito_Credito_607" => $TARJETA,
"Venta_a_Credito_607" => $CREDITO,
"Bonos_607" => $BONOS,
"Permuta_607" => $PERMUTAS,
"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
"Estatus_607" => $Estatus_607,
"Fecha_comprobante_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_Comprobante_Dia_607" => $_POST["FechaFacturadia"],
"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes_607,
"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
"EXTRAER_NCF_607" => $Extraer_NCF_607,
"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Transaccion_607" => $Transaccion_607,
"Referencia_Pago_607" => $observaciones,
"Banco_607" => $banco,
"Fecha_Trans_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_trans_dia_607" => $_POST["FechaFacturadia"],
"Descripcion_607" => $observaciones, 
"Nombre_Empresa_607" => $_POST["Nombre_Cliente"],
"Usuario_Creador" => $_POST["nuevoVendedor"],
"Accion_607" => $Accion_607,
"Codigo_Factura" =>$_POST["nuevaVenta"],
"Modulo" => $Modulo);

$respuesta =  Modelo607::MdlRegistrar607($tabla, $datos);

	
	if($respuesta != "ok"){
		echo '<script>
				swal({

				type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
				showConfirmButton: false,
				timer: 6000
				}).then(()=>{
				window.location = "crear-ventas";
													
								});
												
					</script>';	
		exit;

	}

		$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["FechaFacturames"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";

$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);

if(!isset($_POST["CodigoNCFanterior"]) && $_POST["HabilitarNCF"] == ""){
	$tabla = "correlativos_empresas";
	
	$datos = array("Rnc_Empresa" => $_POST["RncEmpresaVentas"],
					"Tipo_NCF" => $_POST["NCFFactura"],
					"NCF_Cons" =>  $_POST["CodigoNCF"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);


}
$tabla = "607_empresas";
$taRnc_Empresa_607 = "Rnc_Empresa_607";
$Rnc_Empresa_607 = $Rnc_Empresa_607;
$taRnc_Factura_607 = "Rnc_Factura_607";
$Rnc_Factura_607 = $Rnc_Factura_607;
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
									title: "¡Error en la consulta a la base de datos de la factura consultar con el programador!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "gastodiario";
													
													});
												
								</script>';	
					exit;




			}

		/**********************FIN CONSULTAS DE FACTURA RNC Y NCF Y ID******************/

	/***************************************
			agregar Cliente 
	***************************************/
	$id_Cliente = $_POST["agregarCliente"];
	if(empty($_POST["agregarCliente"])){
				$tabla = "clientes_empresas";
				$Fecha_Nacimiento = "";
				$Email = "";  
				$Telefono = "";  
				$Direccion = "";

		$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaVentas"],
		"Tipo_Cliente" => $_POST["Tipo_Cliente_Factura"],
		"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
		"Documento" => $_POST["RncClienteFactura"],
		"Email" => $Email, 
		"Telefono" => $Telefono ,
		"Direccion" => $Direccion, 
		"Fecha_Nacimiento" => $Fecha_Nacimiento);
		$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

		$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
		$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
		$taDocumento = "Documento";
		$Documento = $_POST["RncClienteFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
	
		$id_Cliente = $respuesta["id"];
				   
			}
if(isset($_POST["Comision_Factura"]) && $_POST["Comision_Factura"] == 2){
				$id_Vendedor = "0";
				$Nombre_Vendedor = "";

	}else{

	$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];
	$Email = "";

	}


/*****************************************************
	Carga de Bases de Datos de Cuentas Por Cobrar 
******************************************************/
if($_POST["nuevoMetodoPago"] == "04"){



	$tabla = "cxc_empresas";
	$Dia_Credito_cxc = "15";
	$datos = array("id_607" => $id_registro607,
		"Codigo" => $_POST["nuevaVenta"],
		"Rnc_Empresa_cxc" => $_POST["RncEmpresaVentas"], 
		"id_Cliente" => $id_Cliente,
		"Rnc_Cliente" => $_POST["RncClienteFactura"],
		"Nombre_Cliente" => $_POST["Nombre_Cliente"],
		"NCF_cxc" => $NCF_607,
		"id_Vendedor" => $id_Vendedor,
		"Nombre_Vendedor" => $Nombre_Vendedor,
		"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
		"FechaDia_cxc" => $_POST["FechaFacturadia"], 
		"Dia_Credito_cxc" => $Dia_Credito_cxc, 
		"Moneda" => $Moneda,
		"Tasa" => $tasa,
		"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
		"Descuento"  => bcdiv($_POST["Descuento"], '1', 2), 
		"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
		"Total" => bcdiv($_POST["totalVenta"], '1', 2),
		"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
		"Retencion_Renta" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
		"Observaciones" => $observaciones,
		"Retenciones" => "2",
		"MontoCobrado" => 0,
		"Estado" => "PorCobrar");
$respuesta = ModeloCXC::mdlIngresarcxc($tabla, $datos); 

}
$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 

/************************************************ CARGAR CUENTAS CONTABLES****************************/
$NAsiento = "";
$NAsientoRet = "";
/****Consulta asiento factura *****/
	$Rnc_Empresa_Diario = $Rnc_Empresa_607;
	$tipocod = "DFF";
	$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DFF".$N;

 /**********************CONSULTAS DE FACTURA RNC Y NCF Y ID******************/
if($_POST["Contabilidad"] == 1){ 

	
/*PROYECTO*/

	$idproyecto = "NOAPLICA";
	$codproyecto = "NOAPLICA"; 

	

/********************************************************************************/

///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////

$listaProductos =  json_decode($_POST["listaProductos"], true);

$cuentasproductos = [];	
$costoventa = 0;

foreach ($listaProductos as $pro => $value){

/*establecer costo de venta*/
		if($value["tipoproducto"] == "1"){
			$costoventa = $costoventa + $value["preciocompra"];
			}
		/* fin establecer costo de venta*/




if($pro = 0){
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}

	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);


}else{

$variable = "DISTINTO";
	
foreach ($cuentasproductos as $key => $cuentas){

if($cuentas["idgrupo"] == $value["idgrupo"] && $cuentas["idcategoria"] == $value["idcategoria"] && $cuentas["idgenerica"] == $value["idgenerica"] && $cuentas["idcuenta"] == $value["idcuenta"]){
		if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

		}

		$suma = $cuentas["credito"] + $value["total"];
		$cuentasproductos[$key]["credito"] = $suma;
		$variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

		}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);

}
}


}/*****cierre for de comparar cuentas********/


///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////
foreach ($cuentasproductos as $key => $value) {
$tabla = "librodiario_empresas";
$ObservacionesLD = $observaciones;
$Extraer_NAsiento = "DFF";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = $value["idgrupo"];
$idcategoria = $value["idcategoria"];
$idgenerica = $value["idgenerica"];
$idcuenta = $value["idcuenta"];
$nombrecuenta = $value["nombrecuenta"];
$debito = $value["debito"];;
$credito = bcdiv($value["credito"], '1', 2);
$ObservacionesLD = $value["ObservacionesLD"];

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }


if($_POST["nuevoMetodoPago"] == "04"){
	$totalVentas = $_POST["totalVenta"];
	if($_POST["Moneda_Factura"] == "USD"){
		$totalVentas = $_POST["totalVenta"] * $tasa;
		

		}
	
$tabla = "librodiario_empresas";
$ObservacionesLD = $observaciones;
$Extraer_NAsiento = "DFF";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}/*CIERRE CUENTA CONTABLE*/
else{

$totalVentas = $_POST["totalVenta"];

	if($_POST["Moneda_Factura"] == "USD"){
		$USDtotalVentas = $_POST["totalVenta"] * $tasa;
		$totalVentas = $USDtotalVentas;

		}

$tabla = "librodiario_empresas";
$ObservacionesLD = $observaciones;
$Extraer_NAsiento = "DFF";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*CIERRE ELSE CUENTA CONTABLE*/
 if ($_POST["nuevoPrecioImpuesto"] > 0) {
 	$nuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];
 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
	$nuevoPrecioImpuesto = $USDnuevoPrecioImpuesto;

	}

$idgrupo = "2";
$idcategoria = "4";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "ITBIS en ventas por pagar";
$debito = 0;
$credito = bcdiv($nuevoPrecioImpuesto, '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }
 if($_POST["Descuento"] > 0){
 	$Descuento = $_POST["Descuento"];

 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDDescuento = $_POST["Descuento"] * $tasa;
	$Descuento = $USDDescuento;

	}
		$idgrupo = "4";
		$idcategoria = "8";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "descuentos en ventas";
		$debito = bcdiv($Descuento, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 
 }
  
if($costoventa > 0){ /*costos de ventas*/
 		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "005";
		$nombrecuenta = "costos de ventas";
		$debito = bcdiv($costoventa, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = 0;
		$credito = bcdiv($costoventa, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*costos de ventas*/
  

	 
 } /* cierre de if de Contabilidad de si la empresa tiene contabilidad*/
 if($respuesta == "ok"){

/***** ACTUALIZAR CORRELATIVOS ***********************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DFF";
			
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_607,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos); 
	
 }
/***********CIERRE DE CUENTAS POR COBRAR **********************************/

	
								
/************************************************************************
ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STCKO DE LAS VENTAS PRODUCTOS
*************************************************************************/

			$listaProductos =  json_decode($_POST["listaProductos"], true);

			$totalProductosComprados = array();

			if($_POST["CambiarInventario"] == "1"){
				$tablaProductos = "productos_empresas";


			}else {
				$tablaProductos = "productos_activor_empresas";


			}


			
			foreach ($listaProductos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);



				$id = "id";

				$valorid = $value["id"];

				$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

				

				$item1a = "Ventas";

				$valor1a = $value["cantidad"] + $traerProductos["Ventas"];

				$nuevasVentas = ModeloProductos::MdlActualizarProductoVentas($tablaProductos, $item1a, $valor1a, $id, $valorid);

				$item1b = "Stock";
				$valor1b = $value["Stock"];

				$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1b, $id, $valorid);
if($value["tipoproducto"] == "1"){
$tabla = "productos_empresas";
$id = "id";
$valoridProducto = $value["id"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];


$tabla = "historico_productos_empresas";
$Accion = "VENTA";

$datos = array ("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => "0", 
      "Precio_Venta" => $value["precio"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames"],
      "Fecha_dia" => $_POST["FechaFacturadia"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_607,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["nuevoVendedor"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);	
 }/*CIERRE DE IF TIPO PRODUCTO*/
			
			}/*CIERRO FOREACH*/

			$tablaClientes = "clientes_empresas";

			$id = "id";

			$valorid = $id_Cliente;

			$traeCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);
			

			$item = "Compras";
			$valor = array_sum($totalProductosComprados) + $traeCliente["Compras"];

			
			$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);

				/*FECHA ULTIMA COMPRA CLIENTE */

			$item = "Ultima_Compra";

			date_default_timezone_set('America/Santo_Domingo');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$fechaActual = $fecha.' '.$hora;

			$valor = $fechaActual;

			
			$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);


			/**********************************************
						GUARDAR LA COMPRA
			***********************************************/
			$NCF = $_POST["NCFFactura"];
			$Correlativo = $_POST["CodigoNCF"]; 
			$NCF_Factura = $NCF.$Correlativo;
			$Comision = $_POST["Comision_Factura"];
			$Usuario_Creador = $_POST["nuevoVendedor"];

			$Accion_Factura = "Creada";

			if($_POST["nuevoMetodoPago"] == "04"){
				$Estatus = "CREDITO";

			} else{
				
				$Estatus = "POR DEPOSITAR";

			}
			
			

			 	$NAsientoRet = "";
			 
	
			

	$tabla = "ventas_empresas";
	$Estado = "1";

$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"],
	"id_607" => $id_registro607, 
	"Codigo" => $_POST["nuevaVenta"],
	"Rnc_Cliente" => $_POST["RncClienteFactura"],
	"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
	"NCF_Factura" => $NCF_Factura, 
	"FechaAnoMes" => $_POST["FechaFacturames"], 
	"FechaDia" => $_POST["FechaFacturadia"], 
	"id_Cliente" => $id_Cliente,
	"Correo_Cliente" => $Email, 
	"id_Vendedor" => $id_Vendedor,
	"Nombre_Vendedor" => $Nombre_Vendedor, 
	"Producto" => $_POST["listaProductos"],
	"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
	"Pordescuento" => $_POST["nuevoporDescuento"],
	"Moneda" => $_POST["Moneda_Factura"],
	"Tasa" => $tasa,
	"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
	"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
	"Descuento" => bcdiv($_POST["Descuento"], '1', 2),
	"Total" => bcdiv($_POST["totalVenta"], '1', 2), 
	"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
	"Comision" => $Comision,
	"Estatus" => $Estatus,
	"Referencia" => $_POST["listaMetodoPago"],
	"id_Proyecto" => $idproyecto,
	"CodigoProyecto" => $codproyecto,
	"Observaciones" => $observaciones, 
	"Retenciones" => "2",
	"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_607,
	"Porc_ISR_Retenido" => $Porc_ISR_Retenido_607,
	"ITBIS_Retenido_Tercero" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
	"RetencionRenta_por_Terceros" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
	"EXTRAER_NCF" => $NCF, 
	"NAsiento" => $NAsiento,
	"NAsientoRet" => $NAsientoRet,
	"TipodeInventario" => $_POST["CambiarInventario"],
	"Estado" => $Estado,
	"Usuario_Creador" => $Usuario_Creador, 
	"Accion_Factura" => $Accion_Factura);
		
$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

if($respuesta == "ok"){
	$_SESSION["imprimirfacturaPOS"] = 1;
	$_SESSION["NCF_FacturaPOS"] = $NCF_Factura;
	$_SESSION["RNCCliente_FacturaPOS"] = $_POST["RncClienteFactura"];
	

		if($_POST["Contabilidad"] == 1){
			
		

		echo '<script>
		
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>La Factura Se Registro Correctamente<br>N° DE CONTROL De LA FACTURA: '.$_POST["nuevaVenta"].'</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "crear-pos";
		}

		});

</script>';			

	}else { 

	echo '<script>
			swal({
				type: "success",
				title: "¡la Venta Se Registro Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
				
				}).then((result)=>{

				if(result.value){
					window.location = "crear-pos";
				}

				});

			</script>';
		}

	
}
										

		}/*CIERRE DE ISSET NUEVA VENTA*/

	}/*CIERRE DE FUNCION CREAR VENTAS*/





static public function ctrCrearVentaPosNo(){
	if(isset($_POST["nuevaVenta"])){

$NCFFactura = "FP1";
$_POST["NCFFacturaNo"] = "FP1"; 
$RncEmpresaVentas = $_POST["RncEmpresaVentas"];
$respuesta = ControladorCorrelativos::ctrCorrelativosFacNo($RncEmpresaVentas, $NCFFactura);

$codigo = $respuesta["NCF_Cons"];
$codigoNCF = $codigo + 1;
$number = $codigoNCF;
$length = 8;
$string = substr(str_repeat(0, $length).$number, - $length);
$_POST["CodigoNCFNo"] = $string;


$_SESSION["FechaFacturames"] = $_POST["FechaFacturames"];
$_SESSION["FechaFacturadia"] = $_POST["FechaFacturadia"];
$_SESSION["Comision_Factura"] = $_POST["Comision_Factura"];
$_SESSION["NCFFacturaNo"] = $_POST["NCFFacturaNo"];
$_SESSION["Tipo_Cliente_Factura"] = $_POST["Tipo_Cliente_Factura"];
$_SESSION["nuevoMetodoPago"] = $_POST["nuevoMetodoPago"];

if($_POST["NCFFacturaNo"] == "FP1"){
	$_SESSION["agregarCliente"] = $_POST["agregarCliente"];
	$_SESSION["RncClienteFactura"] = $_POST["RncClienteFactura"];
	$_SESSION["Nombre_Cliente"] = $_POST["Nombre_Cliente"];


}else{
	unset($_SESSION["agregarCliente"]);
	unset($_SESSION["RncClienteFactura"]);
	unset($_SESSION["Nombre_Cliente"]);


}
/*CARGA DE CLIENTES DE TABLA GROWIN_DGII*/
	$tabla = "growin_dgii";
	$taRnc_Growin_DGII = "Rnc_Growin_DGII";
	$ValorRnc_Growin_DGII = $_POST["RncClienteFactura"];
	$ValorNombreGrowin_DGII = $_POST["Nombre_Cliente"];
	$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

	if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
		
		$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII,
			"Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

	$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);



	}
/*CIERRE  DE CARGA GROWIN DGII*/
/****VALIDACION QUE LA FACUTRA NO SE REPITA****/

				$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Empresa_607";
				$Rnc_Empresa_607 = $_POST["RncEmpresaVentas"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["RncClienteFactura"];
				$taNCF_607 = "NCF_607";

				$NCFFactura = $_POST["NCFFacturaNo"];
				$CodigoNCF = $_POST["CodigoNCFNo"];
				
				$NCF_607 = $NCFFactura.$CodigoNCF;

			$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);

		if($FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["NCF_607"] == $NCF_607){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-pos-pro";
											}

											});

								</script>';
			exit;
		} 
		/************************VALIDACION 608***************************/
		$tabla = "608_empresas";
		$taRnc_Empresa_608 = "Rnc_Empresa_608";
		$Rnc_Empresa_608 = $_POST["RncEmpresaVentas"];
		$taNCF_608 = "NCF_608";
		$NCF_608 = $NCF_607;

$FacturaRepetida608 = Modelo608::MdlfacturaRepetida608($tabla, $taRnc_Empresa_608, $Rnc_Empresa_608, $taNCF_608, $NCF_608);

if($FacturaRepetida608 != false && $FacturaRepetida608["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida608["NCF_608"] == $NCF_608 && $FacturaRepetida608["Estatus"] != "2"){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA EN EL 608 VERIFIQUE EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-pos-pro";
											}

											});

								</script>';


		exit;

}
if($FacturaRepetida608 != false && $FacturaRepetida608["Rnc_Empresa_608"] == $Rnc_Empresa_608 && $FacturaRepetida608["NCF_608"] == $NCF_608 && $FacturaRepetida608["Estatus"] == "2"){
$tabla = "608_empresas";
$id = "id";
$id_608 = $FacturaRepetida608["id"];

$respuesta = Modelo608::mdlBorrar608($tabla, $id, $id_608);
		
 }
 $tabla = "607_empresas";
 /************************FIN VALIDACION 608***************************/
/************************lista de productos***************************/
		if(empty($_POST["listaProductos"]) || $_POST["listaProductos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PRODUCTO A LA VENTA!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-pos-pro";
													}

													});

										</script>';
								exit;

				
			}

			$listaProductos =  json_decode($_POST["listaProductos"], true);

		foreach ($listaProductos as $key => $value) {

			if($value["idgrupo"] == "" || $value["idcategoria"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-pos-pro";
													}

													});

										</script>';
								exit;



			}

			if($value["tipoproducto"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, el Tipo de producto no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-pos-pro";
													}

													});

										</script>';
								exit;



			}


			
			// code...
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
									window.location = "crear-pos-pro";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano <= 2018){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser mayor a 2018!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos-pro";
													
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
									window.location = "crear-pos-pro";
													
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
									window.location = "crear-pos-pro";
													
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
									window.location = "crear-pos-pro";
													
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
						window.location = "crear-pos-pro";
													
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
									window.location = "crear-pos-pro";
													
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
									window.location = "crear-pos-pro";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
			
/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Cliente_Factura"] == 1 && strlen($_POST["RncClienteFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos-pro";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente_Factura"] == 2 && strlen($_POST["RncClienteFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos-pro";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/
if(isset($_POST["CodigoNCFanterior"])){ 
	if($_POST["CodigoNCFNo"] > $_POST["CodigoNCFanterior"]){
		echo '<script>
								swal({

									type: "error",
									title: "El Codigo de NCF no Puede ser mayor al que corresponde, si desea modificarlo debe ser menor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos-pro";
								});

	
								</script>';
				exit;
	}
	}

	/*******INICIO VALIDACION DE NCF*****/

	if(substr($NCF_607, 0, 1) == "F" && strlen($NCF_607) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos-pro";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
                   

$Monto_Facturado_607 = $_POST["nuevoPrecioNeto"] - $_POST["Descuento"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	

if($_POST["nuevoPrecioImpuesto"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos-pro";
													
													});
												
								</script>';	
				

			exit; 
		 }
		 
if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
		$Moneda = "DOP";
		$tasa = "0.00";
		$TotalPrecioImpuesto =  $_POST["nuevoPrecioImpuesto"];


	}

$Forma_De_Pago_607 = $_POST["nuevoMetodoPago"];
$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;

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



		$Fecha_Ret_AnoMesDia_607  = "";
		$Fecha_Retencion_AnoMes_607 = "";
		$Fecha_Retencion_Dia_607 = "";
		$USDITBIS_Retenido_Tercero_607 = "0.00";
		$USDRetencion_Renta_por_Terceros_607 = "0.00";
		$ITBIS_Retenido_Tercero_607 = "0.00";
		$Retencion_Renta_por_Terceros_607 = "0.00";
		$Porc_ITBIS_Retenido_607 = 0;
		$Porc_ISR_Retenido_607 = 0; 


$Extraer_NCF_607 = $_POST["NCFFacturaNo"];
$B04MeMa_607 = "";
$Transaccion_607 = "1";
$NCF_Modificado_607 = "";
$Tipo_de_Ingreso_607 = "01";
$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];

$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0";	

$ITBIS_Percibido_607 = "0.00";

$ISR_Percibido_607 = "0.00";
$Impuesto_Selectivo_al_Consumo_607 = "0.00";
$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0.00";
$Estatus_607 = "";
$observaciones = "MODULO POS";
$Accion_607 = "CREADO";
$Modulo = "FACTURAPOS";

$banco = 0;
$datos = array("Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Tipo_Cliente_Factura"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $Tipo_de_Ingreso_607,
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
"ITBIS_Facturado_607" => bcdiv($TotalPrecioImpuesto, '1', 2),
"ITBIS_Retenido_Tercero_607" => bcdiv($ITBIS_Retenido_Tercero_607, '1', 2),
"ITBIS_Percibido_607" => $ITBIS_Percibido_607,
"Retencion_Renta_por_Terceros_607" => bcdiv($Retencion_Renta_por_Terceros_607, '1', 2),
"ISR_Percibido_607" => $ISR_Percibido_607,
"Impuesto_Selectivo_al_Consumo_607" => $Impuesto_Selectivo_al_Consumo_607,
"Otros_Impuestos_607" => $Otros_Impuestos_607,
"Monto_Propina_Legal_607" => $Monto_Propina_Legal_607,
"Efectivo" => $Efectivo,
"Cheque_Transferencia_Deposito_607" => $CHEQUES,
"Tarjeta_Debito_Credito_607" => $TARJETA,
"Venta_a_Credito_607" => $CREDITO,
"Bonos_607" => $BONOS,
"Permuta_607" => $PERMUTAS,
"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
"Estatus_607" => $Estatus_607,
"Fecha_comprobante_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_Comprobante_Dia_607" => $_POST["FechaFacturadia"],
"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes_607,
"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
"EXTRAER_NCF_607" => $Extraer_NCF_607,
"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Transaccion_607" => $Transaccion_607,
"Referencia_Pago_607" => $observaciones,
"Banco_607" => $banco,
"Fecha_Trans_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_trans_dia_607" => $_POST["FechaFacturadia"],
"Descripcion_607" => $observaciones, 
"Nombre_Empresa_607" => $_POST["Nombre_Cliente"],
"Usuario_Creador" => $_POST["nuevoVendedor"],
"Accion_607" => $Accion_607,
"Codigo_Factura" =>$_POST["nuevaVenta"],
"Modulo" => $Modulo);


$respuesta =  Modelo607::MdlRegistrar607($tabla, $datos);
/*****************************ACTUALIZAR ESTATUS 607******************************************/
if($respuesta != "ok"){
		echo '<script>
				swal({

				type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
				showConfirmButton: false,
				timer: 6000
				}).then(()=>{
				window.location = "crear-pos-pro";
													
								});
												
					</script>';	
		exit;



	}

$tabla = "control_empresas";
$taRnc_Empresa = "Rnc_Empresa";
$Rnc_Empresa = $Rnc_Empresa_607;
$taPeriodo_Empresa = "Periodo_Empresa";
$Periodo_Empresa = $_POST["FechaFacturames"];
$tacontrol_Empresa = "607_Empresa";
$valorestado = "1";


$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);
/*****************************ACTUALIZAR CORRELATIVOS******************************************/
if($respuesta == "ok"){
	if(!isset($_POST["CodigoNCFanterior"]) && empty($_POST["HabilitarNCFNo"])){
$tabla = "correlativos_no_fiscal";

$datos = array("Rnc_Empresa" => $_POST["RncEmpresaVentas"],
"Tipo_NCF" => $_POST["NCFFacturaNo"],
"NCF_Cons" =>  $_POST["CodigoNCFNo"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
 }
 $tabla = "607_empresas";
$taRnc_Empresa_607 = "Rnc_Empresa_607";
$Rnc_Empresa_607 = $Rnc_Empresa_607;
$taRnc_Factura_607 = "Rnc_Factura_607";
$Rnc_Factura_607 = $Rnc_Factura_607;
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
									title: "¡Error en la consulta a la base de datos de la factura consultar con el programador!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-pos-pro";
													
													});
												
								</script>';	
					exit;




			}

		/**********************FIN CONSULTAS DE FACTURA RNC Y NCF Y ID******************/
/**********************************agregar Cliente************************************/
$id_Cliente = $_POST["agregarCliente"];
if(empty($_POST["agregarCliente"])){
	$tabla = "clientes_empresas";
	$Fecha_Nacimiento = "";
	$Email = "";  
	$Telefono = "";  
	$Direccion = "";

$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaVentas"],
"Tipo_Cliente" => $_POST["Tipo_Cliente_Factura"],
"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
"Documento" => $_POST["RncClienteFactura"],
"Email" => $Email, 
"Telefono" => $Telefono ,
"Direccion" => $Direccion, 
"Fecha_Nacimiento" => $Fecha_Nacimiento);
$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
$taDocumento = "Documento";
$Documento = $_POST["RncClienteFactura"];


$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);




$id_Cliente = $respuesta["id"];

}

if(isset($_POST["Comision_Factura"]) && $_POST["Comision_Factura"] == "2"){
	$id_Vendedor = "0";
	$Nombre_Vendedor = "";


}else{

	$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];
	$Email = "";



}


}/*cierre respuesta ok*/

/*****************************************************
Carga de Bases de Datos de Cuentas Por Cobrar 

******************************************************/

if($_POST["nuevoMetodoPago"] == "04"){
	

$tabla = "cxc_empresas";
$Dia_Credito_cxc = "15";
	$datos = array("id_607" => $id_registro607,
"Codigo" => $_POST["nuevaVenta"], 
"Rnc_Empresa_cxc" => $_POST["RncEmpresaVentas"], 
"id_Cliente" => $id_Cliente,
"Rnc_Cliente" => $_POST["RncClienteFactura"],
"Nombre_Cliente" => $_POST["Nombre_Cliente"],
"NCF_cxc" => $NCF_607,
"id_Vendedor" => $id_Vendedor,
"Nombre_Vendedor" => $Nombre_Vendedor,
"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
"FechaDia_cxc" => $_POST["FechaFacturadia"], 
"Dia_Credito_cxc" => $Dia_Credito_cxc, 
"Moneda" => $Moneda,
"Tasa" => $tasa,
"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2),
"Descuento"  => bcdiv($_POST["Descuento"], '1', 2), 	
"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
"Total" => bcdiv($_POST["totalVenta"], '1', 2),
"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
"Retencion_Renta" => bcdiv($USDRetencion_Renta_por_Terceros_607 , '1', 2),
"Observaciones" => $observaciones,
"Retenciones" => "2",
"MontoCobrado" => 0,
"Estado" => "PorCobrar");
$respuesta = ModeloCXC::mdlIngresarcxc($tabla, $datos);
}
/*********************** CIERRE DE CUENTAS POR COBRAR **************************************/
/************************************************ CARGAR CUENTAS CONTABLES****************************/
$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 
$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $Rnc_Empresa_607;
	$tipocod = "DFP";
	$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DFP".$N;
if($_POST["Contabilidad"] == 1){ 




/*PROYECTO*/

	$idproyecto = "NOAPLICA";
	$codproyecto = "NOAPLICA"; 

	
/********************************************************************************/
///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////

$listaProductos =  json_decode($_POST["listaProductos"], true);

$cuentasproductos = [];	
$costoventa = 0;

foreach ($listaProductos as $pro => $value){

		/*establecer costo de venta*/
		if($value["tipoproducto"] == "1"){
			$costoventa = $costoventa + ($value["preciocompra"]*$value["cantidad"]);
			}
		/* fin establecer costo de venta*/


if($pro = 0){

		if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $value["total"] * $tasa;
			$value["total"] = $cambioMoneda;

		}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);


}else{

$variable = "DISTINTO";
	
foreach ($cuentasproductos as $key => $cuentas){

if($cuentas["idgrupo"] == $value["idgrupo"] && $cuentas["idcategoria"] == $value["idcategoria"] && $cuentas["idgenerica"] == $value["idgenerica"] && $cuentas["idcuenta"] == $value["idcuenta"]){

		if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $value["total"] * $tasa;
			$value["total"] = $cambioMoneda;

		}

		$suma = $cuentas["credito"] + $value["total"];
		$cuentasproductos[$key]["credito"] = $suma;
		$variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);

}
}


}/*****cierre for de comparar cuentas********/


///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////
foreach ($cuentasproductos as $key => $value) {
	$tabla = "librodiario_empresas";
$ObservacionesLD = $observaciones;
$Extraer_NAsiento = "DFP";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;

$idgrupo = $value["idgrupo"];
$idcategoria = $value["idcategoria"];
$idgenerica = $value["idgenerica"];
$idcuenta = $value["idcuenta"];
$nombrecuenta = $value["nombrecuenta"];
$debito = bcdiv($value["debito"], '1', 2);
$credito = bcdiv($value["credito"], '1', 2);
$ObservacionesLD = $value["ObservacionesLD"];

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }
 
	
	
if($_POST["nuevoMetodoPago"] == "04"){
	$totalVentas = $_POST["totalVenta"];
			if($_POST["Moneda_Factura"] == "USD"){
				$totalVentas = $_POST["totalVenta"] * $tasa;
			}
	
$tabla = "librodiario_empresas";
$ObservacionesLD = $observaciones;
$Extraer_NAsiento = "DFP";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
			



}/*CIERRE CUENTA CONTABLE*/
else{

	$totalVentas = $_POST["totalVenta"];

	if($_POST["Moneda_Factura"] == "USD"){
		$USDtotalVentas = $_POST["totalVenta"] * $tasa;
		$totalVentas = $USDtotalVentas;

		}

$tabla = "librodiario_empresas";
$ObservacionesLD = $observaciones;
$Extraer_NAsiento = "DFP";
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);




 }/*CIERRE ELSE CUENTA CONTABLE*/
 if($_POST["nuevoPrecioImpuesto"] > 0){
 	$nuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];
 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
	$nuevoPrecioImpuesto = $USDnuevoPrecioImpuesto;

	}
$idgrupo = "2";
$idcategoria = "4";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "ITBIS en ventas por pagar";
$debito = 0;
$credito = bcdiv($nuevoPrecioImpuesto, '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"id_banco" => $idbanco,
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

 }
 if($_POST["Descuento"] > 0){
 	$Descuento = $_POST["Descuento"];

 	if($_POST["Moneda_Factura"] == "USD"){

 	$USDDescuento = $_POST["Descuento"] * $tasa;
	$Descuento = $USDDescuento;

	}
		$idgrupo = "4";
		$idcategoria = "8";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "descuentos en ventas";
		$debito = bcdiv($Descuento, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);
		
$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}

 if($costoventa > 0){ /*costos de ventas*/
 		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "005";
		$nombrecuenta = "costos de ventas";
		$debito = bcdiv($costoventa, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = 0;
		$credito = bcdiv($costoventa, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*costos de ventas*/
  

}/* cierre de if de Contabilidad de si la empresa tiene contabilidad*/

if($respuesta == "ok"){
		/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DFP";
			
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_607,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);  

 }

/*****************************************************************************
ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STCKO DE LAS VENTAS PRODUCTOS
*******************************************************************************/

$listaProductos =  json_decode($_POST["listaProductos"], true);

$totalProductosComprados = array();


			if($_POST["CambiarInventario"] == "1"){
				$tablaProductos = "productos_empresas";


			}else {
				$tablaProductos = "productos_activor_empresas";


			}




foreach ($listaProductos as $key => $value) {

	array_push($totalProductosComprados, $value["cantidad"]);



	$tablaProductos = "productos_empresas";

	$id = "id";

	$valorid = $value["id"];

	

	$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

	

	$item1a = "Ventas";

	$valor1a = $value["cantidad"] + $traerProductos["Ventas"];

	$nuevasVentas = ModeloProductos::MdlActualizarProductoVentas($tablaProductos, $item1a, $valor1a, $id, $valorid);

	$item1b = "Stock";
	$valor1b = $value["Stock"];

	$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1b, $id, $valorid);

if($value["tipoproducto"] == "1"){
$tabla = "productos_empresas";
$id = "id";
$valoridProducto = $value["id"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];


$tabla = "historico_productos_empresas";
$Accion = "VENTA";

$datos = array ("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => "0", 
      "Precio_Venta" => $value["precio"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames"],
      "Fecha_dia" => $_POST["FechaFacturadia"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_607,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["nuevoVendedor"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);	
 }/*CIERRE DE IF TIPO PRODUCTO*/

}/*CIERRO FOREACH*/

$tablaClientes = "clientes_empresas";

$id = "id";

$valorid = $id_Cliente;

$traeCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);


$item = "Compras";
$valor = array_sum($totalProductosComprados) + $traeCliente["Compras"];


$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);

	/*FECHA ULTIMA COMPRA CLIENTE */

$item = "Ultima_Compra";

date_default_timezone_set('America/Santo_Domingo');

$fecha = date('Y-m-d');
$hora = date('H:i:s');
$fechaActual = $fecha.' '.$hora;

$valor = $fechaActual;


$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);


/**********************************************
GUARDAR LA COMPRA
***********************************************/
$NCF = $_POST["NCFFacturaNo"];
$Correlativo = $_POST["CodigoNCFNo"]; 
$NCF_Factura = $NCF.$Correlativo;
$Comision = $_POST["Comision_Factura"];
$Usuario_Creador = $_POST["nuevoVendedor"];
$Accion_Factura = "Creada";

if($_POST["nuevoMetodoPago"] == "04"){
	$Estatus = "CREDITO";
} else{
	$Estatus = "POR DEPOSITAR";

}

$NAsientoRet = "";


$Estado = "1";
$tabla = "ventas_empresas";

	$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"],
		"id_607" => $id_registro607, 
		"Codigo" => $_POST["nuevaVenta"],
		"Rnc_Cliente" => $_POST["RncClienteFactura"], 
		"Nombre_Cliente" => $_POST["Nombre_Cliente"],
		"NCF_Factura" => $NCF_Factura, 
		"FechaAnoMes" => $_POST["FechaFacturames"], 
		"FechaDia" => $_POST["FechaFacturadia"], 
		"id_Cliente" => $id_Cliente,
		"Correo_Cliente" => $Email, 
		"id_Vendedor" => $id_Vendedor,
		"Nombre_Vendedor" => $Nombre_Vendedor,  
		"Producto" => $_POST["listaProductos"], 
		"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
		"Pordescuento" => $_POST["nuevoporDescuento"],
		"Moneda" => $_POST["Moneda_Factura"],
		"Tasa" => $tasa,
		"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
		"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2),
		"Descuento" => bcdiv($_POST["Descuento"], '1', 2), 
		"Total" => bcdiv($_POST["totalVenta"], '1', 2), 
		"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
		"Comision" => $Comision,
		"Estatus" => $Estatus, 
		"Referencia" => $_POST["listaMetodoPago"], 
		"Observaciones" => $observaciones,
		"id_Proyecto" => $idproyecto,
		"CodigoProyecto" => $codproyecto,
		"Retenciones" => "2",
		"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_607,
		"Porc_ISR_Retenido" => $Porc_ISR_Retenido_607,
		"ITBIS_Retenido_Tercero" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
		"RetencionRenta_por_Terceros" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
		"EXTRAER_NCF" => $NCF, 
		"NAsiento" => $NAsiento,
		"TipodeInventario" => $_POST["CambiarInventario"],
		"Estado" => $Estado,
		"Usuario_Creador" => $Usuario_Creador, 
		"Accion_Factura" => $Accion_Factura);


$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

if($respuesta == "ok"){
	$_SESSION["imprimirfacturaPOS"] = 1;
	$_SESSION["NCF_FacturaPOS"] = $NCF_Factura;
	$_SESSION["RNCCliente_FacturaPOS"] = $_POST["RncClienteFactura"];
	

		
				if($_POST["Contabilidad"] == 1){
		echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>NCF :<u>'.$NCF_Factura.'</u><br>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>La Factura Se Registro Correctamente<br>N° DE CONTROL De LA FACTURA: '.$_POST["nuevaVenta"].'</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "crear-pos-pro";
		}

		});

</script>';			

	}else { 

	echo '<script>
			swal({
				type: "success",
				title: "<h1><strong>NCF:<u>'.$NCF_Factura.'</u></strong></h1><br>¡la Venta Se Registro Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
				
				}).then((result)=>{

				if(result.value){
					window.location = "crear-pos-pro";
				}

				});

			</script>';
		} 





	
}

	

	}/*CIERRE ISSET*/

}/*CIERRE DE FUNCION CREAR VENTAS*/


static public function ctrCrearVentaRecurrentes(){

	if(isset($_POST["NCFFacturaRecurrente"])){



$_SESSION["FechaFacturames"] = $_POST["FechaFacturames"];
$_SESSION["FechaFacturadia"] = $_POST["FechaFacturadia"];
$_SESSION["Comision_Factura"] = $_POST["Comision_Factura"];


	/*CARGA DE CLIENTES DE TABLA GROWIN_DGII*/
		$tabla = "growin_dgii";
		$taRnc_Growin_DGII = "Rnc_Growin_DGII";
		$ValorRnc_Growin_DGII = $_POST["RncClienteFactura"];
		$ValorNombreGrowin_DGII = $_POST["Nombre_Cliente"];
		$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

		if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
			$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

			$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

		}
	/*CIERRE  DE CARGA GROWIN DGII*/

	/************************************************
			INICIO 607
	*************************************************/
		
	/****VALIDACION QUE LA FACUTRA NO SE REPITA****/
	$NCFFactura = $_POST["NCFFacturaRecurrente"];

				
		/************************lista de productos***************************/
		if(empty($_POST["listaProductos"]) || $_POST["listaProductos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PRODUCTO A LA VENTA!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventasrecurrentes";
													}

													});

										</script>';
								exit;

				
			}

			$listaProductos =  json_decode($_POST["listaProductos"], true);

		foreach ($listaProductos as $key => $value) {

			if($value["idgrupo"] == "" || $value["idcategoria"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventasrecurrentes";
													}

													});

										</script>';
								exit;



			}

			if($value["tipoproducto"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, el Tipo de producto no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-ventasrecurrentes";
													}

													});

										</script>';
								exit;



			}


			
			// code...
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
									window.location = "crear-ventasrecurrentes";
													
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
									window.location = "crear-ventasrecurrentes";
													
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
									window.location = "crear-ventasrecurrentes";
													
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
									window.location = "crear-ventasrecurrentes";
													
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
									window.location = "crear-ventasrecurrentes";
													
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
						window.location = "crear-ventasrecurrentes";
													
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
									window.location = "crear-ventasrecurrentes";
													
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
									window.location = "crear-ventasrecurrentes";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
			
/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Cliente_Factura"] == 1 && strlen($_POST["RncClienteFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventasrecurrentes";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente_Factura"] == 2 && strlen($_POST["RncClienteFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventasrecurrentes";	
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/
/*******INICIO VALIDACION DE NCF*****/
                

$Monto_Facturado_607 = $_POST["nuevoPrecioNeto"] - $_POST["Descuento"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	

if($_POST["nuevoPrecioImpuesto"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventasrecurrentes";
													
													});
												
								</script>';	
				

			exit; 
		 }




if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
		$Moneda = "DOP";
		$tasa = "0.00";
		$TotalPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];


	}
		 
	$Forma_De_Pago_607 = $_POST["nuevoMetodoPago"];
	
$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;

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

if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"] ;
$ITBIS_Retenido_Tercero_607 = $USDITBIS_Retenido_Tercero_607 * $_POST["tasaUS"];


$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"] ;

$Retencion_Renta_por_Terceros_607 = $USDRetencion_Renta_por_Terceros_607 * $_POST["tasaUS"];
	}else{
$USDITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$USDRetencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
$ITBIS_Retenido_Tercero_607 = $_POST["Monto_ITBIS_Retenido"];
$Retencion_Renta_por_Terceros_607 = $_POST["Monto_ISR_Retenido"];
	
	}

		
$Fecha_Ret_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
$Fecha_Retencion_AnoMes_607 = $_POST["FechaFacturames"];
$Fecha_Retencion_Dia_607 = $_POST["FechaFacturadia"];

		
} else{ 

		$Fecha_Ret_AnoMesDia_607  = "";
		$Fecha_Retencion_AnoMes_607 = "";
		$Fecha_Retencion_Dia_607 = "";
		$USDITBIS_Retenido_Tercero_607 = "0.00";
		$USDRetencion_Renta_por_Terceros_607 = "0.00";
		$ITBIS_Retenido_Tercero_607 = "0.00";
		$Retencion_Renta_por_Terceros_607 = "0.00";
		$Porc_ITBIS_Retenido_607 = 0;
		$Porc_ISR_Retenido_607 = 0; 

}



if(isset($_POST["ITBISRetenido_Ventas"]) && $_POST["ITBISRetenido_Ventas"] != ""){
	
	$Porc_ITBIS_Retenido_607 = $_POST["ITBISRetenido_Ventas"];

}else{

	$Porc_ITBIS_Retenido_607 = "0";

}
		
if(isset($_POST["ISR_RETENIDO_Ventas"]) && $_POST["ISR_RETENIDO_Ventas"] != ""){
	
	$Porc_ISR_Retenido_607 = $_POST["ISR_RETENIDO_Ventas"];
}else{

	$Porc_ISR_Retenido_607 = "0";

}

	$Extraer_NCF_607 = $NCFFactura;
	$B04MeMa_607 = "";
	$Transaccion_607 = "1";
	$NCF_Modificado_607 = "";
	$Tipo_de_Ingreso_607 = "01";
	$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
	
	$Otros_Impuestos_607 = "0";
	$Monto_Propina_Legal_607 = "0";	
	
	$ITBIS_Percibido_607 = "0.00";
	
	$ISR_Percibido_607 = "0.00";
	$Impuesto_Selectivo_al_Consumo_607 = "0.00";
	$Otros_Impuestos_607 = "0";
	$Monto_Propina_Legal_607 = "0.00";
	$Estatus_607 = "";
	
	$Accion_607 = "CREADO";
	$Modulo = "FACTURA";
	$banco = 0;


	$id_Cliente = $_POST["agregarCliente"];
	if(empty($_POST["agregarCliente"])){
				$tabla = "clientes_empresas";
				$Fecha_Nacimiento = "";

		$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaVentas"],
		"Tipo_Cliente" => $_POST["Tipo_Cliente_Factura"],
		"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
		"Documento" => $_POST["RncClienteFactura"],
		"Email" => $_POST["nuevoEmail"], 
		"Telefono" => $_POST["nuevoTelefono"],
		"Direccion" => $_POST["nuevaDireccion"], 
		"Fecha_Nacimiento" => $Fecha_Nacimiento);
		$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

		$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
		$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
		$taDocumento = "Documento";
		$Documento = $_POST["RncClienteFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
	
		$id_Cliente = $respuesta["id"];
				   
			}
if(isset($_POST["Comision_Factura"]) && $_POST["Comision_Factura"] == 2){
				$id_Vendedor = "0";
				$Nombre_Vendedor = "";

	}else{

	$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];

	}


/*****************************************************
	Carga de Bases de Datos de Cuentas Por Cobrar 
******************************************************/

$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 


	
/*PROYECTO*/
if($_POST["proyecto"] == 0){
	$idproyecto = "NOAPLICA";
	$codproyecto = "NOAPLICA"; 

	}else{
		$tabla = "proyectos_empresas";
		$id = "id";
		$valorid = $_POST["proyecto"];
				
		$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
		$idproyecto = $_POST["proyecto"];
		$codproyecto = $respuesta["CodigoProyecto"]; 
}


	
if($_POST["VentaRecurrente"] == 1){
	$tabla = "ventasrecurrentes_empresas";
	$Estado = "1";
	$Estatus = "";
	$Accion_Factura = "EDITADO";

$datos = array("Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"],
	"Rnc_Cliente" => $_POST["RncClienteFactura"],
	"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
	"FechaAnoMes" => $_POST["FechaFacturames"], 
	"FechaDia" => $_POST["FechaFacturadia"], 
	"id_Cliente" => $id_Cliente,
	"Correo_Cliente" => $_POST["nuevoEmail"], 
	"id_Vendedor" => $id_Vendedor,
	"Nombre_Vendedor" => $Nombre_Vendedor, 
	"Producto" => $_POST["listaProductos"],
	"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
	"Pordescuento" => $_POST["nuevoporDescuento"],
	"Moneda" => $_POST["Moneda_Factura"],
	"Tasa" => $tasa,
	"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
	"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
	"Descuento" => bcdiv($_POST["Descuento"], '1', 2),
	"Total" => bcdiv($_POST["totalVenta"], '1', 2), 
	"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
	"Comision" => $_POST["Comision_Factura"],
	"Estatus" => $Estatus,
	"Referencia" => $_POST["listaMetodoPago"],
	"id_Proyecto" => $idproyecto,
	"CodigoProyecto" => $codproyecto,
	"Observaciones" => $_POST["Observaciones"], 
	"EXTRAER_NCF" => $NCFFactura, 
	"TipodeInventario" => $_POST["CambiarInventario"],
	"Estado" => $Estado,
	"Usuario_Creador" => $_POST["nuevoVendedor"], 
	"Accion_Factura" => $Accion_Factura);
		
$respuesta = ModeloVentas::mdlIngresarVentaRecurrente($tabla, $datos);
}/*factura Recurrentes*/

if($respuesta == "ok"){

	unset($_SESSION["FechaFacturadia"]);

		
			echo '<script>
				swal({
				type: "success",
				title: "La Factura Recurrente fue registrada conrrectamente",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
				}).then((result)=>{
				if(result.value){
					window.location = "crear-ventasrecurrentes";
				}

				});

			</script>';			

	
}
										

		}/*CIERRE DE ISSET NUEVA VENTA*/





}/*CIERRE DE FUNCION CREAR VENTAS*/
static public function ctrEditarVentaRecurrentes(){

	if(isset($_POST["idVentaRecurrente"])){



$_SESSION["FechaFacturames"] = $_POST["FechaFacturames"];
$_SESSION["FechaFacturadia"] = $_POST["FechaFacturadia"];
$_SESSION["Comision_Factura"] = $_POST["Comision_Factura"];


	/*CARGA DE CLIENTES DE TABLA GROWIN_DGII*/
		$tabla = "growin_dgii";
		$taRnc_Growin_DGII = "Rnc_Growin_DGII";
		$ValorRnc_Growin_DGII = $_POST["RncClienteFactura"];
		$ValorNombreGrowin_DGII = $_POST["Nombre_Cliente"];
		$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

		if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
			$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

			$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

		}
	/*CIERRE  DE CARGA GROWIN DGII*/

	/************************************************
			INICIO 607
	*************************************************/
		
	/****VALIDACION QUE LA FACUTRA NO SE REPITA****/
	$NCFFactura = $_POST["NCFFacturaRecurrente"];

				
		/************************lista de productos***************************/
		if(empty($_POST["listaProductos"]) || $_POST["listaProductos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PRODUCTO A LA VENTA!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ventasrecurrentes";
													}

													});

										</script>';
								exit;

				
			}
			$listaProductos =  json_decode($_POST["listaProductos"], true);

		foreach ($listaProductos as $key => $value) {

			if($value["idgrupo"] == "" || $value["idcategoria"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, la cuenta Contable no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ventasrecurrentes";
													}

													});

										</script>';
								exit;



			}

			if($value["tipoproducto"] == ""){
				echo '<script>
										swal({

											type: "error",
											title: "Debe Selecionar el producto nuevamente, el Tipo de producto no se reconocio",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "ventasrecurrentes";
													}

													});

										</script>';
								exit;



			}


			
			// code...
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
						window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
			
/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
	if($_POST["Tipo_Cliente_Factura"] == 1 && strlen($_POST["RncClienteFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ventasrecurrentes";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente_Factura"] == 2 && strlen($_POST["RncClienteFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "ventasrecurrentes";	
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	/*******INICIO VALIDACION DE NCF*****/
/*******INICIO VALIDACION DE NCF*****/
                

$Monto_Facturado_607 = $_POST["nuevoPrecioNeto"] - $_POST["Descuento"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
	

if($_POST["nuevoPrecioImpuesto"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-ventasrecurrentes";
													
													});
												
								</script>';	
				

			exit; 
		 }




if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $_POST["nuevoPrecioImpuesto"] * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
		$Moneda = "DOP";
		$tasa = "0.00";
		$TotalPrecioImpuesto = $_POST["nuevoPrecioImpuesto"];


	}
		 
	$Forma_De_Pago_607 = $_POST["nuevoMetodoPago"];
	
$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;

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


		$Fecha_Ret_AnoMesDia_607  = "";
		$Fecha_Retencion_AnoMes_607 = "";
		$Fecha_Retencion_Dia_607 = "";
		$USDITBIS_Retenido_Tercero_607 = "0.00";
		$USDRetencion_Renta_por_Terceros_607 = "0.00";
		$ITBIS_Retenido_Tercero_607 = "0.00";
		$Retencion_Renta_por_Terceros_607 = "0.00";
		$Porc_ITBIS_Retenido_607 = 0;
		$Porc_ISR_Retenido_607 = 0; 







	$Extraer_NCF_607 = $_POST["NCFFacturaRecurrente"];
	$B04MeMa_607 = "";
	$Transaccion_607 = "1";
	$NCF_Modificado_607 = "";
	$Tipo_de_Ingreso_607 = "01";
	$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
	
	$Otros_Impuestos_607 = "0";
	$Monto_Propina_Legal_607 = "0";	
	
	$ITBIS_Percibido_607 = "0.00";
	
	$ISR_Percibido_607 = "0.00";
	$Impuesto_Selectivo_al_Consumo_607 = "0.00";
	$Otros_Impuestos_607 = "0";
	$Monto_Propina_Legal_607 = "0.00";
	$Estatus_607 = "";
	
	$Accion_607 = "CREADO";
	$Modulo = "FACTURA";
	$banco = 0;


	$id_Cliente = $_POST["agregarCliente"];
	if(empty($_POST["agregarCliente"])){
				$tabla = "clientes_empresas";
				$Fecha_Nacimiento = "";

		$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaVentas"],
		"Tipo_Cliente" => $_POST["Tipo_Cliente_Factura"],
		"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
		"Documento" => $_POST["RncClienteFactura"],
		"Email" => $_POST["nuevoEmail"], 
		"Telefono" => $_POST["nuevoTelefono"],
		"Direccion" => $_POST["nuevaDireccion"], 
		"Fecha_Nacimiento" => $Fecha_Nacimiento);
		$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

		$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
		$Rnc_Empresa_Cliente = $_POST["RncEmpresaVentas"];
		$taDocumento = "Documento";
		$Documento = $_POST["RncClienteFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
	
		$id_Cliente = $respuesta["id"];
				   
			}
if(isset($_POST["Comision_Factura"]) && $_POST["Comision_Factura"] == 2){
				$id_Vendedor = "0";
				$Nombre_Vendedor = "";

	}else{

	$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];

	}


/*****************************************************
	Carga de Bases de Datos de Cuentas Por Cobrar 
******************************************************/

$idproyecto = "NOAPLICA";
$codproyecto = "NOAPLICA"; 


	
/*PROYECTO*/
if($_POST["proyecto"] == 0){
	$idproyecto = "NOAPLICA";
	$codproyecto = "NOAPLICA"; 

	}else{
		$tabla = "proyectos_empresas";
		$id = "id";
		$valorid = $_POST["proyecto"];
				
		$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
		$idproyecto = $_POST["proyecto"];
		$codproyecto = $respuesta["CodigoProyecto"]; 
}


	
if($_POST["VentaRecurrente"] == 1){
	$tabla = "ventasrecurrentes_empresas";
	$Estado = "1";
	$Estatus = "";
	$Accion_Factura = "EDITADO";

$datos = array("id" => $_POST["idVentaRecurrente"],
	"Rnc_Empresa_Venta" => $_POST["RncEmpresaVentas"],
	"Rnc_Cliente" => $_POST["RncClienteFactura"],
	"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
	"FechaAnoMes" => $_POST["FechaFacturames"], 
	"FechaDia" => $_POST["FechaFacturadia"], 
	"id_Cliente" => $id_Cliente,
	"Correo_Cliente" => $_POST["nuevoEmail"], 
	"id_Vendedor" => $id_Vendedor,
	"Nombre_Vendedor" => $Nombre_Vendedor, 
	"Producto" => $_POST["listaProductos"],
	"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
	"Pordescuento" => $_POST["nuevoporDescuento"],
	"Moneda" => $_POST["Moneda_Factura"],
	"Tasa" => $tasa,
	"Impuesto" => bcdiv($_POST["nuevoPrecioImpuesto"], '1', 2), 
	"Neto" => bcdiv($_POST["nuevoPrecioNeto"], '1', 2), 
	"Descuento" => bcdiv($_POST["Descuento"], '1', 2),
	"Total" => bcdiv($_POST["totalVenta"], '1', 2), 
	"Metodo_Pago" => $_POST["nuevoMetodoPago"], 
	"Comision" => $_POST["Comision_Factura"],
	"Estatus" => $Estatus,
	"Referencia" => $_POST["listaMetodoPago"],
	"id_Proyecto" => $idproyecto,
	"CodigoProyecto" => $codproyecto,
	"Observaciones" => $_POST["Observaciones"], 
	"EXTRAER_NCF" => $NCFFactura, 
	"TipodeInventario" => $_POST["CambiarInventario"],
	"Estado" => $Estado,
	"Usuario_Creador" => $_POST["nuevoVendedor"], 
	"Accion_Factura" => $Accion_Factura);
		
$respuesta = ModeloVentas::mdlEditarVentaRecurrente($tabla, $datos);
}/*factura Recurrentes*/

if($respuesta == "ok"){

	unset($_SESSION["FechaFacturadia"]);

		
			echo '<script>
				swal({
				type: "success",
				title: "La Factura Recurrente Modifico conrrectamente",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
				}).then((result)=>{
				if(result.value){
					window.location = "ventasrecurrentes";
				}

				});

			</script>';			

	
}
										

		}/*CIERRE DE ISSET NUEVA VENTA*/





}/*CIERRE DE FUNCION CREAR VENTAS*/



static public function ctrCrearFacturaRecurrente(){

if(isset($_POST["RncEmpresaVentasRecurrente"])){

		
				
	
$_SESSION["FechaFacturames"] = $_POST["FechaFacturames"];
$_SESSION["FechaFacturadia"] = $_POST["FechaFacturadia"];
	
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
						window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
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
									window.location = "ventasrecurrentes";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
			


$Rnc_Empresa_Venta = $_POST["RncEmpresaVentasRecurrente"];
$fechaInicial = null;
$fechaFinal = null;
$VentaRecurrente = ControladorVentas::ctrRangoFechasVentasRecurrentes($Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);

$Rnc_Empresa_607 = $_POST["RncEmpresaVentasRecurrente"];         
$NumeroFactura = 0;
foreach ($VentaRecurrente as $key => $ventas) {
$NumeroFactura = $NumeroFactura + 1;
/*CLIENTE */
$Rnc_Factura_607 = $ventas["Rnc_Cliente"];

$id = "id";
$valorid =  $ventas["id_Cliente"];

$Cliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);
$Tipo_Cliente_Factura = $Cliente["Tipo_Cliente"];
$Nombre_Cliente = $Cliente["Nombre_Cliente"];
$id_Cliente = $ventas["id_Cliente"];
$CorreoCliente = $ventas["Correo_Cliente"];


/***CODIGO FACTURA*****/

$ConsultaCodigo = ControladorVentas::ctrMostrarCodigoVentas($Rnc_Empresa_Venta);
foreach ($ConsultaCodigo  as $key1 => $Codigokey) {}
$CodigoVenta = $Codigokey["Codigo"]+1;

/******** FIN CODIGO FACTURA**************/

/************NCF FACTURAS**************/
$Extraer_NCF_607 = $ventas["EXTRAER_NCF"];
$RncEmpresaVentas = $Rnc_Empresa_Venta;

if($Extraer_NCF_607 == "FP1"){ 

$NCFFactura = $ventas["EXTRAER_NCF"];

$EXTRAERNCF = ControladorCorrelativos::ctrCorrelativosFacNo($RncEmpresaVentas, $NCFFactura);

$Codigo = $EXTRAERNCF["NCF_Cons"]+1;
$length = 8;
$CodigoNCF = substr(str_repeat(0, $length).$Codigo, - $length);


}else{
$NCFFactura = $ventas["EXTRAER_NCF"];
$EXTRAERNCF = ControladorCorrelativos::ctrCorrelativosFac($RncEmpresaVentas, $NCFFactura);

$ExtraerBE = substr($NCFFactura , 0, 1);
	if($ExtraerBE == "B"){
		$Codigo = $EXTRAERNCF["NCF_Cons"]+1;
		$length = 8;
		$CodigoNCF = substr(str_repeat(0, $length).$Codigo, - $length);


	}else{
		$Codigo = $EXTRAERNCF["NCF_Cons"]+1;
		$length = 10;
		$CodigoNCF = substr(str_repeat(0, $length).$Codigo, - $length);

	}
}



$NCF_607 = $NCFFactura.$CodigoNCF;

/************FIN NCF FACTURAS**************/
/************************MONTO FACTURADO*******************************************/
$Monto_Facturado_607 = $ventas["Neto"] - $ventas["Descuento"];
$TotalPrecioImpuesto = $ventas["Impuesto"];

if($ventas["Moneda"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

$USDMonto_Facturado_607 = $Monto_Facturado_607 * $tasa;
$Monto_Facturado_607 = $USDMonto_Facturado_607;
$USDnuevoPrecioImpuesto = $TotalPrecioImpuesto * $tasa;
$TotalPrecioImpuesto = $USDnuevoPrecioImpuesto;


}else{
		$Moneda = "DOP";
		$tasa = "0.00";
		$TotalPrecioImpuesto = $TotalPrecioImpuesto;


	}
/************************FIN MONTO FACTURADO*******************************************/

$Forma_De_Pago_607 = $ventas["Metodo_Pago"];
	
$totalFacturado = $Monto_Facturado_607 + $TotalPrecioImpuesto;

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
if($_POST["observentasrecurrentes"] == "1"){
	$observaciones = $_POST["Observaciones"];


}else{

	$observaciones = $ventas["Observaciones"];


}





$NCF_Modificado_607 = "";
$Tipo_de_Ingreso_607 = "01";
$Fecha_AnoMesDia_607  = $_POST["FechaFacturames"].$_POST["FechaFacturadia"];
$B04MeMa_607 = "";
$Transaccion_607 = "1";

$Fecha_Ret_AnoMesDia_607  = "";
$Fecha_Retencion_AnoMes_607 = "";
$Fecha_Retencion_Dia_607 = "";
$USDITBIS_Retenido_Tercero_607 = "0.00";
$USDRetencion_Renta_por_Terceros_607 = "0.00";
$ITBIS_Retenido_Tercero_607 = "0.00";
$Retencion_Renta_por_Terceros_607 = "0.00";
$Porc_ITBIS_Retenido_607 = 0;
$Porc_ISR_Retenido_607 = 0; 

$ITBIS_Percibido_607 = "0.00";
$ISR_Percibido_607 = "0.00";
$Impuesto_Selectivo_al_Consumo_607 = "0.00";
$Otros_Impuestos_607 = "0";
$Monto_Propina_Legal_607 = "0.00";

$Estatus_607 = "";
$Accion_607 = "CREADO";
$Modulo = "FACTURARECURRENTE";
$banco = 0;
$datos = array("Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $Tipo_Cliente_Factura,
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $Tipo_de_Ingreso_607,
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
"ITBIS_Facturado_607" => bcdiv($TotalPrecioImpuesto, '1', 2),
"ITBIS_Retenido_Tercero_607" => bcdiv($ITBIS_Retenido_Tercero_607, '1', 2),
"ITBIS_Percibido_607" => $ITBIS_Percibido_607,
"Retencion_Renta_por_Terceros_607" => bcdiv($Retencion_Renta_por_Terceros_607, '1', 2),
"ISR_Percibido_607" => $ISR_Percibido_607,
"Impuesto_Selectivo_al_Consumo_607" => $Impuesto_Selectivo_al_Consumo_607,
"Otros_Impuestos_607" => $Otros_Impuestos_607,
"Monto_Propina_Legal_607" => $Monto_Propina_Legal_607,
"Efectivo" => $Efectivo,
"Cheque_Transferencia_Deposito_607" => $CHEQUES,
"Tarjeta_Debito_Credito_607" => $TARJETA,
"Venta_a_Credito_607" => $CREDITO,
"Bonos_607" => $BONOS,
"Permuta_607" => $PERMUTAS,
"Otras_Formas_de_Ventas_607" => $OTRASFORMAS,
"Estatus_607" => $Estatus_607,
"Fecha_comprobante_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_Comprobante_Dia_607" => $_POST["FechaFacturadia"],
"Fecha_Retencion_AnoMes_607" => $Fecha_Retencion_AnoMes_607,
"Fecha_Retencion_Dia_607" => $Fecha_Retencion_Dia_607,
"EXTRAER_NCF_607" => $Extraer_NCF_607,
"extraer_forma_de_pago_607" =>  $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Transaccion_607" => $Transaccion_607,
"Referencia_Pago_607" => $observaciones,
"Banco_607" => $banco,
"Fecha_Trans_AnoMes_607" => $_POST["FechaFacturames"],
"Fecha_trans_dia_607" => $_POST["FechaFacturadia"],
"Descripcion_607" => $observaciones, 
"Nombre_Empresa_607" => $Nombre_Cliente,
"Usuario_Creador" => $_POST["nuevoVendedor"],
"Accion_607" => $Accion_607,
"Codigo_Factura" => $CodigoVenta,
"Modulo" => $Modulo);

$tabla = "607_empresas";

$respuesta =  Modelo607::MdlRegistrar607($tabla, $datos);

/*****************ACTUALIZAR PERIODO DE CONTROL DE EMPRESA***************************/

$tabla = "control_empresas";
		$taRnc_Empresa = "Rnc_Empresa";
		$Rnc_Empresa = $Rnc_Empresa_607;
		$taPeriodo_Empresa = "Periodo_Empresa";
		$Periodo_Empresa = $_POST["FechaFacturames"];
		$tacontrol_Empresa = "607_Empresa";
		$valorestado = "1";

$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);



/*****************ACTUALIZAR CORRELATIVO***************************/

$Extraer_NCF_607 = $ventas["EXTRAER_NCF"];
$RncEmpresaVentas = $Rnc_Empresa_Venta;

if($Extraer_NCF_607 == "FP1"){ 

$tabla = "correlativos_no_fiscal";
	
$datos = array("Rnc_Empresa" => $RncEmpresaVentas,
					"Tipo_NCF" => $NCFFactura,
					"NCF_Cons" => $Codigo);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);


}else{
	$tabla = "correlativos_empresas";
	
$datos = array("Rnc_Empresa" => $RncEmpresaVentas,
					"Tipo_NCF" => $NCFFactura,
					"NCF_Cons" => $Codigo);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);

}
/*****************FIN ACTUALIZAR CORRELATIVO***************************/



/*****************CONSULTA ID REGISTRO***************************/
$tabla = "607_empresas";
$taRnc_Empresa_607 = "Rnc_Empresa_607";
$Rnc_Empresa_607 = $Rnc_Empresa_607;
$taRnc_Factura_607 = "Rnc_Factura_607";
$Rnc_Factura_607 = $Rnc_Factura_607;
$taNCF_607 = "NCF_607";

		

$Consulta607 = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);

	
if($Consulta607 != null && $Consulta607["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $Consulta607["Rnc_Factura_607"] == $Rnc_Factura_607 && $Consulta607["NCF_607"] == $NCF_607){

			
	$id_registro607 = $Consulta607["id"];

	
			
}


/***********************VENDEDOR **************************/

$id_Vendedor = $ventas["id_Vendedor"];
$Nombre_Vendedor = $ventas["Nombre_Vendedor"];


/*****************************************************
	Carga de Bases de Datos de Cuentas Por Cobrar 
******************************************************/


if($ventas["Metodo_Pago"] == "04"){



	$tabla = "cxc_empresas";
	$Dia_Credito_cxc = "15";
	$datos = array("id_607" => $id_registro607,
		"Codigo" => $CodigoVenta,
		"Rnc_Empresa_cxc" => $Rnc_Empresa_607, 
		"id_Cliente" => $id_Cliente,
		"Rnc_Cliente" => $Rnc_Factura_607,
		"Nombre_Cliente" => $Nombre_Cliente,
		"NCF_cxc" => $NCF_607,
		"id_Vendedor" => $id_Vendedor,
		"Nombre_Vendedor" => $Nombre_Vendedor,
		"FechaAnoMes_cxc" => $_POST["FechaFacturames"],
		"FechaDia_cxc" => $_POST["FechaFacturadia"], 
		"Dia_Credito_cxc" => $Dia_Credito_cxc, 
		"Moneda" => $Moneda,
		"Tasa" => $tasa,
		"Neto" => bcdiv($ventas["Neto"], '1', 2), 
		"Descuento"  => bcdiv($ventas["Descuento"], '1', 2), 
		"Impuesto" => bcdiv($ventas["Impuesto"], '1', 2), 
		"Total" => bcdiv($ventas["Total"], '1', 2),
		"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
		"Retencion_Renta" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
		"Observaciones" => $observaciones,
		"Retenciones" => "2",
		"MontoCobrado" => 0,
		"Estado" => "PorCobrar");
$respuesta = ModeloCXC::mdlIngresarcxc($tabla, $datos); 

}

/************************************************ CARGAR CUENTAS CONTABLES****************************/
$NAsiento = "";
$NAsientoRet = "";
/****Consulta asiento factura *****/
	$Rnc_Empresa_Diario = $Rnc_Empresa_607;

	if($Extraer_NCF_607 == "FP1"){ 
		$tipocod = "DFP";
		$Extraer_NAsiento = "DFP";
	}else{

		$tipocod = "DFF";
		$Extraer_NAsiento = "DFF";

	}


	$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;

    $NAsiento = $tipocod.$N;


$idproyecto = $ventas["id_Proyecto"];
$codproyecto = $ventas["CodigoProyecto"]; 
if($_POST["Contabilidad"] == 1){


///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////

$listaProductos =  json_decode($ventas["Producto"], true);

$cuentasproductos = [];	
$costoventa = 0;

foreach ($listaProductos as $pro => $value){

/*establecer costo de venta*/
		if($value["tipoproducto"] == "1"){
			$costoventa = $costoventa + $value["totalcompra"];
			}
		/* fin establecer costo de venta*/



if($pro = 0){
	if($Moneda == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

	}

	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);


}else{

$variable = "DISTINTO";
	
foreach ($cuentasproductos as $key => $cuentas){

if($cuentas["idgrupo"] == $value["idgrupo"] && $cuentas["idcategoria"] == $value["idcategoria"] && $cuentas["idgenerica"] == $value["idgenerica"] && $cuentas["idcuenta"] == $value["idcuenta"]){
		if($Moneda == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

		}

		$suma = $cuentas["credito"] + $value["total"];
		$cuentasproductos[$key]["credito"] = $suma;
		$variable = "IGUAL";


}
}
if($variable == "DISTINTO"){
	if($Moneda == "USD"){
		$cambioMoneda = $value["total"] * $tasa;
		$value["total"] = $cambioMoneda;

		}
	$cuentasproductos [] = array("idgrupo" => $value["idgrupo"],
"idcategoria" => $value["idcategoria"],
"idgenerica" => $value["idgenerica"],
"idcuenta" => $value["idcuenta"],
"nombrecuenta" => $value["nombrecuenta"],
"debito" => 0,
"credito" => bcdiv($value["total"], '1', 2),
"ObservacionesLD" => $value["descripcion"]);

}
}


}/*****cierre for de comparar cuentas********/


///*******************************************************//////////
	/*EVALUAR CUENTAS CONTABLES PRODUCTOS*/
///*******************************************************//////////
foreach ($cuentasproductos as $key => $value) {
$tabla = "librodiario_empresas";
$ObservacionesLD = $observaciones;
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = $value["idgrupo"];
$idcategoria = $value["idcategoria"];
$idgenerica = $value["idgenerica"];
$idcuenta = $value["idcuenta"];
$nombrecuenta = $value["nombrecuenta"];
$debito = $value["debito"];;
$credito = bcdiv($value["credito"], '1', 2);
$ObservacionesLD = $value["ObservacionesLD"];

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $Nombre_Cliente,
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
					"referencia" => $ventas["Referencia"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }

if($ventas["Metodo_Pago"] == "04"){
	$totalVentas = $ventas["Total"];
	
	if($Moneda == "USD"){
		$totalVentas = $ventas["Total"] * $tasa;
	}
	
$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "2";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "cuentas por cobrar comerciales";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $Nombre_Cliente,
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
					"referencia" => $ventas["Referencia"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}/*CIERRE CUENTA CONTABLE*/
else{

$totalVentas = $ventas["Total"];
	
	if($Moneda == "USD"){
		$totalVentas = $ventas["Total"] * $tasa;
	}

$tabla = "librodiario_empresas";
$ObservacionesLD = $_POST["Observaciones"];
$Accion = "FACTURA";
$Transaccion_607 = 1;
$idbanco = 0;
$idgrupo = "1";
$idcategoria = "1";
$idgenerica = "01";
$idcuenta = "002";
$nombrecuenta = "caja general";
$debito = bcdiv($totalVentas, '1', 2);
$credito = 0;


$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $Nombre_Cliente,
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
					"referencia" => $ventas["Referencia"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

 }/*CIERRE ELSE CUENTA CONTABLE*/
if ($ventas["Impuesto"] > 0) {
 	$nuevoPrecioImpuesto = $ventas["Impuesto"];
 	if($Moneda == "USD"){

 	$USDnuevoPrecioImpuesto = $ventas["Impuesto"] * $tasa;
	$nuevoPrecioImpuesto = $USDnuevoPrecioImpuesto;

	}

$idgrupo = "2";
$idcategoria = "4";
$idgenerica = "01";
$idcuenta = "001";
$nombrecuenta = "ITBIS en ventas por pagar";
$debito = 0;
$credito = bcdiv($nuevoPrecioImpuesto, '1', 2);

	
$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $Nombre_Cliente,
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
					"referencia" => $ventas["Referencia"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }

if($ventas["Descuento"] > 0){
 	$Descuento = $ventas["Descuento"];

 	if($Moneda == "USD"){

 	$USDDescuento = $ventas["Descuento"] * $tasa;
	$Descuento = $USDDescuento;

	}
		$idgrupo = "4";
		$idcategoria = "8";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "descuentos en ventas";
		$debito = bcdiv($Descuento, '1', 2);
		$credito = 0;
	
$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $Nombre_Cliente,
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
					"referencia" => $ventas["Referencia"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

 
 }
 if($costoventa > 0){ /*costos de ventas*/
 		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "005";
		$nombrecuenta = "costos de ventas";
		$debito = bcdiv($costoventa, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = 0;
		$credito = bcdiv($costoventa, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_607,
					"id_registro" => $id_registro607,
					"Rnc_Factura" => $Rnc_Factura_607,
					"NCF" => $NCF_607,
					"Nombre_Empresa" => $_POST["Nombre_Cliente"],
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
					"referencia" => $_POST["listaMetodoPago"],
					"Usuario_Creador" => $_POST["nuevoVendedor"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


 }/*costos de ventas*/


 if($respuesta == "ok"){

/***** ACTUALIZAR CORRELATIVOS ***********************************************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = $tipocod;
			
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_607,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos); 
	
 }

}/***CIERRE IF CONTABILIDAD***/

								
/************************************************************************
ACTUALIZAR LAS COMPRAS DEL CLIENTE Y REDUCIR EL STCKO DE LAS VENTAS PRODUCTOS
*************************************************************************/

			$listaProductos =  json_decode($ventas["Producto"], true);

			$totalProductosComprados = array();

			if($ventas["TipodeInventario"] == "1"){
				$tablaProductos = "productos_empresas";


			}else {
				$tablaProductos = "productos_activor_empresas";


			}


			
			foreach ($listaProductos as $key => $value) {

				array_push($totalProductosComprados, $value["cantidad"]);



				$id = "id";

				$valorid = $value["id"];

				$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

				

				$item1a = "Ventas";

				$valor1a = $value["cantidad"] + $traerProductos["Ventas"];

				$nuevasVentas = ModeloProductos::MdlActualizarProductoVentas($tablaProductos, $item1a, $valor1a, $id, $valorid);

				$item1b = "Stock";
				$valor1b = $value["Stock"];

				$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1b, $id, $valorid);
if($value["tipoproducto"] == "1"){
$tabla = "productos_empresas";
$id = "id";
$valoridProducto = $value["id"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];


$tabla = "historico_productos_empresas";
$Accion = "VENTA";

$datos = array ("Rnc_Empresa_Productos" => $Rnc_Empresa_607,
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => "0", 
      "Precio_Venta" => $value["precio"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames"],
      "Fecha_dia" => $_POST["FechaFacturadia"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_607,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["nuevoVendedor"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);	
 }/*CIERRE DE IF TIPO PRODUCTO*/

			
			}/*CIERRO FOREACH*/

			$tablaClientes = "clientes_empresas";

			$id = "id";

			$valorid = $id_Cliente;

			$traeCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);
			

			$item = "Compras";
			$valor = array_sum($totalProductosComprados) + $traeCliente["Compras"];

			
			$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);

				/*FECHA ULTIMA COMPRA CLIENTE */

			$item = "Ultima_Compra";

			date_default_timezone_set('America/Santo_Domingo');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$fechaActual = $fecha.' '.$hora;

			$valor = $fechaActual;

			
			$comprasCliente =ModeloClientes::MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid);


			/**********************************************
						GUARDAR LA COMPRA
			***********************************************/
		
			$NCF_Factura = $NCF_607;
			$Comision = $ventas["Comision"];
			$Usuario_Creador = $_POST["nuevoVendedor"];

			$Accion_Factura = "Creada";

			if($ventas["Metodo_Pago"] == "04"){
				$Estatus = "CREDITO";

			} else{
				
				$Estatus = "POR DEPOSITAR";

			}
			
			

			 	$NAsientoRet = "";
			
	
			

	$tabla = "ventas_empresas";
	$Estado = "1";
	$Retenciones = "2";

$datos = array("Rnc_Empresa_Venta" => $Rnc_Empresa_607,
	"id_607" => $id_registro607, 
	"Codigo" => $CodigoVenta,
	"Rnc_Cliente" => $Rnc_Factura_607,
	"Nombre_Cliente" => $Nombre_Cliente, 
	"NCF_Factura" => $NCF_Factura, 
	"FechaAnoMes" => $_POST["FechaFacturames"], 
	"FechaDia" => $_POST["FechaFacturadia"], 
	"id_Cliente" => $id_Cliente,
	"Correo_Cliente" => $CorreoCliente, 
	"id_Vendedor" => $id_Vendedor,
	"Nombre_Vendedor" => $Nombre_Vendedor, 
	"Producto" => $ventas["Producto"],
	"Porimpuesto" => $ventas["Porimpuesto"],
	"Pordescuento" => $ventas["Pordescuento"],
	"Moneda" => $ventas["Moneda"],
	"Tasa" => $tasa,
	"Impuesto" => bcdiv($ventas["Impuesto"], '1', 2), 
	"Neto" => bcdiv($ventas["Neto"], '1', 2), 
	"Descuento" => bcdiv($ventas["Descuento"], '1', 2),
	"Total" => bcdiv($ventas["Total"], '1', 2), 
	"Metodo_Pago" => $ventas["Metodo_Pago"], 
	"Comision" => $Comision,
	"Estatus" => $Estatus,
	"Referencia" => $ventas["Referencia"],
	"id_Proyecto" => $idproyecto,
	"CodigoProyecto" => $codproyecto,
	"Observaciones" => $observaciones, 
	"Retenciones" => $Retenciones,
	"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_607,
	"Porc_ISR_Retenido" => $Porc_ISR_Retenido_607,
	"ITBIS_Retenido_Tercero" => bcdiv($USDITBIS_Retenido_Tercero_607, '1', 2),
	"RetencionRenta_por_Terceros" => bcdiv($USDRetencion_Renta_por_Terceros_607, '1', 2),
	"EXTRAER_NCF" => $Extraer_NCF_607, 
	"NAsiento" => $NAsiento,
	"NAsientoRet" => $NAsientoRet,
	"TipodeInventario" => $ventas["TipodeInventario"],
	"Estado" => $Estado,
	"Usuario_Creador" => $Usuario_Creador, 
	"Accion_Factura" => $Accion_Factura);
		
$respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);



}/*cierre for VentaRecurrente*/
if($respuesta == "ok"){


echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE FACTURAS REGISTRADAS:<u>'.$NumeroFactura.'</u></strong></h1>",
			html: "<h3>¡Las Ventas Recurrentes Se Registraron Correctamente!</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "ventasrecurrentes";
		}

		});

</script>';			
}
}/*cierre isset*/
}/*cierre venta recurrente*/


static public function ctrValidarClienteRecurrente($taRnc_Cliente, $Rnc_Cliente, $Rnc_Empresa_Venta){
		
		$tabla = "ventasrecurrentes_empresas";
		$taRnc_Empresa_Venta = "Rnc_Empresa_Venta";
		

				
	$respuesta = ModeloVentas::MdlValidarClienteRecurrete($tabla, $taRnc_Cliente, $taRnc_Empresa_Venta, $Rnc_Cliente, $Rnc_Empresa_Venta);
		
		return $respuesta;

 }



static public function ctrMostarReciboDeposito($Rnc_Empresa_VentaContado){

		$tabla = "reciboventascontado_empresas";
		$taRnc_Empresa_VentaContado = "Rnc_Empresa_VentaContado";


		$respuesta =  ModeloVentas::mdlMostarReciboDeposito($tabla, $taRnc_Empresa_VentaContado, $Rnc_Empresa_VentaContado);

		return $respuesta;


}


static public function ctrEditarReciboDeposito($id, $idventascontado){

		$tabla = "reciboventascontado_empresas";
		$respuesta = ModeloVentas::mdlEditarReciboDeposito($tabla, $id, $idventascontado);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/





static public function ctrEliminarcargamasivadeposito(){
 if(isset($_GET["accionCargamasivacontado"]) && isset($_GET["NAsiento"])){

$id = "id";  
$idventascontado = $_GET["id"];

$ventascontado = ControladorVentas::ctrEditarReciboDeposito($id, $idventascontado);

$ventascontadoAntes = json_decode($ventascontado["Facturas"], true); 

foreach ($ventascontadoAntes as $key => $value) { 

$tabla = "ventas_empresas";
$Estado = 1;
				
$datos = array("Rnc_Empresa_Venta" => $_GET["Rnc_Empresa_VentaContado"],
"id" => $value["id"],
"Rnc_Cliente" => $value["rncCliente"],
"NCF_Factura" => $value["nCFFactura"],
"Estado" => $Estado);
					
          
  $bloqueo = ModeloVentas::mdlActualizarVentaContado($tabla, $datos);
	
	$tabla = "librodiario_empresas";
	

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_GET["Rnc_Empresa_VentaContado"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "RPG";

	$taNAsiento = "NAsiento";
	$NAsiento = $_GET["NAsiento"];

	
$respuesta = ModeloDiario::mdlBorrarReciboVentascontado($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key1 => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}


 }

$tabla = "reciboventascontado_empresas";
$valorid = $_GET["id"];
$Borrarpago = ModeloCXP::mdlBorrarpago($tabla, $valorid);


if($Borrarpago == "ok"){

		echo '<script>
						swal({
						type: "success",
						title: "¡Se Elimini Correctamente el Deposito!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{

						if(result.value){
							window.location = "detallerecibodedeposito";
						}

					});

			</script>';

				}


 }/*cierre isset*/

}/*Funcion eliminar recibo de deposito*/



static public function ctrdercargarXMLVenta(){

	if (isset($_GET["DGIIventa"]) && $_GET["DGIIventa"] == "ENVIARVENTADGII"){

$objetoXML = new XMLWriter();/*creacion del archivo XML*/

$objetoXML -> openURI($_GET['RncEmpresaVenta'].$_GET['NCF607'].".xml");

$objetoXML -> setIndent(true); /*recibe un vlor bolean para establecer si los distintos niveles de nodos XML deben quedar indentados o no*/

$objetoXML -> setIndentString("\t"); 

$objetoXML -> startDocument('1.0', 'utf-8');

$objetoXML -> startElement("etiquetaPrincipal");

$objetoXML -> endElement();

$objetoXML -> endDocument();



	


	}
		



}/*cierre funcion */





}/*CIERRE DE CLASES VENTAS*/




