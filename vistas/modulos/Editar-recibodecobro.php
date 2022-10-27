<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-sticky-note-o"></i>
        EDITAR RECIBO DE COBRO
      </h1>

      <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas</a>
  
   
    <a href="reportecxc" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Cuentas Por Cobrar</a>

    <a href="detallerecibodecobro" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Recibo de Cobro</a>
   
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">RECIBO DE COBRO</li>
      </ol>
    </section>
<br>
    <!-- Main content -->
    <section class="content">

      <div class="row">

        <!--=================================================
          EL FORMULARIO DE CRERAR VENTAS 

        =======================================================-->

        <div class="col-xs-6">
          
          <div class="box box-success">

            <div class="box-header with-border">
              <form role="form" method="post" class="formularioCobroCXC">

            <div class="box-body">


<?php 

  $Rnc_Empresa_CXC = $_SESSION["RncEmpresaUsuario"];
  $id = $_GET["id"];
  $NAsiento = $_GET["nasiento"];

$recibodecobro = ControladorCXC::ctrMostaridRecibodecobro($Rnc_Empresa_CXC, $id, $NAsiento);
    
?>

<input type="hidden"  id="RncEmpresaCXC" name="RncEmpresaCXC" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
<input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
<input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
<input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>">  

 <input type="hidden" class="form-control" id="idrecibodecobro" name="idrecibodecobro" value ="<?php echo $recibodecobro["id"];?>">             
                
<div class="form-group col-xs-6">
<div style="background-color: #BEEDB6" class="form-group col-xs-12">
   

  <div class="input-group">

    
           
 
<?php  

 $Moneda = $recibodecobro["FacturaCXC"];

  if($Moneda == "DOP"){
    echo '<h4 style="text-align: center"><b>Moneda de Facturas DOP $ </b></h4>';

  } else{  

    echo '<h4 style="text-align: center"><b>Moneda de Facturas USD $</b></h4>';

  }           
    

?>
   
                 
    </div>  
</div> 
</div>
<div class="form-group col-xs-6">
    <div class="form-group col-xs-12" style="background-color: #BEEDB6;">

        <div class="input-group">

              
<?php  

 $Moneda = $recibodecobro["ReciboCXC"];

  if($Moneda == "DOP"){
    echo '<h4 style="text-align: center;"><b>Moneda del Cobro</b></h4>';

  } else{  

    echo '<h4 style="text-align: center;"><b>Moneda del Cobro</b></h4>';

  }           
    

?>
  
 </div>           
   </div>  
 </div>  

  
  <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-money"></i></span>
              
            
                  <?php 
$Moneda = $recibodecobro["FacturaCXC"];

      switch ($Moneda) {
                      case 'DOP':
echo '<input type="text" class="form-control input-xs" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required readonly>';
break;
                      
                      case 'USD':
echo '<input type="text" class="form-control input-xs" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="USD" required readonly>';

break;
                    }


                   ?>
                                 

                  </div>
              </div>
 <div class="form-group col-xs-6">
                   
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-money"></i></span>

                     <div class="input-group form-control">

                  <?php 
  $Moneda = $recibodecobro["ReciboCXC"];

      switch ($Moneda) {
                      case 'DOP':
echo '
<input type="radio" name="MonedaParaCobro" id="MonedaParaCobro" value="DOP" required readonly checked >$ DOP &nbsp';
break;
                      
                      case 'USD':
echo '

<input type="radio" name="MonedaParaCobro" id="MonedaParaCobro" value="USD" required readonly checked>$ USD';

break;
                    }

  
                   ?>
                
                   
                   

              </div>
   </div>    
   </div> 
<div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

    <input type="text" class="form-control Fechames" maxlength="6" id="FechaFacturames" name="FechaFacturames" value="<?php echo $recibodecobro["FechaAnoMes"]?>" placeholder="Año/Mes Ejemplo 202001" required autofocus>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
   <input type="text" class="form-control Fechadia" maxlength="2" id="FechaFacturadia" name="FechaFacturadia" value="<?php echo $recibodecobro["FechaDia"]?>" placeholder="Día Ejemplo 01" required>
 
 </div>  
  
  
</div>
                
<div class="form-group col-xs-12">

  <div class="input-group">
      
      <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify
glyphicon"></i></span>

<input type="text" class="form-control input-xs" maxlength="100" name="Observaciones" value="<?php echo $recibodecobro["Descripcion"]?>">

            </div>
              <?php

          if($_SESSION["Contabilidad"] == 1){
    echo '<div class="form-group">
         
                           
         <div class="col-xs-12">

        
        <label class="col-xs-4">Referencia</label>
        <label class="col-xs-4">Agregar Banco</label>
        </div>
        <input type="hidden" id="ModuloBanco" name="ModuloBanco" value="Activo" required readonly>
        
         <div class="col-xs-3" style="padding-left:0px;">

        <input type="text" class="form-control"  id="Referencia_607" name="Referencia_607" placeholder="Referencia" maxlength="6" value="'.$recibodecobro["Referencia"].'" required>

        </div>
        
        <div class="col-xs-5" style="padding-left:0px">';
        
   $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];
   $id_banco = $recibodecobro["EntidadBancaria"];

   $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

   if($id_banco != "" && $id_banco != 0){ 
   foreach ($Banco as $key => $value){

     if($value["id"] == $id_banco){ 


     echo '<select type="text" class="form-control col-xs-12" id="Editar-agregarBanco" name="Editar-agregarBanco">
         <option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

       }

    }
   foreach ($Banco as $key => $value){

     if($value["id"] != $id_banco){ 


     echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';

       }

    }
  } 
  
 
   
        echo'</select>
         </div>';


            if($_SESSION["Proyecto"] == 1){ 

                    $id = "id";
                    $valorid = $recibodecobro["id_Proyecto"];

                    $proyecto = ControladorProyecto::ctrModalEditarProyecto($id, $valorid);
                   

                    echo '<div class="col-xs-4">
                        
                         <select type="text" class="form-control proyecto" id="proyecto" name="proyecto" required>
                          <option value="'.$proyecto["id"].'">'.$proyecto["CodigoProyecto"].'</option>';

                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                      $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);


                         foreach ($respuesta as $key => $value) {
                          if($proyecto["id"] != $value["id"]){ 
                          echo '<option value="'.$value["id"].'">'.$value["CodigoProyecto"].'</option>';
                         }
                            }

                               

                           echo'</select>
                           </div>';
                    }else {

                       echo '<input type="hidden" class="form-control" id="proyecto" name="proyecto" value="0" required>';
                     


                    }
                     

        
                            
      echo'</div>';



                  }else{
                   echo '<div class="col-xs-12">
                   <div class="form-group col-xs-4">
                   <input type="hidden" class="form-control col-xs-12" id="Editar-agregarBanco" name="Editar-agregarBanco">

                      <div class="input-group">
                        <label>Referencia</label>
              
                      <input type="text" class="form-control input-xs" maxlength="25" name="Referencia_607">

                     </div>

                  </div>
                   <div class="form-group col-xs-4">

                      <div class="input-group">
                        <label>Entidad Bancaria</label>
              
                      <input type="text" class="form-control input-xs" maxlength="25" name="Entidad_Bancaria">

                     </div>

                  </div>
                  <div class="form-group col-xs-4">

                      <div class="input-group">
                        <label>Descripción</label>
              
                      <input type="text" class="form-control input-xs" maxlength="25" name="Descripcion">

                     </div>

                  </div>
                   
                  </div>';
                  }

                  ?>

          </div>
          <div class="form-group col-xs-8">
                       
                  <label>N° de Recibo de Cobro</label>

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span>
                   
        <input type="text" class="form-control" id="NAsiento" name="NAsiento" value="<?php echo $recibodecobro["NAsiento"];?>"readonly>

                    </div>
          </div>
                     
  <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>FACTURAS A COBRAR</b></h4>

  </div>                        

        <div class="col-xs-12"></div>

<div class="form-group row nuevafacturaCXC">
  <?php 
  $listaFacturas = json_decode($recibodecobro["Facturas"], true);

  foreach ($listaFacturas as $key => $value) {
echo ' 
<div class="row" style="padding:1px 20px">
    <div class="col-xs-3" style="padding-right:0px">
        <div class="input-group">
          <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs quitarFactura" id_CXC="'.$value["id"].'"><i class="fa fa-times"></i></button></span>

<input type="hidden" class="form-control id_CXC" id_CXC="'.$value["id"].'" name="id_CXC" value="'.$value["id"].'" required readonly> 
<input type="hidden" class="form-control id_607" name="id_607" value="'.$value["id_607"].'" required readonly>
<input type="hidden" class="form-control codigo" name="codigo" value="'.$value["codigo"].'" required readonly>
<input type="hidden" class="form-control id_cliente" name="id_cliente" value="'.$value["id_cliente"].'" required readonly> 
<input type="hidden" class="form-control rnc_Factura" name="rnc_Factura" value="'.$value["rnc_Factura"].'" required readonly>
<input type="hidden" class="form-control nombre_cliente" name="nombre_cliente" value="'.$value["nombre_cliente"].'" required readonly> 
<input title="NCF Factura" type="text" class="form-control ncf_factura" name="ncf_factura" value="'.$value["ncf_factura"].'" required readonly> 
                                            
        </div>
    </div>
    

<div class="col-xs-2" style="padding-left:0px; padding-right:0px">
    <div input-group">
       
      <input title="Monto de Cuenta por Cobrar" type="text" class="form-control monto" name="monto" value="'.$value["monto"].'" required>
                  
        </div>
     </div>
     
<div class="col-xs-1 tasaCXC" style="padding-left:0px; padding-right:0px">
    <div input-group">
       
      <input title="Tasa Cambiaria" type="text" class="form-control tasa" name="tasa" value="'.$value["tasa"].'" required readonly> 
      <input type="hidden" class="form-control tasahistorica" name="tasahistorica" value="'.$value["tasahistorica"].'" required readonly>
                   
    </div>
</div>
<div class="col-xs-2" style="padding-left:0px; padding-right:0px">
    <div input-group">
       
      <input title="CXC en Pesos" type="text" class="form-control cxcpesos" name="cxcpesos" value="'.$value["cxcpesos"].'" required readonly> 
                  
     </div>
</div>
<div class="col-xs-2" style="padding-left:0px; padding-right:0px">
    <div input-group">
       
      <input title="Ingreso en Banco" type="text" class="form-control ingbanco" name="ingbanco" value="'.$value["ingbanco"].'" required> 
                  
    </div>
</div>
<div class="col-xs-2" style="padding-left:0px; padding-right:0px">
    <div input-group">
       
      <input title="Diferencia entre la CXC y el Ingreso al Banco" type="text" class="form-control diferencia" name="diferencia" value="'.$value["diferencia"].'" required>
                  
        </div>
     </div>
</div>';
 }

?>
                
  





</div>
<input type="hidden" class="col-xs-12" id="listaFacturasCXC" name="listaFacturasCXC" value="<?php echo $recibodecobro["Facturas"];?>">

  
                <div class="col-xs-8 pull-right">
                  <div class="col-xs-5 pull-left" style="background-color: #BEEDB6">

                    <h5 style="text-align: center;"><b>TOTAL COBRO</b></h5>
                  
                  </div>
                  
                  <div class="col-xs-5 pull-right" style="background-color: #BEEDB6">

                    <h5 style="text-align: center;"><b>TOTAL DIFERENCIA</b></h5>
                  
                  </div>
                  <br> <br>
 

               
                

                  <div class="form-group col-xs-5 pull-left">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input title="Total Cobrado" type="text" class="form-control" id="TotalCobrovi" name="TotalCobrovi" placeholder="0000" value=""required readonly>

                <input type="hidden" name="TotalCobro" id="TotalCobro" value="">
                        
            </div>
            
          </div>
         

              <div class="form-group col-xs-5 pull-right">

            <div class="input-group">
              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input title="Total Diferencia" type="text" class="form-control" id="Diferenciavi" name="Diferenciavi" placeholder="0000" value=""required readonly>

                <input type="hidden" name="Diferencia" id="Diferencia" value="">
                        
            </div>
            
          </div>




                </div>             
              
            
              <div class="form-group col-xs-8 pull-right">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>

                      <select type="text" class="form-control" id="Tipodiferencia" name="Tipodiferencia" required>
                        <?php  

$Tipodiferencia = $recibodecobro["Tipodiferencia"];

switch ($Tipodiferencia) {
  case '0':
    echo '<option value="0">Selección tipo de diferencia</option>
          <option value="1">Diferencia Cambiaria</option>
          <option value="2">Diferencia por Cobro de Factura</option>';
    break;
    case '1':
    echo '<option value="1">Diferencia Cambiaria</option>
          <option value="0">Selección tipo de diferencia</option>
          <option value="2">Diferencia por Cobro de Factura</option>';
    break;
    case '2':
    echo '<option value="2">Diferencia por Cobro de Factura</option>
          <option value="0">Selección tipo de diferencia</option>
          <option value="1">Diferencia Cambiaria</option>';
          
    break;
  
  default:
    echo '<option value="0">Selección tipo de diferencia</option>
          <option value="1">Diferencia Cambiaria</option>
          <option value="2">Diferencia por Cobro de Factura</option>';
    break;
}



?>

                     
                        

                      </select>

                      

                    </div>
                   

                  </div>

            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-warning pull-right">Editar Cobro</button>

              
            </div>

          </form>
          <?php 

            $emitircobro = new ControladorCXC();
            $emitircobro -> ctrEditarEmitirCobro();




           ?>

       
               
            </div>

           
      
          </div>

          
        </div>

  <!--======================== LA TABLA  DE PRODUCTO ===================================-->

      <div class="col-xs-6">

          <div class="box box-warning">

             <div class="box-header with-border">


                <div class="box-body">
                  <div class="col-xs-12">

                       <div class="form-group col-xs-12">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select type="text" class="form-control" id="agregarClienteCXC" name="agregarClienteCXC" placeholder="Agregar Cliente">
                       
                        <?php 
          $tabla = "clientes_empresas";
          $taRnc_Empresa_Cliente = "Rnc_Empresa_Cliente";
          $Rnc_Empresa_Cliente = $_GET["Rnc_Empresa_cxc"];
          $taDocumento = "Documento";
          $Documento = $_GET["Rnc_Cliente"];

          

        $Cliente = ModeloClientes::mdlMostrarClientesFact($tabla, $taRnc_Empresa_Cliente, $Rnc_Empresa_Cliente, $taDocumento, $Documento);

        $idCliente = $Cliente["id"];



              if(isset($idCliente)){
                $id_Cliente = "id";
                $Valor_idCliente = $idCliente;

              $Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];

              $Cliente = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);

                
                    
              foreach ($Cliente as $key => $value){
                  if($idCliente == $value["id"]){ 
                  
                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cliente"].'</option>';
                  }
                        
                    
              }           

      $Cliente = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);


  foreach ($Cliente as $key => $value){
          if($idCliente != $value["id"]){ 
                  
            echo '<option value="'.$value["id"].'">'.$value["Nombre_Cliente"].'</option>';
          }
                        
                     
      }

  }else{
        
        echo '<option value="">Seleccione un Cliente</option>';
   

          $Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];
          $Clientes = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);



          foreach ($Clientes as $key => $value){
                  
                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cliente"].'</option>';
                        
          }

}
 
?>

</select>

                      

                    </div>
                   

                  </div>
              </div>

  <div class="col-xs-12">
          <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $idCliente ?>">
           <input type="hidden" id="Moneda" name="Moneda" value="<?php echo $_GET["Moneda"] ?>">
                    
                  <div class="form-group col-xs-6">
                   
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-money"></i></span>

                     <div class="input-group form-control RCXCMoneda">

                  <?php 
if(isset($_GET["Moneda"])){
$Moneda = $_GET["Moneda"];

      switch ($Moneda) {
                      case 'DOP':
echo '<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required checked>$ DOP &nbsp;';
break;
                      
                      case 'USD':
echo '
<input type="radio" name="ReciboCobroMoneda"  id="ReciboCobroMoneda" value="USD" required checked>$ USD';
break;
                    }



}else{
  echo '<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required checked>$ DOP &nbsp;
<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="USD" required>$ USD';


}



                   ?>
                
                   
                   

                  </div>
              </div>
   </div>  
</div>


<div class="form-group col-xs-12" style="background-color: #BEEDB6">
<?php  

 $Moneda = $_GET["Moneda"];

 if($Moneda == "DOP"){


  echo '<h4 style="text-align: center;"><b>Cuentas por cobrar en DOP $ </b></h4>';
 } else{  

 echo '<h4 style="text-align: center;"><b>Cuentas por cobrar en USD $ </b></h4>';

}           

   

?>
  
                 
    </div>
    
<div class="col-xs-12"></div>

    <table class="table table-bordered table-striped dt-responsive ReporteCXC" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 5px">#</th>
                <th style="width: 15px">Suplidor</th>
                <th style="width: 10px">NCF</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th> 
                <th style="width: 10px">Moneda</th>
                <th style="width: 10px">Tasa</th>       
                <th>Por Cobrar</th>
                <th></th><!--13 ACCION-->
               
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
  
  if(isset($idCliente)){ 

             
  $Rnc_Empresa_CXC =  $_SESSION["RncEmpresaUsuario"];

  $respuesta = ControladorCXC::ctrMostarCXC($Rnc_Empresa_CXC);


foreach ($respuesta as $key => $value) {

  if($value["Moneda"] == $_GET["Moneda"]){ 
        
  if($idCliente == $value["id_Cliente"]){ 
    $tablaClientes = "clientes_empresas";
    $id = "id";
    $valorid = $idCliente;

$respuestaCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);

    $Nombre_Cliente = $respuestaCliente["Nombre_Cliente"];
    $Rnc_Factura = $respuestaCliente["Documento"];

            
$Deuda = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["ITBIS_Retenido"] - $value["Retencion_Renta"];
                 
        $Rnc_Empresa_cxc = $_SESSION["RncEmpresaUsuario"];
        $CodigoVenta = $value["Codigo"];
        $id_Cliente = $value["id_Cliente"];
        $Rnc_Cliente = $value["Rnc_Cliente"];
        $NCF_cxc = $value["NCF_cxc"];
        $Tipo = "FACTURA";

$cobros = ControladorCXC::ctrMostarPagosCXC($Rnc_Empresa_cxc, $CodigoVenta, $id_Cliente, $Rnc_Cliente, $NCF_cxc, $Tipo);
    
    $TotalSuma = 0;

    foreach ($cobros as $key1 => $sumacobros){

      $TotalSuma = $TotalSuma + $sumacobros["Monto"];
      
   
    }
 

                 $Cobro = $TotalSuma;
                 $PorCobrar = $Deuda - $Cobro;

                  $botonAccion = "<div title='Agregar factura' class='btn-group'><button  class='btn btn-primary btn-xs agregarFacturaCXC recuperarFacturaCXC' id_CXC='".$value["id"]."' codigo='".$value["Codigo"]."' id_607 = '".$value["id_607"]."' rnc_Factura = '".$Rnc_Factura."' id_cliente = '".$value["id_Cliente"]."' nombre_cliente = '".$Nombre_Cliente ."' ncf_factura='".$value["NCF_cxc"]."' monto='".$PorCobrar."' tasa='".$value["Tasa"]."'> +</button></div>";

                    if ($PorCobrar > 0) {
                
                  echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td>'.$Nombre_Cliente.'</td>
                            <td style="width: 15px">'.$value["NCF_cxc"].'</td>
                            <td>'.$value["FechaAnoMes_cxc"].'</td>
                            <td>'.$value["FechaDia_cxc"].'</td>
                            <td>'.$value["Moneda"].'</td>
                            <td>'.$value["Tasa"].'</td>
                            <td>'.number_format($PorCobrar, 2).'</td>
                            <td>'.$botonAccion.'</td>


</tr>';

       
                }
            

            }/*cierre if suplidor*/

  }  /*cierre de moneda*/  

}/*cierre for respuesta*/





}/*cierre isset*/








               ?>

            </tbody>
   <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>TOTAL</td> 
                <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
                                   
                <td></td>  
              </tr>

      </tfoot>        
            
          </table>

<div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">
<?php  

 $Moneda = $_GET["Moneda"];

  if($Moneda == "DOP"){
    echo '<h4 style="text-align: center;"><b>Cuentas por cobrar en USD $ </b></h4>';

  } else{  

    echo '<h4 style="text-align: center;"><b>Cuentas por cobrar en DOP $ </b></h4>';

  }           
    

?>
  
                 
    </div>
    
    

    <table class="table table-bordered table-striped dt-responsive ReporteCXC" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 5px">#</th>
                <th style="width: 15px">Suplidor</th>
                <th style="width: 10px">NCF</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th> 
                <th style="width: 10px">Moneda</th>
                <th style="width: 10px">Tasa</th>       
                <th>Por Cobrar</th>
                <th></th><!--13 ACCION-->
               
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
  
  if(isset($idCliente)){ 

             
  $Rnc_Empresa_CXC =  $_SESSION["RncEmpresaUsuario"];

  $respuesta = ControladorCXC::ctrMostarCXC($Rnc_Empresa_CXC);


foreach ($respuesta as $key => $value) {

  if($value["Moneda"] != $_GET["Moneda"]){ 
        
  if($idCliente == $value["id_Cliente"]){ 
    $tablaClientes = "clientes_empresas";
    $id = "id";
    $valorid = $idCliente;

$respuestaCliente = ModeloClientes::mdlMostrarClientesid($tablaClientes, $id, $valorid);

    $Nombre_Cliente = $respuestaCliente["Nombre_Cliente"];
    $Rnc_Factura = $respuestaCliente["Documento"];

            
$Deuda = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["ITBIS_Retenido"] - $value["Retencion_Renta"];
                 
        $Rnc_Empresa_cxc = $_SESSION["RncEmpresaUsuario"];
        $CodigoVenta = $value["Codigo"];
        $id_Cliente = $value["id_Cliente"];
        $Rnc_Cliente = $value["Rnc_Cliente"];
        $NCF_cxc = $value["NCF_cxc"];
        $Tipo = "FACTURA";

$cobros = ControladorCXC::ctrMostarPagosCXC($Rnc_Empresa_cxc, $CodigoVenta, $id_Cliente, $Rnc_Cliente, $NCF_cxc, $Tipo);
    
    $TotalSuma = 0;

    foreach ($cobros as $key1 => $sumacobros){

      $TotalSuma = $TotalSuma + $sumacobros["Monto"];
      
   
    }
 

                 $Cobro = $TotalSuma;
                 $PorCobrar = $Deuda - $Cobro;

                  $botonAccion = "";

                    if ($PorCobrar > 0) {
                
                  echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td>'.$Nombre_Cliente.'</td>
                            <td style="width: 15px">'.$value["NCF_cxc"].'</td>
                            <td>'.$value["FechaAnoMes_cxc"].'</td>
                            <td>'.$value["FechaDia_cxc"].'</td>
                            <td>'.$value["Moneda"].'</td>
                            <td>'.$value["Tasa"].'</td>
                            <td>'.number_format($PorCobrar, 2).'</td>
                            <td>'.$botonAccion.'</td>


</tr>';

       
                }
            

            }/*cierre if suplidor*/

  }  /*cierre de moneda*/  

}/*cierre for respuesta*/


}/*cierre isset*/



?>

            </tbody>
   <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>TOTAL</td>
            <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>    
            <td></td>  
        </tr>

      </tfoot>        
            
          </table>
 
            </div>
       
            </div>
            
          </div>
             

      </div>
        

      </div>

      
    </section>


   </div>

   