<?php 

require_once "conexion.php";


 class ModeloBanco{ 
 	static public function mdlMostrarBanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco){
 		
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Banco = :$taRnc_Empresa_Banco ORDER BY id ASC");

		$stmt -> bindParam(":".$taRnc_Empresa_Banco, $Rnc_Empresa_Banco, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

	static public function mdlplanBanco($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas, $id_grupo, $taid_grupo, $id_categoria, $taid_categoria){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Cuentas = :$taRnc_Empresa_Cuentas AND $taid_grupo = :$taid_grupo AND $taid_categoria = :$taid_categoria ORDER BY id_grupo, id_categoria, id_generica ASC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_Cuentas, $Rnc_Empresa_Cuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_grupo, $id_grupo, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taid_categoria, $id_categoria, PDO::PARAM_INT);
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

	static public function mdlvalidacionbanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco, $taCampo, $ValorCampo){
 	
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Banco = :$taRnc_Empresa_Banco AND $taCampo = :$taCampo");

		$stmt -> bindParam(":".$taCampo, $ValorCampo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRnc_Empresa_Banco, $Rnc_Empresa_Banco, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}


	static public function MdlCrearBanco($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Banco, id_subgenerica, id_grupo, id_categoria, id_generica, id_cuenta, Nombre_CuentaContable, TipoCuenta, NumeroCuenta, Nombre_Cuenta, TelefonoBanco, FechamesBanco, FechadiaBanco, saldoInicial, saldoEstado, Usuario_Creador, Accion) VALUES (:Rnc_Empresa_Banco, :id_subgenerica, :id_grupo, :id_categoria, :id_generica, :id_cuenta, :Nombre_CuentaContable, :TipoCuenta, :NumeroCuenta, :Nombre_Cuenta, :TelefonoBanco, :FechamesBanco, :FechadiaBanco, :saldoInicial, :saldoEstado, :Usuario_Creador, :Accion)");
	

		$stmt ->bindParam(":Rnc_Empresa_Banco", $datos["Rnc_Empresa_Banco"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_subgenerica", $datos["id_subgenerica"], PDO::PARAM_STR);
		$stmt ->bindParam(":TipoCuenta", $datos["TipoCuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_generica", $datos["id_generica"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_cuenta", $datos["id_cuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_CuentaContable", $datos["Nombre_CuentaContable"], PDO::PARAM_STR);
		$stmt ->bindParam(":NumeroCuenta", $datos["NumeroCuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cuenta", $datos["Nombre_Cuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":TelefonoBanco", $datos["TelefonoBanco"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechamesBanco", $datos["FechamesBanco"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechadiaBanco", $datos["FechadiaBanco"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldoInicial", $datos["saldoInicial"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldoEstado", $datos["saldoEstado"], PDO::PARAM_STR);	
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
static public function mdlModalEditarBanco($tabla, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_INT);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}/*CIERRO EDITAR CATEGORIA*/

/*********************************************
	INICIO DE FUNCION EDITAR CATEGORIAS
 	*************************************/

 	static public function MdlEditarBanco($tabla, $datos){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Banco = :Rnc_Empresa_Banco, id_subgenerica = :id_subgenerica, id_grupo = :id_grupo, id_categoria = :id_categoria, id_generica = :id_generica, id_cuenta = :id_cuenta, Nombre_CuentaContable = :Nombre_CuentaContable, TipoCuenta = :TipoCuenta, NumeroCuenta = :NumeroCuenta, Nombre_Cuenta = :Nombre_Cuenta, FechamesBanco = :FechamesBanco, FechadiaBanco = :FechadiaBanco, saldoInicial = :saldoInicial, saldoEstado = :saldoEstado, TelefonoBanco = :TelefonoBanco, Usuario_Creador = :Usuario_Creador, Accion = :Accion WHERE id = :id");

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_Banco", $datos["Rnc_Empresa_Banco"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_subgenerica", $datos["id_subgenerica"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_generica", $datos["id_generica"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_cuenta", $datos["id_cuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_CuentaContable", $datos["Nombre_CuentaContable"], PDO::PARAM_STR);
		$stmt ->bindParam(":TipoCuenta", $datos["TipoCuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":NumeroCuenta", $datos["NumeroCuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cuenta", $datos["Nombre_Cuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechamesBanco", $datos["FechamesBanco"], PDO::PARAM_STR);
		$stmt ->bindParam(":FechadiaBanco", $datos["FechadiaBanco"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldoInicial", $datos["saldoInicial"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldoEstado", $datos["saldoEstado"], PDO::PARAM_STR);
		$stmt ->bindParam(":TelefonoBanco", $datos["TelefonoBanco"], PDO::PARAM_STR);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
		

		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/
static public function mdlMostrarRepoerteLibrobanco($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_banco, $valorid_banco, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta, $Ordenmes, $Ordendia, $periodolibrobanco){

	if($periodolibrobanco == "TODO"){ 
	 
	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taid_banco = :$taid_banco AND $taid_grupo = :$taid_grupo AND $taid_categoria = :$taid_categoria AND $taid_generica = :$taid_generica AND $taid_cuenta = :$taid_cuenta ORDER BY $Ordenmes ASC, $Ordendia ASC");
 	} else{

 
	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taid_banco = :$taid_banco AND $taid_grupo = :$taid_grupo AND $taid_categoria = :$taid_categoria AND $taid_generica = :$taid_generica AND $taid_cuenta = :$taid_cuenta AND SUBSTRING($Ordenmes, 1, 4) = $periodolibrobanco ORDER BY $Ordenmes ASC, $Ordendia ASC");
 		
 	}
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_banco, $valorid_banco, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_grupo, $valorid_grupo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_categoria, $valorid_categoria, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_generica, $valorid_generica, PDO::PARAM_STR);	
		$stmt -> bindParam(":".$taid_cuenta, $valorid_cuenta, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}
static public function mdlMostrarLibrobanco($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_banco, $valorid_banco, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta, $Ordenmes, $Ordendia){

		 
	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taid_banco = :$taid_banco AND $taid_grupo = :$taid_grupo AND $taid_categoria = :$taid_categoria AND $taid_generica = :$taid_generica AND $taid_cuenta = :$taid_cuenta ORDER BY $Ordenmes ASC, $Ordendia ASC");

		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_banco, $valorid_banco, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_grupo, $valorid_grupo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_categoria, $valorid_categoria, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_generica, $valorid_generica, PDO::PARAM_STR);	
		$stmt -> bindParam(":".$taid_cuenta, $valorid_cuenta, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}
 
 static public function mdlEstatusConcialiacion($tabla, $datos){

 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Fecha_AnoMes_Cobro = :Fecha_AnoMes_Cobro, Fecha_dia_Cobro = :Fecha_dia_Cobro, Estado_Banco = :Estado_Banco, Usuario_Creador = :Usuario_Creador WHERE id = :id AND Rnc_Empresa_LD = :Rnc_Empresa_LD");

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_LD", $datos["Rnc_Empresa_LD"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_AnoMes_Cobro", $datos["Fecha_AnoMes_Cobro"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_dia_Cobro", $datos["Fecha_dia_Cobro"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado_Banco", $datos["Estado_Banco"], PDO::PARAM_INT);
		$stmt ->bindParam(":Usuario_Creador", $datos["Usuario_Creador"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;
		

}
static public function mdlRendirFondos($tabla, $datos){

 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Anticipo, NAsiento, id_banco, id_grupo, id_categoria, id_generica, id_cuenta, Nombre_Cuenta, 	SaldoInicial, Facturas, Fecha_AnoMes, Fecha_dia, credito, debito, Monto, Descripcion, Estado, Responsable, Accion) VALUES (:Rnc_Empresa_Anticipo, :NAsiento, :id_banco, :id_grupo, :id_categoria, :id_generica, :id_cuenta, :Nombre_Cuenta, :SaldoInicial, :Facturas, :Fecha_AnoMes, :Fecha_dia, :credito, :debito, :Monto, :Descripcion, :Estado, :Responsable, :Accion)");


$stmt ->bindParam(":Rnc_Empresa_Anticipo", $datos["Rnc_Empresa_Anticipo"], PDO::PARAM_STR);
		$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_banco", $datos["id_banco"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_generica", $datos["id_generica"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_cuenta", $datos["id_cuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":Nombre_Cuenta", $datos["Nombre_Cuenta"], PDO::PARAM_STR);
		$stmt ->bindParam(":SaldoInicial", $datos["SaldoInicial"], PDO::PARAM_STR);
		$stmt ->bindParam(":Facturas", $datos["Facturas"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_AnoMes", $datos["Fecha_AnoMes"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_dia", $datos["Fecha_dia"], PDO::PARAM_STR);
		$stmt ->bindParam(":credito", $datos["credito"], PDO::PARAM_STR);
		$stmt ->bindParam(":debito", $datos["debito"], PDO::PARAM_STR);
		$stmt ->bindParam(":Monto", $datos["Monto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
		$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);
		$stmt ->bindParam(":Responsable", $datos["Responsable"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
		
		


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;
		

}
static public function mdlEditarRendirFondos($tabla, $datos){

 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Anticipo = :Rnc_Empresa_Anticipo, NAsiento = :NAsiento, id_banco = :id_banco, id_grupo = :id_grupo, id_categoria = :id_categoria, id_generica = :id_generica, id_cuenta = :id_cuenta, Nombre_Cuenta = :Nombre_Cuenta, SaldoInicial = :SaldoInicial, Facturas = :Facturas, Fecha_AnoMes = :Fecha_AnoMes, Fecha_dia = :Fecha_dia, credito = :credito, debito = :debito, Monto = :Monto, Descripcion = :Descripcion, Estado = :Estado, Responsable = :Responsable, Accion = :Accion WHERE id = :id");

$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);

$stmt ->bindParam(":Rnc_Empresa_Anticipo", $datos["Rnc_Empresa_Anticipo"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
$stmt ->bindParam(":id_banco", $datos["id_banco"], PDO::PARAM_STR);
$stmt ->bindParam(":id_grupo", $datos["id_grupo"], PDO::PARAM_STR);
$stmt ->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
$stmt ->bindParam(":id_generica", $datos["id_generica"], PDO::PARAM_STR);
$stmt ->bindParam(":id_cuenta", $datos["id_cuenta"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Cuenta", $datos["Nombre_Cuenta"], PDO::PARAM_STR);
$stmt ->bindParam(":SaldoInicial", $datos["SaldoInicial"], PDO::PARAM_STR);
$stmt ->bindParam(":Facturas", $datos["Facturas"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_AnoMes", $datos["Fecha_AnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_dia", $datos["Fecha_dia"], PDO::PARAM_STR);
$stmt ->bindParam(":credito", $datos["credito"], PDO::PARAM_STR);
$stmt ->bindParam(":debito", $datos["debito"], PDO::PARAM_STR);
$stmt ->bindParam(":Monto", $datos["Monto"], PDO::PARAM_STR);
$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);
$stmt ->bindParam(":Responsable", $datos["Responsable"], PDO::PARAM_STR);
$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
		
		


		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;
		

}
static public function mdlMostrarbancoAsiento($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_grupo, $valorid_grupo, $taid_categoria, $valorid_categoria, $taid_generica, $valorid_generica, $taid_cuenta, $valorid_cuenta){

		 
	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taid_grupo = :$taid_grupo AND $taid_categoria = :$taid_categoria AND $taid_generica = :$taid_generica AND $taid_cuenta = :$taid_cuenta");

		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_grupo, $valorid_grupo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_categoria, $valorid_categoria, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_generica, $valorid_generica, PDO::PARAM_STR);	
		$stmt -> bindParam(":".$taid_cuenta, $valorid_cuenta, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

		
}
static public function mdlDisponibilidad($tabla, $taRnc_Empresa_DF, $Rnc_Empresa_DF, $taid_banco, $id_banco){

		 
	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_DF = :$taRnc_Empresa_DF AND $taid_banco = :$taid_banco");

		$stmt -> bindParam(":".$taRnc_Empresa_DF, $Rnc_Empresa_DF, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_banco, $id_banco, PDO::PARAM_STR);
		
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}
static public function mdlFechaDisponibilidad($tabla, $taRnc_Empresa_DF, $Rnc_Empresa_DF, $taid_banco, $id_banco, $taFecha, $Fecha){

		 
	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_DF = :$taRnc_Empresa_DF AND $taid_banco = :$taid_banco AND $taFecha = :$taFecha");

		$stmt -> bindParam(":".$taRnc_Empresa_DF, $Rnc_Empresa_DF, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_banco, $id_banco, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taFecha, $Fecha, PDO::PARAM_STR);
		
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

		
}

static public function MdlCrearDisponibilidad($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_DF, id_banco, Fecha, saldoInicial, saldoEstado) VALUES (:Rnc_Empresa_DF, :id_banco, :Fecha, :saldoInicial, :saldoEstado)");
	

		$stmt ->bindParam(":Rnc_Empresa_DF", $datos["Rnc_Empresa_DF"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_banco", $datos["id_banco"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha", $datos["Fecha"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldoInicial", $datos["saldoInicial"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldoEstado", $datos["saldoEstado"], PDO::PARAM_STR);
		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}
static public function MdlEditarDisponibilidad($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET saldoInicial = :saldoInicial, saldoEstado = :saldoEstado WHERE Rnc_Empresa_DF = :Rnc_Empresa_DF AND id_banco = :id_banco AND Fecha = :Fecha");

		$stmt ->bindParam(":Rnc_Empresa_DF", $datos["Rnc_Empresa_DF"], PDO::PARAM_STR);
		$stmt ->bindParam(":id_banco", $datos["id_banco"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha", $datos["Fecha"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldoInicial", $datos["saldoInicial"], PDO::PARAM_STR);
		$stmt ->bindParam(":saldoEstado", $datos["saldoEstado"], PDO::PARAM_STR);
		

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}
static public function MdlDesconciliar($tabla, $Estado_Banco, $id, $iddesconciliar, $valorEstado){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $Estado_Banco = :$Estado_Banco WHERE $id = :$id");

		$stmt ->bindParam(":".$Estado_Banco, $valorEstado, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $iddesconciliar, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/




}/*CIRREO CLASE DE PRODUCTOS*/