
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        CONFIGURACIONES IDENTIDAD
      </h1>
    
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">configuraciones</li>
      </ol>
    </section>
    <br>
 <br>
    <!-- Main content -->
  <section class="content">

      <div class="row">

        <div class="col-xs-6">

          <div class="box box-success">
              


       <div class="box-header with-border">
                    
        </div>
       

 <form role="form" method="post" enctype="multipart/form-data">

            <div class="box-body">
                           
                <div class="box" >
                   <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                <h4 style="text-align: center;"><b>Configuración Identidad</b></h4>

                 
            </div>

       <div class="form-group">

                    <div class="input-group">

                       
  <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $respuesta["id"];?>">
  <input type="hidden" class="form-control" id="RncEmpresa" name="RncEmpresa" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
  <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>" readonly>
                    



                    </div>
                   

                  </div>

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>
                      

                      <input type="text" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>" readonly>
                    

                    </div>
                   

                  </div>
<div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                      

                      <input type="text" class="form-control" id="Nombre_Empresa" name="Nombre_Empresa" value="<?php echo $respuesta["Nombre_Empresa"]?>" required>
                    

                    </div>
                   

                  </div>
    
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                      

                      <input type="text" class="form-control" id="Descripcion_Empresa" name="Descripcion_Empresa" value="<?php echo $respuesta["Descripcion_Empresa"]?>">
                    

                    </div>
                   

                  </div>

                   <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                      

                      <input type="text" class="form-control" id="Direccion_Empresa" name="Direccion_Empresa" value="<?php echo $respuesta["Direccion_Empresa"]?>">
                    

                    </div>
                   

                  </div>

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                      

                      <input type="text" class="form-control" id="Telefono_Empresa" name="Telefono_Empresa" value="<?php echo $respuesta["Telefono_Empresa"]?>">
                    

                    </div>
                   

                  </div>
                   <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                      

                      <input type="text" class="form-control" id="Correo_Empresa" name="Correo_Empresa" value="<?php echo $respuesta["Correo_Empresa"]?>">
                    

                    </div>
                   

                  </div>
      


               
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon">https://</span>
                      

                      <input type="text" class="form-control" id="Web_Empresa" name="Web_Empresa" value="<?php echo $respuesta["Web_Empresa"]?>">
                    

                    </div>
                   

                  </div>
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                      

                      <input type="text" class="form-control" id="Face_Empresa" name="Face_Empresa" value="<?php echo $respuesta["Face_Empresa"]?>">
                    

                    </div>
                   

                  </div>
  

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                      

                      <input type="text" class="form-control" id="Instagran_Empresa" name="Instagran_Empresa" value="<?php echo $respuesta["Instagran_Empresa"]?>">
                    

                    </div>
                   

                  </div>
            <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                <h4 style="text-align: center;"><b>Datos Gráfico de la factura</b></h4>

                 
            </div>

<div class="form-group col-lg-12">

        <div class="input-group">

          <span class="input-group-addon">Modelo de Factura</span>

                    <div class="input-group form-control">


          
              
   

    <?php 
    $Modelo_Factura = $respuesta["Modelo_Factura"];
switch ($Modelo_Factura) {
  case '1':
    echo '<input type="radio" name="Modelo_Factura" value="1" required checked>&nbsp;Estandar&nbsp;&nbsp;&nbsp;

<input type="radio" name="Modelo_Factura" value="2" required>&nbsp;Ejecutiva&nbsp;&nbsp;&nbsp;
                    
<input type="radio" name="Modelo_Factura" value="3" required>&nbsp;Comercial
                   
                 
';
  break;
  case '2':
    echo '<input type="radio" name="Modelo_Factura" value="1" required>&nbsp;Estandar&nbsp;&nbsp;&nbsp;

<input type="radio" name="Modelo_Factura" value="2" required checked>&nbsp;Ejecutiva&nbsp;&nbsp;&nbsp;
                    
<input type="radio" name="Modelo_Factura" value="3" required>&nbsp;Comercial
                   
                 
';
break;
case '3':
    echo '<input type="radio" name="Modelo_Factura" value="1" required>&nbsp;Estandar&nbsp;&nbsp;&nbsp;

<input type="radio" name="Modelo_Factura" value="2" required >&nbsp;Ejecutiva&nbsp;&nbsp;&nbsp;
                    
<input type="radio" name="Modelo_Factura" value="3" required checked>&nbsp;Comercial
                   
                 
';
  break;
  default:
echo '<input type="radio" name="Modelo_Factura" value="1" required checked>&nbsp;Estandar&nbsp;&nbsp;&nbsp;

<input type="radio" name="Modelo_Factura" value="2" required>&nbsp;Ejecutiva&nbsp;&nbsp;&nbsp;
                    
<input type="radio" name="Modelo_Factura" value="3" required>&nbsp;Comercial
                   
                 
';
break;

}




     ?>

                  


    </div>
                    
</div>
</div>
<div class="form-group col-lg-12">

        <div class="input-group">

          <span class="input-group-addon">Nombre Comercial en el encabezado de la Factura</span>

                    <div class="input-group form-control">
                      <?php 
                      if($respuesta["NombreEmpresaFactura"] == 1){
                        echo '<input type="radio" name="NombreEmpresaFactura"  value="1" required checked> Si
                      <input type="radio" name="NombreEmpresaFactura" value="2" required> No';


                      }else{
                         echo '<input type="radio" name="NombreEmpresaFactura"  value="1" required> Si
                      <input type="radio" name="NombreEmpresaFactura" value="2" required checked> No';



                      }


                       ?>

                      
                    </div>

            </div>

</div>


<div class="form-group col-xs-12">
                   

                <div class="input-group">
                 

                   <span class="input-group-addon">Informacion de Cuenta Bancaria</span>

                     
                      

              <input type="text" class="form-control" id="Factura_Banco" name="Factura_Banco" maxlength="122" value="<?php echo $respuesta["Factura_Banco"]?>">
                    

                  </div>
                   

            </div>


<div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                <h4 style="text-align: center;"><b>Configuración Colores de la Factura</b></h4>

                 
            </div>
             
            <div class="col-xs-12">
          
          <div class="form-group">

          

          <label>Seleccionar el color de Datos Factura</label>

          <input type="color" name="faccolor1" value="<?php echo $respuesta["faccolor1"]?>">
          <br>

          <label>Seleccionar el color de Datos Clientes</label>

          <input type="color" name="faccolor2" value="<?php echo $respuesta["faccolor2"]?>">
          <br>

          <label>Seleccionar el color De Observaciones Factura</label>

          <input type="color" name="faccolor3" value="<?php echo $respuesta["faccolor3"]?>">
        
          
        </div>

        </div>
      <div  class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">
         <h4 style="text-align: center;"><b>Informacion de Impresora Termica</b></h4>
                  

         </div>
            <div class="form-group">
                    <div class="input-group">

                      <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                      

                      <input type="text" class="form-control" id="Impresora" name="Impresora" value="<?php echo $respuesta["Impresora"]?>">
                    

                    </div>
                   

            </div>


        
         
                </div>  
            </div>
            

           


              
          </div>

          </div>
        
      
       
       <div class="col-xs-6">


          <div class="box box-warning">
            <div class="box-header with-border">
                   
                  <div class="col-xs-12"><br></div>
                  <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                <h4 style="text-align: center;"><b>Configuración Logo Empresarial</b></h4>

                 
  </div>
  <div class="form-group col-xs-12">
                   <h5 style="text-align: center;">Seleccionar Ancho del Logo de la Empresa en px</h5>

                <div class="input-group">
                 

                   <span class="input-group-addon"><i class="fa fa-text-width"></i></span>

                     
                      

              <input type="text" class="form-control" id="ancho" name="ancho" maxlength="3" value="<?php echo $respuesta["ancho"]?>">
                    

                  </div>
                   

            </div>
<div class="form-group col-xs-12">
      <h5 style="text-align: center;">Seleccionar Largo del Logo de la Empresa en px</h5>

      <div class="input-group">
                 

        <span class="input-group-addon"><i class="fa fa-text-height"></i></span>

                     
        <input type="text" class="form-control" id="largo" name="largo" maxlength="3" value="<?php echo $respuesta["largo"]?>">
                    

        </div>
                   

</div>
              

         <!--*****************SUBIR FOTO********************** -->

          <div class="form-group col-xs-12">

            <div class="panel">SUBIR LOGO DE LA EMPRESA</div>
            <input type="file" class="nuevoLogo" name="nuevoLogo">
            <p class="help-block">Peso maximo de la foto 8MB</p>

            <?php 
            if($respuesta["Logo"] != ""){
              echo "<img src=\"".$respuesta['Logo']."\" class='img-thumbnail previsualizar' width='350px'>";


            }else{

              echo '<img src="vistas/img/empresas/default/anonymous.png" class="img-thumbnail previsualizar" width="250px">';



            } 

             ?>
            
            <input type="hidden" name="LogoActual" id="LogoActual" value="<?php echo $respuesta["Logo"]?>">

          </div>
   <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                <h4 style="text-align: center;"><b>Configuración Sello Empresarial</b></h4>

                 
            </div>
          <div class="form-group col-xs-12">
                   <h5 style="text-align: center;">Seleccionar Ancho del Sello de la Empresa en px</h5>

                <div class="input-group">
                 

                   <span class="input-group-addon"><i class="fa fa-text-width"></i></span>

                     
                      

              <input type="text" class="form-control" id="anchoSello" name="anchoSello" maxlength="3" value="<?php echo $respuesta["anchoSello"]?>">
                    

                  </div>
                   

            </div>
<div class="form-group col-xs-12">
      <h5 style="text-align: center;">Seleccionar Largo del Sello de la Empresa en px</h5>

      <div class="input-group">
                 

        <span class="input-group-addon"><i class="fa fa-text-height"></i></span>

                     
        <input type="text" class="form-control" id="largoSello" name="largoSello" maxlength="3" value="<?php echo $respuesta["largoSello"]?>">
                    

        </div>
                   

</div>
  
           <div class="form-group col-xs-12">

            <div class="panel">SUBIR SELLO DIGITAL DE LA EMPRESA</div>
            <input type="file" class="nuevoSello" name="nuevoSello">
            <p class="help-block">Peso maximo de la foto 8MB</p>

            <?php 
            if($respuesta["Sello"] != ""){
              echo "<img src=\"".$respuesta['Sello']."\" class='img-thumbnail previsualizar' width='350px'>";


            }else{

              echo '<img src="vistas/img/empresas/default/anonymous.png" class="img-thumbnail previsualizar" width="250px">';



            } 

             ?>
            
            <input type="hidden" name="SelloActual" id="SelloActual" value="<?php echo $respuesta["Sello"]?>">
            <br>

          </div>
  
  <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                <h4 style="text-align: center;"><b>Módulos Activos Sistema Growin</b></h4>

                 
            </div>

     
              <?php 

           
                $Facturacion = $respuesta["Facturacion"]; 

                  switch ($Facturacion){

                     case "0":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Facturación</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Facturacion" value="1" required readonly>SI

                    
                    
                        <input type="radio" name="Facturacion" value="2" required readonly>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Facturación</label>

                      
                     <div class="input-group form-control">

                   
                    
                    
                        <input type="radio" name="Facturacion" value="2" required checked readonly>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                   case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Facturación</label>
                    <div class="input-group form-control">
                   
                        <input type="radio" name="Facturacion" value="1" required checked readonly>SI
                    </div>
                    

                    </div>
                   
                    
                  </div>';
                   break;
                  }
$Inventario = $respuesta["Inventario"]; 

                  switch ($Inventario){

                    case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Inventario</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Inventario" value="1" required checked>1-Compra-Venta


                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Inventario</label>

                      
                     <div class="input-group form-control">

                   
                       <input type="radio" name="Inventario" value="1" required checked>2-Activo Fijo

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                   case "3":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Inventario</label>

                   
                        <input type="radio" name="Facturacion" value="3" required checked>3-

                    </div>
                   
                    
                  </div>';
                   break;
                  }
                  /*****************CONTABILIDAD********************/
                   $Compras = $respuesta["Compras"]; 

                    
                    switch ($Compras){

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Compras</label>

                      
                     <div class="input-group form-control">

                  
                    
                        <input type="radio" name="Compras" value="2" required checked readonly>NO

                   
                    </div>

                       
                    </div>
                   
                    
                  </div>';
                   break;
                        case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Compras</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Compras" value="1" required checked readonly>SI

                  
                    
                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                     }
                  /*****************CONTABILIDAD********************/
                   $Contabilidad = $respuesta["Contabilidad"]; 

                    
                    switch ($Contabilidad){

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Contabilidad</label>

                      
                     <div class="input-group form-control">

                    
                    
                        <input type="radio" name="Contabilidad" value="2" required checked readonly>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                        case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Contabilidad</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Contabilidad" value="1" required checked readonly>SI

                    
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }

                  /*************************************************/ 
                  
                   /*****************BANCO********************/
                   $Banco = $respuesta["Banco"]; 

                    
                    switch ($Banco){

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Banco</label>

                      
                     <div class="input-group form-control">

                   
                    
                        <input type="radio" name="Banco" value="2" required checked readonly>NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                        case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Banco</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Banco" value="1" required checked readonly>SI

                    
                  
                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }

                  /*************************************************/ 
                  /*****************BANCO********************/
                   $Proyecto = $respuesta["Proyecto"]; 

                    
                    switch ($Proyecto){

                    case "2":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Proyecto</label>

                      
                     <div class="input-group form-control">

                   
                    
                    
                        <input type="radio" name="Proyecto" value="2" required checked readonly> NO

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                        case "1":

              
                  echo '<div class="form-group col-lg-4">

                      <div class="input-group">
                         <label>Proyecto</label>

                      
                     <div class="input-group form-control">

                   
                        <input type="radio" name="Proyecto" value="1" required checked readonly>SI

                    
                    

                   
                    </div>

                        
                        

                    </div>
                   
                    
                  </div>';
                   break;
                  }

                  /*************************************************/ 

                  
                  ?>
            
          

              </div>



 <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Modificar</button>

              
            </div>

          </form>
          <?php 

            $ConfiSocial = new ControladorEmpresas();
            $ConfiSocial -> ctrEditarConfiSocial();





           ?>

          </div>

      </div>
      

      </div>

      
  </section>


</div>

  