
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
      Cobro Por Periodo
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
                    <select type="text" class="form-control col-xs-2" id="EstatusCXC" name="EstatusCXC" required>
                      <option value="PorCobrar">Por Cobrar</option>
                      <option value="Cobrado">Cobrado</option>
                         
                    <?php 
                    if(isset($_GET["EstatusCXC"])){
                    $fechacobroperiodo = $_GET["fechacobroperiodo"];  



                    }else{
                       date_default_timezone_set('America/Santo_Domingo');

                  $fecha = date('Ym');
               
                   

                  $fechacobroperiodo = $fecha;
                    }




                     ?>

                        </select>
                  </td>
                  <td></td>

                </tr>
                <tr>
                  <td>Hasta</td>
                  <td> <select type="text" class="form-control" id="fechacobroperiodo" name="fechacobroperiodo" required>
    <option value="">Año/Mes</option>
       <?php  
                         

        $Rnc_Empresa_LD = $_SESSION["RncEmpresaUsuario"];

        $PeriodoLD = ControladorDiario::ctrMostrarPeriodo($Rnc_Empresa_LD);

                       
        foreach ($PeriodoLD as $key => $value){

        echo '<option value="'.$value["Fecha_AnoMes_LD"].'">'.$value["Fecha_AnoMes_LD"].'</option>';



        }
                    

                         ?>

  </select></td>
  <td> <button class="btn btn-warning btncobroperiodo" id="cobroperiodo"><i class="glyphicon glyphicon-search"></i></button></td>





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
                <th style="width: 10px">Total</th>
                <th style="width: 10px">Ret.</th>
                <th style="width: 10px">Deuda Inicial</th>
                <th style="width: 10px">Monto Cobrado</th>
                <th style="width: 10px">Por Cobrar</th>
                <th style="width: 10px">Estado</th>
              
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
 
 $NUMERO = 0; 
 $totalDOP = 0;
 $totalUSD = 0;
 $totalUSDDOP = 0;
 $total = 0;
                  
$tabla = "cxc_empresas";
$taRncEmpresaCXC = "Rnc_Empresa_cxc";
  
$Rnc_Empresa_CXC =  $_SESSION["RncEmpresaUsuario"];


$cxc = ModeloCXC::mdlMostarCXC($tabla, $taRncEmpresaCXC, $Rnc_Empresa_CXC); 
foreach ($cxc as $key => $valuecxc) {
  if($valuecxc["FechaAnoMes_cxc"] <= $fechacobroperiodo){ 

  
if($respuesta["Fecha_Ret_AnoMes_cxc"] <= $fechacobroperiodo){

$Retencion = $valuecxc["Retencion_Renta"] + $valuecxc["ITBIS_Retenido"];

  }else{
  $Retencion = 0;


  }




$DeudaInicial = $valuecxc["Neto"] + $valuecxc["Impuesto"] - $valuecxc["Descuento"] - $Retencion;

        
$tabla = "pagocxc_empresas";
$tipo = "FACTURA";
        
$datos = array("Rnc_Empresa_cxc" => $valuecxc["Rnc_Empresa_cxc"],
"CodigoVenta" => $valuecxc["Codigo"],
"Rnc_Cliente" => $valuecxc["Rnc_Cliente"],
"NCF_cxc" => $valuecxc["NCF_cxc"],
"Tipo" => $tipo);
          
          
  $Npago = ModeloCXC::mdlMostrarCobro($tabla, $datos);

  $MontoCobrado = 0;  
  $sumaCobrado = 0;          
          

              foreach ($Npago as $key => $n) {
                  if($n["FechaAnoMes"] <= $fechacobroperiodo){   


                    $sumaCobrado = $sumaCobrado + $n["Monto"];
                  
                    }

                  }
                          
                  
                  $MontoCobrado = $sumaCobrado + 0;

              

$MontoCobro = bcdiv($MontoCobrado, '1', 2);
$PorCobrar = $DeudaInicial - $MontoCobro;


if ($PorCobrar > 0.001) {

  if($valuecxc["Moneda"] == "DOP"){
    $totalDOP = $totalDOP + $PorCobrar;

  }else{ 
  $totalUSD = $totalUSD + $PorCobrar;

  $Tasacambio = $PorCobrar * $valuecxc["Tasa"];

  $totalUSDDOP = $totalUSDDOP + $Tasacambio;

   

   }


 $total = $totalDOP + $totalUSDDOP;

    $NUMERO = $NUMERO + 1;
  $botonCobro = "<button class='btn btn-danger btn-xs'>POR COBRAR</button>"; 
    echo '<tr>
                  <td>'.$NUMERO.'</td>
                  <td>'.$valuecxc["Nombre_Cliente"].'</td>
                  <td>'.$valuecxc["Observaciones"].'</td>
                  <td style="width: 5px">'.$valuecxc["NCF_cxc"].'</td>
                  <td>'.$valuecxc["FechaAnoMes_cxc"].'</td>
                  <td>'.$valuecxc["FechaDia_cxc"].'</td>
                  <td>'.$valuecxc["Moneda"].'</td>
                  <td>'.$valuecxc["Tasa"].'</td>
                  <td>'.number_format($valuecxc["Total"], 2).'</td>
                  <td>'.number_format($Retencion, 2).'</td>
                  <td>'.number_format($DeudaInicial, 2).'</td>
                  <td>'.number_format($MontoCobro, 2).'</td>
                  <td>'.number_format($PorCobrar, 2).'</td>
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
$Total = number_format($total, 2)



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

         <?php 
  
        #$eliminarVenta = new ControladorVentas();
        #$eliminarVenta -> ctrEliminarVenta();



        ?>

        </div>        

        
      </div>
      

    </section>
 
  </div>

 