
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        EDITAR FACTURA
        
      </h1>
      <br>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">editar-ventas</li>
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

            <div class="box-header with-border"></div>

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
   
      
  }else{
    echo '<script>
                swal({
                  type: "error",
                  title: "ESTA FACTURA GENERO UN ERROR AL MOMENTO DE SER CREADA POR FAVOR ELIMINAR LA FACTURA!",
                  showConfirmButton: true,
                  confirmButtonText: "Cerrar",
                  closeOnConfirm: false
                    }).then((result)=>{

                      if(result.value){
                        window.location = "ventas";
                      }

                      });

                </script>';
  

  }
 
  $tabla = "librodiario_empresas";
  
  $taid_registro = "id_registro";
  $id_registro = $id_registro607;

  $taRnc_Empresa_LD = "Rnc_Empresa_LD";
  $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];
  


  if($EXTRAER_NCF_607 == "FP1"){
    $Extraer = "DFP";
  }else{
   
 $Extraer = "DFF";
  }


  

   ?>
<input type="hidden"  id="RncEmpresaVentas" name="RncEmpresaVentas" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $_SESSION["idEmpresa"];?>">
<input type="hidden"  id="TipoDeInventario" name="TipoDeInventario" value="<?php echo $_SESSION["Inventario"];?>">
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">

<input type="hidden" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["Nombre"]?>">

<input type="hidden" class="form-control" id="Perfil" name="Perfil" value="<?php echo $_SESSION["Perfil"]?>">
<input type="hidden" class="form-control" id="UsuarioDescuento" name="UsuarioDescuento" value="<?php echo $_SESSION["Descuento"]?>">
<input type="hidden"  id="CambiarInventario" name="CambiarInventario" value="<?php echo $_SESSION["Inventario"];?>">
<input type="hidden" class="form-control" id="PorDescuentoConf" name="PorDescuentoConf" value="<?php echo $_SESSION["PorDescuentoConf"] ?>">
 
<input type="hidden" class="form-control" id="NAsiento" name="NAsiento" value="<?php echo $venta["NAsiento"];?>" required> 
<input type="hidden" class="form-control" id="NAsientoRet" name="NAsientoRet" value="<?php echo $venta["NAsientoRET"];?>" required> 

<input type="hidden"  id="ExtraerAsiento" name="ExtraerAsiento" value="<?php echo $ExtraerAsiento;?>">
<input type="hidden"  id="RNCanteriror" name="RNCanteriror" value="<?php echo $venta["Rnc_Cliente"];?>">
<input type="hidden"  id="NCFanterior" name="NCFanterior" value="<?php echo $venta["NCF_Factura"];?>">
<input type="hidden"  id="id_registro607" name="id_registro607" value="<?php echo $id_registro607;?>">
<input type="hidden" class="form-control" id="RetencionesANT" name="RetencionesANT" value="<?php echo $venta["Retenciones"];?>" required>

<div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>INFORMACI??N FISCAL</b></h4>

  </div> 


<div class="form-group col-xs-5">
    <div class="input-group">

        <span class="input-group-addon">COMISION</span>

            <div class="input-group form-control Comision">

              <?php 
            if($venta["Comision"] == "1"){
              echo ' <input type="radio"  name="Comision_Factura" value="1" required checked>SI
                        <input type="radio" name="Comision_Factura" value="2" required>NO';
            }else{
              echo ' <input type="radio"  name="Comision_Factura" value="1" required>SI
                        <input type="radio" name="Comision_Factura" value="2" required checked>NO';
            }

                       ?>

              </div>

      </div>
</div>
<div class="form-group col-xs-12">
  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

      <div class="input-group form-control Fecha">

    <label>A??o/Mes</label>
     <input type="text" class="Fechames" maxlength="6" id="FechaFacturames" name="FechaFacturames" value="<?php echo $venta["FechaAnoMes"]?>">

                     
    <label>D??a</label>
    <input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia" name="FechaFacturadia" value="<?php echo $venta["FechaDia"]?>">


    </div>
  </div>
</div>
<!--=================== ENTRADA DEL VENDEDOR =======================================================-->

                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $NombreVendedor?>" readonly>
                      <input type="hidden" name="idVendedor" value="<?php echo $Vendedor["id"]?>" readonly>
                     
                    </div>
                   
                  </div>
                   
<!--======================================== CIERRE ENTRADA DEL VENDEDOR ==========================-->
                   
                  <div class="form-group col-xs-6">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                      
                        <input type="hidden" class="form-control" id="idVenta" name="idVenta" value="<?php echo $venta["id"]?>" readonly>

 
                       <input type="text" class="form-control" id="editarVenta" name="editarVenta" value="<?php echo $venta["Codigo"]?>" readonly>             

                    </div>
                   

                  </div>
                   
                  <div class="form-group col-xs-6">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
         
 
                       <input type="text" class="form-control" id="NCF_Factura" name="NCF_Factura" value="<?php echo $venta["NCF_Factura"]?>" readonly>  
                       <input type="hidden" class="form-control" id="Extraer_NCF_Factura" name="Extraer_NCF_Factura" value="<?php echo $venta["EXTRAER_NCF"]?>" readonly>             

                    </div>
                   
                  </div>
                  <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

                      <h4 style="text-align: center;"><b>INFORMACI??N CLIENTE</b></h4>

                 
                </div>
                   
<!--=================================ENTRADA DEL CODIGO DE LA VENTA ===============================-->
                  
                  <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select type="text" class="form-control" id="agregarCliente" name="agregarCliente" placeholder="Agregar Cliente" required>
                        
                        <option value="<?php echo $cliente["id"]?>"><?php echo $cliente["Nombre_Cliente"]?></option>
                        <option value="">Seleccionar cliente</option>

                        <?php 

                         $Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];

                        $clientes = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);

                         foreach ($clientes as $key => $value){

                          echo '
                          <option value="'.$value["id"].'">'.$value["Nombre_Cliente"].'</option>';

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
                        echo '<input type="radio" Class="JuridicoClienteFactura" id="JuridicoClienteFactura" name="Tipo_Cliente_Factura"  value="1" required checked> Jur??dico

                    
                    
                        <input type="radio" Class="FisicoClienteFactura" id="FisicoClienteFactura" name="Tipo_Cliente_Factura"  value="2" required> Fisico';



                      }else{
                         echo '<input type="radio" Class="JuridicoClienteFactura" id="JuridicoClienteFactura" name="Tipo_Cliente_Factura" value="1" required> Jur??dico

                    
                    
                        <input type="radio" Class="FisicoClienteFactura" id="FisicoClienteFactura" name="Tipo_Cliente_Factura"  value="2" required checked> Fisico';



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
              <input type="text" class="form-control input-xs" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar Tel??fono" value="<?php echo $cliente["Telefono"]?>">

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
              <input type="text" class="form-control input-xs" maxlength="400" id="Observaciones" name="Observaciones" value="<?php echo $venta["Observaciones"]?>">

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
                      if(isset($value["tipoproducto"])){
                        $tipoproducto = $value["tipoproducto"];

                      }else{
                        $tipoproducto = "2";
                      }

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

<input type="hidden" class="tipoproducto" name="tipoproducto" value="'.$tipoproducto.'" required readonly>

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
   <?php 
    if ($_SESSION["Perfil"] != "Vendedor"){
          
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
              if ($_SESSION["Perfil"] != "Vendedor"){
          
          echo'<input  class="form-control" type="number" min="0" id="nuevoporDescuento" name="nuevoporDescuento" value="'.$venta["Pordescuento"].'" required>';
           }else{

            echo'<input  class="form-control" type="number" min="0" id="nuevoporDescuento" name="nuevoporDescuento" value="'.$venta["Pordescuento"].'" required readonly>';


            }

          ?>

         </div>
  </div>

 <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">

              
          <input type="text" class="form-control" id="Descuentovi" name="Descuentovi" value="<?php echo $venta["Descuento"]?>" required readonly>

          <input type="hidden" name="Descuento" id="Descuento" value="<?php echo $venta["Descuento"]?>" required readonly>
                        
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
<?php 
$Metodo_Pago = $venta["Metodo_Pago"];
switch ($Metodo_Pago) {

  case '01':
   echo' 
          <option value="01">01-EFECTIVO</option>
          <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
          <option value="03">03-TARJETA CREDITO/DEBITO</option>
          <option value="04">04-VENTA A CREDITO</option>
          <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
          <option value="06">06-PERMUTAS</option>
          <option value="07">07-OTRAS FORMAS DE VENTA</option>';
    // code...
  break;
  case '02':
   echo' <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
        <option value="01">01-EFECTIVO</option> 
        <option value="03">03-TARJETA CREDITO/DEBITO</option>
        <option value="04">04-VENTA A CREDITO</option>
        <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
        <option value="06">06-PERMUTAS</option>
        <option value="07">07-OTRAS FORMAS DE VENTA</option>';
    // code...
  break;
  case '03':
   echo'<option value="03">03-TARJETA CREDITO/DEBITO</option>
        <option value="01">01-EFECTIVO</option> 
        <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
        <option value="04">04-VENTA A CREDITO</option>
        <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
        <option value="06">06-PERMUTAS</option>
        <option value="07">07-OTRAS FORMAS DE VENTA</option>';
    // code...
  break;
   case '04':
   echo'<option value="04">04-VENTA A CREDITO</option>
        <option value="01">01-EFECTIVO</option> 
        <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
        <option value="03">03-TARJETA CREDITO/DEBITO</option>
        <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
        <option value="06">06-PERMUTAS</option>
        <option value="07">07-OTRAS FORMAS DE VENTA</option>';
    break;
    case '05':
   echo'<option value="05">05-BONOS CERTIFICADOS REGALOS</option>
        <option value="01">01-EFECTIVO</option> 
        <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
        <option value="03">03-TARJETA CREDITO/DEBITO</option>
        <option value="04">04-VENTA A CREDITO</option>
        <option value="06">06-PERMUTAS</option>
        <option value="07">07-OTRAS FORMAS DE VENTA</option>';
    break;
     case '06':
   echo'<option value="06">06-PERMUTAS</option>
        <option value="01">01-EFECTIVO</option> 
        <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
        <option value="03">03-TARJETA CREDITO/DEBITO</option>
        <option value="04">04-VENTA A CREDITO</option>
        <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
        <option value="07">07-OTRAS FORMAS DE VENTA</option>';
    break;
     case '07':
   echo'<option value="07">07-OTRAS FORMAS DE VENTA</option>
        <option value="01">01-EFECTIVO</option> 
        <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
        <option value="03">03-TARJETA CREDITO/DEBITO</option>
        <option value="04">04-VENTA A CREDITO</option>
        <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
        <option value="06">06-PERMUTAS</option>';
        
    break;
  default:
    echo' <option value="">Selecione M??todo  de pago</option>
          <option value="01">01-EFECTIVO</option>
          <option value="02">02-CHEQUES/TRANSFERENCIAS/DEPOSITO</option>
          <option value="03">03-TARJETA CREDITO/DEBITO</option>
          <option value="04">04-VENTA A CREDITO</option>
          <option value="05">05-BONOS CERTIFICADOS REGALOS</option>
          <option value="06">06-PERMUTAS</option>
          <option value="07">07-OTRAS FORMAS DE VENTA</option>';
    break;
}


 ?>
                       
                      </select>
                     

                      </div>


                      </div>

                      <div class="cajasMetodoPago">

<?php 
if ($Metodo_Pago == "01"){
  echo '<div class="col-xs-4">

        <div class="input-group">

        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
        
        <input type="text" class="form-control" id="nuevoValorEfectivo" placecholder="000000" required>



        </div>




      </div>

      <div class="col-xs-4" id="capturarCambioEfectivo" style="padding-left:0px">

        <div class="input-group">

          <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
        
            <input type="text" class="form-control" id="nuevoCambioEfectivo" name="nuevoCambioEfectivo" placecholder="000000" readonly required>



        </div>

      </div>';



}elseif($Metodo_Pago == "04"){
echo'<div class="col-xs-6" style="padding-left:0px">

    <div class="input-group">

      <input type="text" class="form-control" maxlength="3" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" required>
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
    </div>

</div>';


}else{

echo'<div class="col-xs-6" style="padding-left:0px">

    <div class="input-group">

    <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Codigo Transaccion" required>
    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        

    </div>

</div>';


}



 ?>




                      </div>

                      <input type="hidden" name="listaMetodoPago" id="listaMetodoPago">
                     

                    </div>

                    <br>

                </div>

                <?php 
$Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];
$respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);

if($_SESSION["Contabilidad"] == 1){ 
    if($_SESSION["Proyecto"] == 1){ 


  $idproyecto = $venta["id_Proyecto"];
  $Codigo = $venta["CodigoProyecto"];
             
 echo '<div input-group">
                        <h4>Proyecto</h4>
                        
      <select type="text" class="form-control proyecto" id="proyecto" name="proyecto" required>';
  echo '<option value="'.$idproyecto.'">'.$Codigo.'</option>';
    foreach ($respuesta as $key => $value) {
                            
      echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';


      }
                           
       echo'</select>
                           </div>'; 

    } else {
          $idproyecto = 0;
          $NAsiento = 0;
echo '<input type="hidden" class="form-control" id="proyecto" name="proyecto" value="0" required> ';
      }
               
 } else {
          $idproyecto = 0;
          $NAsiento = 0;
echo '<input type="hidden" class="form-control" id="proyecto" name="proyecto" value="0" required> ';
      }
               
               


      ?> 
                
                   

 

       <div class="form-group col-xs-12 divretenciones">

     
<?php 
if($venta["Retenciones"] == "1" && substr($venta["NAsientoRET"], 0, 3) != "REI"){
  echo ' <div class="input-group">

      <span class="input-group"><h4>??Desea Realizar una Retenci??n a esta Factura?</h4></span>

  <div class="input-group form-control Retencion">
      <input type="radio" class="opcionretencion" name="Retencion" id="si" value="1" required checked> SI

      <input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required > NO
      
        </div>
      </div>';



}else{
   echo ' <div class="input-group">

      <span class="input-group"><h4>??Desea Realizar una Retenci??n a esta Factura?</h4></span>

  <div class="input-group form-control Retencion">
      
      <input type="radio" class="opcionretencion" name="Retencion" id= "no" value="2" required checked> NO
      
        </div>
      </div>';



}




 ?>

      
        
          
    

  </div>                    
                          
<div class="FormularioRetencion">
     <?php 
  if($venta["Retenciones"] = 1 && substr($venta["NAsientoRET"], 0, 3) != "REI"){
    if($venta["Porc_ITBIS_Retenido"] > 0 || $venta["Porc_ISR_Retenido"] > 0){
    
    echo'
    <div class="col-xs-6 left">
        <div class="form-group">

                   <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>';

    $Porc_ITBIS_Retenido = $venta["Porc_ITBIS_Retenido"];
    switch ($Porc_ITBIS_Retenido) {
      case '30':
      echo'<input type="radio" class="ITBISRetenido_Ventas" name="ITBISRetenido_Ventas" id="ITBIS30" value="30" checked>30 %<br>
<input type="radio" class="ITBISRetenido_Ventas" name="ITBISRetenido_Ventas" id="ITBIS100" value="100">100 %<br>';
        
      break;
      case '100':
      echo'<input type="radio" class="ITBISRetenido_Ventas" name="ITBISRetenido_Ventas" id="ITBIS30" value="30">30 %<br>
<input type="radio" class="ITBISRetenido_Ventas" name="ITBISRetenido_Ventas" id="ITBIS100" value="100" checked>100 %<br>';
        
      break;
      default:
      echo'input type="radio" class="ITBISRetenido_Ventas" name="ITBISRetenido_Ventas" id="ITBIS30" value="30">30 %<br>
<input type="radio" class="ITBISRetenido_Ventas" name="ITBISRetenido_Ventas" id="ITBIS100" value="100">100 %<br>';
        
        
      break;
    }

               

echo'<input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" value="'.$venta["ITBIS_Retenido_Tercero"].'" required>
                        
                    </div>

                </div>
             </div>';

      echo'<div class="col-xs-6  right">

          <div class="form-group">

               <div class="input-group form-control">

                   <label>% ISR RETENIDO</label><br>';


 $Porc_ISR_Retenido = $venta["Porc_ISR_Retenido"];

 switch ($Porc_ISR_Retenido) {
    case '2':

echo'<input type="radio" class="ISR_RETENIDO_Ventas" name="ISR_RETENIDO_Ventas" id="ISR2_Ventas" value="2" checked>2 %<br>
<input type="radio" class="ISR_RETENIDO_Ventas" name="ISR_RETENIDO_Ventas" id="ISR2_Ventas" value="10">10 %<br>
<br>';


    break;
    case '10':
    echo'<input type="radio" class="ISR_RETENIDO_Ventas" name="ISR_RETENIDO_Ventas" id="ISR2_Ventas" value="2" >2 %<br>
<input type="radio" class="ISR_RETENIDO_Ventas" name="ISR_RETENIDO_Ventas" id="ISR2_Ventas" value="10" checked>10 %<br>
<br>';

    break;
   
   default:
   echo'<input type="radio" class="ISR_RETENIDO_Ventas" name="ISR_RETENIDO_Ventas" id="ISR2_Ventas" value="2" >2 %<br>
<input type="radio" class="ISR_RETENIDO_Ventas" name="ISR_RETENIDO_Ventas" id="ISR2_Ventas" value="10">10 %<br>
<br>';
     
     
    break;
 }


echo'<input type="text" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" value="'.$venta["RetencionRenta_por_Terceros"].'" required><br>





       </div>
    </div>
</div>



';




    } else{

  }
   }else{}

    ?>
     
 
  </div>
     
<input type="hidden"  id="CambiarInventario" name="CambiarInventario" value="<?php echo $TipoDeInventario;?>">
                              

            </div>

            <div class="box-footer">

<button type="submit" class="btn btn-warning pull-right">Modificar</button>

              
            </div>

          </form>
          <?php 

            $editarVenta = new ControladorVentas();
            $editarVenta -> ctrEditarVenta();




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
                    <th>C??d.</th>
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
              <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar Tel??fono" data-inputmask="'mask': '(999) 999-9999'" data-mask required>

            </div>

          </div>
          <!--*****************cierra input de EMAIL************************* -->

            <!--*****************input de Direccion********************* -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Direcci??n" required>

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
  