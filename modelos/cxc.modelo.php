<?php 

require_once "conexion.php";


class ModeloCXC{

	
	/**********************************************************************
			REGISTRO DE VENTA
	************************************************************************/

	static public function mdlIngresarcxc($tabla, $datos){

		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_607, Codigo, Rnc_Empresa_cxc, id_Cliente, Rnc_Cliente, Nombre_Cliente, NCF_cxc, id_Vendedor, Nombre_Vendedor, FechaAnoMes_cxc, FechaDia_cxc, Dia_Credito_cxc, Moneda, Tasa, Neto, Descuento, Impuesto, Total, ITBIS_Retenido, Retencion_Renta, Observaciones, Retenciones, MontoCobrado, Estado) VALUES (:id_607, :Codigo, :Rnc_Empresa_cxc, :id_Cliente, :Rnc_Cliente, :Nombre_Cliente, :NCF_cxc, :id_Vendedor, :Nombre_Vendedor, :FechaAnoMes_cxc, :FechaDia_cxc, :Dia_Credito_cxc, :Moneda, :Tasa, :Neto, :Descuento, :Impuesto, :Total, :ITBIS_Retenido, :Retencion_Renta, :Observaciones, :Retenciones, :MontoCobrado, :Estado)");

	$stmt ->bindParam(":id_607", $datos["id_607"], PDO::PARAM_INT);
	$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_cxc", $datos["NCF_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_Vendedor", $datos["id_Vendedor"], PDO::PARAM_INT);
	$stmt ->bindParam(":Nombre_Vendedor", $datos["Nombre_Vendedor"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaAnoMes_cxc", $datos["FechaAnoMes_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaDia_cxc", $datos["FechaDia_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":Dia_Credito_cxc", $datos["Dia_Credito_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Descuento", $datos["Descuento"], PDO::PARAM_STR);
	$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);
	$stmt ->bindParam(":ITBIS_Retenido", $datos["ITBIS_Retenido"], PDO::PARAM_STR);
	$stmt ->bindParam(":Retencion_Renta", $datos["Retencion_Renta"], PDO::PARAM_STR);	
	$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
	$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_INT);
	$stmt ->bindParam(":MontoCobrado", $datos["MontoCobrado"], PDO::PARAM_STR);
	$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);
	
	if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion DE REGISTRO DE VENTA*/

static public function mdlEditarReciboCobro($tabla, $datos){


$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_cxc = :Rnc_Empresa_cxc, Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente,  NAsiento = :NAsiento, FechaAnoMes = :FechaAnoMes, FechaDia = :FechaDia, Facturas = :Facturas, FacturaCXC = :FacturaCXC, ReciboCXC = :ReciboCXC, Tipodiferencia = :Tipodiferencia, Monto = :Monto, MontoDiferencia = :MontoDiferencia, Referencia = :Referencia, EntidadBancaria = :EntidadBancaria, Descripcion = :Descripcion, Modulo = :Modulo, banco = :banco, id_Proyecto = :id_Proyecto, CodigoProyecto = :CodigoProyecto, Accion = :Accion WHERE Rnc_Empresa_cxc = :Rnc_Empresa_cxc AND id = :id");

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Facturas", $datos["Facturas"], PDO::PARAM_STR);
		$stmt ->bindParam(":FacturaCXC", $datos["FacturaCXC"], PDO::PARAM_STR);
		$stmt ->bindParam(":ReciboCXC", $datos["ReciboCXC"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipodiferencia", $datos["Tipodiferencia "], PDO::PARAM_INT);
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
	

static public function mdlMostarCXC($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC ORDER BY id DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlMostarCXCidCliente($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC, $taidCliente, $id_Cliente){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC AND $taidCliente = :$taidCliente ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taidCliente, $id_Cliente, PDO::PARAM_INT);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlMostarCXPCliente($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC, $taid_Cliente, $Cliente){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC AND $taid_Cliente = :$taid_Cliente ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_Cliente, $Cliente, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

}
static public function mdlMostarCXCPeriodo($tabla, $taRncEmpresaCXC, $taPeriodoCXC, $Rnc_Empresa_CXC, $PeriodoCXC){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC AND ($taPeriodoCXC = :$taPeriodoCXC OR $taPeriodoCXC < :$taPeriodoCXC) ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taPeriodoCXC, $PeriodoCXC, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

}
static public function mdlMostarCXCPeriodoCliente($tabla, $taRncEmpresaCXC, $taPeriodoCXC, $Rnc_Empresa_CXC, $PeriodoCXC, $taid_Cliente, $Cliente){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC AND $taid_Cliente = :$taid_Cliente AND ($taPeriodoCXC = :$taPeriodoCXC OR $taPeriodoCXC < :$taPeriodoCXC) ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_Cliente, $Cliente, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taPeriodoCXC, $PeriodoCXC, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

}
static public function mdlReporteMostarCXC($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC, $periodoCXC){

	if($periodoCXC == "TODO"){ 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC ORDER BY id DESC");
	} else{
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC AND SUBSTRING(FechaAnoMes_cxc, 1, 4) = $periodoCXC OR ($taRncEmpresaCXC = :$taRncEmpresaCXC AND Estado = 'PorCobrar' AND SUBSTRING(FechaAnoMes_cxc, 1, 4) < $periodoCXC) ORDER BY id DESC");

	}

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlMostarCXCFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taCodigo = :$taCodigo AND $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc");

		$stmt -> bindParam(":".$taCodigo, $Codigo_Factura, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taRnc_Empresa_cxc, $Rnc_Empresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		


}



static public function mdlEDITARCXCFACTURA($tabla, $datos){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_607 = :id_607, Codigo = :Codigo, Rnc_Empresa_cxc = :Rnc_Empresa_cxc, Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente, FechaAnoMes_cxc = :FechaAnoMes_cxc, FechaDia_cxc = :FechaDia_cxc, id_Cliente = :id_Cliente, id_Vendedor = :id_Vendedor, Nombre_Vendedor = :Nombre_Vendedor, Moneda = :Moneda, Tasa = :Tasa, Impuesto = :Impuesto, Neto = :Neto, Descuento = :Descuento, Total = :Total, ITBIS_Retenido = :ITBIS_Retenido, Retencion_Renta = :Retencion_Renta, Observaciones = :Observaciones, Retenciones = :Retenciones, Dia_Credito_cxc = :Dia_Credito_cxc WHERE Codigo = :Codigo AND Rnc_Empresa_cxc = :Rnc_Empresa_cxc");

	$stmt ->bindParam(":id_607", $datos["id_607"], PDO::PARAM_INT);
	$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaAnoMes_cxc", $datos["FechaAnoMes_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaDia_cxc", $datos["FechaDia_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
	$stmt ->bindParam(":id_Vendedor", $datos["id_Vendedor"], PDO::PARAM_INT);
	$stmt ->bindParam(":Nombre_Vendedor", $datos["Nombre_Vendedor"], PDO::PARAM_STR);
	
	$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Descuento", $datos["Descuento"], PDO::PARAM_STR);

		
	$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Retenido", $datos["ITBIS_Retenido"], PDO::PARAM_STR);
$stmt ->bindParam(":Retencion_Renta", $datos["Retencion_Renta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Dia_Credito_cxc", $datos["Dia_Credito_cxc"], PDO::PARAM_STR);
		
		

		

		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function mdlReciclarCXCFACTURA($tabla, $datos){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_607 = :id_607, Codigo = :Codigo, Rnc_Empresa_cxc = :Rnc_Empresa_cxc, Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente, FechaAnoMes_cxc = :FechaAnoMes_cxc, FechaDia_cxc = :FechaDia_cxc, id_Cliente = :id_Cliente, id_Vendedor = :id_Vendedor, Nombre_Vendedor = :Nombre_Vendedor, NCF_cxc = :NCF_cxc, Moneda = :Moneda, Tasa = :Tasa, Impuesto = :Impuesto, Neto = :Neto, Descuento = :Descuento, Total = :Total, ITBIS_Retenido = :ITBIS_Retenido, Retencion_Renta = :Retencion_Renta, Observaciones = :Observaciones, Retenciones = :Retenciones, Dia_Credito_cxc = :Dia_Credito_cxc WHERE Codigo = :Codigo AND Rnc_Empresa_cxc = :Rnc_Empresa_cxc");

	$stmt ->bindParam(":id_607", $datos["id_607"], PDO::PARAM_INT);
	$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_cxc", $datos["NCF_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaAnoMes_cxc", $datos["FechaAnoMes_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":FechaDia_cxc", $datos["FechaDia_cxc"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
	$stmt ->bindParam(":id_Vendedor", $datos["id_Vendedor"], PDO::PARAM_INT);
	$stmt ->bindParam(":Nombre_Vendedor", $datos["Nombre_Vendedor"], PDO::PARAM_STR);
	
	$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Descuento", $datos["Descuento"], PDO::PARAM_STR);

		
	$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Retenido", $datos["ITBIS_Retenido"], PDO::PARAM_STR);
$stmt ->bindParam(":Retencion_Renta", $datos["Retencion_Renta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Dia_Credito_cxc", $datos["Dia_Credito_cxc"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

}
static public function mdlEDITARCXCRETENCION($tabla, $datos){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Fecha_Ret_AnoMes_cxc = :Fecha_Ret_AnoMes_cxc, Fecha_Ret_Dia_cxc =:Fecha_Ret_Dia_cxc, ITBIS_Retenido = :ITBIS_Retenido, Retencion_Renta = :Retencion_Renta, Retenciones = :Retenciones WHERE Codigo = :Codigo AND Rnc_Empresa_cxc = :Rnc_Empresa_cxc");


		$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Ret_AnoMes_cxc", $datos["Fecha_Ret_AnoMes_cxc"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Ret_Dia_cxc", $datos["Fecha_Ret_Dia_cxc"], PDO::PARAM_STR);
		
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

/************************************************
	 		BORRAR CXC
	 ************************************************/
	 		static public function mdlBorrarCXC($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $taCodigo = :$taCodigo AND $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc");

		$stmt ->bindParam(":$taRnc_Empresa_cxc", $Rnc_Empresa, PDO::PARAM_STR);
		$stmt ->bindParam(":$taCodigo", $Codigo_Factura, PDO::PARAM_INT);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

		}


static public function mdlMostrarRecibirPago($tabla, $id, $valoridCXC){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valoridCXC, PDO::PARAM_INT);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}
	static public function mdlRecibirPago($tabla, $taid, $id, $taPago, $Pago, $taFecha_AnoMes, $Fecha_AnoMes, $taFecha_Dia, $Fecha_Dia, $taMonto, $Monto, $taReferencia, $Referencia, $taEntidad_Bancaria, $Entidad_Bancaria, $taDescripcion, $Descripcion, $taComision, $Comision, $taid_Cobrador, $id_Cobrador, $taNAsiento, $NAsiento){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $taPago = :$taPago, $taFecha_AnoMes = :$taFecha_AnoMes, $taFecha_Dia = :$taFecha_Dia, $taMonto = :$taMonto, $taReferencia = :$taReferencia, $taEntidad_Bancaria = :$taEntidad_Bancaria, $taDescripcion = :$taDescripcion, $taComision = :$taComision, $taid_Cobrador = :$taid_Cobrador, $taNAsiento = :$taNAsiento WHERE $taid = :$taid");


		$stmt ->bindParam(":$taid", $id, PDO::PARAM_INT);
		$stmt ->bindParam(":$taPago", $Pago, PDO::PARAM_STR);
		$stmt ->bindParam(":$taFecha_AnoMes", $Fecha_AnoMes, PDO::PARAM_STR);
		$stmt ->bindParam(":$taFecha_Dia", $Fecha_Dia, PDO::PARAM_STR);
		$stmt ->bindParam(":$taMonto", $Monto, PDO::PARAM_STR);
		$stmt ->bindParam(":$taReferencia", $Referencia, PDO::PARAM_STR);
		$stmt ->bindParam(":$taEntidad_Bancaria", $Entidad_Bancaria, PDO::PARAM_STR);
		$stmt ->bindParam(":$taDescripcion", $Descripcion, PDO::PARAM_STR);
		$stmt ->bindParam(":$taComision", $Comision, PDO::PARAM_INT);
		$stmt ->bindParam(":$taid_Cobrador", $id_Cobrador, PDO::PARAM_INT);
		$stmt ->bindParam(":$taNAsiento", $NAsiento, PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function MdlValidarFactura($tabla, $RncEmpresa607, $ValorRncEmpresa607, $Rnc_Factura_607, $ValorRnc_Factura_607, $NCF_607, $ValorNCF_607){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $RncEmpresa607 = :$RncEmpresa607 AND $Rnc_Factura_607 = :$Rnc_Factura_607 AND $NCF_607 = :$NCF_607");

$stmt -> bindParam(":".$RncEmpresa607, $ValorRncEmpresa607, PDO::PARAM_STR);
$stmt -> bindParam(":".$Rnc_Factura_607, $ValorRnc_Factura_607, PDO::PARAM_STR);
$stmt -> bindParam(":".$NCF_607, $ValorNCF_607, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/
static public function mdlMostarPagosCXC($tabla, $Rnc_Empresa_cxc, $taRnc_Empresa_cxc, $CodigoVenta, $taCodigoVenta, $id_Cliente, $taid_Cliente, $Rnc_Cliente, $taRnc_Cliente, $NCF_cxc, $taNCF_cxc, $taTipo, $Tipo){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc AND $taCodigoVenta = :$taCodigoVenta AND $taid_Cliente = :$taid_Cliente AND $taRnc_Cliente = :$taRnc_Cliente AND $taNCF_cxc = :$taNCF_cxc AND $taTipo = :$taTipo");

		
		$stmt -> bindParam(":".$taRnc_Empresa_cxc, $Rnc_Empresa_cxc, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCodigoVenta, $CodigoVenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taid_Cliente, $id_Cliente, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Cliente, $Rnc_Cliente, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_cxc, $NCF_cxc, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taTipo, $Tipo, PDO::PARAM_STR);
		
		
		
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}

static public function mdlMostrarCobro($tabla, $datos){


$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_cxc = :Rnc_Empresa_cxc AND CodigoVenta = :CodigoVenta AND Rnc_Cliente = :Rnc_Cliente AND NCF_cxc = :NCF_cxc AND Tipo = :Tipo ORDER BY id ASC");

		$stmt -> bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
		$stmt -> bindParam(":CodigoVenta", $datos["CodigoVenta"], PDO::PARAM_INT);
		$stmt -> bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
		$stmt -> bindParam(":NCF_cxc", $datos["NCF_cxc"], PDO::PARAM_STR);
		$stmt -> bindParam(":Tipo", $datos["Tipo"], PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
 }

 static public function mdlMostarCobrosCXCver($tabla, $Rnc_Empresa_cxc, $taRnc_Empresa_cxc, $CodigoVenta, $taCodigoVenta, $id_Cliente, $taid_Cliente, $Rnc_Cliente, $taRnc_Cliente, $NCF_cxc, $taNCF_cxc){


$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc AND $taCodigoVenta = :$taCodigoVenta AND $taid_Cliente = :$taid_Cliente AND $taRnc_Cliente = :$taRnc_Cliente AND $taNCF_cxc = :$taNCF_cxc  ORDER BY id ASC");

		$stmt -> bindParam(":$taRnc_Empresa_cxc", $Rnc_Empresa_cxc, PDO::PARAM_STR);
		$stmt -> bindParam(":$taCodigoVenta", $CodigoVenta, PDO::PARAM_INT);
		$stmt -> bindParam(":$taid_Cliente", $id_Cliente, PDO::PARAM_INT);
		$stmt -> bindParam(":$taRnc_Cliente", $Rnc_Cliente, PDO::PARAM_STR);
		$stmt -> bindParam(":$taNCF_cxc", $NCF_cxc, PDO::PARAM_STR);
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
 }
 static public function mdlEmitirCobro($tabla, $datos){



$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_cxc, CodigoVenta, id_Cliente, Rnc_Cliente, Nombre_Cliente, NCF_cxc, Pago, FechaAnoMes, FechaDia, FacturaCXC, ReciboCXC, Tasa, Tipodiferencia, Monto, MontoDiferencia, Referencia, EntidadBancaria, Descripcion, NAsiento, Tipo, banco, id_Proyecto, CodigoProyecto) VALUES (:Rnc_Empresa_cxc, :CodigoVenta, :id_Cliente, :Rnc_Cliente, :Nombre_Cliente, :NCF_cxc, :Pago, :FechaAnoMes, :FechaDia, :FacturaCXC, :ReciboCXC, :Tasa, :Tipodiferencia, :Monto, :MontoDiferencia, :Referencia, :EntidadBancaria, :Descripcion, :NAsiento, :Tipo, :banco, :id_Proyecto, :CodigoProyecto)");

$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
$stmt ->bindParam(":CodigoVenta", $datos["CodigoVenta"], PDO::PARAM_INT);
$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_cxc", $datos["NCF_cxc"], PDO::PARAM_STR);
$stmt ->bindParam(":Pago", $datos["Pago"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
$stmt ->bindParam(":FacturaCXC", $datos["FacturaCXC"], PDO::PARAM_STR);
$stmt ->bindParam(":ReciboCXC", $datos["ReciboCXC"], PDO::PARAM_STR);
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
static public function mdlMostarRecibodecobro($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlActualizarCXC($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Estado = :Estado, MontoCobrado = :MontoCobrado WHERE Rnc_Empresa_cxc = :Rnc_Empresa_cxc AND Codigo = :Codigo AND Rnc_Cliente = :Rnc_Cliente AND NCF_cxc = :NCF_cxc");

		
$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_cxc", $datos["NCF_cxc"], PDO::PARAM_STR);
$stmt ->bindParam(":MontoCobrado", $datos["MontoCobrado"], PDO::PARAM_STR);
$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/
static public function mdlActualizarVenta($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Estado = :Estado WHERE Rnc_Empresa_Venta = :Rnc_Empresa_Venta AND Codigo = :Codigo AND Rnc_Cliente = :Rnc_Cliente AND NCF_Factura = :NCF_Factura");

		
$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/

static public function mdlReciboCobro($tabla, $datos){


$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_cxc, CodigoReciboCXC, Rnc_Cliente, Nombre_Cliente, NAsiento, FechaAnoMes, FechaDia, Facturas, FacturaCXC, ReciboCXC, Tipodiferencia, Monto, MontoDiferencia, Referencia, EntidadBancaria, Descripcion, Modulo, banco, id_Proyecto, CodigoProyecto, Accion) VALUES (:Rnc_Empresa_cxc, :CodigoReciboCXC, :Rnc_Cliente, :Nombre_Cliente, :NAsiento, :FechaAnoMes, :FechaDia, :Facturas, :FacturaCXC, :ReciboCXC, :Tipodiferencia, :Monto, :MontoDiferencia, :Referencia, :EntidadBancaria, :Descripcion, :Modulo, :banco, :id_Proyecto, :CodigoProyecto, :Accion)");

		$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
		$stmt ->bindParam(":CodigoReciboCXC", $datos["CodigoReciboCXC"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Facturas", $datos["Facturas"], PDO::PARAM_STR);
		$stmt ->bindParam(":FacturaCXC", $datos["FacturaCXC"], PDO::PARAM_STR);
		$stmt ->bindParam(":ReciboCXC", $datos["ReciboCXC"], PDO::PARAM_STR);
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
static public function mdlMostarDetalledecobro($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlMostaridRecibodecobro($tabla, $taRncEmpresaCXC, $taid, $taNAsiento, $Rnc_Empresa_CXC, $id, $NAsiento){

	
$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCXC = :$taRncEmpresaCXC AND $taid = :$taid AND $taNAsiento = :$taNAsiento");

		
		$stmt -> bindParam(":".$taRncEmpresaCXC, $Rnc_Empresa_CXC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid, $id, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		


}
static public function MdlMostrarCXCNAsiento($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_cxc, $taRnc_Factura_cxc, $Rnc_Factura_cxc, $taNCF_cxc, $NCF_cxc, $taNAsiento, $NAsiento){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc AND $taRnc_Factura_cxc = :$taRnc_Factura_cxc AND $taNCF_cxc = :$taNCF_cxc  AND $taNAsiento = :$taNAsiento");

		$stmt -> bindParam(":".$taRnc_Empresa_cxc, $Rnc_Empresa_cxc, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura_cxc, $Rnc_Factura_cxc, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_cxc, $NCF_cxc, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNAsiento, $NAsiento, PDO::PARAM_STR);
	
	
		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}
	static public function mdlBorrarcobro($tabla, $valorid){

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
static public function mdlMostrarBorrarCobro($tabla, $datos){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_cxc = :Rnc_Empresa_cxc  AND NAsiento = :NAsiento AND Tipo = :Tipo ORDER BY id ASC");

		$stmt -> bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
		$stmt -> bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":Tipo", $datos["Tipo"], PDO::PARAM_STR);
	

	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
 }

static public function mdlUdateCXCCliente($tabla, $datos){

	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente WHERE id_Cliente = :id_Cliente AND Rnc_Empresa_cxc = :Rnc_Empresa_cxc");


		$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
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
static public function mdlUpdateReciboCliente($tabla, $datos){

			  		
	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente WHERE id = :id AND Rnc_Empresa_cxc = :Rnc_Empresa_cxc");


		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
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

static public function mdlUdateverificarCXCCliente($tabla, $datos){

	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente, id_Cliente = :id_Cliente WHERE Rnc_Empresa_cxc = :Rnc_Empresa_cxc AND NCF_cxc = :NCF_cxc");


		
		$stmt ->bindParam(":Rnc_Empresa_cxc", $datos["Rnc_Empresa_cxc"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_cxc", $datos["NCF_cxc"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}

static public function mdlMostrarCodigoReciboCXC($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_cxc){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc ORDER BY id desc limit 1");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_cxc, $Rnc_Empresa_cxc, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

static public function MdlReciboCXCRepetido($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_cxc, $taCodigoReciboCXC, $CodigoReciboCXC){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc AND $taCodigoReciboCXC = :$taCodigoReciboCXC");

		$stmt -> bindParam(":".$taRnc_Empresa_cxc, $Rnc_Empresa_cxc, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCodigoReciboCXC, $CodigoReciboCXC, PDO::PARAM_INT);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}


}/*CIERRE DE CLASES VENTAS*/
