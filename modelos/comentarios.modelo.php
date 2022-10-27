<?php 

require_once "conexion.php";


class ModeloComentarios{

   static public function mdlMostrarComentarios($tabla, $taRncEmpresaComentario, $Rnc_Empresa_Comentario, $Orden, $NReporte, $taNReporte){

    	if($NReporte == "Null"){ 

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaComentario = :$taRncEmpresaComentario ORDER BY $Orden DESC");

        
        $stmt -> bindParam(":".$taRncEmpresaComentario, $Rnc_Empresa_Comentario, PDO::PARAM_STR);
    

        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;

    }else{
    	$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaComentario = :$taRncEmpresaComentario AND $taNReporte = :$taNReporte");

        
        $stmt -> bindParam(":".$taRncEmpresaComentario, $Rnc_Empresa_Comentario, PDO::PARAM_STR);
         $stmt -> bindParam(":".$taNReporte, $NReporte, PDO::PARAM_STR);
    

        $stmt -> execute();

        return $stmt -> fetch();
        $stmt -> close();
        $stmt = null;



    }

        
}
 static public function mdlmensajes($tabla, $taRncEmpresaComentario, $Rnc_Empresa_Comentario, $Orden, $idUsuario, $NombreUsuario, $taidUsuario, $taNombreUsuario){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaComentario = :$taRncEmpresaComentario AND $taidUsuario = :$taidUsuario AND $taNombreUsuario = :$taNombreUsuario ORDER BY $Orden DESC");

        
$stmt -> bindParam(":".$taRncEmpresaComentario, $Rnc_Empresa_Comentario, PDO::PARAM_STR);
$stmt -> bindParam(":".$taidUsuario, $idUsuario, PDO::PARAM_STR); 
$stmt -> bindParam(":".$taNombreUsuario, $NombreUsuario, PDO::PARAM_STR);
    

        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;

        
}
static public function mdlmensajesNuevo($tabla, $taRncEmpresaComentario, $Rnc_Empresa_Comentario, $Orden, $idUsuario, $NombreUsuario, $taidUsuario, $taNombreUsuario, $taEstado, $Estado){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaComentario = :$taRncEmpresaComentario AND $taidUsuario = :$taidUsuario AND $taNombreUsuario = :$taNombreUsuario AND $taEstado = :$taEstado ORDER BY $Orden DESC");

        
$stmt -> bindParam(":".$taRncEmpresaComentario, $Rnc_Empresa_Comentario, PDO::PARAM_STR);
$stmt -> bindParam(":".$taidUsuario, $idUsuario, PDO::PARAM_STR); 
$stmt -> bindParam(":".$taNombreUsuario, $NombreUsuario, PDO::PARAM_STR);
$stmt -> bindParam(":".$taEstado, $Estado, PDO::PARAM_STR);
    

        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;

        
}
static public function MdlNComentarioRepetido($tabla, $taRnc_Empresa, $Rnc_Empresa, $taNReporte, $NReporte){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa = :$taRnc_Empresa AND $taNReporte = :$taNReporte");

		$stmt -> bindParam(":".$taRnc_Empresa, $Rnc_Empresa, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNReporte, $NReporte, PDO::PARAM_STR);
	
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;


	}

static public function MdlCrearComentario($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Comentario, NReporte, id_Usuario, Nombre_Usuario, id_Usuario_Dirigido, Nombre_Usuario_Dirigito, TipoComentario, Asunto, Comentario, Estado, FechaAnoMes, Fechadia, Accion) VALUES (:Rnc_Empresa_Comentario, :NReporte, :id_Usuario, :Nombre_Usuario, :id_Usuario_Dirigido, :Nombre_Usuario_Dirigito, :TipoComentario, :Asunto, :Comentario, :Estado, :FechaAnoMes, :Fechadia, :Accion)");
	

$stmt ->bindParam(":Rnc_Empresa_Comentario", $datos["Rnc_Empresa_Comentario"], PDO::PARAM_STR);
	$stmt ->bindParam(":NReporte", $datos["NReporte"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_Usuario", $datos["id_Usuario"], PDO::PARAM_INT);
	$stmt ->bindParam(":Nombre_Usuario", $datos["Nombre_Usuario"], PDO::PARAM_STR);
	$stmt ->bindParam(":id_Usuario_Dirigido", $datos["id_Usuario_Dirigido"], PDO::PARAM_INT);
	$stmt ->bindParam(":Nombre_Usuario_Dirigito", $datos["Nombre_Usuario_Dirigito"], PDO::PARAM_STR);
	$stmt ->bindParam(":TipoComentario", $datos["TipoComentario"], PDO::PARAM_STR);
	$stmt ->bindParam(":Asunto", $datos["Asunto"], PDO::PARAM_STR);
	$stmt ->bindParam(":Comentario", $datos["Comentario"], PDO::PARAM_STR);
	$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);
	$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fechadia", $datos["Fechadia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
		

		

		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}

static public function MdlCrearrecibocomentarios($tabla, $datos){
	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Comentario, NReporte, Nombre_Usuario, Nombre_Usuario_Dirigito, TipoComentario, Asunto, FechaAnoMes, Fechadia, Estado) VALUES (:Rnc_Empresa_Comentario, :NReporte, :Nombre_Usuario, :Nombre_Usuario_Dirigito, :TipoComentario, :Asunto, :FechaAnoMes, :Fechadia, :Estado)");
	

	$stmt ->bindParam(":Rnc_Empresa_Comentario", $datos["Rnc_Empresa_Comentario"], PDO::PARAM_STR);
	$stmt ->bindParam(":NReporte", $datos["NReporte"], PDO::PARAM_STR);
	$stmt ->bindParam(":Nombre_Usuario", $datos["Nombre_Usuario"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_Usuario_Dirigito", $datos["Nombre_Usuario_Dirigito"], PDO::PARAM_STR);
$stmt ->bindParam(":TipoComentario", $datos["TipoComentario"], PDO::PARAM_STR);
$stmt ->bindParam(":Asunto", $datos["Asunto"], PDO::PARAM_STR);
$stmt ->bindParam(":FechaAnoMes", $datos["FechaAnoMes"], PDO::PARAM_STR);
	$stmt ->bindParam(":Fechadia", $datos["Fechadia"], PDO::PARAM_STR);
	$stmt ->bindParam(":Estado", $datos["Estado"], PDO::PARAM_INT);

		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;






}
static public function MdlEstadoComentario($tabla, $taRnc_Empresa_Comentario, $Rnc_Empresa_Comentario, $taNReporte, $taEstado, $NReporte, $Estado){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $taEstado = :$taEstado WHERE $taRnc_Empresa_Comentario = :$taRnc_Empresa_Comentario AND $taNReporte = :$taNReporte");
		

		$stmt ->bindParam(":".$taRnc_Empresa_Comentario, $Rnc_Empresa_Comentario, PDO::PARAM_STR);
		$stmt ->bindParam(":".$taNReporte, $NReporte, PDO::PARAM_STR);
		$stmt ->bindParam(":".$taEstado, $Estado, PDO::PARAM_INT);
		

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/
	static public function MdlEstadoSeguimiento($tabla, $taEstado , $taid, $idComentario, $Estado){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $taEstado = :$taEstado WHERE $taid = :$taid");

		$stmt ->bindParam(":".$taEstado, $Estado, PDO::PARAM_INT);
		$stmt ->bindParam(":".$taid, $idComentario, PDO::PARAM_INT);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

	}/* CIERRE DE FUNCION ACTIVAR Y DESACTIVAR USUARIOS*/
static public function MdlVerComentario($tabla, $id, $idVerComentario){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $idVerComentario, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion MDLlOGINuSUAIO*/
	static public function MdlTodoComentario($tabla, $taNReporte, $NReporte, $taRnc_Empresa_Comentario, $Rnc_Empresa_Comentario){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taNReporte = :$taNReporte AND $taRnc_Empresa_Comentario = :$taRnc_Empresa_Comentario");

		$stmt -> bindParam(":".$taRnc_Empresa_Comentario, $Rnc_Empresa_Comentario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taNReporte, $NReporte, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;

	} /* CIERRE funcion MDLlOGINuSUAIO*/


}/*Class*/