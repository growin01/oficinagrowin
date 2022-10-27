<?php 

require_once "conexion.php";


 class ModeloActivoR{ 

static public function mdlMostrarProductosActivoR($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaProductos = :$taRncEmpresaProductos");

		
		$stmt -> bindParam(":".$taRncEmpresaProductos, $Rnc_Empresa_Productos, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

	static public function mdlMostrarProductosid($tablaProductos, $id, $valorid){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaProductos WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valorid, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

static public function mdlMostrarProductosid_2($tablaProductos_2, $id_2, $valorid_2){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaProductos_2 WHERE $id_2 = :$id_2");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_2, $valorid_2, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

static public function mdlMostrarCodigoActivoR($tabla, $taRnc_Empresa, $Rnc_Empresa, $tacategorias, $idcategorias){
 	
 $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa = :$taRnc_Empresa AND $tacategorias = :$tacategorias ORDER BY id DESC");

$stmt -> bindParam(":".$taRnc_Empresa, $Rnc_Empresa, PDO::PARAM_STR);
$stmt -> bindParam(":".$tacategorias, $idcategorias, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

static public function mdlCrearProductosActivoR($tabla, $datos){



$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Productos, Codigo, codigo_categorias, codigo_producto, ubicacion, maquetacodigo_completo, Descripcion, Stock, Precio_Compra, Porcentaje, Precio_Venta, Imagen, id_grupo_Venta, id_categoria_Venta, id_generica_Venta, id_cuenta_Venta, Nombre_CuentaContable_Venta, Usuario) VALUES (:Rnc_Empresa_Productos, :Codigo, :codigo_categorias, :codigo_producto, :ubicacion, :maquetacodigo_completo, :Descripcion, :Stock, :Precio_Compra, :Porcentaje, :Precio_Venta, :Imagen, :id_grupo_Venta, :id_categoria_Venta, :id_generica_Venta, :id_cuenta_Venta, :Nombre_CuentaContable_Venta, :Usuario)");


$stmt ->bindParam(":Rnc_Empresa_Productos", $datos["Rnc_Empresa_Productos"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);

$stmt ->bindParam(":codigo_categorias", $datos["codigo_categorias"], PDO::PARAM_STR);
$stmt ->bindParam(":codigo_producto", $datos["codigo_producto"], PDO::PARAM_STR);
$stmt ->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
$stmt ->bindParam(":maquetacodigo_completo", $datos["maquetacodigo_completo"], PDO::PARAM_STR);

$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
$stmt ->bindParam(":Stock", $datos["Stock"], PDO::PARAM_INT);
$stmt ->bindParam(":Precio_Compra", $datos["Precio_Compra"], PDO::PARAM_STR);
$stmt ->bindParam(":Porcentaje", $datos["Porcentaje"], PDO::PARAM_STR);
$stmt ->bindParam(":Precio_Venta", $datos["Precio_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Imagen", $datos["Imagen"], PDO::PARAM_STR);
$stmt ->bindParam(":id_grupo_Venta", $datos["id_grupo_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id_categoria_Venta", $datos["id_categoria_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id_cuenta_Venta", $datos["id_cuenta_Venta"], PDO::PARAM_STR);

$stmt ->bindParam(":id_generica_Venta", $datos["id_generica_Venta"], PDO::PARAM_STR);
	
$stmt ->bindParam(":Nombre_CuentaContable_Venta", $datos["Nombre_CuentaContable_Venta"], PDO::PARAM_STR);


$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);		
			
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	}
	/***************************************************************************
				EDITAR PRODUCTO MODAL
	*****************************************************************************/

	static public function mdlEditarActivoRModal($tabla, $id, $valoridProducto){
		
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id = :$id");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id, $valoridProducto, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;



	}/*CIERRE DE FUNCION EDITAR PRODUCTO MODAL*/

	/*****************************************************
			EDITAR PRODUCTO
	******************************************************/

	static public function mdlEditarActivoR($tabla, $datos){

          
              
	
	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Productos = :Rnc_Empresa_Productos, Codigo = :Codigo, codigo_categorias = :codigo_categorias, codigo_producto = :codigo_producto, ubicacion = :ubicacion, maquetacodigo_completo = :maquetacodigo_completo,  Descripcion = :Descripcion, Stock = :Stock, Precio_Compra = :Precio_Compra, Precio_Venta = :Precio_Venta, Imagen = :Imagen, id_grupo_Venta = :id_grupo_Venta, id_categoria_Venta = :id_categoria_Venta, id_generica_Venta = :id_generica_Venta, id_cuenta_Venta = :id_cuenta_Venta, Nombre_CuentaContable_Venta = :Nombre_CuentaContable_Venta, Usuario = :Usuario WHERE id = :id");

$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Empresa_Productos", $datos["Rnc_Empresa_Productos"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
$stmt ->bindParam(":codigo_categorias", $datos["codigo_categorias"], PDO::PARAM_STR);
$stmt ->bindParam(":codigo_producto", $datos["codigo_producto"], PDO::PARAM_STR);
$stmt ->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
$stmt ->bindParam(":maquetacodigo_completo", $datos["maquetacodigo_completo"], PDO::PARAM_STR);

$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
$stmt ->bindParam(":Stock", $datos["Stock"], PDO::PARAM_STR);
$stmt ->bindParam(":Precio_Compra", $datos["Precio_Compra"], PDO::PARAM_STR);
$stmt ->bindParam(":Precio_Venta", $datos["Precio_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Imagen", $datos["Imagen"], PDO::PARAM_STR);
$stmt ->bindParam(":id_grupo_Venta", $datos["id_grupo_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id_categoria_Venta", $datos["id_categoria_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id_cuenta_Venta", $datos["id_cuenta_Venta"], PDO::PARAM_STR);

$stmt ->bindParam(":id_generica_Venta", $datos["id_generica_Venta"], PDO::PARAM_STR);
	
$stmt ->bindParam(":Nombre_CuentaContable_Venta", $datos["Nombre_CuentaContable_Venta"], PDO::PARAM_STR);
		
$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;





	}/*CIERRE DE FUNCION EDITAR*/

	/*******************************************************
								ELIMINAR PRODUCTOS
	********************************************************/


	static public function mdlEliminarActivoR($tabla, $idProducto){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $idProducto, PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



	}/*CIERRE DE FUNCION ELIMINAR PRODUCTOS*/

	/*MOSTRAR PRODUCTOS DESDE VENTAS*/

	static public function mdlNombreProductosVentas($tabla, $taDescripcion, $taRncEmpresaProductos, $Rnc_Empresa_Productos, $Descripcion){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaProductos = :$taRncEmpresaProductos AND $taDescripcion = :$taDescripcion");

		
		$stmt -> bindParam(":".$taRncEmpresaProductos, $Rnc_Empresa_Productos, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taDescripcion, $Descripcion, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

		/******************************************************************
				Actualizar PRODUCTO
		********************************************************************/

static public function MdlActualizarProducto($tabla,$item1, $valor1, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $id = :$id");

		$stmt ->bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $valorid, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

}/*CIERRO FUNCION ACTULIZAR PRODUCTO*/

/******************************************************************
				Actualizar PRODUCTO
		********************************************************************/

static public function MdlActualizarProductoVentas($tablaProductos,$item1a, $valor1a, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("UPDATE $tablaProductos SET $item1a = :$item1a WHERE $id = :$id");

		$stmt ->bindParam(":".$item1a, $valor1a, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $valorid, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

}/*CIERRO FUNCION ACTULIZAR PRODUCTO*/
static public function MdlActualizarProductoVentas_2($tablaProductos_2, $item1a_2, $valor1a_2, $id_2, $valorid_2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tablaProductos_2 SET $item1a_2 = :$item1a_2 WHERE $id_2 = :$id_2");

		$stmt ->bindParam(":".$item1a_2, $valor1a_2, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id_2, $valorid_2, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

}/*CIERRO FUNCION ACTULIZAR PRODUCTO*/

/******************************************************************
				Actualizar PRODUCTO
		********************************************************************/

static public function MdlActualizarProductoStock($tablaProductos,$item1b, $valor1b, $id, $valorid){

		$stmt = Conexion::conectar()->prepare("UPDATE $tablaProductos SET $item1b = :$item1b WHERE $id = :$id");

		$stmt ->bindParam(":".$item1b, $valor1b, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id, $valorid, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

}/*CIERRO FUNCION ACTULIZAR PRODUCTO*/
static public function MdlActualizarProductoStock_2($tablaProductos_2, $item1b_2, $valor1b_2, $id_2, $valorid_2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tablaProductos_2 SET $item1b_2 = :$item1b_2 WHERE $id_2 = :$id_2");

		$stmt ->bindParam(":".$item1b_2, $valor1b_2, PDO::PARAM_STR);
		$stmt ->bindParam(":".$id_2, $valorid_2, PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

}/*CIERRO FUNCION ACTULIZAR PRODUCTO*/
static public function MdlActualizarProductoCompras($tablaProductos, $datos){

$stmt = Conexion::conectar()->prepare("UPDATE $tablaProductos SET Stock = :Stock, Precio_Compra = :Precio_Compra, Porcentaje = :Porcentaje, Precio_Venta = :Precio_Venta WHERE id = :id");
					
					
	$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
	$stmt ->bindParam(":Stock", $datos["Stock"], PDO::PARAM_STR);
	$stmt ->bindParam(":Precio_Compra", $datos["Precio_Compra"], PDO::PARAM_STR);
	$stmt ->bindParam(":Porcentaje", $datos["Porcentaje"], PDO::PARAM_STR);
	$stmt ->bindParam(":Precio_Venta", $datos["Precio_Venta"], PDO::PARAM_STR);

		if($stmt->execute()){
				return "ok";

			}else{

				return "error";

			}

			$stmt -> close();
			$stmt = null;

}/*CIERRO FUNCION ACTULIZAR PRODUCTO*/


/*****************************************
	PRODUCTOS MAS VENDIDOS
******************************************/



static public function mdlMostrarProductosmasVendidos($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos, $orden){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaProductos = :$taRncEmpresaProductos ORDER BY $orden DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaProductos, $Rnc_Empresa_Productos, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

	/*****************************************
	SUMA DE PRODUCTOS vENTAS
******************************************/



static public function mdlMostrarSumaVentas($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos){
 		$stmt = Conexion::conectar()->prepare("SELECT SUM(Ventas) as total FROM $tabla WHERE $taRncEmpresaProductos = :$taRncEmpresaProductos");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaProductos, $Rnc_Empresa_Productos, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

	static public function mdlMostrarProductosRecientes($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos, $orden){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaProductos = :$taRncEmpresaProductos ORDER BY $orden DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaProductos, $Rnc_Empresa_Productos, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

	











}/*CIRREO CLASE DE PRODUCTOS*/