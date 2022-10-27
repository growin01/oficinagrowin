
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Control TSS  De las Empresas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"> Control TSS  De las Empresas
      </h1></li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">
          <a href="agregarempresa">

          <button  class="btn btn-primary">Agregar Empresa
          </button>
          </a>

         
            <select class="btn btn-default pull-right"  id="FechaControlTSS" name="FechaControlTSS">
                <option value="">Fecha Control</option>
                <option value="202001">2020-01</option>
                <option value="202002">2020-02</option>
                <option value="202003">2020-03</option>
                <option value="202004">2020-04</option>
                <option value="202005">2020-05</option>
                <option value="202006">2020-06</option>
                <option value="202007">2020-07</option>
                <option value="202008">2020-08</option>
                <option value="202009">2020-09</option>
                <option value="202010">2020-10</option>
                <option value="202011">2020-11</option>
                <option value="202012">2020-12</option>
                <option value="202101">2021-01</option>
                <option value="202102">2021-02</option>
                <option value="202103">2021-03</option>
                <option value="202104">2021-04</option>
                <option value="202105">2021-05</option>
                <option value="202106">2021-06</option>
                <option value="202107">2021-07</option>
                <option value="202108">2021-08</option>
                <option value="202109">2021-09</option>
                <option value="202110">2021-10</option>
                <option value="202111">2021-11</option>
                <option value="202112">2021-12</option>
                
                
            

          
              </select>
              <select class="btn btn-default pull-right"  id="NombreEmpresaControlTSS" name="NombreEmpresaControlTSS">
                <option value="">Nombre Empresa</option>

                 <?php  
                         

                        $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                        $Rnc_Empresa_Master = $_SESSION["RncEmpresaUsuario"];
                        $Orden = "id";
              

              $respuesta = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);
     
              foreach ($respuesta as $key => $value){

                if($value["Rnc_Empresa_Master"] ==  $Rnc_Empresa_Master && $value["Rnc_Empresa"] != $Rnc_Empresa_Master){ 

                          echo '<option value="'.$value["Rnc_Empresa"].'">'.$value["Nombre_Empresa"].'</option>';



                         }
                         }
                    

                         ?>
               
                
            

          
              </select>


         


         
          
          
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
                <th>Nombre Empresa</th>
                <th>Año/Mes</th>
                <th>TSS</th>
                <th>IR3</th>
                
                
                
              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>


               <?php 

               if(isset($_GET["FechacontrolTSS"])){
                  $Rnc_Empresa_Master = $_SESSION["RncEmpresaUsuario"];
                  $Periodo_Empresa = $_GET["FechacontrolTSS"];
                  $Rnc_Empresa = null;
                  
                }elseif(isset($_GET["NombreControlTSS"])){
                  $Rnc_Empresa_Master = $_SESSION["RncEmpresaUsuario"];
                  $Periodo_Empresa = null;
                  $Rnc_Empresa = $_GET["NombreControlTSS"];
                  

                }else{
                  $Rnc_Empresa_Master = $_SESSION["RncEmpresaUsuario"];
                  $Periodo_Empresa = "202001";
                  $Rnc_Empresa = null;
                  
                  }
                     

                $respuesta = ControladorEmpresas::ctrControlEmpresas($Rnc_Empresa_Master, $Periodo_Empresa, $Rnc_Empresa);
                        
                        foreach ($respuesta as $key => $value){

                          echo ' <tr>
                              <td>'.($key+1).'</td>
                              <td>'.$value["Rnc_Empresa"].'</td>
                              <td>'.$value["Nombre_Empresa"].'</td>
                              <td>'.$value["Periodo_Empresa"].'</td>';

                          if($value["TSS_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning btnTSS" idcontrolTSS="'.$value["id"].'" estadoTSS="2" FechacontrolTSS="'.$value["Periodo_Empresa"].'">En Proceso</button></td>';
                          }elseif($value["TSS_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success btnTSS" idcontrolTSS="'.$value["id"].'" estadoTSS="2" FechacontrolTSS="'.$value["Periodo_Empresa"].'">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger btnTSS" idcontrolTSS="'.$value["id"].'" estadoTSS="1" FechacontrolTSS="'.$value["Periodo_Empresa"].'">Sin Información</button></td>'; 
                          }


                          if($value["IR3_Empresa"] == "1"){
                             echo '<td><button class="btn btn-warning btnIR3" idcontrolIR3="'.$value["id"].'" estadoIR3="2" FechacontrolTSS="'.$value["Periodo_Empresa"].'">En Proceso</button></td>';
                          }elseif($value["IR3_Empresa"] == "2"){
                             echo '<td><button class="btn btn-success btnIR3" idcontrolIR3="'.$value["id"].'" estadoIR3="2" FechacontrolTSS="'.$value["Periodo_Empresa"].'">Terminado</button></td>';  
                          }else{
                              echo '<td><button class="btn btn-danger btnIR3" idcontrolIR3="'.$value["id"].'" estadoIR3="1" FechacontrolTSS="'.$value["Periodo_Empresa"].'">Sin Información</button></td>'; 
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

