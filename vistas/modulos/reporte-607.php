
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-university"></i>
        REPORTE 607
        
      </h1>

    <a href="registro-606" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 606</a>
   <a href="registro-607" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 607</a>
   <a href="registro-608" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 608</a>

   <a href="cuadre-itbis" class="btn btn-success"><i class="fa fa-pie-chart" style="padding-right:5px"></i>Cuadre Itbis</a>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga606"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 606</button>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga607"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 607</button>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga608"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 608</button> 


    
    <a class="btn btn-success" role="button" href="bcf"><i class="fa fa-folder" style="padding-right:5px"></i>Carga Masiva Consumidor Final</a>

     
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
        <div class="box-header with-border">

         
         
  
        </div>

       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->

        <div class="box-body">

          <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodoreporte607" id="periodoreporte607">
  <?php 
if(isset($_GET["periodoreporte607"])){
echo'<option value="'.$_GET["periodoreporte607"].'">'.$_GET["periodoreporte607"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodoreporte607"] != $value) { 
     echo'<option value="'.$value.'">'.$value.'</option>';
     }
    
  
}/*cierre foreach*/
}else{
 echo'<option value="'.$_SESSION["Anologin"].'">'.$_SESSION["Anologin"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_SESSION["Anologin"] != $value) { 
     echo'<option value="'.$value.'">'.$value.'</option>';
     }
    
    

}

 
  }

   ?>
   </select></td> </tr>
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


          <table class="display nowrap table table-bordered table-striped tablareporte607"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                <th style="width:5px">#</th>
                <th style="width:15px">RNC</th>
                <th style="width:20px">NCF</th>
                <th style="width:15px">NCF A</th>
                <th style="width:15px">Año/Mes</th>
                <th style="width:5px">NCF</th>
                <th>Forma de Pago</th> 
                <th style="width:5px">%R ITBIS</th>
                <th style="width:5px">%R ISR</th> 
                <th>Sub Total</th> 
                <th>ITBIS</th>
                <th>Total Facturado</th>
                <th>Retención ITBIS</th>
                <th>Retención ISR</th> 
               
                <th>Modulo</th>
                <th></th>            
                


              </tr>

              <tr>
                <th style="width:5px">#</th>
                <th style="width:15px">RNC </th>
                <th style="width:20px">NCF</th>
                <th style="width:15px">NCF A</th>
                <th style="width:15px">Año/Mes</th>
                <th style="width:5px">NCF</th>
                <th>Forma de Pago</th>
                <th style="width:5px">%R ITBIS</th>
                <th style="width:5px">%R ISR</th> 
                <th>Sub Total</th> 
                <th>ITBIS</th>
                <th>Total Facturado</th>
                <th>Retención ITBIS</th>
                <th>Retención ISR</th>
                 
                <th>Modulo</th>                    
                <th></th>            
                


              </tr>

            </thead>
             
            
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

             

              <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
              

               if(isset($_GET["periodoreporte607"])){
               $periodoreporte607 = $_GET["periodoreporte607"];
              }else{
               $periodoreporte607 = $_SESSION["Anologin"];

               }
              $Orden = "id";



              $Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];

              $reporte607 = Controlador607::ctrMostrarReporte607($Rnc_Empresa_607, $Orden, $periodoreporte607);

               foreach ($reporte607 as $key => $value){
                if($value["EXTRAER_NCF_607"] != "FP1"){ 
                $total = $value["Monto_Facturado_607"] + $value["ITBIS_Facturado_607"];
                echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td style="width: 15px">'.$value["Rnc_Factura_607"].'</td>
                            <td style="width: 20px">'.$value["NCF_607"].'</td>
                            <td>'.$value["NCF_Modificado_607"].'</td>
                            <td>'.$value["Fecha_comprobante_AnoMes_607"].'</td>
                            <td style="width: 20px">'.$value["EXTRAER_NCF_607"].'</td>
                            <td>'.$value["Forma_de_Pago_607"].'</td>
                            <td style="width: 20px">'.$value["Porc_ITBIS_Retenido_607"].'</td>
                            <td style="width: 20px">'.$value["Porc_ISR_Retenido_607"].'</td>
                            <td>'.$value["Monto_Facturado_607"].'</td>
                            <td>'.$value["ITBIS_Facturado_607"].'</td>
                            <td>'.$total.'</td>
                            <td>'.$value["ITBIS_Retenido_Tercero_607"].'</td>
                            <td>'.$value["Retencion_Renta_por_Terceros_607"].'</td>
                            
                            <td>'.$value["Modulo"].'</td>

                            <td>';

if($_SESSION["Contabilidad"] == 1){
  if($value["Modulo"] == "607"){
   
      echo'<button class="btn btn-warning btn-xs btnEditar607" id_607="'.$value["id"].'" modulo = "reporte-607" data-toggle="modal" data-target="#modalEditar607"><i class="fa fa-pencil"></i></button>
      <button class="btn btn-primary btn-xs btnCopiar607" id_607="'.$value["id"].'" modulo = "reporte-607" data-toggle="modal" data-target="#modalEditar607" ><i class="fa fa-copy"></i></button>
      <button class="btn btn-primary btn-xs btnAsignarIngresoDiario" id_607="'.$value["id"].'"><i class="glyphicon glyphicon-book"></i></button>
      <button class="btn btn-danger btn-xs btnEliminar607" id_607="'.$value["id"].'"><i class="fa fa-times"></i></button>';
     
    }
    if($value["EXTRAER_NCF_607"] == "BCF"){
       echo'<button class="btn btn-danger btn-xs btnEliminar607" id_607="'.$value["id"].'"><i class="fa fa-times"></i></button>';


    }


  }else{
    if($value["Modulo"] == "607"){
   
  
    echo '<div class="btn-group">
    <button class="btn btn-warning btn-xs btnEditar607" id_607="'.$value["id"].'" modulo = "reporte-607" data-toggle="modal" data-target="#modalEditar607" ><i class="fa fa-pencil"></i></button>
     <button class="btn btn-primary btn-xs btnCopiar607" id_607="'.$value["id"].'" modulo = "reporte-607" data-toggle="modal" data-target="#modalEditar607" ><i class="fa fa-copy"></i></button>
    <button class="btn btn-danger btn-xs btnEliminar607" id_607="'.$value["id"].'"><i class="fa fa-times"></i></button>
          </div>';
  
    echo '<button class="btn btn-primary btn-xs btnRetener607" id_607="'.$value["id"].'" Rnc_Empresa_607="'.$_SESSION["RncEmpresaUsuario"].'"data-toggle="modal" data-target="#modalRetener607" ><i class="fa fa-university"></i></button>';
    }
    if($value["EXTRAER_NCF_607"] == "BCF"){
       echo'<button class="btn btn-danger btn-xs btnEliminar607" id_607="'.$value["id"].'"><i class="fa fa-times"></i></button>';


    }
  }

echo '</td></tr>';

 }
 }
?>
              
<!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->
             
 <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #3BB83F";>TOTALES:</td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #3BB83F";></td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #3BB83F";></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #3BB83F";></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #3BB83F";></td>                    
                <td style="font-weight:bold; border:1px solid #eee; background: #3BB83F";></td>
                <td></td>           
              </tfoot>  
              

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

                          rsort($Periodo606);
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

      
        <a class="btn btn-primary pull-right" role="button" id="descargartxt606">Descargar TXT 606</a>
        <a class="btn btn-warning pull-left" role="button" id="numeraciontxt606">Numeracion TXT 606</a>


        
        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

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

                          rsort($Periodo607);
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

       
        
  <a class="btn btn-primary pull-right" role="button" id="descargartxt607">Descargar TXT 607</a>
  <a class="btn btn-warning pull-left" role="button" id="numeraciontxt607">Numeracion TXT 607</a>


        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>

  <!-- Modal -->
<div id="modalDescarga608" class="modal fade" role="dialog">
  
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
              
              <input type="text" class="form-control input-lg" id="RncEmpresa608Rango" name="RncEmpresa608Rango" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="Periodoreporte608" name="Periodoreporte608" required>
                        <option value="">Seleccionar Periodo</option>

                        <?php  
                         

                        $Rnc_Empresa_608 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo608 = Controlador608::ctrMostrarPeriodo608($Rnc_Empresa_608);

                       
                         foreach ($Periodo608 as $key => $value){

                          echo '<option value="'.$value["Fecha_comprobante_AnoMes_608"].'">'.$value["Fecha_comprobante_AnoMes_608"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>

          
    
          
        </div>

      
      </div>
      
      <div class="modal-footer">
       

  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
  <a class="btn btn-primary pull-right" role="button" id="descargartxt608">Descargar TXT 608</a>
  

        
       
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



  
   <!--******************************************************

                  MODAL RETENER 606
  ******************************************************* -->
  <!-- Modal -->
<div id="modalRetener607" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Retener 607</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="hidden" class="form-control input-lg" id="RncEmpresaRetener" name="RncEmpresaRetener" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
          <div class="form-group">

                   
                  <div class="input-group">

                   

                    <input type="hidden" class="form-control" maxlength="11" id="id_607_Retener" name="id_607_Retener"required readonly>
                      <input type="text" class="form-control" maxlength="11" id="Codigo_Factura" name="Codigo_Factura"required readonly>
                    <input type="text" class="form-control" maxlength="11" id="Forma_De_Pago" name="Forma_De_Pago"required readonly>


                  </div>

                </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text"   class="form-control input-RNC" maxlength="11" id="Rnc_Retener_607" name="Rnc_Retener_607" value = "" required readonly>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

           <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" maxlength="11" id="NCF_607_Retener" name="NCF_607_Retener" required readonly>

                  </div>

                </div>

                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames_607_Retener" name="FechaFacturames_607" required readonly>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia_606_Retener" name="FechaFacturadia_607_Retener" required readonly>


                    </div>
                   

                  </div>
                  </div>

                   <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      
                        <label>MONTO FACTURADO SIN ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoFacturadoRetener_607" name="MontoFacturadoRetener_607" required readonly>


                      </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>MONTO ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoITBIS_Retener_607" name="MontoITBIS_Retener_607" required readonly>


                      </div>
                      

                    </div>

                    <label> Fecha de Retencion</label>
                    <br>




                    <div class="form-group">


                    <div class="input-group col-xs-12">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control FechaRetencion">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaRetenecionmes_607" name="FechaRetenecionmes_607" required>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaReteneciondia_607" name="FechaReteneciondia_607" required>


                    </div>
                   

                  </div>
                  </div>

                  <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ITBIS_Retenido_607" id="ITBIS30_607" value="30">30 %
                        <br>
                        <input type="radio" name="ITBIS_Retenido_607" id="ITBIS75_607" value="75">75 %<br>
                        <input type="radio" name="ITBIS_Retenido_607" id="ITBIS100_607" value="100">100 %<br>
                        <input type="text" name="Monto_ITBIS_Retenido_607" id="Monto_ITBIS_Retenido_607">
                        
                    </div>

                  

                  </div>
                  </div>

                  <div class="col-xs-6  right">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ISR RETENIDO</label><br>

                     

                   
          <input type="radio" name="ISR_RETENIDO_607" id="ISR2_607" value="2">2 %
                    <br>
            <input type="radio" name="ISR_RETENIDO_607" id="ISR10_607" value="10">10 %<br>
                        
            <input type="text" name="Monto_ISR_Retenido_607" id="Monto_ISR_Retenido_607">
                      <br>
                         
   
                    </div>
              

                  </div>
                  </div>
              

   
            <!--*****************input de Direccion********************* -->

         
          <!--*****************cierra input de Direccion************************* -->
          
        </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Retener</button>

      </div>

     <?php 

        $crearRetencion606 = new Controlador607();
        $crearRetencion606 -> ctrAgregarretencion607();

       ?>
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

