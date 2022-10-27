<?php 


class ControladorCotizaciones{

	static public function ctrMostrarCotizaciones($Rnc_Empresa_Cotizacion, $periodocotizacion){

		$tabla = "cotizaciones_empresas";
		$taRncEmpresacotizacion = "Rnc_Empresa_Cotizacion";

		$respuesta = ModeloCotizacion::mdlMostrarCotizaciones($tabla, $taRncEmpresacotizacion, $Rnc_Empresa_Cotizacion, $periodocotizacion);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/
	static public function ctrMostrarCodigoCotizaciones($Rnc_Empresa_Cotizacion){

		$tabla = "cotizaciones_empresas";
		$taRncEmpresacotizacion = "Rnc_Empresa_Cotizacion";

		$respuesta =  ModeloCotizacion::mdlMostrarCodigoCotizaciones($tabla, $taRncEmpresacotizacion, $Rnc_Empresa_Cotizacion);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/

	/**********************************************
					CREAR COTIZACION
	***********************************************/


static public function ctrCrearCotizacion(){
	if(isset($_POST["nuevaVenta"])){

$_SESSION["FechaFacturames"] = $_POST["FechaFacturames"];
$_SESSION["FechaFacturadia"] = $_POST["FechaFacturadia"];

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

			/****VALIDACION QUE LA COTIZACION NO SE REPITA****/

				$tabla = "cotizaciones_empresas";
				$taRnc_Empresa_Cotizacion = "Rnc_Empresa_Cotizacion";
				$Rnc_Empresa_Cotizacion = $_POST["RncEmpresaVentas"];
				$taCodigo = "Codigo";
				$Codigo = $_POST["nuevaVenta"];
				$taCorre_Cotizacion = "NCF_Cotizacion";

				$NCFCorre_Cotizacion = $_POST["NCFFacturaNo"];
				$CodigoNCFCorre_Cotizacion = $_POST["CodigoNCFNo"];
				
				$Corre_Cotizacion = $NCFCorre_Cotizacion.$CodigoNCFCorre_Cotizacion;

			

			$CotizacionRepetida = ModeloCotizacion::MdlCotizacionesRepetida($tabla, $taRnc_Empresa_Cotizacion, $Rnc_Empresa_Cotizacion, $taCodigo, $Codigo, $taCorre_Cotizacion, $Corre_Cotizacion);

if($CotizacionRepetida != false && $CotizacionRepetida["Rnc_Empresa_Cotizacion"] == $Rnc_Empresa_Cotizacion && $CotizacionRepetida["Codigo"] == $Codigo && $CotizacionRepetida["NCF_Cotizacion"] == $Corre_Cotizacion){

				echo '<script>
								swal({
									type: "error",
									title: "ESTA COTIZACION  YA ESTA REGISTRADA VERIFIQUE EL CODIGO Y EL CONTROL DE CORRELATIVOS!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "crear-cotizacion";
											}

											});

								</script>';

exit;

} 
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
														window.location = "crear-cotizacion";
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
														window.location = "crear-cotizacion";
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
														window.location = "crear-cotizacion";
													}

													});

										</script>';
								exit;



			}


			
			// code...
		}


		
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
									window.location = "crear-cotizacion";
													
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
									window.location = "crear-cotizacion";
													
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
									window.location = "crear-cotizacion";
													
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
									window.location = "crear-cotizacions";
													
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
									window.location = "crear-cotizacion";
													
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
						window.location = "crear-cotizacion";
													
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
									window.location = "crear-cotizacion";
													
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
									window.location = "crear-cotizacion";
													
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
												window.location = "crear-cotizacion";
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
									window.location = "crear-cotizacion";


													
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
									window.location = "crear-cotizacion";


													
													});


												
								</script>';	
			exit;	

							
	}

/**************************************************************************************
		ACTUALIZAR CORRELATIVOS
***************************************************************************************/
			$tabla = "correlativos_no_fiscal";
			
			
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresaVentas"],
					"Tipo_NCF" => $_POST["NCFFacturaNo"],
					"NCF_Cons" =>  $_POST["CodigoNCFNo"]);



			$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);


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


	$id_Vendedor = $_POST["idVendedor"];
	$tabla = "usuarios_empresas";
	$id = "id"; 
	$idUsuario = $_POST["idVendedor"];	
	$usuarios = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
	$Nombre_Vendedor = $usuarios["Nombre"];

	
	if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];

    }else{
		$Moneda = "DOP";
		$tasa = "0.00";
		

	}


			/**********************************************
						GUARDAR LA COMPRA
			***********************************************/
			$NCF = $_POST["NCFFacturaNo"];
			$Correlativo = $_POST["CodigoNCFNo"]; 
			$NCF_Correlativo = $NCF.$Correlativo;
			$Usuario_Creador = $_POST["nuevoVendedor"];
			$Estado_Cotizacion = "0"; 
			
			$Accion_Cotizacion = "CREADA"; 
			


			$tabla = "cotizaciones_empresas";

			$datos = array("Rnc_Empresa_Cotizacion" => $_POST["RncEmpresaVentas"], 
				"Codigo" => $_POST["nuevaVenta"],
				"Rnc_Cliente" => $_POST["RncClienteFactura"],
				"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
				"NCF_Cotizacion" => $NCF_Correlativo, 
				"FechaAnoMes" => $_POST["FechaFacturames"], 
				"FechaDia" => $_POST["FechaFacturadia"], 
				"id_Cliente" => $id_Cliente, 
				"id_Vendedor" => $id_Vendedor,
				"Nombre_Vendedor" => $Nombre_Vendedor, 
				"Producto" => $_POST["listaProductos"], 
				"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
				"Pordescuento" => $_POST["nuevoporDescuento"],
				"Moneda" => $Moneda,
				"Tasa" => $tasa,
				"Impuesto" => $_POST["nuevoPrecioImpuesto"], 
				"Neto" => $_POST["nuevoPrecioNeto"], 
				"Descuento" => $_POST["Descuento"],
				"Total" => $_POST["totalVenta"], 
				"Observaciones" => $_POST["Observaciones"], 
				"Usuario_Creador" => $Usuario_Creador, 
				"Accion_Cotizacion" => $Accion_Cotizacion, 
				"Estado_Cotizacion" => $Estado_Cotizacion);
		

			$respuesta = ModeloCotizacion::mdlIngresarCotizaciones($tabla, $datos);

			if($respuesta == "ok"){
				echo '<script>
									swal({
										type: "success",
										title: "¡LA COTIZACIÓN Se Registro Correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false
											}).then((result)=>{

												if(result.value){
													window.location = "cotizaciones";
												}

												});

									</script>';

			}
									







				
		
								
}/*CIERRE DE ISSET NUEVA VENTA*/
}/*CIERRE DE FUNCION CREAR VENTAS*/



	/*********************************************************
				MOSTAR VENTAS EDITAR

	************************************************************/


	static public function ctrMostrarCotizacionesEditar($id, $valoridCotizacion){

		$tabla = "cotizaciones_empresas";
		

		$respuesta =  ModeloCotizacion::mdlMostrarCotizacionesEditar($tabla, $id, $valoridCotizacion);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/

	/****************************************
		EDITAR VENTAS
	*****************************************/
	static public function ctrEditarCotizacion(){

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

				/**********************
					VALIDACIONES
				***********************/
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
									window.location = "cotizaciones";
													
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
									window.location = "cotizaciones";
													
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
									window.location = "cotizaciones";
													
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
									window.location = "cotizaciones";
													
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
									window.location = "cotizaciones";
													
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
						window.location = "cotizaciones";
													
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
									window.location = "cotizaciones";
													
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
									window.location = "cotizaciones";
													
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
									window.location = "cotizaciones";


													
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
									window.location = "cotizaciones";


													
													});


												
								</script>';	
			exit;	

							
	}

	/******FIN VALIDACION DE TIPO DE SUPLIDOR Y NUMERO DE CARACTERES DEL RNC****/
	if($_POST["Moneda_Factura"] == "USD"){

	$Moneda = "USD";
	$tasa = $_POST["tasaUS"];



}else{
	$Moneda = "DOP";
	$tasa = "0.00";
	

}
				

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
			

				$id_Vendedor = $_POST["idVendedor"];



			


			/************************************
				MODULO DE CUENTAS POR COBRAR
			***************************************/
		

							
/*VENTA VENTA VENTA VENTA VENTA VENTA VENTA  VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA VENTA */

/************************************************
			FORMATEAR TABLA DE PRODUCTOS Y LA DE CLIENTES
			*************************************************/
			$tabla = "cotizaciones_empresas";

				$id = "id";

				$valoridCotizacion = $_POST["idCotizacion"];

	$traercotizacion = ModeloCotizacion::mdlMostrarCotizacionesEditar($tabla, $id, $valoridCotizacion);

			/******************************************
			REVISAR SI VIENEN PRODUCTOS EDITADOS
			******************************************/
			

			if($_POST["listaProductos"] == ""){

				$_POST["listaProductos"] = $traercotizacion["Producto"];
				

			}

			/**********************************************
					editar	 LA COMPRA
			***********************************************/

			$Usuario_Creador = $_POST["nuevoVendedor"];
			$Accion_Cotizacion = "EDITADA"; 
			


			$tabla = "cotizaciones_empresas";

			$datos = array("id" => $valoridCotizacion, 
				"Rnc_Empresa_Cotizacion" => $_POST["RncEmpresaVentas"], 
				"Codigo" => $_POST["editarVenta"], 
				"Rnc_Cliente" => $_POST["RncClienteFactura"],
				"Nombre_Cliente" => $_POST["Nombre_Cliente"], 
				"FechaAnoMes" => $_POST["FechaFacturames"], 
				"FechaDia" => $_POST["FechaFacturadia"], 
				"id_Cliente" => $id_Cliente, 
				"Producto" => $_POST["listaProductos"], 
				"Porimpuesto" => $_POST["nuevoImpuestoVenta"],
				"Pordescuento" => $_POST["nuevoporDescuento"],
				"Moneda" => $Moneda,
				"Tasa" => $tasa,
				"Impuesto" => $_POST["nuevoPrecioImpuesto"], 
				"Neto" => $_POST["nuevoPrecioNeto"], 
				"Descuento" => $_POST["Descuento"],
				"Total" => $_POST["totalVenta"], 
				"Observaciones" => $_POST["Observaciones"], 
				"Usuario_Creador" => $Usuario_Creador, 
				"Accion_Cotizacion" => $Accion_Cotizacion);

			

			$respuesta = ModeloCotizacion::mdlEditarCotizacion($tabla, $datos);

			if($respuesta == "ok"){

						echo '<script>
									swal({
										type: "success",
										title: "¡LA COTIZACION Se Editado Correctamente!",
										showConfirmButton: true,
										confirmButtonText: "Cerrar",
										closeOnConfirm: false
											}).then((result)=>{

												if(result.value){
													window.location = "cotizaciones";
												}

												});

									</script>';
									

			}


					
					
			

		}/*CIERRE DE ISSET NUEVA VENTA*/


	}/*CIERRE DE FUNCION CREAR VENTAS*/


	/**********************************************
			ELIMINAR VENTA
	***********************************************/

	static public function ctrEliminarCotizacion(){

		if(isset($_GET["idCotizacion"])){

				$tabla = "cotizaciones_empresas";
				$id = "id";
				$idCotizacion = $_GET["idCotizacion"];

				$respuesta = ModeloCotizacion::mdlBorrarCotizacion($tabla, $id, $idCotizacion);
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡La Cotización  se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "cotizaciones";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/







		}/*CIERRE DE ISSET $_GET["idVenta"]*/


	}/*Cierre FUNCCION DE BORRAR VENTA*/
	/*********************************************************
				MOSTAR VENTAS IMPRIMIR FACTURA

	************************************************************/


	static public function ctrMostrarImprimirCotizacion($id, $valoridCotizacion){

		$tabla = "cotizaciones_empresas";
		

		$respuesta = ModeloCotizacion::mdlMostrarImprimirCotizacion($tabla, $id, $valoridCotizacion);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/
	static public function ctrMostrarCotizacionVentas($taRnc_Empresa_Cotizacion, $Rnc_Empresa_Cotizacion, $taCorre_Cotizacion, $valorCorreCotizacion){

		$tabla = "cotizaciones_empresas";
		

		$respuesta = ModeloCotizacion::mdlMostrarCotizacionVentas($tabla, $taRnc_Empresa_Cotizacion, $Rnc_Empresa_Cotizacion, $taCorre_Cotizacion, $valorCorreCotizacion);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS EDITAR*/

	

}/*CIERRE DE CLASES VENTAS*/





 