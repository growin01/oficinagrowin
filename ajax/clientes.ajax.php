
<?php 

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{



	/********************************
			EDITAR CATEGORIAS
	**********************************/
	public $idCliente;

	public function ajaxModalEditarClientes(){

		$id = "id";
		$valorid = $this->idCliente;

		$respuesta = ControladorClientes::ctrModalEditarClientes($id, $valorid);
		
		echo json_encode($respuesta);


	}/*CIERRA EDITAR CATEGORIAS*/


	/**************************************
	VALIDAR USUARIOS
****************************************/
public $validarCliente;
public $RncEmpresaCliente;

public function ajaxvalidarCliente(){

	$Nombre_Cliente = "Documento";
	$valorCliente = $this->validarCliente;
	$valorRNC = $this->RncEmpresaCliente;

	$respuesta = ControladorClientes::ctrValidarCliente($Nombre_Cliente, $valorCliente, $valorRNC);
	echo json_encode($respuesta);

}

/**************************************
	Buscar en tabla DGGI
****************************************/
public $RncCliente;

public function ajaxTablaDGII(){

	
	$RncCliente = $this->RncCliente;
	
	$respuesta = ControladorClientes::ctrTablaDGII($RncCliente);
	echo json_encode($respuesta);

}




}/*CIERRA LA CLASE AJAX USUARIOS*/



/********************************
			EDITAR CATEGORIAS
**********************************/

if(isset($_POST["idCliente"])){

$ModaleditarClientes = new AjaxClientes();
$ModaleditarClientes -> idCliente = $_POST["idCliente"];
$ModaleditarClientes -> ajaxModalEditarClientes();

}

/*********************************
		VALIDAR USUARIO 
**********************************/

if(isset($_POST["validarCliente"])){
	$valCliente = new AjaxClientes();
	$valCliente -> validarCliente = $_POST["validarCliente"];
	$valCliente -> RncEmpresaCliente = $_POST["RncEmpresaCliente"];
	$valCliente -> ajaxvalidarCliente();




}

/*********************************
		BUSQUEDA DE SUPLIDORES
**********************************/


if(isset($_POST["RncCliente"])){

$TablaDGII = new AjaxClientes();
$TablaDGII -> RncCliente = $_POST["RncCliente"];
$TablaDGII -> ajaxTablaDGII();

}







