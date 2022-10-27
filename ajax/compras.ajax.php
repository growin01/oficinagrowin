<?php
require_once "../controladores/compras.controlador.php";
require_once "../modelos/compras.modelo.php";

class Ajaxcompras{


public $idcompra;
	
public function	ajaxVerComprasGenerales(){


 $id = "id";  
 $valoridCompra = $this->idcompra;

$respuesta = ControladorCompras::ctrMostrarCompraEditar($id, $valoridCompra);
echo json_encode($respuesta);


}



}/*CIERRE DE CLASES*/






if(isset($_POST["idcompra"])){ 
	
	$ComprasGenerales = new Ajaxcompras();
	$ComprasGenerales -> idcompra = $_POST["idcompra"];
	$ComprasGenerales -> ajaxVerComprasGenerales();

}


