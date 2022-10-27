<?php 

require_once "conexion.php";


class Modelo607{

	static public function MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_607 = :$taRnc_Empresa_607 AND $taNCF_607 = :$taNCF_607");

		$stmt -> bindParam(":".$taRnc_Empresa_607, $Rnc_Empresa_607, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_607, $NCF_607, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}


static public function MdlRegistrar607($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_607, Rnc_Factura_607, Tipo_Id_Factura_607, NCF_607, NCF_Modificado_607, Tipo_de_Ingreso_607, Fecha_AnoMesDia_607, Fecha_Ret_AnoMesDia_607, Monto_Facturado_607, ITBIS_Facturado_607, ITBIS_Retenido_Tercero_607, ITBIS_Percibido_607, Retencion_Renta_por_Terceros_607, ISR_Percibido_607, Impuesto_Selectivo_al_Consumo_607, Otros_Impuestos_607
, Monto_Propina_Legal_607, Efectivo, Cheque_Transferencia_Deposito_607, Tarjeta_Debito_Credito_607, Venta_a_Credito_607, Bonos_607, Permuta_607, Otras_Formas_de_Ventas_607, Estatus_607, Fecha_comprobante_AnoMes_607, Fecha_Comprobante_Dia_607, Fecha_Retencion_AnoMes_607, Fecha_Retencion_Dia_607, EXTRAER_NCF_607, extraer_forma_de_pago_607, Porc_ITBIS_Retenido_607, Porc_ISR_Retenido_607, Forma_de_Pago_607
, B04MeMa_607, Transaccion_607, Referencia_Pago_607, Banco_607, Fecha_Trans_AnoMes_607, Fecha_trans_dia_607, Descripcion_607, Nombre_Empresa_607, Usuario_Creador, Accion_607, Codigo_Factura, Modulo) VALUES (:Rnc_Empresa_607, :Rnc_Factura_607, :Tipo_Id_Factura_607, :NCF_607, :NCF_Modificado_607, :Tipo_de_Ingreso_607, :Fecha_AnoMesDia_607, :Fecha_Ret_AnoMesDia_607, :Monto_Facturado_607, :ITBIS_Facturado_607, :ITBIS_Retenido_Tercero_607, :ITBIS_Percibido_607, :Retencion_Renta_por_Terceros_607, :ISR_Percibido_607, :Impuesto_Selectivo_al_Consumo_607, :Otros_Impuestos_607, :Monto_Propina_Legal_607, :Efectivo, :Cheque_Transferencia_Deposito_607, :Tarjeta_Debito_Credito_607, :Venta_a_Credito_607, :Bonos_607, :Permuta_607, :Otras_Formas_de_Ventas_607, :Estatus_607, :Fecha_comprobante_AnoMes_607, :Fecha_Comprobante_Dia_607, :Fecha_Retencion_AnoMes_607, :Fecha_Retencion_Dia_607, :EXTRAER_NCF_607, :extraer_forma_de_pago_607, :Porc_ITBIS_Retenido_607, :Porc_ISR_Retenido_607, :Forma_de_Pago_607, :B04MeMa_607, :Transaccion_607, :Referencia_Pago_607, :Banco_607, :Fecha_Trans_AnoMes_607, :Fecha_trans_dia_607, :Descripcion_607, :Nombre_Empresa_607, :Usuario_Creador, :Accion_607, :Codigo_Factura, :Modulo)");
	
			
		

		$stmt ->bindParam(":Rnc_Empresa_607", $datos["Rnc_Empresa_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Factura_607", $datos["Rnc_Factura_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Id_Factura_607", $datos["Tipo_Id_Factura_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":NCF_607", $datos["NCF_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_Modificado_607", $datos["NCF_Modificado_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Tipo_de_Ingreso_607", $datos["Tipo_de_Ingreso_607"], PDO::PARAM_INT);
        $stmt ->bindParam(":Fecha_AnoMesDia_607", $datos["Fecha_AnoMesDia_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Ret_AnoMesDia_607", $datos["Fecha_Ret_AnoMesDia_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Facturado_607", $datos["Monto_Facturado_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Facturado_607", $datos["ITBIS_Facturado_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Retenido_Tercero_607", $datos["ITBIS_Retenido_Tercero_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Percibido_607", $datos["ITBIS_Percibido_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Retencion_Renta_por_Terceros_607", $datos["Retencion_Renta_por_Terceros_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":ISR_Percibido_607", $datos["ISR_Percibido_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Impuesto_Selectivo_al_Consumo_607", $datos["Impuesto_Selectivo_al_Consumo_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Otros_Impuestos_607", $datos["Otros_Impuestos_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Propina_Legal_607", $datos["Monto_Propina_Legal_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Efectivo", $datos["Efectivo"], PDO::PARAM_STR);
        $stmt ->bindParam(":Cheque_Transferencia_Deposito_607", $datos["Cheque_Transferencia_Deposito_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Tarjeta_Debito_Credito_607", $datos["Tarjeta_Debito_Credito_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Venta_a_Credito_607", $datos["Venta_a_Credito_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Bonos_607", $datos["Bonos_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Permuta_607", $datos["Permuta_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Otras_Formas_de_Ventas_607", $datos["Otras_Formas_de_Ventas_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Estatus_607", $datos["Estatus_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Fecha_comprobante_AnoMes_607", $datos["Fecha_comprobante_AnoMes_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Fecha_Comprobante_Dia_607", $datos["Fecha_Comprobante_Dia_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Fecha_Retencion_AnoMes_607", $datos["Fecha_Retencion_AnoMes_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Fecha_Retencion_Dia_607", $datos["Fecha_Retencion_Dia_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":EXTRAER_NCF_607", $datos["EXTRAER_NCF_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":extraer_forma_de_pago_607", $datos["extraer_forma_de_pago_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ITBIS_Retenido_607", $datos["Porc_ITBIS_Retenido_607"], PDO::PARAM_INT);
$stmt ->bindParam(":Porc_ISR_Retenido_607", $datos["Porc_ISR_Retenido_607"], PDO::PARAM_INT);
$stmt ->bindParam(":Forma_de_Pago_607", $datos["Forma_de_Pago_607"], PDO::PARAM_STR);
$stmt ->bindParam(":B04MeMa_607", $datos["B04MeMa_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Transaccion_607", $datos["Transaccion_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Referencia_Pago_607", $datos["Referencia_Pago_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Banco_607", $datos["Banco_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Trans_AnoMes_607", $datos["Fecha_Trans_AnoMes_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_trans_dia_607", $datos["Fecha_trans_dia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Descripcion_607", $datos["Descripcion_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Empresa_607", $datos["Nombre_Empresa_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
$stmt ->bindParam(":Accion_607", $datos["Accion_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo_Factura", $datos["Codigo_Factura"], PDO::PARAM_INT);
$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);


		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}
static public function MdlEditar607($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_607 = :Rnc_Empresa_607, Rnc_Factura_607 = :Rnc_Factura_607, Tipo_Id_Factura_607 = :Tipo_Id_Factura_607, NCF_607 = :NCF_607 
, NCF_Modificado_607 = :NCF_Modificado_607, Tipo_de_Ingreso_607 = :Tipo_de_Ingreso_607, Fecha_AnoMesDia_607 = :Fecha_AnoMesDia_607, Fecha_Ret_AnoMesDia_607 = :Fecha_Ret_AnoMesDia_607, Monto_Facturado_607 = :Monto_Facturado_607, ITBIS_Facturado_607 = :ITBIS_Facturado_607, ITBIS_Retenido_Tercero_607 = :ITBIS_Retenido_Tercero_607, ITBIS_Percibido_607 = :ITBIS_Percibido_607, Retencion_Renta_por_Terceros_607= :Retencion_Renta_por_Terceros_607, ISR_Percibido_607= :ISR_Percibido_607, Impuesto_Selectivo_al_Consumo_607 = :Impuesto_Selectivo_al_Consumo_607, Otros_Impuestos_607 = :Otros_Impuestos_607, Monto_Propina_Legal_607 = :Monto_Propina_Legal_607, Efectivo = :Efectivo, Cheque_Transferencia_Deposito_607 = :Cheque_Transferencia_Deposito_607, Tarjeta_Debito_Credito_607 = :Tarjeta_Debito_Credito_607, Venta_a_Credito_607 = :Venta_a_Credito_607, Bonos_607 = :Bonos_607, Permuta_607 = :Permuta_607, Otras_Formas_de_Ventas_607 = :Otras_Formas_de_Ventas_607, Estatus_607 = :Estatus_607, Fecha_comprobante_AnoMes_607 = :Fecha_comprobante_AnoMes_607, Fecha_Comprobante_Dia_607 = :Fecha_Comprobante_Dia_607, Fecha_Retencion_AnoMes_607 = :Fecha_Retencion_AnoMes_607, Fecha_Retencion_Dia_607 = :Fecha_Retencion_Dia_607, EXTRAER_NCF_607 = :EXTRAER_NCF_607, extraer_forma_de_pago_607 = :extraer_forma_de_pago_607, Porc_ITBIS_Retenido_607 = :Porc_ITBIS_Retenido_607, Porc_ISR_Retenido_607 = :Porc_ISR_Retenido_607, Forma_de_Pago_607 = :Forma_de_Pago_607, B04MeMa_607 = :B04MeMa_607, Transaccion_607 = :Transaccion_607, Referencia_Pago_607 = :Referencia_Pago_607, Banco_607 = :Banco_607, Fecha_Trans_AnoMes_607 = :Fecha_Trans_AnoMes_607, Fecha_trans_dia_607 = :Fecha_trans_dia_607, Descripcion_607 = :Descripcion_607, Nombre_Empresa_607 = :Nombre_Empresa_607, Usuario_Creador = :Usuario_Creador, Accion_607 = :Accion_607, Modulo = :Modulo WHERE id = :id");

	
	

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Empresa_607", $datos["Rnc_Empresa_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Factura_607", $datos["Rnc_Factura_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Id_Factura_607", $datos["Tipo_Id_Factura_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":NCF_607", $datos["NCF_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_Modificado_607", $datos["NCF_Modificado_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_de_Ingreso_607", $datos["Tipo_de_Ingreso_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":Fecha_AnoMesDia_607", $datos["Fecha_AnoMesDia_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Ret_AnoMesDia_607", $datos["Fecha_Ret_AnoMesDia_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Monto_Facturado_607", $datos["Monto_Facturado_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":ITBIS_Facturado_607", $datos["ITBIS_Facturado_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":ITBIS_Retenido_Tercero_607", $datos["ITBIS_Retenido_Tercero_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":ITBIS_Percibido_607", $datos["ITBIS_Percibido_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Retencion_Renta_por_Terceros_607", $datos["Retencion_Renta_por_Terceros_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":ISR_Percibido_607", $datos["ISR_Percibido_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Impuesto_Selectivo_al_Consumo_607", $datos["Impuesto_Selectivo_al_Consumo_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Otros_Impuestos_607", $datos["Otros_Impuestos_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Monto_Propina_Legal_607", $datos["Monto_Propina_Legal_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Efectivo", $datos["Efectivo"], PDO::PARAM_STR);
		$stmt ->bindParam(":Cheque_Transferencia_Deposito_607", $datos["Cheque_Transferencia_Deposito_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tarjeta_Debito_Credito_607", $datos["Tarjeta_Debito_Credito_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Venta_a_Credito_607", $datos["Venta_a_Credito_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Bonos_607", $datos["Bonos_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Permuta_607", $datos["Permuta_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Otras_Formas_de_Ventas_607", $datos["Otras_Formas_de_Ventas_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estatus_607", $datos["Estatus_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_comprobante_AnoMes_607", $datos["Fecha_comprobante_AnoMes_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Comprobante_Dia_607", $datos["Fecha_Comprobante_Dia_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Retencion_AnoMes_607", $datos["Fecha_Retencion_AnoMes_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Retencion_Dia_607", $datos["Fecha_Retencion_Dia_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":EXTRAER_NCF_607", $datos["EXTRAER_NCF_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":extraer_forma_de_pago_607", $datos["extraer_forma_de_pago_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Porc_ITBIS_Retenido_607", $datos["Porc_ITBIS_Retenido_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":Porc_ISR_Retenido_607", $datos["Porc_ISR_Retenido_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":Forma_de_Pago_607", $datos["Forma_de_Pago_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":B04MeMa_607", $datos["B04MeMa_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Transaccion_607", $datos["Transaccion_607"], PDO::PARAM_STR);	
		$stmt ->bindParam(":Referencia_Pago_607", $datos["Referencia_Pago_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Banco_607", $datos["Banco_607"], PDO::PARAM_STR);		
		$stmt ->bindParam(":Fecha_Trans_AnoMes_607", $datos["Fecha_Trans_AnoMes_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_trans_dia_607", $datos["Fecha_trans_dia_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion_607", $datos["Descripcion_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Empresa_607", $datos["Nombre_Empresa_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
        $stmt ->bindParam(":Accion_607", $datos["Accion_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);


		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}

static public function MdlEditar607FACTURA($tabla, $datos){
	

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Codigo_Factura = :Codigo_Factura, Rnc_Empresa_607 =:Rnc_Empresa_607, Rnc_Factura_607 = :Rnc_Factura_607, Tipo_Id_Factura_607 = :Tipo_Id_Factura_607, Fecha_AnoMesDia_607 = :Fecha_AnoMesDia_607, Fecha_Ret_AnoMesDia_607 = :Fecha_Ret_AnoMesDia_607, Monto_Facturado_607 = :Monto_Facturado_607, ITBIS_Facturado_607 = :ITBIS_Facturado_607, ITBIS_Retenido_Tercero_607 = :ITBIS_Retenido_Tercero_607, Retencion_Renta_por_Terceros_607 = :Retencion_Renta_por_Terceros_607, Otros_Impuestos_607 = :Otros_Impuestos_607, Efectivo = :Efectivo, Cheque_Transferencia_Deposito_607 = :Cheque_Transferencia_Deposito_607, Tarjeta_Debito_Credito_607 = :Tarjeta_Debito_Credito_607, Venta_a_Credito_607 = :Venta_a_Credito_607, Bonos_607 = :Bonos_607, Permuta_607 = :Permuta_607, Otras_Formas_de_Ventas_607 = :Otras_Formas_de_Ventas_607, Fecha_comprobante_AnoMes_607 = :Fecha_comprobante_AnoMes_607, Fecha_Comprobante_Dia_607 = :Fecha_Comprobante_Dia_607, Fecha_Retencion_AnoMes_607 = :Fecha_Retencion_AnoMes_607, Fecha_Retencion_Dia_607 = :Fecha_Retencion_Dia_607, extraer_forma_de_pago_607 = :extraer_forma_de_pago_607, Porc_ITBIS_Retenido_607 = :Porc_ITBIS_Retenido_607, Porc_ISR_Retenido_607 = :Porc_ISR_Retenido_607, Forma_de_Pago_607 = :Forma_de_Pago_607, Nombre_Empresa_607 = :Nombre_Empresa_607, Usuario_Creador = :Usuario_Creador, Accion_607 = :Accion_607, Modulo = :Modulo WHERE Codigo_Factura = :Codigo_Factura AND Rnc_Empresa_607 = :Rnc_Empresa_607");

	
$stmt ->bindParam(":Codigo_Factura", $datos["Codigo_Factura"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Empresa_607", $datos["Rnc_Empresa_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Rnc_Factura_607", $datos["Rnc_Factura_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Tipo_Id_Factura_607", $datos["Tipo_Id_Factura_607"], PDO::PARAM_INT);
$stmt ->bindParam(":Fecha_AnoMesDia_607", $datos["Fecha_AnoMesDia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Ret_AnoMesDia_607", $datos["Fecha_Ret_AnoMesDia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Monto_Facturado_607", $datos["Monto_Facturado_607"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Facturado_607", $datos["ITBIS_Facturado_607"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Retenido_Tercero_607", $datos["ITBIS_Retenido_Tercero_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Retencion_Renta_por_Terceros_607", $datos["Retencion_Renta_por_Terceros_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Otros_Impuestos_607", $datos["Otros_Impuestos_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Efectivo", $datos["Efectivo"], PDO::PARAM_STR);
$stmt ->bindParam(":Cheque_Transferencia_Deposito_607", $datos["Cheque_Transferencia_Deposito_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Tarjeta_Debito_Credito_607", $datos["Tarjeta_Debito_Credito_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Venta_a_Credito_607", $datos["Venta_a_Credito_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Bonos_607", $datos["Bonos_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Permuta_607", $datos["Permuta_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Otras_Formas_de_Ventas_607", $datos["Otras_Formas_de_Ventas_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_comprobante_AnoMes_607", $datos["Fecha_comprobante_AnoMes_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Comprobante_Dia_607", $datos["Fecha_Comprobante_Dia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Retencion_AnoMes_607", $datos["Fecha_Retencion_AnoMes_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Retencion_Dia_607", $datos["Fecha_Retencion_Dia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":extraer_forma_de_pago_607", $datos["extraer_forma_de_pago_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ITBIS_Retenido_607", $datos["Porc_ITBIS_Retenido_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ISR_Retenido_607", $datos["Porc_ISR_Retenido_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Forma_de_Pago_607", $datos["Forma_de_Pago_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Empresa_607", $datos["Nombre_Empresa_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
        $stmt ->bindParam(":Accion_607", $datos["Accion_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}
static public function MdlReciclar607FACTURA($tabla, $datos){
	

	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Codigo_Factura = :Codigo_Factura, Rnc_Empresa_607 =:Rnc_Empresa_607, Rnc_Factura_607 = :Rnc_Factura_607, Tipo_Id_Factura_607 = :Tipo_Id_Factura_607, NCF_607 = :NCF_607, Fecha_AnoMesDia_607 = :Fecha_AnoMesDia_607, Fecha_Ret_AnoMesDia_607 = :Fecha_Ret_AnoMesDia_607, Monto_Facturado_607 = :Monto_Facturado_607, ITBIS_Facturado_607 = :ITBIS_Facturado_607, ITBIS_Retenido_Tercero_607 = :ITBIS_Retenido_Tercero_607, Retencion_Renta_por_Terceros_607 = :Retencion_Renta_por_Terceros_607, Otros_Impuestos_607 = :Otros_Impuestos_607, Efectivo = :Efectivo, Cheque_Transferencia_Deposito_607 = :Cheque_Transferencia_Deposito_607, Tarjeta_Debito_Credito_607 = :Tarjeta_Debito_Credito_607, Venta_a_Credito_607 = :Venta_a_Credito_607, Bonos_607 = :Bonos_607, Permuta_607 = :Permuta_607, Otras_Formas_de_Ventas_607 = :Otras_Formas_de_Ventas_607, Fecha_comprobante_AnoMes_607 = :Fecha_comprobante_AnoMes_607, Fecha_Comprobante_Dia_607 = :Fecha_Comprobante_Dia_607, Fecha_Retencion_AnoMes_607 = :Fecha_Retencion_AnoMes_607, Fecha_Retencion_Dia_607 = :Fecha_Retencion_Dia_607, EXTRAER_NCF_607 = :EXTRAER_NCF_607, extraer_forma_de_pago_607 = :extraer_forma_de_pago_607, Porc_ITBIS_Retenido_607 = :Porc_ITBIS_Retenido_607, Porc_ISR_Retenido_607 = :Porc_ISR_Retenido_607, Forma_de_Pago_607 = :Forma_de_Pago_607, Nombre_Empresa_607 = :Nombre_Empresa_607, Usuario_Creador = :Usuario_Creador, Accion_607 = :Accion_607, Modulo = :Modulo WHERE Codigo_Factura = :Codigo_Factura AND Rnc_Empresa_607 = :Rnc_Empresa_607");

	
	

$stmt ->bindParam(":Codigo_Factura", $datos["Codigo_Factura"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Empresa_607", $datos["Rnc_Empresa_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Rnc_Factura_607", $datos["Rnc_Factura_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Tipo_Id_Factura_607", $datos["Tipo_Id_Factura_607"], PDO::PARAM_INT);
$stmt ->bindParam(":NCF_607", $datos["NCF_607"], PDO::PARAM_STR);

$stmt ->bindParam(":Fecha_AnoMesDia_607", $datos["Fecha_AnoMesDia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Ret_AnoMesDia_607", $datos["Fecha_Ret_AnoMesDia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Monto_Facturado_607", $datos["Monto_Facturado_607"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Facturado_607", $datos["ITBIS_Facturado_607"], PDO::PARAM_STR);
$stmt ->bindParam(":ITBIS_Retenido_Tercero_607", $datos["ITBIS_Retenido_Tercero_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Retencion_Renta_por_Terceros_607", $datos["Retencion_Renta_por_Terceros_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Otros_Impuestos_607", $datos["Otros_Impuestos_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Efectivo", $datos["Efectivo"], PDO::PARAM_STR);
$stmt ->bindParam(":Cheque_Transferencia_Deposito_607", $datos["Cheque_Transferencia_Deposito_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Tarjeta_Debito_Credito_607", $datos["Tarjeta_Debito_Credito_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Venta_a_Credito_607", $datos["Venta_a_Credito_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Bonos_607", $datos["Bonos_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Permuta_607", $datos["Permuta_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Otras_Formas_de_Ventas_607", $datos["Otras_Formas_de_Ventas_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_comprobante_AnoMes_607", $datos["Fecha_comprobante_AnoMes_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Comprobante_Dia_607", $datos["Fecha_Comprobante_Dia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Retencion_AnoMes_607", $datos["Fecha_Retencion_AnoMes_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_Retencion_Dia_607", $datos["Fecha_Retencion_Dia_607"], PDO::PARAM_STR);
$stmt ->bindParam(":EXTRAER_NCF_607", $datos["EXTRAER_NCF_607"], PDO::PARAM_STR);
$stmt ->bindParam(":extraer_forma_de_pago_607", $datos["extraer_forma_de_pago_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ITBIS_Retenido_607", $datos["Porc_ITBIS_Retenido_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Porc_ISR_Retenido_607", $datos["Porc_ISR_Retenido_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Forma_de_Pago_607", $datos["Forma_de_Pago_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Empresa_607", $datos["Nombre_Empresa_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
        $stmt ->bindParam(":Accion_607", $datos["Accion_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}
static public function mdlMostrar607Retener($tabla, $id_607, $Valor_id607){



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id_607 = :$id_607");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_607, $Valor_id607, PDO::PARAM_STR);
		

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


		}

static public function mdlMostrarReporte607($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $Orden, $periodoreporte607){

if($periodoreporte607 == "TODO"){             

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa607 = :$taRncEmpresa607  ORDER BY $Orden DESC");
       
        
 } else{
$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa607 = :$taRncEmpresa607 AND SUBSTRING(Fecha_comprobante_AnoMes_607, 1, 4) = $periodoreporte607 ORDER BY $Orden DESC");

 }
$stmt -> bindParam(":".$taRncEmpresa607, $Rnc_Empresa_607, PDO::PARAM_STR);
$stmt -> execute();

return $stmt -> fetchAll();
$stmt -> close();
$stmt = null;




                
}
static public function mdlMostrar607($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $id_607, $Valor_id607, $Orden){

		if($id_607 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id_607 = :$id_607 AND $taRncEmpresa607 = :$taRncEmpresa607  ORDER BY $Orden DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_607, $Valor_id607, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa607, $Rnc_Empresa_607, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




		} else { 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa607 = :$taRncEmpresa607 ORDER BY $Orden DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa607, $Rnc_Empresa_607, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		}
}
static public function mdlMostrarPeriodo607($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $taFecha_AnoMes_607){

		
		$stmt = Conexion::conectar()->prepare("SELECT DISTINCT Fecha_comprobante_AnoMes_607  FROM $tabla WHERE $taRncEmpresa607 = :$taRncEmpresa607 ORDER BY id DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa607, $Rnc_Empresa_607, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}

static public function mdlRangoFecha607($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $taFecha_AnoMes_607, $Fecha_AnoMes_607, $taFecha_Retencion_AnoMes_607){

		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ($taRncEmpresa607 = :$taRncEmpresa607 AND $taFecha_AnoMes_607 = :$taFecha_AnoMes_607) OR ($taRncEmpresa607 = :$taRncEmpresa607 AND $taFecha_Retencion_AnoMes_607 = :$taFecha_Retencion_AnoMes_607)");

		$stmt -> bindParam(":".$taFecha_AnoMes_607, $Fecha_AnoMes_607, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa607, $Rnc_Empresa_607, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taFecha_Retencion_AnoMes_607, $Fecha_AnoMes_607, PDO::PARAM_STR);
		
		
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	

		
}




static public function MdlAgregarretencion607($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id = :id, Fecha_Ret_AnoMesDia_607 = :Fecha_Ret_AnoMesDia_607, Fecha_Retencion_AnoMes_607 = :Fecha_Retencion_AnoMes_607, Fecha_Retencion_Dia_607 = :Fecha_Retencion_Dia_607, ITBIS_Retenido_Tercero_607 = :ITBIS_Retenido_Tercero_607, Retencion_Renta_por_Terceros_607 = :Retencion_Renta_por_Terceros_607, Porc_ITBIS_Retenido_607 = :Porc_ITBIS_Retenido_607, Porc_ISR_Retenido_607 = :Porc_ISR_Retenido_607, Usuario_Creador = :Usuario_Creador, Fecha_Registro = :Fecha_Registro, Accion_607 = :Accion_607 WHERE id = :id");

	     

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Fecha_Ret_AnoMesDia_607", $datos["Fecha_Ret_AnoMesDia_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Retencion_AnoMes_607", $datos["Fecha_Retencion_AnoMes_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Retencion_Dia_607", $datos["Fecha_Retencion_Dia_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":ITBIS_Retenido_Tercero_607", $datos["ITBIS_Retenido_Tercero_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Retencion_Renta_por_Terceros_607", $datos["Retencion_Renta_por_Terceros_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Porc_ITBIS_Retenido_607", $datos["Porc_ITBIS_Retenido_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":Porc_ISR_Retenido_607", $datos["Porc_ISR_Retenido_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Registro", $datos["Fecha_Registro"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion_607", $datos["Accion_607"], PDO::PARAM_STR);
		
		
		

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;




}

/************************************************
	 		BORRAR 606
	 ************************************************/
	 		static public function mdlBorrar607($tabla, $id, $id_607){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $id_607, PDO::PARAM_INT);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	 		}

	
	static public function MdlValidarRNCNCF($tabla, $RncEmpresa606, $ValorRncEmpresa606, $Rnc_Factura_606, $ValorRnc_Factura_606, $NCF_606, $ValorNCF_606){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $RncEmpresa606 = :$RncEmpresa606 AND $Rnc_Factura_606 = :$Rnc_Factura_606 AND $NCF_606 = :$NCF_606");

		$stmt -> bindParam(":".$RncEmpresa606, $ValorRncEmpresa606, PDO::PARAM_STR);
		$stmt -> bindParam(":".$Rnc_Factura_606, $ValorRnc_Factura_606, PDO::PARAM_STR);
		$stmt -> bindParam(":".$NCF_606, $ValorNCF_606, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/
	static public function MdlRegistrarBCF($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_607, Rnc_Factura_607, Tipo_Id_Factura_607, NCF_607, NCF_Modificado_607, Tipo_de_Ingreso_607, Fecha_AnoMesDia_607, Fecha_Ret_AnoMesDia_607, Monto_Facturado_607, ITBIS_Facturado_607, ITBIS_Retenido_Tercero_607, ITBIS_Percibido_607, Retencion_Renta_por_Terceros_607, ISR_Percibido_607, Impuesto_Selectivo_al_Consumo_607, Otros_Impuestos_607
, Monto_Propina_Legal_607, Efectivo, Cheque_Transferencia_Deposito_607, Tarjeta_Debito_Credito_607, Venta_a_Credito_607, Bonos_607, Permuta_607, Otras_Formas_de_Ventas_607, Estatus_607, Fecha_comprobante_AnoMes_607, Fecha_Comprobante_Dia_607, Fecha_Retencion_AnoMes_607, Fecha_Retencion_Dia_607, EXTRAER_NCF_607, extraer_forma_de_pago_607, Porc_ITBIS_Retenido_607, Porc_ISR_Retenido_607, Forma_de_Pago_607
, B04MeMa_607, Nombre_Empresa_607, Usuario_Creador, Accion_607, Codigo_Factura, Modulo) VALUES (:Rnc_Empresa_607, :Rnc_Factura_607, :Tipo_Id_Factura_607, :NCF_607, :NCF_Modificado_607, :Tipo_de_Ingreso_607, :Fecha_AnoMesDia_607, :Fecha_Ret_AnoMesDia_607, :Monto_Facturado_607, :ITBIS_Facturado_607, :ITBIS_Retenido_Tercero_607, :ITBIS_Percibido_607, :Retencion_Renta_por_Terceros_607, :ISR_Percibido_607, :Impuesto_Selectivo_al_Consumo_607, :Otros_Impuestos_607, :Monto_Propina_Legal_607, :Efectivo, :Cheque_Transferencia_Deposito_607, :Tarjeta_Debito_Credito_607, :Venta_a_Credito_607, :Bonos_607, :Permuta_607, :Otras_Formas_de_Ventas_607, :Estatus_607, :Fecha_comprobante_AnoMes_607, :Fecha_Comprobante_Dia_607, :Fecha_Retencion_AnoMes_607, :Fecha_Retencion_Dia_607, :EXTRAER_NCF_607, :extraer_forma_de_pago_607, :Porc_ITBIS_Retenido_607, :Porc_ISR_Retenido_607, :Forma_de_Pago_607, :B04MeMa_607, :Nombre_Empresa_607, :Usuario_Creador, :Accion_607, :Codigo_Factura, :Modulo)");
	
			
		

		$stmt ->bindParam(":Rnc_Empresa_607", $datos["Rnc_Empresa_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Factura_607", $datos["Rnc_Factura_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Id_Factura_607", $datos["Tipo_Id_Factura_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":NCF_607", $datos["NCF_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_Modificado_607", $datos["NCF_Modificado_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Tipo_de_Ingreso_607", $datos["Tipo_de_Ingreso_607"], PDO::PARAM_INT);
        $stmt ->bindParam(":Fecha_AnoMesDia_607", $datos["Fecha_AnoMesDia_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Ret_AnoMesDia_607", $datos["Fecha_Ret_AnoMesDia_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Facturado_607", $datos["Monto_Facturado_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Facturado_607", $datos["ITBIS_Facturado_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Retenido_Tercero_607", $datos["ITBIS_Retenido_Tercero_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Percibido_607", $datos["ITBIS_Percibido_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Retencion_Renta_por_Terceros_607", $datos["Retencion_Renta_por_Terceros_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":ISR_Percibido_607", $datos["ISR_Percibido_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Impuesto_Selectivo_al_Consumo_607", $datos["Impuesto_Selectivo_al_Consumo_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Otros_Impuestos_607", $datos["Otros_Impuestos_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Propina_Legal_607", $datos["Monto_Propina_Legal_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Efectivo", $datos["Efectivo"], PDO::PARAM_STR);
        $stmt ->bindParam(":Cheque_Transferencia_Deposito_607", $datos["Cheque_Transferencia_Deposito_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Tarjeta_Debito_Credito_607", $datos["Tarjeta_Debito_Credito_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Venta_a_Credito_607", $datos["Venta_a_Credito_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Bonos_607", $datos["Bonos_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Permuta_607", $datos["Permuta_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Otras_Formas_de_Ventas_607", $datos["Otras_Formas_de_Ventas_607"], PDO::PARAM_STR);
        $stmt ->bindParam(":Estatus_607", $datos["Estatus_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Fecha_comprobante_AnoMes_607", $datos["Fecha_comprobante_AnoMes_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Fecha_Comprobante_Dia_607", $datos["Fecha_Comprobante_Dia_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Fecha_Retencion_AnoMes_607", $datos["Fecha_Retencion_AnoMes_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Fecha_Retencion_Dia_607", $datos["Fecha_Retencion_Dia_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":EXTRAER_NCF_607", $datos["EXTRAER_NCF_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":extraer_forma_de_pago_607", $datos["extraer_forma_de_pago_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":Porc_ITBIS_Retenido_607", $datos["Porc_ITBIS_Retenido_607"], PDO::PARAM_INT);
    $stmt ->bindParam(":Porc_ISR_Retenido_607", $datos["Porc_ISR_Retenido_607"], PDO::PARAM_INT);
    $stmt ->bindParam(":Forma_de_Pago_607", $datos["Forma_de_Pago_607"], PDO::PARAM_STR);
    $stmt ->bindParam(":B04MeMa_607", $datos["B04MeMa_607"], PDO::PARAM_STR);
    
$stmt ->bindParam(":Nombre_Empresa_607", $datos["Nombre_Empresa_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
$stmt ->bindParam(":Accion_607", $datos["Accion_607"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo_Factura", $datos["Codigo_Factura"], PDO::PARAM_INT);
$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);
		
		


		

		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}

static public function MdlMostrar607Ventas($tabla, $taRnc_Empresa_607, $taNCF_607, $taCodigo_Factura ,$Rnc_Empresa_607, $NCF_607, $codigo){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_607 = :$taRnc_Empresa_607 AND $taNCF_607 = :$taNCF_607 AND $taCodigo_Factura = :$taCodigo_Factura");

		$stmt -> bindParam(":".$taRnc_Empresa_607, $Rnc_Empresa_607, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_607, $NCF_607, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taCodigo_Factura, $codigo, PDO::PARAM_STR);
	
	
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}
static public function mdlBorrarLD607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607, $taNCF_607, $NCF_607){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $taRnc_Empresa_607 = :$taRnc_Empresa_607 AND $taRnc_Factura_607 = :$taRnc_Factura_607 AND $taNCF_607 = :$taNCF_607");

		$stmt ->bindParam(":$taRnc_Empresa_607", $Rnc_Empresa_607, PDO::PARAM_STR);
		$stmt ->bindParam(":$taRnc_Factura_607", $Rnc_Factura_607, PDO::PARAM_STR);
		$stmt ->bindParam(":$taNCF_607", $NCF_607, PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	 		}



static public function Mdlcambiarodulo607($tabla, $datos){


$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NAsiento = :NAsiento WHERE id = :id AND Rnc_Empresa_Compras = :Rnc_Empresa_Compras AND Rnc_Suplidor = :Rnc_Suplidor AND NCF_Factura = :NCF_Factura");

	$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
	$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Empresa_Compras", $datos["Rnc_Empresa_Compras"], PDO::PARAM_STR);	
	$stmt ->bindParam(":Rnc_Suplidor", $datos["Rnc_Suplidor"], PDO::PARAM_STR);	
	$stmt ->bindParam(":NCF_Factura", $datos["NCF_Factura"], PDO::PARAM_STR);	
		
				
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

}

static public function mdlMostrar607Cliente($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $taRnc_Factura_607, $Rnc_Factura_607){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa607 = :$taRncEmpresa607 AND $taRnc_Factura_607 = :$taRnc_Factura_607");

		$stmt -> bindParam(":".$taRncEmpresa607, $Rnc_Empresa_607, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura_607, $Rnc_Factura_607, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

static public function mdlUdate607Cliente($tabla, $datos){

		

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Factura_607 = :Rnc_Factura_607, Tipo_Id_Factura_607 = :Tipo_Id_Factura_607, Nombre_Empresa_607 = :Nombre_Empresa_607 WHERE id = :id AND Rnc_Empresa_607 = :Rnc_Empresa_607");


		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_607", $datos["Rnc_Empresa_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Factura_607", $datos["Rnc_Factura_607"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Id_Factura_607", $datos["Tipo_Id_Factura_607"], PDO::PARAM_INT);
		$stmt ->bindParam(":Nombre_Empresa_607", $datos["Nombre_Empresa_607"], PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}


 



}/*CIERRE CLASES*/

