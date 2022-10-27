<?php
require_once "../controladores/606.controlador.php";
require_once "../modelos/606.modelo.php";

class Ajax606{

/***********************
	EDITAR USUARIOS
***********************/
public $id_606;

public function ajaxRetener606(){
	$id_606 = "id";
	$Valor_id606 = $this->id_606;
	

	$respuesta = Controlador606::ctrMostrar606Retener($id_606, $Valor_id606);
	echo json_encode($respuesta);


}/*rETENER EN 606*/




public $Rnc_Factura_606;
public $NCF_606;
public $RncEmpresa606;

public function ajaxRepetidosNCF606(){

$taRnc_Empresa_606 = "Rnc_Empresa_606";
$Rnc_Empresa_606 = $this->RncEmpresa606;
$taRnc_Factura_606 = "Rnc_Factura_606";
$Rnc_Factura_606 = $this->Rnc_Factura_606;
$taNCF_606 = "NCF_606";
$NCF_606 = $this->NCF_606;
$tabla = "606_empresas";

	

$respuesta = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);
	echo json_encode($respuesta);


}/*rETENER EN 606*/

public $Periodoreporte606;
public $RncEmpresa606Rango;
	
public function	ajaxtxt606(){


$taRncEmpresa606 = "Rnc_Empresa_606";
$Rnc_Empresa_606 = $this->RncEmpresa606Rango;
$taFecha_AnoMes_606 = "Fecha_AnoMes_606";
$Fecha_AnoMes_606 = $this->Periodoreporte606;
$tabla = "606_empresas";
$taFecha_Ret_AnoMes_606 = "Fecha_Ret_AnoMes_606";



$respuesta = Modelo606::mdlRangoFecha606($tabla, $taRncEmpresa606, $Rnc_Empresa_606, $taFecha_AnoMes_606, $Fecha_AnoMes_606, $taFecha_Ret_AnoMes_606);
header("Content-Type: application/json");
echo json_encode($respuesta);

}



}/*CIERRE DE CLASES*/



/***********************
	EDITAR USUARIOS
***********************/
if(isset($_POST["id_606"])){ 
	
	$retener606 = new Ajax606();
	$retener606 -> id_606 = $_POST["id_606"];
	$retener606 -> ajaxRetener606();

}
/****************************
Validar RNC Y NCF REPETIDOS
*****************************/
if(isset($_POST["Rnc_Factura_606"])){ 
	
	$repetidos606 = new Ajax606();
	$repetidos606 -> Rnc_Factura_606 = $_POST["Rnc_Factura_606"];
	$repetidos606 -> NCF_606 = $_POST["NCF_606"];
	$repetidos606 -> RncEmpresa606 = $_POST["RncEmpresa606"];
	$repetidos606 -> ajaxRepetidosNCF606();

}



if(isset($_POST["RncEmpresa606Rango"])){ 
	
	$txt606 = new Ajax606();
	$txt606 -> Periodoreporte606 = $_POST["Periodoreporte606"];
	$txt606 -> RncEmpresa606Rango = $_POST["RncEmpresa606Rango"];
	$txt606 -> ajaxtxt606();

}













 