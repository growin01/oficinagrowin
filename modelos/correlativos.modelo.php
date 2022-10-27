<?php 

require_once "conexion.php";


 class ModeloCorrelativos{ 

 static public function mdlMostrarEmpresasCorrelativos($tabla, $taRncEmpresa){

		
		$stmt = Conexion::conectar()->prepare("SELECT DISTINCT $taRncEmpresa FROM $tabla");

		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}
 	
 	
 	
static public function MdlRegistrarCorrelativosEmpresas($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa ,Fecha_Comprobante_AnoMes, Fecha_Comprobante_Dia, Fecha_Vencimiento_AnoMes, Fecha_Vencimiento_Dia, Tipo_NCF, NCF_Desde, NCF_Hasta, NCF_Cons, N_Autorizacion, Usuario, Accion) VALUES (:Rnc_Empresa, :Fecha_Comprobante_AnoMes, :Fecha_Comprobante_Dia, :Fecha_Vencimiento_AnoMes, :Fecha_Vencimiento_Dia,:Tipo_NCF, :NCF_Desde, :NCF_Hasta, :NCF_Cons, :N_Autorizacion, :Usuario, :Accion)");



	$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Comprobante_AnoMes", $datos["Fecha_Comprobante_AnoMes"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Comprobante_Dia", $datos["Fecha_Comprobante_Dia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Vencimiento_AnoMes", $datos["Fecha_Vencimiento_AnoMes"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Vencimiento_Dia", $datos["Fecha_Vencimiento_Dia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tipo_NCF", $datos["Tipo_NCF"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_Desde", $datos["NCF_Desde"], PDO::PARAM_INT);
	$stmt ->bindParam(":NCF_Hasta", $datos["NCF_Hasta"], PDO::PARAM_INT);
	$stmt ->bindParam(":NCF_Cons", $datos["NCF_Cons"], PDO::PARAM_INT);
	$stmt ->bindParam(":N_Autorizacion", $datos["N_Autorizacion"], PDO::PARAM_STR);
	$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
	$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);

	
	
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;







}/*CIERRE DE FUNCION REGISTRAR CORRELATIVOS EMPRESAS*/


static public function MdlMostrarCorrelativos($tabla, $taRncEmpresa, $RncEmpresa, $orden){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa = :$taRncEmpresa ORDER BY $orden ASC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa, $RncEmpresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	} /* CIERRE funcion MOSTRAR CORREALTIVOS*/
	static public function MdlMostrarHistoricoCorrelativos($tabla, $taRncEmpresa, $RncEmpresa, $orden){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa = :$taRncEmpresa ORDER BY $orden DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa, $RncEmpresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	} /* CIERRE funcion MOSTRAR CORREALTIVOS*/
static public function MdlMostrarCorrelativosNoFiscal($tabla, $taRncEmpresa, $taTipo_NCF, $Rnc_Empresa, $Tipo_NCF){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa = :$taRncEmpresa AND $taTipo_NCF = :$taTipo_NCF");

		$stmt -> bindParam(":".$taTipo_NCF, $Tipo_NCF, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa, $Rnc_Empresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	} /* CIERRE funcion MOSTRAR CORREALTIVOS*/



static public function MdlModalEditarCorrelativos($tabla, $id, $idCorrelativo){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $idCorrelativo, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion MDLlOGINuSUAIO*/

	static public function MdlEditarCorrelativos($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Fecha_Comprobante_AnoMes = :Fecha_Comprobante_AnoMes, Fecha_Comprobante_Dia = :Fecha_Comprobante_Dia, Fecha_Vencimiento_AnoMes = :Fecha_Vencimiento_AnoMes, Fecha_Vencimiento_Dia = :Fecha_Vencimiento_Dia, Tipo_NCF = :Tipo_NCF, NCF_Desde = :NCF_Desde, NCF_Hasta = :NCF_Hasta, NCF_Cons = :NCF_Cons, N_Autorizacion = :N_Autorizacion, Usuario = :Usuario, Accion = :Accion WHERE id = :id");

	$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
	$stmt ->bindParam(":Fecha_Comprobante_AnoMes", $datos["Fecha_Comprobante_AnoMes"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Comprobante_Dia", $datos["Fecha_Comprobante_Dia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Vencimiento_AnoMes", $datos["Fecha_Vencimiento_AnoMes"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Vencimiento_Dia", $datos["Fecha_Vencimiento_Dia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tipo_NCF", $datos["Tipo_NCF"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_Desde", $datos["NCF_Desde"], PDO::PARAM_INT);
	$stmt ->bindParam(":NCF_Hasta", $datos["NCF_Hasta"], PDO::PARAM_INT);
	$stmt ->bindParam(":NCF_Cons", $datos["NCF_Cons"], PDO::PARAM_INT);
	$stmt ->bindParam(":N_Autorizacion", $datos["N_Autorizacion"], PDO::PARAM_STR);
	$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
	$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);

	
	
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;







}/*CIERRE DE FUNCION REGISTRAR CORRELATIVOS EMPRESAS*/
static public function MdlhistoricoCorrelativos($tabla, $datos){
$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa, Fecha_Comprobante_AnoMes, Fecha_Comprobante_Dia, Fecha_Vencimiento_AnoMes, Fecha_Vencimiento_Dia, Tipo_NCF, NCF_Desde, NCF_Hasta, NCF_Cons, N_Autorizacion, Usuario, Accion) VALUES(:Rnc_Empresa, :Fecha_Comprobante_AnoMes,:Fecha_Comprobante_Dia, :Fecha_Vencimiento_AnoMes, :Fecha_Vencimiento_Dia, :Tipo_NCF, :NCF_Desde, :NCF_Hasta, :NCF_Cons, :N_Autorizacion, :Usuario, :Accion)");

	
	$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Comprobante_AnoMes", $datos["Fecha_Comprobante_AnoMes"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Comprobante_Dia", $datos["Fecha_Comprobante_Dia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Vencimiento_AnoMes", $datos["Fecha_Vencimiento_AnoMes"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fecha_Vencimiento_Dia", $datos["Fecha_Vencimiento_Dia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tipo_NCF", $datos["Tipo_NCF"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_Desde", $datos["NCF_Desde"], PDO::PARAM_INT);
	$stmt ->bindParam(":NCF_Hasta", $datos["NCF_Hasta"], PDO::PARAM_INT);
	$stmt ->bindParam(":NCF_Cons", $datos["NCF_Cons"], PDO::PARAM_INT);
	$stmt ->bindParam(":N_Autorizacion", $datos["N_Autorizacion"], PDO::PARAM_STR);
	$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
	$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);

	
	
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}/*CIERRE DE FUNCION REGISTRAR CORRELATIVOS EMPRESAS*/
static public function MdlCrearCorrelativosNo($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa, Tipo_NCF, NCF_Cons, Usuario, Accion) VALUES (:Rnc_Empresa, :Tipo_NCF, :NCF_Cons, :Usuario, :Accion)");



	$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tipo_NCF", $datos["Tipo_NCF"], PDO::PARAM_STR);
	$stmt ->bindParam(":NCF_Cons", $datos["NCF_Cons"], PDO::PARAM_INT);
	$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
	$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);

	
	
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;







}/*CIERRE DE FUNCION REGISTRAR CORRELATIVOS EMPRESAS*/

static public function MdlCorrelativosFac($tabla, $Rnc_Empresa, $RncEmpresaVentas, $Tipo_NCF, $NCFFactura){

$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $Rnc_Empresa = :$Rnc_Empresa AND $Tipo_NCF = :$Tipo_NCF");

		
		$stmt -> bindParam(":".$Rnc_Empresa, $RncEmpresaVentas, PDO::PARAM_STR);
		$stmt -> bindParam(":".$Tipo_NCF, $NCFFactura, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion MDLlOGINuSUAIO*/

static public function MdlActualizarCorrelativosFac($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET NCF_Cons = :NCF_Cons WHERE Rnc_Empresa = :Rnc_Empresa AND Tipo_NCF = :Tipo_NCF");


		$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Tipo_NCF", $datos["Tipo_NCF"], PDO::PARAM_STR);
		$stmt ->bindParam(":NCF_Cons", $datos["NCF_Cons"], PDO::PARAM_INT);
		
		

		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





}


	}/*CIERRE DE MODELO CORRELATIVOS*/