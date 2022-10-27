<?php 

class ControladorCompras{


static public function ctrMostarCompras($Rnc_Empresa_Compras, $periodocompras){

		$tabla = "compras_empresas";
		$taRncEmpresaCompras = "Rnc_Empresa_Compras";


		$respuesta = ModeloCompras::mdlMostarCompras($tabla, $taRncEmpresaCompras, $Rnc_Empresa_Compras, $periodocompras);

		return $respuesta;

}


static public function ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra){

		$tabla = "compras_empresas";
		$taRncEmpresaCompra = "Rnc_Empresa_Compras";
		$taCodigoCompra = "CodigoCompra";

$respuesta = ModeloCompras::mdlMostrarCodigoCompras($tabla, $taRncEmpresaCompra, $taCodigoCompra, $Rnc_Empresa_Compra, $CodigoCompra);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/

static public function ctrRangoFechasCompras($Rnc_Empresa_Compras, $fechaInicial, $fechaFinal){

		$tabla = "compras_empresas";
		$taRncEmpresaCompras = "Rnc_Empresa_Compras";


		$respuesta = ModeloCompras::mdlRangoFechasCompras($tabla, $taRncEmpresaCompras, $Rnc_Empresa_Compras, $fechaInicial, $fechaFinal);

		return $respuesta;



	}
static public function ctrMostrarCompraEditar($id, $valoridCompra){

		$tabla = "compras_empresas";
		$respuesta = ModeloCompras::mdlMostrarComprasEditar($tabla, $id, $valoridCompra);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/




static public function ctrcomprasgenerales(){
	

if(isset($_POST["RncEmpresaCompras"]) || isset($_POST["NCF_606"])){

$_SESSION["FechaFacturames_606"] = $_POST["FechaFacturames_606"];
$_SESSION["FechaFacturadia_606"] = $_POST["FechaFacturadia_606"];
$_SESSION["NCFCompra"] = $_POST["NCFCompra"];
$_SESSION["CodigoNCFCompra"] = $_POST["CodigoNCFCompra"];
$_SESSION["NCF_Modificado_606"] = $_POST["NCF_Modificado_606"];
$_SESSION["agregarSuplidor"] = $_POST["agregarSuplidor"];
$_SESSION["Tipo_Suplidor_Factura"] = $_POST["Tipo_Suplidor_Factura"];
$_SESSION["RncSuplidorFactura"] = $_POST["RncSuplidorFactura"];
$_SESSION["Nombre_Suplidor"] = $_POST["Nombre_Suplidor"];
$_SESSION["Descripcion"] = $_POST["Descripcion"];
$_SESSION["tipo_de_monto"] = $_POST["tipo_de_monto"];
$_SESSION["Tipo_Gasto_606"] = $_POST["Tipo_Gasto_606"];
$_SESSION["Forma_De_Pago_606"] = $_POST["Forma_De_Pago_606"];
$_SESSION["TotalISCvi"] = $_POST["TotalISCvi"];
$_SESSION["TotalOtrosImpvi"] = $_POST["TotalOtrosImpvi"];
$_SESSION["TotalISC"] = $_POST["TotalISC"];
$_SESSION["TotalOtrosImp"] = $_POST["TotalOtrosImp"];
$_SESSION["propinalegal"] = $_POST["NetoPropinaLegal"];


if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == "1"){
	$_SESSION["ITBIS_LLEVADO_A_COSTO"] = $_POST["ITBIS_LLEVADO_A_COSTO"];
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1){
	$_SESSION["ITBIS_Sujeto_a_Propocionalidad"] = $_POST["ITBIS_Sujeto_a_Propocionalidad"];

}
$_POST["Transaccion_606"] = $_POST["Referencia"];
$_SESSION["Transaccion_606"] = $_POST["Transaccion_606"];
$_SESSION["FechaPagomes606"] = $_POST["FechaPagomes606"];
$_SESSION["FechaPagodia606"] = $_POST["FechaPagodia606"];
$_SESSION["Referencia"] = $_POST["Referencia"];
$_SESSION["ModuloBanco"] = $_POST["ModuloBanco"];
$_SESSION["listaGastos"] = $_POST["listaGastos"];


$NCFCompra = $_POST["NCFCompra"];
$CodigoNCF = $_POST["CodigoNCFCompra"];				
				
$NCF_606 = $NCFCompra.$CodigoNCF;
		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
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
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';
					


					exit;

		}
if($NCFCompra == "B13"){ 
				
$NCF_606 = $NCFCompra.$CodigoNCF;
		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
		$taNCF_606 = "NCF_606";
				
			

$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);



if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["NCF_606"] == $NCF_606){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';
						exit;

		}
	}
	if($NCFCompra == "B11"){ 
				
$NCF_606 = $NCFCompra.$CodigoNCF;
		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
		$taNCF_606 = "NCF_606";
				
			

$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);



if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["NCF_606"] == $NCF_606){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';
						exit;

		}
	}

/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $Rnc_Empresa_606;
$tipocod = "DCG";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DCG".$N;

    }

$_POST["CodAsiento"] = $N;
$_POST["NAsiento"] = $NAsiento;

if($_POST["Contabilidad"] == 1 && $NAsiento == ""){
	echo '<script>
										swal({

											type: "error",
											title: "No se Reconoce un Asiento Contable vuelva a recargar la pagina!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-gastosgenerales";
													}

													});

										</script>';
								exit;


}

if($_POST["Contabilidad"] == 1){ 
		$tabla = "librodiario_empresas";
		$taRnc_Empresa = "Rnc_Empresa_LD";
		$Rnc_Empresa = $_POST["RncEmpresaCompras"];
		$taNAsiento = "NAsiento";
		$NAsiento = $NAsiento;
			

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
														window.location = "crear-compra-gastosgenerales";
													}

													});

										</script>';
								exit;

				}
		}
	 }
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

	$Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
    $CodigoCompra = NULL;
          
          $compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
              
              if(!$compras){
              	$codigo = 1;
              	$_POST["CodigoCompra"] = $codigo;

               
              } else{

                foreach ($compras as $key => $value) {}
                          
                $codigo = $value["CodigoCompra"]+1;
            	$_POST["CodigoCompra"] = $codigo;

                
              }


		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

   $Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
   $CodigoCompra = $_POST["CodigoCompra"];
          
$compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
      
if($compras != false && $compras["Rnc_Empresa_Compras"] == $Rnc_Empresa_Compra && $compras["CodigoCompra"] == $CodigoCompra){

				echo '<script>
								swal({

									type: "error",
									title: "ESTE NUMERO DE COMPRA ESTA REGISTRADO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';
						exit;

		}
		/*** INICIO DE ASIENTOS VACIOS***************/

		if(empty($_POST["listaGastos"]) || $_POST["listaGastos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN GASTO REGISTRADO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-gastosgenerales";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

		
		
		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_606 = $_POST["NCFCompra"];

			if($Extraer_NCF_606 == "B04" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["RncSuplidorFactura"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[BE0-9]+$/', $NCF_606))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
						window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-gastosgenerales";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/

	///****Validar SUPLIDOR****///
if($_POST["RncEmpresaCompras"] != $_POST["RncSuplidorFactura"]){ 
		$tabla = "suplidor_empresas";
		$taRnc_Empresa_Suplidor = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Suplidor = $_POST["RncEmpresaCompras"];
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];
		
$suplidor =  ModeloSuplidores::mdlMostrarSuplidorFact($tabla, $taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, $taDocumento, $Documento);

if($suplidor != false && $suplidor["Rnc_Empresa_Suplidor"] == $Rnc_Empresa_Suplidor && $suplidor["Documento_Suplidor"] == $_POST["RncSuplidorFactura"] && $suplidor["id"] != $_POST["agregarSuplidor"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Suplidor no Coinciden con el RNC del cliente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';


		exit;

}

}
	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
if(($_POST["Tipo_Suplidor_Factura"] == 1 && strlen($_POST["RncSuplidorFactura"]) != 9) || ($_POST["Tipo_Suplidor_Factura"] == 2 && strlen($_POST["RncSuplidorFactura"]) != 11)){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
													});					
								</script>';	
			exit;	

							
	}

	if((substr($NCF_606, 0, 1) == "B" && strlen($NCF_606) != 11) || (substr($NCF_606, 0, 1) == "E" && strlen($NCF_606) != 13)){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
	
	$suma = $_POST["NetoGasto"];
	$PorcentajeITBIS = $suma * 0.18;
	

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 3);
	

	if($_POST["TotalITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
													
													});


												
								</script>';	
				

			exit;	


	}
		
		/* INICIO AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["RncSuplidorFactura"];
			$ValorNombreGrowin_DGII = "";
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);
			
			if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
				$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

					$respuesta = ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

			}
		/* FIN AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
/************************VALIDACION DE RETENCIONES*******************/
if($_POST["Retencion"] == 1){ 

if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] > 0){
	if($_POST["Monto_ITBIS_Retenido"] > $_POST["TotalITBIS"]){

		echo '<script>
			swal({

			type: "error",
			title: "¡El Monto de La Retencion de ITBIS no debe ser mayor al monto Total de ITBIS!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	



	}
 


 }

}						


if($_POST["Retencion"] == 1){ 

if(isset($_POST["ISR_RETENIDO_Compras"]) && $_POST["ISR_RETENIDO_Compras"] > 0){
	if($_POST["tipo_de_seleccionretener"] == "0"){

		echo '<script>
			swal({

			type: "error",
			title: "¡Debe Selecionar un Tipo de Retencion de ISR!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	
	}

	
	


 }

}						



/********************************************************************/
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


       }

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

if(isset($_POST["tipo_de_monto"])){
	
		if($_POST["tipo_de_monto"] == 1){


			$Montototalbienes = $_POST["NetoGasto"];
			$Montototalservicios = "0";
			$Propinalegal = $_POST["NetoPropinaLegal"];
			$totalFactura = $_POST["NetoGasto"];
			$ITBIS_Compras_606 =$_POST["TotalITBIS"];
			$ITBIS_Servicios_606 = "0.00";
			$TOTALITBIS = $ITBIS_Compras_606 + $ITBIS_Servicios_606; 


		}else{

			$Montototalbienes = "0";
			$Montototalservicios = $_POST["NetoGasto"];
			$Propinalegal = $_POST["NetoPropinaLegal"];
			$totalFactura = $_POST["NetoGasto"];
			$ITBIS_Compras_606 = "0.00";
			$ITBIS_Servicios_606 = $_POST["TotalITBIS"];
			$TOTALITBIS = $ITBIS_Compras_606 + $ITBIS_Servicios_606;

		}
		if($_POST["Moneda_Factura"] == "USD"){

			$Moneda = "USD";
			$tasa = $_POST["tasaUS"];

				$USDMontototalbienes = $Montototalbienes * $tasa;
				$Montototalbienes = $USDMontototalbienes;
				$USDMontototalservicios = $Montototalservicios * $tasa;
				$Montototalservicios = $USDMontototalservicios;
				$USDPropinalegal = $Propinalegal * $tasa;
				$Propinalegal = $USDPropinalegal;
				$USDtotalFactura = $totalFactura * $tasa;
				$totalFactura = $USDtotalFactura;
				$USDITBIS_Compras_606 = $ITBIS_Compras_606 * $tasa;
				$USDITBIS_Servicios_606 = $ITBIS_Servicios_606 * $tasa;
				$ITBIS_Compras_606 = $USDITBIS_Compras_606;
				$ITBIS_Servicios_606 = $USDITBIS_Servicios_606;
				$TOTALITBIS = $ITBIS_Compras_606 +$ITBIS_Servicios_606;


		}else{
			$Moneda = "DOP";
			$tasa = 0;


		}
}

if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){								

	$ITBIS_alcosto_606 = $TOTALITBIS;
	$ITBIS_Adelantar_606 = "0.00";

}else { 

	$ITBIS_alcosto_606 = "0.00";
	$ITBIS_Adelantar_606 = $TOTALITBIS;
										
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] == 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Servicion_606 = "0";

									}
elseif(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] != 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = $TOTALITBIS;
										}
else { 
	
	$ITBIS_Proporcional_606 = "0.00";
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = "0.00";
									
}


if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $USDITBIS_Retenido_606 * $_POST["tasaUS"];
		$USDMonto_Retencion_Renta_606 =$_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $USDMonto_Retencion_Renta_606 * $_POST["tasaUS"];


	}else{
		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$USDMonto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
	}

		$Fecha_Ret_AñoMes_606  = $_POST["FechaFacturames_606"];
		$Fecha_Ret_Dia_606 = $_POST["FechaFacturadia_606"];
		
		
		
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

} else{ 

		$Fecha_Ret_AñoMes_606  = "";
		$Fecha_Ret_Dia_606 = "";
		$ITBIS_Retenido_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";
		$Tipo_Retencion_ISR_606 = "0";
		$Extrar_Tipo_Retencion_606 = 0;
		$Porc_ITBIS_Retenido_606 = 0;
		$Porc_ISR_Retenido_606 = 0; 
		$USDITBIS_Retenido_606 = "0.00";
		$ITBIS_Retenido_606 = "0.00";
		$USDMonto_Retencion_Renta_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";

}



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
		
if($_POST["Moneda_Factura"] == "USD"){

$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $USDImpuestos_Selectivo_606 * $_POST["tasaUS"];


$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $USDOtro_Impuesto_606 * $_POST["tasaUS"];

	}else{
$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $_POST["TotalISC"];

$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $_POST["TotalOtrosImp"];
	
	}
$ITBIS_Percibido_Compras_606 = "0.00";
$ISR_Percibido_606 = "0.00";
$Monto_Propina_606 = $_POST["NetoPropinaLegal"];
$Extraer_Tipo_Pago_606 = $_POST["Forma_De_Pago_606"];
$Extraer_Tipo_Gasto_606 = $ValorTipo_Gasto_606;
$B04MeMa_607 = "";
$Tipo_Transaccion_606 = 1;
$Estatus_606 = "";
$B04_Periodo_606 = 0;
$Fecha_Trans_AnoMes_606 = $_POST["FechaPagomes606"];
$Fecha_Trans_Dia_606 = $_POST["FechaPagodia606"];
$Referencia_606 = $_POST["Referencia"];
$Banco_606 = $_POST["agregarBanco"];
$Accion_606 = "Creado";
$CodigoCompra = $_POST["CodigoCompra"];
$Modulo = "COMPRAS";


$tabla = "606_empresas";


$datos = array("Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Tipo_Suplidor_Factura"],
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
"ITBIS_Factura_606" => $TOTALITBIS,
"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $Impuestos_Selectivo_606,
"Otro_Impuesto_606" => $Otro_Impuesto_606,
"Monto_Propina_606" => $Monto_Propina_606,
"Forma_Pago_606" => $ValorForma_De_Pago_606 ,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $Extraer_Tipo_Pago_606,
"Extraer_Tipo_Gasto_606" => $Extraer_Tipo_Gasto_606,
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $ITBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"Porc_ITBIS_Retenido_606" => $Porc_ITBIS_Retenido_606,
"Porc_ISR_Retenido_606" => $Porc_ISR_Retenido_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $Fecha_Trans_AnoMes_606,
"Fecha_Trans_Dia_606" => $Fecha_Trans_Dia_606,
"Referencia_606" => $Referencia_606,
"Banco_606" => $Banco_606,
"Descripcion_606" => $_POST["Descripcion"],
"Nombre_Empresa_606" => $_POST["Nombre_Suplidor"],
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
									
	}

		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $Rnc_Factura_606;
		$taNCF_606 = "NCF_606";
		$NCF_606 = $NCF_606;			

	$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

if($Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){
			
	$id_registro606 = $Consulta606["id"];


}else{
	$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $Rnc_Factura_606;
		$taNCF_606 = "NCF_606";
		$NCF_606 = $NCF_606;

$respuesta = Modelo606::mdlBorrarLD606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);
					
	echo '<script>
				swal({

					type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
					showConfirmButton: false,
					timer: 6000
					}).then(()=>{
					window.location = "crear-compra-gastosgenerales";
													
					});
												
			</script>';	
		
		exit;
	}
/***************************** agregar Cliente *************************/
	$id_Suplidor = $_POST["agregarSuplidor"];

	$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
	$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
	$taDocumento = "Documento_Suplidor";
	$Documento = $_POST["RncSuplidorFactura"];
	$tabla = "suplidor_empresas";

		
	$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		
	if(!$respuesta || $respuesta == false){
			$tabla = "suplidor_empresas";
			$Email = "";
			$Telefono = "";
			$Direccion = "";
			$Estado = "Creado";

		$datos = array("Rnc_Empresa_Suplidor" => $Rnc_Empresa_606,
		"Tipo_Suplidor" => $_POST["Tipo_Suplidor_Factura"],
		"Nombre_Suplidor" => $_POST["Nombre_Suplidor"], 
		"Documento_Suplidor" => $_POST["RncSuplidorFactura"],
		"Email" => $Email, 
		"Telefono" => $Telefono ,
		"Direccion" => $Direccion, 
		"Usuario_Creador" => $_POST["UsuarioLogueado"], 
		"Estado" => $Estado);
		
		$respuesta = ModeloSuplidores::mdlCrearsuplidor($tabla, $datos);
						   
		$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		

		$id_Suplidor = $respuesta["id"];
 }

 /*crear cuenta por pagar*/

if($_POST["Forma_De_Pago_606"] == "04"){ 
 	
 	$tabla = "cxp_empresas";
	$Dia_Credito_cxp = "15";
	$Retenciones = "2";
	$tipo = "FACTURA";
	$Estatus = "1";
	
	$datos = array("id_606" => $id_registro606,
					"CodigoCompra" => $_POST["CodigoCompra"],
					"Rnc_Empresa_cxp" => $_POST["RncEmpresaCompras"],
					"id_Suplidor" => $id_Suplidor,
					"Rnc_Suplidor" => $Rnc_Factura_606,
					"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
					"NCF_cxp" => $NCF_606,
					"FechaAnoMes_cxp" => $_POST["FechaFacturames_606"],
					"FechaDia_cxp" => $_POST["FechaFacturadia_606"], 
					"Dia_Credito_cxp" => $Dia_Credito_cxp,
					"Moneda" => $Moneda,
					"Tasa" => $tasa,
					"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
					"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2),
					"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
					"Neto" => bcdiv($_POST["NetoGasto"], '1', 2),
					"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
					"Total" => bcdiv($_POST["TotalGasto"], '1', 2),
					"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_606, '1', 2),
					"Retencion_Renta" => bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
					"Observaciones" => $_POST["Descripcion"],
					"Retenciones" => $Retenciones,
					"MontoPagado" => 0,
					"Estado" => "PorPagar",
					"Tipo" => $tipo,
					"Estatus" => $Estatus);
	
	$respuesta = ModeloCXP::mdlIngresarcxp($tabla, $datos); 


	
}/*fin cierre de cuentas por cobrar*/


$NAsientoRet = "";



if($_POST["Contabilidad"] == 1){

 
$listaGastos =  json_decode($_POST["listaGastos"], true);

foreach ($listaGastos as $key => $value){
				
		/****consulta proyecto*****/

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
	$id = "id";
	$valorid = $_POST["agregarBanco"];
	$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);

	if($banco != false){
        
        $id_banco = $banco["id"];


      }else{
        
        $id_banco = 0;


      }
      
	
if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["gasto"] * $tasa;
		$value["gasto"] = $cambioMoneda;

	}
	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DCG";
	$Accion = "COMPRAGENERAL";
	$debito = bcdiv($value["gasto"], '1', 2);
	$credito = "0";
	$Transaccion_606 = 1;

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCompras"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
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
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturames_606"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

} /** CIERRE FOR DE CUENTAS CONTABLES **/
	if($_POST["NetoPropinaLegal"] > 0){ 	
	$idgrupo = "6";
	$idcategoria = "9";
	$idgenerica = "02";
	$idcuenta = "001";
	$nombrecuenta = "propina legal";
	$debito = bcdiv($Monto_Propina_606, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}


	if(!isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["PORITBIS"] > 0){ 	
	$idgrupo = "1";
	$idcategoria = "3";
	$idgenerica = "01";
	$idcuenta = "001";
	$nombrecuenta = "ITBIS pagados en compras";
	$debito = bcdiv($TOTALITBIS, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}


if($_POST["TotalISC"] > 0 || $_POST["TotalOtrosImp"] > 0 || $ITBIS_alcosto_606 > 0){
	$totalimpuestos = $Impuestos_Selectivo_606 + $Otro_Impuesto_606 + $ITBIS_alcosto_606;
	$idgrupo = "6";
	$idcategoria = "1";
	$idgenerica = "09";
	$idcuenta = "003";
	$nombrecuenta = "impuestos indirectos";
	$debito = bcdiv($totalimpuestos, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}

if($_POST["Forma_De_Pago_606"] == "04"){ 

	$TotalGasto = $_POST["TotalGasto"];


	if($_POST["Moneda_Factura"] == "USD"){
		$TotalGasto  = $_POST["TotalGasto"] * $tasa;
		

		}
		
	$idgrupo = "2";
	$idcategoria = "2";
	$idgenerica = "01";
	$idcuenta = "001";
	$nombrecuenta = "proveedores nacionales";
	$debito = 0;
	$credito = bcdiv($TotalGasto, '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

} else{
	
	$TotalGasto = $_POST["TotalGasto"];


	if($_POST["Moneda_Factura"] == "USD"){
		$TotalGasto  = $_POST["TotalGasto"] * $tasa;
		

		}
	$tabla = "banco_empresas"; 
	$id = "id";
	$valorid = $_POST["agregarBanco"];
	$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);

	$tabla = "librodiario_empresas";

		$idgrupo = $banco["id_grupo"];
		$idcategoria = $banco["id_categoria"];
		$idgenerica = $banco["id_generica"];
		$idcuenta = $banco["id_cuenta"];
		$nombrecuenta = $banco["Nombre_CuentaContable"];
		$debito = 0;
		$credito = bcdiv($TotalGasto, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}

if($_POST["Retencion"] == 1){
	
	if($ITBIS_Retenido_606 > 0){
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido por pagar";
		$debito = 0;
		$credito = bcdiv($ITBIS_Retenido_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}

	if($Monto_Retencion_Renta_606 != 0){
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "02";
		$idcuenta = "002";
		$nombrecuenta = "retenciones de ISR IR17 por pagar";
		$debito = 0;
		$credito = bcdiv($Monto_Retencion_Renta_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);
		
	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	}

}/*cierre retencion*/


	


/******************* ACTUALIZAR CORRELATIVOS *************************/

$tabla = "correlativos_no_fiscal";
$Tipo_NCF = "DCG";
			
$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);



 
/***********CIERRE DE CONTABILIDAD ***********/
if($_POST["Retencion"] == 1){
	$NAsientoRet = $NAsiento;



}else{

$NAsientoRet = "";

}
$tabla = "compras_empresas";
$modulo = "COMPRAGENERALES";
$Estatus = "POR PAGAR";
$Accion_Factura = "CREADA";
$Proyecto = "NO APLICA";
$datos = array("Rnc_Empresa_Compras" => $Rnc_Empresa_606,
				"CodigoCompra" => $_POST["CodigoCompra"],
				"Rnc_Suplidor" => $Rnc_Factura_606,
				"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
				"NCF_Factura" => $NCF_606,
				"FechaAnoMes" => $_POST["FechaFacturames_606"],
				"FechaDia" => $_POST["FechaFacturadia_606"],
				"id_Suplidor" => $id_Suplidor,
				"Producto" => $_POST["listaGastos"],
				"Porimpuesto" => $_POST["PORITBIS"],
				"Moneda" => $_POST["Moneda_Factura"],
				"Tasa" => $tasa,
				"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
				"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2), 
				"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
				"Neto" => bcdiv($_POST["NetoGasto"], '1', 2),
				"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
				"Total" => bcdiv($_POST["TotalGasto"], '1', 2),
				"Proyecto" => $Proyecto,
				"Referencia" => $_POST["Descripcion"],
				"EXTRAER_NCF" => $Extraer_NCF_606,
				"Retenciones" => $_POST["Retencion"],
				"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_606,
				"Porc_ISR_Retenido" => $Porc_ISR_Retenido_606,
				"ITBIS_Retenido_606" => bcdiv($USDITBIS_Retenido_606, '1', 2),
				"Monto_Retencion_Renta_606" => bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
				"NAsiento" => $_POST["NAsiento"],
				"NAsientoRET" => $NAsientoRet,
				"FormaPago" => $_POST["Forma_De_Pago_606"],
				"id_banco" => $id_banco,
				"Modulo" => $modulo,
				"Estatus" => $Estatus,
				"Usuario_Creador" => $_POST["UsuarioLogueado"],
				"Accion_Factura" => $Accion_Factura);

$respuesta = ModeloCompras::mdlIngresarCompra($tabla, $datos);	
if($respuesta == "ok"){
	
	if($_POST["NCFCompra"] == "B11" || $_POST["NCFCompra"] == "B13"){ 
	$tabla = "correlativos_empresas";
	
	$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $_POST["NCFCompra"],
					"NCF_Cons" =>  $_POST["CodigoNCFCompra"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
}
if($_POST["NCFCompra"] == "E41" || $_POST["NCFCompra"] == "E43"){ 
	$tabla = "correlativos_empresas";
	
	$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $_POST["NCFCompra"],
					"NCF_Cons" =>  $_POST["CodigoNCFCompra"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
}
unset($_SESSION["FechaFacturadia_606"]);
unset($_SESSION["NCFCompra"]);
unset($_SESSION["CodigoNCFCompra"]);
unset($_SESSION["NCF_Modificado_606"]);
unset($_SESSION["agregarSuplidor"]);
unset($_SESSION["Tipo_Suplidor_Factura"]);
unset($_SESSION["RncSuplidorFactura"]);
unset($_SESSION["Nombre_Suplidor"]);
unset($_SESSION["Descripcion"]);
unset($_SESSION["tipo_de_monto"]);
unset($_SESSION["Tipo_Gasto_606"]);
unset($_SESSION["Forma_De_Pago_606"]);
unset($_SESSION["Transaccion_606"]);
unset($_SESSION["FechaPagomes606"]);
unset($_SESSION["FechaPagodia606"]);
unset($_SESSION["Referencia"]);
unset($_SESSION["ModuloBanco"]);
unset($_SESSION["listaGastos"]);
unset($_SESSION["TotalISCvi"]);
unset($_SESSION["TotalOtrosImpvi"]); 
unset($_SESSION["TotalISC"]); 
unset($_SESSION["TotalOtrosImp"]);
unset($_SESSION["propinalegal"]);
echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>La Compra Se Registro Correctamente<br>N° DE CONTROL EN COMPRA: '.$_POST["CodigoCompra"].'</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "crear-compra-gastosgenerales";
		}

		});

</script>';			
			}		

}/*cierre contabilidad*/

}/*cierre isset*/

}/* ctrcomprasgenerales*/


static public function ctrcomprasgeneralesNO(){

if(isset($_POST["RncEmpresaCompras"]) || isset($_POST["NCF_606"])){

$_SESSION['FechaFacturames_606'] = $_POST["FechaFacturames_606"];
$_SESSION["FechaFacturadia_606"] = $_POST["FechaFacturadia_606"];
$_SESSION["NCFCompraNo"] = $_POST["NCFCompraNo"];
$_SESSION["agregarSuplidor"] = $_POST["agregarSuplidor"];
$_SESSION["Tipo_Suplidor_Factura"] = $_POST["Tipo_Suplidor_Factura"];
$_SESSION["RncSuplidorFactura"] = $_POST["RncSuplidorFactura"];
$_SESSION["Nombre_Suplidor"] = $_POST["Nombre_Suplidor"];
$_SESSION["Descripcion"] = $_POST["Descripcion"];
$_SESSION["tipo_de_monto"] = $_POST["tipo_de_monto"];
$_SESSION["Tipo_Gasto_606"] = $_POST["Tipo_Gasto_606"];
$_SESSION["Forma_De_Pago_606"] = $_POST["Forma_De_Pago_606"];
$_SESSION["TotalISCvi"] = $_POST["TotalISCvi"];
$_SESSION["TotalOtrosImpvi"] = $_POST["TotalOtrosImpvi"];
$_SESSION["TotalISC"] = $_POST["TotalISC"];
$_SESSION["TotalOtrosImp"] = $_POST["TotalOtrosImp"];
$_POST["Transaccion_606"] = $_POST["Referencia"];
$_SESSION["Transaccion_606"] = $_POST["Transaccion_606"];
$_SESSION["FechaPagomes606"] = $_POST["FechaPagomes606"];
$_SESSION["FechaPagodia606"] = $_POST["FechaPagodia606"];
$_SESSION["Referencia"] = $_POST["Referencia"];
$_SESSION["ModuloBanco"] = $_POST["ModuloBanco"];
$_SESSION["listaGastos"] = $_POST["listaGastos"];
$_SESSION["propinalegal"] = $_POST["NetoPropinaLegal"];

if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){
	$_SESSION["ITBIS_LLEVADO_A_COSTO"] = $_POST["ITBIS_LLEVADO_A_COSTO"];
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1){
	$_SESSION["ITBIS_Sujeto_a_Propocionalidad"] = $_POST["ITBIS_Sujeto_a_Propocionalidad"];

}

    

/*******VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL FORMULARIO VALIDACIONES DEL ***
INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO INICIO  INICIO ****************************************************************************************************************/
		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
		$taNCF_606 = "NCF_606";
		$NCF_606 = $_POST["NCF_606"];

			

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
												window.location = "crear-compra-gastosgeneralesNo";
											}

											});

								</script>';
						exit;

		}
$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $Rnc_Empresa_606;
$tipocod = "DCG";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DCG".$N;
    }

$_POST["CodAsiento"] = $N;
$_POST["NAsiento"] = $NAsiento;

if($_POST["Contabilidad"] == 1 && $NAsiento == ""){
	echo '<script>
										swal({

											type: "error",
											title: "No se Reconoce un Asiento Contable vuelva a recargar la pagina!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-gastosgenerales";
													}

													});

										</script>';
								exit;


}


if($_POST["Contabilidad"] == 1){ 
		$tabla = "librodiario_empresas";
		$taRnc_Empresa = "Rnc_Empresa_LD";
		$Rnc_Empresa = $_POST["RncEmpresaCompras"];
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
														window.location = "crear-compra-gastosgeneralesNo";
													}

													});

										</script>';
								exit;

				}
		}
	 }
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */
	$Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
    $CodigoCompra = NULL;
          
          $compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
              
              if(!$compras){
              	$codigo = 1;
              	$_POST["CodigoCompra"] = $codigo;

               
              } else{

                foreach ($compras as $key => $value) {}
                          
                $codigo = $value["CodigoCompra"]+1;
            	$_POST["CodigoCompra"] = $codigo;

                
              }




		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

	 $Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
     $CodigoCompra = $_POST["CodigoCompra"];
          
      $compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
      
 if($compras != false && $compras["Rnc_Empresa_Compras"] == $Rnc_Empresa_Compra && $compras["CodigoCompra"] == $CodigoCompra){

		echo '<script>
				swal({
					type: "error",
					title: "ESTE NUMERO DE COMPRA ESTA REGISTRADO!",
					showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgeneralesNo";
											}

											});

								</script>';
						exit;

		}
		/*** INICIO DE ASIENTOS VACIOS***************/

	if(empty($_POST["listaGastos"]) || $_POST["listaGastos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN GASTO REGISTRADO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-gastosgeneralesNo";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

		
		
		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_606 = substr($_POST["NCF_606"], 0, 3);

	/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgeneralesNo";
													
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
									window.location = "crear-compra-gastosgeneralesNo";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["RncSuplidorFactura"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgeneralesNo";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[CP0-9]+$/', $_POST["NCF_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgeneralesNo";
													
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
									window.location = "crear-compra-gastosgeneralesNo";
													
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
									window.location = "crear-compra-gastosgeneralesNo";
													
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
									window.location = "crear-compra-gastosgeneralesNo";
													
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
									window.location = "crear-compra-gastosgeneralesNo";
													
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
									window.location = "crear-compra-gastosgeneralesNo";
													
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
						window.location = "crear-compra-gastosgeneralesNo";
													
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
									window.location = "crear-compra-gastosgeneralesNo";
													
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
									window.location = "crear-compra-gastosgeneralesNo";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
	///****Validar SUPLIDOR****///
if($_POST["RncEmpresaCompras"] != $_POST["RncSuplidorFactura"]){ 
		$tabla = "suplidor_empresas";
		$taRnc_Empresa_Suplidor = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Suplidor = $_POST["RncEmpresaCompras"];
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];
		
$suplidor =  ModeloSuplidores::mdlMostrarSuplidorFact($tabla, $taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, $taDocumento, $Documento);

if($suplidor != false && $suplidor["Rnc_Empresa_Suplidor"] == $Rnc_Empresa_Suplidor && $suplidor["Documento_Suplidor"] == $_POST["RncSuplidorFactura"] && $suplidor["id"] != $_POST["agregarSuplidor"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Suplidor no Coinciden con el RNC del cliente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgeneralesNo";
											}

											});

								</script>';


		exit;

}
}

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/


if(($_POST["Tipo_Suplidor_Factura"] == 1 && strlen($_POST["RncSuplidorFactura"]) != 9) || ($_POST["Tipo_Suplidor_Factura"] == 2 && strlen($_POST["RncSuplidorFactura"]) != 11)){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgeneralesNo";
													});					
								</script>';	
			exit;	

							
	}

	if((substr($_POST["NCF_606"], 0, 1) == "B" && strlen($_POST["NCF_606"]) != 11) || (substr($_POST["NCF_606"], 0, 1) == "E" && strlen($_POST["NCF_606"]) != 13)){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgeneralesNo";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
	
	$suma = $_POST["NetoGasto"];
	$PorcentajeITBIS = $suma * 0.18;
	

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 3);
	

	if($_POST["TotalITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
													
													});


												
								</script>';	
				

			exit;	


	}
$NCFCompra = $_POST["NCFCompraNo"];
$CodigoNCF = $_POST["CodigoNCFNo"];
if($NCFCompra == "CP1"){ 
				
$NCF_606 = $NCFCompra.$CodigoNCF;
		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
		$taNCF_606 = "NCF_606";
				
			

$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);



if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["NCF_606"] == $NCF_606){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';
						exit;

		}
	}
		
		/* INICIO AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["RncSuplidorFactura"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Suplidor"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);
			
			if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
				$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

					$respuesta = ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

			}
		/* FIN AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
		/************************VALIDACION DE RETENCIONES*******************/
if($_POST["Retencion"] == 1){ 

if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] > 0){
	if($_POST["Monto_ITBIS_Retenido"] > $_POST["TotalITBIS"]){

		echo '<script>
			swal({

			type: "error",
			title: "¡El Monto de La Retencion de ITBIS no debe ser mayor al monto Total de ITBIS!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	



	}
 


 }

}						


if($_POST["Retencion"] == 1){ 

if(isset($_POST["ISR_RETENIDO_Compras"]) && $_POST["ISR_RETENIDO_Compras"] > 0){
	if($_POST["tipo_de_seleccionretener"] == "0"){

		echo '<script>
			swal({

			type: "error",
			title: "¡Debe Selecionar un Tipo de Retencion de ISR!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	
	}

	
	

 }

}						



/********************************************************************/

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


       }

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

if(isset($_POST["tipo_de_monto"])){
	
		if($_POST["tipo_de_monto"] == 1){


			$Montototalbienes = $_POST["NetoGasto"];
			$Montototalservicios = "0";
			$Propinalegal = $_POST["NetoPropinaLegal"];
			$totalFactura = $_POST["NetoGasto"];
			$ITBIS_Compras_606 =$_POST["TotalITBIS"];
			$ITBIS_Servicios_606 = "0.00";
			$TOTALITBIS = $ITBIS_Compras_606 + $ITBIS_Servicios_606; 


		}else{

			$Montototalbienes = "0";
			$Montototalservicios = $_POST["NetoGasto"];
			$Propinalegal = $_POST["NetoPropinaLegal"];
			$totalFactura = $_POST["NetoGasto"];
			$ITBIS_Compras_606 = "0.00";
			$ITBIS_Servicios_606 = $_POST["TotalITBIS"];
			$TOTALITBIS = $ITBIS_Compras_606 + $ITBIS_Servicios_606;

		}
		if($_POST["Moneda_Factura"] == "USD"){

			$Moneda = "USD";
			$tasa = $_POST["tasaUS"];

				$USDMontototalbienes = $Montototalbienes * $tasa;
				$Montototalbienes = $USDMontototalbienes;
				$USDMontototalservicios = $Montototalservicios * $tasa;
				$Montototalservicios = $USDMontototalservicios;
				$USDPropinalegal = $Propinalegal * $tasa;
				$Propinalegal = $USDPropinalegal;
				$USDtotalFactura = $totalFactura * $tasa;
				$totalFactura = $USDtotalFactura;
				$USDITBIS_Compras_606 = $ITBIS_Compras_606 * $tasa;
				$USDITBIS_Servicios_606 = $ITBIS_Servicios_606 * $tasa;
				$ITBIS_Compras_606 = $USDITBIS_Compras_606;
				$ITBIS_Servicios_606 = $USDITBIS_Servicios_606;
				$TOTALITBIS = $ITBIS_Compras_606 +$ITBIS_Servicios_606;


		}else{
			$Moneda = "DOP";
			$tasa = 0;


		}
}	



if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){								

	$ITBIS_alcosto_606 = $TOTALITBIS;
	$ITBIS_Adelantar_606 = "0.00";

}else { 

	$ITBIS_alcosto_606 = "0.00";
	$ITBIS_Adelantar_606 = $TOTALITBIS;
										
}

if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] == 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Servicion_606 = "0";

}elseif(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] != 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = $TOTALITBIS;
										}
else { 
	
	$ITBIS_Proporcional_606 = "0.00";
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = "0.00";
									
}




if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $USDITBIS_Retenido_606 * $_POST["tasaUS"];
		$USDMonto_Retencion_Renta_606 =$_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $USDMonto_Retencion_Renta_606 * $_POST["tasaUS"];


	}else{
		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$USDMonto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
	}

		$Fecha_Ret_AñoMes_606  = $_POST["FechaFacturames_606"];
		$Fecha_Ret_Dia_606 = $_POST["FechaFacturadia_606"];
		
		
		
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

} else{ 

		$Fecha_Ret_AñoMes_606  = "";
		$Fecha_Ret_Dia_606 = "";
		$ITBIS_Retenido_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";
		$Tipo_Retencion_ISR_606 = "0";
		$Extrar_Tipo_Retencion_606 = 0;
		$Porc_ITBIS_Retenido_606 = 0;
		$Porc_ISR_Retenido_606 = 0; 
		$USDITBIS_Retenido_606 = "0.00";
		$ITBIS_Retenido_606 = "0.00";
		$USDMonto_Retencion_Renta_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";

}



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
		


if($_POST["Moneda_Factura"] == "USD"){

$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $USDImpuestos_Selectivo_606 * $_POST["tasaUS"];


$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $USDOtro_Impuesto_606 * $_POST["tasaUS"];

	}else{
$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $_POST["TotalISC"];

$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $_POST["TotalOtrosImp"];
	
	}
$ITBIS_Percibido_Compras_606 = "0.00";
$ISR_Percibido_606 = "0.00";
$Monto_Propina_606 = $_POST["NetoPropinaLegal"];
$Extraer_Tipo_Pago_606 = $_POST["Forma_De_Pago_606"];
$Extraer_Tipo_Gasto_606 = $ValorTipo_Gasto_606;
$B04MeMa_607 = "";
$Tipo_Transaccion_606 = 1;
$Estatus_606 = "";
$B04_Periodo_606 = 0;
$Fecha_Trans_AnoMes_606 = $_POST["FechaPagomes606"];
$Fecha_Trans_Dia_606 = $_POST["FechaPagodia606"];
$Referencia_606 = $_POST["Referencia"];
$Banco_606 = $_POST["agregarBanco"];
$Accion_606 = "Creado";
$CodigoCompra = $_POST["CodigoCompra"];
$Modulo = "COMPRAS";


$tabla = "606_empresas";


$datos = array("Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Tipo_Suplidor_Factura"],
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
"ITBIS_Factura_606" => $TOTALITBIS,
"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $Impuestos_Selectivo_606,
"Otro_Impuesto_606" => $Otro_Impuesto_606,
"Monto_Propina_606" => $Monto_Propina_606,
"Forma_Pago_606" => $ValorForma_De_Pago_606 ,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $Extraer_Tipo_Pago_606,
"Extraer_Tipo_Gasto_606" => $Extraer_Tipo_Gasto_606,
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $ITBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"Porc_ITBIS_Retenido_606" => $Porc_ITBIS_Retenido_606,
"Porc_ISR_Retenido_606" => $Porc_ISR_Retenido_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $Fecha_Trans_AnoMes_606,
"Fecha_Trans_Dia_606" => $Fecha_Trans_Dia_606,
"Referencia_606" => $Referencia_606,
"Banco_606" => $Banco_606,
"Descripcion_606" => $_POST["Descripcion"],
"Nombre_Empresa_606" => $_POST["Nombre_Suplidor"],
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
									
	}
	$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $Rnc_Factura_606;
		$taNCF_606 = "NCF_606";
		$NCF_606 = $NCF_606;			

	$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

if($Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){
			
	$id_registro606 = $Consulta606["id"];


}else{
	$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $Rnc_Factura_606;
		$taNCF_606 = "NCF_606";
		$NCF_606 = $NCF_606;

$respuesta = Modelo606::mdlBorrarLD606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);
					
	echo '<script>
				swal({

					type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
					showConfirmButton: false,
					timer: 6000
					}).then(()=>{
					window.location = "crear-compra-gastosgeneralesNo";
													
					});
												
			</script>';	
		
		exit;
	}



/***************************** agregar Cliente *************************/
	$id_Suplidor = $_POST["agregarSuplidor"];
	$tabla = "suplidor_empresas";

		
		$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		
		if(!$respuesta || $respuesta == false){
				$tabla = "suplidor_empresas";
				
				$Email = "";
				$Telefono = "";
				$Direccion = "";
				$Estado = "Creado";

		$datos = array("Rnc_Empresa_Suplidor" => $Rnc_Empresa_606,
		"Tipo_Suplidor" => $_POST["Tipo_Suplidor_Factura"],
		"Nombre_Suplidor" => $_POST["Nombre_Suplidor"], 
		"Documento_Suplidor" => $_POST["RncSuplidorFactura"],
		"Email" => $Email, 
		"Telefono" => $Telefono ,
		"Direccion" => $Direccion, 
		"Usuario_Creador" => $_POST["UsuarioLogueado"], 
		"Estado" => $Estado);
		
		$respuesta = ModeloSuplidores::mdlCrearsuplidor($tabla, $datos);
						   
		$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		

		$id_Suplidor = $respuesta["id"];
 }

 /*crear cuenta por pagar*/

if($_POST["Forma_De_Pago_606"] == "04"){ 
 	
 	$tabla = "cxp_empresas";
	$Dia_Credito_cxp = "15";
	$Retenciones = "2";
	$tipo = "FACTURA";
	$Estatus = "1";
	
	$datos = array("id_606" => $id_registro606,
					"CodigoCompra" => $_POST["CodigoCompra"],
					"Rnc_Empresa_cxp" => $_POST["RncEmpresaCompras"],
					"CodigoCompra" => $_POST["CodigoCompra"],
					"id_Suplidor" => $id_Suplidor,
					"Rnc_Suplidor" => $Rnc_Factura_606,
					"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
					"NCF_cxp" => $NCF_606,
					"FechaAnoMes_cxp" => $_POST["FechaFacturames_606"],
					"FechaDia_cxp" => $_POST["FechaFacturadia_606"], 
					"Dia_Credito_cxp" => $Dia_Credito_cxp, 
					"Moneda" => $Moneda,
					"Tasa" => $tasa,
					"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
					"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2),
					"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
					"Neto" => bcdiv($_POST["NetoGasto"], '1', 2),
					"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
					"Total" => bcdiv($_POST["TotalGasto"], '1', 2),
					"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_606, '1', 2),
					"Retencion_Renta" => bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
					"Observaciones" => $_POST["Descripcion"],
					"Retenciones" => $Retenciones,
					"MontoPagado" => 0,
					"Estado" => "PorPagar",
					"Tipo" => $tipo,
					"Estatus" => $Estatus);
	
	$respuesta = ModeloCXP::mdlIngresarcxp($tabla, $datos); 

	
}/*fin cierre de cuentas por cobrar*/		

if($_POST["Contabilidad"] == 1){

    

				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $Rnc_Factura_606;
				$taNCF_606 = "NCF_606";
				$NCF_606 = $NCF_606;			

		$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

		if($Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){
			$id_registro606 = $Consulta606["id"];


		}

$listaGastos =  json_decode($_POST["listaGastos"], true);

foreach ($listaGastos as $key => $value){
				
		/****consulta proyecto*****/

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
	$id = "id";
	$valorid = $_POST["agregarBanco"];
	$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);

	if($banco != false){
				$idbanco = $banco["id"];
        
        $id_banco = $banco["id"];


      }else{
        $idbanco = 0;
        $id_banco = 0;


      }
	
if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["gasto"] * $tasa;
		$value["gasto"] = $cambioMoneda;

	}
	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DCG";
	$Accion = "COMPRAGENERAL";
	$debito = bcdiv($value["gasto"], '1', 2);
	$credito = "0";
	$Transaccion_606 = 1;

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCompras"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
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
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturames_606"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

} /** CIERRE FOR DE CUENTAS CONTABLES **/
if($_POST["NetoPropinaLegal"] > 0){ 	
	$idgrupo = "6";
	$idcategoria = "9";
	$idgenerica = "02";
	$idcuenta = "001";
	$nombrecuenta = "propina legal";
	$debito = bcdiv($Monto_Propina_606, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}

if(!isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["PORITBIS"] > 0){	
	$idgrupo = "1";
	$idcategoria = "3";
	$idgenerica = "01";
	$idcuenta = "001";
	$nombrecuenta = "ITBIS pagados en compras";
	$debito = bcdiv($TOTALITBIS, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }

 if($_POST["TotalISC"] > 0 || $_POST["TotalOtrosImp"] > 0 || $ITBIS_alcosto_606 > 0){
	
	$totalimpuestos = $Impuestos_Selectivo_606 + $Otro_Impuesto_606 + $ITBIS_alcosto_606;
	$idgrupo = "6";
	$idcategoria = "1";
	$idgenerica = "09";
	$idcuenta = "003";
	$nombrecuenta = "impuestos indirectos";
	$debito = bcdiv($totalimpuestos, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}


if($_POST["Forma_De_Pago_606"] == "04"){ 
	$TotalGasto = $_POST["TotalGasto"];


	if($_POST["Moneda_Factura"] == "USD"){
		$TotalGasto  = $_POST["TotalGasto"] * $tasa;
		

		}
		
	$idgrupo = "2";
	$idcategoria = "2";
	$idgenerica = "01";
	$idcuenta = "001";
	$nombrecuenta = "proveedores nacionales";
	$debito = 0;
	$credito = bcdiv($TotalGasto, '1', 2);

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

} else{
	$TotalGasto = $_POST["TotalGasto"];


	if($_POST["Moneda_Factura"] == "USD"){
		$TotalGasto  = $_POST["TotalGasto"] * $tasa;
		



		}

	$tabla = "banco_empresas"; 
	$id = "id";
	$valorid = $_POST["agregarBanco"];
	$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);

	$tabla = "librodiario_empresas";

		$idgrupo = $banco["id_grupo"];
		$idcategoria = $banco["id_categoria"];
		$idgenerica = $banco["id_generica"];
		$idcuenta = $banco["id_cuenta"];
		$nombrecuenta = $banco["Nombre_CuentaContable"];
		$debito = 0;
		$credito = bcdiv($TotalGasto, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}
if($_POST["Retencion"] == 1){
	
	if($ITBIS_Retenido_606 > 0){
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido por pagar";
		$debito = 0;
		$credito = bcdiv($ITBIS_Retenido_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
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

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
	}

}/*cierre retencion*/

	


/******************* ACTUALIZAR CORRELATIVOS *************************/

$tabla = "correlativos_no_fiscal";
$Tipo_NCF = "DCG";
			
$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
$tabla = "correlativos_no_fiscal";
$Tipo_NCF = "CP1";
			
$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $_POST["CodigoNCFNo"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);


/***********CIERRE DE CONTABILIDAD ***********/
if($_POST["Retencion"] == 1){
	$NAsientoRet = $NAsiento;



}else{

$NAsientoRet = "";

}
$tabla = "compras_empresas";
$modulo = "COMPRAGENERALES";
$Estatus = "POR PAGAR";
$Accion_Factura = "CREADA";
$Proyecto = "NO APLICA";
$NAsientoRet = "";
$datos = array("Rnc_Empresa_Compras" => $Rnc_Empresa_606,
				"CodigoCompra" => $_POST["CodigoCompra"],
				"Rnc_Suplidor" => $Rnc_Factura_606,
				"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
				"NCF_Factura" => $NCF_606,
				"FechaAnoMes" => $_POST["FechaFacturames_606"],
				"FechaDia" => $_POST["FechaFacturadia_606"],
				"id_Suplidor" => $id_Suplidor,
				"Producto" => $_POST["listaGastos"],
				"Porimpuesto" => $_POST["PORITBIS"],
				"Moneda" => $_POST["Moneda_Factura"],
				"Tasa" => $tasa,
				"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
				"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2),
				"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
				"Neto" => bcdiv($_POST["NetoGasto"], '1', 2),
				"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
				"Total" => bcdiv($_POST["TotalGasto"], '1', 2),
				"Proyecto" => $Proyecto,
				"Referencia" => $_POST["Descripcion"],
				"EXTRAER_NCF" => $Extraer_NCF_606,
				"Retenciones" => $_POST["Retencion"],
				"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_606,
				"Porc_ISR_Retenido" => $Porc_ISR_Retenido_606,
				"ITBIS_Retenido_606" => bcdiv($USDITBIS_Retenido_606, '1', 2),
				"Monto_Retencion_Renta_606" => bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
				"FormaPago" => $_POST["Forma_De_Pago_606"],
				"id_banco" => $id_banco,
				"Modulo" => $modulo,
				"Estatus" => $Estatus,
				"NAsiento" => $NAsiento,
				"NAsientoRET" => $NAsientoRet,
				"Usuario_Creador" => $_POST["UsuarioLogueado"],
				"Accion_Factura" => $Accion_Factura);

$respuesta = ModeloCompras::mdlIngresarCompra($tabla, $datos);	
if($respuesta == "ok"){
unset($_SESSION["FechaFacturadia_606"]);
unset($_SESSION["NCFCompra"]);
unset($_SESSION["agregarSuplidor"]);
unset($_SESSION["Tipo_Suplidor_Factura"]);
unset($_SESSION["RncSuplidorFactura"]);
unset($_SESSION["Nombre_Suplidor"]);
unset($_SESSION["Descripcion"]);
unset($_SESSION["tipo_de_monto"]);
unset($_SESSION["Tipo_Gasto_606"]);
unset($_SESSION["Forma_De_Pago_606"]);
unset($_SESSION["Transaccion_606"]);
unset($_SESSION["FechaPagomes606"]);
unset($_SESSION["FechaPagodia606"]);
unset($_SESSION["Referencia"]);
unset($_SESSION["ModuloBanco"]);
unset($_SESSION["listaGastos"]);
unset($_SESSION["TotalISCvi"]);
unset($_SESSION["TotalOtrosImpvi"]); 
unset($_SESSION["TotalISC"]); 
unset($_SESSION["TotalOtrosImp"]);
unset($_SESSION["propinalegal"]);


			echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>La Compra Se Registro Correctamente<br>N° DE CONTROL EN COMPRAS : '.$_POST["CodigoCompra"].'</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "crear-compra-gastosgeneralesNo";
		}

		});

</script>';		
			}		

}/*cierre contabilidad*/

}/*cierre isset*/

}/* ctrcomprasgenerales*/
static public function ctrEditarcomprasgenerales(){ 

	if(isset($_POST["Editar_gastosgenerales"]) && isset($_POST["Editar_id_606"])){
		

/*******  VALIDACIONES DEL FORMULARIO VALIDACIONES DEL INICIO ***************************/

		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["Editar-RncSuplidorFactura"];
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
												window.location = "compras";
											}

											});

								</script>';
						exit;

		}
		/*** INICIO DE ASIENTOS VACIOS***************/

		if(empty($_POST["listaGastos"]) || $_POST["listaGastos"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN GASTO REGISTRADO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "compras";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/
			
		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_606 = substr($_POST["Editar-NCF_606"], 0, 3);

			if($Extraer_NCF_606 == "B04" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
									});
												
								</script>';	
					exit;	
	} 
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-RncSuplidorFactura"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["Fiscal"] == "SI"){ 
	if(!(preg_match('/^[BE0-9]+$/', $_POST["Editar-NCF_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
	}
	}else{
		if(!(preg_match('/^[CP0-9]+$/', $_POST["Editar-NCF_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
		}


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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
						window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
	if($_POST["RncEmpresaCompras"] != $_POST["Editar-RncSuplidorFactura"]){ 
	$tabla = "suplidor_empresas";
		$taRnc_Empresa_Suplidor = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Suplidor = $_POST["RncEmpresaCompras"];
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["Editar-RncSuplidorFactura"];
		
$suplidor =  ModeloSuplidores::mdlMostrarSuplidorFact($tabla, $taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, $taDocumento, $Documento);

if($suplidor != false && $suplidor["Rnc_Empresa_Suplidor"] == $Rnc_Empresa_Suplidor && $suplidor["Documento_Suplidor"] == $_POST["Editar-RncSuplidorFactura"] && $suplidor["id"] != $_POST["agregarSuplidor"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Suplidor no Coinciden con el RNC del cliente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "compras";
											}

											});

								</script>';


		exit;

}
}

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
if(($_POST["Tipo_Suplidor_Factura"] == 1 && strlen($_POST["Editar-RncSuplidorFactura"]) != 9) || ($_POST["Tipo_Suplidor_Factura"] == 2 && strlen($_POST["Editar-RncSuplidorFactura"]) != 11)){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													});					
								</script>';	
			exit;	

							
	}

	if((substr($_POST["Editar-NCF_606"], 0, 1) == "B" && strlen($_POST["Editar-NCF_606"]) != 11) || (substr($_POST["Editar-NCF_606"], 0, 1) == "E" && strlen($_POST["Editar-NCF_606"]) != 13) ){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
	
	$suma = $_POST["NetoGasto"];
	$PorcentajeITBIS = $suma * 0.18;
	

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 3);
	

	if($_POST["TotalITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
													
													});
												
								</script>';	
				
			exit;	


	}

	/* INICIO AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["Editar-RncSuplidorFactura"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Suplidor"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);
			
			if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
				$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

					$respuesta = ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

			}
		/* FIN AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/

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


       }
	
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

if(isset($_POST["tipo_de_monto"])){
	
		if($_POST["tipo_de_monto"] == 1){


			$Montototalbienes = $_POST["NetoGasto"];
			$Montototalservicios = "0";
			$Propinalegal = $_POST["NetoPropinaLegal"];
			$totalFactura = $_POST["NetoGasto"];
			$ITBIS_Compras_606 =$_POST["TotalITBIS"];
			$ITBIS_Servicios_606 = "0.00";
			$TOTALITBIS = $ITBIS_Compras_606 + $ITBIS_Servicios_606; 


		}else{

			$Montototalbienes = "0";
			$Montototalservicios = $_POST["NetoGasto"];
			$Propinalegal = $_POST["NetoPropinaLegal"];
			$totalFactura = $_POST["NetoGasto"];
			$ITBIS_Compras_606 = "0.00";
			$ITBIS_Servicios_606 = $_POST["TotalITBIS"];
			$TOTALITBIS = $ITBIS_Compras_606 + $ITBIS_Servicios_606;

		}
		if($_POST["Moneda_Factura"] == "USD"){

			$Moneda = "USD";
			$tasa = $_POST["tasaUS"];

				$USDMontototalbienes = $Montototalbienes * $tasa;
				$Montototalbienes = $USDMontototalbienes;
				$USDMontototalservicios = $Montototalservicios * $tasa;
				$Montototalservicios = $USDMontototalservicios;
				$USDPropinalegal = $Propinalegal * $tasa;
				$Propinalegal = $USDPropinalegal;
				$USDtotalFactura = $totalFactura * $tasa;
				$totalFactura = $USDtotalFactura;
				$USDITBIS_Compras_606 = $ITBIS_Compras_606 * $tasa;
				$USDITBIS_Servicios_606 = $ITBIS_Servicios_606 * $tasa;
				$ITBIS_Compras_606 = $USDITBIS_Compras_606;
				$ITBIS_Servicios_606 = $USDITBIS_Servicios_606;
				$TOTALITBIS = $ITBIS_Compras_606 +$ITBIS_Servicios_606;


		}else{
			$Moneda = "DOP";
			$tasa = 0;


		}
}	



if(isset($_POST["Editar-ITBIS_LLEVADO_A_COSTO"]) && $_POST["Editar-ITBIS_LLEVADO_A_COSTO"] == 1){
										
	$ITBIS_alcosto_606 = $TOTALITBIS;
	$ITBIS_Adelantar_606 = "0.00";

}else { 
	
	$ITBIS_alcosto_606 = "0.00";
	$ITBIS_Adelantar_606 = $TOTALITBIS;
										
}


if(isset($_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] == 1){ 


	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Servicion_606 = "0";

}elseif(isset($_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] != 1){ 
	

	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = $TOTALITBIS;
}
else { 

	$ITBIS_Proporcional_606 = "0.00";
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = "0.00";

}


if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $USDITBIS_Retenido_606 * $_POST["tasaUS"];
		$USDMonto_Retencion_Renta_606 =$_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $USDMonto_Retencion_Renta_606 * $_POST["tasaUS"];


	}else{
		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$USDMonto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
	}

		$Fecha_Ret_AñoMes_606  = $_POST["FechaFacturames_606"];
		$Fecha_Ret_Dia_606 = $_POST["FechaFacturadia_606"];
		
		
		
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

} else{ 

		$Fecha_Ret_AñoMes_606  = "";
		$Fecha_Ret_Dia_606 = "";
		$ITBIS_Retenido_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";
		$Tipo_Retencion_ISR_606 = "0";
		$Extrar_Tipo_Retencion_606 = 0;
		$Porc_ITBIS_Retenido_606 = 0;
		$Porc_ISR_Retenido_606 = 0; 
		$USDITBIS_Retenido_606 = "0.00";
		$ITBIS_Retenido_606 = "0.00";
		$USDMonto_Retencion_Renta_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";

}



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
		
if($_POST["Moneda_Factura"] == "USD"){

$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $USDImpuestos_Selectivo_606 * $_POST["tasaUS"];


$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $USDOtro_Impuesto_606 * $_POST["tasaUS"];

	}else{
$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $_POST["TotalISC"];

$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $_POST["TotalOtrosImp"];
	
	}
	
$ITBIS_Percibido_Compras_606 = "0.00";
$ISR_Percibido_606 = "0.00";
$Monto_Propina_606 = $_POST["NetoPropinaLegal"];

$Extraer_Tipo_Pago_606 = $_POST["Forma_De_Pago_606"];
$Extraer_Tipo_Gasto_606 = $ValorTipo_Gasto_606;
$B04MeMa_607 = "";
$Tipo_Transaccion_606 = 1;
$Estatus_606 = "";

$B04_Periodo_606 = 0;

$Fecha_Trans_AnoMes_606 = $_POST["FechaPagomes606"];
$Fecha_Trans_Dia_606 = $_POST["FechaPagodia606"];
$Referencia_606 = $_POST["Referencia"];
$Banco_606 = $_POST["agregarBanco"];

$CodigoCompra = $_POST["CodigoCompra"];
$Modulo = "COMPRAS";

$Accion_606 = "EDITADA";

$tabla = "606_empresas";
 $datos = array("id" => $_POST["Editar_id_606"],
 "Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Tipo_Suplidor_Factura"],
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
"ITBIS_Factura_606" => $TOTALITBIS,
"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $Impuestos_Selectivo_606,
"Otro_Impuesto_606" => $Otro_Impuesto_606,
"Monto_Propina_606" => $Monto_Propina_606,
"Forma_Pago_606" => $ValorForma_De_Pago_606 ,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $Extraer_Tipo_Pago_606,
"Extraer_Tipo_Gasto_606" => $Extraer_Tipo_Gasto_606,
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $ITBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"Porc_ITBIS_Retenido_606" => $Porc_ITBIS_Retenido_606,
"Porc_ISR_Retenido_606" => $Porc_ISR_Retenido_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $Fecha_Trans_AnoMes_606,
"Fecha_Trans_Dia_606" => $Fecha_Trans_Dia_606,
"Referencia_606" => $Referencia_606,
"Banco_606" => $Banco_606,
"Descripcion_606" => $_POST["Descripcion"],
"Nombre_Empresa_606" => $_POST["Nombre_Suplidor"],
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


/********************************/

/***************************************
			agregar Cliente 
	***************************************/
	$tabla = "suplidor_empresas";
	$id_Suplidor = $_POST["agregarSuplidor"];
		$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["Editar-RncSuplidorFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		
		if(!$respuesta || $respuesta == false){
				$tabla = "suplidor_empresas";
				$Email = "";
				$Telefono = "";
				$Direccion = "";
				$Estado = "Creado";

		$datos = array("Rnc_Empresa_Suplidor" => $Rnc_Empresa_606,
		"Tipo_Suplidor" => $_POST["Tipo_Suplidor_Factura"],
		"Nombre_Suplidor" => $_POST["Nombre_Suplidor"], 
		"Documento_Suplidor" => $_POST["Editar-RncSuplidorFactura"],
		"Email" => $Email, 
		"Telefono" => $Telefono ,
		"Direccion" => $Direccion, 
		"Usuario_Creador" => $_POST["UsuarioLogueado"], 
		"Estado" => $Estado);
		
		$respuesta = ModeloSuplidores::mdlCrearsuplidor($tabla, $datos);
						   

		$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["Editar-RncSuplidorFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		

		$id_Suplidor = $respuesta["id"];
 }

 /*EDITAR CUENTAS POR PAGAR */
if($Extraer_Tipo_Pago_606 == "04" && $_POST["Editar_id_cxp"] != "NO"){


	$tabla = "cxp_empresas";
	$Dia_Credito_cxp = "15";
	$Retenciones = "2";
	$tipo = "FACTURA";
	$Estatus = "1";
	
	$datos = array("id" => $_POST["Editar_id_cxp"],
					"Rnc_Empresa_cxp" => $_POST["RncEmpresaCompras"],
					"CodigoCompra" => $_POST["CodigoCompra"],
					"id_Suplidor" => $id_Suplidor,
					"Rnc_Suplidor" => $Rnc_Factura_606,
					"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
					"NCF_cxp" => $NCF_606,
					"FechaAnoMes_cxp" => $_POST["FechaFacturames_606"],
					"FechaDia_cxp" => $_POST["FechaFacturadia_606"], 
					"Fecha_Ret_AnoMes_cxp" => "", 
					"Fecha_Ret_Dia_cxp" => "", 
					"Dia_Credito_cxp" => $Dia_Credito_cxp, 
					"Moneda" => $Moneda,
					"Tasa" => $tasa,
					"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
					"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2),
					"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
					"Neto" => bcdiv($_POST["NetoGasto"], '1', 2),
					"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
					"Total" => bcdiv($_POST["TotalGasto"], '1', 2),
					"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_606, '1', 2),
					"Retencion_Renta" => bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
					"Observaciones" => $_POST["Descripcion"],
					"Retenciones" => $Retenciones,
					"Tipo" => $tipo,
					"Estatus" => $Estatus);
	
	$respuesta = ModeloCXP::mdlEDITARCXPFACTURA($tabla, $datos); 

if($_POST["Retencion"] == 1){

		$tabla = "cxp_empresas";
        $taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
        $Rnc_Empresa_cxp = $_POST["RncEmpresaCompras"];
        $taCodigoCompra = "CodigoCompra";
        $CodigoCompra = $_POST["CodigoCompra"];
        $taRnc_Factura_cxp = "Rnc_Suplidor";
        $Rnc_Factura_cxp = $_POST["RncSuplidor-anterior"];
        $taNCF_cxp = "NCF_cxp";
        $NCF_cxp = $_POST["NCF_606-anterior"];
        $taRetenciones = "Retenciones";
        $Retenciones = 1;

		$respuesta = ModeloCXP::MdlMostrarCXPDGII($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoCompra, $CodigoCompra, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taRetenciones, $Retenciones);

		foreach ($respuesta as $key => $value) {
		$valorid = $value["id"];
		$borrar =  ModeloCXP::mdlBorrarCXP($tabla, $valorid);

		}

		

	}else{
		$tabla = "cxp_empresas";
        $taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
        $Rnc_Empresa_cxp = $_POST["RncEmpresaCompras"];
        $taCodigoCompra = "CodigoCompra";
        $CodigoCompra = $_POST["CodigoCompra"];
        $taRnc_Factura_cxp = "Rnc_Suplidor";
        $Rnc_Factura_cxp = $_POST["RncSuplidor-anterior"];;
        $taNCF_cxp = "NCF_cxp";
        $NCF_cxp = $_POST["NCF_606-anterior"];
        $taRetenciones = "Retenciones";
        $Retenciones = 1;

		$respuesta = ModeloCXP::MdlMostrarCXPDGII($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoCompra, $CodigoCompra, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taRetenciones, $Retenciones);


		foreach ($respuesta as $key => $value) {
		$valorid = $value["id"];
		$borrar =  ModeloCXP::mdlBorrarCXP($tabla, $valorid);

		}

	}



}/*cierre editar cxp*/


/*BORRAR CXP*/
if($Extraer_Tipo_Pago_606 != "04" && $_POST["Editar_id_cxp"] != "NO"){

$tabla = "cxp_empresas";

$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
$Rnc_Empresa_cxp = $_GET["RncEmpresaCompras"];

$taRnc_Suplidor = "CodigoCompra";
$Rnc_Suplidor = $_POST["CodigoCompra"];

$taNCF_cxp = "id";
$NCF_cxp = $_POST["Editar_id_cxp"];

$respuesta = ModeloCompras::mdlBorrarCompras606CXP($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taRnc_Suplidor, $Rnc_Suplidor, $taNCF_cxp, $NCF_cxp);

	$tabla = "cxp_empresas";
        $taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
        $Rnc_Empresa_cxp = $_POST["RncEmpresaCompras"];
        $taCodigoCompra = "CodigoCompra";
        $CodigoCompra = $_POST["CodigoCompra"];
        $taRnc_Factura_cxp = "Rnc_Suplidor";
        $Rnc_Factura_cxp = $_POST["RncSuplidor-anterior"];;
        $taNCF_cxp = "NCF_cxp";
        $NCF_cxp = $_POST["NCF_606-anterior"];
        $taRetenciones = "Retenciones";
        $Retenciones = 1;

		$respuesta = ModeloCXP::MdlMostrarCXPDGII($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoCompra, $CodigoCompra, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taRetenciones, $Retenciones);


		foreach ($respuesta as $key => $value) {
		$valorid = $value["id"];
		$borrar =  ModeloCXP::mdlBorrarCXP($tabla, $valorid);

		}

}/*CREAR*/
if($Extraer_Tipo_Pago_606 == "04" && $_POST["Editar_id_cxp"] == "NO"){

	$tabla = "cxp_empresas";
	$Dia_Credito_cxp = "15";
	$Retenciones = "2";
	$tipo = "FACTURA";
	$Estatus = "1";
	$datos = array("id_606" => $_POST["Editar_id_606"],
		"Rnc_Empresa_cxp" => $_POST["RncEmpresaCompras"],
					"CodigoCompra" => $_POST["CodigoCompra"],
					"id_Suplidor" => $id_Suplidor,
					"Rnc_Suplidor" => $Rnc_Factura_606,
					"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
					"NCF_cxp" => $NCF_606,
					"FechaAnoMes_cxp" => $_POST["FechaFacturames_606"],
					"FechaDia_cxp" => $_POST["FechaFacturadia_606"], 
					"Dia_Credito_cxp" => $Dia_Credito_cxp, 
					"Moneda" => $Moneda,
					"Tasa" => $tasa,
					"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
					"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2),
					"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
					"Neto" => bcdiv($_POST["NetoGasto"], '1', 2),
					"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
					"Total" => bcdiv($_POST["TotalGasto"], '1', 2),
					"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_606, '1', 2),
					"Retencion_Renta" => bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
					"Observaciones" => $_POST["Descripcion"],
					"Retenciones" => $Retenciones,
					"MontoPagado" => 0,
					"Estado" => "PorPagar",
					"Tipo" => $tipo,
					"Estatus" => $Estatus);
	 
	
	$respuesta = ModeloCXP::mdlIngresarcxp($tabla, $datos);

} /*** fin cuentas por cobrar ***/

if($_POST["Contabilidad"] == 1){
	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_606"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD =$_POST["RncEmpresaCompras"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DCG";

	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}
	/* BORRAR ASIENTO DE RETENCION*/
	$taExtraer = "Extraer_NAsiento";
	$Extraer = "REC";

	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsientoRet"];

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

	
	
	$NAsiento = $_POST["NAsiento"];
	$id_registro606 = $_POST["Editar_id_606"];
	$listaGastos =  json_decode($_POST["listaGastos"], true);

		foreach ($listaGastos as $key => $value) {
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
			$Rnc_Empresa_LD = $_POST["RncEmpresaCompras"];
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
  if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["gasto"] * $tasa;
		$value["gasto"] = $cambioMoneda;

	}
	
	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DCG";
	$Accion = "COMPRAGENERAL";
	$debito = bcdiv($value["gasto"], '1', 2);
	$credito = "0";
	$Transaccion_606 = 1;
	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresaCompras"],
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
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
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturames_606"],
					"id_banco" => $id_banco,
					"referencia" =>  $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
} /*CIERRE FOR DE CUENTAS CONTABLES*/
if($_POST["NetoPropinaLegal"] > 0){ 	
	$idgrupo = "6";
	$idcategoria = "9";
	$idgenerica = "02";
	$idcuenta = "001";
	$nombrecuenta = "propina legal";
	$debito = bcdiv($Monto_Propina_606, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	}
	if(!isset($_POST["Editar-ITBIS_LLEVADO_A_COSTO"]) && $_POST["PORITBIS"] > 0){
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "ITBIS pagados en compras";
		$debito = bcdiv($TOTALITBIS, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }

 
 if($_POST["TotalISC"] > 0 || $_POST["TotalOtrosImp"] > 0 || $ITBIS_alcosto_606 > 0){
	$totalimpuestos = $Impuestos_Selectivo_606 + $Otro_Impuesto_606 + $ITBIS_alcosto_606;

	$idgrupo = "6";
	$idcategoria = "1";
	$idgenerica = "09";
	$idcuenta = "003";
	$nombrecuenta = "impuestos indirectos";
	$debito = bcdiv($totalimpuestos, '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}

if($_POST["Forma_De_Pago_606"] == "04"){ 
	$TotalGasto = $_POST["TotalGasto"];


	if($_POST["Moneda_Factura"] == "USD"){
		$TotalGasto  = $_POST["TotalGasto"] * $tasa;
		

		}
	

	$tabla = "librodiario_empresas";
		$idgrupo = "2";
		$idcategoria = "2";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "proveedores nacionales";
		$debito = 0;
		$credito = bcdiv($TotalGasto, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
}else{
	$TotalGasto = $_POST["TotalGasto"];


	if($_POST["Moneda_Factura"] == "USD"){
		$TotalGasto  = $_POST["TotalGasto"] * $tasa;
		

		}

	$tabla = "banco_empresas"; 
	$id = "id";
	$valorid = $_POST["agregarBanco"];
	$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
	
	$tabla = "librodiario_empresas";

		$idbanco = $banco["id"];
		$idgrupo = $banco["id_grupo"];
		$idcategoria = $banco["id_categoria"];
		$idgenerica = $banco["id_generica"];
		$idcuenta = $banco["id_cuenta"];
		$nombrecuenta = $banco["Nombre_CuentaContable"];
		$debito = 0;
		$credito = bcdiv($TotalGasto, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


}


 if($_POST["Retencion"] == 1){
 	
	if($ITBIS_Retenido_606 > 0){
		
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido por pagar";
		$debito = 0;
		$credito = bcdiv($ITBIS_Retenido_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

		$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

	

	}

	if($Monto_Retencion_Renta_606 != 0){
		
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "02";
		$idcuenta = "002";
		$nombrecuenta = "retenciones de ISR IR17 por pagar";
		$debito = 0;
		$credito = bcdiv($Monto_Retencion_Renta_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_606,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);
	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	}

}/*cierre retencion*/



	 }/*cierre if de contabilidad*/

if($_POST["Retencion"] == 1){
	$NAsientoRet = $_POST["NAsiento"];



}else{

$NAsientoRet = "";

}

$tabla = "compras_empresas";
$modulo = "COMPRAGENERALES";
$Estatus = "POR PAGAR";
$Proyecto = "NO APLICA";
$Accion_Factura = "EDITADA";
$datos = array("id" => $_POST["Editar_gastosgenerales"],
	"Rnc_Empresa_Compras" => $Rnc_Empresa_606,
	"CodigoCompra" => $_POST["CodigoCompra"],
	"Rnc_Suplidor" => $Rnc_Factura_606,
	"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
	"NCF_Factura" => $NCF_606,
	"FechaAnoMes" => $_POST["FechaFacturames_606"],
	"FechaDia" => $_POST["FechaFacturadia_606"],
	"id_Suplidor" => $id_Suplidor,
	"Producto" => $_POST["listaGastos"],
	"Porimpuesto" => $_POST["PORITBIS"],
	"Moneda" => $_POST["Moneda_Factura"],
	"Tasa" => $tasa,
	"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
	"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2),
	"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
	"Neto" => bcdiv($_POST["NetoGasto"], '1', 2),
	"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
	"Total" => bcdiv($_POST["TotalGasto"], '1', 2),
	"Proyecto" => $Proyecto,
	"Referencia" => $_POST["Descripcion"],
	"FormaPago" => $_POST["Forma_De_Pago_606"],
	"id_banco" => $_POST["agregarBanco"],
	"EXTRAER_NCF" => $Extraer_NCF_606,
	"Retenciones" => $_POST["Retencion"],
	"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_606,
	"Porc_ISR_Retenido" => $Porc_ISR_Retenido_606,
	"ITBIS_Retenido_606" => bcdiv($USDITBIS_Retenido_606, '1', 2),
	"Monto_Retencion_Renta_606" => bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
	"NAsiento" => $NAsiento,
	"NAsientoRET" => $NAsientoRet,
	"Modulo" => $modulo,
	"Estatus" => $Estatus,
	"Usuario_Creador" => $_POST["UsuarioLogueado"],
	"Accion_Factura" => $Accion_Factura);

$respuesta = ModeloCompras::mdlEditarCompra($tabla, $datos);	

if($respuesta == "ok"){
	

				echo '<script>
									swal({
										type: "success",
										title: "¡la Compra Se Edito Correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false
											}).then((result)=>{

												if(result.value){
													window.location = "compras";
												}

												});

									</script>';
			
			}		


	}/*cierre isset*/

}/*cierre static*/

static public function ctrcomprasinventario(){
	
if(isset($_POST["RncEmpresaCompras"]) || isset($_POST["NCF_606"])){
	

$_SESSION["FechaFacturames_606"] = $_POST["FechaFacturames_606"];
$_SESSION["FechaFacturadia_606"] = $_POST["FechaFacturadia_606"];
$_SESSION["NCFCompra"] = $_POST["NCFCompra"];
$_SESSION["CodigoNCFCompra"] = $_POST["CodigoNCFCompra"];
$_SESSION["NCF_Modificado_606"] = $_POST["NCF_Modificado_606"];
$_SESSION["agregarSuplidor"] = $_POST["agregarSuplidor"];
$_SESSION["Tipo_Suplidor_Factura"] = $_POST["Tipo_Suplidor_Factura"];
$_SESSION["RncSuplidorFactura"] = $_POST["RncSuplidorFactura"];
$_SESSION["Nombre_Suplidor"] = $_POST["Nombre_Suplidor"];
$_SESSION["Descripcion"] = $_POST["Descripcion"];
$_SESSION["tipo_de_monto"] = $_POST["tipo_de_monto"];
$_SESSION["Tipo_Gasto_606"] = $_POST["Tipo_Gasto_606"];
$_SESSION["Forma_De_Pago_606"] = $_POST["Forma_De_Pago_606"];
$_SESSION["TotalISCvi"] = $_POST["TotalISCvi"];
$_SESSION["TotalOtrosImpvi"] = $_POST["TotalOtrosImpvi"];
$_SESSION["TotalISC"] = $_POST["TotalISC"];
$_SESSION["TotalOtrosImp"] = $_POST["TotalOtrosImp"];




if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == "1"){
	$_SESSION["ITBIS_LLEVADO_A_COSTO"] = $_POST["ITBIS_LLEVADO_A_COSTO"];
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1){
	$_SESSION["ITBIS_Sujeto_a_Propocionalidad"] = $_POST["ITBIS_Sujeto_a_Propocionalidad"];

}
$_POST["Transaccion_606"] = $_POST["Referencia"];
$_SESSION["Transaccion_606"] = $_POST["Transaccion_606"];
$_SESSION["FechaPagomes606"] = $_POST["FechaPagomes606"];
$_SESSION["FechaPagodia606"] = $_POST["FechaPagodia606"];
$_SESSION["Referencia"] = $_POST["Referencia"];
$_SESSION["ModuloBanco"] = $_POST["ModuloBanco"];
$_SESSION["listaCuentas"] = $_POST["listaCuentas"];



$NCFCompra = $_POST["NCFCompra"];
$CodigoNCF = $_POST["CodigoNCFCompra"];				
				
$NCF_606 = $NCFCompra.$CodigoNCF;



				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
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
												window.location = "crear-compra-inventario";
											}

											});

								</script>';
						exit;

		}
		/*** INICIO DE ASIENTOS VACIOS***************/
if($NCFCompra == "B13"){ 
				
$NCF_606 = $NCFCompra.$CodigoNCF;
		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
		$taNCF_606 = "NCF_606";
				
			

$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);



if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["NCF_606"] == $NCF_606){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';
						exit;

		}
	}
	if($NCFCompra == "B11"){ 
				
$NCF_606 = $NCFCompra.$CodigoNCF;
		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
		$taNCF_606 = "NCF_606";
				
			

$FacturaRepetida = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);



if($FacturaRepetida != false && $FacturaRepetida["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $FacturaRepetida["NCF_606"] == $NCF_606){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA FACTURA YA ESTA REGISTRADA VERIFIQUE EL RNC Y EL NCF!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';
						exit;

		}
	}

/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */


$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $Rnc_Empresa_606;
$tipocod = "DCI";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DCI".$N;

$_POST["CodAsiento"] = $N;
$_POST["NAsiento"] = $NAsiento;

if($_POST["Contabilidad"] == 1 && $NAsiento == ""){
	echo '<script>
										swal({

											type: "error",
											title: "No se Reconoce un Asiento Contable vuelva a recargar la pagina!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-gastosgenerales";
													}

													});

										</script>';
								exit;


}

if($_POST["Contabilidad"] == 1){ 
		$tabla = "librodiario_empresas";
		$taRnc_Empresa = "Rnc_Empresa_LD";
		$Rnc_Empresa = $_POST["RncEmpresaCompras"];
		$taNAsiento = "NAsiento";
		$NAsiento = $NAsiento;
			

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
														window.location = "crear-compra-gastosgenerales";
													}

													});

										</script>';
								exit;

				}
		}
	 }
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

	$Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
    $CodigoCompra = NULL;
          
          $compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
              
              if(!$compras){
              	$codigo = 1;
              	$_POST["CodigoCompra"] = $codigo;

               
              } else{

                foreach ($compras as $key => $value) {}
                          
                $codigo = $value["CodigoCompra"]+1;
            	$_POST["CodigoCompra"] = $codigo;

                
              }


		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

   $Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
   $CodigoCompra = $_POST["CodigoCompra"];
          
$compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
      
if($compras != false && $compras["Rnc_Empresa_Compras"] == $Rnc_Empresa_Compra && $compras["CodigoCompra"] == $CodigoCompra){

				echo '<script>
								swal({

									type: "error",
									title: "ESTE NUMERO DE COMPRA ESTA REGISTRADO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-gastosgenerales";
											}

											});

								</script>';
						exit;

		}
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
														window.location = "crear-compra-inventario";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

		if($_POST["Proyecto"] == 1){ 
			if(empty($_POST["listaProyecto"]) || $_POST["listaProyecto"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PROYECTO DISTRIBUIDO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-inventario";
													}

													});

										</script>';
								exit;

				
			}
		}

$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $Rnc_Empresa_606;
$tipocod = "DCI";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DCI".$N;

$_POST["CodAsiento"] = $N;
$_POST["NAsiento"] = $NAsiento;

if($_POST["Contabilidad"] == 1 && $NAsiento == ""){
	echo '<script>
										swal({

											type: "error",
											title: "No se Reconoce un Asiento Contable vuelva a recargar la pagina!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-inventario";
													}

													});

										</script>';
								exit;


}

	if($_POST["Contabilidad"] == 1){ 
		$tabla = "librodiario_empresas";
		$taRnc_Empresa = "Rnc_Empresa_LD";
		$Rnc_Empresa= $_POST["RncEmpresaCompras"];
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
														window.location = "crear-compra-inventario";
													}

													});

										</script>';
								exit;

				}
		}
	 }
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */


		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

	 $Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
     $CodigoCompra = $_POST["CodigoCompra"];
          
      $compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
      if($compras != false && $compras["Rnc_Empresa_Compras"] == $Rnc_Empresa_Compra && $compras["CodigoCompra"] == $CodigoCompra){

				echo '<script>
								swal({

									type: "error",
									title: "ESTE NUMERO DE COMPRA ESTA REGISTRADO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-inventario";
											}

											});

								</script>';
						exit;

		}

		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_606 = $_POST["NCFCompra"];

			if($Extraer_NCF_606 == "B04" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["RncSuplidorFactura"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventario";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[BE0-9]+$/', $NCF_606))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
						window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
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
									window.location = "crear-compra-inventario";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
	///****Validar SUPLIDOR****///
if($_POST["RncEmpresaCompras"] != $_POST["RncSuplidorFactura"]){ 
		$tabla = "suplidor_empresas";
		$taRnc_Empresa_Suplidor = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Suplidor = $_POST["RncEmpresaCompras"];
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];
		
$suplidor =  ModeloSuplidores::mdlMostrarSuplidorFact($tabla, $taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, $taDocumento, $Documento);

if($suplidor != false && $suplidor["Rnc_Empresa_Suplidor"] == $Rnc_Empresa_Suplidor && $suplidor["Documento_Suplidor"] == $_POST["RncSuplidorFactura"] && $suplidor["id"] != $_POST["agregarSuplidor"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Suplidor no Coinciden con el RNC del cliente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-inventario";
											}

											});

								</script>';


		exit;

}

}

	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/


if($_POST["Tipo_Suplidor_Factura"] == 1 && strlen($_POST["RncSuplidorFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventario";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Suplidor_Factura"] == 2 && strlen($_POST["RncSuplidorFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventario";


													
													});


												
								</script>';	
			exit;	

							
	}

	if((substr($NCF_606, 0, 1) == "B" && strlen($NCF_606) != 11) || (substr($NCF_606, 0, 1) == "E" && strlen($NCF_606) != 13)){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-gastosgenerales";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/
	
	$suma = $_POST["NetoCompra"];
	$PorcentajeITBIS = $suma * 0.18;
	

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 3);
	

	if($_POST["TotalITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventario";
													
													});


												
								</script>';	
				

			exit;	


	}

	if(isset($_POST["montodis"])){
		if($_POST["montodis"] > $_POST["NetoCompra"]){
			echo '<script>
						swal({

							type: "error",
							title: "¡El Total del Monto distribuido no puede ser mayor que el sub total de la factura!",
							showConfirmButton: false,
							timer: 6000
							}).then(()=>{
							window.location = "crear-compra-inventario";
													
											});
						
						</script>';	
				

			exit;	

		}
	}
	/************************VALIDACION DE RETENCIONES*******************/
if($_POST["Retencion"] == 1){ 

if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] > 0){
	if($_POST["Monto_ITBIS_Retenido"] > $_POST["TotalITBIS"]){

		echo '<script>
			swal({

			type: "error",
			title: "¡El Monto de La Retencion de ITBIS no debe ser mayor al monto Total de ITBIS!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	



	}
 


 }

}						


if($_POST["Retencion"] == 1){ 

if(isset($_POST["ISR_RETENIDO_Compras"]) && $_POST["ISR_RETENIDO_Compras"] > 0){
	if($_POST["tipo_de_seleccionretener"] == "0"){

		echo '<script>
			swal({

			type: "error",
			title: "¡Debe Selecionar un Tipo de Retencion de ISR!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	
	}

	
	


 }

}						

		/* INICIO AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["RncSuplidorFactura"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Suplidor"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);
			
			if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
				$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

					$respuesta = ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

			}
		/* FIN AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/


/************************VALIDACION DE RETENCIONES*******************/
if($_POST["Retencion"] == 1){ 

if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] > 0){
	if($_POST["Monto_ITBIS_Retenido"] > $_POST["TotalITBIS"]){

		echo '<script>
			swal({

			type: "error",
			title: "¡El Monto de La Retencion de ITBIS no debe ser mayor al monto Total de ITBIS!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-inventario";
													
			});


			</script>';	
				

			exit;	



	}
 


 }

}						


if($_POST["Retencion"] == 1){ 

if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] > 0){
	if($_POST["Monto_ITBIS_Retenido"] > $_POST["TotalITBIS"]){

		echo '<script>
			swal({

			type: "error",
			title: "¡El Monto de La Retencion de ITBIS no debe ser mayor al monto Total de ITBIS!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-inventario";
													
			});


			</script>';	
				

			exit;	



	}
 


 }

}						


if($_POST["Retencion"] == 1){ 

if(isset($_POST["ISR_RETENIDO_Compras"]) && $_POST["ISR_RETENIDO_Compras"] > 0){
	if($_POST["tipo_de_seleccionretener"] == "0"){

		echo '<script>
			swal({

			type: "error",
			title: "¡Debe Selecionar un Tipo de Retencion de ISR!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-inventario";
													
			});


			</script>';	
				

			exit;	
	}
	if($_POST["ISR_RETENIDO_Compras"] == "2"){
		if($_POST["tipo_de_seleccionretener"] == "03" || $_POST["tipo_de_seleccionretener"] == "04"){ 

		echo '<script>
			swal({

			type: "error",
			title: "¡Tipo de Seleccion de ISR Retenido Incorrecto!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-inventario";
													
			});


			</script>';	
				

			exit;	
			}
	}
	if($_POST["ISR_RETENIDO_Compras"] == "10"){
		if($_POST["tipo_de_seleccionretener"] == "01" || $_POST["tipo_de_seleccionretener"] == "02"){ 

		echo '<script>
			swal({

			type: "error",
			title: "¡Tipo de Seleccion de ISR Retenido Incorrecto!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-inventario";
													
			});


			</script>';	
				

			exit;
			}	
	}
 
 



 }

}	/*cierre retencicion*/					



/********************************************************************/
		$ValorTipo_Gasto_606 = "09";
$Tipo_Gasto_606 = "09-COMPRA FORMARA PARTE COSTO DE VENTA ";
	
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


       }
      $Montototalbienes = $_POST["NetoCompra"];
			$Montototalservicios = "0";
			$ITBIS_Compras_606 = $_POST["TotalITBIS"];
			$ITBIS_Servicios_606 = "0.00";
			
			$TOTALITBIS = $ITBIS_Compras_606 + $ITBIS_Servicios_606;

			$totalFactura =  $_POST["NetoCompra"];

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

	if($_POST["Moneda_Factura"] == "USD"){
			$Moneda = "USD";
			$tasa = $_POST["tasaUS"];

		
				$USDMontototalbienes = $Montototalbienes * $tasa;
				$Montototalbienes = $USDMontototalbienes;
				$USDMontototalservicios = $Montototalservicios * $tasa;
				$Montototalservicios = $USDMontototalservicios;
				$USDtotalFactura = $totalFactura * $tasa;
				$totalFactura = $USDtotalFactura;
				$USDITBIS_Compras_606 = $ITBIS_Compras_606 * $tasa;
				$USDITBIS_Servicios_606 = $ITBIS_Servicios_606 * $tasa;
				$ITBIS_Compras_606 = $USDITBIS_Compras_606;
				$ITBIS_Servicios_606 = $USDITBIS_Servicios_606;
				$TOTALITBIS = $ITBIS_Compras_606 + $ITBIS_Servicios_606;


		}else{
			$Moneda = "DOP";
			$tasa = 0;


		}

 if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){								

	$ITBIS_alcosto_606 = $TOTALITBIS;
	$ITBIS_Adelantar_606 = "0.00";

}else { 

	$ITBIS_alcosto_606 = "0.00";
	$ITBIS_Adelantar_606 = $TOTALITBIS;
										
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] == 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Servicion_606 = "0";

}
elseif(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] != 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = $TOTALITBIS;
										}
else { 
	
	$ITBIS_Proporcional_606 = "0.00";
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = "0.00";
									
}


if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $USDITBIS_Retenido_606 * $_POST["tasaUS"];
		$USDMonto_Retencion_Renta_606 =$_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $USDMonto_Retencion_Renta_606 * $_POST["tasaUS"];


	}else{
		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$USDMonto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
	}

		$Fecha_Ret_AñoMes_606  = $_POST["FechaFacturames_606"];
		$Fecha_Ret_Dia_606 = $_POST["FechaFacturadia_606"];
		
		
		
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

} else{ 

		$Fecha_Ret_AñoMes_606  = "";
		$Fecha_Ret_Dia_606 = "";
		$ITBIS_Retenido_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";
		$Tipo_Retencion_ISR_606 = "0";
		$Extrar_Tipo_Retencion_606 = 0;
		$Porc_ITBIS_Retenido_606 = 0;
		$Porc_ISR_Retenido_606 = 0; 
		$USDITBIS_Retenido_606 = "0.00";
		$ITBIS_Retenido_606 = "0.00";
		$USDMonto_Retencion_Renta_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";

}



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
		
if($_POST["Moneda_Factura"] == "USD"){

$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $USDImpuestos_Selectivo_606 * $_POST["tasaUS"];


$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $USDOtro_Impuesto_606 * $_POST["tasaUS"];

	}else{
$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $_POST["TotalISC"];

$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $_POST["TotalOtrosImp"];
	
	}



$ITBIS_Percibido_Compras_606 = "0.00";

$ISR_Percibido_606 = "0.00";


$Monto_Propina_606 = 0;

$Extraer_Tipo_Pago_606 = $_POST["Forma_De_Pago_606"];
$Extraer_Tipo_Gasto_606 = "09";
$B04MeMa_607 = "";
$Tipo_Transaccion_606 = 1;
$Estatus_606 = "";
$Extrar_Tipo_Retencion_606 = 0;

$B04_Periodo_606 = 0;
$Fecha_Trans_AnoMes_606 = $_POST["FechaPagomes606"];
$Fecha_Trans_Dia_606 = $_POST["FechaPagodia606"];
$Referencia_606 = $_POST["Referencia"];
$Banco_606 = $_POST["agregarBanco"];
$CodigoCompra = $_POST["CodigoCompra"];
$Modulo = "COMPRAS";

$Accion_606 = "Creado";

$tabla = "606_empresas";
        $datos = array("Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Tipo_Suplidor_Factura"],
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
"ITBIS_Factura_606" => $TOTALITBIS,
"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $Impuestos_Selectivo_606,
"Otro_Impuesto_606" => $Otro_Impuesto_606,
"Monto_Propina_606" => $Monto_Propina_606,
"Forma_Pago_606" => $ValorForma_De_Pago_606 ,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $Extraer_Tipo_Pago_606,
"Extraer_Tipo_Gasto_606" => $Extraer_Tipo_Gasto_606,
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $ITBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"Porc_ITBIS_Retenido_606" => $Porc_ITBIS_Retenido_606,
"Porc_ISR_Retenido_606" => $Porc_ISR_Retenido_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $Fecha_Trans_AnoMes_606,
"Fecha_Trans_Dia_606" => $Fecha_Trans_Dia_606,
"Referencia_606" => $Referencia_606,
"Banco_606" => $Banco_606,
"Descripcion_606" => $_POST["Descripcion"],
"Nombre_Empresa_606" => $_POST["Nombre_Suplidor"],
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
									
	}
		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $Rnc_Empresa_606;
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $Rnc_Factura_606;
		$taNCF_606 = "NCF_606";
		$NCF_606 = $NCF_606;			

	$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

if($Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){
			
	$id_registro606 = $Consulta606["id"];


}else{
	$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $Rnc_Factura_606;
		$taNCF_606 = "NCF_606";
		$NCF_606 = $NCF_606;

$respuesta = Modelo606::mdlBorrarLD606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);
					
	echo '<script>
				swal({

					type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
					showConfirmButton: false,
					timer: 6000
					}).then(()=>{
					window.location = "crear-compra-inventario";
													
					});
												
			</script>';	
		
		exit;
	}


	/***************************************
			agregar Cliente 
	***************************************/
	$id_Suplidor = $_POST["agregarSuplidor"];

	$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
	$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
	$taDocumento = "Documento_Suplidor";
	$Documento = $_POST["RncSuplidorFactura"];
	$tabla = "suplidor_empresas";

		
	$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		
	if(!$respuesta || $respuesta == false){
			$tabla = "suplidor_empresas";
			$Email = "";
			$Telefono = "";
			$Direccion = "";
			$Estado = "Creado";

		$datos = array("Rnc_Empresa_Suplidor" => $Rnc_Empresa_606,
		"Tipo_Suplidor" => $_POST["Tipo_Suplidor_Factura"],
		"Nombre_Suplidor" => $_POST["Nombre_Suplidor"], 
		"Documento_Suplidor" => $_POST["RncSuplidorFactura"],
		"Email" => $Email, 
		"Telefono" => $Telefono ,
		"Direccion" => $Direccion, 
		"Usuario_Creador" => $_POST["UsuarioLogueado"], 
		"Estado" => $Estado);
		
		$respuesta = ModeloSuplidores::mdlCrearsuplidor($tabla, $datos);
						   
		$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		

		$id_Suplidor = $respuesta["id"];
 }

 /*crear cuenta por pagar*/
if($_POST["Forma_De_Pago_606"] == "04"){ 
 	$tabla = "cxp_empresas";
	$Dia_Credito_cxp = "15";
	$Retenciones = "2";
	$tipo = "FACTURA";
	$Estatus = "1";
	
	$datos = array("id_606" => $id_registro606,				
	"Rnc_Empresa_cxp" => $_POST["RncEmpresaCompras"],
					"CodigoCompra" => $_POST["CodigoCompra"],
					"id_Suplidor" => $id_Suplidor,
					"Rnc_Suplidor" => $Rnc_Factura_606,
					"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
					"NCF_cxp" => $NCF_606,
					"FechaAnoMes_cxp" => $_POST["FechaFacturames_606"],
					"FechaDia_cxp" => $_POST["FechaFacturadia_606"], 
					"Dia_Credito_cxp" => $Dia_Credito_cxp, 
					"Moneda" => $Moneda,
					"Tasa" => $tasa,
					"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
					"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2), 
					"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
					"Neto" => bcdiv($_POST["NetoCompra"], '1', 2), 
					"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
					"Total" => bcdiv($_POST["TotalCompra"], '1', 2),
					"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_606, '1', 2),
					"Retencion_Renta" =>  bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
					"Observaciones" => $_POST["Descripcion"],
					"Retenciones" => $Retenciones,
					"MontoPagado" => 0,
					"Estado" => "PorPagar",
					"Tipo" => $tipo,
					"Estatus" => $Estatus);
	 
	
	$respuesta = ModeloCXP::mdlIngresarcxp($tabla, $datos);

} /* fin cuentas por cobrar*/

$NAsientoRet = "";

if($_POST["Contabilidad"] == 1){

	
				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $Rnc_Factura_606;
				$taNCF_606 = "NCF_606";
				$NCF_606 = $NCF_606;			

	$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

		if($Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){
			$id_registro606 = $Consulta606["id"];


		}
$tabla = "banco_empresas"; 
$id = "id";
$valorid = $_POST["agregarBanco"];
$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
	
	if($banco != false){
		$id_banco = $banco["id"];


	}else {
		$id_banco = 0;

	}


if(isset($_POST["listaProyecto"]) && $_POST["Proyecto"] == 1){


$listaProyecto =  json_decode($_POST["listaProyecto"], true);

foreach ($listaProyecto as $key => $value){

	

		$tabla = "proyectos_empresas";
		$id = "id";
		$valorid = $value["proyecto"];
				
		$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
		$idproyecto = $value["proyecto"];
		$codproyecto = $respuesta["CodigoProyecto"]; 

		if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["montoDistribuido"] * $tasa;
		$value["montoDistribuido"] = $cambioMoneda;

		}
		
		$tabla = "librodiario_empresas";
		$ObservacionesLD = $_POST["Descripcion"];
		$Extraer_NAsiento = "DCI";
		$Accion = "COMPRAINVENTARIO";
		$Transaccion_607 = 1;
		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = bcdiv($value["montoDistribuido"], '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturames_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



	}/*cierre for poryectos*/




	}/*cierre si issete poryectos*/

	else{
		$NetoCompra = $_POST["NetoCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $NetoCompra * $tasa;
		$NetoCompra = $cambioMoneda;

		}
		$idproyecto = "NOAPLICA";
		$codproyecto = "NOAPLICA";
		$listaProyecto = "NOAPLICA";

		$tabla = "librodiario_empresas";
		$ObservacionesLD = $_POST["Descripcion"];
		$Extraer_NAsiento = "DCI";
		$Accion = "COMPRAINVENTARIO";
		$Transaccion_607 = 1;
		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = bcdiv($NetoCompra, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}/*cierre else de proyectos*/

	

 

if(!isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["PORITBIS"] > 0){
			$TotalITBIS = $_POST["TotalITBIS"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalITBIS * $tasa;
			$TotalITBIS = $cambioMoneda;

		}
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "ITBIS pagados en compras";
		$debito = bcdiv($TotalITBIS, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }		

if($_POST["TotalISC"] > 0 || $_POST["TotalOtrosImp"] > 0 || $ITBIS_alcosto_606> 0){
	
	$totalimpuestos = $_POST["TotalISC"] + $_POST["TotalOtrosImp"] + $ITBIS_alcosto_606;
		if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $totalimpuestos * $tasa;
			$totalimpuestos = $cambioMoneda;

		}

	$idgrupo = "6";
	$idcategoria = "1";
	$idgenerica = "09";
	$idcuenta = "003";
	$nombrecuenta = "impuestos indirectos";
	$debito = bcdiv($totalimpuestos, '1', 2);
	$credito = 0;
		

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }

if($_POST["Forma_De_Pago_606"] == "04"){ 
		$TotalCompra = $_POST["TotalCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalCompra * $tasa;
			$TotalCompra = $cambioMoneda;

		}

	$tabla = "librodiario_empresas";
		$idgrupo = "2";
		$idcategoria = "2";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "proveedores nacionales";
		$debito = 0;
		$credito = bcdiv($TotalCompra, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
}else{
	$TotalCompra = $_POST["TotalCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalCompra * $tasa;
			$TotalCompra = $cambioMoneda;

		}
	
	$tabla = "banco_empresas"; 
	$id = "id";
	$valorid = $_POST["agregarBanco"];
	$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
	
	$tabla = "librodiario_empresas";

		$id_banco = $banco["id"];
		$idgrupo = $banco["id_grupo"];
		$idcategoria = $banco["id_categoria"];
		$idgenerica = $banco["id_generica"];
		$idcuenta = $banco["id_cuenta"];
		$nombrecuenta = $banco["Nombre_CuentaContable"];
		$debito = 0;
		$credito = bcdiv($TotalCompra, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



}
if($_POST["Retencion"] == 1){
	
	if($_POST["Monto_ITBIS_Retenido"] > 0){
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido por pagar";
		$debito = 0;
		$credito = bcdiv($ITBIS_Retenido_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
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

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);
	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	}

}/*cierre retencion*/

		

}/*cierre contabilidad*/
/**************************ACTUALIZAR INVENTARIO**********************/
/***********CIERRE DE CONTABILIDAD ***********/
/**************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";
			$Tipo_NCF = "DCI";
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);  


if($_POST["Retencion"] == 1){
	$NAsientoRet = $NAsiento;



}else{

$NAsientoRet = "";

}
$listaProductos =  json_decode($_POST["listaCuentas"], true);

	
			
foreach ($listaProductos as $key => $value) {

	$tablaProductos = "productos_empresas";

	$id = "id";

	$valorid = $value["id"];

$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);
$Stock = $traerProductos["Stock"] + $value["cantidad"];

	

$datos = array("id" => $valorid,
				"Stock" => $Stock,
				"Precio_Compra" => $value["preciocompra"],
				"Porcentaje" => $value["porcentajegan"],
				"Precio_Venta" => $value["precioventa"]);			

	

$nuevasCompras = ModeloProductos::MdlActualizarProductoCompras($tablaProductos, $datos);

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
$Accion = "COMPRAINVENTARIO";

$datos = array ("Rnc_Empresa_Productos" => $_POST["RncEmpresaCompras"],
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => $value["porcentajegan"], 
      "Precio_Venta" => $value["precioventa"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames_606"],
      "Fecha_dia" => $_POST["FechaFacturadia_606"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_606,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["UsuarioLogueado"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);	
			
}/*CIERRO FOREACH*/
/*************CIERRE DE INVENTARIO*******/


$tabla = "compras_empresas";
$modulo = "COMPRAINVENTARIO";
$Estatus = "POR PAGAR";
$Accion_Factura = "CREADA";
 
$datos = array("Rnc_Empresa_Compras" => $Rnc_Empresa_606,
				"CodigoCompra" => $_POST["CodigoCompra"],
				"Rnc_Suplidor" => $Rnc_Factura_606,
				"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
				"NCF_Factura" => $NCF_606,
				"FechaAnoMes" => $_POST["FechaFacturames_606"],
				"FechaDia" => $_POST["FechaFacturadia_606"],
				"id_Suplidor" => $id_Suplidor,
				"Producto" => $_POST["listaCuentas"],
				"Porimpuesto" => $_POST["PORITBIS"],
				"Moneda" => $_POST["Moneda_Factura"],
				"Tasa" => $tasa,
				"Impuesto" => $_POST["TotalITBIS"],
				"impuestoISC" => $_POST["TotalISC"], 
				"otrosimpuestos" => $_POST["TotalOtrosImp"],
				"Neto" => $_POST["NetoCompra"],
				"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
				"Total" => $_POST["TotalCompra"],
				"Proyecto" => $_POST["listaProyecto"],
				"Referencia" => $_POST["Descripcion"],
				"EXTRAER_NCF" => $Extraer_NCF_606,
				"Retenciones" => $_POST["Retencion"],
				"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_606,
				"Porc_ISR_Retenido" => $Porc_ISR_Retenido_606,
				"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
				"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
				"NAsiento" => $NAsiento,
				"NAsientoRET" => $NAsientoRet,
				"FormaPago" => $_POST["Forma_De_Pago_606"],
				"id_banco" => $id_banco,
				"Modulo" => $modulo,
				"Estatus" => $Estatus,
				"Usuario_Creador" => $_POST["UsuarioLogueado"],
				"Accion_Factura" => $Accion_Factura);


$respuesta = ModeloCompras::mdlIngresarCompra($tabla, $datos);	
if($respuesta == "ok"){
	
	
	if($_POST["NCFCompra"] == "B11" || $_POST["NCFCompra"] == "B13"){ 
	$tabla = "correlativos_empresas";
	
	$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $_POST["NCFCompra"],
					"NCF_Cons" =>  $_POST["CodigoNCFCompra"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
}
if($_POST["NCFCompra"] == "E41" || $_POST["NCFCompra"] == "E43"){ 
	$tabla = "correlativos_empresas";
	
	$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $_POST["NCFCompra"],
					"NCF_Cons" =>  $_POST["CodigoNCFCompra"]);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
}
unset($_SESSION["FechaFacturadia_606"]);
unset($_SESSION["NCFCompra"]);
unset($_SESSION["CodigoNCFCompra"]);
unset($_SESSION["NCF_Modificado_606"]);
unset($_SESSION["agregarSuplidor"]);
unset($_SESSION["Tipo_Suplidor_Factura"]);
unset($_SESSION["RncSuplidorFactura"]);
unset($_SESSION["Nombre_Suplidor"]);
unset($_SESSION["Descripcion"]);
unset($_SESSION["Tipo_Gasto_606"]);
unset($_SESSION["Forma_De_Pago_606"]);
unset($_SESSION["ITBIS_LLEVADO_A_COSTO"]);
unset($_SESSION["ITBIS_Sujeto_a_Propocionalidad"]);
unset($_SESSION["FechaPagomes606"]);
unset($_SESSION["FechaPagodia606"]);
unset($_SESSION["Referencia"]);
unset($_SESSION["ModuloBanco"]);
unset($_SESSION["listaCuentas"]);
unset($_SESSION["TotalISCvi"]);
unset($_SESSION["TotalOtrosImpvi"]); 
unset($_SESSION["TotalISC"]); 
unset($_SESSION["TotalOtrosImp"]);

	echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>La Compra Se Registro Correctamente</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "crear-compra-inventario";
		}

		});

</script>';	
	
				
			}
}/*cierre isset*/
	
}/*cierre funcion*/

/**********************************************
			ELIMINAR VENTA
	***********************************************/
static public function ctrcomprasinventarioNo(){
	
if(isset($_POST["RncEmpresaCompras"]) || isset($_POST["NCF_606"])){
	

$_SESSION["FechaFacturames_606"] = $_POST["FechaFacturames_606"];
$_SESSION["FechaFacturadia_606"] = $_POST["FechaFacturadia_606"];
$_SESSION["NCFCompraNo"] = $_POST["NCFCompraNo"];
$_SESSION["CodigoNCFCompra"] = $_POST["CodigoNCFCompra"];
$_SESSION["NCF_Modificado_606"] = $_POST["NCF_Modificado_606"];
$_SESSION["agregarSuplidor"] = $_POST["agregarSuplidor"];
$_SESSION["Tipo_Suplidor_Factura"] = $_POST["Tipo_Suplidor_Factura"];
$_SESSION["RncSuplidorFactura"] = $_POST["RncSuplidorFactura"];
$_SESSION["Nombre_Suplidor"] = $_POST["Nombre_Suplidor"];
$_SESSION["Descripcion"] = $_POST["Descripcion"];
$_SESSION["tipo_de_monto"] = $_POST["tipo_de_monto"];
$_SESSION["Tipo_Gasto_606"] = $_POST["Tipo_Gasto_606"];
$_SESSION["Forma_De_Pago_606"] = $_POST["Forma_De_Pago_606"];
$_SESSION["TotalISCvi"] = $_POST["TotalISCvi"];
$_SESSION["TotalOtrosImpvi"] = $_POST["TotalOtrosImpvi"];
$_SESSION["TotalISC"] = $_POST["TotalISC"];
$_SESSION["TotalOtrosImp"] = $_POST["TotalOtrosImp"];




if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == "1"){
	$_SESSION["ITBIS_LLEVADO_A_COSTO"] = $_POST["ITBIS_LLEVADO_A_COSTO"];
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1){
	$_SESSION["ITBIS_Sujeto_a_Propocionalidad"] = $_POST["ITBIS_Sujeto_a_Propocionalidad"];

}
$_POST["Transaccion_606"] = $_POST["Referencia"];
$_SESSION["Transaccion_606"] = $_POST["Transaccion_606"];
$_SESSION["FechaPagomes606"] = $_POST["FechaPagomes606"];
$_SESSION["FechaPagodia606"] = $_POST["FechaPagodia606"];
$_SESSION["Referencia"] = $_POST["Referencia"];
$_SESSION["ModuloBanco"] = $_POST["ModuloBanco"];
$_SESSION["listaCuentas"] = $_POST["listaCuentas"];



$NCFCompra = $_POST["NCFCompraNo"];
$CodigoNCF = $_POST["CodigoNCFNo"];				
				
$NCF_606 = $NCFCompra.$CodigoNCF;



		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */

				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $_POST["RncSuplidorFactura"];
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
												window.location = "crear-compra-inventarioNo";
											}

											});

								</script>';
						exit;

		}

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
														window.location = "crear-compra-inventarioNo";
													}

													});

										</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

		if($_POST["Proyecto"] == 1){ 
			if(empty($_POST["listaProyecto"]) || $_POST["listaProyecto"] == "[]"){

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PROYECTO DISTRIBUIDO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-inventarioNo";
													}

													});

										</script>';
								exit;

				
			}
		}
$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $Rnc_Empresa_606;
$tipocod = "DCI";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DCI".$N;

$_POST["CodAsiento"] = $N;
$_POST["NAsiento"] = $NAsiento;

if($_POST["Contabilidad"] == 1 && $NAsiento == ""){
	echo '<script>
										swal({

											type: "error",
											title: "No se Reconoce un Asiento Contable vuelva a recargar la pagina!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "crear-compra-inventarioNo";
													}

													});

										</script>';
								exit;


}

	if($_POST["Contabilidad"] == 1){ 
		$tabla = "librodiario_empresas";
		$taRnc_Empresa = "Rnc_Empresa_LD";
		$Rnc_Empresa= $_POST["RncEmpresaCompras"];
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
														window.location = "crear-compra-inventarioNo";
													}

													});

										</script>';
								exit;

				}
		}
	 }
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */


		/* FIN VALIDACION DE ASIENTOS VACIOS ************/
			$Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
    $CodigoCompra = NULL;
          
          $compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
              
              if(!$compras){
              	$codigo = 1;
              	$_POST["CodigoCompra"] = $codigo;

               
              } else{

                foreach ($compras as $key => $value) {}
                          
                $codigo = $value["CodigoCompra"]+1;
            	$_POST["CodigoCompra"] = $codigo;

                
              }


	 $Rnc_Empresa_Compra = $_POST["RncEmpresaCompras"];
     $CodigoCompra = $_POST["CodigoCompra"];
          
      $compras = ControladorCompras::ctrMostrarCodigoCompras($Rnc_Empresa_Compra, $CodigoCompra);
      if($compras != false && $compras["Rnc_Empresa_Compras"] == $Rnc_Empresa_Compra && $compras["CodigoCompra"] == $CodigoCompra){

				echo '<script>
								swal({

									type: "error",
									title: "ESTE NUMERO DE COMPRA ESTA REGISTRADO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-inventarioNo";
											}

											});

								</script>';
						exit;

		}

		/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
		 $Extraer_NCF_606 = $_POST["NCFCompraNo"];

			
	/********INICIO VALIDACION DE PREMACHT DE INPUT********************/
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaFacturames_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventarioNo";
													
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
									window.location = "crear-compra-inventarioNo";
													
									});
												
								</script>';	
					exit;	
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["RncSuplidorFactura"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventarioNo";
													
													});
												
								</script>';	
					exit;
	}
	
	if(!(preg_match('/^[CP0-9]+$/', $NCF_606))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventarioNo";
													
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
									window.location = "crear-compra-inventarioNo";
													
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
									window.location = "crear-compra-inventarioNo";
													
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
									window.location = "crear-compra-inventarioNo";
													
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
									window.location = "crear-compra-inventarioNo";
													
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
									window.location = "crear-compra-inventarioNo";
													
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
						window.location = "crear-compra-inventarioNo";
													
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
									window.location = "crear-compra-inventarioNo";
													
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
									window.location = "crear-compra-inventarioNo";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
	///****Validar SUPLIDOR****///
if($_POST["RncEmpresaCompras"] != $_POST["RncSuplidorFactura"]){  
		$tabla = "suplidor_empresas";
		$taRnc_Empresa_Suplidor = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Suplidor = $_POST["RncEmpresaCompras"];
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];
		
$suplidor =  ModeloSuplidores::mdlMostrarSuplidorFact($tabla, $taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, $taDocumento, $Documento);

if($suplidor != false && $suplidor["Rnc_Empresa_Suplidor"] == $Rnc_Empresa_Suplidor && $suplidor["Documento_Suplidor"] == $_POST["RncSuplidorFactura"] && $suplidor["id"] != $_POST["agregarSuplidor"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Suplidor no Coinciden con el RNC del cliente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-compra-inventarioNo";
											}

											});

								</script>';


		exit;

}

}


	/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
if($_POST["Tipo_Suplidor_Factura"] == 1 && strlen($_POST["RncSuplidorFactura"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventarioNo";


													
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Suplidor_Factura"] == 2 && strlen($_POST["RncSuplidorFactura"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventarioNo";


													
													});


												
								</script>';	
			exit;	

							
	}

	/*******INICIO VALIDACION DE NCF*****/
	
	$suma = $_POST["NetoCompra"];
	$PorcentajeITBIS = $suma * 0.18;
	

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 3);
	

	if($_POST["TotalITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "crear-compra-inventarioNo";
													
													});


												
								</script>';	
				

			exit;	


	}

	if(isset($_POST["montodis"])){
		if($_POST["montodis"] > $_POST["NetoCompra"]){
			echo '<script>
						swal({

							type: "error",
							title: "¡El Total del Monto distribuido no puede ser mayor que el sub total de la factura!",
							showConfirmButton: false,
							timer: 6000
							}).then(()=>{
							window.location = "crear-compra-inventarioNo";
													
											});
						
						</script>';	
				

			exit;	

		}
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
							window.location = "crear-compra-inventarioNo";
													
											});
						
						</script>';	
				

			exit;	

		}
	}
		/* INICIO AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
/************************VALIDACION DE RETENCIONES*******************/
if($_POST["Retencion"] == 1){ 

if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] > 0){
	if($_POST["Monto_ITBIS_Retenido"] > $_POST["TotalITBIS"]){

		echo '<script>
			swal({

			type: "error",
			title: "¡El Monto de La Retencion de ITBIS no debe ser mayor al monto Total de ITBIS!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	



	}
 


 }

}						


if($_POST["Retencion"] == 1){ 

if(isset($_POST["ITBISRetenido_Compras"]) && $_POST["ITBISRetenido_Compras"] > 0){
	if($_POST["Monto_ITBIS_Retenido"] > $_POST["TotalITBIS"]){

		echo '<script>
			swal({

			type: "error",
			title: "¡El Monto de La Retencion de ITBIS no debe ser mayor al monto Total de ITBIS!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	



	}
 


 }

}						


if($_POST["Retencion"] == 1){ 

if(isset($_POST["ISR_RETENIDO_Compras"]) && $_POST["ISR_RETENIDO_Compras"] > 0){
	if($_POST["tipo_de_seleccionretener"] == "0"){

		echo '<script>
			swal({

			type: "error",
			title: "¡Debe Selecionar un Tipo de Retencion de ISR!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	
	}
	if($_POST["ISR_RETENIDO_Compras"] == "2"){
		if($_POST["tipo_de_seleccionretener"] != "03" || $_POST["tipo_de_seleccionretener"] != "04")

		echo '<script>
			swal({

			type: "error",
			title: "¡Tipo de Seleccion de ISR Retenido Incorrecto!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	
	}
	if($_POST["ISR_RETENIDO_Compras"] == "10"){
		if($_POST["tipo_de_seleccionretener"] != "01" || $_POST["tipo_de_seleccionretener"] != "02")

		echo '<script>
			swal({

			type: "error",
			title: "¡Tipo de Seleccion de ISR Retenido Incorrecto!",
			showConfirmButton: false,
			timer: 6000
			}).then(()=>{
			window.location = "crear-compra-gastosgenerales";
													
			});


			</script>';	
				

			exit;	
	}
 
 



 }

}						



/********************************************************************/

			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["RncSuplidorFactura"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Suplidor"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);
			
			if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
				$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

					$respuesta = ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

			}
		/* FIN AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/


$ValorTipo_Gasto_606 = "09";
$Tipo_Gasto_606 = "09-COMPRA FORMARA PARTE COSTO DE VENTA ";
	
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


       }

      $Montototalbienes = $_POST["NetoCompra"];
			$Montototalservicios = "0";
			$ITBIS_Compras_606 =$_POST["TotalITBIS"];
			$ITBIS_Servicios_606 = "0.00";
			$TOTALITBIS = $ITBIS_Compras_606 +$ITBIS_Servicios_606;

			$totalFactura = $_POST["NetoCompra"];



	if($_POST["Moneda_Factura"] == "USD"){
			$Moneda = "USD";
			$tasa = $_POST["tasaUS"];

		
				$USDMontototalbienes = $Montototalbienes * $tasa;
				$Montototalbienes = $USDMontototalbienes;
				$USDMontototalservicios = $Montototalservicios * $tasa;
				$Montototalservicios = $USDMontototalservicios;
				$USDtotalFactura = $totalFactura * $tasa;
				$totalFactura = $USDtotalFactura;
				$USDITBIS_Compras_606 = $ITBIS_Compras_606 * $tasa;
				$USDITBIS_Servicios_606 = $ITBIS_Servicios_606 * $tasa;
				$ITBIS_Compras_606 = $USDITBIS_Compras_606;
				$ITBIS_Servicios_606 = $USDITBIS_Servicios_606;
				$TOTALITBIS = $ITBIS_Compras_606 +$ITBIS_Servicios_606;


		}else{
			$Moneda = "DOP";
			$tasa = 0;


		}

 if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1){								

	$ITBIS_alcosto_606 = $TOTALITBIS;
	$ITBIS_Adelantar_606 = "0.00";

}else { 

	$ITBIS_alcosto_606 = "0.00";
	$ITBIS_Adelantar_606 = $TOTALITBIS;
										
}


if(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] == 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Servicion_606 = "0";

}
elseif(isset($_POST["ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] != 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = $TOTALITBIS;
										}
else { 
	
	$ITBIS_Proporcional_606 = "0.00";
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = "0.00";
									
}

if($_POST["Retencion"] == 1){ 
	if($_POST["Moneda_Factura"] == "USD"){

		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $USDITBIS_Retenido_606 * $_POST["tasaUS"];
		$USDMonto_Retencion_Renta_606 =$_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $USDMonto_Retencion_Renta_606 * $_POST["tasaUS"];


	}else{
		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$USDMonto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
	}

		$Fecha_Ret_AñoMes_606  = $_POST["FechaFacturames_606"];
		$Fecha_Ret_Dia_606 = $_POST["FechaFacturadia_606"];
		
		
		
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

} else{ 

		$Fecha_Ret_AñoMes_606  = "";
		$Fecha_Ret_Dia_606 = "";
		$ITBIS_Retenido_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";
		$Tipo_Retencion_ISR_606 = "0";
		$Extrar_Tipo_Retencion_606 = 0;
		$Porc_ITBIS_Retenido_606 = 0;
		$Porc_ISR_Retenido_606 = 0; 
		$USDITBIS_Retenido_606 = "0.00";
		$ITBIS_Retenido_606 = "0.00";
		$USDMonto_Retencion_Renta_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";

}



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
		
if($_POST["Moneda_Factura"] == "USD"){

$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $USDImpuestos_Selectivo_606 * $_POST["tasaUS"];


$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $USDOtro_Impuesto_606 * $_POST["tasaUS"];

	}else{
$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $_POST["TotalISC"];

$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $_POST["TotalOtrosImp"];
	
	}



$ITBIS_Percibido_Compras_606 = "0.00";

$ISR_Percibido_606 = "0.00";


$Monto_Propina_606 = 0;

$Extraer_Tipo_Pago_606 = $_POST["Forma_De_Pago_606"];
$Extraer_Tipo_Gasto_606 = "09";
$B04MeMa_607 = "";
$Tipo_Transaccion_606 = 1;
$Estatus_606 = "";
$Extrar_Tipo_Retencion_606 = 0;

$B04_Periodo_606 = 0;
$Fecha_Trans_AnoMes_606 = $_POST["FechaPagomes606"];
$Fecha_Trans_Dia_606 = $_POST["FechaPagodia606"];
$Referencia_606 = $_POST["Referencia"];
$Banco_606 = $_POST["agregarBanco"];
$CodigoCompra = $_POST["CodigoCompra"];
$Modulo = "COMPRAS";

$Accion_606 = "Creado";


$tabla = "606_empresas";
        $datos = array("Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Tipo_Suplidor_Factura"],
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
"ITBIS_Factura_606" => $TOTALITBIS,
"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $Impuestos_Selectivo_606,
"Otro_Impuesto_606" => $Otro_Impuesto_606,
"Monto_Propina_606" => $Monto_Propina_606,
"Forma_Pago_606" => $ValorForma_De_Pago_606 ,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $Extraer_Tipo_Pago_606,
"Extraer_Tipo_Gasto_606" => $Extraer_Tipo_Gasto_606,
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $ITBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"Porc_ITBIS_Retenido_606" => $Porc_ITBIS_Retenido_606,
"Porc_ISR_Retenido_606" => $Porc_ISR_Retenido_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $Fecha_Trans_AnoMes_606,
"Fecha_Trans_Dia_606" => $Fecha_Trans_Dia_606,
"Referencia_606" => $Referencia_606,
"Banco_606" => $Banco_606,
"Descripcion_606" => $_POST["Descripcion"],
"Nombre_Empresa_606" => $_POST["Nombre_Suplidor"],
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
									
	}

	$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $Rnc_Factura_606;
		$taNCF_606 = "NCF_606";
		$NCF_606 = $NCF_606;			

	$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

if($Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){
			
	$id_registro606 = $Consulta606["id"];


}else{
	$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $Rnc_Empresa_606;
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $Rnc_Factura_606;
		$taNCF_606 = "NCF_606";
		$NCF_606 = $NCF_606;

$respuesta = Modelo606::mdlBorrarLD606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);
					
	echo '<script>
				swal({

					type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
					showConfirmButton: false,
					timer: 6000
					}).then(()=>{
					window.location = "crear-compra-inventarioNo";
													
					});
												
			</script>';	
		
		exit;
	}

/***************************************
			agregar Cliente 
	***************************************/
	$id_Suplidor = $_POST["agregarSuplidor"];

	$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
	$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
	$taDocumento = "Documento_Suplidor";
	$Documento = $_POST["RncSuplidorFactura"];
	$tabla = "suplidor_empresas";

		
	$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		
	if(!$respuesta || $respuesta == false){
			$tabla = "suplidor_empresas";
			$Email = "";
			$Telefono = "";
			$Direccion = "";
			$Estado = "Creado";

		$datos = array("Rnc_Empresa_Suplidor" => $Rnc_Empresa_606,
		"Tipo_Suplidor" => $_POST["Tipo_Suplidor_Factura"],
		"Nombre_Suplidor" => $_POST["Nombre_Suplidor"], 
		"Documento_Suplidor" => $_POST["RncSuplidorFactura"],
		"Email" => $Email, 
		"Telefono" => $Telefono ,
		"Direccion" => $Direccion, 
		"Usuario_Creador" => $_POST["UsuarioLogueado"], 
		"Estado" => $Estado);
		
		$respuesta = ModeloSuplidores::mdlCrearsuplidor($tabla, $datos);
						   
		$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["RncSuplidorFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		

		$id_Suplidor = $respuesta["id"];
 }

	

/*crear cuenta por pagar*/
if($_POST["Forma_De_Pago_606"] == "04"){ 
 	$tabla = "cxp_empresas";
	$Dia_Credito_cxp = "15";
	$Retenciones = "2";
	$tipo = "FACTURA";
	$Estatus = "1";
	
	$datos = array("id_606" => $id_registro606,
					"Rnc_Empresa_cxp" => $_POST["RncEmpresaCompras"],
					"CodigoCompra" => $_POST["CodigoCompra"],
					"id_Suplidor" => $id_Suplidor,
					"Rnc_Suplidor" => $Rnc_Factura_606,
					"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
					"NCF_cxp" => $NCF_606,
					"FechaAnoMes_cxp" => $_POST["FechaFacturames_606"],
					"FechaDia_cxp" => $_POST["FechaFacturadia_606"], 
					"Dia_Credito_cxp" => $Dia_Credito_cxp, 
					"Moneda" => $Moneda,
					"Tasa" => $tasa,
					"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
					"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2), 
					"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
					"Neto" => bcdiv($_POST["NetoCompra"], '1', 2), 
					"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
					"Total" => bcdiv($_POST["TotalCompra"], '1', 2),
					"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_606, '1', 2),
					"Retencion_Renta" =>  bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
					"Observaciones" => $_POST["Descripcion"],
					"Retenciones" => $Retenciones,
					"MontoPagado" => 0,
					"Estado" => "PorPagar",
					"Tipo" => $tipo,
					"Estatus" => $Estatus);
	 
	
	$respuesta = ModeloCXP::mdlIngresarcxp($tabla, $datos);

} /* fin cuentas por cobrar*/
$NAsientoRet = "";
if($_POST["Contabilidad"] == 1){
	
    

				$tabla = "606_empresas";
				$taRnc_Empresa_606 = "Rnc_Empresa_606";
				$Rnc_Empresa_606 =$_POST["RncEmpresaCompras"];
				$taRnc_Factura_606 = "Rnc_Factura_606";
				$Rnc_Factura_606 = $Rnc_Factura_606;
				$taNCF_606 = "NCF_606";
				$NCF_606 = $NCF_606;			

	$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

		if($Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){
			$id_registro606 = $Consulta606["id"];


		}
$tabla = "banco_empresas"; 
$id = "id";
$valorid = $_POST["agregarBanco"];
$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
	
	if($banco != false){
		$id_banco = $banco["id"];

	}else {
		$id_banco = 0;

	}


if(isset($_POST["listaProyecto"]) && $_POST["Proyecto"] == 1){


$listaProyecto =  json_decode($_POST["listaProyecto"], true);

foreach ($listaProyecto as $key => $value){

	

		$tabla = "proyectos_empresas";
		$id = "id";
		$valorid = $value["proyecto"];
				
		$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
		$idproyecto = $value["proyecto"];
		$codproyecto = $respuesta["CodigoProyecto"]; 

		if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["montoDistribuido"] * $tasa;
		$value["montoDistribuido"] = $cambioMoneda;

		}
		
		$tabla = "librodiario_empresas";
		$ObservacionesLD = $_POST["Descripcion"];
		$Extraer_NAsiento = "DCI";
		$Accion = "COMPRAINVENTARIO";
		$Transaccion_607 = 1;
		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "compras de mercancia";
		$debito = bcdiv($value["montoDistribuido"], '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturames_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



	}/*cierre for poryectos*/




	}/*cierre si issete poryectos*/

	else{
		$NetoCompra = $_POST["NetoCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $NetoCompra * $tasa;
		$NetoCompra = $cambioMoneda;

		}
		$idproyecto = "NOAPLICA";
		$codproyecto = "NOAPLICA";
		$listaProyecto = "NOAPLICA";

		$tabla = "librodiario_empresas";
		$ObservacionesLD = $_POST["Descripcion"];
		$Extraer_NAsiento = "DCI";
		$Accion = "COMPRAINVENTARIO";
		$Transaccion_607 = 1;
		$idgrupo = "5";
		$idcategoria = "1";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "compras de mercancia";
		$debito = bcdiv($NetoCompra, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

}/*cierre else de proyectos*/

	
if(!isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["PORITBIS"] > 0){
			$TotalITBIS = $_POST["TotalITBIS"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalITBIS * $tasa;
			$TotalITBIS = $cambioMoneda;

		}
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "ITBIS pagados en compras";
		$debito = bcdiv($TotalITBIS, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }		

if($_POST["TotalISC"] > 0 || $_POST["TotalOtrosImp"] > 0 || $ITBIS_alcosto_606> 0){
	
	$totalimpuestos = $_POST["TotalISC"] + $_POST["TotalOtrosImp"] + $ITBIS_alcosto_606;
		if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $totalimpuestos * $tasa;
			$totalimpuestos = $cambioMoneda;

		}

	$idgrupo = "6";
	$idcategoria = "1";
	$idgenerica = "09";
	$idcuenta = "003";
	$nombrecuenta = "impuestos indirectos";
	$debito = bcdiv($totalimpuestos, '1', 2);
	$credito = 0;
		

	$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }


if($_POST["Forma_De_Pago_606"] == "04"){ 
		$TotalCompra = $_POST["TotalCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalCompra * $tasa;
			$TotalCompra = $cambioMoneda;

		}
	$tabla = "librodiario_empresas";
		$idgrupo = "2";
		$idcategoria = "2";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "proveedores nacionales";
		$debito = 0;
		$credito = bcdiv($TotalCompra, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
}else{

	$TotalCompra = $_POST["TotalCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalCompra * $tasa;
			$TotalCompra = $cambioMoneda;

		}
	
	$tabla = "banco_empresas"; 
	$id = "id";
	$valorid = $_POST["agregarBanco"];
	$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
	
	$tabla = "librodiario_empresas";

		$id_banco = $banco["id"];
		$idgrupo = $banco["id_grupo"];
		$idcategoria = $banco["id_categoria"];
		$idgenerica = $banco["id_generica"];
		$idcuenta = $banco["id_cuenta"];
		$nombrecuenta = $banco["Nombre_CuentaContable"];
		$debito = 0;
		$credito = bcdiv($TotalCompra, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



}

if($_POST["Retencion"] == 1){
	
	if($_POST["Monto_ITBIS_Retenido"] > 0){
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido por pagar";
		$debito = 0;
		$credito = bcdiv($ITBIS_Retenido_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
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

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);
	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	}

}/*cierre retencion*/
/*************************************************************************************
					ACTUALIZAR CORRELATIVOS
			***************************************************************************************/
			$tabla = "correlativos_no_fiscal";
			$Tipo_NCF = "DCI";
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $N);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos); 

			$Tipo_NCF = "CP1";
			
			$datos = array("Rnc_Empresa" => $Rnc_Empresa_606,
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" => $_POST["CodigoNCFNo"]);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);  
 

 


}/*cierre contabilidad*/

/***********CIERRE DE CONTABILIDAD ***********/
if($_POST["Retencion"] == 1){
	$NAsientoRet = $NAsiento;



}else{

$NAsientoRet = "";

}
/**************************ACTUALIZAR INVENTARIO**********************/

$listaProductos =  json_decode($_POST["listaCuentas"], true);

	
			
foreach ($listaProductos as $key => $value) {

	$tablaProductos = "productos_empresas";

	$id = "id";

	$valorid = $value["id"];

$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);
$Stock = $traerProductos["Stock"] + $value["cantidad"];

	

$datos = array("id" => $valorid,
				"Stock" => $Stock,
				"Precio_Compra" => $value["preciocompra"],
				"Porcentaje" => $value["porcentajegan"],
				"Precio_Venta" => $value["precioventa"]);			

	

$nuevasCompras = ModeloProductos::MdlActualizarProductoCompras($tablaProductos, $datos);

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
$Accion = $Accion = "COMPRAINVENTARIO";

$datos = array ("Rnc_Empresa_Productos" => $_POST["RncEmpresaCompras"],
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => $value["porcentajegan"], 
      "Precio_Venta" => $value["precioventa"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames_606"],
      "Fecha_dia" => $_POST["FechaFacturadia_606"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_606,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["UsuarioLogueado"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);			
			
}/*CIERRO FOREACH*/
/*************CIERRE DE INVENTARIO*******/
if($_POST["Retencion"] == 1){
	$NAsientoRet = $NAsiento;



}else{

$NAsientoRet = "";

}
$tabla = "compras_empresas";
$modulo = "COMPRAINVENTARIO";
$Estatus = "POR PAGAR";
$Accion_Factura = "CREADA";
 
$datos = array("Rnc_Empresa_Compras" => $Rnc_Empresa_606,
				"CodigoCompra" => $_POST["CodigoCompra"],
				"Rnc_Suplidor" => $Rnc_Factura_606,
				"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
				"NCF_Factura" => $NCF_606,
				"FechaAnoMes" => $_POST["FechaFacturames_606"],
				"FechaDia" => $_POST["FechaFacturadia_606"],
				"id_Suplidor" => $id_Suplidor,
				"Producto" => $_POST["listaCuentas"],
				"Porimpuesto" => $_POST["PORITBIS"],
				"Moneda" => $_POST["Moneda_Factura"],
				"Tasa" => $tasa,
				"Impuesto" => $_POST["TotalITBIS"],
				"impuestoISC" => $_POST["TotalISC"], 
				"otrosimpuestos" => $_POST["TotalOtrosImp"],
				"Neto" => $_POST["NetoCompra"],
				"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
				"Total" => $_POST["TotalCompra"],
				"Proyecto" => $_POST["listaProyecto"],
				"Referencia" => $_POST["Descripcion"],
				"EXTRAER_NCF" => $Extraer_NCF_606,
				"Retenciones" => $_POST["Retencion"],
				"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_606,
				"Porc_ISR_Retenido" => $Porc_ISR_Retenido_606,
				"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
				"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
				"NAsiento" => $NAsiento,
				"NAsientoRET" => $NAsientoRet,
				"FormaPago" => $_POST["Forma_De_Pago_606"],
				"id_banco" => $id_banco,
				"Modulo" => $modulo,
				"Estatus" => $Estatus,
				"Usuario_Creador" => $_POST["UsuarioLogueado"],
				"Accion_Factura" => $Accion_Factura);


$respuesta = ModeloCompras::mdlIngresarCompra($tabla, $datos);	
if($respuesta == "ok"){
	unset($_SESSION["FechaFacturadia_606"]);
unset($_SESSION["NCFCompraNo"]);
unset($_SESSION["CodigoNCFCompra"]);
unset($_SESSION["NCF_Modificado_606"]);
unset($_SESSION["agregarSuplidor"]);
unset($_SESSION["Tipo_Suplidor_Factura"]);
unset($_SESSION["RncSuplidorFactura"]);
unset($_SESSION["Nombre_Suplidor"]);
unset($_SESSION["Descripcion"]);
unset($_SESSION["Tipo_Gasto_606"]);
unset($_SESSION["Forma_De_Pago_606"]);
unset($_SESSION["ITBIS_LLEVADO_A_COSTO"]);
unset($_SESSION["ITBIS_Sujeto_a_Propocionalidad"]);
unset($_SESSION["FechaPagomes606"]);
unset($_SESSION["FechaPagodia606"]);
unset($_SESSION["Referencia"]);
unset($_SESSION["ModuloBanco"]);
unset($_SESSION["listaCuentas"]);
unset($_SESSION["TotalISCvi"]);
unset($_SESSION["TotalOtrosImpvi"]); 
unset($_SESSION["TotalISC"]); 
unset($_SESSION["TotalOtrosImp"]);


	echo '<script>
		swal({
			type: "success",
			title: "<h1><strong>N° DE ASIENTO :<u>'.$NAsiento.'</u></strong></h1>",
			html: "<h3>La Compra Se Registro Correctamente</h3>",
			showConfirmButton: true,
			confirmButtonText: "Cerrar",
			closeOnConfirm: false
			}).then((result)=>{
		if(result.value){
			window.location = "crear-compra-inventarioNo";
		}

		});

</script>';
	
				
			}	
	
}/*cierre isset*/
	
}/*cierre funcion*/
static public function ctrEditarcomprasinventario(){
	
	if(isset($_POST["Editar_CompraInventario"]) && isset($_POST["Editar_id_606"])){
/*******VALIDACIONES DEL FORMULARIO  INICIO INICIO **********************/
		
		/* INICIO VALIDACION QUE LA FACUTRA NO SE REPITA */

		$tabla = "606_empresas";
		$taRnc_Empresa_606 = "Rnc_Empresa_606";
		$Rnc_Empresa_606 = $_POST["RncEmpresaCompras"];
		$taRnc_Factura_606 = "Rnc_Factura_606";
		$Rnc_Factura_606 = $_POST["Editar-RncSuplidorFactura"];
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
												window.location = "compras";
											}

											});

								</script>';
						exit;

		}
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
														window.location = "compras";
													}

													});

										</script>';
								exit;

		}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/

		if($_POST["Proyecto"] == 1){
			if(empty($_POST["listaProyecto"]) || $_POST["listaProyecto"] == "[]"){ 

						echo '<script>
										swal({

											type: "error",
											title: "DEBE TENER POR LO MENOS UN PROYECTO DISTRIBUIDO!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "compras";
													}

													});

										</script>';
								exit;

				}
			}
			/* FIN VALIDACION DE ASIENTOS VACIOS ************/
			/*INICIO DE VALIDACION DE BCF B04 Y NCF MODIFICADO*/
	$Extraer_NCF_606 = substr($_POST["Editar-NCF_606"], 0, 3);

		if($Extraer_NCF_606 == "B04" && $_POST["NCF_Modificado_606"] == ""){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Nota de CREDITO B04 DEBE TENER LA FACTURA AFECTADA POR FAVOR LLENAR EL CAMPO DE LA FACTURA AFECTADA EN NCF MODIFICADO!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
									});
												
								</script>';	
					exit;	
	} 
	if(!(preg_match('/^[0-9]+$/', $_POST["Editar-RncSuplidorFactura"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
	}
	
	
	if($_POST["Fiscal"] == "SI"){ 
	if(!(preg_match('/^[BE0-9]+$/', $_POST["Editar-NCF_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
	}
	}else{
		if(!(preg_match('/^[CP0-9]+$/', $_POST["Editar-NCF_606"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el NCF!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
		}


	}	
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
	}

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaFacturadia_606"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "compras";
													
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
									window.location = "compras";
													
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
									window.location = "compras";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
if($_POST["RncEmpresaCompras"] != $_POST["Editar-RncSuplidorFactura"]){
	$tabla = "suplidor_empresas";
		$taRnc_Empresa_Suplidor = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Suplidor = $_POST["RncEmpresaCompras"];
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["Editar-RncSuplidorFactura"];
		
$suplidor =  ModeloSuplidores::mdlMostrarSuplidorFact($tabla, $taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, $taDocumento, $Documento);

if($suplidor != false && $suplidor["Rnc_Empresa_Suplidor"] == $Rnc_Empresa_Suplidor && $suplidor["Documento_Suplidor"] == $_POST["Editar-RncSuplidorFactura"] && $suplidor["id"] != $_POST["agregarSuplidor"]){

				echo '<script>
								swal({
									type: "error",
									title: "El Select del  Suplidor no Coinciden con el RNC del cliente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "compras";
											}

											});

								</script>';


		exit;

}
}
/*******INICIO VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC*****/
if(($_POST["Tipo_Suplidor_Factura"] == 1 && strlen($_POST["Editar-RncSuplidorFactura"]) != 9) || ($_POST["Tipo_Suplidor_Factura"] == 2 && strlen($_POST["Editar-RncSuplidorFactura"]) != 11)){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";


													
													});


												
								</script>';	
			exit;	

							
	}
	if((substr($_POST["Editar-NCF_606"], 0, 1) == "B" && strlen($_POST["Editar-NCF_606"]) != 11) || (substr($_POST["Editar-NCF_606"], 0, 1) == "E" && strlen($_POST["Editar-NCF_606"]) != 13) ){
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en el NCF, debe tener 11 Caracteres o 13 no puede ser menor O mayor!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
								});

	
								</script>';
				exit;
	}
	/*******INICIO VALIDACION DE NCF*****/


	$suma = $_POST["NetoCompra"];
	$PorcentajeITBIS = $suma * 0.18;
	

	$CalculoITBIS = bcdiv($PorcentajeITBIS, '1', 3);
	

	if($_POST["TotalITBIS"] > $CalculoITBIS){
		 
		echo '<script>
								swal({

									type: "error",
									title: "¡Error en MONTO ITBIS no puede ser mayor al 18 %!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "compras";
													
													});


												
								</script>';	
			exit;	
	}
	
	if(isset($_POST["montodis"])){
		if($_POST["montodis"] > $_POST["NetoCompra"]){
			echo '<script>
						swal({

							type: "error",
							title: "¡El Total del Monto distribuido no puede ser mayor que el sub total de la factura!",
							showConfirmButton: false,
							timer: 6000
							}).then(()=>{
							window.location = "compras";
													
											});
						
						</script>';	
				

			exit;	

		}
	}
		/* INICIO AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
			$tabla = "growin_dgii";
			$taRnc_Growin_DGII = "Rnc_Growin_DGII";
			$ValorRnc_Growin_DGII = $_POST["Editar-RncSuplidorFactura"];
			$ValorNombreGrowin_DGII = $_POST["Nombre_Suplidor"];
			$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);
			
			if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
				$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

					$respuesta = ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);

			}
		/* FIN AGREGAR EMPRESA A TABLA GROWIN EMPRESAS*/
$ValorTipo_Gasto_606 = "09";
$Tipo_Gasto_606 = "09-COMPRA FORMARA PARTE COSTO DE VENTA ";

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


       }


$Montototalbienes = $_POST["NetoCompra"];
$Montototalservicios = "0";
$ITBIS_Compras_606 =$_POST["TotalITBIS"];
$ITBIS_Servicios_606 = "0.00";
$TOTALITBIS = $ITBIS_Compras_606 +$ITBIS_Servicios_606;

$totalFactura = $_POST["NetoCompra"];

if($_POST["Moneda_Factura"] == "USD"){
			$Moneda = "USD";
			$tasa = $_POST["tasaUS"];

		
				$USDMontototalbienes = $Montototalbienes * $tasa;
				$Montototalbienes = $USDMontototalbienes;
				$USDMontototalservicios = $Montototalservicios * $tasa;
				$Montototalservicios = $USDMontototalservicios;
				$USDtotalFactura = $totalFactura * $tasa;
				$totalFactura = $USDtotalFactura;
				$USDITBIS_Compras_606 = $ITBIS_Compras_606 * $tasa;
				$USDITBIS_Servicios_606 = $ITBIS_Servicios_606 * $tasa;
				$ITBIS_Compras_606 = $USDITBIS_Compras_606;
				$ITBIS_Servicios_606 = $USDITBIS_Servicios_606;
				$TOTALITBIS = $ITBIS_Compras_606 +$ITBIS_Servicios_606;


		}else{
			$Moneda = "DOP";
			$tasa = 0;


		}

if(isset($_POST["Editar-ITBIS_LLEVADO_A_COSTO"]) && $_POST["Editar-ITBIS_LLEVADO_A_COSTO"] == 1){
										
	$ITBIS_alcosto_606 = $TOTALITBIS;
	$ITBIS_Adelantar_606 = "0.00";

}else { 
	
	$ITBIS_alcosto_606 = "0.00";
	$ITBIS_Adelantar_606 = $TOTALITBIS;
										
}
	

if(isset($_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] == 1){ 
										
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Servicion_606 = "0.00";

}elseif(isset($_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"]) && $_POST["Editar-ITBIS_Sujeto_a_Propocionalidad"] == 1 && $_POST["tipo_de_monto"] != 1){ 
	$ITBIS_Proporcional_606 = $TOTALITBIS;
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = $TOTALITBIS;
}
else { 

	$ITBIS_Proporcional_606 = "0.00";
	$ITBIS_Proporcional_Compras_606 = "0.00";
	$ITBIS_Proporcional_Servicion_606 = "0.00";

}



if($_POST["Retencion"] == 1){
	if($_POST["Moneda_Factura"] == "USD"){

		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $USDITBIS_Retenido_606 * $_POST["tasaUS"];
		$USDMonto_Retencion_Renta_606 =$_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $USDMonto_Retencion_Renta_606 * $_POST["tasaUS"];


	}else{
		$USDITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"] ;
		$ITBIS_Retenido_606 = $_POST["Monto_ITBIS_Retenido"];
		$USDMonto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
		$Monto_Retencion_Renta_606 = $_POST["Monto_ISR_Retenido"];
	}

 

		$Fecha_Ret_AñoMes_606  = $_POST["FechaFacturames_606"];
		$Fecha_Ret_Dia_606 = $_POST["FechaFacturadia_606"];
		
		
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
		$USDITBIS_Retenido_606 = "0.00";
		$ITBIS_Retenido_606 = "0.00";
		$USDMonto_Retencion_Renta_606 = "0.00";
		$Monto_Retencion_Renta_606 = "0.00";

}
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
		
if($_POST["Moneda_Factura"] == "USD"){

$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $USDImpuestos_Selectivo_606 * $_POST["tasaUS"];


$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $USDOtro_Impuesto_606 * $_POST["tasaUS"];

	}else{
$USDImpuestos_Selectivo_606 = $_POST["TotalISC"];
$Impuestos_Selectivo_606 = $_POST["TotalISC"];

$USDOtro_Impuesto_606 = $_POST["TotalOtrosImp"];

$Otro_Impuesto_606 = $_POST["TotalOtrosImp"];
	
	}




$ITBIS_Percibido_Compras_606 = "0.00";
$ISR_Percibido_606 = "0.00";


$Monto_Propina_606 = 0;

$Extraer_Tipo_Pago_606 = $_POST["Forma_De_Pago_606"];

$Extraer_Tipo_Gasto_606 = "09";
$B04MeMa_607 = "";
$Tipo_Transaccion_606 = 1;
$Estatus_606 = "";
$B04_Periodo_606 = 0;
$Fecha_Trans_AnoMes_606 = $_POST["FechaPagomes606"];
$Fecha_Trans_Dia_606 = $_POST["FechaPagodia606"];
$Referencia_606 = $_POST["Referencia"];
$Banco_606 = $_POST["agregarBanco"];

$Accion_606 = "Editado";
$CodigoCompra = $_POST["CodigoCompra"];
$Modulo = "COMPRAS";

$tabla = "606_empresas";

$datos = array("id" => $_POST["Editar_id_606"],
"Rnc_Empresa_606" => $Rnc_Empresa_606,
"Rnc_Factura_606" => $Rnc_Factura_606,
"Tipo_Id_Factura_606" => $_POST["Tipo_Suplidor_Factura"],
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
"ITBIS_Factura_606" => $TOTALITBIS,
"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
"ITBIS_Proporcional_606" => $ITBIS_Proporcional_606,
"ITBIS_alcosto_606" => $ITBIS_alcosto_606,
"ITBIS_Adelantar_606" => $ITBIS_Adelantar_606,
"ITBIS_Percibido_Compras_606" => $ITBIS_Percibido_Compras_606,
"Tipo_Retencion_ISR_606" => $Tipo_Retencion_ISR_606,
"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
"ISR_Percibido_606" => $ISR_Percibido_606,
"Impuestos_Selectivo_606" => $Impuestos_Selectivo_606,
"Otro_Impuesto_606" => $Otro_Impuesto_606,
"Monto_Propina_606" => $Monto_Propina_606,
"Forma_Pago_606" => $ValorForma_De_Pago_606 ,	
"Estatus_606" => $Estatus_606,
"Extraer_NCF_606" => $Extraer_NCF_606,
"Extraer_Tipo_Pago_606" => $Extraer_Tipo_Pago_606,
"Extraer_Tipo_Gasto_606" => $Extraer_Tipo_Gasto_606,
"ITBIS_Compras_606" => $ITBIS_Compras_606,
"ITBIS_Servicios_606" => $ITBIS_Servicios_606,
"ITBIS_Proporcional_Compras_606" => $ITBIS_Proporcional_Compras_606,
"ITBIS_Proporcional_Servicion_606" => $ITBIS_Proporcional_Servicion_606,
"Extrar_Tipo_Retencion_606" => $Extrar_Tipo_Retencion_606,
"Porc_ITBIS_Retenido_606" => $Porc_ITBIS_Retenido_606,
"Porc_ISR_Retenido_606" => $Porc_ISR_Retenido_606,
"B04_Periodo_606" => $B04_Periodo_606,
"Tipo_Transaccion_606" => $Tipo_Transaccion_606,
"Fecha_Trans_AnoMes_606" => $Fecha_Trans_AnoMes_606,
"Fecha_Trans_Dia_606" => $Fecha_Trans_Dia_606,
"Referencia_606" => $Referencia_606,
"Banco_606" => $Banco_606,
"Descripcion_606" => $_POST["Descripcion"],
"Nombre_Empresa_606" => $_POST["Nombre_Suplidor"],
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
									
}else{
	echo '<script>
								swal({

					type: "error",
					title: "¡No se Realizo el Registro de la Factura correctamente!",
					showConfirmButton: false,
					timer: 6000
					}).then(()=>{
					window.location = "compras";
													
									});
												
				</script>';	
					exit;
}
/*********************** agregar Cliente *****************************/
	$id_Suplidor = $_POST["agregarSuplidor"];
	$tabla = "suplidor_empresas";
		if(empty($_POST["agregarSuplidor"])){
				$tabla = "suplidor_empresas";
				$Email = "";
				$Telefono = "";
				$Direccion = "";
				$Estado = "Creado";

		$datos = array("Rnc_Empresa_Suplidor" => $Rnc_Empresa_606,
		"Tipo_Suplidor" => $_POST["Tipo_Suplidor_Factura"],
		"Nombre_Suplidor" => $_POST["Nombre_Suplidor"], 
		"Documento_Suplidor" => $_POST["Editar-RncSuplidorFactura"],
		"Email" => $Email, 
		"Telefono" => $Telefono ,
		"Direccion" => $Direccion, 
		"Usuario_Creador" => $_POST["UsuarioLogueado"], 
		"Estado" => $Estado);
		
		$respuesta = ModeloSuplidores::mdlCrearsuplidor($tabla, $datos);
						   

		$taRnc_Empresa_Cliente = "Rnc_Empresa_Suplidor";
		$Rnc_Empresa_Cliente = $Rnc_Empresa_606;
		$taDocumento = "Documento_Suplidor";
		$Documento = $_POST["Editar-RncSuplidorFactura"];

		
		$respuesta = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);
		

		$id_Suplidor = $respuesta["id"];
 }
/*******************************************************/
$id_registro606 = $_POST["Editar_id_606"];
/*EDITAR CUENTAS POR PAGAR */
if($Extraer_Tipo_Pago_606 == "04" && $_POST["Editar_id_cxp"] != "NO"){


	$tabla = "cxp_empresas";
	$Dia_Credito_cxp = "15";
	$Retenciones = "2";
	$tipo = "FACTURA";
	$Estatus = "1";
	
	$datos = array("id" => $_POST["Editar_id_cxp"],
					"Rnc_Empresa_cxp" => $_POST["RncEmpresaCompras"],
					"CodigoCompra" => $_POST["CodigoCompra"],
					"id_Suplidor" => $id_Suplidor,
					"Rnc_Suplidor" => $Rnc_Factura_606,
					"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
					"NCF_cxp" => $NCF_606,
					"FechaAnoMes_cxp" => $_POST["FechaFacturames_606"],
					"FechaDia_cxp" => $_POST["FechaFacturadia_606"], 
					"Fecha_Ret_AnoMes_cxp" => "", 
					"Fecha_Ret_Dia_cxp" => "", 
					"Dia_Credito_cxp" => $Dia_Credito_cxp,
					"Moneda" => $Moneda,
					"Tasa" => $tasa,
					"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
					"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2), 
					"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
					"Neto" => bcdiv($_POST["NetoCompra"], '1', 2), 
					"Total" => bcdiv($_POST["TotalCompra"], '1', 2),
					"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_606, '1', 2),
					"Retencion_Renta" =>  bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
					"Observaciones" => $_POST["Descripcion"],
					"Retenciones" => $Retenciones,
					"Tipo" => $tipo,
					"Estatus" => $Estatus);
	
	$respuesta = ModeloCXP::mdlEDITARCXPFACTURA($tabla, $datos); 

if($_POST["Retencion"] == 1){

	$tabla = "cxp_empresas";
        $taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
        $Rnc_Empresa_cxp = $_POST["RncEmpresaCompras"];
        $taCodigoCompra = "CodigoCompra";
        $CodigoCompra = $_POST["CodigoCompra"];
        $taRnc_Factura_cxp = "Rnc_Suplidor";
        $Rnc_Factura_cxp = $_POST["RncSuplidor-anterior"];
        $taNCF_cxp = "NCF_cxp";
        $NCF_cxp = $_POST["NCF_606-anterior"];
        $taRetenciones = "Retenciones";
        $Retenciones = 1;

		$respuesta = ModeloCXP::MdlMostrarCXPDGII($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoCompra, $CodigoCompra, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taRetenciones, $Retenciones);

		foreach ($respuesta as $key => $value) {
		$valorid = $value["id"];
		$borrar =  ModeloCXP::mdlBorrarCXP($tabla, $valorid);

		}

	
	

	}else{
		$tabla = "cxp_empresas";
        $taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
        $Rnc_Empresa_cxp = $_POST["RncEmpresaCompras"];
        $taCodigoCompra = "CodigoCompra";
        $CodigoCompra = $_POST["CodigoCompra"];
        $taRnc_Factura_cxp = "Rnc_Suplidor";
        $Rnc_Factura_cxp = $_POST["RncSuplidor-anterior"];;
        $taNCF_cxp = "NCF_cxp";
        $NCF_cxp = $_POST["NCF_606-anterior"];
        $taRetenciones = "Retenciones";
        $Retenciones = 1;

		$respuesta = ModeloCXP::MdlMostrarCXPDGII($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoCompra, $CodigoCompra, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taRetenciones, $Retenciones);


		foreach ($respuesta as $key => $value) {
		$valorid = $value["id"];
		$borrar =  ModeloCXP::mdlBorrarCXP($tabla, $valorid);

		}

	}



}/*cierre editar cxp*/


/*BORRAR CXP*/
if($Extraer_Tipo_Pago_606 != "04" && $_POST["Editar_id_cxp"] != "NO"){

$tabla = "cxp_empresas";

$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
$Rnc_Empresa_cxp = $_GET["RncEmpresaCompras"];

$taRnc_Suplidor = "CodigoCompra";
$Rnc_Suplidor = $_POST["CodigoCompra"];

$taNCF_cxp = "id";
$NCF_cxp = $_POST["Editar_id_cxp"];

$respuesta = ModeloCompras::mdlBorrarCompras606CXP($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taRnc_Suplidor, $Rnc_Suplidor, $taNCF_cxp, $NCF_cxp);

$tabla = "cxp_empresas";
        $taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
        $Rnc_Empresa_cxp = $_POST["RncEmpresaCompras"];
        $taCodigoCompra = "CodigoCompra";
        $CodigoCompra = $_POST["CodigoCompra"];
        $taRnc_Factura_cxp = "Rnc_Suplidor";
        $Rnc_Factura_cxp = $_POST["RncSuplidor-anterior"];;
        $taNCF_cxp = "NCF_cxp";
        $NCF_cxp = $_POST["NCF_606-anterior"];
        $taRetenciones = "Retenciones";
        $Retenciones = 1;

		$respuesta = ModeloCXP::MdlMostrarCXPDGII($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoCompra, $CodigoCompra, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taRetenciones, $Retenciones);


		foreach ($respuesta as $key => $value) {
		$valorid = $value["id"];
		$borrar =  ModeloCXP::mdlBorrarCXP($tabla, $valorid);

		}

}/*CREAR*/
if($Extraer_Tipo_Pago_606 == "04" && $_POST["Editar_id_cxp"] == "NO"){

	$tabla = "cxp_empresas";
	$Dia_Credito_cxp = "15";
	$Retenciones = "2";
	$tipo = "FACTURA";
	$Estatus = "1";
	
	$datos = array("id_606" => $id_registro606,
		"Rnc_Empresa_cxp" => $_POST["RncEmpresaCompras"],
					"CodigoCompra" => $_POST["CodigoCompra"],
					"id_Suplidor" => $id_Suplidor,
					"Rnc_Suplidor" => $Rnc_Factura_606,
					"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
					"NCF_cxp" => $NCF_606,
					"FechaAnoMes_cxp" => $_POST["FechaFacturames_606"],
					"FechaDia_cxp" => $_POST["FechaFacturadia_606"], 
					"Dia_Credito_cxp" => $Dia_Credito_cxp, 
					"Moneda" => $Moneda,
					"Tasa" => $tasa,
					"Impuesto" => bcdiv($_POST["TotalITBIS"], '1', 2),
					"impuestoISC" => bcdiv($_POST["TotalISC"], '1', 2),
					"otrosimpuestos" => bcdiv($_POST["TotalOtrosImp"], '1', 2),
					"Neto" => bcdiv($_POST["NetoGasto"], '1', 2),
					"Propinalegal" => bcdiv($Monto_Propina_606, '1', 2),
					"Total" => bcdiv($_POST["TotalGasto"], '1', 2),
					"ITBIS_Retenido" => bcdiv($USDITBIS_Retenido_606, '1', 2),
					"Retencion_Renta" => bcdiv($USDMonto_Retencion_Renta_606, '1', 2),
					"Observaciones" => $_POST["Descripcion"],
					"Retenciones" => $Retenciones,
					"MontoPagado" => 0,
					"Estado" => "PorPagar",
					"Tipo" => $tipo,
					"Estatus" => $Estatus);
	 
	
	$respuesta = ModeloCXP::mdlIngresarcxp($tabla, $datos);

} /*** fin cuentas por cobrar ***/


if($_POST["Contabilidad"] == 1){

	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["Editar_id_606"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD =$_POST["RncEmpresaCompras"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DCI";

	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "REC";

	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsientoRet"];

	
	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}

	$NAsiento = $_POST["NAsiento"];
	$id_registro606 = $_POST["Editar_id_606"];
if(isset($_POST["listaProyecto"]) && $_POST["Proyecto"] == 1){
	
	$listaProyecto =  json_decode($_POST["listaProyecto"], true);

	foreach ($listaProyecto as $key => $value){

		$tabla = "proyectos_empresas";
		$id = "id";
		$valorid = $value["proyecto"];
				
		$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);
				
		$idproyecto = $value["proyecto"];
		$codproyecto = $respuesta["CodigoProyecto"]; 

		if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $value["montoDistribuido"] * $tasa;
		$value["montoDistribuido"] = $cambioMoneda;

		}
		
		$tabla = "librodiario_empresas";
		$ObservacionesLD = $_POST["Descripcion"];
		$Extraer_NAsiento = "DCI";
		$Accion = "COMPRAINVENTARIO";
		$Transaccion_607 = 1;
		$idbanco = 0;
		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = bcdiv($value["montoDistribuido"], '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturames_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



	}/*cierre for poryectos*/



}/*cierre issete listaProyecto*/

else{
	$NetoCompra = $_POST["NetoCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
		$cambioMoneda = $NetoCompra * $tasa;
		$NetoCompra = $cambioMoneda;

		}
		$idproyecto = "NOAPLICA";
		$codproyecto = "NOAPLICA";
		$listaProyecto = "NOAPLICA";

		$tabla = "librodiario_empresas";
		$ObservacionesLD = $_POST["Descripcion"];
		$Extraer_NAsiento = "DCI";
		$Accion = "COMPRAINVENTARIO";
		$Transaccion_607 = 1;
		$idbanco = 0;
		$idgrupo = "1";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "inventario disponible para la venta";
		$debito = bcdiv($NetoCompra, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
}/*cierre else de proyectos*/
if(isset($_POST["ITBIS_LLEVADO_A_COSTO"]) && $_POST["ITBIS_LLEVADO_A_COSTO"] == 1) {

}else{
if($_POST["PORITBIS"] > 0){
	$TotalITBIS = $_POST["TotalITBIS"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalITBIS * $tasa;
			$TotalITBIS = $cambioMoneda;

		}
		$idgrupo = "1";
		$idcategoria = "3";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "ITBIS pagados en compras";
		$debito = bcdiv($TotalITBIS, '1', 2);
		$credito = 0;

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }
 }
if($_POST["TotalISC"] > 0 || $_POST["TotalOtrosImp"] > 0 ||  
$ITBIS_alcosto_606 > 0){
	
	$totalimpuestos = $_POST["TotalISC"] + $_POST["TotalOtrosImp"] + $ITBIS_alcosto_606;
		if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $totalimpuestos * $tasa;
			$totalimpuestos = $cambioMoneda;

		}
	$idgrupo = "6";
	$idcategoria = "1";
	$idgenerica = "09";
	$idcuenta = "003";
	$nombrecuenta = "impuestos indirectos";
	$debito = bcdiv($totalimpuestos, '1', 2);
	$credito = 0;


		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
 }
if($_POST["Forma_De_Pago_606"] == "04"){ 
	$TotalCompra = $_POST["TotalCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalCompra * $tasa;
			$TotalCompra = $cambioMoneda;

		}
	$tabla = "librodiario_empresas";
		$idgrupo = "2";
		$idcategoria = "2";
		$idgenerica = "01";
		$idcuenta = "001";
		$nombrecuenta = "proveedores nacionales";
		$debito = 0;
		$credito = bcdiv($TotalCompra, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
}else{
	$TotalCompra = $_POST["TotalCompra"];
	if($_POST["Moneda_Factura"] == "USD"){
			$cambioMoneda = $TotalCompra * $tasa;
			$TotalCompra = $cambioMoneda;

		}
	
	$tabla = "banco_empresas"; 
	$id = "id";
	$valorid = $_POST["agregarBanco"];
	$banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
	
	$tabla = "librodiario_empresas";

		$idbanco = $banco["id"];
		$idgrupo = $banco["id_grupo"];
		$idcategoria = $banco["id_categoria"];
		$idgenerica = $banco["id_generica"];
		$idcuenta = $banco["id_cuenta"];
		$nombrecuenta = $banco["Nombre_CuentaContable"];
		$debito = 0;
		$credito = bcdiv($TotalCompra, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);


$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);



}

if($_POST["Retencion"] == 1){
	
	if($_POST["Monto_ITBIS_Retenido"] > 0){
		$idgrupo = "2";
		$idcategoria = "4";
		$idgenerica = "01";
		$idcuenta = "002";
		$nombrecuenta = "ITBIS retenido por pagar";
		$debito = 0;
		$credito = bcdiv($ITBIS_Retenido_606, '1', 2);

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
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

		$datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_606,
					"id_registro" => $id_registro606,
					"Rnc_Factura" => $Rnc_Factura_606,
					"NCF" => $NCF_606,
					"Nombre_Empresa" => $_POST["Nombre_Suplidor"],
					"NAsiento" => $NAsiento,
					"id_grupo" => $idgrupo,
					"id_categoria" => $idcategoria,
					"id_generica" => $idgenerica,
					"id_cuenta" => $idcuenta,
					"Nombre_Cuenta" => $nombrecuenta,
					"Fecha_AnoMes_LD" => $_POST["FechaFacturames_606"],
					"Fecha_dia_LD" => $_POST["FechaFacturadia_606"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion_607,
					"Fecha_AnoMes_Trans" => $_POST["FechaFacturames_606"],
					"Fecha_dia_Trans" => $_POST["FechaFacturadia_606"],
					"id_banco" => $idbanco,
					"referencia" => $_POST["Descripcion"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);
	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);


	}

}/*cierre retencion*/

}/*cierre if contabilidad*/
/**********************************************************************************************/

/************************************************
			FORMATEAR TABLA DE PRODUCTOS 
*************************************************/
	$tabla = "compras_empresas";

	$id = "id";

	$valoridCompras = $_POST["Editar_CompraInventario"];

	$traerCompras = ModeloCompras::mdlMostrarComprasEditar($tabla, $id, $valoridCompras);

	$Productos =  json_decode($traerCompras["Producto"], true);

	$totalProductosComprados = array();
	foreach ($Productos as $key => $value) {
		array_push($totalProductosComprados, $value["cantidad"]);


		$tablaProductos = "productos_empresas";

								
		$id = "id";
		$valorid = $value["id"];

		$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);


		$item1b = "Stock";

		$valor1a = $traerProductos["Stock"] - $value["cantidad"];

		
	$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1a, $id, $valorid);

$tabla = "historico_productos_empresas";

$datos = array("Rnc_Empresa_Productos" => $Rnc_Empresa_606,
	"Codigo" => $traerProductos["Codigo"],
	"NCF" => $NCF_606,
	"NAsiento" => $NAsiento);


	$eliminarhistorico = ModeloProductos::mdlEliminarhistoricoProductos($tabla, $datos);



	}/*cierre foreach de Productos*/

	/**************************ACTUALIZAR INVENTARIO**********************/

$listaProductos =  json_decode($_POST["listaCuentas"], true);

	
			
foreach ($listaProductos as $key => $value) {

	$tablaProductos = "productos_empresas";

	$id = "id";

	$valorid = $value["id"];

$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);
$Stock = $traerProductos["Stock"] + $value["cantidad"];

	

$datos = array("id" => $valorid,
				"Stock" => $Stock,
				"Precio_Compra" => $value["preciocompra"],
				"Porcentaje" => $value["porcentajegan"],
				"Precio_Venta" => $value["precioventa"]);			

	

$nuevasCompras = ModeloProductos::MdlActualizarProductoCompras($tablaProductos, $datos);

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
$Accion = "EDITAR-COMPRAINVENTARIO";

$datos = array ("Rnc_Empresa_Productos" => $_POST["RncEmpresaCompras"],
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $producto["Codigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $producto["Descripcion"], 
      "Stock" => $value["cantidad"], 
      "Precio_Compra" => $value["preciocompra"], 
      "Porcentaje" => $value["porcentajegan"], 
      "Precio_Venta" => $value["precioventa"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $_POST["FechaFacturames_606"],
      "Fecha_dia" => $_POST["FechaFacturadia_606"],
      "NAsiento" => $NAsiento,
      "NCF" => $NCF_606,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $ObservacionesLD,
      "Usuario" => $_POST["UsuarioLogueado"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);			

			
}/*CIERRO FOREACH*/
/*************CIERRE DE INVENTARIO*******/
if($_POST["Retencion"] == 1){
	$NAsientoRet = $_POST["NAsiento"];



}else{

$NAsientoRet = "";

}

$tabla = "compras_empresas";
$modulo = "COMPRAINVENTARIO";
$Estatus = "POR PAGAR";
$Accion_Factura = "EDITADA";
$datos = array("id" => $_POST["Editar_CompraInventario"],
	"Rnc_Empresa_Compras" => $Rnc_Empresa_606,
	"CodigoCompra" => $_POST["CodigoCompra"],
	"Rnc_Suplidor" => $Rnc_Factura_606,
	"Nombre_Suplidor" => $_POST["Nombre_Suplidor"],
	"NCF_Factura" => $NCF_606,
	"FechaAnoMes" => $_POST["FechaFacturames_606"],
	"FechaDia" => $_POST["FechaFacturadia_606"],
	"id_Suplidor" => $id_Suplidor,
	"Producto" => $_POST["listaCuentas"],
	"Porimpuesto" => $_POST["PORITBIS"],
	"Moneda" => $_POST["Moneda_Factura"],
	"Tasa" => $tasa,
	"Impuesto" => $_POST["TotalITBIS"],
	"impuestoISC" => $_POST["TotalISC"], 
	"otrosimpuestos" => $_POST["TotalOtrosImp"],
	"Neto" => $_POST["NetoCompra"],
	"Total" => $_POST["TotalCompra"],
	"Proyecto" => $_POST["listaProyecto"],
	"Referencia" => $_POST["Descripcion"],
	"FormaPago" => $_POST["Forma_De_Pago_606"],
	"id_banco" => $_POST["agregarBanco"],
	"EXTRAER_NCF" => $Extraer_NCF_606,
	"Retenciones" => $_POST["Retencion"],
	"Porc_ITBIS_Retenido" => $Porc_ITBIS_Retenido_606,
	"Porc_ISR_Retenido" => $Porc_ISR_Retenido_606,
	"ITBIS_Retenido_606" => $ITBIS_Retenido_606,
	"Monto_Retencion_Renta_606" => $Monto_Retencion_Renta_606,
	"NAsiento" => $NAsiento,
	"NAsientoRET" => $NAsientoRet,
	"Modulo" => $modulo,
	"Estatus" => $Estatus,
	"Usuario_Creador" => $_POST["UsuarioLogueado"],
	"Accion_Factura" => $Accion_Factura);


$respuesta = ModeloCompras::mdlEditarCompra($tabla, $datos);	
if($respuesta == "ok"){
	echo '<script>
									swal({
										type: "success",
										title: "¡la Compra Se Edito Correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false
											}).then((result)=>{

												if(result.value){
													window.location = "compras";
												}

												});

									</script>';
				
			
			}		


	


	}/*cierre isset*/
}
static public function ctrEliminarCompra(){

 if(isset($_GET["idcompra"])){

	$tabla = "606_empresas";
	$taRnc_Empresa_606 = "Rnc_Empresa_606";
	$Rnc_Empresa_606 = $_GET["RncEmpresaCompras"];
	$taRnc_Factura_606 = "Rnc_Factura_606";
	$Rnc_Factura_606 = $_GET["RncFactura606"];
	$taNCF_606 = "NCF_606";
	$NCF_606 = $_GET["NCF_606"];

	$Consulta606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);

	if($Consulta606 != false && $Consulta606["Rnc_Empresa_606"] == $Rnc_Empresa_606 && $Consulta606["Rnc_Factura_606"] == $Rnc_Factura_606 && $Consulta606["NCF_606"] == $NCF_606){

		$id_registro606 = $Consulta606["id"];
	}

 	/**libro diario*/

$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $id_registro606;

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_GET["RncEmpresaCompras"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = $_GET["ExtrarNCF"];
	
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_GET["RncFactura606"];
	
	$taNCF = "NCF";
	$NCF = $_GET["NCF_606"];

	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	foreach ($respuesta as $key => $value){
			$valorid = $value["id"];
			$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);	
	}
/**BORRAR RETENCIONES EN COMPRAS**/
$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $id_registro606;

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_GET["RncEmpresaCompras"];

	$taExtraer = "Extraer_NAsiento";
	$Extraer = "REC";
	
	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_GET["RncFactura606"];
	
	$taNCF = "NCF";
	$NCF = $_GET["NCF_606"];

	$respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);

	foreach ($respuesta as $key => $value){
			$valorid = $value["id"];
			$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);	
	}


	
	
/************************************************
			FORMATEAR TABLA DE PRODUCTOS 
*************************************************/
if($_GET["Modulo"] == "COMPRAINVENTARIO"){ 
	$tabla = "compras_empresas";

	$id = "id";

	$valoridCompras = $_GET["idcompra"];

	$traerCompras = ModeloCompras::mdlMostrarComprasEditar($tabla, $id, $valoridCompras);

	$Productos =  json_decode($traerCompras["Producto"], true);

	$totalProductosComprados = array();
	foreach ($Productos as $key => $value) {
		array_push($totalProductosComprados, $value["cantidad"]);


		$tablaProductos = "productos_empresas";

								
		$id = "id";
		$valorid = $value["id"];

		$traerProductos = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);


		$item1b = "Stock";

		$valor1a = $traerProductos["Stock"] - $value["cantidad"];

		
	$nuevoStock = ModeloProductos::MdlActualizarProductoStock($tablaProductos, $item1b, $valor1a, $id, $valorid);


	}/*cierre foreach de Productos*/
 }else{
 	$tabla = "compras_empresas";

	$id = "id";

	$valoridCompras = $_GET["idcompra"];


 }

$respuesta = ModeloCompras::mdlBorrarCompra($tabla, $id, $valoridCompras);
	
/****************************
	ELIMINARCOMPRA CXP
******************************/

$tabla = "cxp_empresas";

$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
$Rnc_Empresa_cxp = $_GET["RncEmpresaCompras"];

$taRnc_Suplidor = "CodigoCompra";
$Rnc_Suplidor = $_GET["Codigo"];

$taNCF_cxp = "NCF_cxp";
$NCF_cxp = $_GET["NCF_606"];

$respuesta = ModeloCompras::mdlBorrarCompras606CXP($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taRnc_Suplidor, $Rnc_Suplidor, $taNCF_cxp, $NCF_cxp);


$tabla = "606_empresas";
 $id = "id";
 $id_606 = $id_registro606;

$borrar = Modelo606::mdlBorrar606($tabla, $id, $id_606);

if($respuesta == "ok"){

							echo '<script>
					swal({
						type: "success",
						title: "¡La Compra ha sido Borrada Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "compras";
								}

								});

					</script>';

						}
	
     }/*cierre isset*/

	}/*Cierre FUNCCION DE BORRAR VENTA*/	

static public function ctrAgregarretencionCompras(){
	
	if(isset($_POST["id_606_Retener"])){
/***********INICIO VALIDACION FECHA AÑOS MES**************************/

$url = $_SERVER["REQUEST_URI"];

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
									window.location = "reportecxp";
													
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
									window.location = "reportecxp";
													
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
									window.location = "reportecxp";
													
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
									window.location = "reportecxp";
													
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
									window.location = "reportecxp";
													
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
						window.location = "reportecxp";
													
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
									window.location = "reportecxp";
													
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
									window.location = "reportecxp";
													
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
}/*funcion*/

	
}/*CIERRE CLASES*/