
        <div class="col-lg-6 col-xs-12">
          
          <div class="box box-success">

            <div class="box-header with-border">
                <select class="btn btn-default pull-left"  id="FechaCuadre" name="FechaCuadre">
                <option value="">Periodo</option>
                <?php  
                         

                        $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo606 = Controlador606::ctrMostrarPeriodo606($Rnc_Empresa_606);

                       
                         foreach ($Periodo606 as $key => $value){

                          echo '<option value="'.$value["Fecha_AnoMes_606"].'">'.$value["Fecha_AnoMes_606"].'</option>';



                         }
                    

                         ?>

            

          
              </select>
                <div class="form-group">

                      <div class="col-xs-10 pull-right" >
                         <label>CALCULO DE ITBIS POR PERIODO</label>
              
             
                      </div>
                   

                    </div>


             

              
            </div>

            

            <div class="box-body">

             
                <div class="box">
                  <input type="hidden"  id="RncEmpresa606" name="RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
                   <?php 
                   if(isset($_GET["FechaCuadre"])){
                  $Rnc_Empresa= $_SESSION["RncEmpresaUsuario"];
                  $Periodo_Empresa = $_GET["FechaCuadre"];

                  $ventas = ControladorEmpresas::ctrCuadreVentas($Periodo_Empresa, $Rnc_Empresa);
                  $compras = ControladorEmpresas::ctrCuadreCompras($Periodo_Empresa, $Rnc_Empresa);
                  $retenciones = ControladorEmpresas::ctrCuadreRetenciones($Periodo_Empresa, $Rnc_Empresa);

                  $premisas = ControladorEmpresas::ctrControlPremisas($Rnc_Empresa, $Periodo_Empresa);

                  
                  $Fechacuadre = $Periodo_Empresa;
                  $MontoFACTURAV = 0;
                  $MontoITBISV = 0;
                  $MontoFACTURAB04V = 0;
                  $MontoITBISB04V = 0;
                  $RentencionesV = 0;
                  $MontoFACTURAC = 0;
                  $MontoITBISC = 0;
                  $MontoFACTURAB04C = 0;
                  $MontoITBISB04C = 0;
                  $RentencionesC = 0;
                  $ITBISimportacion = 0; 
                  $saldoinicial = 0; 
                  $Saldoanterior = 0; 
                  $Retencion0205 = 0; 
                  $Retencion0804 = 0; 
                  $Pagoscuenta = 0;
                  $Impuesto = 0;
                  $TotalPremisas = 0;
                  $TotalITBISC = 0;
                  $TotalITBISV = 0;
                  $retencionesPeriodo = 0;
                  $ImpuestoRetenciones = 0;
                  $inputMontoFACTURAV = 0;

                  $BCF = 0;
                    
                  
                  
                  


                     foreach ($ventas as $key => $value){
                          if($value["EXTRAER_NCF_607"] <> "B04" && $value["EXTRAER_NCF_607"] <> "FP1"){
                            $MontoFACTURAV = $MontoFACTURAV + $value["Monto_Facturado_607"];
                            $MontoITBISV = $MontoITBISV + $value["ITBIS_Facturado_607"];
                            $RentencionesV = $RentencionesV + $value["Retencion_Renta_por_Terceros_607"];

                           
                          }elseif ($value["EXTRAER_NCF_607"] == "B04"){ 
                            $MontoFACTURAB04V = $MontoFACTURAB04V + $value["Monto_Facturado_607"];
                            $MontoITBISB04V = $MontoITBISB04V + $value["ITBIS_Facturado_607"];
                            $RentencionesV = $RentencionesV + $value["Retencion_Renta_por_Terceros_607"];
                          } else{
                            
                          }


                          $TotalITBISV = $MontoITBISV - $MontoITBISB04V;
                          


                      
                      }
                      
                       foreach ($compras as $key => $value){
                          if($value["Extraer_NCF_606"] <> "B04" && $value["Extraer_NCF_606"] <> "CP1"){
                            $MontoFACTURAC = $MontoFACTURAC + $value["Total_Monto_Factura_606"];
                            $MontoITBISC = $MontoITBISC + $value["ITBIS_Factura_606"];
                            $RentencionesC = $RentencionesC + $value["ITBIS_Retenido_606"];

                           
                          }elseif($value["Extraer_NCF_606"] == "B04"){
                            $MontoFACTURAB04C = $MontoFACTURAB04C + $value["Total_Monto_Factura_606"];
                            $MontoITBISB04C = $MontoITBISB04C + $value["ITBIS_Factura_606"];
                            $RentencionesC = $RentencionesC + $value["ITBIS_Retenido_606"];

                          }else{
                            
                          }
                          $TotalITBISC = $MontoITBISC - $MontoITBISB04C;


                      
                      }
                    foreach ($premisas  as $key => $value) {
                    $ITBISimportacion = $value["ITBISimportacion"]; 
                    $Saldoanterior = $value["SaldoAnterior"]; 
                    $Retencion0205 = $value["Retencion0205"]; 
                    $Retencion0804 = $value["Retencion0804"]; 
                    $BCF = $value["BCF"]; 


                   }

                    foreach ($retenciones  as $key => $value) {
                    $retencionesPeriodo = $retencionesPeriodo + $value["ITBIS_Retenido_606"]; 
                   

                   }
                   
                   
                   $TotalPremisas = $ITBISimportacion + $Saldoanterior + $Retencion0205 + $Retencion0804;

                   $Impuesto = $TotalITBISV - $TotalITBISC - $TotalPremisas;
                   $ImpuestoRetenciones = $Impuesto;


                  }else{
                  $Rnc_Empresa_Master = $_SESSION["RncEmpresaUsuario"];
                  $Fechacuadre = "000000";
                  $MontoFACTURAV = "0";
                  $MontoITBISV = "0";
                  $MontoFACTURAB04V = "0";
                  $MontoITBISB04V = "0";
                  $RentencionesV = "0";
                  $MontoFACTURAC = "0";
                  $MontoITBISC = "0";
                  $MontoFACTURAB04C = "0";
                  $MontoITBISB04C = "0";
                  $RentencionesC = "0";
                  $ITBISimportacion = "0"; 
                  $saldoinicial = "0"; 
                  $Saldoanterior = "0"; 
                  $Retencion0205 = "0"; 
                  $Retencion0804 = "0"; 
                  $Pagoscuenta = "0";
                  $Impuesto = "0";
                  $TotalPremisas = "0";
                  $TotalITBISC = "0";
                  $TotalITBISV = "0";
                  $retencionesPeriodo = "0";
                  $ImpuestoRetenciones = "0";
                  $BCF = 0;
                                      
                }

$inputMontoFACTURAV = number_format($MontoFACTURAV,2); 
$inputMontoITBISV = number_format($MontoITBISV,2);
$inputMontoFACTURAB04V = number_format($MontoFACTURAB04V,2);
$inputMontoITBISB04V = number_format($MontoITBISB04V,2);
$inputRentencionesV = number_format($RentencionesV,2);
$inputMontoFACTURAC = number_format($MontoFACTURAC,2);
$inputMontoITBISC = number_format($MontoITBISC,2);
$inputMontoFACTURAB04C = number_format($MontoFACTURAB04C,2);
$inputMontoITBISB04C = number_format($MontoITBISB04C,2);
$inputRentencionesC = number_format($RentencionesC,2);
$inputITBISimportacion = number_format($ITBISimportacion,2); 
$inputsaldoinicial = number_format($saldoinicial,2); 
$inputSaldoanterior = number_format($Saldoanterior,2); 
$inputRetencion0205 = number_format($Retencion0205,2); 
$inputRetencion0804 = number_format($Retencion0804,2); 
$inputPagoscuenta = number_format($Pagoscuenta,2);
$inputImpuesto = number_format($Impuesto,2);
$inputTotalPremisas = number_format($TotalPremisas,2);
$inputTotalITBISC = number_format($TotalITBISC,2);
$inputTotalITBISV = number_format($TotalITBISV,2);
$inputretencionesPeriodo = number_format($retencionesPeriodo,2);
$inputImpuestoRetenciones = number_format($ImpuestoRetenciones,2);
  

              
                    ?>
                    <div class="form-group">

                    
                      <div class="col-xs-2" style="padding-top: 15px">

                      <label>Nombre de la Empresa</label>

                      
                      </div>

                    </div>

                    <div class="form-group">

                      <div class="col-xs-2">
                        <input type="text" class="form-control" value="<?php echo $_SESSION["NombreEmpresa"];?>">
                  <br>
                      </div>
                   

                    </div>

                    <div class="form-group">

                    
                      <div class="col-xs-2">

                      <label>RNC</label>
                      
                      </div>

                    </div>
                     
                    <div class="form-group">

                    
                    <div class="col-xs-2">
                      <input type="text" class="form-control"  value="<?php echo $_SESSION["RncEmpresaUsuario"] ;?>">
                    
                        
                    </div>
                   

                  </div>
                    
                    

                  <div class="form-group">
    
                    <div class="col-xs-2" style="padding-top: 15px">

                    <label>Periodo</label>
                    
                    </div>

                 </div>
                     
                <div class="form-group">

                    
                    <div class="col-xs-2" style="padding-right:0px">
                      <input type="text" class="form-control" id="Fechacuadre" name="Fechacuadre" value="<?php echo $Fechacuadre;?>">
                    
                        
                    </div>
                   

                    </div>
                    <div class="form-group">

                    
                    <div class="col-xs-9 pull-left" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-success center-block" style="">RESUMEN FISCAL DE VENTAS</label>
                    
                    </div>

                    </div>
                     <div class="form-group">

                    
                    <div class="col-xs-3" style="padding-top: 15px; align-content: center">

                    <label class="center-block" style="">TOTAL ITBIS</label>
                    
                    </div>

                    </div>
                    


                    <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      <label>Facturado Sin ITBIS</label>
                      
                      <br>

                      

                        <input type="text" value="<?php echo $inputMontoFACTURAV;?>" reandonly>


                      </div>
                      
                  

                     <div class="col-xs-6" style="padding-right:0px">

                      <label>ITBIS Facturado</label>
                      <br>  

                        <input type="text" value="<?php echo $inputMontoITBISV;?>" reandonly>


                      </div>

                      <div class="col-xs-6" style="padding-right:0px">

                      <label>N/C Facturado Sin ITBIS</label>
                      <br>

                      
                        

                        <input type="text"  value="<?php echo $inputMontoFACTURAB04V;?>" reandonly>


                      </div>

                      <div class="col-xs-6" style="padding-right:0px">

                      <label>ITBIS en N/C Facturado</label>
                      <br>

                      
                        

                        <input type="text" value="<?php echo $inputMontoITBISB04V;?>" reandonly>
                        <br>


                      </div>
                       <div class="form-group">

                      <div class="col-xs-12">

                    
                    

                      <label>N° de Combrobantes Consumidor Final</label><br>
                      

                      <input type="text" value="<?php echo $BCF;?>" reandonly>


                      
                      </div>
                      </div>
                      <div class="form-group">

                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-success center-block">TOTAL ITBIS EN VENTAS</label>
                    
                    </div>

                    <div class="col-xs-3" style="padding-right:0px">

                     <br>

                      
                        

                        <input type="text" value="<?php echo $inputTotalITBISV;?>" reandonly>


                      </div>

                    </div>
                       
                      
                      

                    </div>

                    <div class="form-group">

                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-success center-block">RESUMEN FISCAL DE GASTOS/COMPRAS</label>
                    
                    </div>

                    </div>
                     <div class="col-xs-6" style="padding-right:0px">

                      <label>Facturas Sin ITBIS</label>
                      <br>

                      
                        

                        <input type="text" value="<?php echo $inputMontoFACTURAC;?>" reandonly>


                      </div>

                      <div class="col-xs-6" style="padding-right:0px">

                      <label>ITBIS Deducible</label>
                      <br>

                      
                        

                        <input type="text" value="<?php echo $inputMontoITBISC;?>" reandonly>


                      </div>
                       <div class="col-xs-6" style="padding-right:0px">

                      <label>N/C Sin ITBIS</label>
                      <br>

                      
                        

                        <input type="text" name="Propinalegal" value="<?php echo $inputMontoFACTURAB04C;?>" reandonly>


                      </div>

                      <div class="col-xs-6" style="padding-right:0px">

                      <label>ITBIS en N/C</label>
                      <br>

                      
                        

                        <input type="text" value="<?php echo $inputMontoITBISB04C;?>" reandonly>


                      </div>

                      <div class="form-group">

                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-success center-block">TOTAL ITBIS EN COMPRAS</label>
                    
                    </div>

                    </div>

                     <div class="col-xs-3" style="padding-right:0px">

                      
                      <br>

                      
                        

                        <input type="text" value="<?php echo $inputTotalITBISC;?>" reandonly>


                      </div>
                  <form role="form" method="post">
                      <div class="form-group">

                         <input type="hidden" class="form-control" id="Fechacuadre" name="Fechacuadre" value="<?php echo $Fechacuadre;?>">
                         <input type="hidden"  id="RncEmpresaPremisas" name="RncEmpresaPremisas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                        <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
                    

                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-success center-block" style="">PREMISAS</label>
                    
                    </div>

                    </div>


                    <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      <label> ITBIS Importación</label>
                      
                      <br>

                      

                        <input type="text" id="ITBISImportacion" name="ITBISImportacion" value="<?php echo $inputITBISimportacion;?>" reandonly>


                      </div>
                      
                  


                      <div class="col-xs-6" style="padding-right:0px">

                      <label>Saldo Anterior</label>
                      <br>

                      
                        

                        <input type="text" id="SaldoAnterior" name="SaldoAnterior" value="<?php echo $inputSaldoanterior;?>" reandonly>


                      </div>

                      <div class="col-xs-6" style="padding-right:0px">

                      <label>Retenciones 0205</label>
                      <br>

                      
                        

                        <input type="text" id="Retencion0205" name="Retencion0205" value="<?php echo $inputRetencion0205;?>" reandonly>
                        <br>
                      


                      </div>
                      
                       <div class="col-xs-6" style="padding-right:0px">

                      <label>Retenciones 0804</label>
                      <br>

                      
                        

                        <input type="text" id="Retencion0804" name="Retencion0804" value="<?php echo $inputRetencion0804;?>" reandonly>


                      </div>

                      
                      <div class="col-xs-12" style="padding-right:2px">

                      <button type="submit" class="btn btn-primary pull-left">Actualizar Premisas</button>
                      </div>




                      <div class="form-group">

                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-success center-block" style="">TOTAL PREMISAS</label>
                    
                    </div>

                    </div>
                     <div class="col-xs-3" style="padding-right:0px">

                      
                      <br>
                 <input type="text" value="<?php echo $inputTotalPremisas;?>" reandonly>
               


                      </div>
                      <?php 

          $premisas = new ControladorEmpresas();
          $premisas -> ctrRegistrarPremisas();



           ?>

          
          </form>


              

                     
           


                      <?php 
                      if($Impuesto <= 0){

                        $Impuesto = $Impuesto * -1;
                        $inputImpuesto = number_format($Impuesto,2);

                       echo '<div class="form-group">
                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-success center-block" style="">TOTAL ITBIS A FAVOR</label>
                    
                    </div>

                    </div>
                    ';
                    
                     } else{
                       echo '<div class="form-group">
                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-danger center-block" style="">TOTAL ITBIS A PAGAR</label>
                    
                    </div>

                    </div>
                    ';
                 



                     }


                       ?>
                        <div class="col-xs-3" style="padding-right:0px">

                      
                      <br>
                 <input type="text" value="<?php echo $inputImpuesto;?>" reandonly>


                      </div>

                      <div class="form-group">
                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-default center-block" style="">RETENCIONES DEL PERIODO</label>
                    
                    </div>

                    </div>

                    <div class="col-xs-3" style="padding-right:0px">

                      
                      <br>
                 <input type="text" value="<?php echo $inputretencionesPeriodo;?>" reandonly>


                      </div>

                      <?php 
                      if($ImpuestoRetenciones >= 0){

                        $totalRetenciones = $ImpuestoRetenciones + $retencionesPeriodo;
                        $inputtotalRetenciones = number_format($totalRetenciones,2);
                        echo ' <div class="form-group">
                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-default center-block" style="">TOTAL ITBIS A PAGAR MAS RETENCIONES</label>
                    
                    </div>

                    </div>';




                      }else{

                        $totalRetenciones = $retencionesPeriodo;
                        $inputtotalRetenciones = number_format($totalRetenciones,2);
                         echo ' <div class="form-group">
                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-default center-block" style="">TOTAL RETENCIONES DEL PERIDOD A PAGAR</label>
                    
                    </div>

                    </div>';




                      }


                       ?>
                        <div class="col-xs-3" style="padding-right:0px">

                      
                      <br>
                 <input type="text" value="<?php echo $inputtotalRetenciones;?>" reandonly>


                      </div>

                     
                      

                    </div>
             
          
          </div>
          
          
       
        </div>

          
      </div>
    
    </div>
   
