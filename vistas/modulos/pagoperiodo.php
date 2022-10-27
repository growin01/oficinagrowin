
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
       Pago Periodo
      </h1>
  

   <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle de Ventas</a>
  
   
    <a href="reportecxc" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Cuentas Por Cobrar</a>

    <a href="detallerecibodecobro" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Recibo de Cobro</a>
    <a href="detallecobroindividual" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle cobro por cliente</a>
   
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Cuentas por Cobrar</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE VENTAS********************************* -->
      
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR VENTAS********************************* -->


        <div class="box-body">

  
      <table border="0" cellspacing="5" cellpadding="5">
              
              <tbody>
                <tr>
                  <td>Estado&nbsp; &nbsp; &nbsp;</td>
                  <td>       
                    <select type="text" class="form-control col-xs-2" id="EstatusCXP" name="EstatusCXP" required>
                      <option value="Porpagar">Por Pagar</option>
                      
                         
                    <?php 
                    if(isset($_GET["EstatusCXP"])){
                    $fechapagoperiodo = $_GET["fechapagoperiodo"];  



                    }else{
                       date_default_timezone_set('America/Santo_Domingo');

                  $fecha = date('Ym');
               
                   

                  $fechapagoperiodo = $fecha;
                    }




                     ?>

                        </select>
                  </td>
                  <td></td>

                </tr>
                <tr>
                  <td>Hasta</td>
                  <td> <select type="text" class="form-control" id="fechapagoperiodo" name="fechapagoperiodo" required>
    <option value="">Año/Mes</option>
       <?php  
                         

        $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];

        $PeriodoLD = ControladorDiario::ctrMostrarPeriodo($Rnc_Empresa_LD);

                       
        foreach ($PeriodoLD as $key => $value){

        echo '<option value="'.$value["Fecha_AnoMes_LD"].'">'.$value["Fecha_AnoMes_LD"].'</option>';



        }
                    

                         ?>

  </select></td>
  <td> <button class="btn btn-warning btnpagoperiodo" id="pagoperiodo"><i class="glyphicon glyphicon-search"></i></button></td>





                </tr>
                </tbody>

          </table>
          <br>
         

 
          <table class="table table-bordered table-striped dt-responsive tablaTodos" width="100%">

                    
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th style="width: 10px">Nombre Cliente</th>
                <th style="width: 20px">Descripción</th>  
                <th style="width: 5px">NCF o Ref.</th>
                <th style="width: 10px">Año/Mes</th>
                <th style="width: 10px">Día</th>
                <th style="width: 10px">$</th>
                <th style="width: 10px">Tasa</th>
                <th style="width: 10px">Deuda Inicial</th>
                <th style="width: 10px">Monto Pagado</th>
                <th style="width: 10px">Por Pagar</th>
                <th style="width: 10px">Estado</th>
              
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
             
 $NUMERO = 0; 
 $totalDOP = 0;
 $totalUSD = 0;
 $Retencion = 0;
 $TotalUSDDOP = 0;
 $total = 0;
 $totalUSDDOP = 0;
                  
$tabla = "cxp_empresas";
$taRncEmpresaCXP = "Rnc_Empresa_cxp";
  
$Rnc_Empresa_CXP =  $_SESSION["RncEmpresaUsuario"];


$cxp = ModeloCXP::mdlMostarCXP($tabla, $taRncEmpresaCXP, $Rnc_Empresa_CXP); 

foreach ($cxp as $key => $valuecxp) {
  if($valuecxp["FechaAnoMes_cxp"] <= $fechapagoperiodo){ 

     
  if($valuecxp["Fecha_Ret_AnoMes_cxp"] <= $fechapagoperiodo){


$Retencion = $valuecxp["Retencion_Renta"] + $valuecxp["ITBIS_Retenido"];

  }else{
  $Retencion = 0;


  }
 

$DeudaInicial = $valuecxp["Neto"] + $valuecxp["Propinalegal"] + $valuecxp["Impuesto"]  + $valuecxp["impuestoISC"]  + $valuecxp["otrosimpuestos"]- $Retencion;

$tabla = "pagocxp_empresas";
$tipo = "FACTURA";
        
$datos = array("Rnc_Empresa_cxp" => $valuecxp["Rnc_Empresa_cxp"],
"CodigoCompra" => $valuecxp["CodigoCompra"],
"Rnc_Suplidor" => $valuecxp["Rnc_Suplidor"],
"NCF_cxp" => $valuecxp["NCF_cxp"],
"Tipo" => $tipo);
          
          
  $Npago = ModeloCXP::mdlMostrarPago($tabla, $datos);

  $MontoPagado = 0;  
  $sumapagado = 0;          
          

              foreach ($Npago as $key => $n) {
                  if($n["FechaAnoMes"] <= $fechapagoperiodo){   


                    $sumapagado = $sumapagado + $n["Monto"];
                  
                    }

                  }
                          
                  
                  $MontoPagado = $sumapagado;

              

$MontoPagado = bcdiv($MontoPagado, '1', 2);
$PorPagar = $DeudaInicial - $MontoPagado;


if ($PorPagar > 0.001) {

  if($valuecxp["Moneda"] == "DOP"){
    $totalDOP = $totalDOP + $PorPagar;

  }else{ 
  $totalUSD = $totalUSD + $PorPagar;

  $Tasacambio = $PorPagar * $valuecxp["Tasa"];

  $totalUSDDOP = $totalUSDDOP + $Tasacambio;
   }

$total = $totalDOP + $totalUSDDOP;
 
    $NUMERO = $NUMERO + 1;
    $botonCobro = "<button class='btn btn-danger btn-xs'>POR PAGAR</button>"; 
    echo '<tr>
                  <td>'.$NUMERO.'</td>
                  <td>'.$valuecxp["Nombre_Suplidor"].'</td>
                  <td>'.$valuecxp["Observaciones"].'</td>
                  <td style="width: 5px">'.$valuecxp["NCF_cxp"].'</td>
                  <td>'.$valuecxp["FechaAnoMes_cxp"].'</td>
                  <td>'.$valuecxp["FechaDia_cxp"].'</td>
                  <td>'.$valuecxp["Moneda"].'</td>
                  <td>'.$valuecxp["Tasa"].'</td>
                  <td>'.number_format($DeudaInicial, 2).'</td>
                  <td>'.number_format($MontoPagado, 2).'</td>
                  <td>'.number_format($PorPagar, 2).'</td>
                  <td>'.$botonCobro.'</td>
                   ';       



   
}else{
    
    $botonCobro = "<button class='btn btn-success btn-xs'>COBRADA</button>";  
    

}         

 
}

}/*cierre for respuesta*/

$TotalPesos = number_format($totalDOP, 2);
$TotalUSD = number_format($totalUSD, 2);
$TotalUSDDOP = number_format($totalUSDDOP, 2);
$Total = number_format($total, 2);



               ?>

            </tbody>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

           
            
          </table>
        
    <div class="form-group col-xs-8">

                    <div class="input-group">

    <span class="input-group-addon">Total Pesos</span>
                        
    <input type="text" class="form-control" id="RncEmpresaMaster" name="RncEmpresaMaster" value="<?php echo $TotalPesos;?>" readonly>

<span class="input-group-addon">Total USD</span>
                        
    <input type="text" class="form-control" id="RncEmpresaMaster" name="RncEmpresaMaster" value="<?php echo $TotalUSD;?>" readonly>
    <span class="input-group-addon">Total USD en DOP</span>
                        
    <input type="text" class="form-control" id="RncEmpresaMaster" name="RncEmpresaMaster" value="<?php echo $TotalUSDDOP;?>" readonly>
                  

                    </div>
                   

                  </div>  
    <div class="form-group col-xs-4">

                    <div class="input-group">

    <span class="input-group-addon">Total en Pesos</span>
                        
    <input type="text" class="form-control" id="RncEmpresaMaster" name="RncEmpresaMaster" value="<?php echo $Total;?>" readonly>



                    </div>
                   

                  </div>    

        </div>        

        
      </div>
      

    </section>
 
  </div>

 
