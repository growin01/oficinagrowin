<?php 

require_once "conexion.php";


class ModeloCotizacion{

	static public function mdlMostrarCotizaciones($tabla, $taRncEmpresacotizacion, $Rnc_Empresa_Cotizacion, $periodocotizacion){

		if($periodocotizacion == "TODO"){ 

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresacotizacion = :$taRncEmpresacotizacion ORDER BY id DESC");
		 }else{

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresacotizacion = :$taRncEmpresacotizacion AND SUBSTRING(FechaAnoMes, 1, 4) = $periodocotizacion ORDER BY id DESC");
              }


		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresacotizacion, $Rnc_Empresa_Cotizacion, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}
	static public function mdlMostrarCodigoCotizaciones($tabla, $taRncEmpresacotizacion, $Rnc_Empresa_Cotizacion){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresacotizacion = :$taRncEmpresacotizacion ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresacotizacion, $Rnc_Empresa_Cotizacion, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

	static public function MdlCotizacionesRepetida($tabla, $taRnc_Empresa_Cotizacion, $Rnc_Empresa_Cotizacion, $taCodigo, $Codigo, $taCorre_Cotizacion, $Corre_Cotizacion){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Cotizacion = :$taRnc_Empresa_Cotizacion AND $taCodigo = :$taCodigo AND $taCorre_Cotizacion = :$taCorre_Cotizacion");

		$stmt -> bindParam(":".$taRnc_Empresa_Cotizacion, $Rnc_Empresa_Cotizacion, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCodigo, $Codigo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCorre_Cotizacion, $Corre_Cotizacion, PDO::PARAM_STR);
	
	
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}

	/**********************************************************************
			REGISTRO DE VENTA
	************************************************************************/

	static public function mdlIngresarCotizaciones($tabla, $datos){

$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Cotizacion, Codigo, Rnc_Cliente, Nombre_Cliente, NCF_Cotizacion, FechaAnoMes, FechaDia, id_Cliente, id_Vendedor, Nombre_Vendedor, Producto, Porimpuesto, Pordescuento, Moneda, Tasa, Impuesto, Neto, Descuento, Total, 
 Observaciones, Usuario_Creador, Accion_Cotizacion, Estado_Cotizacion) VALUES (:Rnc_Empresa_Cotizacion, :Codigo, :Rnc_Cliente, :Nombre_Cliente, :NCF_Cotizacion, :FechaAnoMes, :FechaDia, :id_Cliente, :id_Vendedor, :Nombre_Vendedor, :Producto, :Porimpuesto, :Pordescuento, :Moneda, :Tasa, :Impuesto, :Neto, :Descuento, :Total, :Observaciones, :Usuario_Creador, :Accion_Cotizacion, :Estado_Cotizacion)");


		$stmt ->bindParam(":Rnc_Empresa_Cotizacion", $datos["Rnc_Empresa_Cotizacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_Cotizacion", $datos["NCF_Cotizacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":id_Vendedor", $datos["id_Vendedor"], PDO::PARAM_INT);
		$stmt ->bindParam(":Nombre_Vendedor", $datos["Nombre_Vendedor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Producto", $datos["Producto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Porimpuesto", $datos["Porimpuesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Pordescuento", $datos["Pordescuento"], PDO::PARAM_STR);
		$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descuento", $datos["Descuento"], PDO::PARAM_STR);
		$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);
		$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion_Cotizacion", $datos["Accion_Cotizacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado_Cotizacion", $datos["Estado_Cotizacion"], PDO::PARAM_STR);

		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion DE REGISTRO DE VENTA*/

	

	/*****************************************************************
			Mostrar Ventas Editar
	*******************************************************************/


	static public function mdlMostrarCotizacionesEditar($tabla, $id, $valoridCotizacion){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valoridCotizacion, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}

	/**********************************************************************
			EDITAR DE VENTA
	************************************************************************/

	static public function mdlEditarCotizacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Cotizacion = :Rnc_Empresa_Cotizacion, Codigo = :Codigo, Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente, FechaAnoMes = :FechaAnoMes, FechaDia = :FechaDia, id_Cliente = :id_Cliente, Producto = :Producto, Porimpuesto = :Porimpuesto, Pordescuento = :Pordescuento, Moneda =:Moneda, Tasa = :Tasa, Impuesto = :Impuesto, Neto = :Neto, Descuento = :Descuento, Total = :Total, Observaciones = :Observaciones, Usuario_Creador = :Usuario_Creador, Accion_Cotizacion = :Accion_Cotizacion WHERE id = :id");


		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_Cotizacion", $datos["Rnc_Empresa_Cotizacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":Producto", $datos["Producto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Porimpuesto", $datos["Porimpuesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Pordescuento", $datos["Pordescuento"], PDO::PARAM_STR);
		$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descuento", $datos["Descuento"], PDO::PARAM_STR);
		$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);
		$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion_Cotizacion", $datos["Accion_Cotizacion"], PDO::PARAM_STR);
		
		
		
		

		

		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion DE REGISTRO DE VENTA*/


	
		/*****************************************************************
			Mostrar Ventas Editar
	*******************************************************************/


	static public function mdlMostrarImprimirCotizacion($tabla, $id, $valoridCotizacion){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valoridCotizacion, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	 }

	/*****************************************************************
			ESTADO
	*******************************************************************/


	 static public function MdlEstadoCotizacion($tabla, $Estado, $id, $estadoCotizacion, $idCotizacion){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $Estado = :$Estado WHERE $id = :$id");

		$stmt ->bindParam(":".$Estado, $estadoCotizacion, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $idCotizacion, PDO::PARAM_INT);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/


	static public function mdlMostrarCotizacionVentas($tabla, $taRnc_Empresa_Cotizacion, $Rnc_Empresa_Cotizacion, $taCorre_Cotizacion, $valorCorreCotizacion){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Cotizacion = :$taRnc_Empresa_Cotizacion AND $taCorre_Cotizacion = :$taCorre_Cotizacion");

		$stmt -> bindParam(":".$taRnc_Empresa_Cotizacion, $Rnc_Empresa_Cotizacion, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCorre_Cotizacion, $valorCorreCotizacion, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}
	/************************************************
	 		BORRAR 606
	 ************************************************/
	 		static public function mdlBorrarCotizacion($tabla, $id, $idCotizacion){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $idCotizacion, PDO::PARAM_INT);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	 		}



static public function mdlUdateCotizacionesCliente($tabla, $datos){

	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente WHERE id_Cliente = :id_Cliente AND Rnc_Empresa_Cotizacion = :Rnc_Empresa_Cotizacion");


		$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_Cotizacion", $datos["Rnc_Empresa_Cotizacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
	




}/*CIERRE DE CLASES VENTAS*/
