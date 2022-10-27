
<?php
require_once "../controladores/608.controlador.php";
require_once "../modelos/608.modelo.php";

class Ajax608{

public $Periodoreporte608;
public $RncEmpresa608Rango;
	
public function	 ajaxtxt608(){

$taRncEmpresa608 = "Rnc_Empresa_608";
$Rnc_Empresa_608 = $this->RncEmpresa608Rango;
$taFecha_AnoMes_608 = "Fecha_comprobante_AnoMes_608";
$Fecha_AnoMes_608 = $this->Periodoreporte608;
$tabla = "608_empresas";


$respuesta = Modelo608::mdlRangoFecha608($tabla, $taRncEmpresa608, $Rnc_Empresa_608, $taFecha_AnoMes_608, $Fecha_AnoMes_608);
header("Content-Type: application/json");
echo json_encode($respuesta);





}

public $id608;
public $estatus608; 

public function ajaxestatus608(){

	$tabla = "608_empresas";
	$Estatus = "Estatus";
	$id = "id";

	$id608 = $this->id608;
	$valorid = $this->estatus608;


	$respuesta = Modelo608::Mdlestatus608($tabla, $Estatus, $id, $id608, $valorid);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

public $id_608;

public function ajaxMostrar608id(){
	$tabla = "608_empresas";
	$id_608 = "id";
	$Valor_id608 = $this->id_608;
	

	$respuesta = Modelo608::mdlMostrar608id($tabla, $id_608, $Valor_id608);
	echo json_encode($respuesta);


}/*rETENER EN 606*/





}/*CIERRE DE CLASES*/



if(isset($_POST["RncEmpresa608Rango"])){ 
	
	$txt608 = new Ajax608();
	$txt608 -> Periodoreporte608 = $_POST["Periodoreporte608"];
	$txt608 -> RncEmpresa608Rango = $_POST["RncEmpresa608Rango"];
	$txt608 -> ajaxtxt608();

}

if(isset($_POST["id608"])){ 
	
	$activarFondo = new Ajax608();
	$activarFondo -> id608 = $_POST["id608"];
	$activarFondo -> estatus608 = $_POST["estatus608"];
	$activarFondo -> ajaxestatus608();

}

if(isset($_POST["id_608"])){ 
	
	$verfactura607 = new Ajax608();
	$verfactura607 -> id_608 = $_POST["id_608"];
	$verfactura607 -> ajaxMostrar608id();

}








 