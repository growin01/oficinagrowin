<?php 

class ControladorUsuarios{

  /***************************************************************************************************
                    INCIO FUNCION LOGIN USUARIOS
  ***************************************************************************************************/

  static public function ctrLoginUsuario(){

    if(isset($_POST["ingRncEmpresa"]) && isset($_POST["ingUsuario"])){
      if(!preg_match('/^[0-9]+$/', $_POST["ingRncEmpresa"])){
         
         echo '<script>
                swal({

                  type: "error",
                  title: "¡El RNC Solo debe contener Números!",
                  showConfirmButton: false,
                  timer: 4000
                  
                    }).then(()=>{
                  window.location = "ingreso";
                          
                          });
                        
                </script>'; 
          exit;         

      } 
      
      
      if(!preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])){
         echo '<script>
                swal({

                  type: "error",
                  title: "¡El Usuario tiene Caracteres Invalidos!",
                  showConfirmButton: false,
                  timer: 4000
                  closeOnConfirm: false
                   timer: 4000
                  
                    }).then(()=>{
                  window.location = "ingreso";
                          
                          });
                        
                </script>'; 
          exit;         




      }
      
      if(!preg_match('/^[0-9]+$/', $_POST["ingPassword"])){
         echo '<script>
                swal({

                  type: "error",
                  title: "¡La Contraseña tiene Caracteres Invalidos!",
                  showConfirmButton: false,
                  timer: 4000

                    }).then(()=>{
                  window.location = "ingreso";
                          
                          });
                        
                </script>'; 
          exit;         



      }


        $tabla = 'usuarios_empresas';
        $taRncEmpresaUsuario = 'Rnc_Empresa_Usuario';
        $taUsuario = 'Usuario';
        $RncEmpresaUsuario = $_POST["ingRncEmpresa"];
        $Usuario = $_POST["ingUsuario"];
        $encriptar = md5($_POST["ingPassword"]);
       

        $respuesta = ModeloUsuarios::MdlLoginUsuario($tabla, $Usuario, $taUsuario, $taRncEmpresaUsuario, $RncEmpresaUsuario);

        if (!$respuesta) {
           echo '<script>
                swal({

                  type: "error",
                  title: "¡Error al Validarse!",
                  showConfirmButton: false,
                timer: 4000
                  
                    }).then(()=>{
                  window.location = "ingreso";
                          
                          });
                        
                </script>'; 
          exit;         

        }
        
        if($respuesta["Rnc_Empresa_Usuario"] != $_POST["ingRncEmpresa"]){
           echo '<script>
                swal({

                  type: "error",
                  title: "¡Error al Validarse, EL RNC NO COINCIDE!",
                  showConfirmButton: false,
                  timer: 4000
                  
                    }).then(()=>{
                  window.location = "ingreso";
                          
                          });
                        
                </script>'; 
          exit;         




        }
          
          if($respuesta["Usuario"] != $_POST["ingUsuario"]){
             echo '<script>
                swal({

                  type: "error",
                  title: "¡Error al Validarse, EL USUARIO NO COINCIDE!",
                  showConfirmButton: false,
                 timer: 4000
                  
                    }).then(()=>{
                  window.location = "ingreso";
                          
                          });
                        
                </script>'; 
          exit;         




          } 
            if($respuesta["Password"] != $encriptar){

              echo '<script>
                swal({

                  type: "error",
                  title: "¡Error al Validarse, LA CONTRASEÑA NO COINCIDE!",
                  showConfirmButton: false,
                  timer: 4000
                  
                    }).then(()=>{
                  window.location = "ingreso";
                          
                          });
                        
                </script>'; 
          exit;         

            }
            
            if($respuesta["Estado"] != 1){

               echo '<script>
                swal({

                  type: "error",
                  title: "¡Este Usuario no esta activado para entrar al sistema!",
                  showConfirmButton: false,
                  timer: 4000
                  
                    }).then(()=>{
                  window.location = "ingreso";
                          
                          });
                        
                </script>'; 
          exit;         

            } 

              $_SESSION["iniciarSesion"] = "ok";
              $_SESSION["id"] = $respuesta["id"];
              $_SESSION["RncEmpresaUsuario"] = $respuesta["Rnc_Empresa_Usuario"];
              $_SESSION["Usuario"] = $respuesta["Usuario"];
              $_SESSION["Nombre"] = $respuesta["Nombre"];
              $_SESSION["Perfil"] = $respuesta["Perfil"];
              $_SESSION["Foto"] = $respuesta["Foto"];
              $_SESSION["Correousuario"] = $respuesta["emailusuario"];
              $_SESSION["Descuento"] = $respuesta["Descuento"];

          /*******************************************
          REGISTRAR FECHA Y HORA DEL ULTIMO LOGIN
          ***************************************/
          date_default_timezone_set('America/Santo_Domingo');

          $fecha = date('Y-m-d');
          $hora = date('H:i:s');
          $fechaActual = $fecha.' '.$hora;

          $id = 'id';
          $valorid = $respuesta["id"];

          $Ultimo_Login = 'Ultimo_Login';
          $valorlogin = $fechaActual;
          
            $Rnc_Empresa = $respuesta["Rnc_Empresa_Usuario"];
            $Rnc_Empresa_Master = null;
            $Orden = "id";

          $respuesta = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);

          $_SESSION["idEmpresa"] = $respuesta["id"];
          $_SESSION["Tipo_Id_Empresa"] = $respuesta["Tipo_Id_Empresa"];
          $_SESSION["CorreoEmpresa"] = $respuesta["Correo_Empresa"];
          $_SESSION["NombreEmpresa"] = $respuesta["Nombre_Empresa"];
          $_SESSION["DireccionEmpresa"] = $respuesta["Direccion_Empresa"];
          $_SESSION["TelefonoEmpresa"] = $respuesta["Telefono_Empresa"];
          $_SESSION["CorreoEmpresa"] = $respuesta["Correo_Empresa"];
          $_SESSION["Modelo_Factura"] = $respuesta["Modelo_Factura"];
          $_SESSION["Facturacion"] = $respuesta["Facturacion"];
          $_SESSION["PorDescuentoConf"] = $respuesta["Pordescuento"];
          $_SESSION["Compras"] = $respuesta["Compras"];
          $_SESSION["Contabilidad"] = $respuesta["Contabilidad"];
          $_SESSION["Banco"] = $respuesta["Banco"];
          $_SESSION["Proyecto"] = $respuesta["Proyecto"];
          $_SESSION["Inventario"] = $respuesta["Inventario"];
          $_SESSION["Impresora"] = $respuesta["Impresora"];
          $_SESSION["Anologin"] = "2022";
          $_SESSION["Perido"] = array("2022", "2021", "2020", "2019", "2018", "TODO");
          


          $Rnc_Empresa = $respuesta["Rnc_Empresa_Master"];
          $Rnc_Empresa_Master = null;
             $Orden = "id";

            $respuesta = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);

            $_SESSION["NombreEmpresaMaster"] = $respuesta["Nombre_Empresa"];
           

          $respuestalogin = ModeloUsuarios::MdlUtimoLoginUsuario($tabla, $id, $valorid, $Ultimo_Login, $valorlogin);
          
          
          $tabla = "logueos_empresas";
          $fechaanomes = substr($fecha, 0, 7);
          $fechaano = substr($fechaanomes, 0, 4);
          $fechames = substr($fechaanomes, -2);
          $Fecha_AnoMes = $fechaano.$fechames;
          
          $Fecha_Dia = substr($fecha, -2);

          $datos = array("Rnc_Empresa_Usuario" => $_SESSION["RncEmpresaUsuario"],
            "Nombre_Empresa" => $_SESSION["NombreEmpresa"],
            "Nombre_Usuario" => $_SESSION["Nombre"], 
            "Perfil" => $_SESSION["Perfil"], 
            "Fecha_AnoMes" => $Fecha_AnoMes, 
            "Fecha_Dia" => $Fecha_Dia, 
            "Fecha_Login" => $valorlogin);
        
        $respuesta = ModeloUsuarios::MdllogueoUsuarioEmpresas($tabla, $datos);



          if($respuestalogin == "ok"){

            echo '<script>
              window.location = "inicio";

          </script>';


          }         


           
    }/* CIERRO ISSET DE VER SI VIENE VARIABLE POST*/

  }/* CIERRO FUNCION DE LOGIN USUARIOS*/


  static public function ctrCrearUsuario(){
    if(isset($_POST["nuevoUsuario"])){
     
        
        if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ& ]+$/', $_POST["nuevoNombre"]))){
    
          echo '<script>
                swal({

                  type: "error",
                  title: "¡Caracter Invalido Nuevo Nombre, como los son !"#$%/=*-_!",
                  showConfirmButton: false,
                  timer: 6000
                  }).then(()=>{
                  window.location = "usuarios";
                          
                          });
                        
                </script>'; 
          exit;   
        } 
        if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoUsuario"]))){
    
          echo '<script>
                swal({

                  type: "error",
                  title: "¡Caracter Invalido Nuevo Usuario, como los son !"#$%/=*-_!",
                  showConfirmButton: false,
                  timer: 6000
                  }).then(()=>{
                  window.location = "usuarios";
                          
                          });
                        
                </script>'; 
          exit;   
        } 
        if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/',  $_POST["nuevoPassword"]))){
    
          echo '<script>
                swal({

                  type: "error",
                  title: "¡Caracter Invalido Nuevo para la contraseña, como los son !"#$%/=*-_!",
                  showConfirmButton: false,
                  timer: 6000
                  }).then(()=>{
                  window.location = "usuarios";
                          
                          });
                        
                </script>'; 
          exit;   
        } 
        /*********************************************
        VALIDAR IMAGEN
        ***********************************************/
        $Ruta = "";


        if(isset($_FILES["nuevaFoto"]["tmp_name"])){

          list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /****************************
          CREAMOS DIRECTORIO DONDE VAVMOS A GUARDAR LA FOTO DEL USUARIO
          ********************************/
          $directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

          mkdir($directorio, 0755);

          /*******************************************
          DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES´POR DEFECTO DE PHP

          ****************************************/
          if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

            $aleatorio = mt_rand(100, 999);

            /*guardamos en el directorio*/
            $Ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $Ruta);
          }/*SI DEL LA IMAGEN JPEG*/

          if($_FILES["nuevaFoto"]["type"] == "image/png"){
            $aleatorio = mt_rand(100, 999);

            /*guardamos en el directorio*/
            $Ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $Ruta);
          }/*SI DEL LA IMAGEN PNG*/
    
        }/* SI DE VALIDAR IMAGEN*/



        $tabla = 'usuarios_empresas';
        $encriptar = md5($_POST["nuevoPassword"]);
        $Estado = "1";
        $Descuento = "0";




        $datos = array("Rnc_Empresa_Usuario" => $_POST["RncEmpresaUsuario"], "Nombre" => $_POST["nuevoNombre"], "Usuario" => $_POST["nuevoUsuario"], "Password" => $encriptar, "Perfil" => $_POST["nuevoPerfil"], "Foto" => $Ruta, "emailusuario" => $_POST["emailusuario"], "Estado" => $Estado, "Descuento" => $Descuento);
        
        $respuesta = ModeloUsuarios::MdlCrearUsuario($tabla, $datos);
        
        if($respuesta == "ok"){

            echo '<script>
          swal({
            type: "success",
            title: "¡El Usuario Se Guardo Correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
              }).then((result)=>{

                if(result.value){
                  window.location = "usuarios";
                }

                });

          </script>';
          
        }/* CIERRO SI DE RESPUESTA */
        

      
    }/* CIERRO ISSET DE VER SI VIENE VARIABLE POST*/

  }/* CIERRO FUNCION DE CREAR USUARIOS*/

  static public function ctrCrearUsuarioMasivo(){
    if(isset($_POST["RncUsuarioMasivo"])){
    

          $tabla = "empresas";
          $taRncEmpresa = "Rnc_Empresa";
          $taRnc_Empresa_Master = "Rnc_Empresa_Master";
          $Rnc_Empresa = $_POST["RncUsuarioMasivo"];
          $Rnc_Empresa_Master = $_POST["RncUsuarioMasivo"];
          $Orden = "id";
          


          $Empresa = ModeloEmpresas::mdlMostrarEmpresas($tabla, $taRncEmpresa, $Rnc_Empresa, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $Orden);

          var_dump($Empresa);

        
   foreach ($Empresa as $key => $value){
       
         $tabla = 'usuarios_empresas';
        

          $Rnc_Empresa = $value["Rnc_Empresa"];
          $Estado = "1";
          $Ruta = "";

        /******************************************/

          $nombre = "LAURA";
          $usuario = "jnjdldsk";
          $Perfil = "Programador";
          $clave = "0112201225072017";
          $encriptar = md5($clave);




          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
           /******************************************/

    
          /*************************/
          
          $nombre = "ZAPATA";
          $usuario = "ZAPATA";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);



          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************/
          $nombre = "DIEGO";
          $usuario = "DIEGO";
          $Perfil = "Administrador";
          $clave = "198416";
          $encriptar = md5($clave);
         
          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
          $nombre = "KEVIN";
          $usuario = "KEVIN";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);

        $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /******USUARIOS******************/
          $nombre = "NICOLE";
          $usuario = "NICOLE";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);

          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
           /******USUARIOS******************/          
          $nombre = "TERESA";
          $usuario = "TERESA";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);

          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
          
          /******USUARIOS******************/ 
          $nombre = "MANUEL";
          $usuario = "MANUEL";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);

          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
           /******USUARIOS******************/ 
          $nombre = "FRANCISCO";
          $usuario = "FRANCISCO";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);

      $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
          /******USUARIOS******************/ 
          $nombre = "WILLIAMS";
          $usuario = "WILLIAMS";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);

        $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
  
          /******USUARIOS******************/          
          $nombre = "ALGENIS";
          $usuario = "ALGENIS";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);

        $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
          
         
          /******USUARIOS******************/


          
          $nombre = "BRAULY";
          $usuario = "BRAULY";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);




          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/

           /******USUARIOS******************/


          
          $nombre = "BRAYAN";
          $usuario = "BRAYAN";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);




          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
         
          /******USUARIOS******************/


          
          $nombre = "ALEXANDER";
          $usuario = "ALEXANDER";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);




          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
           /******USUARIOS******************/


          
          $nombre = "HAIRO";
          $usuario = "HAIRO";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);




          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
        
          
          /******USUARIOS******************/


          
          $nombre = "ROBERKIS";
          $usuario = "ROBERKIS";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);




          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/


            # code...

        
          }
          if($respuesta == "ok"){

          echo '<script>
          swal({
            type: "success",
            title: "¡El Usuario Se Guardo Correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
              }).then((result)=>{

                if(result.value){
                  window.location = "listado-empresas";
                }

                });//

          </script>';
   }/* CIERRO SI DE RESPUESTA */



      
                 
     
        

   

    }/* CIERRO ISSET DE VER SI VIENE VARIABLE POST*/

  }/* CIERRO FUNCION DE CREAR USUARIOS*/
/**************************************************CIERRE FUNCION CREAR USUARIOS*******************************/



  static public function ctrMostrarUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario){
    $tabla = 'usuarios_empresas';
        
    $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $taRncEmpresaUsuario, $RncEmpresaUsuario);
    return $respuesta;    





  }/* CIERRO FUNCION DE Mostar USUARIOS*/
   static public function ctrMostrarLogueosUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario){
    $tabla = 'logueos_empresas';
        
    $respuesta = ModeloUsuarios::MdlMostrarlogueoUsuarios($tabla, $taRncEmpresaUsuario, $RncEmpresaUsuario);
    return $respuesta;    





  }/* CIERRO FUNCION DE Mostar USUARIOS*/
/*******************************CIERRO FUNCION MOSTRAR USUARIO***************************/
  
  /***********************MODAL EDITAR USUARIOS****************************************************************************/

  static public function ctrModalEditarUsuario($id, $idUsuario){
    $tabla = 'usuarios_empresas';
        
    $respuesta = ModeloUsuarios::MdlModalEditarUsuario($tabla, $id, $idUsuario);
    return $respuesta;    





  }/* CIERRO FUNCION DE MODAL EDITAR USUARIOS*/
/*******************************CIERRO FUNCION MODAL EDITAR USUARIOS USUARIO***************************/

  static public function ctreditarUsuario(){
    if(isset($_POST["editarUsuario"])){

        if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ& ]+$/', $_POST["editarNombre"]))){
    
          echo '<script>
                swal({

                  type: "error",
                  title: "¡Caracter Invalido Nuevo Nombre, como los son !"#$%/=*-_!",
                  showConfirmButton: false,
                  timer: 6000
                  }).then(()=>{
                  window.location = "usuarios";
                          
                          });
                        
                </script>'; 
          exit;   
        } 
        if(!(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUsuario"]))){
    
          echo '<script>
                swal({

                  type: "error",
                  title: "¡Caracter Invalido Nuevo Usuario, como los son !"#$%/=*-_!",
                  showConfirmButton: false,
                  timer: 6000
                  }).then(()=>{
                  window.location = "usuarios";
                          
                          });
                        
                </script>'; 
          exit;   
        } 
        
    
        /*********************************************
        VALIDAR IMAGEN
        ***********************************************/
        $Ruta = $_POST["fotoActual"];
        if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

          list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          /****************************
          CREAMOS DIRECTORIO DONDE VAVMOS A GUARDAR LA FOTO DEL USUARIO
          ********************************/
          $directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];
          /*pregutnar si exiten imagenes*/
          if(!empty($_POST["fotoActual"])){
            
            unlink($_POST["fotoActual"]);

          }
          else {
            mkdir($directorio, 0755);

          }     
          /*******************************************
          DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES´POR DEFECTO DE PHP

          ****************************************/
          if($_FILES["editarFoto"]["type"] == "image/jpeg"){

            $aleatorio = mt_rand(100, 999);

            /*guardamos en el directorio*/
            $Ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
            $origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $Ruta);
          }/*SI DEL LA IMAGEN JPEG*/

          if($_FILES["editarFoto"]["type"] == "image/png"){
            $aleatorio = mt_rand(100, 999);

            /*guardamos en el directorio*/
            $Ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
            $origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $Ruta);
          }/*SI DEL LA IMAGEN PNG*/
    
        }/* SI DE VALIDAR IMAGEN*/

        $tabla = 'usuarios_empresas';

        if($_POST["editarPassword"] != $_POST["passwordActual"] && $_POST["editarPassword"] != ""){ 
         

            $encriptar = md5($_POST["editarPassword"]);

        

           } else{
            $encriptar = $_POST["passwordActual"];


            }
        
        $datos = array("Rnc_Empresa_Usuario" => $_POST["RncEmpresaUsuario"], "Nombre" => $_POST["editarNombre"], "Usuario" => $_POST["editarUsuario"], "Password" => $encriptar, "emailusuario" => $_POST["editaremailusuario"], "Perfil" => $_POST["editarPerfil"], "Foto" => $Ruta);
        
        $respuesta = ModeloUsuarios::MdlEditarUsuario($tabla, $datos);

        if($respuesta == "ok"){

          echo '<script>
          swal({
            type: "success",
            title: "¡El Usuario Se Modifico Correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
              }).then((result)=>{

                if(result.value){
                  window.location = "usuarios";
                }

                });

          </script>';


        }
        
    
    } /*CIERRA ISSET DE VERIFICAR SI VIENE LA VARIABLE POST*/

   }/*CIERRA FUNCION DE EDITAR USUARIOS*/


   /*********************************
      VALIDAR USUARIO
   **********************************/
  static public function ctrValidarUsuario($Usuario, $valorUsuario, $valorRNC){
    
    $tabla = 'usuarios_empresas';
    $Rnc_Empresa_Usuario = "Rnc_Empresa_Usuario";
    

        
  $respuesta = ModeloUsuarios::MdlValidarUsuario($tabla, $Usuario, $valorUsuario, $Rnc_Empresa_Usuario, $valorRNC);
    
    return $respuesta;   

  }/*CIERRA FUNCION VALIDAR USUARIO*/ 

 /*********************************
      ELIMINAR USUARIO
   **********************************/
  static public function ctrEliminarUsuario(){
    
    if(isset($_GET["idUsuario"])){
      $tabla = 'usuarios_empresas';
      $id = 'id';
      $idUsuario = $_GET["idUsuario"];

    if($_GET["fotoUsuario"] != ""){ 

      unlink($_GET["fotoUsuario"]);
      rmdir('vistas/img/usuarios/'.$_GET["usuario"]);
      }


    $respuesta = ModeloUsuarios::MdlEliminarUsuario($tabla, $id, $idUsuario);

    if($respuesta ==  "ok"){
      echo '<script>
          swal({
            type: "success",
            title: "¡El Usuario ha sido Borrado Correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
              }).then((result)=>{

                if(result.value){
                  window.location = "usuarios";
                }

                });

          </script>';


    }/*cierra el si de respuesta*/
       
    }/*cierra el si de isset get*/
    

  }/*CIERRA FUNCION borrar USUARIO*/  


        
}/*CIERRA CLASS CONTROLADOR USUARIO*/
    


