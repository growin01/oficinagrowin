<?php 

require_once "conexion.php";


class Modelo606{

	static public function MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_606 = :$taRnc_Empresa_606 AND $taRnc_Factura_606 = :$taRnc_Factura_606 AND $taNCF_606 = :$taNCF_606");

		$stmt -> bindParam(":".$taRnc_Empresa_606, $Rnc_Empresa_606, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Factura_606, $Rnc_Factura_606, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNCF_606, $NCF_606, PDO::PARAM_STR);
	
		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}
static public function MdlfacturaRepetida606B11B13($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taNCF_606, $NCF_606){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_606 = :$taRnc_Empresa_606 AND $taNCF_606 = :$taNCF_606");

        $stmt -> bindParam(":".$taRnc_Empresa_606, $Rnc_Empresa_606, PDO::PARAM_STR);
        $stmt -> bindParam(":".$taNCF_606, $NCF_606, PDO::PARAM_STR);
    
    

        $stmt -> execute();

        return $stmt -> fetch();
        $stmt -> close();
        $stmt = null;


    }


static public function MdlRegistrar606($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_606, Rnc_Factura_606, Tipo_Id_Factura_606, Tipo_Gasto_606, NCF_606, NCF_Modificado_606, Fecha_AnoMes_606, Fecha_Dia_606, Fecha_Ret_AnoMes_606, Fecha_Ret_Dia_606, Monto_Servicios_606, Monto_Bienes_606, Total_Monto_Factura_606, ITBIS_Factura_606, ITBIS_Retenido_606, ITBIS_Proporcional_606, ITBIS_alcosto_606, ITBIS_Adelantar_606, ITBIS_Percibido_Compras_606, Tipo_Retencion_ISR_606, Monto_Retencion_Renta_606, ISR_Percibido_606, Impuestos_Selectivo_606, Otro_Impuesto_606, Monto_Propina_606, Forma_Pago_606, Estatus_606, Extraer_NCF_606, Extraer_Tipo_Pago_606, Extraer_Tipo_Gasto_606, ITBIS_Compras_606, ITBIS_Servicios_606, ITBIS_Proporcional_Compras_606, ITBIS_Proporcional_Servicion_606, Extrar_Tipo_Retencion_606, Porc_ITBIS_Retenido_606, Porc_ISR_Retenido_606, B04_Periodo_606, Tipo_Transaccion_606, Fecha_Trans_AnoMes_606, Fecha_Trans_Dia_606, Referencia_606, Banco_606, Descripcion_606, Nombre_Empresa_606, Usuario_Creador, Accion_606, CodigoCompra, Modulo) VALUES (:Rnc_Empresa_606, :Rnc_Factura_606, :Tipo_Id_Factura_606, :Tipo_Gasto_606, :NCF_606, :NCF_Modificado_606, :Fecha_AnoMes_606, :Fecha_Dia_606, :Fecha_Ret_AnoMes_606, :Fecha_Ret_Dia_606, :Monto_Servicios_606, :Monto_Bienes_606, :Total_Monto_Factura_606, :ITBIS_Factura_606, :ITBIS_Retenido_606, :ITBIS_Proporcional_606, :ITBIS_alcosto_606, :ITBIS_Adelantar_606, :ITBIS_Percibido_Compras_606, :Tipo_Retencion_ISR_606, :Monto_Retencion_Renta_606, :ISR_Percibido_606, :Impuestos_Selectivo_606, :Otro_Impuesto_606, :Monto_Propina_606, :Forma_Pago_606, :Estatus_606, :Extraer_NCF_606, :Extraer_Tipo_Pago_606, :Extraer_Tipo_Gasto_606, :ITBIS_Compras_606, :ITBIS_Servicios_606, :ITBIS_Proporcional_Compras_606, :ITBIS_Proporcional_Servicion_606, :Extrar_Tipo_Retencion_606, :Porc_ITBIS_Retenido_606, :Porc_ISR_Retenido_606, :B04_Periodo_606, :Tipo_Transaccion_606, :Fecha_Trans_AnoMes_606, :Fecha_Trans_Dia_606, :Referencia_606, :Banco_606, :Descripcion_606, :Nombre_Empresa_606, :Usuario_Creador, :Accion_606, :CodigoCompra, :Modulo)");
	

		$stmt ->bindParam(":Rnc_Empresa_606", $datos["Rnc_Empresa_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Factura_606", $datos["Rnc_Factura_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Id_Factura_606", $datos["Tipo_Id_Factura_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":Tipo_Gasto_606", $datos["Tipo_Gasto_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":NCF_606", $datos["NCF_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":NCF_Modificado_606", $datos["NCF_Modificado_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_AnoMes_606", $datos["Fecha_AnoMes_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Dia_606", $datos["Fecha_Dia_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Ret_AnoMes_606", $datos["Fecha_Ret_AnoMes_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Ret_Dia_606", $datos["Fecha_Ret_Dia_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Servicios_606", $datos["Monto_Servicios_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Bienes_606", $datos["Monto_Bienes_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Total_Monto_Factura_606", $datos["Total_Monto_Factura_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Factura_606", $datos["ITBIS_Factura_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Retenido_606", $datos["ITBIS_Retenido_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Proporcional_606", $datos["ITBIS_Proporcional_606"], PDO::PARAM_STR); 
        $stmt ->bindParam(":ITBIS_alcosto_606", $datos["ITBIS_alcosto_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Adelantar_606", $datos["ITBIS_Adelantar_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Percibido_Compras_606", $datos["ITBIS_Percibido_Compras_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Tipo_Retencion_ISR_606", $datos["Tipo_Retencion_ISR_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Retencion_Renta_606", $datos["Monto_Retencion_Renta_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ISR_Percibido_606", $datos["ISR_Percibido_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Impuestos_Selectivo_606", $datos["Impuestos_Selectivo_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Otro_Impuesto_606", $datos["Otro_Impuesto_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Propina_606", $datos["Monto_Propina_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Forma_Pago_606", $datos["Forma_Pago_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Estatus_606", $datos["Estatus_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Extraer_NCF_606", $datos["Extraer_NCF_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Extraer_Tipo_Pago_606", $datos["Extraer_Tipo_Pago_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Extraer_Tipo_Gasto_606", $datos["Extraer_Tipo_Gasto_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Compras_606", $datos["ITBIS_Compras_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Servicios_606", $datos["ITBIS_Servicios_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Proporcional_Compras_606", $datos["ITBIS_Proporcional_Compras_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Proporcional_Servicion_606", $datos["ITBIS_Proporcional_Servicion_606"], PDO::PARAM_STR);
      	$stmt ->bindParam(":Extrar_Tipo_Retencion_606", $datos["Extrar_Tipo_Retencion_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":Porc_ITBIS_Retenido_606", $datos["Porc_ITBIS_Retenido_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":Porc_ISR_Retenido_606", $datos["Porc_ISR_Retenido_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":B04_Periodo_606", $datos["B04_Periodo_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":Tipo_Transaccion_606", $datos["Tipo_Transaccion_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":Fecha_Trans_AnoMes_606", $datos["Fecha_Trans_AnoMes_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Trans_Dia_606", $datos["Fecha_Trans_Dia_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Referencia_606", $datos["Referencia_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Banco_606", $datos["Banco_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Descripcion_606", $datos["Descripcion_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Nombre_Empresa_606", $datos["Nombre_Empresa_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
        $stmt ->bindParam(":Accion_606", $datos["Accion_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
        $stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);
	

		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}
static public function MdlEditar606($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_606 = :Rnc_Empresa_606, Rnc_Factura_606 = :Rnc_Factura_606, Tipo_Id_Factura_606 = :Tipo_Id_Factura_606, Tipo_Gasto_606 = :Tipo_Gasto_606, NCF_606 = :NCF_606, NCF_Modificado_606 = :NCF_Modificado_606, Fecha_AnoMes_606 = :Fecha_AnoMes_606, Fecha_Dia_606 = :Fecha_Dia_606, Fecha_Ret_AnoMes_606 = :Fecha_Ret_AnoMes_606, Fecha_Ret_Dia_606 = :Fecha_Ret_Dia_606, Monto_Servicios_606 = :Monto_Servicios_606, Monto_Bienes_606 = :Monto_Bienes_606, Total_Monto_Factura_606 = :Total_Monto_Factura_606, ITBIS_Factura_606 = :ITBIS_Factura_606, ITBIS_Retenido_606 = :ITBIS_Retenido_606, ITBIS_Proporcional_606 = :ITBIS_Proporcional_606, ITBIS_alcosto_606 = :ITBIS_alcosto_606, ITBIS_Adelantar_606 = :ITBIS_Adelantar_606, ITBIS_Percibido_Compras_606 = :ITBIS_Percibido_Compras_606, Tipo_Retencion_ISR_606 = :Tipo_Retencion_ISR_606, Monto_Retencion_Renta_606 = :Monto_Retencion_Renta_606, ISR_Percibido_606 = :ISR_Percibido_606, Impuestos_Selectivo_606 = :Impuestos_Selectivo_606, Otro_Impuesto_606 = :Otro_Impuesto_606, Monto_Propina_606 = :Monto_Propina_606, Forma_Pago_606 = :Forma_Pago_606, Estatus_606 = :Estatus_606, Extraer_NCF_606 = :Extraer_NCF_606, Extraer_Tipo_Pago_606 = :Extraer_Tipo_Pago_606, Extraer_Tipo_Gasto_606 = :Extraer_Tipo_Gasto_606, ITBIS_Compras_606 = :ITBIS_Compras_606, ITBIS_Servicios_606 = :ITBIS_Servicios_606, ITBIS_Proporcional_Compras_606 = :ITBIS_Proporcional_Compras_606, ITBIS_Proporcional_Servicion_606 = :ITBIS_Proporcional_Servicion_606, Extrar_Tipo_Retencion_606 = :Extrar_Tipo_Retencion_606, Porc_ITBIS_Retenido_606 = :Porc_ITBIS_Retenido_606, Porc_ISR_Retenido_606 = :Porc_ISR_Retenido_606, B04_Periodo_606 = :B04_Periodo_606, Tipo_Transaccion_606 = :Tipo_Transaccion_606, Fecha_Trans_AnoMes_606 = :Fecha_Trans_AnoMes_606, Fecha_Trans_Dia_606 = :Fecha_Trans_Dia_606, Referencia_606 = :Referencia_606, Descripcion_606 = :Descripcion_606, Banco_606 = :Banco_606, Nombre_Empresa_606 = :Nombre_Empresa_606, Usuario_Creador = :Usuario_Creador, Accion_606 = :Accion_606, CodigoCompra = :CodigoCompra, Modulo = :Modulo WHERE id = :id");

	
	

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_STR);
	
		$stmt ->bindParam(":Rnc_Empresa_606", $datos["Rnc_Empresa_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Rnc_Factura_606", $datos["Rnc_Factura_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Id_Factura_606", $datos["Tipo_Id_Factura_606"], PDO::PARAM_INT);
		$stmt ->bindParam(":Tipo_Gasto_606", $datos["Tipo_Gasto_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":NCF_606", $datos["NCF_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":NCF_Modificado_606", $datos["NCF_Modificado_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_AnoMes_606", $datos["Fecha_AnoMes_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Dia_606", $datos["Fecha_Dia_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Ret_AnoMes_606", $datos["Fecha_Ret_AnoMes_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Ret_Dia_606", $datos["Fecha_Ret_Dia_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Monto_Servicios_606", $datos["Monto_Servicios_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Bienes_606", $datos["Monto_Bienes_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Total_Monto_Factura_606", $datos["Total_Monto_Factura_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Factura_606", $datos["ITBIS_Factura_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Retenido_606", $datos["ITBIS_Retenido_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Proporcional_606", $datos["ITBIS_Proporcional_606"], PDO::PARAM_STR);                  
        $stmt ->bindParam(":ITBIS_alcosto_606", $datos["ITBIS_alcosto_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Adelantar_606", $datos["ITBIS_Adelantar_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Percibido_Compras_606", $datos["ITBIS_Percibido_Compras_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Tipo_Retencion_ISR_606", $datos["Tipo_Retencion_ISR_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Retencion_Renta_606", $datos["Monto_Retencion_Renta_606"], PDO::PARAM_STR);      
        $stmt ->bindParam(":ISR_Percibido_606", $datos["ISR_Percibido_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Impuestos_Selectivo_606", $datos["Impuestos_Selectivo_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Otro_Impuesto_606", $datos["Otro_Impuesto_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Monto_Propina_606", $datos["Monto_Propina_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Forma_Pago_606", $datos["Forma_Pago_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Estatus_606", $datos["Estatus_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Extraer_NCF_606", $datos["Extraer_NCF_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Extraer_Tipo_Pago_606", $datos["Extraer_Tipo_Pago_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Extraer_Tipo_Gasto_606", $datos["Extraer_Tipo_Gasto_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Compras_606", $datos["ITBIS_Compras_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Servicios_606", $datos["ITBIS_Servicios_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Proporcional_Compras_606", $datos["ITBIS_Proporcional_Compras_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":ITBIS_Proporcional_Servicion_606", $datos["ITBIS_Proporcional_Servicion_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Extrar_Tipo_Retencion_606", $datos["Extrar_Tipo_Retencion_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":Porc_ITBIS_Retenido_606", $datos["Porc_ITBIS_Retenido_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Porc_ISR_Retenido_606", $datos["Porc_ISR_Retenido_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":B04_Periodo_606", $datos["B04_Periodo_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":Tipo_Transaccion_606", $datos["Tipo_Transaccion_606"], PDO::PARAM_INT);
        $stmt ->bindParam(":Fecha_Trans_AnoMes_606", $datos["Fecha_Trans_AnoMes_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Fecha_Trans_Dia_606", $datos["Fecha_Trans_Dia_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Referencia_606", $datos["Referencia_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Descripcion_606", $datos["Descripcion_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Banco_606", $datos["Banco_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Nombre_Empresa_606", $datos["Nombre_Empresa_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
        $stmt ->bindParam(":Accion_606", $datos["Accion_606"], PDO::PARAM_STR);
        $stmt ->bindParam(":CodigoCompra", $datos["CodigoCompra"], PDO::PARAM_INT);
 		$stmt ->bindParam(":Modulo", $datos["Modulo"], PDO::PARAM_STR);


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}

static public function mdlMostrar606Retener($tabla, $id_606, $Valor_id606){



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id_606 = :$id_606");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_606, $Valor_id606, PDO::PARAM_STR);
		

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


		}

static public function mdlMostrarReporte606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $Orden, $periodoreporte606){

if($periodoreporte606 == "TODO"){             

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa606 = :$taRncEmpresa606  ORDER BY $Orden DESC");
       
        
 } else{
$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa606 = :$taRncEmpresa606 AND SUBSTRING(Fecha_AnoMes_606, 1, 4) = $periodoreporte606 ORDER BY $Orden DESC");

 }
$stmt -> bindParam(":".$taRncEmpresa606, $Rnc_Empresa_606, PDO::PARAM_STR);
$stmt -> execute();

return $stmt -> fetchAll();
$stmt -> close();
$stmt = null;




                
}
static public function mdlMostrar606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $id_606, $Valor_id606, $Orden){

		if($id_606 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id_606 = :$id_606 AND $taRncEmpresa606 = :$taRncEmpresa606  ORDER BY $Orden DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_606, $Valor_id606, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa606, $Rnc_Empresa_606, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




		} else { 
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa606 = :$taRncEmpresa606 ORDER BY $Orden DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa606, $Rnc_Empresa_606, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		}
}
static public function mdlMostrarPeriodo606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $taFecha_AnoMes_606){

		
		$stmt = Conexion::conectar()->prepare("SELECT DISTINCT Fecha_AnoMes_606  FROM $tabla WHERE $taRncEmpresa606 = :$taRncEmpresa606 ORDER BY Fecha_AnoMes_606 DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa606, $Rnc_Empresa_606, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}

static public function mdlRangoFecha606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $taFecha_AnoMes_606, $Fecha_AnoMes_606, $taFecha_Ret_AnoMes_606){

	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ($taRncEmpresa606 = :$taRncEmpresa606 AND $taFecha_AnoMes_606 = :$taFecha_AnoMes_606) OR ($taRncEmpresa606 = :$taRncEmpresa606 AND $taFecha_Ret_AnoMes_606 = :$taFecha_Ret_AnoMes_606)");


$stmt -> bindParam(":".$taFecha_AnoMes_606, $Fecha_AnoMes_606, PDO::PARAM_STR);
$stmt -> bindParam(":".$taRncEmpresa606, $Rnc_Empresa_606, PDO::PARAM_STR);
$stmt -> bindParam(":".$taFecha_Ret_AnoMes_606, $Fecha_AnoMes_606, PDO::PARAM_STR);
        

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

	
}




static public function MdlAgregarretencion606($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id = :id, Fecha_Ret_AnoMes_606 = :Fecha_Ret_AnoMes_606, Fecha_Ret_Dia_606 = :Fecha_Ret_Dia_606, ITBIS_Retenido_606 = :ITBIS_Retenido_606, Monto_Retencion_Renta_606 = :Monto_Retencion_Renta_606, Tipo_Retencion_ISR_606 = :Tipo_Retencion_ISR_606,  Extrar_Tipo_Retencion_606 = :Extrar_Tipo_Retencion_606,  Porc_ITBIS_Retenido_606 = :Porc_ITBIS_Retenido_606, Porc_ISR_Retenido_606 = :Porc_ISR_Retenido_606, Usuario_Creador = :Usuario_Creador, Fecha_Registro = :Fecha_Registro, Accion_606 = :Accion_606 WHERE id = :id");

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Fecha_Ret_AnoMes_606", $datos["Fecha_Ret_AnoMes_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Ret_Dia_606", $datos["Fecha_Ret_Dia_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":ITBIS_Retenido_606", $datos["ITBIS_Retenido_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Monto_Retencion_Renta_606", $datos["Monto_Retencion_Renta_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_Retencion_ISR_606", $datos["Tipo_Retencion_ISR_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Extrar_Tipo_Retencion_606", $datos["Extrar_Tipo_Retencion_606"], PDO::PARAM_STR);
		$stmt ->bindParam(":Porc_ITBIS_Retenido_606", $datos["Porc_ITBIS_Retenido_606"], PDO::PARAM_INT);
		$stmt ->bindParam(":Porc_ISR_Retenido_606", $datos["Porc_ISR_Retenido_606"], PDO::PARAM_INT);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_Registro", $datos["Fecha_Registro"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion_606", $datos["Accion_606"], PDO::PARAM_STR);
		
	
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
 static public function mdlBorrar606($tabla, $id, $id_606){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $id_606, PDO::PARAM_INT);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	 		}
 static public function mdlBorrarLD606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606){

	 	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $taRnc_Empresa_606 = :$taRnc_Empresa_606 AND $taRnc_Factura_606 = :$taRnc_Factura_606 AND $taNCF_606 = :$taNCF_606");

		$stmt ->bindParam(":$taRnc_Empresa_606", $Rnc_Empresa_606, PDO::PARAM_STR);
		$stmt ->bindParam(":$taRnc_Factura_606", $Rnc_Factura_606, PDO::PARAM_STR);
		$stmt ->bindParam(":$taNCF_606", $NCF_606, PDO::PARAM_STR);
		
		
		
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

static public function mdlMostrar606Suplidores($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa606 = :$taRncEmpresa606 AND $taRnc_Factura_606 = :$taRnc_Factura_606");

                $stmt -> bindParam(":".$taRncEmpresa606, $Rnc_Empresa_606, PDO::PARAM_STR);
                $stmt -> bindParam(":".$taRnc_Factura_606, $Rnc_Factura_606, PDO::PARAM_STR);
        

                $stmt -> execute();

                return $stmt -> fetchAll();
                $stmt -> close();
                $stmt = null;




        }

static public function mdlUdate606Suplidores($tabla, $datos){

                

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Factura_606 = :Rnc_Factura_606, Tipo_Id_Factura_606 = :Tipo_Id_Factura_606, Nombre_Empresa_606 = :Nombre_Empresa_606 WHERE id = :id AND Rnc_Empresa_606 = :Rnc_Empresa_606");


                $stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
                $stmt ->bindParam(":Rnc_Empresa_606", $datos["Rnc_Empresa_606"], PDO::PARAM_STR);
                $stmt ->bindParam(":Rnc_Factura_606", $datos["Rnc_Factura_606"], PDO::PARAM_STR);
                $stmt ->bindParam(":Tipo_Id_Factura_606", $datos["Tipo_Id_Factura_606"], PDO::PARAM_INT);
                $stmt ->bindParam(":Nombre_Empresa_606", $datos["Nombre_Empresa_606"], PDO::PARAM_STR);
                
                
                
                if($stmt->execute()){
                        return "ok";

                }else{

                        return "error";

                }

                $stmt -> close();
                $stmt = null;



}


}/*CIERRE CLASES*/

