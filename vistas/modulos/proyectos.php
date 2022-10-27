
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<h1 class="col-xs-4" style="font-size: 30px"><i class="glyphicon glyphicon-list-alt"></i>
       Administrar Proyectos
        
  </h1>
 

   <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProyecto"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Proyecto</button>
    <a href="proyectosuplidor" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Proyectos por Suplidor</a>
     <a href="resumenproyectos" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Resumen por Proyecto</a>
          
          
     

    
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Proyectos</li>
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
                
                <th>Nombre del Proyecto</th>
                <th>Código Proyecto</th>
                <th>Código de Cotización</th>
                <th>Año/Mes Inicio</th>
                <th>Día Inicio</th>
                <th>Año/Mes fin</th>
                <th>Día fin</th>
                <th>Descripcion</th>
                <th>Presupuesto</th>
                <th>Ejecutado</th>
                <th>Variación</th>
                <th>Estado</th>
                <th>Acción</th>
                
              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

              <?php
              $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];
              $Proyectos = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);
              
              foreach ($Proyectos as $key => $value){
                
                 $totalResultado  = 0;
                 $disponible = 0;

                $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
                $idgrupoDesde = 5;
                $idgrupoHasta = 6;
                $Proyecto = $value["id"];
                $Orden = "id_registro";

                $suma = ControladorProyecto::ctrSumarResumenProyectos($Rnc_Empresa_LD, $idgrupoDesde, $idgrupoHasta, $Proyecto, $Orden);

                 foreach ($suma as $key => $total){
                  $Resultado = 0;
                  $Resultado = $total["debito"] - $total["credito"];

                  $totalResultado =  $totalResultado + $Resultado;


                 }
              

                
                  echo '<tr>
                    
                    <td class="text-uppercase">'.$value["NombreProyecto"].'</td>
                    <td>'.$value["CodigoProyecto"].'</td>
                    <td>'.$value["Corre_Cotizacion"].'</td>
                    <td>'.$value["Fecha_anomes_inicio"].'</td>
                    <td>'.$value["Fecha_dia_inicio"].'</td>
                    <td>'.$value["Fecha_anomes_fin"].'</td>
                    <td>'.$value["Fecha_dia_fin"].'</td>
                    <td>'.$value["DescripcionProyecto"].'</td>
                    <td>'.number_format($value["SaldoInicial"], 2).'</td>
                    <td>'.number_format($totalResultado, 2).'</td>';

                    $disponible = $value["SaldoInicial"] - $totalResultado;

                    
                    if($disponible >= 0){
                      echo'<td>'.number_format($disponible, 2).'</td>';

                    
                    }else{
                       echo'<td><button class="btn btn-danger btn-sm">'.number_format($disponible, 2).'</button></td>';


                    }


                   
                  if($value["estatus"] == 1){

                  echo' <td><button class="btn btn-warning btn-sm btnActivarProyecto" idProyecto="'.$value["id"].'"  estadoProyecto="2">En Proceso</button></td>';
                } 
                  else {

                  echo' <td><button class="btn btn-success btn-sm btnActivarProyecto" idProyecto="'.$value["id"].'" estadoProyecto="1">Terminado</button></td>';

                }
                     
                    echo '<td>
                      <div class="btn-group">
                        <button class="btn btn-warning btn-xs btnEditarProyecto" idProyecto="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarProyecto"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btn-xs btnEliminarProyecto" idProyecto="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                           

                      </div>
                      


                    </td>             

                  </tr>';


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
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarProyecto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Proyecto</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaProyecto" name="RncEmpresaProyecto" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioProyecto" name="UsuarioProyecto" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input" maxlength="15" id="CodigoProyecto" name="CodigoProyecto" placeholder="Ingresar Código del Proyecto" required>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input" maxlength="15" id="NcotizacionProyecto" name="NcotizacionProyecto" placeholder="Ingresar Número de Cotización">

            </div>

          </div>

          
         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-text-width"></i></span>
              <input type="text" class="form-control input" maxlength="35" id="nuevoProyecto" name="nuevoProyecto" placeholder="Ingresar Nombre de Proyecto" required>

            </div>

          </div>

           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-align-right"></i></span>
              <input type="text" class="form-control input" maxlength="35" id="descripcionProyecto" name="descripcionProyecto" placeholder="Ingresar Descripción de Proyecto" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->
          
        </div>
         <label>FECHA DE INICIO DEL PROYECTO</label>

         <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control FechaInicio">

                     <label>Año/Mes</label>
                      <input type="text" maxlength="6" id="FechamesProyectoInicio" name="FechamesProyectoInicio" required>

                     
                      <label>Dìa</label>
                      <input type="text" maxlength="2" id="FechadiaProyectoInicio" name="FechadiaProyectoInicio" required>


                    </div>
                   

                  </div>
          </div>

          <label>FECHA DE FIN DEL PROYECTO</label>
          <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group- form-control FechaFin">

                     <label>Año/Mes</label>
                      <input type="text" maxlength="6" id="FechamesProyectoFin" name="FechamesProyectoFin" required>

                     
                      <label>Dìa</label>
                      <input type="text" maxlength="2" id="FechadiaProyectoFin" name="FechadiaProyectoFin" required>


                    </div>
                   

                  </div>
          </div>
           <div class="form-group col-lg-8">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
              <input type="text" class="form-control input" id="SaldoInicialProyecto" name="SaldoInicialProyecto" placeholder="Ingresar el saldo Presupuestado" required>

            </div>

          </div>
          <br>
            
      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>

      </div>
      <?php 
      

      $crearProyecto = new ControladorProyecto();
      $crearProyecto -> ctrCrearProyecto();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->
    <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalEditarProyecto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Proyecto</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="Editar-RncEmpresaProyecto" name="Editar-RncEmpresaProyecto" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Editar-UsuarioProyecto" name="Editar-UsuarioProyecto" value="<?php echo $_SESSION["Usuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="idProyecto" name="idProyecto" readonly>


            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input" maxlength="15" id="Editar-CodigoProyecto" name="Editar-CodigoProyecto" required>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control input" maxlength="15" id="Editar-NcotizacionProyecto" name="Editar-NcotizacionProyecto" placeholder="Ingresar Número de Cotización">

            </div>

          </div>

            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-text-width"></i></span>
              <input type="text" class="form-control input" maxlength="35" id="Editar-nuevoProyecto" name="Editar-nuevoProyecto" placeholder="Ingresar Nombre de Proyecto" required>

            </div>

          </div>
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-align-right"></i></span>
              <input type="text" class="form-control input" maxlength="35" id="Editar-descripcionProyecto" name="Editar-descripcionProyecto" placeholder="Ingresar Descripción de Proyecto" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->
          
        </div>
         <label>FECHA DE INICIO DEL PROYECTO</label>

         <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="Editar-FechamesProyectoInicio" name="Editar-FechamesProyectoInicio" required>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia" maxlength="2" id="Editar-FechadiaProyectoInicio" name="Editar-FechadiaProyectoInicio" required>


                    </div>
                   

                  </div>
          </div>

          <label>FECHA DE FIN DEL PROYECTO</label>
          <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="FechamesBanco" maxlength="6" id="Editar-FechamesProyectoFin" name="Editar-FechamesProyectoFin" required>

                     
                      <label>Dìa</label>
                      <input type="text" class="FechadiaBanco" maxlength="2" id="Editar-FechadiaProyectoFin" name="Editar-FechadiaProyectoFin" required>


                    </div>
                   

                  </div>
          </div>
           <div class="form-group col-lg-8">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
              <input type="text" class="form-control input" id="Editar-SaldoInicial" name="Editar-SaldoInicial" placeholder="Ingresar el saldo Presupuestado" required>

            </div>

          </div>
          <br>




      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Proyecto</button>

      </div>
      <?php 
      

      $EditarProyecto = new ControladorProyecto();
      $EditarProyecto -> ctrEditarProyecto();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->

<?php 
$borrarProyectos = new ControladorProyecto();
$borrarProyectos -> ctrBorrarProyecto();


 ?>

<!--************************************************
                    CIERRE DE  MODAL EDITAR categoria
  ******************************************************* -->