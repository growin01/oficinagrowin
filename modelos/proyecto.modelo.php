<?php 

require_once "conexion.php";


 class ModeloProyecto{ 

 
 	/**********************************
 	INICIO DE FUNCION CREAR CATEGORIAS
 	*************************************/

 	static public function mdlCrearProyecto($tabla, $datos){

 		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Proyecto, CodigoProyecto, Corre_Cotizacion, NombreProyecto, DescripcionProyecto, Fecha_anomes_inicio, Fecha_dia_inicio, Fecha_anomes_fin, Fecha_dia_fin, SaldoInicial, estatus, Usuario_creador, Accion) VALUES (:Rnc_Empresa_Proyecto, :CodigoProyecto, :Corre_Cotizacion, :NombreProyecto, :DescripcionProyecto, :Fecha_anomes_inicio, :Fecha_dia_inicio, :Fecha_anomes_fin, :Fecha_dia_fin, :SaldoInicial, :estatus, :Usuario_creador, :Accion)");


		$stmt ->bindParam(":Rnc_Empresa_Proyecto", $datos["Rnc_Empresa_Proyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corre_Cotizacion", $datos["Corre_Cotizacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":NombreProyecto", $datos["NombreProyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":DescripcionProyecto", $datos["DescripcionProyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_anomes_inicio", $datos["Fecha_anomes_inicio"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_dia_inicio", $datos["Fecha_dia_inicio"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_anomes_fin", $datos["Fecha_anomes_fin"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_dia_fin", $datos["Fecha_dia_fin"], PDO::PARAM_STR);
		$stmt ->bindParam(":SaldoInicial", $datos["SaldoInicial"], PDO::PARAM_STR);
		$stmt ->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);	
		$stmt ->bindParam(":Usuario_creador", $datos["Usuario_creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/

 /******************************************
 	INICIO Mostrar Categorias

 ********************************************/
 	static public function mdlMostrarProyectos($tabla, $taRncEmpresaProyectos, $Rnc_Empresa_Proyectos){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaProyectos = :$taRncEmpresaProyectos");

		$stmt -> bindParam(":".$taRncEmpresaProyectos, $Rnc_Empresa_Proyectos, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
	static public function mdlDetalleProyectos($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_Proyecto, $id_Proyecto, $fechadesde, $fechahasta, $Orden){
 		
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taid_Proyecto = :$taid_Proyecto AND Fecha_AnoMes_LD BETWEEN $fechadesde AND $fechahasta ORDER BY $Orden DESC");

		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_Proyecto, $id_Proyecto, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/


	/******************************************
 	INICIO Editar Categorias

 	********************************************/
	static public function mdlModalEditarProyectos($tabla, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}/*CIERRO EDITAR CATEGORIA*/

	/*********************************************
	INICIO DE FUNCION EDITAR CATEGORIAS
 	*************************************/

 	static public function mdlEditarProyecto($tabla, $datos){

 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Proyecto = :Rnc_Empresa_Proyecto, CodigoProyecto = :CodigoProyecto, Corre_Cotizacion = :Corre_Cotizacion, NombreProyecto = :NombreProyecto, DescripcionProyecto = :DescripcionProyecto, Fecha_anomes_inicio = :Fecha_anomes_inicio, Fecha_dia_inicio = :Fecha_dia_inicio, Fecha_anomes_fin = :Fecha_anomes_fin, Fecha_dia_fin = :Fecha_dia_fin, SaldoInicial = :SaldoInicial, estatus = :estatus, Usuario_creador = :Usuario_creador, Accion = :Accion WHERE id = :id");

		$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt ->bindParam(":Rnc_Empresa_Proyecto", $datos["Rnc_Empresa_Proyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":CodigoProyecto", $datos["CodigoProyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Corre_Cotizacion", $datos["Corre_Cotizacion"], PDO::PARAM_STR);
		$stmt ->bindParam(":NombreProyecto", $datos["NombreProyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":DescripcionProyecto", $datos["DescripcionProyecto"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_anomes_inicio", $datos["Fecha_anomes_inicio"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_dia_inicio", $datos["Fecha_dia_inicio"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_anomes_fin", $datos["Fecha_anomes_fin"], PDO::PARAM_STR);
		$stmt ->bindParam(":Fecha_dia_fin", $datos["Fecha_dia_fin"], PDO::PARAM_STR);
		$stmt ->bindParam(":SaldoInicial", $datos["SaldoInicial"], PDO::PARAM_STR);
		$stmt ->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);	
		$stmt ->bindParam(":Usuario_creador", $datos["Usuario_creador"], PDO::PARAM_STR);
		$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;

	 }/*cierra funcion crear categorias*/
	 
	 /************************************************
	 		BORRAR CATEGORIAS
	 ************************************************/
static public function mdlBorrarProyecto($tabla, $id, $idProyecto){

	 			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $idProyecto, PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	 		}

	/****************************************************
		INICIO DE FUNCION DE validar USUARIO
	*****************************************************/

	static public function MdlValidarProyecto($tabla, $Nombre_Tabla, $valor, $valorRNC, $Rnc_Empresa_Proyecto){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $Nombre_Tabla = :$Nombre_Tabla AND  $Rnc_Empresa_Proyecto = :$Rnc_Empresa_Proyecto");

		$stmt -> bindParam(":".$Rnc_Empresa_Proyecto, $valorRNC, PDO::PARAM_STR);
		$stmt -> bindParam(":".$Nombre_Tabla, $valor, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion validar usuario*/

	static public function MdlMostrarCategoriasPro($tabla, $id, $id_categorias){


			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $id_categorias, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	






	}
	static public function MdlEstadoProyecto($tabla, $estatus, $id, $estadoProyecto, $idProyecto){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $estatus = :$estatus WHERE $id = :$id");

		$stmt ->bindParam(":".$estatus, $estadoProyecto, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $idProyecto, PDO::PARAM_INT);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/
	static public function mdlSumarResumenProyectos($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taidgrupo, $idgrupoDesde, $idgrupoHasta, $Proyecto, $taProyecto, $Orden){


	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_LD = :$taRnc_Empresa_LD AND $taProyecto = :$taProyecto AND id_grupo BETWEEN $idgrupoDesde AND $idgrupoHasta ORDER BY $Orden DESC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_LD, $Rnc_Empresa_LD, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taProyecto, $Proyecto, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




}


		








}/*CIERRO CLASE MODELO DE CATEGORIAS*/
				