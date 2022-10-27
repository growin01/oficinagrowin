
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
<h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-file-text-o"></i>
       EDITAR REGISTRO 606
        
    </h1>
     
   
   <a href="registro-606" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Nuevo</a>

  <a href="reporte-606" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Reporte 606</a>
   <a href="cuadre-itbis" class="btn btn-success"><i class="fa fa-pie-chart" style="padding-right:5px"></i>Cuadre Itbis</a>

    <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga606"><i class="fa fa-file-text-o" style="padding-right:5px"></i>Descarga de TXT 606</button>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Editar Registro 606</li>
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
            


         
            </div>

            <form role="form" method="post" class="Registro606">

            <div class="box-body">

                <?php 

                  $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];
                  $Valor_id606 =  $_GET["id_606"];
                  $id_606  = "id";
                  $Orden = "id";
                  
                  

                  $EditarRegistro606 = Controlador606::ctrMostrar606($Rnc_Empresa_606, $id_606, $Valor_id606, $Orden);

                 
                   ?>

             
                <div class="box">
<input type="hidden"  id="RncEmpresa606" name="RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
<input type="hidden" id=NombreEmpresa606 value="<?php echo $_SESSION["NombreEmpresa"];?>">
<input type="hidden" id=Tipo_Id_Empresa value="<?php echo $_SESSION["Tipo_Id_Empresa"];?>">
<input type="hidden" class="form-control" id="Editar_id_606" name="Editar_id_606" value="<?php echo $_GET["id_606"]?>">
<input type="hidden" class="form-control" id="modulo" name="modulo" value="<?php echo $_GET["modulo"]?>">


<br>



<div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

    <input type="text" class="form-control Fechames" maxlength="6" id="FechaFacturames_606" name="FechaFacturames_606" value="<?php echo $EditarRegistro606["Fecha_AnoMes_606"];?>"  required >
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
   <input type="text" class="form-control Fechadia" maxlength="2" id="FechaFacturadia_606" name="FechaFacturadia_606" value="<?php echo $EditarRegistro606["Fecha_Dia_606"];?>" required>
 
 </div>  
  
  
</div>



<div class="col-lg-12"></div>
<br>
<div class="col-xs-3" style="padding-right:0px">
                     

        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    
      <?php  

                         
$NCF606 = $EditarRegistro606["Extraer_NCF_606"];

switch ($NCF606) {

case 'B01':
    echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'B03': 

echo '<select class="form-control"  id="NCF606" name="NCF606" required> 
              <option value="B03">B03</option>
              <option value="B01">B01</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'B04':
 echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="B04">B04</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'B11':
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="B11">B11</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>'; 
break;
case 'B13':
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="B13">B13</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>'; 
break;
case 'B14': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="B14">B14</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>              
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'E31': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="E31">E31</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'E33': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="E33">E33</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>              
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'E34': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="E34">E34</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'E41': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="E41">E41</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'E43': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="E43">E43</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>              
              <option value="E44">E44</option>
        
        </select>';
break;
case 'E44': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="E44">E44</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              
        
        </select>';
break; 

}


?>          
                     
          </div>


</div>
<?php  
$numero = substr($EditarRegistro606["NCF_606"], 3);

?>
   <div class="col-xs-4" style="padding-left:0px">
                   
    <div class="input-group">
      

                  <input type="text" maxlength="10" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value="<?php echo $numero;?>" required>

                   
                  </div>

                </div>

                <div class="form-group col-lg-5">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <?php 
                   $extraerNCF = $EditarRegistro606["Extraer_NCF_606"];

                   switch ($extraerNCF) {
                     case 'B04':
                       echo'<input type="text" class="form-control input-NCFMOD" maxlength="11" id="NCF_Modificado_606" name="NCF_Modificado_606" value="'.$EditarRegistro606["NCF_Modificado_606"].'" required>';
                      break;
                      case 'B03':
                       echo'<input type="text" class="form-control input-NCFMOD" maxlength="11" id="NCF_Modificado_606" name="NCF_Modificado_606" value="'.$EditarRegistro606["NCF_Modificado_606"].'" required>';
                      break;
                       case 'E34':
                       echo'<input type="text" class="form-control input-NCFMOD" maxlength="13" id="NCF_Modificado_606" name="NCF_Modificado_606" value="'.$EditarRegistro606["NCF_Modificado_606"].';" required>';
                      break;
                      case 'E33':
                       echo'<input type="text" class="form-control input-NCFMOD" maxlength="13" id="NCF_Modificado_606" name="NCF_Modificado_606" value="'.$EditarRegistro606["NCF_Modificado_606"].'" required>';
                      break;
                     
                     default:
                        echo'<input type="text" class="form-control input-NCFMOD" maxlength="11" id="NCF_Modificado_606" name="NCF_Modificado_606" value="'.$EditarRegistro606["NCF_Modificado_606"].'">';
                       break;
                   }

                     ?>

                   

                  </div>

                </div>
                

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidor">

                      <?php 
                      if ($EditarRegistro606["Tipo_Id_Factura_606"] == 1){
                        echo '<input type="radio" Class="Juridico" name="Tipo_Suplidor_606" id="juridico_606" value="1" required checked> Jurídico
                        <input type="radio" Class="Fisico" name="Tipo_Suplidor_606" id="fisico_606" value="2" required> Fisico';



                      } else {
                         echo '<input type="radio" Class="Juridico" name="Tipo_Suplidor_606" id="juridico_606" value="1" required > Jurídico
                        <input type="radio" Class="Fisico" name="Tipo_Suplidor_606" id="fisico_606" value="2" required checked> Fisico';


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

                    <input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura_606" name="Rnc_Factura_606" value="<?php echo $EditarRegistro606["Rnc_Factura_606"];?>" required>

                  </div>

                </div>
                
 
                  

                  <div class="form-group">

                    
                  <div class="input-group form-control col-xs-6">

                   <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                    <input type="text"  class="form-control" id="Nombre_Empresa_606" name="Nombre_Empresa_606" value="<?php echo $EditarRegistro606["Nombre_Empresa_606"];?>" readonly>
                 
                  
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarSuplidor">Agregar Suplidor
                    </button>

                  </div>

                </div>
             
 <div class="col-xs-12">  

  <div class="input-group form-control">
     <label class="col-xs-12" style="text-align: center;">Calculadora Total Factura - ITBIS</label>

<div class="col-xs-3">
            <label class="pull-right">Total Factura</label>

        </div>

    <div class="form-group col-xs-3">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="operador1" name="operador1" placeholder="0000" value="0" required>

               
                        
              </div>
      </div>
      <div class="col-xs-1">
            <label>ITBIS </label>

        </div>

      <div class="form-group col-xs-3">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-minus-square-o"></i></span>


                <input type="text" class="form-control" id="operador2" name="operador2" placeholder="0000" value="0" required>

               
                        
              </div>

      </div>
 </div>
 </div>                 
                   <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      
                        <label>Compras</label>
                        <br>

                        <input class="form-control" type="text"  min=0 step="any" id="Montototalbienes" name="Montototalbienes" value="<?php echo $EditarRegistro606["Monto_Bienes_606"];?>" required>


                      </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>Servicios</label>
                        <br>

                        <input class="form-control" type="text"  min=0 step="any" id="Montototalservicios" name="Montototalservicios" value="<?php echo $EditarRegistro606["Monto_Servicios_606"];?>" required>


                      </div>
                      

                    </div>

                    <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      <label> Monto ITBIS</label>
                      
                      <br>

                      

                        <input class="form-control" type="text"  min=0 step="any" id="MontoITBIS" name="MontoITBIS" value="<?php echo $EditarRegistro606["ITBIS_Factura_606"];?>" required>


                      </div>
                      
                  

                     <div class="col-xs-6" style="padding-right:0px">

                      <label>Propina Legal</label>
                      <br>

                      
                        

                        <input class="form-control" type="text"  min=0 step="any" id="Propinalegal" name="Propinalegal" value="<?php echo $EditarRegistro606["Monto_Propina_606"];?>" required>


                      </div>
                      

                    </div>

                    <div class="form-group">

                    
                    <div class="col-xs-6" style="padding-right:0px">

                      <label>Impuesto Selectivo</label>
                      
                      <br>

                      

                        <input class="form-control" type="text"  min=0 step="any" id="ImpuestoSelectivo" name="ImpuestoSelectivo" value="<?php echo $EditarRegistro606["Impuestos_Selectivo_606"];?>" required>


                      </div>
                      
                  

                     <div class="col-xs-6" style="padding-right:0px">

                      <label>OtrosImpuestos</label>
                      <br>

                      
                        

                        <input class="form-control" type="text"  min=0 step="any" id="OtrosImpuestos" name="OtrosImpuestos" value="<?php echo $EditarRegistro606["Otro_Impuesto_606"];?>" required>


                      </div>
                      

                    </div>
                    <br>
                    <div class="col-xs-12"> <br> </div>
<div class="col-xs-6">
            <label class="pull-right">Total Factura =</label>

        </div>
<?php 

$TotalFactura = $EditarRegistro606["Monto_Servicios_606"] + $EditarRegistro606["Monto_Bienes_606"] +$EditarRegistro606["ITBIS_Factura_606"] + $EditarRegistro606["Impuestos_Selectivo_606"] + $EditarRegistro606["Otro_Impuesto_606"] + $EditarRegistro606["Monto_Propina_606"];
$TotalFacturavi = number_format($TotalFactura, 2);
 ?>
<div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalFacturavi" name="TotalFacturavi" placeholder="0000" value="<?php echo $TotalFacturavi;?>" required readonly>

               
                        
              </div>
      </div>
<br>
                    <!--*****************CHECKBOX DE PORCENTAJE********************** -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>

                    <?php 
                    if($EditarRegistro606["ITBIS_alcosto_606"] == 0){
                      echo ' <input type="checkbox" class="ITBIS_LLEVADO_A_COSTO" id="ITBIS_LLEVADO_A_COSTO" name="ITBIS_LLEVADO_A_COSTO" value ="1">ITBIS LLEVADO A COSTO';


                    }else{

                      echo ' <input type="checkbox" class="ITBIS_LLEVADO_A_COSTO" id="ITBIS_LLEVADO_A_COSTO" name="ITBIS_LLEVADO_A_COSTO" value ="1" checked>ITBIS LLEVADO A COSTO';
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
                      echo '<input type="checkbox" class="ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="ITBIS_Sujeto_a_Propocionalidad" value ="1">ITBIS Sujeto a Propocionalidad';


                    }else{

                      echo '<input type="checkbox" class="ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="ITBIS_Sujeto_a_Propocionalidad" value ="1" checked>ITBIS Sujeto a Propocionalidad';
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
                        echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" checked required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                           
                            break;

                            case "02":
                            echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required checked>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            
                            break;

                            case "03":

                            echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required checked>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            
                            break;

                            case "04":
                             echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required checked>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            
                            break;

                            case "05":

                             echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required checked>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            

                            
                            break;
                            
                            case "06":
                             echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required checked>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                            
                            
                            
                            break;

                            case "07": 
                            echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required checked>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                                                        
                            
                            break;

                            case "08":
                            echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required checked>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';                             
                            
                            break;

                            case "09":
                            echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required checked>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';                             
                                                     
                            
                            break;

                            case "10":
                            echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required checked>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';                          
                            
                            break;

                            case "11":
                             echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01"  required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required >03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACIÓN" value="05" required>05-GASTOS DE REPRESENTACIÓN<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required checked>11-GASTOS DE SEGUROS';                            
                           
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
                        echo ' <input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required checked>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
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
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
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
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
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
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            
                            break;

                            case "05":
                             echo ' <input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required checked>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            break;
                            
                            case "06":
                             echo ' <input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required checked>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
                        ';
                            
                            break;

                            case "07":
                             echo ' <input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required >01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required checked>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>
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
                        echo '<input type="radio" name="Transaccion_606" id="Personal" value="1" checked>Personal
                            
                            <input type="radio" name="Transaccion_606" id="Empresarial" value="2">Empresarial
                             <br>';
                            
                            break;

                            case "2":
                            echo '<input type="radio" name="Transaccion_606" id="Personal" value="1">Personal
                            
                            <input type="radio" name="Transaccion_606" id="Empresarial" value="2" checked>Empresarial
                             <br>';
                               break;
                              
                               case "3":
                            echo '<input type="radio" name="Transaccion_606" id="Personal" value="1">Personal
                            
                            <input type="radio" name="Transaccion_606" id="Empresarial" value="2">Empresarial
                             <br>';
                               break;
                              }
                      


                          ?>
                       
                            
                            
                            <label>Fecha de Pago</label><br>

                            <input type="text" class="col-xs-6 Fechames" maxlength="6" id="Editar-FechaPagomes606" name="FechaPagomes606" value="<?php echo $EditarRegistro606["Fecha_Trans_AnoMes_606"];?>">
                            <input type="text" class="col-xs-6 Fechadia" id="FechaPagodia606" name="FechaPagodia606" value="<?php echo $EditarRegistro606["Fecha_Trans_Dia_606"];?>"><br>
                            <label>Referecnia</label><br>
                            <input type="text" class="col-xs-12"  id="Referencia" name="Referencia" value="<?php echo $EditarRegistro606["Referencia_606"];?>">
                            <br>
                            <select type="text" class="form-control" id="agregarBanco" name="agregarBanco" >
                              <option value="">Seleccionar Banco</option>
                               <option value="1">Banco</option>

                                <?php 

                                 //$Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];

                                //$clientes = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);

                                 //foreach ($clientes as $key => $value){

                                  //echo '<option value="'.$value["id"].'">'.$value["Nombre_Cliente"].'</option>';



                                 //}




                                  ?>
                            </select>



                            
                          </div>
                            
                      </div>
                            
                    </div>
                     <div class = "col-xs-12"></div>

<div class="form-group col-xs-12">

      <div class="input-group">

      <span class="input-group"><h4>¿Desea Realizar una Retención a esta Factura?</h4></span>


      
          <div class="input-group form-control Retencion">
            <?php 
            if( $EditarRegistro606["Porc_ITBIS_Retenido_606"] > 0 ||  $EditarRegistro606["Porc_ISR_Retenido_606"] > 0){
echo'<input type="radio" class="opcionretencion" name="Retencion" id="si" value="1" required checked> SI

    <input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required> NO';



            }else{
  echo'<input type="radio" class="opcionretencion" name="Retencion" id="si" value="1" required> SI

    <input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required checked> NO';




            }



             ?>
     
      
          </div>
          
     </div>

  </div>

<div class="FormularioRetencion">
     <?php 
  if( $EditarRegistro606["Porc_ITBIS_Retenido_606"] > 0 ||  $EditarRegistro606["Porc_ISR_Retenido_606"] > 0){
    
    echo'
    <div class="col-xs-6 left">
        <div class="form-group">

                   <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>';

    $Porc_ITBIS_Retenido_606 =  $EditarRegistro606["Porc_ITBIS_Retenido_606"];
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

               

echo'<input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" value="'. $EditarRegistro606["ITBIS_Retenido_606"].'" required>
                        
                    </div>

                </div>
             </div>';

      echo'<div class="col-xs-6  right">

          <div class="form-group">

               <div class="input-group form-control">

                   <label>% ISR RETENIDO</label><br>';


 $Porc_ISR_Retenido_606 =  $EditarRegistro606["Porc_ISR_Retenido_606"];

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


echo'<input type="text" class="ISR_RETENIDO_Compras" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" value="'. $EditarRegistro606["Monto_Retencion_Renta_606"].'" required><br>




<select type="text" class="form-control" id="tipo_de_seleccionretener" name="tipo_de_seleccionretener">';
        
$Extrar_Tipo_Retencion_606 =  $EditarRegistro606["Extrar_Tipo_Retencion_606"];

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

    ?>
     
 
  </div>
     


                     <div class="col-xs-12 left">
                      <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      
                     
                      <input type="text" class="form-control" id="Descripcion" name="Editar-Descripcion" value="<?php echo $EditarRegistro606["Descripcion_606"];?>">

                     </div>
                     

                    </div>
                   

                  </div>
                  

            <div class="box-footer">
<button type="submit" class="btn btn-warning pull-right">Modificar 606</button>

                     
            </div>
          
          </div>
          <?php 

          $EditarRegistro606 = new Controlador606();
          $EditarRegistro606 -> ctrEditar606();



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
              $Orden = "id";

              if(isset($_GET["periodoreporte606"])){
               $periodoreporte606 = $_GET["periodoreporte606"];
              }else{
               $periodoreporte606 = $_SESSION["Anologin"];

               }
              $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

              $reporte606 = Controlador606::ctrMostrarReporte606($Rnc_Empresa_606, $Orden, $periodoreporte606);
               foreach ($reporte606 as $key => $value){
                echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["Rnc_Factura_606"].'</td>
                            <td>'.$value["NCF_606"].'</td>
                            <td>'.$value["Fecha_AnoMes_606"].'</td>
                            <td>'.$value["Fecha_Dia_606"].'</td>
                            <td>'.number_format($value["Total_Monto_Factura_606"], 2).'</td>
                            <td>'.number_format($value["ITBIS_Factura_606"], 2).'</td>
                            <td>'.$value["Forma_Pago_606"].'</td>
                           
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
              

            </div>
            

          </div>  


        </div>     

      </div>

      
    </section>


   </div>
   <!--******************************************************

                  MODAL AGREGAR SUPLIDORES
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarSuplidor" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Suplidor</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="hidden" class="form-control input-lg" id="RncEmpresasuplidor" name="RncEmpresasuplidor" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
          <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              
                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidor">

                   
                        <input type="radio" Class="Juridico" name="Tipo_Suplidor" id="juridico" value="1" required> Jurídico

                    
                    
                        <input type="radio" Class="Fisico" name="Tipo_Suplidor" id="fisico" value="2" required> Fisico

                   
                    </div>
                    
            </div>

          </div>

           <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text"   class="form-control input-RNC" maxlength="11" id="nuevoDocumentoIdsuplidor" name="nuevoDocumentoIdsuplidor" placeholder="Ingresar RNC o Cedula del Suplicor" required>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoSuplidor" name="nuevoSuplidor" placeholder="Ingresar Nombre Completo del Suplidors" required readonly>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

           <!--*****************input de EMAIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-lg" name="nuevoEmailSuplidor" placeholder="Ingresar email">

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
            <!--*****************input de Telefocno********************** -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              
             
              <input type="text" class="form-control input-lg" name="nuevoTelefonoSuplidor" placeholder="Ingresar Teléfono" data-inputmask="'mask': '(999) 999-9999'" data-mask required>


            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDireccionSuplidor" placeholder="Ingresar Dirección Suplidor">

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->
          
        </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Suplidor</button>

      </div>

     <?php 

        $crearSuplidor = new ControladorSuplidores();
        $crearSuplidor -> ctrCrearSuplidor();

       ?>
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR SUPLIDOR
  ******************************************************* -->

  <!--******************************************************

                  MODAL RETENER 606
  ******************************************************* -->
  <!-- Modal -->
<div id="modalRetener606" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Retener 606</h4>
      
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

                   

                    <input type="hidden" class="form-control" maxlength="11" id="id_606_Retener" name="id_606_Retener"required readonly>

                  </div>

                </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text"   class="form-control input-RNC" maxlength="11" id="Rnc_Retener" name="Rnc_Retener" value = "" required readonly>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

           <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" maxlength="11" id="NCF_606_Retener" name="NCF_606_Retener" required readonly>

                  </div>

                </div>

                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames_606_Retener" name="FechaFacturames_606" required readonly>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia_606_Retener" name="FechaFacturadia_606_Retener" required readonly>


                    </div>
                   

                  </div>
                  </div>

                   <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      
                        <label>MONTO FACTURADO SIN ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoFacturadoRetener" name="MontoFacturadoRetener" required readonly>


                      </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>MONTO ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoITBIS_Retener" name="MontoITBIS_Retener" required readonly>


                      </div>
                      

                    </div>

                    <label> Fecha de Retencion</label>
                    <br>




                    <div class="form-group">


                    <div class="input-group col-xs-12">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control FechaRetencion">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaRetenecionmes_606" name="FechaRetenecionmes_606" required>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaReteneciondia_606" name="FechaReteneciondia_606" required>


                    </div>
                   

                  </div>
                  </div>

                  <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>
                   
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS30" value="30">30 %<br>
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS75" value="75">75 %<br>
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS100" value="100">100 %<br>
                        <input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido">
                        
                    </div>

                  

                  </div>
                  </div>

                  <div class="col-xs-6  right">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ISR RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ISR_RETENIDO" id="ISR2" value="2">2 %
                        <br>
                        <input type="radio" name="ISR_RETENIDO" id="ISR10" value="10">10 %<br>
                        
                        <input type="text" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido">
                        <br>
                          <select type="text" class="form-control" id="tipo_de_seleccionretener" name="tipo_de_seleccionretener">
                              <option value="0">TIPO DE SELECCION</option>
                              <option value="1">01 - ALQUILERES</option>
                              <option value="2">02 - HONORARIOS POR SERVICIOS</option>
                              <option value="3">03 - OTRAS RENTAS</option>
                              <option value="4">04 - OTRAS RENTAS (Rentas Presuntas)</option>
                              <option value="5">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
                              <option value="6">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
                              <option value="7">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
                              <option value="8">08 - JUEGOS TELEFONICOS</option>


                         </select>


                        
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

        $crearRetencion606 = new Controlador606();
        $crearRetencion606 -> ctrAgregarretencion606();

       ?>
     
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