<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaProductos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 
  	

	public function mostrarTablaProductos(){

		$Rnc_Empresa_Productos = $_GET["RncEmpresaProductos"];

		
  		$productos = ControladorProductos::ctrMostrarProductos($Rnc_Empresa_Productos);	

  		
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($productos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$productos[$i]["Imagen"]."' width='200px'>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$id = "id";
		  	$id_categorias = $productos[$i]["id_categorias"];

		  	$categorias = ControladorCategorias::ctrMostrarCategoriasPro($id, $id_categorias);

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

		  	$botones =  "<div class='btn-group'><button Title='Sumar Producto' class='btn btn-success btnsumarProducto btn-xs' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalsumarProducto'><i class='glyphicon glyphicon-plus'></i></button><button Title='Restar Producto' class='btn btn-secondarys btnrestarProducto btn-xs' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalrestarProducto'><i class='glyphicon glyphicon-minus'></i></button><button class='btn btn-primary btnCodigoBarra btn-xs' CodigoBarra='".$productos[$i]["Codigo"]."' MaquetaBarra='".$productos[$i]["Codigo"]."'><i class='fa fa-barcode'></i></button><button Title='Editar Producto' class='btn btn-warning btnEditarProducto btn-xs' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button Title='Eliminar Producto' class='btn btn-danger btnEliminarProducto btn-xs' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["Codigo"]."' idempresa='".$productos[$i]["id_Empresa"]."' imagen='".$productos[$i]["Imagen"]."'><i class='fa fa-times'></i></button></div>"; 
		  
		  $valorcostos = $productos[$i]["Stock"] * $productos[$i]["Precio_Compra"];
		  $valorventas = $productos[$i]["Stock"] * $productos[$i]["Precio_Venta"];
		  if($productos[$i]["tipoproducto"] == "1"){

		  	$tipoproducto = "Venta";
		  
		  } else if($productos[$i]["tipoproducto"] == "2"){
		  	$tipoproducto = "Servicio";
		  }else{
			$tipoproducto = "Alquiler";

		  }


		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$productos[$i]["Codigo"].'",
			      "'.$productos[$i]["Descripcion"].'",
			      "'.$categorias["Nombre_Categoria"].'",
			      "'.$tipoproducto.'",
			      "'.$stock.'",
			      "'.number_format($productos[$i]["Precio_Compra"], 2).'",
			      "'.number_format($valorcostos, 2).'",
			      "'.number_format($productos[$i]["Precio_Venta"], 2).'",
			      "'.number_format($valorventas, 2).'",
			      "'.$productos[$i]["Ventas"].'",
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
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();


