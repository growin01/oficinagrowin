
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-pie-chart"></i>
        AUXILIAR DE SUPLIDOR
        
      </h1>
      <br>
      

  
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Auxiliar Suplidor</li>
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
                     
                     
                      <button style ="margin-left: 5px" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i>  </button>

                     
                      <input type="hidden"  id="RncEmpresa" name="RncEmpresa" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">


                     

                  </div>
              </div>

        </div>
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->



        <div class="box-body">
          <!--*****************INICIO NIVEL 1******************************** -->
          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="80%">


            <thead>
              <tr>
                
              
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              <th style="align-content: center;"></th>
              </tr>
            
             
              
            </thead>
             <tbody>

              <?php
              $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
              $FechaDesde = null;
              $FechaHasta = null;
              $idgrupoDetalle = "2";
              $idcategoriaDetalle = "2";
              $idgenericaDetalle = "01";
              $idcuentaDetalle = "001";
              $extraer = "DDG";

    $DDG = ControladorDiario::ctrVerAuxiliar($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $idgrupoDetalle, $idcategoriaDetalle, $idgenericaDetalle, $idcuentaDetalle, $extraer);
  $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
              $FechaDesde = null;
              $FechaHasta = null;
              $idgrupoDetalle = "2";
              $idcategoriaDetalle = "2";
              $idgenericaDetalle = "01";
              $idcuentaDetalle = "001";
              $extraer = "DDA";
     $DDA = ControladorDiario::ctrVerAuxiliar($Rnc_Empresa_LD, $FechaDesde, $FechaHasta, $idgrupoDetalle, $idcategoriaDetalle, $idgenericaDetalle, $idcuentaDetalle, $extraer);
           
             
        foreach ($DDG as $key => $value) {
               $cruzo = 1;
          foreach ($DDA as $key => $valido) {
                
            if($value["credito"] == $valido["debito"]){ 
              
              $cruzo = 2;

            }
            
        }
        if($cruzo == 1){



           echo '<tr>
                <td>'.$value["Nombre_Empresa"].'</td>
                <td>'.$value["Rnc_Factura"].'</td>
                <td>'.$value["NCF"].'</td>
                <td>'.$value["NAsiento"].'</td>
                <td>'.number_format($value["debito"],2).'</td>
                <td>'.number_format($value["credito"],2).'</td>
                </tr>';


          }



            }
         
           
foreach ($DDA as $key => $value) {
          $cruzo = 1;
          foreach ($DDG as $key => $valido) {
                
            if($value["credito"] == $valido["debito"]){ 
              
              $cruzo = 2;

            }
            
        }
      if($cruzo == 1){

        $validarDDA = $value["credito"];

        foreach ($DDA as $a => $value2) {

          if($validarDDA == $value2["debito"]){
             $cruzo = 2;


          }
         }
          if($cruzo == 1){
             echo '<tr>
                <td>'.$value["Nombre_Empresa"].'</td>
                <td>'.$value["Rnc_Factura"].'</td>
                <td>'.$value["NCF"].'</td>
                <td>'.$value["NAsiento"].'</td>
                <td>'.number_format($value["debito"],2).'</td>
                <td>'.number_format($value["credito"],2).'</td>
                </tr>';

          }



           }

       
          
           

      }


        ?>
            <!--*****************FIN ******************************** -->

              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

              

            </tbody>
            <tfoot>
              
              
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
<div id="modalVerEstadoSituacion" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form role="form" method="post">
                <div class="modal-header" style="background: #3c8dbc; color:white">
        
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
        
                <h4 class="modal-title">Ver Detalle</h4>
      
                 </div>

      <div class="modal-body">

        <div class="box-body">

           <div class="col-xs-8">
              <label>Nombre de la Cuenta:</label>

              <input type="text" class="form-control col-xs-6" id="NombreSituacion" name="NombreSituacion" readonly>
                
          </div>

          <table class="table table-bordered table-striped dt-responsive" width="100%">
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

            <tbody id="VerEstadoSituacion">
              

            </tbody>
            

          </table>

          <div class="col-xs-6">
            <label>Total Debito:</label>

            <input type="text" class="form-control col-xs-6" id="debitoSituacion" name="debitoSituacion" readonly>
           

          </div>

         <div class="col-xs-6">
          <label>Total Credito:</label>

            <input type="text" class="form-control col-xs-6" id="creditoSituacion" name="creditoSituacion" readonly>
             
          
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
                      
 
 