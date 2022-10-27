<?php
require_once "../controladores/empresas.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

/***********************
	EDITAR USUARIOS
***********************/
public $idUsuario;

public function ajaxEditarUsuario(){
	$id = "id";
	$idUsuario = $this->idUsuario;

	$respuesta = ControladorUsuarios::ctrModalEditarUsuario($id, $idUsuario);
	echo json_encode($respuesta);


}/*CIERRA FUNCION EDITAR USUARIO*/
/**************************************
	ACTIVAR Y DESACTIVAR USUARIOS
****************************************/

public $activarUsuario;
public $activarId; 

public function ajaxActivarUsuario(){

	$tabla = "usuarios_empresas";
	$Estado = "Estado";
	$id = "id";

	$activarUsuario = $this->activarUsuario;
	$valorid = $this->activarId;


	$respuesta = ModeloUsuarios::MdlActualizarUsuarios($tabla, $Estado, $id, $activarUsuario, $valorid);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/
/**************************************
	VALIDAR USUARIOS
****************************************/
public $validarUsuario;
public $RncEmpresaUsuario;

public function ajaxvalidarUsuario(){

	$Usuario = "Usuario";
	$valorUsuario = $this->validarUsuario;
	$valorRNC = $this->RncEmpresaUsuario;

	$respuesta = ControladorUsuarios::ctrValidarUsuario($Usuario, $valorUsuario, $valorRNC);
	echo json_encode($respuesta);




}

public $RncEmpresaCXC;

public function ajaxconsultaUsuarioCXC(){

	
	$RncEmpresaUsuario = $this->RncEmpresaCXC;
	$taRncEmpresaUsuario = "Rnc_Empresa_Usuario";
	$tabla = 'usuarios_empresas';
        
    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $taRncEmpresaUsuario, $RncEmpresaUsuario);
      

	echo json_encode($respuesta);




}



}/*CIERRA LA CLASE AJAX USUARIOS*/

/***********************
	EDITAR USUARIOS
***********************/
if(isset($_POST["idUsuario"])){ 
	
	$modaleditar = new AjaxUsuarios();
	$modaleditar -> idUsuario = $_POST["idUsuario"];
	$modaleditar -> ajaxEditarUsuario();

}
/*******************************
ACTIVAR O DESACTIVAR  USUARIOS
**********************************/

if(isset($_POST["activarUsuario"])){ 
	
	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}
/*********************************
		VALIDAR USUARIO 
**********************************/

if(isset($_POST["validarUsuario"])){
	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> RncEmpresaUsuario = $_POST["RncEmpresaUsuario"];
	$valUsuario -> ajaxvalidarUsuario();


}
if(isset($_POST["RncEmpresaCXC"])){
	$valUsuario = new AjaxUsuarios();
	$valUsuario -> RncEmpresaCXC = $_POST["RncEmpresaCXC"];
	$valUsuario -> ajaxconsultaUsuarioCXC();


}










 