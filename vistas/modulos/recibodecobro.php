<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-sticky-note-o"></i>
        RECIBO DE COBRO
      </h1>

      <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas</a>
  
   
    <a href="reportecxc" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Cuentas Por Cobrar</a>

    <a href="detallerecibodecobro" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Recibo de Cobro</a>
   
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">RECIBO DE COBRO</li>
      </ol>
    </section>

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
                <input type="hidden"  id="RncEmpresaCXC" name="RncEmpresaCXC" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">
                   
                   
        <input type="hidden" class="form-control" id="idCXC" name="idCXC" value="<?php echo$_GET["id_CXC"];?>" readonly>
        <input type="hidden" class="form-control" id="idCliente" name="idCliente" value="<?php echo$_GET["idCliente"];?>" readonly>
        <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
        <input type="hidden" class="form-control" id="Banco" name="Banco" value="<?php echo $_SESSION["Banco"]?>">
        <input type="hidden" class="form-control" id="Proyecto" name="Proyecto" value="<?php echo $_SESSION["Proyecto"]?>">
        <input type="hidden" class="form-control" id="Usuariologueado" name="UsuarioLogueado" value="<?php echo $_SESSION["Nombre"]?>"> 

        <div class="form-group col-xs-12">

                    

                      
                      <?php 

                      $Rnc_Empresa_cxc = $_SESSION["RncEmpresaUsuario"];



              $ReciboCXC = ControladorCXC::ctrMostrarCodigoReciboCXC($Rnc_Empresa_cxc);
                      if(!$ReciboCXC){

                        echo ' <input type="hidden" class="form-control" id="nuevoReciboCXC" name="nuevoReciboCXC" value="1" readonly>
                      ';



                      } else{

                          foreach ($ReciboCXC as $key => $value) {

                            
                          }
                         

                          $codigo = $value["CodigoReciboCXC"]+1;

                         echo ' <input type="hidden" class="form-control" id="nuevoReciboCXC" name="nuevoReciboCXC" value="'.$codigo.'" readonly>
                      ';


                      }


                       ?>

                     

                    
                   

                  </div>



<div class="form-group col-xs-6">
  <div style="background-color: #BEEDB6" class="form-group col-xs-12">
   <div class="input-group">
         
 
<?php  

 $Moneda = $_GET["Moneda"];

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

 $Moneda = $_GET["Moneda"];

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
if(isset($_GET["Moneda"])){
$Moneda = $_GET["Moneda"];

      switch ($Moneda) {
                      case 'DOP':
echo '<input type="text" class="form-control input-xs" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required readonly>';
break;
                      
                      case 'USD':
echo '<input type="text" class="form-control input-xs" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="USD" required readonly>';

break;
                    }
}

                   ?>
                                 

                  </div>
              </div>
    
<div class="form-group col-xs-6">
      <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-money"></i></span>
              <div class="input-group form-control">
<?php 
echo '<input type="radio" name="MonedaParaCobro" id="MonedaParaCobro" value="DOP" required>$ DOP &nbsp;
<input type="radio" name="MonedaParaCobro" id="MonedaParaCobro" value="USD" required>$ USD';
?>                 
              </div>
      </div>
</div>  


            
              <?php
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                
                $Tipo_NCF = "RPC";

                $respuesta = ControladorCorrelativos::ctrMostrarCorrelativosNoFiscal($Rnc_Empresa, $Tipo_NCF);


if($respuesta == false){
echo'<button class="btn btn-warning pull-right"  data-toggle="modal" data-target="#modalCorrelativoNoFiscal"><i class="fa fa-pencil"></i></button>';
}
                $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
                $Rnc_Empresa_Master = null;
                $Orden = "id";

                $Empresa = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);



               ?>
  
<div style="padding-right: 0px"  class="form-group col-lg-6">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

    <input type="text" class="form-control Fechames" maxlength="6" id="FechaFacturames" name="FechaFacturames" value="<?php if (isset($_SESSION['FechaFacturames'])){ echo $_SESSION['FechaFacturames'];}?>" placeholder="Año/Mes Ejemplo 202001" required autofocus>
    
   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-lg-6">
   

  <div class="input-group">
   <input type="text" class="form-control Fechadia" maxlength="2" id="FechaFacturadia" name="FechaFacturadia" value="<?php if (isset($_SESSION['FechaFacturadia'])){ echo $_SESSION['FechaFacturadia'];}?>" placeholder="Día Ejemplo 01" required>
 
 </div>  
  
  
</div>
                
                    <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify
glyphicon"></i></span>
      <input type="text" class="form-control input-xs" maxlength="100" name="Observaciones">

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

        <input type="text" class="form-control"  id="Referencia_607" name="Referencia_607" placeholder="Referencia" maxlength="6" required>

        </div>
        
        <div class="col-xs-5" style="padding-left:0px">
        <select type="text" class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" required>
        <option value="">Seleccionar Banco</option>';
        $Rnc_Empresa_Banco = $_SESSION["RncEmpresaUsuario"];

        $Banco = ControladorBanco::ctrMostrarBanco($Rnc_Empresa_Banco);

          

            foreach ($Banco as $key => $value){

           echo '<option value="'.$value["id"].'">'.$value["Nombre_Cuenta"].'</option>';


            }
        
        echo'</select>
         </div>';


            if($_SESSION["Proyecto"] == 1){ 
                    $Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];

                      $respuesta = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);

                        echo '<div class="col-xs-4">
                        
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
                     

        
                            
      echo'</div>';



                  }else{
                   echo '<div class="col-xs-12">
                   <div class="form-group col-xs-4">
                   <input type="hidden"class="form-control col-xs-12" id="agregarBanco" name="agregarBanco" value="0" required>

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
                       
                  
                    <div class="input-group">
                    

                      
                    <?php 
                     $Rnc_Empresa_Diario = $_SESSION["RncEmpresaUsuario"];
                      $tipocod = "RPC";


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



                      }else{





                      } 

                     
                   ?>

                    </div>
          </div>
                     
            
 <div class="form-group col-xs-12 pull-right" style="background-color: #BEEDB6">

      <h4 style="text-align: center;"><b>FACTURAS A COBRAR</b></h4>

  </div>         

        <div class="col-xs-12"></div>

<div class="form-group row nuevafacturaCXC"></div>



<input type="hidden" class="col-xs-12" id="listaFacturasCXC" name="listaFacturasCXC">
                
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

                <input title="Total Diferencia" type="text" class="form-control" id="Diferenciavi" name="Diferenciavi" placeholder="0000" value="" required readonly>

                <input type="hidden" name="Diferencia" id="Diferencia" value="">
                        
            </div>
            
          </div>




                </div>             
              

                    <div class="form-group col-xs-8 pull-right">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>

                      <select type="text" class="form-control" id="Tipodiferencia" name="Tipodiferencia" required>
                        <option value="">Selección tipo de diferencia</option>
                        <option value="1">Diferencia Cambiaria</option>
                        <option value="2">Diferencia por Cobro de Factura</option>
                      
                        

                      </select>

                      

                    </div>
                   

                  </div>
            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Guardar Cobro</button>

              
            </div>

          </form>
          <?php 

            $emitircobro = new ControladorCXC();
            $emitircobro -> ctrEmitirCobro();




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

              if(isset($_GET["idCliente"])){
                $id_Cliente = "id";
                $Valor_idCliente = $_GET["idCliente"];

              $Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];

              $Cliente = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);

                
                    
              foreach ($Cliente as $key => $value){
                  if($_GET["idCliente"] == $value["id"]){ 
                  
                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Cliente"].'</option>';
                  }
                        
                    
              }           

      $Cliente = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);


  foreach ($Cliente as $key => $value){
          if($_GET["idCliente"] != $value["id"]){ 
                  
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
          <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $_GET["idCliente"] ?>">
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
echo '<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required checked>$ DOP &nbsp; 
<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="USD" required>$ USD';
break;
                      
                      case 'USD':
echo '<input type="radio" name="ReciboCobroMoneda" id="ReciboCobroMoneda" value="DOP" required>$ DOP &nbsp;
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
                
                <th style="width: 15px">Cliente</th>
                <th style="width: 10px">NCF</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th> 
                 <th style="width: 10px">Desc.</th>
                <th style="width: 10px">Moneda</th>
                <th style="width: 10px">Tasa</th>       
                <th>Por Cobrar</th>
               
                <th><br></th><!--13 ACCION-->
               
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
  
  if(isset($_GET["idCliente"])){ 

             
  $Rnc_Empresa_CXC =  $_SESSION["RncEmpresaUsuario"];
  $id_Cliente = $_GET["idCliente"];

  $respuesta = ControladorCXC::ctrMostarCXCidCliente($Rnc_Empresa_CXC, $id_Cliente);


foreach ($respuesta as $key => $value) {

  if($value["Moneda"] == $_GET["Moneda"]){ 
        
  if($_GET["idCliente"] == $value["id_Cliente"]){ 
    $tablaClientes = "clientes_empresas";
    $id = "id";
    $valorid = $_GET["idCliente"];

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

                  $botonAccion = "<div title='Agregar factura' class='btn-group'><button  class='btn btn-primary btn-xs agregarFacturaCXC recuperarFacturaCXC' id_CXC='".$value["id"]."' codigo='".$value["Codigo"]."' id_607 = '".$value["id_607"]."' rnc_Factura = '".$Rnc_Factura."' id_cliente = '".$value["id_Cliente"]."' nombre_cliente = '".$Nombre_Cliente ."' ncf_factura='".$value["NCF_cxc"]."' monto='".$PorCobrar."' tasa='".$value["Tasa"]."'> +</button>  </div>


                  <div class='btn-group'>
                   <button Title='Retener Cuenta Por Cobrar' class='btn btn-warning btn-xs btnRetenerCXCrecibocobro' Rnc_Empresa_607='".$Rnc_Empresa_CXC."' Rnc_Factura_607='".$Rnc_Factura."' NCF_607='".$value["NCF_cxc"]."'  Moneda = '".$value["Moneda"]."' Tasa = '".$value["Tasa"]."' Estado = '".$Estado."' data-toggle='modal' data-target='#modalRetenerCXC'><i class='fa fa-university'></i></button>

                   </div>";

                    if ($PorCobrar > 0) {
                
                  echo '<tr>
                           
                            <td>'.$Nombre_Cliente.'</td>
                            <td style="width: 15px">'.$value["NCF_cxc"].'</td>
                            <td>'.$value["FechaAnoMes_cxc"].'</td>
                            <td>'.$value["FechaDia_cxc"].'</td>
                            <td style="width: 10px">'.$value["Observaciones"].'</td>
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
                
                <th style="width: 15px">Cliente</th>
                <th style="width: 10px">NCF</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th> 
                <th style="width: 5px">Desc.</th>
                <th style="width: 10px">Moneda</th>
                <th style="width: 10px">Tasa</th>       
                <th>Por Cobrar</th>
                <th></th><!--13 ACCION-->
               
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
  
  if(isset($_GET["idCliente"])){ 

             
  $Rnc_Empresa_CXC =  $_SESSION["RncEmpresaUsuario"];

  $respuesta = ControladorCXC::ctrMostarCXC($Rnc_Empresa_CXC);


foreach ($respuesta as $key => $value) {

  if($value["Moneda"] != $_GET["Moneda"]){ 
        
  if($_GET["idCliente"] == $value["id_Cliente"]){ 
    $tablaClientes = "clientes_empresas";
    $id = "id";
    $valorid = $_GET["idCliente"];

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
                            
                            <td>'.$Nombre_Cliente.'</td>
                            <td style="width: 15px">'.$value["NCF_cxc"].'</td>
                            <td>'.$value["FechaAnoMes_cxc"].'</td>
                            <td>'.$value["FechaDia_cxc"].'</td>
                            <td style="width: 10px">'.$value["Observaciones"].'</td>
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

                    <input type="text" class="form-control input-NCF" id="Tipo_NCF" name="Tipo_NCF" maxlength="3" Value="EPC" readonly>

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

<div id="modalRetenerCXC" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Retener Ventas en Cuentas Por Cobrar</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
<input type="hidden" class="form-control input-lg" id="RncEmpresaRetener" name="RncEmpresaRetener" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
<input type="hidden" class="form-control input-lg" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>
<input type="hidden" class="form-control input-lg" id="Modulo" name="Modulo" value="recibodecobro" readonly>
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">




            </div>



            </div>


 <div class="form-group col-xs-6">

                   
  <div class="input-group">

      <span class="input-group-addon"><i>Moneda</i></span>             

<input type="Text" class="form-control" maxlength="11" id="Monedarecibocobro" name="Monedarecibocobro"required readonly>

</div>
</div> 

<div class="form-group col-xs-6">

  <div class="input-group">

<span class="input-group-addon"><i>Tasa</i></span>
<input type="Text" class="form-control" maxlength="11" id="Tasa" name="Tasa"required readonly>

</div>   


      </div>
          
          <div class="form-group">

                   
                  <div class="input-group">

                   

<input type="hidden" class="form-control" maxlength="11" id="id_607_Retener" name="id_607_Retener"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="Codigo_Factura" name="Codigo_Factura"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="Forma_De_Pago" name="Forma_De_Pago"required readonly>




          </div>

      </div>
         
          
          <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text"   class="form-control input-RNC" maxlength="11" id="Rnc_Retener_607" name="Rnc_Retener_607" value = "" required readonly>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

           <div class="form-group col-xs-6">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" maxlength="11" id="NCF_607_Retener" name="NCF_607_Retener" required readonly>

                  </div>

                </div>
<div class="form-group col-xs-12">


                    
                     <label>FECHA DE FACTURA</label>
                   

                 
</div>
<div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaFacturames_607_Retener" name="FechaFacturames_607_Retener" required readonly>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaFacturadia_606_Retener" name="FechaFacturadia_606_Retener"  required readonly>
 </div>  
  
  
</div>

         



                    <div class="form-group col-xs-12">


                    
                     <label>FECHA DE RETENCIÓN</label>
                   

                 
                  </div>

<div style="padding-right: 0px"  class="form-group col-xs-4">
   

  <div class="input-group">
    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

   
       <input type="text" class="form-control" maxlength="6" id="FechaRetenecionmes_607" name="FechaRetenecionmes_607"  placeholder="Año/Mes Ejemplo 202001" required>
        

   </div>  
  
  
</div>

<div style="padding-left: 0px" class="form-group col-xs-4">
   

  <div class="input-group">
 <input type="text" class="form-control" maxlength="2" id="FechaReteneciondia_607" name="FechaReteneciondia_607" placeholder="Día Ejemplo 01" required>
 </div>  
  
  
</div>
<div class="col-xs-12">
                

                   <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      
                        <label>MONTO FACTURADO SIN ITBIS</label>
                        <br>

                        <input type="number" class="form-control" min=0 step="any" id="MontoFacturadoRetener_607" name="MontoFacturadoRetener_607" required readonly>


                      </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>MONTO ITBIS</label>
                        <br>

                        <input type="number" class="form-control" min=0 step="any" id="MontoITBIS_Retener_607" name="MontoITBIS_Retener_607" required readonly>


                      </div>
                      

                    </div>
</div>
<div class="col-xs-12"><br></div>




        <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>

                     

                        <input type="radio" name="ITBIS_Retenido_607" id="ITBIS0_607" value="0">0 %
                        <br>
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

                     

                        <input type="radio" name="ISR_RETENIDO_607" id="ISR0_607" value="0">0 %
                        <br>
                        <input type="radio" name="ISR_RETENIDO_607" id="ISR2_607" value="2">2 %
                        <br>
                        <input type="radio" name="ISR_RETENIDO_607" id="ISR10_607" value="10">10 %<br>
                        
                        <input type="text" name="Monto_ISR_Retenido_607" id="Monto_ISR_Retenido_607">
                        <br>
                         


                        
                    </div>

                  

                  </div>
                  </div>
              

          
        </div>
 
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Retener</button>

      </div>

     <?php 

        $crearRetencionReciboCobro = new ControladorCXC();
        $crearRetencionReciboCobro -> ctrAgregarretencionReciboCobro();

       ?>
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>


