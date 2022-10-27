
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar Correlativos
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Correlativos</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        <div class="box-header with-border">

<?php 
    if($_SESSION["Perfil"] == "Programador"){

      echo ' <button class="btn btn-primary pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="glyphicon glyphicon-saved"></i>Crear Nuevo Correlativo No Fiscal Masivo</button>';

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
                <th width="10px">#</th>
                <th width="80px">Fecha Año/Mes Solicitado</th>
                <th width="35px">Fecha Día Solicitado</th>
                <th>Tipo_NCF</th>
                <th width="80px">Fecha Año/Mes Vencimiento</th>
                <th width="35px">Fecha Día Vencimiento</th>
                <th>NCF_Desde</th>
                <th>NCF_Hasta</th>
                <th>NCF Consumidos</th>
                <th>N_Autorizacion</th>
                 <th>Usuario</th>
                <th>Estado</th>
                <th></th>               

              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>


              <?php 

              $taRncEmpresa = 'Rnc_Empresa';
              $RncEmpresa = $_SESSION["RncEmpresaUsuario"];
              $orden = "id";

              $Correlativos = ControladorCorrelativos::ctrMostrarCorrelativos($taRncEmpresa, $RncEmpresa, $orden);
              

          date_default_timezone_set('America/Santo_Domingo');
            $fechames = date('Ym');
            $fechadia = date('d');
       

              foreach ($Correlativos as $key => $value) {
                 
                echo ' <tr>
                <td>'.($key+1).'</td>
                <td>'.$value["Fecha_Comprobante_AnoMes"].'</td>
                <td>'.$value["Fecha_Comprobante_Dia"].'</td>
                <td>'.$value["Tipo_NCF"].'</td>';

                if($value["Fecha_Vencimiento_AnoMes"] >= $fechames){ 
                     echo '<td><button class="btn btn-success">'.$value["Fecha_Vencimiento_AnoMes"].'</button></td>';
                      if($fechadia >= $value["Fecha_Vencimiento_Dia"]){ 
                    
                     echo '<td><button class="btn btn-danger">'.$value["Fecha_Vencimiento_Dia"].'</button></td>'; 

                     }else{
                       echo '<td><button class="btn btn-success">'.$value["Fecha_Vencimiento_Dia"].'</button></td>'; 



                     }
                     

                  }else{
                     echo '<td><button class="btn btn-danger">'.$value["Fecha_Vencimiento_AnoMes"].'</button></td>';
                      
                    
                    
                     echo '<td><button class="btn btn-danger">'.$value["Fecha_Vencimiento_Dia"].'</button></td>'; 

                     


                  }
                

                
                echo '<td>'.$value["NCF_Desde"].'</td>
                <td>'.$value["NCF_Hasta"].'</td>
                <td>'.$value["NCF_Cons"].'</td>
                <td>'.$value["N_Autorizacion"].'</td>
                <td>'.$value["Usuario"].'</td>
                <td>'.$value["Accion"].'</td>

                <td>
                  <div class="btn-group">
                    <button class="btn btn-success btn-xs btnEditarCorrelativo" idCorrelativo="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCorrelativo"><i class="glyphicon glyphicon-plus"></i></button>
                   
                                       

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
                      MODAL Editat USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalEditarCorrelativo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Correlativos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCorrelativos" name="RncEmpresaCorrelativos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioLoguedo" name="UsuarioLoguedo" value="<?php echo $_SESSION["Nombre"];?>" readonly>

          </div>


          </div>
       
              
<input type="hidden" class="form-control input-lg" id="idCorrelativos" name="idCorrelativos" readonly>
<input type="hidden" class="form-control input-lg" id="NCF_DesdeAntes" name="NCF_DesdeAntes" readonly>
<input type="hidden" class="form-control input-lg" id="NCF_HastaAntes" name="NCF_HastaAntes" readonly>
<input type="hidden" class="form-control input-lg" id="NCF_ConsAntes" name="NCF_ConsAntes" readonly>

         
      

             <div style="padding-right: 0px"  class="form-group col-xs-10">
               <label>Tipo de NCF</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" readonly>

                  </div>

                </div>


         
<div style="padding-right: 0px"  class="form-group col-xs-12">
  <label for=""> Fecha de Solicitud</label>
</div>

          
<div style="padding-right: 0px"  class="form-group col-xs-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="Fecha_Comprobante_AnoMes" name="Fecha_Comprobante_AnoMes" required autofocus>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-6">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="Fecha_Comprobante_Dia" name="Fecha_Comprobante_Dia" required autofocus>
 </div>  
  
  
</div>
<div class="form-group col-xs-12"> </div>


               <div class="col-xs-6" style="padding-right:0px">

                      <label>NCF DESDE</label>
          
   

                        <input type="text" class="form-control"  id="NCF_Desde" name="NCF_Desde" required>


                  </div>

                      <div class="col-xs-6" style="padding-right:0px">

                      <label>NCF HASTA</label>
          
   

                        <input type="text" class="form-control"  id="NCF_Hasta" name="NCF_Hasta" required>


                      </div>
<div class="form-group col-xs-12"> </div>
<div style="padding-right: 0px"  class="form-group col-xs-12">
  <label for="">Fecha de Vencimiento de los Correlativos</label>
</div>

          
<div style="padding-right: 0px"  class="form-group col-xs-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="Fecha_Vencimiento_AnoMes" name="Fecha_Vencimiento_AnoMes" required autofocus>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-6">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="Fecha_Vencimiento_Dia" name="Fecha_Vencimiento_Dia" required autofocus>
 </div>  
  
  
</div>
<div class="form-group col-xs-12"> </div>

                

               <div class="col-xs-10" style="padding-right:0px">

                      <label>N° de Autorizacion</label>
          
   

                        <input type="text" class="form-control" id="N_Autorizacion" name="N_Autorizacion" required>


                  </div>

      
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Correlativos</button>

      </div>

      <?php 
      $editarCorrelativos = new ControladorCorrelativos();
      $editarCorrelativos -> ctreditarCorrelativos();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

<div id="modalCorrelativoNoFiscal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Correlativos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA USUARIO********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaNoMasivo" name="RncEmpresaNoMasivo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioLoguedo" name="UsuarioLoguedo" value="<?php echo $_SESSION["Nombre"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <!--*****************id correlativo********************** -->

         

             <div class="form-group col-xs-6">
               <label>Tipo de NCF</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="">

                  </div>

                </div>


          
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <div class="form-group col-xs-6">
               <label>Correlativo de Factura No Fiscal</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="NCF_Cons" name="NCF_Cons" maxlength="10" value="0">

                  </div>

                </div>

             
              
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Correlativos</button>

      </div>

      <?php 
      $editarCorrelativos = new ControladorCorrelativos();
      $editarCorrelativos -> ctreditarCorrelativosNoFiscalMasivo();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
