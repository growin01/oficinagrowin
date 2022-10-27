
<?php 


require_once "../controladores/categoriasactivor.controlador.php";
require_once "../modelos/categoriasactivor.modelo.php";


class AjaxCategorias{



	/********************************
			EDITAR CATEGORIAS
	**********************************/
	

public $idCategoriaActivoR;

	public function ajaxModalEditarCategoriasActivoR(){

		$id = "id";
		$valorid = $this->idCategoriaActivoR;

$respuesta = ControladorCategoriasActivoR::ctrModalEditarCategoriasActivoR($id, $valorid);
		
		echo json_encode($respuesta);


	}/*CIERRA EDITAR CATEGORIAS*/

public $codigocategorias;
public $RncEmpresaActivoR;

public function ajaxProdutosCategoriasActivoR(){

$id = "Codigo_CategoriaActivoR";
$id_categorias = $this->codigocategorias;
$Rnc_Empresa_Productos = $this->RncEmpresaActivoR;

$respuesta = ControladorCategoriasActivoR::ctrMostrarCategoriasPro($id, $id_categorias, $Rnc_Empresa_Productos);

echo json_encode($respuesta);

}



 }

if(isset($_POST["idCategoriaActivoR"])){

$editarCategoriaActivoR = new AjaxCategorias();
$editarCategoriaActivoR -> idCategoriaActivoR = $_POST["idCategoriaActivoR"];
$editarCategoriaActivoR -> ajaxModalEditarCategoriasActivoR();

}
if(isset($_POST["codigocategorias"])){

$CategoriaProductoActivoR = new AjaxCategorias();
$CategoriaProductoActivoR -> codigocategorias = $_POST["codigocategorias"];
$CategoriaProductoActivoR -> RncEmpresaActivoR = $_POST["RncEmpresaActivoR"];
$CategoriaProductoActivoR -> ajaxProdutosCategoriasActivoR();

}
