<?php 

error_reporting(0);

$TotalContado = 0;
$TotalDepositado = 0;
$TotalPorDepositar = 0;
$Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
$fechaInicial = null;
$fechaFinal = null;
 $respuesta = ControladorVentas::ctrRangoFechasVentas($Rnc_Empresa_Venta, $fechaInicial, $fechaFinal);

foreach ($respuesta as $key => $value) {

  if($value["Metodo_Pago"] != "04"){

  $TotalContado = $TotalContado + $value["Total"];

        if($value["Estatus"] == "DEPOSITADO"){

          $TotalDepositado = $TotalDepositado + $value["Total"];



        }else {

           $TotalPorDepositar = $TotalPorDepositar + $value["Total"];


        }
  
    

    }
 
}

    

 ?>

 <!--*************************************************
  GRAFICOS DE VENTAS 
 *****************************************************-->

 <div class="box box-solid bg-teal-gradient">

  <div class="box-header">

    <i class="fa fa-bar-chart"></i>

    <h3 class="box-title">Total Ventas de Contado</h3>    


  </div>

  
    </div>
     <div class="chart-responsive">
      
          <div class="chart" id="bar-chartventascontado" style="height: 220px;">
            
          </div>


    </div><!--***************** Inicio ********************** -->



 
 <script>
   //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chartventascontado',
      resize: true,
      data: [
      
      <?php 
     
       
          echo "{y: 'CONTADO', a: '".$TotalContado."'},";
          echo "{y: 'DEPOSITADO', a: '".$TotalDepositado."'},";
          echo "{y: 'POR DEPOSITAR', a: '".$TotalPorDepositar."'},";
        
        

      ?>
        
      ],
      
      xkey: 'y',
      ykeys: ['a'],
      labels: ['TOTAL'],
      preUnits: '$',
      hideHover: 'auto',
      barColors: function(row, series, type) {
    if (type != 'bar') {
      return;
    }
    switch (row.x) {
      case 0: return '#65D87D';
      case 1: return '#2882E1';
      case 2: return '#E14128';
     
    }
  }
});



</script>
  





  

 
