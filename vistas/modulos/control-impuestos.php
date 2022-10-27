
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Control de los Procesos  De las Empresas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"> Control de los Procesos  De las Empresas
      </h1></li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->


        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Rnc Empresa</th>
                <th>Nombre Empresa</th>
                <th>Año/Mes</th>
                <th>TSS</th>
                <th>IR-3</th>
                <th>IR-17</th>
                <th>Anticipo</th>
                <th>606</th>
                <th>607</th>
                <th>ITBIS</th>
                
                
              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>


               <?php 

                
               $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                 
                $respuesta = ControladorEmpresas::ctrControlEmpresaIndividual($Rnc_Empresa);
                        
                        foreach ($respuesta as $key => $value){

                          echo ' <tr>
                              <td>'.($key+1).'</td>
                              <td>'.$value["Rnc_Empresa"].'</td>
                              <td>'.$value["Nombre_Empresa"].'</td>
                              <td>'.$value["Periodo_Empresa"].'</td>';

                          if($value["TSS_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning">En Proceso</button></td>';
                          }elseif($value["TSS_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger">Sin Información</button></td>'; 
                          }

                          if($value["IR3_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning">En Proceso</button></td>';
                          }elseif($value["IR3_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger">Sin Información</button></td>'; 
                          }
                          if($value["IR17_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning">En Proceso</button></td>';
                          }elseif($value["IR17_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger">Sin Información</button></td>'; 
                          }
                          if($value["Anticipo_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning">En Proceso</button></td>';
                          }elseif($value["Anticipo_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger">Sin Información</button></td>'; 
                          }
                          if($value["606_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning">En Proceso</button></td>';
                          }elseif($value["606_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger">Sin Información</button></td>'; 
                          }

                          if($value["607_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning">En Proceso</button></td>';
                          }elseif($value["607_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger">Sin Información</button></td>'; 
                          }

                           if($value["ITBIS_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning">En Proceso</button></td>';
                          }elseif($value["ITBIS_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger">Sin Información</button></td>'; 
                          }




                        
                              
                            echo '</tr>';



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

