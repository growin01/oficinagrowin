<?php 

class ControladorProyecto{

	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

	static public function ctrCrearProyecto(){
		if(isset($_POST["CodigoProyecto"])){
			
				$tabla = "proyectos_empresas";
				$SaldoInicial = floatval($_POST["SaldoInicialProyecto"]);
			
				$estatus = "1";
				$Accion = "CREADO";

				$datos = array("Rnc_Empresa_Proyecto" => $_POST["RncEmpresaProyecto"],
					"CodigoProyecto" => $_POST["CodigoProyecto"], 
					"Corre_Cotizacion" => $_POST["NcotizacionProyecto"], 
					"NombreProyecto" => $_POST["nuevoProyecto"], 
					"DescripcionProyecto" => $_POST["descripcionProyecto"], 
					"Fecha_anomes_inicio" => $_POST["FechamesProyectoInicio"], 
					"Fecha_dia_inicio" => $_POST["FechadiaProyectoInicio"], 
					"Fecha_anomes_fin" => $_POST["FechamesProyectoFin"], 
					"Fecha_dia_fin" => $_POST["FechadiaProyectoFin"],
					"SaldoInicial" => $SaldoInicial,
					"estatus" => $estatus, 
					"Usuario_creador" => $_POST["UsuarioProyecto"], 
					"Accion" => $Accion);




				$respuesta = ModeloProyecto::mdlCrearProyecto($tabla, $datos);
				
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Proyecto se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "proyectos";
									}

									});

						</script>';


				}


		}/*CIERRE DE FUNCION ISSET*/





	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/

	/***************************CIERRE DE FUNCION DE CATEGORIAS**********************/
	static public function ctrSumarResumenProyectos($Rnc_Empresa_LD, $idgrupoDesde, $idgrupoHasta, $Proyecto, $Orden){
		$tabla = "librodiario_empresas";
		$taRnc_Empresa_LD = "Rnc_Empresa_LD";
		$taidgrupo = "id_grupo";
		$taProyecto = "id_Proyecto";
	
		$respuesta = ModeloProyecto::mdlSumarResumenProyectos($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taidgrupo, $idgrupoDesde, $idgrupoHasta, $Proyecto, $taProyecto, $Orden);

		return $respuesta;



	}


	/********************************************************
	INICIO FUNCION DE MOSTRAR CATEGORIAS
	**********************************************************/
	
    static public function ctrMostrarProyectos($Rnc_Empresa_Proyectos){

    	$tabla = "proyectos_empresas";
    	$taRncEmpresaProyectos = "Rnc_Empresa_Proyecto";

		$respuesta = ModeloProyecto::mdlMostrarProyectos($tabla, $taRncEmpresaProyectos, $Rnc_Empresa_Proyectos);

		return $respuesta;

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/

/********************************************************
	INICIO FUNCION DE EDITAR CATEGORIAS
	**********************************************************/


static public function ctrModalEditarProyecto($id, $valorid){

	$tabla = "proyectos_empresas";

	$respuesta = ModeloProyecto::mdlModalEditarProyectos($tabla, $id, $valorid);

	return $respuesta;





}/*CIERRE FUNCICON DE EDITAR CATEGORIAS*/

	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

	static public function ctrEditarProyecto(){
		if(isset($_POST["Editar-CodigoProyecto"])){
				$tabla = "proyectos_empresas";
			
				

				
				$estatus = "1";
				$SaldoInicial = floatval($_POST["Editar-SaldoInicial"]);
				$Accion = "EDITADO";

				$datos = array("id" => $_POST["idProyecto"],
					"Rnc_Empresa_Proyecto" => $_POST["Editar-RncEmpresaProyecto"],
					"CodigoProyecto" => $_POST["Editar-CodigoProyecto"], 
					"Corre_Cotizacion" => $_POST["Editar-NcotizacionProyecto"], 
					"NombreProyecto" => $_POST["Editar-nuevoProyecto"], 
					"DescripcionProyecto" => $_POST["Editar-descripcionProyecto"], 
					"Fecha_anomes_inicio" => $_POST["Editar-FechamesProyectoInicio"], 
					"Fecha_dia_inicio" => $_POST["Editar-FechadiaProyectoInicio"], 
					"Fecha_anomes_fin" => $_POST["Editar-FechamesProyectoFin"], 
					"Fecha_dia_fin" => $_POST["Editar-FechadiaProyectoFin"],
					"SaldoInicial" => $SaldoInicial,
					"estatus" => $estatus, 
					"Usuario_creador" => $_POST["Editar-UsuarioProyecto"], 
					"Accion" => $Accion);

				$respuesta = ModeloProyecto::mdlEditarProyecto($tabla, $datos);
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Proyecto se ha Modificado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "proyectos";
									}

									});

						</script>';


				}

		}/*CIERRE DE FUNCION ISSET*/



	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/	

	/***************************************************
		BORRAR CATEGORIAS
	*****************************************************/

	static public function ctrBorrarProyecto(){
		if(isset($_GET["idProyecto"])){
				$tabla = "proyectos_empresas";
				$id = "id";
				$idProyecto = $_GET["idProyecto"];

				$respuesta = ModeloProyecto::mdlBorrarProyecto($tabla, $id, $idProyecto);
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡El Proyecto se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "proyectos";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/

		}


	}

	/*********************************
	 		VALIDAR USUARIO
	 **********************************/
	static public function ctrValidarCodigoProyecto($Nombre_Tabla, $valor, $valorRNC){
		
		$tabla = 'proyectos_empresas';
		$Rnc_Empresa_Proyecto = "Rnc_Empresa_Proyecto";
		

				
	$respuesta = ModeloProyecto::MdlValidarProyecto($tabla, $Nombre_Tabla, $valor, $valorRNC, $Rnc_Empresa_Proyecto);
		
		return $respuesta;	 

	}/*CIERRA FUNCION VALIDAR USUARIO*/

	



}/*CIERRE DE la CLASE CATEGORIAS*/
      



 