<?php
require_once "../controladores/cotizaciones.controlador.php";
require_once "../modelos/cotizaciones.modelo.php";

class AjaxCotizaciones{


/**************************************
	ACTIVAR Y DESACTIVAR USUARIOS
****************************************/

public $estadoCotizacion;
public $idCotizacion; 

public function ajaxEstadoCotizaciones(){

	$tabla = "cotizaciones_empresas";
	$Estado = "Estado_Cotizacion";
	$id = "id";

	$estadoCotizacion = $this->estadoCotizacion;
	$idCotizacion = $this->idCotizacion;


	$respuesta =  ModeloCotizacion::MdlEstadoCotizacion($tabla, $Estado, $id, $estadoCotizacion, $idCotizacion);


}/*CIERRA FUNCION DE ACTIVAR Y DESSACTIVAR USUARIOS*/


public function	ajaxVerCotizaciones(){


 $id = "id";  
 $valoridCotizacion = $this->idCotizacion;

$respuesta = ControladorCotizaciones::ctrMostrarCotizacionesEditar($id, $valoridCotizacion);
echo json_encode($respuesta);


}




}/*CIERRA LA CLASE AJAX USUARIOS*/


/*******************************
ACTIVAR O DESACTIVAR  USUARIOS
**********************************/

if(isset($_POST["estadoCotizacion"])){ 
	
	$EstadoCotizaciones = new  AjaxCotizaciones();
	$EstadoCotizaciones -> estadoCotizacion = $_POST["estadoCotizacion"];
	$EstadoCotizaciones -> idCotizacion = $_POST["idCotizacion"];
	$EstadoCotizaciones -> ajaxEstadoCotizaciones();

}


if(isset($_POST["idCotizacion"])){ 
	$VerCotizaciones = new AjaxCotizaciones();
	$VerCotizaciones -> idCotizacion = $_POST["idCotizacion"];
	$VerCotizaciones -> ajaxVerCotizaciones();

}






 