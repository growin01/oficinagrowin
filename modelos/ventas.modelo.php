<?php 

require_once "conexion.php";


class ModeloVentas{

	static public function mdlMostarVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $periodoventas){

	if($periodoventas == "TODO"){ 

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaVenta = :$taRncEmpresaVenta ORDER BY id DESC");

	}else{

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaVenta = :$taRncEmpresaVenta AND SUBSTRING(FechaAnoMes, 1, 4) = $periodoventas ORDER BY id DESC");
		
	}
	
//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
$stmt -> bindParam(":".$taRncEmpresaVenta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

$stmt -> execute();

return $stmt -> fetchAll();
		

}

	static public function mdlMostrarCodigoVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaVenta = :$taRncEmpresaVenta ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaVenta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

	/**********************************************************************
			REGISTRO DE VENTA
	************************************************************************/

	static public function mdlIngresarVenta($tabla, $datos){
		

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Venta,	id_607, Codigo, Rnc_Cliente, Nombre_Cliente, NCF_Factura, FechaAnoMes, FechaDia, id_Cliente, Correo_Cliente, id_Vendedor, Nombre_Vendedor, Producto, Porimpuesto, Pordescuento, Moneda, Tasa, Impuesto, Neto, Descuento, Total, Metodo_Pago, Referencia, Comision, Estatus, Observaciones, id_Proyecto, CodigoProyecto, Retenciones, Porc_ITBIS_Retenido, Porc_ISR_Retenido, ITBIS_Retenido_Tercero, RetencionRenta_por_Terceros,
 EXTRAER_NCF, NAsiento, NAsientoRet, TipodeInventario, Estado, Usuario_Creador, Accion_Factura) VALUES (:Rnc_Empresa_Venta, :id_607, :Codigo, :Rnc_Cliente, :Nombre_Cliente, :NCF_Factura, :FechaAnoMes, :FechaDia, :id_Cliente, :Correo_Cliente, :id_Vendedor, :Nombre_Vendedor, :Producto, :Porimpuesto, :Pordescuento, :Moneda, :Tasa, :Impuesto, :Neto, :Descuento, :Total, :Metodo_Pago, :Referencia, :Comision, :Estatus, :Observaciones, :id_Proyecto, :CodigoProyecto, :Retenciones, :Porc_ITBIS_Retenido, :Porc_ISR_Retenido, :ITBIS_Retenido_Tercero, :RetencionRenta_por_Terceros, :EXTRAER_NCF, :NAsiento, :NAsientoRet, :TipodeInventario, :Estado, :Usuario_Creador, :Accion_Factura)");


$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id_607", $datos["id_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
$stmt ->bindParam(":Correo_Cliente", $datos["Correo_Cliente"], PDO::PARAM_STR);
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
$stmt ->bindParam(":Metodo_Pago", $datos["Metodo_Pago"], PDO::PARAM_STR);
$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
$stmt ->bindParam(":Comision", $datos["Comision"], PDO::PARAM_INT);
$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ITBIS_Retenido", $datos["Porc_ITBIS_Retenido"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ISR_Retenido", $datos["Porc_ISR_Retenido"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Retenido_Tercero", $datos["ITBIS_Retenido_Tercero"], PDO::PARAM_STR);
$stmt ->bindParam(":RetencionRenta_por_Terceros", $datos["RetencionRenta_por_Terceros"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":EXTRAER_NCF", $datos["EXTRAER_NCF"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsientoRet", $datos["NAsientoRet"], PDO::PARAM_STR);
$stmt ->bindParam(":TipodeInventario", $datos["TipodeInventario"], PDO::PARAM_STR);
$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);
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

	
static public function mdlIngresarVentaRecurrente($tabla, $datos){
		
$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Venta, Rnc_Cliente, Nombre_Cliente, FechaAnoMes, FechaDia, id_Cliente, Correo_Cliente, id_Vendedor, Nombre_Vendedor, Producto, Porimpuesto, Pordescuento, Moneda, Tasa, Impuesto, Neto, Descuento, Total, Metodo_Pago, Referencia, Comision, Estatus, Observaciones, id_Proyecto, CodigoProyecto, EXTRAER_NCF, TipodeInventario, Estado, Usuario_Creador, Accion_Factura) VALUES (:Rnc_Empresa_Venta, :Rnc_Cliente, :Nombre_Cliente, :FechaAnoMes, :FechaDia, :id_Cliente, :Correo_Cliente, :id_Vendedor, :Nombre_Vendedor, :Producto, :Porimpuesto, :Pordescuento, :Moneda, :Tasa, :Impuesto, :Neto, :Descuento, :Total, :Metodo_Pago, :Referencia, :Comision, :Estatus, :Observaciones, :id_Proyecto, :CodigoProyecto, :EXTRAER_NCF, :TipodeInventario, :Estado, :Usuario_Creador, :Accion_Factura)");


$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
$stmt ->bindParam(":Correo_Cliente", $datos["Correo_Cliente"], PDO::PARAM_STR);
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
$stmt ->bindParam(":Metodo_Pago", $datos["Metodo_Pago"], PDO::PARAM_STR);
$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
$stmt ->bindParam(":Comision", $datos["Comision"], PDO::PARAM_INT);
$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":EXTRAER_NCF", $datos["EXTRAER_NCF"], PDO::PARAM_STR);
$stmt ->bindParam(":TipodeInventario", $datos["TipodeInventario"], PDO::PARAM_STR);
$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);
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

	
	/*****************************************************************
			Mostrar Ventas Editar
	*******************************************************************/


	static public function mdlMostrarVentaEditar($tabla, $id, $valoridVenta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valoridVenta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}

	/**********************************************************************
			EDITAR DE VENTA
	************************************************************************/

	static public function mdlEditarVenta($tabla, $datos){
		

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Venta = :Rnc_Empresa_Venta, Codigo = :Codigo, Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente, FechaAnoMes = :FechaAnoMes, FechaDia = :FechaDia, id_Cliente = :id_Cliente, Correo_Cliente = :Correo_Cliente, id_Vendedor = :id_Vendedor, Nombre_Vendedor = :Nombre_Vendedor, Producto = :Producto, Porimpuesto = :Porimpuesto, Pordescuento = :Pordescuento, Moneda = :Moneda, Tasa = :Tasa, Impuesto = :Impuesto, Neto = :Neto, Descuento = :Descuento, Total = :Total, Metodo_Pago = :Metodo_Pago, Referencia = :Referencia, Comision = :Comision, Estatus = :Estatus, Observaciones = :Observaciones, id_Proyecto =:id_Proyecto, CodigoProyecto = :CodigoProyecto, Retenciones = :Retenciones, Porc_ITBIS_Retenido = :Porc_ITBIS_Retenido, Porc_ISR_Retenido = :Porc_ISR_Retenido, ITBIS_Retenido_Tercero = :ITBIS_Retenido_Tercero, RetencionRenta_por_Terceros = :RetencionRenta_por_Terceros, NAsiento = :NAsiento, NAsientoRET = :NAsientoRET WHERE id = :id");


$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
$stmt ->bindParam(":Correo_Cliente", $datos["Correo_Cliente"], PDO::PARAM_STR);
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
$stmt ->bindParam(":Metodo_Pago", $datos["Metodo_Pago"], PDO::PARAM_STR);
$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
$stmt ->bindParam(":Comision", $datos["Comision"], PDO::PARAM_INT);
$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_INT);
$stmt ->bindParam(":Porc_ITBIS_Retenido", $datos["Porc_ITBIS_Retenido"], PDO::PARAM_INT);
$stmt ->bindParam(":Porc_ISR_Retenido", $datos["Porc_ISR_Retenido"], PDO::PARAM_INT);
$stmt ->bindParam(":ITBIS_Retenido_Tercero", $datos["ITBIS_Retenido_Tercero"], PDO::PARAM_STR);
$stmt ->bindParam(":RetencionRenta_por_Terceros", $datos["RetencionRenta_por_Terceros"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsientoRET", $datos["NAsientoRET"], PDO::PARAM_STR);
		

if($stmt->execute()){
	return "ok";

}else{

	return "error";

}

		$stmt -> close();
		$stmt = null;


}/* CIERRE funcion DE REGISTRO DE VENTA*/

static public function mdlEditarVentaRecurrente($tabla, $datos){
		

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Venta = :Rnc_Empresa_Venta, Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente, FechaAnoMes = :FechaAnoMes, FechaDia = :FechaDia, id_Cliente = :id_Cliente, Correo_Cliente = :Correo_Cliente, id_Vendedor = :id_Vendedor, Nombre_Vendedor = :Nombre_Vendedor, Producto = :Producto, Porimpuesto = :Porimpuesto, Pordescuento = :Pordescuento, Moneda = :Moneda, Tasa = :Tasa, Impuesto = :Impuesto, Neto = :Neto, Descuento = :Descuento, Total = :Total, Metodo_Pago = :Metodo_Pago, Referencia = :Referencia, Comision = :Comision, Estatus = :Estatus, Observaciones = :Observaciones, id_Proyecto =:id_Proyecto, CodigoProyecto = :CodigoProyecto, EXTRAER_NCF = :EXTRAER_NCF, TipodeInventario = :TipodeInventario, Estado = :Estado, Usuario_Creador = :Usuario_Creador, Accion_Factura = :Accion_Factura WHERE id = :id");


$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
$stmt ->bindParam(":Correo_Cliente", $datos["Correo_Cliente"], PDO::PARAM_STR);
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
$stmt ->bindParam(":Metodo_Pago", $datos["Metodo_Pago"], PDO::PARAM_STR);
$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
$stmt ->bindParam(":Comision", $datos["Comision"], PDO::PARAM_INT);
$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":EXTRAER_NCF", $datos["EXTRAER_NCF"], PDO::PARAM_STR);
$stmt ->bindParam(":TipodeInventario", $datos["TipodeInventario"], PDO::PARAM_STR);
$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);
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


static public function mdlReciclarVenta($tabla, $datos){
		

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Venta = :Rnc_Empresa_Venta, Codigo = :Codigo, Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente, NCF_Factura = :NCF_Factura, FechaAnoMes = :FechaAnoMes, FechaDia = :FechaDia, id_Cliente = :id_Cliente, Correo_Cliente = :Correo_Cliente, id_Vendedor = :id_Vendedor, Nombre_Vendedor = :Nombre_Vendedor, Producto = :Producto, Porimpuesto = :Porimpuesto, Pordescuento = :Pordescuento, Moneda = :Moneda, Tasa = :Tasa, Impuesto = :Impuesto, Neto = :Neto, Descuento = :Descuento, Total = :Total, Metodo_Pago = :Metodo_Pago, Referencia = :Referencia, Comision = :Comision, Estatus = :Estatus, Observaciones = :Observaciones, id_Proyecto =:id_Proyecto, CodigoProyecto = :CodigoProyecto, Retenciones = :Retenciones, Porc_ITBIS_Retenido = :Porc_ITBIS_Retenido, Porc_ISR_Retenido = :Porc_ISR_Retenido, ITBIS_Retenido_Tercero = :ITBIS_Retenido_Tercero, RetencionRenta_por_Terceros = :RetencionRenta_por_Terceros, NAsiento = :NAsiento, NAsientoRET = :NAsientoRET, EXTRAER_NCF = :EXTRAER_NCF WHERE id = :id");


$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
$stmt ->bindParam(":Correo_Cliente", $datos["Correo_Cliente"], PDO::PARAM_STR);
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
$stmt ->bindParam(":Metodo_Pago", $datos["Metodo_Pago"], PDO::PARAM_STR);
$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
$stmt ->bindParam(":Comision", $datos["Comision"], PDO::PARAM_INT);
$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Proyecto", $datos["id_Proyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_INT);
$stmt ->bindParam(":Porc_ITBIS_Retenido", $datos["Porc_ITBIS_Retenido"], PDO::PARAM_INT);
$stmt ->bindParam(":Porc_ISR_Retenido", $datos["Porc_ISR_Retenido"], PDO::PARAM_INT);
$stmt ->bindParam(":ITBIS_Retenido_Tercero", $datos["ITBIS_Retenido_Tercero"], PDO::PARAM_STR);
$stmt ->bindParam(":RetencionRenta_por_Terceros", $datos["RetencionRenta_por_Terceros"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsientoRET", $datos["NAsientoRET"], PDO::PARAM_STR);
$stmt ->bindParam(":EXTRAER_NCF", $datos["EXTRAER_NCF"], PDO::PARAM_STR);
		

if($stmt->execute()){
	return "ok";

}else{

	return "error";

}

		$stmt -> close();
		$stmt = null;


}/* CIERRE funcion DE REGISTRO DE VENTA*/
static public function mdlBorrarVenta($tabla, $id, $valoridVenta){

	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $id = :$id");

	$stmt ->bindParam(":$id", $valoridVenta, PDO::PARAM_INT);
		
		
	if($stmt->execute()){
			return "ok";

	}else{

			return "error";

	}

	$stmt -> close();
	$stmt = null;


}
		/************************************************
	 		BORRAR Ventas
	 ************************************************/
	 static public function mdlBorrarVenta607CXC($tabla, $taRnc_Empresa_cxc, $Rnc_Empresa_Venta, $id, $valoridVenta){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $id = :$id AND $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc");

		$stmt ->bindParam(":$id", $valoridVenta, PDO::PARAM_INT);
		$stmt ->bindParam(":$taRnc_Empresa_cxc", $Rnc_Empresa_Venta, PDO::PARAM_STR);
		
		
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


	static public function mdlMostrarImprimirFactura($tabla, $id, $valorCodigo){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorCodigo, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	 }
static public function mdlRangoVentasMetodopago($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $taMetodo_Pago, $Metododepago){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaVenta = :$taRncEmpresaVenta AND  $taMetodo_Pago = :$taMetodo_Pago ORDER BY id DESC");

		
		$stmt -> bindParam(":".$taRncEmpresaVenta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taMetodo_Pago, $Metododepago, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
	  
	}

	 /**************************************************
	 			RANGO DE FECHA
	 ***************************************************/

static public function mdlRangoFechasVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $fechaInicial, $fechaFinal){

	if($fechaInicial == null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaVenta = :$taRncEmpresaVenta ORDER BY id DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaVenta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

	}else if($fechaInicial == $fechaFinal){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Venta = '$Rnc_Empresa_Venta' AND Fecha like '%$fechaFinal%'");

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

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Venta = '$Rnc_Empresa_Venta' AND Fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");





		}else{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Venta = '$Rnc_Empresa_Venta' AND Fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

		}

				

		$stmt -> execute();

		return $stmt -> fetchAll();



	}







}

/****************************
	MOSTRAR VENTAS REPORTES
*****************************/

static public function mdlMostrarVentasReportes($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaVenta = :$taRncEmpresaVenta");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaVenta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}
static public function mdlMostrarVentasReportesCliente($tabla, $taRncEmpresacxc, $taRnc_Cliente, $Rnc_Empresa_cxc, $Rnc_Cliente){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresacxc = :$taRncEmpresacxc AND $taRnc_Cliente = :$taRnc_Cliente");

		$stmt -> bindParam(":".$taRncEmpresacxc, $Rnc_Empresa_cxc, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Cliente, $Rnc_Cliente, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}
/*********************************
		SUMA TOTAL VENTAS
**********************************/

static public function mdlSumaTotalVentas($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $periodo){

	$stmt = Conexion::conectar()->prepare("SELECT SUM(Monto_Facturado_607) as total from $tabla WHERE $taRncEmpresaVenta = :$taRncEmpresaVenta AND SUBSTRING(Fecha_comprobante_AnoMes_607, 1, 4) = $periodo");

	$stmt -> bindParam(":".$taRncEmpresaVenta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;



}/*CIERRE SUMA TOTAL VENTAS*/
static public function mdlSumaTotalGastos($tabla, $taRncEmpresaVenta, $Rnc_Empresa_Venta, $periodo){

	$stmt = Conexion::conectar()->prepare("SELECT SUM(Total_Monto_Factura_606) as total from $tabla WHERE $taRncEmpresaVenta = :$taRncEmpresaVenta AND SUBSTRING(Fecha_AnoMes_606, 1, 4) = $periodo");


	$stmt -> bindParam(":".$taRncEmpresaVenta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;







}/*CIERRE SUMA TOTAL VENTAS*/

static public function mdlEditarEstatusVenta($tabla, $datos){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Estatus = :Estatus WHERE Rnc_Empresa_Venta = :Rnc_Empresa_Venta AND Rnc_Cliente = :Rnc_Cliente AND NCF_Factura = :NCF_Factura");

	$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
	$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
	$stmt ->bindParam(":Estatus", $datos["Estatus"], PDO::PARAM_STR);
		
		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/* CIERRE funcion DE REGISTRO DE VENTA*/

static public function mdlMostrarVentasProductos($tabla, $taRnc_Empresa_Venta, $Rnc_Empresa_Venta, $taFecha, $FechaDesde, $FechaHasta, $Orden){

	if($FechaDesde == null){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Venta = :$taRnc_Empresa_Venta ORDER BY $Orden DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_Venta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		

	}else { 

		
	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Venta = :$taRnc_Empresa_Venta AND CONCAT(FechaAnoMes, FechaDia) BETWEEN $FechaDesde AND $FechaHasta ORDER BY $Orden DESC");


		
		$stmt -> bindParam(":".$taRnc_Empresa_Venta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

	}




}


static public function mdlMostarVENTASFACTURA($tabla, $taCodigo, $taRnc_Empresa_cxc, $Codigo_Factura, $Rnc_Empresa){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taCodigo = :$taCodigo AND $taRnc_Empresa_cxc = :$taRnc_Empresa_cxc");

		$stmt -> bindParam(":".$taCodigo, $Codigo_Factura, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taRnc_Empresa_cxc, $Rnc_Empresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		


}

static public function mdlRETENCIONVENTA($tabla, $datos){
	

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Retenciones = :Retenciones, Porc_ITBIS_Retenido = :Porc_ITBIS_Retenido, Porc_ISR_Retenido = :Porc_ISR_Retenido, ITBIS_Retenido_Tercero = :ITBIS_Retenido_Tercero, RetencionRenta_por_Terceros = :RetencionRenta_por_Terceros, NAsientoRET = :NAsientoRET WHERE Rnc_Empresa_Venta = :Rnc_Empresa_Venta AND Rnc_Cliente = :Rnc_Cliente AND NCF_Factura = :NCF_Factura");


$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
$stmt ->bindParam(":Retenciones", $datos["Retenciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ITBIS_Retenido", $datos["Porc_ITBIS_Retenido"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ISR_Retenido", $datos["Porc_ISR_Retenido"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Retenido_Tercero", $datos["ITBIS_Retenido_Tercero"], PDO::PARAM_STR);
$stmt ->bindParam(":RetencionRenta_por_Terceros", $datos["RetencionRenta_por_Terceros"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsientoRET", $datos["NAsientoRET"], PDO::PARAM_STR);
		
		

		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}

static public function MdlValidarVentas($tabla, $datos){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Venta = :Rnc_Empresa_Venta AND Rnc_Cliente = :Rnc_Cliente AND NCF_Factura = :NCF_Factura");

$stmt -> bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt -> bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
$stmt -> bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/
static public function MdlValidarVentasVerificarCXC($tabla, $datos){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE Rnc_Empresa_Venta = :Rnc_Empresa_Venta AND Codigo = :Codigo AND NCF_Factura = :NCF_Factura");

$stmt -> bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt -> bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
$stmt -> bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/

static public function mdlUdateVentasCliente($tabla, $datos){

	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Cliente = :Rnc_Cliente, Nombre_Cliente = :Nombre_Cliente, Correo_Cliente = :Correo_Cliente WHERE id_Cliente = :id_Cliente AND Rnc_Empresa_Venta = :Rnc_Empresa_Venta");


		$stmt ->bindParam(":id_Cliente", $datos["id_Cliente"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Cliente", $datos["Rnc_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cliente", $datos["Nombre_Cliente"], PDO::PARAM_STR);
		$stmt ->bindParam(":Correo_Cliente", $datos["Correo_Cliente"], PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}

static public function MdlValidarClienteRecurrete($tabla, $taRnc_Cliente, $taRnc_Empresa_Venta, $Rnc_Cliente, $Rnc_Empresa_Venta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Cliente = :$taRnc_Cliente AND $taRnc_Empresa_Venta = :$taRnc_Empresa_Venta");

		$stmt -> bindParam(":".$taRnc_Cliente, $Rnc_Cliente, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_Venta, $Rnc_Empresa_Venta, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/

	static public function mdlReciboVentasContado($tabla, $datos){


$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_VentaContado, NAsiento, Metododepago, FechaAnoMes, FechaDia, Facturas, Tipodiferencia, Subdeposito, Deposito, Referencia, EntidadBancaria, Descripcion, Modulo, banco, id_Proyecto, CodigoProyecto, Accion) VALUES (:Rnc_Empresa_VentaContado, :NAsiento, :Metododepago, :FechaAnoMes, :FechaDia, :Facturas, :Tipodiferencia, :Subdeposito, :Deposito, :Referencia, :EntidadBancaria, :Descripcion, :Modulo, :banco, :id_Proyecto, :CodigoProyecto, :Accion)");

		$stmt ->bindParam(":Rnc_Empresa_VentaContado", $datos["Rnc_Empresa_VentaContado"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":Metododepago", $datos["Metododepago"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Facturas", $datos["Facturas"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipodiferencia", $datos["Tipodiferencia"], PDO::PARAM_INT);
		$stmt ->bindParam(":Subdeposito", $datos["Subdeposito"], PDO::PARAM_STR);
		$stmt ->bindParam(":Deposito", $datos["Deposito"], PDO::PARAM_STR);
		$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":EntidadBancaria", $datos["EntidadBancaria"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);
		$stmt ->bindParam(":banco", $datos["banco"], PDO::PARAM_STR);
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

	static public function mdlEditarReciboVentasContado($tabla, $datos){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_VentaContado = :Rnc_Empresa_VentaContado, NAsiento = :NAsiento, Metododepago = :Metododepago, FechaAnoMes = :FechaAnoMes, FechaDia = :FechaDia, Facturas = :Facturas, Tipodiferencia = :Tipodiferencia, Subdeposito = :Subdeposito, Deposito = :Deposito, Referencia = :Referencia, EntidadBancaria = :EntidadBancaria, Descripcion = :Descripcion, Modulo = :Modulo, banco = :banco, id_Proyecto = :id_Proyecto, CodigoProyecto = :CodigoProyecto, Accion = :Accion WHERE id = :id");


		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		$stmt ->bindParam(":Rnc_Empresa_VentaContado", $datos["Rnc_Empresa_VentaContado"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":Metododepago", $datos["Metododepago"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechaDia", $datos["FechaDia"], PDO::PARAM_STR);
		$stmt ->bindParam(":Facturas", $datos["Facturas"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipodiferencia", $datos["Tipodiferencia"], PDO::PARAM_INT);
		$stmt ->bindParam(":Subdeposito", $datos["Subdeposito"], PDO::PARAM_STR);
		$stmt ->bindParam(":Deposito", $datos["Deposito"], PDO::PARAM_STR);
		$stmt ->bindParam(":Referencia", $datos["Referencia"], PDO::PARAM_STR);
		$stmt ->bindParam(":EntidadBancaria", $datos["EntidadBancaria"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);
		$stmt ->bindParam(":banco", $datos["banco"], PDO::PARAM_STR);
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
static public function mdlMostarReciboDeposito($tabla, $taRnc_Empresa_VentaContado, $Rnc_Empresa_VentaContado){

	
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_VentaContado = :$taRnc_Empresa_VentaContado ORDER BY id DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_VentaContado, $Rnc_Empresa_VentaContado, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		


}
static public function mdlEditarReciboDeposito($tabla, $id, $idventascontado){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id ORDER BY id ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $idventascontado, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}

static public function mdlActualizarVentaContado($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Estado = :Estado WHERE Rnc_Empresa_Venta = :Rnc_Empresa_Venta AND id = :id AND Rnc_Cliente = :Rnc_Cliente AND NCF_Factura = :NCF_Factura");

		
$stmt ->bindParam(":Rnc_Empresa_Venta", $datos["Rnc_Empresa_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_STR);
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

}/*CIERRE DE CLASES VENTAS*/
