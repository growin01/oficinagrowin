<?php
require_once "../controladores/cxp.controlador.php";
require_once "../modelos/cxp.modelo.php";

class AjaxCXP{




public $id_CXP;


public function ajaxEditarPagoCXP(){

	$tabla = "cxp_empresas";
	 $id = "id";
	$valoridCXP = $this->id_CXP;
	

	$respuesta = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXP);
	echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

public $id_reciboCXP;
public function ajaxVerReciboPagoCXP(){

	$tabla = "recibocxp_empresas";
	$id = "id";
	$valoridCXP = $this->id_reciboCXP;
	

	$respuesta = ModeloCXP::mdlMostrarRecibirPago($tabla, $id, $valoridCXP);
	echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


	public $CodigoCompra;
	public $Rnc_Empresa_cxp;
	public $id_Suplidor;
	public $Rnc_Suplidor;
	public $NCF_cxp;
	public $Tipo;

public function ajaxDetallePagos(){

	$tabla = "pagocxp_empresas";
	$taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
	$taCodigoCompra = "CodigoCompra";
	$taid_Suplidor = "id_Suplidor";
	$taRnc_Suplidor = "Rnc_Suplidor";
	$taNCF_cxp = "NCF_cxp";
	$taTipo = "Tipo";

	$CodigoCompra = $this->CodigoCompra;
	$Rnc_Empresa_cxp = $this->Rnc_Empresa_cxp;
	$id_Suplidor = $this->id_Suplidor;
	$Rnc_Suplidor = $this->Rnc_Suplidor;
	$NCF_cxp = $this->NCF_cxp;
	$Tipo = $this->Tipo;
	

	$respuesta = ModeloCXP::mdlMostarPagosCXP($tabla, $Rnc_Empresa_cxp, $taRnc_Empresa_cxp, $CodigoCompra, $taCodigoCompra, $id_Suplidor, $taid_Suplidor, $Rnc_Suplidor, $taRnc_Suplidor, $NCF_cxp, $taNCF_cxp, $taTipo, $Tipo);
	echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

public $Rnc_Empresa_606;
public $Rnc_Factura_606;
public $NCF_606;
 

public function ajaxValidarFactura606(){

	$tabla = "606_empresas";
	
	$RncEmpresa606 = "Rnc_Empresa_606";
	$ValorRncEmpresa606 = $this->Rnc_Empresa_606;

	$Rnc_Factura_606 = "Rnc_Factura_606";
	$ValorRnc_Factura_606 = $this->Rnc_Factura_606;

	$NCF_606 = "NCF_606";
	$ValorNCF_606= $this->NCF_606;
	

	$respuesta = ModeloCXP::MdlValidarFactura606($tabla, $RncEmpresa606, $ValorRncEmpresa606, $Rnc_Factura_606, $ValorRnc_Factura_606, $NCF_606, $ValorNCF_606);
	echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


public $Estatus;
public $aprobaridCXP; 

public function ajaxAprobarCXP(){

	$tabla = "cxp_empresas";
	$Estatus = "Estatus";
	$id = "id";

	$valorEstatus = $this->Estatus;
	$valorid = $this->aprobaridCXP;


	$respuesta = ModeloCXP::MdlActualizarEstatus($tabla, $Estatus, $id, $valorEstatus, $valorid);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

}
if(isset($_POST["id_CXP"])){ 
	
	$EditarPagoCXP = new AjaxCXP();
	$EditarPagoCXP -> id_CXP = $_POST["id_CXP"];
	$EditarPagoCXP -> ajaxEditarPagoCXP();

}
if(isset($_POST["id_reciboCXP"])){ 
	
	$VerReciboPagoCXP = new AjaxCXP();
	$VerReciboPagoCXP -> id_reciboCXP = $_POST["id_reciboCXP"];
	$VerReciboPagoCXP -> ajaxVerReciboPagoCXP();

}

if(isset($_POST["CodigoCompra"])){ 
	
	$EditarPagoCXP = new AjaxCXP();
	$EditarPagoCXP -> CodigoCompra = $_POST["CodigoCompra"];
	$EditarPagoCXP -> Rnc_Empresa_cxp = $_POST["Rnc_Empresa_cxp"];
	$EditarPagoCXP -> id_Suplidor = $_POST["id_Suplidor"];
	$EditarPagoCXP -> Rnc_Suplidor = $_POST["Rnc_Suplidor"];
	$EditarPagoCXP -> NCF_cxp = $_POST["NCF_cxp"];
	$EditarPagoCXP -> Tipo = $_POST["Tipo"];
	$EditarPagoCXP -> ajaxDetallePagos();

}
 
if(isset($_POST["Rnc_Empresa_606"])){ 
	
	$ValidarFactura = new AjaxCXP();
	$ValidarFactura -> Rnc_Empresa_606 = $_POST["Rnc_Empresa_606"];
	$ValidarFactura -> Rnc_Factura_606 = $_POST["Rnc_Factura_606"];
	$ValidarFactura -> NCF_606 = $_POST["NCF_606"];
	$ValidarFactura -> ajaxValidarFactura606();

}
    
    
 if(isset($_POST["Estatus"])){ 
	
	$aprobarCXP = new AjaxCXP();
	$aprobarCXP -> Estatus = $_POST["Estatus"];
	$aprobarCXP -> aprobaridCXP= $_POST["aprobaridCXP"];
	$aprobarCXP -> ajaxAprobarCXP();

}