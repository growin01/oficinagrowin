<?php 

error_reporting(0);

$TotalVenta = 0;
$TotalCredito = 0;
$TotalContado = 0;
$Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
$fechaInicial = null;
$fechaFinal = null;
 $respuesta = ControladorVentas::ctrRangoFechasVentas($Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);

foreach ($respuesta as $key => $value) {

  $TotalVenta = $TotalVenta + $value["Total"];
  
    if($value["Metodo_Pago"] == "04"){

      $TotalCredito = $TotalCredito + $value["Total"];
 
    }else{

      $TotalContado = $TotalContado + $value["Total"];


    }
 
}


    
 ?>


 

 <!--*************************************************
	GRAFICOS DE VENTAS 
 *****************************************************-->

 <div class="box box-solid bg-teal-gradient">

 	<div class="box-header">

 		<i class="fa fa-bar-chart"></i>

 		<h3 class="box-title">Total Ventas</h3> 		


 	</div>

 	
 		</div>
     <div class="chart-responsive">
      
          <div class="chart" id="bar-charttotalventas" style="height: 220px;">
            
          </div>


    </div><!--***************** Inicio ********************** -->



 
 <script>
   //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-charttotalventas',
      resize: true,
      data: [
      
      <?php 
     
       
          echo "{y: 'TOTAL VENTAS', a: '".$TotalVenta."'},";
          echo "{y: 'CREDITO', a: '".$TotalCredito."'},";
          echo "{y: 'CONTADO', a: '".$TotalContado."'},";
        
        

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
  





 	

 
