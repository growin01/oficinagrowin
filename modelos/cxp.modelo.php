<?php 

require_once "conexion.php";


class ModeloCXP{

	
	
static public function mdlIngresarcxp($tabla, $datos){

	
$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_606, Rnc_Empresa_cxp, CodigoCompra, id_Suplidor, Rnc_Suplidor, Nombre_Suplidor, NCF_cxp, FechaAnoMes_cxp, FechaDia_cxp, Dia_Credito_cxp, Moneda, Tasa, Neto, Propinalegal, Impuesto, impuestoISC, otrosimpuestos, Total, ITBIS_Retenido, Retencion_Renta, Observaciones, Retenciones, MontoPagado, Estado, Tipo, Estatus) VALUES (:id_606, :Rnc_Empresa_cxp, :CodigoCompra, :id_Suplidor, :Rnc_Suplidor, :Nombre_Suplidor, :NCF_cxp, :FechaAnoMes_cxp, :FechaDia_cxp, :Dia_Credito_cxp, :Moneda, :Tasa, :Neto, :Propinalegal, :Impuesto, :impuestoISC, :otrosimpuestos, :Total, :ITBIS_Retenido, :Retencion_Renta, :Observaciones, :Retenciones, :MontoPagado, :Estado, :Tipo, :Estatus)");

	$stmt ->bindParam(":id_606", $datos["id_606"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
	$stmt ->bindParam(":id_Suplidor", $datos["id_Suplidor"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_cxp", $datos["NCF_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaAnoMes_cxp", $datos["FechaAnoMes_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaDia_cxp", $datos["FechaDia_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":Dia_Credito_cxp", $datos["Dia_Credito_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Propinalegal", $datos["Propinalegal"], PDO::PARAM_STR);
	$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
	$stmt ->bindParam(":impuestoISC", $datos["impuestoISC"], PDO::PARAM_STR);
	$stmt ->bindParam(":otrosimpuestos", $datos["otrosimpuestos"], PDO::PARAM_STR);
	$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);	
	$stmt ->bindParam(":ITBIS_Retenido", $datos["ITBIS_Retenido"], PDO::PARAM_STR);	
	$stmt ->bindParam(":Retencion_Renta", $datos["Retencion_Renta"], PDO::PARAM_STR);	
	$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
	$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_INT);
	$stmt ->bindParam(":MontoPagado", $datos["MontoPagado"], PDO::PARAM_STR);
	$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tipo", $datos["Tipo"], PDO::PARAM_STR);
	$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_INT);
	
	
	

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion DE REGISTRO DE VENTA*/
	static public function mdlEDITARCXPFACTURA($tabla, $datos){
			

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_cxp = :Rnc_Empresa_cxp, CodigoCompra = :CodigoCompra, id_Suplidor = :id_Suplidor, Rnc_Suplidor = :Rnc_Suplidor, Nombre_Suplidor = :Nombre_Suplidor, NCF_cxp = :NCF_cxp, FechaAnoMes_cxp = :FechaAnoMes_cxp, FechaDia_cxp = :FechaDia_cxp, Fecha_Ret_AnoMes_cxp = :Fecha_Ret_AnoMes_cxp, Fecha_Ret_Dia_cxp = :Fecha_Ret_Dia_cxp,Dia_Credito_cxp = :Dia_Credito_cxp, Moneda = :Moneda, Tasa = :Tasa, Neto = :Neto, Propinalegal = :Propinalegal, Impuesto = :Impuesto, impuestoISC = :impuestoISC, otrosimpuestos = :otrosimpuestos, Total = :Total, ITBIS_Retenido = :ITBIS_Retenido, Retencion_Renta = :Retencion_Renta, Observaciones = :Observaciones, Retenciones = :Retenciones, Tipo = :Tipo, Estatus = :Estatus WHERE Rnc_Empresa_cxp = :Rnc_Empresa_cxp AND id = :id");


	$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
	$stmt ->bindParam(":id_Suplidor", $datos["id_Suplidor"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_cxp", $datos["NCF_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaAnoMes_cxp", $datos["FechaAnoMes_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaDia_cxp", $datos["FechaDia_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Ret_AnoMes_cxp", $datos["Fecha_Ret_AnoMes_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Ret_Dia_cxp", $datos["Fecha_Ret_Dia_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":Dia_Credito_cxp", $datos["Dia_Credito_cxp"], PDO::PARAM_STR);
	$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Propinalegal", $datos["Propinalegal"], PDO::PARAM_STR);
	$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
	$stmt ->bindParam(":impuestoISC", $datos["impuestoISC"], PDO::PARAM_STR);
	$stmt ->bindParam(":otrosimpuestos", $datos["otrosimpuestos"], PDO::PARAM_STR);
	$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);	
	$stmt ->bindParam(":ITBIS_Retenido", $datos["ITBIS_Retenido"], PDO::PARAM_STR);	
	$stmt ->bindParam(":Retencion_Renta", $datos["Retencion_Renta"], PDO::PARAM_STR);	
	$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
	$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_INT);
	$stmt ->bindParam(":Tipo", $datos["Tipo"], PDO::PARAM_STR);
	$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_INT);
		
		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function mdlMostarCXP($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

}
static public function mdlMostarCXPidSuplidor($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP, $taidSuplidor, $id_Suplidor){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP AND $taidSuplidor = :$taidSuplidor ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidSuplidor, $id_Suplidor, PDO::PARAM_INT);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

}



static public function mdlMostarCXPSuplidor($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP, $taid_Suplidor, $Suplidor){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP AND $taid_Suplidor = :$taid_Suplidor ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_Suplidor, $Suplidor, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

}
static public function mdlMostarCXPPeriodo($tabla, $taRncEmpresaCXP, $taPeriodoCXP, $Rnc_Empresa_CXP, $PeriodoCXP){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP AND ($taPeriodoCXP = :$taPeriodoCXP OR $taPeriodoCXP < :$taPeriodoCXP) ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taPeriodoCXP, $PeriodoCXP, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

}
static public function mdlMostarCXPPeriodoSuplidor($tabla, $taRncEmpresaCXP, $taPeriodoCXP, $Rnc_Empresa_CXP, $PeriodoCXP, $taid_Suplidor, $Suplidor){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP AND $taid_Suplidor = :$taid_Suplidor AND ($taPeriodoCXP = :$taPeriodoCXP OR $taPeriodoCXP < :$taPeriodoCXP) ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_Suplidor, $Suplidor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taPeriodoCXP, $PeriodoCXP, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

}
static public function mdlReporteMostarCXP($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP, $periodoCXP){

	if($periodoCXP == "TODO"){ 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP ORDER BY id DESC");
	} else{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP AND SUBSTRING(FechaAnoMes_cxp, 1, 4) = $periodoCXP OR ($taRncEmpresaCXP = :$taRncEmpresaCXP AND Estado = 'PorPagar' AND SUBSTRING(FechaAnoMes_cxp, 1, 4) < $periodoCXP) ORDER BY id DESC");



	}

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlMostarRecibodepago($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlMostaridRecibodepago($tabla, $taRncEmpresaCXP, $taid, $taNAsiento, $Rnc_Empresa_CXP, $id, $NAsiento){

	
$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP AND $taid = :$taid AND $taNAsiento = :$taNAsiento");

		
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid, $id, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		


}
static public function mdlMostarDetalledepago($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXP = :$taRncEmpresaCXP ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXP, $Rnc_Empresa_CXP, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlMostarPagosCXP($tabla, $Rnc_Empresa_cxp, $taRnc_Empresa_cxp, $CodigoCompra, $taCodigoCompra, $id_Suplidor, $taid_Suplidor, $Rnc_Suplidor, $taRnc_Suplidor, $NCF_cxp, $taNCF_cxp, $taTipo, $Tipo){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_cxp = :$taRnc_Empresa_cxp AND $taCodigoCompra = :$taCodigoCompra AND $taid_Suplidor = :$taid_Suplidor AND $taRnc_Suplidor = :$taRnc_Suplidor AND $taNCF_cxp = :$taNCF_cxp AND $taTipo = :$taTipo");

		
		$stmt -> bindParam(":".$taRnc_Empresa_cxp, $Rnc_Empresa_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCodigoCompra, $CodigoCompra, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taid_Suplidor, $id_Suplidor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Suplidor, $Rnc_Suplidor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_cxp, $NCF_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taTipo, $Tipo, PDO::PARAM_STR);
		
		
		
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlBorrarCXP($tabla, $valorid){

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

static public function MdlMostrarCXPdetalle($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_cxp = :$taRnc_Empresa_cxp AND $taRnc_Factura_cxp = :$taRnc_Factura_cxp AND $taNCF_cxp = :$taNCF_cxp");

		$stmt -> bindParam(":".$taRnc_Empresa_cxp, $Rnc_Empresa_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura_cxp, $Rnc_Factura_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_cxp, $NCF_cxp, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}
	static public function MdlMostrarCXPDGII($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoCompra, $CodigoCompra, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taRetenciones, $Retenciones){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_cxp = :$taRnc_Empresa_cxp AND $taCodigoCompra = :$taCodigoCompra AND $taRnc_Factura_cxp = :$taRnc_Factura_cxp AND $taNCF_cxp = :$taNCF_cxp AND $taRetenciones = :$taRetenciones");

		$stmt -> bindParam(":".$taRnc_Empresa_cxp, $Rnc_Empresa_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCodigoCompra, $CodigoCompra, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taRnc_Factura_cxp, $Rnc_Factura_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_cxp, $NCF_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRetenciones, $Retenciones, PDO::PARAM_INT);


		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	}
	static public function MdlMostrarCXPNAsiento($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp, $taNAsiento, $NAsiento){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_cxp = :$taRnc_Empresa_cxp AND $taRnc_Factura_cxp = :$taRnc_Factura_cxp AND $taNCF_cxp = :$taNCF_cxp  AND $taNAsiento = :$taNAsiento");

		$stmt -> bindParam(":".$taRnc_Empresa_cxp, $Rnc_Empresa_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura_cxp, $Rnc_Factura_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_cxp, $NCF_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
	
	
		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}
	static public function mdlMostrarRecibirPago($tabla, $id, $valoridCXP){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valoridCXP, PDO::PARAM_INT);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}
static public function mdlMostrarPago($tabla, $datos){


$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_cxp = :Rnc_Empresa_cxp AND CodigoCompra = :CodigoCompra AND Rnc_Suplidor = :Rnc_Suplidor AND NCF_cxp = :NCF_cxp AND Tipo = :Tipo ORDER BY id ASC");

		$stmt -> bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt -> bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
		$stmt -> bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt -> bindParam(":NCF_cxp", $datos["NCF_cxp"], PDO::PARAM_STR);
		$stmt -> bindParam(":Tipo", $datos["Tipo"], PDO::PARAM_STR);
	

	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
 }
 static public function mdlMostrarBorrarPago($tabla, $datos){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_cxp = :Rnc_Empresa_cxp  AND NAsiento = :NAsiento AND Tipo = :Tipo ORDER BY id ASC");

		$stmt -> bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt -> bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":Tipo", $datos["Tipo"], PDO::PARAM_STR);
	

	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
 }
 static public function mdlBorrarpago($tabla, $valorid){

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


	static public function mdlEmitirPago($tabla, $datos){


$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_cxp, CodigoCompra, id_Suplidor, Rnc_Suplidor, Nombre_Suplidor, NCF_cxp, Pago, FechaAnoMes, FechaDia, FacturaCXP, ReciboCXP, Tasa, Tipodiferencia, Monto, MontoDiferencia, Referencia, EntidadBancaria, Descripcion, NAsiento, Tipo, banco, id_Proyecto, CodigoProyecto) VALUES (:Rnc_Empresa_cxp, :CodigoCompra, :id_Suplidor, :Rnc_Suplidor, :Nombre_Suplidor, :NCF_cxp, :Pago, :FechaAnoMes, :FechaDia, :FacturaCXP, :ReciboCXP, :Tasa, :Tipodiferencia, :Monto, :MontoDiferencia, :Referencia, :EntidadBancaria, :Descripcion, :NAsiento, :Tipo, :banco, :id_Proyecto, :CodigoProyecto)");

		$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
		$stmt ->bindParam(":id_Suplidor", $datos["id_Suplidor"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_cxp", $datos["NCF_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":Pago", $datos["Pago"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":FacturaCXP", $datos["FacturaCXP"], PDO::PARAM_STR);
		$stmt ->bindParam(":ReciboCXP", $datos["ReciboCXP"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipodiferencia", $datos["Tipodiferencia"], PDO::PARAM_INT);
		$stmt ->bindParam(":Monto", $datos["Monto"], PDO::PARAM_STR);
		$stmt ->bindParam(":MontoDiferencia", $datos["MontoDiferencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":EntidadBancaria", $datos["EntidadBancaria"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo", $datos["Tipo"], PDO::PARAM_STR);
		$stmt ->bindParam(":banco", $datos["banco"], PDO::PARAM_INT);
		$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_INT);
		$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);

		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function mdlReciboPago($tabla, $datos){


$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_cxp, CodigoReciboCXP, Rnc_Suplidor, Nombre_Suplidor, NAsiento, FechaAnoMes, FechaDia, Facturas, FacturaCXP, ReciboCXP, Tipodiferencia, Monto, MontoDiferencia, Referencia, EntidadBancaria, Descripcion, Modulo, banco, id_Proyecto, CodigoProyecto, Accion) VALUES (:Rnc_Empresa_cxp, :CodigoReciboCXP, :Rnc_Suplidor, :Nombre_Suplidor, :NAsiento, :FechaAnoMes, :FechaDia, :Facturas, :FacturaCXP, :ReciboCXP, :Tipodiferencia, :Monto, :MontoDiferencia, :Referencia, :EntidadBancaria, :Descripcion, :Modulo, :banco, :id_Proyecto, :CodigoProyecto, :Accion)");

		$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":CodigoReciboCXP", $datos["CodigoReciboCXP"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Facturas", $datos["Facturas"], PDO::PARAM_STR);
		$stmt ->bindParam(":FacturaCXP", $datos["FacturaCXP"], PDO::PARAM_STR);
		$stmt ->bindParam(":ReciboCXP", $datos["ReciboCXP"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipodiferencia", $datos["Tipodiferencia"], PDO::PARAM_INT);
		$stmt ->bindParam(":Monto", $datos["Monto"], PDO::PARAM_STR);
		$stmt ->bindParam(":MontoDiferencia", $datos["MontoDiferencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":EntidadBancaria", $datos["EntidadBancaria"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);
		$stmt ->bindParam(":banco", $datos["banco"], PDO::PARAM_INT);
		$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_INT);
		$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
		
		
	
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function mdlEditarReciboPago($tabla, $datos){


 
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_cxp = :Rnc_Empresa_cxp, Rnc_Suplidor = :Rnc_Suplidor, Nombre_Suplidor = :Nombre_Suplidor,  NAsiento = :NAsiento, FechaAnoMes = :FechaAnoMes, FechaDia = :FechaDia, Facturas = :Facturas, FacturaCXP = :FacturaCXP, ReciboCXP = :ReciboCXP, Tipodiferencia = :Tipodiferencia, Monto = :Monto, MontoDiferencia = :MontoDiferencia, Referencia = :Referencia, EntidadBancaria = :EntidadBancaria, Descripcion = :Descripcion, Modulo = :Modulo, banco = :banco, id_Proyecto = :id_Proyecto, CodigoProyecto = :CodigoProyecto, Accion = :Accion WHERE Rnc_Empresa_cxp = :Rnc_Empresa_cxp AND id = :id");

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Facturas", $datos["Facturas"], PDO::PARAM_STR);
		$stmt ->bindParam(":FacturaCXP", $datos["FacturaCXP"], PDO::PARAM_STR);
		$stmt ->bindParam(":ReciboCXP", $datos["ReciboCXP"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipodiferencia", $datos["Tipodiferencia"], PDO::PARAM_INT);
		$stmt ->bindParam(":Monto", $datos["Monto"], PDO::PARAM_STR);
		$stmt ->bindParam(":MontoDiferencia", $datos["MontoDiferencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":EntidadBancaria", $datos["EntidadBancaria"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);
		$stmt ->bindParam(":banco", $datos["banco"], PDO::PARAM_INT);
		$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_INT);
		$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
		
		
	
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function mdlActualizarCompra($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Estado = :Estado WHERE Rnc_Empresa_Compras = :Rnc_Empresa_Compras AND CodigoCompra = :CodigoCompra AND Rnc_Suplidor = :Rnc_Suplidor AND NCF_Factura = :NCF_Factura");

		
		$stmt ->bindParam(":Rnc_Empresa_Compras", $datos["Rnc_Empresa_Compras"], PDO::PARAM_STR);
		$stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/


static public function MdlValidarFactura606($tabla, $RncEmpresa606, $ValorRncEmpresa606, $Rnc_Factura_606, $ValorRnc_Factura_606, $NCF_606, $ValorNCF_606){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $RncEmpresa606 = :$RncEmpresa606 AND $Rnc_Factura_606 = :$Rnc_Factura_606 AND $NCF_606 = :$NCF_606");

$stmt -> bindParam(":".$RncEmpresa606, $ValorRncEmpresa606, PDO::PARAM_STR);
$stmt -> bindParam(":".$Rnc_Factura_606, $ValorRnc_Factura_606, PDO::PARAM_STR);
$stmt -> bindParam(":".$NCF_606, $ValorNCF_606, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/	

static public function mdlMostarCXPFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxp, $taNCF_cxp, $CodigoCompra, $Rnc_Empresa_cxp, $NCF_cxp){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taCodigo = :$taCodigo AND $taRnc_Empresa_cxp = :$taRnc_Empresa_cxp AND $taNCF_cxp = :$taNCF_cxp");

		$stmt -> bindParam(":".$taCodigo, $CodigoCompra, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taRnc_Empresa_cxp, $Rnc_Empresa_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_cxp, $NCF_cxp, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		


}
static public function mdlEDITARCXPRETENCION($tabla, $datos){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Fecha_Ret_AnoMes_cxp = :Fecha_Ret_AnoMes_cxp, Fecha_Ret_Dia_cxp =:Fecha_Ret_Dia_cxp, ITBIS_Retenido = :ITBIS_Retenido, Retencion_Renta = :Retencion_Renta, Retenciones = :Retenciones WHERE CodigoCompra = :CodigoCompra AND Rnc_Empresa_cxp = :Rnc_Empresa_cxp AND NCF_cxp = :NCF_cxp");


		$stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Ret_AnoMes_cxp", $datos["Fecha_Ret_AnoMes_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Ret_Dia_cxp", $datos["Fecha_Ret_Dia_cxp"], PDO::PARAM_STR);
		

		$stmt ->bindParam(":NCF_cxp", $datos["NCF_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":ITBIS_Retenido", $datos["ITBIS_Retenido"], PDO::PARAM_STR);
		$stmt ->bindParam(":Retencion_Renta", $datos["Retencion_Renta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_STR);
		

		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}


static public function mdlActualizarCXP($tabla, $datos){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Estado = :Estado, MontoPagado = :MontoPagado WHERE Rnc_Empresa_cxp = :Rnc_Empresa_cxp AND CodigoCompra = :CodigoCompra AND Rnc_Suplidor = :Rnc_Suplidor AND NCF_cxp = :NCF_cxp");

		
$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
$stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_STR);
$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_cxp", $datos["NCF_cxp"], PDO::PARAM_STR);
$stmt ->bindParam(":MontoPagado", $datos["MontoPagado"], PDO::PARAM_STR);
$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/


static public function mdlMostarCXPTODO($tabla){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function MdlActualizarEstatus($tabla, $Estatus, $id, $valorEstatus, $valorid){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $Estatus = :$Estatus WHERE $id = :$id");

		$stmt ->bindParam(":".$Estatus, $valorEstatus, PDO::PARAM_INT);
		$stmt ->bindParam(":".$id, $valorid, PDO::PARAM_INT);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* */

static public function mdlUdateCXPSuplidores($tabla, $datos){


	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Suplidor = :Rnc_Suplidor, Nombre_Suplidor = :Nombre_Suplidor WHERE id_Suplidor = :id_Suplidor AND Rnc_Empresa_cxp = :Rnc_Empresa_cxp");


		$stmt ->bindParam(":id_Suplidor", $datos["id_Suplidor"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}

static public function mdlUdateCXPRecibo($tabla, $datos){


	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Suplidor = :Rnc_Suplidor, Nombre_Suplidor = :Nombre_Suplidor WHERE id = :id AND Rnc_Empresa_cxp = :Rnc_Empresa_cxp");


		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function mdlUdateArregloFechaRETCXP($tabla, $datos){


$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Fecha_Ret_AnoMes_cxc = :Fecha_Ret_AnoMes_cxc, Fecha_Ret_Dia_cxc = :Fecha_Ret_Dia_cxc WHERE Rnc_Empresa_cxc = :Rnc_Empresa_cxc AND Rnc_Cliente = :Rnc_Cliente  AND NCF_cxc = :NCF_cxc");


$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_cxc", $datos["NCF_cxc"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Ret_AnoMes_cxc", $datos["Fecha_Ret_AnoMes_cxc"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Ret_Dia_cxc", $datos["Fecha_Ret_Dia_cxc"], PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}


static public function mdlMostrarCodigoReciboCXP($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_cxp = :$taRnc_Empresa_cxp ORDER BY id desc limit 1");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_cxp, $Rnc_Empresa_cxp, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}
static public function MdlReciboCXPRepetido($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taCodigoReciboCXP, $CodigoReciboCXP){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_cxp = :$taRnc_Empresa_cxp AND $taCodigoReciboCXP = :$taCodigoReciboCXP");

		$stmt -> bindParam(":".$taRnc_Empresa_cxp, $Rnc_Empresa_cxp, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCodigoReciboCXP, $CodigoReciboCXP, PDO::PARAM_INT);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}

	static public function mdlUdateverificarCXPSuplidor($tabla, $datos){


	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Suplidor = :Rnc_Suplidor, Nombre_Suplidor = :Nombre_Suplidor, id_Suplidor = :id_Suplidor WHERE Rnc_Empresa_cxp = :Rnc_Empresa_cxp AND NCF_cxp = :NCF_cxp");


		
		$stmt ->bindParam(":Rnc_Empresa_cxp", $datos["Rnc_Empresa_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_cxp", $datos["NCF_cxp"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_Suplidor", $datos["id_Suplidor"], PDO::PARAM_INT);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
}/*CIERRE DE CLASES VENTAS*/
