<?php 

require_once "conexion.php";


 class ModeloProgramador{ 

 	static public function MdlGrowinDgii($tabla){

 	

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	
	} /* CIERRE funcion MDLlOGINuSUAIO*/
	static public function mdlSelectGrowinDgii($tabla, $id, $valorid){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

	$stmt ->bindParam(":".$id, $valorid, PDO::PARAM_STR);
		
	$stmt -> execute();

	return $stmt -> fetchAll();
	$stmt -> close();
	$stmt = null;



}


	
 	static public function mdlBorrarGrowinDgii($tabla, $id, $valorid){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $id = :$id");

	$stmt ->bindParam(":$id", $valorid, PDO::PARAM_STR);
		
		
	if($stmt->execute()){
			return "ok";

	}else{

			return "error";

	}

	$stmt -> close();
	$stmt = null;


}


 	static public function mdlAgregarSuplidor($tabla, $taRnc_Growin_DGII, $Rnc_Growin_DGII, $taNombre_Empresa_Growin, $Nombre_Empresa_Growin){

 		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Growin_DGII, Nombre_Empresa_Growin) VALUES (:Rnc_Growin_DGII, :Nombre_Empresa_Growin)");


 		$stmt -> bindParam(":Rnc_Growin_DGII", $Rnc_Growin_DGII, PDO::PARAM_STR);
 		$stmt -> bindParam(":Nombre_Empresa_Growin", $Nombre_Empresa_Growin, PDO::PARAM_STR);
 		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/

	static public function mdlEditarSuplidor($tabla, $taRnc_Growin_DGII, $Rnc_Growin_DGII, $taNombre_Empresa_Growin, $Nombre_Empresa_Growin){

 		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Growin_DGII = :Rnc_Growin_DGII, Nombre_Empresa_Growin =  :Nombre_Empresa_Growin WHERE id = :id");


		$stmt ->bindParam(":Rnc_Growin_DGII", $datos["Rnc_Growin_DGII"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Empresa_Growin", $datos["Nombre_Empresa_Growin"], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/



}/*CIERRO CLASE MODELO DE CATEGORIAS*/
				