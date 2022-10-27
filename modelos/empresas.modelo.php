<?php 

require_once "conexion.php";


 class ModeloEmpresas{ 

 
 	static public function mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII){
 	
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Growin_DGII = :$taRnc_Growin_DGII");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Growin_DGII, $ValorRnc_Growin_DGII, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
		}
static public function MdlRegistrarRnc_Growin_DGII($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Growin_DGII, Nombre_Empresa_Growin) VALUES (:Rnc_Growin_DGII, :Nombre_Empresa_Growin)");

	$stmt ->bindParam(":Rnc_Growin_DGII", $datos["Rnc_Growin_DGII"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Empresa_Growin", $datos["Nombre_Empresa_Growin"], PDO::PARAM_STR);
	
	


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


}

	
 	
 	static public function mdlMostrarEmpresas($tabla, $taRncEmpresa, $Rnc_Empresa, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $Orden){
 		
    if($Rnc_Empresa_Master == null){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa = :$taRncEmpresa");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresa, $Rnc_Empresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	}else

	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Master = :$taRnc_Empresa_Master ORDER BY $Orden DESC");

		$stmt -> bindParam(":".$taRnc_Empresa_Master, $Rnc_Empresa_Master, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
	static public function mdlMostrarEmpresasid($tabla, $taid, $id){
 		
    
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taid = :$taid");

		
		$stmt -> bindParam(":".$taid, $id, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	

	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
	static public function mdlMostrarEmpresasContabilidad($tabla, $taid, $id){
 		
    
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taid = :$taid");

		
		$stmt -> bindParam(":".$taid, $id, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

	

	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
static public function mdlMostrarEmpleadosTSS($tabla, $taRncEmpresaTSS, $RncEmpresaTSS, $taCedula_TSS, $Cedula_TSS){
 		
    
 $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaTSS = :$taRncEmpresaTSS AND $taCedula_TSS = :$taCedula_TSS");

		
$stmt -> bindParam(":".$taRncEmpresaTSS, $RncEmpresaTSS, PDO::PARAM_STR);
$stmt -> bindParam(":".$taCedula_TSS, $Cedula_TSS, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	

	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
	static public function mdlMostrarEmpleadosEmpresa($tabla, $taRncEmpresaTSS, $RncEmpresaTSS){
 		
    
 $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaTSS = :$taRncEmpresaTSS");

		
$stmt -> bindParam(":".$taRncEmpresaTSS, $RncEmpresaTSS, PDO::PARAM_STR);


		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

	

	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
static public function mdlCrearEmpleadoTSS($tabla, $datos){
 

$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_TSS, Cedula_TSS, Nombre_TSS, Apellido_TSS, cargo_TSS, sueldo_TSS, AnoMes_Ingreso_TSS, Dia_Ingreso_TSS) VALUES (:Rnc_Empresa_TSS, :Cedula_TSS, :Nombre_TSS, :Apellido_TSS, :cargo_TSS, :sueldo_TSS, :AnoMes_Ingreso_TSS, :Dia_Ingreso_TSS)");

$stmt ->bindParam(":Rnc_Empresa_TSS", $datos["Rnc_Empresa_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":Cedula_TSS", $datos["Cedula_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_TSS", $datos["Nombre_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":Apellido_TSS", $datos["Apellido_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":cargo_TSS", $datos["cargo_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":sueldo_TSS", $datos["sueldo_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":AnoMes_Ingreso_TSS", $datos["AnoMes_Ingreso_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":Dia_Ingreso_TSS", $datos["Dia_Ingreso_TSS"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


}
static public function mdlEditarEmpleadoTSS($tabla, $datos){
 

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Cedula_TSS = :Cedula_TSS, Nombre_TSS = :Nombre_TSS, Apellido_TSS = :Apellido_TSS, cargo_TSS = :cargo_TSS, sueldo_TSS = :sueldo_TSS, AnoMes_Ingreso_TSS = :AnoMes_Ingreso_TSS, Dia_Ingreso_TSS = :Dia_Ingreso_TSS WHERE id = :id And Rnc_Empresa_TSS = :Rnc_Empresa_TSS");

$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);

$stmt ->bindParam(":Rnc_Empresa_TSS", $datos["Rnc_Empresa_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":Cedula_TSS", $datos["Cedula_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_TSS", $datos["Nombre_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":Apellido_TSS", $datos["Apellido_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":cargo_TSS", $datos["cargo_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":sueldo_TSS", $datos["sueldo_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":AnoMes_Ingreso_TSS", $datos["AnoMes_Ingreso_TSS"], PDO::PARAM_STR);
$stmt ->bindParam(":Dia_Ingreso_TSS", $datos["Dia_Ingreso_TSS"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;







}

static public function MdlRegistrarEmpresas($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Tipo_Empresa, Rnc_Empresa_Master, Rnc_Empresa, Tipo_Id_Empresa, Nombre_Empresa, Direccion_Empresa, Telefono_Empresa, Correo_Empresa, Usuario_Creador_Empresa, Accion_Empresa) VALUES (:Tipo_Empresa, :Rnc_Empresa_Master, :Rnc_Empresa, :Tipo_Id_Empresa, :Nombre_Empresa, :Direccion_Empresa, :Telefono_Empresa, :Correo_Empresa, :Usuario_Creador_Empresa, :Accion_Empresa)");

	$stmt ->bindParam(":Tipo_Empresa", $datos["Tipo_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Rnc_Empresa_Master", $datos["Rnc_Empresa_Master"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tipo_Id_Empresa", $datos["Tipo_Id_Empresa"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Empresa", $datos["Nombre_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Direccion_Empresa", $datos["Direccion_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Telefono_Empresa", $datos["Telefono_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Correo_Empresa", $datos["Correo_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Usuario_Creador_Empresa", $datos["Usuario_Creador_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Accion_Empresa", $datos["Accion_Empresa"], PDO::PARAM_STR);
	
	


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;







}
static public function MdlRegistrarControlEmpresas($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Tipo_Empresa, Rnc_Empresa_Master, Rnc_Empresa, Tipo_Id_Empresa, Nombre_Empresa, Periodo_Empresa) VALUES (:Tipo_Empresa, :Rnc_Empresa_Master, :Rnc_Empresa, :Tipo_Id_Empresa, :Nombre_Empresa, :Periodo_Empresa)");

	$stmt ->bindParam(":Tipo_Empresa", $datos["Tipo_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Rnc_Empresa_Master", $datos["Rnc_Empresa_Master"], PDO::PARAM_STR);
	$stmt ->bindParam(":Tipo_Id_Empresa", $datos["Tipo_Id_Empresa"], PDO::PARAM_INT);
	$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Empresa", $datos["Nombre_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":Periodo_Empresa", $datos["Periodo_Empresa"], PDO::PARAM_STR);
	

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;







}
static public function MdlCrearPremisasEmpresas($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa, AnoFiscal) VALUES (:Rnc_Empresa, :AnoFiscal)");

	
	$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
	$stmt ->bindParam(":AnoFiscal", $datos["AnoFiscal"], PDO::PARAM_STR);
	

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


}


static public function MdlRepetidaEmpresa($tabla, $taRnc_Empresa, $Rnc_Empresa){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa = :$taRnc_Empresa");

		$stmt -> bindParam(":".$taRnc_Empresa, $Rnc_Empresa, PDO::PARAM_STR);
		
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}

	static public function mdlControlEmpresas($tabla, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa){

		if($Periodo_Empresa != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Master = :$taRnc_Empresa_Master AND  $taPeriodo_Empresa =  :$taPeriodo_Empresa");

		$stmt -> bindParam(":".$taPeriodo_Empresa,  $Periodo_Empresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_Master, $Rnc_Empresa_Master, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;



		}else{

		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Master = :$taRnc_Empresa_Master AND  $taRnc_Empresa =  :$taRnc_Empresa");

		$stmt -> bindParam(":".$taRnc_Empresa,  $Rnc_Empresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_Master, $Rnc_Empresa_Master, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
		}

		
}
static public function mdlCuadreVentas($tabla, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa){

		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa = :$taRnc_Empresa AND  $taPeriodo_Empresa = :$taPeriodo_Empresa");

		$stmt -> bindParam(":".$taPeriodo_Empresa,  $Periodo_Empresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa, $Rnc_Empresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;



		

		
}
static public function mdlCuadreCompras($tabla, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa){

		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa = :$taRnc_Empresa AND  $taPeriodo_Empresa =  :$taPeriodo_Empresa");

		$stmt -> bindParam(":".$taPeriodo_Empresa,  $Periodo_Empresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa, $Rnc_Empresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;



		

		
}
static public function mdlControlPremisas($tabla, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa){

		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa = :$taRnc_Empresa AND  $taPeriodo_Empresa =  :$taPeriodo_Empresa");

		$stmt -> bindParam(":".$taPeriodo_Empresa,  $Periodo_Empresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa, $Rnc_Empresa, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;



		

		
}
static public function mdlControlEmpresaIndividual($tabla, $Rnc_Empresa, $taRnc_Empresa){

	
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa = :$taRnc_Empresa");

		$stmt -> bindParam(":".$taRnc_Empresa,  $Rnc_Empresa, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
		

		
}
/*******************************************************************
			INICIO DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS
********************************************************************/

	static public function MdlActualizarEstadosControl($tabla, $tacontrol_Empresa, $id, $idcontrol, $valorestado){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $tacontrol_Empresa = :$tacontrol_Empresa WHERE $id = :$id");

		$stmt ->bindParam(":".$tacontrol_Empresa, $valorestado, PDO::PARAM_INT);
		$stmt ->bindParam(":".$id, $idcontrol, PDO::PARAM_INT);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/
	static public function MdlActualizarEstadosControl606607($tabla, $taRnc_Empresa, $ValorRnc_Empresa, $taPeriodo_Empresa, $ValorPeriodo_Empresa, $ta606_Empresa, $Valor606_Empresa){

$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $ta606_Empresa = :$ta606_Empresa WHERE $taRnc_Empresa = :$taRnc_Empresa AND $taPeriodo_Empresa = :$taPeriodo_Empresa");
		
		$stmt ->bindParam(":".$taRnc_Empresa, $ValorRnc_Empresa, PDO::PARAM_STR);
		$stmt ->bindParam(":".$taPeriodo_Empresa, $ValorPeriodo_Empresa, PDO::PARAM_STR);
		$stmt ->bindParam(":".$ta606_Empresa, $Valor606_Empresa, PDO::PARAM_INT);

		if($stmt->execute()){

		
		
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/
	static public function MdlMostrarCorrelativos($tabla, $taRnc_Empresa, $RncEmpresaVentas, $NCFFactura, $taNCFFACTURA){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $taNCFFACTURA = :$taNCFFACTURA WHERE $taRnc_Empresa = :$taRnc_Empresa");

		$stmt ->bindParam(":".$taRnc_Empresa, $RncEmpresaVentas, PDO::PARAM_INT);
		$stmt ->bindParam(":".$taNCFFACTURA, $NCFFACTURA, PDO::PARAM_INT);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/


	static public function MdlEstadosControl606607($tabla, $taRnc_Empresa, $Rnc_Empresa, $taPeriodo_Empresa, $Periodo_Empresa, $tacontrol_Empresa, $valorestado){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $tacontrol_Empresa = :$tacontrol_Empresa WHERE  $taRnc_Empresa = :$taRnc_Empresa AND $taPeriodo_Empresa = :$taPeriodo_Empresa");

		$stmt ->bindParam(":".$tacontrol_Empresa, $valorestado, PDO::PARAM_INT);
		$stmt ->bindParam(":".$taRnc_Empresa, $Rnc_Empresa, PDO::PARAM_STR);
		$stmt ->bindParam(":".$taPeriodo_Empresa, $Periodo_Empresa, PDO::PARAM_STR);


		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/

	static public function mdlRegistrarPremisas($tabla, $datos){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET ITBISimportacion = :ITBISimportacion, SaldoAnterior =  :SaldoAnterior, Retencion0205 = :Retencion0205, Retencion0804 = :Retencion0804 WHERE Rnc_Empresa = :Rnc_Empresa AND Periodo_Empresa = :Periodo_Empresa");

 		

		$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Periodo_Empresa", $datos["Periodo_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":ITBISimportacion", $datos["ITBISimportacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":SaldoAnterior", $datos["SaldoAnterior"], PDO::PARAM_STR);
		$stmt ->bindParam(":Retencion0205", $datos["Retencion0205"], PDO::PARAM_STR);
		$stmt ->bindParam(":Retencion0804", $datos["Retencion0804"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}


		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/

static public function mdlRegistrarPremisasBCF($tabla, $datos){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET BCF = :BCF WHERE Rnc_Empresa = :Rnc_Empresa AND Periodo_Empresa = :Periodo_Empresa");

 		

		$stmt ->bindParam(":Rnc_Empresa", $datos["Rnc_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Periodo_Empresa", $datos["Periodo_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":BCF", $datos["BCF"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/

	 static public function mdlPeriodofiscal($tabla, $Rnc_Empresa, $taRnc_Empresa){

	
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa = :$taRnc_Empresa");

		$stmt -> bindParam(":".$taRnc_Empresa,  $Rnc_Empresa, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
		

		
}
static public function mdlPremisasFiscal($tabla, $datos){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET InvInicial = :InvInicial, Nomina = :Nomina, Gasto_Depresiacion = :Gasto_Depresiacion, Anticipo = :Anticipo WHERE id = :id");
 		

 		
		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		
		$stmt ->bindParam(":InvInicial", $datos["InvInicial"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nomina", $datos["Nomina"], PDO::PARAM_STR);
		$stmt ->bindParam(":Gasto_Depresiacion", $datos["Gasto_Depresiacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Anticipo", $datos["Anticipo"], PDO::PARAM_STR);
		
		
		
		
		
		
		
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/

	 static public function mdlEditarConfiSocial($tabla, $datos){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre_Empresa = :Nombre_Empresa, Descripcion_Empresa = :Descripcion_Empresa, Direccion_Empresa = :Direccion_Empresa, Telefono_Empresa = :Telefono_Empresa, Correo_Empresa = :Correo_Empresa, Web_Empresa = :Web_Empresa, Face_Empresa = :Face_Empresa, Instagran_Empresa = :Instagran_Empresa, Logo = :Logo, Sello = :Sello, faccolor1 =:faccolor1, faccolor2 = :faccolor2, faccolor3 = :faccolor3, Modelo_Factura = :Modelo_Factura, NombreEmpresaFactura = :NombreEmpresaFactura, ancho = :ancho, largo = :largo, anchoSello = :anchoSello, largoSello = :largoSello, Factura_Banco = :Factura_Banco, Impresora = :Impresora WHERE id = :id");
 		
 		
		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Nombre_Empresa", $datos["Nombre_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion_Empresa", $datos["Descripcion_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Direccion_Empresa", $datos["Direccion_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Telefono_Empresa", $datos["Telefono_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Correo_Empresa", $datos["Correo_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Web_Empresa", $datos["Web_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Face_Empresa", $datos["Face_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Instagran_Empresa", $datos["Instagran_Empresa"], PDO::PARAM_STR);
		$stmt ->bindParam(":Logo", $datos["Logo"], PDO::PARAM_STR);
		$stmt ->bindParam(":Sello", $datos["Sello"], PDO::PARAM_STR);
		$stmt ->bindParam(":faccolor1", $datos["faccolor1"], PDO::PARAM_STR);
		$stmt ->bindParam(":faccolor2", $datos["faccolor2"], PDO::PARAM_STR);
		$stmt ->bindParam(":faccolor3", $datos["faccolor3"], PDO::PARAM_STR);
		$stmt ->bindParam(":Modelo_Factura", $datos["Modelo_Factura"], PDO::PARAM_STR);
	$stmt ->bindParam(":NombreEmpresaFactura", $datos["NombreEmpresaFactura"], PDO::PARAM_STR);	
		$stmt ->bindParam(":ancho", $datos["ancho"], PDO::PARAM_STR);
		$stmt ->bindParam(":largo", $datos["largo"], PDO::PARAM_STR);
		$stmt ->bindParam(":anchoSello", $datos["anchoSello"], PDO::PARAM_STR);
		$stmt ->bindParam(":largoSello", $datos["largoSello"], PDO::PARAM_STR);
		$stmt ->bindParam(":Factura_Banco", $datos["Factura_Banco"], PDO::PARAM_STR);
		$stmt ->bindParam(":Impresora", $datos["Impresora"], PDO::PARAM_STR);
		
		
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



	 }/*cierra funcion crear categorias*/
	 
	

	 static public function mdlEditarConfiFiscal($tabla, $datos){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Clave_DGII_Empresas = :Clave_DGII_Empresas, Corr_1 = :Corr_1, Corr_11 = :Corr_11, Corr_21 = :Corr_21, Corr_31 = :Corr_31, Corr_2 = :Corr_2, Corr_12 = :Corr_12, Corr_22 = :Corr_22, Corr_32 = :Corr_32, Corr_3 = :Corr_3, Corr_13 = :Corr_13, Corr_23 = :Corr_23, Corr_33 = :Corr_33, Corr_4 = :Corr_4, Corr_14 = :Corr_14, Corr_24 = :Corr_24, Corr_34 = :Corr_34, Corr_5 = :Corr_5, Corr_15 = :Corr_15, Corr_25 = :Corr_25, Corr_35 = :Corr_35, Corr_6 = :Corr_6, Corr_16 = :Corr_16, Corr_26 = :Corr_26, Corr_36 = :Corr_36, Corr_7 = :Corr_7, Corr_17 = :Corr_17, Corr_27 = :Corr_27, Corr_37 = :Corr_37, Corr_8 = :Corr_8, Corr_18 = :Corr_18, Corr_28 = :Corr_28, Corr_38 = :Corr_38, Corr_9 = :Corr_9, Corr_19 = :Corr_19, Corr_29 = :Corr_29, Corr_39 = :Corr_39, Corr_10 = :Corr_10, Corr_20 = :Corr_20, Corr_30 = :Corr_30, Corr_40 = :Corr_40, Facturacion = :Facturacion, Pordescuento = :Pordescuento, Inventario = :Inventario, Compras = :Compras, Contabilidad = :Contabilidad, Banco = :Banco, Proyecto = :Proyecto WHERE id = :id");
 		
 		
		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Clave_DGII_Empresas", $datos["Clave_DGII_Empresas"], PDO::PARAM_STR);
		
		$stmt ->bindParam(":Corr_1", $datos["Corr_1"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_11", $datos["Corr_11"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_21", $datos["Corr_21"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_31", $datos["Corr_31"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_2", $datos["Corr_2"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_12", $datos["Corr_12"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_22", $datos["Corr_22"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_32", $datos["Corr_32"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_3", $datos["Corr_3"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_13", $datos["Corr_13"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_23", $datos["Corr_23"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_33", $datos["Corr_33"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_4", $datos["Corr_4"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_14", $datos["Corr_14"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_24", $datos["Corr_24"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_34", $datos["Corr_34"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_5", $datos["Corr_5"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_15", $datos["Corr_15"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_25", $datos["Corr_25"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_35", $datos["Corr_35"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_6", $datos["Corr_6"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_16", $datos["Corr_16"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_26", $datos["Corr_26"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_36", $datos["Corr_36"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_7", $datos["Corr_7"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_17", $datos["Corr_17"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_27", $datos["Corr_27"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_37", $datos["Corr_37"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_8", $datos["Corr_8"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_18", $datos["Corr_18"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_28", $datos["Corr_28"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_38", $datos["Corr_38"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_9", $datos["Corr_9"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_19", $datos["Corr_19"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_29", $datos["Corr_29"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_39", $datos["Corr_39"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_10", $datos["Corr_10"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_20", $datos["Corr_20"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_30", $datos["Corr_30"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corr_40", $datos["Corr_40"], PDO::PARAM_STR);
		$stmt ->bindParam(":Facturacion", $datos["Facturacion"], PDO::PARAM_INT);
		$stmt ->bindParam(":Pordescuento", $datos["Pordescuento"], PDO::PARAM_INT);
		$stmt ->bindParam(":Inventario", $datos["Inventario"], PDO::PARAM_INT);
		$stmt ->bindParam(":Compras", $datos["Compras"], PDO::PARAM_INT);
		$stmt ->bindParam(":Contabilidad", $datos["Contabilidad"], PDO::PARAM_INT);
		$stmt ->bindParam(":Banco", $datos["Banco"], PDO::PARAM_INT);
		$stmt ->bindParam(":Proyecto", $datos["Proyecto"], PDO::PARAM_INT);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;
 }
	

	

	
static public function mdlEditarConfiTSS($tabla, $datos){

 $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET CedulaTSS = :CedulaTSS, ClaveTSS = :ClaveTSS WHERE id = :id");
 		
 		
$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
$stmt ->bindParam(":CedulaTSS", $datos["CedulaTSS"], PDO::PARAM_STR);
$stmt ->bindParam(":ClaveTSS", $datos["ClaveTSS"], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;
 }
	

	
static public function MdlModalEditarEmpleado($tabla, $id, $idEmpleado){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $idEmpleado, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion MDLlOGINuSUAIO*/


static public function MdlEliminarEmpleado($tabla, $id, $idEmpleado, $taRncEmprasaTSS, $RncEmprasaTSS){

		
	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $id = :$id AND $taRncEmprasaTSS = :$taRncEmprasaTSS");
	
	$stmt -> bindParam(":".$id, $idEmpleado, PDO::PARAM_STR);
	$stmt -> bindParam(":".$taRncEmprasaTSS, $RncEmprasaTSS, PDO::PARAM_STR);
	
		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/*CIERRE DE FUNCION BORRAR USUARIO*/

static public function mdlEmpresasActualizacionesContable($tabla){
 	
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
		}
}/*CIERRO CLASE MODELO DE CATEGORIAS*/
				