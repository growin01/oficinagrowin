<?php 

class ControladorCategoriasActivoR{

	
	 static public function ctrMostrarCategoriasActivoF($Rnc_Empresa_Categoria_ActivoF){

    	$tabla = "categorias_activof_empresas";
    	$taRncEmpresaCategoriaActivoF = "Rnc_Empresa_Categoria_ActivoF";

$respuesta = ModeloCategoriasActivoF::mdlMostrarCategoriasActivoF($tabla, $taRncEmpresaCategoriaActivoF, $Rnc_Empresa_Categoria_ActivoF);

		return $respuesta;

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/


static public function ctrCrearCategoriaActivoR(){
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

	$tabla = "categorias_activor_empresas";
	$taRnc_Empresa_Categoria_ActivoR = "Rnc_Empresa_Categoria_ActivoR";
	$Rnc_Empresa_Categoria_ActivoR = $_POST["RncEmpresaCategoria"];
	$taCodigo_CategoriaActivoR = "Codigo_CategoriaActivoR";
	$Codigo_CategoriaActivoR = $_POST["codigocategorias"];

	
			
$CodigoRepetido = ModeloCategoriasActivoR::MdlCodigoRepetido($tabla, $taRnc_Empresa_Categoria_ActivoR, $Rnc_Empresa_Categoria_ActivoR, $taCodigo_CategoriaActivoR, $Codigo_CategoriaActivoR);

	foreach($CodigoRepetido as $key => $value){
		if($value["Rnc_Empresa_Categoria_ActivoR"] == $Rnc_Empresa_Categoria_ActivoR &&  $value["Codigo_CategoriaActivoR"] == $Codigo_CategoriaActivoR){

			echo '<script>
				swal({
					type: "error",
					title: "¡El código de la categoría esta repetido, debe Actualizar la página para que el sistema haga nuevamente el conteo!",
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





	}

	date_default_timezone_set('America/Santo_Domingo');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$fechaActual = $fecha.' '.$hora;
				
				$Fecha_Creada = $fechaActual;

				$tabla = "categorias_activor_empresas";
				
				$Nombre_Categoria = $_POST["nuevaCategoria"];
	
$datos = array('Rnc_Empresa_Categoria_ActivoR' => $_POST["RncEmpresaCategoria"], 
	'Codigo_CategoriaActivoR' => $_POST["codigocategorias"], 
	'Nombre_Categoria_ActivoR' => $_POST["nuevaCategoria"], 
	'Fecha_Creada' => $Fecha_Creada, 
	'Usuario_Creador' => $_POST["UsuarioCategoria"]);
			
$respuesta = ModeloCategoriasActivoR::mdlCrearCategoriaActivoR($tabla, $datos);
				
if($respuesta == "ok"){

	/*Validar Fichero de productos empresas*/
    $directorioEmpresa = "vistas/img/productosactivor/".$_POST["id_Empresa"];
      
       

      if (!file_exists($directorioEmpresa)) {
          /****CREAMOS DIRECTORIO DONDE de Empresa**/
      
         $CreadirectorioEmpresa = "vistas/img/productosactivor/".$_POST["id_Empresa"];

              mkdir($CreadirectorioEmpresa, 0755);
      }
      
$directorioCategoria = "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["codigocategorias"];
      
       

      if (!file_exists($directorioCategoria)) {
          /****CREAMOS DIRECTORIO DONDE de Empresa**/
      
$CreadirectorioCategoria = "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["codigocategorias"];

         mkdir($CreadirectorioCategoria, 0755);
      }
					$ModuloCategorias = $_POST["ModuloCategorias"];

		switch ($ModuloCategorias) {
              case 'CategoriasActivoRotativos':
              echo '<script>
						swal({
							type: "success",
							title: "¡la Categoria de Activos Rotativos se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "CategoriasActivoRotativos";
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


static public function ctrModalEditarCategoriasActivoR($id, $valorid){

	$tabla = "categorias_activor_empresas";

	$respuesta =  ModeloCategoriasActivoR::mdlModalEditarCategoriasActivoR($tabla, $id, $valorid);

	return $respuesta;





}/*CIERRE FUNCICON DE EDITAR CATEGORIAS*/

	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

static public function ctrEditarCategoriaActivoR(){
	
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
								window.location = "CategoriasActivoRotativos";
							}

							});

				</script>';

		exit;
}
				$tabla = "categorias_activor_empresas";
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

				$respuesta = ModeloCategoriasActivoR::mdlEditarCategoriaActivoR($tabla, $Rnc_Empresa_Categoria, $Nombre_Categoria, $Fecha_Creada, $Usuario_Creador, $idCategoria, $id);
				
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
										window.location = "CategoriasActivoRotativos";
									}

									});

						</script>';
				}

		}/*CIERRE DE FUNCION ISSET*/

	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/	

	
	static public function ctrBorrarCategoriaActivoR(){
		if(isset($_GET["idCategoriaActivoR"])){
				$tabla = "categorias_activor_empresas";
				$id = "id";
				$idCategoria = $_GET["idCategoriaActivoR"];

				$respuesta = ModeloCategoriasActivoR::mdlBorrarCategoriaActivoR($tabla, $id, $idCategoria);
				
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
										window.location = "CategoriasActivoRotativos";
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
      



 