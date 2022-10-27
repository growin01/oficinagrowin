 <option value="52">COSTOS POR SERVICIOS</option>
<div class="content-wrapper">
  <section class="content-header">
     <h1 class="col-xs-5" style="font-size: 30px"><i class="fa fa-shopping-cart"></i>
        EDITAR COMPRAS GENERALES PROFORMA
        
      </h1>

<a href="crear-compra-gastosgenerales" class="btn btn-success"><i class="fa fa-shopping-cart" style="padding-right:5px"></i>Compra General</a>
  

<a href="crear-compra-gastosgeneralesNo" class="btn btn-success"><i class="fa fa-shopping-cart" style="padding-right:5px"></i>Compra General Proforma</a>
  
<a href="compras" class="btn btn-success"><i class="fa fa-list-ol" style="padding-right:5px"></i>Detalle de Compra</a>

<a href="reportecxp" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle Cuentas Por Pagar</a>
    <br>

    
  </section><!-- cierre section class="content-header" -->

  <section class="content">
    <div class="row">
       
       <div class="col-lg-7">
          
          <div class="box box-success">
             
             <div class="box-header with-border">

               <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "DCG";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


               if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right btn-xs"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }

          $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
          $Rnc_Empresa_Master = null;
          $Orden = "id";

          $Empresa = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);



               ?>
               

              </div>

            <form role="form" method="post" class="formularioGastos">

            <div class="box-body">
              <div class="box">
                <?php 
          if(isset($_GET["idcompra"])){   
        $id = "id";  
        $valoridCompra = $_GET["idcompra"];

$gastosgenerales = ControladorCompras::ctrMostrarCompraEditar($id, $valoridCompra);

$id_Suplidor = "Documento_Suplidor";
$Valor_idSuplidor =$_GET["RncFactura606"];
$Rnc_Empresa_Suplidor = $_GET["RncEmpresaCompras"];

$Suplidor = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

        $tabla = "606_empresas";
        $taRnc_Empresa_606 = "Rnc_Empresa_606";
        $Rnc_Empresa_606 = $_GET["RncEmpresaCompras"];
        $taRnc_Factura_606 = "Rnc_Factura_606";
        $Rnc_Factura_606 = $_GET["RncFactura606"];
        $taNCF_606 = "NCF_606";
        $NCF_606 = $_GET["NCF_606"];

$Factura606 = Modelo606::MdlfacturaRepetida606($tabla, $taRnc_Empresa_606, $Rnc_Empresa_606, $taRnc_Factura_606, $Rnc_Factura_606, $taNCF_606, $NCF_606);
   

  $id606 = $Factura606["id"];

    if($Factura606["Extraer_Tipo_Pago_606"] == "04"){ 

       $tabla = "cxp_empresas";
        $taRnc_Empresa_cxp = "Rnc_Empresa_cxp";
        $Rnc_Empresa_cxp = $_GET["RncEmpresaCompras"];
        $taRnc_Factura_cxp = "Rnc_Suplidor";
        $Rnc_Factura_cxp = $_GET["RncFactura606"];
        $taNCF_cxp = "NCF_cxp";
        $NCF_cxp = $_GET["NCF_606"];

      $cxp = ModeloCXP::MdlMostrarCXPdetalle($tabla, $taRnc_Empresa_cxp, $Rnc_Empresa_cxp, $taRnc_Factura_cxp, $Rnc_Factura_cxp, $taNCF_cxp, $NCF_cxp);
      
      $idcxp = $cxp["id"];

      echo '<input type="hidden" class="form-control" id="Editar_id_cxp" name="Editar_id_cxp" value="'.$idcxp.'">';
      

      }else{
        echo '<input type="hidden" class="form-control" id="Editar_id_cxp" name="Editar_id_cxp" value="NO">';


      }
        

        

        }

         ?>
<input type="hidden"  id="RncEmpresaCompras" name="RncEmpresaCompras" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
<input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
<input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
<input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
<input type="hidden" class="form-control" id="Editar_gastosgenerales" name="Editar_gastosgenerales" value="<?php echo $_GET["idcompra"]?>">
   <input type="hidden" class="form-control" id="Editar_id_606" name="Editar_id_606" value="<?php echo  $id606?>">
  <input type="hidden" class="form-control" id="Fiscal" name="Fiscal" value="NO">
  <input type="hidden" class="form-control" id="NAsiento" name="NAsiento" value="<?php echo $gastosgenerales["NAsiento"];?>" required> 
<input type="hidden" class="form-control" id="NAsientoRet" name="NAsientoRet" value="<?php echo $gastosgenerales["NAsientoRET"];?>" required>
<input type="hidden" class="form-control" id="RetencionesANT" name="RetencionesANT" value="<?php echo $gastosgenerales["Retenciones"];?>" required>


        <div class="form-group col-xs-12">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames_606" name="FechaFacturames_606" value="<?php echo $gastosgenerales["FechaAnoMes"]?>" required autofocus>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia_606" name="FechaFacturadia_606" value="<?php echo $gastosgenerales["FechaDia"]?>" required>


                    </div>
                   

                  </div>
            </div>

          
         

            <div class="col-xs-12"> 
               <div class="form-group col-xs-4">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="CodigoCompra" name="CodigoCompra" value="<?php echo $gastosgenerales["CodigoCompra"]?>" required readonly>

                  </div>

                </div>
                
                 <div class="form-group col-xs-4">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="Editar-NCF_606" name="Editar-NCF_606" maxlength="13" value="<?php echo $gastosgenerales["NCF_Factura"]?>" required readonly>

                     <input type="hidden" name="NCF_606-anterior" value="<?php echo $gastosgenerales["NCF_Factura"]?>" required readonly>

                  </div>

                </div>

                  <div class="form-group col-xs-4">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCFMOD" maxlength="11" id="NCF_Modificado_606" name="NCF_Modificado_606" placeholder="NCF MODIFICADO" value="" readonly>

                  </div>

                </div>

                </div>




                <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                  <h4 style="text-align: center;"><b>INFORMACIÓN SUPLIDOR</b></h4>
 
                </div>

                       <div class="form-group col-xs-12">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select type="text" class="form-control" id="agregarSuplidor" name="agregarSuplidor" placeholder="Agregar Suplidor">
                        <option value="<?php echo $Suplidor["id"]?>"><?php echo $Suplidor["Nombre_Suplidor"]?></option>
                        <option value="">Seleccionar Suplidor</option>
                         <?php 

                           $id_Suplidor = null;
                            $Valor_idSuplidor = null;

              $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];

              $suplidores = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

                         foreach ($suplidores as $key => $value){

                          echo '<option value="'.$value["id"].'">'.$value["Nombre_Suplidor"].'</option>';

                         }

                         ?>

                      </select>

                      <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Suplidor</button></span>
                      

                    </div>
                   

                  </div>

        <div class="form-group col-xs-4">

          <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

            <div class="input-group form-control TipoSuplidorFactura">
               <?php 
                      if ($Suplidor["Tipo_Suplidor"] == 1){
                        echo "<input type='radio' Class='JuridicoSuplidorFactura' id='JuridicoSuplidorFactura' name='Tipo_Suplidor_Factura' value='1' required checked> Jurídico
                         <input type='radio' Class='FisicoSuplidorFactura' id='FisicoSuplidorFactura' name='Tipo_Suplidor_Factura' value='2' required> Fisico";


       
                        
                      }else{ 
                        echo "<input type='radio' Class='JuridicoSuplidorFactura' id='JuridicoSuplidorFactura' name='Tipo_Suplidor_Factura' value='1' required> Jurídico
                         <input type='radio' Class='FisicoSuplidorFactura' id='FisicoSuplidorFactura' name='Tipo_Suplidor_Factura' value='2' required checked> Fisico";
                      


                      }
                    ?>
       
                    
                      
              </div>

            </div>

        </div>


          <div class="form-group col-xs-4">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" maxlength="11" class="form-control input-xs" id="Editar-RncSuplidorFactura" name="Editar-RncSuplidorFactura"  value="<?php echo $Suplidor["Documento_Suplidor"]?>" required>

              <input type="hidden" name="RncSuplidor-anterior"  value="<?php echo $Suplidor["Documento_Suplidor"]?>" required>

            </div>

          </div>

        <div class="form-group col-xs-4">

          <div class="input-group">

            <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

                <input type="text" class="form-control input-xs" maxlength="110" id="Nombre_Suplidor" name="Nombre_Suplidor" placeholder="Nombre Suplidor" value="<?php echo $Suplidor["Nombre_Suplidor"]?>" required>

          </div>

        </div>


            <div class="col-xs-12 left">
                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" value="<?php echo $gastosgenerales["Referencia"]?>" required>

                    </div>
                   
                  
                 </div>
               
              </div>


                
                <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                  <h4 style="text-align: center;"><b>Distribución De Gasto</b></h4>
 
                </div>

<div class="form-group col-xs-12">

              <div class="col-xs-4">

              <div class="form-group">

                  <div class="input-group form-control">
                    <?php 
                     
      if($Factura606["Monto_Servicios_606"] > 0){
        echo '<input type="radio" name="tipo_de_monto" id="bienes" value="1" required><b>_Compras</b>&nbsp;&nbsp;&nbsp;
                
  <input type="radio" name="tipo_de_monto" id="servicios" value="2" required checked><b>_Servicios</b>';
      }else{
        echo '<input type="radio" name="tipo_de_monto" id="bienes" value="1" required checked><b>_Compras</b>&nbsp;&nbsp;&nbsp;
                
  <input type="radio" name="tipo_de_monto" id="servicios" value="2" required><b>_Servicios</b>';



                     }


                     ?>
                     
                 

                </div>
                

              </div>
        </div>
                
            <div class="form-group col-xs-5">
                <select class="form-control" name="Tipo_Gasto_606" id="Tipo_Gasto_606" required>
                  <?php 
                  $Tipo_Gasto_606 = $Factura606["Extraer_Tipo_Gasto_606"];

                
        switch ($Tipo_Gasto_606) {
          case '01':
            echo' <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option>
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
                    
          case '02':
            echo'<option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option>
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
           case '03':
            echo' <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option>
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
          case '04':
            echo' <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option>
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
          case '05':
            echo' <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option>
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
          case '06':
            echo' <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="07">07-GASTOS FINANCIEROS</option>
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
           case '07':
            echo' <option value="07">07-GASTOS FINANCIEROS</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
           case '08':
            echo' <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option> 
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
          case '09':
            echo' <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option> 
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
          case '10':
            echo' <option value="10">10-ADQUISICIONES DE ACTIVOS</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option> 
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="11">11-GASTOS DE SEGUROS</option>'; 
          break;
          case '11':
            echo' <option value="11">11-GASTOS DE SEGUROS</option>
                  <option value="01">01-GASTOS DE PERSONAL</option>
                  <option value="02">02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO</option>
                  <option value="03">03-ARRENDAMIENTOS</option>
                  <option value="04">04-GASTOS DE ACTIVOS FIJO</option>
                  <option value="05">05-GASTOS DE REPRESENTACIÓN</option>
                  <option value="06">06-OTRAS DEDUCCIONES ADMITIDAS</option>
                  <option value="07">07-GASTOS FINANCIEROS</option> 
                  <option value="08">08-GASTOS EXTRAORDINARIOS</option>
                  <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>
                  <option value="10">10-ADQUISICIONES DE ACTIVOS</option>';
                   
          break;
                   
                    
                    
                    
                    
                  }


                   ?>
                 
                </select>
            </div>
              <?php 
if($_SESSION["Contabilidad"] == 1){
          
      $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
      $Rnc_Factura = $Suplidor["Documento_Suplidor"];
      $NCF = $gastosgenerales["NCF_Factura"];
      $Extraer = "DCG";

    $respuesta = ControladorDiario::ctrMostrarGastoCompra($Rnc_Empresa_LD, $Rnc_Factura, $NCF, $Extraer);
  
    foreach ($respuesta as $key => $value) {
       $NAsiento = $value["NAsiento"];

    }
 


        }
          echo '
              <div class="col-xs-3">
                    
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      
                      <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="'.$gastosgenerales["NAsiento"].'" readonly> 
                      
              
              </div></div>';

        
         ?>
</div>
<div class="col-xs-6 right">

          <div class="form-group">

              <div class="input-group form-control Formapago">

                <label>FORMA DE PAGO</label><br>

                      <?php 
                      $ValorForma_De_Pago_606 = $Factura606["Extraer_Tipo_Pago_606"];                  

                  switch ($ValorForma_De_Pago_606 ){ 
                        
                        case "01":
                        echo ' <input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required checked>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <br>
                        ';
                            
                            break;

                            case "02":
                            echo ' <input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required checked>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <br>
                        ';
                            
                            break;

                            case "03":
                            echo ' <input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required checked>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <br>
                        ';
                            
                            break;
                            
                            case "04":
                            echo ' <input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required checked>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <br>
                        ';
                            
                            
                            break;


                      }




                       ?>

                      
                    </div>

                  

                  </div>
                  </div>

                  <br>
                  <br>
  <!--*****************CHECKBOX DE PORCENTAJE**********************-->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>

                    <?php 
                    if($Factura606["ITBIS_alcosto_606"] == 0){
                      echo ' <input type="checkbox" class="ITBIS_LLEVADO_A_COSTO" id="Editar-ITBIS_LLEVADO_A_COSTO" name="Editar-ITBIS_LLEVADO_A_COSTO" value ="1">ITBIS LLEVADO A COSTO';


                    }else{

                      echo ' <input type="checkbox" class="ITBIS_LLEVADO_A_COSTO" id="Editar-ITBIS_LLEVADO_A_COSTO" name="Editar-ITBIS_LLEVADO_A_COSTO" value ="1" checked>ITBIS LLEVADO A COSTO';
                    }


                     ?>
                    
                    
                  </label>

                </div>
                
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label>

                    <?php 
                    if($Factura606["ITBIS_Proporcional_606"] == 0){
                      echo '<input type="checkbox" class="Editar-ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="Editar-ITBIS_Sujeto_a_Propocionalidad" value ="1">ITBIS Sujeto a Propocionalidad';


                    }else{

                      echo '<input type="checkbox" class="Editar-ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="Editar-ITBIS_Sujeto_a_Propocionalidad" value ="1" checked>ITBIS Sujeto a Propocionalidad';
                    }


                     ?>
                    
                    
                  </label>

                </div>
                
              </div>
              <div class="form-group col-xs-6">
                   
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-money"></i></span>

                     <div class="input-group form-control Moneda">

                  <?php 

$MonedaFactura = $gastosgenerales["Moneda"];

switch ($MonedaFactura) {
                      
case 'DOP':
echo '<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="DOP" required checked>$ DOP &nbsp; 
<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="USD" required>$ USD';
break;
                      
case 'USD':
echo '<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="DOP" required >$ DOP &nbsp;
<input type="radio" name="Moneda_Factura"  id="Moneda_Factura" value="USD" required checked>$ USD';
break;
                    



 }


                   ?>
                
                   
                   

                  </div>
              </div>
   </div>  
   <div class="form-group col-xs-6">
                   
                    <div class="input-group TASA">
 <?php 

$MonedaFactura = $gastosgenerales["Moneda"];

switch ($MonedaFactura) {
                      

                      
case 'USD':
echo  '<span class="input-group-addon"><i class="ion ion-social-usd">&nbsp;DOP</i></span>

      <input type="text" class="form-control" id="tasaUS" name="tasaUS"  value="'.$gastosgenerales["Tasa"].'" required>'
;
break;
                    



 }


                   ?>
                
                     
                    

                 
                 
              </div>
   </div>  

  
<div class="col-xs-12"></div>
     
                   <div class="col-xs-12 pull-left banco606">
      
<?php 

if($Factura606["Extraer_Tipo_Pago_606"] != 04){
   echo '<div class="form-group">
     <div class="input-group form-control"> 
         <label>BANCO</label><br>

        <label class="col-xs-4">Fecha de Pago</label>
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
                         
<input type="text" class="col-xs-2 Fechames" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" value="'.$Factura606["Fecha_Trans_AnoMes_606"].'" required>

<input type="text" class="col-xs-2 Fechadia" id="FechaPagodia606" name="FechaPagodia606" value="'.$Factura606["Fecha_Trans_Dia_606"].'" required><br>
<input type="text" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" value="'.$Factura606["Referencia_606"].'" required>

 <div class="col-xs-5">';


   $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];
   $id_banco = $Factura606["Banco_606"];

   $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

   if($id_banco != "" && $id_banco != 0){ 
   foreach ($Banco as $key => $value){

     if($value["id"] == $id_banco){ 


     echo '<select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco">
         <option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

       }

    }
   foreach ($Banco as $key => $value){

     if($value["id"] != $id_banco){ 


  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

       }

    }
  } 
  
 
   echo'</select>
    </div>
            
   </div>
                            
                      </div>';
                       } else{

echo'<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes606" name="FechaPagomes606" value="'.$Factura606["Fecha_Trans_AnoMes_606"].'" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" value="'.$Factura606["Fecha_Trans_Dia_606"].'" required readonly><br>
        <input type="hidden" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="NO APLICA">
        <input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="" required>';


                       }

                            ?>
                            
          


    </div>
                              
                       

     
  <div class="form-group row nuevoGasto">
    <?php 
    $listaProductos = json_decode($gastosgenerales["Producto"], true);

  

  if($_SESSION["Proyecto"] == 1){ 
    foreach ($listaProductos as $key => $value) {
       $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

      $proyectos = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);
       $plancuenta = $value["idgrupo"].'.'.$value["idcategoria"].'.'.$value["idgenerica"].'.'.$value["idcuenta"];

      echo '<div class="row" style="padding:5px 15px">
                  <div class="col-xs-3" style="padding-right:0px">
                    <div class="input-group">
                            
                      <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta="'.$plancuenta.'"><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" idcuenta=""'.$plancuenta.'" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
                      </div>
                      </div>

                        <input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'.$value["idgrupo"].'" readonly required>
                         <input type="hidden" class="idcategoria" name ="idcategoria" value="'.$value["idcategoria"].'" required readonly>
                         <input type="hidden"  class="idgenerica" name="idgenerica" value="'.$value["idgenerica"].'" required readonly>
                          <input type="hidden" class="idcuenta" name="idcuenta" value="'.$value["idcuenta"].'" required readonly> 
                            
                            
                     
                          <div class="col-xs-3" style="padding-left:0px">
                          
                            <div input-group">
                            
                             <input type="text" class="form-control nombrecuenta" name="nombrecuenta" value="'.$value["nombrecuenta"].'" required readonly> 
                            
                          </div>
                          </div>
                      
                      <div class="col-xs-3" style="padding:0px">
                      
                      <div input-group">
                        
                        <input type="text" class="form-control gasto" name="gasto" value = "'.$value["gasto"].'"placeholder="Total Gasto" required> 
                        
                      </div>
                      </div>
                      
                      <div class="col-xs-3" style="padding-left:0px">
                      
                      <div input-group">
                         <select type="text" class="form-control proyecto" id="proyecto" idProyecto name="proyecto" required>';
                               
                         foreach ($proyectos as $key => $pro) {
                          if($value["proyecto"] == $pro["id"]){ 
                          echo '<option value="'.$pro["id"].'">'.$pro["CodigoProyecto"].'</option>';
                         }
                         }
                         foreach ($proyectos as $key => $pro) {
                          if($value["proyecto"] != $pro["id"] && $pro["estatus"] == 1){ 
                          echo '<option value="'.$pro["id"].'">'.$pro["CodigoProyecto"].'</option>';
                         }
                         }
                            

                          echo'</select>
                        
                      </div>
                      </div>

                    </div>';


    }
  }/*cierre si de proyectos*/
else{ 
  foreach ($listaProductos as $key => $value) {
       
       $plancuenta = $value["idgrupo"].'.'.$value["idcategoria"].'.'.$value["idgenerica"].'.'.$value["idcuenta"];

      echo '<div class="row" style="padding:5px 15px">
                  <div class="col-xs-3" style="padding-right:0px">
                    <div class="input-group">
                            
                      <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta="'.$plancuenta.'"><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" idcuenta=""'.$plancuenta.'" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
                      </div>
                      </div>

                        <input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'.$value["idgrupo"].'" readonly required>
                         <input type="hidden" class="idcategoria" name ="idcategoria" value="'.$value["idcategoria"].'" required readonly>
                         <input type="hidden"  class="idgenerica" name="idgenerica" value="'.$value["idgenerica"].'" required readonly>
                          <input type="hidden" class="idcuenta" name="idcuenta" value="'.$value["idcuenta"].'" required readonly> 
                            
                            
                     
                          <div class="col-xs-3" style="padding-left:0px">
                          
                            <div input-group">
                            
                             <input type="text" class="form-control nombrecuenta" name="nombrecuenta" value="'.$value["nombrecuenta"].'" required readonly> 
                            
                          </div>
                          </div>
                      
                      <div class="col-xs-3" style="padding:0px">
                      
                      <div input-group">
                        
                        <input type="text" class="form-control gasto" name="gasto" value = "'.$value["gasto"].'"placeholder="Total Gasto" required> 
                        
                      </div>
                      </div>
                      
                      <div class="col-xs-3" style="padding-left:0px">
                      
                      <div input-group">
                         <input type="hidden" class="form-control proyecto" id="proyecto" idProyecto name="proyecto" value="0" required>
                               
                         
                        
                      </div>
                      </div>

                    </div>';


    }/*cierre for*/
}/*cierre else*/


     ?>
  

  </div>

      <input type="hidden" class="col-xs-12" id="listaGastos" name="listaGastos">

               <br>

 <div class="col-xs-9 pull-right">
   <div class="form-group col-xs-8 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>TOTAL FACTURA</b></h4>
  </div>
   <div class="col-xs-6">
        <label class="pull-right">Sub Total +</label>

    </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="NetoTotalGasto" name="NetoTotalGasto" placeholder="0000" value=""required readonly>

                <input type="hidden" name="NetoGasto" id="NetoGasto" value="">
                        
              </div>
      </div>
        <div class="col-xs-6">
        <label class="pull-right">Propina Legal +</label>

    </div>
      <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="PropinaLegal" name="PropinaLegal" placeholder="0000" value="<?php echo $Factura606["Monto_Propina_606"];?>"required>

                <input type="hidden" name="NetoPropinaLegal" id="NetoPropinaLegal" value="<?php echo $Factura606["Monto_Propina_606"];?>">
                        
              </div>
      </div>
      <div class="col-xs-6">
        <input class="pull-right" type="checkbox"  id="HabilitarITBIS" name="HabilitarITBIS" value ="1">&nbsp;
          <label class="pull-right">ITBIS +</label>
          
      
      </div>
     
        <div class="form-group col-xs-2" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="PORITBIS" name="PORITBIS" value="<?php echo $gastosgenerales["Porimpuesto"]?>" required>
         </div>
      </div>

       <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">
              
                <input type="text" class="form-control" id="TotalITBISvi" name="TotalITBISvi" placeholder="0000" value=""required readonly>

                <input type="hidden" class="form-control" id="TotalITBIS" name="TotalITBIS" placeholder="0000" value=""required readonly>

                        
              </div>
        </div>
          <div class="col-xs-6">
       
          <label class="pull-right">ISC +</label>
          
      </div>
       
       <div class="form-group col-xs-6">

            <div class="input-group">
               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

              
  <input type="text" class="form-control" id="TotalISCvi" name="TotalISCvi" placeholder="0000" value="0" required readonly>
  

  <input type="hidden" class="form-control" id="TotalISC" name="TotalISC" value="0" required readonly>

                        
              </div>
        </div>
      <div class="col-xs-6">
        
          <label class="pull-right">Otros Imp. +</label>
          
      
      </div>
       <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalOtrosImpvi" name="TotalOtrosImpvi" value="0" required readonly>

                <input type="hidden" name="TotalOtrosImp" id="TotalOtrosImp" value="0" required readonly>
                        
              </div>
      </div>
        
 
        <div class="col-xs-6">
            <label class="pull-right">Retenciones -</label>

        </div>
        <?php 
        $TotalRet = $Factura606["ITBIS_Retenido_606"] + $Factura606["Monto_Retencion_Renta_606"]; 

         ?>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalRetvi" name="TotalRetvi" placeholder="0000" value="<?php echo $TotalRet?>" required readonly>

                <input type="hidden" name="TotalRet" id="TotalRet" value="<?php echo $TotalRet?>">
                        
              </div>
      </div>
       <div class="col-xs-6">
            <label class="pull-right">Total =</label>

        </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalGastovi" name="TotalGastovi" placeholder="0000" value=""required readonly>

                <input type="hidden" name="TotalGasto" id="TotalGasto" value="">
                        
              </div>
      </div>
  </div><!--========col-xs-6 pullright=========-->  
  <div class = "col-xs-12"></div>

<div class="form-group col-xs-12 divretenciones">
  <?php    
  if($gastosgenerales["Retenciones"] == "1" && substr($gastosgenerales["NAsientoRET"], 0, 3) != "REC"){

    
    echo ' <div class="input-group">

      <span class="input-group"><h4>¿Desea Realizar una Retención a esta Factura?</h4></span>

  <div class="input-group form-control Retencion">
      <input type="radio" class="opcionretencion" name="Retencion" id="si" value="1" required checked> SI

      <input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required > NO
      
        </div>
      </div>';



  }else{
    echo ' <div class="input-group">

      <span class="input-group"><h4>¿Desea Realizar una Retención a esta Factura?</h4></span>

  <div class="input-group form-control Retencion">
      
      <input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required checked> NO
      
        </div>
      </div>';

  }



?>
      
  </div>

<div class="FormularioRetencion">
     <?php 
if($gastosgenerales["Retenciones"] == "1" && substr($gastosgenerales["NAsientoRET"], 0, 3) != "REC"){
  if($Factura606["Porc_ITBIS_Retenido_606"] > 0 || $Factura606["Porc_ISR_Retenido_606"] > 0){
    
    echo'
    <div class="col-xs-6 left">
        <div class="form-group">

                   <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>';

    $Porc_ITBIS_Retenido_606 = $Factura606["Porc_ITBIS_Retenido_606"];
    switch ($Porc_ITBIS_Retenido_606) {
      case '30':
      echo'<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS30" value="30" checked>30 %<br>
<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS100" value="100">100 %<br>';
        
      break;
      case '100':
      echo'<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS30" value="30">30 %<br>
<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS100" value="100"  checked>100 %<br>';
        
      break;
      default:
      echo'<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS30" value="30">30 %<br>
<input type="radio" class="ITBISRetenido_Compras" name="ITBISRetenido_Compras" id="ITBIS100" value="100">100 %<br>';
        
      break;
    }

               

echo'<input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" value="'.$Factura606["ITBIS_Retenido_606"].'" required>
                        
                    </div>

                </div>
             </div>';

      echo'<div class="col-xs-6  right">

          <div class="form-group">

               <div class="input-group form-control">

                   <label>% ISR RETENIDO</label><br>';


 $Porc_ISR_Retenido_606 = $Factura606["Porc_ISR_Retenido_606"];

 switch ($Porc_ISR_Retenido_606) {
    case '2':
echo '<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="2" checked>2 %<br>
<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="10">10 %<br>';
    break;
    case '10':
    echo '<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="2">2 %<br>
<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="10" checked>10 %<br>';
     
    break;
   
   default:
     echo '<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="2">2 %<br>
<input type="radio" class="ISR_RETENIDO_Compras" name="ISR_RETENIDO_Compras" id="ISR2_Compras" value="10">10 %<br>';
     
    break;
 }


echo'<input type="text" class="ISR_RETENIDO_Compras" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" value="'.$Factura606["Monto_Retencion_Renta_606"].'" required><br>




<select type="text" class="form-control" id="tipo_de_seleccionretener" name="tipo_de_seleccionretener">';
        
$Extrar_Tipo_Retencion_606 = $Factura606["Extrar_Tipo_Retencion_606"];

  switch ($Extrar_Tipo_Retencion_606) {
    case '0':
    echo'<option value="0">TIPO DE SELECCION</option>
        <option value="01">01 - ALQUILERES</option>
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
        <option value="08">08 - JUEGOS TELEFONICOS</option>';
      
      break;
      case '01':
    echo'
        <option value="01">01 - ALQUILERES</option>
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
        <option value="08">08 - JUEGOS TELEFONICOS</option>';
      
      break;
       case '02':
    echo'
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="01">01 - ALQUILERES</option>
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
        <option value="08">08 - JUEGOS TELEFONICOS</option>';
      
      break;
        case '03':
    echo'
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="01">01 - ALQUILERES</option>
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
        <option value="08">08 - JUEGOS TELEFONICOS</option>';
      
      break;
      case '04':
    echo'
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="01">01 - ALQUILERES</option>
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
        <option value="08">08 - JUEGOS TELEFONICOS</option>';
      
      break;
       case '05':
    echo'
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="01">01 - ALQUILERES</option>
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
        <option value="08">08 - JUEGOS TELEFONICOS</option>';
      
      break;
      case '06':
    echo'
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="01">01 - ALQUILERES</option>
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
        <option value="08">08 - JUEGOS TELEFONICOS</option>';
      
      break;
       case '07':
    echo'
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
        <option value="01">01 - ALQUILERES</option>
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="08">08 - JUEGOS TELEFONICOS</option>';
      
      break;
        case '08':
    echo'
        <option value="08">08 - JUEGOS TELEFONICOS</option>
        <option value="01">01 - ALQUILERES</option>
        <option value="02">02 - HONORARIOS POR SERVICIOS</option>
        <option value="03">03 - OTRAS RENTAS</option>
        <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
        <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
        <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
        <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>';
        
      
      break;
    
  }

        


echo'</select>
       </div>
    </div>
</div>



';




    }else{

  }
  }else{}

    ?>
     
 
  </div>
     

                
     

              </div><!-- class="box"-->

             </div><!-- class="box-body"-->


              <div class="box-footer">
  <button type="submit" class="btn btn-warning pull-right">Modificar</button>

            </div>

          </form>
          <?php 

             

            $gastogenerales = new ControladorCompras();
            $gastogenerales -> ctrEditarcomprasgenerales();

           
         


           ?>

       

          </div><!-- class="box box-success" -->

        </div><!-- cierre class="col-lg-8" -->
<!------------------------------------------------ cierre primera secccion formulario------------>

        <div class="col-lg-5">

          <div class="box box-warning">

             <div class="box-header with-border">

            <div class="box-body">
                 <input type="hidden"  id="RncEmpresa606" name="RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
               <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
                  <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
                  <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
                   <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">

              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control input-lg" id="cuentagasto" name="cuentagasto" required>
              <option value="">Selecionar Categoria</option>
               <option value="12">CUENTAS POR COBRAR</option>
              <option value="14">INVENTARIOS</option>
              <option value="16">PROPIEDAD Y EQUIPOS</option>
               <option value="52">COSTOS POR SERVICIOS</option>
              <option value="53">COSTOS DIRECTOS</option>
               <option value="54">COSTOS INDIRECTOS</option>
               <option value="1">GASTOS ADMINISTRATIVOS</option>
                <option value="2">GASTOS OPERATIVOS</option>
                <option value="3">GASTOS NO FINANCIEROS</option>
               <option value="9">OTROS GASTOS</option>
              </select>

            </div>
             <div id="subgenerica">
              

            </div>
            <br>

               <table class="display nowrap table table-bordered table-striped tabladiariogasto" width="100%">


            <thead>
              <tr>   
              
              <th style="width:3px">Nombre</th>
              <th style="width:3px"></th>
              </tr>
            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody id="tipogasto">
              

          
             
              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>

          </div>
           </div>
         
              
 <div class="box box-warning"></div>

               <div class="box-body">

        
            <table class="display nowrap table table-bordered table-striped tabladiariogasto" width="90%">


            <thead>
              <tr>   
              <th style="width:2px">N°</th>
              <th style="width:3px">Suplidor</th>
              <th style="width:3px">NCF</th>
              <th style="width:3px">Año/mes</th>
              <th style="width:3px">Dia</th>
              <th style="width:3px">Monto</th>
              <th style="width:3px"></th>
              </tr>
            </thead>

             <tbody>

              <?php  

                if(isset($_GET["periodocompras"])){
               $periodocompras = $_GET["periodocompras"];
              
              }else{
               
               $periodocompras = $_SESSION["Anologin"];
           
           }
        $Rnc_Empresa_Compras = $_SESSION["RncEmpresaUsuario"];
                  
              
        $respuesta = ControladorCompras::ctrMostarCompras($Rnc_Empresa_Compras, $periodocompras);

              
              foreach ($respuesta as $key => $value) {
             $EXTRAERASIENTO = substr($value["NAsiento"], 0, 3);

             if($EXTRAERASIENTO == "DCG"){ 

              $NombreSuplidor = $value["Nombre_Suplidor"];

             


                echo ' <tr>
               
                <td>'.$value["NAsiento"].'</td>
                <td>'.$NombreSuplidor.'</td>
                <td>'.$value["NCF_Factura"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>
                <td>'.number_format($value["Total"],2).'</td>';

                 echo'<td>
                  <div class="btn-group">';

                 if($value["EXTRAER_NCF"] != "CP1"){ 
                  echo'<button class="btn btn-primary btn-xs copiarcompragenerales" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>';
                  }else{
                    echo'<button class="btn btn-primary btn-xs copiarcomprageneralesNo" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>';


                  }                

                  echo'</div>
                  </td>';












                echo'</tr>';
                
                }

                
            
                  }

               ?>

           
        

            </tbody>
           

            </table>

          </div>

          </div>
        
            

          </div>

        </div><!-- cierre class="col-lg-4"-->

<!------------------------------------------------ cierre segunda seccion tabla------------------------->
    </div><!-- cierre class="row" -->
  



  </section><!-- cierre section class="content" -->

</div><!-- cierre content-wrapper -->

 <!--************************************************
                      MODAL Editat USUARIO
  ******************************************************* -->
  <!-- Modal -->
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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="DCG" readonly>

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
      $editarCorrelativos -> ctreditarCorrelativosNoFiscal();
      


       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>