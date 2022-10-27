<?php
require_once "../controladores/empresas.controlador.php";
require_once "../modelos/empresas.modelo.php";

class Ajaxempresas{



public $nuevoRncEmpresa;


public function ajaxRepetidaEmpresa(){

$taRnc_Empresa = "Rnc_Empresa";
$Rnc_Empresa = $this->nuevoRncEmpresa;
$tabla = "empresas";

	

$respuesta = ModeloEmpresas::MdlRepetidaEmpresa($tabla, $taRnc_Empresa, $Rnc_Empresa);
	echo json_encode($respuesta);


}/*empresa repetida*/
public $RncEmpresaDGII;


public function ajaxRncEmpresaDGII(){

$taRnc_Empresa = "Rnc_DGII";
$Rnc_Empresa = $this->RncEmpresaDGII;
$tabla = "dgii_rnc";

	

$respuesta = ModeloEmpresas::MdlRepetidaEmpresa($tabla, $taRnc_Empresa, $Rnc_Empresa);
	echo json_encode($respuesta);


}/*empresa dgii*/
public $RncEmpresa;


public function ajaxRncEmpresa(){

$taRnc_Empresa = "Rnc_Empresa";
$Rnc_Empresa = $this->RncEmpresa;
$tabla = "empresas";

	

$respuesta = ModeloEmpresas::MdlRepetidaEmpresa($tabla, $taRnc_Empresa, $Rnc_Empresa);
	echo json_encode($respuesta);


}/*empresa dgii*/
public $RncEmpresaDGIIGrowin;


public function ajaxRncEmpresaDGIIGrowin(){

$taRnc_Empresa = "Rnc_Growin_DGII";
$Rnc_Empresa = $this->RncEmpresaDGIIGrowin;
$tabla = "growin_dgii";

	

$respuesta = ModeloEmpresas::MdlRepetidaEmpresa($tabla, $taRnc_Empresa, $Rnc_Empresa);
	echo json_encode($respuesta);


}/*empresa dgii*/


/**************************************
	ACTIVAR Y DESACTIVAR USUARIOS
****************************************/

public $idcontrolTSS;
public $estadoTSS; 

public function ajaxcontrolTSS(){

	$tabla = "control_empresas";
	$tacontrol_Empresa = "TSS_Empresa";
	$id = "id";

	$idcontrol = $this->idcontrolTSS;
	$valorestado = $this->estadoTSS;


	$respuesta = ModeloEmpresas::MdlActualizarEstadosControl($tabla, $tacontrol_Empresa, $id, $idcontrol, $valorestado);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/




public $idcontrolIR3;
public $estadoIR3; 

public function ajaxcontrolIR3(){

	$tabla = "control_empresas";
	$tacontrol_Empresa = "IR3_Empresa";
	$id = "id";

	$idcontrol = $this->idcontrolIR3;
	$valorestado = $this->estadoIR3;


	$respuesta = ModeloEmpresas::MdlActualizarEstadosControl($tabla, $tacontrol_Empresa, $id, $idcontrol, $valorestado);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


public $RncEmpresa606;
public $Periodoreporte606; 


public function ajaxcontrol606(){

	$tabla = "control_empresas";
	$taRnc_Empresa = "Rnc_Empresa";
	$ValorRnc_Empresa = $this->RncEmpresa606;
	$taPeriodo_Empresa = "Periodo_Empresa";
	$ValorPeriodo_Empresa = $this->Periodoreporte606;
	$ta606_Empresa = "606_Empresa";
	$Valor606_Empresa = "2";



	$respuesta = ModeloEmpresas::MdlActualizarEstadosControl606607($tabla, $taRnc_Empresa, $ValorRnc_Empresa, $taPeriodo_Empresa, $ValorPeriodo_Empresa, $ta606_Empresa, $Valor606_Empresa);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

public $RncEmpresa607;
public $Periodoreporte607; 


public function ajaxcontrol607(){

	$tabla = "control_empresas";
	$taRnc_Empresa = "Rnc_Empresa";
	$ValorRnc_Empresa = $this->RncEmpresa607;
	$taPeriodo_Empresa = "Periodo_Empresa";
	$ValorPeriodo_Empresa = $this->Periodoreporte607;
	$ta606_Empresa = "607_Empresa";
	$Valor606_Empresa = "2";



	$respuesta = ModeloEmpresas::MdlActualizarEstadosControl606607($tabla, $taRnc_Empresa, $ValorRnc_Empresa, $taPeriodo_Empresa, $ValorPeriodo_Empresa, $ta606_Empresa, $Valor606_Empresa);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


public $RncEmpresaControl;
public $PeriodoControl; 


public function ajaxcontrolITBIS(){

	$tabla = "control_empresas";
	$taRnc_Empresa = "Rnc_Empresa";
	$ValorRnc_Empresa = $this->RncEmpresaControl;
	$taPeriodo_Empresa = "Periodo_Empresa";
	$ValorPeriodo_Empresa = $this->PeriodoControl;
	$ta606_Empresa = "ITBIS_Empresa";
	$Valor606_Empresa = "1";



	$respuesta = ModeloEmpresas::MdlActualizarEstadosControl606607($tabla, $taRnc_Empresa, $ValorRnc_Empresa, $taPeriodo_Empresa, $ValorPeriodo_Empresa, $ta606_Empresa, $Valor606_Empresa);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/
/***********************
	EDITAR USUARIOS
***********************/
public $idEmpleado;

public function ajaxModalEmpleado(){
	$id = "id";
	$idEmpleado = $this->idEmpleado;

	$respuesta = ControladorEmpresas::ctrModalEditarEmpleado($id, $idEmpleado);
	echo json_encode($respuesta);


}/*CIERRA FUNCION EDITAR USUARIO*/


}/*CIERRE DE CLASES*/




/****************************
Validar RNC Y NCF REPETIDOS
*****************************/
if(isset($_POST["nuevoRncEmpresa"])){ 
	
	$repetidosEmpresa = new Ajaxempresas();
	$repetidosEmpresa -> nuevoRncEmpresa = $_POST["nuevoRncEmpresa"];
	$repetidosEmpresa -> ajaxRepetidaEmpresa();

}
if(isset($_POST["RncEmpresaDGII"])){ 
	
	$RncEmpresaDGII = new Ajaxempresas();
	$RncEmpresaDGII -> RncEmpresaDGII = $_POST["RncEmpresaDGII"];
	$RncEmpresaDGII -> ajaxRncEmpresaDGII();

}
if(isset($_POST["RncEmpresa"])){ 
	
	$RncEmpresa = new Ajaxempresas();
	$RncEmpresa -> RncEmpresa = $_POST["RncEmpresa"];
	$RncEmpresa -> ajaxRncEmpresa();

}
if(isset($_POST["RncEmpresaDGIIGrowin"])){ 
	
	$RncEmpresaDGIIGrowin = new Ajaxempresas();
	$RncEmpresaDGIIGrowin -> RncEmpresaDGIIGrowin = $_POST["RncEmpresaDGIIGrowin"];
	$RncEmpresaDGIIGrowin -> ajaxRncEmpresaDGIIGrowin();

}
/*******************************
ACTIVAR O DESACTIVAR  USUARIOS
**********************************/

if(isset($_POST["idcontrolTSS"])){ 
	
	$controlTSS = new Ajaxempresas();
	$controlTSS -> idcontrolTSS = $_POST["idcontrolTSS"];
	$controlTSS -> estadoTSS = $_POST["estadoTSS"];
	$controlTSS -> ajaxcontrolTSS();

}
if(isset($_POST["idcontrolIR3"])){ 
	
	$controlIR3 = new Ajaxempresas();
	$controlIR3 -> idcontrolIR3 = $_POST["idcontrolIR3"];
	$controlIR3 -> estadoIR3 = $_POST["estadoIR3"];
	$controlIR3 -> ajaxcontrolIR3();

}
if(isset($_POST["Periodoreporte606"])){ 
	
	$control606 = new Ajaxempresas();
	$control606 -> RncEmpresa606 = $_POST["RncEmpresa606"];
	$control606 -> Periodoreporte606 = $_POST["Periodoreporte606"];
	$control606 -> ajaxcontrol606();

}
if(isset($_POST["Periodoreporte607"])){ 
	
	$control607 = new Ajaxempresas();
	$control607 -> RncEmpresa607 = $_POST["RncEmpresa607"];
	$control607 -> Periodoreporte607 = $_POST["Periodoreporte607"];
	$control607 -> ajaxcontrol607();

}

if(isset($_POST["RncEmpresaControl"])){ 
	
	$controlITBIS = new Ajaxempresas();
	$controlITBIS -> RncEmpresaControl = $_POST["RncEmpresaControl"];
	$controlITBIS -> PeriodoControl = $_POST["PeriodoControl"];
	$controlITBIS -> ajaxcontrolITBIS();

}
if(isset($_POST["idEmpleado"])){ 
	
	$Empleado = new Ajaxempresas();
	$Empleado -> idEmpleado = $_POST["idEmpleado"];
	$Empleado -> ajaxModalEmpleado();

}
