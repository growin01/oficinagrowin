
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-file-text-o"></i>
       COPIAR REGISTRO 607
        
    </h1>
      <a href="registro-607" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Nuevo</a>

  <a href="reporte-607" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Reporte 607</a>
   <a href="cuadre-itbis" class="btn btn-success"><i class="fa fa-pie-chart" style="padding-right:5px"></i>Cuadre Itbis</a>

   <button class="btn btn-success" data-toggle="modal" data-target="#modalDescarga607"><i class="fa fa-file-text-o" style="padding-right:5px"></i>Descarga de TXT 607</button>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Copiar Registro 607</li>
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

            <form role="form" method="post">

            <div class="box-body">
              <?php 

                  $Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];
                  $Valor_id607 =  $_GET["id_607"];
                  $id_607  = "id";
                  $Orden = "id";
                  
                  

                  $EditarRegistro607 = Controlador607::ctrMostrar607($Rnc_Empresa_607, $id_607, $Valor_id607, $Orden);
                 
                 
                   ?>

             

             
                <div class="box">
        <input type="hidden"  id="RncEmpresa607" name="RncEmpresa607" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
        <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">


                  <!--=================================================
                  ENTRADA DEL VENDEDOR 
                  =======================================================-->

              <div style="padding-right: 0px"  class="form-group col-lg-6">
   

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
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
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
echo' <select class="form-control"  id="NCF607" name="NCF607" required>
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
                            <option value="E34">E34</option>
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
                            <option value="E34">E34</option>
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
                            <option value="E34">E34</option>
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
                            <option value="E34">E34</option>
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
                            <option value="E34">E34</option>
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
                            <option value="E34">E34</option>
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
                            <option value="E34">E34</option>
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

echo'<input type="text" maxlength="10" class="form-control input-NCF-607" id="CodigoNCF607" name="CodigoNCF607" value='. $_SESSION['CodigoNCF607'].' required readonly>';

}else {
echo'<input type="text" maxlength="10" class="form-control input-NCF-607" id="CodigoNCF607" name="CodigoNCF607" placeholder="NCF" required>';

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


                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoCliente">
                      <?php 
                      if($EditarRegistro607["Tipo_Id_Factura_607"] == 1){
                        echo ' <input type="radio" Class="Juridico_607" name="Tipo_cliente_607" id="juridico_607" value="1" required checked> Jurídico                  
                          <input type="radio" Class="Fisico_607" name="Tipo_cliente_607" id="fisico_607" value="2" required> Fisico';


                      } else {
                         echo ' <input type="radio" Class="Juridico_607" name="Tipo_cliente_607" id="juridico_607" value="1" required > Jurídico                  
                          <input type="radio" Class="Fisico_607" name="Tipo_cliente_607" id="fisico_607" value="2" required checked> Fisico';





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

                    <input type="text" class="form-control input-RNC" maxlength="11" id="Rnc_Factura_607" name="Rnc_Factura_607" value="<?php echo $EditarRegistro607["Rnc_Factura_607"];?>" required>

                  </div>

                </div>
                
                  <!--=================================================
                    ENTRADA DEL CODIGO DE LA VENTA======================================================-->
                   <!--=================================================-->


                  <div class="form-group">

                   
                  <div class="input-group form-control">

                    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                    <input type="text"  class="col-xs-8" id="Nombre_Empresa_607" name="Nombre_Empresa_607" value="<?php echo $EditarRegistro607["Nombre_Empresa_607"];?>" readonly required>
                    <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarcliente">Agregar cliente
                    </button>

                  </div>

                </div>
                
              

               
                  
                   <div class="form-group">

                    
                    <div class="col-xs-4 right" style="padding-right:0px">

                      
                        <label>Monto Facturado</label>
                        <br>

                        <input type="number" class="form-control" min=0 step="any" id="Monto_Facturado_607" name="Monto_Facturado_607" value="<?php echo $EditarRegistro607["Monto_Facturado_607"];?>" required>



                      </div>
                      
                       
                      
                  

                     <div class="col-xs-4" style="padding-right:0px">

                      
                        <label>ITBIS Facturado</label>
                        <br>

                        <input type="number" class="form-control" min=0 step="any" id="ITBIS_Facturado_607" name="ITBIS_Facturado_607" value="<?php echo $EditarRegistro607["ITBIS_Facturado_607"];?>" required>


                      </div>


                      <div class="col-xs-4 left" style="padding-right:0px">

                      
                        <label>Otro Impuesto</label>
                        <br>

                        <input type="number" class="form-control"  min=0 step="any" id="Otros_Impuestos_607" name="Otros_Impuestos_607" value="<?php echo $EditarRegistro607["Otros_Impuestos_607"];?>" required>


                      </div>
                      <br>
                      

                      

                    </div>
                    <br>

                    

                   
<div class="col-lg-12"><br></div>
             
                  

                    <!--*****************CHECKBOX DE PORCENTAJE********************** -->
                     <div class="col-xs-6 right">

              <div class="form-group">

                    <div class="input-group form-control FormaIngreso">

                      <label>Tipo de Ingreso</label><br>
                      <?php 
                      $Tipo_de_Ingreso_607 = $EditarRegistro607["Tipo_de_Ingreso_607"];

                      switch ($Tipo_de_Ingreso_607){
                        case "01":
                        echo ' <input type="radio" name="Tipo_de_Ingreso" value="01" required checked>01-INGRESO POR OPERACIONES (No Financieras)
                        <br>
                        <input type="radio" name="Tipo_de_Ingreso" value="02" required>02-INGRESOS FINANACIEROS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="03" required>03-INGRESOS EXTRAORDINARIOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="04" required>04-INGRESOS POR ARRENDAMIENTOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="05" required>05-INGRESOS POR VENTA DE ACTIVO DEPRECIABLE<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="06" required>06-OTROS INGRESOS<br>';

                        break;
                         case "02":
                        echo ' <input type="radio" name="Tipo_de_Ingreso" value="01" required>01-INGRESO POR OPERACIONES (No Financieras)
                        <br>
                        <input type="radio" name="Tipo_de_Ingreso" value="02" required checked>02-INGRESOS FINANACIEROS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="03" required>03-INGRESOS EXTRAORDINARIOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="04" required>04-INGRESOS POR ARRENDAMIENTOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="05" required>05-INGRESOS POR VENTA DE ACTIVO DEPRECIABLE<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="06" required>06-OTROS INGRESOS<br>';

                        break;
                         case "03":
                        echo ' <input type="radio" name="Tipo_de_Ingreso" value="01" required>01-INGRESO POR OPERACIONES (No Financieras)
                        <br>
                        <input type="radio" name="Tipo_de_Ingreso" value="02" required>02-INGRESOS FINANACIEROS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="03" required checked>03-INGRESOS EXTRAORDINARIOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="04" required>04-INGRESOS POR ARRENDAMIENTOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="05" required>05-INGRESOS POR VENTA DE ACTIVO DEPRECIABLE<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="06" required>06-OTROS INGRESOS<br>';

                        break;
                        case "04":
                        echo ' <input type="radio" name="Tipo_de_Ingreso" value="01" required>01-INGRESO POR OPERACIONES (No Financieras)
                        <br>
                        <input type="radio" name="Tipo_de_Ingreso" value="02" required>02-INGRESOS FINANACIEROS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="03" required>03-INGRESOS EXTRAORDINARIOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="04" required checked>04-INGRESOS POR ARRENDAMIENTOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="05" required>05-INGRESOS POR VENTA DE ACTIVO DEPRECIABLE<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="06" required>06-OTROS INGRESOS<br>';

                        break;
                        case "05":
                        echo ' <input type="radio" name="Tipo_de_Ingreso" value="01" required>01-INGRESO POR OPERACIONES (No Financieras)
                        <br>
                        <input type="radio" name="Tipo_de_Ingreso" value="02" required>02-INGRESOS FINANACIEROS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="03" required>03-INGRESOS EXTRAORDINARIOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="04" required>04-INGRESOS POR ARRENDAMIENTOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="05" required checked>05-INGRESOS POR VENTA DE ACTIVO DEPRECIABLE<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="06" required>06-OTROS INGRESOS<br>';

                        break;
                        case "06":
                        echo ' <input type="radio" name="Tipo_de_Ingreso" value="01" required>01-INGRESO POR OPERACIONES (No Financieras)
                        <br>
                        <input type="radio" name="Tipo_de_Ingreso" value="02" required>02-INGRESOS FINANACIEROS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="03" required>03-INGRESOS EXTRAORDINARIOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="04" required>04-INGRESOS POR ARRENDAMIENTOS<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="05" required>05-INGRESOS POR VENTA DE ACTIVO DEPRECIABLE<br>
                        <input type="radio" name="Tipo_de_Ingreso" value="06" required checked>06-OTROS INGRESOS<br>';

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
                      $extraer_forma_de_pago_607 = $EditarRegistro607["extraer_forma_de_pago_607"];

                      switch ($extraer_forma_de_pago_607){
                        case "01":
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
                        case "02":
                        echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
                        <br>
                        <input type="radio" name="Forma_De_Pago_607" id="CHEQUES_TRANSFERENCIAS_DEPOSITO" value="2" required checked>02-CHEQUES/TRANSFERENCIAS/DEPOSITO<br>
                        <input type="radio" name="Forma_De_Pago_607" id="TARJETA_CREDITO_DEBITO" value="03" required>03-TARJETA CREDITO/DEBITO<br>
                        <input type="radio" class="Dias_Credito" name="Forma_De_Pago_607" id="VENTA A CREDITO" value="04" required>04-VENTA A CREDITO<br>
                       
                        <div id="div1" style="display:;">
                          
                          
                        </div>
                        <input type="radio" name="Forma_De_Pago_607" id="BONOS_CERTIFICADOS_REGALOS" value="05" required>05-BONOS CERTIFICADOS REGALOS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="PERMUTAS" value="06" required>06-PERMUTAS<br>
                        <input type="radio" name="Forma_De_Pago_607" id="OTRAS_FORMAS_DE_VENTAS" value="07" required>07-OTRAS FORMAS DE VENTAS<br>';

                        break;
                        case "03":
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
                        case "04":
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
                        case "05":
                        echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
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
                        case "06":
                        echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
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
                        case "07":
                        echo ' <input type="radio" name="Forma_De_Pago_607" id="EFECTIVO" value="01" required>01-EFECTIVO
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




                       ?>

                     

                   
                       
                        
                    </div>

                  

                  </div>
                  </div>
                  <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>TIPO DE GASTO</label><br> 
                      <?php 
                       if ($EditarRegistro607["B04MeMa_607"]  == "1"){
                        echo ' <input type="radio" name="B04MeMa_607" value="1" checked>NC Menor de 30 días
                        <br>
                        <input type="radio" name="B04MeMa_607" value="2">NC Mayor de 30 días <br>
                        ';


                       } else if ($EditarRegistro607["B04MeMa_607"]  == "2"){
                        echo ' <input type="radio" name="B04MeMa_607" value="1">NC Menor de 30 días
                        <br>
                        <input type="radio" name="B04MeMa_607" value="2" checked>NC Mayor de 30 días <br>
                        ';
                         }
                         else {
                        echo ' <input type="radio" name="B04MeMa_607" value="1">NC Menor de 30 días
                        <br>
                        <input type="radio" name="B04MeMa_607" value="2">NC Mayor de 30 días <br>
                        ';
                         }


      


                       ?>

                               


                   
                    </div>

                  

                  </div>
                  </div>


                  

                   <div class="col-xs-6 right">

                      <div class="form-group">

                        <div class="input-group form-control Formapago">

                          <label>TRANSCCIÓN</label><br>
                           <?php 
                          $Tipo_Transaccion_607 = $EditarRegistro607["Transaccion_607"];                  

                  switch ($Tipo_Transaccion_607){ 
                        
                        case "1":
                        echo '<input type="radio" name="Transaccion_607" id="Personal_607" value="1" checked>Personal
                            
                            <input type="radio" name="Transaccion_607" id="Empresarial_607" value="2">Empresarial
                             <br>';
                            
                            break;

                            case "2":
                            echo '<input type="radio" name="Transaccion_607" id="Personal_607" value="1">Personal
                            
                            <input type="radio" name="Transaccion_607" id="Empresarial_607" value="2" checked>Empresarial
                             <br>';
                              break;
                              
                               case "3":
                            echo '<input type="radio" name="Transaccion_607" id="Personal_607" value="1">Personal
                            
                            <input type="radio" name="Transaccion_607" id="Empresarial_607" value="2">Empresarial
                             <br>';
                              break;
                              }
                      


                          ?>
                       
                           
                            
                            <label>Fecha de Pago</label><br>

                            <input type="text" class="col-xs-6 Fecha_Trans_AnoMes" maxlength="6" id="FechaPagomes607" name="FechaPagomes607" value="<?php echo $EditarRegistro607["Fecha_Trans_AnoMes_607"];?>">

                            <input type="text" class="col-xs-6 Fecha_Trans_Dia" id="FechaPagodia607" name="FechaPagodia607" value="<?php echo $EditarRegistro607["Fecha_trans_dia_607"];?>"><br>

                            <label>Referecnia</label><br>
                            <input type="text" class="col-xs-12"  id="Referencia_607" name="Referencia_607" value="<?php echo $EditarRegistro607["Referencia_Pago_607"];?>">
                            <br>
                            <select type="text" class="form-control" id="agregarBanco" name="agregarBanco">
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
                    
                     <div class="col-xs-9">
                      <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-audio-description"></i></span>

                      
                     
                      <input type="text" class="form-control" id="Descripcion" name="Descripcion" value="<?php echo $EditarRegistro607["Descripcion_607"];?>">

                     </div>
                     

                    </div>
                   

                  </div>
                  
<div class="col-xs-12"></div>  
            <div class="box-footer">
<button type="submit" class="btn btn-success pull-right">Copiar y Registrar</button>
              <?php

                    if(isset($_SESSION['FechaFacturadia_607'])){
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
                        unset($_SESSION["FechaPagomes607"]);
                        unset($_SESSION["FechaPagodia607"]);
                        unset($_SESSION["Referencia_607"]);
                        unset($_SESSION["Descripcion"]);
                    }

              ?>


                     
            </div>
          
          </div>
          <?php 

          $CopiarRegistro607 = new Controlador607();
          $CopiarRegistro607 -> ctrRegistrar607();



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
              if(isset($_GET["periodoreporte607"])){
               $periodoreporte607 = $_GET["periodoreporte607"];
              }else{
               $periodoreporte607 = $_SESSION["Anologin"];

               }
              $Orden = "id";



              $Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];

              $reporte607 = Controlador607::ctrMostrarReporte607($Rnc_Empresa_607, $Orden, $periodoreporte607);

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
                           <td>';

if($_SESSION["Contabilidad"] == 1){
  if($value["Modulo"] == "607"){
   
      echo'<button class="btn btn-warning btn-xs btnEditar607" id_607="'.$value["id"].'" modulo = "reporte-607" data-toggle="modal" data-target="#modalEditar607" ><i class="fa fa-pencil"></i></button>
      <button class="btn btn-primary btn-xs btnCopiar607" id_607="'.$value["id"].'" modulo = "reporte-607" data-toggle="modal" data-target="#modalEditar607" ><i class="fa fa-copy"></i></button>
      <button class="btn btn-primary btn-xs btnAsignarIngresoDiario" id_607="'.$value["id"].'"><i class="glyphicon glyphicon-book"></i></button>
      <button class="btn btn-danger btn-xs btnEliminar607" id_607="'.$value["id"].'"><i class="fa fa-times"></i></button>';
     
    }

  }else{
  
    echo '<div class="btn-group">
    <button class="btn btn-warning btn-xs btnEditar607" id_607="'.$value["id"].'" modulo = "reporte-607" data-toggle="modal" data-target="#modalEditar607" ><i class="fa fa-pencil"></i></button>
     <button class="btn btn-primary btn-xs btnCopiar607" id_607="'.$value["id"].'" modulo = "reporte-607" data-toggle="modal" data-target="#modalEditar607" ><i class="fa fa-copy"></i></button>
    <button class="btn btn-danger btn-xs btnEliminar607" id_607="'.$value["id"].'"><i class="fa fa-times"></i></button>
          </div>';
  
    echo '<button class="btn btn-primary btn-xs btnRetener607" id_607="'.$value["id"].'" Rnc_Empresa_607="'.$_SESSION["RncEmpresaUsuario"].'"data-toggle="modal" data-target="#modalRetener607" ><i class="fa fa-university"></i></button>';
  }
                      

                            '</td>             

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
                    <input type="hidden" class="form-control" maxlength="11" id="Codigo_Factura" name="Codigo_Factura"required readonly>
                    <input type="hidden" class="form-control" maxlength="11" id="Forma_De_Pago" name="Forma_De_Pago"required readonly>


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
                    CIERRE DE  MODAL AGREGAR SUPLIDOR
  ******************************************************* -->
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

       
        
       <a id="descargartxt607">descargar</a>
        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>
