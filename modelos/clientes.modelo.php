<?php 

require_once "conexion.php";


class ModeloClientes{


	static public function mdlCrearCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Cliente, Tipo_Cliente, Nombre_Cliente, Documento, Email, Telefono, Direccion, Fecha_Nacimiento) VALUES (:Rnc_Empresa_Cliente, :Tipo_Cliente, :Nombre_Cliente, :Documento, :Email, :Telefono, :Direccion, :Fecha_Nacimiento)");

		$stmt ->bindParam(":Rnc_Empresa_Cliente", $datos["Rnc_Empresa_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Cliente", $datos["Tipo_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Documento", $datos["Documento"], PDO::PARAM_STR);
	    $stmt ->bindParam(":Email", $datos["Email"], PDO::PARAM_STR);
		$stmt ->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt ->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Nacimiento", $datos["Fecha_Nacimiento"], PDO::PARAM_STR);
		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;




	}/*CIERRO FUNCION CREAR*/


	static public function mdlMostrarClientes($tabla, $taRncEmpresaClientes, $Rnc_Empresa_Cliente){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaClientes = :$taRncEmpresaClientes ORDER BY Nombre_Cliente");

	
		$stmt -> bindParam(":".$taRncEmpresaClientes, $Rnc_Empresa_Cliente, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;





	}/*CIERRO FUNCION MOSTRAR CLIENTES*/
	static public function mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_Cliente = :$taRnc_Empresa_Cliente AND $taDocumento = :$taDocumento");

		$stmt -> bindParam(":".$taDocumento, $Documento, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, PDO::PARAM_STR);
	


		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;





	}/*CIERRO FUNCION MOSTRAR CLIENTES*/
	static public function mdlMostrarClientesid($tablaClientes, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaClientes WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;





	}/*CIERRO FUNCION MOSTRAR CLIENTES*/

static public function mdlMostrarClientesid_2($tablaClientes_2, $id_2, $valorid_2){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaClientes_2 WHERE $id_2 = :$id_2");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_2, $valorid_2, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;





	}/*CIERRO FUNCION MOSTRAR CLIENTES*/

	static public function mdlModalEditarClientes($tabla, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	

		$stmt -> execute();


		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;





	}/*CIERRO FUNCION MOSTRAR CLIENTES*/
static public function mdlBuscarCliente($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $id, $valorid){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Cliente = :$taRnc_Empresa_Cliente AND $id = :$id");

	$stmt -> bindParam(":".$taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, PDO::PARAM_STR);
	$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	

	$stmt -> execute();


		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;





	}/*CIERRO FUNCION MOSTRAR CLIENTES*/

	static public function mdleditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Cliente = :Rnc_Empresa_Cliente, Tipo_Cliente = :Tipo_Cliente, Nombre_Cliente = :Nombre_Cliente, Documento = :Documento, Email = :Email, Telefono = :Telefono, Direccion = :Direccion, Fecha_Nacimiento = :Fecha_Nacimiento WHERE id = :id");

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_Cliente", $datos["Rnc_Empresa_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Cliente", $datos["Tipo_Cliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Documento", $datos["Documento"], PDO::PARAM_STR);
		$stmt ->bindParam(":Email", $datos["Email"], PDO::PARAM_STR);
		$stmt ->bindParam(":Telefono", $datos["Telefono"], PDO::PARAM_STR);
		$stmt ->bindParam(":Direccion", $datos["Direccion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Nacimiento", $datos["Fecha_Nacimiento"], PDO::PARAM_STR);
		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;




	}/*CIERRO FUNCION CREAR*/

	/************************************************
	 		BORRAR CLIENTES
	 ************************************************/
	 static public function mdlBorrarCliente($tabla, $id, $idCliente){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $idCliente, PDO::PARAM_STR);
		
		
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

	static public function MdlValidarCliente($tabla, $Nombre_Cliente, $valorCliente, $valorRNC, $Rnc_Empresa_Cliente){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $Nombre_Cliente = :$Nombre_Cliente AND $Rnc_Empresa_Cliente = :$Rnc_Empresa_Cliente");

		$stmt -> bindParam(":".$Rnc_Empresa_Cliente, $valorRNC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$Nombre_Cliente, $valorCliente, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/
	static public function MdlTablaDGII($tabla, $Rnc_DGII, $RncCliente){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $Rnc_DGII = :$Rnc_DGII");

		$stmt -> bindParam(":".$Rnc_DGII, $RncCliente, PDO::PARAM_STR);
		

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/

	/******************************************************************
				Actualizar CLIENTE COMPRAR
		********************************************************************/

static public function MdlActualizarClienteComprar($tablaClientes,$item, $valor, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("UPDATE $tablaClientes SET $item = :$item WHERE $id = :$id");

		$stmt ->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $valorid, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

}/*CIERRO FUNCION ACTULIZAR PRODUCTO*/

static public function MdlActualizarClienteComprar_2($tablaClientes_2, $item_2, $valor_2, $id_2, $valorid_2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tablaClientes_2 SET $item_2 = :$item_2 WHERE $id_2 = :$id_2");

		$stmt ->bindParam(":".$item_2, $valor_2, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id_2, $valorid_2, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

}/*CIERRO FUNCION ACTULIZAR PRODUCTO*/

static public function MdlValidarClientes($tabla, $datos){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Cliente = :Rnc_Empresa_Cliente AND Documento = :Documento AND id = :id");

$stmt -> bindParam(":Rnc_Empresa_Cliente", $datos["Rnc_Empresa_Cliente"], PDO::PARAM_STR);
$stmt -> bindParam(":Documento", $datos["Documento"], PDO::PARAM_STR);
$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/




}/*CIERRO CLASS DE CLIENTE*/




