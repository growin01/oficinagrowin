
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LOGUEOS
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">logueos</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
       

       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->

        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->
          <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                <tr>
                    <td>Fecha Desde:&nbsp;</td>
                    <td><input type="text" id="minlogueos" name="minlogueos"></td>
                </tr>

                <tr>
                    <td>Fecha Hasta:&nbsp;</td>
                    <td><input type="text" id="maxlogueos" name="maxlogueos"></td>
              </tr>
            </tbody>

          </table>
    <br>


          <table class="table table-bordered table-striped dt-responsive logueos"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre Usuario</th>
                <th>Perfil</th>
                <th>Año/Mes</th>
                <th>Dia</th> 
                <th>Fecha Hora</th>               
               

              </tr>

              
            </thead>
             
            
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

             

              <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
              $taRncEmpresaUsuario = 'Rnc_Empresa_Usuario';
              $RncEmpresaUsuario = $_SESSION["RncEmpresaUsuario"];

              $logueosusuarios = ControladorUsuarios::ctrMostrarLogueosUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario);

               foreach ($logueosusuarios as $key => $value){

                if($value["Perfil"] != "Programador"){  
                  echo '<tr>
                          <td style="width: 5px">'.($key+1).'</td>
                          <td>'.$value["Nombre_Usuario"].'</td>
                          <td>'.$value["Perfil"].'</td>
                          <td>'.$value["Fecha_AnoMes"].'</td>
                          <td>'.$value["Fecha_Dia"].'</td>
                          <td>'.$value["Fecha_Login"].'</td>
                              
                           
                            
                        </tr>';



                }


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
<div id="modalDescarga606" class="modal fade" role="dialog">
  
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
              
              <input type="text" class="form-control input-lg" id="RncEmpresa606Rango" name="RncEmpresa606Rango" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="Periodoreporte606" name="Periodoreporte606" required>
                        <option value="">Seleccionar Periodo</option>

                        <?php  
                         

                        $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo606 = Controlador606::ctrMostrarPeriodo606($Rnc_Empresa_606);

                       
                         foreach ($Periodo606 as $key => $value){

                          echo '<option value="'.$value["Fecha_AnoMes_606"].'">'.$value["Fecha_AnoMes_606"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        
       
        
        <a id="descargartxt606">descargar</a>

        

        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>

<?php 
$borrar606 = new Controlador606();
$borrar606 -> ctrBorrar606();


 ?>



  
  