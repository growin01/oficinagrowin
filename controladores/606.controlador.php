<?php 

class Controlador606{

static public function ctrRegistrar606(){
	
	if(isset($_POST["NCF606"]) || isset($_POST["Rnc_Factura_606"])){
		 $_SESSION["error"] = "Activo";
		 $_SESSION["FechaFacturames606"] = $_POST["FechaFacturames_606"];
		 $_SESSION["FechaFacturadia_606"] = $_POST["FechaFacturadia_606"];
		 $_SESSION["Rnc_Factura_606"] = $_POST["Rnc_Factura_606"];
		 $_SESSION["NCF606"] = $_POST["NCF606"];
         $_SESSION["CodigoNCF606"] = $_POST["CodigoNCF606"];
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
		 $_SESSION["operador1"] = $_POST["operador1"];
		 $_SESSION["operador2"] = $_POST["operador2"];
		 
if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){
	$_SESSION["ITBIS_LLEVADO_A_COSTO"] = $_POST["ITBIS_LLEVADO_A_COSTO"];
}else{

	unset($_SESSION["ITBIS_LLEVADO_A_COSTO"]);
}

if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1){
	$_SESSION["ITBIS_Sujeto_a_Propocionalidad"] = $_POST["ITBIS_Sujeto_a_Propocionalidad"];

}else{


	unset($_SESSION["ITBIS_Sujeto_a_Propocionalidad"]);
}
# VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DELINICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO  INICIO 
$NCF606 = $_POST["NCF606"];
$CodigoNCF = $_POST["CodigoNCF606"];				
				
$NCF_606 = $NCF606.$CodigoNCF;

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
												window.location = "registro-606";
											}

											});

								</script>';



			exit;

		}	

		# INICIO VALIDACION QUE LA FACUTRA NO SE REPITA 
if($NCF606 == "B13" || $NCF606 == "B11"){ 
				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 = $_POST["RncEmpresa606"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $_POST["Rnc_Factura_606"];
				$taNCF_606 = "NCF_606";
				
			
$FacturaRepetida = Modelo606::MdlfacturaRepetida606B11B13($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taNCF_606, $NCF_606);
			



		if($FacturaRepetidaB13B11 != false && $FacturaRepetidaB13B11["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetidaB13B11["NCF_606"] == $NCF_606){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF..!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "registro-606";
											}

											});

								</script>';
						exit;

		}
	}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

/****VALIDACION QUE LA FACUTRA NO SE REPITA****/

	 

if($NCF606 == "B04" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					
					exit;
				

									
			}
	if($NCF606 == "B04" &&strlen($_POST["NCF_Modificado_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE CONTENER 11 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;




	}
		if($NCF606 == "E34" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;
				

									
			}
		if($NCF606 == "E34" &&strlen($_POST["NCF_Modificado_606"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE CONTENER 13 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;




	}

			if($NCF606 == "B03" && $_POST["NCF_Modificado_606"] == ""){
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
			if($NCF606 == "B03" &&strlen($_POST["NCF_Modificado_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B03 DEBE CONTENER 11 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;




	}
			if($NCF606 == "E33" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de DEBITO E33 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;
				

									
			}

	if($NCF606 == "E33" &&strlen($_POST["NCF_Modificado_606"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E33 DEBE CONTENER 13 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;




	}
			if($Rnc_Empresa_606 == $Rnc_Factura_606 && $NCF606 != "B13"){
				echo '<script>
								swal({

									type: "error",
									title: "ATENCIÓN..!! se esta Registrando un GASTO MENOR, y El NCF debe ser un B13",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;
				





			}
			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["Rnc_Factura_606"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Empresa_606"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);


if((strlen($_POST["Rnc_Factura_606"]) == 9 || strlen($_POST["Rnc_Factura_606"]) == 11) && $_POST["Nombre_Empresa_606"] != ""){ 

			
			
if($growin_Dgii != false && $growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII && $_POST["Nombre_Empresa_606"] != ""){
				
		$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, 
						"Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

		$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

}

}

else if($growin_Dgii != false && $growin_Dgii["Rnc_Growin_DGII"] == $ValorRnc_Growin_DGII){


			$_POST["Nombre_Empresa_606"] = $growin_Dgii["Nombre_Empresa_Growin"];


}


			
			/*VALIDACIONES*/

			/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
						window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
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
									window.location = "registro-606";
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
									window.location = "registro-606";
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
									window.location = "registro-606";
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
													});


												
								</script>';	
			exit;	
	}
	if(isset($_POST["Retencion"]) && $_POST["Retencion"] == 1){
		if($_POST["Monto_ISR_Retenido"] > 0 && $_POST["tipo_de_seleccionretener"] == 0){
			echo '<script>
						swal({

							type: "error",
							title: "¡Debe Seleccionar Un tipo de Retención de Impuesto Sobre la Renta!",
							showConfirmButton: false,
							timer: 6000
							}).then(()=>{
							window.location = "registro-606";
													
											});
						
						</script>';	
				

			exit;	

		}
	}

	

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN **************************************/
$totalFactura = $Montototalbienes + $Montototalservicios;

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
											

	if($NCF606 == "B04"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
	}elseif($NCF606 == "E34"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
	}elseif($NCF606 == "B03"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
	}elseif($NCF606 == "E33"){

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
	}else{

		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
	}

												 	

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

$ValorForma_De_Pago_606 = $_POST["Forma_De_Pago_606"];	
									

	switch ($ValorForma_De_Pago_606){ 
												
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


if($_POST["Retencion"] == 1){ 

		$Fecha_Ret_AñoMes_606  = $_POST["FechaFacturames_606"];
		$Fecha_Ret_Dia_606 = $_POST["FechaFacturadia_606"];
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		
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

		$Tipo_Retencion_ISR_606 = $Tipo_Retencion_ISR_606;
		$Extrar_Tipo_Retencion_606 = $_POST["tipo_de_seleccionretener"];

		if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] != ""){
			$Porc_ITBIS_Retenido_606 = $_POST["ITBISRetenido_Compras"];
		}else{
			$Porc_ITBIS_Retenido_606 = "0";
		}
		
		if(isset($_POST["ISR_RETENIDO_Compras"]) && $_POST["ISR_RETENIDO_Compras"] != ""){
			$Porc_ISR_Retenido_606 = $_POST["ISR_RETENIDO_Compras"];
		}else{
			$Porc_ISR_Retenido_606 = "0";
		}
		

		
		
} else{ 

		$Fecha_Ret_AñoMes_606  = "";
		$Fecha_Ret_Dia_606 = "";
		$ITBIS_Retenido_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";
		$Tipo_Retencion_ISR_606 = "0";
		$Extrar_Tipo_Retencion_606 = 0;
		$Porc_ITBIS_Retenido_606 = 0;
		$Porc_ISR_Retenido_606 = 0; 

}


$ITBIS_Percibido_Compras_606 = "0.00";
$ISR_Percibido_606 = "0.00";								
$Estatus_606 = "";
$B04_Periodo_606 = 0;
$Accion_606 = "Creado";
$CodigoCompra = 0;
$Modulo = "REGISTRO606";
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
"Extraer_NCF_606" => $NCF606,
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

	if($respuesta == "ok"){

	$tabla = "control_empresas";
	$taRnc_Empresa = "Rnc_Empresa";
	$Rnc_Empresa = $Rnc_Empresa_606;
	$taPeriodo_Empresa = "Periodo_Empresa";
	$Periodo_Empresa = $_POST["FechaFacturames_606"];
	$tacontrol_Empresa = "606_Empresa";
	$valorestado = "1";


	$respuesta = ModeloEmpresas::MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado);


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
		unset($_SESSION["Nombre_Empresa_606"]);
		unset($_SESSION["FechaPagomes606"]);
 		unset($_SESSION["FechaPagodia606"]);
 		unset($_SESSION["Referencia"]); 
 		unset($_SESSION["Descripcion"]);
 		unset($_SESSION["operador1"]); 
        unset($_SESSION["operador2"]); 
											
echo '<script>

			swal({
							
				type: "success",
				title: "¡El Registro 606 Se Guardo Correctamente!",
				showConfirmButton: true,
				confirmButtonText: "Cerrar",
				closeOnConfirm: false
					}).then((result)=>{

						if(result.value){
							window.location = "registro-606";


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
										
}/* CIERRO SI DE RESPUESTA */



	
}/* CERRAR ISSET*/

}/* CERRAR FUNCION ctrRegistrar606*/ 

static public function ctrEditar606(){
	
	if(isset($_POST["Editar_id_606"])){

/* validacion GROWIN DGII */

			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["Rnc_Factura_606"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Empresa_606"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);


if((strlen($_POST["Rnc_Factura_606"]) == 9 || strlen($_POST["Rnc_Factura_606"]) == 11) && $_POST["Nombre_Empresa_606"] != ""){ 	
						

	if($growin_Dgii != false && $growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII && $_POST["Nombre_Empresa_606"] != ""){
				
		$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, 
						"Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

		$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

	}
} else if($growin_Dgii != false && $growin_Dgii["Rnc_Growin_DGII"] == $ValorRnc_Growin_DGII){


			$_POST["Nombre_Empresa_606"] = $growin_Dgii["Nombre_Empresa_Growin"];


}

$NCF606 = $_POST["NCF606"];
$CodigoNCF = $_POST["CodigoNCF606"];				
				
$NCF_606 = $NCF606.$CodigoNCF;

				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 = $_POST["RncEmpresa606"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $_POST["Rnc_Factura_606"];
				$taNCF_606 = "NCF_606";
				
			

			$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

		if($FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["Rnc_Factura_606"] == $Rnc_Factura_606 && $FacturaRepetida["NCF_606"] == $NCF_606 && $FacturaRepetida["id"] != $_POST["Editar_id_606"]){

					echo '<script>
								swal({

									type: "error",
									title: "¡ Esta Factura ya esta Registrada Revisar RNC y NCF!",
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

	if($NCF606 == "B04" && $_POST["NCF_Modificado_606"] == ""){
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
	if($NCF606 == "B04" &&strlen($_POST["NCF_Modificado_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE CONTENER 11 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;




	}
		if($NCF606 == "E34" && $_POST["NCF_Modificado_606"] == ""){
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
		if($NCF606 == "E34" &&strlen($_POST["NCF_Modificado_606"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E34 DEBE CONTENER 13 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;




	}

			if($NCF606 == "B03" && $_POST["NCF_Modificado_606"] == ""){
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
			if($NCF606 == "B03" &&strlen($_POST["NCF_Modificado_606"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B03 DEBE CONTENER 11 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;




	}
			if($NCF606 == "E33" && $_POST["NCF_Modificado_606"] == ""){
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

	if($NCF606 == "E33" &&strlen($_POST["NCF_Modificado_606"]) != 13){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO E33 DEBE CONTENER 13 CARACTERES!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
													});
												
								</script>';	
					exit;




	}
			if($Rnc_Empresa_606 == $Rnc_Factura_606 && $NCF606 != "B13"){
				echo '<script>
								swal({

									type: "error",
									title: "ATENCIÓN..!! se esta Registrando un GASTO MENOR, y El NCF debe ser un B13",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
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
	if(strlen($_POST["FechaFacturadia_606"]) != 2){
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
	if($_POST["FechaFacturadia_606"] < 0){
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
	if($_POST["FechaFacturadia_606"] > 31){
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
	if($_POST["Tipo_Suplidor_606"] == 1 && strlen($_POST["Rnc_Factura_606"]) != 9){
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
	if($_POST["Tipo_Suplidor_606"] == 1 && $_POST["Nombre_Empresa_606"] == ""){
		echo '<script>
								swal({

									type: "error",
									title: "¡El RNC digitado no coinside con las empresas Registradas en la DGII!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporte-606";
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
									window.location = "reporte-606";
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
									window.location = "registro-606";
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
									window.location = "registro-606";
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
									window.location = "reporte-606";
													
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
									window.location = "reporte-606";
													
													});


												
								</script>';	
			exit;	
	}

	if(isset($_POST["Retencion"]) && $_POST["Retencion"] == 1){
		if($_POST["Monto_ISR_Retenido"] > 0 && $_POST["tipo_de_seleccionretener"] == 0){
			echo '<script>
						swal({

							type: "error",
							title: "¡Debe Seleccionar Un tipo de Retención de Impuesto Sobre la Renta!",
							showConfirmButton: false,
							timer: 6000
							}).then(()=>{
							window.location = "reporte-606";
													
											});
						
						</script>';	
				

			exit;	

		}
	}

	

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN FIN ****************************************************************************************************************/
$totalFactura = $Montototalbienes + $Montototalservicios;


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
		$NCF_Modificado_606 = $_POST["NCF_Modificado_606"];
	}

												 	

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

$ValorForma_De_Pago_606 = $_POST["Forma_De_Pago_606"];	
									

	switch ($ValorForma_De_Pago_606){ 
												
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


if($_POST["Retencion"] == 1){ 

		$Fecha_Ret_AñoMes_606  = $_POST["FechaFacturames_606"];
		$Fecha_Ret_Dia_606 = $_POST["FechaFacturadia_606"];
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		
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

		$Tipo_Retencion_ISR_606 = $Tipo_Retencion_ISR_606;
		$Extrar_Tipo_Retencion_606 = $_POST["tipo_de_seleccionretener"];

		if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] != ""){
			$Porc_ITBIS_Retenido_606 = $_POST["ITBISRetenido_Compras"];
		}else{
			$Porc_ITBIS_Retenido_606 = "0";
		}
		
		if(isset($_POST["ISR_RETENIDO_Compras"]) && $_POST["ISR_RETENIDO_Compras"] != ""){
			$Porc_ISR_Retenido_606 = $_POST["ISR_RETENIDO_Compras"];
		}else{
			$Porc_ISR_Retenido_606 = "0";
		}
		

		
		
} else{ 

		$Fecha_Ret_AñoMes_606  = "";
		$Fecha_Ret_Dia_606 = "";
		$ITBIS_Retenido_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";
		$Tipo_Retencion_ISR_606 = "0";
		$Extrar_Tipo_Retencion_606 = 0;
		$Porc_ITBIS_Retenido_606 = 0;
		$Porc_ISR_Retenido_606 = 0; 

}

$ITBIS_Percibido_Compras_606 = "0.00";
$ISR_Percibido_606 = "0.00";								
$Estatus_606 = "";
$B04_Periodo_606 = 0;
$Accion_606 = "Editado";
$CodigoCompra = 0;
$Modulo = "REGISTRO606";
$tabla = "606_empresas";

$datos = array("id" => $_POST["Editar_id_606"],
"Rnc_Empresa_606" => $Rnc_Empresa_606,
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
"Forma_Pago_606" => $ValorForma_De_Pago_606,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $NCF606,
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


	if($respuesta == "ok"){
		$modulo = $_POST["modulo"];
		switch ($modulo) {
			case 'reporte-606':
				echo '<script>
	swal({
		type: "success",
		title: "¡El Registro 606 Se ha Modificado Correctamente!",
		showConfirmButton: true,
		confirmButtonText: "Cerrar",
		closeOnConfirm: false
			}).then((result)=>{

				if(result.value){
					window.location = "reporte-606";
				}

				});

	</script>';
				break;
			case 'registro-606':
			echo '<script>
	swal({
		type: "success",
		title: "¡El Registro 606 Se ha Modificado Correctamente!",
		showConfirmButton: true,
		confirmButtonText: "Cerrar",
		closeOnConfirm: false
			}).then((result)=>{

				if(result.value){
					window.location = "registro-606";
				}

				});

	</script>';
				break;
			
		}
		

		
										
	}/* CIERRO SI DE RESPUESTA */
	}/* CIERRO SI DE RESPUESTA */



							

}/* CERRAR ISSET*/

}/* CERRAR FUNCION ctrRegistrar606*/ 

static public function ctrMostrarReporte606($Rnc_Empresa_606, $Orden, $periodoreporte606){

			$tabla = "606_empresas";
			$taRncEmpresa606 = "Rnc_Empresa_606";


		$respuesta = Modelo606::mdlMostrarReporte606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $Orden, $periodoreporte606);

		return $respuesta;



	}
	static public function ctrMostrar606($Rnc_Empresa_606, $id_606, $Valor_id606, $Orden){

			$tabla = "606_empresas";
			$taRncEmpresa606 = "Rnc_Empresa_606";


		$respuesta = Modelo606::mdlMostrar606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $id_606, $Valor_id606, $Orden);

		return $respuesta;



	}
	static public function ctrMostrar606Retener($id_606, $Valor_id606){

			$tabla = "606_empresas";
			

		$respuesta = Modelo606::mdlMostrar606Retener($tabla, $id_606, $Valor_id606);

		return $respuesta;



	}

	/**************************************************
	MOSTRAR CLIENTES
	***************************************************/
	static public function ctrMostrarPeriodo606($Rnc_Empresa_606){

			$tabla = "606_empresas";
			$taRncEmpresa606 = "Rnc_Empresa_606";
			$taFecha_AnoMes_606 = "Fecha_AnoMes_606";

		$respuesta = Modelo606::mdlMostrarPeriodo606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $taFecha_AnoMes_606);

		return $respuesta;




	}

/*AGREGAR RETENCION*/

static public function ctrAgregarretencion606(){
	
	if(isset($_POST["id_606_Retener"])){

		if(!(preg_match('/^[0-9]+$/', $_POST["FechaRetenecionmes_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaReteneciondia_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "registro-606";
													
									});
												
								</script>';	
					exit;	
	} 
/***********INICIO VALIDACION FECHA AÑOS MES**************************/



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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
						window.location = "registro-606";
													
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
									window.location = "registro-606";
													
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
									window.location = "registro-606";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/



		if($_POST["Monto_ISR_Retenido"] > 0 && $_POST["tipo_de_seleccionretener"] == 0){
			echo '<script>
						swal({

							type: "error",
							title: "¡Debe Seleccionar Un tipo de Retención de Impuesto Sobre la Renta!",
							showConfirmButton: false,
							timer: 6000
							}).then(()=>{
							window.location = "registro-606";
													
											});
						
						</script>';	
				

			exit;	

		}
	

						$tabla = "606_empresas";
											
					
						date_default_timezone_set('America/Santo_Domingo');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');
						$fechaActual = $fecha.' '.$hora;

						$Fecha_Registro = $fechaActual;

						$Accion_606 = "Retener";
						
						
						$ValorTipo_Retencion_ISR_606 = $_POST["tipo_de_seleccionretener"];

											switch ($ValorTipo_Retencion_ISR_606){
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
				

	$datos = array("id" => $_POST["id_606_Retener"], 
		"Usuario_Creador" => $_POST["Usuariologueado"], 
		"Fecha_Registro" => $Fecha_Registro, 
		"Accion_606" => $Accion_606, 
		"Fecha_Ret_AnoMes_606" => $_POST["FechaRetenecionmes_606"], 
		"Fecha_Ret_Dia_606" => $_POST["FechaReteneciondia_606"], 
		"ITBIS_Retenido_606" => $_POST["Monto_ITBIS_Retenido"], 
		"Monto_Retencion_Renta_606" => $_POST["Monto_ISR_Retenido"], 
		"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606, 
		"Extrar_Tipo_Retencion_606" => $_POST["tipo_de_seleccionretener"], 
		"Porc_ITBIS_Retenido_606" => $_POST["ITBIS_Retenido"], 
		"Porc_ISR_Retenido_606" => $_POST["ISR_RETENIDO"]);

						$respuesta = Modelo606::MdlAgregarretencion606($tabla, $datos);
						
						if($respuesta == "ok"){

								echo '<script>
							swal({
								type: "success",
								title: "¡Se Realizo la Retención Correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar",
								closeOnConfirm: false
									}).then((result)=>{

										if(result.value){
											window.location = "registro-606";
										}

										});

							</script>';
							
						}/* CIERRO SI DE RESPUESTA */

				

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

	static public function ctrBorrar606(){
		if(isset($_GET["id_606"])){
				$tabla = "606_empresas";
				$id = "id";
				$id_606 = $_GET["id_606"];

				$respuesta = Modelo606::mdlBorrar606($tabla, $id, $id_606);
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Registro se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "reporte-606";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/

		}


	}


static public function ctrValidarRNCNCF($RncEmpresa606, $ValorRncEmpresa606, $Rnc_Factura_606, $ValorRnc_Factura_606, $NCF_606, $ValorNCF_606){

	$tabla = "606_empresas";
		
						
	$respuesta = Modelo606::MdlValidarRNCNCF($tabla, $RncEmpresa606, $ValorRncEmpresa606, $Rnc_Factura_606, $ValorRnc_Factura_606, $NCF_606, $ValorNCF_606);
		
		return $respuesta;	 

	}/*CIERRA FUNCION VALIDAR USUARIO*/


}/*CIERRE CLASSE*/

