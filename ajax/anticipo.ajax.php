
<?php 

require_once "../controladores/anticipo.controlador.php";
require_once "../modelos/anticipo.modelo.php";

class AjaxAnticipo{



	/********************************
			EDITAR CATEGORIAS
	**********************************/
	public $idRendido;

	public function ajaxAnticipoRendido(){
		$tabla = "rendirfondos_empresas";

		$id = "id";
		$valorid = $this->idRendido;

		$respuesta = ModeloAnticipo::mdlEditarAnticipo($tabla, $id, $valorid);

		
		echo json_encode($respuesta);


	}/*CIERRA EDITAR CATEGORIAS*/

public $idFondo;
public $estadoFondo; 

public function ajaxActivarFondo(){

	$tabla = "banco_empresas";
	$Estado = "Estado";
	$id = "id";

	$idFondo = $this->idFondo;
	$valorid = $this->estadoFondo;


	$respuesta = ModeloAnticipo::MdlActualizarFondo($tabla, $Estado, $id, $idFondo, $valorid);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


public $idRendirFondo;
public $estadoRendirFondo; 

public function ajaxActivarRendirFondo(){

	$tabla = "rendirfondos_empresas";
	$Estado = "Estado";
	$id = "id";

	$idFondo = $this->idRendirFondo;
	$valorid = $this->estadoRendirFondo;


	$respuesta = ModeloAnticipo::MdlActualizarFondo($tabla, $Estado, $id, $idFondo, $valorid);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/

public $Rnc_Empresa_LD;
public $Extraer_NAsiento;
public $NAsiento;

public function ajaxEditarOtorgarAnticipo(){

	$tabla = "librodiario_empresas";
	$taRnc_Empresa_LD = "Rnc_Empresa_LD";
	$taExtraer_NAsiento = "Extraer_NAsiento";
	$taNAsiento = "NAsiento";

	$Rnc_Empresa_LD = $this->Rnc_Empresa_LD;
	$Extraer_NAsiento = $this->Extraer_NAsiento;
	$NAsiento = $this->NAsiento;


	
$respuesta = ModeloAnticipo::mdlEditarOtorgarAnticipo($tabla, $taRnc_Empresa_LD, $taExtraer_NAsiento, $taNAsiento, $Rnc_Empresa_LD, $Extraer_NAsiento, $NAsiento);
echo json_encode($respuesta);



}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


}/*CIERRA LA CLASE AJAX USUARIOS*/




/********************************
			EDITAR CATEGORIAS
**********************************/

if(isset($_POST["idRendido"])){

$idRendido = new AjaxAnticipo();
$idRendido ->idRendido = $_POST["idRendido"];
$idRendido -> ajaxAnticipoRendido();

}

/*******************************
ACTIVAR O DESACTIVAR  USUARIOS
**********************************/

if(isset($_POST["idFondo"])){ 
	
	$activarFondo = new AjaxAnticipo();
	$activarFondo -> idFondo = $_POST["idFondo"];
	$activarFondo -> estadoFondo = $_POST["estadoFondo"];
	$activarFondo -> ajaxActivarFondo();

}

if(isset($_POST["idRendirFondo"])){ 
	
	$activarRendirFondo = new AjaxAnticipo();
	$activarRendirFondo -> idRendirFondo = $_POST["idRendirFondo"];
	$activarRendirFondo -> estadoRendirFondo = $_POST["estadoRendirFondo"];
	$activarRendirFondo -> ajaxActivarRendirFondo();

}	
	
if(isset($_POST["Rnc_Empresa_LD"]) && isset($_POST["Extraer_NAsiento"])){ 
	
$EditarOtorgarAnticipo = new AjaxAnticipo();
$EditarOtorgarAnticipo -> Rnc_Empresa_LD = $_POST["Rnc_Empresa_LD"];
$EditarOtorgarAnticipo -> Extraer_NAsiento = $_POST["Extraer_NAsiento"];
$EditarOtorgarAnticipo -> NAsiento = $_POST["NAsiento"];
$EditarOtorgarAnticipo -> ajaxEditarOtorgarAnticipo();

}