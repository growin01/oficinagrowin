<?php 

class ControladorCategorias{

	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

	static public function ctrCrearCategoria(){
		if(isset($_POST["nuevaCategoria"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])){
				$tabla = "categorias_empresas";
				$Rnc_Empresa_Categoria = $_POST["RncEmpresaCategoria"];
				$Nombre_Categoria = $_POST["nuevaCategoria"];

				date_default_timezone_set('America/Santo_Domingo');

					$fecha = date('Y-m-d');
					$hora = date('H:i:s');
					$fechaActual = $fecha.' '.$hora;
				
				$Fecha_Creada = $fechaActual;

				$Usuario_Creador = $_POST["UsuarioCategoria"];

				$respuesta = ModeloCategorias::mdlCrearCategoria($tabla, $Rnc_Empresa_Categoria, $Nombre_Categoria, $Fecha_Creada, $Usuario_Creador);
				
				if($respuesta == "ok"){
					$ModuloCategorias = $_POST["ModuloCategorias"];

		switch ($ModuloCategorias) {
              case 'categorias':
              echo '<script>
						swal({
							type: "success",
							title: "¡la Categoria se ha Guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar",
							closeOnConfirm: false
								}).then((result)=>{

									if(result.value){
										window.location = "categorias";
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



			}/*CIERRE DE FUNCION PREG_MATCH*/
		else {
			echo '<script>
				swal({
					type: "error",
					title: "¡la Categoria no puede ir vacio o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
						}).then((result)=>{

							if(result.value){
								window.location = "categorias";
							}

							});

				</script>';





		} 



		}/*CIERRE DE FUNCION ISSET*/





	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/

	/***************************CIERRE DE FUNCION DE CATEGORIAS**********************/

	
    static public function ctrMostrarCategorias($Rnc_Empresa_Categoria){

    	$tabla = "categorias_empresas";
    	$taRncEmpresaCategoria = "Rnc_Empresa_Categoria";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $taRncEmpresaCategoria, $Rnc_Empresa_Categoria);

		return $respuesta;

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/


static public function ctrModalEditarCategorias($id, $valorid){

	$tabla = "categorias_empresas";

	$respuesta = ModeloCategorias::mdlModalEditarCategorias($tabla, $id, $valorid);

	return $respuesta;





}/*CIERRE FUNCICON DE EDITAR CATEGORIAS*/

	/***************************************************
			INICIO DE CREAR CATEGORIAS
	******************************************************/

	static public function ctrEditarCategoria(){
		if(isset($_POST["editarCategoria"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){
				$tabla = "categorias_empresas";
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

				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $Rnc_Empresa_Categoria, $Nombre_Categoria, $Fecha_Creada, $Usuario_Creador, $idCategoria, $id);
				
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
										window.location = "categorias";
									}

									});

						</script>';


				}



			}/*CIERRE DE FUNCION PREG_MATCH*/
		else {
			echo '<script>
				swal({
					type: "error",
					title: "¡la Categoria no puede ir vacio o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false
						}).then((result)=>{

							if(result.value){
								window.location = "categorias";
							}

							});

				</script>';

		} 



		}/*CIERRE DE FUNCION ISSET*/



	}/*CIERRE DE FUNCION CREAR CATEGORIAS*/	

	/***************************************************
		BORRAR CATEGORIAS
	*****************************************************/

	static public function ctrBorrarCategoria(){
		if(isset($_GET["idCategoria"])){
				$tabla = "categorias_empresas";
				$id = "id";
				$idCategoria = $_GET["idCategoria"];

				$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $id, $idCategoria);
				
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
										window.location = "categorias";
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

	static public function ctrMostrarCategoriasPro($id, $id_categorias){
		$tabla = 'categorias_empresas';

		$respuesta = ModeloCategorias::MdlMostrarCategoriasPro($tabla, $id, $id_categorias);
		
		return $respuesta;	 

	}



}/*CIERRE DE la CLASE CATEGORIAS*/
      



 