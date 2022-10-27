
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Control Fondos Anticipos De las Empresas
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"> Control Fondos Anticipos De las Empresas
      </h1></li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">
         
         
          
             
         
          
          
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
                <th>N° de Control</th>
                <th>Nombre Fondo</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Saldo Inicial</th>
                <th>Credito</th>
                <th>Debito</th>
                <th>Monto Disponible</th>
                <th>Descripcion</th>
                <th>Estado</th>
                
                
                
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

            $tabla = "rendirfondos_empresas";
            $taRnc_Empresa_Anticipo = "Rnc_Empresa_Anticipo";
            $Rnc_Empresa_Anticipo = $value["Rnc_Empresa"];
              
  $Anticipo = ModeloAnticipo::mdlMostrarRendicionAnticipos($tabla, $taRnc_Empresa_Anticipo, $Rnc_Empresa_Anticipo);

              echo '<tr>
                    
                    
                    <td>'.($key+1).'</td>
                    <td>'.$value["Rnc_Empresa"].'</td>
                    <td>'.$value["Nombre_Empresa"].'</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td></tr>';
       
       foreach ($Anticipo as $key => $fondo) {

          if($fondo["Estado"] == 1){ 
              echo '<tr>
                    
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>'.$fondo["NAsiento"].'</td>
                    <td>'.$fondo["Nombre_Cuenta"].'</td>
                    <td>'.$fondo["Fecha_AnoMes"].'</td>
                    <td>'.$fondo["Fecha_dia"].'</td>
                    <td>'.$fondo["SaldoInicial"].'</td>
                    <td>'.number_format($fondo["credito"], 2).'</td>
                    <td>'.number_format($fondo["debito"], 2).'</td>
                    <td>'.number_format($fondo["Monto"], 2).'</td>
                    <td>'.$fondo["Descripcion"].'</td>';
                     
                if($fondo["Estado"] == 1){

                  echo' <td><button class="btn btn-success btn-xs" idRendirFondo="'.$fondo["id"].'" estadoRendirFondo="2">Abierto</button></td>';
                } 
                else {

                  echo' <td><button class="btn btn-danger btn-xs" idRendirFondo="'.$fondo["id"].'" estadoRendirFondo="1">Cerrado</button></td>';

                }
            echo '<td> <div class="btn-group">
                    <button class="btn btn-info btn-xs btnRendicionFondos" idRendido="'.$fondo["id"].'"><i class="fa fa-print"></i>
                    <button class="btn btn-default btn-xs btnVerDetalleFondo" idRendido="'.$fondo["id"].'" data-toggle="modal" data-target="#modalVerFondoRendido"><i class="glyphicon glyphicon-search"></i></button>';
                   
                     
               

                  echo'</div>';



                    echo'</td></tr>
                    
                    
                    ';

            }
            }
             





    } // cierre primer foreach de las empresas


             
              
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

<!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalVerFondoRendido" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color:white">
        
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                <h4 class="modal-title">Ver Detalle</h4>
      
                 </div>

      <div class="modal-body">

        <div class="box-body">

                  <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                   

                      <h4 style="text-align: center;"><b>DATOS DE FONDOS RENDIDOS</b></h4>

                 
                </div>
                   

           <div class="col-xs-6">
              <label>N° de Fondos Rendidos</label>

              <input type="text" class="form-control col-xs-6" id="NRendido" name="NRendido" readonly>
                
          </div>
          <div class="col-xs-6">
              <label>Nombre Fondo</label>

              <input type="text" class="form-control col-xs-6" id="NombreFondo" name="NombreFondo" readonly>
                
          </div>
           <div class="col-xs-6">
              <label>Fecha</label>

              <input type="text" class="form-control col-xs-6" id="Fecha" name="Fecha" readonly>
                
          </div>
          <div class="col-xs-6">
              <label>Responsable</label>

              <input type="text" class="form-control col-xs-6" id="Responsable" name="Responsable" readonly>
                
          </div>
           <div class="col-xs-12">
              <label>Descripcion</label>

              <input type="text" class="form-control col-xs-12" id="descripcion" name="descripcion" readonly>
                
          </div>


          <table class="table table-bordered table-striped dt-responsive" width="100%">
            <thead> 
              <tr>
                <th>Suplidor</th>
                <th>NCF</th>
                <th>Fecha</th>
                <th>Credito</th>
                <th>Debito</th>
                <th>Saldo</th>
                
                
             </tr>


            </thead>

            <tbody id="VerDetalleFondo">
              

            </tbody>
            

          </table>

          <div class="col-xs-4">
            <label>Total Credito:</label>

            <input type="text" class="form-control col-xs-6" id="credito" name="credito" readonly>
           

          </div>

         <div class="col-xs-4">
          <label>Total Debito:</label>

            <input type="text" class="form-control col-xs-6" id="debito" name="debito" readonly>
             
          
        </div>
         <div class="col-xs-4">
          <label>Total Saldo:</label>

            <input type="text" class="form-control col-xs-6" id="saldo" name="saldo" readonly>
             
          
        </div>



        











        </div>
      </div>
      


  


    
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

      </div>
     
        </form><!-- CIERRO EL FORMULARIO *-->

    </div> <!--modal-content-->
  </div> <!--modal-dialog modal-lg-->
</div> <!-- cierre modal -->
