
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-thumbs-up fa-lg" style="padding-left:50px"></i>
        Suplidores
        
      </h1>
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarSuplidor"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Suplidor</button>
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCliente"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Cliente</button>
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Usuario
      </button>
        <a href="usuarios" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalles Usuarios</a>  
       <a href="clientes" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalles Clientes</a>
        
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"><i class="fa fa-thumbs-up"></i>Suplidores</li>
      </ol>
    </section>
    

    <section class="content">

      
      <div class="box">


        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>

              <tr>
                <th style="width: 10px">#</th>
                <th>RNC</th>
                <th>Tipo Suplidor</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th> 
                <th>Estado</th>
                <th></th>
                
              </tr>
              
            </thead>

            <tbody>

              <?php 

              $id_Suplidor = null;
              $Valor_idSuplidor = null;
              $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];

$suplidores = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

              foreach ($suplidores as $key => $value) {
               
               if($value["Tipo_Suplidor"] == 1){

        if(strlen($value["Documento_Suplidor"]) != 9){
             
          $TipoSuplidor = '<button class="btn btn-danger btn-xs">Jurídico</button>';
        
        }else{
          $TipoSuplidor = 'Jurídico';

        }

                 

    }else{

        if(strlen($value["Documento_Suplidor"]) != 11){
             
         $TipoSuplidor = '<button class="btn btn-danger btn-xs">Físico</button>';
        
        }else{
         $TipoSuplidor = 'Físico';

        }


    }
               





                echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["Documento_Suplidor"].'</td>
                            <td>'.$TipoSuplidor.'</td>
                            <td>'.$value["Nombre_Suplidor"].'</td>
                            <td>'.$value["Email"].'</td>
                            <td>'.$value["Telefono"].'</td>
                            <td>'.$value["Direccion"].'</td>
                            <td>'.$value["Estado"].'</td>
                           
                            <td>
                             
<button Title="Editar Suplidor" class="btn btn-warning btnEditarSuplidor btn-xs" idsuplidor="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarSuplidor" ><i class="fa fa-pencil"></i></button>

<button Title="Eliminar Suplidor" class="btn btn-danger btnEliminarSuplidor btn-xs" idsuplidor="'.$value["id"].'"><i class="fa fa-trash-o"></i></button>
                                                   
                            

                            </td>             

                        </tr>';
              
              }


               ?>

              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->
            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->
          </table>
        
        <!--*****************CIERRE DE TABLA USUARIO********************************* -->

        </div>        

        
      </div>
      

    </section>
 
  </div>
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
        <input type="hidden" class="form-control input-lg" id="ModuloSuplidor" name="ModuloSuplidor" value="suplidores" readonly>

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
                      MODAL EDITAR SUPLIDORES
  ******************************************************* -->
  <!-- Modal -->
<div id="modalEditarSuplidor" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Suplidor</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="hidden" class="form-control input-lg" id="RncEmpresasuplidor" name="RncEmpresasuplidor" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>
              <input type="hidden" id="idsuplidor" name="idsuplidor">
              <input type="hidden" class="form-control input-lg" id="DocumentoAnterior" name="DocumentoAnterior"readonly>



            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
          <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              
                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidor">

                      <input type="radio" Class="Juridico" id="Editarjuridico" name="EditarTipo_Suplidor" value="1" required> Jurídico

                    
                    
                        <input type="radio" Class="Fisico" id="Editarfisico" name="EditarTipo_Suplidor" value="2" required > Físico


                   
                       
                   
                    </div>
                    
            </div>

          </div>

           <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="number" min="0"  class="form-control input-lg input-RNC" name="EditarDocumentoIdsuplidor" id="EditarDocumentoIdsuplidor" required >


            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="EditarSuplidor" name="EditarSuplidor" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

         

           <!--*****************input de EMAIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-lg" id="EditarEmailSuplidor" name="EditarEmailSuplidor">

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
            <!--*****************input de Telefocno********************** -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              
              <input type="text" class="form-control input-lg"  id="EditarTelefonoSuplidor" name="EditarTelefonoSuplidor">

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="EditarDireccionSuplidor" id="EditarDireccionSuplidor">

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Suplidor</button>

      </div>

     <?php 

        $EditarSuplidor = new ControladorSuplidores();
        $EditarSuplidor -> ctrEditarSuplidor();


       


       ?>
         
         
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
<?php 
        
        $EliminarSuplidor = new ControladorSuplidores();
        $EliminarSuplidor -> ctrEliminarSuplidor();


 ?>
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

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" name="nuevoPerfil" required>
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
