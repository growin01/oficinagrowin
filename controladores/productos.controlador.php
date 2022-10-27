<?php 


class ControladorProductos{

  static public function ctrMostrarProductos($Rnc_Empresa_Productos){
  	
    /*if(isset($_GET["RncEmpresaProductos"])){*/

  		/*$Rnc_Empresa_Productos = $_GET["RncEmpresaProductos"];*/
      
		  $tabla = "productos_empresas";
    	$taRncEmpresaProductos = "Rnc_Empresa_Productos";
    	
    	

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos);

		return $respuesta;
		/*}*/

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/

    static public function ctrMostrarlibrodeinventario($Rnc_Empresa_Productos){
    
    /*if(isset($_GET["RncEmpresaProductos"])){*/

      /*$Rnc_Empresa_Productos = $_GET["RncEmpresaProductos"];*/
      
      $tabla = "historico_productos_empresas";
      $taRncEmpresaProductos = "Rnc_Empresa_Productos";
      
      

    $respuesta = ModeloProductos::mdlMostrarlibrodeinventario($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos);

    return $respuesta;
    /*}*/

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/

    /**********************************************
    MOSTRAR PRODUCTOS POR ID
    ************************************************/

    static public function ctrMostrarProductosid($id, $idProducto){

      $tablaProductos = "productos_empresas";
      $valorid = $idProducto;
     
      

    $respuesta = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

    return $respuesta;







    }/*CIERRE MOSTRAR PRODCUTOS ID*/


    static public function ctrMostrarProductosCodigo($id_categorias, $valoridcategorias){
    
    /*if(isset($_GET["RncEmpresaProductos"])){*/

      /*$Rnc_Empresa_Productos = $_GET["RncEmpresaProductos"];*/
      
      $tabla = "productos_empresas";
  
      
      

    $respuesta = ModeloProductos::mdlMostrarProductosCodigo($tabla, $id_categorias, $valoridcategorias);

    return $respuesta;
    /*}*/

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/


    /********************************************************************
        INICIO FUNCION DE CREAR PRODUCTOS
    *********************************************************************/

    static public function ctrCrearProducto(){
      
    if(isset($_POST["nuevaDescripcion"])){
       $ModuloProducto = $_POST["ModuloProducto"];

        
     if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.()%*-+ ]+$/', $_POST["nuevaDescripcion"]))){

       
       echo '<script>
        swal({
          type: "error",
          title: "¡La Descripcion no puede ir con los campos vacio o llevar caracteres especiales!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "'.$ModuloProducto.'";
              }

              });

        </script>';
          exit; 


     }

      
      
    $tabla = "productos_empresas";
    $taRnc_Empresa_Productos = "Rnc_Empresa_Productos";
    $Rnc_Empresa_Productos = $_POST["RncEmpresaProductos"];
    $taCodigo = "Codigo";
    $Codigo = $_POST["nuevoCodigo"];
   

$CodigoRepetido = ModeloProductos::MdlProductoRepetido($tabla, $Rnc_Empresa_Productos, $taRnc_Empresa_Productos, $Codigo, $taCodigo);

if($CodigoRepetido != FALSE && $CodigoRepetido["Rnc_Empresa_Productos"] == $Rnc_Empresa_Productos && $CodigoRepetido["Codigo"] == $Codigo){

        echo '<script>
                swal({
                  type: "error",
                  title: "ESTE CODIGO ESTA REGISTRADO VERIFIQUE EL CODIGO!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                    }).then((result)=>{

                      if(result.value){
                        window.location = "'.$ModuloProducto.'";
                      }

                      });

                </script>';


    EXIT;

}
/********************************** VALIDAR IMAGEN *********************************/

  $Ruta = "vistas/img/productos/default/anonymous.png";
 
      
  if(isset($_FILES["nuevaImagen"]["tmp_name"]) && !empty($_FILES["nuevaImagen"]["tmp_name"])){

  list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

      $nuevoAncho = 500;
      $nuevoAlto = 500;

/*********CREAMOS DIRECTORIO DONDE VAVMOS A GUARDAR LA FOTO DEL USUARIO**/

$directorio = "vistas/img/productos/".$_POST["id_Empresa"];
mkdir($directorio, 0755);


$directorio = "vistas/img/productos/".$_POST["id_Empresa"]."/".$_POST["nuevoCodigo"];

    mkdir($directorio, 0755);

/*DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
*************/
if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

                $aleatorio = mt_rand(100, 999);

                /*guardamos en el directorio*/
  $Ruta = "vistas/img/productos/".$_POST["id_Empresa"]."/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";
                $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                imagejpeg($destino, $Ruta);
              }/*SI DEL LA IMAGEN JPEG*/

              if($_FILES["nuevaImagen"]["type"] == "image/png"){
                $aleatorio = mt_rand(100, 999);

                /*guardamos en el directorio*/
                $Ruta =  "vistas/img/productos/".$_POST["id_Empresa"]."/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";
                $origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                imagepng($destino, $Ruta);
              }/*SI DEL LA IMAGEN PNG*/
        
            }/* SI DE VALIDAR IMAGEN*/

        if(isset($_POST["plancuentaProducto"])){
            $idcuenta = "id";
            $valoridcuenta = $_POST["plancuentaProducto"];
            $RncEmpresaEC = "Rnc_Empresa_cuentas";
            $valorRncEmpresaEC = $_POST["RncEmpresaProductos"];

             $Cuenta = ControladorContabilidad::ctreditarcuenta($RncEmpresaEC, $valorRncEmpresaEC, $idcuenta, $valoridcuenta);

              $id_grupo_Venta = $Cuenta["id_grupo"];
              $id_categoria_Venta = $Cuenta["id_categoria"];
              $id_generica_Venta = $Cuenta["id_generica"];
              $id_cuenta_Venta = $Cuenta["id_subgenerica"];
              $Nombre_CuentaContable_Venta = $Cuenta["Nombre_subCuenta"];

          }else{
             
              $id_grupo_Venta = 4;
              $id_categoria_Venta = 9;
              $id_generica_Venta = "01";
              $id_cuenta_Venta = "001";
              $Nombre_CuentaContable_Venta = "otros ingresos";

        }

        

$tabla = "productos_empresas";

$datos = array ("Rnc_Empresa_Productos" => $_POST["RncEmpresaProductos"],
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $_POST["nuevaCategoriaproductos"], 
      "Codigo" => $_POST["nuevoCodigo"], 
      "tipoproducto" => $_POST["nuevoTipo"],
      "Descripcion" => $_POST["nuevaDescripcion"], 
      "Stock" => "0", 
      "Precio_Compra" => "0", 
      "Porcentaje" => "0", 
      "Precio_Venta" => "0", 
      "Imagen" => $Ruta,
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Usuario" => $_POST["UsuarioProductos"]);

$respuesta = ModeloProductos::mdlCrearProductos($tabla, $datos);

date_default_timezone_set('America/Santo_Domingo');

$Fecha_AnoMes = date('Ym');
$Fecha_dia = date('d');
  
          $fechaActual = $fecha.' '.$hora;


$tabla = "historico_productos_empresas";
$Accion = "CREADO";

$datos = array ("Rnc_Empresa_Productos" => $_POST["RncEmpresaProductos"],
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $_POST["nuevaCategoriaproductos"], 
      "Codigo" => $_POST["nuevoCodigo"], 
      "tipoproducto" => $_POST["nuevoTipo"],
      "Descripcion" => $_POST["nuevaDescripcion"], 
      "Stock" => "0", 
      "Precio_Compra" => "0", 
      "Porcentaje" => "0", 
      "Precio_Venta" => "0", 
      "Imagen" => $Ruta,
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $Fecha_AnoMes,
      "Fecha_dia" => $Fecha_dia,
      "NAsiento" => "",
      "NCF" => "",
      "Extraer_NAsiento" => "",
      "Observaciones" => "Producto Creado",
      "Usuario" => $_POST["UsuarioProductos"],
      "Accion" => $Accion);

$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);

    if($respuesta == "ok"){
          $ModuloProducto = $_POST["ModuloProducto"];

            switch ($ModuloProducto) {
              case 'categorias':
                 echo '<script>
                    swal({
                          type: "success",
                          title: "¡El Producto se ha guardado correctamente!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                            }).then((result)=>{

                              if(result.value){
                                window.location = "categorias";
                              }

                              });

                        </script>';
                break;
                 case 'productos':
                 echo '<script>
                    swal({
                          type: "success",
                          title: "¡El Producto se ha guardado correctamente!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                            }).then((result)=>{

                              if(result.value){
                                window.location = "productos";
                              }

                              });

                        </script>';
                break;
              
             
              case 'productosresumen':
                 echo '<script>
                    swal({
                          type: "success",
                          title: "¡El Producto se ha guardado correctamente!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                            }).then((result)=>{

                              if(result.value){
                                window.location = "productosresumen";
                              }

                              });

                        </script>';
                break;
               
               
              case 'crear-compra-inventario':
                 echo '<script>
                    swal({
                          type: "success",
                          title: "¡El Producto se ha guardado correctamente!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                            }).then((result)=>{

                              if(result.value){
                                window.location = "crear-compra-inventario";
                              }

                              });

                        </script>';
                break;
                case 'crear-compra-inventarioNo':
                 echo '<script>
                    swal({
                          type: "success",
                          title: "¡El Producto se ha guardado correctamente!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                            }).then((result)=>{

                              if(result.value){
                                window.location = "crear-compra-inventarioNo";
                              }

                              });

                        </script>';
                break;
            }/*cierre switch*/


        }


      }/*CIERRE DE SI ISSET*/ 

    }/*CIERRE DE FUNCION DE CREAR PRODUCTOS*/

static public function ctrEditarProductosModal($id, $valoridProducto){
    
   
  $tabla = "productos_empresas";
  
      
      $respuesta = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

    return $respuesta;
   
    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/



    /********************************************************************
        INICIO FUNCION DE Editar PRODUCTOS
    *********************************************************************/

    static public function ctrSumarProducto(){
      
    if(isset($_POST["sumarproductoCodigo"])){
      $tabla = "correlativos_no_fiscal";
      $NCF_Cons = 0;
      $Accion = "CREADO";

          /****BCF*****/
    $Tipo_NCF = "DAI";/*CONSUMIDOR FINAL MASIVO*/
    $Rnc_Empresa = $_POST["RncEmpresaProductos"];
        $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){ 


      $datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
            "Tipo_NCF" => $Tipo_NCF, 
              "NCF_Cons" => $NCF_Cons,
              "Usuario" => $_POST["UsuarioProductos"], 
              "Accion" => $Accion);
      $respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
    }
     
if($_POST["Stocksuma"] == "0"){
   echo '<script>
                swal({
                  type: "error",
                  title: "Debe colocar el Stock que va aumentar en el Producto!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                    }).then((result)=>{

                      if(result.value){
                        window.location = "productos";
                      }

                      });

                </script>';


    EXIT;





}
date_default_timezone_set('America/Santo_Domingo');

$Fecha_AnoMes = date('Ym');
$Fecha_dia = date('d');
         $tabla = "productos_empresas";

        
        $Rnc_Empresa_Productos = $_POST["RncEmpresaProductos"];
        $taRnc_Empresa_Productos = "Rnc_Empresa_Productos";
        $Codigo = $_POST["sumarproductoCodigo"];
        $taCodigo = "Codigo";
        
      
        $tabla = "productos_empresas";
        $Stok = $_POST["StockAnteriorsuma"] + $_POST["Stocksuma"];

       
      $datos = array ("id" => $_POST["Sumaidproducto"],
        "Stock" => $Stok,
        "Precio_Compra" => $_POST["nuevoPrecioCompra"],
        "Porcentaje" => $_POST["Porcentaje"],
        "Precio_Venta" => $_POST["nuevoPrecioVenta"],
            );

        $respuesta = ModeloProductos::mdlSumarProductos($tabla, $datos);

$id = "id";
$valoridProducto = $_POST["Sumaidproducto"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];



$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $_POST["RncEmpresaProductos"];
$tipocod = "DAI";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DAI".$N;

  $idproyecto = "NO APLICA";
  $codproyecto = "NO APLICA"; 
  $id_banco = 0;

if($_POST["Contabilidad"] == 1 && $_POST["sumarTipoProducto"] == "1"){

  
$sumamontoinventario = $_POST["Stocksuma"] * $_POST["nuevoPrecioCompra"];

$tabla = "librodiario_empresas";
  $ObservacionesLD = $_POST["Observaciones"];
  $Extraer_NAsiento = "DAI";
  $Accion = "AJUSTESUMA";
  $debito = bcdiv($sumamontoinventario, '1', 2);
  $credito = "0";
  $Transaccion_606 = 1;

  $datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Productos,
          "id_registro" => $_POST["Sumaidproducto"],
          "Rnc_Factura" => $Rnc_Empresa_Productos,
          "NCF" => $NAsiento,
          "Nombre_Empresa" => $_POST["NombreEmpresa"],
          "NAsiento" => $NAsiento,
          "id_grupo" => $id_grupo_Venta,
          "id_categoria" =>  $id_categoria_Venta,
          "id_generica" => $id_generica_Venta,
          "id_cuenta" => $id_cuenta_Venta,
          "Nombre_Cuenta" => $Nombre_CuentaContable_Venta,
          "Fecha_AnoMes_LD" => $Fecha_AnoMes,
          "Fecha_dia_LD" => $Fecha_dia,
          "id_Proyecto" => $idproyecto,
          "CodigoProyecto" => $codproyecto,
          "debito" => $debito,
          "credito" => $credito,
          "ObservacionesLD" => $ObservacionesLD,
          "Extraer_NAsiento" => $Extraer_NAsiento,
          "Tipo_Transaccion" => $Transaccion_606,
          "Fecha_AnoMes_Trans" => $Fecha_AnoMes,
          "Fecha_dia_Trans" => $Fecha_dia ,
          "id_banco" => $id_banco,
          "referencia" =>  $_POST["Observaciones"],
          "Usuario_Creador" => $_POST["UsuarioProductos"],
          "Accion" => $Accion);

  $respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

  
$id_grupo = "5";
$id_categoria = "1";
$id_generica = "99";
$id_cuenta = "001";
$Nombre_Cuenta = "ajustes de inventario";

  $debito = 0;
  $credito = bcdiv($sumamontoinventario, '1', 2);
  
  $datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Productos,
          "id_registro" => $_POST["Sumaidproducto"],
          "Rnc_Factura" => $Rnc_Empresa_Productos,
          "NCF" => $NAsiento,
          "Nombre_Empresa" => $_POST["NombreEmpresa"],
          "NAsiento" => $NAsiento,
          "id_grupo" => $id_grupo,
          "id_categoria" =>  $id_categoria,
          "id_generica" => $id_generica,
          "id_cuenta" => $id_cuenta,
          "Nombre_Cuenta" => $Nombre_Cuenta,
          "Fecha_AnoMes_LD" => $Fecha_AnoMes,
          "Fecha_dia_LD" => $Fecha_dia,
          "id_Proyecto" => $idproyecto,
          "CodigoProyecto" => $codproyecto,
          "debito" => $debito,
          "credito" => $credito,
          "ObservacionesLD" => $ObservacionesLD,
          "Extraer_NAsiento" => $Extraer_NAsiento,
          "Tipo_Transaccion" => $Transaccion_606,
          "Fecha_AnoMes_Trans" => $Fecha_AnoMes,
          "Fecha_dia_Trans" => $Fecha_dia ,
          "id_banco" => $id_banco,
          "referencia" =>  $_POST["Observaciones"],
          "Usuario_Creador" => $_POST["UsuarioProductos"],
          "Accion" => $Accion);

  $respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
} /*IF CONTABILIDAD */

  
$tabla = "historico_productos_empresas";
$Accion = "SUMA";

$datos = array ("Rnc_Empresa_Productos" => $_POST["RncEmpresaProductos"],
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $_POST["sumarproductoCodigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $_POST["sumarproductoDescripcion"], 
      "Stock" => $_POST["Stocksuma"], 
      "Precio_Compra" => $_POST["nuevoPrecioCompra"], 
      "Porcentaje" => $_POST["Porcentaje"], 
      "Precio_Venta" => $_POST["nuevoPrecioVenta"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $Fecha_AnoMes,
      "Fecha_dia" => $Fecha_dia,
      "NAsiento" => $NAsiento,
      "NCF" => $NAsiento,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $_POST["Observaciones"],
      "Usuario" => $_POST["UsuarioProductos"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);

$tabla = "correlativos_no_fiscal";
$Tipo_NCF = "DAI";
      
$datos = array("Rnc_Empresa" => $_POST["RncEmpresaProductos"],
          "Tipo_NCF" => $Tipo_NCF,
          "NCF_Cons" => $N);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);



        if($respuesta == "ok"){

           echo '<script>
        swal({
          type: "success",
          title: "¡Se Agrego los Productos al Stok correctamente!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "productos";
              }

              });

        </script>';




        }

       
      }/*CIERRE DE SI ISSET*/ 

    }/*CIERRE DE FUNCION DE CREAR PRODUCTOS*/
    static public function ctrRestarProducto(){
      
    if(isset($_POST["Restaidproducto"])){
      $tabla = "correlativos_no_fiscal";
      $NCF_Cons = 0;
      $Accion = "CREADO";

          /****BCF*****/
    $Tipo_NCF = "DAI";/*CONSUMIDOR FINAL MASIVO*/
    $Rnc_Empresa = $_POST["RncEmpresaProductos"];
        $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){ 


      $datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
            "Tipo_NCF" => $Tipo_NCF, 
              "NCF_Cons" => $NCF_Cons,
              "Usuario" => $_POST["UsuarioProductos"], 
              "Accion" => $Accion);
      $respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
    }
     
if($_POST["Stockrestar"] == "0"){
   echo '<script>
                swal({
                  type: "error",
                  title: "Debe colocar el Stock que va a Disminuir en el Producto!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                    }).then((result)=>{

                      if(result.value){
                        window.location = "productos";
                      }

                      });

                </script>';


    EXIT;





}
$Stok = $_POST["StockAnteriorrestar"] - $_POST["Stockrestar"];
if($Stok <  0){
   echo '<script>
                swal({
                  type: "error",
                  title: "El Stock en existencia no puede ser menor al que se va a disminuir!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                    }).then((result)=>{

                      if(result.value){
                        window.location = "productos";
                      }

                      });

                </script>';


    EXIT;





}
date_default_timezone_set('America/Santo_Domingo');

$Fecha_AnoMes = date('Ym');
$Fecha_dia = date('d');
         $tabla = "productos_empresas";

        
        $Rnc_Empresa_Productos = $_POST["RncEmpresaProductos"];
        $taRnc_Empresa_Productos = "Rnc_Empresa_Productos";
        $Codigo = $_POST["restarproductoCodigo"];
        $taCodigo = "Codigo";
        
      
        $tabla = "productos_empresas";
        $Stok = $_POST["StockAnteriorrestar"] - $_POST["Stockrestar"];

       
      $datos = array ("id" => $_POST["Restaidproducto"],
        "Stock" => $Stok,
        "Precio_Compra" => $_POST["editarPrecioCompra"],
        "Porcentaje" => $_POST["Porcentaje"],
        "Precio_Venta" => $_POST["editarPrecioVenta"],
            );

        $respuesta = ModeloProductos::mdlSumarProductos($tabla, $datos);

$id = "id";
$valoridProducto = $_POST["Restaidproducto"];
$producto = ModeloProductos::mdlEditarProductosModal($tabla, $id, $valoridProducto);

          $id_grupo_Venta = $producto["id_grupo_Venta"];
          $id_categoria_Venta = $producto["id_categoria_Venta"];
          $id_generica_Venta = $producto["id_generica_Venta"];
          $id_cuenta_Venta = $producto["id_cuenta_Venta"];
          $Nombre_CuentaContable_Venta = $producto["Nombre_CuentaContable_Venta"];



$NAsiento = "";
$NAsientoRet = "";

$Rnc_Empresa_Diario = $_POST["RncEmpresaProductos"];
$tipocod = "DAI";
$codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
foreach ($codigo as $key => $value){}

    $N = $value["NCF_Cons"]+1;
    $NAsiento = "DAI".$N;

  $idproyecto = "NO APLICA";
  $codproyecto = "NO APLICA"; 
  $id_banco = 0;

if($_POST["Contabilidad"] == 1 && $_POST["RestaTipoProducto"] == "1"){

  
$restamontoinventario = $_POST["Stockrestar"] * $_POST["editarPrecioCompra"];

$tabla = "librodiario_empresas";
  $ObservacionesLD = $_POST["Observaciones"];
  $Extraer_NAsiento = "DAI";
  $Accion = "AJUSTERESTA";
  $debito = "0";
  $credito = bcdiv($restamontoinventario, '1', 2);
  $Transaccion_606 = 1;

  $datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Productos,
          "id_registro" => $_POST["Restaidproducto"],
          "Rnc_Factura" => $Rnc_Empresa_Productos,
          "NCF" => $NAsiento,
          "Nombre_Empresa" => $_POST["NombreEmpresa"],
          "NAsiento" => $NAsiento,
          "id_grupo" => $id_grupo_Venta,
          "id_categoria" =>  $id_categoria_Venta,
          "id_generica" => $id_generica_Venta,
          "id_cuenta" => $id_cuenta_Venta,
          "Nombre_Cuenta" => $Nombre_CuentaContable_Venta,
          "Fecha_AnoMes_LD" => $Fecha_AnoMes,
          "Fecha_dia_LD" => $Fecha_dia,
          "id_Proyecto" => $idproyecto,
          "CodigoProyecto" => $codproyecto,
          "debito" => $debito,
          "credito" => $credito,
          "ObservacionesLD" => $ObservacionesLD,
          "Extraer_NAsiento" => $Extraer_NAsiento,
          "Tipo_Transaccion" => $Transaccion_606,
          "Fecha_AnoMes_Trans" => $Fecha_AnoMes,
          "Fecha_dia_Trans" => $Fecha_dia ,
          "id_banco" => $id_banco,
          "referencia" =>  $_POST["Observaciones"],
          "Usuario_Creador" => $_POST["UsuarioProductos"],
          "Accion" => $Accion);

  $respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);

  
$id_grupo = "5";
$id_categoria = "1";
$id_generica = "99";
$id_cuenta = "001";
$Nombre_Cuenta = "ajustes de inventario";

  $debito = bcdiv($restamontoinventario, '1', 2);
  $credito = "0";
  
  $datos = array("Rnc_Empresa_LD" => $Rnc_Empresa_Productos,
          "id_registro" => $_POST["Restaidproducto"],
          "Rnc_Factura" => $Rnc_Empresa_Productos,
          "NCF" => $NAsiento,
          "Nombre_Empresa" => $_POST["NombreEmpresa"],
          "NAsiento" => $NAsiento,
          "id_grupo" => $id_grupo,
          "id_categoria" =>  $id_categoria,
          "id_generica" => $id_generica,
          "id_cuenta" => $id_cuenta,
          "Nombre_Cuenta" => $Nombre_Cuenta,
          "Fecha_AnoMes_LD" => $Fecha_AnoMes,
          "Fecha_dia_LD" => $Fecha_dia,
          "id_Proyecto" => $idproyecto,
          "CodigoProyecto" => $codproyecto,
          "debito" => $debito,
          "credito" => $credito,
          "ObservacionesLD" => $ObservacionesLD,
          "Extraer_NAsiento" => $Extraer_NAsiento,
          "Tipo_Transaccion" => $Transaccion_606,
          "Fecha_AnoMes_Trans" => $Fecha_AnoMes,
          "Fecha_dia_Trans" => $Fecha_dia ,
          "id_banco" => $id_banco,
          "referencia" =>  $_POST["Observaciones"],
          "Usuario_Creador" => $_POST["UsuarioProductos"],
          "Accion" => $Accion);

  $respuesta = ModeloDiario::mdllibrodiario($tabla, $datos);
} /*IF CONTABILIDAD */

  
$tabla = "historico_productos_empresas";
$Accion = "RESTA";

$datos = array ("Rnc_Empresa_Productos" => $_POST["RncEmpresaProductos"],
      "id_Empresa" => $_POST["id_Empresa"],
      "id_categorias" => $producto["id_categorias"], 
      "Codigo" => $_POST["restarproductoCodigo"], 
      "tipoproducto" => $producto["tipoproducto"],
      "Descripcion" => $_POST["restarproductoDescripcion"], 
      "Stock" => $_POST["Stockrestar"], 
      "Precio_Compra" => $_POST["editarPrecioCompra"], 
      "Porcentaje" => $_POST["Porcentaje"], 
      "Precio_Venta" => $_POST["editarPrecioVenta"], 
      "Imagen" => $producto["Imagen"],
      "id_grupo_Venta" => $id_grupo_Venta,
      "id_categoria_Venta" => $id_categoria_Venta,
      "id_generica_Venta" => $id_generica_Venta,
      "id_cuenta_Venta" => $id_cuenta_Venta,
      "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
      "Fecha_AnoMes" => $Fecha_AnoMes,
      "Fecha_dia" => $Fecha_dia,
      "NAsiento" => $NAsiento,
      "NCF" => $NAsiento,
      "Extraer_NAsiento" => $Extraer_NAsiento,
      "Observaciones" => $_POST["Observaciones"],
      "Usuario" => $_POST["UsuarioProductos"],
      "Accion" => $Accion);
$respuesta = ModeloProductos::mdlActulalizarHistoricoProductos($tabla, $datos);

$tabla = "correlativos_no_fiscal";
$Tipo_NCF = "DAI";
      
$datos = array("Rnc_Empresa" => $_POST["RncEmpresaProductos"],
          "Tipo_NCF" => $Tipo_NCF,
          "NCF_Cons" => $N);

$respuesta = ModeloCorrelativos::MdlActualizarCorrelativosFac($tabla, $datos);



        if($respuesta == "ok"){

           echo '<script>
        swal({
          type: "success",
          title: "¡Se Disminuyó los Productos al Stok correctamente!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "productos";
              }

              });

        </script>';




        }

       
      }/*CIERRE DE SI ISSET*/ 

    }/*CIERRE DE FUNCION DE CREAR PRODUCTOS*/
static public function ctrEditarProducto(){
      
    if(isset($_POST["editarDescripcion"])){
      if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.()%*-+ ]+$/', $_POST["editarDescripcion"]))){

       
       echo '<script>
        swal({
          type: "error",
          title: "¡La Descripcion no puede ir con los campos vacio o llevar caracteres especiales!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "productos";
              }

              });

        </script>';
          exit; 


     }


         $tabla = "productos_empresas";

        
        $Rnc_Empresa_Productos = $_POST["RncEmpresaProductos"];
        $taRnc_Empresa_Productos = "Rnc_Empresa_Productos";
        $Codigo = $_POST["editarCodigo"];
        $taCodigo = "Codigo";
        
      

$CodigoRepetido = ModeloProductos::MdlProductoRepetido($tabla, $Rnc_Empresa_Productos, $taRnc_Empresa_Productos, $Codigo, $taCodigo);

if($CodigoRepetido != false && $CodigoRepetido["Rnc_Empresa_Productos"] == $Rnc_Empresa_Productos && $CodigoRepetido["Codigo"] == $Codigo && $CodigoRepetido["id"] != $_POST["idproducto"]){
      echo '<script>
                swal({

                  type: "error",
                  title: "ESTE CODIGO ESTA REPETIDO!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                    }).then((result)=>{

                      if(result.value){
                        window.location = "productos";
                      }

                      });

                </script>';
            exit;

    }
  



/***************************VALIDAR IMAGEN*********************************/

        $Ruta = $_POST["imagenActual"];

      


            if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

              list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

              $nuevoAncho = 500;
              $nuevoAlto = 500;

              /****************************
              CREAMOS DIRECTORIO DONDE VAVMOS A GUARDAR LA FOTO DEL USUARIO
              ********************************/
              $directorio ="vistas/img/productos/".$_POST["id_Empresa"]."/".$_POST["editarCodigo"];

              /********************************************************
              PRIMERO PREGUNTAMOS SI EXITE UNA IMAGEN EN LA BASES DE DATOS
              **********************************************************/
              if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){ 

                unlink($_POST["imagenActual"]);
              
              }

              else {

                mkdir($directorio, 0755);


              }

              

              /*******************************************
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES´POR DEFECTO DE PHP

              ****************************************/
              if($_FILES["editarImagen"]["type"] == "image/jpeg"){

                $aleatorio = mt_rand(100, 999);

                /*guardamos en el directorio*/
                $Ruta = "vistas/img/productos/".$_POST["id_Empresa"]."/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";
                $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                imagejpeg($destino, $Ruta);
              }/*SI DEL LA IMAGEN JPEG*/

              if($_FILES["editarImagen"]["type"] == "image/png"){
                $aleatorio = mt_rand(100, 999);

                /*guardamos en el directorio*/
                $Ruta = "vistas/img/productos/".$_POST["id_Empresa"]."/".$_POST["editarCodigo"]."/".$aleatorio.".png";
                $origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                imagepng($destino, $Ruta);
              }/*SI DEL LA IMAGEN PNG*/
        
            }/* SI DE VALIDAR IMAGEN*/

      if(isset($_POST["Editar-plancuentaProducto"])){
        $EditarplancuentaProducto = $_POST["Editar-plancuentaProducto"];
        $id_grupo_Venta = 4;
              $id_categoria_Venta = 9;
              $id_generica_Venta = "01";
              $id_cuenta_Venta = "001";
              $Nombre_CuentaContable_Venta = "otros ingresos";

      } else {

        $EditarplancuentaProducto = $_POST["EditarplancuentaProducto"];
        $idcuenta = "id";
        $valoridcuenta = $EditarplancuentaProducto;
        $RncEmpresaEC = "Rnc_Empresa_cuentas";
        $valorRncEmpresaEC = $_POST["RncEmpresaProductos"];

    $Cuenta = ControladorContabilidad::ctreditarcuenta($RncEmpresaEC, $valorRncEmpresaEC, $idcuenta, $valoridcuenta);

              $id_grupo_Venta = $Cuenta["id_grupo"];
              $id_categoria_Venta = $Cuenta["id_categoria"];
              $id_generica_Venta = $Cuenta["id_generica"];
              $id_cuenta_Venta = $Cuenta["id_subgenerica"];
              $Nombre_CuentaContable_Venta = $Cuenta["Nombre_subCuenta"];

          }


        $tabla = "productos_empresas";

       
      $datos = array ("id" => $_POST["idproducto"],
        "Rnc_Empresa_Productos" => $_POST["RncEmpresaProductos"],
        "id_Empresa" => $_POST["id_Empresa"],
        "Codigo" => $_POST["editarCodigo"],
        "tipoproducto" => $_POST["Editartipoproducto"],
        "id_categorias" => $_POST["editarCategoria"],
        "Descripcion" => $_POST["editarDescripcion"],
        "Porcentaje" => $_POST["Porcentaje"],
        "Precio_Venta" => $_POST["PrecioVenta"],
        "Imagen" => $Ruta,
        "id_grupo_Venta" => $id_grupo_Venta,
        "id_categoria_Venta" => $id_categoria_Venta,
        "id_generica_Venta" => $id_generica_Venta,
        "id_cuenta_Venta" => $id_cuenta_Venta,
        "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta);

        $respuesta = ModeloProductos::mdlEditarProductos($tabla, $datos);

        if($respuesta == "ok"){

           echo '<script>
        swal({
          type: "success",
          title: "¡El Producto se ha Modificado correctamente!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "productos";
              }

              });

        </script>';




        }

       
      }/*CIERRE DE SI ISSET*/ 

    }/*CIERRE DE FUNCION DE CREAR PRODUCTOS*/

    /*************************************
            BORRAR PRODUCTO
    **************************************/
    static public function ctrEliminarProducto(){

      if(isset($_GET["idProducto"])){

        $tabla = "productos_empresas";
        $idProducto = $_GET["idProducto"];
        $idempresa = $_GET["idempresa"];

        if($GET["Imagen"] != "" && $_GET["Imagen"] = "vistas/img/productos/default/anonymous.png"){

          unlink($GET["Imagen"]);
          rmdir('vistas/img/productos/'.$idempresa.'/'.$_GET["Codigo"]);

            }

            $respuesta = ModeloProductos::mdlEliminarProductos($tabla, $idProducto);

            if($respuesta == "ok"){

              echo '<script>
                      swal({
                        type: "success",
                        title: "¡El Producto se ha ELIMINADO!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                          }).then((result)=>{

                            if(result.value){
                              window.location = "productos";
                            }

                            });

                </script>';





            }





       

      }


      







    }/*CIERRE DE FUNCION BORRAR PRODUCTO*/

    /**************************************************
    **************************************************/

     static public function ctrNombreProductosVentas($Rnc_Empresa_Productos, $Descripcion){
    
    /*if(isset($_GET["RncEmpresaProductos"])){*/

      /*$Rnc_Empresa_Productos = $_GET["RncEmpresaProductos"];*/
      
      $tabla = "productos_empresas";
      $taDescripcion = "Descripcion";
      $taRncEmpresaProductos = "Rnc_Empresa_Productos";
  
      
      

    $respuesta = ModeloProductos::mdlNombreProductosVentas($tabla, $taDescripcion, $taRncEmpresaProductos, $Rnc_Empresa_Productos, $Descripcion);

    return $respuesta;
    /*}*/

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/

    /***********************************************
    PRODUCTOS MAS VENDIDOS
    *************************************************/
    
    static public function ctrMostrarProductosmasVendidos($Rnc_Empresa_Productos, $orden){

      $tabla = "productos_empresas";
      $taRncEmpresaProductos = "Rnc_Empresa_Productos";
      
      

    $respuesta = ModeloProductos::mdlMostrarProductosmasVendidos($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos, $orden);

    return $respuesta;


    }
    /***************************************
        MOSTRAR SUMA VENTAS
    ****************************************/

     static public function ctrMostrarSumaVentas($Rnc_Empresa_Productos){

      $tabla = "productos_empresas";
      $taRncEmpresaProductos = "Rnc_Empresa_Productos";
      
      

    $respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos);

    return $respuesta;


    }

    static public function ctrMostrarProductosRecientes($Rnc_Empresa_Productos){
    
    /*if(isset($_GET["RncEmpresaProductos"])){*/

      /*$Rnc_Empresa_Productos = $_GET["RncEmpresaProductos"];*/
      
      $tabla = "productos_empresas";
      $taRncEmpresaProductos = "Rnc_Empresa_Productos";
      $orden = "id";
      
      

    $respuesta = ModeloProductos::mdlMostrarProductosRecientes($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos, $orden);

    return $respuesta;
    /*}*/

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/

static public function ctrplanProductos($Rnc_Empresa_Cuentas, $id_grupo){

    $tabla = "subgenerica_empresas";
    $taRnc_Empresa_Cuentas = "Rnc_Empresa_Cuentas";
    $taid_grupo = "id_grupo";
    

    $respuesta = ModeloProductos::mdlplanProducto($tabla, $Rnc_Empresa_Cuentas, $taRnc_Empresa_Cuentas, $id_grupo, $taid_grupo);

    return $respuesta;


  }/*CIRRE DE FUNCION MOSTRAR VENTAS*/



static public function ctrLectorProductos($codigo, $RncEmpresaLector){
    
    /*if(isset($_GET["RncEmpresaProductos"])){*/

      /*$Rnc_Empresa_Productos = $_GET["RncEmpresaProductos"];*/
      
      $tabla = "productos_empresas";
      $taRncEmpresaLector = "Rnc_Empresa_Productos";
      $tacodigo = "Codigo";
      
      

  $respuesta = ModeloProductos::mdlLectorProductos($tabla, $taRncEmpresaLector, $RncEmpresaLector, $tacodigo, $codigo);

    return $respuesta;
    /*}*/

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/




   }/*CIERRO CLASES DE PRODUCTOS*/
