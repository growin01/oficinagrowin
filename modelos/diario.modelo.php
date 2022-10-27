<?php 

require_once "conexion.php";


class ModeloDiario{


static public function mdlMostrarPeriodo($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha_AnoMes_LD){

		
		$stmt = Conexion::conectar()->prepare("SELECT DISTINCT Fecha_AnoMes_LD  FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD ORDER BY 	Fecha_AnoMes_LD ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}

static public function mdlCodigoAsientoDiario($tabla, $taRncEmpresa, $taTipo_NCF, $Rnc_Empresa_Diario, $tipocod){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa = :$taRncEmpresa AND $taTipo_NCF = :$taTipo_NCF");

		$stmt -> bindParam(":".$taTipo_NCF, $tipocod, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa, $Rnc_Empresa_Diario, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

	}


static public function mdlidDiario($tabla, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
		
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	}


static public function MdlAsientoRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNAsiento, $NAsiento){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa = :$taRnc_Empresa AND $taNAsiento = :$taNAsiento");

		$stmt -> bindParam(":".$taRnc_Empresa, $Rnc_Empresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	}
static public function mdlMostrarLibroMayor($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $Orden, $periodolibromayor){

	if($periodolibromayor == "TODO"){ 
 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD ORDER BY $Orden DESC");

	 } else{
	 	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND SUBSTRING(Fecha_AnoMes_LD, 1, 4) = $periodolibromayor ORDER BY $Orden DESC");



	 }
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}
static public function mdlMostrarEstadoResultado($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $Orden){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND Fecha_AnoMes_LD BETWEEN $FechaDesde AND $FechaHasta ORDER BY $Orden DESC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


}
static public function mdlVerDetalle($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $taidgrupo, $idgrupoDetalle, $taidcategoria, $idcategoriaDetalle, $taidgenerica, $idgenericaDetalle, $taidcuenta, $idcuentaDetalle, $Orden){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taidgrupo = :$taidgrupo AND $taidcategoria = :$taidcategoria AND $taidgenerica = :$taidgenerica AND $taidcuenta = :$taidcuenta AND Fecha_AnoMes_LD BETWEEN $FechaDesde AND $FechaHasta ORDER BY $Orden DESC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidgrupo, $idgrupoDetalle, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidcategoria, $idcategoriaDetalle, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidgenerica , $idgenericaDetalle, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidcuenta , $idcuentaDetalle, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


}
static public function mdlEstadoResultadoDetallado($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $Orden){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND Fecha_AnoMes_LD BETWEEN $FechaDesde AND $FechaHasta ORDER BY $Orden DESC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


}
static public function mdlMostrarResumenProyectos($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $Proyecto, $taProyecto, $Orden){


	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taProyecto = :$taProyecto AND Fecha_AnoMes_LD BETWEEN $FechaDesde AND $FechaHasta ORDER BY $Orden DESC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taProyecto, $Proyecto, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




}

static public function mdllibrodiario($tabla, $datos){
		

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_LD, id_registro, Rnc_Factura, NCF, Nombre_Empresa, NAsiento, id_grupo, id_categoria, id_generica, id_cuenta, Nombre_Cuenta, Fecha_AnoMes_LD, Fecha_dia_LD, id_Proyecto, CodigoProyecto, debito, credito, ObservacionesLD, Extraer_NAsiento, Tipo_Transaccion, Fecha_AnoMes_Trans, Fecha_dia_Trans, id_banco, referencia, Usuario_Creador, Accion) VALUES (:Rnc_Empresa_LD, :id_registro, :Rnc_Factura, :NCF, :Nombre_Empresa, :NAsiento, :id_grupo, :id_categoria, :id_generica, :id_cuenta, :Nombre_Cuenta, :Fecha_AnoMes_LD, :Fecha_dia_LD, :id_Proyecto, :CodigoProyecto, :debito, :credito, :ObservacionesLD, :Extraer_NAsiento, :Tipo_Transaccion, :Fecha_AnoMes_Trans, :Fecha_dia_Trans, :id_banco, :referencia, :Usuario_Creador, :Accion)");
	
	$stmt ->bindParam(":Rnc_Empresa_LD", $datos["Rnc_Empresa_LD"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_registro", $datos["id_registro"], PDO::PARAM_STR);
	$stmt ->bindParam(":Rnc_Factura", $datos["Rnc_Factura"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF", $datos["NCF"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Empresa", $datos["Nombre_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_INT);
	$stmt ->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
	$stmt ->bindParam(":id_generica", $datos["id_generica"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_cuenta", $datos["id_cuenta"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Cuenta", $datos["Nombre_Cuenta"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_AnoMes_LD", $datos["Fecha_AnoMes_LD"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_dia_LD", $datos["Fecha_dia_LD"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_STR);
	$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
	$stmt ->bindParam(":debito", $datos["debito"], PDO::PARAM_STR);
	$stmt ->bindParam(":credito", $datos["credito"], PDO::PARAM_STR);
	$stmt ->bindParam(":ObservacionesLD", $datos["ObservacionesLD"], PDO::PARAM_STR);
	$stmt ->bindParam(":Extraer_NAsiento", $datos["Extraer_NAsiento"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tipo_Transaccion", $datos["Tipo_Transaccion"], PDO::PARAM_INT);
	$stmt ->bindParam(":Fecha_AnoMes_Trans", $datos["Fecha_AnoMes_Trans"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_dia_Trans", $datos["Fecha_dia_Trans"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_banco", $datos["id_banco"], PDO::PARAM_STR);
	$stmt ->bindParam(":referencia", $datos["referencia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
	$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
	
	
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	

}/* CIERRE funcion*/
static public function mdlMostrarGastoDiarioEditar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF, $taExtraer, $Extraer){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taid_registro = :$taid_registro AND $taRnc_Factura = :$taRnc_Factura AND $taNCF = :$taNCF AND $taExtraer = :$taExtraer");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_registro, $id_registro, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura, $Rnc_Factura, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF, $NCF, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taExtraer, $Extraer, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	}
static public function mdlVerAsientosCompras($tabla, $taRnc_Empresa_LD, $taRnc_Factura, $taNCF, $taNAsiento, $Rnc_Empresa_LD, $Rnc_Factura, $NCF, $NAsiento){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taRnc_Factura = :$taRnc_Factura AND $taNCF = :$taNCF ");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura, $Rnc_Factura, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF, $NCF, PDO::PARAM_STR);
		
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	}
	static public function mdlVerAsientosNasientos($tabla, $taRnc_Empresa_LD, $taRnc_Factura, $taNAsiento, $Rnc_Empresa_LD, $Rnc_Factura, $NAsiento){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taRnc_Factura = :$taRnc_Factura AND $taNAsiento = :$taNAsiento");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura, $Rnc_Factura, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
		
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	}
	static public function mdlGastoDiarioEditarBorrar($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taid_registro = :$taid_registro AND $taExtraer = :$taExtraer AND $taNAsiento = :$taNAsiento");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_registro, $id_registro, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taExtraer, $Extraer, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
		
		
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

	
	static public function mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taid_registro = :$taid_registro AND $taExtraer = :$taExtraer AND $taRnc_Factura = :$taRnc_Factura AND $taNCF = :$taNCF");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_registro, $id_registro, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taExtraer, $Extraer, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura, $Rnc_Factura, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF, $NCF, PDO::PARAM_STR);

		
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

static public function mdlEditarGastoDiarioSinAsientos($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Factura = :Rnc_Factura, NCF = :NCF, Nombre_Empresa = :Nombre_Empresa, Fecha_AnoMes_LD = :Fecha_AnoMes_LD, Fecha_dia_LD = :Fecha_dia_LD, ObservacionesLD = :ObservacionesLD, Tipo_Transaccion =:Tipo_Transaccion, Fecha_AnoMes_Trans = :Fecha_AnoMes_Trans, Fecha_dia_Trans = :Fecha_dia_Trans, id_banco = :id_banco, Usuario_Creador = :Usuario_Creador, Accion = :Accion WHERE id = :id");

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Factura", $datos["Rnc_Factura"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF", $datos["NCF"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Empresa", $datos["Nombre_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_AnoMes_LD", $datos["Fecha_AnoMes_LD"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_dia_LD", $datos["Fecha_dia_LD"], PDO::PARAM_STR);
		$stmt ->bindParam(":ObservacionesLD", $datos["ObservacionesLD"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Transaccion", $datos["Tipo_Transaccion"], PDO::PARAM_INT);
		$stmt ->bindParam(":Fecha_AnoMes_Trans", $datos["Fecha_AnoMes_Trans"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_dia_Trans", $datos["Fecha_dia_Trans"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_banco", $datos["id_banco"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	}
 static public function mdlBorrarAsientos($tabla, $valorid){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $valorid, PDO::PARAM_INT);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	 		}



static public function mdlMostrarGastoCompra($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF, $taExtraer, $Extraer){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taRnc_Factura = :$taRnc_Factura AND $taNCF = :$taNCF AND $taExtraer = :$taExtraer");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura, $Rnc_Factura, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF, $NCF, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taExtraer, $Extraer, PDO::PARAM_STR);
		

		
		

	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

static public function mdlVerAuxiliar($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taFecha, $FechaDesde, $FechaHasta, $taidgrupo, $idgrupoDetalle, $taidcategoria, $idcategoriaDetalle, $taidgenerica, $idgenericaDetalle, $taidcuenta, $idcuentaDetalle, $taextraer, $extraer){

	if($FechaDesde == null){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taidgrupo = :$taidgrupo AND $taidcategoria = :$taidcategoria AND $taidgenerica = :$taidgenerica AND $taidcuenta = :$taidcuenta AND $taextraer = :$taextraer");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidgrupo, $idgrupoDetalle, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidcategoria, $idcategoriaDetalle, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidgenerica, $idgenericaDetalle, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidcuenta, $idcuentaDetalle, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taextraer, $extraer, PDO::PARAM_STR);




	}
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


}

static public function mdlBorrarReciboVentascontado($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taNAsiento, $NAsiento){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taExtraer = :$taExtraer AND $taNAsiento = :$taNAsiento");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taExtraer, $Extraer, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
		
		
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;



}

static public function mdlUdatediarioSuplidores($tabla, $datos){

	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Factura = :Rnc_Factura, Nombre_Empresa = :Nombre_Empresa WHERE Rnc_Empresa_LD = :Rnc_Empresa_LD AND id = :id");


		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		
		$stmt ->bindParam(":Rnc_Empresa_LD", $datos["Rnc_Empresa_LD"], PDO::PARAM_STR);

		$stmt ->bindParam(":Rnc_Factura", $datos["Rnc_Factura"], PDO::PARAM_STR);

		$stmt ->bindParam(":Nombre_Empresa", $datos["Nombre_Empresa"], PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}



}/*CIERRE DE CLASE*/