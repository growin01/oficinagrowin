
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-university"></i>
        REPORTE 606
        
      </h1>

   <a href="registro-606" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 606</a>
   <a href="registro-607" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 607</a>
   <a href="registro-608" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Registro 608</a>

   <a href="cuadre-itbis" class="btn btn-success"><i class="fa fa-pie-chart" style="padding-right:5px"></i>Cuadre Itbis</a>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga606"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 606</button>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga607"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 607</button>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga608"><i class="fa fa-arrow-down" style="padding-right:5px"></i>TXT 608</button> 
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
        <div class="box-header with-border">

        
          
        </div>

       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->

        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->
          <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                 <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodoreporte606" id="periodoreporte606">
  <?php 
if(isset($_GET["periodoreporte606"])){
echo'<option value="'.$_GET["periodoreporte606"].'">'.$_GET["periodoreporte606"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodoreporte606"] != $value) { 
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



          <table class="display nowrap table table-bordered table-striped tablareporte606"  width="100%">
             

            <!--*****************CABECERA TABLA  USUARIO********************************* -->
        

              
                     
            <thead>
              <tr>
                <th style="width: 5px">#</th>
                
                <th style="width: 5px">RNC</th>
                <th style="width: 5px">Tipos de Gastos</th>
                <th style="width: 5px">NCF</th>
                <th style="width: 5px">Año/Mes</th>
                <th style="width: 5px">NCF MOD</th> 
                <th style="width: 5px">NCF</th>
                <th style="width: 5px">RET. Año/Mes</th>
                <th style="width: 5px">% RET ITBIS</th>
                <th style="width: 5px">% RET ISR</th>
                <th>Total Factura</th> 
                <th>Total ITBIS</th>
                <th>Retención ITBIS</th>
                <th>Retención ISR</th> 
                <th>Módulo</th>                    
                <th></th>            
                


              </tr>

              <tr>
                <th style="width: 5px">#</th>
               
                <th style="width: 5px">RNC</th>
                <th style="width: 5px">Tipos de Gastos</th>
                <th style="width: 5px">NCF</th>
                <th style="width: 5px">Año/Mes</th>
                <th style="width: 5px">NCF MOD</th> 
                <th style="width: 5px">NCF</th>
                <th style="width: 5px">RET. Año/Mes</th>
                <th style="width: 5px">% RET ITBIS</th>
                <th style="width: 5px">% RET ISR</th>
                <th>Total Factura</th> 
                <th>Total ITBIS</th>
                <th>Retención ITBIS</th>
                <th>Retención ISR</th> 
                <th>Módulo</th>                   
                <th></th>            
                


              </tr>

            </thead>
             
            
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

             

              <!--*****************FILA 1  TABLA  USUARIO********************************* -->
              <?php 
               
              
              $Orden = "id";

              if(isset($_GET["periodoreporte606"])){
               $periodoreporte606 = $_GET["periodoreporte606"];
              }else{
               $periodoreporte606 = $_SESSION["Anologin"];

               }
              $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

              $reporte606 = Controlador606::ctrMostrarReporte606($Rnc_Empresa_606, $Orden, $periodoreporte606);

              


               foreach ($reporte606 as $key => $value){

                if($value["Extraer_NCF_606"] != "CP1"){ 



              $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];

              $id_Suplidor = "Documento_Suplidor";

              $Valor_idSuplidor = $value["Rnc_Factura_606"];

              $respuestasuplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);
              if($respuestasuplidor != false){
                $idSuplidor = $respuestasuplidor["id"];
              }else{
                $idSuplidor = 0;
              }
               
              
  echo '<tr>
          <td style="width: 5px">'.($key+1).'</td>
          
          <td style="width: 15px">'.$value["Rnc_Factura_606"].'</td>
          <td style="width: 20px">'.$value["Tipo_Gasto_606"].'</td>
          <td>'.$value["NCF_606"].'</td>
          <td>'.$value["Fecha_AnoMes_606"].'</td>
          <td>'.$value["NCF_Modificado_606"].'</td>
          <td>'.$value["Extraer_NCF_606"].'</td> 
          <td>'.$value["Fecha_Ret_AnoMes_606"].'</td>
          <td>'.$value["Porc_ITBIS_Retenido_606"].'</td> 
          <td>'.$value["Porc_ISR_Retenido_606"].'</td>
          <td>'.number_format($value["Total_Monto_Factura_606"], 2).'</td>
          <td>'.number_format($value["ITBIS_Factura_606"], 2).'</td>
          <td>'.number_format($value["ITBIS_Retenido_606"], 2).'</td>
          <td>'.number_format($value["Monto_Retencion_Renta_606"], 2).'</td>
          <td>'.$value["Modulo"].'</td>
                            
                            <td>
                              <div class="btn-group">';
                               
                         
if($_SESSION["Contabilidad"] == 1 && $value["Modulo"] == "REGISTRO606"){
    
echo'<button class="btn btn-default btn-xs btnVerRegistro606" id_606="'.$value["id"].'" data-toggle="modal" data-target="#modalRegistro606"><i class="fa fa-eye"></i></button>';
echo'<button class="btn btn-warning btn-xs btnEditar606" id_606="'.$value["id"].'" modulo = "reporte-606"><i class="fa fa-pencil"></i></button>';
echo'<button class="btn btn-primary btn-xs btnCopiar606" id_606="'.$value["id"].'" modulo = "reporte-606"><i class="fa fa-copy"></i></button>';
echo'<button class="btn btn-primary btn-xs btnAsignarGastoDiario" id_606="'.$value["id"].'"><i class="glyphicon glyphicon-book"></i></button>';
echo'<button class="btn btn-danger btn-xs btnEliminar606" id_606="'.$value["id"].'"><i class="fa fa-times"></i></button>';

  if($value["Porc_ITBIS_Retenido_606"] != "0" || $value["Porc_ISR_Retenido_606"] != "0"){
                  echo'
        <button class="btn btn-info btn-xs CartaRetenciones" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$Rnc_Empresa.'" RncFactura606="'.$value["Rnc_Factura_606"].'" NCF_606="'.$value["NCF_606"].'"><i class="fa fa-print"></i></button>';

        }
                  

    }

                                  
if($_SESSION["Contabilidad"] == 2 && $value["Modulo"] == "REGISTRO606"){
      echo'<button class="btn btn-default btn-xs btnVerRegistro606" id_606="'.$value["id"].'" data-toggle="modal" data-target="#modalRegistro606"><i class="fa fa-eye"></i></button>';
      echo'<button class="btn btn-warning btn-xs btnEditar606" id_606="'.$value["id"].'" modulo = "reporte-606"><i class="fa fa-pencil"></i></button>';
   echo'<button class="btn btn-primary btn-xs btnCopiar606" id_606="'.$value["id"].'" modulo = "reporte-606"><i class="fa fa-copy"></i></button>';   
      echo'<button class="btn btn-danger btn-xs btnEliminar606" id_606="'.$value["id"].'"><i class="fa fa-times"></i></button>';
      if($value["Porc_ITBIS_Retenido_606"] != "0" || $value["Porc_ISR_Retenido_606"] != "0"){
      echo'
      <button class="btn btn-info btn-xs CartaRetenciones" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$Rnc_Empresa.'" RncFactura606="'.$value["Rnc_Factura_606"].'" NCF_606="'.$value["NCF_606"].'"><i class="fa fa-print"></i></button>';

                }
                  
                                                   
}
}
                                
                           echo'</div>
                              

                            </td> 



                        </tr>';



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
                <td></td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";>TOTALES:</td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";></td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";></td>
                <td style="font-weight:bold; border:1px solid #eee; background: #EC9538";></td> 
                <td></td>                    
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
  <div id="modalRegistro606" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Registro 606</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

           <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

                      <h4 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN SUPLIDOR</b></h4>

                 
          </div>


      <div class="form-group col-xs-12">

          <div class="input-group col-xs-6 pull-left">
            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>
              <input type="text" class="form-control" id="Tipo_Id_Factura_606" readonly>

          </div>
             <div class="input-group col-xs-6 pull-right">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control" id="Rnc_Factura_606" readonly>
                

            </div>

    </div>
      <div class="form-group">

                   
        <div class="input-group">

           <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

            <input type="text" class="form-control" id="Nombre_Empresa_606" readonly>
                   
          </div>

        </div>

         <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

              <h4 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN FACTURA</b></h4>

                 
          </div>

                   

        <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" id="Fecha_AnoMes_606" readonly>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia" id="Fecha_Dia_606" readonly>


                    </div>
                   

                  </div>
                  </div>
         

     
      <div class="form-group col-xs-12">

          <div class="input-group col-xs-6 pull-left">
            <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control" id="NCF_606" readonly>

          </div>
             <div class="input-group col-xs-6 pull-right">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control" id="NCF_Modificado_606" readonly>
                

            </div>

    </div>
    <div class="form-group col-xs-12">

          <div class="input-group">
            <span class="input-group-addon">Tipo de Gasto</span>
              <input type="text" class="form-control" id="Tipo_Gasto_606" readonly>

          </div>
            

    </div>
    <div class="form-group col-xs-12">

          
             <div class="input-group">

              <span class="input-group-addon">Forma de Pago</span>

                <input type="text" class="form-control" id="Forma_Pago_606" readonly>
                

            </div>

    </div>
     
     
            

          
              
  <div class="form-group">

                    
    <div class="col-xs-6 right" style="padding-right:0px">

                      
        <label>COMPRAS</label>
                        <br>

        <input type="number"  min=0 step="any" id="Monto_Bienes_606" readonly>


    </div>
                      
                  

    <div class="col-xs-6 left" style="padding-right:0px">

                      
          <label>SERVICIOS</label>
                        <br>

          <input type="number"  min=0 step="any" id="Monto_Servicios_606" readonly>


          </div>
                      

  </div>
   <div class="form-group">

                    
    <div class="col-xs-6 right" style="padding-right:0px">

                      
        <label>MONTO ITBIS</label>
                        <br>

        <input type="number"  min=0 step="any" id="ITBIS_Factura_606" readonly>


    </div>
                      
                  

    <div class="col-xs-6 left" style="padding-right:0px">

                      
          <label>PROPINA LEGAL</label>
                        <br>

          <input type="number"  min=0 step="any" id="Monto_Propina_606" readonly>


          </div>
                      

  </div>
  <div class="form-group">

                    
    <div class="col-xs-6 right" style="padding-right:0px">

                      
        <label>IMPUESTO SELECTIVO</label>
                        <br>

        <input type="number"  min=0 step="any" id="Impuestos_Selectivo_606" readonly>


    </div>
                      
                  

    <div class="col-xs-6 left" style="padding-right:0px">

                      
          <label>OTROS IMPUESTO</label>
                        <br>

          <input type="number"  min=0 step="any" id="Otro_Impuesto_606" readonly>


          </div>
                      

  </div>
  <div class="col-xs-12"></div>
  <br>

   <div class="col-xs-6">
        <div class="form-group">

          <div class="ITBISALCOSTO">
                  
          </div>

        </div>
        <div class="form-group">

          <div class="ITBISPROPORCIONAL">
                  
          </div>

        </div>
                
  </div>

     <div class="form-group col-xs-12 pull-right" style="background-color: #2B6370">

                   

              <h4 style="text-align: center; color: #FFFFFF"><b>INFORMACIÓN RETENCIÓN</b></h4>

                 
      </div>

  <div class="form-group col-xs-6">

                    
    <div class="col-xs-12">
      <div class="form-group col-xs-12" style="background-color: #D1D2D5">

                   

              <h6 style="text-align: center;"><b>RETENCIÓN ITBIS</b></h6>

                 
      </div>
       

                      
        <div class="input-group">
         
            <span class="input-group-addon">MONTO</span>
              <input type="text" class="form-control" id="ITBIS_Retenido_606" readonly>
              <span class="input-group-addon">%</span>
              <input type="text" class="form-control" id="Porc_ITBIS_Retenido_606" readonly>

          </div>


   </div>
                      
                  

   

  </div>
  <br>


<div class="form-group col-xs-6">

                    
    <div class="col-xs-12">
      <div class="form-group col-xs-12" style="background-color: #D1D2D5">

                   

              <h6 style="text-align: center;"><b>RETENCIÓN ISR</b></h6>

                 
      </div>
       

                      
        <div class="input-group">
         
            <span class="input-group-addon">MONTO</span>
              <input type="text" class="form-control" id="Monto_Retencion_Renta_606" readonly>
              <span class="input-group-addon">%</span>
              <input type="text" class="form-control" id="Porc_ISR_Retenido_606" readonly>
              

          </div>


        <div class="input-group">

          <span class="input-group-addon">TIPO</span>
              <input type="text" class="form-control" id="Tipo_Retencion_ISR_606" readonly>

        </div>
             


   </div>
                      
                  

   

  </div>


                    

          
  </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       

      </div>

    
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR SUPLIDOR
  ******************************************************* -->

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
$borrar606 = new Controlador606();
$borrar606 -> ctrBorrar606();


 ?>



  
  