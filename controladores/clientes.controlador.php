<?php 


class ControladorClientes{

	/*INICIO DE CREAR CLIENTE*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCliente"])){


if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ&#(),.-_ ]+$/', $_POST["nuevoCliente"]))){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido Nombre de Nuevo Cliente, como los son !"#$%/=*-_!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "clientes";
													
													});
												
								</script>';	
					exit;		
	} 
if(!(preg_match('/^[0-9]+$/', $_POST["RncCliente"]))){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "clientes";
													
													});
												
								</script>';	
					exit;		
	} 
	if($_POST["Tipo_Cliente"] == 1 && strlen($_POST["RncCliente"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "clientes";
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente"] == 2 && strlen($_POST["RncCliente"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "clientes";
													});


												
								</script>';	
			exit;	

							
	}		



$tabla = "clientes_empresas";

		$datos = array("Rnc_Empresa_Cliente" => $_POST["RncEmpresaCliente"],
		"Tipo_Cliente" => $_POST["Tipo_Usuario_Cliente"],
		"Nombre_Cliente" => $_POST["nuevoCliente"], 
		"Documento" => $_POST["RncCliente"],
		"Email" => $_POST["nuevoEmail"], 
		"Telefono" => $_POST["nuevoTelefono"],
		"Direccion" => $_POST["nuevaDireccion"], 
		"Fecha_Nacimiento" => $_POST["nuevaFechaNac"]);
		
		

			   $respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);
			   
			   if ($respuesta == "ok") {
			   	
			   	$moduloCliente = $_POST["moduloCliente"];
			   	
			   	switch ($moduloCliente) {
			   		case 'crear-ventas':
			   		echo'<script>

						swal({
							  type: "success",
							  title: "¡El cliente se ha Registrado Correctamente!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "crear-ventas";

								}
							})

				  	</script>';
			   			
			   		break;
			   		
			   		default:
			   				echo'<script>

						swal({
							  type: "success",
							  title: "¡El cliente se ha Registrado Correctamente!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				  	</script>';
			   			break;
			   	}

				   
			   	
			   }

		
		}/*CIERRE DE ISSET*/


	}/*CIERRE DE FUNCTION CREAR CLIENTE*/

	/**************************************************
	MOSTRAR CLIENTES
	***************************************************/
	static public function ctrMostrarClientes($Rnc_Empresa_Cliente){

			$tabla = "clientes_empresas";
			$taRncEmpresaClientes = "Rnc_Empresa_Cliente";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $taRncEmpresaClientes, $Rnc_Empresa_Cliente);

		return $respuesta;



	}

/**************************************************
	EDITAR CLIENTES MODAL
	***************************************************/
	static public function ctrModalEditarClientes($id, $valorid){ 

			$tabla = "clientes_empresas";


			

		$respuesta = ModeloClientes::mdlModalEditarClientes($tabla, $id, $valorid);


		
		return $respuesta;



	}
static public function ctrBuscarCliente($Rnc_Empresa_Cliente, $id, $valorid){ 

$tabla = "clientes_empresas";
$taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
			

$respuesta = ModeloClientes::mdlBuscarCliente($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $id, $valorid);


	return $respuesta;



	}
/**************************************************
	EDITAR CLIENTES 
	***************************************************/
	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){

if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ&#(),.-_ ]+$/', $_POST["editarCliente"]))){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido Nombre de Nuevo Cliente, como los son !"#$%/=*-_!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "clientes";
													
													});
												
								</script>';	
					exit;		
	} 
if(!(preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]))){
		
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en el RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "clientes";
													
													});
												
								</script>';	
					exit;		
	} 

	if($_POST["Tipo_Cliente"] == 1 && strlen($_POST["editarDocumentoId"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "clientes";
													});


												
								</script>';	
			exit;	

							
	}
	if($_POST["Tipo_Cliente"] == 2 && strlen($_POST["editarDocumentoId"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Cliente no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "clientes";
													});


												
								</script>';	
			exit;	

							
	}		

		$tabla = "clientes_empresas";

		$datos = array("id" => $_POST["idCliente"],
			"Rnc_Empresa_Cliente" => $_POST["RncEmpresaCliente"],
			"Tipo_Cliente" => $_POST["Tipo_Cliente"],
			"Nombre_Cliente" => $_POST["editarCliente"],
			"Documento" => $_POST["editarDocumentoId"],
			"Email" => $_POST["editarEmail"],
			"Telefono" => $_POST["editarTelefono"], 
			"Direccion" => $_POST["editarDireccion"], 
			"Fecha_Nacimiento" => $_POST["editarFechaNacimiento"]);

/*************************** CAMBIO DE 607 CLIENTES CAMBIO DE 607 CLIENTES *****************/

		$respuesta = ModeloClientes::mdleditarCliente($tabla, $datos);

			   $tabla = "607_empresas";
			   $taRncEmpresa607 = "Rnc_Empresa_607";
			   $Rnc_Empresa_607 = $_POST["RncEmpresaCliente"];
			   $taRnc_Factura_607 = "Rnc_Factura_607";
			   $Rnc_Factura_607 = $_POST["DocumentoAnterior"];
			  
			   $registro607 = Modelo607::mdlMostrar607Cliente($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607);

			   

			   foreach ($registro607 as $key => $value) {

			  	$datos = array("id" => $value["id"],
			   	"Rnc_Empresa_607" => $_POST["RncEmpresaCliente"],
			   	"Rnc_Factura_607" => $_POST["editarDocumentoId"],
			   	"Tipo_Id_Factura_607" => $_POST["Tipo_Cliente"],
			   	"Nombre_Empresa_607" => $_POST["editarCliente"]);

			  		$respuesta = Modelo607::mdlUdate607Cliente($tabla, $datos);

			   
			   }
/*************************** CAMBIO DE VENTAS DE CLIENTE*****************/


			   $tabla = "ventas_empresas";
			   $taRncEmpresacxc = "Rnc_Empresa_Venta";
			   $taRnc_Cliente = "id_Cliente";
			   $Rnc_Empresa_cxc = $_POST["RncEmpresaCliente"];
			   $Rnc_Cliente = $_POST["idCliente"];

			   $VentasCliente = ModeloVentas::mdlMostrarVentasReportesCliente($tabla, $taRncEmpresacxc, $taRnc_Cliente, $Rnc_Empresa_cxc, $Rnc_Cliente);

			   foreach ($VentasCliente as $key1 => $ventas) {
			   	
			   	if($_POST["idCliente"] == $ventas["id_Cliente"]){ 
			  	
			  		$datos = array("id_Cliente" => $ventas["id_Cliente"],
			   			"Rnc_Empresa_Venta" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Cliente" => $_POST["editarDocumentoId"],
			   			"Nombre_Cliente" => $_POST["editarCliente"],
			   			"Correo_Cliente" => $_POST["editarEmail"]);

			  		$respuesta =ModeloVentas::mdlUdateVentasCliente($tabla, $datos);

			  	}

			   }

			   $tabla = "ventasrecurrentes_empresas";
			   $taRncEmpresacxc = "Rnc_Empresa_Venta";
			   $taRnc_Cliente = "id_Cliente";
			   $Rnc_Empresa_cxc = $_POST["RncEmpresaCliente"];
			   $Rnc_Cliente = $_POST["idCliente"];

			   $VentasRecurrente = ModeloVentas::mdlMostrarVentasReportesCliente($tabla, $taRncEmpresacxc, $taRnc_Cliente, $Rnc_Empresa_cxc, $Rnc_Cliente);

			   foreach ($VentasRecurrente as $key2 => $ventas) {
			   	
			   	if($_POST["idCliente"] == $ventas["id_Cliente"]){ 
			  	
			  		$datos = array("id_Cliente" => $ventas["id_Cliente"],
			   			"Rnc_Empresa_Venta" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Cliente" => $_POST["editarDocumentoId"],
			   			"Nombre_Cliente" => $_POST["editarCliente"],
			   			"Correo_Cliente" => $_POST["editarEmail"]);

			  		$respuesta =ModeloVentas::mdlUdateVentasCliente($tabla, $datos);

			  	}

			   }
			   $tabla = "cotizaciones_empresas";
			   $taRncEmpresacxc = "Rnc_Empresa_Cotizacion";
			   $taRnc_Cliente = "id_Cliente";
			   $Rnc_Empresa_cxc = $_POST["RncEmpresaCliente"];
			   $Rnc_Cliente = $_POST["idCliente"];

			   $VentasCotizaciones = ModeloVentas::mdlMostrarVentasReportesCliente($tabla, $taRncEmpresacxc, $taRnc_Cliente, $Rnc_Empresa_cxc, $Rnc_Cliente);

			   foreach ($VentasCotizaciones as $key3 => $ventas) {
			   	
			   	if($_POST["idCliente"] == $ventas["id_Cliente"]){ 
			  	
			  		$datos = array("id_Cliente" => $ventas["id_Cliente"],
			   			"Rnc_Empresa_Cotizacion" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Cliente" => $_POST["editarDocumentoId"],
			   			"Nombre_Cliente" => $_POST["editarCliente"]);

			  		$respuesta = ModeloCotizacion::mdlUdateCotizacionesCliente($tabla, $datos);

			  	}

			   }

			   $tabla = "cxc_empresas";
			   $taRncEmpresacxc = "Rnc_Empresa_cxc";
			   $taRnc_Cliente = "id_Cliente";
			   $Rnc_Empresa_cxc = $_POST["RncEmpresaCliente"];
			   $Rnc_Cliente = $_POST["idCliente"];

			   $CXC = ModeloVentas::mdlMostrarVentasReportesCliente($tabla, $taRncEmpresacxc, $taRnc_Cliente, $Rnc_Empresa_cxc, $Rnc_Cliente);

			   foreach ($CXC as $key4 => $CXCclientes) {
			   	
			   	if($_POST["idCliente"] == $CXCclientes["id_Cliente"]){ 
			  	
			  		$datos = array("id_Cliente" => $CXCclientes["id_Cliente"],
			   			"Rnc_Empresa_cxc" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Cliente" => $_POST["editarDocumentoId"],
			   			"Nombre_Cliente" => $_POST["editarCliente"]);

			  		$respuesta = ModeloCXC::mdlUdateCXCCliente($tabla, $datos);

			  	}

			   }

			   $tabla = "pagocxc_empresas";
			   $taRncEmpresacxc = "Rnc_Empresa_cxc";
			   $taRnc_Cliente = "id_Cliente";
			   $Rnc_Empresa_cxc = $_POST["RncEmpresaCliente"];
			   $Rnc_Cliente = $_POST["idCliente"];

			   $CXCpago = ModeloVentas::mdlMostrarVentasReportesCliente($tabla, $taRncEmpresacxc, $taRnc_Cliente, $Rnc_Empresa_cxc, $Rnc_Cliente);

			   foreach ($CXCpago as $key5 => $CXCclientespago) {
			   	
			   	if($_POST["idCliente"] == $CXCclientespago["id_Cliente"]){ 
			  	
			  		$datos = array("id_Cliente" => $CXCclientespago["id_Cliente"],
			   			"Rnc_Empresa_cxc" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Cliente" => $_POST["editarDocumentoId"],
			   			"Nombre_Cliente" => $_POST["editarCliente"]);

			  		$respuesta = ModeloCXC::mdlUdateCXCCliente($tabla, $datos);

			  	}

			   }

			   $tabla = "recibocxc_empresas";
			   $taRncEmpresacxc = "Rnc_Empresa_cxc";
			   $taRnc_Cliente = "Rnc_Cliente";
			   $Rnc_Empresa_cxc = $_POST["RncEmpresaCliente"];
			   $Rnc_Cliente = $_POST["DocumentoAnterior"];

			   $CXCrecibo = ModeloVentas::mdlMostrarVentasReportesCliente($tabla, $taRncEmpresacxc, $taRnc_Cliente, $Rnc_Empresa_cxc, $Rnc_Cliente);

			   foreach ($CXCrecibo as $key6 => $CXCvaluerecibo) {
			   	
			   	if($_POST["DocumentoAnterior"] == $CXCvaluerecibo["Rnc_Cliente"]){ 
			  	
			  		$datos = array("id" => $CXCvaluerecibo["id"],
			   			"Rnc_Empresa_cxc" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Cliente" => $_POST["editarDocumentoId"],
			   			"Nombre_Cliente" => $_POST["editarCliente"]);

			  		$respuesta = ModeloCXC::mdlUpdateReciboCliente($tabla, $datos);

			  	}

			   }


/*LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO MAYOR LIBRO*/

	/*LIBRO MAYOR  VENTAS VENTAS VENTAS VENTAS VENTAS VENTAS VENTAS VENTAS VENTAS*/
foreach ($VentasCliente as $key7 => $VentasNAsiento) {
				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa =  $_POST["RncEmpresaCliente"];
				$taNAsiento = "NAsiento";
				$NAsiento = $VentasNAsiento["NAsiento"];
			

$AsientoVentas = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento);


	foreach ($AsientoVentas as $key8 => $NAsiento){

		if($_POST["DocumentoAnterior"] == $NAsiento["Rnc_Factura"]){ 
				
			 $datos = array("id" => $NAsiento["id"],
			   			"Rnc_Empresa_LD" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Factura" => $_POST["editarDocumentoId"],
			   			"Nombre_Empresa" => $_POST["editarCliente"]);

			 $respuesta = ModeloDiario::mdlUdatediarioSuplidores($tabla, $datos);
		}

			  
	}
}

foreach ($VentasCliente as $key9 => $VentasNAsientoRET) {
				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa =  $_POST["RncEmpresaCliente"];
				$taNAsiento = "NAsientoRET";
				$NAsiento = $VentasNAsiento["NAsientoRET"];
			

$AsientoVentas = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento);


	foreach ($AsientoVentas as $key10 => $NAsientoRET){

		if($_POST["DocumentoAnterior"] == $NAsientoRET["Rnc_Factura"]){ 
				
			 $datos = array("id" => $NAsientoRET["id"],
			   			"Rnc_Empresa_LD" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Factura" => $_POST["editarDocumentoId"],
			   			"Nombre_Empresa" => $_POST["editarCliente"]);

			 $respuesta = ModeloDiario::mdlUdatediarioSuplidores($tabla, $datos);
		}

			  
	}
}

 foreach ($CXCrecibo as $key11 => $CXCvaluerecibo) {
			   	
				$tabla = "librodiario_empresas";
				$taRnc_Empresa = "Rnc_Empresa_LD";
				$Rnc_Empresa =  $_POST["RncEmpresaCliente"];
				$taNAsiento = "NAsiento";
				$NAsiento = $VentasNAsiento["NAsiento"];
			

$AsientoCXCrecibo = ModeloDiario::MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento);


	foreach ($AsientoCXCrecibo as $key12 => $NAsiento){

		if($_POST["DocumentoAnterior"] == $NAsiento["Rnc_Factura"]){ 
				
			 $datos = array("id" => $NAsiento["id"],
			   			"Rnc_Empresa_LD" => $_POST["RncEmpresaCliente"],
			   			"Rnc_Factura" => $_POST["editarDocumentoId"],
			   			"Nombre_Empresa" => $_POST["editarCliente"]);

			 $respuesta = ModeloDiario::mdlUdatediarioSuplidores($tabla, $datos);
		}

			  
	}
}
	if ($respuesta == "ok") {
			  echo'<script>

						swal({
							  type: "success",
							  title: "¡El Cliente se ha Modificado Correctamente!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				  	</script>';
			   	
	
			   }
		   
		
		}/*CIERRE DE ISSET*/


	}/*CIERRE DE FUNCTION CREAR CLIENTE*/
	/***************************************************
		BORRAR Clientes
	*****************************************************/

	static public function ctrBorrarCliente(){
		if(isset($_GET["idCliente"])){

				$tabla = "clientes_empresas";
				$id = "id";
				$idCliente = $_GET["idCliente"];

				$respuesta = ModeloClientes::mdlBorrarCliente($tabla, $id, $idCliente);
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Cliente se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "clientes";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/

		}/*CIERRE DE IF GET*/


	}


/*********************************
	 		VALIDAR USUARIO
	 **********************************/
	static public function ctrValidarCliente($Nombre_Cliente, $valorCliente, $valorRNC){
		
		$tabla = "clientes_empresas";
		$Rnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
		

				
	$respuesta = ModeloClientes::MdlValidarCliente($tabla, $Nombre_Cliente, $valorCliente, $valorRNC, $Rnc_Empresa_Cliente);
		
		return $respuesta;

 }

	
	/*********************************
	 		TABLA DGII
	 **********************************/
	static public function ctrTablaDGII($RncCliente){
		
		$tabla = "dgii_rnc";
		$Rnc_DGII = "Rnc_DGII";
		

				
	$respuesta = ModeloClientes::MdlTablaDGII($tabla, $Rnc_DGII, $RncCliente);
		
		return $respuesta;	 

	}/*CIERRA FUNCION VALIDAR USUARIO*/



}/*CIERRE DE CLASES*/

 





 