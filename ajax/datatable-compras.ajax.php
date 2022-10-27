<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class TablaProductosCompras{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 
  	

	public function mostrarTablaProductosCompras(){

		$Rnc_Empresa_Productos = $_GET["RncEmpresaCompras"];

		
  		$productos = ControladorProductos::ctrMostrarProductos($Rnc_Empresa_Productos);	

  		
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

		  	if($productos[$i]["tipoproducto"] == "1"){ 

		  	$imagen = "<img src='".$productos[$i]["Imagen"]."' width='40px'>";

		  	
		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($productos[$i]["Stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$productos[$i]["Stock"]."</button>";

  			}else if($productos[$i]["Stock"] > 11 && $productos[$i]["Stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$productos[$i]["Stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$productos[$i]["Stock"]."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

		  	$botones =  "<div class='btn-group'><button class='btn btn-primary btn-xs agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."'>+</button></div>"; 

		  	$datosJson .='[
			      "'.($i+1).'",			      
			      "'.$imagen.'",
			      "'.$productos[$i]["Codigo"].'",
			      "'.$productos[$i]["Descripcion"].'",
			      "'.number_format($productos[$i]["Precio_Compra"]).'",
			      "'.$stock.'",
			      "'.$botones.'"
			    ],';

		  }
		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;

		
	}


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/  
$activarProductosCompras = new TablaProductosCompras();
$activarProductosCompras -> mostrarTablaProductosCompras();


