
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-barcode fa-lg" style="padding-left:50px"></i>
        Productos Activos Rotativos
        
      </h1>
      
      <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProductos" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Producto
      </button>
      


      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"><i class="fa fa-barcode"></i>Productos</li>
      </ol>
    </section>

    <section class="content">

      
      <div class="box">


        <div class="box-body">

           
              
              <input type="hidden"  id="RncEmpresaActivoR" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>">

            
          <!--*****************TABLA  USUARIO********************************* -->
         


          <table class="table table-bordered table-striped dt-responsive tablaProductosActivoR"  width="100%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>



              <tr>
                <th style="width: 10px">#</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Ubicación</th>
                <th>Código</th>
                <th>Categoria</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>Prec. Venta</th>
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
        
        <h4 class="modal-title">Agregar Productos Activos Rotativos</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de EMPRESA Productos********************** -->

          <div class="form-group">

            <div class="input-group">
             
<input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $_SESSION["idEmpresa"];?>" readonly>

<input type="hidden" class="form-control" id="RncEmpresaActivoR" name="RncEmpresaActivoR" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>

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
              <select class="form-control" id="nuevaCategoriaActivoR" name="nuevaCategoriaActivoR" required>
                <option value="">Selecionar Categoria</option>
                
                <?php 
                $Rnc_Empresa_Categoria_ActivoR = $_SESSION["RncEmpresaUsuario"];

                $categorias = ControladorCategoriasActivoR::ctrMostrarCategoriasActivoR($Rnc_Empresa_Categoria_ActivoR);

                foreach ($categorias as $key => $value) {
                  echo '<option value="'.$value["Codigo_CategoriaActivoR"].'">'.$value["Nombre_Categoria_ActivoR"].'</option>';
                  
                }

                 ?>
               
              </select>

            </div>

          </div>
         

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control" id="nuevoCodigoActivoR" name="nuevoCodigoActivoR" placeholder="Ingresar Código" readonly>

            </div>

          </div>
           <div class="form-group col-xs-4 pull-left" style="padding-left: 0px">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" maxlength="3" id="UbicacionProducto" name="UbicacionProducto" required>

            </div>

          </div>

          <div class="form-group col-xs-4">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control" id="maquetaCompletoActivoR" name="maquetaCompletoActivoR" placeholder="Ingresar Código" readonly>
              </div>
          </div>
           <div class="form-group col-xs-4">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control" id="CodigoCompletoActivoR" name="CodigoCompletoActivoR" placeholder="Ingresar Código" readonly>
              </div>
            </div>

          

       
      
           
          <div class="form-group col-xs-12" id="imagen">
            
          </div>
      
          
         
          <div class="form-group col-xs-12" style="padding: 0px">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>

            </div>

          </div>
          <!--*****************cierra input Descripcion************************* -->

        

              <!--*****************input de STOCK********************** -->

          <div class="form-group col-xs-12" style="padding: 0px">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-check"></i></span>
              <input type="number" class="form-control" name="nuevoStock" min="0" placeholder="Cantidad Disponible" required>

            </div>


          </div>
          

          <div class="form-group row">
            <div class="col-xs-12 col-sm-6">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                <input type="number" class="form-control" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de Compra" required>

              </div>
             
            </div>

        
          <!--*****************cierra input Precio Compra************************* -->

          <!--*****************input de Precio Venta********************** -->
          <div class="col-xs-12 col-sm-6">
            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
              <input type="number" class="form-control" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de Venta" required>

            </div>

             <br>
              <!--*****************CHECKBOX DE PORCENTAJE********************** -->
              <div class="col-xs-6">
                <div class="form-group">
                  <label>
                    <input type="checkbox" class="minimal porcentaje">Utilizar Porcentaje
                    
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

        <button id="disparacodigo" type="submit" class="btn btn-primary">Guardar Productos</button>

      </div>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $crearProductos = new ControladorActivoR();
      $crearProductos -> ctrCrearProductoActivoR();




     ?>

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->

  <!--************************************************
                      MODAL EDITAR PRODCUTO
  ******************************************************* -->
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

 <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $_SESSION["idEmpresa"];?>" readonly>
<input type="hidden" class="form-control" id="RncEmpresaActivoR" name="RncEmpresaActivoR" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
<input type="hidden" class="form-control " id="UsuarioProductos" name="UsuarioProductos" value="<?php echo $_SESSION["Usuario"];?>" readonly>
<input type="hidden" class="form-control " id="ModuloProducto" name="ModuloProducto" value="productos" readonly>
<input type="hidden" class="form-control " id="idActivoR" name="idActivoR"  readonly>
 <input type="hidden" class="form-control input-lg" id="RncEmpresaProductos" name="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
            
            </div>


          </div>

<div class="form-group" id = "cuentaProducto">
               
  </div>
          <!--*****************cierra input de RNC de EMPRESA Productos************************* -->
            <!--*****************SELECTOR DE Categoria********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control input-lg"  name="editarCategoria" readonly required>
                <option id="editarCategoria"></option>
                
                               
              </select>

            </div>

          </div>
            <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control" id="editarCodigoActivoR" name="editarCodigoActivoR" placeholder="Ingresar Código" readonly>

            </div>

          </div>

          <div class="form-group col-xs-3 pull-left" style="padding-left: 0px">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
              <input type="text" class="form-control" maxlength="3" id="EditarUbicacionProducto" name="EditarUbicacionProducto" required readonly>
              <input type="hidden" class="form-control" maxlength="3" id="AntesUbicacionProducto" name="AntesUbicacionProducto" required readonly>

            </div>

          </div>
           <div class="col-xs-1">
                <div class="form-group">
                  <label>
                    <input type="checkbox" id="habilitarubicacion" name="habilitarubicacion" value="1">
                  </label>

                </div>
                
              </div>
          <div class="form-group col-xs-4">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control" id="EditarmaquetaCompletoActivoR" name="EditarmaquetaCompletoActivoR" placeholder="Ingresar Código" readonly>
              </div>
               <input type="hidden" class="form-control" maxlength="3" id="AntesEditarmaquetaCompletoActivoR" name="AntesEditarmaquetaCompletoActivoR" required readonly>
          </div>
           <div class="form-group col-xs-4">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-key"></i></span>
              <input type="text" class="form-control" id="EditarCodigoCompletoActivoR" name="EditarCodigoCompletoActivoR" placeholder="Ingresar Código" readonly>
              </div>
            </div>

          

       
      
           
          <div class="form-group col-xs-12" id="Editarimagen">
            
          </div>
      
          <!--*****************cierra input de Codigo de Productos************************* -->

          <!--*****************input de Descripcion********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

            </div>

          </div>
          <!--*****************cierra input Descripcion************************* -->

        

              <!--*****************input de STOCK********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-check"></i></span>
              <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

            </div>


          </div>
          <!--*****************cierra input STOCK************************* -->
           <!--*****************input de Precio Compra********************** -->

          <div class="form-group row">
            <div class="col-xs-12 col-sm-6">

              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>
                <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" min="0" step="any" required>

              </div>
             
            </div>

        
          <!--*****************cierra input Precio Compra************************* -->

          <!--*****************input de Precio Venta********************** -->
          <div class="col-xs-12 col-sm-6">
            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>
              <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" min="0" step="any" readonly required>

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
                  <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                  <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                  
                </div>
                
              </div>
            </div>

          </div>
          <!--*****************cierra input Precio Venta ************************* -->



          
          <!--*****************SUBIR FOTO********************** -->

          <div class="form-group">

            <div class="panel">SUBIR IMAGEN</div>
            <input type="file" class="nuevaImagen" name="editarImagen">
            <p class="help-block">Peso maximo de la IMAGEN 2MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            <input type="text" name="imagenActual" id="imagenActual">

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

      $editarProductos = new ControladorActivoR();
      $editarProductos -> ctrEditarProductoActivor();

      


     ?>

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR USUARIO
  ******************************************************* -->

  <?php 

      $eliminarProductos = new ControladorActivoR();
      $eliminarProductos -> ctrEliminarActivoR()


   ?>

  