<?php 


class ControladorSuplidores{

	/*INICIO DE CREAR CLIENTE*/

	static public function ctrCrearSuplidor(){

		if(isset($_POST["nuevoSuplidor"])){

if((strlen($_POST["nuevoDocumentoIdsuplidor"]) == 9 || strlen($_POST["nuevoDocumentoIdsuplidor"] == 11)) && $_POST["nuevoSuplidor"] != ""){ 

			   	$tabla = "growin_dgii";
					$taRnc_Growin_DGII = "Rnc_Growin_DGII";
					$ValorRnc_Growin_DGII = $_POST["nuevoDocumentoIdsuplidor"];
					$ValorNombreGrowin_DGII = $_POST["nuevoSuplidor"];
					$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

if($growin_Dgii != false && $growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
						
		$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

		$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);



}
else if ($growin_Dgii != false &&  $growin_Dgii["Rnc_Growin_DGII"] == $ValorRnc_Growin_DGII){
				
		$_POST["nuevoSuplidor"] = $growin_Dgii["Nombre_Empresa_Growin"];



		}

}


			$tabla = "suplidor_empresas";
			   		
			   if (($_POST["Tipo_Suplidor"] == 1 && strlen($_POST["nuevoDocumentoIdsuplidor"]) != 9) || ($_POST["Tipo_Suplidor"] == 2 && strlen($_POST["nuevoDocumentoIdsuplidor"]) != 11)){

						   		echo'<script>

								swal({
									  type: "error",
									  title: "¡El Número de caracteres NO Coninciden con el tipo de Suplidor, Recuerde si es Júridico el RNC Debe ser 9 Caracteres, si es Físico debe tener 11!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result){
										if (result.value) {

										window.location = "suplidores";

										}
									})

						  	</script>'; 


						  	exit;

						   	} 


						   
			$Estado = "Creado";

			$datos = array("Rnc_Empresa_Suplidor" => $_POST["RncEmpresasuplidor"], 
				"Tipo_Suplidor" => $_POST["Tipo_Suplidor"], 
				"Nombre_Suplidor" => $_POST["nuevoSuplidor"], 
				"Documento_Suplidor" => $_POST["nuevoDocumentoIdsuplidor"],  
				"Email" => $_POST["nuevoEmailSuplidor"],  
				"Telefono" => $_POST["nuevoTelefonoSuplidor"], 
				"Direccion" => $_POST["nuevaDireccionSuplidor"], 
				"Usuario_Creador" => $_POST["Usuariologueado"], 
				"Estado" => $Estado);


						   $respuesta = ModeloSuplidores::mdlCrearsuplidor($tabla, $datos);
						   
						   if ($respuesta == "ok") {
						   		$ModuloSuplidor = $_POST["ModuloSuplidor"];

							   	switch ($ModuloSuplidor) {
							   		case 'usuarios':
							   			echo'<script>

									swal({
										  type: "success",
										  title: "¡El suplidor se ha Registrado Correctamente!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {

											window.location = "usuarios";

											}
										})

							  	</script>';
							   			
							   		break;
							   		case 'suplidores':
							   			echo'<script>

									swal({
										  type: "success",
										  title: "¡El suplidor se ha Registrado Correctamente!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {

											window.location = "suplidores";

											}
										})

							  	</script>';
							   			
							   		break;
							   		case 'clientes':
							   			echo'<script>

									swal({
										  type: "success",
										  title: "¡El suplidor se ha Registrado Correctamente!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {

											window.location = "clientes";

											}
										})

							  	</script>';
							   			
							   		break;
							   		case 'crear-compra-inventario':
							   			echo'<script>

									swal({
										  type: "success",
										  title: "¡El suplidor se ha Registrado Correctamente!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {

											window.location = "crear-compra-inventario";

											}
										})

							  	</script>';
							   			
							   		break;
							   		case 'crear-compra-gastosgenerales':
							   			echo'<script>

									swal({
										  type: "success",
										  title: "¡El suplidor se ha Registrado Correctamente!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {

											window.location = "crear-compra-gastosgenerales";

											}
										})

							  	</script>';
							   			
							   		break;
							   		case 'crear-compra-gastosgeneralesNo':
							   			echo'<script>

									swal({
										  type: "success",
										  title: "¡El suplidor se ha Registrado Correctamente!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {

											window.location = "crear-compra-gastosgeneralesNo";

											}
										})

							  	</script>';
							   			
							   		break;
							   		case 'gastodiario':
							   			echo'<script>

									swal({
										  type: "success",
										  title: "¡El suplidor se ha Registrado Correctamente!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											if (result.value) {

											window.location = "gastodiario";

											}
										})

							  	</script>';
							   			
							   		break;
							   		
							   		case 'registro-606':
							   			echo'<script>

									swal({
										  type: "success",
										  title: "¡El suplidor se ha Registrado Correctamente!",
										  showConfirmButton: true,
										  confirmButtonText: "Cerrar"
										  }).then(function(result){
											
										})

							  	</script>';
							   			
							   		break;
							   		
							   	
							   		
							   	}

							   
						   	
						   } /*CIERRE DE SI DE RESPUESTA*/

						 
		
		}/*CIERRE DE ISSET*/


	}/*CIERRE DE FUNCTION CREAR Suplidor*/


	/**************************************************
	MOSTRAR SUPLIDORES
	***************************************************/
	static public function ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor){

			$tabla = "suplidor_empresas";
			$taRncEmpresaSuplidores = "Rnc_Empresa_Suplidor";

		$respuesta = ModeloSuplidores::mdlMostrarSuplidores($tabla, $taRncEmpresaSuplidores, $Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

		return $respuesta;



	}

	static public function ctrEditarSuplidor(){

		if(isset($_POST["idsuplidor"])){

	if((strlen($_POST["EditarDocumentoIdsuplidor"]) == 9 || strlen($_POST["EditarDocumentoIdsuplidor"] == 11)) && $_POST["EditarSuplidor"] != ""){ 


			   		$tabla = "growin_dgii";
					$taRnc_Growin_DGII = "Rnc_Growin_DGII";
					$ValorRnc_Growin_DGII = $_POST["EditarDocumentoIdsuplidor"];
					$ValorNombreGrowin_DGII = $_POST["EditarSuplidor"];
					$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
			$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, 
				"Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

			$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);



	}
else if ($growin_Dgii != false &&  $growin_Dgii["Rnc_Growin_DGII"] == $ValorRnc_Growin_DGII){
				
		$_POST["EditarSuplidor"] = $growin_Dgii["Nombre_Empresa_Growin"];



	}
}

if ($_POST["EditarTipo_Suplidor"] == 1 && strlen($_POST["EditarDocumentoIdsuplidor"]) != 9) {


			   		echo'<script>

					swal({
						  type: "error",
						  title: "¡El Número de caracteres NO Coninciden con el tipo de Suplidor, Recuerde si es Júridico el RNC Debe ser 9 Caracteres, si es Físico debe tener 11!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "suplidores";

							}
						})

			  	</script>'; 

			  	exit;


			   	} 
if ($_POST["EditarTipo_Suplidor"] == 2 && strlen($_POST["EditarDocumentoIdsuplidor"]) != 11){
	echo'<script>

					swal({
						  type: "error",
						  title: "¡El Número de caracteres NO Coninciden con el tipo de Suplidor, Recuerde si es Júridico el RNC Debe ser 9 Caracteres, si es Físico debe tener 11!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "suplidores";

							}
						})

			  	</script>'; 

			  	exit;



}


			   	$tabla = "suplidor_empresas";
			   	$Estado = "Editado";

			   
			   $datos = array("id" => $_POST["idsuplidor"], "Rnc_Empresa_Suplidor" => $_POST["RncEmpresasuplidor"], "Tipo_Suplidor" => $_POST["EditarTipo_Suplidor"], "Nombre_Suplidor" => $_POST["EditarSuplidor"], "Documento_Suplidor" => $_POST["EditarDocumentoIdsuplidor"],  "Email" => $_POST["EditarEmailSuplidor"],  "Telefono" => $_POST["EditarTelefonoSuplidor"], "Direccion" => $_POST["EditarDireccionSuplidor"], "Usuario_Creador" => $_POST["Usuariologueado"], "Estado" => $Estado);

			   $respuesta = ModeloSuplidores::mdlEditarsuplidor($tabla, $datos);

/*************************** CAMBIO DE 606 SUPLIDORES CAMBIO DE 606 SUPLIDORES *****************/
			   $tabla = "606_empresas";
			   $taRncEmpresa606 = "Rnc_Empresa_606";
			   $Rnc_Empresa_606 = $_POST["RncEmpresasuplidor"];
			   $taRnc_Factura_606 = "Rnc_Factura_606";
			   $Rnc_Factura_606 = $_POST["DocumentoAnterior"];
			  
			   $registro606 = Modelo606::mdlMostrar606Suplidores($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606);

			   

			   foreach ($registro606 as $key => $value) {

			  	$datos = array("id" => $value["id"],
			   	"Rnc_Empresa_606" => $_POST["RncEmpresasuplidor"],
			   	"Rnc_Factura_606" => $_POST["EditarDocumentoIdsuplidor"],
			   	"Tipo_Id_Factura_606" => $_POST["EditarTipo_Suplidor"],
			   	"Nombre_Empresa_606" => $_POST["EditarSuplidor"]);

			  		$respuesta = Modelo606::mdlUdate606Suplidores($tabla, $datos);

			   
			   }
/*************************** CAMBIO DE COMPRAS SUPLIDORES *****************/

			   $tabla = "compras_empresas";
			   $taRncEmpresaCompras = "Rnc_Empresa_Compras";
			   $taid_Suplidor = "id_Suplidor";
			   $Rnc_Empresa_Compras = $_POST["RncEmpresasuplidor"];
			   $id_Suplidor = $_POST["idsuplidor"];

			   $ComprasSuplidor = ModeloCompras::mdlMostrarComprasReportesSuplidores($tabla, $taRncEmpresaCompras, $taid_Suplidor, $Rnc_Empresa_Compras, $id_Suplidor);

		foreach ($ComprasSuplidor as $key1 => $compras) {
			   	
			   	if($_POST["idsuplidor"] == $compras["id_Suplidor"]){ 
			   		
			  	
			  		$datos = array("id_Suplidor" => $compras["id_Suplidor"],
			   			"Rnc_Empresa_Compras" => $_POST["RncEmpresasuplidor"],
			   			"Rnc_Suplidor" => $_POST["EditarDocumentoIdsuplidor"],
			   			"Nombre_Suplidor" => $_POST["EditarSuplidor"]);

			 $respuesta = ModeloCompras::mdlUdateComprasSuplidores($tabla, $datos);

			  	}

			  	
	}
		/*************************** CAMBIO DE CXP SUPLIDORES *****************/

			   $tabla = "cxp_empresas";
			   $taRncEmpresaCompras = "Rnc_Empresa_cxp";
			   $taid_Suplidor = "id_Suplidor";
			   $Rnc_Empresa_Compras = $_POST["RncEmpresasuplidor"];
			   $id_Suplidor = $_POST["idsuplidor"];

			   $CXP = ModeloCompras::mdlMostrarComprasReportesSuplidores($tabla, $taRncEmpresaCompras, $taid_Suplidor, $Rnc_Empresa_Compras, $id_Suplidor);
			   
			   foreach ($CXP  as $key3 => $CXPSuplidores) {
			   	
			   	if($_POST["idsuplidor"] == $CXPSuplidores["id_Suplidor"]){ 
			  	
			  		$datos = array("id_Suplidor" => $CXPSuplidores["id_Suplidor"],
			   			"Rnc_Empresa_cxp" => $_POST["RncEmpresasuplidor"],
			   			"Rnc_Suplidor" => $_POST["EditarDocumentoIdsuplidor"],
			   			"Nombre_Suplidor" => $_POST["EditarSuplidor"]);

			  		$respuesta = ModeloCXP::mdlUdateCXPSuplidores($tabla, $datos);

			  	}

			   }
			   $tabla = "pagocxp_empresas";
			   $taRncEmpresaCompras = "Rnc_Empresa_cxp";
			   $taid_Suplidor = "id_Suplidor";
			   $Rnc_Empresa_Compras = $_POST["RncEmpresasuplidor"];
			   $id_Suplidor = $_POST["idsuplidor"];

			   $CXPpago = ModeloCompras::mdlMostrarComprasReportesSuplidores($tabla, $taRncEmpresaCompras, $taid_Suplidor, $Rnc_Empresa_Compras, $id_Suplidor);
			   
			   foreach ($CXPpago as $key4 => $CXPpagoSuplidores) {
			   	
			   	if($_POST["idsuplidor"] == $CXPpagoSuplidores["id_Suplidor"]){ 
			  	
			  		$datos = array("id_Suplidor" => $CXPpagoSuplidores["id_Suplidor"],
			   			"Rnc_Empresa_cxp" => $_POST["RncEmpresasuplidor"],
			   			"Rnc_Suplidor" => $_POST["EditarDocumentoIdsuplidor"],
			   			"Nombre_Suplidor" => $_POST["EditarSuplidor"]);

			  		$respuesta = ModeloCXP::mdlUdateCXPSuplidores($tabla, $datos);

			  	}

			   }

			   $tabla = "recibocxp_empresas";
			   $taRncEmpresaCompras = "Rnc_Empresa_cxp";
			   $taid_Suplidor = "Rnc_Suplidor";
			   $Rnc_Empresa_Compras = $_POST["RncEmpresasuplidor"];
			   $id_Suplidor = $_POST["DocumentoAnterior"];

			   $CXPRecibo = ModeloCompras::mdlMostrarComprasReportesSuplidores($tabla, $taRncEmpresaCompras, $taid_Suplidor, $Rnc_Empresa_Compras, $id_Suplidor);
			   
			   foreach ($CXPRecibo as $key5 => $CXPRecibovalue) {
			   	
			   	if($_POST["DocumentoAnterior"] == $CXPRecibovalue["Rnc_Suplidor"]){ 
			  	
			  		$datos = array("id" => $CXPRecibovalue["id"],
			   			"Rnc_Empresa_cxp" => $_POST["RncEmpresasuplidor"],
			   			"Rnc_Suplidor" => $_POST["EditarDocumentoIdsuplidor"],
			   			"Nombre_Suplidor" => $_POST["EditarSuplidor"]);

			  		$respuesta = ModeloCXP::mdlUdateCXPRecibo($tabla, $datos);

			  	}

			   }
/*LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO*/

	/*LIBRO MAYOR  COMPRA COMPRA COMPRA*/
foreach ($ComprasSuplidor as $key6 => $comprasNAsiento) {
				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa =  $_POST["RncEmpresasuplidor"];
				$taNAsiento = "NAsiento";
				$NAsiento = $comprasNAsiento["NAsiento"];
			

$AsientoCompras = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento);



	foreach ($AsientoCompras as $key7 => $NAsiento){

	if($_POST["DocumentoAnterior"] == $NAsiento["Rnc_Factura"]){ 
				
			 $datos = array("id" => $NAsiento["id"],
			   			"Rnc_Empresa_LD" => $_POST["RncEmpresasuplidor"],
			   			"Rnc_Factura" => $_POST["EditarDocumentoIdsuplidor"],
			   			"Nombre_Empresa" => $_POST["EditarSuplidor"]);

			 $respuesta = ModeloDiario::mdlUdatediarioSuplidores($tabla, $datos);
	}

			  
			   }
}
 /*LIBRO MAYOR  COMPRA RETENCIONES COMPRA RETENCIONES COMPRA RETENCIONES*/

foreach ($ComprasSuplidor as $key8 => $comprasNAsientoRET) {
				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa =  $_POST["RncEmpresasuplidor"];
				$taNAsiento = "NAsientoRET";
				$NAsiento = $comprasNAsientoRET["NAsientoRET"];
			

$AsientoCompras = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento);



		foreach ($AsientoCompras as $key9 => $NAsientoRET){
			if($_POST["DocumentoAnterior"] == $NAsientoRET["Rnc_Factura"]){ 
				
			 $datos = array("id" => $NAsientoRETs["id"],
			   			"Rnc_Empresa_LD" => $_POST["RncEmpresasuplidor"],
			   			"Rnc_Factura" => $_POST["EditarDocumentoIdsuplidor"],
			   			"Nombre_Empresa" => $_POST["EditarSuplidor"]);

			 $respuesta = ModeloDiario::mdlUdatediarioSuplidores($tabla, $datos);

			 }
			  
			   }
}

/*LIBRO MAYOR RECIBOS DE PAGOS RECIBOS DE PAGOS RECIBOS DE PAGOS RECIBOS DE PAGOS*/

			   	
			   	 
foreach ($CXPRecibo as $key10 => $CXPReciboNAsiento) {
				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa =  $_POST["RncEmpresasuplidor"];
				$taNAsiento = "NAsiento";
				$NAsiento = $CXPReciboNAsiento["NAsiento"];
			

$AsientoCXPRecibo = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento);



			foreach ($AsientoCXPRecibo as $key11 => $NAsiento){

				if($_POST["DocumentoAnterior"] == $NAsiento["Rnc_Suplidor"]){

			
				
			 $datos = array("id" => $NAsiento["id"],
			   			"Rnc_Empresa_LD" => $_POST["RncEmpresasuplidor"],
			   			"Rnc_Factura" => $_POST["EditarDocumentoIdsuplidor"],
			   			"Nombre_Empresa" => $_POST["EditarSuplidor"]);

			 $respuesta = ModeloDiario::mdlUdatediarioSuplidores($tabla, $datos);


			  
			   }
}

}



			   
			   if ($respuesta == "ok") {



				   	echo'<script>

						swal({
							  type: "success",
							  title: "¡El suplidor se ha Modificado Correctamente!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "suplidores";

								}
							})

				  	</script>';
			   	
			   }
		

		

		}/*CIERRE DE ISSET*/


	}/*CIERRE DE FUNCTION EDITAR Suplidor*/

	/******************************
		ELIMINAR SUPLIDOR
	*******************************/

	static public function ctrEliminarSuplidor(){

		if(isset($_GET["idsuplidor"])){

			$tabla = "suplidor_empresas";
			$id = "id";
			$Valor_idSuplidor = $_GET["idsuplidor"];

			$respuesta = ModeloSuplidores::mdlEliminarsuplidor($tabla, $id, $Valor_idSuplidor);

			if ($respuesta == "ok") {

				   	echo'<script>

						swal({
							  type: "success",
							  title: "¡El suplidor se ha ELIMINADO Correctamente!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "suplidores";

								}
							})

				  	</script>';
			   	
			   }

		}

			
	}


static public function ctrModalEditarSuplidores($id, $valorid){ 

	$tabla = "suplidor_empresas";


	$respuesta = ModeloSuplidores::mdlModalEditarSuplidor($tabla, $id, $valorid);


		
	return $respuesta;



	}
	


}/*CIERRE DE CLASES*/

 





 