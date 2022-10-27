<?php 
require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class AjaxProductos{

	/*==================================================
			GENERAR CODIGO A PARTIR DE ID CATEGORIAS
	====================================================*/
	public $idcategoria;


	public function ajaxCrearCodigoProducto(){

		$id_categorias = "id_categorias";
		$valoridcategorias = $this->idcategoria; 

		$respuesta = ControladorProductos::ctrMostrarProductosCodigo($id_categorias, $valoridcategorias);

		echo json_encode($respuesta);



	}/*CIERRE DE FUNCION DE CREAR CODIGO DE PRODUCTOS*/





/*==================================================
			EDITAR PRODUCTOS
	====================================================*/
	public $idProducto;


	public function ajaxEditarProducto(){

		$id = "id";
		$valoridProducto = $this->idProducto; 

		$respuesta = ControladorProductos::ctrEditarProductosModal($id, $valoridProducto);

		echo json_encode($respuesta);





	}/*CIERRE DE FUNCION EDITAR PRODUCTOS*/

	/****************************
		TRAER PRODUCTOS VENTAS
	****************************/

public $RncEmpresaVentas;

public function ajaxtraerProductoVentas(){

	$Rnc_Empresa_Productos = $this->RncEmpresaVentas;

	$respuesta = ControladorProductos::ctrMostrarProductos($Rnc_Empresa_Productos);
	
	echo json_encode($respuesta);




}/*CIERRE FUNCION TRAE PRODUCTOS VENTAS*/

public $nombreProducto;
public $RncEmpresaVentasProducto;

public function ajaxNombreProductoVentas(){ 



	$Descripcion = $this->nombreProducto;
	$Rnc_Empresa_Productos = $this->RncEmpresaVentasProducto;

	$respuesta = ControladorProductos::ctrNombreProductosVentas($Rnc_Empresa_Productos, $Descripcion);
	
	echo json_encode($respuesta);





	}


	public $Rnc_Empresa_Cuentas;
	public $idgrupo;
	
	public function ajaxplanproducto(){

		$Rnc_Empresa_Cuentas = $this->Rnc_Empresa_Cuentas;
		$id_grupo = $this->idgrupo;
		
 	
$respuesta = ControladorProductos::ctrplanProductos($Rnc_Empresa_Cuentas, $id_grupo);
echo json_encode($respuesta);

	}



public $codigo;
public $RncEmpresaLector;
	
	public function ajaxCodigoproducto(){

		$codigo = $this->codigo;
		$RncEmpresaLector = $this->RncEmpresaLector;
		
 	
$respuesta = ControladorProductos::ctrLectorProductos($codigo, $RncEmpresaLector);
echo json_encode($respuesta);

	}


}/*CIERR8E DE CLASE DE PRODUCTOS*/




/*==================================================
			GENERAR CODIGO A PARTIR DE ID CATEGORIAS
	====================================================*/
if(isset($_POST["idcategoria"])){
	$CodigoProducto = new AjaxProductos();
	$CodigoProducto -> idcategoria = $_POST["idcategoria"];
	$CodigoProducto -> ajaxCrearCodigoProducto();


}


/*==================================================
			EDITAR PRODUCTOS
	====================================================*/
if(isset($_POST["idProducto"])){
	$editarProducto = new AjaxProductos();
	$editarProducto -> idProducto = $_POST["idProducto"];
	$editarProducto -> ajaxEditarProducto();


}


/*==================================================
			TRAER PRODUCTOS VENTAS
	====================================================*/
if(isset($_POST["traerProductos"])){
	$traerProductoVentas = new AjaxProductos();
	$traerProductoVentas -> RncEmpresaVentas = $_POST["RncEmpresaVentas"];
	$traerProductoVentas -> ajaxtraerProductoVentas();


}
/*==================================================
			TRAER PRODUCTOS VENTAS
	====================================================*/
if(isset($_POST["nombreProducto"])){
	$nombreProductoVentas = new AjaxProductos();
	$nombreProductoVentas -> nombreProducto = $_POST["nombreProducto"];
	$nombreProductoVentas -> RncEmpresaVentasProducto = $_POST["RncEmpresaVentasProducto"];
	$nombreProductoVentas -> ajaxNombreProductoVentas();


}
if(isset($_POST["RncEmpresaProducto"])){

$planBanco = new AjaxProductos();
$planBanco -> Rnc_Empresa_Cuentas = $_POST["RncEmpresaProducto"];
$planBanco -> idgrupo = $_POST["idgrupo"];
$planBanco -> ajaxplanproducto();

}

if(isset($_POST["codigo"])){

$codigoLector = new AjaxProductos();
$codigoLector -> codigo = $_POST["codigo"];
$codigoLector -> RncEmpresaLector = $_POST["RncEmpresaLector"];
$codigoLector -> ajaxCodigoproducto();

}

