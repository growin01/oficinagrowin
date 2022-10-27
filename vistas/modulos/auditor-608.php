
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        AUTDITOR 608
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">AUDITOR 608</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->

        <div class="box-body">

          <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                <tr>
                    <td>Fecha Desde:</td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>

                <tr>
                    <td>Fecha Hasta:</td>
                    <td><input type="text" id="max" name="max"></td>
              </tr>
            </tbody>

          </table>
    <br>
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive tablas"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                <th>#</th>
                <th>NCF</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Módulo</th>
                <th>Estatus</th>
             

              </tr>

              
            </thead>
             
            
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

             

              <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
              if(isset($_GET["periodoreporte608"])){
               $periodoreporte608 = $_GET["periodoreporte608"];
              }else{
               $periodoreporte608 = $_SESSION["Anologin"];

               }
              $Orden = "id";



              $Rnc_Empresa_608 = $_SESSION["RncEmpresaUsuario"];

              $reporte608 = Controlador608::ctrMostrarReporte608($Rnc_Empresa_608, $Orden, $periodoreporte608);

               foreach ($reporte608 as $key => $value){
                echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["NCF_608"].'</td>
                            <td>'.$value["Fecha_Registro"].'</td>
                            <td>'.$value["Usuario_Creador"].'</td>
                            <td>'.$value["Modulo"].'</td>';
                    if($value["Estatus"] == 1){

                  echo' <td><button title = "Estatus del Registro" class="btn btn-warning btn-xs">No Disponible</button></td>';
                } 
                  else if($value["Estatus"] == 2){

                  echo' <td><button title = "Estatus del Registro" class="btn btn-success btn-xs">Disponible</button></td>';

                }else {

                  echo' <td><button title = "estatus del Registro" class="btn btn-danger btn-xs">Declarada</button></td>';

                }


                            
                        echo'</tr>';



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
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalDescarga607" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">DESCARGA TXT </h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="text" class="form-control input-lg" id="RncEmpresa607Rango" name="RncEmpresa607Rango" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="Periodoreporte607" name="Periodoreporte607" required>
                        <option value="">Seleccionar Periodo</option>

                        <?php  
                         

                        $Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo607 = Controlador607::ctrMostrarPeriodo607($Rnc_Empresa_607);

                       
                         foreach ($Periodo607 as $key => $value){

                          echo '<option value="'.$value["Fecha_comprobante_AnoMes_607"].'">'.$value["Fecha_comprobante_AnoMes_607"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
       <a id="descargartxt607">descargar</a>
        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>

<?php 
$borrar607 = new Controlador607();
$borrar607 -> ctrBorrar607();


 ?>



  
  