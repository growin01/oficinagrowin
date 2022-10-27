
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        
         
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-server"></i>
       Clientes Vs Cobro
        
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

  
         

           
          <table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                <tr>
                    <td>Fecha Desde:</td>
                    <td><input type="text" id="min" name="min"></td>
                </tr>

                <tr>
                    <td>Fecha Hasta:</td>
                    <td><input type="text" id="max" name="max"></td>
              </tr>
            </tbody>

          </table>
    <br>
          <!--*****************TABLA  USUARIO********************************* -->

 
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
                <th style="width: 10px">Ajustes/ Cambiario</th>
                <th style="width: 10px">Estado</th>
              
                
              </tr>
             
            </thead>
            <tbody>
              <?php 
             
                  
      $Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];

      $clientes = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);


      foreach ($clientes as $key => $value) {
                  
        echo '<tr>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";>'.($key+1).'</td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";>'.$value["Nombre_Cliente"].'</td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  <td style="font-weight:bold; border:1px solid #eee; background: #A9E3E1";></td>
                  
                  ';
                             
                         
       echo '</tr>';   
       $Rnc_Empresa_cxc =  $value["Rnc_Empresa_Cliente"];
       $Rnc_Cliente = $value["Documento"];


       $cxc = ControladorVentas::ctrMostrarVentasReporteCliente($Rnc_Empresa_cxc, $Rnc_Cliente); 

        foreach ($cxc as $key => $valuecxc) {
          

          $Total = $valuecxc["Neto"] + $valuecxc["Impuesto"] - $valuecxc["Descuento"]; 
          $Retencion = $valuecxc["Retencion_Renta"] + $valuecxc["ITBIS_Retenido"];
          $DeudaInicial = $valuecxc["Neto"] + $valuecxc["Impuesto"] - $valuecxc["Descuento"] - $valuecxc["Retencion_Renta"] - $valuecxc["ITBIS_Retenido"];

        


$MontoCobro = bcdiv($valuecxc["MontoCobrado"], '1', 2);
$PorCobrar = $DeudaInicial - $MontoCobro;

            


if ($PorCobrar > 0.001) {
    
    $botonCobro = "<button class='btn btn-danger btn-xs'>POR COBRAR</button>"; 
   
}else{
    
    $botonCobro = "<button class='btn btn-success btn-xs'>COBRADA</button>";  
    

}         
        echo '<tr>
                  <td></td>
                  <td>'.$value["Nombre_Cliente"].'</td>
                  <td>'.$valuecxc["Observaciones"].'</td>
                  <td style="width: 5px">'.$valuecxc["NCF_cxc"].'</td>
                  <td>'.$valuecxc["FechaAnoMes_cxc"].'</td>
                  <td>'.$valuecxc["FechaDia_cxc"].'</td>
                  <td>'.$valuecxc["Moneda"].'</td>
                  <td>'.$valuecxc["Tasa"].'</td>
                  <td>'.number_format($Total, 2).'</td>
                  <td>'.number_format($Retencion, 2).'</td>
                  <td>'.number_format($DeudaInicial, 2).'</td>
                  <td>'.number_format($valuecxc["MontoCobrado"], 2).'</td>
                  <td></td>
                  <td>'.$botonCobro.'</td>
                   ';

                 
                             
                         
       echo '</tr>'; 
       
        $Rnc_Empresa_cxc = $valuecxc["Rnc_Empresa_cxc"];
        $CodigoVenta = $valuecxc["Codigo"];
        $id_Cliente = $valuecxc["id_Cliente"];
        $Rnc_Cliente = $valuecxc["Rnc_Cliente"];
        $NCF_cxc = $valuecxc["NCF_cxc"];
        $Tipo = "FACTURA";

    $cobros = ControladorCXC::ctrMostarPagosCXC($Rnc_Empresa_cxc, $CodigoVenta, $id_Cliente, $Rnc_Cliente, $NCF_cxc, $Tipo);
     

     foreach ($cobros as $key => $valuecobros) {
     
       echo '<tr>
                  <td></td>
                  <td style="font-weight:bold; border:1px solid #eee; color: #F0140A"><i>'.$value["Nombre_Cliente"].'</i></td>
                  <td style="font-weight:bold; border:1px solid #eee; color: #F0140A"><i>'.$valuecobros["Descripcion"].'</i></td>
                  <td style="font-weight:bold, border:1px solid #eee; color: #F0140A"><i>'.$valuecobros["NAsiento"].'</i></td>
                  <td style="font-weight:bold; border:1px solid #eee; color: #F0140A"><i>'.$valuecobros["FechaAnoMes"].'</i></td>
                  <td style="font-weight:bold; border:1px solid #eee; color: #F0140A"><i>'.$valuecobros["FechaDia"].'</i></td>
                  <td style="font-weight:bold; border:1px solid #eee; color: #F0140A"><i>'.$valuecobros["ReciboCXC"].'</i></td>
                  <td style="font-weight:bold; border:1px solid #eee; color: #F0140A"><i>'.$valuecobros["Tasa"].'</i></td>  
                  <td></td>
                  <td></td>
                  <td></td>
                  
                  <td style="font-weight:bold; border:1px solid #eee; color: #F0140A"><i>'.number_format($valuecobros["Monto"], 2).'</i></td>
                  <td style="font-weight:bold; border:1px solid #eee; color: #F0140A"><i>'.number_format($valuecobros["MontoDiferencia"], 2).'</i></td> 
                  <td><i class="fa fa-check-square-o"></i></td>
                  



              ';

                 
                             
                         
       echo '</tr>'; 
       





     }
    




        



        } /*cierre for $cxc*/






}/*cierre for respuesta*/


               ?>

            </tbody>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

           
            
          </table>
        
       

         <?php 
  
        #$eliminarVenta = new ControladorVentas();
        #$eliminarVenta -> ctrEliminarVenta();



        ?>

        </div>        

        
      </div>
      

    </section>
 
  </div>

 