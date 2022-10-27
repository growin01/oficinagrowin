
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DIARIO DE GASTOS
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">gastodiario</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

        <div class="col-lg-8">
          
          <div class="box box-success">

            <div class="box-header with-border">

               <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "DDG";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


               if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }
                  $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                  $Rnc_Empresa_Master = null;
                  $Orden = "id";

                  $Empresa = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);




               ?>
               

            </div>

            <form role="form" method="post" class="formularioCuenta">

            <div class="box-body">
               <?php 

                  $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];
                  $Valor_id606 =  $_GET["id_606"];
                  $id_606  = "id";
                  $Orden = "id";
                  
                  

                  $EditarRegistro606 = Controlador606::ctrMostrar606($Rnc_Empresa_606, $id_606, $Valor_id606, $Orden);

                
                 
                   ?>



             
                <div class="box">
                  <input type="hidden"  id="RncEmpresa606" name="Editar-RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   <input type="hidden" class="form-control" id="Editar-Usuariologueado" name="Editar-UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
                   <input type="hidden" class="form-control" id="Editar_id_606" name="Editar_id_606" value="<?php echo $_GET["id_606"]?>">
                   <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
                  <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
                  <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">



                  <!--=================================================
                  ENTRADA DEL VENDEDOR =======================================================-->

                  <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="Editar-FechaFacturames_606" name="Editar-FechaFacturames_606"  value="<?php echo $EditarRegistro606["Fecha_AnoMes_606"];?>" required autofocus>

                     
                      <label>Dìa</label>
                      <input type="text" class="Fechadia" maxlength="2" id="Editar-FechaFacturadia_606" name="Editar-FechaFacturadia_606" value="<?php echo $EditarRegistro606["Fecha_Dia_606"];?>" required>


                    </div>
                   

                  </div>
                  </div>
                  <!--=================================================
                  CIERRE ENTRADA DEL VENDEDOR =======================================================-->
                   <!--=================================================
                  ENTRADA DEL CODIGO DE LA VENTA =======================================================-->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control Editar-TipoSuplidor">

                      <?php 
                      if ($EditarRegistro606["Tipo_Id_Factura_606"] == 1){
                        echo '<input type="radio" Class="Editar-Juridico" name="Editar-Tipo_Suplidor_606" id="Editar-juridico_606" value="1" required checked> Jurídico
                        <input type="radio" Class="Editar-Fisico" name="Editar-Tipo_Suplidor_606" id="Editar-fisico_606" value="2" required> Fisico';



                      } else {
                         echo '<input type="radio" Class="Editar-Juridico" name="Editar-Tipo_Suplidor_606" id="Editar-juridico_606" value="1" required > Jurídico
                        <input type="radio" Class="Editar-Fisico" name="Editar-Tipo_Suplidor_606" id="Editar-fisico_606" value="2" required checked> Fisico';


                      }



                       ?>


                   
                    </div>

                  </div>

                  </div>

                  <!--=================================================
                    ENTRADA DEL CODIGO DE LA VENTA=======================================================-->
                   <!--=================================================-->
                 
                  <div class="form-group">

                   
                  <div class="input-group ">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

                    <input type="text" class="form-control input-RNC" maxlength="11" id="Editar-Rnc_Factura_606" name="Editar-Rnc_Factura_606" value="<?php echo $EditarRegistro606["Rnc_Factura_606"];?>" required>

                  </div>

                </div>
                
                  <!--=================================================
                    ENTRADA DEL CODIGO DE LA VENTA======================================================-->
                   <!--=================================================-->


                  <div class="form-group">

                   
                  <div class="input-group form-control">

                    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                    <input type="text"  class="col-xs-8" id="Editar-Nombre_Empresa_606" name="Editar-Nombre_Empresa_606" value="<?php echo $EditarRegistro606["Nombre_Empresa_606"];?>" readonly required>
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarSuplidor">Agregar Suplidor
                    </button>

                  </div>

                </div>
                
                 <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" maxlength="11" id="Editar-NCF_606" name="Editar-NCF_606" value="<?php echo $EditarRegistro606["NCF_606"];?>" required>

                  </div>

                </div>


                <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCFMOD" maxlength="11" id="Editar-NCF_Modificado_606" name="Editar-NCF_Modificado_606" value="<?php echo $EditarRegistro606["NCF_Modificado_606"];?>">

                  </div>

                </div>
                
                  
                  
                   <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      
                        <label>Compras</label>
                        <br>

                        <input type="number"  min=0 step="any" id="Editar-Montototalbienes" name="Editar-Montototalbienes" value="<?php echo $EditarRegistro606["Monto_Bienes_606"];?>" required>


                      </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>Servicios</label>
                        <br>

                        <input type="number"  min=0 step="any" id="Editar-Montototalservicios" name="Editar-Montototalservicios" value="<?php echo $EditarRegistro606["Monto_Servicios_606"];?>" required>


                      </div>
                      

                    </div>

                    <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      <label> Monto ITBIS</label>
                      
                      <br>

                      

                        <input type="number"  min=0 step="any" id="Editar-MontoITBIS" name="Editar-MontoITBIS" value="<?php echo $EditarRegistro606["ITBIS_Factura_606"];?>" required>


                      </div>
                      
                  

                     <div class="col-xs-6" style="padding-right:0px">

                      <label>Propina Legal</label>
                      <br>

                      
                        

                        <input type="number"  min=0 step="any" id="Editar-Propinalegal" name="Editar-Propinalegal" value="<?php echo $EditarRegistro606["Monto_Propina_606"];?>" required>


                      </div>
                      

                    </div>

                    <div class="form-group">

                    
                    <div class="col-xs-6" style="padding-right:0px">

                      <label>Impuesto Selectivo</label>
                      
                      <br>

                      

                        <input type="number"  min=0 step="any" id="Editar-ImpuestoSelectivo" name="Editar-ImpuestoSelectivo" value="<?php echo $EditarRegistro606["Impuestos_Selectivo_606"];?>" required>


                      </div>
                      
                  

                     <div class="col-xs-6" style="padding-right:0px">

                      <label>OtrosImpuestos</label>
                      <br>

                      
                        

                        <input type="number"  min=0 step="any" id="Editar-OtrosImpuestos" name="Editar-OtrosImpuestos" value="<?php echo $EditarRegistro606["Otro_Impuesto_606"];?>" required>


                      </div>
                      

                    </div>
                    <br>

                    <!--*****************CHECKBOX DE PORCENTAJE********************** -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>

                    <?php 
                    if($EditarRegistro606["ITBIS_alcosto_606"] == 0){
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
                    if($EditarRegistro606["ITBIS_Proporcional_606"] == 0){
                      echo '<input type="checkbox" class="Editar-ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="Editar-ITBIS_Sujeto_a_Propocionalidad" value ="1">ITBIS Sujeto a Propocionalidad';


                    }else{

                      echo '<input type="checkbox" class="Editar-ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="Editar-ITBIS_Sujeto_a_Propocionalidad" value ="1" checked>ITBIS Sujeto a Propocionalidad';
                    }


                     ?>
                    
                    
                  </label>

                </div>
                
              </div>

              <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>TIPO DE GASTO</label><br>

                      <?php 
                      $ValorTipo_Gasto_606 = $EditarRegistro606["Extraer_Tipo_Gasto_606"]; 

                      switch ($ValorTipo_Gasto_606){
                        case "01":
                        echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" checked required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                           
                            break;

                            case "02":
                            echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required checked>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            
                            break;

                            case "03":

                            echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required checked>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            
                            break;

                            case "04":
                             echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required checked>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            
                            break;

                            case "05":

                             echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required checked>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            

                            
                            break;
                            
                            case "06":
                             echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required checked>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            
                            
                            
                            break;

                            case "07": 
                            echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required checked>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                                                        
                            
                            break;

                            case "08":
                            echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required checked>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';                             
                            
                            break;

                            case "09":
                            echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required checked>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';                             
                                                     
                            
                            break;

                            case "10":
                            echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required checked>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';                          
                            
                            break;

                            case "11":
                             echo '<input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Editar-Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required checked>11-GASTOS DE SEGUROS';                            
                           
                            break;

                      }




                       ?>
    
                    </div>

                  

                  </div>
                  </div>
                  
                  <div class="col-xs-6 right">

              <div class="form-group">

                    <div class="input-group form-control Formapago">

                      <label>FORMA DE PAGO</label><br>

                      <?php 
                      $ValorForma_De_Pago_606 = $EditarRegistro606["Extraer_Tipo_Pago_606"];                  

                  switch ($ValorForma_De_Pago_606 ){ 
                        
                        case "01":
                        echo ' <input type="radio" name="Editar-Forma_De_Pago_606" id="EFECTIVO" value="01" required checked>01-EFECTIVO
                        <br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Editar-Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            break;

                            case "02":
                            echo ' <input type="radio" name="Editar-Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required checked>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Editar-Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            break;

                            case "03":
                            echo ' <input type="radio" name="Editar-Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required checked>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Editar-Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            break;
                            
                            case "04":
                            echo ' <input type="radio" name="Editar-Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Editar-Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required checked>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            
                            break;

                            case "05":
                             echo ' <input type="radio" name="Editar-Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Editar-Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="PERMUTA" value="05" required checked>05-PERMUTA<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            break;
                            
                            case "06":
                             echo ' <input type="radio" name="Editar-Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Editar-Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required checked>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            break;

                            case "07":
                             echo ' <input type="radio" name="Editar-Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Editar-Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required checked>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Editar-Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            break;


                      }





                       ?>

                     

                   
                       
                    </div>

                  

                  </div>
                  </div>

                  <br>
                  <br>

                   <div class="col-xs-6 right">

                      <div class="form-group">

                        <div class="input-group form-control Formapago">

                          <label>TRANSCCIÓN</label><br>

                          <?php 
                          $Tipo_Transaccion_606 = $EditarRegistro606["Tipo_Transaccion_606"];                  

                  switch ($Tipo_Transaccion_606){ 
                        
                        case "1":
                        echo '<input type="radio" name="Editar-Transccion" id="Personal" value="1" checked>Personal
                            
                            <input type="radio" name="Editar-Transccion" id="Empresarial" value="2">Empresarial
                             <br>';
                            
                            break;

                            case "2":
                            echo '<input type="radio" name="Editar-Transccion" id="Personal" value="1">Personal
                            
                            <input type="radio" name="Editar-Transccion" id="Empresarial" value="2" checked>Empresarial
                             <br>';
                               break;
                              
                               case "3":
                            echo '<input type="radio" name="Editar-Transccion" id="Personal" value="1">Personal
                            
                            <input type="radio" name="Editar-Transccion" id="Empresarial" value="2">Empresarial
                             <br>';
                               break;
                              }
                      


                          ?>
                           </div>
                            
                          </div>

                        </div>
                         <div class="col-xs-12 pull-left editarbanco606">
      
<?php 

 if($EditarRegistro606["Extraer_Tipo_Pago_606"] != 04){
   echo '<div class="form-group">
     <div class="input-group form-control"> 
    <label>BANCO</label><br>

  <label class="col-xs-4">Fecha de Pago</label>
  <label class="col-xs-4">Referencia</label>
  <label class="col-xs-4">Agregar Banco</label>
  <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>

                         
<input type="text" class="col-xs-2 Fechames" maxlength="6" id="Editar-FechaPagomes606" name="Editar-FechaPagomes606" value="'.$EditarRegistro606["Fecha_Trans_AnoMes_606"].'" required>
<input type="text" class="col-xs-2 Fechadia" id="Editar-FechaPagodia606" name="Editar-FechaPagodia606" value="'.$EditarRegistro606["Fecha_Trans_Dia_606"].'" required><br>

<input type="text" class="col-xs-3" maxlength="6" id="Editar-Referencia" name="Editar-Referencia" value="'.$EditarRegistro606["Referencia_606"].'" required>
<div class="col-xs-5">';


   $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];
   $id_banco = $EditarRegistro606["Banco_606"];

   $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

   if($id_banco != "" && $id_banco != 0){ 
   foreach ($Banco as $key => $value){

     if($value["id"] == $id_banco){ 


     echo '<select type="text" class="form-control form-control col-xs-5" id="Editar-agregarBanco" name="Editar-agregarBanco">
         <option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

       }

    }
   foreach ($Banco as $key => $value){

     if($value["id"] != $id_banco){ 


     echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';
    

       }

    }
  
  } 
  else{
    echo '
<select type="text" class="form-control col-xs-5" id="Editar-agregarBanco" name="Editar-agregarBanco">
         <option value="">Seleccionar banco</option>';
        
  foreach ($Banco as $key => $value){

     echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';
    

       }

    }
  
   



   
   echo'
   </select>
   </div>

   </div>
                            
                      </div>';
                       } else{

                        echo'<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="Editar-FechaPagomes606" name="Editar-FechaPagomes606" value="'.$EditarRegistro606["Fecha_Trans_AnoMes_606"].'" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="Editar-FechaPagodia606" name="Editar-FechaPagodia606" value="'.$EditarRegistro606["Fecha_Trans_Dia_606"].'" required readonly><br>
        <input type="hidden" class="col-xs-3" maxlength="6" id="Editar-Referencia" name="Editar-Referencia" placeholder="Referencia del Pago" value="NO APLICA">
        <input type="hidden" class="form-control col-xs-12" id="Editar-agregarBanco" name="Editar-agregarBanco" value="" required>';


                       }

                            ?>
                            
          


    </div>
                              
                         <div class="col-xs-12 left">
                      <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      
                     
                      <input type="text" class="form-control" id="Editar-Descripcion" name="Editar-Descripcion" value="<?php echo $EditarRegistro606["Descripcion_606"];?>" required>

                     </div>

                  
                     

                 

                <div class="form-group col-xs-6">
                        <br>

                   
                      <label><h3>Distribución Cuentas/Proyectos</h3></label>

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

                      $Rnc_Empresa_Diario = $_SESSION["RncEmpresaUsuario"];
                      $tipocod = "DDG";


                      $codigo = ControladorDiario::ctrCodigoAsientoDiario($Rnc_Empresa_Diario, $tipocod);
               
                        if(!$codigo){

                               echo '<script>
                          swal({

                            type: "error",
                            title: "¡DEBE INICIALIZAR EL CODIGO DE ASIENTO DIARIO EN EL LAPIZ COLOR ANARANJADO QUE ESTA EN LA PARTE SUPERIOR DEL FORMULARIO!",
                            showConfirmButton: false,
                            timer: 8000
                            });

                          </script>';   



                      } else{


                       foreach ($codigo as $key => $value) {

                            
                          }

                      $N = $value["NCF_Cons"]+1;
                      $NAsiento = "DDG".$N;

                      

                      echo ' <input type="hidden" class="form-control" id="CodAsiento" name="CodAsiento" value="'.$N.'" readonly>
                      <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="'.$NAsiento.'" readonly>';
                      }
                    

                      




                       ?>

                     

                    </div>
                   

                  </div>
                     

                    </div>
                   

                  </div>

                
         
          
                   <div class="form-group row nuevaCuenta">
                    <?php 

                      if (isset($_SESSION["listaCuentas"])){

                        $listaCuentas = json_decode($_SESSION["listaCuentas"], true);

                        $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                        $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);
                        
                        foreach ($listaCuentas as $key => $value){

                          $plancuenta = $value["idgrupo"].'.'.$value["idcategoria"].'.'.$value["idgenerica"].'.'.$value["idcuenta"];
                echo '<div class="row" style="padding:5px 15px">
                        <div class="col-xs-2" style="padding-right:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idcuenta><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
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
                        <div class="col-xs-2" style="padding-right:0px">
                      
                      <div input-group">
                        
                        <input type="text" class="form-control debito"  name="debito" value="'.$value["debito"].'" required>
                        
                      </div>
                      </div>
                      <div class="col-xs-2" style="padding-left:0px">
                      
                      <div input-group">
                        
                        <input type="text" class="form-control credito" name="credito" value="'.$value["credito"].'" required>
                        
                      </div>
                      </div>
                      <div class="col-xs-3" style="padding-left:0px">
                      
                      <div input-group">
                        
                         <select type="text" class="form-control proyecto" id="proyecto" name="proyecto" required>
                          <option value="">Proyecto</option>';


                         foreach ($respuesta as $key => $value) {
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
                         }
                               

                               

                           echo'</select>
                           </div>
                      </div>

                      </div>';
                          
                        }


                      } else {}
                     ?>

                   </div>

                   <input class = "col-xs-12" type="hidden" id="listaCuentas" name="listaCuentas">

                  

                      <div class="col-xs-8 pull-right">
                        
                              <div class="input-group">

                        
                            <label>TOTALES</label> 
                        <input class="col-xs-4 pull-right totalcreditovi" type="text" name="totalcreditovi" id="totalcreditovi" placeholder="Credito" required readonly>
                        <input class="col-xs-4 pull-right totaldebitovi" type="text" name="totaldebitovi" id="totaldebitovi" placeholder="Debito" required readonly>
                         <input class="col-xs-4 pull-right totalcredito" type="hidden" name="totalcredito" id="totalcredito" placeholder="Credito" required readonly>
                        <input class="col-xs-4 pull-right totaldebito" type="hidden" name="totaldebito" id="totaldebito" placeholder="Debito" required readonly>


                        
                          

                      </div>
                    

                  

                   </div>

                         <!-----------------------------------------
                               METODO DE PAGO
                    ----------------------------------------------->
             
              
                </div>             
              

            </div>


            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Modificar</button>

              
            </div>

          </form>
          <?php 

            $Editarlibrodiario = new ControladorDiario();
            $Editarlibrodiario -> ctrAsignargastodiario();




           ?>

       
          </div>

          
        </div>

         <!--=================================================
            LA TABLA  DE PRODUCTO

        =======================================================-->

        <div class="col-lg-4">

          <div class="box box-warning"></div>

          <div class="box-header with-border">

            <div class="box-body">

              
           <table class="display nowrap table table-bordered table-striped tabladiario606">
                
                <thead>

                  <tr>

                    <th style="width: 5px">#</th>
                    <th>RNC</th>
                    <th>NCF</th>
                    <th style="width: 10px">Año/Mes</th>
                    <th style="width: 5px">Dia</th>
                    <th>Total</th>
                    <th>ITBIS</th>
                    <th></th>
                    
                  </tr>
                  
                </thead>

                <tbody>

                   <?php 
                    $id_606 = null;
                    $Valor_id606 = null;
                    $Orden = "id";



                    $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                    $reporte606 = Controlador606::ctrMostrar606($Rnc_Empresa_606, $id_606, $Valor_id606, $Orden);

               foreach ($reporte606 as $key => $value){
                echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["Rnc_Factura_606"].'</td>
                            <td>'.$value["NCF_606"].'</td>
                            <td>'.$value["Fecha_AnoMes_606"].'</td>
                            <td>'.$value["Fecha_Dia_606"].'</td>
                            <td>'.number_format($value["Total_Monto_Factura_606"], 2).'</td>
                            <td>'.number_format($value["ITBIS_Factura_606"], 2).'</td>
                            <td>
                              <div class="btn-group">
                                <button class="btn btn-warning btn-xs btnRetener606" id_606="'.$value["id"].'" Rnc_Empresa_606="'.$_SESSION["RncEmpresaUsuario"].'"data-toggle="modal" data-target="#modalRetener606" ><i class="fa fa-university"></i></button>
                                
                              </div>
                              

                            </td>             

                        </tr>';



               }
               ?>

                  
                 
                  
                  
                  


                </tbody>


              </table>

          <div class="box box-warning"></div>
              <table class="display nowrap table table-bordered table-striped tabladiariogasto" width="100%">


            <thead>
              <tr>   
              <th style="width:2px">N° Cuenta</th>
              <th style="width:3px">Nombre</th>
              <th style="width:3px"></th>
              </tr>
            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>
              
              <?php


              $tabla = "grupo_empresa"; 
              
              
              $respuesta = ControladorContabilidad::ctrgrupoempresas($tabla);

             
            for ($i=1; $i <=7; $i++) {
                  
                switch ($i) {
                  case '1':
                    echo '<tr>
                        <td>1</td>
                        <td>ACTIVOS</td>
                         <td></td> 
                        </tr>';
                        break;
                  case '2':
                    echo '<tr>
                        <td>2</td>
                        <td>PASIVO</td>
                         <td></td> 
                        </tr>';
                        break;
                    case '3':
                    echo '<tr>
                        <td>3</td>
                        <td>PATRIMONIO</td>
                         <td></td> 
                        </tr>';
                        break;
                      case '4':
                    echo '<tr>
                        <td>4</td>
                        <td>INGRESOS</td>
                         <td></td> 
                        </tr>';
                        break;
                      case '5':
                    echo '<tr>
                        <td>5</td>
                        <td>COSTOS</td>
                        <td></td> 
                        </tr>';
                        break;
                      case '6':
                    echo '<tr>
                        <td>6</td>
                        <td>GASTOS</td> 
                        <td></td>
                        </tr>';
                        break;

              
                  }/*cierre swich*/


                 
                    foreach ($respuesta as $key => $value) {

                      if($value["id_grupo"] == $i){
                         echo '<tr>
                        <td>'.$i.'.'.$value["id_categoria"].'</td>
                        <td>'.$value["Nombre_Categoria"].'</td>
                        <td></td>
                        </tr>';

                        $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                        $grupo = $i;
                        $categorias = $value["id_categoria"];

                    $generica = ControladorContabilidad::ctrplandecuenta($Rnc_Empresa_Cuentas, $grupo, $categorias);

                      foreach ($generica  as $key => $gene){
                         echo '<tr>
                        <td>'.$i.'.'.$value["id_categoria"].'.'.$gene["id_generica"].'</td>
                        <td>'.$gene["Nombre_Cuenta"].'</td>
                        <td></td>  
                        </tr>';

                      $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                      $id_grupo = $i;
                      $id_categoria = $value["id_categoria"];
                      $id_generica = $gene["id_generica"];
                      $subgenerica = ControladorContabilidad::ctrplandesubcuenta($Rnc_Empresa_Cuentas, $id_grupo, $id_categoria, $id_generica);

                      foreach ($subgenerica  as $key => $subgene){
                         echo '<tr>
                        <td>'.$i.'.'.$value["id_categoria"].'.'.$gene["id_generica"].'.'.$subgene["id_subgenerica"].'</td>
                        <td>'.$subgene["Nombre_subCuenta"].'</td>
                        <td><button class="btn btn-primary btn-xs agregarCuenta recuperarCuenta" idgrupo="'.$i.'" idcategoria="'.$value["id_categoria"].'" idgenerica="'.$gene["id_generica"].'" idcuenta="'.$subgene["id_subgenerica"].'" NombreCuenta="'.$subgene["Nombre_subCuenta"].'" >+</button></td>
                          

                        </tr>';
                         
                         }


                      
                       }/*CIERRE FOR GNERICA*/
                      
                      }/*cierre if*/





                  }/*cierre foreach*/



                    
                  
                  
              }/*cierre for $i*/
              
             
              
               ?>

              

             
              <!--***************** CIERRE FILA 1  TABLA  USUARIO********************************* -->

              

              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
              

        
        

            </div>
            

          </div>

          


        </div>
        

      </div>

      
    </section>


   </div>

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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="DDG" readonly>

                  </div>

                </div>


          
          <!--*****************cierra input de RNC de EMPRESA USUARIO************************* -->
           <div class="form-group col-xs-6">
               <label>Correlativo de Factura No Fiscal</label>


                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" id="NCF_Cons" name="NCF_Cons" maxlength="10">

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

