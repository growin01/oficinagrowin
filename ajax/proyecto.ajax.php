<?php 

require_once "../controladores/proyecto.controlador.php";
require_once "../modelos/proyecto.modelo.php";

class AjaxProyecto{



	/********************************
			EDITAR CATEGORIAS
	**********************************/
	public $valorid;

	public function ajaxModalEditarProyecto(){

		$id = "id";
		$valorid = $this->valorid;

		$respuesta = ControladorProyecto::ctrModalEditarProyecto($id, $valorid);
		
		echo json_encode($respuesta);


	}/*CIERRA EDITAR CATEGORIAS*/


/**************************************
	VALIDAR Codigo Proyecto
****************************************/

public $CodigoProyecto;
public $RncEmpresaProyecto;

public function ajaxvalidarCodigoProyecto(){

	$Nombre_tabla = "CodigoProyecto";
	$valor = $this->CodigoProyecto;
	$valorRNC = $this->RncEmpresaProyecto;

	$respuesta = ControladorProyecto::ctrValidarCodigoProyecto($Nombre_Tabla, $valor, $valorRNC);
	echo json_encode($respuesta);

}


public $nuevoProyecto;
public $RncEmpresaNombre;

public function ajaxvalidarNombreProyecto(){

	$Nombre_tabla = "NombreProyecto";
	$valor = $this->nuevoProyecto;
	$valorRNC = $this->RncEmpresaNombre;

	$respuesta = ControladorProyecto::ctrValidarCodigoProyecto($Nombre_Tabla, $valor, $valorRNC);
	echo json_encode($respuesta);

}




/**************************************
	ACTIVAR Y DESACTIVAR USUARIOS
****************************************/

public $estadoProyecto;
public $idProyecto; 


public function ajaxEstadoProyecto(){

	$tabla = "proyectos_empresas";
	$estatus = "estatus";
	$id = "id";

	$estadoProyecto = $this->estadoProyecto;
	$idProyecto = $this->idProyecto;


	$respuesta =  ModeloProyecto::MdlEstadoProyecto($tabla, $estatus, $id, $estadoProyecto, $idProyecto);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

/***************MOSTRAR PROYECTO*/


public $RncEmpresaProyectos;

public function ajaxMostrarProyecto(){

	
	$Rnc_Empresa_Proyectos = $this->RncEmpresaProyectos;
	$tabla = "proyectos_empresas";
   	$taRncEmpresaProyectos = "Rnc_Empresa_Proyecto";

$respuesta = ModeloProyecto::mdlMostrarProyectos($tabla, $taRncEmpresaProyectos, $Rnc_Empresa_Proyectos);


	
	echo json_encode($respuesta);

}

	public $proyecto;
	public $fechadesde;
	public $fechahasta;
	public $RncProyectos;


public function ajaxDetalleproyecto(){


	$tabla = "librodiario_empresas";

	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$Rnc_Empresa_LD = $this->RncProyectos;

	$taid_Proyecto = "id_Proyecto";
	$id_Proyecto = $this->proyecto;
	
	$fechadesde = $this->fechadesde;
	$fechahasta = $this->fechahasta;

	$Orden = "id_registro";


$respuesta = ModeloProyecto::mdlDetalleProyectos($tabla, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taid_Proyecto, $id_Proyecto, $fechadesde, $fechahasta, $Orden);

	
	echo json_encode($respuesta);

}



}/*CIERRA LA CLASE AJAX USUARIOS*/




/********************************
			EDITAR CATEGORIAS
**********************************/

if(isset($_POST["idProyecto"])){

$ModaleditarProyecto = new AjaxProyecto();
$ModaleditarProyecto -> valorid = $_POST["idProyecto"];
$ModaleditarProyecto -> ajaxModalEditarProyecto();

}


/*********************************
		VALIDAR USUARIO 
**********************************/

if(isset($_POST["CodigoProyecto"])){
	$valProyecto = new AjaxProyecto();
	$valProyecto -> CodigoProyecto = $_POST["CodigoProyecto"];
	$valProyecto -> RncEmpresaProyecto = $_POST["RncEmpresaProyecto"];
	$valProyecto -> ajaxvalidarCodigoProyecto();




}
if(isset($_POST["nuevoProyecto"])){
	$valProyecto = new AjaxProyecto();
	$valProyecto -> nuevoProyecto = $_POST["nuevoProyecto"];
	$valProyecto -> RncEmpresaNombre = $_POST["RncEmpresaNombre"];
	$valProyecto -> ajaxvalidarNombreProyecto();




}
/*******************************
ACTIVAR O DESACTIVAR  USUARIOS
**********************************/

if(isset($_POST["estadoProyecto"])){ 
	
	$EstadoProyecto = new  AjaxProyecto();
	$EstadoProyecto -> estadoProyecto = $_POST["estadoProyecto"];
	$EstadoProyecto -> idProyecto = $_POST["idProyecto"];
	$EstadoProyecto -> ajaxEstadoProyecto();

}
if(isset($_POST["RncEmpresaProyectos"])){ 
	
	$MostarProyecto = new  AjaxProyecto();
	$MostarProyecto -> RncEmpresaProyectos = $_POST["RncEmpresaProyectos"];
	$MostarProyecto -> ajaxMostrarProyecto();

}

if(isset($_POST["RncProyectos"])){ 
	
	$DetalleProyecto = new  AjaxProyecto();
	$DetalleProyecto -> proyecto = $_POST["proyecto"];
	$DetalleProyecto -> fechadesde = $_POST["fechadesde"];
	$DetalleProyecto -> fechahasta = $_POST["fechahasta"];
	$DetalleProyecto -> RncProyectos = $_POST["RncProyectos"];
	$DetalleProyecto -> ajaxDetalleproyecto();

}



