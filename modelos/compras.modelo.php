<?php 

require_once "conexion.php";


class ModeloCompras{
	static public function mdlMostarCompras($tabla, $taRncEmpresaCompras, $Rnc_Empresa_Compras, $periodocompras){

	if($periodocompras == "TODO"){ 

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCompras = :$taRncEmpresaCompras ORDER BY id DESC");

	}else{

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCompras = :$taRncEmpresaCompras AND SUBSTRING(FechaAnoMes, 1, 4) = $periodocompras ORDER BY id DESC");
		
	}

$stmt -> bindParam(":".$taRncEmpresaCompras, $Rnc_Empresa_Compras, PDO::PARAM_STR);
	

$stmt -> execute();

return $stmt -> fetchAll();
		

}


	static public function mdlMostrarCodigoCompras($tabla, $taRncEmpresaCompra, $taCodigoCompra, $Rnc_Empresa_Compra, $CodigoCompra){

if($CodigoCompra == NULL){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCompra = :$taRncEmpresaCompra ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaCompra, $Rnc_Empresa_Compra, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
}else{

	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCompra = :$taRncEmpresaCompra AND $taCodigoCompra =:$taCodigoCompra ORDER BY id ASC");

		$stmt -> bindParam(":".$taCodigoCompra, $CodigoCompra, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taRncEmpresaCompra, $Rnc_Empresa_Compra, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;



}




	}
	static public function mdlRangoFechasCompras($tabla, $taRncEmpresaCompras, $Rnc_Empresa_Compras, $fechaInicial, $fechaFinal){

	if($fechaInicial == null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCompras = :$taRncEmpresaCompras ORDER BY id DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaCompras, $Rnc_Empresa_Compras, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

	}else if($fechaInicial == $fechaFinal){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Compras = '$Rnc_Empresa_Compras' AND Fecha like '%$fechaFinal%'");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		//$stmt -> bindParam("$taRncEmpresaVenta", $Rnc_Empresa_Venta, PDO::PARAM_STR);
	
		
		$stmt -> bindParam(":Fecha", $fechaFinal, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


	}else {

		$fechaActual = new DateTime();
		$fechaActual ->add(new DateInterval("P1D"));
		$fechaActualMasUno = $fechaActual->format("Y-m-d");


		$fechaFinal2 = new DateTime($fechaFinal);
		$fechaFinal2 ->add(new DateInterval("P1D"));
		$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");


		if($fechaFinalMasUno == $fechaActualMasUno){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Compras = '$Rnc_Empresa_Compras' AND Fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");





		}else{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Compras = '$Rnc_Empresa_Compras' AND Fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

		}

				

		$stmt -> execute();

		return $stmt -> fetchAll();



	}



}

static public function mdlIngresarCompra($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Compras, CodigoCompra, Rnc_Suplidor, Nombre_Suplidor, NCF_Factura, FechaAnoMes, FechaDia, id_Suplidor, Producto, Porimpuesto, Moneda, Tasa, Impuesto, impuestoISC, otrosimpuestos, Neto, Propinalegal, Total, Proyecto, Referencia, FormaPago, id_banco, EXTRAER_NCF, Retenciones, Porc_ITBIS_Retenido, Porc_ISR_Retenido, ITBIS_Retenido_606, Monto_Retencion_Renta_606, NAsiento, NAsientoRET, Modulo, Estatus, Usuario_Creador, Accion_Factura) VALUES (:Rnc_Empresa_Compras, :CodigoCompra, :Rnc_Suplidor, :Nombre_Suplidor, :NCF_Factura, :FechaAnoMes, :FechaDia, :id_Suplidor, :Producto, :Porimpuesto, :Moneda, :Tasa, :Impuesto, :impuestoISC, :otrosimpuestos, :Neto, :Propinalegal, :Total, :Proyecto, :Referencia, :FormaPago, :id_banco, :EXTRAER_NCF, :Retenciones, :Porc_ITBIS_Retenido, :Porc_ISR_Retenido, :ITBIS_Retenido_606, :Monto_Retencion_Renta_606, :NAsiento, :NAsientoRET, :Modulo, :Estatus, :Usuario_Creador, :Accion_Factura)");

	
$stmt ->bindParam(":Rnc_Empresa_Compras", $datos["Rnc_Empresa_Compras"], PDO::PARAM_STR);
$stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Suplidor", $datos["id_Suplidor"], PDO::PARAM_STR);
$stmt ->bindParam(":Producto", $datos["Producto"], PDO::PARAM_STR);
$stmt ->bindParam(":Porimpuesto", $datos["Porimpuesto"], PDO::PARAM_STR);
$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
$stmt ->bindParam(":impuestoISC", $datos["impuestoISC"], PDO::PARAM_STR);
$stmt ->bindParam(":otrosimpuestos", $datos["otrosimpuestos"], PDO::PARAM_STR);
$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
$stmt ->bindParam(":Propinalegal", $datos["Propinalegal"], PDO::PARAM_STR);
$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);
$stmt ->bindParam(":Proyecto", $datos["Proyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
$stmt ->bindParam(":FormaPago", $datos["FormaPago"], PDO::PARAM_STR);
$stmt ->bindParam(":id_banco", $datos["id_banco"], PDO::PARAM_STR);
$stmt ->bindParam(":EXTRAER_NCF", $datos["EXTRAER_NCF"], PDO::PARAM_STR);
$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_INT);
$stmt ->bindParam(":Porc_ITBIS_Retenido", $datos["Porc_ITBIS_Retenido"], PDO::PARAM_INT);
$stmt ->bindParam(":Porc_ISR_Retenido", $datos["Porc_ISR_Retenido"], PDO::PARAM_INT);
$stmt ->bindParam(":ITBIS_Retenido_606", $datos["ITBIS_Retenido_606"], PDO::PARAM_STR);
$stmt ->bindParam(":Monto_Retencion_Renta_606", $datos["Monto_Retencion_Renta_606"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsientoRET", $datos["NAsientoRET"], PDO::PARAM_STR);
$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);
$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
$stmt ->bindParam(":Accion_Factura", $datos["Accion_Factura"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion DE REGISTRO DE VENTA*/

static public function mdlMostrarComprasEditar($tabla, $id, $valoridCompras){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valoridCompras, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}
	static public function mdlEditarCompra($tabla, $datos){
		

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Suplidor = :Rnc_Suplidor, CodigoCompra = :CodigoCompra, Nombre_Suplidor = :Nombre_Suplidor, NCF_Factura = :NCF_Factura, FechaAnoMes = :FechaAnoMes, FechaDia = :FechaDia, id_Suplidor = :id_Suplidor, Producto = :Producto, Porimpuesto = :Porimpuesto, Moneda = :Moneda, Tasa = :Tasa, Impuesto = :Impuesto, impuestoISC = :impuestoISC, otrosimpuestos = :otrosimpuestos, Neto = :Neto, Propinalegal = :Propinalegal, Total = :Total, Proyecto = :Proyecto, Referencia = :Referencia, FormaPago = :FormaPago, id_banco = :id_banco, Retenciones = :Retenciones, Porc_ITBIS_Retenido = :Porc_ITBIS_Retenido, Porc_ISR_Retenido = :Porc_ISR_Retenido, ITBIS_Retenido_606 = :ITBIS_Retenido_606, Monto_Retencion_Renta_606 = :Monto_Retencion_Renta_606, NAsiento = :NAsiento, NAsientoRET = :NAsientoRET, EXTRAER_NCF = :EXTRAER_NCF, Modulo = :Modulo, Estatus = :Estatus, Usuario_Creador = :Usuario_Creador, Accion_Factura = :Accion_Factura WHERE id = :id AND Rnc_Empresa_Compras = :Rnc_Empresa_Compras");

	
		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_Compras", $datos["Rnc_Empresa_Compras"], PDO::PARAM_STR);
		$stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Suplidor", $datos["Nombre_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_Suplidor", $datos["id_Suplidor"], PDO::PARAM_STR);
		$stmt ->bindParam(":Producto", $datos["Producto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Porimpuesto", $datos["Porimpuesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Moneda", $datos["Moneda"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tasa", $datos["Tasa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Impuesto", $datos["Impuesto"], PDO::PARAM_STR);
		$stmt ->bindParam(":impuestoISC", $datos["impuestoISC"], PDO::PARAM_STR);
		$stmt ->bindParam(":otrosimpuestos", $datos["otrosimpuestos"], PDO::PARAM_STR);
		$stmt ->bindParam(":Neto", $datos["Neto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Propinalegal", $datos["Propinalegal"], PDO::PARAM_STR);
		$stmt ->bindParam(":Total", $datos["Total"], PDO::PARAM_STR);
		$stmt ->bindParam(":Proyecto", $datos["Proyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":FormaPago", $datos["FormaPago"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_banco", $datos["id_banco"], PDO::PARAM_STR);

		
		$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_INT);
		$stmt ->bindParam(":Porc_ITBIS_Retenido", $datos["Porc_ITBIS_Retenido"], PDO::PARAM_INT);
		$stmt ->bindParam(":Porc_ISR_Retenido", $datos["Porc_ISR_Retenido"], PDO::PARAM_INT);
		$stmt ->bindParam(":ITBIS_Retenido_606", $datos["ITBIS_Retenido_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Monto_Retencion_Renta_606", $datos["Monto_Retencion_Renta_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsientoRET", $datos["NAsientoRET"], PDO::PARAM_STR);
		$stmt ->bindParam(":EXTRAER_NCF", $datos["EXTRAER_NCF"], PDO::PARAM_STR);
		$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion_Factura", $datos["Accion_Factura"], PDO::PARAM_STR);

		
		
		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion DE REGISTRO DE VENTA*/
	
 static public function mdlBorrarCompra($tabla, $id, $valoridCompras){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $id = :$id");

		$stmt ->bindParam(":$id", $valoridCompras, PDO::PARAM_INT);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


		}
		static public function mdlBorrarCompras606CXP($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taRnc_Suplidor, $Rnc_Suplidor, $taNCF_cxp, $NCF_cxp){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $taRnc_Empresa_cxp = :$taRnc_Empresa_cxp AND $taRnc_Suplidor = :$taRnc_Suplidor AND $taNCF_cxp = :$taNCF_cxp");

		$stmt ->bindParam(":$taRnc_Empresa_cxp", $Rnc_Empresa_cxp, PDO::PARAM_STR);
		$stmt ->bindParam(":$taRnc_Suplidor", $Rnc_Suplidor, PDO::PARAM_STR);
		$stmt ->bindParam(":$taNCF_cxp", $NCF_cxp, PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


		}

		/*****************************************************************
			Mostrar Ventas Editar
	*******************************************************************/
static public function mdlRETENCIONCOMPRA($tabla, $datos){


$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Retenciones = :Retenciones, Porc_ITBIS_Retenido = :Porc_ITBIS_Retenido, Porc_ISR_Retenido = :Porc_ISR_Retenido, ITBIS_Retenido_606 = :ITBIS_Retenido_606, Monto_Retencion_Renta_606 = :Monto_Retencion_Renta_606, NAsientoRET = :NAsientoRET WHERE Rnc_Empresa_Compras = :Rnc_Empresa_Compras AND Rnc_Suplidor = :Rnc_Suplidor AND NCF_Factura = :NCF_Factura");


$stmt ->bindParam(":Rnc_Empresa_Compras", $datos["Rnc_Empresa_Compras"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ITBIS_Retenido", $datos["Porc_ITBIS_Retenido"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ISR_Retenido", $datos["Porc_ISR_Retenido"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Retenido_606", $datos["ITBIS_Retenido_606"], PDO::PARAM_STR);
$stmt ->bindParam(":Monto_Retencion_Renta_606", $datos["Monto_Retencion_Renta_606"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsientoRET", $datos["NAsientoRET"], PDO::PARAM_STR);
		
		

		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function mdlMostrarComprasReportesSuplidores($tabla, $taRncEmpresaCompras, $taid_Suplidor, $Rnc_Empresa_Compras, $id_Suplidor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaCompras = :$taRncEmpresaCompras AND $taid_Suplidor = :$taid_Suplidor");

		$stmt -> bindParam(":".$taRncEmpresaCompras, $Rnc_Empresa_Compras, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_Suplidor, $id_Suplidor, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}
static public function mdlUdateComprasSuplidores($tabla, $datos){


	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Suplidor = :Rnc_Suplidor, Nombre_Suplidor = :Nombre_Suplidor WHERE id_Suplidor = :id_Suplidor AND Rnc_Empresa_Compras = :Rnc_Empresa_Compras");


		$stmt ->bindParam(":id_Suplidor", $datos["id_Suplidor"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_Compras", $datos["Rnc_Empresa_Compras"], PDO::PARAM_STR);
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


static public function MdlValidarVentasVerificarCXP($tabla, $datos){

	

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Compras = :Rnc_Empresa_Compras AND CodigoCompra = :CodigoCompra AND NCF_Factura = :NCF_Factura");

$stmt -> bindParam(":Rnc_Empresa_Compras", $datos["Rnc_Empresa_Compras"], PDO::PARAM_STR);
$stmt -> bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_STR);
$stmt -> bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/

}/*CIERRE CLASES*/
