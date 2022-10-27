<?php 

$Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];

$RncEmpresaUsuario = $_SESSION["RncEmpresaUsuario"];

$taRncEmpresaUsuario = "Rnc_Empresa_Usuario";



$ventas = ControladorVentas::ctrMostrarVentasReporte($Rnc_Empresa_Venta);

$usuarios = ControladorUsuarios::ctrMostrarUsuarios($taRncEmpresaUsuario, $RncEmpresaUsuario);

$arrayVendedores = array();
$arraylistaVendedores = array();

foreach ($ventas as $key => $valueVentas) {

  foreach ($usuarios as $key => $valueUsuarios) {

    if($valueUsuarios["id"] == $valueVentas["id_Vendedor"]){

      #CAPTURAMOS LOS VENDEDORES EN UN ARRAY

      array_push($arrayVendedores, $valueUsuarios["Nombre"]);

      # CAPTURAMOS LOS NOMBRES Y LOS VALORES NETOS EN UN MISMO ARRAY

      $arraylistaVendedores = array($valueUsuarios["Nombre"] => $valueVentas["Neto"]);

       #sumamos los netos de cada vendedor

    foreach ($arraylistaVendedores as $key => $value) {

      $sumaTotalVendedores[$key] += $value;
    
    }





    }

   

    
  }
  


}

$noRepetirNombre = array_unique($arrayVendedores);

 ?>


<!--=========================================
	VENDEDORES
===========================================-->
<div class="box box-success">

	<div class="box-header with-border">

		<h3 class="box-title">Vendedores</h3>
		

	</div>

	<div class="box-body">

		<div class="chart-responsive">
			
			<div class="chart" id="bar-chart1" style="height: 300px;"></div>


		</div>
		



	</div>
	

</div>

<script>
	 //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart1',
      resize: true,
      data: [
      
      <?php 
        
        foreach ($noRepetirNombre as $value) {
           
           echo "{y: '".$value."', a: '".$sumaTotalVendedores[$value]."'},";
         } 

      ?>
        
      ],
      barColors: ['#0af'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Ventas'],
      preUnits: '$',
      hideHover: 'auto'
    });




</script>