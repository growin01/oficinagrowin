
<?php 


require_once "../controladores/categoriasactivof.controlador.php";
require_once "../modelos/categoriasactivof.modelo.php";


class AjaxCategoriasF{



	/********************************
			EDITAR CATEGORIAS
	**********************************/
	

public $idCategoriaActivoF;

	public function ajaxModalEditarCategoriasActivoF(){

		$id = "id";
		$valorid = $this->idCategoriaActivoF;

$respuesta = ControladorCategoriasActivoF::ctrModalEditarCategoriasActivoF($id, $valorid);
		
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

if(isset($_POST["idCategoriaActivoF"])){

$editarCategoriaActivoF = new AjaxCategoriasF();
$editarCategoriaActivoF -> idCategoriaActivoF = $_POST["idCategoriaActivoF"];
$editarCategoriaActivoF -> ajaxModalEditarCategoriasActivoF();

}
if(isset($_POST["codigocategorias"])){

$CategoriaProductoActivoR = new AjaxCategorias();
$CategoriaProductoActivoR -> codigocategorias = $_POST["codigocategorias"];
$CategoriaProductoActivoR -> RncEmpresaActivoR = $_POST["RncEmpresaActivoR"];
$CategoriaProductoActivoR -> ajaxProdutosCategoriasActivoR();

}
