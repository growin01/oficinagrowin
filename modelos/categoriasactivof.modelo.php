<?php 

require_once "conexion.php";


 class ModeloCategoriasActivoF{ 

 
 	static public function MdlCodigoRepetidoF($tabla, $taRnc_Empresa_Categoria_ActivoF, $Rnc_Empresa_Categoria_ActivoF, $taCodigo_CategoriaActivoF, $Codigo_CategoriaActivoF){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_Categoria_ActivoF = :$taRnc_Empresa_Categoria_ActivoF AND $taCodigo_CategoriaActivoF = :$taCodigo_CategoriaActivoF");

$stmt -> bindParam(":".$taRnc_Empresa_Categoria_ActivoF, $Rnc_Empresa_Categoria_ActivoF, PDO::PARAM_STR);
$stmt -> bindParam(":".$taCodigo_CategoriaActivoF, $Codigo_CategoriaActivoF, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	}

 	static public function mdlCrearCategoriaActivoF($tabla, $datos){
 

$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Categoria_ActivoF, Codigo_CategoriaActivoF, Nombre_Categoria_ActivoF, Fecha_Creada, Usuario_Creador) VALUES (:Rnc_Empresa_Categoria_ActivoF, :Codigo_CategoriaActivoF, :Nombre_Categoria_ActivoF, :Fecha_Creada, :Usuario_Creador)");


$stmt ->bindParam(":Rnc_Empresa_Categoria_ActivoF", $datos["Rnc_Empresa_Categoria_ActivoF"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo_CategoriaActivoF", $datos["Codigo_CategoriaActivoF"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Categoria_ActivoF", $datos["Nombre_Categoria_ActivoF"] , PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Creada", $datos["Fecha_Creada"], PDO::PARAM_STR);
$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/

 /******************************************
 	INICIO Mostrar Categorias

 ********************************************/
 	static public function mdlMostrarCategoriasActivoF($tabla, $taRncEmpresaCategoriaActivoF, $Rnc_Empresa_Categoria_ActivoF){
 		
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCategoriaActivoF = :$taRncEmpresaCategoriaActivoF");

		
$stmt -> bindParam(":".$taRncEmpresaCategoriaActivoF, $Rnc_Empresa_Categoria_ActivoF, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/


	/******************************************
 	INICIO Editar Categorias

 	********************************************/
	static public function mdlModalEditarCategoriasActivoF($tabla, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}/*CIERRO EDITAR CATEGORIA*/

	/*********************************************
	INICIO DE FUNCION EDITAR CATEGORIAS
 	*************************************/

 	static public function mdlEditarCategoriaActivoF($tabla, $Rnc_Empresa_Categoria, $Nombre_Categoria, $Fecha_Creada, $Usuario_Creador, $idCategoria, $id){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Categoria_ActivoF = :Rnc_Empresa_Categoria_ActivoF, Nombre_Categoria_ActivoF = :Nombre_Categoria_ActivoF, Fecha_Creada = :Fecha_Creada, Usuario_Creador = :Usuario_Creador WHERE id = :id");

		$stmt ->bindParam(":id", $idCategoria, PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Empresa_Categoria_ActivoF", $Rnc_Empresa_Categoria, PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Categoria_ActivoF", $Nombre_Categoria, PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Creada", $Fecha_Creada, PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario_Creador", $Usuario_Creador, PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/
	 
	 /************************************************
	 		BORRAR CATEGORIAS
	 ************************************************/
	 		static public function mdlBorrarCategoriaActivoF($tabla, $id, $idCategoria){

	 			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $idCategoria, PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	 		}

	/****************************************************
		INICIO DE FUNCION DE validar USUARIO
	*****************************************************/

	static public function MdlValidarCategoria($tabla, $Nombre_Categoria, $valorCategoria, $valorRNC, $Rnc_Empresa_Categoria){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $Nombre_Categoria = :$Nombre_Categoria AND $Rnc_Empresa_Categoria = :$Rnc_Empresa_Categoria");

		$stmt -> bindParam(":".$Rnc_Empresa_Categoria, $valorRNC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$Nombre_Categoria, $valorCategoria, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/

	static public function MdlMostrarCategoriasProActivoR($tabla, $id, $id_categorias, $Rnc_Empresa_Productos, $taRncEmpresa){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id AND $taRncEmpresa = :$taRncEmpresa");

		$stmt -> bindParam(":".$taRncEmpresa, $Rnc_Empresa_Productos, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $id_categorias, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	






	}
		








}/*CIERRO CLASE MODELO DE CATEGORIAS*/
				