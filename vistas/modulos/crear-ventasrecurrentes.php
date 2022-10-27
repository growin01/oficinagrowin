
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-file-pdf-o"></i>
        FACTURA
        
      </h1>
      <a href="crear-ventasrecurrentes" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Crear Factura Recurrentes</a>
    <a href="ventasrecurrentes" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Detalles Ventas Recurrentes</a>
       
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

    <?php     
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "DFF";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


               if($respuesta == false){
                   echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>
                  ';



                }
?>
        <div class="col-xs-6" style="padding-right: 0px">
          
          <div class="box box-success">

            <div class="box-header with-border">
              
            </div>

            <form role="form" method="post" class="formularioVenta">

            <div class="box-body">



             
                <div class="box">
                   
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
                   <div class="form-group col-xs-5" style="padding-right: 0px;">
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

                  

                <div class="col-xs-5 pull-left" style="padding-right:0px">
                     

                    <div class="input-group">
                     
                      
                      <span class="input-group-addon"><i class="fa fa-key">&nbsp;N° NCF&nbsp;</i></span>
                    

                      
                       <select class="form-control"  id="NCFFacturaRecurrente" name="NCFFacturaRecurrente" required>
                            <option value="">NCF</option>
                            <option value="FP1">FP1</option>
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
               
<div class="col-xs-12"><br></div>
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

                      
                         <input type="radio" Class="JuridicoClienteFactura" id="JuridicoClienteFactura" name="Tipo_Cliente_Factura" id="JuridicoUsuarioCliente" value="1" required> Jurídico

                    
                    
                        <input type="radio" Class="FisicoClienteFactura" id="FisicoClienteFactura" name="Tipo_Cliente_Factura" id="fisicoClienteFactura" value="2" required checked> Fisico


                 
                    </div>

                  </div>

                  </div>
        <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text" maxlength="11" class="form-control input-xs" id="RncClienteFactura" name="RncClienteFactura" placeholder="Ingresar Documento" required>

            </div>

          </div>
          
                
                  
                   <div class="form-group col-xs-6">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>

                    <input type="text" class="form-control input-xs" maxlength="11" id="Nombre_Cliente" name="Nombre_Cliente" placeholder="Nombre Cliente"  required>

                  </div>

                </div>
                 <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="text" class="form-control input-xs" id="nuevoTelefono" name="nuevoTelefono" placeholder="Ingresar Teléfono" required>
               
            </div>

          </div>
                  

          <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" class="form-control input-xs" id="nuevoEmail" name="nuevoEmail" placeholder="Ingresar email" required>

            </div>

          </div>
         
           <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control input-xs"  maxlength="150" id="Observaciones" name="Observaciones" placeholder=" Obrservaciones de Factura">

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
   <div class="col-xs-12"></div>   
   
     
                   <div class="form-group row nuevoProducto">

                  
                   

                   </div>

<input class="col-xs-12" type="hidden" id="listaProductos" name="listaProductos">

                   
<button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar Productos</button>
                   
  <hr>
<div class="col-xs-9 pull-right">
  <div class="TITULOMONEDA">

<div class="form-group col-xs-8 pull-right " style="background-color: #BEEDB6">

        <h4 style="text-align: center;"><b>TOTAL FACTURA  $ DOP</b></h4>
</div>
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
          
          <input  class="form-control" type="number" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="18" required>

         </div>
  </div>
   <div class="form-group col-xs-4" style="padding-left: 0px">

            <div class="input-group">

              
  <input type="text" class="form-control" id="nuevoPrecioImpuestovi" name="nuevoPrecioImpuestovi" placeholder="0000" required readonly>
  

  <input type="hidden" class="form-control" id="nuevoPrecioImpuesto" name="nuevoPrecioImpuesto" placeholder="0000"required readonly>

                        
              </div>
  </div>
  

                <input type="hidden" class="form-control" id="TotalRetvi" name="TotalRetvi" placeholder="0000" value="0"required readonly>

                <input type="hidden" name="TotalRet" id="TotalRet" value="0">
                        
            
 <div class="col-xs-6">
            <label class="pull-right">Total =</label>

    </div>

    <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
 <input type="text" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="0000" required readonly>

<input type="hidden" name="totalVenta" id="totalVenta">
                    
                        
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
                      
<?php
        if($_SESSION["Proyecto"] == 1){ 
            $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

            $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);

              echo '<div>
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
 
<div class="form-group col-xs-12">
    <div class="input-group">
      <span class="input-group"><h4>¿Desea Realizar esta Factura Recurrentemente?</h4></span>
          <div class="input-group form-control">
            <input type="radio" name="VentaRecurrente" id="si" value="1" required checked> SI
            <input type="radio" name="VentaRecurrente" id= "no" value="2" required> NO
          </div> 
     </div>
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
            $guardarVenta -> ctrCrearVentaRecurrentes();


           ?>

       
          </div>

          
        </div>

         <!--=================================================
            LA TABLA  DE PRODUCTO

        =======================================================-->

        <div class="col-xs-6" style="padding-left: 2px">

          <div class="box box-warning">



          </div>

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

                    
                    <th>Img.</th>
                    <th>Cód.</th>
                    <th>Descrip.</th>
                    <th>Prec. Venta</th>
                    <th>Stock</th>
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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="DFF" readonly>

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
               <input type="hidden" class="form-control input-lg" id="moduloCliente" name="moduloCliente" value="crear-ventas" readonly>


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
               <input type="hidden" class="form-control " id="ModuloCategorias" name="ModuloCategorias" value="crear-ventas" readonly>

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
              <input type="hidden" class="form-control input-lg" name="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $respuesta["id"];?>">

              <input type="hidden" class="form-control input-lg" id="UsuarioProductos" name="UsuarioProductos" value="<?php echo $_SESSION["Usuario"];?>" readonly>
              <input type="hidden" class="form-control " id="ModuloProducto" name="ModuloProducto" value="crear-ventas" readonly>



            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA Productos************************* -->
            <!--*****************SELECTOR DE Categoria********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control" id="nuevaCategoria" name="nuevaCategoria" required>
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
          <!--*****************cierra SELECTOR DE PEFIL************************* -->
            

         <!--*****************input de Nuevo Codigo de Productos********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Código" readonly>

            </div>

          </div>
          <!--*****************cierra input de Codigo de Productos************************* -->

          <!--*****************input de Descripcion********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>

            </div>

          </div>
          <!--*****************cierra input Descripcion************************* -->

        

              <!--*****************input de STOCK********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-check"></i></span>
              <input type="number" class="form-control" name="nuevoStock" min="0" placeholder="Cantidad Disponible" required>

            </div>


          </div>
          <!--*****************cierra input STOCK************************* -->
           <!--*****************input de Precio Compra********************** -->

          <div class="form-group row">
            <div class="col-xs-12 col-sm-6">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                <input type="number" class="form-control" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de Compra" required>

              </div>
             
            </div>

        
          <!--*****************cierra input Precio Compra************************* -->

          <!--*****************input de Precio Venta********************** -->
          <div class="col-xs-12 col-sm-6">
            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
              <input type="number" class="form-control" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de Venta" required>

            </div>

             <br>
              <!--*****************CHECKBOX DE PORCENTAJE********************** -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal porcentaje" checked>Utilizar Porcentaje
                    
                  </label>

                </div>
                
              </div>
              <!--*****************ENTRADA DE PORCENTAJE********************** -->
              <div class="col-xs-6" style="padding:0">
                <div class="input-group">
                  <input type="number" class="form-control nuevoPorcentaje" name = "Porcentaje" min="0" value="40" required>
                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  
                </div>
                
              </div>
            </div>

          </div>
          <!--*****************cierra input Precio Venta ************************* -->



          
          <!--*****************SUBIR FOTO********************** -->

          <div class="form-group">

            <div class="panel">SUBIR IMAGEN</div>
            <input type="file" class="nuevaImagen" name="nuevaImagen">
            <p class="help-block">Peso maximo de la IMAGEN 2MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>
          <!--*****************CIERRE SUBIR FOTO************************* -->
          
                     
          
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
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->




