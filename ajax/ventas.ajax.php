<?php
require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxVentas{

/***********************
	EDITAR USUARIOS
***********************/
public $idVenta;

public function ajaxEditarVentas(){
	$id = "id";
	$valoridVenta = $this->idVenta;

	$respuesta = ControladorVentas::ctrMostrarVentaEditar($id, $valoridVenta);
	echo json_encode($respuesta);


}/*CIERRA FUNCION EDITAR USUARIO*/
/**************************************
	VALIDAR USUARIOS
****************************************/
public $validarCliente;
public $RncEmpresaCliente;

public function ajaxvalidarClienteRecurrente(){

	$taRnc_Cliente = "Rnc_Cliente";
	$Rnc_Cliente = $this->validarCliente;
	$Rnc_Empresa_Venta = $this->RncEmpresaCliente;

	$respuesta = ControladorVentas::ctrValidarClienteRecurrente($taRnc_Cliente, $Rnc_Cliente, $Rnc_Empresa_Venta);
	echo json_encode($respuesta);

}


}/*CIERRA LA CLASE AJAX USUARIOS*/

/***********************
	EDITAR USUARIOS
***********************/
if(isset($_POST["idVenta"])){ 
	
	$modaleditar = new AjaxVentas();
	$modaleditar -> idVenta = $_POST["idVenta"];
	$modaleditar -> ajaxEditarVentas();

}
if(isset($_POST["validarCliente"])){
	$valCliente = new AjaxVentas();
	$valCliente -> validarCliente = $_POST["validarCliente"];
	$valCliente -> RncEmpresaCliente = $_POST["RncEmpresaCliente"];
	$valCliente -> ajaxvalidarClienteRecurrente();




}
