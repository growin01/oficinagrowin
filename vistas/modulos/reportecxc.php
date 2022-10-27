
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
      <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-server"></i>
        CUENTAS POR COBRAR
        
      </h1>
  <a href="crear-ventas" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura</a>
  <a href="crear-ventas-pro" class="btn btn-success"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Factura Proforma</a>
  

   <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas</a>

   <?php 
   if($_SESSION["Banco"] == 1){
    echo '<a href="reportepago" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Pago</a>';


   }


    ?>


    
   <a href="reporte" class="btn btn-success"><i class="fa fa-pie-chart
" style="padding-right:5px"></i>Informe de Ventas</a>
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cuentas por Cobrar</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

         

        <div class="box-body">
              <div class="form-group col-xs-3">

        <div class="input-group">

        <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>

   <select class="form-control" name="EstadoCXCSelect" id="EstadoCXCSelect">
    
<?php 
if(isset($_GET["EstadoCXCSelect"])){
  switch ($_GET["EstadoCXCSelect"]) {
    case 'PorCobrar':

      echo ' <option value="PorCobrar">Por Cobrar</option>
    <option value="Cobrado">Cobrado</option>
    <option value=""></option>';
      break;
    
     case 'Cobrado':
      echo '  <option value="Cobrado">Cobrado</option>
    <option value="PorCobrar">Por Cobrar</option>
    <option value=""></option>';
      break;
  }


}else{

  echo ' <option value="">Seleccionar estado</option>
    <option value="PorCobrar">Por Cobrar</option>
    <option value="Cobrado">Cobrado</option>';
}



 ?>



  </select>

 </div>
 </div>
<button class="btn-primary" name="FiltrarCXC" id="FiltrarCXC"><i class="fa fa-filter"></i></button>
           <div class="form-group col-xs-8 pull-right">

<?php 
if(isset($_GET["periodoCXC"])){
  $periodoCXC = $_GET["periodoCXC"];
}else{
$periodoCXC = $_SESSION["Anologin"];
}

$TotalDeudaDOP = 0;
$TotalCobradoDOP = 0;
$PorCobrarDOP = 0;
$TotalSumaDOP = 0;
$TotalDeudaUSD = 0;
$TotalCobradoUSD = 0;
$PorCobrarUSD = 0;
$TotalSumaUSD = 0;
$Rnc_Empresa_CXC = $_SESSION["RncEmpresaUsuario"];

$respuesta = ControladorCXC::ctrReporteCXC($Rnc_Empresa_CXC, $periodoCXC);

foreach ($respuesta as $key => $value) {
  if($value["Moneda"] == "DOP"){ 
    $TotalSumaDOP = 0;
    $DeudaDOP = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  
    $cobradoDOP = $value["MontoCobrado"];

 
 
    $PorCobrarDOP = $DeudaDOP - $cobradoDOP;


    $TotalDeudaDOP = $TotalDeudaDOP + $DeudaDOP;
    $TotalCobradoDOP = $TotalCobradoDOP + $cobradoDOP;

  } else{
    $TotalSumaUSD = 0;
    $DeudaUSD = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  
    $cobradoUSD = $value["MontoCobrado"];

 
 
    $PorCobrarUSD = $DeudaUSD - $cobradoUSD;


    $TotalDeudaUSD = $TotalDeudaUSD + $DeudaUSD;
    $TotalCobradoUSD = $TotalCobradoUSD + $cobradoUSD;




  }
  
}
$inputTotalDeudaDOP = number_format($TotalDeudaDOP, 2);
$inputTotalCobradoDOP = number_format($TotalCobradoDOP, 2);
 
$PorCobrarDOP = $TotalDeudaDOP - $TotalCobradoDOP;
$inputPorCobrarDOP = number_format($PorCobrarDOP, 2);

$inputTotalDeudaUSD = number_format($TotalDeudaUSD, 2);
$inputTotalCobradoUSD = number_format($TotalCobradoUSD, 2);
 
$PorCobrarUSD = $TotalDeudaUSD - $TotalCobradoUSD;
$inputPorCobrarUSD = number_format($PorCobrarUSD, 2);

 ?>
 <div class="form-group col-xs-12 pull-right">
<div class="col-xs-4">
   <label>TOTAL DEUDA INICIAL $ DOP</label>
    <input type="text" class="form-control"value="<?php echo $inputTotalDeudaDOP;?>" readonly>
</div>
<div class="col-xs-4">
    <label>TOTAL COBRADO $ DOP</label>
    <input type="text" class="form-control" value="<?php echo $inputTotalCobradoDOP;?>" readonly>
</div>
<div class="col-xs-4">
    <label>TOTAL POR COBRAR $ DOP</label>
    <input type="text" class="form-control" value="<?php echo $inputPorCobrarDOP;?>" readonly>
   
</div>
 </div>
           
<div class="form-group col-xs-12 pull-right">
<div class="col-xs-4">
   <label>TOTAL DEUDA INICIAL $ USD</label>
    <input type="text" class="form-control"value="<?php echo $inputTotalDeudaUSD;?>" readonly>
</div>
<div class="col-xs-4">
    <label>TOTAL COBRADO $ USD</label>
    <input type="text" class="form-control" value="<?php echo $inputTotalCobradoUSD;?>" readonly>
</div>
<div class="col-xs-4">
    <label>TOTAL POR COBRAR $ USD</label>
    <input type="text" class="form-control" value="<?php echo $inputPorCobrarUSD;?>" readonly>
   
</div>
 </div>     


          </div>

       
        <input type="hidden"  id="RncEmpresaCXC" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

          <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                        <tr>
                       <td>Período &nbsp;</td>
                    <td><select class="form-control pull-left col-xs-3" name="periodoCXC" id="periodoCXC">
  <?php 
if(isset($_GET["periodoCXC"])){
echo'<option value="'.$_GET["periodoCXC"].'">'.$_GET["periodoCXC"].'</option>';
  foreach ($_SESSION["Perido"] as $key => $value) {
    if($_GET["periodoCXC"] != $value) { 
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
                    <td><input type="text" maxlength="6" id="mincxc" name="mincxc" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="mindiacxc" name="mindiacxc" placeholder="Día"></td>
                </tr>

                <tr>
                    <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="maxcxc" name="maxcxc" placeholder="AñoMes"></td>
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="maxdiacxc" name="maxdiacxc" placeholder="Día"></td>
              </tr>
            </tbody>

          </table>
    <br>

 <div class="col-xs-12">
          <!--*****************TABLA  USUARIO********************************* -->
 <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalPDFCXC" ><i class="fa fa-file-pdf-o" style="padding-right:5px"></i>PDF Reporte CXC</a>
 <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalPDFCXCCliente" ><i class="fa fa-file-pdf-o" style="padding-right:5px"></i>PDF Reporte CXC Por Cliente</a>
 </div>
 <br>
<br>
<br>
          <table class="table table-bordered table-striped dt-responsive tablaReporteCXC" width="100%">

                  
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>NCF</th>
                <th>Cliente</th>
                <th>Año/Mes</th>
                <th>Día</th>
                <th>Vendedor</th>
                <th>Moneda</th>
                <th>Tasa</th> 
                <th>Deuda Inicial</th> 
                <th>Cobrado</th>           
                <th>Por Cobrar</th>
                <th>Observaciones</th> 
                <th>Dias Créditos</th> 
                <th>Estatus</th>
                <th>Estado</th>
                <th></th>

                
                
              </tr>
             
            </thead>
            <tbody>
<?php 


    date_default_timezone_set('America/Santo_Domingo');

    $fechaHoy = date('Y-m-d');
 
    $Rnc_Empresa_CXC = $_SESSION["RncEmpresaUsuario"];

              
    $respuesta = ControladorCXC::ctrReporteCXC($Rnc_Empresa_CXC, $periodoCXC);

foreach ($respuesta as $key => $value) {
                
        $fechaano = substr($value["FechaAnoMes_cxc"], 0, 4);
        $fechames = substr($value["FechaAnoMes_cxc"], -2);
        $fechaDia = $value["FechaDia_cxc"];

        $fechaInicio = $fechaano."-".$fechames."-".$fechaDia;
               
        $datetime1 = date_create($fechaInicio);
        $datetime2 = date_create($fechaHoy);
        $interval = date_diff($datetime1, $datetime2);
                  
        $tiempo=array();

          foreach ($interval as $valor) {
                    $tiempo[]=$valor;
          }
                  
       
      
$Deuda = $value["Neto"] + $value["Impuesto"] - $value["Descuento"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
               


$Cobro = bcdiv($value["MontoCobrado"], '1', 2);
$PorCobrar = $Deuda - $Cobro;

            

if ($tiempo[11] > $value["Dia_Credito_cxc"]) {
      
      $botonTiempo = "<button class='btn btn-danger btn-xs'>VENCIDA</button>"; 
                 
}else{
      
      $botonTiempo = "<button class='btn btn-success btn-xs'>VIGENTE</button>";  
    }

if ($PorCobrar > 0.001) {
    
    $botonCobro = "<button class='btn btn-danger btn-xs'>POR COBRAR</button>"; 
    $Estado = "Porcobrar";

}else{
    
    $botonCobro = "<button class='btn btn-success btn-xs'>COBRADA</button>";  
    $Estado = "Cobrada";

}

        /*=============================================
      TRAEMOS LAS ACCIONES
        =============================================*/ 
        $Extraer_NCF = substr($value["NCF_cxc"], 0, 3);
        if($Extraer_NCF == "FP1"){
          $botonAccion = "
          <button Title='Ver detalles de Cobros' class='btn btn-default btn-xs btnVerdetalleCobros'  Rnc_Empresa_cxc='".$Rnc_Empresa_CXC."' Rnc_Cliente='".$value["Rnc_Cliente"]."' NCF_cxc='".$value["NCF_cxc"]."' Codigo='".$value["Codigo"]."' id_Cliente='".$value["id_Cliente"]."' data-toggle='modal' data-target='#modalVerDetalleCobros'><i class='fa fa-eye'></i></button>
          <button Title='Registrar Cobro' class='btn btn-success btn-xs btnRegistrarCXC' id_CXC='".$value["id"]."' idCliente='".$value["id_Cliente"]."' idCliente='".$value["id_Cliente"]."' Moneda='".$value["Moneda"]."' Tasa='".$value["Tasa"]."' Title='prueba'><i class='fa fa-money'></i></button>

          
          <button Title='Retener Cuenta Por Cobrar' class='btn btn-warning btn-xs btnRetenerCXC' Rnc_Empresa_607='".$Rnc_Empresa_CXC."' Rnc_Factura_607='".$value["Rnc_Cliente"]."' NCF_607='".$value["NCF_cxc"]."'  Moneda = '".$value["Moneda"]."' Tasa = '".$value["Tasa"]."' Estado = '".$Estado."' data-toggle='modal' data-target='#modalRetenerCXC'><i class='fa fa-university'></i></button>
          
          <button Title='Verificar Cuenta Por Cobrar' class='btn btn-primary btn-xs btnVerificarCXC' id ='".$value["id"]."'Rnc_Empresa_607='".$Rnc_Empresa_CXC."' Rnc_Factura_607='".$value["Rnc_Cliente"]."' NCF_607='".$value["NCF_cxc"]."'  Moneda = '".$value["Moneda"]."' Tasa = '".$value["Tasa"]."' Codigo='".$value["Codigo"]."'><i class='fa fa-check-square-o'></i></button>";


        }else{
           $botonAccion = "
           <button Title='Ver detalles de Cobros' class='btn btn-default btn-xs btnVerdetalleCobros'  Rnc_Empresa_cxc='".$Rnc_Empresa_CXC."' Rnc_Cliente='".$value["Rnc_Cliente"]."' NCF_cxc='".$value["NCF_cxc"]."' Codigo='".$value["Codigo"]."' id_Cliente='".$value["id_Cliente"]."' data-toggle='modal' data-target='#modalVerDetalleCobros'><i class='fa fa-eye'></i></button>
           <button Title='Registrar Cobro' class='btn btn-success btn-xs btnRegistrarCXC' id_CXC='".$value["id"]."' idCliente='".$value["id_Cliente"]."' Moneda='".$value["Moneda"]."' Tasa='".$value["Tasa"]."'><i class='fa fa-money'></i></button>

           
           <button Title='Retener Cuenta Por Cobrar' class='btn btn-warning btn-xs btnRetenerCXC' Rnc_Empresa_607='".$Rnc_Empresa_CXC."' Rnc_Factura_607='".$value["Rnc_Cliente"]."' NCF_607='".$value["NCF_cxc"]."' Moneda = '".$value["Moneda"]."' Tasa = '".$value["Tasa"]."' Estado = '".$Estado."' data-toggle='modal' data-target='#modalRetenerCXC'><i class='fa fa-university'></i></button>
            

           <button Title='Verificar Cuenta Por Cobrar' class='btn btn-primary btn-xs btnVerificarCXC' id ='".$value["id"]."' Rnc_Empresa_607='".$Rnc_Empresa_CXC."' Rnc_Factura_607='".$value["Rnc_Cliente"]."' NCF_607='".$value["NCF_cxc"]."'  Moneda = '".$value["Moneda"]."' Tasa = '".$value["Tasa"]."' Codigo='".$value["Codigo"]."'><i class='fa fa-check-square-o'></i></button";

        }

if(isset($_GET["EstadoCXC"])){
  switch ($_GET["EstadoCXC"]) {
    case 'PorCobrar':
    if ($Estado == "Porcobrar"){
      echo '     <tr> 
            <td>'.($key+1).'</td>
            <td>'.$value["NCF_cxc"].'</td>
            <td>'.$value["Nombre_Cliente"].'</td>
            <td>'.$value["FechaAnoMes_cxc"].'</td>
            <td>'.$value["FechaDia_cxc"].'</td>
            <td>'.$value["Nombre_Vendedor"].'</td>
            <td>'.$value["Moneda"].'</td>
            <td>'.$value["Tasa"].'</td>
            <td>'.number_format($Deuda, 2).'</td>
            <td>'.number_format($Cobro, 2).'</td>
            <td>'.number_format($PorCobrar, 2).'</td>
            <td>'.$value["Observaciones"].'</td>
            <td>'.$value["Dia_Credito_cxc"].'</td>
            <td>'.$botonTiempo.'</td>
            <td>'.$botonCobro.'</td>
            <td>'.$botonAccion.'</td>
            
            </tr>';

    }

      
    break;
    
    case 'Cobrado':
    if ($Estado == "Cobrada"){
     
      
      echo '     <tr> 
            <td>'.($key+1).'</td>
            <td>'.$value["NCF_cxc"].'</td>
            <td>'.$value["Nombre_Cliente"].'</td>
            <td>'.$value["FechaAnoMes_cxc"].'</td>
            <td>'.$value["FechaDia_cxc"].'</td>
            <td>'.$value["Nombre_Vendedor"].'</td>
            <td>'.$value["Moneda"].'</td>
            <td>'.$value["Tasa"].'</td>
            <td>'.number_format($Deuda, 2).'</td>
            <td>'.number_format($Cobro, 2).'</td>
            <td>'.number_format($PorCobrar, 2).'</td>
            <td>'.$value["Observaciones"].'</td>
            <td>'.$value["Dia_Credito_cxc"].'</td>
            <td>'.$botonTiempo.'</td>
            <td>'.$botonCobro.'</td>
            <td>'.$botonAccion.'</td>
            
            </tr>';

    }

     
      


      }


}else{
  echo '     <tr> 
            <td>'.($key+1).'</td>
            <td>'.$value["NCF_cxc"].'</td>
            <td>'.$value["Nombre_Cliente"].'</td>
            <td>'.$value["FechaAnoMes_cxc"].'</td>
            <td>'.$value["FechaDia_cxc"].'</td>
            <td>'.$value["Nombre_Vendedor"].'</td>
            <td>'.$value["Moneda"].'</td>
            <td>'.$value["Tasa"].'</td>
            <td>'.number_format($Deuda, 2).'</td>
            <td>'.number_format($Cobro, 2).'</td>
            <td>'.number_format($PorCobrar, 2).'</td>
            <td>'.$value["Observaciones"].'</td>
            <td>'.$value["Dia_Credito_cxc"].'</td>
            <td>'.$botonTiempo.'</td>
            <td>'.$botonCobro.'</td>
            <td>'.$botonAccion.'</td>
           
            

            
            
            </tr>';

}

       






}


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
  
        $VerificaCXC = new ControladorCXC();
        $VerificaCXC -> ctrVerificarCXC();


       



        ?>
  <!-- Modal -->
<div id="modalVerDetalleCobros" class="modal fade" role="dialog">
  
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

 <div id="modalPDFCXC" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">REPORTE CUENTAS POR COBRAR</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaPDFCXC" name="RncEmpresaPDFCXC" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            
            <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar">&nbsp;Período</i></span>

                      <select type="text" class="form-control" id="PeriodoCXC" name="PeriodoCXC" required>
                        <option value="Todo">Mostar Todo</option>

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
         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-file-o">&nbsp;Estatus</i></span>

                      <select type="text" class="form-control" id="EstadoCXC" name="EstadoCXC" required>
                        <option value="PorCobrar">Por Cobrar</option>
                        <option value="Cobrada">Cobrada</option>

                        
                      </select>   

                    </div>
                   

            </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
       <a class="btn btn-primary pull-right" role="button" id="ReportePDFCXC">Descargar PDF CXC</a>
       

        
       
      </div>

    
      
      
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>

</div>
<div id="modalPDFCXCCliente" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">REPORTE CUENTAS POR COBRAR POR CLIENTE</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaPDFCXCCliente" name="RncEmpresaPDFCXCCliente" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              
            </div>


          </div>
         <div class="form-group">

                    <div class="input-group">

      <span class="input-group-addon"><i class="fa fa-users"></i></span>

      <select type="text" class="form-control" id="agregarcliente" name="agregarcliente" placeholder="Agregar cliente">
     

<option value="">Seleccionar cliente</option>

                        <?php 

                         $Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];

                        $clientes = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);

                         foreach ($clientes as $key => $value){

                          echo '<option value="'.$value["id"].'">'.$value["Nombre_Cliente"].'</option>';

                         }


                         ?>

     </select>


                      

  </div>
                   

</div>
            
            <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                      <select type="text" class="form-control" id="PeriodoCXCCliente" name="PeriodoCXCCliente" required>
                        <option value="Todo">Mostar Todo</option>

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
         <div class="form-group">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-toggle-on"></i></span>

                      <select type="text" class="form-control" id="EstadoCXCCliente" name="EstadoCXCCliente" required>
                        <option value="PorCobrar">Por Cobrar</option>
                        <option value="Cobrada">Cobradas</option>

                        
                      </select>   

                    </div>
                   

            </div>

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">
       

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

       
        
       <a class="btn btn-primary pull-right" role="button" id="ReportePDFCXCCliente">Descargar PDF CXP</a>
       

        
       
      </div>





      
      
      
      
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
<input type="hidden" class="form-control input-lg" id="Modulo" name="Modulo" value="reportecxc" readonly>
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

        $crearRetencionVentas = new ControladorVentas();
        $crearRetencionVentas -> ctrAgregarretencionVentas();

       ?>
     
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>
