
<?php 

require_once "../controladores/banco.controlador.php";
require_once "../modelos/banco.modelo.php";

class AjaxBanco{



	/********************************
			EDITAR CATEGORIAS
	**********************************/
	public $idBanco;

	public function ajaxModalEditarBanco(){

		$id = "id";
		$valorid = $this->idBanco;

		$respuesta = ControladorBanco::ctrModalEditarBanco($id, $valorid);
		
		echo json_encode($respuesta);


	}/*CIERRA EDITAR CATEGORIAS*/

	public $RncEmpresaBanco;
	public $idgrupo;
	public $idcategoria;
	public function ajaxplanbanco(){

		$Rnc_Empresa_Cuentas = $this->RncEmpresaBanco;
		$id_grupo = $this->idgrupo;
		$id_categoria = $this->idcategoria;

 		$respuesta = ControladorBanco::ctrplanBanco($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria);
 		echo json_encode($respuesta);


	}



	public $RncEmpresaTrans;
	
	public function ajaxbancotrans(){

	$Rnc_Empresa_Banco = $this->RncEmpresaTrans;
	$tabla = "banco_empresas";
    $taRnc_Empresa_Banco = "Rnc_Empresa_Banco";
    
    $respuesta = ModeloBanco::mdlMostrarBanco($tabla, $taRnc_Empresa_Banco, $Rnc_Empresa_Banco);
		
 	echo json_encode($respuesta);


	}

public $iddesconciliar;
public $desconciliar; 

public function ajaxDesconciliar(){

	$tabla = "librodiario_empresas";
	$Estado_Banco = "Estado_Banco";
	$id = "id";

	$iddesconciliar = $this->iddesconciliar;
	$valorEstado = $this->desconciliar;


	$respuesta = ModeloBanco::MdlDesconciliar($tabla, $Estado_Banco, $id, $iddesconciliar, $valorEstado);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


}
/********************************
			EDITAR CATEGORIAS
**********************************/

if(isset($_POST["idBanco"])){

$ModaleditarBanco = new AjaxBanco();
$ModaleditarBanco -> idBanco = $_POST["idBanco"];
$ModaleditarBanco -> ajaxModalEditarBanco();

}
if(isset($_POST["RncEmpresaBanco"])){

$planBanco = new AjaxBanco();
$planBanco -> RncEmpresaBanco = $_POST["RncEmpresaBanco"];
$planBanco -> idgrupo = $_POST["idgrupo"];
$planBanco -> idcategoria = $_POST["idcategoria"];
$planBanco -> ajaxplanbanco();

}
if(isset($_POST["RncEmpresaTrans"])){

$Banco = new AjaxBanco();
$Banco -> RncEmpresaTrans = $_POST["RncEmpresaTrans"];
$Banco -> ajaxbancotrans();

}

if(isset($_POST["iddesconciliar"])){ 
	
	$desconciliar = new AjaxBanco();
	$desconciliar -> iddesconciliar = $_POST["iddesconciliar"];
	$desconciliar -> desconciliar = $_POST["desconciliar"];
	$desconciliar -> ajaxDesconciliar();

}






