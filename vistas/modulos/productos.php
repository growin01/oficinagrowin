
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-barcode fa-lg" style="padding-left:50px"></i>
        Productos
        
      </h1>
      
      <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProductos" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Producto
      </button>
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoria"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Categoría
      </button>
       <a href="productosresumen" class="btn btn-success"><i class="fa fa-pie-chart" style="padding-right:5px"></i>Analisis de Inventario
      </a>


      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"><i class="fa fa-barcode"></i>Productos</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">


        <div class="box-body">
          

           
   

<?php 

$Totalcostos = 0;
$Totalventas = 0;

$Rnc_Empresa_Productos = $_SESSION["RncEmpresaUsuario"];


    
$productos = ControladorProductos::ctrMostrarProductos($Rnc_Empresa_Productos); 


foreach ($productos as $key => $value) {
   
    $valorcostos = $value["Stock"] * $value["Precio_Compra"];
    $valorventas = $value["Stock"] * $value["Precio_Venta"];

    $Totalcostos = $Totalcostos + $valorcostos;
    $Totalventas = $Totalventas + $valorventas;

  
}
$inputTotalcostos = number_format($Totalcostos, 2);
$inputTotalventas  = number_format($Totalventas, 2);


 ?>
 <div class="form-group col-xs-12">
  <div class="form-group col-xs-6 pull-right">
<div class="col-xs-4">
   <label>TOTAL VALOR COSTOS</label>
    <input type="text" class="form-control"value="<?php echo $inputTotalcostos;?>" readonly>
</div>
<div class="col-xs-4">
    <label>TOTAL VALOR VENTAS</label>
    <input type="text" class="form-control" value="<?php echo $inputTotalventas;?>" readonly>
</div>

 </div>
           
</div>


          
          

  <input type="hidden"  id="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

            
          <!--*****************TABLA  USUARIO********************************* -->
         

          <table class="table table-bordered table-striped dt-responsive tablaProductos"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>



              <tr>
                <th style="width: 10px">#</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Tipo de Producto</th>
                <th>Stock</th>
                <th>Costo U.</th>
                <th>Total Costos</th>
                <th>Venta U.</th>
                <th>Total Ventas</th>
                <th>N° Vendido</th>
                <th></th>
              </tr>

            </thead>            
            

           
          </table>
        
       

        </div>        

        
      </div>
      

    </section>
 
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

<input type="hidden" class="form-control " id="ModuloProducto" name="ModuloProducto" value="productos" readonly>

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



  <!-- Modal -->
<div id="modalEditarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Productos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
              <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $respuesta["id"];?>">

              <input type="hidden" class="form-control input-lg" id="RncEmpresaProductos" name="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="idproducto" name="idproducto" value="<?php echo $_SESSION["id"];?>" readonly>

              <input type="hidden" class="form-control input-lg" id="UsuarioProductos" name="UsuarioProductos" value="<?php echo $_SESSION["Usuario"];?>" readonly>


            </div>


          </div>
  <div class="form-group" id = "cuentaProducto">
               
  </div>
  <div class="form-group" id = "TipoProducto">
               
  </div>

        

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select title="Categoria del Producto" class="form-control input-lg"  name="editarCategoria" readonly required>
                <option id="editarCategoria"></option>
                
                               
              </select>

            </div>

          </div>
 

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input title="Codigo del Producto" type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" required>

            </div>

          </div>
          

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input title="Descripción del Producto" type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

            </div>

          </div>
          
          <div class="form-group row">
           <div class="col-xs-12 col-sm-6">

              <div class="input-group">
                <span class="input-group-addon">Prec. Compra &nbsp<i class="fa fa-arrow-up"></i></span>
                <input title="Precio de Compra Unitario"type="number" class="form-control" id="PrecioCompra" name="PrecioCompra" min="0" step="any" placeholder="Precio de Compra" required readonly>

              </div>
             
            </div>

        
          <!--*****************cierra input Precio Compra************************* -->

          <!--*****************input de Precio Venta********************** -->
          <div class="col-xs-12 col-sm-6">
            <div class="input-group">

              <span class="input-group-addon">Prec. Venta &nbsp<i class="fa fa-arrow-down"></i></span>
              <input title="Precio de Venta Unitario" type="number" class="form-control" id="PrecioVenta" name="PrecioVenta" min="0" step="any" placeholder="Precio de Venta" required>

            </div>
          </div>
             <br>

            
                <!--*****************CHECKBOX DE PORCENTAJE********************** -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal porcentaje" checked>Utilizar Porcentaje
                    
                  </label>

                </div>
                
              </div>
              <!--*****************ENTRADA DE PORCENTAJE********************** -->
    <div class="col-xs-6" style="padding:0">
        <div class="input-group">
            <input type="number" class="form-control nuevoPorcentaje" name = "Porcentaje" min="0" value="40" required>
              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  
          </div>
                
        </div>
    
 </div> 

          <div class="form-group">

            <div class="panel">SUBIR IMAGEN</div>
            <input type="file" class="nuevaImagen" name="editarImagen">
            <p class="help-block">Peso maximo de la IMAGEN 2MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            <input type="hidden" name="imagenActual" id="imagenActual">

          </div>
          <!--*****************CIERRE SUBIR FOTO************************* -->
          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Productos</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 

      $editarProductos = new ControladorProductos();
      $editarProductos -> ctrEditarProducto();

      


     ?>

    </div>

  </div>
</div>


<div id="modalsumarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #1B8C26; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Sumar Productos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
          <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $_SESSION["idEmpresa"];?>">

          <input type="hidden" class="form-control input-lg" id="RncEmpresaProductos" name="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
          
          <input type="hidden" class="form-control input-lg" id="Sumaidproducto" name="Sumaidproducto" readonly>

          <input type="hidden" class="form-control input-lg" id="UsuarioProductos" name="UsuarioProductos" value="<?php echo $_SESSION["Usuario"];?>" readonly>
          
          <input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
<input type="hidden" class="form-control" id="NombreEmpresa" name="NombreEmpresa" value="<?php echo $_SESSION["NombreEmpresa"]?>">

          
<input type="hidden" class="form-control input-lg" id="sumarTipoProducto" name="sumarTipoProducto" required readonly>

            </div>


          </div>
  

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Código &nbsp<i class="fa fa-code"></i></span>
              <input title="Codigo de Producto" type="text" class="form-control input-lg" id="sumarproductoCodigo" name="sumarproductoCodigo" required readonly>

            </div>
           
          </div>
          

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Descripción &nbsp<i class="fa fa-product-hunt"></i></span>
              <input title="Descripción de Producto" type="text" class="form-control input-lg" id="sumarproductoDescripcion" name="sumarproductoDescripcion" required readonly>

            </div>

          </div>
         
<div class="form-group row">
            

          <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon">Stock Actual &nbsp<i class="fa fa-check"></i></span>
              <input title="Stock de Producto" type="number" class="form-control input-lg" id="StockAnteriorsuma" name="StockAnteriorsuma" min="0" required readonly>

            </div>


          </div>

          <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon">Agregar Stock &nbsp<i class="fa fa-arrow-up"></i></span>
              <input title="Agregar Stock de Producto" type="number" class="form-control input-lg" id="Stocksuma" name="Stocksuma" min="0" value= "0" required>

            </div>


          </div>
</div>
                   
         
          <div class="form-group row">
           <div class="col-xs-12 col-sm-6">

              <div class="input-group">
                <span class="input-group-addon">Prec. Compra &nbsp<i class="fa fa-arrow-up"></i></span>
                <input title="Precio de Compra Unitario"type="number" class="form-control" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de Compra" required>

              </div>
             
            </div>

        
          <!--*****************cierra input Precio Compra************************* -->

          <!--*****************input de Precio Venta********************** -->
          <div class="col-xs-12 col-sm-6">
            <div class="input-group">

              <span class="input-group-addon">Prec. Venta &nbsp<i class="fa fa-arrow-down"></i></span>
              <input title="Precio de Venta Unitario" type="number" class="form-control" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de Venta" required>

            </div>

             <br>

            
                <!--*****************CHECKBOX DE PORCENTAJE********************** -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal porcentaje" checked>Utilizar Porcentaje
                    
                  </label>

                </div>
                
              </div>
              <!--*****************ENTRADA DE PORCENTAJE********************** -->
    <div class="col-xs-6" style="padding:0">
        <div class="input-group">
            <input type="number" class="form-control nuevoPorcentaje" name = "Porcentaje" min="0" value="40" required>
              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  
          </div>
                
        </div>
    
  

            </div>
            <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control input-xs"  maxlength="400" id="Observaciones" name="Observaciones" placeholder=" Obrservaciones del Ajuste de Inventario" required>

            </div>

          </div>
         

          </div>
      
          
        
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Agregar Productos</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 

      $SumarProductos = new ControladorProductos();
      $SumarProductos -> ctrSumarProducto();

      


     ?>

    </div>

  </div>
</div>

<div id="modalrestarProducto" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post" enctype="multipart/form-data">
      
      <div class="modal-header" style="background: #F18D29; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Restar Productos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
<input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $respuesta["id"];?>">

<input type="hidden" class="form-control input-lg" id="RncEmpresaProductos" name="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
          
<input type="hidden" class="form-control input-lg" id="Restaidproducto" name="Restaidproducto" readonly>

<input type="hidden" class="form-control input-lg" id="UsuarioProductos" name="UsuarioProductos" value="<?php echo $_SESSION["Usuario"];?>" readonly>
          
<input type="hidden" class="form-control" id="Contabilidad" name="Contabilidad" value="<?php echo $_SESSION["Contabilidad"]?>">
<input type="hidden" class="form-control" id="NombreEmpresa" name="NombreEmpresa" value="<?php echo $_SESSION["NombreEmpresa"]?>">

          
<input type="hidden" class="form-control input-lg" id="RestaTipoProducto" name="RestaTipoProducto" required readonly>

            </div>


          </div>
  

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Código &nbsp<i class="fa fa-code"></i></span>
              <input title="Codigo de Producto" type="text" class="form-control input-lg" id="restarproductoCodigo" name="restarproductoCodigo" required readonly>

            </div>
           
          </div>
          

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon">Descripción &nbsp<i class="fa fa-product-hunt"></i></span>
              <input title="Descripción de Producto" type="text" class="form-control input-lg" id="restarproductoDescripcion" name="restarproductoDescripcion" required readonly>

            </div>

          </div>
         
<div class="form-group row">
            

          <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon">Stock Actual &nbsp<i class="fa fa-check"></i></span>
              <input title="Stock de Producto" type="number" class="form-control input-lg" id="StockAnteriorrestar" name="StockAnteriorrestar" min="0" required readonly>

            </div>


          </div>

          <div class="form-group col-xs-6">

            <div class="input-group">
              <span class="input-group-addon">Restar Stock &nbsp<i class="fa fa-arrow-down"></i></span>
              <input title="Agregar Stock de Producto" type="number" class="form-control input-lg" id="Stockrestar" name="Stockrestar" min="0" value= "0" required>

            </div>


          </div>
</div>
                   
         
          <div class="form-group row">
           <div class="col-xs-12 col-sm-6">

              <div class="input-group">
                <span class="input-group-addon">Prec. Compra &nbsp<i class="fa fa-arrow-up"></i></span>
                <input title="Precio de Compra Unitario"type="number" class="form-control" id="editarPrecioCompra" name="editarPrecioCompra" min="0" step="any" placeholder="Precio de Compra" required>

              </div>
             
            </div>

        
          <!--*****************cierra input Precio Compra************************* -->

          <!--*****************input de Precio Venta********************** -->
          <div class="col-xs-12 col-sm-6">
            <div class="input-group">

              <span class="input-group-addon">Prec. Venta &nbsp<i class="fa fa-arrow-down"></i></span>
              <input title="Precio de Venta Unitario" type="number" class="form-control" id="editarPrecioVenta" name="editarPrecioVenta" min="0" step="any" placeholder="Precio de Venta" required>

            </div>

             <br>

            
                <!--*****************CHECKBOX DE PORCENTAJE********************** -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal porcentaje" checked>Utilizar Porcentaje
                    
                  </label>

                </div>
                
              </div>
              <!--*****************ENTRADA DE PORCENTAJE********************** -->
    <div class="col-xs-6" style="padding:0">
        <div class="input-group">
            <input type="number" class="form-control nuevoPorcentaje" name = "Porcentaje" min="0" value="40" required>
              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  
          </div>
                
        </div>
    
  

            </div>
            <div class="form-group col-xs-12">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control input-xs"  maxlength="400" id="Observaciones" name="Observaciones" placeholder=" Obrservaciones del Ajuste de Inventario" required>

            </div>

          </div>
         

          </div>
      
          
        
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Restar Productos</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 

      $RestarProductos = new ControladorProductos();
      $RestarProductos -> ctrRestarProducto();

      


     ?>

    </div>

  </div>
</div>


<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->

  <?php 

      $eliminarProductos = new ControladorProductos();
      $eliminarProductos -> ctrEliminarProducto()


   ?>

    <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
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
                <input type="hidden" class="form-control " id="ModuloCategorias" name="ModuloCategorias" value="productos" readonly>

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

