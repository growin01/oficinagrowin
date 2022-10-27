
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
  <h1 class="col-xs-5" style="font-size: 30px"><i class="fa fa-shopping-cart"></i>
        COMPRA DE INVENTARIO
        
  </h1>

   <a href="crear-compra-inventarioNo" class="btn btn-success"><i class="fa fa-shopping-cart" style="padding-right:5px"></i>Compra Inventario Proforma</a>

   <a href="compras" class="btn btn-success"><i class="fa fa-list-ol" style="padding-right:5px"></i>Detalle de Compra</a>

   <a href="reportecxp" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle Cuentas Por Pagar</a>
  
      
    </section>
    <br>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

        <div class="col-xs-7" style="padding-right: 0px">

          <div class="box box-success">


            <div class="box-header with-border">

               <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "DCI";

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
               

            </div><!--========box-header with-border=========--> 
            <?php 


             ?>
  <form role="form" method="post" class="comprasinventario">
     <div class="box-body">
       <div class="box">
       
   <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $_SESSION["idEmpresa"];?>">

  <input type="hidden" id=NombreEmpresaCompras value="<?php echo $_SESSION["NombreEmpresa"];?>">
  <input type="hidden" id=Tipo_Id_Empresa value="<?php echo $_SESSION["Tipo_Id_Empresa"];?>">

  <input type="hidden"  id="RncEmpresaCompras" name="RncEmpresaCompras" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
  <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
  <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
  <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
  <input type="hidden" class="form-control" id="UsuarioLogueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
<br>
<div class="col-xs-12"></div>
   <div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaFacturames_606" name="FechaFacturames_606" value="<?php if (isset($_SESSION['FechaFacturames_606'])){ echo $_SESSION['FechaFacturames_606'];}?>" placeholder="Año/Mes Ejemplo 202001"  required autofocus>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaFacturadia_606" name="FechaFacturadia_606"  value="<?php if (isset($_SESSION['FechaFacturadia_606'])){ echo $_SESSION['FechaFacturadia_606'];}?>" placeholder="Día Ejemplo 01" required autofocus>
 </div>  
  
  
</div>
<div class="col-xs-12"></div>



      
  <div class="col-xs-3" style="padding-right:0px">
                     

        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    
      <?php  
if(isset($_SESSION["NCFCompra"])){
                         
$NCFCompra = $_SESSION["NCFCompra"];

switch ($NCFCompra) {

case 'B01':
    echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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

echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required> 
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
 echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
echo '<select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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
}else{
echo ' <select class="form-control"  id="NCFCompra" name="NCFCompra" required>
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


}

?>          
                     
          </div>


</div>

<div class="col-xs-4" style="padding-left:0px; padding-right:0px">
                   
    <div class="input-group">
      
<?php 
      
if(isset($_SESSION["NCFCompra"]) && $_SESSION["NCFCompra"] == "B13"){

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCFCompra" name="CodigoNCFCompra" value='. $_SESSION['CodigoNCFCompra'].' required readonly>';

}elseif (isset($_SESSION["NCFCompra"]) && $_SESSION["NCFCompra"] != "B13"){

echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCFCompra" name="CodigoNCFCompra" value='.$_SESSION['CodigoNCFCompra'].' required>';

}else {
echo'<input type="text" maxlength="13" class="form-control input-NCF" id="CodigoNCFCompra" name="CodigoNCFCompra" placeholder="NCF"  required>';

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
<div class="col-xs-12"></div>





        <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">
              <h4 style="text-align: center;"><b>INFORMACIÓN SUPLIDOR</b></h4>
        </div>


                    <div class="form-group col-xs-12">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select type="text" class="form-control" id="agregarSuplidor" name="agregarSuplidor" placeholder="Agregar Suplidor">
                        
<?php 
     
  $id_Suplidor = null;
  $Valor_idSuplidor = null;
  $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];

  $suplidores = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);

if(isset($_SESSION["agregarSuplidor"])){
  
  if($_SESSION["agregarSuplidor"] != ""){

    foreach ($suplidores as $key => $value){
      if($_SESSION["agregarSuplidor"] == $value["id"]){ 
        echo '<option value="'.$value["id"].'">'.$value["Nombre_Suplidor"].'</option>';
      }
    }


  }else{
    echo'<option value="">Seleccionar Suplidor</option>';
    foreach ($suplidores as $key => $value){
    
      echo '<option value="'.$value["id"].'">'.$value["Nombre_Suplidor"].'</option>';
  }


  }



}else{
  echo'<option value="">Seleccionar Suplidor</option>';
  
  foreach ($suplidores as $key => $value){
    
      echo '<option value="'.$value["id"].'">'.$value["Nombre_Suplidor"].'</option>';
  }
}
     
?>
                         

                      </select>

                      <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarSuplidor">Agregar Suplidor</button></span>
                      

                    </div>
                   

                  </div>

               <div class="form-group col-xs-4">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoSuplidorFactura">
      <?php 
    if(isset($_SESSION["Tipo_Suplidor_Factura"])){
      if($_SESSION["Tipo_Suplidor_Factura"] == '1'){

        echo '<input type="radio" Class="JuridicoSuplidorFactura" id="JuridicoSuplidorFactura" name="Tipo_Suplidor_Factura" id="JuridicoUsuarioSuplidor" value="1" required checked> Jurídico

        <input type="radio" Class="FisicoSuplidorFactura" id="FisicoSuplidorFactura" name="Tipo_Suplidor_Factura" id="fisicoSuplidorFactura" value="2" required> Fisico ';

      }else{
        
        echo '<input type="radio" Class="JuridicoSuplidorFactura" id="JuridicoSuplidorFactura" name="Tipo_Suplidor_Factura" id="JuridicoUsuarioSuplidor" value="1" required> Jurídico

        <input type="radio" Class="FisicoSuplidorFactura" id="FisicoSuplidorFactura" name="Tipo_Suplidor_Factura" id="fisicoSuplidorFactura" value="2" required checked> Fisico ';

      }


    }else{
      echo '<input type="radio" Class="JuridicoSuplidorFactura" id="JuridicoSuplidorFactura" name="Tipo_Suplidor_Factura" id="JuridicoUsuarioSuplidor" value="1" required> Jurídico

        <input type="radio" Class="FisicoSuplidorFactura" id="FisicoSuplidorFactura" name="Tipo_Suplidor_Factura" id="fisicoSuplidorFactura" value="2" required> Fisico';
    }


?>
                      
                    </div>

                  </div>

                </div>
         <div class="form-group col-xs-4">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <?php 
if(isset($_SESSION["RncSuplidorFactura"])){
echo '<input type="text" maxlength="11" class="form-control input-xs input-RNC" id="RncSuplidorFactura" name="RncSuplidorFactura" value='.$_SESSION["RncSuplidorFactura"].' required>';



}else{
echo'<input type="text" maxlength="11" class="form-control input-xs input-RNC" id="RncSuplidorFactura" name="RncSuplidorFactura" placeholder="Ingresar Documento" required>';


}


 ?>
            </div>

          </div>
        <div class="form-group col-xs-4">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

<?php 
if(isset($_SESSION["Nombre_Suplidor"])){
  
 
echo '<input type="text" maxlength="100" class="form-control input-xs" id="Nombre_Suplidor" name="Nombre_Suplidor" value='.$_SESSION['Nombre_Suplidor'].' required>';

}else{
echo'<input type="text" maxlength="50" class="form-control input-xs" id="Nombre_Suplidor" name="Nombre_Suplidor" placeholder="Nombre Suplidor" required>';

}


?>

                  </div>

          </div>
            
<div class="col-xs-12 left">
  
  <div class="form-group">

      <div class="input-group">

<span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

<?php 
if(isset($_SESSION["Descripcion"])){
echo '<input type="text" maxlength="150" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" value='.$_SESSION["Descripcion"].' required>';

}else{
echo'<input type="text" maxlength="150" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" value=""  required>';

}


 ?>

  

      </div>
                   
                  
  </div>
               
</div>
     <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

    <h4 style="text-align: center;"><b>Distribución De Compra de Inventario</b></h4>
 
</div>

<div class="form-group col-xs-12">

  <div class="col-xs-4">

    <div class="form-group">

      <div class="input-group form-control">

<?php 
if(isset($_SESSION["tipo_de_monto"])){
  if($_SESSION["tipo_de_monto"] == "1"){
    echo '<input type="radio"  name="tipo_de_monto" id="bienes" value="1" required checked><b>_Compras</b>&nbsp;&nbsp;&nbsp;
                
    <input type="radio" name="tipo_de_monto" id="servicios" value="2" required><b>_Servicios</b>';


  }else{
     echo '<input type="radio"  name="tipo_de_monto" id="bienes" value="1" required><b>_Compras</b>&nbsp;&nbsp;&nbsp;
                
    <input type="radio" name="tipo_de_monto" id="servicios" value="2" required  checked><b>_Servicios</b>';

  }

}else{
  echo'<input type="radio"  name="tipo_de_monto" id="bienes" value="1" required checked><b>_Compras</b>&nbsp;&nbsp;&nbsp;
                
<input type="radio" name="tipo_de_monto" id="servicios" value="2" required><b>_Servicios</b>';

}


 ?>
                    
     </div>
                

    </div>
  
  </div>
                
            <div class="form-group col-xs-6">
                <select class="form-control" name="Tipo_Gasto_606" id="Tipo_Gasto_606" required>
<?php 
if(isset($_SESSION["Tipo_Gasto_606"])){
$Tipo_Gasto_606 = $_SESSION["Tipo_Gasto_606"];
switch ($Tipo_Gasto_606) {
  
  case '09':
  echo' <option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>';
    
  break;
  
} } else{
  echo'<option value="09">09-COMPRA FORMARA PARTE COSTO DE VENTA</option>';


}





 ?>
                  
                </select>
            </div>
         </div>   
      <div class="col-xs-12">  </div>
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
                        <br>';

                            break;
                            case '02':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required checked>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                     <br>';
                            break;
                            case '03':
                            echo '<input type="radio" name="Forma_De_Pago_606" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_606" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_606" id="TARJETA_CREDITO_DEBITO" value="03" required checked>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_606" id="COMPRA_A_CREDITO" value="04" required>04-COMPRA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                    <br>';
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
                      <br>';
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
                        <br>';

                      }




                       ?>

                     

                   
                        
                    </div>

                  

                  </div>
                  </div>
<div class="col-xs-6">
    
    <div class="form-group">
        
        <label>
                    <?php
                   
if(isset($_SESSION["ITBIS_LLEVADO_A_COSTO"])){
            
  echo '<input type="checkbox" class="ITBIS_LLEVADO_A_COSTO" id="ITBIS_LLEVADO_A_COSTO" name="ITBIS_LLEVADO_A_COSTO" value ="1" checked>&nbsp;ITBIS LLEVADO A COSTO';


}else{
  
  echo '<input type="checkbox" class="ITBIS_LLEVADO_A_COSTO" id="ITBIS_LLEVADO_A_COSTO" name="ITBIS_LLEVADO_A_COSTO" value ="1">&nbsp;ITBIS LLEVADO A COSTO';

} 


?>
                    
  </label>
   <br>

               
  <label>

<?php 
                    
if(isset($_SESSION["ITBIS_Sujeto_a_Propocionalidad"])){
  
  echo '<input type="checkbox" class="ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="ITBIS_Sujeto_a_Propocionalidad" value ="1" checked>&nbsp;ITBIS SUJETO A PROPORCIONALIDAD';


} else{

echo '<input type="checkbox" class="ITBIS_Sujeto_a_Propocionalidad" id="ITBIS_Sujeto_a_Propocionalidad" name="ITBIS_Sujeto_a_Propocionalidad" value ="1">&nbsp;ITBIS SUJETO A PROPORCIONALIDAD';

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
if(isset($_SESSION["Moneda_Factura"])){
$MonedaFactura = $_SESSION["Moneda_Factura"];

                    switch ($MonedaFactura) {
                      case 'DOP':
echo '<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="DOP" required checked>$ DOP &nbsp; 
<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="USD" required>$ USD';
break;
                      
                      case 'USD':
echo '<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="DOP" required>$ DOP &nbsp;
<input type="radio" name="Moneda_Factura"  id="Moneda_Factura" value="USD" required checked>$ USD';
break;
                    }

}else{
  echo '<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="DOP" required checked>$ DOP &nbsp;
<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="USD" required>$ USD';


}

?>               

                  </div>
              </div>
   </div>  
   <div class="form-group col-xs-6">
                   
        <div class="input-group TASA">
     
                 
        </div>
   </div>  
                  <div class="col-xs-12 pull-left banco606">
                      <?php 
        if(isset($_SESSION["ModuloBanco"]) && $_SESSION["ModuloBanco"] == "Activo" && isset($_SESSION["FechaPagomes606"]) && isset($_SESSION["FechaPagodia606"])){
          echo '<div class="form-group">
        <div class="input-group form-control"> 
                           
         <label>BANCO</label><br>

        <label class="col-xs-4">Fecha de Pago</label>
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
        <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" placeholder="Año/Mes" value="'.$_SESSION['FechaPagomes606'].'" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" placeholder="Día" value="'.$_SESSION["FechaPagodia606"].'" required><br>
        
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


          }else if(isset($_SESSION["ModuloBanco"]) && $_SESSION["ModuloBanco"] == "Desactivado" && isset($_SESSION["FechaPagomes606"]) && isset($_SESSION["FechaPagodia606"])){

            echo'<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes606" name="FechaPagomes606" value="'.$_SESSION['FechaPagomes606'].'" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" value="'.$_SESSION['FechaPagodia606'].'" required readonly><br>
        <input type="hidden" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="">
        <input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>';

          }else if(isset($_SESSION["ModuloBanco"]) && $_SESSION["ModuloBanco"] == "Activo" && isset($_SESSION["FechaPagomes606"]) && !isset($_SESSION["FechaPagodia606"])){ 
            echo '<div class="form-group">
        <div class="input-group form-control"> 
                           
         <label>BANCO</label><br>

        <label class="col-xs-4">Fecha de Pago</label>
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
        <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes606" name="FechaPagomes606" placeholder="Año/Mes" value="'.$_SESSION['FechaPagomes606'].'" required>
        <input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" placeholder="Día" value=""><br>
        
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





          }else if(isset($_SESSION["ModuloBanco"]) && $_SESSION["ModuloBanco"] == "Desactivado" && isset($_SESSION["FechaPagomes606"]) && !isset($_SESSION["FechaPagodia606"])){

            echo'<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes606" name="FechaPagomes606" value="'.$_SESSION['FechaPagomes606'].'" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia606" name="FechaPagodia606" value="" required readonly><br>
        <input type="hidden" class="col-xs-3" maxlength="6" id="Referencia" name="Referencia" placeholder="Referencia del Pago" value="NO APLICA">
        <input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="0" required>';

          }

          


    ?>

                      
                            
                     
                    </div>
                  


      <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

            <h4 style="text-align: center;"><b>PRODUCTOS</b></h4>
 
      </div>


             <div class="form-group CompraProducto">
                  <div class="col-xs-12">

                  <label class="pull-right" style="padding-right:90px">Total Producto</label>
                  <label class="pull-right" style="padding-right:50px">Prec.Venta Unit</label>
                  <label class="pull-right" style="padding-right:55px">%Ganancia</label>
                  <label class="pull-right" style="padding-right:20px">Prec.Compra Unit</label>
                  <label class="pull-right" style="padding-right:60px">cant.</label>
                  <label class="pull-right" style="padding-right:100px">Descrip.</label>
                  
                  </div>
                  <?php 
                  if (isset($_SESSION["listaCuentas"])){

                  $listaCuentas = json_decode($_SESSION["listaCuentas"], true);

          foreach ($listaCuentas as $key => $value){
                      echo'<div class="row">

        <div class="col-xs-3" style="padding-right:0px">
                      
          <div class="input-group">
                        
            <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'.$value["id"].'"><i class="fa fa-times"></i></button></span>
            <input type="hidden" class="form-control tipoproducto"  name="tipoproducto" value="'.$value["tipoproducto"].'" readonly required> 
            <input type="hidden" class="form-control stockanterior" name="stockanterior" value="'.$value["stockanterior"].'" readonly required>
            <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'" readonly required>

          </div>
        </div>

        <div class="col-xs-1 ingresoCantidad" style="padding:0px">
        
        <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="1" Stock="'.$value["stockanterior"].'" nuevoStock="'.$value["cantidad"].'" required>
                  
                  
        </div>
                    

        <div class="col-xs-2 ingresoPrecio" style="padding:0px">
                      
          <div class="input-group">
            <span class="input-group-addon">
              <i class="ion ion-social-usd">
                </i>   
              </span>

              <input type="text"  class="form-control nuevoPrecioProducto"  name="nuevoPrecioProducto" value="'.$value["preciocompra"].'" required> 
                        
              </div>
            </div>

            <div class="col-xs-1" style="padding:0px">
                <div class="input-group">
            <input type="number" class="form-control nuevoPorcentaje" id="nuevoPorcentaje" name="nuevoPorcentaje" min="0" value="'.$value["porcentajegan"].'" required>
                  
                  
            </div>
                
          </div>
            
            <div class="col-xs-2 ingresoPrecioVenta" style="padding:0px">
                      
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="ion ion-social-usd">
                  </i>
                  </span>

                <input type="text"  class="form-control nuevoPrecioVenta"  name="nuevoPrecioVenta" value="'.$value["precioventa"].'" required readonly> 
                        
                </div>
              </div>
                    
              <div class="col-xs-2 ingresoTotal" style="padding-left:0px">
                      
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="ion ion-social-usd">
                      </i>
                      </span>

                        
                        
                    <input type="text" class="form-control TotalPrecioProducto" name="TotalPrecioProducto" value="'.$value["total"].'" required readonly> 
                        
                      </div>
                      </div>

                    </div>
                      ';


                     }


                  }




                   ?>
                   


              </div>


<input class = "col-xs-12" type="hidden" id="listaCuentas" name="listaCuentas">

              <br>

 <div class="col-xs-9 pull-right">
   <div class="form-group col-xs-8 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>TOTAL FACTURA</b></h4>
  </div>
   <div class="col-xs-6">
        <label class="pull-right">Neto +</label>

    </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="NetoTotalCompra" name="NetoTotalCompra" placeholder="0000" value=""required readonly>

                <input type="hidden" name="NetoCompra" id="NetoCompra" value="">
                        
              </div>
      </div>
      <div class="col-xs-6">
        <input class="pull-right" type="checkbox"  id="HabilitarITBIS" name="HabilitarITBIS" value ="1">&nbsp;
          <label class="pull-right">ITBIS +</label>
          
      
      </div>
        <div class="form-group col-xs-2" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="PORITBIS" name="PORITBIS" value="18" required>
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

              
  <input type="text" class="form-control" id="TotalISCvi" name="TotalISCvi" placeholder="0000" value="<?php if (isset($_SESSION["TotalISCvi"])){ echo $_SESSION["TotalISCvi"];}else{echo "0";}?>" required>
  

  <input type="hidden" class="form-control" id="TotalISC" name="TotalISC" value="<?php if (isset($_SESSION["TotalISC"])){ echo $_SESSION["TotalISC"];}else{echo "0";}?>">

                        
              </div>
        </div>
      <div class="col-xs-6">
        
          <label class="pull-right">Otros Imp. +</label>
          
      
      </div>
       <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalOtrosImpvi" name="TotalOtrosImpvi" value="<?php if (isset($_SESSION["TotalOtrosImpvi"])){ echo $_SESSION["TotalOtrosImpvi"];}else{echo "0";}?>" required>

                <input type="hidden" name="TotalOtrosImp" id="TotalOtrosImp" value="<?php if (isset($_SESSION["TotalOtrosImp"])){ echo $_SESSION["TotalOtrosImp"];}else{echo "0";}?>">
                        
              </div>
      </div>
        

        <div class="col-xs-6">
            <label class="pull-right">Retenciones -</label>

        </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalRetvi" name="TotalRetvi" placeholder="0000" value="0"required readonly>

                <input type="hidden" name="TotalRet" id="TotalRet" value="0">
                        
              </div>
      </div>
       <div class="col-xs-6">
            <label class="pull-right">Total =</label>

        </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalCompravi" name="TotalCompravi" placeholder="0000" value=""required readonly>

                <input type="hidden" name="TotalCompra" id="TotalCompra" value="">
                        
              </div>
      </div>

  </div><!--========col-xs-6 pullright=========-->  
                


<div class = "col-xs-12"></div>

<div class="form-group col-xs-12 divretenciones">

     
</div>


  <div class="FormularioRetencion">
    



  </div>
<div class = "col-xs-12"></div>


<?php 
 if ($_SESSION["Proyecto"] == 1) {
 echo'
 <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">
                
    <h4 style="text-align: center;"><b>DISTRIBUCIÓN DE PROYECTOS</b></h4>
 </div>
 <div class="form-group row ProyectoGastos">
      <div class="col-xs-12">
            <label class="pull-left" style="padding-left:150px">Proyecto</label>
            <label class="pull-left" style="padding-left:100px">Monto</label>
            <div class="btn-group" style="padding-left:50px"><a class="btn btn-primary btn-xs agregarproyecto">+</a></div>

      </div>
  </div>

  <div class="col-xs-6 pull-left">
    <div class="form-group col-xs-8 pull-right" style="background-color: #BEEDB6">
      <h4 style="text-align: center;"><b>TOTAL MONTO DISTRIBUIDO</b></h4>
 
    </div>
    <div class="col-xs-6">
      <label class="pull-right">Total</label>

    </div>
     <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="montodisvi" name="montodisvi" placeholder="0000" value=""required readonly>

                <input type="hidden" name="montodis" id="montodis" value="">
                        
              </div>
        </div>


  </div>



 ';}
 

?> 
  <input class = "col-xs-12" type="hidden" id="listaProyecto" name="listaProyecto">
     


      </div><!--========cierre box=========-->  
     </div><!--========cierre box-body=========-->  
     
    <div class="box-footer">
          <button type="submit" class="btn btn-primary pull-right">Registrar</button>
<?php 
if(isset($_SESSION["FechaFacturames_606"])){
                         
unset($_SESSION["FechaFacturadia_606"]);
unset($_SESSION["NCFCompra"]);
unset($_SESSION["CodigoNCFCompra"]);
unset($_SESSION["NCF_Modificado_606"]);
unset($_SESSION["agregarSuplidor"]);
unset($_SESSION["Tipo_Suplidor_Factura"]);
unset($_SESSION["RncSuplidorFactura"]);
unset($_SESSION["Nombre_Suplidor"]);
unset($_SESSION["Descripcion"]);
unset($_SESSION["Tipo_Gasto_606"]);
unset($_SESSION["Forma_De_Pago_606"]);
unset($_SESSION["ITBIS_LLEVADO_A_COSTO"]);
unset($_SESSION["ITBIS_Sujeto_a_Propocionalidad"]);
unset($_SESSION["FechaPagomes606"]);
unset($_SESSION["FechaPagodia606"]);
unset($_SESSION["Referencia"]);
unset($_SESSION["ModuloBanco"]);
unset($_SESSION["listaCuentas"]);
unset($_SESSION["TotalISCvi"]);
unset($_SESSION["TotalOtrosImpvi"]); 
unset($_SESSION["TotalISC"]); 
unset($_SESSION["TotalOtrosImp"]);


}
?> 
    </div>


  </form> <!--========cierre form=========--> 
           <?php 

            $comprasinventario = new ControladorCompras();
            $comprasinventario -> ctrcomprasinventario();

           ?>


          
          
         </div><!--========cierre box-box-success=========-->  
        </div><!--=============cierre de col-lg-8 primera seccion=========-->

      <div class="col-lg-5" style="padding-left: 2px">

          <div class="box box-warning"></div>

          <div class="box-header with-border">

            <div class="box-body">
               <div class="col-xs-12" style="padding-top: 0px">
                <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalAgregarProductos" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Producto
                </button>
                <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalAgregarCategoria"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Categoría
                  </button>
                
                


              </div>
              <br><br>

  <table class="table table-bordered table-striped dt-responsive tablaCompras" width="100%">
                
                <thead>

                  <tr>

                    <th style="width: 10px">#</th>
                    <th>Img.</th>
                    <th>Cód.</th>
                    <th>Descrip.</th>
                    <th>Prec.Compra</th>
                    <th>Stock</th>
                    <th></th>    

                  </tr>

                </thead>
                
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
              <th>Ref.</th>
              <th style="width:3px">Monto</th>
              <th></th>
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

             if($EXTRAERASIENTO == "DCI"){ 
             

              $NombreSuplidor = $value["Nombre_Suplidor"];

             
                echo ' <tr>
               
                <td>'.$value["NAsiento"].'</td>
                <td>'.$NombreSuplidor.'</td>
                <td>'.$value["NCF_Factura"].'</td>
                <td>'.$value["FechaAnoMes"].'</td>
                <td>'.$value["FechaDia"].'</td>
                <td>'.$value["Referencia"].'</td>
                <td>'.number_format($value["Total"],2).'</td>';


                 echo'<td>
                  <div class="btn-group">';

                 if($value["EXTRAER_NCF"] != "CP1"){ 
                  echo' <button class="btn btn-primary btn-xs copiarcomprainventario" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>';
                  }else{
                    echo'<button class="btn btn-primary btn-xs copiarcomprainventarioNo" idcompra="'.$value["id"].'" RncEmpresaCompras="'.$value["Rnc_Empresa_Compras"].'" Codigo="'.$value["CodigoCompra"].'" RncFactura606="'.$value["Rnc_Suplidor"].'" NCF_606="'.$value["NCF_Factura"].'"><i class="fa fa-copy"></i></button>';


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

      
    </section>


   </div>

 <!--************************************************
                      MODAL Editat USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalCorrelativoNoFiscal" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

<!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="DCI" readonly>

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
<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Categoría</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCategoria" name="RncEmpresaCategoria" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioCategoria" name="UsuarioCategoria" value="<?php echo $_SESSION["Usuario"];?>" readonly>
               <input type="hidden" class="form-control " id="ModuloCategorias" name="ModuloCategorias" value="crear-compra-inventario" readonly>

            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <input type="text" class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" placeholder="Ingresar Categoría" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Categoría</button>

      </div>
      <?php 
      

      $crearCategoria = new ControladorCategorias();
      $crearCategoria -> ctrCrearCategoria();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>


<!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarProductos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Productos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
<input type="hidden" class="form-control" name="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
<input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $_SESSION["idEmpresa"];?>">

<input type="hidden" class="form-control " id="UsuarioProductos" name="UsuarioProductos" value="<?php echo $_SESSION["Usuario"];?>" readonly>

<input type="hidden" class="form-control " id="ModuloProducto" name="ModuloProducto" value="crear-compra-inventario" readonly>

<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">


            </div>


          </div>
         <?php 
    if($_SESSION["Contabilidad"] == 1){
      echo ' <div class="form-group">
            <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-th"></i></span>
  <select class="form-control input" id="plancuentaProducto" name= "plancuentaProducto" required>';

  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 4;
                    
              $planBanco = ControladorProductos::ctrplanProductos($Rnc_Empresa_Cuentas, $id_grupo);

                foreach ($planBanco as $key => $value) {
                  if($value["id_grupo"] == 4 && $value["id_categoria"] == 9 && $value["id_generica"] == "01" && $value["id_subgenerica"] == "001"){ 
                  
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                 }
                 
                  
                }
                 foreach ($planBanco as $key => $value) {
                
                  
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
               
                  
                }

echo'</select>
              </div>
            </div>';

    }else{


}


     ?>


          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control" id="nuevaCategoria" name="nuevaCategoriaproductos" required>
                <option value="">Selecionar Categoria</option>
                
                <?php 
                $Rnc_Empresa_Categoria = $_SESSION["RncEmpresaUsuario"];

                $categorias = ControladorCategorias::ctrMostrarCategorias($Rnc_Empresa_Categoria);

                foreach ($categorias as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Categoria"].'</option>';
                  
                }

                 ?>
               
              </select>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control" id="nuevoTipo" name="nuevoTipo" required>
                <option value="">Selecionar Tipo de Producto</option>
                <option value="1">Venta</option>
                <option value="2">Servicio</option>
                <option value="3">Alquiler</option>
                
              
               
              </select>

            </div>

          </div>

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Código" required>

            </div>

          </div>
          

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>

            </div>

          </div>
        


          <div class="form-group">

            <div class="panel">SUBIR IMAGEN</div>
            <input type="file" class="nuevaImagen" name="nuevaImagen">
            <p class="help-block">Peso maximo de la IMAGEN 2MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>
         
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Productos</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $crearProductos = new ControladorProductos();
      $crearProductos -> ctrCrearProducto();




     ?>

    </div>

  </div>
</div>

 <!--************************************************
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
        <input type="hidden" class="form-control input-lg" id="ModuloSuplidor" name="ModuloSuplidor" value="crear-compra-inventario" readonly>

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
              
             
              <input type="text" class="form-control input-lg" name="nuevoTelefonoSuplidor" placeholder="Ingresar Teléfono">


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
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->



