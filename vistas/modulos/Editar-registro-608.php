
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <section class="content-header">
<h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-file-text-o"></i>
        EDITAR REGISTRO 608
        
</h1>

<a href="registro-608" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Nuevo</a>

  <a href="reporte-608" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Reporte 608</a>
   <a href="cuadre-itbis" class="btn btn-success"><i class="fa fa-pie-chart" style="padding-right:5px"></i>Cuadre Itbis</a>

   <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga608"><i class="fa fa-file-text-o" style="padding-right:5px"></i>Descarga de TXT 608</button>
      
     
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

    

<form role="form" method="post" class="Registro608">

            <div class="box-body">
   <?php 

  $Rnc_Empresa_608 = $_SESSION["RncEmpresaUsuario"];
  $Valor_id608 =  $_GET["id_608"];
  $id_608  = "id";
  $Orden = "id";
                  
                  
  $EditarRegistro608 = Controlador608::ctrMostrar608($Rnc_Empresa_608, $id_608, $Valor_id608, $Orden);
                 
           
  ?>


             
    <div class="box">
      <br>
  <input type="hidden"  id="RncEmpresa608" name="RncEmpresa608" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
  <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">
  <input type="hidden" class="form-control" id="Editar_id_608" name="Editar_id_608" value="<?php echo $_GET["id_608"]?>">
  <input type="hidden" class="form-control" id="modulo" name="modulo" value="<?php echo $_GET["modulo"]?>">

    
<div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>


    <input type="text" class="form-control Fechames_608" maxlength="6" id="FechaFacturames_608" name="FechaFacturames_608" value="<?php echo $EditarRegistro608["Fecha_comprobante_AnoMes_608"];?>" required>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
  
     <input type="text" class="form-control Fechadia_608" maxlength="2" id="FechaFacturadia_608" name="FechaFacturadia_608" value="<?php echo $EditarRegistro608["Fecha_Comprobante_Dia_608"];?>" placeholder="Día Ejemplo 01" required autofocus>

 
 </div>  
  
  
</div>

<div class="col-lg-12"></div>
<br>
<div class="col-xs-3" style="padding-right:0px">
                     

        <div class="input-group">
  <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    
      <?php  
$NCF608 = $EditarRegistro608["EXTRAER_NCF_608"];


switch ($NCF608) {

case 'B01':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
                            
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';
    
break;
case 'B02': 
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';


break;
case 'B03':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';

break;
case 'B04':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';

break;
case 'B11':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';

break;
case 'B12':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>';
 
break;
case 'B14':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'B15':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'B16':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'E31':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'E32':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break;
case 'E33':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
                            <option value="E33">E33</option>
                            <option value="E34">E34</option>
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
case 'E34':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
                            <option value="E34">E34</option>
                            <option value="E34">E34</option>
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
case 'E41':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case 'E42':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case 'E44':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>        
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case 'E45':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>                    
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case '+O':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>      
                            <option value="-O">-O</option>

                     </select>'; 

break; 
case '-O':
echo' <select class="form-control"  id="NCF608" name="NCF608" required>
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
                            <option value="E34">E34</option>
                            <option value="E41">E41</option>
                            <option value="E42">E42</option>
                            <option value="E44">E44</option>
                            <option value="E45">E45</option>
                            <option value="+O">+O</option>
                            
                     </select>'; 

break; 
}


?>          
                     
          </div>


</div>

<?php  
$numero = substr($EditarRegistro608["NCF_608"], 3);

?>
<div class="col-xs-4" style="padding-left:0px">
                   
    <div class="input-group">
 
<input type="text" maxlength="10" class="form-control input-NCF-608" id="CodigoNCF608" name="CodigoNCF608" value="<?php echo $numero;?>" required>

     
      
    </div>
   
</div>

                 
<div class="col-lg-12"><br></div>

                     <div class="col-xs-6 right">

              <div class="form-group">

                    <div class="input-group form-control">


                      <label>Tipo de Anulación</label><br>
<?php  
  $Tipo_de_Anulacion_608 = $EditarRegistro608["Extraer_Tipo_Anulacion_608"];

    switch ($Tipo_de_Anulacion_608){

case "01":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required checked>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required >02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required >04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required >05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;

 case "02":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required checked>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required >04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required >05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;
  case "03":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required checked>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required >04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required >05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;
  case "04":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required >03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required checked>04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required >05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;
 case "05":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required >03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required>04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required checked>05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;
 case "06":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required>04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required>05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required checked>06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;
 case "07":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required>04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required>05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required checked>07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;
 case "08":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required>04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required>05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required checked>08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;
 case "09":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required>04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required>05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required checked>09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
 break;
  case "10":
echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required>04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required>05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required checked>10-Pérdida o hurto de talonarios(S)<br>';
 break;
 default:
 echo'<input type="radio" name="Tipo_de_Anulacion" value="01" required>01-Deterioro de factura Pre-impresa<br>
<input type="radio" name="Tipo_de_Anulacion" value="02" required>02-Errores de impresión (factura Pre-impresa)<br>
<input type="radio" name="Tipo_de_Anulacion" value="03" required checked>03-Impresión defectuosa<br>
<input type="radio" name="Tipo_de_Anulacion" value="04" required >04-Corrección de la información<br>
<input type="radio" name="Tipo_de_Anulacion" value="05" required >05-Cambio de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="06" required >06-Devolución de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="07" required >07-Omisión de productos<br>
<input type="radio" name="Tipo_de_Anulacion" value="08" required >08-Errores en secuencia de NCF<br>
<input type="radio" name="Tipo_de_Anulacion" value="09" required >09-Por cese de operaciones<br>
<input type="radio" name="Tipo_de_Anulacion" value="10" required >10-Pérdida o hurto de talonarios(S)<br>';
break;
 }
?> 

                    </div>

                  

                  </div>
                  </div>
            

       

            
                    
                     <div class="col-xs-9">
                      <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>
                      
                      <input type="text" class="form-control" id="Descripcion_608" name="Descripcion_608" placeholder="Descripcion" value="<?php echo $EditarRegistro608["Descripcion_608"];?>">

                     </div>
                     

                    </div>
                   

                  </div>
                  
<div class="col-xs-12"></div>            
<div class="box-footer">
<button type="submit" class="btn btn-warning pull-right">Modificar</button>

        

                     
            </div>
          
          </div>
          <?php 

          $EditarRegistro608 = new Controlador608();
          $EditarRegistro608 -> ctrEditar608();



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
                    <th>NCF</th>
                    <th style="width: 10px">Año/Mes</th>
                    <th style="width: 5px">Dia</th>
                    <th>Tipo de Anulacion</th>
                    <th>Módulo</th>
                    <th></th>
                    

                      

                  </tr>

                </thead>

                <tbody>

                    <?php 
                    

              $id_608 = null;
              $Valor_id608 = null;
              $Orden = "id";



              $Rnc_Empresa_608 = $_SESSION["RncEmpresaUsuario"];

              $reporte608 = Controlador608::ctrMostrar608($Rnc_Empresa_608, $id_608, $Valor_id608, $Orden);

               foreach ($reporte608 as $key => $value){

                          echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.$value["NCF_608"].'</td>
                            
                            <td>'.$value["Fecha_comprobante_AnoMes_608"].'</td>
                            <td>'.$value["Fecha_Comprobante_Dia_608"].'</td>
                            <td>'.$value["Tipo_de_Anulacion_608"].'</td>
                            <td>'.$value["Modulo"].'</td>';
                             /*condicion para editar 608*/
                if($value["Estatus"] != 3 && $value["EXTRAER_NCF_608"] != "FP1"){
                echo' <td><button title = "Editar el Registro 608" class="btn btn-warning btn-xs btnEditar608" id_608="'.$value["id"].'" modulo = "registro-608" data-toggle="modal" data-target="#modalEditar607"><i class="fa fa-pencil"></i></button></td>';
                 }else{echo'<td></td>';}

                            
                            

                            
                                      

 }/*cierre for*/
 
?>
                </tbody>


              </table>
              

            </div>
            

          </div>  


        </div>     

      </div>

      
    </section>


   </div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR SUPLIDOR
  ******************************************************* -->
