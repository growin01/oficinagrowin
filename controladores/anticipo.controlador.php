<?php 

class ControladorAnticipo{

	 static public function ctrMostrarAnticipo($datos){

    	$tabla = "banco_empresas";
    	

		$respuesta = ModeloAnticipo::mdlMostrarAnticipo($tabla, $datos);

		return $respuesta;

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/
    static public function ctrEditarAnticipo($id, $valorid){

	$tabla = "rendirfondos_empresas";

	$respuesta = ModeloAnticipo::mdlEditarAnticipo($tabla, $id, $valorid);

	return $respuesta;





}/*CIERRE FUNCICON DE EDITAR CATEGORIAS*/
   
    
	static public function ctrCrearAnticipo(){

	if(isset($_POST["plancuentabanco"]) || isset($_POST["NCuentaBancaria"])){
			$tabla = "banco_empresas";
			
			$taRnc_Empresa_Banco = "Rnc_Empresa_Banco";
			$Rnc_Empresa_Banco = $_POST["RncEmpresaAnticipo"];

			$taCampo = "id_subgenerica";
			$ValorCampo = $_POST["plancuentabanco"];
			
			$subgenerica = ModeloBanco::mdlvalidacionbanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco, $taCampo, $ValorCampo);
			
			if($subgenerica != ""){

				if($subgenerica["Rnc_Empresa_Banco"] == $Rnc_Empresa_Banco && $subgenerica["id_subgenerica"] == $ValorCampo){

				echo '<script>
								swal({

									type: "error",
									title: "¡La Cuenta Contable ya esta Asignada a un Fondo de Anticipo!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "banco";
													
													});
												
								</script>';

			exit;
			
			}
			}

			$taCampo = "NumeroCuenta";
			$ValorCampo = $_POST["NCuentaBancaria"];

			$NCuentaBanco = ModeloBanco::mdlvalidacionbanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco, $taCampo, $ValorCampo);

			if($NCuentaBanco != false){

				echo '<script>
								swal({

									type: "error",
									title: "¡El Numero de Cuenta Bancaria ya esta Registrado!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "banco";
													
													});
												
								</script>';	
					
			 exit;
			

			}


			$idcuenta = "id";
            $valoridcuenta = $_POST["plancuentabanco"];
            $RncEmpresaEC = "Rnc_Empresa_cuentas";
            $valorRncEmpresaEC = $_POST["RncEmpresaAnticipo"];

             $Cuenta = ControladorContabilidad::ctreditarcuenta($RncEmpresaEC, $valorRncEmpresaEC, $idcuenta, $valoridcuenta);

              $id_grupo = $Cuenta["id_grupo"];
              $id_categoria = $Cuenta["id_categoria"];
              $id_generica = $Cuenta["id_generica"];
              $id_cuenta = $Cuenta["id_subgenerica"];
              $Nombre_CuentaContable = $Cuenta["Nombre_subCuenta"];
              $saldoInicial = floatval($_POST["saldoInicial"]);
              $saldoEstado = floatval($_POST["saldoEstado"]);      
			
			  $Accion = "CREADO";


			$datos = array("Rnc_Empresa_Banco" => $Rnc_Empresa_Banco,
				"id_subgenerica" => $_POST["plancuentabanco"],
				"id_grupo" => $id_grupo,
				"id_categoria" => $id_categoria,
				"id_generica" => $id_generica,
				"id_cuenta" => $id_cuenta,
				"Nombre_CuentaContable" => $Nombre_CuentaContable,
				"TipoCuenta" => $_POST["tipobancoCuenta"],
				"NumeroCuenta" => $_POST["NCuentaBancaria"],
				"Nombre_Cuenta" => $_POST["NombreCuenta"],
				"TelefonoBanco" => $_POST["TelefonoBanco"],
				"FechamesBanco" => $_POST["FechamesBanco"],
				"FechadiaBanco" => $_POST["FechadiaBanco"],
				"saldoInicial" => $saldoInicial,
				"saldoEstado" => $saldoEstado,
				"Usuario_Creador" => $_POST["UsuarioBanco"],
				"Accion" => $Accion);
				
			$respuesta = ModeloBanco::MdlCrearBanco($tabla, $datos);
			if($respuesta == "ok"){
											
											
				echo '<script>

						swal({
							
											type: "success",
											title: "¡El Anticipo Se Creo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "banco";


													}

													});

										</script>';
										}/* CIERRO SI DE RESPUESTA */



		

			
		}/*cierre isset*/

	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/
static function ctrOtorgarAnticipo(){

	if(isset($_POST["idOtorgarAnticipa"])){

		

		
		/***INICIO VALIDACION QUE EL ASIENTO NO SE REPITA***/

				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa= $_POST["RncEmpresanticipo"];
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
									window.location = "anticipos";
													
													});
												
								</script>';		



				exit;

				}
		}
		/* FIN VALIDACION QUE LA FACUTRA NO SE REPITA */

		
	if(!(preg_match('/^[0-9]+$/', $_POST["FechamesAnticipo"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "anticipos";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechadiaAnticipo"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "anticipos";
													
									});
												
								</script>';	
					exit;	
	} 
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/
	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechamesAnticipo"], 0, 4);
	$fechames = substr($_POST["FechamesAnticipo"], -2);

	if(strlen($_POST["FechamesAnticipo"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "anticipos";
													
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
									window.location = "anticipos";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano > 2026){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser menor a 2022!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "anticipos";
													
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
									window.location = "anticipos";
													
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
									window.location = "anticipos";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechadiaAnticipo"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "anticipos";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechadiaAnticipo"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "anticipos";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechadiaAnticipo"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "anticipos";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/
/*asiento de banco*/

			/*****consultar banco*****/
			$tabla = "banco_empresas";
			$id = "id";
			$valorid = $_POST["agregarBanco"];

             $banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
             
             if($banco != false){
             	$id_banco = $banco["id"];
             	$id_grupo = $banco["id_grupo"];
				$id_categoria = $banco["id_categoria"];
				$id_generica = $banco["id_generica"];
				$id_cuenta = $banco["id_cuenta"];
				$Nombre_Cuenta = $banco["Nombre_CuentaContable"];


             }else{
             	$id_banco = 0;


             }
			

/*******consulta proyecto*********/
if($_POST["Contabilidad"] == 1){


	$idproyecto = "NO APLICA";
	$codproyecto = "NO APLICA"; 
	
	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DOA";
	$Transaccion = 1;
	$Accion = "CREADA";
	$debito = 0;
	$credito = bcdiv($_POST["MontoAnticipo"], '1', 2);

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresanticipo"],
					"id_registro" => $_POST["idOtorgarAnticipa"],
					"Rnc_Factura" => $_POST["RncAnticipo"],
					"NCF" => $_POST["NAsiento"],
					"Nombre_Empresa" => $_POST["Nombre_Cuenta"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $id_grupo,
					"id_categoria" => $id_categoria,
					"id_generica" => $id_generica,
					"id_cuenta" => $id_cuenta,
					"Nombre_Cuenta" => $Nombre_Cuenta,
					"Fecha_AnoMes_LD" => $_POST["FechamesAnticipo"],
					"Fecha_dia_LD" => $_POST["FechadiaAnticipo"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion,
					"Fecha_AnoMes_Trans" => $_POST["FechamesAnticipo"],
					"Fecha_dia_Trans" => $_POST["FechadiaAnticipo"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

/*asiento de fondo de anticipo*/

			/*****consultar banco*****/
			$tabla = "banco_empresas";
			$id = "id";
			$valorid = $_POST["plancuentabanco"];

             $banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
             
             if($banco != false){
             	$id_banco = $banco["id"];
             	$id_grupo = $banco["id_grupo"];
				$id_categoria = $banco["id_categoria"];
				$id_generica = $banco["id_generica"];
				$id_cuenta = $banco["id_cuenta"];
				$Nombre_Cuenta = $banco["Nombre_CuentaContable"];


             }else{
             	$id_banco = 0;


             }
			

/*******consulta proyecto*********/
	
	$idproyecto = "NO APLICA";
	$codproyecto = "NO APLICA"; 
	
	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DOA";
	$Transaccion = 1;
	$Accion = "CREADA";
	$debito = bcdiv($_POST["MontoAnticipo"], '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresanticipo"],
					"id_registro" => $_POST["idOtorgarAnticipa"],
					"Rnc_Factura" => $_POST["RncAnticipo"],
					"NCF" => $_POST["NAsiento"],
					"Nombre_Empresa" => $_POST["Nombre_Cuenta"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $id_grupo,
					"id_categoria" => $id_categoria,
					"id_generica" => $id_generica,
					"id_cuenta" => $id_cuenta,
					"Nombre_Cuenta" => $Nombre_Cuenta,
					"Fecha_AnoMes_LD" => $_POST["FechamesAnticipo"],
					"Fecha_dia_LD" => $_POST["FechadiaAnticipo"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion,
					"Fecha_AnoMes_Trans" => $_POST["FechamesAnticipo"],
					"Fecha_dia_Trans" => $_POST["FechadiaAnticipo"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
}

		
		
		if($respuesta == "ok"){

/**************************************ACTUALIZAR CORRELATIVOS********************/
			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "DOA";
			
			
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresanticipo"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" =>  $_POST["CodAsiento"]);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);
									
	if($respuesta == "ok"){
		echo '<script>
						swal({			
							type: "success",
							title: "¡El Registro del Fondo de anticipo se Guardo Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "anticipos";
							}
							});
						</script>';

	}	
}


	}/*CIERRE DE ISSET*/


}/*CIERRE DE FUNCION ctringresodiario*/
static function ctrEditarOtorgarAnticipo(){

if(isset($_POST["EditaridOtorgarAnticipa"])){

	
		
	if(!(preg_match('/^[0-9]+$/', $_POST["FechamesAnticipo"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporteanticipos";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechadiaAnticipo"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporteanticipos";
													
									});
												
								</script>';	
					exit;	
	} 
			
	/***********FIN VALIDACION DE PREMACHT DE INPUT***********************/
	/***********INICIO VALIDACION FECHA AÑOS MES**************************/

	$fechaano = substr($_POST["FechamesAnticipo"], 0, 4);
	$fechames = substr($_POST["FechamesAnticipo"], -2);

	if(strlen($_POST["FechamesAnticipo"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporteanticipos";
													
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
									window.location = "reporteanticipos";
													
													});
												
								</script>';	
					exit;
	}
	if($fechaano > 2026){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año debe ser menor a 2022!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporteanticipos";
													
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
									window.location = "reporteanticipos";
													
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
									window.location = "reporteanticipos";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/

	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechadiaAnticipo"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "reporteanticipos";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechadiaAnticipo"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporteanticipos";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechadiaAnticipo"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "reporteanticipos";
													
													});
												
								</script>';	
					exit;
	}

	$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_POST["EditaridOtorgarAnticipa"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_POST["RncEmpresanticipo"];

	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_POST["RncAnticipo"];


	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DOA";

	 
	$taNAsiento = "NAsiento";
	$NAsiento = $_POST["NAsiento"];

	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}



	/**********FIN VALIDACION FECHA DIA ******************************/
/*asiento de banco*/

			/*****consultar banco*****/
			$tabla = "banco_empresas";
			$id = "id";
			$valorid = $_POST["agregarBanco"];

             $banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
             
             if($banco != false){
             	$id_banco = $banco["id"];
             	$id_grupo = $banco["id_grupo"];
				$id_categoria = $banco["id_categoria"];
				$id_generica = $banco["id_generica"];
				$id_cuenta = $banco["id_cuenta"];
				$Nombre_Cuenta = $banco["Nombre_CuentaContable"];


             }else{
             	$id_banco = 0;


             }
			

/*******consulta proyecto*********/
if($_POST["Contabilidad"] == 1){


	$idproyecto = "NO APLICA";
	$codproyecto = "NO APLICA"; 
	
	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DOA";
	$Transaccion = 1;
	$Accion = "EDITADO";
	$debito = 0;
	$credito = bcdiv($_POST["MontoAnticipo"], '1', 2);

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresanticipo"],
					"id_registro" => $_POST["EditaridOtorgarAnticipa"],
					"Rnc_Factura" => $_POST["RncAnticipo"],
					"NCF" => $_POST["NAsiento"],
					"Nombre_Empresa" => $_POST["Nombre_Cuenta"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $id_grupo,
					"id_categoria" => $id_categoria,
					"id_generica" => $id_generica,
					"id_cuenta" => $id_cuenta,
					"Nombre_Cuenta" => $Nombre_Cuenta,
					"Fecha_AnoMes_LD" => $_POST["FechamesAnticipo"],
					"Fecha_dia_LD" => $_POST["FechadiaAnticipo"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion,
					"Fecha_AnoMes_Trans" => $_POST["FechamesAnticipo"],
					"Fecha_dia_Trans" => $_POST["FechadiaAnticipo"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

/*asiento de fondo de anticipo*/

			/*****consultar banco*****/
			$tabla = "banco_empresas";
			$id = "id";
			$valorid = $_POST["plancuentabanco"];

             $banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);
             
             if($banco != false){
             	$id_banco = $banco["id"];
             	$id_grupo = $banco["id_grupo"];
				$id_categoria = $banco["id_categoria"];
				$id_generica = $banco["id_generica"];
				$id_cuenta = $banco["id_cuenta"];
				$Nombre_Cuenta = $banco["Nombre_CuentaContable"];


             }else{
             	$id_banco = 0;


             }
			

/*******consulta proyecto*********/
	
	$idproyecto = "NO APLICA";
	$codproyecto = "NO APLICA"; 
	
	$tabla = "librodiario_empresas";
	$ObservacionesLD = $_POST["Descripcion"];
	$Extraer_NAsiento = "DOA";
	$Transaccion = 1;
	$Accion = "EDITADO";
	$debito = bcdiv($_POST["MontoAnticipo"], '1', 2);
	$credito = 0;

	$datos = array("Rnc_Empresa_LD" => $_POST["RncEmpresanticipo"],
					"id_registro" => $_POST["EditaridOtorgarAnticipa"],
					"Rnc_Factura" => $_POST["RncAnticipo"],
					"NCF" => $_POST["NAsiento"],
					"Nombre_Empresa" => $_POST["Nombre_Cuenta"],
					"NAsiento" => $_POST["NAsiento"],
					"id_grupo" => $id_grupo,
					"id_categoria" => $id_categoria,
					"id_generica" => $id_generica,
					"id_cuenta" => $id_cuenta,
					"Nombre_Cuenta" => $Nombre_Cuenta,
					"Fecha_AnoMes_LD" => $_POST["FechamesAnticipo"],
					"Fecha_dia_LD" => $_POST["FechadiaAnticipo"],
					"id_Proyecto" => $idproyecto,
					"CodigoProyecto" => $codproyecto,
					"debito" => $debito,
					"credito" => $credito,
					"ObservacionesLD" => $ObservacionesLD,
					"Extraer_NAsiento" => $Extraer_NAsiento,
					"Tipo_Transaccion" => $Transaccion,
					"Fecha_AnoMes_Trans" => $_POST["FechamesAnticipo"],
					"Fecha_dia_Trans" => $_POST["FechadiaAnticipo"],
					"id_banco" => $id_banco,
					"referencia" => $_POST["Referencia"],
					"Usuario_Creador" => $_POST["UsuarioLogueado"],
					"Accion" => $Accion);

	$respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
}

		
		if($respuesta == "ok"){
		echo '<script>
						swal({			
							type: "success",
							title: "¡El Registro del Fondo de anticipo se Guardo Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "reporteanticipos";
							}
							});
						</script>';

	}	
	

	}/*CIERRE DE ISSET*/


}/*CIERRE DE FUNCION ctringresodiario*/

static public function ctrEliminarOtorgarAnticipo(){
if(isset($_GET["eliminarOtorgar"]) && isset($_GET["Rnc_Factura"])){
			
$tabla = "librodiario_empresas";
	
	$taid_registro = "id_registro";
	$id_registro = $_GET["id_registro"];

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $_GET["Rnc_Empresa_LD"];

	$taRnc_Factura = "Rnc_Factura";
	$Rnc_Factura = $_GET["Rnc_Factura"];


	$taExtraer = "Extraer_NAsiento";
	$Extraer = "DOA";

	 
	$taNAsiento = "NAsiento";
	$NAsiento = $_GET["NAsiento"];

	$respuesta = ModeloDiario::mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento);

	
	
	foreach ($respuesta as $key => $value){
		$valorid = $value["id"];


		$borrar = ModeloDiario::mdlBorrarAsientos($tabla, $valorid);

		
	}
				
				if($borrar == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Otorgamiento de Anticipo se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "reporteanticipos";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/
		}
	}
static public function ctrEliminarAnticipo(){
    
    if(isset($_GET["idRendidoEliminar"])){

    	/*reversar diario*/
			$tabla = "rendirfondos_empresas";
			$id = "id";
            $valorid = $_GET["idRendidoEliminar"];
             

	$anticipo = ModeloAnticipo::mdlEditarAnticipo($tabla, $id, $valorid);
	
$listaRedicionAntes =  json_decode($anticipo["Facturas"], true);


$tabla = "librodiario_empresas";
foreach ($listaRedicionAntes as $a => $value){
			
		$Estado_Banco = 2;
		$datos = array("id" => $value["id"],
						"Rnc_Empresa_LD" => $_GET["RncRendirFondos"],
						"Fecha_AnoMes_Cobro" => $value["fechames"],
						"Fecha_dia_Cobro" => $value["fechadia"],
						"Estado_Banco" => $Estado_Banco,
						"Usuario_Creador" =>$_GET["UsuarioConciliacion"]);

		$respuesta = ModeloBanco::mdlEstatusConcialiacion($tabla, $datos);

}

$tabla = "rendirfondos_empresas";
$id = "id";
$valorid = $_GET["idRendidoEliminar"];
$repuesta = ModeloAnticipo::MdlEliminarAnticipo($tabla, $id, $valorid);

      if($repuesta == "ok"){
      	echo '<script>
						swal({			
							type: "success",
							title: "¡El Registro del Fondo de anticipo se Borro Correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
							}).then((result)=>{
						if(result.value){
							window.location = "reporteranticiposrendidos";
							}
							});
						</script>';




      }
    

  }/*cierra el si de isset get*/
    

  }/*CIERRA FUNCION borrar USUARIO*/  


	

}/*CIERRE DE la CLASE CATEGORIAS*/
      



 