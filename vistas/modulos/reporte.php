
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-5" style="font-size: 30px"><i class="fa fa-pie-chart"></i>
       INFORME DE VENTAS
        
      </h1>

    <a href="ventas" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle  de Ventas</a>

    <a href="cotizaciones" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle  de Cotizaciones</a>

   <a href="reportecxc" class="btn btn-success"><i class="fa fa-server" style="padding-right:5px"></i>Detalle Cuentas Por Cobrar</a>
   
      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Reportes-ventas</li>
      </ol>
    </section>

    
    <section class="content">

      
      <div class="box">


        <div class="box-header with-border">

          <div class="input-group pull-left">
   <button class="btn btn-success" data-toggle="modal" data-target="#modalClientesVentas"><i class="glyphicon glyphicon-saved" style="padding-right:5px"></i>Clientes Vs Ventas
   </div>


          <div class="input-group pull-right" style="padding-right: 250px">

            <button type="button" class="btn btn-default" id="daterange-btn2">

              <span>
                <i class="fa fa-calender"></i>Rango de fecha

              </span>

              <i class="fa fa-caret-down"></i>

            </button>

          </div>
          <br>

 
   <br>

          
          <div class="box-tools pull-right">

            <?php  
            $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];

            if(isset($_GET["fechaInicial"])){

              echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaIncial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'&Rnc_Empresa_Venta='.$_SESSION["RncEmpresaUsuario"].'">';



            } else{

               echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&Rnc_Empresa_Venta='.$_SESSION["RncEmpresaUsuario"].'">';


            }

            

            ?>

            <button class="btn btn-success" style="margin-top:5px;">Descargar Reportes en Excel</button>

            </a>

            
          </div>


        </div>

        <div class="box-body">

          <div class="row">
            <br>
           <div class="col-lg-4">

          <?php 

          include "reportes/ventastotal.php";


          ?>

         </div>
          <div class="col-lg-4">
          <?php 

          include "reportes/cuentascobrar.php";
          ?>

         </div>
          <div class="col-lg-4">
          <?php 

          include "reportes/ventascontado.php";
          ?>

         </div>


            <div class="col-md-6 col-xs-12">
              <?php 

                include "reportes/productos-mas-vendidos.php";

               ?>
            </div>

             <div class="col-md-6 col-xs-12">
              <?php 

                include "reportes/vendedores.php";

               ?>
            </div>

        <div class="col-md-6 col-xs-12">
              <?php 
                include "reportes/clientes.php";
               ?>
        </div>

 
          </div>

        </div>
               
      </div>
     
    </section>

   </div>

   <!--************************************************
                      MODAL AGREGAR USUARIO
  ******************************************************* -->
  <!-- Modal -->
<div id="modalClientesVentas" class="modal fade" role="dialog">
  
  <div class="modal-dialog  modal-lg">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Reporte de Cliente vs Ventas</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas"  data-page-length='100' width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width:5px">#</th>
                <th style="width: 5px">Cliente</th>
                <th>Total ventas</th>
                

              </tr>
              

            </thead>
            

            <tbody>
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


foreach ($noRepetirClientes as $key => $value) {

echo ' <tr>

                <td>'.($key+1).'</td>
                <td>'.$value.'</td>
                <td>'.number_format($sumaTotalClientes[$value]).'</td>


      </tr>';




}
  

 

             
 ?>
            </tbody>

            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                
                 
              </tr>


      </tfoot>     
           
            
          </table>
        
                     
          
        </div>

      
        
      </div>
      
     
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>


<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->