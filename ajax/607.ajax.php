
<?php
require_once "../controladores/607.controlador.php";
require_once "../modelos/607.modelo.php";

class Ajax607{

/***********************
	EDITAR USUARIOS
***********************/
public $id_607;

public function ajaxRetener607(){
	$id_607 = "id";
	$Valor_id607 = $this->id_607;
	

	$respuesta = Controlador607::ctrMostrar607Retener($id_607, $Valor_id607);
	echo json_encode($respuesta);


}/*rETENER EN 606*/




public $Rnc_Factura_607;
public $NCF_607;
public $RncEmpresa607;

public function ajaxRepetidosNCF607(){

$taRnc_Empresa_607 = "Rnc_Empresa_607";
$Rnc_Empresa_607 = $this->RncEmpresa607;
$taRnc_Factura_607 = "Rnc_Factura_607";
$Rnc_Factura_607 = $this->Rnc_Factura_607;
$taNCF_607 = "NCF_607";
$NCF_607 = $this->NCF_607;
$tabla = "607_empresas";

	

$respuesta = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);
	echo json_encode($respuesta);


}/*rETENER EN 606*/
public $Periodoreporte607;
public $RncEmpresa607Rango;
	
public function	 ajaxtxt607(){

$taRncEmpresa607 = "Rnc_Empresa_607";
$Rnc_Empresa_607 = $this->RncEmpresa607Rango;
$taFecha_AnoMes_607 = "Fecha_comprobante_AnoMes_607";
$Fecha_AnoMes_607 = $this->Periodoreporte607;
$tabla = "607_empresas";
$taFecha_Retencion_AnoMes_607 = "Fecha_Retencion_AnoMes_607";

$respuesta = Modelo607::mdlRangoFecha607($tabla, $taRncEmpresa607, $Rnc_Empresa_607, $taFecha_AnoMes_607, $Fecha_AnoMes_607, $taFecha_Retencion_AnoMes_607);
header("Content-Type: application/json");
echo json_encode($respuesta);





}


}/*CIERRE DE CLASES*/



/***********************
	EDITAR USUARIOS
***********************/
if(isset($_POST["id_607"])){ 
	
	$retener607 = new Ajax607();
	$retener607 -> id_607 = $_POST["id_607"];
	
	$retener607 -> ajaxRetener607();

}
/****************************
Validar RNC Y NCF REPETIDOS
*****************************/
if(isset($_POST["Rnc_Factura_607"])){ 
	
	$repetidos607 = new Ajax607();
	$repetidos607 -> Rnc_Factura_607 = $_POST["Rnc_Factura_607"];
	$repetidos607 -> NCF_607 = $_POST["NCF_607"];
	$repetidos607 -> RncEmpresa607 = $_POST["RncEmpresa607"];
	$repetidos607 -> ajaxRepetidosNCF607();

}
if(isset($_POST["RncEmpresa607Rango"])){ 
	
	$txt607 = new Ajax607();
	$txt607 -> Periodoreporte607 = $_POST["Periodoreporte607"];
	$txt607 -> RncEmpresa607Rango = $_POST["RncEmpresa607Rango"];
	$txt607 -> ajaxtxt607();

}













 