
<?php 

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";



class AjaxCategorias{



	/********************************
			EDITAR CATEGORIAS
	**********************************/
	public $idCategoria;

	public function ajaxModalEditarCategorias(){

		$id = "id";
		$valorid = $this->idCategoria;

		$respuesta = ControladorCategorias::ctrModalEditarCategorias($id, $valorid);
		
		echo json_encode($respuesta);


	}/*CIERRA EDITAR CATEGORIAS*/


/**************************************
	VALIDAR USUARIOS
****************************************/
public $validarCategoria;
public $RncEmpresaCategoria;

public function ajaxvalidarCategoria(){

	$Nombre_Categoria = "Nombre_Categoria";
	$valorCategoria = $this->validarCategoria;
	$valorRNC = $this->RncEmpresaCategoria;

	$respuesta = ControladorCategorias::ctrValidarCategoria($Nombre_Categoria, $valorCategoria, $valorRNC);
	echo json_encode($respuesta);

}



}/*CIERRA LA CLASE AJAX USUARIOS*/






/********************************
			EDITAR CATEGORIAS
**********************************/

if(isset($_POST["idCategoria"])){

$ModaleditarCategoria = new AjaxCategorias();
$ModaleditarCategoria -> idCategoria = $_POST["idCategoria"];
$ModaleditarCategoria -> ajaxModalEditarCategorias();

}


/*********************************
		VALIDAR USUARIO 
**********************************/

if(isset($_POST["validarCategoria"])){
	$valCategoria = new AjaxCategorias();
	$valCategoria -> validarCategoria = $_POST["validarCategoria"];
	$valCategoria -> RncEmpresaCategoria = $_POST["RncEmpresaCategoria"];
	$valCategoria -> ajaxvalidarCategoria();




}



