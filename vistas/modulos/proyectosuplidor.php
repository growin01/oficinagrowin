
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
       Proyecto Suplidor
      </h1>

      <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProyecto"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Proyecto</button>
    <a href="proyectos" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Administrar Proyectos</a>
     <a href="resumenproyectos" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Resumen por Proyecto</a>
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">PROYECTO SUPLIDOR</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">
           <div class="form-group">

                    <div class="input-group">
                      
                       

                     <label>Fecha Desde</label>
                      
                      <input type="text" style ="margin-left: 5px" maxlength="6" id="FechaDesde" name="FechaDesde" value ="<?php if(isset($_GET["FechaDesde"])){echo $_GET["FechaDesde"];} ?>">
                      <br>
                      <label>Fecha Hasta</label>
                      <input type="text" style ="margin-left: 7px" maxlength="6" id="FechaHasta" name="FechaHasta" value ="<?php if(isset($_GET["FechaHasta"])){echo $_GET["FechaHasta"];} ?>">
                      <br>
                      <br>

                      <label>Proyectos</label>
                     



                      
                       
                       <select type="text" class="form-control col-xs-4" id="Codproyecto" name="Codproyecto" required>
                          <option value="">Seleccionar Proyecto</option>


                    <?php  

                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];
                    
                    $proyectos = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);
                     
                     foreach ($proyectos as $key => $pro) {
                          echo '<option value="'.$pro["id"].'">'.$pro["CodigoProyecto"].'</option>';
                         

                        }
                            


                      ?>   

                          </select>
                           <button style ="margin-left: 5px" class="btn btn-warning btnProyectoSuplidor pull-right" id="ProyectoSuplidor"><i class="glyphicon glyphicon-search"></i>  </button>

                          
                     
                  </div>
                   

              </div>


        </div>
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->



        <div class="box-body">
         


          <?php 
          if (isset($_GET["Proyecto"])){
             foreach ($proyectos as $key => $pro) {

                if($_GET["Proyecto"] == $pro["id"]){ 
                  echo ' <h2 align="center">'.$pro["NombreProyecto"].' '.$pro["CodigoProyecto"].'</h2>';
                


                }
                         
                         

               }
                            


            
          } 

           ?>


          

          <!--*****************INICIO NIVEL 1******************************** -->
          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="100%">


            <thead>
              <tr>
                
              <th style="width:3px">N° Asiento</th>
              <th style="width:3px">Cuenta Contable</th>
               <th style="width:3px">Nombre Cuenta</th>
              <th style="width:5px">Rnc</th>
              <th>Nombre Empresa</th>
              <th>NCF</th>
              <th>Debe </th>
              <th>Haber</th>
              <th>Observaciones</th>
              
              </tr>

              
             
              
            </thead>
             <tbody>
              <?php 
                $totalDebito = 0;
                $totalCredito = 0;

              if(isset($_GET["Proyecto"])){


            $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
            $FechaDesde = $_GET["FechaDesde"];
            $FechaHasta = $_GET["FechaHasta"];
            $Proyecto = $_GET["Proyecto"];
            $Orden = "id_registro";

            $respuesta = ControladorDiario::ctrMostrarResumenProyectos($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $Proyecto, $Orden);
            $totalResultado = 0;

              foreach ($respuesta as $key => $value) {
                $plancuenta = $value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_cuenta"];  
             
              echo ' <tr>
                <td>'.$value["NAsiento"].'</td>
                 <td>'.$plancuenta.'</td>
                 <td>'.$value["Nombre_Cuenta"].'</td>
                  <td>'.$value["Rnc_Factura"].'</td>
                   <td>'.$value["Nombre_Empresa"].'</td>
                    <td>'.$value["NCF"].'</td>
                     <td>'.$value["debito"].'</td>
                      <td>'.$value["credito"].'</td>
                       <td>'.$value["ObservacionesLD"].'</td>
                        
              
              </tr>';

               $totalDebito = $totalDebito + $value["debito"];
                $totalCredito = $totalCredito + $value["credito"];
              


              }
            
            


            }


            
              

             

             
           

           ?>
            <!--*****************FIN ******************************** -->

              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

              

            </tbody>
            <tfoot>
             
              <tr>
                        <td></td>
                        <td></td> 
                        <td></td> 
                        <td></td> 
                         <td></td> 
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;">TOTAL RESULTADO</td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"><?php echo number_format($totalDebito, 2);?></td>
                        <td style="font-weight:bold; border:1px solid #eee; background: #ABEBC6;"><?php echo number_format($totalCredito, 2);?></td>
                        <td></td> 
                        </tr>
                  

              
            </tfoot>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        



         
       

        </div>        

        
      </div>
      

    </section>
 
  </div>

  <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalVerDetalle" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Ver Detalle</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="60%">
            <thead> 
              <tr>
                <th>N° Asiento</th>
                <th>Fecha Año/Mes</th>
                <th>Nombre de Empresa</th>
                <th>NCF</th>
                <th>Debito</th>
                <th>Credito</th>
                <th>Observaciones</th>
                
                


              </tr>


            </thead>

            <tbody id="detalle">
              

            </tbody>
            



          </table>

        
        
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Categoría</button>

      </div>
      <?php 
      

      //$EditarCategoria = new ControladorCategorias();
      //$EditarCategoria -> ctrEditarCategoria();
      

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
                      
 