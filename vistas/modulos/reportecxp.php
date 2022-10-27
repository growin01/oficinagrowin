
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
        CUENTAS POR PAGAR
        
      </h1>
      <a href="crear-compra-inventario" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Inventario de Mercancia</a>
  <a href="crear-compra-gastosgenerales" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Compras Generales</a>

   <a href="compras" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Compras</a>
  
   
    <a href="detallerecibodepago" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Recibo de Pago</a>
   

  
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cuentas por Pagar</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->


        <div class="box-body">
          <div class="form-group col-xs-3">

        <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>

   <select class="form-control" name="EstadoCXPSelect" id="EstadoCXPSelect">
    
<?php 
if(isset($_GET["EstadoCXP"])){
  switch ($_GET["EstadoCXP"]) {
    case 'PorPagar':

      echo '<option value="PorPagar">Por Pagar</option>
    <option value="Pagado">Pagado</option>
    <option value="">Seleccionar estado</option>';
      break;
    
     case 'Pagado':
      echo '<option value="Pagado">Pagado</option>
    <option value="PorPagar">Por Pagar</option>
    <option value="">Seleccionar estado</option>';
      break;
  }


}else{

  echo ' <option value="">Seleccionar estado</option>
    <option value="PorPagar">Por Pagar</option>
    <option value="Pagado">Pagado</option>';
}


 ?>

  </select>

 </div>
 </div>

 <button class="btn-primary" name="FiltrarCXP" id="FiltrarCXP"><i class="fa fa-filter"></i></button>
 
    <div class="form-group col-xs-8 pull-right">

<?php 
if(isset($_GET["periodoCXP"])){
  $periodoCXP = $_GET["periodoCXP"];
}else{
$periodoCXP = $_SESSION["Anologin"];
}

$TotalDeudaDOP = 0;
$TotalPagoDOP = 0;
$PorPagarDOP = 0;
$TotalSumaDOP = 0;
$TotalDeudaUSD = 0;
$TotalPagoUSD = 0;
$PorPagarUSD = 0;
$TotalSumaUSD = 0;
$Rnc_Empresa_CXP = $_SESSION["RncEmpresaUsuario"];

$respuesta = ControladorCXP::ctrReporteCXP($Rnc_Empresa_CXP, $periodoCXP);

foreach ($respuesta as $key => $value) {
  if($value["Moneda"] == "DOP"){ 
    $TotalSumaDOP = 0;
$DeudaDOP = $value["Neto"] + $value["Propinalegal"] + $value["Impuesto"] + $value["impuestoISC"]  + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  
  
$PagadoDOP = $value["MontoPagado"];


  $PorPagarDOP = $DeudaDOP - $PagadoDOP;


  $TotalDeudaDOP = $TotalDeudaDOP + $DeudaDOP;
  $TotalPagoDOP = $TotalPagoDOP + $PagadoDOP;


  
}else{
  $TotalSumaDOP = 0;
$DeudaUSD = $value["Neto"] + $value["Propinalegal"] + $value["Impuesto"] + $value["impuestoISC"]  + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  
  
$PagadoUSD = $value["MontoPagado"];



  $PorPagarUSD = $DeudaUSD - $PagadoUSD;


  $TotalDeudaUSD = $TotalDeudaUSD + $DeudaUSD;
  $TotalPagoUSD = $TotalPagoUSD + $PagadoUSD;

  
 }
 }
$inputTotalDeudaDOP = number_format($TotalDeudaDOP, 2);
$inputTotalPagoDOP = number_format($TotalPagoDOP, 2);
 
$PorPagarDOP = $TotalDeudaDOP - $TotalPagoDOP;
$inputPorPagarDOP = number_format($PorPagarDOP, 2);

$inputTotalDeudaUSD = number_format($TotalDeudaUSD, 2);
$inputTotalPagoUSD = number_format($TotalPagoUSD, 2);
 
$PorPagarUSD = $TotalDeudaUSD - $TotalPagoUSD;
$inputPorPagarUSD = number_format($PorPagarUSD, 2);

 ?>
   <div class="form-group col-xs-12 pull-right"> 
        <div class="col-xs-4">        
            <label>TOTAL DEUDA INICIAL $ DOP</label>
            <input type="text"  class="form-control" value="<?php echo $inputTotalDeudaDOP;?>" readonly>
        </div>
        <div class="col-xs-4"> 
            <label>TOTAL PAGADO $ DOP</label>
            <input type="text" class="form-control" value="<?php echo $inputTotalPagoDOP;?>" readonly>
        </div>
        <div class="col-xs-4">
            <label>TOTAL POR PAGAR $ DOP</label>
            <input type="text"  class="form-control" value="<?php echo $inputPorPagarDOP;?>" readonly>
        </div>
      


      </div>  
  <div class="form-group col-xs-12 pull-right">         
             <div class="col-xs-4">        
            <label>TOTAL DEUDA INICIAL $ USD</label>
            <input type="text"  class="form-control" value="<?php echo $inputTotalDeudaUSD;?>"readonly>
        </div>
        <div class="col-xs-4"> 
            <label>TOTAL PAGADO $ USD</label>
            <input type="text"  class="form-control" value="<?php echo $inputTotalPagoUSD;?>" readonly>
        </div>
        <div class="col-xs-4">
            <label>TOTAL POR PAGAR $ USD</label>
            <input type="text"  class="form-control" value="<?php echo $inputPorPagarUSD;?>" readonly>
        </div>
      

      </div>  
  </div>   
  <div class="col-xs-12"></div>    
  <div class = "col-xs-12">
  
            
    
      <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalPDFCXP" ><i class="fa fa-file-pdf-o" style="padding-right:5px"></i>PDF Reporte CXP</a>
       <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalPDFCXPSUPLIDOR" ><i class="fa fa-file-pdf-o" style="padding-right:5px"></i>PDF Reporte CXP Por Suplidor</a>
   
          

  </div>

<br>
<br>
<br>      

           
          <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                  <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodoCXP" id="periodoCXP">
  <?php 
if(isset($_GET["periodoCXP"])){
echo'<option value="'.$_GET["periodoCXP"].'">'.$_GET["periodoCXP"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodoCXP"] != $value) { 
     echo'<option value="'.$value.'">'.$value.'</option>';
     }
    
  
}/*cierre foreach*/
}else{
 echo'<option value="'.$_SESSION["Anologin"].'">'.$_SESSION["Anologin"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_SESSION["Anologin"] != $value) { 
     echo'<option value="'.$value.'">'.$value.'</option>';
     }
    
    

}

 
  }

   ?>
   </select></td> </tr>
                 <tr>
                    <td>Desde &nbsp;</td>
                    <td><input type="text" maxlength="6" id="mincxp" name="mincxp" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="mindiacxp" name="mindiacxp" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxcxp" name="maxcxp" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="maxdiacxp" name="maxdiacxp" placeholder="Día"></td>
              </tr>
            </tbody>

          </table>
    <br>
 
    <table class="table table-bordered table-striped dt-responsive tablaReporteCXP" width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>NCF Factura</th>
                <th>Suplidor</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Moneda</th>
                <th>Tasa</th> 
                <th>Deuda Inicial</th> 
                <th>Pagado</th>           
                <th>Por Pagar</th>
                <th>Observaciones</th> <!--9-->
                <th>Dias Créditos</th> <!--10-->     
                <th>Crédito</th><!--11-->
                <th>Estatus</th><!--12-->
                <th>Estado</th><!--12-->
                <th></th><!--13 ACCION-->
               
                
                
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
       $PerfilUsuario = $_SESSION["Perfil"];
      date_default_timezone_set('America/Santo_Domingo');
      
      $fechaHoy = date('Y-m-d');
                  
      $Rnc_Empresa_CXP =  $_SESSION["RncEmpresaUsuario"];

      $respuesta = ControladorCXP::ctrReporteCXP($Rnc_Empresa_CXP, $periodoCXP);


foreach ($respuesta as $key => $value) {

        $fechaano = substr($value["FechaAnoMes_cxp"], 0, 4);
          $fechames = substr($value["FechaAnoMes_cxp"], -2);
          $fechaDia = $value["FechaDia_cxp"];

        $fechaInicio = $fechaano."-".$fechames."-".$fechaDia;
               
        $datetime1 = date_create($fechaInicio);
        $datetime2 = date_create($fechaHoy);
        $interval = date_diff($datetime1, $datetime2);
                  
        $tiempo=array();

      foreach ($interval as $valor) {
                    $tiempo[]=$valor;
                  }

            
             

$Deuda = $value["Neto"] + $value["Propinalegal"] + $value["Impuesto"] + $value["impuestoISC"]  + $value["otrosimpuestos"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
                 
           
 

  $Pagado = $value["MontoPagado"];
  $PorPagar = $Deuda - $Pagado;

  if ($tiempo[11] > $value["Dia_Credito_cxp"]) {
      
      $botonTiempo = "<button class='btn btn-danger btn-xs'>VENCIDA</button>"; 
                 
}else{
      
      $botonTiempo = "<button class='btn btn-success btn-xs'>VIGENTE</button>";  
    }




if ($PorPagar > 0.001) {
    
    $botonPagado = "<button class='btn btn-danger btn-xs'>POR PAGAR</button>"; 
    $Estado = "PorPagar";

}else{
    
    $botonPagado = "<button class='btn btn-success btn-xs'>PAGADA</button>";  
    $Estado = "Pagado";

}
$botonAccion = "
            <button Title='Ver detalles de Pagos' class='btn btn-default btn-xs btnVerdetallePagos' Rnc_Empresa_cxp='".$value["Rnc_Empresa_cxp"]."' CodigoCompra='".$value["CodigoCompra"]."' id_Suplidor='".$value["id_Suplidor"]."' Rnc_Suplidor= '".$value["Rnc_Suplidor"]."' NCF_cxp='".$value["NCF_cxp"]."' Tipo='".$value["Tipo"]."'  data-toggle='modal' data-target='#modalVerDetallePagos'><i class='fa fa-eye'></i></button>

            <button Title='Registrar Pago' class='btn btn-success btn-xs btnRegistrarCXP' id_CXP='".$value["id"]."' idsuplidor='".$value["id_Suplidor"]."' Moneda='".$value["Moneda"]."' Tasa='".$value["Tasa"]."'><i class='fa fa-money'></i></button>

             <button Title='Retener Cuenta Por Pagar' class='btn btn-warning btn-xs btnRetenerCXP' Rnc_Empresa_606='".$value["Rnc_Empresa_cxp"]."' Rnc_Factura_606='".$value["Rnc_Suplidor"]."' NCF_606='".$value["NCF_cxp"]."' Moneda='".$value["Moneda"]."' Tasa='".$value["Tasa"]."' Estado = '".$Estado."' data-toggle='modal' data-target='#modalRetenerCXP'><i class='fa fa-university'></i></button>

             <button Title='Verificar Cuenta Por Pagar' class='btn btn-primary btn-xs btnVerificarCXP' id ='".$value["id"]."' Rnc_Empresa_cxp='".$value["Rnc_Empresa_cxp"]."' CodigoCompra='".$value["CodigoCompra"]."' id_Suplidor='".$value["id_Suplidor"]."' Rnc_Suplidor= '".$value["Rnc_Suplidor"]."' NCF_cxp='".$value["NCF_cxp"]."' Tipo='".$value["Tipo"]."' ><i class='fa fa-check-square-o'></i></button>

             

          ";
            
/*Estatus */
 if ($value["Estatus"] == "1") {
    switch ($PerfilUsuario) {
      case 'Programador':
      $botonEstatus = "<button class='btn btn-danger btn-xs btnEstatusCXP' id_cxp ='".$value["id"]."' Estatus = '2'>POR APROBAR</button>"; 
        $botonAccion = "<div class='btn-group'> ";
        // code...
        break;
        case 'Gerente':
      $botonEstatus = "<button class='btn btn-danger btn-xs btnEstatusCXP' id_cxp ='".$value["id"]."' Estatus = '2'>POR APROBAR</button>"; 
        $botonAccion = "<div class='btn-group'> ";
        // code...
        break;
      
      
      default:
         $botonEstatus = "<button class='btn btn-danger btn-xs' id_cxp ='".$value["id"]."' Estatus = '2'>POR APROBAR</button>"; 
        $botonAccion = "<div class='btn-group'> ";
      break;
    }
   
        


}else{
  switch ($PerfilUsuario) {
      case 'Programador':
       $botonEstatus = "<button class='btn btn-success btn-xs btnEstatusCXP' id_cxp ='".$value["id"]."' Estatus = '1'>APROBADO</button>"; 
        // code...
        break;
        case 'Gerente':
      $botonEstatus = "<button class='btn btn-success btn-xs btnEstatusCXP' id_cxp ='".$value["id"]."' Estatus = '1'>APROBADO</button>"; 
        // code...
        break;
      
      
      default:
          $botonEstatus = "<button class='btn btn-success btn-xs' id_cxp ='".$value["id"]."' Estatus = '1'>APROBADO</button>"; 
      break;
    }
   
    
    
    

}            
 if(isset($_GET["EstadoCXP"])){
  switch ($_GET["EstadoCXP"]) {
    case 'PorPagar':
    if ($Estado == "PorPagar"){             
      
echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td style="width: 15px">'.$value["NCF_cxp"].'</td>
                            <td style="width: 20px">'.$value["Nombre_Suplidor"].'</td>
                            <td>'.$value["FechaAnoMes_cxp"].'</td>
                            <td>'.$value["FechaDia_cxp"].'</td>
                            <td>'.$value["Moneda"].'</td>
                            <td>'.$value["Tasa"].'</td>
                            <td>'.number_format($Deuda, 2).'</td>
                            <td>'.number_format($Pagado, 2).'</td> 
                            <td>'.number_format($PorPagar, 2).'</td> 
                            <td>'.$value["Observaciones"].'</td>
                            <td>'.$value["Dia_Credito_cxp"].'</td>
                            <td>'.$botonTiempo.'</td>
                            <td>'.$botonEstatus.'</td>
                            <td>'.$botonPagado.'</td>
                            <td>'.$botonAccion.'</td>


</tr>';


}
     
    break;

case 'Pagado':
    if ($Estado == "Pagado"){
      echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td style="width: 15px">'.$value["NCF_cxp"].'</td>
                            <td style="width: 20px">'.$value["Nombre_Suplidor"].'</td>
                            <td>'.$value["FechaAnoMes_cxp"].'</td>
                            <td>'.$value["FechaDia_cxp"].'</td>
                            <td>'.$value["Moneda"].'</td>
                            <td>'.$value["Tasa"].'</td>
                            <td>'.number_format($Deuda, 2).'</td>
                            <td>'.number_format($Pagado, 2).'</td> 
                            <td>'.number_format($PorPagar, 2).'</td> 
                            <td>'.$value["Observaciones"].'</td>
                            <td>'.$value["Dia_Credito_cxp"].'</td>
                            <td>'.$botonTiempo.'</td>
                            <td>'.$botonEstatus.'</td>
                            <td>'.$botonPagado.'</td>
                            <td>'.$botonAccion.'</td>


</tr>';
     



    }
     break;
 }

 }else{
  echo '<tr>
                            <td style="width: 5px">'.($key+1).'</td>
                            <td style="width: 15px">'.$value["NCF_cxp"].'</td>
                            <td style="width: 20px">'.$value["Nombre_Suplidor"].'</td>
                            <td>'.$value["FechaAnoMes_cxp"].'</td>
                            <td>'.$value["FechaDia_cxp"].'</td>
                            <td>'.$value["Moneda"].'</td>
                            <td>'.$value["Tasa"].'</td>
                            <td>'.number_format($Deuda, 2).'</td>
                            <td>'.number_format($Pagado, 2).'</td> 
                            <td>'.number_format($PorPagar, 2).'</td> 
                            <td>'.$value["Observaciones"].'</td>
                            <td>'.$value["Dia_Credito_cxp"].'</td>
                            <td>'.$botonTiempo.'</td>
                            <td>'.$botonEstatus.'</td>
                            <td>'.$botonPagado.'</td>
                            <td>'.$botonAccion.'</td>


</tr>';





 }
}/*cierre for respuesta*/



               ?>

            </tbody>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->
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
              <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td>
              <td style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></td> 
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>   
          </tr>


      </tfoot>    
           
            
          </table>
        
       

         <?php 
  
        #$eliminarVenta = new ControladorVentas();
        #$eliminarVenta -> ctrEliminarVenta();



        ?>

          </div>
             

        
      </div>
      

    </section>
 
  </div>
   <?php 
  
        $VerificaCXP = new ControladorCXP();
        $VerificaCXP -> ctrVerificarCXP();


       



        ?>
<div id="modalRetenerCXP" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Retener Comprar En Cuentas por Pagar</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
<input type="hidden" class="form-control input-lg" id="RncEmpresaRetener" name="RncEmpresaRetener" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
<input type="hidden" class="form-control input-lg" id="Usuariologueado" name="Usuariologueado" value="<?php echo $_SESSION["Usuario"];?>" readonly>
<input type="hidden" class="form-control input-lg" id="Modulo" name="Modulo" value="reportecxp" readonly>
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">

            </div>


          </div>
<div class="form-group col-xs-6">

                   
  <div class="input-group">

      <span class="input-group-addon"><i>Moneda</i></span>             

<input type="Text" class="form-control" maxlength="11" id="Moneda" name="Moneda"required readonly>

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

<input type="hidden" class="form-control" maxlength="11" id="id_606_Retener" name="id_606_Retener"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="CodigoCompra" name="CodigoCompra"required readonly>
<input type="hidden" class="form-control" maxlength="11" id="Forma_Pago_606" name="Forma_Pago_606"required readonly>                  


                  </div>

                </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
          
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark"></i></span>
              <input type="text"   class="form-control input-RNC" maxlength="11" id="Rnc_Retener_606" name="Rnc_Retener_606" value = "" required readonly>

            </div>

          </div>
          <!--*****************cierra input de Ncedula o pasaporte************************* -->
            

           <div class="form-group">

                   
                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control input-NCF" maxlength="11" id="NCF_606_Retener" name="NCF_606_Retener" required readonly>

                  </div>

                </div>

                 <div class="form-group">

                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control Fecha">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaFacturames_606_Retener" name="FechaFacturames_606_Retener" required readonly>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaFacturadia_606_Retener" name="FechaFacturadia_606_Retener" required readonly>


                    </div>
                   

                  </div>
                  </div>

                   <div class="form-group">

                    
                    <div class="col-xs-6 right" style="padding-right:0px">

                      
                        <label>MONTO FACTURADO SIN ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoFacturadoRetener" name="MontoFacturadoRetener" required readonly>


                      </div>
                      
                  

                     <div class="col-xs-6 left" style="padding-right:0px">

                      
                        <label>MONTO ITBIS</label>
                        <br>

                        <input type="number"  min=0 step="any" id="MontoITBIS_Retener" name="MontoITBIS_Retener" required readonly>


                      </div>
                      

                    </div>

                    <label> Fecha de Retencion</label>
                    <br>




                    <div class="form-group">


                    <div class="input-group col-xs-12">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                       <div class="input-group form-control FechaRetencion">

                     <label>Año/Mes</label>
                      <input type="text" class="Fechames" maxlength="6" id="FechaRetenecionmes_606" name="FechaRetenecionmes_606" required>

                     
                      <label>Dìa</label><input type="text" class="Fechadia" maxlength="2" id="FechaReteneciondia_606" name="FechaReteneciondia_606" required>


                    </div>
                   

                  </div>
                  </div>

                  <div class="col-xs-6 left">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ITBIS RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS30" value="30" required>30 %
                        <br>
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS75" value="75" required>75 %<br>
                        <input type="radio" name="ITBIS_Retenido" id="ITBIS100" value="100" required>100 %<br>
                        <input type="text" name="Monto_ITBIS_Retenido" id="Monto_ITBIS_Retenido" required>
                        
                    </div>

                  

                  </div>
                  </div>

                  <div class="col-xs-6  right">

              <div class="form-group">

                    <div class="input-group form-control">

                      <label>% ISR RETENIDO</label><br>

                     

                   
                        <input type="radio" name="ISR_RETENIDO" id="ISR2" value="2">2 %
                        <br>
                        <input type="radio" name="ISR_RETENIDO" id="ISR10" value="10">10 %<br>
                        
                        <input type="text" name="Monto_ISR_Retenido" id="Monto_ISR_Retenido" required>
                        <br>
                          <select type="text" class="form-control" id="tipo_de_seleccionretener" name="tipo_de_seleccionretener">
                              <option value="0">TIPO DE SELECCION</option>
                              <option value="01">01 - ALQUILERES</option>
                              <option value="02">02 - HONORARIOS POR SERVICIOS</option>
                              <option value="03">03 - OTRAS RENTAS</option>
                              <option value="04">04 - OTRAS RENTAS (Rentas Presuntas)</option>
                              <option value="05">05 - INTERESES PAGADOS A PERSONAS JURIDICAS RESIDENTES</option>
                              <option value="06">06 - INTERESES PAGADOS A PERSONAS FISICAS RESIDENTES</option>
                              <option value="07">07 - RETENCION POR PROVEEDORES DEL ESTADO</option>
                              <option value="08">08 - JUEGOS TELEFONICOS</option>


                         </select>


                        
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

        $crearRetencionCompras = new ControladorCompras();
        $crearRetencionCompras -> ctrAgregarretencionCompras();

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
<div id="modalVerDetallePagos" class="modal fade" role="dialog">
  
  <div class="modal-dialog modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Ver Detalle</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="100%">
            <thead> 
              <tr>
                
                <th>RNC</th>
                <th>Nombre Suplidor</th>
                <th>N° Recibo</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Pago</th>
                <th>Monto</th>
                <th>Ref.</th>
                <th>Banco</th>
              
               
               
              </tr>


            </thead>

          <tbody id="detallePagos">
              

          </tbody>
            



          </table>

        
        
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        

      </div>
      <?php 
      

      //$EditarCategoria = new ControladorCategorias();
      //$EditarCategoria -> ctrEditarCategoria();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
                      
 

 <div id="modalPDFCXP" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">REPORTE CUENTAS POR PAGAR</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaPDFCXP" name="RncEmpresaPDFCXP" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            
            <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="PeriodoCXP" name="PeriodoCXP" required>
                        <option value="Todo">Mostar Todo</option>

                        <?php  
                         

                        $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo606 = Controlador606::ctrMostrarPeriodo606($Rnc_Empresa_606);

                       
                         foreach ($Periodo606 as $key => $value){

                          echo '<option value="'.$value["Fecha_AnoMes_606"].'">'.$value["Fecha_AnoMes_606"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>
         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>

                      <select type="text" class="form-control" id="EstadoCXP" name="EstadoCXP" required>
                        <option value="PorPagar">Por Pagar</option>
                        <option value="Pagadas">Pagadas</option>

                        
                      </select>   

                    </div>
                   

            </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
       <a class="btn btn-primary pull-right" role="button" id="ReportePDFCXP">Descargar PDF CXP</a>
       

        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>
<div id="modalPDFCXPSUPLIDOR" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">REPORTE CUENTAS POR PAGAR POR SUPLIDOR</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaPDFCXPSuplidor" name="RncEmpresaPDFCXPSuplidor" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
         <div class="form-group">

                    <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-users"></i></span>

      <select type="text" class="form-control" id="agregarSuplidor" name="agregarSuplidor" placeholder="Agregar Suplidor">
      <option value="">Seleccionar un Suplidor</option>    

<?php 
     
  $id_Suplidor = null;
  $Valor_idSuplidor = null;
  $Rnc_Empresa_Suplidor = $_SESSION["RncEmpresaUsuario"];

  $suplidores = ControladorSuplidores::ctrMostrarSuplidores($Rnc_Empresa_Suplidor, $id_Suplidor, $Valor_idSuplidor);



    foreach ($suplidores as $key => $value){
      
        echo '<option value="'.$value["id"].'">'.$value["Nombre_Suplidor"].'</option>';
     
    }


 

?>

     </select>


                      

  </div>
                   

</div>
            
            <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="PeriodoCXPSuplidor" name="PeriodoCXPSuplidor" required>
                        <option value="Todo">Mostar Todo</option>

                        <?php  
                         

                        $Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];

                         $Periodo606 = Controlador606::ctrMostrarPeriodo606($Rnc_Empresa_606);

                       
                         foreach ($Periodo606 as $key => $value){

                          echo '<option value="'.$value["Fecha_AnoMes_606"].'">'.$value["Fecha_AnoMes_606"].'</option>';



                         }
                    

                         ?>

                      </select>   

                    </div>
                   

                  </div>
         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>

                      <select type="text" class="form-control" id="EstadoCXPSuplidor" name="EstadoCXPSuplidor" required>
                        <option value="PorPagar">Por Pagar</option>
                        <option value="Pagadas">Pagadas</option>

                        
                      </select>   

                    </div>
                   

            </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
       <a class="btn btn-primary pull-right" role="button" id="ReportePDFCXPSUPLIDOR">Descargar PDF CXP</a>
       

        
       
      </div>





      
      
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>
