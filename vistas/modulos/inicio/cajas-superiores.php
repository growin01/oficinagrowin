<?php 
 $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
 $periodo = $_SESSION["Anologin"];

$ventas = ControladorVentas::ctrSumaTotalVentas($Rnc_Empresa_Venta, $periodo);

$gastos = ControladorVentas::ctrSumaTotalGastos($Rnc_Empresa_Venta, $periodo);

$Rnc_Empresa_Categoria = $_SESSION["RncEmpresaUsuario"];

$categorias = ControladorCategorias::ctrMostrarCategorias($Rnc_Empresa_Categoria);

$totalCategorias = count($categorias);

$Rnc_Empresa_Cliente = $_SESSION["RncEmpresaUsuario"];

$Clientes = ControladorClientes::ctrMostrarClientes($Rnc_Empresa_Cliente);

$totalClientes = count($Clientes);

$Rnc_Empresa_Productos = $_SESSION["RncEmpresaUsuario"];


$productos = ControladorProductos::ctrMostrarProductos($Rnc_Empresa_Productos);

$totalProductos = count($productos);

$Rnc_Empresa_Proyectos = $_SESSION["RncEmpresaUsuario"];
$Proyectos = ControladorProyecto::ctrMostrarProyectos($Rnc_Empresa_Proyectos);

$totalproyectos = count($Proyectos);
     

      $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
      $Rnc_Empresa_Master = null;
      $Orden = "id";

      $Empresas = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);
     
      if($Empresas["Tipo_Empresa"] == "Firma" && $Empresas["Rnc_Empresa_Master"] == $Rnc_Empresa && $Empresas["Rnc_Empresa"] == $Rnc_Empresa){

          $Rnc_Empresa = $_SESSION["RncEmpresaUsuario"];
               $Rnc_Empresa_Master = $_SESSION["RncEmpresaUsuario"];
               $Orden = "id";
              

              $respuesta = ControladorEmpresas::ctrEmpresas($Rnc_Empresa, $Rnc_Empresa_Master, $Orden);
              $totalEmpresas = 0;
     
              foreach ($respuesta as $key => $value){

                if($value["Rnc_Empresa_Master"] ==  $Rnc_Empresa_Master && $value["Rnc_Empresa"] != $Rnc_Empresa_Master){ 
                 $totalEmpresas = $totalEmpresas + 1;


              }
        }
       }
      
 ?>


 <?php 
 if($Empresas["Tipo_Empresa"] == "Firma" && $Empresas["Rnc_Empresa_Master"] == $Rnc_Empresa){
  echo '<div class="col-lg-2 col-xs-3">

         
  <div class="small-box bg-gray">
          
          <div class="inner">
           <h2 style="font-weight: bold;">'.$totalEmpresas.'</h2>
          
               <h4>Empresas</h4>
          
             
          
          </div>
          
        <div class="icon">
          
              <i class="fa fa-address-book"></i>
          
        </div>
          
      <a href="listado-empresas" class="small-box-footer">

        Más info <i class="fa fa-arrow-circle-right"></i>

      </a>
          
    </div>

</div>';
        


 }





 ?>



<div class="col-lg-2 col-xs-3">

         
  <div class="small-box bg-aqua">
          
          <div class="inner">
          
         <h2 style="font-weight: bold;">$<?php echo number_format($ventas["total"],2);?></h2>

            <h4>Ventas</h4>
              
          
          </div>
          
        <div class="icon">
          
              <i class="ion ion-social-usd"></i>
          
        </div>
          
      <a href="ventas" class="small-box-footer">

        Más info <i class="fa fa-arrow-circle-right"></i>

      </a>
          
    </div>

</div>

<div class="col-lg-2 col-xs-3">

         
  <div class="small-box bg-aqua">
          
          <div class="inner">
          
              <h2 style="font-weight: bold;">$<?php echo number_format($gastos["total"],2);?></h2>

          <h4>Gastos</h4>
              
          
          </div>
          
        <div class="icon">
          
              <i class="ion ion-social-usd"></i>
          
        </div>
          
      <a href="reporte-606" class="small-box-footer">

        Más info <i class="fa fa-arrow-circle-right"></i>

      </a>
          
    </div>

</div>
        
<div class="col-lg-2 col-xs-3">

         
  <div class="small-box bg-green">
            
      <div class="inner">
              
              <h2 style="font-weight: bold;"><?php echo number_format($totalCategorias);?></h2>


              <h4>Categorías</h4>
      </div>

      <div class="icon">

              <i class="ion ion-clipboard"></i>
      
      </div>

            <a href="categorias" class="small-box-footer">
              Más info <i class="fa fa-arrow-circle-right"></i>
            </a>
      
      </div>

</div>

<?php 
if($Empresas["Proyecto"] == 1){
  echo '<div class="col-lg-2 col-xs-3">
          <div class="small-box bg-navy">
            
              <div class="inner">
              
                <h2 style="font-weight: bold;">'.$totalproyectos.'</h2>

                <h4>Proyectos</h4>
              </div>

              <div class="icon">

                <i class="ion ion-clipboard"></i>
      
              </div>

            <a href="proyectos" class="small-box-footer">
              Más info <i class="fa fa-arrow-circle-right"></i>
            </a>
      
      </div>

</div>';
  }



 ?>
        <!-- ./col -->
<div class="col-lg-2 col-xs-3">
          <!-- small box -->
  <div class="small-box bg-yellow">
           
           <div class="inner">
              
              <h2 style="font-weight: bold;"><?php echo number_format($totalClientes);?></h2>

              <h4>Clientes</h4>
            
            </div>
            
          <div class="icon">

              <i class="ion ion-person-add"></i>

          </div>

            <a href="clientes" class="small-box-footer">
            Más info <i class="fa fa-arrow-circle-right"></i>
            </a>

  </div>

</div>
        <!-- ./col -->

<div class="col-lg-2 col-xs-3">
          <!-- small box -->
    <div class="small-box bg-red">

            <div class="inner">

              <h2 style="font-weight: bold;"><?php echo number_format($totalProductos);?></h2>

              <h4>Productos</h4>
            
            </div>

            <div class="icon">

              <i class="fa fa-barcode"></i>

            </div>

            <a href="productos" class="small-box-footer">
            Más info <i class="fa fa-arrow-circle-right"></i>
            </a>
    </div>

</div>
        <!-- ./col -->