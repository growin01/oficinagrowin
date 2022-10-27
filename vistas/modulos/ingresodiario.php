
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-3" style="font-size: 30px"><i class="glyphicon glyphicon-book"></i>
          DIARIO DE INGRESOS
        
      </h1>


    <a href="ingresodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Nuevo</a>

  <a href="gastodiario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Diario de Gasto</a>
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
                
                $Tipo_NCF = "DDI";

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

            <form role="form" method="post" class="IngresoCuenta">

            <div class="box-body">

             
                <div class="box">
<input type="hidden"  id="RncEmpresa606" name="RncEmpresa606" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden"  id="RncEmpresa607" name="RncEmpresa607" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
<input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
<input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
<input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">



<div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>


    <input type="text" class="form-control Fechames_607" maxlength="6" id="FechaFacturames_607" name="FechaFacturames_607" value="<?php if (isset($_SESSION['FechaFacturames_607'])){ echo $_SESSION['FechaFacturames_607'];}?>" placeholder="Año/Mes Ejemplo 202001" required autofocus>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
  
     <input type="text" class="form-control Fechadia_607" maxlength="2" id="FechaFacturadia_607" name="FechaFacturadia_607" value="<?php if (isset($_SESSION['FechaFacturadia_607'])){ echo $_SESSION['FechaFacturadia_607'];}?>" placeholder="Día Ejemplo 01" required>

 
 </div>  
  
  
</div>

<div class="col-lg-12"></div>
<br>
<div class="col-xs-3" style="padding-right:0px">
                     

        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    
      <?php  
if(isset($_SESSION["NCF607"])){
                         
$NCF607 = $_SESSION["NCF607"];

switch ($NCF607) {

case 'B01':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';
    
break;
case 'B02': 
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="B02">B02</option>
                            <option value="B01">B01</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';


break;
case 'B03':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="B03">B03</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';

break;
case 'B04':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="B04">B04</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';

break;
case 'B11':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="B11">B11</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';

break;
case 'B12':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="B12">B12</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';
 
break;
case 'B14':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="B14">B14</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'B15':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="B15">B15</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'B16':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="B16">B16</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'E31':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="E31">E31</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'E32':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="E32">E32</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'E33':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="E33">E33</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'E41':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="E41">E41</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case 'E42':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="E42">E42</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case 'E44':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="E44">E44</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>        
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case 'E45':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="E45">E45</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>                    
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case '+O':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="+O">+O</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>      
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case '-O':
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            <option value="-O">-O</option>
                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            
                     </select>'; 

break; 
}
}else{
  echo' <select class="form-control"  id="NCF607" name="NCF607" required>
                            

                            <option value="B01">B01</option>
                            <option value="B02">B02</option>
                            <option value="B03">B03</option>
                            <option value="B04">B04</option>
                            <option value="B11">B11</option>
                            <option value="B12">B12</option>
                            <option value="B14">B14</option>
                            <option value="B15">B15</option>
                            <option value="B16">B16</option>
                            <option value="E31">E31</option>
                            <option value="E32">E32</option>
                            <option value="E33">E33</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>
                            
                     </select>'; 


}

?>          
                     
          </div>


</div>
<div class="col-xs-4" style="padding-left:0px">
                   
    <div class="input-group">
      
<?php 
      
if(isset($_SESSION["CodigoNCF607"])){

echo'<input type="text" maxlength="13" class="form-control input-NCF-607" id="CodigoNCF607" name="CodigoNCF607" value='. $_SESSION['CodigoNCF607'].' required readonly>';

}else {
echo'<input type="text" maxlength="13" class="form-control input-NCF-607" id="CodigoNCF607" name="CodigoNCF607" placeholder="NCF" required>';

 }
?>
       
      
    </div>
   
</div>
<div class="form-group col-lg-5" style="padding-left:0px">

    <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-key"></i></span>

<input type="text" class="form-control input-NCFMOD" maxlength="11" id="NCF_Modificado_607" name="NCF_Modificado_607" placeholder="NCF Afectado" value="<?php if (isset($_SESSION['NCF_Modificado_607'])){ echo $_SESSION['NCF_Modificado_607']; } ?>">

    </div>

</div>


<div class="form-group col-lg-12">

  <div class="input-group">

          <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

            <div class="input-group form-control TipoCliente">

                      <?php 
                      if(isset($_SESSION["Tipo_cliente_607"])){

                        $Tipo_cliente_607 = $_SESSION["Tipo_cliente_607"];

                        switch ($Tipo_cliente_607) {
                          case '1':
                          echo '<input type="radio" Class="Juridico_607" name="Tipo_cliente_607" id="juridico_607" value="1" required checked> Jurídico
                        <input type="radio" Class="Fisico_607" name="Tipo_cliente_607" id="fisico_607" value="2" required> Fisico';
                           
                            break;

                            case '2':
                          echo '<input type="radio" Class="Juridico_607" name="Tipo_cliente_607" id="juridico_607" value="1" required> Jurídico                    
                        <input type="radio" Class="Fisico_607" name="Tipo_cliente_607" id="fisico_607" value="2" required checked> Fisico';
                            break;

                             }
                          
                          
                          
                        }else{
                          echo '<input type="radio" Class="Juridico_607" name="Tipo_cliente_607" id="juridico_607" value="1" required> Jurídico
                        <input type="radio" Class="Fisico_607" name="Tipo_cliente_607" id="fisico_607" value="2" required> Fisico';

                        }

                     ?>

                   
                        
                   
                    </div>

                  </div>

                  </div>

                
<div class="form-group col-lg-12">

  <div class="input-group ">
        
        <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

          <input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura_607" name="Rnc_Factura_607" placeholder="Ingresar RNC o Cédula" value="<?php if (isset($_SESSION['Rnc_Factura_607'])){ echo $_SESSION['Rnc_Factura_607']; } ?>" required>

  </div>
</div>
              
 <div class="form-group col-lg-12">

                   
    <div class="input-group form-control">

        <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

  <input class="form-control" type="text"  class="col-xs-8" id="Nombre_Empresa_607" name="Nombre_Empresa_607" placeholder="Nombre del Cliente" value="<?php if (isset($_SESSION['Nombre_Empresa_607'])){ echo $_SESSION['Nombre_Empresa_607']; } ?>" readonly requiered>
  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAgregarcliente">Agregar cliente
                    </button>

    </div>

</div>
               
                  
<div class="form-group">
                    
  <div class="col-xs-4 right" style="padding-right:0px">

                      
      <label>Monto Facturado</label>
      <br>

  <input type="number" class="form-control" min=0 step="any" id="Monto_Facturado_607" name="Monto_Facturado_607" value="<?php if (isset($_SESSION['Monto_Facturado_607'])){ echo $_SESSION['Monto_Facturado_607']; } ?>" required>

  </div>
                      
                       
<div class="col-xs-4" style="padding-right:0px">

    <label>ITBIS Facturado</label>
    <br>

    <input type="number" class="form-control" min=0 step="any" id="ITBIS_Facturado_607" name="ITBIS_Facturado_607" value="<?php if (isset($_SESSION['ITBIS_Facturado_607'])){ echo $_SESSION['ITBIS_Facturado_607']; } ?>" required>

</div>

<div class="col-xs-4 left" style="padding-right:0px">

  <label>Otro Impuesto</label>
    <br>

<input type="number" class="form-control" min=0 step="any" id="Otros_Impuestos_607" name="Otros_Impuestos_607" value="<?php if (isset($_SESSION['Otros_Impuestos_607'])){ echo $_SESSION['Otros_Impuestos_607']; } ?>" required>


  </div>

<br>
                      
</div>

<div class="col-lg-12"><br></div>

                    <!--*****************CHECKBOX DE PORCENTAJE********************** -->
                     <div class="col-xs-6 right">

              <div class="form-group">

                    <div class="input-group form-control Formapago">

                      <label>Tipo de Ingreso</label><br>

                     

                   
                        <input type="radio" name="Tipo_de_Ingreso" value="01" required checked>01-INGRESO POR OPERACIONES (No Financieras)
                        <br>
                        <input type="radio" name="Tipo_de_Ingreso" value="02" required>02-INGRESOS FINANACIEROS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="03" required>03-INGRESOS EXTRAORDINARIOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="04" required>04-INGRESOS POR ARRENDAMIENTOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="05" required>05-INGRESOS POR VENTA DE ACTIVO DEPRECIABLE<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="06" required>06-OTROS INGRESOS<br>
                        
                    </div>

                  

                  </div>
                  </div>
            
              
<div class="col-xs-6 right">

              <div class="form-group">

                    <div class="input-group form-control Formapago">

                      <label>FORMA DE PAGO</label><br>

                      <?php 
                      
                      if (isset($_SESSION["Forma_De_Pago_607"])) {
                        
                        $Forma_De_Pago = $_SESSION["Forma_De_Pago_607"];

                        switch ($Forma_De_Pago){
                          
                          case '01':
                        echo '<input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required checked>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>';
                          break;
                          
                          case '02':
                              echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required checked>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>';
                          break;
                          
                          case '03':
                              echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required checked>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>';
                          break;
                        
                        case '04':
                              echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required checked>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>';
                          break;
                        case '05':
                              echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required checked>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required checked>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>';
                          break;
                          case '06':
                              echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required checked>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required checked>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>';
                          break;
                          case '07':
                              echo '<input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required checked>07-OTRAS FORMAS DE VENTAS<br>';
                          break;
                         
                        }
                      

                      } else {
                        echo '<input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="02" required>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>';
                      }



                       ?>

                        
                    </div>

                  

                  </div>
                  </div>
                  <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>TIPO DE GASTO</label><br>

                      <?php 
                      if (isset($_SESSION["B04MeMa_607"])){

                      $B04MeMa_607 = $_SESSION["B04MeMa_607"];

                      switch ($B04MeMa_607 ) {
                        case '1':
                          echo '<input type="radio" name="B04MeMa_607" value="1" checked>NC Menor de 30 días
                        <br>
                        <input type="radio" name="B04MeMa_607" value="2">NC Mayor de 30 días <br>
                        ';
                          break;
                          case '2':
                          echo '<input type="radio" name="B04MeMa_607" value="1">NC Menor de 30 días
                        <br>
                        <input type="radio" name="B04MeMa_607" value="2" checked>NC Mayor de 30 días <br>
                        ';
                         break;

                        default:
                        echo '<input type="radio" name="B04MeMa_607" value="1">NC Menor de 30 días<br>
                        <input type="radio" name="B04MeMa_607" value="2">NC Mayor de 30 días <br>';

                         
                        break;
                        
                        
                      }
                        
                      }else{
                        echo '<input type="radio" name="B04MeMa_607" value="1">NC Menor de 30 días<br>
                        <input type="radio" name="B04MeMa_607" value="2">NC Mayor de 30 días <br>';

                        

                      }





                       ?>                  

                   
                        

                   
                    </div>

                  

                  </div>
                  </div>


                  

                   <div class="col-xs-6 right">

                      <div class="form-group">

                        <div class="input-group form-control">

                          <label>TRANSACCIÓN</label><br>
                          <?php 
                          if (isset($_SESSION["Transaccion_607"])) {

                            $Transaccion_607 = $_SESSION["Transaccion_607"];

                            switch ($Transaccion_607) {
                              case '1':
                              echo '<input type="radio" name="Transaccion_607" id="Personal_607" value="1" checked>Personal
                            
                            <input type="radio" name="Transaccion_607" id="Empresarial_607" value="2">Empresarial
                             <br>';
                                
                                break;
                              case '2':
                              echo '<input type="radio" name="Transaccion_607" id="Personal_607" value="1">Personal
                            
                            <input type="radio" name="Transaccion_607" id="Empresarial_607" value="2" checked>Empresarial
                             <br>';
                                
                                break;
                              
                            }
                           
                          }else{
                            echo '<input type="radio" name="Transaccion_607" id="Personal_607" value="1">Personal
                            
                            <input type="radio" name="Transaccion_607" id="Empresarial_607" value="2" checked>Empresarial
                             <br>';

                          }


                           ?>
                           </div>
                             
                        </div>

                      </div>
                       
                       
                           
                    <div class="col-xs-12 pull-left banco">
                      <?php 
        if(isset($_SESSION["ModuloBanco"]) && $_SESSION["ModuloBanco"] == "Activo" && isset($_SESSION["FechaPagomes607"]) && isset($_SESSION["FechaPagodia607"])){
          echo '<div class="form-group">
        <div class="input-group form-control"> 
                           
         <label>BANCO</label><br>

        <label class="col-xs-4">Fecha de Pago</label>
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
        <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes607" name="FechaPagomes607" placeholder="Año/Mes" value="'.$_SESSION['FechaPagomes607'].'" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia607" name="FechaPagodia607" placeholder="Día" value="'.$_SESSION["FechaPagodia607"].'" required><br>
        
        <input type="text" class="col-xs-3"  id="Referencia_607" name="Referencia_607" placeholder="Referencia del Pago" maxlength="6" value="'.$_SESSION["Referencia_607"].'" required>
        
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





          }else if(isset($_SESSION["ModuloBanco"]) && $_SESSION["ModuloBanco"] == "Desactivado" && isset($_SESSION["FechaPagomes607"]) && isset($_SESSION["FechaPagodia607"])){

            echo'<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes607" name="FechaPagomes607" value="'.$_SESSION['FechaPagomes607'].'" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia607" name="FechaPagodia607" value="'.$_SESSION['FechaPagodia607'].'" required><br>
        <input type="hidden" class="col-xs-3" maxlength="6" id="Referencia_607" name="Referencia_607" placeholder="Referencia del Pago" value="">
        <input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>';

          }else if(isset($_SESSION["ModuloBanco"]) && $_SESSION["ModuloBanco"] == "Activo" && isset($_SESSION["FechaPagomes607"]) && !isset($_SESSION["FechaPagodia607"])){ 
            echo '<div class="form-group">
        <div class="input-group form-control"> 
                           
         <label>BANCO</label><br>

        <label class="col-xs-4">Fecha de Pago</label>
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
        <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>
        <input type="text" class="col-xs-2 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes607" name="FechaPagomes607" placeholder="Año/Mes" value="'.$_SESSION['FechaPagomes607'].'" required>
        <input type="text" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia607" name="FechaPagodia607" placeholder="Día" value=""><br>
        
        <input type="text" class="col-xs-3" maxlength="6" id="Referencia_607" name="Referencia_607" placeholder="Referencia del Pago" value="">
        
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





          }else if(isset($_SESSION["ModuloBanco"]) && $_SESSION["ModuloBanco"] == "Desactivado" && isset($_SESSION["FechaPagomes607"]) && !isset($_SESSION["FechaPagodia607"])){

            echo'<input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Desactivado" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_AnoMes" id="FechaPagomes607" name="FechaPagomes607" value="'.$_SESSION['FechaPagomes607'].'" required readonly>
        <input type="hidden" class="col-xs-2 Fecha_Trans_Dia" id="FechaPagodia607" name="FechaPagodia607" value="" required readonly><br>
        <input type="hidden" class="col-xs-3" maxlength="6" id="Referencia_607" name="Referencia_607" placeholder="Referencia del Pago" value="NO APLICA">
        <input type="hidden" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="0" required>';

          }

          


    ?>
           </div>
                    
                     <div class="col-xs-12">
                      <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
                      
                      <input type="text" class="form-control" id="Descripcion" name="Descripcion" placeholder="Descripcion" value="<?php if (isset($_SESSION["Descripcion"])){ echo $_SESSION["Descripcion"]; } ?>" required>


                     </div>

                     

                    
                   

                  
                   <div class="form-group col-xs-6">
                        <br>

                   
                      <label><h3>Distribución Cuentas/Proyectos</h3></label>

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

                      $Rnc_Empresa_Diario = $_SESSION["RncEmpresaUsuario"];
                      $tipocod = "DDI";


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
                      $NAsiento = "DDI".$N;

                      

                      echo ' <input type="hidden" class="form-control" id="CodAsiento" name="CodAsiento" value="'.$N.'" readonly>
                      <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="'.$NAsiento.'" readonly>';
                      }
                    

                      




                       ?>

                     

                    </div>
                   

                  </div>
                     

                    </div>
                   

                  </div>
                  <br>

                
         
          
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
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
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
                    
                 
              

            <div class="box-footer col-xs-12">
              <button type="submit" class="btn btn-primary pull-right">Registrar</button>   
              <?php  
if(isset($_SESSION["FechaFacturadia_607"])){ 
unset($_SESSION["FechaFacturadia_607"]); 
unset($_SESSION["Rnc_Factura_607"] ); 
unset($_SESSION["NCF607"]);
unset($_SESSION["CodigoNCF607"]);
unset($_SESSION["NCF_Modificado_607"]); 
unset($_SESSION["Monto_Facturado_607"]); 
unset($_SESSION["ITBIS_Facturado_607"]); 
unset($_SESSION["Otros_Impuestos_607"]); 
unset($_SESSION["Nombre_Empresa_607"]);
unset($_SESSION["B04MeMa_607"]);
unset($_SESSION["FechaPagodia607"]);
unset($_SESSION["Referencia_607"]);
unset($_SESSION["Descripcion"]);
unset($_SESSION["listaCuentas"]); 

}

?>    
            </div>
          
          </div>
          <?php 

          $ingresoDiario = new ControladorDiario();
          $ingresoDiario -> ctringresodiario();


           ?>

          
          </form>
          
       
        </div>

          
      </div>
    
    </div>

         <!--=================================================
            LA TABLA  DE PRODUCTO
        =======================================================-->

        <div class="col-lg-4">

          <div class="box box-warning"></div>

          <div class="box-header with-border">

            <div class="box-body">

              <table class="display nowrap table table-bordered table-striped tabladiario607">
                
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
                    <th></th>
                    

                      

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
                                <button class="btn btn-warning btnRetener607 btn-xs" id_607="'.$value["id"].'" Rnc_Empresa_607="'.$_SESSION["RncEmpresaUsuario"].'"data-toggle="modal" data-target="#modalRetener607" ><i class="fa fa-university"></i></button>
                                
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
                        <td><button class="btn btn-primary agregarCuenta recuperarCuenta btn-xs" idgrupo="'.$i.'" idcategoria="'.$value["id_categoria"].'" idgenerica="'.$gene["id_generica"].'" idcuenta="'.$subgene["id_subgenerica"].'" NombreCuenta="'.$subgene["Nombre_subCuenta"].'" >+</button></td>
                          

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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="DDI" readonly>

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


  <!--************************************************
                      MODAL AGREGAR CLIENTE
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarcliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
    <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Cliente</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" class="form-control input-lg" id="RncEmpresaCliente" name="RncEmpresaCliente" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoCliente"  name="nuevoCliente" placeholder="Ingresar Nombre Completo" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          <!--*****************input de cedula o pasaporte********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar Documento" required>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->

           <!--*****************input de EMAIL********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" required>

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
           <!--*****************input de Telefocno********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Teléfono" data-inputmask="'mask': '(999) 999-9999'" data-mask required>

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->

            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Dirección" required>

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->

          <!--*****************input de FECHA DE NACIMIENTO********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar Fecha de Nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->
                     
          
        </div>

      
        
      </div>

      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Cliente</button>

      </div>
      <?php 
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();



       ?>
         
    </form>
    

    </div>

  </div>

</div>


<!--************************************************
                    CIERRE DE  MODAL AGREGAR CLIENTE
  ******************************************************-->
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

