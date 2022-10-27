<?php 


class ControladorBanco{

static public function ctrMostrarBanco($Rnc_Empresa_Banco){
    
      
      $tabla = "banco_empresas";
      $taRnc_Empresa_Banco = "Rnc_Empresa_Banco";
    
    $respuesta = ModeloBanco::mdlMostrarBanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco);

    return $respuesta; 

     }



     static public function ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria){

		$tabla = "subgenerica_empresas";
		$taRnc_Empresa_Cuentas = "Rnc_Empresa_Cuentas";
		$taid_grupo = "id_grupo";
		$taid_categoria = "id_categoria";

		$respuesta = ModeloBanco::mdlplanBanco($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas, $id_grupo, $taid_grupo, $id_categoria, $taid_categoria);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/

static public function ctrCrearBanco(){

	if(isset($_POST["plancuentabanco"]) || isset($_POST["NCuentaBancaria"])){

			$tabla = "banco_empresas";
			
			$taRnc_Empresa_Banco = "Rnc_Empresa_Banco";
			$Rnc_Empresa_Banco = $_POST["RncEmpresaBanco"];

			$taCampo = "id_subgenerica";
			$ValorCampo = $_POST["plancuentabanco"];
			
			$subgenerica = ModeloBanco::mdlvalidacionbanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco, $taCampo, $ValorCampo);
			var_dump($subgenerica);
			if($subgenerica != ""){

				if($subgenerica["Rnc_Empresa_Banco"] == $Rnc_Empresa_Banco && $subgenerica["id_subgenerica"] == $ValorCampo){

				echo '<script>
								swal({

									type: "error",
									title: "¡La Cuenta Contable ya esta Asignada a una Cuenta Bancaria!",
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
            $valorRncEmpresaEC = $_POST["RncEmpresaBanco"];

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
											title: "¡El Banco Se Guardo Correctamente!",
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


		}

	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/
static public function ctrAgregarotrosBanco(){

	if(isset($_POST["plancuentabanco"]) || isset($_POST["NCuentaBancaria"])){

			$tabla = "banco_empresas";
			
			$taRnc_Empresa_Banco = "Rnc_Empresa_Banco";
			$Rnc_Empresa_Banco = $_POST["RncEmpresaBanco"];

			$taCampo = "id_subgenerica";
			$ValorCampo = $_POST["plancuentabanco"];
			
			$subgenerica = ModeloBanco::mdlvalidacionbanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco, $taCampo, $ValorCampo);
			var_dump($subgenerica);
			if($subgenerica != ""){

				if($subgenerica["Rnc_Empresa_Banco"] == $Rnc_Empresa_Banco && $subgenerica["id_subgenerica"] == $ValorCampo){

				echo '<script>
								swal({

									type: "error",
									title: "¡La Cuenta Contable ya esta Asignada a una Cuenta Bancaria!",
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
            $valorRncEmpresaEC = $_POST["RncEmpresaBanco"];

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
											title: "¡El Banco Se Guardo Correctamente!",
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


		}

	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/

static public function ctrModalEditarBanco($id, $valorid){

	$tabla = "banco_empresas";

	$respuesta = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);

	return $respuesta;





}/*CIERRE FUNCICON DE EDITAR CATEGORIAS*/
static public function ctrEditarBanco(){

		if(isset($_POST["idBanco"]) || isset($_POST["Editar-NCuentaBancaria"])){

			if(isset($_POST["Editarplancuentabanco"])){
				$Editarplancuentabanco = $_POST["Editarplancuentabanco"];

			} else {

				$Editarplancuentabanco = $_POST["Editar-plancuentabanco"];


			}

			


			$tabla = "banco_empresas";
			
			$taRnc_Empresa_Banco = "Rnc_Empresa_Banco";
			$Rnc_Empresa_Banco = $_POST["Editar-RncEmpresaBanco"];

			$taCampo = "id_subgenerica";
			$ValorCampo = $Editarplancuentabanco;

			$id = "id";
			$idBanco = $_POST["idBanco"];
			
			$subgenericaBanco = ModeloBanco::mdlvalidacionbanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco, $taCampo, $ValorCampo);

			if($subgenericaBanco["id_subgenerica"] == $ValorCampo && $subgenericaBanco["id"] != $idBanco){
				echo '<script>
								swal({

									type: "error",
									title: "¡La Cuenta Contable ya esta Asignada a una Cuenta Bancaria!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "banco";
													
													});
												
								</script>';	
					exit;
				


			}



			$taCampo = "NumeroCuenta";
			$ValorCampo = $_POST["Editar-NCuentaBancaria"];


			$NCuentaBanco = ModeloBanco::mdlvalidacionbanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco, $taCampo, $ValorCampo);

			if($NCuentaBanco["NumeroCuenta"] == $ValorCampo && $NCuentaBanco["id"] != $idBanco){

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
            $valoridcuenta = $Editarplancuentabanco;
            $RncEmpresaEC = "Rnc_Empresa_cuentas";
            $valorRncEmpresaEC = $_POST["Editar-RncEmpresaBanco"];

             $Cuenta = ControladorContabilidad::ctreditarcuenta($RncEmpresaEC, $valorRncEmpresaEC, $idcuenta, $valoridcuenta);

              $id_grupo = $Cuenta["id_grupo"];
              $id_categoria = $Cuenta["id_categoria"];
              $id_generica = $Cuenta["id_generica"];
              $id_cuenta = $Cuenta["id_subgenerica"];
              $Nombre_CuentaContable = $Cuenta["Nombre_subCuenta"];
              $saldoInicial = floatval($_POST["Editar-saldoInicial"]);
              $saldoEstado = floatval($_POST["Editar-saldoEstado"]);        

			$Accion = "MODIFICADO";


			$datos = array("id" => $idBanco,
				"Rnc_Empresa_Banco" => $Rnc_Empresa_Banco,
				"id_subgenerica" => $Editarplancuentabanco,
				"id_grupo" => $id_grupo,
				"id_categoria" => $id_categoria,
				"id_generica" => $id_generica,
				"id_cuenta" => $id_cuenta,
				"Nombre_CuentaContable" => $Nombre_CuentaContable,
				"TipoCuenta" => $_POST["Editar-TipobancoCuenta"],
				"NumeroCuenta" => $_POST["Editar-NCuentaBancaria"],
				"Nombre_Cuenta" => $_POST["Editar-NombreCuenta"],
				"TelefonoBanco" => $_POST["Editar-TelefonoBanco"],
				"FechamesBanco" => $_POST["Editar-FechamesBanco"],
				"FechadiaBanco" => $_POST["Editar-FechadiaBanco"],
				"saldoInicial" => $saldoInicial,
				"saldoEstado" => $saldoEstado,
				"Usuario_Creador" => $_POST["Editar-UsuarioBanco"],
				"Accion" => $Accion);
				
			$respuesta = ModeloBanco::MdlEditarBanco($tabla, $datos);
			if($respuesta == "ok"){
											
											
											echo '<script>

										swal({
							
											type: "success",
											title: "¡El Banco Se Modifico Correctamente!",
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


		}

	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/
static public function ctrMostrarReporteLibroBanco($Rnc_Empresa_LD, $valorid_banco, $valorid_grupo, $valorid_categoria, $valorid_generica, $valorid_cuenta, $Ordenmes, $Ordendia, $periodolibrobanco){

	$tabla = "librodiario_empresas";
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$taid_banco = "id_banco";
	$taid_grupo = "id_grupo";
	$taid_categoria = "id_categoria";
	$taid_generica = "id_generica";
	$taid_cuenta = "id_cuenta";
              
	
	$respuesta = ModeloBanco::mdlMostrarRepoerteLibrobanco($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_banco, $valorid_banco, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta, $Ordenmes, $Ordendia, $periodolibrobanco);
	

		return $respuesta;

}

	static public function ctrMostrarLibroBanco($Rnc_Empresa_LD, $valorid_banco, $valorid_grupo, $valorid_categoria, $valorid_generica, $valorid_cuenta, $Ordenmes, $Ordendia){

	$tabla = "librodiario_empresas";
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$taid_banco = "id_banco";
	$taid_grupo = "id_grupo";
	$taid_categoria = "id_categoria";
	$taid_generica = "id_generica";
	$taid_cuenta = "id_cuenta";
              
	
	$respuesta = ModeloBanco::mdlMostrarLibrobanco($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_banco, $valorid_banco, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta, $Ordenmes, $Ordendia);
	

		return $respuesta;

}

static public function ctrEstatusConcialiacion(){

	if(isset($_POST["RncConciliacion"])){
		/*** INICIO DE ASIENTOS VACIOS***************/

		if(empty($_POST["listaConciliacion"])){

			echo '<script>
					swal({

						type: "error",
						title: "DEBE TENER POR LO MENOS UNA CUANTA A CONCILIAR!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{

						if(result.value){
								window.location = "conciliacion";
							}

							});

					</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/


		$tabla = "librodiario_empresas";
		$RncConciliacion = $_POST["RncConciliacion"];
		$Estado_Banco = 1;


		$listaConciliacion =  json_decode($_POST["listaConciliacion"], true);
	
		foreach ($listaConciliacion as $key => $value) {
	

			$datos = array("id" => $value["id"] ,
						"Rnc_Empresa_LD" => $RncConciliacion,
						"Fecha_AnoMes_Cobro" => $value["fechames"],
						"Fecha_dia_Cobro" => $value["fechadia"],
						"Estado_Banco" => $Estado_Banco,
						"Usuario_Creador" => $_POST["UsuarioConciliacion"]);

			$respuesta = ModeloBanco::mdlEstatusConcialiacion($tabla, $datos);

		}
		if($respuesta == "ok"){
											
											
											echo '<script>

										swal({
							
											type: "success",
											title: "¡El Banco Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "conciliacion";


													}

													});

										</script>';
										}/* CIERRO SI DE RESPUESTA */


	}


}/*CIERRE DE ESTATUS CONCIALIACION*/
static public function ctrRendirFondos(){

	if(isset($_POST["RncRendirFondos"])){
		/*** INICIO DE ASIENTOS VACIOS***************/

		if(empty($_POST["listaRedicion"])){

			echo '<script>
					swal({

						type: "error",
						title: "DEBE TENER POR LO MENOS UNA CUENTA A CONCILIAR!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{

						if(result.value){
								window.location = "rendiranticipos";
							}

							});

					</script>';
								exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/


		$tabla = "librodiario_empresas";
		$RncRendirFondos = $_POST["RncRendirFondos"];
		$Estado_Banco = 1;
		//$SaldoIncial = $_POST["SaldoInicial"];
		$Monto = $_POST["SaldoInicial"];
		$credito = 0;
		$debito = 0;


		$listaRedicion =  json_decode($_POST["listaRedicion"], true);
	
		foreach ($listaRedicion as $key => $value) {
			$credito = $credito + $value["credito"];
			$debito = $debito + $value["debito"];
			$Monto = $Monto + $value["credito"] - $value["debito"];

		$datos = array("id" => $value["id"] ,
						"Rnc_Empresa_LD" => $RncRendirFondos,
						"Fecha_AnoMes_Cobro" => $value["fechames"],
						"Fecha_dia_Cobro" => $value["fechadia"],
						"Estado_Banco" => $Estado_Banco,
						"Usuario_Creador" => $_POST["UsuarioConciliacion"]);

		$respuesta = ModeloBanco::mdlEstatusConcialiacion($tabla, $datos);

		}

			$id = "id";
            $valorid = $_POST["idbanco"];
            $Banco = ControladorBanco::ctrModalEditarBanco($id, $valorid);

        $Accion = "CREADO";
		$tabla = "rendirfondos_empresas";
		$datos = array("Rnc_Empresa_Anticipo" => $_POST["RncRendirFondos"],
						"NAsiento" => $_POST["NAsiento"],
						"id_banco" => $_POST["idbanco"],
						"id_grupo" => $Banco["id_grupo"],
						"id_categoria" => $Banco["id_categoria"],
						"id_generica" => $Banco["id_generica"],
						"id_cuenta" => $Banco["id_cuenta"],
						"Nombre_Cuenta" => $Banco["Nombre_Cuenta"],
						"Facturas" => $_POST["listaRedicion"],
						"SaldoInicial" => $_POST["SaldoInicial"],
						"Fecha_AnoMes" => $_POST["FechaFacturames"],
						"Fecha_dia" => $_POST["FechaFacturadia"],
						"credito" => $credito,
						"debito" => $debito,
						"Monto" => $Monto,
						"Descripcion" => $_POST["Descripcion"],
						"Estado" => $_POST["EstadoFondo"],
						"Responsable" => $_POST["UsuarioConciliacion"],
						"Accion" => $Accion);
		$respuesta = ModeloBanco::mdlRendirFondos($tabla, $datos);
		
		if($respuesta == "ok"){

			$tabla = "correlativos_no_fiscal";

			$Tipo_NCF = "RDF";
			
			
			$datos = array("Rnc_Empresa" => $_POST["RncRendirFondos"],
					"Tipo_NCF" => $Tipo_NCF,
					"NCF_Cons" =>  $_POST["CodAsiento"]);

			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);

			echo '	
				<script>

					swal({
							
						type: "success",
						title: "¡El Fondo de Anticipo Se Guardo Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{

						if(result.value){
							window.location = "rendiranticipos";


						}

						});

										</script>';
									


		}/* CIERRO SI DE RESPUESTA */


	}


}/*CIERRE DE ESTATUS CONCIALIACION*/
static public function ctrEditarRendirFondos(){

	if(isset($_POST["RncRendirFondos"])){
		/*** INICIO DE ASIENTOS VACIOS***************/

		if(empty($_POST["listaRedicion"]) || $_POST["listaRedicion"] == "[]"){

			echo '<script>
					swal({

						type: "error",
						title: "DEBE TENER POR LO MENOS UNA CUENTA A CONCILIAR!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{

						if(result.value){
								window.location = "rendiranticipos";
							}

							});

					</script>';
			exit;

				
			}
		/* FIN VALIDACION DE ASIENTOS VACIOS ************/
		/*reversar diario*/
			$tabla = "rendirfondos_empresas";
			$id = "id";
            $valorid = $_POST["idRendido"];
             

	$anticipo = ModeloAnticipo::mdlEditarAnticipo($tabla, $id, $valorid);
	
$listaRedicionAntes =  json_decode($anticipo["Facturas"], true);

$tabla = "librodiario_empresas";
foreach ($listaRedicionAntes as $a => $value){
			
		$Estado_Banco = 2;
		$datos = array("id" => $value["id"],
						"Rnc_Empresa_LD" => $_POST["RncRendirFondos"],
						"Fecha_AnoMes_Cobro" => $value["fechames"],
						"Fecha_dia_Cobro" => $value["fechadia"],
						"Estado_Banco" => $Estado_Banco,
						"Usuario_Creador" => $_POST["UsuarioConciliacion"]);

		$respuesta = ModeloBanco::mdlEstatusConcialiacion($tabla, $datos);
}
		$tabla = "librodiario_empresas";
		$RncRendirFondos = $_POST["RncRendirFondos"];
		$Estado_Banco = 1;
		//$SaldoIncial = $_POST["SaldoInicial"];
		$Monto = $_POST["SaldoInicial"];
		$credito = 0;
		$debito = 0;


		$listaRedicion =  json_decode($_POST["listaRedicion"], true);
	
		foreach ($listaRedicion as $key => $value) {
			$credito = $credito + $value["credito"];
			$debito = $debito + $value["debito"];
			$Monto = $Monto + $value["credito"] - $value["debito"];

		$datos = array("id" => $value["id"] ,
						"Rnc_Empresa_LD" => $RncRendirFondos,
						"Fecha_AnoMes_Cobro" => $value["fechames"],
						"Fecha_dia_Cobro" => $value["fechadia"],
						"Estado_Banco" => $Estado_Banco,
						"Usuario_Creador" => $_POST["UsuarioConciliacion"]);

		$respuesta = ModeloBanco::mdlEstatusConcialiacion($tabla, $datos);

		}

	$tabla = "banco_empresas";
	$id = "id";
    $valorid = $_POST["idbanco"];
    $Banco = ModeloBanco::mdlModalEditarBanco($tabla, $id, $valorid);

    $Accion = "EDITADO";
	$tabla = "rendirfondos_empresas";
	$datos = array("id" => $_POST["idRendido"],
					"Rnc_Empresa_Anticipo" => $_POST["RncRendirFondos"],
					"NAsiento" => $_POST["NAsiento"],
					"id_banco" => $_POST["idbanco"],
					"id_grupo" => $Banco["id_grupo"],
					"id_categoria" => $Banco["id_categoria"],
					"id_generica" => $Banco["id_generica"],
					"id_cuenta" => $Banco["id_cuenta"],
					"Nombre_Cuenta" => $Banco["Nombre_Cuenta"],
					"SaldoInicial" => $_POST["SaldoInicial"],
					"Facturas" => $_POST["listaRedicion"],
					"Fecha_AnoMes" => $_POST["FechaFacturames"],
					"Fecha_dia" => $_POST["FechaFacturadia"],
					"credito" => $credito,
					"debito" => $debito,
					"Monto" => $Monto,
					"Descripcion" => $_POST["Descripcion"],
					"Estado" => $_POST["EstadoFondo"],
					"Responsable" => $_POST["UsuarioConciliacion"],
					"Accion" => $Accion);
		$respuesta = ModeloBanco::mdlEditarRendirFondos($tabla, $datos);
		
		

if($respuesta == "ok"){

			
			echo '	
				<script>

					swal({
							
						type: "success",
						title: "¡El Fondo de Anticipo Se Guardo Correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
						}).then((result)=>{

						if(result.value){
							window.location = "reporteranticiposrendidos";


						}

						});

										</script>';
									

		}/* CIERRO SI DE RESPUESTA */
		
	}


}/*CIERRE DE ESTATUS CONCIALIACION*/
static public function ctrDisponibilidad($Rnc_Empresa_DF, $id_banco){

	$tabla = "disponibilidad_empresas";
	$taRnc_Empresa_DF = "Rnc_Empresa_DF";
	$taid_banco = "id_banco";
	
              
	
	$respuesta = ModeloBanco::mdlDisponibilidad($tabla, $taRnc_Empresa_DF, $Rnc_Empresa_DF, $taid_banco, $id_banco);
	

		return $respuesta;

}


static public function ctrCrearDisponibilidad(){

	if(isset($_POST["Rnc_Empresa_DF"])){

			$tabla = "disponibilidad_empresas";
			
			$taRnc_Empresa_DF = "Rnc_Empresa_DF";
			$Rnc_Empresa_DF = $_POST["Rnc_Empresa_DF"];

			$taid_banco = "id_banco";
			$id_banco = $_POST["id_banco"];

			$taFecha = "Fecha";
			$Fecha = $_POST["Fecha"];

			$saldofinalLD = $_POST["saldoInicial"];
			$saldofinalEC = $_POST["saldoEstado"];

			$saldoInicial = bcdiv($saldofinalLD, '1', 2);
			$saldoEstado = bcdiv($saldofinalEC, '1', 2);
		
			$Disponibilidad = ModeloBanco::mdlFechaDisponibilidad($tabla, $taRnc_Empresa_DF, $Rnc_Empresa_DF, $taid_banco, $id_banco, $taFecha, $Fecha);

			if(!$Disponibilidad){

			
			$datos = array("Rnc_Empresa_DF" => $_POST["Rnc_Empresa_DF"], 
			"id_banco" => $_POST["id_banco"], 
			"Fecha" => $_POST["Fecha"], 
			"saldoInicial" => $saldoInicial, 
			"saldoEstado" => $saldoEstado);

			$respuesta = ModeloBanco::MdlCrearDisponibilidad($tabla, $datos);

			if($respuesta == "ok"){
											
											
											echo '<script>

										swal({
							
											type: "success",
											title: "¡El Banco Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "disponibilidad";


													}

													});

										</script>';
										}/* CIERRO SI DE RESPUESTA */


	



			
			}else{

			$datos = array("Rnc_Empresa_DF" => $_POST["Rnc_Empresa_DF"], 
			"id_banco" => $_POST["id_banco"], 
			"Fecha" => $_POST["Fecha"], 
			"saldoInicial" => $saldoInicial, 
			"saldoEstado" => $saldoEstado);

			$respuesta = ModeloBanco::MdlEditarDisponibilidad($tabla, $datos);
			if($respuesta == "ok"){
											
											
											echo '<script>

										swal({
							
											type: "success",
											title: "¡El Banco Se Guardo Correctamente!",
											showConfirmButton: true,
											confirmButtonText: "Cerrar",
											closeOnConfirm: false
												}).then((result)=>{

													if(result.value){
														window.location = "disponibilidad";


													}

													});

										</script>';
										}/* CIERRO SI DE RESPUESTA */






			}

		

}/*cierre isset*/	



	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/








}/*CIERRO CLASES DE PRODUCTOS*/
