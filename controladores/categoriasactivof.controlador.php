<?php 

class ControladorCategoriasActivoF{

	
	 static public function ctrMostrarCategoriasActivoF($Rnc_Empresa_Categoria_ActivoF){

    	$tabla = "categorias_activof_empresas";
    	$taRncEmpresaCategoriaActivoF = "Rnc_Empresa_Categoria_ActivoF";

$respuesta = ModeloCategoriasActivoF::mdlMostrarCategoriasActivoF($tabla, $taRncEmpresaCategoriaActivoF, $Rnc_Empresa_Categoria_ActivoF);

		return $respuesta;

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/


static public function ctrCrearCategoriaActivoF(){
	if(isset($_POST["nuevaCategoria"])){
		
	if(!preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ().,_# ]+$/', $_POST["nuevaCategoria"])){
		echo '<script>
				swal({
					type: "error",
					title: "¡la Categoria no puede ir vacio o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
						}).then((result)=>{

							if(result.value){
								window.location = "CategoriasActivoRotativos";
							}

							});

				</script>';

		exit;
			
	}
	/***INICIO VALIDACION QUE EL ASIENTO NO SE REPITA***/

	$tabla = "categorias_activof_empresas";
	$taRnc_Empresa_Categoria_ActivoF = "Rnc_Empresa_Categoria_ActivoF";
	$Rnc_Empresa_Categoria_ActivoF = $_POST["RncEmpresaCategoria"];
	$taCodigo_CategoriaActivoF = "Codigo_CategoriaActivoF";
	$Codigo_CategoriaActivoF = $_POST["codigocategorias"];

	
			
$CodigoRepetido = ModeloCategoriasActivoF::MdlCodigoRepetidoF($tabla, $taRnc_Empresa_Categoria_ActivoF, $Rnc_Empresa_Categoria_ActivoF, $taCodigo_CategoriaActivoF, $Codigo_CategoriaActivoF);

	foreach($CodigoRepetido as $key => $value){
		if($value["Rnc_Empresa_Categoria_ActivoF"] == $Rnc_Empresa_Categoria_ActivoF &&  $value["Codigo_CategoriaActivoF"] == $Codigo_CategoriaActivoF){

			echo '<script>
				swal({
					type: "error",
					title: "¡El código de la categoría esta repetido, debe Actualizar la página para que el sistema haga nuevamente el conteo!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
						}).then((result)=>{

							if(result.value){
								window.location = "CategoriasActivoFijo";
							}

							});

				</script>';

		exit;





		}





	}

	date_default_timezone_set('America/Santo_Domingo');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$fechaActual = $fecha.' '.$hora;
				
				$Fecha_Creada = $fechaActual;

				$tabla = "categorias_activof_empresas";
				
				$Nombre_Categoria = $_POST["nuevaCategoria"];
	
$datos = array('Rnc_Empresa_Categoria_ActivoF' => $_POST["RncEmpresaCategoria"], 
	'Codigo_CategoriaActivoF' => $_POST["codigocategorias"], 
	'Nombre_Categoria_ActivoF' => $_POST["nuevaCategoria"], 
	'Fecha_Creada' => $Fecha_Creada, 
	'Usuario_Creador' => $_POST["UsuarioCategoria"]);
			
$respuesta = ModeloCategoriasActivoF::mdlCrearCategoriaActivoF($tabla, $datos);
				
if($respuesta == "ok"){

	
       

      
				$ModuloCategorias = $_POST["ModuloCategorias"];

		switch ($ModuloCategorias) {
              case 'CategoriasActivoFijo':
              echo '<script>
						swal({
							type: "success",
							title: "¡la Categoria de Activos Fijo se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "CategoriasActivoFijo";
									}

									});

						</script>';

                 
                break; 
                case 'productos':
              echo '<script>
						swal({
							type: "success",
							title: "¡la Categoria se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "productos";
									}

									});

						</script>';

                 
                break; 
              
                 case 'productosresumen':
              echo '<script>
						swal({
							type: "success",
							title: "¡la Categoria se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "productosresumen";
									}

									});

						</script>';
					 break; 

			case 'crear-compra-inventario':
              echo '<script>
						swal({
							type: "success",
							title: "¡la Categoria se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "crear-compra-inventario";
									}

									});

						</script>';
					 break; 
              
              
                 }/*cierre swicht*/		

				}


		}/*CIERRE DE FUNCION ISSET*/

	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/


static public function ctrModalEditarCategoriasActivoF($id, $valorid){

	$tabla = "categorias_activof_empresas";

	$respuesta =  ModeloCategoriasActivoF::mdlModalEditarCategoriasActivoF($tabla, $id, $valorid);

	return $respuesta;





}/*CIERRE FUNCICON DE EDITAR CATEGORIAS*/

	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

static public function ctrEditarCategoriaActivoF(){
	
if(isset($_POST["editarCategoria"])){
			
	if(!preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){

				echo '<script>
				swal({
					type: "error",
					title: "¡la Categoria no puede ir vacio o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
						}).then((result)=>{

							if(result.value){
								window.location = "CategoriasActivoFijo";
							}

							});

				</script>';

		exit;
}
				$tabla = "categorias_activof_empresas";
				$id = "id";
				$idCategoria = $_POST["idCategoria"];
				$Rnc_Empresa_Categoria = $_POST["RncEmpresaCategoria"];
				$Nombre_Categoria = $_POST["editarCategoria"];

				date_default_timezone_set('America/Santo_Domingo');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$fechaActual = $fecha.' '.$hora;
				
				$Fecha_Creada = $fechaActual;

				$Usuario_Creador = $_POST["UsuarioCategoria"];

				$respuesta = ModeloCategoriasActivoF::mdlEditarCategoriaActivoF($tabla, $Rnc_Empresa_Categoria, $Nombre_Categoria, $Fecha_Creada, $Usuario_Creador, $idCategoria, $id);
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡la Categoria se ha Modificado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "CategoriasActivoFijo";
									}

									});

						</script>';
				}

		}/*CIERRE DE FUNCION ISSET*/

	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/	

	
	static public function ctrBorrarCategoriaActivoF(){
		if(isset($_GET["idCategoriaActivoF"])){
				$tabla = "categorias_activof_empresas";
				$id = "id";
				$idCategoria = $_GET["idCategoriaActivoF"];

				$respuesta = ModeloCategoriasActivoF::mdlBorrarCategoriaActivoF($tabla, $id, $idCategoria);
				
				if($respuesta == "ok"){

					echo '<script>
						swal({
							type: "success",
							title: "¡la Categoria se ha Borrado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "CategoriasActivoFijo";
									}

									});

						</script>';

				}/*CIERRE DE IF DE CONSULTA DE RESPUESTA*/

		}


	}

	/*********************************
	 		VALIDAR USUARIO
	 **********************************/
	static public function ctrValidarCategoria($Nombre_Categoria, $valorCategoria, $valorRNC){
		
		$tabla = 'categorias_empresas';
		$Rnc_Empresa_Categoria = "Rnc_Empresa_Categoria";
		

				
	$respuesta = ModeloCategorias::MdlValidarCategoria($tabla, $Nombre_Categoria, $valorCategoria, $valorRNC, $Rnc_Empresa_Categoria);
		
		return $respuesta;	 

	}/*CIERRA FUNCION VALIDAR USUARIO*/

	static public function ctrMostrarCategoriasPro($id, $id_categorias, $Rnc_Empresa_Productos){
		$tabla = 'categorias_activor_empresas';
		$taRncEmpresa = "Rnc_Empresa_Categoria_ActivoR";

$respuesta = ModeloCategoriasActivoR::MdlMostrarCategoriasProActivoR($tabla, $id, $id_categorias, $Rnc_Empresa_Productos, $taRncEmpresa);
		
		return $respuesta;	 

	}



}/*CIERRE DE la CLASE CATEGORIAS*/
      



 