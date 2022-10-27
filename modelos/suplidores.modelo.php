<?php 

require_once "conexion.php";


class ModeloSuplidores{


	static public function mdlCrearsuplidor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Suplidor, Tipo_Suplidor, Nombre_Suplidor, Documento_Suplidor, Email, Telefono, Direccion, Usuario_Creador, Estado) VALUES (:Rnc_Empresa_Suplidor, :Tipo_Suplidor, :Nombre_Suplidor, :Documento_Suplidor, :Email, :Telefono, :Direccion, :Usuario_Creador, :Estado)");

		$stmt ->bindParam(":Rnc_Empresa_Suplidor", $datos["Rnc_Empresa_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Suplidor", $datos["Tipo_Suplidor"], PDO::PARAM_INT);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Documento_Suplidor", $datos["Documento_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Email", $datos["Email"], PDO::PARAM_STR);
		$stmt ->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt ->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;




	}/*CIERRO FUNCION CREAR*/

	

	/************************
		MOSTRAR suplidores
	************************/

	static public function mdlMostrarSuplidores($tabla, $taRncEmpresaSuplidores, $Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor){

		if($id_Suplidor != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id_Suplidor = :$id_Suplidor AND $taRncEmpresaSuplidores = :$taRncEmpresaSuplidores ORDER BY Nombre_Suplidor");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_Suplidor, $Valor_idSuplidor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaSuplidores, $Rnc_Empresa_Suplidor, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




		} else { 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaSuplidores = :$taRncEmpresaSuplidores ORDER BY Nombre_Suplidor");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaSuplidores, $Rnc_Empresa_Suplidor, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		}






	}/*CIERRO FUNCION MOSTRAR CLIENTES*/
	static public function mdlModalEditarSuplidor($tabla, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	

		$stmt -> execute();


		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;





	}/*CIERRO FUNCION MOSTRAR CLIENTES*/


static public function mdlMostrarSuplidorRNC($tabla, $taRncEmpresaSuplidores, $Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor){

		

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id_Suplidor = :$id_Suplidor AND $taRncEmpresaSuplidores = :$taRncEmpresaSuplidores ORDER BY Nombre_Suplidor");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_Suplidor, $Valor_idSuplidor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaSuplidores, $Rnc_Empresa_Suplidor, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




		}

	static public function mdlEditarsuplidor($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Suplidor = :Rnc_Empresa_Suplidor, Tipo_Suplidor = :Tipo_Suplidor, Nombre_Suplidor = :Nombre_Suplidor, Documento_Suplidor = :Documento_Suplidor , Email = :Email, Telefono = :Telefono, Direccion = :Direccion, Usuario_Creador = :Usuario_Creador, Estado = :Estado WHERE id = :id");


		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		$stmt ->bindParam(":Rnc_Empresa_Suplidor", $datos["Rnc_Empresa_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Suplidor", $datos["Tipo_Suplidor"], PDO::PARAM_INT);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Documento_Suplidor", $datos["Documento_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Email", $datos["Email"], PDO::PARAM_STR);
		$stmt ->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt ->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;




	}/*CIERRO FUNCION CREAR*/

	/* *******************************
			ELIMINAR SUPLIDOR
	**********************************/

	static public function mdlEliminarsuplidor($tabla, $id, $Valor_idSuplidor){

		
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $Valor_idSuplidor, PDO::PARAM_STR);
		
	if($stmt -> execute()){

		return "ok";



	} else {

		return "error";



	}
	


		
		$stmt -> close();
		$stmt = null;

	} /* CIERRE DE MODELO ELIMINAR SUPLIDOR*/

static public function mdlMostrarSuplidorFact($tabla, $taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, $taDocumento, $Documento){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_Suplidor = :$taRnc_Empresa_Suplidor AND $taDocumento = :$taDocumento");

		$stmt -> bindParam(":".$taDocumento, $Documento, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_Suplidor, $Rnc_Empresa_Suplidor, PDO::PARAM_STR);
	


		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;





	}/*CIERRO FUNCION MOSTRAR CLIENTES*/




	




}/*CIERRO CLASS DE CLIENTE*/




