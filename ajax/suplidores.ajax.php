<?php 

require_once "../controladores/suplidores.controlador.php";
require_once "../modelos/suplidores.modelo.php";

class AjaxSuplidores{

	/**************************
		EDITAR SUPLIDORES
	***************************/
	public $idsuplidor;
	public $RncEmpresasuplidoreditar;

	public function ajaxEditarSuplidores(){

		$id_Suplidor = "id";
		$Valor_idSuplidor = $this->idsuplidor;
		$Rnc_Empresa_Suplidor = $this->RncEmpresasuplidoreditar;

		$respuesta = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

		echo json_encode($respuesta);


	}


/**************************
		VALIDAR SUPLIDORES
		***************************/
	public $RncSuplidor;
	public $RncEmpresasuplidorvalidar;

	public function ajaxvalidarSuplidores(){

		$id_Suplidor = "Documento_Suplidor";
		$Valor_idSuplidor = $this->RncSuplidor;
		$Rnc_Empresa_Suplidor = $this->RncEmpresasuplidorvalidar;

		$respuesta = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

		echo json_encode($respuesta);


	}


}

/*************************
	EDITAR SUPLIDOR
**************************/

if(isset($_POST["idsuplidor"])){
	$EditarSuplidor = new AjaxSuplidores();
	$EditarSuplidor -> idsuplidor = $_POST["idsuplidor"];
	$EditarSuplidor -> RncEmpresasuplidoreditar = $_POST["RncEmpresasuplidoreditar"];
	$EditarSuplidor -> ajaxEditarSuplidores();

}

/**********************
		VALIDAR RNC
***********************/
if(isset($_POST["RncSuplidor"])){
	$validarSuplidor = new AjaxSuplidores();
	$validarSuplidor -> RncSuplidor  = $_POST["RncSuplidor"];
	$validarSuplidor -> RncEmpresasuplidorvalidar = $_POST["RncEmpresasuplidorvalidar"];
	$validarSuplidor -> ajaxvalidarSuplidores();


}

/*******************
********************/










