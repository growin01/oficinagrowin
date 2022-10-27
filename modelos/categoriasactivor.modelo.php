<?php 

require_once "conexion.php";


 class ModeloCategoriasActivoR{ 

 
 	static public function MdlCodigoRepetido($tabla, $taRnc_Empresa_Categoria_ActivoR, $Rnc_Empresa_Categoria_ActivoR, $taCodigo_CategoriaActivoR, $Codigo_CategoriaActivoR){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_Categoria_ActivoR = :$taRnc_Empresa_Categoria_ActivoR AND $taCodigo_CategoriaActivoR = :$taCodigo_CategoriaActivoR");

$stmt -> bindParam(":".$taRnc_Empresa_Categoria_ActivoR, $Rnc_Empresa_Categoria_ActivoR, PDO::PARAM_STR);
$stmt -> bindParam(":".$taCodigo_CategoriaActivoR, $Codigo_CategoriaActivoR, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	}

 	static public function mdlCrearCategoriaActivoR($tabla, $datos){
 

$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Categoria_ActivoR, Codigo_CategoriaActivoR, Nombre_Categoria_ActivoR, Fecha_Creada, Usuario_Creador) VALUES (:Rnc_Empresa_Categoria_ActivoR, :Codigo_CategoriaActivoR, :Nombre_Categoria_ActivoR, :Fecha_Creada, :Usuario_Creador)");


$stmt ->bindParam(":Rnc_Empresa_Categoria_ActivoR", $datos["Rnc_Empresa_Categoria_ActivoR"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo_CategoriaActivoR", $datos["Codigo_CategoriaActivoR"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Categoria_ActivoR", $datos["Nombre_Categoria_ActivoR"] , PDO::PARAM_STR);
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
 	static public function mdlMostrarCategoriasActivoR($tabla, $taRncEmpresaCategoriaActivoR, $Rnc_Empresa_Categoria_ActivoR){
 		
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCategoriaActivoR = :$taRncEmpresaCategoriaActivoR");

		
$stmt -> bindParam(":".$taRncEmpresaCategoriaActivoR, $Rnc_Empresa_Categoria_ActivoR, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/


	/******************************************
 	INICIO Editar Categorias

 	********************************************/
	static public function mdlModalEditarCategoriasActivoR($tabla, $id, $valorid){

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

 	static public function mdlEditarCategoriaActivoR($tabla, $Rnc_Empresa_Categoria, $Nombre_Categoria, $Fecha_Creada, $Usuario_Creador, $idCategoria, $id){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Categoria_ActivoR = :Rnc_Empresa_Categoria_ActivoR, Nombre_Categoria_ActivoR = :Nombre_Categoria_ActivoR, Fecha_Creada = :Fecha_Creada, Usuario_Creador = :Usuario_Creador WHERE id = :id");

		$stmt ->bindParam(":id", $idCategoria, PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Empresa_Categoria_ActivoR", $Rnc_Empresa_Categoria, PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Categoria_ActivoR", $Nombre_Categoria, PDO::PARAM_STR);
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
				