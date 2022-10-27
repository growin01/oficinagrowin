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

	

	




}
/********************************
			EDITAR CATEGORIAS
**********************************/

if(isset($_POST["idBanco"])){

$ModaleditarBanco = new AjaxBanco();
$ModaleditarBanco -> idBanco = $_POST["idBanco"];
$ModaleditarBanco -> ajaxModalEditarBanco();

}
