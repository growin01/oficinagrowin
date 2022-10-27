<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";
require_once "../controladores/productosactivor.controlador.php";
require_once "../modelos/productosactivor.modelo.php";


class TablaProductosVentas{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 
  	

	public function mostrarTablaProductosVentas(){

		$Rnc_Empresa_Productos = $_GET["RncEmpresaVentas"];
		$CambiarInventario = $_GET["CambiarInventario"];
		$UsuarioDescuento = $_GET["UsuarioDescuento"];


if($CambiarInventario == "1"){
	$productos = ControladorProductos::ctrMostrarProductos($Rnc_Empresa_Productos);	
}else{
	$productos = ControladorActivoR::ctrMostrarProductosActivoR($Rnc_Empresa_Productos);


}

		
  		
  		
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$productos[$i]["Imagen"]."' width='200px'>";

		  	
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

		  	$botones =  "<div class='btn-group'><button class='btn btn-primary btn-xs agregarProducto recuperarBoton' idProducto='".$productos[$i]["id"]."' tipodeinventario='".$CambiarInventario."' UsuarioDescuento='".$UsuarioDescuento."' >+</button></div>"; 

		  	$datosJson .='[		      
			      "'.$imagen.'",
			      "'.$productos[$i]["Codigo"].'",
			      "'.$productos[$i]["Descripcion"].'",
			      "'.number_format($productos[$i]["Precio_Venta"], '2').'",
			      "'.$stock.'",
			      "'.$botones.'"
			    ],';

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
$activarProductosVentas = new TablaProductosVentas();
$activarProductosVentas -> mostrarTablaProductosVentas();


