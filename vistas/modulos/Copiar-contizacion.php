
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        FACTURAR COTIZACION
        
      </h1>
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">facturar cotizacion</li>
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
               <div class="form-group">

                    <div class="input-group">
                      
                       

                     <label>N° de Cotización</label>
                      
                      <input type="text" style ="margin-left: 5px" maxlength="11" id="NCotizacion" name="NCotizacion">
                      <button style ="margin-left: 5px" class="btn btn-warning btnBuscarCotizacion" id="BuscarCotizacion"><i class="glyphicon glyphicon-search"></i>  </button>

                   
                  </div>
                  </div>

          </div>

            <form role="form" method="post" class="formularioVenta">

            <div class="box-body">

             
                <div class="box">

                  <?php 
                  if(isset($_GET["ExtraerAsiento"])){ 
                      $ExtraerAsiento = $_GET["ExtraerAsiento"];
                  }

                  $id = "id";
                  
                  $valoridVenta = $_GET["idVenta"];

                  $venta = ControladorVentas::ctrMostrarVentaEditar($id, $valoridVenta);

                  $idUsuario = $venta["id_Vendedor"];

                  if($idUsuario != 0){
                    $Vendedor = ControladorUsuarios::ctrModalEditarUsuario($id, $idUsuario);
                    $NombreVendedor = $Vendedor["Nombre"];


                  }else{
                    $NombreVendedor = "";



                  }

                  $Vendedor = ControladorUsuarios::ctrModalEditarUsuario($id, $idUsuario);

                  $valorid = $venta["id_Cliente"];

                  $cliente = ControladorClientes::ctrModalEditarClientes($id, $valorid);

                 

                $TipoDeInventario = $venta["TipodeInventario"];
                   



                   ?>
<?php 
  $tabla = "607_empresas";
  $taRnc_Empresa_607 = "Rnc_Empresa_607";
  $Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];
  $taRnc_Factura_607 = "Rnc_Factura_607";
  $Rnc_Factura_607 = $venta["Rnc_Cliente"];
  $taNCF_607 = "NCF_607";
  $NCF_607 = $venta["NCF_Factura"];
  
  $Consulta607 = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);


  if($Consulta607 != false && $Consulta607["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $Consulta607["Rnc_Factura_607"] == $Rnc_Factura_607 && $Consulta607["NCF_607"] == $NCF_607){

    $id_registro607 = $Consulta607["id"];
    
    $EXTRAER_NCF_607 = $Consulta607["EXTRAER_NCF_607"];
   
      
  }
  $tabla = "librodiario_empresas";
  
  $taid_registro = "id_registro";
  $id_registro = $id_registro607;

  $taRnc_Empresa_LD = "Rnc_Empresa_LD";
  $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];

  if($EXTRAER_NCF_607 != "FP1"){
      $Extraer = "DFF";
  }else{
    $Extraer = "DFP";

  }


  $taExtraer = "Extraer_NAsiento";
  

  $taRnc_Factura = "Rnc_Factura";
  $Rnc_Factura = $venta["Rnc_Cliente"];

  $taNCF = "NCF";
  $NCF = $venta["NCF_Factura"];

  
  $respuesta = ModeloDiario::mdlGastoDiarioEditarid($tabla, $taid_registro, $id_registro, $taRnc_Empresa_LD, $Rnc_Empresa_LD, $taExtraer, $Extraer, $taRnc_Factura, $Rnc_Factura, $taNCF, $NCF);
foreach ($respuesta as $key => $value) {
 $NAsiento = $value["NAsiento"];

  
}

   ?>
<input type="hidden"  id="idCotizaccion" name="idCotizaccion" value="">

<input type="hidden"  id="RncEmpresaVentas" name="RncEmpresaVentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden"  id="TipoDeInventario" name="TipoDeInventario" value="<?php echo $_SESSION["Inventario"];?>">

<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">

<input type="hidden" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["Nombre"]?>">
<input type="hidden"  id="CambiarInventario" name="CambiarInventario" value="<?php echo $_SESSION["Inventario"];?>">

<div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>INFORMACIÓN FISCAL</b></h4>

  </div> 


               

<!--======================================== CIERRE ENTRADA DEL VENDEDOR ==========================-->
   <div class="col-xs-12">
                   <div class="form-group col-xs-5">
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

                     

    <?php 

if(isset($_SESSION["Comision_Factura"])){
  $ComisionFactura = $_SESSION["Comision_Factura"];
  switch ($ComisionFactura) {
case '1':
echo' <span class="input-group-addon"><i class="fa fa-user"></i></span>
<select type="text" class="form-control" id="idVendedor" name="idVendedor" required>';
  if ($Vendedor == "") {
    echo '<option value="">Seleccionar Vendedor</option>';
  }else{
    echo '<option value="'.$Vendedor["id"].'">'.$Vendedor["Usuario"].'</option>';
  }

  $RncEmpresaUsuario = $_SESSION["RncEmpresaUsuario"];
  $taRncEmpresaUsuario = "Rnc_Empresa_Usuario";

  $Vendedor = ControladorUsuarios::ctrMostrarUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario);

    foreach ($Vendedor as $key => $value){
      if($value["Perfil"] == "Vendedor"){
          echo '<option value="'.$value["id"].'">'.$value["Usuario"].'</option>';
          }
      }
echo'</select>';


break;
                      
case '2':
echo '<input type="hidden" class="form-control col-xs-12" id="idVendedor" name="idVendedor" value="0" readonly>';

break;
}/*Cierre swicht*/



}/*Cierre if isset de comision*/
else{
  echo' <span class="input-group-addon"><i class="fa fa-user"></i></span>
<select type="text" class="form-control" id="idVendedor" name="idVendedor" required>';
  if ($Vendedor == "") {
    echo '<option value="">Seleccionar Vendedor</option>';
  }else{
    echo '<option value="'.$Vendedor["id"].'">'.$Vendedor["Usuario"].'</option>';
  }

  $RncEmpresaUsuario = $_SESSION["RncEmpresaUsuario"];
  $taRncEmpresaUsuario = "Rnc_Empresa_Usuario";

  $Vendedor = ControladorUsuarios::ctrMostrarUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario);

    foreach ($Vendedor as $key => $value){
      if($value["Perfil"] == "Vendedor"){
          echo '<option value="'.$value["id"].'">'.$value["Usuario"].'</option>';
          }
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
                      <label>N° NCF</label>
                   </div>
                   </div>

                  <div class="form-group col-xs-4">

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
                    

                      
                       <select class="form-control"  id="NCFFactura" name="NCFFactura" required>
                            <option value="">NCF</option>
                            <option value="B01">B01</option>
                            <option value="E31">E31</option>
                            <option value="B02">B02</option>
                            <option value="E32">E32</option>
                            <option value="B03">B03</option>
                            <option value="E33">E33</option>
                            <option value="B11">B11</option>
                            <option value="E41">E41</option>
                            <option value="B12">B12</option>
                            <option value="E42">E42</option>
                            <option value="B14">B14</option>
                            <option value="E44">E44</option>
                            <option value="B15">B15</option>
                            <option value="E45">E45</option>
                            <option value="B16">B16</option>
                            <option value="+O">+O</option>
                            <option value="-O">-O</option>
                  
                     </select>

                      
                      </div>

                  

                  </div>
                <div class="col-xs-4" style="padding-left:0px">
                   
                    <div class="input-group">
                    
                    <input type="text" maxlength="13" class="form-control" id="CodigoNCF" name="CodigoNCF" required readonly>


      
                      </div>
   
                  </div>
<div class="col-xs-1" style="padding-left:0px">
        <input type="checkbox"  id="HabilitarNCF" name="HabilitarNCF" value ="1">
      <div class="NCFanterior">
    



      </div>
         
          
      
</div>      
                
                

                    <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                   

                      <h4 style="text-align: center;"><b>INFORMACIÓN CLIENTE</b></h4>

                 
                </div>
   <div class="col-xs-12"></div>                
<!--=================================ENTRADA DEL CODIGO DE LA VENTA ===============================-->
                  
                  <div class="form-group col-xs-12">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select type="text" class="form-control" id="agregarCliente" name="agregarCliente" placeholder="Agregar Cliente" required>
                        
                        <option value="<?php echo $cliente["id"]?>"><?php echo $cliente["Nombre_Cliente"]?></option>

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
                      if($cliente["Tipo_Cliente"] == "1"){
                        echo '<input type="radio" Class="JuridicoClienteFactura" id="JuridicoClienteFactura" name="Tipo_Cliente_Factura" id="JuridicoUsuarioCliente" value="1" required checked> Jurídico

                    
                    
                        <input type="radio" Class="FisicoClienteFactura" id="FisicoClienteFactura" name="Tipo_Cliente_Factura" id="fisicoClienteFactura" value="2" required> Fisico';



                      }else{
                         echo '<input type="radio" Class="JuridicoClienteFactura" id="JuridicoClienteFactura" name="Tipo_Cliente_Factura" id="JuridicoUsuarioCliente" value="1" required> Jurídico

                    
                    
                        <input type="radio" Class="FisicoClienteFactura" id="FisicoClienteFactura" name="Tipo_Cliente_Factura" id="fisicoClienteFactura" value="2" required checked> Fisico';



                      }


                       ?>
                   
                    </div>

                  </div>

                  </div>
                   <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" maxlength="11" class="form-control input-xs" id="RncClienteFactura" name="RncClienteFactura" value="<?php echo $cliente["Documento"]?>">

            </div>

          </div>
           <div class="form-group col-xs-6">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

                    <input type="text" class="form-control input-xs" maxlength="11" id="Nombre_Cliente" name="Nombre_Cliente" value="<?php echo $cliente["Nombre_Cliente"]?>">

                  </div>

                </div>
                 <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control input-xs" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar Teléfono" value="<?php echo $cliente["Telefono"]?>">

            </div>

          </div>
           <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-xs" id="nuevoEmail" name="nuevoEmail" value="<?php echo $cliente["Email"]?>">

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->
           <!--*****************input de Telefocno********************** -->
           <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control input-xs" id="Observaciones" name="Observaciones" value="<?php echo $venta["Observaciones"]?>">

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

$MonedaFactura = $venta["Moneda"];

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

$MonedaFactura = $venta["Moneda"];

switch ($MonedaFactura) {
                      

                      
case 'USD':
echo  '<span class="input-group-addon"><i class="ion ion-social-usd">&nbsp;DOP</i></span>

      <input type="text" class="form-control" id="tasaUS" name="tasaUS"  value="'.$venta["Tasa"].'" required>'
;
break;
                    



 }


                   ?>
                
                     
                    

                 
                 
              </div>
   </div>  

   <div class="col-xs-12"></div>                
   <div class="form-group row nuevoProducto">

                    <?php 


                    $listaProducto = json_decode($venta["Producto"], true);

                    $tipodeinventario = $venta["TipodeInventario"];


                    foreach ($listaProducto as $key => $value) {

                      $idProducto = $value["id"];
    if($tipodeinventario == "1"){

  $respuesta = ControladorProductos::ctrMostrarProductosid($id, $idProducto);
        
    }else{

 $respuesta = ControladorActivoR::ctrMostrarProductosid($id, $idProducto);
      

    }
          
$stockAntiguo = $respuesta["Stock"] + $value["cantidad"];



                      echo '<div class="row" style="padding:5px 15px">

                            <div class="col-xs-4" style="padding-right:0px">
                              
                               <div class="input-group">
                                
                                <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarProducto" idProducto="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                </span>

                                <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'" readonly required>
<input type="hidden" class="idgrupo" id="idgrupo" name="idgrupo" value="'.$value["idgrupo"].'"  readonly required>

<input type="hidden" class="idcategoria" name ="idcategoria" value="'.$value["idcategoria"].'" required readonly>

<input type="hidden" class="idgenerica" name="idgenerica" value="'.$value["idgenerica"].'" required readonly>

<input type="hidden" class="idcuenta" name="idcuenta" value="'.$value["idcuenta"].'" required readonly> 

<input type="hidden" class="nombrecuenta" name="nombrecuenta" value="'.$value["nombrecuenta"].'" required readonly>


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
                                 <input type="hidden"  class="form-control PrecioProductoCompra"  name="PrecioProductoCompra" value="'.$value["preciocompra"].'"required>
                                
                                
                             

                            </div>
                            </div>

                        
                     <div class="col-xs-3 ingresoTotal" style="padding-left:0px">
                      
                      <div class="input-group">
                      <span class="input-group-addon">
                        <i class="ion ion-social-usd">
                        </i>
                        </span>
                         <input type="text"  class="form-control TotalPrecioProducto" id ="TotalPrecioProducto" name="TotalPrecioProducto" value="'.$value["total"].'" required readonly> 
                         <input type="hidden" class="form-control TotalPrecioCompra" name="TotalPrecioCompra" value="'.$value["totalcompra"].'" required readonly>
                                
                        
                      </div>
                      </div>

                    </div>';

                             
                    }



                     ?>
                   

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

               <input type="text" class="form-control" id="nuevoPrecioNetovi" name="nuevoPrecioNetovi" placeholder="0000" value="<?php echo $venta["Neto"]?>"required readonly>

                <input type="hidden" class="form-control" id="nuevoPrecioNeto" name="nuevoPrecioNeto" placeholder="0000" value="<?php echo $venta["Neto"]?>"required readonly>

                        
              </div>
      </div>
<div class="col-xs-6">
            <label class="pull-right">Descuento -</label>

</div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="Descuentovi" name="Descuentovi" value="<?php echo $venta["Descuento"]?>" required>

                <input type="hidden" name="Descuento" id="Descuento" value="<?php echo $venta["Descuento"]?>">
                        
              </div>
      </div>
 
 
      
<div class="col-xs-6">
        <input class="pull-right" type="checkbox"  id="HabilitarITBIS" name="HabilitarITBIS" value ="1">&nbsp;
          <label class="pull-right">ITBIS +</label>
          
      
</div>

 <div class="form-group col-xs-2" style="padding-right: 0px">
          <div class="input-group">
          
          <input  class="form-control" type="number" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="<?php echo $venta["Porimpuesto"]?>" required>

         </div>
  </div>
   <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">

              
  <input type="text" class="form-control" id="nuevoPrecioImpuestovi" name="nuevoPrecioImpuestovi" value="<?php echo $venta["Impuesto"]?>" required readonly>
  

  <input type="hidden" class="form-control" id="nuevoPrecioImpuesto" name="nuevoPrecioImpuesto" value="<?php echo $venta["Impuesto"]?>" required readonly>

                        
              </div>
  </div>
 <div class="col-xs-6">
            <label class="pull-right">Retenciones -</label>

    </div>
    <?php 
        $TotalRet = $venta["ITBIS_Retenido_Tercero"] + $venta["RetencionRenta_por_Terceros"]; 

         ?>


    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control" id="TotalRetvi" name="TotalRetvi" placeholder="0000" value="<?php echo $TotalRet;?>"required readonly>

                <input type="hidden" name="TotalRet" id="TotalRet" value="<?php echo $TotalRet;?>">
                        
              </div>
      </div>


 <div class="col-xs-6">
            <label class="pull-right">Total =</label>

        </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
 <input type="text" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" value="<?php echo $venta["Total"]?>" required readonly>

<input type="hidden" name="totalVenta" id="totalVenta" value="<?php echo $venta["Total"]?>">
                    
                        
              </div>
      </div>

</div>                   


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

                </div>

                <?php 
            if($_SESSION["Contabilidad"] == 1){ 

        /*CONCULTA 607*/
        $tabla = "607_empresas";
        $taRnc_Empresa_607 = "Rnc_Empresa_607";
        $Rnc_Empresa_607 = $venta["Rnc_Empresa_Venta"];
        $taRnc_Factura_607 = "Rnc_Factura_607";
        $Rnc_Factura_607 = $cliente["Documento"];
        $taNCF_607 = "NCF_607";
        $NCF_607 = $venta["NCF_Factura"];
  
       $Consulta607 = Modelo607::MdlfacturaRepetida607($tabla, $taRnc_Empresa_607, $Rnc_Empresa_607, $taNCF_607, $NCF_607);


  if($Consulta607 != false && $Consulta607["Rnc_Empresa_607"] == $Rnc_Empresa_607 && $Consulta607["Rnc_Factura_607"] == $Rnc_Factura_607 && $Consulta607["NCF_607"] == $NCF_607){

    $id_registro607 = $Consulta607["id"];
      
    }

      $id_registro =$id_registro607;
      $Rnc_Empresa_LD = $venta["Rnc_Empresa_Venta"];
      $Rnc_Factura = $cliente["Documento"];
      $NCF = $venta["NCF_Factura"];
      $Extraer = $ExtraerAsiento;
                 

$respuesta = ControladorDiario::ctrMostrarGastoDiarioEditar($id_registro, $Rnc_Empresa_LD, $Rnc_Factura, $NCF, $Extraer);

foreach ($respuesta as $key => $value) {
  $idproyecto = $value["id_Proyecto"];
  $NAsiento = $value["NAsiento"];
             

}

      } else {
          $idproyecto = 0;
          $NAsiento = 0;

      }
               

               


      ?> 
                 <?php
                  if($_SESSION["Proyecto"] == 1){ 
                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                    $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);



                        echo '<div input-group">
                        <h4>Proyecto</h4>
                        
                         <select type="text" class="form-control proyecto" id="proyecto" name="proyecto" required>';
                          foreach ($respuesta as $key => $value) {
                            if($respuesta["id"] == $idproyecto){
                          
                            echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';

                           }
                           }


                        foreach ($respuesta as $key => $value) {
                          if($respuesta["id"] != $idproyecto){
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
                         
                          }
                        }
                          
                           echo'</select>
                           </div>';
                    }else {

                       echo '<input type="hidden" class="form-control" id="proyecto" name="proyecto" value="0" required> ';
                     

                    }
                     ?>

  

 

     <div class="form-group col-xs-12 divretenciones">

      

 </div>

  <div class="FormularioRetencion">
    



  </div>
<input type="hidden"  id="CambiarInventario" name="CambiarInventario" value="<?php echo $TipoDeInventario;?>">
                              

            </div>

            <div class="box-footer">

<button type="submit" class="btn btn-success pull-right">Copiar y Registrar</button>

              
            </div>

          </form>
          <?php 

          $CopiarVenta = new ControladorVentas();
          $CopiarVenta -> ctrCrearVenta();


           ?>

       
          </div>

          
        </div>

         <!--=================================================
            LA TABLA  DE PRODUCTO

        =======================================================-->

        <div class="col-lg-6 hidden-md hidden-sm hidden-xs">

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
            
              
        </select>';
break;
case '2': 

echo '<select class="form-control" id="TipoDeInventario" name="TipoDeInventario" required> 
              <option value="2">2- Activo Fijo-Alquiler</option>
             
        </select>';
break;
case '3':
 echo '<select class="form-control"  id="TipoDeInventario" name="TipoDeInventario" required>
              <option value="3"></option>
             
              
        </select>';
break;

}


?>          
                     
          </div>


</div>
<input type="hidden"  id="CambiarInventario" name="CambiarInventario" value="<?php echo $TipoDeInventario;?>">
<div class="col-xs-12"><br><br></div>



              <table class="table table-bordered table-striped dt-responsive tablaVentas">
                
                <thead>

                  <tr>

                   
                    <th>Img.</th>
                    <th>Cód.</th>
                    <th>Descrip.</th>
                    <th>Prec. Venta</th>
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
  ******************************************************* -->
  