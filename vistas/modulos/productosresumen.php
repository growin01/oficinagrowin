
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-pie-chart" style="padding-left:50px"></i>
        ANALISIS DE INVENTARIO
        
      </h1>
      
      <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProductos" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Producto
      </button>
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoria"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Categoría
      </button>

      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"><i class="fa fa-barcode"></i>Productos</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">
        <br>
       

<table border="0" cellspacing="4" cellpadding="4">
              
              <tbody>
                

                 <tr>
                    <td>Desde &nbsp;</td>
                    <td><input type="text" maxlength="6" id="FechaDesdeproductos" name="FechaDesdeproductos" value ="<?php if(isset($_GET["FechaanomesDesde"])){echo $_GET["FechaanomesDesde"];} ?>" placeholder="AñoMes"></td>
                   
                   
                    <td><input type="text" class="col-xs-3" maxlength="2" id="Fechadiadesde" name="Fechadiadesde" value ="<?php if(isset($_GET["FechadiaDesde"])){echo $_GET["FechadiaDesde"];} ?>" placeholder="Día"></td>
                </tr>


               <tr>
                  <td>Hasta &nbsp;</td>
                    <td><input type="text" maxlength="6" id="FechaHastaproductos" name="FechaHastaproductos" value ="<?php if(isset($_GET["FechaanomesHasta"])){echo $_GET["FechaanomesHasta"];} ?>" placeholder="AñoMes">
                    </td>
                   
                    <td>
                      <input type="text" class="col-xs-3" maxlength="2" id="Fechadiahasta" name="Fechadiahasta" value ="<?php if(isset($_GET["FechadiaHasta"])){echo $_GET["FechadiaHasta"];} ?>" placeholder="Día"> </td>


                      <td>
                      <button style ="margin-left: -150px" class="btn btn-warning btnresumenproductos" id="btnresumenproductos"><i class="glyphicon glyphicon-search"></i></button>
                    </td>

                    
              </tr>
             

              
            </tbody>
            

          </table>



        <div class="box-body">
    
              <input type="hidden"  id="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

            
          <!--*****************TABLA  USUARIO********************************* -->
         


          <table class="table table-bordered table-striped dt-responsive productosresumen"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>



              <tr>
                
                <th style="width: 10px">#</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th style="width: 60px">Stock</th>
                <th style="width: 60px">Total Vendido</th>
                <th style="width: 60px">Costo Promedio Ponderado</th>
                <th style="width: 60px">Total Costo</th>
                <th style="width: 60px">Total Venta</th>
                <th style="width: 60px">Ganancias</th>
               

              </tr>

            </thead> 
            <tbody>
              <?php 
              $Rnc_Empresa_Productos = $_SESSION["RncEmpresaUsuario"];
              $productos = ControladorProductos::ctrMostrarProductos($Rnc_Empresa_Productos);
               if(isset($_GET["FechaDesde"])){
                  $Rnc_Empresa_Venta = $_SESSION["RncEmpresaUsuario"];
                  $FechaDesde = $_GET["FechaDesde"];
                  $FechaHasta = $_GET["FechaHasta"];
                  $Orden = "id";

$venta = ControladorVentas::ctrMostrarVentasProductos($Rnc_Empresa_Venta, $FechaDesde, $FechaHasta, $Orden);





    foreach ($productos as $key => $pro) {
        $id = $pro["id"];
        $totalVenta = 0;
        $totalCantidad = 0;
        $totalCompra = 0;
        $costopromedio = 0;
        $ganancias = 0;

                 
          foreach ($venta as $key1 => $producto){
           

            
              
              $listaProducto = json_decode($producto["Producto"], true);

                   foreach ($listaProducto as $key2 => $value) {

                      $idProducto = $value["id"];
                      if($idProducto == $id){

                        $totalVenta = $totalVenta + $value["total"];
                        $totalCantidad = $totalCantidad + $value["cantidad"];
                        if(isset($value["totalcompra"])){
                          $totalCompra = $totalCompra + $value["totalcompra"];

                        }

                      }
                 
                 }
                 }
                 if($totalCantidad > 0){ 

                 $costopromedio = $totalCompra/$totalCantidad;
                  
                  }

                  $ganancias = $totalVenta - $totalCompra;
                  $totalcosto = $costopromedio * $totalCantidad;



if($totalCantidad > 0){ 

                echo'<tr>
                
                   <td>'.($key+1).'</td>';
                    $imagen = "<img src='".$pro["Imagen"]."' width='40px'>";
                  echo'<td>'.$imagen.'</td>
                   <td>'.$pro["Codigo"].'</td>
                   <td>'.$pro["Descripcion"].'</td>';
                   $id = "id";
                  $id_categorias = $pro["id_categorias"];
                  $categorias = ControladorCategorias::ctrMostrarCategoriasPro($id, $id_categorias);

                   echo'<td>'.$categorias["Nombre_Categoria"].'</td>
                   <td>'.$pro["Stock"].'</td>
                    <td>'.$totalCantidad.'</td>
                   <td>'.number_format($costopromedio, 2).'</td>
                   <td>'.number_format($totalcosto, 2).'</td>
                  <td>'.number_format($totalVenta, 2).'</td>
                  <td>'.number_format($ganancias, 2).'</td>
               </tr>';
               
               } 

    }             
 }
              
               ?>
              



            </tbody>           
            

            <tfoot>
              <tr> 

              <th></th>
              <th></th>
              <th></th>
              <th></th>
              <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";>Total</th>
              <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th>
              <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th>
              <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th>
              <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th>
              <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th>
              <th style="font-weight:bold; border:1px solid #eee; background: #C5DEF9";></th>
               
               

              </tr>  
              </tfoot> 
          </table>
        
       

        </div>        

        
      </div>
      

    </section>
 
  </div>

 <div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Categoría</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCategoria" name="RncEmpresaCategoria" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioCategoria" name="UsuarioCategoria" value="<?php echo $_SESSION["Usuario"];?>" readonly>
               <input type="hidden" class="form-control " id="ModuloCategorias" name="ModuloCategorias" value="productosresumen" readonly>

            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <input type="text" class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" placeholder="Ingresar Categoría" required>

            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Categoría</button>

      </div>
      <?php 
      

      $crearCategoria = new ControladorCategorias();
      $crearCategoria -> ctrCrearCategoria();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>



<!--************************************************
                      MODAL AGREGAR PRODUCTOS
  ******************************************************* -->
  <!-- Modal -->
<div id="modalAgregarProductos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Agregar Productos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
<input type="hidden" class="form-control" name="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
<input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $respuesta["id"];?>">

<input type="hidden" class="form-control " id="UsuarioProductos" name="UsuarioProductos" value="<?php echo $_SESSION["Usuario"];?>" readonly>

<input type="hidden" class="form-control " id="ModuloProducto" name="ModuloProducto" value="productosresumen" readonly>

<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">


            </div>


          </div>
         <?php 
    if($_SESSION["Contabilidad"] == 1){
      echo ' <div class="form-group">
            <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-th"></i></span>
  <select class="form-control input" id="plancuentaProducto" name= "plancuentaProducto" required>';

  $Rnc_Empresa_Cuentas = $_SESSION["RncEmpresaUsuario"];
                $id_grupo = 4;
                    
              $planBanco = ControladorProductos::ctrplanProductos($Rnc_Empresa_Cuentas, $id_grupo);

                foreach ($planBanco as $key => $value) {
                  if($value["id_grupo"] == 4 && $value["id_categoria"] == 9 && $value["id_generica"] == "01" && $value["id_subgenerica"] == "001"){ 
                  
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
                 }
                 
                  
                }
                 foreach ($planBanco as $key => $value) {
                
                  
                  echo '<option value="'.$value["id"].'">'.$value["id_grupo"].'.'.$value["id_categoria"].'.'.$value["id_generica"].'.'.$value["id_subgenerica"].'-'.$value["Nombre_subCuenta"].'</option>';
               
                  
                }

echo'</select>
              </div>
            </div>';

    }else{


}


     ?>


          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control" id="nuevaCategoria" name="nuevaCategoriaproductos" required>
                <option value="">Selecionar Categoria</option>
                
                <?php 
                $Rnc_Empresa_Categoria = $_SESSION["RncEmpresaUsuario"];

                $categorias = ControladorCategorias::ctrMostrarCategorias($Rnc_Empresa_Categoria);

                foreach ($categorias as $key => $value) {
                  echo '<option value="'.$value["id"].'">'.$value["Nombre_Categoria"].'</option>';
                  
                }

                 ?>
               
              </select>

            </div>

          </div>
           <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control" id="nuevoTipo" name="nuevoTipo" required>
                <option value="">Selecionar Tipo de Producto</option>
                <option value="1">Venta</option>
                <option value="2">Servicio</option>
                <option value="3">Alquiler</option>
                
              
               
              </select>

            </div>

          </div>

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Código" required>

            </div>

          </div>
          

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>

            </div>

          </div>
        


          <div class="form-group">

            <div class="panel">SUBIR IMAGEN</div>
            <input type="file" class="nuevaImagen" name="nuevaImagen">
            <p class="help-block">Peso maximo de la IMAGEN 2MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>
         
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Productos</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $crearProductos = new ControladorProductos();
      $crearProductos -> ctrCrearProducto();




     ?>

    </div>

  </div>
</div>

<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->




