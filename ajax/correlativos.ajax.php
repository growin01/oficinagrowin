<?php
require_once "../controladores/correlativos.controlador.php";
require_once "../modelos/correlativos.modelo.php";

class AjaxCorrelativos{

/***********************
	EDITAR USUARIOS
***********************/
public $idCorrelativo;

public function ajaxEditarCorrelativos(){
	$id = "id";
	$idCorrelativo = $this->idCorrelativo;

	$respuesta = ControladorCorrelativos::ctrModalEditarCorrelativos($id, $idCorrelativo);
	echo json_encode($respuesta);


}/*CIERRA FUNCION EDITAR USUARIO*/
public $RncEmpresaVentas;
public $NCFFactura;
public function ajaxCorrelativosFac(){


$RncEmpresaVentas = $this->RncEmpresaVentas;
$NCFFactura = $this->NCFFactura;

$respuesta = ControladorCorrelativos::ctrCorrelativosFac($RncEmpresaVentas, $NCFFactura);
echo json_encode($respuesta);

} 
public $RncEmpresaVentasNo;
public $NCFFacturaNo;
public function ajaxCorrelativosFacNo(){


$RncEmpresaVentas = $this->RncEmpresaVentasNo;
$NCFFactura = $this->NCFFacturaNo;

$respuesta = ControladorCorrelativos::ctrCorrelativosFacNo($RncEmpresaVentas, $NCFFactura);
echo json_encode($respuesta);

} 





}/*CIERRA LA CLASE AJAX USUARIOS*/

/***********************
	EDITAR USUARIOS
***********************/
if(isset($_POST["idCorrelativo"])){ 
	
	$modaleditarCorrelativos = new AjaxCorrelativos();
	$modaleditarCorrelativos -> idCorrelativo = $_POST["idCorrelativo"];
	$modaleditarCorrelativos -> ajaxEditarCorrelativos();

}

if(isset($_POST["NCFFactura"])){ 
	
	$CorrelativosFac = new AjaxCorrelativos();
	$CorrelativosFac -> NCFFactura = $_POST["NCFFactura"];
	$CorrelativosFac -> RncEmpresaVentas = $_POST["RncEmpresaVentas"];
	$CorrelativosFac -> ajaxCorrelativosFac();

}
if(isset($_POST["NCFFacturaNo"])){ 
	
	$CorrelativosFacNo = new AjaxCorrelativos();
	$CorrelativosFacNo -> NCFFacturaNo = $_POST["NCFFacturaNo"];
	$CorrelativosFacNo -> RncEmpresaVentasNo = $_POST["RncEmpresaVentasNo"];
	$CorrelativosFacNo -> ajaxCorrelativosFacNo();

}

	

