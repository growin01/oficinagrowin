
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-3" style="font-size: 30px"><i class="glyphicon glyphicon-book"></i>
        DIARIO DE GASTOS
        
      </h1>

   <a href="gastodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Nuevo</a>

  <a href="ingresodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ingreso</a>
   <a href="ajustediario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Ajuste</a>

   <a href="libromayor" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Libro Mayor</a>
   

  
      
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
               <div class="box">
<input type="hidden"  id="RncEmpresa606" name="RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden" id=NombreEmpresa606 value="<?php echo $_SESSION["NombreEmpresa"];?>">
<input type="hidden" id=Tipo_Id_Empresa value="<?php echo $_SESSION["Tipo_Id_Empresa"];?>">
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
<input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
<input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
<input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
                
<div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

    <input type="text" class="form-control Fechames" maxlength="6" id="FechaFacturames_606" name="FechaFacturames_606" value="<?php if (isset($_SESSION['FechaFacturames606'])){ echo $_SESSION['FechaFacturames606'];}?>" placeholder="A??o/Mes Ejemplo 202001" required autofocus>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
   <input type="text" class="form-control Fechadia" maxlength="2" id="FechaFacturadia_606" name="FechaFacturadia_606" value="<?php if (isset($_SESSION['FechaFacturadia_606'])){ echo $_SESSION['FechaFacturadia_606'];}?>" placeholder="D??a Ejemplo 01" required>
 
 </div>  
  
  
</div>
<div class="col-lg-12"></div>
<br>
<div class="col-xs-3" style="padding-right:0px">
                     

        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    
      <?php  
if(isset($_SESSION["NCF606"])){
                         
$NCF606 = $_SESSION["NCF606"];

switch ($NCF606) {

case 'B01':
    echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>              
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';
break;
case 'B15': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="B15">B15</option>
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
case 'E31': 
echo '<select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="E31">E31</option>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
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
              <option value="B15">B15</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              
        
        </select>';
break; 
}
}else{
echo ' <select class="form-control"  id="NCF606" name="NCF606" required>
              <option value="B01">B01</option>
              <option value="B03">B03</option>
              <option value="B04">B04</option>
              <option value="B11">B11</option>
              <option value="B13">B13</option>
              <option value="B14">B14</option>
              <option value="B15">B15</option>
              <option value="E31">E31</option>
              <option value="E33">E33</option>
              <option value="E34">E34</option>
              <option value="E41">E41</option>
              <option value="E43">E43</option>
              <option value="E44">E44</option>
        
        </select>';


}

?>          
                     
          </div>


</div>
<div class="col-xs-4" style="padding-left: 0px">
                   
    <div class="input-group">
      
<?php 
if(isset($_SESSION["error"])){ 
      
if(isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "B13"){

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='. $_SESSION['CodigoNCF606'].' required readonly>';

}elseif (isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "B11"){

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='.$_SESSION['CodigoNCF606'].' required readonly>';

}elseif(isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "E33"){

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='. $_SESSION['CodigoNCF606'].' required readonly>';

}elseif (isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "E41"){

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='.$_SESSION['CodigoNCF606'].' required readonly>';

}
else {
echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='.$_SESSION['CodigoNCF606'].' required>';

 }

}/*error*/
else{
  if(isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "B13"){

  $RncEmpresaVentas = $_SESSION["RncEmpresaUsuario"];
  $NCFFactura = $_SESSION["NCF606"];

$respuesta = ControladorCorrelativos::ctrCorrelativosFac($RncEmpresaVentas, $NCFFactura);

$codigo = $respuesta["NCF_Cons"];
$codigoNCF = $codigo + 1;
$length = 8;
$string = substr(str_repeat(0, $length).$codigoNCF, - $length);

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='.$string.' required readonly>';

}elseif (isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "B11"){

  $RncEmpresaVentas = $_SESSION["RncEmpresaUsuario"];
  $NCFFactura = $_SESSION["NCF606"];

$respuesta = ControladorCorrelativos::ctrCorrelativosFac($RncEmpresaVentas, $NCFFactura);

$codigo = $respuesta["NCF_Cons"];
$codigoNCF = $codigo + 1;

$length = 8;
$string = substr(str_repeat(0, $length).$codigoNCF, - $length);

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='.$string.' required readonly>';

}elseif(isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "E33"){

  $RncEmpresaVentas = $_SESSION["RncEmpresaUsuario"];
  $NCFFactura = $_SESSION["NCF606"];

$respuesta = ControladorCorrelativos::ctrCorrelativosFac($RncEmpresaVentas, $NCFFactura);

$codigo = $respuesta["NCF_Cons"];
$codigoNCF = $codigo + 1;
$length = 10;
$string = substr(str_repeat(0, $length).$codigoNCF, - $length);

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='.$string.' required readonly>';

}elseif (isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "E41"){

  $RncEmpresaVentas = $_SESSION["RncEmpresaUsuario"];
  $NCFFactura = $_SESSION["NCF606"];

$respuesta = ControladorCorrelativos::ctrCorrelativosFac($RncEmpresaVentas, $NCFFactura);

$codigo = $respuesta["NCF_Cons"];
$codigoNCF = $codigo + 1;

$length = 10;
$string = substr(str_repeat(0, $length).$codigoNCF, - $length);

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" value='.$string.' required readonly>';

}else {
echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCF606" name="CodigoNCF606" required>';

 }

}
?>
       
       
      
    </div>
   
</div>
<div class="form-group col-xs-4 pull-left" style="padding-left:0px">
       
          <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-key"></i></span>

        <input type="text" class="form-control input-NCFMOD" maxlength="11" id="NCF_Modificado_606" name="NCF_Modificado_606" placeholder="NCF MODIFICADO" value="<?php if (isset($_SESSION['NCF_Modificado_606'])){ echo $_SESSION['NCF_Modificado_606']; } ?>">

 </div>
 </div>


                  <div class="form-group col-lg-12">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidor">


                      <?php 
                      if(isset($_SESSION["Tipo_Suplidor_606"])){
                        $Tipo_Suplidor_606 = $_SESSION["Tipo_Suplidor_606"];

                        switch ($Tipo_Suplidor_606){
                          
                          case "1":
                           echo '<input type="radio" Class="Juridico" name="Tipo_Suplidor_606" id="juridico_606" value="1" required checked> Jur??dico
                                  <input type="radio" Class="Fisico" name="Tipo_Suplidor_606" id="fisico_606" value="2" required> Fisico';
                            
                          break;
                           case "2":
                           echo '<input type="radio" Class="Juridico" name="Tipo_Suplidor_606" id="juridico_606" value="1" required> Jur??dico
                                  <input type="radio" Class="Fisico" name="Tipo_Suplidor_606" id="fisico_606" value="2" required checked> Fisico';
                            
                          break;


                        }
                         }else{

                          echo '<input type="radio" Class="Juridico" name="Tipo_Suplidor_606" id="juridico_606" value="1" required> Jur??dico
                                  <input type="radio" Class="Fisico" name="Tipo_Suplidor_606" id="fisico_606" value="2" required> Fisico';
                            
                        }


                       ?>
   
                   
                    </div>

                  </div>

                  </div>


<div class="form-group col-lg-12">

  <div class="input-group">

<span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

<?php 
  if(isset($_SESSION["error"])){
    echo '<input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura_606" name="Rnc_Factura_606" placeholder="Ingresar RNC o C??dula" value="'.$_SESSION['Rnc_Factura_606'].'" required>';

  }else{
    if(isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "B13"){
    echo'<input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura_606" name="Rnc_Factura_606" placeholder="Ingresar RNC o C??dula" value="'.$_SESSION["RncEmpresaUsuario"].'" required>';


   }else if(isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "E33"){
    echo'<input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura_606" name="Rnc_Factura_606" placeholder="Ingresar RNC o C??dula" value="'.$_SESSION["RncEmpresaUsuario"].'" required>';

   }else{
    echo '<input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura_606" name="Rnc_Factura_606" placeholder="Ingresar RNC o C??dula" required>';
    

   }


  }
   

   ?>

    </div>

</div>
                
<div class="form-group col-lg-12">

    <div class="form-control input-group">

    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

 <?php 
  if(isset($_SESSION["error"])){
    echo '<input class="form-control" type="text" id="Nombre_Empresa_606" name="Nombre_Empresa_606" value="'.$_SESSION['Nombre_Empresa_606'].'" readonly required>';

  }else{
    if(isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "B13"){
    echo '<input class="form-control" type="text" id="Nombre_Empresa_606" name="Nombre_Empresa_606" value="'.$_SESSION["NombreEmpresa"].'" readonly required>';


   }else if(isset($_SESSION["NCF606"]) && $_SESSION["NCF606"] == "E33"){
    echo '<input class="form-control" type="text" id="Nombre_Empresa_606" name="Nombre_Empresa_606" value="'.$_SESSION["NombreEmpresa"].'" readonly required>';

   }else{
   echo '<input class="form-control" type="text" id="Nombre_Empresa_606" name="Nombre_Empresa_606" readonly required>';
    

   }


  }
   



   ?>

<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarSuplidor">Agregar Suplidor</button>

</div>

</div>
                   
 <div class="form-group">

    <div class="col-xs-6 right" style="padding-right:0px">

        <label>Compras</label>
        <br>

<input type="number"  min=0 step="any" id="Montototalbienes" name="Montototalbienes" value="<?php if (isset($_SESSION['Montototalbienes'])){ echo $_SESSION['Montototalbienes']; } ?>" required>


    </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>Servicios</label>
                        <br>

                        <input type="number"  min=0 step="any" id="Montototalservicios" name="Montototalservicios" value="<?php if (isset($_SESSION['Montototalservicios'])){ echo $_SESSION['Montototalservicios']; } ?>" required>


                      </div>
                      

                    </div>

                    <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      <label> Monto ITBIS</label>
                      
                      <br>

                      

                        <input type="number"  min=0 step="any" id="MontoITBIS" name="MontoITBIS" value="<?php if (isset($_SESSION['MontoITBIS'])){ echo $_SESSION['MontoITBIS']; } ?>" required>


                      </div>
                      
                  

                     <div class="col-xs-6" style="padding-right:0px">

                      <label>Propina Legal</label>
                      <br>

                      
                        

                        <input type="number"  min=0 step="any" id="Propinalegal" name="Propinalegal" value="<?php if (isset($_SESSION['Propinalegal'])){ echo $_SESSION['Propinalegal']; } ?>" required>


                      </div>
                      

                    </div>

                    <div class="form-group">

                    
                    <div class="col-xs-6" style="padding-right:0px">

                      <label>Impuesto Selectivo</label>
                      
                      <br>

                      

                        <input type="number"  min=0 step="any" id="ImpuestoSelectivo" name="ImpuestoSelectivo" value="<?php if (isset($_SESSION['ImpuestoSelectivo'])){ echo $_SESSION['ImpuestoSelectivo']; } ?>" required>


                      </div>
                      
                  

                     <div class="col-xs-6" style="padding-right:0px">

                      <label>Otros Impuestos</label>
                      <br>

                      
                        

                        <input type="number"  min=0 step="any" id="OtrosImpuestos" name="OtrosImpuestos" value="<?php if (isset($_SESSION['OtrosImpuestos'])){ echo $_SESSION['OtrosImpuestos']; } ?>" required>


                      </div>
                      

                    </div>
                    <br>

                    <!--*****************CHECKBOX DE PORCENTAJE********************** -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <?php
                   
                    if(isset($_SESSION["ITBIS_LLEVADO_A_COSTO"])){
                        echo '<input type="checkbox" class="ITBIS_LLEVADO_A_COSTO" id="ITBIS_LLEVADO_A_COSTO" name="ITBIS_LLEVADO_A_COSTO" value ="1" checked>ITBIS LLEVADO A COSTO';


                    }else{
                       echo '<input type="checkbox" class="ITBIS_LLEVADO_A_COSTO" id="ITBIS_LLEVADO_A_COSTO" name="ITBIS_LLEVADO_A_COSTO" value ="1">ITBIS LLEVADO A COSTO';




                    } 


                     ?>
                    
                  </label>

                </div>
                
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <?php 
                    if(isset($_SESSION["ITBIS_Sujeto_a_Propocionalidad"])){
                      echo '<input type="checkbox" class="ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="ITBIS_Sujeto_a_Propocionalidad" value ="1" checked>ITBIS Sujeto a Propocionalidad';


                    } else{

                      echo '<input type="checkbox" class="ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="ITBIS_Sujeto_a_Propocionalidad" value ="1">ITBIS Sujeto a Propocionalidad';



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
                      if(isset($_SESSION["Tipo_Gasto_606"])){
                         $Tipo_Gasto_606 = $_SESSION["Tipo_Gasto_606"];

                         switch ($Tipo_Gasto_606) {
                          case '01':
                          echo ' <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required checked>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '02':
                          echo ' <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required checked>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '03':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required checked>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '04':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required checked>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '05':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required checked>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '06':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required checked>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '07':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required checked>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '08':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required checked>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '09':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required checked>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '10':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required checked>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             


                          break;
                          case '11':
                          echo '<input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required checked>11-GASTOS DE SEGUROS';
                             


                          break;
                           
                           
                         }



                      }else{
                         echo ' <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_PERSONAL" value="01" required>01-GASTOS DE PERSONAL
                        <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTO_POR_TRABAJO" value="02" required>02-GASTO POR TRABAJO SUMINISTRO Y SERVICIO <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ARRENDAMIENTOS" value="03" required>03-ARRENDAMIENTOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_ACTIVOS" value="04" required>04-GASTOS DE ACTIVOS FIJO<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_DE_REPRESENTACI??N" value="05" required>05-GASTOS DE REPRESENTACI??N<br>
                        <input type="radio" name="Tipo_Gasto_606" id="OTRAS_DEDUCCIONES_ADMITIDAS" value="06" required>06-OTRAS DEDUCCIONES ADMITIDAS<br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS_FINANCIEROS" value="07" required>07-GASTOS FINANCIEROS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS EXTRAORDINARIOS" value="08" required>08-GASTOS EXTRAORDINARIOS <br>
                        <input type="radio" name="Tipo_Gasto_606" id="COMPRA FORMARA PARTE COSTO DE VENTA" value="09" required>09-COMPRA FORMARA PARTE COSTO DE VENTA <br>
                        <input type="radio" name="Tipo_Gasto_606" id="ADQUISICIONES DE ACTIVOS" value="10" required>10-ADQUISICIONES DE ACTIVOS<br>              
                    
                        <input type="radio" name="Tipo_Gasto_606" id="GASTOS DE SEGUROS" value="11" required>11-GASTOS DE SEGUROS';
                             
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
                      if(isset($_SESSION["Forma_De_Pago_606"])){

                        $Forma_De_Pago_606 = $_SESSION["Forma_De_Pago_606"];
                        switch ($Forma_De_Pago_606) {
                            case '01':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required checked>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>';

                            break;
                            case '02':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required checked>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>';
                            break;
                            case '03':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required checked>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>';
                            break;
                            case '04':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required checked>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                        <div input-group form-control class="col-xs-12 right">
                          <input type="radio" name="diaCredito" id="dias15" value="15" required checked>15
                          <input type="radio" name="diaCredito" id="dias30" value="30" required>30
                          <input type="radio" name="diaCredito" id="dias45" value="45" required>45
                          <input type="radio" name="diaCredito" id="dias90" value="90" required>90</div>
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>';
                            break;
                            case '05':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required checked>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>';
                            break;
                            case '06':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required checked>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>';
                            break;
                            case '07':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required checked>07-MIXTO <br>';
                            break;
                         
                        }




                      }else{
                        echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_606" id="PERMUTA" value="05" required>05-PERMUTA<br>
                        <input type="radio" name="Forma_De_Pago_606" id="NOTA_DE_CREDITO" value="06" required>06-NOTA DE CREDITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="MIXTO" value="07" required>07-MIXTO <br>';

                      }




                       ?>

                     

                   
                        
                    </div>

                  

                  </div>
                  </div>

                  <br>
                  <br>

                   <div class="col-xs-6 right">

                      <div class="form-group">

                        <div class="input-group form-control">

                          <label>TRANSACCI??N</label><br>
                          <?php 

                          if(isset($_SESSION["Transaccion_606"])){

                          $Transaccion_606 = $_SESSION["Transaccion_606"];
                              switch ($Transaccion_606){ 
                                  case '1':
                                  echo '<input type="radio" name="Transaccion_606" id="Transaccion_606" id="Personal" value="1" checked>Personal
                                      <input type="radio" name="Transaccion_606" id="Transaccion_606" id="Empresarial" value="2">Empresarial
                                       <br> ';

                                  break;
                                  case '2':
                                  echo '<input type="radio" name="Transaccion_606" id="Transaccion_606" id="Personal" value="1">Personal
                                      <input type="radio" name="Transaccion_606" id="Transaccion_606" id="Empresarial" value="2" checked>Empresarial
                                       <br> ';

                                  break;


                                  }

                                  } else {
                                    echo '
                            <input type="radio" name="Transaccion_606" id="Transaccion_606" id="Personal" value="1">Personal
                            
                            <input type="radio" name="Transaccion_606" id="Transaccion_606" id="Empresarial" value="2" checked>Empresarial
                             <br> 
                            ';




                                  }




                           ?>
                           </div>
                             
                        </div>

                      </div>
                       <div class="col-xs-12 pull-left banco606">
                      <?php 
    if(isset($_SESSION["error"])){
      if($_SESSION["ModuloBanco"] == "Activo"){
         echo '<div class="form-group">
        <div class="input-group form-control"> 
                           
         <label>BANCO</label><br>

        <label class="col-xs-4">Fecha de Pago</label>
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
        <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" placeholder="A??o/Mes" value="'.$_SESSION['FechaPagomes606'].'" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" placeholder="D??a" value="'.$_SESSION["FechaPagodia606"].'" required><br>
        
        <input type="text" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="'.$_SESSION["Referencia"].'" required>
        
        <div class="col-xs-5">
        <select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>';
        $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

        $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

            foreach ($Banco  as $key => $value) {
              if($_SESSION["agregarBanco"] == $value["id"]){
                echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

              }
            
            }

            foreach ($Banco as $key => $value){

           echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


            }
        
        echo'</select>
         </div>
        </div>
                            
      </div>';



      }/*error activo*/
      else{
         echo'<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes606" name="FechaPagomes606" value="'.$_SESSION['FechaPagomes606'].'" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" value="'.$_SESSION['FechaPagodia606'].'" required readonly><br>
        <input type="hidden" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="">
        <input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="0" required>';


      }/*error desactivado*/


    }/*error banco*/
    else{
      if($_SESSION["ModuloBanco"] == "Activo"){
        echo '<div class="form-group">
        <div class="input-group form-control"> 
                           
         <label>BANCO</label><br>

        <label class="col-xs-4">Fecha de Pago</label>
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
        <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" placeholder="A??o/Mes" value="'.$_SESSION['FechaPagomes606'].'" required>
        <input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" placeholder="D??a" value=""><br>
        
        <input type="text" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="">
        
        <div class="col-xs-5">
        <select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>
        <option value="">Seleccionar Banco</option>';
        $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

        $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);


            foreach ($Banco as $key => $value){

           echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


            }
        
        echo'</select>
         </div>
        </div>
                            
      </div>';


      }/*sin error banco activo*/
      else{

      }/*sin error banco desactivado*/
      echo'<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes606" name="FechaPagomes606" value="'.$_SESSION['FechaPagomes606'].'" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" value="" required readonly><br>
        <input type="hidden" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="NO APLICA">
        <input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="0" required>';


    }


    ?>

                      
                            
                     
                    </div>
                  
                       
                           

                     <div class="col-xs-12 left">
                      <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      
                     
                      <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" value="<?php if (isset($_SESSION['Descripcion'])){ echo $_SESSION['Descripcion']; } ?>"  required>

                     </div>
                      <div class="form-group col-xs-6">
                        <br>

                   
                      <label><h3>Distribuci??n Cuentas/Proyectos</h3></label>

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
                            title: "??DEBE INICIALIZAR EL CODIGO DE ASIENTO DIARIO EN EL LAPIZ COLOR ANARANJADO QUE ESTA EN LA PARTE SUPERIOR DEL FORMULARIO!",
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
               if($_SESSION["Proyecto"] == 2){ 

                      echo '<div class="col-xs-12">  
                       
                        <label class="pull-right" style="padding-right:200px">CREDITO</label>
                        <label class="pull-right" style="padding-right:90px">DEBITO</label>
                        <label class="pull-right" style="padding-right:290px">CUENTA CONTABLE</label>

                      </div>';

                    }else {
                      echo '<div class="col-xs-12">  
                        <label class="pull-right" style="padding-right:80px">PROYECTO</label>
                        <label class="pull-right" style="padding-right:120px">CREDITO</label>
                        <label class="pull-right" style="padding-right:90px">DEBITO</label>
                        <label class="pull-right" style="padding-right:220px">CUENTA CONTABLE</label>

                      </div>';



                    }


                       ?>



                    <?php 

                    if (isset($_SESSION["listaCuentas"])){

                        $listaCuentas = json_decode($_SESSION["listaCuentas"], true);

                        $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                        $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);

                        if($_SESSION["Proyecto"] == 1){ 
                        
                        foreach ($listaCuentas as $key => $value){

                          $plancuenta = $value["idgrupo"].'.'.$value["idcategoria"].'.'.$value["idgenerica"].'.'.$value["idcuenta"];
                echo '<div class="row" style="padding:5px 15px">
                        <div class="col-xs-2" style="padding-right:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta ="'.$plancuenta.'"><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" idcuenta ="'.$plancuenta.'" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
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
                          if($value["estatus"] == 1){ 
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
                         }
                         }
                               

                               

                           echo'</select>
                           </div>
                      </div>

                      </div>';
                          
                        }
                        }/*IF DE PROYECTO*/
                        else{
                          foreach ($listaCuentas as $key => $value){

                          $plancuenta = $value["idgrupo"].'.'.$value["idcategoria"].'.'.$value["idgenerica"].'.'.$value["idcuenta"];
                echo '<div class="row" style="padding:5px 15px">
                        <div class="col-xs-2" style="padding-right:0px">
                          <div class="input-group">
                            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarcuenta" idcuenta ="'.$plancuenta.'"><i class="fa fa-times"></i></button>
                          </span>
                          <input type="text" class="form-control plancuenta" idcuenta ="'.$plancuenta.'" name="plancuenta" value="'.$plancuenta.'" required readonly> 
                            
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
                        
                         <input type="hidden" class="form-control proyecto" id="proyecto" name="proyecto" value="0" required>
                           

                           
                           </div>
                      </div>

                      </div>';
                          
                        }


                        }


                      }/*CIERRE IF ISSET*/ else {}
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

                
              
                </div>             
              

            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Registrar</button>

              <?php 
if(isset($_SESSION["FechaFacturadia_606"])){ 
unset($_SESSION["FechaFacturadia_606"]); 
unset($_SESSION["Rnc_Factura_606"]); 
unset($_SESSION["NCF606"]);
unset($_SESSION["CodigoNCF606"]);
unset($_SESSION["NCF_Modificado_606"]); 
unset($_SESSION["Montototalbienes"]); 
unset($_SESSION["Montototalservicios"]);
unset($_SESSION["MontoITBIS"]); 
unset($_SESSION["Propinalegal"]); 
unset($_SESSION["ImpuestoSelectivo"]); 
unset($_SESSION["OtrosImpuestos"]);
unset($_SESSION["ITBIS_LLEVADO_A_COSTO"]);
unset($_SESSION["ITBIS_Sujeto_a_Propocionalidad"]);
unset($_SESSION["Nombre_Empresa_606"]);
unset($_SESSION["FechaPagodia606"]);
unset($_SESSION["Referencia"]); 
unset($_SESSION["Descripcion"]);
unset($_SESSION["listaCuentas"]);

}  


 ?>

              
            </div>

          </form>
          <?php 

            $librodiario = new ControladorDiario();
            $librodiario -> ctrgastodiario();




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
                    <th style="width: 10px">A??o/Mes</th>
                    <th style="width: 5px">Dia</th>
                    <th>Total</th>
                    <th>ITBIS</th>
                    <th>Acci??n</th>
                    
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
              <th style="width:2px">N?? Cuenta</th>
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
 <!--***********************************************
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
        <input type="hidden" class="form-control input-lg" id="ModuloSuplidor" name="ModuloSuplidor" value="gastodiario" readonly>

            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
          <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              
                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidor">

                   
                        <input type="radio" Class="Juridico" name="Tipo_Suplidor" id="juridico" value="1" required> Jur??dico

                    
                    
                        <input type="radio" Class="Fisico" name="Tipo_Suplidor" id="fisico" value="2" required> Fisico

                   
                    </div>
                    
            </div>

          </div>

           <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" class="form-control input-RNC" maxlength="11" id="nuevoDocumentoIdsuplidor" name="nuevoDocumentoIdsuplidor" placeholder="Ingresar RNC o Cedula del Suplicor" required>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoSuplidor" name="nuevoSuplidor" placeholder="Ingresar Nombre Completo del Suplidors" required>

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
              
             
              <input type="text" class="form-control input-lg" name="nuevoTelefonoSuplidor" placeholder="Ingresar Tel??fono">


            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDireccionSuplidor" placeholder="Ingresar Direcci??n Suplidor">

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
                    CIERRE DE  MODAL AGREGAR USUARIO
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

                     <label>A??o/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames_606_Retener" name="FechaFacturames_606" required readonly>

                     
                      <label>D??a</label><input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia_606_Retener" name="FechaFacturadia_606_Retener" required readonly>


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

                     <label>A??o/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaRetenecionmes_606" name="FechaRetenecionmes_606" required>

                     
                      <label>D??a</label><input type="text" class="Fechadia" maxlength="2" id="FechaReteneciondia_606" name="FechaReteneciondia_606" required>


                    </div>
                   

                  </div>
                  </div>

                  <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS30" value="30" required>30 %
                        <br>
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS75" value="75" required>75 %<br>
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS100" value="100" required>100 %<br>
                        <input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" required>
                        
                    </div>

                  

                  </div>
                  </div>

                  <div class="col-xs-6  right">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ISR RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ISR_RETENIDO" id="ISR2" value="2">2 %
                        <br>
                        <input type="radio" name="ISR_RETENIDO" id="ISR2" value="10">10 %<br>
                        
                        <input type="text" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" required>
                        <br>
                          <select type="text" class="form-control" id="tipo_de_seleccionretener" name="tipo_de_seleccionretener">
                              <option value="0">TIPO DE SELECCION</option>
                              <option value="01">01 - ALQUILERES</option>
                              <option value="02">02 - HONORARIOS POR SERVICIOS</option>
                              <option value="03">03 - OTRAS RENTAS</option>
                              <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
                              <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
                              <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
                              <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
                              <option value="08">08 - JUEGOS TELEFONICOS</option>


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

