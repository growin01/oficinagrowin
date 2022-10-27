<?php 

$Rnc_Empresa_Productos = $_SESSION["RncEmpresaUsuario"];

$orden = "Ventas";

$productos = ControladorProductos::ctrMostrarProductosmasVendidos($Rnc_Empresa_Productos, $orden);

$colores = array("red","green","yellow","aqua","purple","blue","cyan","magenta","orange","gold");

$totalVentas = ControladorProductos::ctrMostrarSumaVentas($Rnc_Empresa_Productos);

$TotalProducto = 0;
$hastapro = 0;
foreach ($productos as $key => $value) {
  $Totalproducto = $Totalproducto + 1;
}
if($Totalproducto > 10){
  $hastapro = 10;


}else if ($Totalpro < 5){

   $hastapro = 5;


}
else{

}


 ?>


<div class="box box-default">.

      <div class="box-header with-border">

          <h3 class="box-title">Productos más vendidos</h3>

                       
        </div>
           
            <!-- /.box-header -->
            
        <div class="box-body">
            
              <div class="row">
            
                <div class="col-md-7">
            
                  <div class="chart-responsive">
            
                    <canvas id="pieChart" height="150"></canvas>
            
                  </div>
            
                 
                </div>
            
                
                <div class="col-md-5">
            
                  <ul class="chart-legend clearfix">

                    <?php 

                    for ($i = 0; $i < $hastapro; $i++){

                      echo '<li><i class="fa fa-circle-o text-'.$colores[$i].'"></i> '.$productos[$i]["Descripcion"].'</li>';





                    }





                     ?>


                    
                  </ul>
               
                </div>
               
              </div>
              
          </div>
            <!-- /.box-body -->
           
            <div class="box-footer no-padding">
           
              <ul class="nav nav-pills nav-stacked">

                <?php 

                    for($i = 0; $i < $hastapro; $i++){

                      echo '<li>

                         <img src="'.$productos[$i]["Imagen"].'" class="img-thumbnail" width="60px" style="margin-right:10px">'.$productos[$i]["Descripcion"].'
                        
                        <span class="pull-right text-'.$colores[$i].'">

                          <i class="fa fa-angle-down">
                          </i> '.ceil($productos[$i]["Ventas"]*100/$totalVentas["total"]).' %</span>
                        
                        </a>
                      
                      </li>';

                    }




                 ?>
           
                
              </ul>
            
            </div>
            <!-- /.footer -->
         
          </div>

<script>
  // -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [

  <?php 
  for($i = 0; $i < 10; $i++){

    echo "{
      value    : '".$productos[$i]["Ventas"]."',
      color    : '".$colores[$i]."',
      highlight: '".$colores[$i]."',
      label    : '".$productos[$i]["Descripcion"]."'
    },";



  }



   ?>
    
    
    
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%>'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------

</script>
