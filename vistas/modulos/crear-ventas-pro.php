
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="col-xs-5" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        FACTURA PROFORMA
        
      </h1>
      <a href="crear-ventas-pro" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Nuevo</a>
       <a href="crear-ventas" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura</a>
      <a href="crear-cotizacion" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Cotización</a>

   <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalles Ventas</a>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">crear-ventas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

        <div class="col-xs-6" style="padding-right: 0px;">
          
          <div class="box box-success">

            <div class="box-header with-border">
              <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "FP1";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


               if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }



               ?>
              
              
              

            </div>

            <form role="form" method="post" class="formularioVenta">

            <div class="box-body">

             
                <div class="box">
                   <?php
                  $idCotizacion = "";
                  $FechaAnoMes = "";
                  $FechaDia = "";
                  $Vendedor = "";
                  $cliente = false;
                  $clienteDocumento = "";
                  $clienteNombre = "";
                  $clienteTelefono = "";
                  $clienteEmail = "";
                  $listaProducto = false;
                  $Neto = 0;
                  $TotalImpuesto = 0;
                  $Total = 0;
                  $porcentajeImpuesto = 0;

 

                   if(isset($_GET["NCotizacion"])){
                      
                   

                  $taRnc_Empresa_Cotizacion = "Rnc_Empresa_Cotizacion";
                  $Rnc_Empresa_Cotizacion = $_SESSION["RncEmpresaUsuario"]; 

                  $taCorre_Cotizacion = "NCF_Cotizacion";
                  $valorCorreCotizacion = $_GET["NCotizacion"];

                  $Cotizacion = ControladorCotizaciones::ctrMostrarCotizacionVentas($taRnc_Empresa_Cotizacion, $Rnc_Empresa_Cotizacion, $taCorre_Cotizacion, $valorCorreCotizacion);
                  
                  if ($Cotizacion == false) {


                    echo ' <script>
                    swal({
                          type: "error",
                          title: "¡ESTE CORRELATIVO DE COTIZACION NO EXISTE!",
                          text: "¡ POR FAVOR DIGITAR CORRECTAMENTE EL CORRELATIVO!",
                          confirmButtonText: "¡Cerrar!"
                              
                        });
                        </script> ';
                  } else {
                     $id = "id";
                  $idUsuario = $Cotizacion["id_Vendedor"];

                  $Vendedor = ControladorUsuarios::ctrModalEditarUsuario($id, $idUsuario);

                  $valorid = $Cotizacion["id_Cliente"];

                  $cliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

                  $Neto = $Cotizacion["Neto"];
                  $TotalImpuesto = 0;
                  $Total = $Neto;

                  $Impuesto = $Cotizacion["Impuesto"] * 100 / $Cotizacion["Neto"];

                  $porcentajeImpuesto = round($Impuesto, 0, PHP_ROUND_HALF_UP);

                  $idCotizacion = $Cotizacion["id"];
                  $FechaAnoMes = $Cotizacion["FechaAnoMes"];
                  $FechaDia = $Cotizacion["FechaDia"];
                  $clienteDocumento = $cliente["Documento"];
                  $clienteNombre = $cliente["Nombre_Cliente"]; 
                  $clienteTelefono = $cliente["Telefono"];
                  $clienteEmail = $cliente["Email"]; 
                  $listaProducto = json_decode($Cotizacion["Producto"], true);

                     
 
                  


                  }

                 
                   }


                   ?>
 <?php 
       if(isset($_GET["Inventario"])){

$TipoDeInventario = $_GET["Inventario"];
$_SESSION["Inventario"] = $_GET["Inventario"];


  }else{

$TipoDeInventario = $_SESSION["Inventario"];

  }





       ?>
<input type="hidden"  id="idCotizaccion" name="idCotizaccion" value="">
<input type="hidden" style ="margin-left: 5px" maxlength="11" id="NCotizacion" name="NCotizacion" value="">


<input type="hidden"  id="RncEmpresaVentas" name="RncEmpresaVentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $_SESSION["idEmpresa"];?>">
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
<input type="hidden"  id="TipoDeInventario" name="TipoDeInventario" value="<?php echo $_SESSION["Inventario"];?>">

<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">

<input type="hidden" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["Nombre"]?>">

<input type="hidden" class="form-control" id="Perfil" name="Perfil" value="<?php echo $_SESSION["Perfil"]?>">
<input type="hidden" class="form-control" id="UsuarioDescuento" name="UsuarioDescuento" value="<?php echo $_SESSION["Descuento"]?>">
<input type="hidden"  id="CambiarInventario" name="CambiarInventario" value="<?php echo $_SESSION["Inventario"];?>">
<input type="hidden" class="form-control" id="PorDescuentoConf" name="PorDescuentoConf" value="<?php echo $_SESSION["PorDescuentoConf"] ?>">

     
<div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>INFORMACIÓN FISCAL</b></h4>

  </div>                   
        
                   

                    <div class="col-xs-12">
                   <div class="col-xs-5" style="padding-left: 0px; padding-right: 0px;">
                    <div class="input-group">

                      <span class="input-group-addon">COMISION</span>

                     <div class="input-group form-control Comision">

                  <?php 

if(isset($_SESSION["Comision_Factura"])){
$ComisionFactura = $_SESSION["Comision_Factura"];

  switch ($ComisionFactura) {
      case '1':
echo '<input type="radio" name="Comision_Factura" value="1" required checked>SI
<input type="radio" name="Comision_Factura" value="2" required>NO';
break;
                      
      case '2':
echo '<input type="radio" name="Comision_Factura" value="1" required >SI
<input type="radio" name="Comision_Factura" value="2" required checked>NO';
break;
                    }



}else{
  echo '<input type="radio" name="Comision_Factura" value="1" required checked>SI
<input type="radio" name="Comision_Factura" value="2" required>NO';


}



                   ?>
                
                   
                    </div>

                  </div>
              </div>

                  <!--=================================================
                  ENTRADA DEL VENDEDOR =======================================================-->

    <div class="form-group col-xs-7">

      <div class="input-group Vendedor">

        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <?php
        /********************FACTURA CON COTIZACION******************************************/


if(isset($_SESSION["Comision_Factura"])){
  switch ($ComisionFactura) {
  case '1':
  echo'<select type="text" class="form-control" id="idVendedor" name="idVendedor" required>';
        
    echo'<option value="'.$_SESSION["id"].'">'.$_SESSION["Usuario"].'</option>';
        $RncEmpresaUsuario = $_SESSION["RncEmpresaUsuario"];
        $taRncEmpresaUsuario = "Rnc_Empresa_Usuario";

        $Vendedor = ControladorUsuarios::ctrMostrarUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario);

        foreach ($Vendedor as $key => $value){
             
          echo '<option value="'.$value["id"].'">'.$value["Usuario"].'</option>';
              
        }
    
    echo'</select>';

  break;
                      
  case '2':
  echo '<input type="hidden" class="form-control col-xs-12" id="idVendedor" name="idVendedor" value="0" readonly>';

  break;
  
  }



}else{
  echo'<select type="text" class="form-control" id="idVendedor" name="idVendedor" required>';
        
    echo'<option value="'.$_SESSION["id"].'">'.$_SESSION["Usuario"].'</option>';
        $RncEmpresaUsuario = $_SESSION["RncEmpresaUsuario"];
        $taRncEmpresaUsuario = "Rnc_Empresa_Usuario";

        $Vendedor = ControladorUsuarios::ctrMostrarUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario);

        foreach ($Vendedor as $key => $value){
             
          echo '<option value="'.$value["id"].'">'.$value["Usuario"].'</option>';
              
        }
    
    echo'</select>';
    
}


?>




        </div>
                   

      </div>
                
</div>

<div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaFacturames" name="FechaFacturames" value="<?php if (isset($_SESSION['FechaFacturames'])){ echo $_SESSION['FechaFacturames'];}?>" placeholder="Año/Mes Ejemplo 202001" required>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaFacturadia" name="FechaFacturadia"  value="<?php if (isset($_SESSION['FechaFacturadia'])){ echo $_SESSION['FechaFacturadia'];}?>" placeholder="Día Ejemplo 01" required autofocus>
 </div>  
  
  
</div>

                 
                  <div class="form-group col-xs-5">

                    <div class="input-group">
                      <label>N° de Factura</label>
                   </div>
                   </div>
                    <div class="form-group col-xs-4">

                    <div class="input-group pull-right">
                      <label>NCF</label>
                   </div>
                   </div>
                   <div class="col-xs-12"></div>
                  
                  <div class="form-group col-xs-3">

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

                      $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];


                      $ventas = ControladorVentas::ctrMostrarCodigoVentas($Rnc_Empresa_Venta);
                      if(!$ventas){

                        echo ' <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="1" readonly>
                      ';



                      } else{

                          foreach ($ventas as $key => $value) {

                            
                          }
                          $codigo = $value["Codigo"]+1;

                         echo ' <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>
                      ';


                      }




                       ?>

                     

                    </div>
                   

                  </div>
                   
                   <div class="col-xs-3" style="padding-right:0px">

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                       
                       <select class="form-control"  id="NCFFacturaNo" name="NCFFacturaNo" required>
                            <option value="">NCF</option>
                            <option value="FP1">FP1</option>
                            
                     </select>
                       

                    </div>
                   

                  </div>

                  <div class="col-xs-5" style="padding-left:0px">
                   
                    <div class="input-group">

                  <input type="text" maxlength="11" class="form-control" id="CodigoNCFNo" name="CodigoNCFNo" required readonly>
                  </div>
                   

                  </div>

  <div class="col-xs-1" style="padding-left:0px">
      <input type="checkbox"  id="HabilitarNCFNo" name="HabilitarNCFNo" value ="1">
        <div class="NCFanteriorNo">
    
        </div>
</div>
                  <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                   

                      <h4 style="text-align: center;"><b>INFORMACIÓN CLIENTE</b></h4>

                 
                </div>
                   
                       
                    <div class="form-group col-xs-12">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select type="text" class="form-control" id="agregarCliente" name="agregarCliente" placeholder="Agregar Cliente">
                        <option value="">Seleccionar cliente</option>

                        <?php 

                         $Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];

                        $clientes = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);

                         foreach ($clientes as $key => $value){

                          echo '<option value="'.$value["id"].'">'.$value["Nombre_Cliente"].'</option>';



                         }




                         ?>

                      </select>

                      <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente">Agregar Cliente</button></span>
                      

                    </div>
                   

                  </div>
                  <div class="form-group col-xs-6">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoClienteFactura">

                   
                        <?php 
                      if ($cliente == false){
                        echo '<input type="radio" Class="JuridicoClienteFactura" id="JuridicoClienteFactura" name="Tipo_Cliente_Factura" id="JuridicoUsuarioCliente" value="1" required> Jurídico

                    
                    
                        <input type="radio" Class="FisicoClienteFactura" id="FisicoClienteFactura" name="Tipo_Cliente_Factura" id="fisicoClienteFactura" value="2" required> Fisico';
                        
                      } else{
                        if($cliente["Tipo_Cliente"] == "1"){
                        echo '<input type="radio" Class="JuridicoClienteFactura" id="JuridicoClienteFactura" name="Tipo_Cliente_Factura" id="JuridicoUsuarioCliente" value="1" required checked> Jurídico

                    
                    
                        <input type="radio" Class="FisicoClienteFactura" id="FisicoClienteFactura" name="Tipo_Cliente_Factura" id="fisicoClienteFactura" value="2" required> Fisico';



                      }else{
                         echo '<input type="radio" Class="JuridicoClienteFactura" id="JuridicoClienteFactura" name="Tipo_Cliente_Factura" id="JuridicoUsuarioCliente" value="1" required> Jurídico

                    
                    
                        <input type="radio" Class="FisicoClienteFactura" id="FisicoClienteFactura" name="Tipo_Cliente_Factura" id="fisicoClienteFactura" value="2" required checked> Fisico';



                      }

                      }

                       ?>

                   
                       
                   
                    </div>

                  </div>

                  </div>
                   <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" maxlength="11" class="form-control input-xs" id="RncClienteFactura" name="RncClienteFactura" placeholder="Ingresar Documento" value="<?php echo $clienteDocumento?>"required>

            </div>

          </div>
          
     
                   <div class="form-group col-xs-6">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control input-xs" maxlength="50" id="Nombre_Cliente" name="Nombre_Cliente" placeholder="Nombre Cliente" value="<?php echo $clienteNombre?>" required>

                  </div>

                </div>
                 <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control input-xs" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar Teléfono" value="<?php echo  $clienteTelefono?>"required>
               

            </div>

          </div>
                  

          
          
         
           <!--*****************input de EMAIL********************** -->

          <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-xs" id="nuevoEmail" name="nuevoEmail" placeholder="Ingresar email" value="<?php echo  $clienteEmail?>" required>


            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
           <!--*****************input de Telefocno********************** -->
           <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control input-xs" maxlength="400" id="Observaciones" name="Observaciones" placeholder="Obrservaciones de Factura">

            </div>

          </div>

<div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>PRODUCTOS</b></h4>
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
echo '<input type="radio" name="Moneda_Factura" id="Moneda_Factura" value="DOP" required >$ DOP &nbsp;
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
   <div class="col-xs-12"></div> 
                   <div class="form-group row nuevoProducto">
                       <?php 
                        if ($listaProducto != false) {
                            
                            foreach ($listaProducto as $key => $value) {

                                $idProducto = $value["id"];

                                  $respuesta = ControladorProductos::ctrMostrarProductosid($id, $idProducto);

                                   $stockAntiguo = $respuesta["Stock"] + $value["cantidad"];



                      echo '<div class="row" style="padding:5px 15px">

                            <div class="col-xs-4" style="padding-right:0px">
                              
                               <div class="input-group">
                                
                                <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                </span>

                                <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'" readonly required>

                              </div>
                              

                            </div>

                            

                           <div class="col-xs-2 ingresoCantidad">

                              <input type="number" class="form-control nuevaCantidadProducto" id ="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" Stock="'.$stockAntiguo.'" nuevoStock="'.$value["Stock"].'" required>
                          
                            </div>
                            

                             <div class="col-xs-3 ingresoPrecio" style="padding-left:0px">
                              
                              <div class="input-group">
                                <span class="input-group-addon">
                                <i class="ion ion-social-usd">
                                </i>
                                </span>

                                
                                <input type="text"  class="form-control nuevoPrecioProducto" precioReal="'.$respuesta["Precio_Venta"].'" id= "nuevoPrecioProducto" name="nuevoPrecioProducto" value="'.$value["precio"].'" required> 
                                
                             

                            </div>
                            </div>

                        
                     <div class="col-xs-3 ingresoTotal" style="padding-left:0px">
                      
                      <div class="input-group">
                      <span class="input-group-addon">
                        <i class="ion ion-social-usd">
                        </i>
                        </span>
                         <input type="text"  class="form-control TotalPrecioProducto" id ="TotalPrecioProducto" name="TotalPrecioProducto" value="'.$value["total"].'" required readonly> 
                                

                        
                        
                        
                        
                      </div>
                      </div>

                    </div>';



                              
                    }

                     } else {
                       
                     }



                      
                   

                     ?>
                   

                    <!--DESCRIPCION DEL PRODUCTO-->
                   

                   </div>

                   <input type="hidden" id="listaProductos" name="listaProductos">

                   <!--==============================
                    AGREGAR PRODUCTOS
                    ==================-->


                   <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar Productos</button>
                   
                   <hr>
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

               <input type="text" class="form-control" id="nuevoPrecioNetovi" name="nuevoPrecioNetovi" placeholder="0000" value=""required readonly>

                <input type="hidden" class="form-control" id="nuevoPrecioNeto" name="nuevoPrecioNeto" placeholder="0000" value=""required readonly>

                        
              </div>
      </div>
 <div class="col-xs-6">
 <?php 
    if ($_SESSION["Descuento"] == "1"){
          
   echo'<input class="pull-right" type="checkbox"  id="HabilitarDESC" name="HabilitarDESC" value ="1">&nbsp;';
    }else{
    echo'<input class="pull-right" type="checkbox"  id="HabilitarDESC" name="HabilitarDESC" value ="0">&nbsp;';


    }
    ?>
        
          <label class="pull-right">DESC. -</label>
          
      
</div>
<div class="form-group col-xs-2" style="padding-right: 0px">
          <div class="input-group">
          
          <?php 
              if ($_SESSION["Descuento"] == "1"){
          
          echo'<input  class="form-control" type="number" min="0" id="nuevoporDescuento" name="nuevoporDescuento" value="0" required>';
           }else{

            echo'<input  class="form-control" type="number" min="0" id="nuevoporDescuento" name="nuevoporDescuento" value="0" required readonly>';


            }

          ?>


         </div>
  </div>


    <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">

              
          <input type="text" class="form-control" id="Descuentovi" name="Descuentovi" value="0" required readonly>

          <input type="hidden" name="Descuento" id="Descuento" value="0" required readonly>
                        
              </div>
    </div>
 
      
<div class="col-xs-6">
        <input class="pull-right" type="checkbox"  id="HabilitarITBIS" name="HabilitarITBIS" value ="1">&nbsp;
          <label class="pull-right">ITBIS +</label>
          
      
</div>

 <div class="form-group col-xs-2" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="0" required>

         </div>
  </div>
   <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">

              
  <input type="text" class="form-control" id="nuevoPrecioImpuestovi" name="nuevoPrecioImpuestovi" placeholder="0000" required readonly>
  

  <input type="hidden" class="form-control" id="nuevoPrecioImpuesto" name="nuevoPrecioImpuesto" placeholder="0000"required readonly>

                        
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
 <input type="text" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="0000" value="<?php echo  $Total?>"required readonly>

<input type="hidden" name="totalVenta" id="totalVenta" value="<?php echo  $Total?>">
                    
                        
              </div>
      </div>

</div>                   


                         <!-----------------------------------------
                               METODO DE PAGO
                    ----------------------------------------------->
                <div class="form-group row">
                      
                      <div class="col-xs-6" style="padding-right:0px">

                       <div class="input-group">

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        <option value="">Selecione Método  de pago</option>
                        <option value="01">01-EFECTIVO</option>
                        <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
                        <option value="03">03-TARJETA CREDITO/DEBITO</option>
                        <option value="04">04-VENTA A CREDITO</option>
                        <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
                        <option value="06">06-PERMUTAS</option>
                        <option value="07">07-OTRAS FORMAS DE VENTA</option>
                        
                      </select>
                     

                      </div>


                      </div>

                      <div class="cajasMetodoPago"></div>

                      <input type="hidden" name="listaMetodoPago" id="listaMetodoPago">
                     

                    </div>

                    <br>

                     <?php
                  if($_SESSION["Proyecto"] == 1){ 
                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                      $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);

                        echo '<div input-group">
                        <h4>Proyecto</h4>
                        
                         <select type="text" class="form-control proyecto" id="proyecto" name="proyecto" required>
                          <option value="">Proyecto</option>';


                         foreach ($respuesta as $key => $value) {
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
                         }
                               

                               

                           echo'</select>
                           </div>';
                    }else {

                       echo '<input type="hidden" class="form-control" id="proyecto" name="proyecto" value="0" required>';
                     


                    }
                     ?>


               
                </div>             
              

            </div>
<div class="form-group col-xs-12 divretenciones">

      

</div>

  <div class="FormularioRetencion">
    



  </div>
  <div class="form-group col-xs-12 FacturacionRecurrente">
    
  </div>
         

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Registrar</button>
<?php 
if(isset($_SESSION["FechaFacturadia"])){
unset($_SESSION["FechaFacturames"]);
unset($_SESSION["FechaFacturadia"]);
unset($_SESSION["Comision_Factura"]);


}

 ?>

              
            </div>

          </form>
          <?php 

            $guardarVenta = new ControladorVentas();
            $guardarVenta -> ctrCrearVentaNo();




           ?>

       
          </div>

          
        </div>

         <!--=================================================
            LA TABLA  DE PRODUCTO

        =======================================================-->

        <div class="col-xs-6" style="padding-left: 2px">

          <div class="box box-warning"></div>

          <div class="box-header with-border">

            <div class="box-body">
                            
     <h5 class="pull-left" style="font-weight: bold">Tipo de Inventario: </h5>         
<div class="col-xs-6" style="padding-right:0px">
                 

        <div class="input-group">


  <span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                    
      <?php  
 
                         


switch ($TipoDeInventario) {

case '1':
  echo '<select class="form-control"  id="TipoDeInventario" name="TipoDeInventario" required>
              <option value="1">1- Venta-Servicios</option>
              <option value="2">2- Activo Fijo-Alquiler</option>
              <option value="3"></option>
              
        </select>';
break;
case '2': 

echo '<select class="form-control" id="TipoDeInventario" name="TipoDeInventario" required> 
              <option value="2">2- Activo Fijo-Alquiler</option>
              <option value="1">1- Venta-Servicios</option>
              <option value="3"></option>
              
        </select>';
break;
case '3':
 echo '<select class="form-control"  id="TipoDeInventario" name="TipoDeInventario" required>
              <option value="3"></option>
              <option value="1">1- Venta-Servicios</option>
              <option value="2">2- Activo Fijo-Alquiler</option>
              
              
        </select>';
break;

}


?>          
                     
          </div>


</div>
<input type="hidden"  id="CambiarInventario" name="CambiarInventario" value="<?php echo $_SESSION["Inventario"];?>">

<a id="CambiarInventario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Cambiar Inventario</a>
<div class="col-xs-12"><br><br></div>
               

              <table class="table table-bordered table-striped dt-responsive tablaVentas" width="100%" id="tablaVentas">
                
                <thead>

                  <tr>

                    
                    <th>Imagen</th>
                    <th>Código</th>
                    <th>Descripcion</th>
                    <th>Precio Venta</th>
                    <th>stock</th>
                    <th></th>    

                  </tr>

                </thead>

                
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
<div id="modalAgregarCliente" class="modal fade" role="dialog">
  
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
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCliente" name="RncEmpresaCliente" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>

            </div>


          </div>
          
           <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                     <div class="input-group form-control TipoUserCliente">

                   
                        <input type="radio" Class="JuridicoUserCliente" name="Tipo_Usuario_Cliente" id="JuridicoUsuarioCliente" value="1" required checked> Jurídico

                    
                    
                        <input type="radio" Class="FisicoUserCliente" name="Tipo_Usuario_Cliente" id="fisicoUsuarioCliente" value="2" required> Fisico

                   
                    </div>

                  </div>

                  </div>

          
            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" maxlength="11" class="form-control input-lg" id="RncCliente" name="RncCliente" placeholder="Ingresar Documento" required>

            </div>

          </div>
          
                    
                 

          
         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control input-lg" id="nuevoCliente"  name="nuevoCliente" placeholder="Ingresar Nombre Completo" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          <!--*****************input de cedula o pasaporte********************** -->

          
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
              <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Teléfono">

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->

            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Dirección">

            </div>

          </div>
          <!--*****************cierra input de Direccion************************* -->

          <!--*****************input de FECHA DE NACIMIENTO********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaFechaNac" placeholder="Ingresar Fecha de Nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>

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
  ******************************************************* -->
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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="FP1" readonly>

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

