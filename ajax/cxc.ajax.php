<?php
require_once "../controladores/cxc.controlador.php";
require_once "../modelos/cxc.modelo.php";

class AjaxCXC{


public $id_CXC;


public function ajaxEditarPagoCXC(){

	$tabla = "cxc_empresas";
	 $id = "id";
	$valoridCXC = $this->id_CXC;
	

	$respuesta = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);
	echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/
public $id_reciboCXC;
public function ajaxVerReciboPagoCXC(){

	$tabla = "recibocxc_empresas";
	$id = "id";
	$valoridCXC = $this->id_reciboCXC;
	

	$respuesta = ModeloCXC::mdlMostrarRecibirPago($tabla, $id, $valoridCXC);
	echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

public $Rnc_Empresa_607;
public $Rnc_Factura_607;
public $NCF_607;
 

public function ajaxValidarFactura(){

	$tabla = "607_empresas";
	
	$RncEmpresa607 = "Rnc_Empresa_607";
	$ValorRncEmpresa607 = $this->Rnc_Empresa_607;

	$Rnc_Factura_607 = "Rnc_Factura_607";
	$ValorRnc_Factura_607 = $this->Rnc_Factura_607;

	$NCF_607 = "NCF_607";
	$ValorNCF_607= $this->NCF_607;
	

	$respuesta = ModeloCXC::MdlValidarFactura($tabla, $RncEmpresa607, $ValorRncEmpresa607, $Rnc_Factura_607, $ValorRnc_Factura_607, $NCF_607, $ValorNCF_607);
	echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


	public $CodigoVenta;
	public $Rnc_Empresa_cxc;
	public $id_Cliente;
	public $Rnc_Cliente;
	public $NCF_cxc;
	
public function ajaxDetalleCobros(){

	$tabla = "pagocxc_empresas";
	$taRnc_Empresa_cxc = "Rnc_Empresa_cxc";
	$taCodigoVenta = "CodigoVenta";
	$taid_Cliente = "id_Cliente";
	$taRnc_Cliente = "Rnc_Cliente";
	$taNCF_cxc = "NCF_cxc";
	
	$CodigoVenta = $this->CodigoVenta;
	$Rnc_Empresa_cxc = $this->Rnc_Empresa_cxc;
	$id_Cliente = $this->id_Cliente;
	$Rnc_Cliente = $this->Rnc_Cliente;
	$NCF_cxc = $this->NCF_cxc;
	
	

	$respuesta = ModeloCXC::mdlMostarCobrosCXCver($tabla, $Rnc_Empresa_cxc, $taRnc_Empresa_cxc, $CodigoVenta, $taCodigoVenta, $id_Cliente, $taid_Cliente, $Rnc_Cliente, $taRnc_Cliente, $NCF_cxc, $taNCF_cxc);
	echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/
}

if(isset($_POST["id_CXC"])){ 
	
	$EditarPagoCXC = new AjaxCXC();
	$EditarPagoCXC -> id_CXC = $_POST["id_CXC"];
	$EditarPagoCXC -> ajaxEditarPagoCXC();

}
if(isset($_POST["Rnc_Empresa_607"])){ 
	
	$ValidarFactura = new AjaxCXC();
	$ValidarFactura -> Rnc_Empresa_607 = $_POST["Rnc_Empresa_607"];
	$ValidarFactura -> Rnc_Factura_607 = $_POST["Rnc_Factura_607"];
	$ValidarFactura -> NCF_607 = $_POST["NCF_607"];
	$ValidarFactura -> ajaxValidarFactura();

}
if(isset($_POST["CodigoVenta"])){ 
	
	$verPagoCXC = new AjaxCXC();
	$verPagoCXC -> Rnc_Empresa_cxc = $_POST["Rnc_Empresa_cxc"];
	$verPagoCXC -> CodigoVenta = $_POST["CodigoVenta"];
	$verPagoCXC -> id_Cliente = $_POST["id_Cliente"];
	$verPagoCXC -> Rnc_Cliente = $_POST["Rnc_Cliente"];
	$verPagoCXC -> NCF_cxc = $_POST["NCF_cxc"];
	$verPagoCXC -> ajaxDetalleCobros();

}
if(isset($_POST["id_reciboCXC"])){ 
	
	$VerReciboPagoCXC = new AjaxCXC();
	$VerReciboPagoCXC -> id_reciboCXC = $_POST["id_reciboCXC"];
	$VerReciboPagoCXC -> ajaxVerReciboPagoCXC();

}
 