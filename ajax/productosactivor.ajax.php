<?php 

require_once "../controladores/productosactivor.controlador.php";
require_once "../modelos/productosactivor.modelo.php";

class AjaxActivoR{

	

public $idcategoria;
public $RncEmpresa;


public function ajaxCodigoActivoR(){

	$taRnc_Empresa = "Rnc_Empresa_Productos";
	$Rnc_Empresa = $this->RncEmpresa; 
	$tacategorias = "codigo_categorias";
	$idcategorias = $this->idcategoria; 


$respuesta = ControladorActivoR::ctrMostrarCodigoActivoR($taRnc_Empresa, $Rnc_Empresa, $tacategorias, $idcategorias);

	echo json_encode($respuesta);
	


	}/*CIERRE DE FUNCION DE CREAR CODIGO DE PRODUCTOS*/


/*==================================================
			EDITAR PRODUCTOS
	====================================================*/
	public $idProducto;


	public function ajaxEditarActivor(){

		$id = "id";
		$valoridProducto = $this->idProducto; 

		$respuesta = ControladorActivoR::ctrEditarActivorModal($id, $valoridProducto);

		echo json_encode($respuesta);





	}/*CIERRE DE FUNCION EDITAR PRODUCTOS*/

	/****************************
		TRAER PRODUCTOS VENTAS
	****************************/


}/*CIERR8E DE CLASE DE PRODUCTOS*/



if(isset($_POST["idcategoria"])){
	$CodigoActivoR = new AjaxActivoR();
	$CodigoActivoR -> idcategoria = $_POST["idcategoria"];
	$CodigoActivoR -> RncEmpresa = $_POST["RncEmpresa"];
	$CodigoActivoR -> ajaxCodigoActivoR();


}

if(isset($_POST["idProducto"])){
	$EditarActivoR = new AjaxActivoR();
	$EditarActivoR -> idProducto = $_POST["idProducto"];
	$EditarActivoR -> ajaxEditarActivor();


}