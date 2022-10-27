
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado De Empresas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Listado de Empresas</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">
          <a href="agregarempresa">

          <button  class="btn btn-primary" >Agregar Empresa
          </button>
          </a>
          <?php 
              if($_SESSION["Perfil"] == "Programador"){

                echo '<a href="agregarfirmas">
                        <button  class="btn btn-success" >Agregar Firmas</button>
                    </a>';
                 echo '<button class="btn btn-warning btnUsuarioMasivos" data-toggle="modal" data-target="#modalUsuarioMasivos"><i class="fa fa-pencil"></i></button>';

                
              

              } 
          ?>

          
          
          
          
        </div>
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->


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
                <th>Clave DGII</th>
                <th>Cédula TSS</th>
                <th>Class TSS</th>
                <th>Agregar Usuario</th>
                   
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
                    <td>'.$value["Clave_DGII_Empresas"].'</td>
                    <td>'.$value["CedulaTSS"].'</td>
                    <td>'.$value["ClaveTSS"].'</td>
                    
                    <td>
                  <div class="btn-group">
                    <button class="btn btn-warning btnAgregarUsuarioEmpresa" Rnc_Empresa="'.$value["Rnc_Empresa"].'" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="fa fa-pencil"></i></button>
                   
                  </div>
                  
                </td>             

                    
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
              
              <input type="text" class="form-control input-lg" id="RncEmpresaUsuario" name="RncEmpresaUsuario" readonly>

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
          <!--*****************cierra input Contraseña************************* -->

          <!--*****************SELECTOR DE PEFIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-users"></i></span>
              <select class="form-control input-lg" name="nuevoPerfil">
                <option value="">Selecionar Perfil</option>
                <option value="Administrador">Administrador</option>
                <option value="Especial">Especial</option>
                <option value="Vendedor">Vendedor</option>
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




<div id="modalUsuarioMasivos" class="modal fade" role="dialog">
  
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
              
              <input type="text" class="form-control input-lg" id="RncUsuarioMasivo" name="RncUsuarioMasivo">

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
            
         
    
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Usuario</button>

      </div>

      <?php 
      $crearUsuario = new ControladorUsuarios();
      $crearUsuario -> ctrCrearUsuarioMasivo();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

