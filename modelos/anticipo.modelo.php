<?php 

require_once "conexion.php";


 class ModeloAnticipo{ 

 
 	static public function mdlMostrarAnticipo($tabla, $datos){
 		

 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Banco = :Rnc_Empresa_Banco AND id_grupo = :id_grupo AND id_categoria = :id_categoria AND id_generica = :id_generica AND TipoCuenta = :TipoCuenta");

		$stmt -> bindParam(":Rnc_Empresa_Banco", $datos["Rnc_Empresa_Banco"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_generica", $datos["id_generica"], PDO::PARAM_STR);
		$stmt -> bindParam(":TipoCuenta", $datos["TipoCuenta"], PDO::PARAM_STR);
		
		
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
	static public function mdlEditarAnticipo($tabla, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}/*CIERRO EDITAR CATEGORIA*/

	static public function mdlMostrarRendicionAnticipos($tabla, $taRnc_Empresa_Anticipo, $Rnc_Empresa_Anticipo){
 		

 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Anticipo = :$taRnc_Empresa_Anticipo ORDER BY id DESC");

		$stmt -> bindParam(":$taRnc_Empresa_Anticipo", $Rnc_Empresa_Anticipo, PDO::PARAM_STR);
		
		
		
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

static public function mdlMostraridRendicion($tabla, $taid, $valorid){
 		

 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taid = :$taid");

		$stmt -> bindParam(":$taid", $valorid, PDO::PARAM_STR);
		
		
		
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
	static public function mdlDetalleAnticipo($tabla, $datos){
 		

 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_LD = :Rnc_Empresa_LD AND id_grupo = :id_grupo AND id_categoria = :id_categoria AND id_generica = :id_generica AND id_cuenta = :id_cuenta");

		$stmt -> bindParam(":Rnc_Empresa_LD", $datos["Rnc_Empresa_LD"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_generica", $datos["id_generica"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_cuenta", $datos["id_cuenta"], PDO::PARAM_STR);
		
		
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

 	

	static public function MdlEliminarAnticipo($tabla, $id, $valorid){

		
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $id = :$id");
	
	$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	
		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/*CIERRE DE FUNCION BORRAR USUARIO*/

	static public function MdlActualizarFondo($tabla, $Estado, $id, $idFondo, $valorid){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $Estado = :$Estado WHERE $id = :$id");

		$stmt ->bindParam(":".$Estado, $valorid, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $idFondo, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/

	
static public function mdlEditarOtorgarAnticipo($tabla, $taRnc_Empresa_LD, $taExtraer_NAsiento, $taNAsiento, $Rnc_Empresa_LD, $Extraer_NAsiento, $NAsiento){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taExtraer_NAsiento = :$taExtraer_NAsiento AND $taNAsiento = :$taNAsiento");

		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taExtraer_NAsiento, $Extraer_NAsiento, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

	}







}/*CIERRO CLASE MODELO DE CATEGORIAS*/
				