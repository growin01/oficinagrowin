<?php 

class Controlador607{

static public function ctrRegistrar607(){
	
	if(isset($_POST["NCF607"])){
		$_SESSION["FechaFacturames_607"] = $_POST["FechaFacturames_607"];
		$_SESSION["FechaFacturadia_607"] = $_POST["FechaFacturadia_607"];
		$_SESSION["Rnc_Factura_607"] = $_POST["Rnc_Factura_607"];
		$_SESSION["NCF607"] = $_POST["NCF607"];
        $_SESSION["CodigoNCF607"] = $_POST["CodigoNCF607"];
		$_SESSION["NCF_Modificado_607"] = $_POST["NCF_Modificado_607"];
		$_SESSION["Monto_Facturado_607"] = $_POST["Monto_Facturado_607"];
		$_SESSION["ITBIS_Facturado_607"] = $_POST["ITBIS_Facturado_607"];
		$_SESSION["Monto_Propina_Legal_607"] = $_POST["Monto_Propina_Legal_607"];
        $_SESSION["Impuesto_Selectivo_al_Consumo_607"] = $_POST["Impuesto_Selectivo_al_Consumo_607"];
		$_SESSION["Otros_Impuestos_607"] = $_POST["Otros_Impuestos_607"];
		$_SESSION["Nombre_Empresa_607"] = $_POST["Nombre_Empresa_607"];
		$_SESSION["Tipo_cliente_607"] = $_POST["Tipo_cliente_607"];
		$_SESSION["Forma_De_Pago_607"] = $_POST["Forma_De_Pago_607"];
		$_SESSION["Transaccion_607"] = $_POST["Transaccion_607"];
		$_SESSION["FechaPagomes607"] = $_POST["FechaPagomes607"];
		$_SESSION["FechaPagodia607"] = $_POST["FechaPagodia607"];
		$_SESSION["Referencia_607"] = $_POST["Referencia_607"];
		$_SESSION["Descripcion"] = $_POST["Descripcion"];

		if(isset($_POST["B04MeMa_607"]) && ($_POST["B04MeMa_607"] == 1 || $_POST["B04MeMa_607"] == 2)){
			$_SESSION["B04MeMa_607"] = $_POST["B04MeMa_607"];
		}else{
			$_SESSION["B04MeMa_607"] = "";

		}
		
$NCF607 = $_POST["NCF607"];
$CodigoNCF = $_POST["CodigoNCF607"];				
				
$NCF_607 = $NCF607.$CodigoNCF;

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
												window.location = "registro-607";
											}

											});

								</script>';


		exit;

}
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



		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

$Extraer_NCF_607 = $_POST["NCF607"];

		if($Extraer_NCF_607 == "B04" && $_POST["NCF_Modificado_607"] == ""){
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
		if($Extraer_NCF_607 == "B04" && strlen($_POST["NCF_Modificado_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE CONTENER 11 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "B03" && strlen($_POST["NCF_Modificado_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B03 DEBE CONTENER 11 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "E34" && strlen($_POST["NCF_Modificado_607"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE CONTENER 13 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "E33" && strlen($_POST["NCF_Modificado_607"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E33 DEBE CONTENER 13 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
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
									window.location = "registro-607";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[0-9]+$/', $_POST["CodigoNCF607"]))){
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
				$tabla = "growin_dgii";
				$taRnc_Growin_DGII = "Rnc_Growin_DGII";
				$ValorRnc_Growin_DGII = $_POST["Rnc_Factura_607"];
				$ValorNombreGrowin_DGII = $_POST["Nombre_Empresa_607"];
				$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);	

if((strlen($_POST["Rnc_Factura_607"]) == 9 || strlen($_POST["Rnc_Factura_607"] == 11)) && $_POST["Nombre_Empresa_607"] != ""){ 

				

	if($growin_Dgii != false &&  $growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
			$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, 
				"Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

		$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);



}
	

}else if ($growin_Dgii != false &&  $growin_Dgii["Rnc_Growin_DGII"] == $ValorRnc_Growin_DGII){
				
		$_POST["Nombre_Empresa_607"] = $growin_Dgii["Nombre_Empresa_Growin"];



}
			
 

			
			/*VALIDACIONES*/

			
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
									window.location = "registro-607";
													
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
	if(strlen($_POST["FechaFacturadia_607"]) != 2){
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
	if($_POST["FechaFacturadia_607"] < 0){
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
	if($_POST["FechaFacturadia_607"] > 31){
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

	if($_POST["Tipo_cliente_607"] == 1 && strlen($_POST["Rnc_Factura_607"]) != 9){
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
	if($_POST["Tipo_cliente_607"] == 2 && strlen($_POST["Rnc_Factura_607"]) != 11){
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

	if(substr($_POST["NCF607"], 0, 1) == "B" && strlen($_POST["CodigoNCF607"]) != 8){
		
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
	if(substr($_POST["NCF607"], 0, 1) == "E" && strlen($_POST["CodigoNCF607"]) != 10){
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

$Monto_Facturado_607 = $_POST["Monto_Facturado_607"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$PropinaLegal = $Monto_Facturado_607 * 0.1;


$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
$CalculoPropinaLegal = bcdiv($PropinaLegal, '1', 2);

if($_POST["ITBIS_Facturado_607"] > $CalculoITBIS){
		 
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
						
if($_POST["Monto_Propina_Legal_607"] > $CalculoPropinaLegal){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO de Propina legal no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});


												
								</script>';	
			exit;	
	}
$Forma_De_Pago_607 = $_POST["Forma_De_Pago_607"];
$totalFacturado = $_POST["ITBIS_Facturado_607"] + $_POST["Monto_Facturado_607"];

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

									 
if(isset($_POST["B04MeMa_607"]) && !empty($_POST["B04MeMa_607"])){
	$B04MeMa_607 = $_POST["B04MeMa_607"];					
}else{
	$B04MeMa_607 = "";
} 

if(isset($_POST["Transaccion_607"]) && !empty($_POST["Transaccion_607"])){
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
$Impuesto_Selectivo_al_Consumo_607 = $_POST["Impuesto_Selectivo_al_Consumo_607"];
$Otros_Impuestos_607 = $_POST["Otros_Impuestos_607"];
$Monto_Propina_Legal_607 = $_POST["Monto_Propina_Legal_607"];
$Estatus_607 = "";
$Fecha_Retencion_AnoMes_607 = "";
$Fecha_Retencion_Dia_607 = "";
$Porc_ITBIS_Retenido_607 = "0.00";
$Porc_ISR_Retenido_607 = "0.00";
$Accion_607 = "CREADO";
$Codigo_Factura = 0;
$Modulo = "607";
      											 

$tabla = "607_empresas";
$datos = array("Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Tipo_cliente_607"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $_POST["Tipo_de_Ingreso"],
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
"ITBIS_Facturado_607" => bcdiv($_POST["ITBIS_Facturado_607"], '1', 2),
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
"EXTRAER_NCF_607" => $Extraer_NCF_607,
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


		
			unset($_SESSION["FechaFacturadia_607"]); 
			unset($_SESSION["Rnc_Factura_607"] ); 
        	unset($_SESSION["CodigoNCF607"]);
			unset($_SESSION["NCF_Modificado_607"]); 
			unset($_SESSION["Monto_Facturado_607"]); 
			unset($_SESSION["ITBIS_Facturado_607"]); 
			unset($_SESSION["Monto_Propina_Legal_607"]);
            unset($_SESSION["Impuesto_Selectivo_al_Consumo_607"]);
            unset($_SESSION["Otros_Impuestos_607"]); 
			unset($_SESSION["Nombre_Empresa_607"]);
			unset($_SESSION["B04MeMa_607"]);
			unset($_SESSION["FechaPagomes607"]);
			unset($_SESSION["FechaPagodia607"]);
			unset($_SESSION["Referencia_607"]);
			unset($_SESSION["Descripcion"]);



		echo '<script>

			swal({
							
				type: "success",
				title: "¡El Registro 607 Se Guardo Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
					}).then((result)=>{

						if(result.value){
							window.location = "registro-607";


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

static public function ctrEditar607(){
	
	if(isset($_POST["Editar_id_607"])){

		
		

			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["Editar-Rnc_Factura_607"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Empresa_607"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

			if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
				$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

					$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);



			}


			/*VALIDACION QUE LA FACUTRA NO SE REPITA */

$NCF607 = $_POST["NCF607"];
$CodigoNCF = $_POST["CodigoNCF607"];				
				
$NCF_607 = $NCF607.$CodigoNCF;
/*VALIDACION QUE LA FACUTRA NO SE REPITA */

		$tabla = "607_empresas";
		$taRnc_Empresa_607 = "Rnc_Empresa_607";
		$Rnc_Empresa_607 = $_POST["RncEmpresa607"];
		$taRnc_Factura_607 = "Rnc_Factura_607";
		$Rnc_Factura_607 = $_POST["Rnc_Factura_607"];
		$taNCF_607 = "NCF_607";

			

$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607, $taNCF_607, $NCF_607);

if($FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["NCF_607"] == $NCF_607 && $FacturaRepetida["id"] != $_POST["Editar_id_607"]){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
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


$Extraer_NCF_607 = $_POST["NCF607"];

		if($Extraer_NCF_607 == "B04" && $_POST["NCF_Modificado_607"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "B04" && strlen($_POST["NCF_Modificado_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE CONTENER 11 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "B03" && strlen($_POST["NCF_Modificado_607"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B03 DEBE CONTENER 11 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "E34" && strlen($_POST["NCF_Modificado_607"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE CONTENER 13 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
													});
												
								</script>';	
					exit;  
		}
		if($Extraer_NCF_607 == "E33" && strlen($_POST["NCF_Modificado_607"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E33 DEBE CONTENER 13 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[0-9]+$/', $_POST["CodigoNCF607"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
													
													});
												
								</script>';	
					exit;
	}	
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/	
				$tabla = "growin_dgii";
				$taRnc_Growin_DGII = "Rnc_Growin_DGII";
				$ValorRnc_Growin_DGII = $_POST["Rnc_Factura_607"];
				$ValorNombreGrowin_DGII = $_POST["Nombre_Empresa_607"];
				$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);
		
if((strlen($_POST["Rnc_Factura_607"]) == 9 || strlen($_POST["Rnc_Factura_607"] == 11)) && $_POST["Nombre_Empresa_607"] != ""){ 
	
				
	if($growin_Dgii != false &&  $growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
			$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, 
				"Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

		$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);



	}
 }else if ($growin_Dgii != false &&  $growin_Dgii["Rnc_Growin_DGII"] == $ValorRnc_Growin_DGII){
				
		$_POST["Nombre_Empresa_607"] = $growin_Dgii["Nombre_Empresa_Growin"];



}

			
			/*VALIDACIONES*/

			
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
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
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
						window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
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
									window.location = "reporte-607";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	if($_POST["Tipo_cliente_607"] == 1 && strlen($_POST["Rnc_Factura_607"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
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
									window.location = "reporte-607";
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/	
	/*******INICIO VALIDACION DE NCF*****/

	if(substr($_POST["NCF607"], 0, 1) == "B" && strlen($_POST["CodigoNCF607"]) != 8){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
								});

	
								</script>';
				exit;
	}
	if(substr($_POST["NCF607"], 0, 1) == "E" && strlen($_POST["CodigoNCF607"]) != 10){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-607";
								});

	
								</script>';
				exit;
	}	
	



$Monto_Facturado_607 = $_POST["Monto_Facturado_607"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$PropinaLegal = $Monto_Facturado_607 * 0.1;


$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
$CalculoPropinaLegal = bcdiv($PropinaLegal, '1', 2);

if($_POST["ITBIS_Facturado_607"] > $CalculoITBIS){
		 
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
if($_POST["Monto_Propina_Legal_607"] > $CalculoPropinaLegal){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO de Propina legal no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});


												
								</script>';	
			exit;	
	}
						

$Forma_De_Pago_607 = $_POST["Forma_De_Pago_607"];
$totalFacturado = $_POST["ITBIS_Facturado_607"] + $_POST["Monto_Facturado_607"];

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

											

									 
if(isset($_POST["B04MeMa_607"]) && !empty($_POST["B04MeMa_607"])){
	$B04MeMa_607 = $_POST["B04MeMa_607"];					
}else{
	$B04MeMa_607 = "";
} 

if(isset($_POST["Transaccion_607"]) && !empty($_POST["Transaccion_607"])){
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
$Impuesto_Selectivo_al_Consumo_607 = $_POST["Impuesto_Selectivo_al_Consumo_607"];
$Otros_Impuestos_607 = $_POST["Otros_Impuestos_607"];
$Monto_Propina_Legal_607 = $_POST["Monto_Propina_Legal_607"];
$Estatus_607 = "";
$Fecha_Retencion_AnoMes_607 = "";
$Fecha_Retencion_Dia_607 = "";
$Porc_ITBIS_Retenido_607 = "0.00";
$Porc_ISR_Retenido_607 = "0.00";
$Accion_607 = "EDITADO";
$Codigo_Factura = 0;
$Modulo = "607";

$tabla = "607_empresas";									
$datos = array("id" => $_POST["Editar_id_607"],
"Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Tipo_cliente_607"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $_POST["Tipo_de_Ingreso"],
"Fecha_AnoMesDia_607" => $Fecha_AnoMesDia_607,
"Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607,
"Monto_Facturado_607" => bcdiv($Monto_Facturado_607, '1', 2),
"ITBIS_Facturado_607" => bcdiv($_POST["ITBIS_Facturado_607"], '1', 2),
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
"EXTRAER_NCF_607" => $Extraer_NCF_607,
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

$respuesta =  Modelo607::MdlEditar607($tabla, $datos);

if($respuesta == "ok"){

	$tabla = "control_empresas";
	$taRnc_Empresa = "Rnc_Empresa";
	$Rnc_Empresa = $Rnc_Empresa_607;
	$taPeriodo_Empresa = "Periodo_Empresa";
	$Periodo_Empresa = $_POST["FechaFacturames_607"];
	$tacontrol_Empresa = "607_Empresa";
	$valorestado = "1";


	$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);


										

			$modulo = $_POST["modulo"];
		switch ($modulo) {
			case 'reporte-607':
				echo '<script>
	swal({
		type: "success",
		title: "¡El Registro 607 Se ha Modificado Correctamente!",
		showConfirmButton: true,
		confirmButtonText: "Cerrar",
		closeOnConfirm: false
			}).then((result)=>{

				if(result.value){
					window.location = "reporte-607";
				}

				});

	</script>';
				break;
			case 'registro-607':
			echo '<script>
	swal({
		type: "success",
		title: "¡El Registro 607 Se ha Modificado Correctamente!",
		showConfirmButton: true,
		confirmButtonText: "Cerrar",
		closeOnConfirm: false
			}).then((result)=>{

				if(result.value){
					window.location = "registro-607";
				}

				});

	</script>';
				break;
			
		}
										
}/* CIERRO SI DE RESPUESTA */
										




		
	

}/* CERRAR ISSET*/

}/* CERRAR FUNCION ctrRegistrar606*/ 

static public function ctrMostrarReporte607($Rnc_Empresa_607, $Orden, $periodoreporte607){

			$tabla = "607_empresas";
			$taRncEmpresa607 = "Rnc_Empresa_607";


		$respuesta = Modelo607::mdlMostrarReporte607($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $Orden, $periodoreporte607);

		return $respuesta;



	}
	static public function ctrMostrar607($Rnc_Empresa_607, $id_607, $Valor_id607, $Orden){

			$tabla = "607_empresas";
			$taRncEmpresa607 = "Rnc_Empresa_607";


		$respuesta = Modelo607::mdlMostrar607($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $id_607, $Valor_id607, $Orden);

		return $respuesta;



	}
	static public function ctrMostrar607Retener($id_607, $Valor_id607){

			$tabla = "607_empresas";
			

		$respuesta = Modelo607::mdlMostrar607Retener($tabla, $id_607, $Valor_id607);

		return $respuesta;



	}

	/**************************************************
	MOSTRAR CLIENTES
	***************************************************/
	static public function ctrMostrarPeriodo607($Rnc_Empresa_607){

			$tabla = "607_empresas";
			$taRncEmpresa607 = "Rnc_Empresa_607";
			$taFecha_AnoMes_607 = "Fecha_AnoMes_607";

		$respuesta = Modelo607::mdlMostrarPeriodo607($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $taFecha_AnoMes_607);

		return $respuesta;




	}

/*AGREGAR RETENCION*/

static public function ctrAgregarretencion607(){
	
	if(isset($_POST["id_607_Retener"])){


		if(preg_match('/^[0-9]+$/', $_POST["FechaRetenecionmes_607"]) && 
			preg_match('/^[0-9]+$/', $_POST["FechaReteneciondia_607"])){

			/*VALIDACIONES*/

			$fechaano = substr($_POST["FechaRetenecionmes_607"], 0, 4);
			$fechames = substr($_POST["FechaRetenecionmes_607"], -2);



			if(($fechaano >= 2018) && ($fechaano <= 2022) && (strlen($_POST["FechaRetenecionmes_607"]) == 6) ){
				
				if(($fechames > 0) && ($fechames <= 12)){
					
					if(($_POST["FechaReteneciondia_607"] > 0) && ($_POST["FechaReteneciondia_607"] <= 31)  && (strlen($_POST["FechaReteneciondia_607"]) == 2)){

						$tabla = "607_empresas";
											
					
						date_default_timezone_set('America/Santo_Domingo');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');
						$fechaActual = $fecha.' '.$hora;

						$Fecha_Registro = $fechaActual;

						$Accion_607 = "Retener";
						$Fecha_Ret_AnoMesDia_607 = $_POST["FechaRetenecionmes_607"].$_POST["FechaReteneciondia_607"];

		$datos = array("id" => $_POST["id_607_Retener"], "Usuario_Creador" => $_POST["Usuariologueado"], "Fecha_Registro" => $Fecha_Registro, "Accion_607" => $Accion_607, "Fecha_Ret_AnoMesDia_607" => $Fecha_Ret_AnoMesDia_607, "Fecha_Retencion_AnoMes_607" => $_POST["FechaRetenecionmes_607"], "Fecha_Retencion_Dia_607" => $_POST["FechaReteneciondia_607"],  "ITBIS_Retenido_Tercero_607" => $_POST["Monto_ITBIS_Retenido_607"], "Retencion_Renta_por_Terceros_607" => $_POST["Monto_ISR_Retenido_607"], "Porc_ITBIS_Retenido_607" => $_POST["ITBIS_Retenido_607"], "Porc_ISR_Retenido_607" => $_POST["ISR_RETENIDO_607"]);

$respuesta = Modelo607::MdlAgregarretencion607($tabla, $datos);

if($_POST["Forma_De_Pago"] == "04"){

		$tabla = "cxc_empresas";
		$taCodigo = "Codigo";
		$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";

		$Codigo_Factura = $_POST["Codigo_Factura"];
		$Rnc_Empresa_cxc = $_POST["RncEmpresaRetener"];
		$NCF_607 = $_POST["NCF_Factura"];

$CXC = ModeloCXC::mdlMostarCXCFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa_cxc);
									
									
if($CXC["Rnc_Empresa_cxc"] == $Rnc_Empresa_cxc && $CXC["Codigo"] == $Codigo_Factura){
$Retenciones = "1";
	$datos = array("Codigo" => $Codigo_Factura, 
				"Rnc_Empresa_cxc" => $Rnc_Empresa_cxc,
				"Fecha_Ret_AnoMes_cxc" => $_POST["FechaRetenecionmes_607"], 
				"Fecha_Ret_Dia_cxc" => $_POST["FechaReteneciondia_607"], 
				"ITBIS_Retenido" => $_POST["Monto_ITBIS_Retenido_607"], 
				"Retencion_Renta" => $_POST["Monto_ISR_Retenido_607"]);
				/*editar cxc*/

$respuesta = ModeloCXC::mdlEDITARCXCRETENCION($tabla, $datos);
		} 

}

if($respuesta == "ok"){
	if(isset($_POST["Modulo"])){
		$modulo = $_POST["Modulo"];
	

	switch ($modulo) {
		case 'ventas':
		echo '<script>
							swal({
								type: "success",
								title: "¡Se Realizo la Retención Correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
									}).then((result)=>{

										if(result.value){
											window.location = "ventas";
										}

										});

							</script>';
							
				
			break;
		}  
	}else{
		echo '<script>
							swal({
								type: "success",
								title: "¡Se Realizo la Retención Correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
									}).then((result)=>{

										if(result.value){
											window.location = "registro-607";
										}

										});

							</script>';
							
		

	}
		

		


}/* CIERRO SI DE RESPUESTA */



						}/*CIERRE FECHA DIA*/


				} /*CIERRE FECHA MES*/


			}/*CIERRE FEHCA AÑO*/








		}/*CIERRE PREMACHT*/




	}/*CIERRE SI ISSET*/






}/*CIERRE FUNCION DE CTRAGREGARRETENCION606*/


static public function ctrDescargaTXT606(){

	if(isset($_POST["Periodoreporte606"])){

	

			$tabla = "606_empresas";
			$taRncEmpresa606 = "Rnc_Empresa_606";
			$taFecha_AnoMes_606 = "Fecha_AnoMes_606";
			$Fecha_AnoMes_606 = $_POST["Periodoreporte606"];
			$Rnc_Empresa_606 = "131385992";

			$respuesta = Modelo606::mdlRangoFecha606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $taFecha_AnoMes_606, $Fecha_AnoMes_606);

			

			//mkdir($directorio, 0755);

			$Name = $Rnc_Empresa_606.'.txt';// Nombre del archivo final
			$directorio = "vistas/impuestos/".$Rnc_Empresa_606;

			mkdir($directorio, 0755);
			
			
			

 }

}


/***************************************************
		BORRAR CATEGORIAS
	*****************************************************/

	static public function ctrBorrar607(){
		
		if(isset($_GET["id_607"])){
				$tabla = "607_empresas";
				$id_607 = "id";
				$Valor_id607 = $_GET["id_607"];

$crear608 =  Modelo607::mdlMostrar607Retener($tabla, $id_607, $Valor_id607);

$Fecha_AnoMesDia_608  = $crear608["Fecha_AnoMesDia_607"];
$Estatus_608 = "";
$Accion_608 = "CREADO";
$Modulo = "607";
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
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Registro 607  se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "reporte-607";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/

		}


	}


static public function ctrValidarRNCNCF($RncEmpresa606, $ValorRncEmpresa606, $Rnc_Factura_606, $ValorRnc_Factura_606, $NCF_606, $ValorNCF_606){

	$tabla = "606_empresas";
		
						
	$respuesta = ModeloCategorias::MdlValidarRNCNCF($tabla, $RncEmpresa606, $ValorRncEmpresa606, $Rnc_Factura_606, $ValorRnc_Factura_606, $NCF_606, $ValorNCF_606);
		
		return $respuesta;	 

	}/*CIERRA FUNCION VALIDAR USUARIO*/

static public function ctrRegistrarBCF(){
	
 if(isset($_POST["NCF_BCF"])){

$_SESSION["FechaFacturames_607"] = $_POST["FechaFacturames_607"];
$_SESSION["FechaFacturadia_607"] = $_POST["FechaFacturadia_607"];


			/*VALIDACION QUE LA FACUTRA NO SE REPITA */

				$tabla = "607_empresas";
				$taRnc_Empresa_607 = "Rnc_Factura_607";
				$Rnc_Empresa_607 = $_POST["RncEmpresa607"];
				$taRnc_Factura_607 = "Rnc_Factura_607";
				$Rnc_Factura_607 = $_POST["Rnc_Factura_607"];
				$taNCF_607 = "NCF_607";
				$NCF_607 = $_POST["NCF_BCF"];

			

			$FacturaRepetida = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607, $taNCF_607, $NCF_607);

		if($FacturaRepetida["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $FacturaRepetida["Rnc_Factura_607"] == $Rnc_Factura_607 && $FacturaRepetida["NCF_607"] == $NCF_607){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "bcf";
											}

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
									window.location = "bcf";
													
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
									window.location = "bcf";
													
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
									window.location = "bcf";
													
													});
												
								</script>';	
					exit;
	}  

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
									window.location = "bcf";
													
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
									window.location = "bcf";
													
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
									window.location = "bcf";
													
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
									window.location = "bcf";
													
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
									window.location = "bcf";
													
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
						window.location = "bcf";
													
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
									window.location = "bcf";
													
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
									window.location = "bcf";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
	if($_POST["Tipo_cliente_607"] == 1 && strlen($_POST["Rnc_Factura_607"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bcf";
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
									window.location = "bcf";
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/	
	/*******INICIO VALIDACION DE NCF*****/
	if($_POST["NCF_BCF"] == "BCF00000NaN"){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡DEBE INICIALIZAR EL NCF DE CONSUMIDOR FINAL EN EL LAPIZ COLOR ANARANJADO QUE ESTA EN LA PARTE SUPERIOR DEL FORMULARIO!",
                            showConfirmButton: false,
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bcf";
								});

	
								</script>';
				exit;
	}

	if((substr($_POST["NCF_BCF"], 0, 1) == "B" && strlen($_POST["NCF_BCF"]) != 11)){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "bcf";
								});

	
								</script>';
				exit;
	}


			/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";
			$Tipo_NCF = "BCF";
			$BCF = substr($_POST["NCF_BCF"], -8);
			$NCF_Cons = $BCF;

			
			
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa607"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $NCF_Cons);



			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);

			$tabla = "control_empresas";
			$Rnc_Empresa = $_POST["RncEmpresa607"];
			$Fechacuadre = $_POST["FechaFacturames_607"];

			$BCF = $_POST["NBCF"];
			
				$datos = array("Rnc_Empresa" => $Rnc_Empresa, 
				"Periodo_Empresa" => $Fechacuadre, 
				"BCF" => $BCF);
			
			$respuesta =  ModeloEmpresas::mdlRegistrarPremisasBCF($tabla, $datos);


$Monto_Facturado_607 = $_POST["Monto_Facturado_607"];
								
$PorcentajeITBIS = $Monto_Facturado_607 * 0.18;

$Otros_Impuestos_607 = $Monto_Facturado_607 * 0.1;


$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 2);
$CalculoOtrosimpuestos = bcdiv($Otros_Impuestos_607, '1', 2);

if($_POST["ITBIS_Facturado_607"] > $CalculoITBIS){
		 
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
	if($_POST["Otros_Impuestos_607"] > $CalculoOtrosimpuestos){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO de Otros Impuestos no puede ser mayor al 10 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-607";
													
													});


												
								</script>';	
			exit;	
	}
								


											$Forma_De_Pago_607 = $_POST["Forma_De_Pago_607"];

											switch ($Forma_De_Pago_607){
												case "01":
       											$Tipo_Pago_607 = "01-EFECTIVO";
       											$Efectivo = $_POST["Monto_Facturado_607"];
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
       											$CHEQUES = $_POST["Monto_Facturado_607"];
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
       											$TARJETA = $_POST["Monto_Facturado_607"];
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
       											$CREDITO = $_POST["Monto_Facturado_607"];
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
       											$BONOS = $_POST["Monto_Facturado_607"];
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
       											$PERMUTAS = $_POST["Monto_Facturado_607"];
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
       											$OTRASFORMAS = $_POST["Monto_Facturado_607"];
        										break;

        										
											}

											$Extraer_NCF_607 = substr($_POST["NCF_BCF"], 0, 3);
											$Tipo_de_Ingreso_607 = 1;

											$NCF_Modificado_607 = "";
											$B04MeMa_607 = "";
										

											$Transaccion_607 = "2";
											

										
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
									$Accion_607 = "BCF";
									$Codigo_Factura = 0;

									
       											
       											
       											 
       											 
  $tabla = "607_empresas";   
  $Modulo = "BCF"; 											
       											

$datos = array("Rnc_Empresa_607" => $Rnc_Empresa_607,
"Rnc_Factura_607" => $Rnc_Factura_607,
"Tipo_Id_Factura_607" => $_POST["Tipo_cliente_607"],
"NCF_607" => $NCF_607,
"NCF_Modificado_607" => $NCF_Modificado_607,
"Tipo_de_Ingreso_607" => $Tipo_de_Ingreso_607,
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
"EXTRAER_NCF_607" => $Extraer_NCF_607,
"extraer_forma_de_pago_607" => $Forma_De_Pago_607,
"Porc_ITBIS_Retenido_607" => $Porc_ITBIS_Retenido_607,
"Porc_ISR_Retenido_607" => $Porc_ISR_Retenido_607,
"Forma_de_Pago_607" => $Tipo_Pago_607,
"B04MeMa_607" => $B04MeMa_607,
"Nombre_Empresa_607" => $_POST["Nombre_Empresa_607"],
"Usuario_Creador" => $_POST["UsuarioLogueado"],
"Accion_607" => $Accion_607,
"Codigo_Factura" => $Codigo_Factura,
"Modulo" => $Modulo);

	$respuesta =  Modelo607::MdlRegistrarBCF($tabla, $datos);

									if($respuesta == "ok"){

									$tabla = "control_empresas";
									$taRnc_Empresa = "Rnc_Empresa";
									$Rnc_Empresa = $Rnc_Empresa_607;
									$taPeriodo_Empresa = "Periodo_Empresa";
									$Periodo_Empresa = $_POST["FechaFacturames_607"];
									$tacontrol_Empresa = "607_Empresa";
									$valorestado = "1";


									$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);


										

											echo '<script>
										swal({
											type: "success",
											title: "¡El Registro 607 Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "reporte-607";
													}

													});

										</script>';
										
										}/* CIERRO SI DE RESPUESTA */
					

				

}/* CERRAR ISSET*/

}/* CERRAR FUNCION ctrRegistrar606*/ 

static function ctrMostrar607Ventas($Rnc_Empresa_607, $NCF_607, $codigo){

	$tabla = "607_empresas";
	$taRnc_Empresa_607 = "Rnc_Empresa_607";
	$taNCF_607 = "NCF_607";
	$taCodigo_Factura = "Codigo_Factura";

	$respuesta =  Modelo607::MdlMostrar607Ventas($tabla, $taRnc_Empresa_607, $taNCF_607, $taCodigo_Factura ,$Rnc_Empresa_607, $NCF_607, $codigo);
		
	return $respuesta;

	





}









}/*CIERRE CLASSE*/


