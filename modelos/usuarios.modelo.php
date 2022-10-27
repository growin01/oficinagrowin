<?php 
require_once "conexion.php";

class ModeloUsuarios{

	

	static public function MdlLoginUsuario($tabla, $Usuario, $taUsuario, $taRncEmpresaUsuario, $RncEmpresaUsuario){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taUsuario = :$taUsuario AND $taRncEmpresaUsuario = :$taRncEmpresaUsuario");

		$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaUsuario, $RncEmpresaUsuario, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


		

	} /* CIERRE funcion MDLlOGINuSUAIO*/
/***************************************CIERRE DE FUNCION DE INICIO LOGIN USUARIO***********************************/
	

/**********************************************************************************************************
									INICIO DE FUNCION DE Crear Usuario
	***********************************************************************************************************/
	static public function MdlCrearUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Usuario, Nombre, Usuario, Password, Perfil, Foto, emailusuario, Estado, Descuento) VALUES (:Rnc_Empresa_Usuario, :Nombre, :Usuario, :Password, :Perfil, :Foto, :emailusuario, :Estado, :Descuento)");


		$stmt ->bindParam(":Rnc_Empresa_Usuario", $datos["Rnc_Empresa_Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
		$stmt ->bindParam(":Perfil", $datos["Perfil"], PDO::PARAM_STR);
		$stmt ->bindParam(":Foto", $datos["Foto"], PDO::PARAM_STR);
		$stmt ->bindParam(":emailusuario", $datos["emailusuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descuento", $datos["Descuento"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion CREAR USUARIO*/
	static public function MdlCrearUsuarioEmpresas($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Usuario, Nombre, Usuario, Password, Perfil, Foto, Estado) VALUES (:Rnc_Empresa_Usuario, :Nombre, :Usuario, :Password, :Perfil, :Foto, :Estado)");


		$stmt ->bindParam(":Rnc_Empresa_Usuario", $datos["Rnc_Empresa_Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
		$stmt ->bindParam(":Perfil", $datos["Perfil"], PDO::PARAM_STR);
		$stmt ->bindParam(":Foto", $datos["Foto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion CREAR USUARIO*/
	static public function MdlCrearUsuarioPRO($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Usuario, Nombre, Usuario, Password, Perfil, Foto, Estado, Descuento) VALUES (:Rnc_Empresa_Usuario, :Nombre, :Usuario, :Password, :Perfil, :Foto, :Estado, :Descuento)");


		$stmt ->bindParam(":Rnc_Empresa_Usuario", $datos["Rnc_Empresa_Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
		$stmt ->bindParam(":Perfil", $datos["Perfil"], PDO::PARAM_STR);
		$stmt ->bindParam(":Foto", $datos["Foto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);
		$stmt ->bindParam(":Descuento", $datos["Descuento"], PDO::PARAM_INT);


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion CREAR USUARIO*/
	static public function MdllogueoUsuarioEmpresas($tabla, $datos){

		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Usuario, Nombre_Empresa, Nombre_Usuario, Perfil, Fecha_AnoMes, Fecha_Dia, Fecha_Login) VALUES (:Rnc_Empresa_Usuario, :Nombre_Empresa, :Nombre_Usuario, :Perfil, :Fecha_AnoMes, :Fecha_Dia, :Fecha_Login)");


		$stmt ->bindParam(":Rnc_Empresa_Usuario", $datos["Rnc_Empresa_Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Empresa", $datos["Nombre_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Usuario", $datos["Nombre_Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Perfil", $datos["Perfil"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_AnoMes", $datos["Fecha_AnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Dia", $datos["Fecha_Dia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Login", $datos["Fecha_Login"], PDO::PARAM_STR);




		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion CREAR USUARIO*/
/***************************************CIERRE DE FUNCION CREAR USUARIOS***********************************/

/**********************************************************************************************************
									INICIO DE FUNCION DE MOSTRAR USUARIO
	***********************************************************************************************************/

	static public function MdlMostrarUsuarios($tabla, $taRncEmpresaUsuario, $RncEmpresaUsuario){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaUsuario = :$taRncEmpresaUsuario ORDER BY Nombre ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaUsuario, $RncEmpresaUsuario, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	} /* CIERRE funcion MDLlOGINuSUAIO*/
	static public function MdlMostrarlogueoUsuarios($tabla, $taRncEmpresaUsuario, $RncEmpresaUsuario){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaUsuario = :$taRncEmpresaUsuario ORDER BY id DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaUsuario, $RncEmpresaUsuario, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	} /* CIERRE funcion MDLlOGINuSUAIO*/
/***************************************CIERRE DE FUNCION DE MOSTRAR USUARIO***********************************/

	/**********************************************************************************************************
									INICIO DE FUNCION DE MODLA EDITar USUARIO
	***********************************************************************************************************/

	static public function MdlModalEditarUsuario($tabla, $id, $idUsuario){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $idUsuario, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion MDLlOGINuSUAIO*/
/***************************************CIERRE DE FUNCION DE Modal editar USUARIO**********************************/


/**********************************************************************************************************
									INICIO DE FUNCION DE EDITAR Usuario
	***********************************************************************************************************/
	static public function MdlEditarUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Usuario = :Rnc_Empresa_Usuario, Nombre =  :Nombre, Usuario = :Usuario, Password = :Password, Perfil = :Perfil, Foto = :Foto, emailusuario = :emailusuario WHERE Usuario = :Usuario AND Rnc_Empresa_Usuario = :Rnc_Empresa_Usuario");


		$stmt ->bindParam(":Rnc_Empresa_Usuario", $datos["Rnc_Empresa_Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre", $datos["Nombre"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
		$stmt ->bindParam(":Password", $datos["Password"], PDO::PARAM_STR);
		$stmt ->bindParam(":Perfil", $datos["Perfil"], PDO::PARAM_STR);
		$stmt ->bindParam(":Foto", $datos["Foto"], PDO::PARAM_STR);
		$stmt ->bindParam(":emailusuario", $datos["emailusuario"], PDO::PARAM_STR);




		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion CREAR USUARIO*/
/***************************************CIERRE DE FUNCION editar USUARIOS***********************************/

/*******************************************************************
			INICIO DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS
********************************************************************/
static public function MdlActualizarUsuarios($tabla, $Estado, $id, $activarUsuario, $valorid){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $Estado = :$Estado WHERE $id = :$id");

		$stmt ->bindParam(":".$Estado, $activarUsuario, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $valorid, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/


	
	/*******************************************************************
			INICIO DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS
********************************************************************/

	static public function MdlUtimoLoginUsuario($tabla, $id, $valorid, $Ultimo_Login, $valorlogin){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $Ultimo_Login = :$Ultimo_Login WHERE $id = :$id");

		$stmt ->bindParam(":".$Ultimo_Login, $valorlogin, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $valorid, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/

	/****************************************************
		INICIO DE FUNCION DE validar USUARIO
	***********************************************************************************************************/

	static public function MdlValidarUsuario($tabla, $Usuario, $valorUsuario, $Rnc_Empresa_Usuario, $valorRNC){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $Usuario = :$Usuario AND $Rnc_Empresa_Usuario = :$Rnc_Empresa_Usuario");

		$stmt -> bindParam(":".$Rnc_Empresa_Usuario, $valorRNC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$Usuario, $valorUsuario, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/
	/**************************************************************
		INICIO DE FUNCION DE ELIMINAR USUARIO
	****************************************************************/
	static public function MdlEliminarUsuario($tabla, $id, $idUsuario){

		
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $id = :$id");
	
	$stmt -> bindParam(":".$id, $idUsuario, PDO::PARAM_STR);
	
		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/*CIERRE DE FUNCION BORRAR USUARIO*/

static public function MdlValidarUsuarios($tabla, $datos){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Usuario = :Rnc_Empresa_Usuario AND id = :id");

$stmt -> bindParam(":Rnc_Empresa_Usuario", $datos["Rnc_Empresa_Usuario"], PDO::PARAM_STR);
$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/




}/*CIERRE DE CLASSE DE MODELO USUARIO*/