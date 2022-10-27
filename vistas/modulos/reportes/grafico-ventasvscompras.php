<?php 

error_reporting(0);
 $AnoFiscal = $_SESSION["Anologin"];
 $Eneroventa =$_SESSION["Anologin"]."01";
 $Febreroventa =$_SESSION["Anologin"]."02";
 $Marzoventa =$_SESSION["Anologin"]."03";
 $Abrilventa =$_SESSION["Anologin"]."04";
 $Mayoventa =$_SESSION["Anologin"]."05";
 $Junioventa =$_SESSION["Anologin"]."06";
 $Julioventa =$_SESSION["Anologin"]."07";
 $Agostoventa =$_SESSION["Anologin"]."08";
 $Septiembreventa =$_SESSION["Anologin"]."09";
 $Octubreventa =$_SESSION["Anologin"]."10";
 $Noviembreventa =$_SESSION["Anologin"]."11";
 $Diciembreventa =$_SESSION["Anologin"]."12";

 $Enerocompra =$_SESSION["Anologin"]."01";
 $Febrerocompra =$_SESSION["Anologin"]."02";
 $Marzocompra =$_SESSION["Anologin"]."03";
 $Abrilcompra =$_SESSION["Anologin"]."04";
 $Mayocompra =$_SESSION["Anologin"]."05";
 $Juniocompra =$_SESSION["Anologin"]."06";
 $Juliocompra =$_SESSION["Anologin"]."07";
 $Agostocompra =$_SESSION["Anologin"]."08";
 $Septiembrecompra =$_SESSION["Anologin"]."09";
 $Octubrecompra =$_SESSION["Anologin"]."10";
 $Noviembrecompra =$_SESSION["Anologin"]."11";
 $Diciembrecompra =$_SESSION["Anologin"]."12";




 $MontoEneroventa =0;
 $MontoFebreroventa = 0;
 $MontoMarzoventa = 0;
 $MontoAbrilventa = 0;
 $MontoMayoventa = 0;
 $MontoJunioventa = 0;
 $MontoJulioventa = 0;
 $MontoAgostoventa = 0;
 $MontoSeptiembreventa = 0;
 $MontoOctubreventa = 0;
 $MontoNoviembreventa = 0;
 $MontoDiciembreventa = 0;


 $MontoEneroventaB04 =0;
 $MontoFebreroventaB04 = 0;
 $MontoMarzoventaB04 = 0;
 $MontoAbrilventaB04 = 0;
 $MontoMayoventaB04 = 0;
 $MontoJunioventaB04 = 0;
 $MontoJulioventaB04 = 0;
 $MontoAgostoventaB04 = 0;
 $MontoSeptiembreventaB04 = 0;
 $MontoOctubreventaB04 = 0;
 $MontoNoviembreventaB04 = 0;
 $MontoDiciembreventaB04 = 0;              
                  
$Rnc_Empresa_607 = $_SESSION["RncEmpresaUsuario"];
$Orden= "id";

$periodoreporte607 = $AnoFiscal;
      
                 
$VentasAno = Controlador607::ctrMostrarReporte607($Rnc_Empresa_607, $Orden, $periodoreporte607);

foreach ($VentasAno as $key => $value){
  $ExtraerPeriodo607 = substr($value["Fecha_comprobante_AnoMes_607"],0 ,4);
                             
  if($AnoFiscal == $ExtraerPeriodo607){
      if($value["EXTRAER_NCF_607"] <> "B04"){
switch ($value["Fecha_comprobante_AnoMes_607"]) {
          case $Eneroventa:
            $MontoEneroventa = $MontoEneroventa + $value["Monto_Facturado_607"];
          break;
          
          case $Febreroventa:
            $MontoFebreroventa = $MontoFebreroventa + $value["Monto_Facturado_607"];
          break;
          case $Marzoventa:
            $MontoMarzoventa = $MontoMarzoventa + $value["Monto_Facturado_607"];
          break;
          case $Abrilventa:
            $MontoAbrilventa = $MontoAbrilventa + $value["Monto_Facturado_607"];
          break;
          case $Mayoventa:
            $MontoMayoventa = $MontoMayoventa + $value["Monto_Facturado_607"];
          break;
          case $Junioventa:
            $MontoJunioventa = $MontoJunioventa + $value["Monto_Facturado_607"];
          break;
          case $Julioventa:
            $MontoJulioventa = $MontoJulioventa + $value["Monto_Facturado_607"];
          break;
          case $Agostoventa:
            $MontoAgostoventa = $MontoAgostoventa + $value["Monto_Facturado_607"];
          break;
          case $Septiembreventa:
            $MontoSeptiembreventa = $MontoSeptiembreventa + $value["Monto_Facturado_607"];
          break;
          case $Octubreventa:
            $MontoOctubreventa = $MontoOctubreventa + $value["Monto_Facturado_607"];
          break;
          case $Noviembreventa:
            $MontoNoviembreventa = $MontoNoviembreventa + $value["Monto_Facturado_607"];
          break;
          case $Diciembreventa:
            $MontoDiciembreventa = $MontoDiciembreventa + $value["Monto_Facturado_607"];
          break;


        }

            
                              
                               
}elseif($value["EXTRAER_NCF_607"] == "B04"){

        switch ($value["Fecha_comprobante_AnoMes_607"]) {
          case $Eneroventa:
            $MontoEneroventaB04 = $MontoEneroventaB04 + $value["Monto_Facturado_607"];
          break;
          
          case $Febreroventa:
            $MontoFebreroventaB04 = $MontoFebreroventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Marzoventa:
            $MontoMarzoventaB04 = $MontoMarzoventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Abrilventa:
            $MontoAbrilventaB04 = $MontoAbrilventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Mayoventa:
            $MontoMayoventaB04 = $MontoMayoventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Junioventa:
            $MontoJunioventaB04 = $MontoJunioventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Julioventa:
            $MontoJulioventaB04 = $MontoJulioventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Agostoventa:
            $MontoAgostoventaB04 = $MontoAgostoventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Septiembreventa:
            $MontoSeptiembreventaB04 = $MontoSeptiembreventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Octubreventa:
            $MontoOctubreventaB04 = $MontoOctubreventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Noviembreventa:
            $MontoNoviembreventaB04 = $MontoNoviembreventaB04 + $value["Monto_Facturado_607"];
          break;
          case $Diciembreventa:
            $MontoDiciembreventaB04 = $MontoDiciembreventaB04 + $value["Monto_Facturado_607"];
          break;


        }


 
                                
}else{ }

                                       
}


}/*CIERRE FOR EACH*/
$TotalEneroventa =  $MontoEneroventa - $MontoEneroventaB04;
$TotalFebreroventa =  $MontoFebreroventa - $MontoFebreroventaB04;
$TotalMarzoventa =  $MontoMarzoventa - $MontoMarzoventaB04;
$TotalAbrilventa =  $MontoAbrilventa - $MontoAbrilventaB04;
$TotalMayoventa =  $MontoMayoventa - $MontoMayoventaB04;
$TotalJunioventa =  $MontoJunioventa - $MontoJunioventaB04;
$TotalJulioventa =  $MontoJulioventa - $MontoJulioventaB04;
$TotalAgostoventa =  $MontoAgostoventa - $MontoAgostoventaB04;
$TotalSeptiembreventa =  $MontoSeptiembreventa - $MontoSeptiembreventaB04;
$TotalOctubreventa =  $MontoOctubreventa - $MontoOctubreventaB04;
$TotalNoviembreventa =  $MontoNoviembreventa - $MontoNoviembreventaB04;
$TotalDiciembreventa =  $MontoDiciembreventa - $MontoDiciembreventaB04;


/********************* GASTOS **************************/
 $MontoEnerocompra =0;
 $MontoFebrerocompra = 0;
 $MontoMarzocompra = 0;
 $MontoAbrilcompra = 0;
 $MontoMayocompra = 0;
 $MontoJuniocompra = 0;
 $MontoJuliocompra = 0;
 $MontoAgostocompra = 0;
 $MontoSeptiembrecompra = 0;
 $MontoOctubrecompra = 0;
 $MontoNoviembrecompra = 0;
 $MontoDiciembrecompra = 0;

$Rnc_Empresa_606 = $_SESSION["RncEmpresaUsuario"];
$periodoreporte606 = $AnoFiscal;

$ComprasAno = $reporte606 = Controlador606::ctrMostrarReporte606($Rnc_Empresa_606, $Orden, $periodoreporte606);;
                        
foreach ($ComprasAno as $key => $value){
$ExtraerPeriodo606 = substr($value["Fecha_AnoMes_606"],0 ,4);
                         
if($AnoFiscal == $ExtraerPeriodo606){
    $TOTALCOMPRAS = $TOTALCOMPRAS + $value["Total_Monto_Factura_606"];
                               

switch ($value["Fecha_AnoMes_606"]) {
          case $Eneroventa:
            $MontoEnerocompra = $MontoEnerocompra + $value["Total_Monto_Factura_606"];
          break;
          
          case $Febrerocompra:
            $MontoFebrerocompra = $MontoFebrerocompra + $value["Total_Monto_Factura_606"];
          break;
          case $Marzocompra:
            $MontoMarzocompra = $MontoMarzocompra + $value["Total_Monto_Factura_606"];
          break;
          case $Abrilcompra:
            $MontoAbrilcompra = $MontoAbrilcompra + $value["Total_Monto_Factura_606"];
          break;
          case $Mayocompra:
            $MontoMayocompra = $MontoMayocompra + $value["Total_Monto_Factura_606"];
          break;
          case $Juniocompra:
            $MontoJuniocompra = $MontoJuniocompra + $value["Total_Monto_Factura_606"];
          break;
          case $Juliocompra:
            $MontoJuliocompra = $MontoJuliocompra + $value["Total_Monto_Factura_606"];
          break;
          case $Agostocompra:
            $MontoAgostocompra = $MontoAgostocompra + $value["Total_Monto_Factura_606"];
          break;
          case $Septiembrecompra:
            $MontoSeptiembrecompra = $MontoSeptiembrecompra + $value["Total_Monto_Factura_606"];
          break;
          case $Octubrecompra:
            $MontoOctubrecompra = $MontoOctubrecompra + $value["Total_Monto_Factura_606"];
          break;
          case $Noviembrecompra:
            $MontoNoviembrecompra = $MontoNoviembrecompra + $value["Total_Monto_Factura_606"];
          break;
          case $Diciembrecompra:
            $MontoDiciembrecompra = $MontoDiciembrecompra + $value["Total_Monto_Factura_606"];
          break;


        }

}//CIERRE DE SI DE Aﾃ前 FISCAL
}// CIERRE DE FOREACH DE COMPRAS

$TotalEnerocompra =  $MontoEnerocompra;
$TotalFebrerocompra =  $MontoFebrerocompra;
$TotalMarzocompra =  $MontoMarzocompra;
$TotalAbrilcompra =  $MontoAbrilcompra;
$TotalMayocompra =  $MontoMayocompra;
$TotalJuniocompra =  $MontoJuniocompra;
$TotalJuliocompra =  $MontoJuliocompra;
$TotalAgostocompra =  $MontoAgostocompra;
$TotalSeptiembrecompra =  $MontoSeptiembrecompra;
$TotalOctubrecompra =  $MontoOctubrecompra;
$TotalNoviembrecompra =  $MontoNoviembrecompra;
$TotalDiciembrecompra =  $MontoDiciembrecompra; 

$TotalEnero = $TotalEneroventa - $TotalEnerocompra;   
$TotalFebrero =  $TotalFebreroventa - $TotalFebrerocompra;  
$TotalMarzo = $TotalMarzoventa - $TotalMarzocompra;   
$TotalAbril = $TotalAbrilventa - $TotalAbrilcompra;   
$TotalMayo = $TotalMayoventa - $TotalMayocompra;   
$TotalJunio = $TotalJunioventa - $TotalJuniocompra;   
$TotalJulio = $TotalJulioventa - $TotalJuliocompra;   
$TotalAgosto = $TotalAgostoventa - $TotalAgostocompra;   
$TotalSeptiembre = $TotalSeptiembreventa - $TotalSeptiembrecompra;   
$TotalOctubre = $TotalOctubreventa - $TotalOctubrecompra;   
$TotalNoviembre = $TotalNoviembreventa - $TotalNoviembrecompra;   
$TotalDiciembre = $TotalDiciembreventa - $TotalDiciembrecompra; 

$TotalEneroimp = $TotalEnero * 0.27;  
$TotalFebreroimp = $TotalFebrero* 0.27;
$TotalMarzoimp = $TotalMarzo* 0.27;
$TotalAbrilimp = $TotalAbril* 0.27;
$TotalMayoimp = $TotalMayo * 0.27;  
$TotalJunioimp  = $TotalJunio * 0.27; 
$TotalJulioimp = $TotalJulio  * 0.27;  
$TotalAgostoimp = $TotalAgosto* 0.27;
$TotalSeptiembreimp = $TotalSeptiembre * 0.27; 
$TotalOctubreimp = $TotalOctubre * 0.27; 
$TotalNoviembreimp = $TotalNoviembre * 0.27;  
$TotalDiciembreimp = $TotalDiciembre * 0.27;   
    

 ?>

 <!--*************************************************
  GRAFICOS DE VENTAS 
 *****************************************************-->
<div class="col-lg-12">
 
  <div id="chart_div" class="col-lg-6" style="height: 650px; justify-content:center">

                    
</div>
<div id="chart_div1" class="col-lg-6" style="height: 650px; justify-content:center; padding-left: -25px;">

                    
</div>

</div> 
   
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {

        var button = document.getElementById('change-chart');
        var chartDiv = document.getElementById('chart_div');

        var data = google.visualization.arrayToDataTable([
          ['<?php echo 'Periodo '.$AnoFiscal;?>', 'Ventas', 'Gastos'],
          ['ENERO', <?php echo $TotalEneroventa ;?>,<?php echo $TotalEnerocompra;?>],
          ['FEBRERO', <?php echo $TotalFebreroventa ;?>, <?php echo $TotalFebrerocompra;?>],
          ['MARZO', <?php echo $TotalMarzoventa ;?>, <?php echo $TotalMarzocompra;?>],
          ['ABRIL', <?php echo $TotalAbrilventa ;?>, <?php echo $TotalAbrilcompra;?>],
          ['MAYO', <?php echo $TotalMayoventa ;?>, <?php echo $TotalMayocompra;?>],
          ['JUNIO',<?php echo $TotalJunioventa ;?>, <?php echo $TotalJuniocompra;?>],
          ['JULIO', <?php echo $TotalJulioventa ;?>, <?php echo $TotalJuliocompra;?>],
          ['AGOSTO', <?php echo $TotalAgostoventa ;?>, <?php echo $TotalAgostocompra;?>],
          ['SEPTIEMBRE', <?php echo $TotalSeptiembreventa ;?>, <?php echo $TotalSeptiembrecompra;?>],
          ['OCTUBRE', <?php echo $TotalOctubreventa ;?>, <?php echo $TotalOctubrecompra;?>],
          ['NOVIEMBRE', <?php echo $TotalNoviembreventa ;?>, <?php echo $TotalNoviembrecompra;?>],
          ['DICIEMBRE', <?php echo $TotalDiciembreventa ;?>, <?php echo $TotalDiciembrecompra;?>],
        ]);

        

        var classicOptions = {
          
          series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
          },
          title: 'Relación Ventas Vs Gastos',
          vAxes: {
            // Adds titles to each axis.
            0: {title: 'VENTAS'},
            1: {title: 'GASTOS'}
          },
           hAxis: {title: '<?php echo 'Periodo '.$AnoFiscal;?>'}
        };

        

        function drawClassicChart() {
          var classicChart = new google.visualization.ColumnChart(chartDiv);
          classicChart.draw(data, classicOptions);
          button.innerText = 'Change to Material';
          button.onclick = drawMaterialChart;
        }

        drawClassicChart();
    };
    </script>
  
 
   <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
          ['<?php echo 'Periodo '.$AnoFiscal;?>', 'Ganancia', 'Impuesto a Pagar'],
          ['ENERO', <?php echo $TotalEnero ;?>,<?php echo $TotalEneroimp;?>],
          ['FEBRERO', <?php echo $TotalFebrero ;?>, <?php echo $TotalFebreroimp;?>],
          ['MARZO', <?php echo $TotalMarzo ;?>, <?php echo $TotalMarzoimp;?>],
          ['ABRIL', <?php echo $TotalAbril ;?>, <?php echo $TotalAbrilimp;?>],
          ['MAYO', <?php echo $TotalMayo ;?>, <?php echo $TotalMayoimp;?>],
          ['JUNIO',<?php echo $TotalJunio ;?>, <?php echo $TotalJunioimp;?>],
          ['JULIO', <?php echo $TotalJulio ;?>, <?php echo $TotalJulioimp;?>],
          ['AGOSTO', <?php echo $TotalAgosto ;?>, <?php echo $TotalAgostoimp;?>],
          ['SEPTIEMBRE', <?php echo $TotalSeptiembre ;?>, <?php echo $TotalSeptiembreimp;?>],
          ['OCTUBRE', <?php echo $TotalOctubre ;?>, <?php echo $TotalOctubreimp;?>],
          ['NOVIEMBRE', <?php echo $TotalNoviembre ;?>, <?php echo $TotalNoviembreimp;?>],
          ['DICIEMBRE', <?php echo $TotalDiciembre ;?>, <?php echo $TotalDiciembreimp;?>],

        ]);

        var options = {
          title : 'Relación Ganancias vs Impuesto a pagar',
          vAxis: {title: 'Ganancias'},
          hAxis: {title: '<?php echo 'Periodo '.$AnoFiscal;?>'},
          seriesType: 'bars',
          series: {1: {type: 'line'}}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div1'));
        chart.draw(data, options);
      }
    </script>




  

 





  

 
