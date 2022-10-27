  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1 class="col-xs-3 pull-left" style="font-size: 30px"><i class="fa fa-user fa-lg" style="padding-left:50px"></i>Usuarios
      </h1>
     

        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Usuario</button>
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Cliente</button>
        <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarSuplidor"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Suplidor</button>
        <a href="clientes" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalles Clientes</a>
        <a href="suplidores" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalles Suplidores</a>
          
   
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"><i class="fa fa-user"></i>Usuarios</li>
      </ol>
        
    </section>
    
    <section class="content">
  
      <div class="box">

        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->

          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                   
            <thead>
              <tr>
                <th style="width: 10px"></th>
                <th>Nombre</th>
                <th>Usaurio</th>
                <th>Correo</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Estado</th>
                <th>Descuento</th>
                <th>Ultimo Login</th>
                <th></th>
               
              </tr>

            </thead>
            

            <tbody>

              <?php 

              $taRncEmpresaUsuario = 'Rnc_Empresa_Usuario';
              $RncEmpresaUsuario = $_SESSION["RncEmpresaUsuario"];

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario);
              foreach ($usuarios as $key => $value) {
                if($value["Perfil"] != "Programador"){ 
                echo ' <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["Nombre"].'</td>
                <td>'.$value["Usuario"].'</td>
                <td>'.$value["emailusuario"].'</td>';
                if($value["Foto"] != ""){
                   echo '<td><img src="'.$value["Foto"].'" class="img-thumbnail" width="40px"></td>';
                
                }
                else {
                   echo'<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                
                
                }


                echo '<td>'.$value["Perfil"].'</td>';

                if($_SESSION["Perfil"] == "Programador" || $_SESSION["Perfil"] == "Gerente" || $_SESSION["Perfil"] == "Administrador"){
                   if($value["Estado"] != 0){

                  echo' <td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                  } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                }

                }else{
                  if($value["Estado"] != 0){

                  echo' <td><button class="btn btn-success btn-xs" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                  } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                }





                }
              ////////////////************DESCUENTO***********************/////////////////////////
               
                if($_SESSION["Perfil"] == "Programador" || $_SESSION["Perfil"] == "Gerente" || $_SESSION["Perfil"] == "Administrador"){
                   if($value["Descuento"] != 0){

                  echo' <td><button class="btn btn-success btn-xs btndescuento" idUsuario="'.$value["id"].'" descuentoUsuario="0">Autorizado</button></td>';
                  } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs btndescuento" idUsuario="'.$value["id"].'" descuentoUsuario="1">No Autorizado</button></td>';

                }

                }else{
                  if($value["Descuento"] != 0){

                  echo' <td><button class="btn btn-success btn-xs" idUsuario="'.$value["id"].'" descuentoUsuario="0">Autorizado</button></td>';
                  } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs" idUsuario="'.$value["id"].'" descuentoUsuario="1">No Autorizado</button></td>';

                }





                }

               


                              

               echo '<td>'.$value["Ultimo_Login"].'</td>';

              if($_SESSION["Perfil"] == "Programador" || $_SESSION["Perfil"] == "Gerente" || $_SESSION["Perfil"] == "Administrador" || $_SESSION["id"] == $value["id"]){
                

                echo'<td>
                  
                    <button Title="Editar Usuario" class="btn btn-warning btnEditarUsuario btn-xs" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                    <button Title="Eliminar Usuario" class="btn btn-danger btnEliminarUsuario btn-xs" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["Foto"].'" usuario="'.$value["Usuario"].'"><i class="fa fa-trash-o"></i></button>
                                       

                 
                  
                </td>  ';          

             
               }else{

                echo'<td>
                  
                   

                 
                  
                </td>  ';          



               }


          echo'</tr>';


              }/*if distinto de programador*/


              }
              




               ?>
             
            

             
              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        <!--*****************CIERRE DE TABLA USUARIO********************************* -->

        </div>        

        
      </div>
      

    </section>
 
  </div>

 
 <!--************************************************
                      MODAL AGREGAR USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Usuario</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaUsuario" name="RncEmpresaUsuario" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
            

         <!--*****************input de Nombre de Usuario********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          <!--*****************input de Usuario********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoUsuario" name="nuevoUsuario" placeholder="Ingresar Usuario" required>

            </div>

          </div>
          <!--*****************cierra input de Usuario************************* -->

          <!--*****************input de Contraseña********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control input-lg" id="emailusuario" name="emailusuario" placeholder="Ingresar su Correo" required>

            </div>

          </div>
          <!--*****************cierra input Contraseña************************* -->

          <!--*****************SELECTOR DE PEFIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
            <select class="form-control input-lg" id="nuevoPerfil" name="nuevoPerfil" required>
                <option value="">Selecionar Perfil</option>
                <option value="Gerente">Gerente</option>
                <option value="Administrador">Administrador</option>
                <option value="Especialista">Especialista</option>
                <option value="Tributario">Tributario</option>
                <option value="Vendedor">Vendedor</option>
                <option value="Cobrador">Cobrador</option>
              </select>

            </div>

          </div>
          <!--*****************cierra SELECTOR DE PEFIL************************* -->

          
          <!--*****************SUBIR FOTO********************** -->

          <div class="form-group">

            <div class="panel">SUBIR FOTO</div>
            <input type="file" class="nuevaFoto" name="nuevaFoto">
            <p class="help-block">Peso maximo de la foto 3MB</p>
            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>
          <!--*****************CIERRE SUBIR FOTO************************* -->
          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Usuario</button>

      </div>

      <?php 
      $crearUsuario = new ControladorUsuarios();
      $crearUsuario -> ctrCrearUsuario();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>


<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->
   <!--************************************************
                      MODAL Editat USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalEditarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Usuario</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaUsuario" name="RncEmpresaUsuario" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
            

         <!--*****************input de Nombre de Usuario********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          <!--*****************input de Usuario********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario"  readonly>

            </div>

          </div>
          <!--*****************cierra input de Usuario************************* -->

          <!--*****************input de Contraseña********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control input-lg" id="editarPassword"  name="editarPassword" required>
              <input type="hidden" id="passwordActual" name="passwordActual">

            </div>

          </div>
         <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control input-lg" id="editaremailusuario" name="editaremailusuario" required>

            </div>

          </div>

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" id="editarPerfil" name="editarPerfil">
                <option value="" id="editarPerfil"></option>
                <option value="Gerente">Gerente</option>
                <option value="Administrador">Administrador</option>
                <option value="Especialista">Especialista</option>
                <option value="Tributario">Tributario</option>
                <option value="Vendedor">Vendedor</option>
                <option value="Cobrador">Cobrador</option>
              </select>

            </div>

          </div>
          <!--*****************cierra SELECTOR DE PEFIL************************* -->

          
          <!--*****************SUBIR FOTO********************** -->

          <div class="form-group">

            <div class="panel">SUBIR FOTO</div>
            <input type="file" class="nuevaFoto" name="editarFoto">
            <p class="help-block">Peso maximo de la foto 2MB</p>
            <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
            <input type="hidden" name="fotoActual" id="fotoActual">

          </div>
          <!--*****************CIERRE SUBIR FOTO************************* -->
          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Usuario</button>

      </div>

      <?php 
      $editarUsuario = new ControladorUsuarios();
      $editarUsuario -> ctreditarUsuario();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->
  <?php 
  $eliminarUsuario = new ControladorUsuarios();
  $eliminarUsuario -> ctrEliminarUsuario();

   ?>


   <!--************************************************
                MODAL AGREGAR SUPLIDORES
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarSuplidor" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Suplidor</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="hidden" class="form-control input-lg" id="RncEmpresasuplidor" name="RncEmpresasuplidor" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>
        <input type="hidden" class="form-control input-lg" id="ModuloSuplidor" name="ModuloSuplidor" value="usuarios" readonly>

            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
          <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              
                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidor">

                   
                        <input type="radio" Class="Juridico" name="Tipo_Suplidor" id="juridico" value="1" required> Jurídico

                    
                    
                        <input type="radio" Class="Fisico" name="Tipo_Suplidor" id="fisico" value="2" required> Fisico

                   
                    </div>
                    
            </div>

          </div>

           <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" class="form-control input-RNC" maxlength="11" id="nuevoDocumentoIdsuplidor" name="nuevoDocumentoIdsuplidor" placeholder="Ingresar RNC o Cedula del Suplicor" required>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoSuplidor" name="nuevoSuplidor" placeholder="Ingresar Nombre Completo del Suplidors" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

           <!--*****************input de EMAIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-lg" name="nuevoEmailSuplidor" placeholder="Ingresar email">

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
            <!--*****************input de Telefocno********************** -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              
             
              <input type="text" class="form-control input-lg" name="nuevoTelefonoSuplidor" placeholder="Ingresar Teléfono">


            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDireccionSuplidor" placeholder="Ingresar Dirección Suplidor">

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->
          
        </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Suplidor</button>

      </div>

     <?php 

        $crearSuplidor = new ControladorSuplidores();
        $crearSuplidor -> ctrCrearSuplidor();

       ?>
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->
<!--************************************************
                      MODAL AGREGAR CLIENTE
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
    <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Cliente</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCliente" name="RncEmpresaCliente" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>

            </div>


          </div>
          
           <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoUserCliente">

                   
                        <input type="radio" Class="JuridicoUserCliente" name="Tipo_Usuario_Cliente" id="JuridicoUsuarioCliente" value="1" required checked> Jurídico

                    
                    
                        <input type="radio" Class="FisicoUserCliente" name="Tipo_Usuario_Cliente" id="fisicoUsuarioCliente" value="2" required> Fisico

                   
                    </div>

                  </div>

                  </div>

          
            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" maxlength="11" class="form-control input-lg" id="RncCliente" name="RncCliente" placeholder="Ingresar Documento" required>

            </div>

          </div>
          
                    
                 

          
         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoCliente"  name="nuevoCliente" placeholder="Ingresar Nombre Completo" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          <!--*****************input de cedula o pasaporte********************** -->

          
          <!--*****************cierra input de Ncedula o pasaporte************************* -->

           <!--*****************input de EMAIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
           <!--*****************input de Telefocno********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Teléfono">

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->

            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Dirección">

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->

          <!--*****************input de FECHA DE NACIMIENTO********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaFechaNac" placeholder="Ingresar Fecha de Nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->
                     
          
        </div>

      
        
      </div>

      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Cliente</button>

      </div>
      <?php 
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();



       ?>
         
    </form>
    

    </div>

  </div>

</div>


<!--************************************************
                    CIERRE DE  MODAL AGREGAR CLIENTE
  ******************************************************* -->

