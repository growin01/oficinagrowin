<?php
require_once "../controladores/comentarios.controlador.php";
require_once "../modelos/comentarios.modelo.php";

class AjaxComentarios{

/***********************
	EDITAR USUARIOS
***********************/
public $idVerComentario;

public function ajaxVerComentario(){
	$tabla = "comentarios_empresas";
	$id = "id";
	$idVerComentario = $this->idVerComentario;

$respuesta = ModeloComentarios::MdlVerComentario($tabla, $id, $idVerComentario);
	echo json_encode($respuesta);


}/*CIERRA FUNCION EDITAR USUARIO*/
/**************************************
	ACTIVAR Y DESACTIVAR USUARIOS
****************************************/

public $idComentario;

public function ajaxCambiarEstado(){

	$tabla = "comentarios_empresas";
	$taEstado = "Estado";
	$taid = "id";

	$idComentario = $this->idComentario;
	$Estado = "2";


	$respuesta = ModeloComentarios::MdlEstadoSeguimiento($tabla, $taEstado , $taid, $idComentario, $Estado);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

public $NReporte;
public $Rnc_Empresa_Comentario;

public function ajaxTodoCometario(){
	$tabla = "comentarios_empresas";
	$taNReporte = "NReporte";
	$NReporte = $this->NReporte;
	$taRnc_Empresa_Comentario = "Rnc_Empresa_Comentario";
	$Rnc_Empresa_Comentario = $this->Rnc_Empresa_Comentario;

$respuesta = ModeloComentarios::MdlTodoComentario($tabla, $taNReporte, $NReporte, $taRnc_Empresa_Comentario, $Rnc_Empresa_Comentario);

	echo json_encode($respuesta);


}/*CIERRA FUNCION EDITAR USUARIO*/


}/*CIERRA LA CLASE AJAX USUARIOS*/

/***********************
	EDITAR USUARIOS
***********************/
if(isset($_POST["idVerComentario"])){ 
	
	$modaleditar = new AjaxComentarios();
	$modaleditar -> idVerComentario = $_POST["idVerComentario"];
	$modaleditar -> ajaxVerComentario();

}
/*******************************
ACTIVAR O DESACTIVAR  USUARIOS
**********************************/

if(isset($_POST["idComentario"])){ 
	
	$EstadoComentario = new AjaxComentarios();
	$EstadoComentario -> idComentario = $_POST["idComentario"];
	$EstadoComentario -> ajaxCambiarEstado();

}
if(isset($_POST["NReporte"])){ 
	
$TodoComentario = new AjaxComentarios();
$TodoComentario -> NReporte = $_POST["NReporte"];
$TodoComentario -> Rnc_Empresa_Comentario = $_POST["Rnc_Empresa_Comentario"];
$TodoComentario -> ajaxTodoCometario();

}
