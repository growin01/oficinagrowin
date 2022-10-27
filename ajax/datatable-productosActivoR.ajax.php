<?php

require_once "../controladores/productosactivor.controlador.php";
require_once "../modelos/productosactivor.modelo.php";

require_once "../controladores/categoriasactivor.controlador.php";
require_once "../modelos/categoriasactivor.modelo.php";


class TablaActivoR{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 
  	

public function mostrarTablaActivoR(){

	$Rnc_Empresa_Productos = $_GET["RncEmpresaActivoR"];

    
  $productos = ControladorActivoR::ctrMostrarProductosActivoR($Rnc_Empresa_Productos); 
  		
		
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

		  	$id = "Codigo_CategoriaActivoR";
		  	$id_categorias = $productos[$i]["codigo_categorias"];
		  	$categorias = ControladorCategoriasActivoR::ctrMostrarCategoriasPro($id, $id_categorias, $Rnc_Empresa_Productos);

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

$botones =  "<div class='btn-group'><button class='btn btn-primary btnCodigoBarra btn-xs' CodigoBarra='".$productos[$i]["Codigo"]."' MaquetaBarra='".$productos[$i]["maquetacodigo_completo"]."'><i class='fa fa-barcode'></i></button><button class='btn btn-warning btnEditarActivor btn-xs' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarProducto btn-xs' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo_producto"]."' Imagen='".$productos[$i]["Imagen"]."'><i class='fa fa-times'></i></button></div>"; 


		 
		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$productos[$i]["Codigo"].'",
			      "'.$productos[$i]["ubicacion"].'",
			      "'.$productos[$i]["maquetacodigo_completo"].'",
			      "'.$categorias["Nombre_Categoria_ActivoR"].'",
			      "'.$productos[$i]["Descripcion"].'",
			      "'.$stock.'",
			      "'.number_format($productos[$i]["Precio_Venta"], 2).'",
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
$activarProductos = new TablaActivoR();
$activarProductos -> mostrarTablaActivoR();


