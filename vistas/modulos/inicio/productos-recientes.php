<?php 

$Rnc_Empresa_Productos = $_SESSION["RncEmpresaUsuario"];

$productosRecientes = ControladorProductos::ctrMostrarProductosRecientes($Rnc_Empresa_Productos);
$TotalPro = 0;
$hasta = 0;
foreach ($productosRecientes as $key => $value) {
  $Totalpro = $Totalpro + 1;
}
if($Totalpro > 10){
  $hasta = 10;


}else if ($Totalpro < 5){

   $hasta = 5;


}
else{

}



 ?>
<div class="box box-primary">

   <div class="box-header with-border">

       <h3 class="box-title">Productos Resientes</h3>

          <div class="box-tools pull-right">

            <button type="button" class="btn btn-box-tool" data-widget="collapse">

              <i class="fa fa-minus"></i>
            </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove">
                  <i class="fa fa-times"></i>
              </button>
              
              </div>
            
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
            
              <ul class="products-list product-list-in-box">

               <?php 

                for ($i=0; $i < $hasta; $i++) {
                  
                
            
                echo '<li class="item">
            
                  <div class="product-img">
            
                    <img src="'.$productosRecientes[$i]["Imagen"].'" alt="Product Image">
            
                  </div>
            
                  <div class="product-info">
            
                    <a href="" class="product-title">

                    '.$productosRecientes[$i]["Descripcion"].'
            
                      <span class="label label-warning pull-right">'.$productosRecientes[$i]["Precio-Venta"].'</span>

                      </a>
                    

                    
                  </div>
                
                </li>';

                }

                 ?>
                               
             
              </ul>

            </div>

<div class="box-footer text-center">

  <a href="productos" class="uppercase">Ver todos los productos</a>
  



</div>