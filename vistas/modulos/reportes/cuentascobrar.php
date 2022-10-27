<?php 

error_reporting(0);

$TotalDeuda = 0;
 $TotalCobro = 0;
 $PorCobrar = 0;
$Rnc_Empresa_CXC = $_SESSION["RncEmpresaUsuario"];

$respuesta = ControladorCXC::ctrMostarCXC($Rnc_Empresa_CXC);

foreach ($respuesta as $key => $value) {
  $Deuda = $value["Neto"] + $value["Impuesto"] - $value["Retencion_Renta"] - $value["ITBIS_Retenido"];
  $Cobro = $value["Monto_1"] + $value["Monto_2"] + $value["Monto_3"];
  $PorCobrar = $Deuda - $Cobro;


  $TotalDeuda = $TotalDeuda + $Deuda;
  $TotalCobro = $TotalCobro + $Cobro;


  
}
$inputTotalDeuda = number_format($TotalDeuda, 2);
$inputTotalCobro = number_format($TotalCobro, 2);
 
$PorCobrar = $TotalDeuda - $TotalCobro;
$inputPorCobrar = number_format($PorCobrar, 2);






 ?>
		

 

 <!--*************************************************
	GRAFICOS DE VENTAS 
 *****************************************************-->

 <div class="box box-solid bg-teal-gradient">

 	<div class="box-header">

 		<i class="fa fa-bar-chart"></i>

 		<h3 class="box-title">Cuentas Por Cobrar</h3> 		


 	</div>

 	
 		</div>
     <div class="chart-responsive">
      
          <div class="chart" id="bar-chartporcobrar" style="height: 220px;">
            
          </div>


    </div><!--***************** Inicio ********************** -->



 
 <script>
   //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chartporcobrar',
      resize: true,
      data: [
      
      <?php 
     
       
          echo "{y: '.VENTAS.', a: '".$TotalDeuda."'},";
          echo "{y: 'COBRADO', a: '".$TotalCobro."'},";
          echo "{y: 'POR COBRAR', a: '".$PorCobrar."'},";
        
        

      ?>
        
      ],
      
      xkey: 'y',
      ykeys: ['a'],
      labels: ['TOTAL'],
      preUnits: '$',
      hideHover: 'auto',
      barColors: ['#65D87D']
});



</script>
  





 	

 
