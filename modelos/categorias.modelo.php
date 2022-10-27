<?php 

require_once "conexion.php";


 class ModeloCategorias{ 

 
 	/**********************************
 	INICIO DE FUNCION CREAR CATEGORIAS
 	*************************************/

 	static public function mdlCrearCategoria($tabla, $Rnc_Empresa_Categoria, $Nombre_Categoria, $Fecha_Creada, $Usuario_Creador){

 		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Categoria, Nombre_Categoria, Fecha_Creada, Usuario_Creador) VALUES (:Rnc_Empresa_Categoria, :Nombre_Categoria, :Fecha_Creada, :Usuario_Creador)");


		$stmt ->bindParam(":Rnc_Empresa_Categoria", $Rnc_Empresa_Categoria, PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Categoria", $Nombre_Categoria, PDO::PARAM_STR);
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

 /******************************************
 	INICIO Mostrar Categorias

 ********************************************/
 	static public function mdlMostrarCategorias($tabla, $taRncEmpresaCategoria, $Rnc_Empresa_Categoria){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCategoria = :$taRncEmpresaCategoria");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaCategoria, $Rnc_Empresa_Categoria, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/


	/******************************************
 	INICIO Editar Categorias

 	********************************************/
	static public function mdlModalEditarCategorias($tabla, $id, $valorid){

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

 	static public function mdlEditarCategoria($tabla, $Rnc_Empresa_Categoria, $Nombre_Categoria, $Fecha_Creada, $Usuario_Creador, $idCategoria, $id){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Categoria = :Rnc_Empresa_Categoria, Nombre_Categoria = :Nombre_Categoria, Fecha_Creada = :Fecha_Creada, Usuario_Creador = :Usuario_Creador WHERE id = :id");

		$stmt ->bindParam(":id", $idCategoria, PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Empresa_Categoria", $Rnc_Empresa_Categoria, PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Categoria", $Nombre_Categoria, PDO::PARAM_STR);
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
	 		static public function mdlBorrarCategoria($tabla, $id, $idCategoria){

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

	static public function MdlMostrarCategoriasPro($tabla, $id, $id_categorias){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $id_categorias, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	






	}
		








}/*CIERRO CLASE MODELO DE CATEGORIAS*/
				