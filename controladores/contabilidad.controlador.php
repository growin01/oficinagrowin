<?php 


class ControladorContabilidad{


   
  static public function ctrCrearCodigogenerica($taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta){
    
  
      
      $tabla = "generica_empresas";
  
      
      

    $respuesta = ModeloContabilidad::mdlCrearCodigogenerica($tabla, $taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta);

    return $respuesta;
    

  }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/
  static public function ctrsubcuenta($taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta){
    
  
      
      $tabla = "generica_empresas";
  
      
      

    $respuesta = ModeloContabilidad::mdlsubcuenta($tabla, $taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta);

    return $respuesta;
    

  }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/
  static public function ctrcodigosubcuenta($taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta, $taidgenerica, $valoridgenerica){
    
  
      $tabla = "subgenerica_empresas";
  
      

    $respuesta = ModeloContabilidad::mdlCodigosubcuenta($tabla, $taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta, $taidgenerica, $valoridgenerica);

    return $respuesta;
    

  }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/


	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

	static public function ctrCrearCuenta(){
		if(isset($_POST["numerogenerico"])){
			
				$tabla = "generica_empresas";

				$taRncEmpresacuentas = "Rnc_Empresa_cuentas";
				$RncEmpresacuentas = $_POST["RncEmpresacuentas"];

				
				$tagrupocuenta = "id_grupo";
				$grupocuenta = $_POST["grupocuenta"];


				
				$tacategoriacuenta = "id_categoria";
				$categoriacuenta = $_POST["categoriacuenta"];
				
				$tanumerogenerico = "id_generica";
				$numerogenerico = $_POST["numerogenerico"];
				
				$tanuevacuentagenerica = "Nombre_Cuenta";
				$nuevacuentagenerica = $_POST["nuevacuentagenerica"];

				
				$Repetida = ModeloContabilidad::mdlrepetidacuenta($tabla, $taRncEmpresacuentas, $RncEmpresacuentas, $tagrupocuenta, $grupocuenta, $tacategoriacuenta, $categoriacuenta, $tanumerogenerico, $numerogenerico);


				if($Repetida != false && $Repetida["Rnc_Empresa_cuentas"] == $RncEmpresacuentas && $Repetida["id_grupo"] == $grupocuenta && $Repetida["id_categoria"] == $categoriacuenta && $Repetida["id_generica"] == $numerogenerico){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA CUENTA YA ESTA REGISTRADA VERIFIQUE EL PLAN DE CUENTA!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "catalogocuentas";
											}

											});

								</script>';
				exit;


				}



				$taUsuariocuentas = "Usuario_Creador";
				$Usuariocuentas = $_POST["Usuariocuentas"];

				$taAccion = "Accion";
				$Accion = "CREADO";

				$Estado = 2;				
				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);


				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡la Cuenta se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "catalogocuentas";
									}

									});

						</script>';


				}
				 
			



			

		}/*CIERRE DE FUNCION ISSET*/





	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/

	

static public function ctrCrearsubCuenta(){
		if(isset($_POST["numerosubgenerico"])){
			
				$tabla = "subgenerica_empresas";

				$taRncEmpresacuentas = "Rnc_Empresa_cuentas";
				$RncEmpresacuentas = $_POST["RncEmpresacuentas"];

				
				$tagrupocuenta = "id_grupo";
				$grupocuenta = $_POST["gruposubcuenta"];


				
				$tacategoriacuenta = "id_categoria";
				$categoriacuenta = $_POST["categoriasubcuenta"];
				
				$tanumerogenerico = "id_generica";
				$numerogenerico = $_POST["generica"];


				$tanumerosubgenerico = "id_subgenerica";
				$numerosubgenerico = $_POST["numerosubgenerico"];
				
				$tanuevacuentagenerica = "Nombre_subCuenta";


				$Nombre_SubCuenta = $_POST["nuevasubcuenta"];
				$nuevacuentagenerica = strtolower($Nombre_SubCuenta);

										
				
$Repetida = ModeloContabilidad::mdlrepetidasubcuenta($tabla, $taRncEmpresacuentas, $RncEmpresacuentas, $tagrupocuenta, $grupocuenta, $tacategoriacuenta, $categoriacuenta, $tanumerogenerico, $numerogenerico, $tanumerosubgenerico, $numerosubgenerico);


	if($Repetida != false and $Repetida["Rnc_Empresa_cuentas"] == $RncEmpresacuentas && $Repetida["id_grupo"] == $grupocuenta && $Repetida["id_categoria"] == $categoriacuenta && $Repetida["id_generica"] == $numerogenerico && $Repetida["id_subgenerica"] == $numerosubgenerico){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA SUB CUENTA YA ESTA REGISTRADA VERIFIQUE EL PLAN DE CUENTA!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "catalogocuentas";
											}

											});

								</script>';
			exit;


		} 



				$taUsuariocuentas = "Usuario_Creador";
				$Usuariocuentas = $_POST["Usuariocuentas"];

				$taAccion = "Accion";
				$Accion = "CREADO";

				$Estado = 2;
				
$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);


		if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡la Cuenta se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "catalogocuentas";
									}

									});

						</script>';


				}
				 
			

		}/*CIERRE DE FUNCION ISSET*/





	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/

static public function ctrCrearCuentaMasiva(){
		if(isset($_POST["numerogenericoMasiva"])){ 
			$tabla = "empresas";
			$taid = "Contabilidad";
			$id = "1";

			$EmpresasContabilidad = ModeloEmpresas::mdlMostrarEmpresasContabilidad($tabla, $taid, $id);
			
				$tabla = "generica_empresas";

				$taRncEmpresacuentas = "Rnc_Empresa_cuentas";
				$RncEmpresacuentas = $_POST["RncEmpresacuentas"];

				
				$tagrupocuenta = "id_grupo";
				$grupocuenta = $_POST["grupocuenta"];


				
				$tacategoriacuenta = "id_categoria";
				$categoriacuenta = $_POST["categoriacuenta"];
				
				$tanumerogenerico = "id_generica";
				$numerogenerico = $_POST["numerogenericoMasiva"];
				
				$tanuevacuentagenerica = "Nombre_Cuenta";
				$nuevacuentagenerica = $_POST["nuevacuentagenerica"];

				
				
			foreach ($EmpresasContabilidad as $key => $value) {
				$RncEmpresacuentas = $value["Rnc_Empresa"];
	
				$Repetida = ModeloContabilidad::mdlrepetidacuenta($tabla, $taRncEmpresacuentas, $RncEmpresacuentas, $tagrupocuenta, $grupocuenta, $tacategoriacuenta, $categoriacuenta, $tanumerogenerico, $numerogenerico);


				if($Repetida != false && $Repetida["Rnc_Empresa_cuentas"] == $RncEmpresacuentas && $Repetida["id_grupo"] == $grupocuenta && $Repetida["id_categoria"] == $categoriacuenta && $Repetida["id_generica"] == $numerogenerico){

				echo '<script>
								swal({

									type: "error",
									title: "OJO ALGUNA EMPRESA ESTA USANDO ESTA CUENTA, YA SE ENCUENTRA REGISTRADA YA ESTA REGISTRADA VERIFIQUE EL PLAN DE CUENTA EEEEEEEE!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "catalogocuentasmasivaempresas";
											}

											});

								</script>';
				exit;


				}
 }

foreach ($EmpresasContabilidad as $key => $value) {
			$RncEmpresacuentas = $value["Rnc_Empresa"];
			$taUsuariocuentas = "Usuario_Creador";
				$Usuariocuentas = $_POST["Usuariocuentas"];

				$taAccion = "Accion";
				$Accion = "CREADO";

				$Estado = 1;				
				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

}

				

				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡la Cuenta se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "catalogocuentasmasivaempresas";
									}

									});

						</script>';


				}
				 
			
			

		}/*CIERRE DE FUNCION ISSET*/



	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/
/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/
	static public function ctrCrearsubCuentaMasiva(){
		if(isset($_POST["numerosubgenericoMasiva"])){

$tabla = "empresas";
$taid = "Contabilidad";
$id = "1";

$EmpresasContabilidad = ModeloEmpresas::mdlMostrarEmpresasContabilidad($tabla, $taid, $id);
			
				$tabla = "subgenerica_empresas";

				$taRncEmpresacuentas = "Rnc_Empresa_cuentas";
				$RncEmpresacuentas = $_POST["RncEmpresacuentas"];

				
				$tagrupocuenta = "id_grupo";
				$grupocuenta = $_POST["gruposubcuenta"];


				
				$tacategoriacuenta = "id_categoria";
				$categoriacuenta = $_POST["categoriasubcuenta"];
				
				$tanumerogenerico = "id_generica";
				$numerogenerico = $_POST["generica"];


				$tanumerosubgenerico = "id_subgenerica";
				$numerosubgenerico = $_POST["numerosubgenericoMasiva"];
				
				$tanuevacuentagenerica = "Nombre_subCuenta";


				$Nombre_SubCuenta = $_POST["nuevasubcuenta"];
				$nuevacuentagenerica = strtolower($Nombre_SubCuenta);

										
foreach ($EmpresasContabilidad as $key => $value) {
	$RncEmpresacuentas = $value["Rnc_Empresa"];				
$Repetida = ModeloContabilidad::mdlrepetidasubcuenta($tabla, $taRncEmpresacuentas, $RncEmpresacuentas, $tagrupocuenta, $grupocuenta, $tacategoriacuenta, $categoriacuenta, $tanumerogenerico, $numerogenerico, $tanumerosubgenerico, $numerosubgenerico);


	if($Repetida != false and $Repetida["Rnc_Empresa_cuentas"] == $RncEmpresacuentas && $Repetida["id_grupo"] == $grupocuenta && $Repetida["id_categoria"] == $categoriacuenta && $Repetida["id_generica"] == $numerogenerico && $Repetida["id_subgenerica"] == $numerosubgenerico){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA SUB CUENTA YA ESTA REGISTRADA VERIFIQUE EL PLAN DE CUENTA!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "catalogocuentasmasivaempresas";
											}

											});

								</script>';
			exit;


		} 
}

foreach ($EmpresasContabilidad as $key => $value) {
$RncEmpresacuentas = $value["Rnc_Empresa"];
				$taUsuariocuentas = "Usuario_Creador";
				$Usuariocuentas = $_POST["Usuariocuentas"];

				$taAccion = "Accion";
				$Accion = "CREADO";

				$Estado = 1;
				
$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

 }
		if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡la Cuenta se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "catalogocuentasmasivaempresas";
									}

									});

						</script>';


				}
				 
			

		}/*CIERRE DE FUNCION ISSET*/





	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/

	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

	static public function  ctrCrearplandemo(){
		if(isset($_POST["RncEmpresademo"])){
			
				$tabla = "generica_empresas";

				$taRncEmpresacuentas = "Rnc_Empresa_cuentas";
				$RncEmpresacuentas = $_POST["RncEmpresademo"];

				

				$Repetida = ModeloContabilidad::mdlrepetidacuentademo($tabla, $taRncEmpresacuentas, $RncEmpresacuentas);


				if($Repetida["Rnc_Empresa_cuentas"] == $RncEmpresacuentas){

				echo '<script>
								swal({

									type: "error",
									title: "ESTA CUENTA YA ESTA REGISTRADA VERIFIQUE EL PLAN DE CUENTA!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "catalogocuentas";
											}

											});

								</script>';


		} else {
			$tagrupocuenta = "id_grupo";
			$tacategoriacuenta = "id_categoria";
			$tanumerogenerico = "id_generica";
			$tanuevacuentagenerica = "Nombre_Cuenta";
			$taUsuariocuentas = "Usuario_Creador";
			$Usuariocuentas = $_POST["Usuariocuentas"];
			$taAccion = "Accion";
			$Accion = "CREADO";
			/****************INICIO****************************/
			
				
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$nuevacuentagenerica = "CAJA CHICA";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$nuevacuentagenerica = "BANCOS MONEDA NACIONAL";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "03";
				$nuevacuentagenerica = "BANCO MONEDA EXTRANJERA";
				$Estado = 2;
	
				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
						
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$nuevacuentagenerica = "INVERSION EN FIDEICOMISO";
				$Estado = 2;	

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$nuevacuentagenerica = "CUENTAS POR COBRAR COMERCIALES";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "02";
				$nuevacuentagenerica = "CUENTAS POR COBRAR ACCIONISTAS";
				$Estado = 2;
				

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "03";
				$nuevacuentagenerica = "CUENTAS POR COBRAR EMPLEADOS";
				$Estado = 2;
					
				
				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "04";
				$nuevacuentagenerica = "OTRAS CUENTAS POR COBRAR";
				$Estado = 2;
					

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
					
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "05";
				$nuevacuentagenerica = "PROVISIONES CUENTAS POR COBRAR";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
					
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "06";
				$nuevacuentagenerica = "ANTICIPOS A PROVEEDORES";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "07";
				$nuevacuentagenerica = "FONDOS EN ANTICIPOS";
				$Estado = 2;
	
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
					
				$grupocuenta = 1;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$nuevacuentagenerica = "IMPUESTOS INDIRECTOS";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
					
				$grupocuenta = 1;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$nuevacuentagenerica = "IMPUESTOS DIRECTOS";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 3;
				$numerogenerico = "03";
				$nuevacuentagenerica = "OTROS IMPUESTOS EXIGIBLES";
				$Estado = 2;
	

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$nuevacuentagenerica = "INVENTARIO PARA LA VENTA";
				$Estado = 1;
	
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 4;
				$numerogenerico = "02";
				$nuevacuentagenerica = "INVENTARIO MATERIAL GASTABLE";
				$Estado = 2;
					

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				
				$grupocuenta = 1;
				$categoriacuenta = 5;
				$numerogenerico = "01";
				$nuevacuentagenerica = "PROVISIONES EXIGIBLES";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "01";
				$nuevacuentagenerica = "TERRENOS Y PROPIEDADES";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "02";
				$nuevacuentagenerica = "MOBILIARIOS Y EQUIPOS";
				$Estado = 1;
	
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "03";
				$nuevacuentagenerica = "AUTOMOVILES, CAMIONES Y MOTORES";
				$Estado = 1;
				
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "04";
				$nuevacuentagenerica = "ACTIVOS INTANGIBLES";
				$Estado = 1;
				
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "05";
				$nuevacuentagenerica = "OTROS ACTIVOS";
				$Estado = 2;
	
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 7;
				$numerogenerico = "01";
				$nuevacuentagenerica = "DEPRECIACIÓN MOBILIARIOS Y EQUIPOS";
				$Estado = 1;
	
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 7;
				$numerogenerico = "02";
				$nuevacuentagenerica = "DEPRECIACIÓN AUTOMOBILES, CAMIONES Y MOTORES";
				$Estado = 1;
				
	
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
			
				
				$grupocuenta = 1;
				$categoriacuenta = 7;
				$numerogenerico = "03";
				$nuevacuentagenerica = "DEPRECIACIÓN OTRO ACTIVOS";
				$Estado = 2;
	
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
				$grupocuenta = 1;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$nuevacuentagenerica = "OTROS ACTIVOS";
				$Estado = 2;

			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

			/****************FIN****************************/
			/****************INICIO****************************/
				$grupocuenta = 2;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$nuevacuentagenerica = "DEUDAS BANCO NACIONALES";
				$Estado = 2;
				
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$nuevacuentagenerica = "DEUDAS FINANCIERAS PRIVADAS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$nuevacuentagenerica = "PROVEEDORES NACIONALES";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 2;
				$numerogenerico = "02";
				$nuevacuentagenerica = "PROVEEDORES INTERNACIONALES";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$nuevacuentagenerica = "APORTES PATRONALES POR PAGAR";
				$Estado = 2;
	
			$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$nuevacuentagenerica = "ASIGANCIONES LABORALES POR PAGAR";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "03";
				$nuevacuentagenerica = "RETENCIONES LABORALES POR PAGAR";
				$Estado = 2;
				

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$nuevacuentagenerica = "IMPUESTOS INDIRECTOS";
				$Estado = 1;
				

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 4;
				$numerogenerico = "02";
				$nuevacuentagenerica = "IMPUESTOS DIRECTOS";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 5;
				$numerogenerico = "01";
				$nuevacuentagenerica = "ESTIMACIONES";
				$Estado = 2;
				

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 6;
				$numerogenerico = "01";
				$nuevacuentagenerica = "ACCIONISTAS POR PAGAR";
				$Estado = 2;
				

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 7;
				$numerogenerico = "01";
				$nuevacuentagenerica = "ANTICIPOS DE CLIENTES";
				$Estado = 1;
				

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				
				$grupocuenta = 2;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$nuevacuentagenerica = "OTROS PASIVOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$nuevacuentagenerica = "CAPITAL";
				$Estado = 2;
				

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				
				$grupocuenta = 3;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$nuevacuentagenerica = "RESERVA LEGAL";
				$Estado = 2;
				

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
			
				$grupocuenta = 3;
				$categoriacuenta = 2;
				$numerogenerico = "02";
				$nuevacuentagenerica = "RESERVA ESTATUTARIA";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
								
				$grupocuenta = 3;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$nuevacuentagenerica = "APORTES DE PATRIMONIO";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$nuevacuentagenerica = "DONACIONES DE PATRIMONIO";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
								
				$grupocuenta = 3;
				$categoriacuenta = 3;
				$numerogenerico = "03";
				$nuevacuentagenerica = "ACTUALIZACIONES DE PATRIMONIO";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$nuevacuentagenerica = "REVALORIZACIÓN DE PATRIMONIO";
				$Estado = 2;	

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 5;
				$numerogenerico = "01";
				$nuevacuentagenerica = "RESULTADO AÑOS ANTERIORES";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				
				$grupocuenta = 3;
				$categoriacuenta = 6;
				$numerogenerico = "01";
				$nuevacuentagenerica = "RESULTADO DEL EJERCICIO";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				$grupocuenta = 3;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$nuevacuentagenerica = "OTRAS PARTIDAS DE PATRIMONIO";
				$Estado = 2;	

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$nuevacuentagenerica = "INGRESOS POR VENTAS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$nuevacuentagenerica = "INGRESOS POR SERVICIOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$nuevacuentagenerica = "INGRESOS POR APORTES";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$nuevacuentagenerica = "INGRESOS POR DONACIONES";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 8;
				$numerogenerico = "01";
				$nuevacuentagenerica = "DESCUENTOS EN VENTAS";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 8;
				$numerogenerico = "02";
				$nuevacuentagenerica = "DEVOLUCIONES EN VENTAS (NC)";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$nuevacuentagenerica = "OTROS INGRESOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 9;
				$numerogenerico = "02";
				$nuevacuentagenerica = "INGRESOS FINANCIEROS";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$nuevacuentagenerica = "COSTOS POR COMPRA Y VENTA";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 1;
				$numerogenerico = "99";
				$nuevacuentagenerica = "AJUSTES DE INVENTARIO";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/

				$grupocuenta = 5;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$nuevacuentagenerica = "COSTOS POR SERVICIOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/

				$grupocuenta = 5;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$nuevacuentagenerica = "COSTOS DIRECTOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/

				$grupocuenta = 5;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$nuevacuentagenerica = "COSTOS INDIRECTOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				$grupocuenta = 5;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$nuevacuentagenerica = "OTROS COSTOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$nuevacuentagenerica = "GASTOS DE PERSONAL";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$nuevacuentagenerica = "APORTES PARAFISCALES EMPLEADOR";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/


				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "03";
				$nuevacuentagenerica = "GASTOS DE SEGURO";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$nuevacuentagenerica = "SERVICIOS BASICOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$nuevacuentagenerica = "SUMINISTROS BASICOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$nuevacuentagenerica = "HONORARIOS Y SERVICIOS PROFESIONALES";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "07";
				$nuevacuentagenerica = "SUSCRIPCIONES TEMPORALES";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "08";
				$nuevacuentagenerica = "ARRENDAMIENTOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "09";
				$nuevacuentagenerica = "IMPUESTOS, RECARGOS Y MORAS";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "10";
				$nuevacuentagenerica = "GASTOS FINANCIEROS";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "11";
				$nuevacuentagenerica = "GASTOS LEASING FINANCIEROS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$nuevacuentagenerica = "GASTOS OPERATIVOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/

				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$nuevacuentagenerica = "GASTOS DE DEPRECIACIÓN";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$nuevacuentagenerica = "OTROS GASTOS";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/
				/****************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 9;
				$numerogenerico = "02";
				$nuevacuentagenerica = "PROPINA LEGAL";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/****************FIN****************************/



/*******************************INCIO SUB CUENTAS*******************************************************************************************************************************************************************************************************************************************************************************************************************************************/

				$tabla = "subgenerica_empresas";
				$taRncEmpresacuentas = "Rnc_Empresa_cuentas";
				$RncEmpresacuentas = $_POST["RncEmpresademo"];
				$tagrupocuenta = "id_grupo";				
				$tacategoriacuenta = "id_categoria";
				$tanumerogenerico = "id_generica";
				$tanumerosubgenerico = "id_subgenerica";
				$tanuevacuentagenerica = "Nombre_subCuenta";
				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "caja chica principal";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "caja general";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "banco ejemplo cta 00001";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "03";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "banco ejemplo cta 00001";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "fideicomiso bco. ejemplo nro 00001";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "cuentas por cobrar comerciales";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "accionista nombre ejemplo";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "03";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "cuentas por cobrar empleado";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "04";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "otras cuentas por cobrar";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "05";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "provisiones cuentas incobrables";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "06";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "anticipo de proveedor";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 2;
				$numerogenerico = "07";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "fondos de anticipo para gastos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ITBIS pagados en compras";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "ITBIS retenido en ventas N.02-05";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "ITBIS a favor";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ISR Retenido en Ventas";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 3;
				$numerogenerico = "03";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "otros impuestos exigibles";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "inventario disponible para la venta";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 4;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "inventario material gastable";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 5;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "provisiones exigibles";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
			
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "terrenos";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "01";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "propiedades";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "mobiliario";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "02";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "equipos";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "03";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "automoviles";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "03";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "camiones";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "03";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "motores";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "04";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "sistemas informaticos";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 6;
				$numerogenerico = "05";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "otros activos fijos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 7;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "Depreciación mobiliario y equipos";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 7;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "Depreciación automoviles, caminoes y motores";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 7;
				$numerogenerico = "03";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "Depreciación otros activos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 1;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "otros activos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "deuda banco ejemplo";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "deuda financiera ejemplo";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "proveedores nacionales";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 2;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "proveedores internacionales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "aporte fondo de pensión";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "aporte seguro familiar de salud";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "aporte riesgo laboral";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "aporte infotep";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "nomina mensual por pagar";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "03";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "retención fondo de pensión";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "03";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "retención seguro familiar de salud";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 3;
				$numerogenerico = "03";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "retención impuesto sobre la renta";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/


				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ITBIS en ventas por pagar";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "ITBIS retenido por pagar";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 4;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "impuesto sobre la renta por pagar";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 4;
				$numerogenerico = "02";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "retenciones de ISR IR17 por pagar";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/


				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 5;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "estimaciones";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 7;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "anticipos de clientes";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 2;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "otros pasivos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "capital suscrito y pagado";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
			
				$grupocuenta = 3;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "reserva legal";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 2;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "reserva estatutaria";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "aporte de patrimonio";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "donaciones de patrimonio";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 3;
				$numerogenerico = "03";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "actualizaciones de patrimonio";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "revalorización del patrimonio";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 5;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "resultados años anteriores";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 6;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "resultado del ejercicio";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 3;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "otras partidas de patrimonio";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ingresos por ventas ejemplo1";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ingresos por servicios ejemplo1";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ingresos por aportes";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ingresos por donaciones";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 3;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ingresos por donaciones";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 8;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "DESCUENTOS EN VENTAS";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 8;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "DEVOLUCIONES EN VENTAS (NC)";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 9;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "Ingresos Diferencial Cambiario";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 4;
				$categoriacuenta = 9;
				$numerogenerico = "02";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "Ingresos por cobros y pagos";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "inventario inicial de mercancia";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "compras de mercancia";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "devoluciones en compras";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "inventario final de mercancia";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "005";
				$nuevacuentagenerica = "costos de ventas";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
/******************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 1;
				$numerogenerico = "99";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "ajustes de inventario";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "costos por servicios";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/*****************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "costo directo";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/*****************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 4;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "costo indirecto";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 5;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "otros costos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "sueldos y salarios";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "horas extras";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
			
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "comisiones";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "bonificación";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "005";
				$nuevacuentagenerica = "incentivos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "006";
				$nuevacuentagenerica = "utilidades";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "007";
				$nuevacuentagenerica = "regalias pascual";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "008";
				$nuevacuentagenerica = "vacaciones";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "009";
				$nuevacuentagenerica = "prestaciones laborales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "010";
				$nuevacuentagenerica = "regalos a empleados";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "011";
				$nuevacuentagenerica = "capacitación a empleados";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "01";
				$numerosubgenerico = "012";
				$nuevacuentagenerica = "otras remuneraciones";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "aporte fondo de pensión";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "aporte seguro familiar de salud";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "aporte riesgo laboral";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "02";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "aporte infotep";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "03";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "seguro colectivo empleado";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "03";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "seguro de activos empresariales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "energia electrica";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "agua y aseo";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "telefono e internet";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "mensajeria";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "005";
				$nuevacuentagenerica = "publicidad y redes sociales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "006";
				$nuevacuentagenerica = "consergeria y condominio";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "007";
				$nuevacuentagenerica = "mantenimiento y reparaciones";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "008";
				$nuevacuentagenerica = "dietas y viaticos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "009";
				$nuevacuentagenerica = "fletes y embalages";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "010";
				$nuevacuentagenerica = "servicios de impresión";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "012";
				$nuevacuentagenerica = "vigilancia";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "013";
				$nuevacuentagenerica = "utiles de cocina y limpieza";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "014";
				$nuevacuentagenerica = "mejores del local";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "015";
				$nuevacuentagenerica = "hospedaje";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "016";
				$nuevacuentagenerica = "servicio de limpieza";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "04";
				$numerosubgenerico = "017";
				$nuevacuentagenerica = "servicio de ayudantes";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "materiales de oficina";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "materiales de limpieza";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
			
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "otro material gastable";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "alimentos y bebidas";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "005";
				$nuevacuentagenerica = "suministros informaticos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "006";
				$nuevacuentagenerica = "uniformes laborales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "007";
				$nuevacuentagenerica = "regalos corporativos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "008";
				$nuevacuentagenerica = "regalos corporativos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "009";
				$nuevacuentagenerica = "combustibles y lubricantes";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "010";
				$nuevacuentagenerica = "boletos aereos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "011";
				$nuevacuentagenerica = "refrigerios varios";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "05";
				$numerosubgenerico = "012";
				$nuevacuentagenerica = "sobrantes menores caja chica";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "honorarios contabilidad";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "honorarios legales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "honorarios marketing";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "honorarios informaticos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "005";
				$nuevacuentagenerica = "honorarios administrativos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "006";
				$nuevacuentagenerica = "honorarios tecnicos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "007";
				$nuevacuentagenerica = "honorarios auditorias externas";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "008";
				$nuevacuentagenerica = "fotografia y audiovisuales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "009";
				$nuevacuentagenerica = "honorarios diseñador grafico";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "010";
				$nuevacuentagenerica = "honorarios ayudantes";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "06";
				$numerosubgenerico = "011";
				$nuevacuentagenerica = "honorarios obreros";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "07";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "alojamiento web";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "07";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "alojamiento servicios virtuales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "08";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "arrendamiento local";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "08";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "arrendamiento inmuebles";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "08";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "arrendamiento muebles y enseres";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "08";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "arrendamiento automoviles y motores";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "08";
				$numerosubgenerico = "005";
				$nuevacuentagenerica = "arrendamiento maquinarias y equipos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "09";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "impuestos municipales y regionales";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "09";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "impuestos directos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "09";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "impuestos indirectos";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
			
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "09";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "recargos de mora";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "09";
				$numerosubgenerico = "005";
				$nuevacuentagenerica = "intereses de mora";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "10";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "comisiones bancarias";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "10";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "impuestos bancarios";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "10";
				$numerosubgenerico = "003";
				$nuevacuentagenerica = "intereses en prestamos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "10";
				$numerosubgenerico = "004";
				$nuevacuentagenerica = "diferencial cambiario";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "10";
				$numerosubgenerico = "005";
				$nuevacuentagenerica = "gastos por cobros y pagos";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 1;
				$numerogenerico = "11";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "leasing financiero";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 2;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "gastos operativos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
			
				$grupocuenta = 6;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "gastos depreciación mobiliario y equipos";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

				/******************************INICIO****************************/
			
				$grupocuenta = 6;
				$categoriacuenta = 3;
				$numerogenerico = "01";
				$numerosubgenerico = "002";
				$nuevacuentagenerica = "gastos depreciación automoviles, camiones y motores";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/
				/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 9;
				$numerogenerico = "01";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "otros gastos";
				$Estado = 2;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/

/******************************INICIO****************************/
				
				$grupocuenta = 6;
				$categoriacuenta = 9;
				$numerogenerico = "02";
				$numerosubgenerico = "001";
				$nuevacuentagenerica = "propina legal";
				$Estado = 1;

				$respuesta = ModeloContabilidad::mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado);

				/***************************FIN***************************************/


				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El CATÁLOGO se ha Creado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "catalogocuentas";
									}

									});

						</script>';


				}
				 
			}
	

		}/*CIERRE DE FUNCION ISSET*/


	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/

	static public function ctrgrupoempresas($tabla){



		$respuesta = ModeloContabilidad::mdlMostrargrupos($tabla);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/


	static public function ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias){

		$tabla = "generica_empresas";
		$taRnc_Empresa_Cuentas = "Rnc_Empresa_Cuentas";
		$tagrupo = "id_grupo";
		$tacategorias = "id_categoria";
		$respuesta = ModeloContabilidad::mdlMostrarcuentas($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas,$grupo, $tagrupo, $categorias, $tacategorias);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/
static public function ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica){

		$tabla = "subgenerica_empresas";
		$taRnc_Empresa_Cuentas = "Rnc_Empresa_Cuentas";
		$taid_grupo = "id_grupo";
		$taid_categoria = "id_categoria";
		$taid_generica = "id_generica";

		$respuesta = ModeloContabilidad::mdlMostrarsubcuentas($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas, $id_grupo, $taid_grupo, $id_categoria, $taid_categoria, $id_generica, $taid_generica);

		return $respuesta;


	}/*CIRRE DE FUNCION MOSTRAR VENTAS*/

	
	

 static public function ctreditargenerica($RncEmpresaEG, $valorRncEmpresaEG, $idcuenta, $valoridcuenta){
    
  
      
      $tabla = "generica_empresas";
  
      
      

    $respuesta = ModeloContabilidad::mdleditarcuenta($tabla, $RncEmpresaEG, $valorRncEmpresaEG, $idcuenta, $valoridcuenta);

    return $respuesta;
    

  }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/
  static public function ctreditarcuenta($RncEmpresaEC, $valorRncEmpresaEC, $idcuenta, $valoridcuenta){
    
  
      
      $tabla = "subgenerica_empresas";
      $RncEmpresaEG = $RncEmpresaEC;
      $valorRncEmpresaEG = $valorRncEmpresaEC;
  
      
      

    $respuesta = ModeloContabilidad::mdleditarcuenta($tabla, $RncEmpresaEG, $valorRncEmpresaEG, $idcuenta, $valoridcuenta);

    return $respuesta;
    

  }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/
  static public function ctreditargrupo($idgrupo, $valoridgrupo, $idCategoria, $valoridCategoria){
    
  
      
      $tabla = "grupo_empresa";
  
      
      

    $respuesta = ModeloContabilidad::mdleditargrupo($tabla, $idgrupo, $valoridgrupo, $idCategoria, $valoridCategoria);

    return $respuesta;
    

  }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/

  static public function ctrconsultagenerica($RncEmpresaCon, $valorRncEmpresaCon, $idgrupo, $valoridgrupo, $idCategoria, $valoridCategoria, $idgenerica, $valoridgenerica){
    
  
      
      $tabla = "generica_empresas";
  
      
      

    $respuesta = ModeloContabilidad::mdlconsultagenerica($tabla, $RncEmpresaCon, $valorRncEmpresaCon, $idgrupo, $valoridgrupo, $idCategoria, $valoridCategoria, $idgenerica, $valoridgenerica);

    return $respuesta;
    

  }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/


  static public function ctrEditarCuentaCreada(){
		

	if(isset($_POST["idcuenta"])){
			
				$tabla = "generica_empresas";

				$id = "id";
				$valorid = $_POST["idcuenta"];

				
				$tanuevacuentagenerica = "Nombre_Cuenta";
				$nuevacuentagenerica = $_POST["Editar-nuevacuentagenerica"];

				
				$taUsuariocuentas = "Usuario_Creador";
				$Usuariocuentas = $_POST["Usuariocuentas"];

				$taAccion = "Accion";
				$Accion = "MODIFICADO";
				
				$respuesta = ModeloContabilidad::mdlEditarcuentaCreada($tabla, $valorid, $nuevacuentagenerica, $Usuariocuentas, $Accion);


			if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡la Cuenta se ha MODIFICADO correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "catalogocuentas";
									}

									});

						</script>';


				}
	
		}/*CIERRE DE FUNCION ISSET*/





	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/



	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

	static public function ctrEditarsubCuenta(){
		if(isset($_POST["idsubcuenta"])){
			
				$tabla = "subgenerica_empresas";

				$valorid = $_POST["idsubcuenta"];

				
				$tanuevacuentagenerica = "Nombre_subCuenta";
				$nuevacuentagenerica = strtolower($_POST["Editar-nuevasubcuenta"]);

				$taUsuariocuentas = "Usuario_Creador";
				$Usuariocuentas = $_POST["Usuariocuentas"];

				$taAccion = "Accion";
				$Accion = "CREADO";
				
				$respuesta = ModeloContabilidad::mdlEditarsubCuenta($tabla, $valorid, $nuevacuentagenerica, $Usuariocuentas, $Accion);


				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡la Cuenta se ha Modificado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "catalogocuentas";
									}

									});

						</script>';


				}
				 
			

			

		}/*CIERRE DE FUNCION ISSET*/





	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/

/***********************************************************************************************************************LIBRO DIARIO  LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO LIBRO DIARIO **********************************************************************************************************************/



	





  }/*CIERRO CLASES DE PRODUCTOS*/
