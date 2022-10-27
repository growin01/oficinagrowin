                     
                     <?php 

                     if(isset($_GET["FechaCuadre"])){


                        $AnoFiscal = substr($_GET["FechaCuadre"], 0, 4);
                     }ELSE{

                        $AnoFiscal = $_SESSION["Anologin"];
                     }
                     
                    
                     $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                     $taRnc_Empresa = "Rnc_Empresa_607";
                     $tabla = "607_empresas";
      
                 
                      $VentasAno = ControladorEmpresas::ctrPeriodofiscal($tabla, $Rnc_Empresa, $taRnc_Empresa);
                      
                      $TOTALVENTAS = 0;
                      $TOTALCOMPRAS = 0;
                      $InvInicial = 0;
                      $Nomina = 0;
                      $Anticipo = 0;
                      $Gasto_Depresiacion = 0;
                      $ComprasB09 = 0;
                      $Importaciones = 0;
                      $ValorImportaciones = 0;
                      $porcentajeCosto = 0;
                      $Compras = 0;
                      $MontoFACTURAV = 0;
                      $MontoFACTURAB04V = 0;



          foreach ($VentasAno as $key => $value){
              $ExtraerPeriodo607 = substr($value["Fecha_comprobante_AnoMes_607"],0 ,4);
                             
                  if($AnoFiscal == $ExtraerPeriodo607){
                      if($value["EXTRAER_NCF_607"] <> "B04" && $value["EXTRAER_NCF_607"] <> "FP1"){
                                      $MontoFACTURAV = $MontoFACTURAV + $value["Monto_Facturado_607"];
                              
                               
                                      }elseif($value["EXTRAER_NCF_607"] == "B04"){
                                          $MontoFACTURAB04V = $MontoFACTURAB04V + $value["Monto_Facturado_607"];
                                
                                      }else{ }

                                       
                                  }



                                }
                                $TOTALVENTAS =  $MontoFACTURAV - $MontoFACTURAB04V;
                              

                    $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                    $taRnc_Empresa = "Rnc_Empresa_606";
                    $tabla = "606_empresas";
      
                 
$ComprasAno = ControladorEmpresas::ctrPeriodofiscal($tabla, $Rnc_Empresa, $taRnc_Empresa);
                        
      foreach ($ComprasAno as $key => $value){
          
          $ExtraerPeriodo606 = substr($value["Fecha_AnoMes_606"],0 ,4);
                         
          if($AnoFiscal == $ExtraerPeriodo606){
            if($value["Extraer_NCF_606"] != "CP1"){
            $TOTALCOMPRAS = $TOTALCOMPRAS + $value["Total_Monto_Factura_606"];


            }
              

            
              
              if($value["Tipo_Gasto_606"] == "09" && $value["Extraer_NCF_606"] != "CP1"){
                
                 $ComprasB09 = $ComprasB09 + $value["Total_Monto_Factura_606"];



                }elseif($value["Tipo_Gasto_606"] == "10" && $value["Extraer_NCF_606"] != "CP1"){
                  $ComprasB09 = $ComprasB09 + $value["Total_Monto_Factura_606"];


                }
                else{
                  if($value["Extraer_NCF_606"] != "CP1"){
                      
                    $Compras = $Compras + $value["Total_Monto_Factura_606"];

                  }



                }

                               // CIERRE DE SI DE B09



                            }//CIERRE DE SI DE AÑO FISCAL
                          }// CIERRE DE FOREACH DE COMPRAS

                        $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                        $taRnc_Empresa = "Rnc_Empresa";
                        $tabla = "premisas_empresas";
      
                 
                      $Premisas = ControladorEmpresas::ctrPeriodofiscal($tabla, $Rnc_Empresa, $taRnc_Empresa);

                        
                        foreach ($Premisas as $key => $value){
                          $periodoFiscal = $value["AnoFiscal"];
                         
                          if($AnoFiscal == $periodoFiscal){
                            $id = $value["id"];
                            $InvInicial = $value["InvInicial"];

                            $Nomina = $value["Nomina"];
                            $TSS = $value["Nomina"] * 0.1669;
                            $Anticipo = $value["Anticipo"];
                            $Gasto_Depresiacion = $value["Gasto_Depresiacion"];
                             



                          }
                        
                        



                        }
                        $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                        $taRnc_Empresa = "Rnc_Empresa";
                        $tabla = "control_empresas";
                        $TipoEmpresa = "";
      
                 
                      $ControlEmpresa = ControladorEmpresas::ctrPeriodofiscal($tabla, $Rnc_Empresa, $taRnc_Empresa);
                      
                         
                        foreach ($ControlEmpresa as $key => $value){
                          $TipoEmpresa =  $value["Tipo_Id_Empresa"];
                           $ExtraerPeriodoControl = substr($value["Periodo_Empresa"],0 ,4);
                          
                          if($AnoFiscal == $ExtraerPeriodoControl){
                            $Importaciones = $Importaciones + $value["ITBISimportacion"];
                            $ValorImportaciones = $Importaciones / 0.18;


                          }

                          
                        }


                        $TOTALGRAFICAV = $TOTALVENTAS;
                        $TOTALGRAFICAC =  $TOTALCOMPRAS;
                        $GANANCIAGRAFICA = $TOTALGRAFICAV - $TOTALGRAFICAC; 

                        $CostoVenta = $TOTALVENTAS * 0.70;
                        $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                        $porcentajeCosto = 70;


                        $sumaInv =  $InvInicial + $ComprasB09 + $ValorImportaciones; 

                        if($sumaInv == 0){
                           $CostoVenta = 0;
                           $InvFinal = 0;
                          $porcentajeCosto = 0;






                        } else {


                        

                        if($InvFinal < 0){
                          $CostoVenta = $TOTALVENTAS * 0.65;
                          $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                           $porcentajeCosto = 65;
                                if($InvFinal < 0){
                                    $CostoVenta = $TOTALVENTAS * 0.60;
                                    $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                     $porcentajeCosto = 60;
                                      if($InvFinal < 0){
                                        $CostoVenta = $TOTALVENTAS * 0.55;
                                        $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                         $porcentajeCosto = 55;
                                          if($InvFinal < 0){
                                            $CostoVenta = $TOTALVENTAS * 0.50;
                                            $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                             $porcentajeCosto = 50; 
                                              if($InvFinal < 0){
                                                $CostoVenta = $TOTALVENTAS * 0.45;
                                                $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                 $porcentajeCosto = 45;
                                                    if($InvFinal < 0){
                                                    $CostoVenta = $TOTALVENTAS * 0.40;
                                                    $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                     $porcentajeCosto = 40;
                                                        if($InvFinal < 0){
                                                        $CostoVenta = $TOTALVENTAS * 0.35;
                                                        $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                         $porcentajeCosto = 35;
                                                            if($InvFinal < 0){
                                                            $CostoVenta = $TOTALVENTAS * 0.30;
                                                            $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                             $porcentajeCosto = 30;
                                                                if($InvFinal < 0){
                                                                $CostoVenta = $TOTALVENTAS * 0.25;
                                                                $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta; 
                                                                 $porcentajeCosto = 25;
                                                                    if($InvFinal < 0){
                                                                    $CostoVenta = $TOTALVENTAS * 0.20;
                                                                    $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta; 
                                                                     $porcentajeCosto = 20; 
                                                                        if($InvFinal < 0){
                                                                        $CostoVenta = $TOTALVENTAS * 0.15;
                                                                        $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta; 
                                                                         $porcentajeCosto = 15;  
                                                                            if($InvFinal < 0){
                                                                            $CostoVenta = $TOTALVENTAS * 0.10;
                                                                            $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                                             $porcentajeCosto = 10;  

                                                                                      if($InvFinal < 0){
                                                                                      $CostoVenta = $TOTALVENTAS * 0.05;
                                                                                      $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                                                       $porcentajeCosto = 5; 
                                                                                        if($InvFinal < 0){
                                                                                      $CostoVenta = $TOTALVENTAS;
                                                                                      $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                                                       $porcentajeCosto = 0;

                                                                                       if($InvFinal < 0){
                                                                                        $CostoVenta = 0;
                                                                                      $InvFinal = 0;
                                                                                       $porcentajeCosto = 0;


                                                                                       }
                                                                                            
                                                                                     }else {
                                                                                      $CostoVenta = $TOTALVENTAS * 0.05;
                                                                                      $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                                                    }   
                                                                                            
                                                                                     }else {
                                                                                      $CostoVenta = $TOTALVENTAS * 0.10;
                                                                                      $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                                                    } 
                                                                                  
                                                                           }else {
                                                                            $CostoVenta = $TOTALVENTAS * 0.15;
                                                                            $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                                          }


                                                                       }else {
                                                                        $CostoVenta = $TOTALVENTAS * 0.20;
                                                                        $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                                      }      
                                                                   }else {
                                                                    $CostoVenta = $TOTALVENTAS * 0.25;
                                                                    $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                                  }       
                                                               }else {
                                                                $CostoVenta = $TOTALVENTAS * 0.30;
                                                                $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                              }        
                                                           }else {
                                                            $CostoVenta = $TOTALVENTAS * 0.35;
                                                            $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                          }          
                                                       }else {
                                                        $CostoVenta = $TOTALVENTAS * 0.40;
                                                        $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                      }           
                                                   }else {
                                                    $CostoVenta = $TOTALVENTAS * 0.45;
                                                    $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                                  }      
                                               }else {
                                                $CostoVenta = $TOTALVENTAS * 0.50;
                                                $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                              }    
                                           }else {
                                            $CostoVenta = $TOTALVENTAS * 0.55;
                                            $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                          }     
                                       }else {
                                        $CostoVenta = $TOTALVENTAS * 0.60;
                                        $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                      }
    
                                 }else {
                                    $CostoVenta = $TOTALVENTAS * 0.65;
                                    $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                                }

                         }else {
                          $CostoVenta = $TOTALVENTAS * 0.70;
                          $InvFinal =  $InvInicial + $ComprasB09 + $ValorImportaciones - $CostoVenta;
                        }
                       }

                        $TOTALGASTOS = $Compras + $Nomina + $Gasto_Depresiacion;
                        $RESULTADOAPAGAR = $TOTALVENTAS - $CostoVenta - $TOTALGASTOS;

                      $inputTOTALVENTAS = number_format($TOTALVENTAS,2);
                      $inputTOTALCOMPRAS = number_format($TOTALCOMPRAS,2);
                      $inputInvInicial = number_format($InvInicial,2);
                      $inputNomina = number_format($Nomina,2);
                      $inputTSS = number_format($TSS,2);
                      $inputAnticipo = number_format($Anticipo,2);
                      $inputGasto_Depresiacion = number_format($Gasto_Depresiacion,2);
                      $inputComprasB09 = number_format($ComprasB09,2);
                      $inputImportaciones = number_format($Importaciones,2);
                      $inputValorImportaciones = number_format($ValorImportaciones,2);
                      $inputCostoVenta = number_format($CostoVenta,2);
                      $inputInvFinal = number_format($InvFinal,2);
                      $inputporcentajeCosto = number_format($porcentajeCosto,2); 
                      $inputCompras = number_format($Compras,2);
                      $inputTOTALGASTOS = number_format($TOTALGASTOS ,2);
                      $inputRESULTADOAPAGAR = number_format($RESULTADOAPAGAR ,2);     
                       
                       


                     ?>

 <div class="col-lg-6 col-xs-12">
          
          <div class="box box-success">

            <div class="box-header with-border">
              <div class="form-group">

                      <div class="col-xs-6 pull-left" >
                         <label>RESUMEN FISCAL ANUAL</label>
              
             
                      </div>
                   

                    </div>


             
              <button class="btn btn-primary pull-right" type="button" id="CuadreITBIS" onclick="javascript:window.print()">Imprimir</button>
                
                

            </div>

            <form role="form" method="post">

            <div class="box-body">

             
                <div class="box">

                  <input type="hidden"  id="RncEmpresapremisas" name="RncEmpresapremisas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
                    <input type="hidden" class="form-control"  id="idpremisas" name="idpremisas" value="<?php echo $id?>" readonly>
                      <div class="form-group">

                    
                    <div class="col-xs-2" style="padding-right:0px">
                      <input type="hidden" class="form-control" id="Fechacuadre" name="Fechacuadre" value="<?php echo $Fechacuadre;?>">
                    
                        
                    </div>
                   

                    </div>
                  
                    

                    <div class="form-group">

                    
                    <div class="col-xs-5" style="padding-top: 15px; align-content: center">

                    <label>Periodo</label>
                    
                    </div>

                    </div>
                  
                     
                    <div class="form-group">

                    
                    <div class="col-xs-6" style="padding-right:0px">
                      <input type="text" class="form-control" id="AnoFiscal" name="AnoFiscal" value=" <?php echo $AnoFiscal;?>" readonly>
                  
                        
                   </div>
                   

                    </div>


                  <div class="chart-responsive">
      
                  <div class="chart" id="bar-chartcuadre" style="height: 320px;"></div>


                </div><!--***************** Inicio ********************** -->
          
                 
                    
                    <div class="col-xs-9" style="padding-top: 15px; align-content: center">

                    <label class="form-control label-default center-block" style="">TOTAL VENTAS</label>
                    
                  </div>
                    
                    <div class="col-xs-3" style="padding-top: 15px">

                          <input type="text" value="<?php echo $inputTOTALVENTAS;?>" readonly>
                         

                  </div>
                  <!--***************** FIN ********************** -->

                    <!--***************** Inicio ********************** -->
                    <div class="col-xs-7" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block" style="">INVENTARIO INICIAL</label>

                    </div>
                    <div class="col-xs-3" style="padding-right:0px">

                      <input type="text" id="InvInicial" name ="InvInicial" value="<?php echo $inputInvInicial;?>" required>
                      

                    </div>
                   <!--***************** Fin ********************** -->


                    <!--***************** Inicio ********************** -->
                    <div class="col-xs-7" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block" style="">COMPRAS NACIONALES</label>

                    </div>
                    <div class="col-xs-3" style="padding-right:0px">

                      <input type="text" value="<?php echo $inputComprasB09;?>" readonly>
                      

                    </div>
                   <!--***************** Fin ********************** -->
                    <!--***************** Inicio ********************** -->
                    <div class="col-xs-7" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">IMPORTACIONES</label>

                    </div>
                    <div class="col-xs-3" style="padding-right:0px">

                      <input type="text" value="<?php echo $inputValorImportaciones;?>" readonly>
                     

                    </div>
                   <!--***************** Fin ********************** -->
                   <!--***************** Inicio ********************** -->
                    <div class="col-xs-7" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">INVENTARIO FINAL</label>

                    </div>
                    <div class="col-xs-3" style="padding-right:0px">

                      <input type="text" value="<?php echo $inputInvFinal;?>" readonly>
                      

                    </div>
                   <!--***************** Fin ********************** -->
                    <!--***************** Inicio ********************** -->
                    <div class="col-xs-8" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">COSTO DE VENTAS</label>

                    </div>
                    <div class="col-xs-1">


                       <input type="text" value="<?php echo $porcentajeCosto;?>" readonly>
                     
                       

                    </div>
                    <div class="col-xs-1">
                       

                      <input type="text" value="<?php echo $inputCostoVenta;?>" readonly> 
                     
                    </div>

               </div>
                   <!--***************** Fin ********************** -->

             
               
          
          
                <!--***************** Inicio ********************** -->
                    <div class="col-xs-7" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">GASTOS</label>

                    </div>
                    <div class="col-xs-3" style="padding-top:0px">

                      <input type="text" value="<?php echo $inputCompras;?>" readonly>
                      

                    </div>
                   <!--***************** Fin ********************** -->

                   <div class="col-xs-7">

                      <label class="form-control label-default center-block">NOMINA</label>

                    </div>

                    <div class="col-xs-2">

                      <input type="text" id="Nomina" name="Nomina" value="<?php echo $inputNomina;?>" requiered>
                    
                    
                      
                    </div>
                     <div class="col-xs-7">

                      <label class="form-control label-default center-block">TSS</label>

                    </div>

                    <div class="col-xs-2">

                      <input type="text" value="<?php echo $inputTSS;?>"Readonly>
                    
                    
                      
                    </div>



                    <div class="col-xs-7" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">DEPRECIACIÓN</label>

                    </div>
                     <div class="col-xs-2">

                      <input type="text" id="Gasto_Depresiacion" name="Gasto_Depresiacion" value="<?php echo $inputGasto_Depresiacion;?>" requiered>
                     <br>
                    
                      
                    </div>
                    <div class="col-xs-9" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">TOTAL GASTOS</label>

                    </div>
                     <div class="col-xs-3">

                      <input type="text" value="<?php echo $inputTOTALGASTOS ;?>" readonly>
                     <br>
                    
                      
                    </div>

                    <?php 
                     $PORCENTAJE = 0;
                    if($RESULTADOAPAGAR < 0){
                     $inputRESULTADOAPAGAR = number_format($RESULTADOAPAGAR,2);
                     $IMPUESTO = 0;
                     $inputIMPUESTO = number_format($IMPUESTO, 2);
                     $inputAnticipo = number_format($Anticipo, 2);
                     $TOTALIMPUESTO = 0;
                     $inputTOTALIMPUESTO = number_format($TOTALIMPUESTO, 2);

                      
                      echo '
                    
                    <div class="col-xs-9" style="padding-top: 0px; align-content: center">

                    <label class="form-control label-danger center-block">RESULTADO EN PERDIDA</label>
                

                    </div>';
                    }else{
                      
                      $inputRESULTADOAPAGAR = number_format($RESULTADOAPAGAR,2);
                      if($TipoEmpresa == "1"){
                          $PORCENTAJE = 27;
                          $IMPUESTO = $RESULTADOAPAGAR *0.27;
                          $inputIMPUESTO = number_format($IMPUESTO, 2);
                          $inputAnticipo = number_format($Anticipo, 2);
                          $TOTALIMPUESTO = $IMPUESTO - $Anticipo;
                          $inputTOTALIMPUESTO = number_format($TOTALIMPUESTO, 2);


                      }else{
                          $PORCENTAJE = 15;
                          $IMPUESTO = $RESULTADOAPAGAR *0.15;
                          $inputIMPUESTO = number_format($IMPUESTO, 2);
                          $inputAnticipo = number_format($Anticipo, 2);
                          $TOTALIMPUESTO = $IMPUESTO - $Anticipo;
                          $inputTOTALIMPUESTO = number_format($TOTALIMPUESTO, 2);


                      }

                       echo '
                    
                    <div class="col-xs-9" style="padding-top: 0px; align-content: center">

                    <label class="form-control label-success center-block">RESULTADO EN GANANCIA</label>
                

                    </div>';

                     

                    }
                    

                     ?>
                     
                     <div class="col-xs-3">

                      <input type="text" value="<?php echo $inputRESULTADOAPAGAR;?>" readonly>
                     <br>
                    
                      
                    </div>
                     <div class="col-xs-8" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">IMPUESTO</label>

                    </div>
                     <div class="col-xs-1">
                       <input type="text"  value="<?php echo $PORCENTAJE;?>" readonly>
                    
                      
                    </div>

                     <div class="col-xs-1">
                       
                      <input type="text" id="Anticipo" name="Anticipo" value="<?php echo $inputIMPUESTO;?>" readonly>
                    
                    
                      
                    </div>

                     <div class="col-xs-9" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">MENOS ANTICIPO PAGADO</label>

                    </div>

                     <div class="col-xs-3">

                      <input type="text" id="Anticipo" name="Anticipo" value="<?php echo $inputAnticipo;?>" requiered>
                     <br>
                    
                      
                    </div>
                     <div class="col-xs-9" style="padding-top: 0px; align-content: center">

                      <label class="form-control label-default center-block">TOTAL IMPUESTO A PAGAR</label>

                    </div>

                     <div class="col-xs-3">

                      <input type="text" value="<?php echo $inputTOTALIMPUESTO;?>" readonly>
                   
                   
                    </div>
                  
      

      

      

            
             

          <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Actualizar Resumen</button>

                     
            </div>

               <a class="btn btn-warning pull-left" role="button" href="reporte-606">Reporte 606</a>

             
              <a class="btn btn-warning pull-left" role="button" href="reporte-607">Reporte 607</a>

          
          <?php 

          $Premisas = new ControladorEmpresas();
          $Premisas -> ctrPremisasFiscal();



           ?>

          
          </form>
          
       
        </div>

          
      </div>
    
    </div>
   

<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->

  <script>
   //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chartcuadre',
      resize: true,
      data: [
      
      <?php 
     
       
          echo "{y: 'VENTAS', a: '".$TOTALGRAFICAV."'},";
          echo "{y: 'COMPRAS', a: '".$TOTALGRAFICAC."'},";
          echo "{y: 'GANANCIAS', a: '".$GANANCIAGRAFICA."'},";
        
        

      ?>
        
      ],
      barColors: ['#0af'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['TOTAL'],
      preUnits: '$',
      hideHover: 'auto'
    });




</script>
  

  
  