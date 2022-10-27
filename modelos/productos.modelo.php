<?php 

require_once "conexion.php";


 class ModeloProductos{ 

 
static public function MdlProductoRepetido($tabla, $Rnc_Empresa_Productos, $taRnc_Empresa_Productos, $Codigo, $taCodigo){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE  $taRnc_Empresa_Productos = :$taRnc_Empresa_Productos AND $taCodigo = :$taCodigo");

$stmt -> bindParam(":".$taRnc_Empresa_Productos, $Rnc_Empresa_Productos, PDO::PARAM_STR);
$stmt -> bindParam(":".$taCodigo, $Codigo, PDO::PARAM_STR);
		
		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;


	}


static public function mdlMostrarProductos($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaProductos = :$taRncEmpresaProductos");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaProductos, $Rnc_Empresa_Productos, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
static public function mdlMostrarlibrodeinventario($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRncEmpresaProductos = :$taRncEmpresaProductos ORDER BY id DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaProductos, $Rnc_Empresa_Productos, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/
static public function mdlLectorProductos($tabla, $taRncEmpresaLector, $RncEmpresaLector, $tacodigo, $codigo){

 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tacodigo = :$tacodigo AND $taRncEmpresaLector = :$taRncEmpresaLector");

		$stmt -> bindParam(":".$tacodigo, $codigo, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taRncEmpresaLector, $RncEmpresaLector, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
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

static public function mdlMostrarProductosCodigo($tabla, $id_categorias, $valoridcategorias){
 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $id_categorias = :$id_categorias ORDER BY id DESC");

		//$stmt -> bindParam(":".$taUsuario, $Usuario, PDO::PARAM_STR);
		$stmt -> bindParam(":".$id_categorias, $valoridcategorias, PDO::PARAM_STR);
	

		$stmt -> execute();

		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	
	}/*CIERRO FUNCION MOSTRAR CATEGORIAS*/

		static public function mdlCrearProductos($tabla, $datos){


$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Productos, id_Empresa, id_categorias, Codigo, tipoproducto, Descripcion, Stock, Precio_Compra, Porcentaje, Precio_Venta, Imagen, id_grupo_Venta, id_categoria_Venta, id_generica_Venta, id_cuenta_Venta, Nombre_CuentaContable_Venta, Usuario) VALUES (:Rnc_Empresa_Productos, :id_Empresa, :id_categorias, :Codigo, :tipoproducto, :Descripcion, :Stock, :Precio_Compra, :Porcentaje, :Precio_Venta, :Imagen, :id_grupo_Venta, :id_categoria_Venta, :id_generica_Venta, :id_cuenta_Venta, :Nombre_CuentaContable_Venta, :Usuario)");


$stmt ->bindParam(":Rnc_Empresa_Productos", $datos["Rnc_Empresa_Productos"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Empresa", $datos["id_Empresa"], PDO::PARAM_INT);
$stmt ->bindParam(":id_categorias", $datos["id_categorias"], PDO::PARAM_INT);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
$stmt ->bindParam(":tipoproducto", $datos["tipoproducto"], PDO::PARAM_INT);
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
static public function mdlActulalizarHistoricoProductos($tabla, $datos){


$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Rnc_Empresa_Productos, id_Empresa, id_categorias, Codigo, tipoproducto, Descripcion, Stock, Precio_Compra, Porcentaje, Precio_Venta, Imagen, id_grupo_Venta, id_categoria_Venta, id_generica_Venta, id_cuenta_Venta, Nombre_CuentaContable_Venta, Fecha_AnoMes, Fecha_dia, NAsiento, NCF, Extraer_NAsiento, Observaciones, Usuario, Accion) VALUES (:Rnc_Empresa_Productos, :id_Empresa, :id_categorias, :Codigo, :tipoproducto, :Descripcion, :Stock, :Precio_Compra, :Porcentaje, :Precio_Venta, :Imagen, :id_grupo_Venta, :id_categoria_Venta, :id_generica_Venta, :id_cuenta_Venta, :Nombre_CuentaContable_Venta, :Fecha_AnoMes, :Fecha_dia, :NAsiento, :NCF, :Extraer_NAsiento, :Observaciones, :Usuario, :Accion)");


$stmt ->bindParam(":Rnc_Empresa_Productos", $datos["Rnc_Empresa_Productos"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Empresa", $datos["id_Empresa"], PDO::PARAM_INT);
$stmt ->bindParam(":id_categorias", $datos["id_categorias"], PDO::PARAM_INT);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
$stmt ->bindParam(":tipoproducto", $datos["tipoproducto"], PDO::PARAM_INT);
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

$stmt ->bindParam(":Fecha_AnoMes", $datos["Fecha_AnoMes"], PDO::PARAM_STR);
$stmt ->bindParam(":Fecha_dia", $datos["Fecha_dia"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF", $datos["NCF"], PDO::PARAM_STR);
$stmt ->bindParam(":Extraer_NAsiento", $datos["Extraer_NAsiento"], PDO::PARAM_STR);
$stmt ->bindParam(":Observaciones", $datos["Observaciones"], PDO::PARAM_STR);
$stmt ->bindParam(":Usuario", $datos["Usuario"], PDO::PARAM_STR);
$stmt ->bindParam(":Accion", $datos["Accion"], PDO::PARAM_STR);
			
		
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
	static public function mdlEditarProductosModal($tabla, $id, $valoridProducto){
		
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

	static public function mdlEditarProductos($tabla, $datos){


$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Rnc_Empresa_Productos = :Rnc_Empresa_Productos, id_Empresa = :id_Empresa, id_categorias = :id_categorias, Codigo = :Codigo, tipoproducto = :tipoproducto, Descripcion = :Descripcion, Porcentaje = :Porcentaje, Precio_Venta = :Precio_Venta, Imagen = :Imagen , id_grupo_Venta = :id_grupo_Venta, id_categoria_Venta = :id_categoria_Venta, id_generica_Venta = :id_generica_Venta, id_cuenta_Venta = :id_cuenta_Venta, Nombre_CuentaContable_Venta = :Nombre_CuentaContable_Venta WHERE id = :id");

$stmt ->bindParam(":id", $datos["id"], PDO::PARAM_INT);
$stmt ->bindParam(":Rnc_Empresa_Productos", $datos["Rnc_Empresa_Productos"], PDO::PARAM_STR);
$stmt ->bindParam(":id_Empresa", $datos["id_Empresa"], PDO::PARAM_STR);
$stmt ->bindParam(":id_categorias", $datos["id_categorias"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
$stmt ->bindParam(":tipoproducto", $datos["tipoproducto"], PDO::PARAM_INT);
$stmt ->bindParam(":Descripcion", $datos["Descripcion"], PDO::PARAM_STR);
$stmt ->bindParam(":Porcentaje", $datos["Porcentaje"], PDO::PARAM_STR);
$stmt ->bindParam(":Precio_Venta", $datos["Precio_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Imagen", $datos["Imagen"], PDO::PARAM_STR);
$stmt ->bindParam(":id_grupo_Venta", $datos["id_grupo_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id_categoria_Venta", $datos["id_categoria_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id_cuenta_Venta", $datos["id_cuenta_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":id_generica_Venta", $datos["id_generica_Venta"], PDO::PARAM_STR);
$stmt ->bindParam(":Nombre_CuentaContable_Venta", $datos["Nombre_CuentaContable_Venta"], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}/*CIERRE DE FUNCION EDITAR*/


static public function mdlSumarProductos($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Stock = :Stock, Precio_Compra = :Precio_Compra, Porcentaje = :Porcentaje, Precio_Venta = :Precio_Venta WHERE id = :id");

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


	}/*CIERRE DE FUNCION EDITAR*/
	/*******************************************************
								ELIMINAR PRODUCTOS
	********************************************************/


	static public function mdlEliminarProductos($tabla, $idProducto){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt ->bindParam(":id", $idProducto, PDO::PARAM_STR);

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

static public function mdlplanProducto($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas, $id_grupo, $taid_grupo){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $taRnc_Empresa_Cuentas = :$taRnc_Empresa_Cuentas AND $taid_grupo = :$taid_grupo ORDER BY id_grupo, id_categoria, id_generica ASC");

		
		$stmt -> bindParam(":".$taRnc_Empresa_Cuentas, $Rnc_Empresa_Cuentas, PDO::PARAM_STR);
		$stmt -> bindParam(":".$taid_grupo, $id_grupo, PDO::PARAM_INT);
		
		$stmt -> execute();

		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;




	}

static public function mdlEliminarhistoricoProductos($tabla, $datos){
	
$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Rnc_Empresa_Productos = :Rnc_Empresa_Productos AND Codigo = :Codigo AND NCF = :NCF AND NAsiento = :NAsiento");

$stmt ->bindParam(":Rnc_Empresa_Productos", $datos["Rnc_Empresa_Productos"], PDO::PARAM_STR);
$stmt ->bindParam(":Codigo", $datos["Codigo"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF", $datos["NCF"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



	}/*CIERRE DE FUNCION ELIMINAR PRODUCTOS*/

static public function mdlEliminarhistoricoProductosVENTAS($tabla, $datos){
	
$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Rnc_Empresa_Productos = :Rnc_Empresa_Productos AND NCF = :NCF AND NAsiento = :NAsiento");

$stmt ->bindParam(":Rnc_Empresa_Productos", $datos["Rnc_Empresa_Productos"], PDO::PARAM_STR);
$stmt ->bindParam(":NCF", $datos["NCF"], PDO::PARAM_STR);
$stmt ->bindParam(":NAsiento", $datos["NAsiento"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



	}/*CIERRE DE FUNCION ELIMINAR PRODUCTOS*/



static public function mdlUpdatetipoProductos($tabla, $Rnc_Empresa_Productos, $tipoproducto){

			  		
	
$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tipoproducto = :tipoproducto WHERE Rnc_Empresa_Productos = :Rnc_Empresa_Productos");


		
	$stmt ->bindParam(":Rnc_Empresa_Productos", $Rnc_Empresa_Productos, PDO::PARAM_STR);
	$stmt ->bindParam(":tipoproducto", $tipoproducto, PDO::PARAM_STR);
		
		
		
		if($stmt->execute()){
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;



}








}/*CIRREO CLASE DE PRODUCTOS*/