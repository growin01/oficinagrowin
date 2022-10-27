<?php 

$Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];

$Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];





$ventas = ControladorVentas::ctrMostrarVentasReporte($Rnc_Empresa_Venta);

$clientes = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);

$arrayclientes = array();
$arraylistaclientes = array();

foreach ($ventas as $key => $valueVentas) {

  foreach ($clientes as $key => $valueClientes) {

    if($valueClientes["id"] == $valueVentas["id_Cliente"]){

      #CAPTURAMOS LOS VENDEDORES EN UN ARRAY

      array_push($arrayclientes, $valueClientes["Nombre_Cliente"]);

      # CAPTURAMOS LOS NOMBRES Y LOS VALORES NETOS EN UN MISMO ARRAY

      $arraylistaclientes = array($valueClientes["Nombre_Cliente"] => $valueVentas["Neto"]);

          #sumamos los netos de cada vendedor

        foreach ($arraylistaclientes as $key => $value) {

          $sumaTotalClientes[$key] += $value;
        
        }





    }

    


    
  }
  


}

$noRepetirClientes = array_unique($arrayclientes);

 ?>



<!--=========================================
	VENDEDORES
===========================================-->
<div class="box box-primary">

	<div class="box-header with-border">

		<h3 class="box-title">Clientes</h3>
		

	</div>

	<div class="box-body">

		<div class="chart-responsive">
			
			<div class="chart" id="bar-chart2" style="height: 300px;"></div>


		</div>
		



	</div>
	

</div>

<script>
	//BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart2',
      resize: true,
      data: [
          <?php 
        
        foreach ($noRepetirClientes as $value) {
           
           echo "{y: '".$value."', a: '".$sumaTotalClientes[$value]."'},";
         } 

      ?>
        
      ],
      barColors: ['#f6a'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Ventas'],
      preUnits: '$',
      hideHover: 'auto'
    });



</script>