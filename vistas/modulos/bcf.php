
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BCF
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cargar Masivamente los Consumidores finales</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 
        =======================================================-->

        <div class="col-lg-6 col-xs-12">
          
          <div class="box box-success">

            <div class="box-header with-border">
               <a href="reporte-607">

          <button class="btn btn-primary">Reporte 607

          </button>


          </a>
            <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "BCF";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);

                if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }


              
              $Rnc_Empresa_Master = null;
               $Orden = "id";
              

              $Empresa = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);
             



               ?>
              



           <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalDescarga607" >Descarga de TXT 607</button>

      
          
            </div>

            <form role="form" method="post">

            <div class="box-body">

             
                <div class="box">
                  <input type="hidden"  id="RncEmpresa607" name="RncEmpresa607" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">



<div style="padding-right: 0px; padding-left: 0px;"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>


    <input type="text" class="form-control Fechames_607" maxlength="6" id="FechaFacturames_607" name="FechaFacturames_607" value="<?php if (isset($_SESSION['FechaFacturames_607'])){ echo $_SESSION['FechaFacturames_607'];}?>" placeholder="Año/Mes Ejemplo 202001" required>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
  
     <input type="text" class="form-control Fechadia_607" maxlength="2" id="FechaFacturadia_607" name="FechaFacturadia_607" value="<?php if (isset($_SESSION['FechaFacturadia_607'])){ echo $_SESSION['FechaFacturadia_607'];}?>" placeholder="Día Ejemplo 01" required autofocus>

 
 </div>  
  
  
</div>

<div class="col-lg-12"></div>

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoCliente">
                      <?php   
                      if($Empresa["Tipo_Id_Empresa"] == "1") {
                        echo '<input type="radio" Class="Juridico_607" name="Tipo_cliente_607" id="juridico_607" value="1" required checked readonly> Jurídico';

                      }else{
                        echo '<input type="radio" Class="Fisico_607" name="Tipo_cliente_607" id="fisico_607" value="2" required readonly checked> Fisico';


                      }


                       ?>


                   
                       
                   
                    </div>

                  </div>

                  </div>

                  <!--=================================================
                    ENTRADA DEL CODIGO DE LA VENTA=======================================================-->
                   <!--=================================================-->


                  <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

                    <input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura_607" name="Rnc_Factura_607" value="<?php echo $Empresa["Rnc_Empresa"]; ?>" required readonly>

                  </div>

                </div>
                
                  <!--=================================================
                    ENTRADA DEL CODIGO DE LA VENTA======================================================-->
                   <!--=================================================-->


                  <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                    <input type="text"  class="form-control" id="Nombre_Empresa_607" name="Nombre_Empresa_607" value="<?php echo $Empresa["Nombre_Empresa"]; ?>" required readonly>
                   
                  </div>

                </div>
                <?php 

                $NCFFactura = "BCF";

$RncEmpresaVentas = $_SESSION["RncEmpresaUsuario"];
$respuesta = ControladorCorrelativos::ctrCorrelativosFacNo($RncEmpresaVentas, $NCFFactura);
if($respuesta == false){
                  echo '<script>
                swal({

                  type: "error",
                  title: "¡DEBE INICIALIZAR EL NCF DE CONSUMIDOR FINAL EN EL LAPIZ COLOR ANARANJADO QUE ESTA EN LA PARTE SUPERIOR DEL FORMULARIO!",
                            showConfirmButton: false,
                  showConfirmButton: false,
                  timer: 6000
                  }).then(()=>{
                  
                });

  
                </script>';
       


}else{ 

$codigo = $respuesta["NCF_Cons"];
$codigoNCF = $codigo + 1;
$number = $codigoNCF;
$length = 8;
$string = substr(str_repeat(0, $length).$number, - $length);
$NCF_BCF = "BCF".$string;

}

                 ?>
                
                 <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control" maxlength="11" id="NCF_BCF" name="NCF_BCF" value="<?php echo $NCF_BCF; ?>" required readonly>

                  </div>

                </div>
                 <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon">N° de Comprobantes</span>

                    <input type="text" class="form-control" maxlength="11" id="NBCF" name="NBCF" required>

                  </div>

                </div>

                
                  
                  
                   <div class="form-group">

                    
                    <div class="col-xs-4 right" style="padding-right:0px">

                      
                        <label>Monto Facturado</label>
                        <br>

                        <input class="form-control" type="number"  min=0 step="any" id="Monto_Facturado_607" name="Monto_Facturado_607" required>



                      </div>
                      
                       
                      
                  

                     <div class="col-xs-4" style="padding-right:0px">

                      
                        <label>ITBIS Facturado</label>
                        <br>

                        <input  class="form-control" type="number"  min=0 step="any" id="ITBIS_Facturado_607" name="ITBIS_Facturado_607" required>


                      </div>


                      <div class="col-xs-4 left" style="padding-right:0px">

                      
                        <label>Otro Impuesto</label>
                        <br>

                        <input class="form-control" type="number"  min=0 step="any"  id="Otros_Impuestos_607" name="Otros_Impuestos_607" required>


                      </div>
                      <br>
                      

                      

                    </div>
                    <br>

                    <br>


                   

             
                  

                    <!--*****************CHECKBOX DE PORCENTAJE********************** -->
                    
                  
                  <div class="col-xs-6 right">

              <div class="form-group">

                    <div class="input-group form-control Formapago">

                      <label>FORMA DE PAGO</label><br>

                     

                   
                        <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required checked>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>
                        
                    </div>

                  

                  </div>
                  </div>

                  <div class="col-xs-12">
                  </div>
                  


                    
                
                  

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Registrar</button>

                     
            </div>
          
          </div>
          <?php 

          $crearRegistroBCF = new Controlador607();
          $crearRegistroBCF -> ctrRegistrarBCF();



           ?>

          
          </form>
          
       
        </div>

          
      </div>
    
    </div>

         <!--=================================================
            LA TABLA  DE PRODUCTO
        =======================================================-->

        <div class="col-lg-6 hidden-md hidden-sm hidden-xs">

          <div class="box box-warning"></div>

          <div class="box-header with-border">

            <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive tablas">
                
                <thead>

                  <tr>

                    <th style="width: 5px">#</th>
                    <th>RNC</th>
                    <th>NCF</th>
                    <th style="width: 10px">Año/Mes</th>
                    <th style="width: 5px">Dia</th>
                    <th>Total</th>
                    <th>ITBIS</th>
                    <th>Forma de Pago</th>
                     <th>Accion</th>
                    

                      

                  </tr>

                </thead>

                <tbody>

                    <?php 
              $id_607 = null;
              $Valor_id607 = null;
              $Orden = "id";



              $Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];

              $reporte607 = Controlador607::ctrMostrar607($Rnc_Empresa_607, $id_607, $Valor_id607, $Orden);

               foreach ($reporte607 as $key => $value){

                          echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td style="width: 15px">'.$value["Rnc_Factura_607"].'</td>
                            <td style="width: 20px">'.$value["NCF_607"].'</td>
                            
                            <td>'.$value["Fecha_comprobante_AnoMes_607"].'</td>
                            <td>'.$value["Fecha_Comprobante_Dia_607"].'</td>
                            <td>'.number_format($value["Monto_Facturado_607"], 2).'</td>
                            <td>'.number_format($value["ITBIS_Facturado_607"], 2).'</td>
                            
                            <td>'.$value["Forma_de_Pago_607"].'</td>
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-warning btnRetener607" id_607="'.$value["id"].'" Rnc_Empresa_607="'.$_SESSION["RncEmpresaUsuario"].'"data-toggle="modal" data-target="#modalRetener607" ><i class="fa fa-university"></i></button>
                                
                              </div>
                              

                            </td>             

                        </tr>';



               }
               ?>

                </tbody>


              </table>
              

            </div>
            

          </div>  


        </div>     

      </div>

      
    </section>


   </div>
  
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

       
        
       <a  class="btn btn-primary pull-right" role="button" id="descargartxt607">Descargar TXT 607</a>
       <a class="btn btn-warning pull-left" role="button" id="numeraciontxt607">Numeracion TXT 607</a>

       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR SUPLIDOR
  ******************************************************* -->
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
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCorrelativosNo" name="RncEmpresaCorrelativosNo" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioLoguedo" name="UsuarioLoguedo" value="<?php echo $_SESSION["Nombre"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <!--*****************id correlativo********************** -->

         

             <div class="form-group col-xs-6">
               <label>Tipo de NCF</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="BCF" readonly>

                  </div>

                </div>


          
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <div class="form-group col-xs-6">
               <label>Correlativo de Factura No Fiscal</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="NCF_Cons" name="NCF_Cons" maxlength="3">

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
      $editarCorrelativos -> ctreditarCorrelativosNoFiscal();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

