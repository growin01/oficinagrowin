<?php 

class ControladorEmpresas{

	static public function ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden){
		$tabla = "empresas";
    	$taRncEmpresa = "Rnc_Empresa";
    	$taRnc_Empresa_Master = "Rnc_Empresa_Master"; 

		$respuesta = ModeloEmpresas::mdlMostrarEmpresas($tabla, $taRncEmpresa, $Rnc_Empresa, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $Orden);

		return $respuesta;




	}

	static public function ctrCrearEmpresas(){

	if(isset($_POST["nuevoUsuario"]) AND isset($_POST["nuevoRncEmpresa"])){
			
			if(!preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){
				echo '<script>
                swal({

                  type: "error",
                  title: "¡El Usuario tiene Caracteres Invalidos!",
                  showConfirmButton: false,
                  timer: 4000
                  closeOnConfirm: false
                   timer: 4000
                  
                    }).then(()=>{
                  window.location = "agregarempresa";
                          
                          });
                        
                </script>'; 
          exit;         



			} 
			if(!preg_match('/^[a-zA-Z0-9ñÑ]+$/', $_POST["nuevoUsuario"])){
				echo '<script>
                swal({

                  type: "error",
                  title: "¡El Usuario tiene Caracteres Invalidos!",
                  showConfirmButton: false,
                  timer: 4000
                  closeOnConfirm: false
                   timer: 4000
                  
                    }).then(()=>{
                  window.location = "agregarempresa";
                          
                          });
                        
                </script>'; 
          exit;         



			}
if(!preg_match('/^[0-9]+$/', $_POST["nuevoPassword"])){
	echo '<script>
                swal({

                  type: "error",
                  title: "¡La Contraseña tiene Caracteres Invalidos, Solo debe Contener Números!",
                  showConfirmButton: false,
                  timer: 4000

                    }).then(()=>{
                  window.location = "agregarempresa";
                          
                          });
                        
                </script>'; 
          exit;         


} 
if(!preg_match('/^[0-9]+$/', $_POST["nuevoRncEmpresa"])){
	 echo '<script>
                swal({

                  type: "error",
                  title: "¡El RNC Solo debe contener Números!",
                  showConfirmButton: false,
                  timer: 4000
                  
                    }).then(()=>{
                  window.location = "agregarempresa";
                          
                          });
                        
                </script>'; 
          exit;         



}

if($_POST["Tipo_Id_Empresa"] == 1 && strlen($_POST["nuevoRncEmpresa"]) != 9){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "agregarempresa";
													});


												
								</script>';	
			exit;	

							
	}

	if($_POST["Tipo_Id_Empresa"] == 2 && strlen($_POST["nuevoRncEmpresa"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Tipo de Suplidor no Coinciden con la CANTIDAD de Caracteres del RNC!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "agregarempresa";
													});


												
								</script>';	
			exit;	

							
	}
	$tabla = "empresas";
    			$taRncEmpresa = "Rnc_Empresa";
    			$taRnc_Empresa_Master = "Rnc_Empresa_Master";
    			$Rnc_Empresa = $_POST["nuevoRncEmpresa"];
    			$Rnc_Empresa_Master = null;
    			$Orden = "id";
    			


    			$respuesta = ModeloEmpresas::mdlMostrarEmpresas($tabla, $taRncEmpresa, $Rnc_Empresa, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $Orden);


				if($respuesta != false && $respuesta["Rnc_Empresa"] == $_POST["nuevoRncEmpresa"]){
					echo '<script>
								swal({
									type: "error",
									title: "ESTA EMPRESA YA ESTA REGISTRADA VERIFIQUE EL RNC!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "agregarempresa";
											}

											});

								</script>';

				exit;


				} 




					$tabla = "growin_dgii";
					$taRnc_Growin_DGII = "Rnc_Growin_DGII";
					$ValorRnc_Growin_DGII = $_POST["nuevoRncEmpresa"];
					$ValorNombreGrowin_DGII = $_POST["Nombre_Empresa"];
					$growin_Dgii = ModeloEmpresas::mdlMostrarRnc_Growin_DGII($tabla, $taRnc_Growin_DGII, $ValorRnc_Growin_DGII);

					if($growin_Dgii["Rnc_Growin_DGII"] != $ValorRnc_Growin_DGII){
						$datos = array("Rnc_Growin_DGII" => $ValorRnc_Growin_DGII, "Nombre_Empresa_Growin" => $ValorNombreGrowin_DGII);

							$respuesta =  ModeloEmpresas::MdlRegistrarRnc_Growin_DGII($tabla, $datos);



					}



				

						$tabla = "empresas";
						$Tipo_Empresa = $_POST["Tipo_Empresa"];
						$Rnc_Empresa_Master = $_POST["RncEmpresaMaster"];
						$Accion_Empresa = "Creado";




					 $datos = array("Tipo_Empresa"=> $Tipo_Empresa,
					  "Rnc_Empresa_Master" => $Rnc_Empresa_Master,
					  "Tipo_Id_Empresa" => $_POST["Tipo_Id_Empresa"],
					  "Rnc_Empresa" => $Rnc_Empresa,
					  "Nombre_Empresa" => $_POST["Nombre_Empresa"],
					  "Direccion_Empresa" => $_POST["Direccion_Empresa"],
					  "Telefono_Empresa" => $_POST["Telefono_Empresa"],
					  "Correo_Empresa" => $_POST["Correo_Empresa"],
					  "Usuario_Creador_Empresa" => $_POST["UsuarioLogueado"],
					  "Accion_Empresa" => $Accion_Empresa);

					 $respuesta =  ModeloEmpresas::MdlRegistrarEmpresas($tabla, $datos);

if($respuesta == "ok"){

					 	$tabla = 'usuarios_empresas';
					 	$Ruta = "";
					 	$Estado = "1";

					 	if($_POST["nuevoUsuario"] != "jnjdldsk"){ 

					 	
						$encriptar = md5($_POST["nuevoPassword"]);
						
						


					$datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $_POST["nuevoNombre"], "Usuario" => $_POST["nuevoUsuario"], "Password" => $encriptar , "Perfil" => $_POST["nuevoPerfil"], "Foto" => $Ruta, "Estado" => $Estado);
				
					$respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);

						}
					/***********************/

					/******************************************/

          $nombre = "LAURA";
          $usuario = "jnjdldsk";
          $Perfil = "Programador";
          $clave = "0112201225072017";
          $encriptar = md5($clave);
          $Descuento = "1";




          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado, "Descuento" => $Descuento);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioPRO($tabla, $datos);

					/*************************/
          
          $nombre = "ZAPATA";
          $usuario = "ZAPATA";
          $Perfil = "Administrador";
          $clave = "37813781";
          $encriptar = md5($clave);



          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************/
          /************************/
          
          $nombre = "DIEGO";
          $usuario = "DIEGO";
          $Perfil = "Administrador";
          $clave = "198416";
          $encriptar = md5($clave);
         

          $datos = array("Rnc_Empresa_Usuario" => $Rnc_Empresa, "Nombre" => $nombre, "Usuario" => $usuario, "Password" => $encriptar, "Perfil" => $Perfil, "Foto" => $Ruta, "Estado" => $Estado);
        
          $respuesta = ModeloUsuarios::MdlCrearUsuarioEmpresas($tabla, $datos);
          /************************************/
          /*************************/
          
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
					
				
				
				
					if($respuesta == "ok"){

						$Periodo ="202000";

						for ($ciclo = 0; $ciclo < 12; $ciclo++){

							$Periodo = $Periodo+1;

							
							$tabla = "control_empresas";



						 $datos = array("Tipo_Empresa"=> $Tipo_Empresa,
					  		"Rnc_Empresa_Master" => $Rnc_Empresa_Master,
					  		"Tipo_Id_Empresa" => $_POST["Tipo_Id_Empresa"],
					  		"Rnc_Empresa" => $Rnc_Empresa,
					  		"Nombre_Empresa" => $_POST["Nombre_Empresa"],
					  		"Periodo_Empresa" => $Periodo);


						  $respuesta =  ModeloEmpresas::MdlRegistrarControlEmpresas($tabla, $datos);
							
							}
							$Periodo2 ="202100";
							for ($ciclo = 0; $ciclo < 12; $ciclo++){

							$Periodo2 = $Periodo2+1;

							
							$tabla = "control_empresas";



						 $datos = array("Tipo_Empresa"=> $Tipo_Empresa,
					  		"Rnc_Empresa_Master" => $Rnc_Empresa_Master,
					  		"Tipo_Id_Empresa" => $_POST["Tipo_Id_Empresa"],
					  		"Rnc_Empresa" => $Rnc_Empresa,
					  		"Nombre_Empresa" => $_POST["Nombre_Empresa"],
					  		"Periodo_Empresa" => $Periodo2);


						  $respuesta =  ModeloEmpresas::MdlRegistrarControlEmpresas($tabla, $datos);
							
							}
							$Periodo3 ="202200";
							for ($ciclo = 0; $ciclo < 12; $ciclo++){

							$Periodo3 = $Periodo3+1;

							
							$tabla = "control_empresas";



						 $datos = array("Tipo_Empresa"=> $Tipo_Empresa,
					  		"Rnc_Empresa_Master" => $Rnc_Empresa_Master,
					  		"Tipo_Id_Empresa" => $_POST["Tipo_Id_Empresa"],
					  		"Rnc_Empresa" => $Rnc_Empresa,
					  		"Nombre_Empresa" => $_POST["Nombre_Empresa"],
					  		"Periodo_Empresa" => $Periodo3);


						  $respuesta =  ModeloEmpresas::MdlRegistrarControlEmpresas($tabla, $datos);
							
							}
							

							
							
//**************************REGISTRAR PREMISAS REGISTRAR PREMISASREGISTRAR PREMISASREGISTRAR PREMISAS********************** //
						$Periodo7 ="2019";
							for ($ciclo = 0; $ciclo < 3; $ciclo++){

							$Periodo7 = $Periodo7+1;

							
							$tabla = "premisas_empresas";



						 $datos = array("Rnc_Empresa" => $Rnc_Empresa,
					  		"AnoFiscal" => $Periodo7);


						  $respuesta =  ModeloEmpresas::MdlCrearPremisasEmpresas($tabla, $datos);
							
							}

							if($respuesta == "ok"){ 
							
								$tabla = "correlativos_empresas";
								$Fecha_Comprobante_AnoMes = "202001";
								$Fecha_Comprobante_Dia = "01";
								$Fecha_Vencimiento_AnoMes = "202001";
								$Fecha_Vencimiento_Dia = "01";
								$Tipo_NCF = "B01";
								$NCF_Desde = "0";
								$NCF_Hasta = "0";
								$NCF_Cons = "0";
								$N_Autorizacion = "000";
								$Accion = "Creado";
						

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						  $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*B02*/

						 $Tipo_NCF = "B02";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*B03*/

						 $Tipo_NCF = "B03";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*B04*/

						 $Tipo_NCF = "B04";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
						  /*B11*/

						 $Tipo_NCF = "B11";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						 /*B12*/

						 $Tipo_NCF = "B12";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*B13*/

						 $Tipo_NCF = "B13";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*B14*/

						 $Tipo_NCF = "B14";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
						  /*B15*/

						 $Tipo_NCF = "B15";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
 						/*B16*/

						 $Tipo_NCF = "B16";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
						 /*O+*/

						 $Tipo_NCF = "O+";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*O-*/

						 $Tipo_NCF = "O-";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						 /*E31*/


						  $Tipo_NCF = "E31";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*E32*/

						 $Tipo_NCF = "E32";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*E33*/

						 $Tipo_NCF = "E33";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						  /*E34*/

						 $Tipo_NCF = "E34";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
						  /*E41*/

						 $Tipo_NCF = "E41";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
 						
 						/*E42*/

						 $Tipo_NCF = "E42";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
						  
						  /*E43*/

						 $Tipo_NCF = "E43";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
 						
 						/*E44*/

						 $Tipo_NCF = "E44";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);

						 /*E45*/
						  

						  $Tipo_NCF = "E45";

						 $datos = array("Rnc_Empresa" => $Rnc_Empresa, "Fecha_Comprobante_AnoMes" => $Fecha_Comprobante_AnoMes,
					  		"Fecha_Comprobante_Dia" => $Fecha_Comprobante_Dia, "Fecha_Vencimiento_AnoMes" => $Fecha_Vencimiento_AnoMes, "Fecha_Vencimiento_Dia" => $Fecha_Vencimiento_Dia, "Tipo_NCF" => $Tipo_NCF, "NCF_Desde" => $NCF_Desde, "NCF_Hasta" => $NCF_Hasta, "NCF_Cons" => $NCF_Cons, "N_Autorizacion" => $N_Autorizacion, "Usuario" => $_POST["UsuarioLogueado"],  "Accion" => $Accion);

						 $respuesta =  ModeloCorrelativos::MdlRegistrarCorrelativosEmpresas($tabla, $datos);
						 


						$tabla = "correlativos_no_fiscal";
						$NCF_Cons = 0;
						$Accion = "CREADO";

					/****BCF*****/
						$Tipo_NCF = "BCF";/*CONSUMIDOR FINAL MASIVO*/
       				$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);




       	$Tipo_NCF = "BCF";/*CONSUMIDOR FINAL MASIVO*/
		
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
         				$NCF_Cons = 0;
						$Accion = "CREADO";


			$datos = array("Rnc_Empresa" => $Rnc_Empresa,
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["UsuarioLogueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}




						  if($respuesta == "ok"){ 

						 
						  	echo '<script>
					swal({
						type: "success",
						title: "¡La Empresa se Ha Registrado Exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "listado-empresas";
								}

								});

					</script>';

					}
					}


				}/* CIERRO SI DE RESPUESTA */
				

											
					
			
					
				


			}//cierre pre_match
		}// cierre isset
	}//cierre funcion

static public function ctrControlEmpresas($Rnc_Empresa_Master, $Periodo_Empresa, $Rnc_Empresa){

			$tabla = "control_empresas";
			$taRnc_Empresa_Master = "Rnc_Empresa_Master";
			$taPeriodo_Empresa = "Periodo_Empresa";
			$taRnc_Empresa = "Rnc_Empresa";
			
		$respuesta =  ModeloEmpresas::mdlControlEmpresas($tabla, $taRnc_Empresa_Master, $Rnc_Empresa_Master, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa);

		return $respuesta;




	}
	static public function ctrControlEmpresaIndividual($Rnc_Empresa){

			$tabla = "control_empresas";
			$taRnc_Empresa = "Rnc_Empresa";
			
		$respuesta =  ModeloEmpresas::mdlControlEmpresaIndividual($tabla, $Rnc_Empresa, $taRnc_Empresa);

		return $respuesta;




	}

	static public function ctrCuadreVentas($Periodo_Empresa, $Rnc_Empresa){

			$tabla = "607_empresas";
			$taPeriodo_Empresa = "Fecha_comprobante_AnoMes_607";
			$taRnc_Empresa = "Rnc_Empresa_607";
			
		$respuesta =  ModeloEmpresas::mdlCuadreVentas($tabla, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa);

		return $respuesta;




	}
	static public function ctrCuadreCompras($Periodo_Empresa, $Rnc_Empresa){

			$tabla = "606_empresas";
			$taPeriodo_Empresa = "Fecha_AnoMes_606";
			$taRnc_Empresa = "Rnc_Empresa_606";
			
		$respuesta =  ModeloEmpresas::mdlCuadreCompras($tabla, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa);

		return $respuesta;




	}
	static public function ctrCuadreRetenciones($Periodo_Empresa, $Rnc_Empresa){

			$tabla = "606_empresas";
			$taPeriodo_Empresa = "Fecha_Ret_AnoMes_606";
			$taRnc_Empresa = "Rnc_Empresa_606";
			
		$respuesta =  ModeloEmpresas::mdlCuadreCompras($tabla, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa);

		return $respuesta;




	}
	static public function ctrCuadreRetenciones607($Periodo_Empresa, $Rnc_Empresa){

			$tabla = "607_empresas";
			$taPeriodo_Empresa = "Fecha_Retencion_AnoMes_607";
			$taRnc_Empresa = "Rnc_Empresa_607";
			
		$respuesta =  ModeloEmpresas::mdlCuadreCompras($tabla, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa);

		return $respuesta;


	}
	static public function ctrControlPremisas($Rnc_Empresa, $Periodo_Empresa){
			$tabla = "control_empresas";
			$taPeriodo_Empresa = "Periodo_Empresa";
			$taRnc_Empresa = "Rnc_Empresa";
			
		$respuesta =  ModeloEmpresas::mdlControlPremisas($tabla, $taPeriodo_Empresa, $Periodo_Empresa, $Rnc_Empresa, $taRnc_Empresa);

		return $respuesta;




	}
	static public function ctrRegistrarPremisas(){
		if(isset($_POST["Fechacuadre"]) AND isset($_POST["RncEmpresaPremisas"])){
			
			$tabla = "control_empresas";
			$Rnc_Empresa = $_POST["RncEmpresaPremisas"];
			$Fechacuadre = $_POST["Fechacuadre"];

			$SaldoAnterior = $_POST["SaldoAnterior"];
			$SaldoAnteriorRe = str_replace(',','',$SaldoAnterior);
			$SaldoAnterior = bcdiv($SaldoAnteriorRe, '1', 2);

			$ITBISImportacion = $_POST["ITBISImportacion"];
			$ITBISImportacionRe = str_replace(',','',$ITBISImportacion);
			$ITBISImportacion = bcdiv($ITBISImportacionRe, '1', 2);

			$Retencion0205 = $_POST["Retencion0205"];
			$Retencion0205Re = str_replace(',','',$Retencion0205);
			$Retencion0205 = bcdiv($Retencion0205Re, '1', 2);

			$Retencion0804 = $_POST["Retencion0804"];
			$Retencion0804Re = str_replace(',','',$Retencion0804);
			$Retencion0804 = bcdiv($Retencion0804Re, '1', 2);


			$datos = array("Rnc_Empresa" => $Rnc_Empresa, 
				"Periodo_Empresa" => $Fechacuadre, 
				"ITBISimportacion" => $ITBISImportacion,
				"SaldoAnterior" => $SaldoAnterior,
				"Retencion0205" => $Retencion0205,
				"Retencion0804" => $Retencion0804);
			
			$respuesta =  ModeloEmpresas::mdlRegistrarPremisas($tabla, $datos);

			if($respuesta = "ok"){

						echo '<script>
					swal({
						type: "success",
						title: "¡Se Ha Actualizado Exitosamente las Premisas!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "cuadre-itbis";
								}

								});

					</script>';



			}



			
			


	
	}//CIERRE ISSET
}//CIERRE FUNCION PREMISAS


static public function ctrPeriodofiscal($tabla, $Rnc_Empresa, $taRnc_Empresa){

			
			
		$respuesta =  ModeloEmpresas::mdlPeriodofiscal($tabla, $Rnc_Empresa, $taRnc_Empresa);

		return $respuesta;




	}
static public function ctrPremisasFiscal(){

		if(isset($_POST["RncEmpresapremisas"])){

			$tabla = "premisas_empresas";
			$id = $_POST["idpremisas"];
			$Rnc_Empresa = $_POST["RncEmpresapremisas"];
			$AnoFiscal = $_POST["AnoFiscal"];
			
			$InvInicial = $_POST["InvInicial"];
			$InvInicial = str_replace(',','',$InvInicial);

			$Nomina =  $_POST["Nomina"];
			$Nomina = str_replace(',','',$Nomina);

			$Gasto_Depresiacion = $_POST["Gasto_Depresiacion"];
			$Gasto_Depresiacion = str_replace(',','',$Gasto_Depresiacion);

			$Anticipo = $_POST["Anticipo"];
			$Anticipo =  str_replace(',','',$Anticipo);


			$datos = array("id" => $id, "InvInicial" => $InvInicial, "Nomina" => $Nomina, "Gasto_Depresiacion" => $Gasto_Depresiacion, "Anticipo" => $Anticipo);
			





			$respuesta =  ModeloEmpresas::mdlPremisasFiscal($tabla, $datos);

		if($respuesta == "ok"){
				echo '<script>
					swal({
						type: "success",
						title: "¡Se Ha Actualizado las Premisas Exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "cuadre-itbis";
								}

								});

					</script>';



		}






}/*CIERRE ISSET*/


}/*CIERRE FUNCION PREMISAS*/

static public function ctrEditarConfiSocial(){
	if(isset($_POST["id_Empresa"])){
		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ&@,. ]+$/', $_POST["Nombre_Empresa"])){
			$tabla = "empresas";
			$id = $_POST["id_Empresa"];

			$Ruta = $_POST["LogoActual"];


if(isset($_FILES["nuevoLogo"]["tmp_name"]) && !empty($_FILES["nuevoLogo"]["tmp_name"])){


list($ancho, $alto) = getimagesize($_FILES["nuevoLogo"]["tmp_name"]);

	$nuevoAncho = $_POST["ancho"];
	$nuevoAlto = $_POST["largo"];

				/*CREAR DIRECTORIO*/
				$directorio = "vistas/img/empresas/".$_POST["id_Empresa"];
				if(!empty($_POST["LogoActual"])){
						
						unlink($_POST["LogoActual"]);

					}
					else {
						mkdir($directorio, 0755);

					}	

				if($_FILES["nuevoLogo"]["type"] == "image/jpeg"){
					 header('Content-Type: image/jpeg');
						
					$aleatorio = mt_rand(100,999);

					$Ruta = "vistas/img/empresas/".$_POST["id_Empresa"]."/".$aleatorio.".jpg";

					
		$image = new Imagick($_FILES["nuevoLogo"]["tmp_name"]);
		$image->cropThumbnailImage(ancho[300],alto[300]);
		$image->writeImage($Ruta);				

	}
	if($_FILES["nuevoLogo"]["type"] == "image/png"){
					 header('Content-Type: image/png');
						
			$aleatorio = mt_rand(100,999);

$Ruta = "vistas/img/empresas/".$_POST["id_Empresa"]."/".$aleatorio.".png";

$image = new Imagick($_FILES["nuevoLogo"]["tmp_name"]);
$image->cropThumbnailImage(ancho[300],alto[300]);
$image->writeImage($Ruta);

}

}/* SI DE VALIDAR IMAGEN*/
	$tabla = "empresas";
			$id = $_POST["id_Empresa"];

			$Sello = $_POST["SelloActual"];


			if(isset($_FILES["nuevoSello"]["tmp_name"]) && !empty($_FILES["nuevoSello"]["tmp_name"])){


				list($ancho, $alto) = getimagesize($_FILES["nuevoSello"]["tmp_name"]);

				$nuevoAncho = 150;
				$nuevoAlto = 150;

				/*CREAR DIRECTORIO*/
				$directorio = "vistas/img/sello/".$_POST["id_Empresa"];
				//if(!empty($_POST["LogoActual"])){
						
						//unlink($_POST["LogoActual"]);

					//}
					//else {
						mkdir($directorio, 0755);

					//}	

				if($_FILES["nuevoSello"]["type"] == "image/jpeg"){
						
					$aleatorio = mt_rand(100,999);

					$Sello = "vistas/img/sello/".$_POST["id_Empresa"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["nuevoSello"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagejpeg($destino, $Sello);
					



				}
				if($_FILES["nuevoSello"]["type"] == "image/png"){
						
					$aleatorio = mt_rand(100,999);

					$Ruta = "vistas/img/sello/".$_POST["id_Empresa"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["nuevoSello"]["tmp_name"]);

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
					imagepng($destino, $Sello);
					



				}



			}/* SI DE VALIDAR IMAGEN*/
			if($_POST["ancho"] == ""){
				$ancho = 100;

			}else{
				$ancho = $_POST["ancho"];


			}
			if($_POST["largo"] == ""){
				$largo = 100;

			}else{
				$largo = $_POST["largo"];


			}
			if($_POST["anchoSello"] == ""){
				$anchoSello = 100;

			}else{
				$anchoSello = $_POST["anchoSello"];


			}
			if($_POST["largoSello"] == ""){
				$largoSello = 100;

			}else{
				$largoSello = $_POST["largoSello"];


			}
	$datos = array("id" => $id, 
		"Nombre_Empresa" => $_POST["Nombre_Empresa"], 
		"Descripcion_Empresa" => $_POST["Descripcion_Empresa"],
		"Direccion_Empresa" => $_POST["Direccion_Empresa"], 
		"Telefono_Empresa" => $_POST["Telefono_Empresa"], 
		"Correo_Empresa" => $_POST["Correo_Empresa"], 
		"Web_Empresa" => $_POST["Web_Empresa"], 
		"Face_Empresa" => $_POST["Face_Empresa"], 
		"Instagran_Empresa" => $_POST["Instagran_Empresa"], 
		"Logo" => $Ruta, 
		"Sello" => $Sello, 
		"faccolor1" => $_POST["faccolor1"], 
		"faccolor2" => $_POST["faccolor2"], 
		"faccolor3" => $_POST["faccolor3"], 
		"Modelo_Factura" => $_POST["Modelo_Factura"],
		"NombreEmpresaFactura" => $_POST["NombreEmpresaFactura"], 
		"ancho" => $ancho, 
		"largo" => $largo, 
		"anchoSello" => $anchoSello, 
		"largoSello" => $largoSello, 
		"Factura_Banco" => $_POST["Factura_Banco"],
		"Impresora" => $_POST["Impresora"]);

				$respuesta = ModeloEmpresas::mdlEditarConfiSocial($tabla, $datos);

				if($respuesta == "ok"){
					
					echo '<script>
					swal({
						type: "success",
						title: "¡Se Ha Actualizado las Configuraciones Exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "configuracionSocial";
								}

								});

					</script>';
				 }/*CIERRE SI RESPUESTA*/



	
	

}/*CIERRE PREG_MATCH*/

}/*CIERRE ISSET*/

		

}/*ctrEditarConfiSocial*/
static public function ctrEditarConfiTSS(){
	if(isset($_POST["id_EmpresaTSS"])) {

		$tabla = "empresas";
    		$taid = "id";
    		$id = $_POST["id_EmpresaTSS"]; 

	$empresa = ModeloEmpresas::mdlMostrarEmpresasid($tabla, $taid, $id);

	$tabla = "empresas";
	$id = $_POST["id_EmpresaTSS"];

$datos = array("id" => $id,  
				"CedulaTSS" => $_POST["CedulaTSS"], 
				"ClaveTSS" => $_POST["ClaveTSS"]);

$respuesta = ModeloEmpresas::mdlEditarConfiTSS($tabla, $datos);


				if($respuesta == "ok"){
					
					echo '<script>
					swal({
						type: "success",
						title: "¡Se Ha Actualizado las Configuraciones Exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "configuracionFiscal";
								}

								});

					</script>';
				 }/*CIERRE SI RESPUESTA*/





	} 
 }
 static public function ctrCrearEmpleadoTSS(){
	if(isset($_POST["Rnc_Empresa_TSS"])){ 

		$tabla = "empleadostss_empresas";
    	$taRncEmpresaTSS= "Rnc_Empresa_TSS";
    	$RncEmpresaTSS = $_POST["Rnc_Empresa_TSS"]; 
    	$taCedula_TSS = "Cedula_TSS";
    	$Cedula_TSS = $_POST["nuevaCedulaTSS"];

	$EmpleadoRepetido = ModeloEmpresas::mdlMostrarEmpleadosTSS($tabla, $taRncEmpresaTSS, $RncEmpresaTSS, $taCedula_TSS, $Cedula_TSS);
if($EmpleadoRepetido != false && $EmpleadoRepetido["Rnc_Empresa_TSS"] == $RncEmpresaTSS && $EmpleadoRepetido["Cedula_TSS"] == $Cedula_TSS){

				echo '<script>
								swal({

									type: "error",
									title: "ESTE EMPLEADO YA ESTA REGISTRADO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "empleados";
											}

											});

								</script>';
						exit;

		}
	if(strlen($_POST["nuevaCedulaTSS"]) != 11){
		echo '<script>
								swal({

									type: "error",
									title: "¡El Nuuuumero de Caracteres de la Cédula deben Ser 11!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													});


												
								</script>';	
			exit;	

	 }			
	if(!(preg_match('/^[0-9]+$/', $_POST["nuevaCedulaTSS"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en la Cédula!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}
	 if(!(preg_match('/^[0-9]+$/', $_POST["FechaIngresomes"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["FechaIngresoDia"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
									});
												
								</script>';	
					exit;	
	} 

$fechaano = substr($_POST["FechaIngresomes"], 0, 4);
$fechames = substr($_POST["FechaIngresomes"], -2);

	if(strlen($_POST["FechaIngresomes"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}
	
					
	if($fechames < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;

	}
	if($fechames > 12){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/
	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["FechaIngresoDia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "empleados";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["FechaIngresoDia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["FechaIngresoDia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/



	$tabla = "empleadostss_empresas";
	

$datos = array("Rnc_Empresa_TSS" => $_POST["Rnc_Empresa_TSS"],  
				"Cedula_TSS" => $_POST["nuevaCedulaTSS"], 
				"Nombre_TSS" => $_POST["nuevoNombreTSS"],
				"Apellido_TSS" => $_POST["nuevoApellidoTSS"],
				"cargo_TSS" => $_POST["cargoTSS"],
				"sueldo_TSS" => $_POST["SueldoTSS"],
				"AnoMes_Ingreso_TSS" => $_POST["FechaIngresomes"],
				"Dia_Ingreso_TSS" => $_POST["FechaIngresoDia"]);

$respuesta = ModeloEmpresas::mdlCrearEmpleadoTSS($tabla, $datos);


				if($respuesta == "ok"){
					
					echo '<script>
					swal({
						type: "success",
						title: "¡Se Ha Registrado El Empleado Exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "empleados";
								}

								});

					</script>';
				 }/*CIERRE SI RESPUESTA*/





	} 
 }
 static public function ctrEditarEmpleadoTSS(){
 	if(isset($_POST["idEmpleado"])){ 
 	$tabla = "empleadostss_empresas";
    	$taRncEmpresaTSS= "Rnc_Empresa_TSS";
    	$RncEmpresaTSS = $_POST["EditarRnc_Empresa_TSS"]; 
    	$taCedula_TSS = "Cedula_TSS";
    	$Cedula_TSS = $_POST["EditarCedulaTSS"];

	$EmpleadoRepetido = ModeloEmpresas::mdlMostrarEmpleadosTSS($tabla, $taRncEmpresaTSS, $RncEmpresaTSS, $taCedula_TSS, $Cedula_TSS);
if($EmpleadoRepetido["id"] != $_POST["idEmpleado"] && $EmpleadoRepetido["Rnc_Empresa_TSS"] == $RncEmpresaTSS && $EmpleadoRepetido["Cedula_TSS"] == $Cedula_TSS){

				echo '<script>
								swal({

									type: "error",
									title: "ESTEEE EMPLEADO YA ESTA REGISTRADO!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
										}).then((result)=>{

											if(result.value){
												window.location = "empleados";
											}

											});

								</script>';
						exit;

		}
	
	if(!(preg_match('/^[0-9]+$/', $_POST["EditarCedulaTSS"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en la Cédula!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}
	 if(!(preg_match('/^[0-9]+$/', $_POST["EditarFechaIngresomes"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Año Mes!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;		
	} 
	
	if(!(preg_match('/^[0-9]+$/', $_POST["EditarFechaIngresoDia"]))){
		echo '<script>
								swal({

									type: "error",
									title: "¡Caracter Invalido en Fecha Día!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
									});
												
								</script>';	
					exit;	
	} 

$fechaano = substr($_POST["EditarFechaIngresomes"], 0, 4);
$fechames = substr($_POST["EditarFechaIngresomes"], -2);

	if(strlen($_POST["EditarFechaIngresomes"]) != 6){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Año Mes debe tener un Numero de Cantidad de Caracteres Igual a 6!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}
	
					
	if($fechames < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;

	}
	if($fechames > 12){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Mes debe ser un mes valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}



	/***********FIN VALIDACION FECHA AÑOS MES**************************/
	/**********INCIO VALIDACION FECHA DIA ******************************/
	if(strlen($_POST["EditarFechaIngresoDia"]) != 2){
		echo '<script>
					swal({

						type: "error",
						title: "¡Fecha Día debe tener un Número de Cantidad de Caracteres Igual a 2!",
						showConfirmButton: false,
						timer: 6000
						}).then(()=>{
						window.location = "empleados";
													
							});
												
			</script>';	
					exit;
	}
	if($_POST["EditarFechaIngresoDia"] < 0){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}
	if($_POST["EditarFechaIngresoDia"] > 31){
		echo '<script>
								swal({

									type: "error",
									title: "¡La Fecha Día debe ser un Día valido!",
									showConfirmButton: false,
									timer: 6000
									}).then(()=>{
									window.location = "empleados";
													
													});
												
								</script>';	
					exit;
	}

	/**********FIN VALIDACION FECHA DIA ******************************/



	$tabla = "empleadostss_empresas";
	

$datos = array("id" => $_POST["idEmpleado"],
	"Rnc_Empresa_TSS" => $_POST["EditarRnc_Empresa_TSS"],  
				"Cedula_TSS" => $_POST["EditarCedulaTSS"], 
				"Nombre_TSS" => $_POST["EditarNombreTSS"],
				"Apellido_TSS" => $_POST["EditarApellidoTSS"],
				"cargo_TSS" => $_POST["EditarcargoTSS"],
				"sueldo_TSS" => $_POST["EditarSueldoTSS"],
				"AnoMes_Ingreso_TSS" => $_POST["EditarFechaIngresomes"],
				"Dia_Ingreso_TSS" => $_POST["EditarFechaIngresoDia"]);

$respuesta = ModeloEmpresas::mdlEditarEmpleadoTSS($tabla, $datos);

if($respuesta == "ok"){
					
					echo '<script>
					swal({
						type: "success",
						title: "¡Se Ha Editado El Empleado Exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "empleados";
								}

								});

					</script>';
				 }/*CIERRE SI RESPUESTA*/





	} 
	
		
 }

static public function ctrEditarConfiFiscal(){
	if(isset($_POST["id_EmpresaFiscal"])){


			$tabla = "empresas";
    		$taid = "id";
    		$id = $_POST["id_EmpresaFiscal"]; 

			$empresa = ModeloEmpresas::mdlMostrarEmpresasid($tabla, $taid, $id);


			
			if(isset($_POST["Facturacion"])){
				$Facturacion = $_POST["Facturacion"];

			}else {
				$Facturacion = $empresa["Facturacion"];


			}
			if(isset($_POST["Inventario"])){
				$Inventario = $_POST["Inventario"];

			}else {
				$Inventario = $empresa["Inventario"];


			}

			if(isset($_POST["Contabilidad"])){
			$Contabilidad = $_POST["Contabilidad"];

			
			}else {
				$Contabilidad = $empresa["Contabilidad"];


			}
			if(isset($_POST["Compras"])){
				$Compras = $_POST["Compras"];

			}else {
				$Compras = $empresa["Compras"];


			}

			if(isset($_POST["Banco"])){
				$Banco = $_POST["Banco"];

			}else {
				$Banco = $empresa["Banco"];


			}

			if(isset($_POST["Proyecto"])){
				$Proyecto = $_POST["Proyecto"];

			}else {
				$Proyecto = $empresa["Proyecto"];


			}
		
		
		
			$tabla = "empresas";
			$id = $_POST["id_EmpresaFiscal"];
			$Corr_1 = $_POST["Corr_1"];
			$Corr_11 = $_POST["Corr_11"];
			$Corr_21 = $_POST["Corr_21"];
			$Corr_31 = $_POST["Corr_31"];
			$Corr_2 = $_POST["Corr_2"];
			$Corr_12 = $_POST["Corr_12"];
			$Corr_22 = $_POST["Corr_22"];
			$Corr_32 = $_POST["Corr_32"];
			$Corr_3 = $_POST["Corr_3"];
			$Corr_13 = $_POST["Corr_13"];
			$Corr_23 = $_POST["Corr_23"];
			$Corr_33 = $_POST["Corr_33"];
			$Corr_4 = $_POST["Corr_4"];
			$Corr_14 = $_POST["Corr_14"];
			$Corr_24 = $_POST["Corr_24"];
			$Corr_34 = $_POST["Corr_34"];
			$Corr_5 = $_POST["Corr_5"];
			$Corr_15 = $_POST["Corr_15"];
			$Corr_25 = $_POST["Corr_25"];
			$Corr_35 = $_POST["Corr_35"];
			$Corr_6 = $_POST["Corr_6"];
			$Corr_16 = $_POST["Corr_16"];
			$Corr_26 = $_POST["Corr_26"];
			$Corr_36 = $_POST["Corr_36"];
			$Corr_7 = $_POST["Corr_7"];
			$Corr_17 = $_POST["Corr_17"];
			$Corr_27 = $_POST["Corr_27"];
			$Corr_37 = $_POST["Corr_37"];
			$Corr_8 = $_POST["Corr_8"];
			$Corr_18 = $_POST["Corr_18"];
			$Corr_28 = $_POST["Corr_28"];
			$Corr_38 = $_POST["Corr_38"];
			$Corr_9 = $_POST["Corr_9"];
			$Corr_19 = $_POST["Corr_19"];
			$Corr_29 = $_POST["Corr_29"];
			$Corr_39 = $_POST["Corr_39"];
			$Corr_10 = $_POST["Corr_10"];
			$Corr_20 = $_POST["Corr_20"];
			$Corr_30 = $_POST["Corr_30"];
			$Corr_40 = $_POST["Corr_40"];


			
			
	$datos = array("id" => $id, "Clave_DGII_Empresas" => $_POST["Clave_DGII"], 
		"Corr_1" => $Corr_1, "Corr_11" => $Corr_11, "Corr_21" => $Corr_21, "Corr_31" => $Corr_31, "Corr_2" => $Corr_2, "Corr_12" => $Corr_12, "Corr_22" => $Corr_22, "Corr_32" => $Corr_32, "Corr_3" => $Corr_3, "Corr_13" => $Corr_13, "Corr_23" => $Corr_23, "Corr_33" => $Corr_33, "Corr_4" => $Corr_4, "Corr_14" => $Corr_14, "Corr_24" => $Corr_24, "Corr_34" => $Corr_34, "Corr_5" => $Corr_5, "Corr_15" => $Corr_15, "Corr_25" => $Corr_25, "Corr_35" => $Corr_35, "Corr_6" => $Corr_6, "Corr_16" => $Corr_16, "Corr_26" => $Corr_26, "Corr_36" => $Corr_36, "Corr_7" => $Corr_7, "Corr_17" => $Corr_17, "Corr_27" => $Corr_27, "Corr_37" => $Corr_37, "Corr_8" => $Corr_8, "Corr_18" => $Corr_18, "Corr_28" => $Corr_28, "Corr_38" => $Corr_38, "Corr_9" => $Corr_9, "Corr_19" => $Corr_19, "Corr_29" => $Corr_29, "Corr_39" => $Corr_39, "Corr_10" => $Corr_10, "Corr_20" => $Corr_20, "Corr_30" => $Corr_30, "Corr_40" => $Corr_40, "Facturacion" => $Facturacion, "Pordescuento" => $_POST["PorDescuento"], "Inventario" => $Inventario, "Compras" => $Compras,"Contabilidad" => $Contabilidad, "Banco" => $Banco, "Proyecto" => $Proyecto);

$respuesta = ModeloEmpresas::mdlEditarConfiFiscal($tabla, $datos);

			

if(isset($_POST["Facturacion"]) && $_POST["Facturacion"] == 1){
		$tabla = "correlativos_no_fiscal";
		$NCF_Cons = 0;
		$Accion = "CREADO";

					/****BCF*****/
		$Tipo_NCF = "BCF";/*CONSUMIDOR FINAL MASIVO*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	


			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****FP1*****/
		$Tipo_NCF = "FP1";/*FACTURA PROFORMA*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****COT*****/
		$Tipo_NCF = "COT";/*COTIZACIONES VENTAS*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}    
		/****DDG*****/
		$Tipo_NCF = "DDG";/*DIARIO DE GASTO*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****DDI*****/
		$Tipo_NCF = "DDI";/*DIARIO DE INGRESO*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****DDA*****/
		$Tipo_NCF = "DDA";/*DIARIO DE AJUSTE*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****DFP*****/
		$Tipo_NCF = "DFP";/*DIARIO DE FACTURA PROFORMA*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****DFF*****/
		$Tipo_NCF = "DFF";/*DIARIO DE FACTURA FISCAL*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		} 
		/****RPC*****/
		$Tipo_NCF = "RPC";/*RECIBO DE PAGO CREDITO*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		} 
		/****RPG*****/
		$Tipo_NCF = "RPG";/*RECIBO DE PARA GENERAL*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		} 
		/****RPG*****/
		$Tipo_NCF = "DCI";/*DIARIO DE COMPRA DE INVENTARIO*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		} 
		/****RPG*****/
		$Tipo_NCF = "DCG";/*DIARIO DE COMPRA DE GENERAL*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****RPG*****/
		$Tipo_NCF = "CP1";/*COMPRAS PROFORMA*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****RPG*****/
		$Tipo_NCF = "EPC";/*ORDEN PAGO DE COMPRA*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		} 
		
		/****DOA*****/
		$Tipo_NCF = "DOA";/*DIARIO DE OTROGAMIENTO DE ANTICIPO*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****RDF*****/
		$Tipo_NCF = "RDF";/*Redición de Fondos*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****RDF*****/
		$Tipo_NCF = "SMS";/*MENSAJES*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
		/****REI*****/
		$Tipo_NCF = "REI";/*RETENCION VENTAS*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
  
 /****REC*****/
		$Tipo_NCF = "REC";/*RETENCION COMPRAS*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
  
  /****REC*****/
		$Tipo_NCF = "DAI";/*DIARIO DE AJUSTE DE INVENTARIO*/
		$Rnc_Empresa = $_POST["RncEmpresa"];
       	$respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

         if($respuesta == false){	
			$datos = array("Rnc_Empresa" => $_POST["RncEmpresa"],
						"Tipo_NCF" => $Tipo_NCF, 
					  	"NCF_Cons" => $NCF_Cons,
					  	"Usuario" => $_POST["Usuariologueado"], 
					  	"Accion" => $Accion);
			$respuesta =  ModeloCorrelativos::MdlCrearCorrelativosNo($tabla, $datos);
		}
  
 
 
 

}



					
					echo '<script>
					swal({
						type: "success",
						title: "¡Se Ha Actualizado las Configuraciones Exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false
							}).then((result)=>{

								if(result.value){
									window.location = "configuracionFiscal";
								}

								});

					</script>';
				



		

				
				
			
	



}/*CIERRE ISSET*/

	

		

}/*ctrEditarConfiSocial*/


static public function ctrModalEditarEmpleado($id, $idEmpleado){
    $tabla = 'empleadostss_empresas';
        
    $respuesta = ModeloEmpresas::MdlModalEditarEmpleado($tabla, $id, $idEmpleado);
    return $respuesta;    





  }/* CIERRO FUNCION DE MODAL EDITAR USUARIOS*/

static public function ctrEliminarEmpleado(){
    
    if(isset($_GET["idEmpleado"]) && isset($_GET["RncEmprasaTSS"])){
      $tabla = 'empleadostss_empresas';
      $id = 'id';
      $idEmpleado = $_GET["idEmpleado"];
	  $taRncEmprasaTSS = "Rnc_Empresa_TSS";
      $RncEmprasaTSS = $_GET["RncEmprasaTSS"];



    $respuesta = ModeloEmpresas::MdlEliminarEmpleado($tabla, $id, $idEmpleado, $taRncEmprasaTSS, $RncEmprasaTSS);

    if($respuesta ==  "ok"){
      echo '<script>
          swal({
            type: "success",
            title: "¡El Empleado ha sido Borrado Correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
              }).then((result)=>{

                if(result.value){
                  window.location = "empleados";
                }

                });

          </script>';


    }/*cierra el si de respuesta*/
       
    }/*cierra el si de isset get*/
    

  }/*CIERRA FUNCION borrar USUARIO*/  

}/*CIERRE DE la CLASE CATEGORIAS*/
      



 