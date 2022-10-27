<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Agregar Firmas
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Agregar Firmas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

      <div class="col-lg-5 col-xs-12">
          
          <div class="box box-success">

            <div class="box-header with-border"></div>

            <form role="form" method="post">

            <div class="box-body">
             

             
                <div class="box" >

                 

                  <!--=================================================
                  ENTRADA DEL VENDEDOR =======================================================-->

                  <div class="form-group">

                    <div class="input-group">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
                        
                        <input type="text" class="form-control" id="RncEmpresaMaster" name="RncEmpresaMaster" placeholder="Ingresar RNC Empresa Master" required>


                  

                    </div>
                   

                  </div>

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      

                      <input type="text" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>" readonly>
                    

                    </div>
                   

                  </div>
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control">

                   
                        <input type="radio"  name="Tipo_Empresa" id="juridico" value="Firma" required readonly checked> Firma
                        <input type="radio" name="Tipo_Empresa" id="fisico" value="Firma-Empresa" required readonly>Firma-Empresa
                        <input type="radio" name="Tipo_Empresa" id="fisico" value="Empresa" required readonly>Empresa

                   
                    </div>

                  </div>

       </div>
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoIdEmpresa">

                   
                        <input type="radio" Class="Juridico" name="Tipo_Id_Empresa" id="juridico" value="1" required checked> Jurídico

                    
                    
                        <input type="radio" Class="Fisico" name="Tipo_Id_Empresa" id="fisico" value="2" required> Fisico

                   
                    </div>

                  </div>

                  </div>

                  <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

                    <input type="text" class="form-control input-RNC" maxlength="11" id="nuevoRncEmpresa" name="nuevoRncEmpresa" placeholder="Ingresar RNC o Cédula" required>

                  </div>

                </div>

                   <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                    <input type="text" class="form-control"  id="Nombre_Empresa" name="Nombre_Empresa" placeholder="Nombre de la Empresa"  required>
                    

                  </div>

                </div>
                   <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      

                      <input type="text" class="form-control" id="Direccion_Empresa" name="Direccion_Empresa" placeholder="Dirección de la Empresa">
                    

                    </div>
                   

                  </div>
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      

                      <input type="text" class="form-control" id="Telefono_Empresa" name="Telefono_Empresa" placeholder="Teléfono de la Empresa">
                    

                    </div>
                   

                  </div>
                   <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      

                      <input type="text" class="form-control" id="Correo_Empresa" name="Correo_Empresa" placeholder="Correo de la Empresa">
                    

                    </div>
                   

                  </div>

                  <div class="form-group">

                    <h3>Datos del Usuario</h3>

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Nuevo Nombre" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          <!--*****************input de Usuario********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoUsuario" name="nuevoUsuario" placeholder="Nuevo Usuario" required>

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

         
              
              <input type="hidden" class="form-control input-lg" name="pro" value="laura" required readonly>

           
          <!--*****************cierra input de Nombre de Usuario************************* -->

          <!--*****************input de Usuario********************** -->

          
              <input type="hidden" class="form-control input-lg" name="jnjdldsk" value="jnjdldsk" required readonly>

            
          <!--*****************cierra input de Usuario************************* -->

          <!--*****************input de Contraseña********************** -->

          
              <input type="hidden" class="form-control input-lg" name="control" value="0112201225072017" required>

           
          <!--*****************cierra input Contraseña************************* -->

          <!--*****************SELECTOR DE PEFIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" name="nuevoPerfil"  required>
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

          
                  
                  

            




                

                  </div>
                 
                  

                </div>  


              

            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Agregar Empresa</button>

              
            </div>

          </form>
          <?php 

            $CrearEmpresa = new ControladorEmpresas();
            $CrearEmpresa -> ctrCrearEmpresas();




           ?>

       
          </div>
               <!--=================================================
                  otro formulario

               =======================================================-->
 


             <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

              <div class="box box-warning"></div>
              <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Rnc Empresa</th>
                <th>Tipo Empresa</th>
                <th>Nombre Empresa</th>
                <th>Usuario Creador</th>
                <th>Fecha Creada</th>
                <th>Accion</th>
                
                
                
                
              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

              <?php
               $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
              $Rnc_Empresa_Master = $_SESSION["RncEmpresaUsuario"];
               $Orden = "id";
              

              $respuesta = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);
     
              foreach ($respuesta as $key => $value){

                if($value["Rnc_Empresa_Master"] ==  $Rnc_Empresa_Master && $value["Rnc_Empresa"] != $Rnc_Empresa_Master){ 
                  echo '<tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["Rnc_Empresa"].'</td>
                    <td>'.$value["Tipo_Empresa"].'</td>
                    <td>'.$value["Nombre_Empresa"].'</td>
                    <td>'.$value["Usuario_Creador_Empresa"].'</td>
                    <td>'.$value["Fecha_Creacion_Empresa"].'</td>
                     <td>'.$value["Accion_Empresa"].'</td>
                   
                   
                   

                   

                    
                  </tr>';
                  }


              }




               ?>

             
              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        <!--*****************CIERRE DE TABLA USUARIO********************************* -->

        </div>        






               
              

        </div>
        <!--=================================================
                CIERRO FORMULARIO
        =======================================================-->
 


          
        </div>


        

      </div>




      
    </section>


   </div>





  