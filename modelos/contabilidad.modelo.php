<?php 

require_once "conexion.php";


 class ModeloContabilidad{ 

 	static public function mdlCrearCodigogenerica($tabla, $taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta){
 		
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa = :$taRncEmpresa AND $tagrupocuenta = :$tagrupocuenta AND $tacategoriacuenta = :$tacategoriacuenta ORDER BY id DESC");

		$stmt -> bindParam(":".$taRncEmpresa, $valorRncEmpresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$tagrupocuenta, $valorgrupocuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tacategoriacuenta, $valorcategoriacuenta, PDO::PARAM_INT);
		
		
		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
	static public function mdlsubcuenta($tabla, $taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta){
 		
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa = :$taRncEmpresa AND $tagrupocuenta = :$tagrupocuenta AND $tacategoriacuenta = :$tacategoriacuenta ORDER BY id ASC");

		$stmt -> bindParam(":".$taRncEmpresa, $valorRncEmpresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$tagrupocuenta, $valorgrupocuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tacategoriacuenta, $valorcategoriacuenta, PDO::PARAM_INT);
		
		

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
	
	static public function mdlCodigosubcuenta($tabla, $taRncEmpresa, $valorRncEmpresa, $tagrupocuenta, $valorgrupocuenta, $tacategoriacuenta, $valorcategoriacuenta, $taidgenerica, $valoridgenerica){
 		
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresa = :$taRncEmpresa AND $tagrupocuenta = :$tagrupocuenta AND $tacategoriacuenta = :$tacategoriacuenta AND $taidgenerica = :$taidgenerica ORDER BY id DESC");

		$stmt -> bindParam(":".$taRncEmpresa, $valorRncEmpresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$tagrupocuenta, $valorgrupocuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tacategoriacuenta, $valorcategoriacuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taidgenerica, $valoridgenerica, PDO::PARAM_STR);
		
	
		
		
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/


	static public function mdlrepetidacuenta($tabla, $taRncEmpresacuentas, $RncEmpresacuentas, $tagrupocuenta, $grupocuenta, $tacategoriacuenta, $categoriacuenta, $tanumerogenerico, $numerogenerico){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresacuentas = :$taRncEmpresacuentas AND $tagrupocuenta = :$tagrupocuenta AND $tacategoriacuenta = :$tacategoriacuenta AND $tanumerogenerico = :$tanumerogenerico");

		$stmt -> bindParam(":".$taRncEmpresacuentas, $RncEmpresacuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":".$tagrupocuenta, $grupocuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tacategoriacuenta, $categoriacuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tanumerogenerico, $numerogenerico, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}
	static public function mdlrepetidacuentamasiva($tabla, $tagrupocuenta, $grupocuenta, $tacategoriacuenta, $categoriacuenta, $tanumerogenerico, $numerogenerico){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tagrupocuenta = :$tagrupocuenta AND $tacategoriacuenta = :$tacategoriacuenta AND $tanumerogenerico = :$tanumerogenerico");

		
		$stmt -> bindParam(":".$tagrupocuenta, $grupocuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tacategoriacuenta, $categoriacuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tanumerogenerico, $numerogenerico, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchA();
		$stmt -> close();
		$stmt = null;


	}
	static public function mdlrepetidacuentademo($tabla, $taRncEmpresacuentas, $RncEmpresacuentas){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresacuentas = :$taRncEmpresacuentas");

		$stmt -> bindParam(":".$taRncEmpresacuentas, $RncEmpresacuentas, PDO::PARAM_STR);
		
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}

static public function mdlrepetidasubcuenta($tabla, $taRncEmpresacuentas, $RncEmpresacuentas, $tagrupocuenta, $grupocuenta, $tacategoriacuenta, $categoriacuenta, $tanumerogenerico, $numerogenerico, $tanumerosubgenerico, $numerosubgenerico){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresacuentas = :$taRncEmpresacuentas AND $tagrupocuenta = :$tagrupocuenta AND $tacategoriacuenta = :$tacategoriacuenta AND $tanumerogenerico = :$tanumerogenerico AND $tanumerosubgenerico = :$tanumerosubgenerico");

		$stmt -> bindParam(":".$taRncEmpresacuentas, $RncEmpresacuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":".$tagrupocuenta, $grupocuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tacategoriacuenta, $categoriacuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$tanumerogenerico, $numerogenerico, PDO::PARAM_STR);
		$stmt -> bindParam(":".$tanumerosubgenerico, $numerogenerico, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}


 	/**********************************
 	INICIO DE FUNCION CREAR CATEGORIAS
 	*************************************/

 	static public function mdlCrearcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado){

 		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_cuentas, id_grupo, id_categoria, id_generica, Nombre_Cuenta, Usuario_Creador, Accion, Estado) VALUES (:Rnc_Empresa_cuentas, :id_grupo, :id_categoria, :id_generica, :Nombre_Cuenta, :Usuario_Creador, :Accion, :Estado)");


 		$stmt -> bindParam(":Rnc_Empresa_cuentas", $RncEmpresacuentas, PDO::PARAM_STR);
 		$stmt -> bindParam(":id_grupo", $grupocuenta, PDO::PARAM_INT);
 		$stmt -> bindParam(":id_categoria", $categoriacuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":id_generica", $numerogenerico, PDO::PARAM_STR);
		$stmt -> bindParam(":Nombre_Cuenta", $nuevacuentagenerica, PDO::PARAM_STR);
		$stmt -> bindParam(":Usuario_Creador", $Usuariocuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":Accion", $Accion, PDO::PARAM_STR);
		$stmt -> bindParam(":Estado", $Estado, PDO::PARAM_INT);
				
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/

/**********************************
 	INICIO DE FUNCION CREAR CATEGORIAS
 	*************************************/

 	static public function mdlEditarcuentaCreada($tabla, $valorid, $nuevacuentagenerica, $Usuariocuentas, $Accion){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre_Cuenta = :Nombre_Cuenta, Usuario_Creador = :Usuario_Creador, Accion = :Accion WHERE id = :id");


 		$stmt -> bindParam(":id", $valorid, PDO::PARAM_INT);
		$stmt -> bindParam(":Nombre_Cuenta", $nuevacuentagenerica, PDO::PARAM_STR);
		$stmt -> bindParam(":Usuario_Creador", $Usuariocuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":Accion", $Accion, PDO::PARAM_STR);
		
				
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/

	 static public function mdlEditarsubCuenta($tabla, $valorid, $nuevacuentagenerica, $Usuariocuentas, $Accion){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre_subCuenta = :Nombre_subCuenta, Usuario_Creador = :Usuario_Creador, Accion = :Accion WHERE id = :id");


 		$stmt -> bindParam(":id", $valorid, PDO::PARAM_INT);
		$stmt -> bindParam(":Nombre_subCuenta", $nuevacuentagenerica, PDO::PARAM_STR);
		$stmt -> bindParam(":Usuario_Creador", $Usuariocuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":Accion", $Accion, PDO::PARAM_STR);
		
				
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/


	 static public function mdlCrearsubcuenta($tabla, $RncEmpresacuentas, $grupocuenta, $categoriacuenta, $numerogenerico,  $numerosubgenerico, $nuevacuentagenerica, $Usuariocuentas, $Accion, $Estado){

 		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_cuentas, id_grupo, id_categoria, id_generica, id_subgenerica, Nombre_subCuenta, Usuario_Creador, Accion, Estado) VALUES (:Rnc_Empresa_cuentas, :id_grupo, :id_categoria, :id_generica, :id_subgenerica,:Nombre_subCuenta, :Usuario_Creador, :Accion, :Estado)");


 		$stmt -> bindParam(":Rnc_Empresa_cuentas", $RncEmpresacuentas, PDO::PARAM_STR);
 		$stmt -> bindParam(":id_grupo", $grupocuenta, PDO::PARAM_INT);
 		$stmt -> bindParam(":id_categoria", $categoriacuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":id_generica", $numerogenerico, PDO::PARAM_STR);
		$stmt -> bindParam(":id_subgenerica", $numerosubgenerico, PDO::PARAM_STR);
		$stmt -> bindParam(":Nombre_subCuenta", $nuevacuentagenerica, PDO::PARAM_STR);
		$stmt -> bindParam(":Usuario_Creador", $Usuariocuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":Accion", $Accion, PDO::PARAM_STR);
		$stmt -> bindParam(":Estado", $Estado, PDO::PARAM_INT);
		
				
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/



static public function mdlMostrargrupos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}
static public function mdlMostrarcuentas($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas, $grupo, $tagrupo, $categorias, $tacategorias){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Cuentas = :$taRnc_Empresa_Cuentas AND $tagrupo =:$tagrupo AND $tacategorias = :$tacategorias ORDER BY id_grupo, id_categoria, id_generica ASC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_Cuentas, $Rnc_Empresa_Cuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":".$tagrupo, $grupo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$tacategorias, $categorias, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

static public function mdlMostrarsubcuentas($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas, $id_grupo, $taid_grupo, $id_categoria, $taid_categoria, $id_generica, $taid_generica){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Cuentas = :$taRnc_Empresa_Cuentas AND $taid_grupo = :$taid_grupo AND $taid_categoria = :$taid_categoria AND $taid_generica = :$taid_generica ORDER BY id_grupo, id_categoria, id_generica ASC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_Cuentas, $Rnc_Empresa_Cuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_grupo, $id_grupo, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taid_categoria, $id_categoria, PDO::PARAM_INT);
		$stmt -> bindParam(":".$taid_generica, $id_generica, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}


	static public function mdleditarcuenta($tabla, $RncEmpresaEG, $valorRncEmpresaEG, $idcuenta, $valoridcuenta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $idcuenta = :$idcuenta AND $RncEmpresaEG = :$RncEmpresaEG");

		
		$stmt -> bindParam(":".$idcuenta, $valoridcuenta, PDO::PARAM_INT);
		$stmt -> bindParam(":".$RncEmpresaEG, $valorRncEmpresaEG, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}
	static public function mdleditargrupo($tabla, $idgrupo, $valoridgrupo, $idCategoria, $valoridCategoria){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $idgrupo = :$idgrupo AND $idCategoria = :$idCategoria");

		
		$stmt -> bindParam(":".$idgrupo, $valoridgrupo, PDO::PARAM_INT);
		$stmt -> bindParam(":".$idCategoria, $valoridCategoria, PDO::PARAM_INT);
		

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}
static public function mdlconsultagenerica($tabla, $RncEmpresaCon, $valorRncEmpresaCon, $idgrupo, $valoridgrupo, $idCategoria, $valoridCategoria, $idgenerica, $valoridgenerica){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $idgrupo = :$idgrupo AND $idCategoria = :$idCategoria AND $idgenerica = :$idgenerica AND $RncEmpresaCon = :$RncEmpresaCon");

		
		$stmt -> bindParam(":".$idgrupo, $valoridgrupo, PDO::PARAM_INT);
		$stmt -> bindParam(":".$idCategoria, $valoridCategoria, PDO::PARAM_INT);
		$stmt -> bindParam(":".$idgenerica, $valoridgenerica, PDO::PARAM_STR);
		$stmt -> bindParam(":".$RncEmpresaCon, $valorRncEmpresaCon, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;




	}

	


}/*CIRREO CLASE DE PRODUCTOS*/