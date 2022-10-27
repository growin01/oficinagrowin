<?php 
 

class ControladorActivoR{

  static public function ctrMostrarProductosActivoR($Rnc_Empresa_Productos){
  	
    /*if(isset($_GET["RncEmpresaProductos"])){*/

  		/*$Rnc_Empresa_Productos = $_GET["RncEmpresaProductos"];*/
      
		  $tabla = "productos_activor_empresas";
    	$taRncEmpresaProductos = "Rnc_Empresa_Productos";
    	
    	

		$respuesta = ModeloActivoR::mdlMostrarProductosActivoR($tabla, $taRncEmpresaProductos, $Rnc_Empresa_Productos);

		return $respuesta;
		/*}*/

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/

    /**********************************************
    MOSTRAR PRODUCTOS POR ID
    ************************************************/

    static public function ctrMostrarProductosid($id, $idProducto){

      $tablaProductos = "productos_activor_empresas";
      $valorid = $idProducto;
     
      

    $respuesta = ModeloProductos::mdlMostrarProductosid($tablaProductos, $id, $valorid);

    return $respuesta;




    }/*CIERRE MOSTRAR PRODCUTOS ID*/


  static public function ctrMostrarCodigoActivoR($taRnc_Empresa, $Rnc_Empresa, $tacategorias, $idcategorias){
    
   
    $tabla = "productos_activor_empresas";
  
  $respuesta = ModeloActivoR::mdlMostrarCodigoActivoR($tabla, $taRnc_Empresa, $Rnc_Empresa, $tacategorias, $idcategorias);

    return $respuesta;
  

    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/


    /********************************************************************
        INICIO FUNCION DE CREAR PRODUCTOS
    *********************************************************************/

static public function ctrCrearProductoActivoR(){
      
  if(isset($_POST["nuevaDescripcion"])){
        
    if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.()% ]+$/', $_POST["nuevaDescripcion"]))){

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

    if(!(preg_match('/^[0-9]+$/', $_POST["nuevoStock"]))){
         echo '<script>
        swal({
          type: "error",
          title: "¡El Stock no puede ir con los campos vacio o llevar caracteres especiales!",
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
      if(!(preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]))){
         echo '<script>
        swal({
          type: "error",
          title: "¡El Precio de Compra no puede ir con los campos vacio o llevar caracteres especiales!",
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
      if(!(preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"]))){
         echo '<script>
        swal({
          type: "error",
          title: "¡El Precio de Venta no puede ir con los campos vacio o llevar caracteres especiales!",
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

      $Ruta = "vistas/img/productosactivor/default/anonymous.png";


if(isset($_FILES["nuevaImagen"]["tmp_name"]) && !empty($_FILES["nuevaImagen"])){

      list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

      $nuevoAncho = 500;
      $nuevoAlto = 500;
  
      

/**DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP***/
  if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){


          /*guardamos en el directorio*/
  $Ruta = "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["nuevaCategoriaActivoR"]."/".$_POST["maquetaCompletoActivoR"].".jpg";

  $origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);
  $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

  imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
  imagejpeg($destino, $Ruta);
    }/*SI DEL LA IMAGEN JPEG*/

  if($_FILES["nuevaImagen"]["type"] == "image/png"){
            
                /*guardamos en el directorio*/
    $Ruta = "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["nuevaCategoriaActivoR"]."/".$_POST["maquetaCompletoActivoR"].".png";
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
            $valorRncEmpresaEC = $_POST["RncEmpresaActivoR"];

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


$tabla = "productos_activor_empresas";

$datos = array ("Rnc_Empresa_Productos" => $_POST["RncEmpresaActivoR"], 
          "Codigo" => $_POST["CodigoCompletoActivoR"], 
          "codigo_categorias" => $_POST["nuevaCategoriaActivoR"], 
          "codigo_producto" => $_POST["nuevoCodigoActivoR"],
          "ubicacion" => $_POST["UbicacionProducto"], 
          "maquetacodigo_completo" => $_POST["maquetaCompletoActivoR"],
          "Descripcion" => $_POST["nuevaDescripcion"],
          "Stock" => $_POST["nuevoStock"], 
          "Precio_Compra" => $_POST["nuevoPrecioCompra"], 
          "Porcentaje" => $_POST["Porcentaje"], 
          "Precio_Venta" => $_POST["nuevoPrecioVenta"], 
          "Imagen" => $Ruta,
          "id_grupo_Venta" => $id_grupo_Venta,
          "id_categoria_Venta" => $id_categoria_Venta,
          "id_generica_Venta" => $id_generica_Venta,
          "id_cuenta_Venta" => $id_cuenta_Venta,
          "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
          "Usuario" => $_POST["UsuarioProductos"]);

$respuesta = ModeloActivoR::mdlCrearProductosActivoR($tabla, $datos);


        if($respuesta == "ok"){

    
          $ModuloProducto = $_POST["ModuloProducto"];

            switch ($ModuloProducto) {
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
                                
                                window.location = "ProductosActivoRotativos";
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
                                window.location = "  productosresumen";
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
            }/*cierre switch*/

    }/*cierre if respuesta*/


      }/*CIERRE DE SI ISSET*/ 

    }/*CIERRE DE FUNCION DE CREAR PRODUCTOS*/


  static public function ctrEditarActivorModal($id, $valoridProducto){
    
   
      $tabla = "productos_activor_empresas";
  

    $respuesta = ModeloActivoR::mdlEditarActivoRModal($tabla, $id, $valoridProducto);

    return $respuesta;
   
    }/*CIERRE FUNCICON DE MOSTRAR CATEGORIAS*/

    /********************************************************************
        INICIO FUNCION DE Editar PRODUCTOS
    *********************************************************************/

    static public function ctrEditarProductoActivor(){
      
    if(isset($_POST["editarDescripcion"])){
        
      if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.()% ]+$/', $_POST["editarDescripcion"]))){

       echo '<script>
        swal({
          type: "error",
          title: "¡La Descripcion no puede ir con los campos vacio o llevar caracteres especiales!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "ProductosActivoRotativos";
              }

              });

        </script>';
          exit; 

     }
     if(!(preg_match('/^[0-9]+$/', $_POST["editarStock"]))){
         echo '<script>
        swal({
          type: "error",
          title: "¡El Stock no puede ir con los campos vacio o llevar caracteres especiales!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "ProductosActivoRotativos";
              }

              });

        </script>';
          exit; 

      } 

    
      if(!(preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]))){
         echo '<script>
        swal({
          type: "error",
          title: "¡El Precio de Compra no puede ir con los campos vacio o llevar caracteres especiales!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "ProductosActivoRotativos";
              }

              });

        </script>';
          exit; 

      } 
      if(!(preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"]))){
         echo '<script>
        swal({
          type: "error",
          title: "¡El Precio de Venta no puede ir con los campos vacio o llevar caracteres especiales!",
          showConfirmButton: true,
          confirmButtonText: "Cerrar",
          closeOnConfirm: false
            }).then((result)=>{

              if(result.value){
                window.location = "ProductosActivoRotativos";
              }

              });

        </script>';
          exit; 

      }

        /***************************************
                 VALIDAR IMAGEN
        ******************************************/

    $Ruta = $_POST["imagenActual"];

    if(isset($_POST["habilitarubicacion"]) && $_POST['habilitarubicacion'] == '1'){
      $tipoimagen = substr($_POST["imagenActual"], -3);

      if($tipoimagen == "jpg"){
         rename ("vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["editarCategoria"]."/".$_POST["AntesEditarmaquetaCompletoActivoR"].".jpg", "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["editarCategoria"]."/".$_POST["EditarmaquetaCompletoActivoR"].".jpg");


      }else{
        rename ("vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["editarCategoria"]."/".$_POST["AntesEditarmaquetaCompletoActivoR"].".png", "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["editarCategoria"]."/".$_POST["EditarmaquetaCompletoActivoR"].".png");


      }
      
     

    }

  if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

      list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

        $nuevoAncho = 500;
        $nuevoAlto = 500;

              /****************************
              CREAMOS DIRECTORIO DONDE VAVMOS A GUARDAR LA FOTO DEL USUARIO
              ********************************/


              /********************************************************
              PRIMERO PREGUNTAMOS SI EXITE UNA IMAGEN EN LA BASES DE DATOS
              **********************************************************/
  if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] == "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["editarCategoria"]."/".$_POST["AntesEditarmaquetaCompletoActivoR"].".jpg"){ 

                unlink($_POST["imagenActual"]);
              
        }

              

      if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] == "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["editarCategoria"]."/".$_POST["AntesEditarmaquetaCompletoActivoR"].".png"){ 

                unlink($_POST["imagenActual"]);
              
      }

              

              /*******************************************
              DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES´POR DEFECTO DE PHP

              ****************************************/
    if($_FILES["editarImagen"]["type"] == "image/jpeg"){

                $aleatorio = mt_rand(100, 999);

                /*guardamos en el directorio*/
  $Ruta = "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["editarCategoria"]."/".$_POST["EditarmaquetaCompletoActivoR"].".jpg";
                $origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                imagejpeg($destino, $Ruta);
              }/*SI DEL LA IMAGEN JPEG*/

              if($_FILES["editarImagen"]["type"] == "image/png"){
                $aleatorio = mt_rand(100, 999);

                /*guardamos en el directorio*/
$Ruta = "vistas/img/productosactivor/".$_POST["id_Empresa"]."/".$_POST["id_Empresa"]."-".$_POST["editarCategoria"]."/".$_POST["EditarmaquetaCompletoActivoR"].".png";
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


    $tabla = "productos_activor_empresas";



$datos = array ("id" => $_POST["idActivoR"],
  "Rnc_Empresa_Productos" => $_POST["RncEmpresaActivoR"],
  "Codigo" => $_POST["EditarCodigoCompletoActivoR"],  
                "codigo_categorias" => $_POST["editarCategoria"], 
                "codigo_producto" => $_POST["editarCodigoActivoR"],
                "ubicacion" => $_POST["EditarUbicacionProducto"], 
                "maquetacodigo_completo" => $_POST["EditarmaquetaCompletoActivoR"],
                
                "Descripcion" => $_POST["editarDescripcion"],
                "Stock" => $_POST["editarStock"], 
                "Precio_Compra" => $_POST["editarPrecioCompra"], 
                "Porcentaje" => $_POST["nuevoPorcentaje"], 
                "Precio_Venta" => $_POST["editarPrecioVenta"], 
                "Imagen" => $Ruta,
                 "id_grupo_Venta" => $id_grupo_Venta,
        "id_categoria_Venta" => $id_categoria_Venta,
        "id_generica_Venta" => $id_generica_Venta,
        "id_cuenta_Venta" => $id_cuenta_Venta,
        "Nombre_CuentaContable_Venta" => $Nombre_CuentaContable_Venta,
                "Usuario" => $_POST["UsuarioProductos"]);

$respuesta = ModeloActivoR::mdlEditarActivoR($tabla, $datos);

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
                window.location = "ProductosActivoRotativos";
              }

              });

        </script>';




        }

       

      }/*CIERRE DE SI ISSET*/ 

    }/*CIERRE DE FUNCION DE CREAR PRODUCTOS*/

    /*************************************
            BORRAR PRODUCTO
    **************************************/
    static public function ctrEliminarActivoR(){

      if(isset($_GET["idProducto"])){

        $tabla = "productos_activor_empresas";
        $idProducto = $_GET["idProducto"];

        if($_GET["Imagen"] != "" && $_GET["Imagen"] != "vistas/img/productosactivor/default/anonymous.png"){

          unlink($_GET["Imagen"]);
         

            }

            $respuesta = ModeloActivoR::mdlEliminarActivoR($tabla, $idProducto);

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
                              window.location = "ProductosActivoRotativos";
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




   }/*CIERRO CLASES DE PRODUCTOS*/
