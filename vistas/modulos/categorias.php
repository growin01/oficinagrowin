
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-4" style="font-size: 30px"><i class="fa fa-th fa-lg" style="padding-left:50px"></i>
        Categorias
        
      </h1>
      
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoria"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Categoría
      </button>
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarProductos" class="btn btn-success"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Producto
      </button>
       <a href="productosresumen" class="btn btn-success"><i class="fa fa-pie-chart" style="padding-right:5px"></i>Analisis de Inventario
      </a>

      
      <ol class="breadcrumb">
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active"><i class="fa fa-th"></i>Categorias</li>
      </ol>
    
    </section>

    <section class="content">

      
      <div class="box">

          <!--*****************BOTON DE AGREGAR USUARIO********************************* -->

        
         
          
          
       
        <!--*****************CIERRE DE DIV BOTON DE AGREGAR USUARIO********************************* -->


        <div class="box-body">
          <!--*****************TABLA  USUARIO********************************* -->


          <table class="table table-bordered table-striped dt-responsive tablas" width="60%">

            <!--*****************CABECERA TABLA  USUARIO********************************* -->         
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Nombre de Categoría</th>
                <th>Usuario Creador</th>
                <th>Acciones</th>             

              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

              <?php
              $Rnc_Empresa_Categoria = $_SESSION["RncEmpresaUsuario"];
              $categorias = ControladorCategorias::ctrMostrarCategorias($Rnc_Empresa_Categoria);
              
              foreach ($categorias as $key => $value) {
                
                  echo '<tr>
                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$value["Nombre_Categoria"].'</td>
                    <td>'.$value["Usuario_Creador"].'</td>
                    <td>
                      <div class="btn-group">
                        <button Title="Editar Categoria" class="btn btn-warning btnEditarCategoria btn-xs" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                        <button Title="Eliminar Categoria" class="btn btn-danger btnEliminarCategoria btn-xs" idCategoria="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                           

                      </div>
                      


                    </td>             

                  </tr>';


              }




               ?>

             
              

            </tbody>
            <!--*****************CIERRE CUERPO  TABLA  USUARIO********************************* -->

            
          </table>
        
        <!--*****************CIERRE DE TABLA USUARIO********************************* -->

        </div>        

        
      </div>
      

    </section>
 
  </div>





<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* -->
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
               <input type="hidden" class="form-control " id="ModuloCategorias" name="ModuloCategorias" value="categorias" readonly>

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
    
    
    <!-- CIERRO EL FORMULARIO *-->
      </form>
      

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL AGREGAR categoria
  ******************************************************* --> 
  

   <!--************************************************
                      MODAL AGREGAR Categoria
  ******************************************************* -->
  <!-- Modal -->
<div id="modalEditarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    
    <div class="modal-content">

      <!--OJO OJO OJO OJO LA ETIQUETA FORM ES LA QUE ENVIA LOS INPUT DEBE ENCERRAR todo EL FORMULARIO
        EL ATRIBUTO enctype="multipart/form-data" ES POR QUE EN ESTE FORMULARIO SE ENVIA UN ARCHIVO QUE ES LA FOTO *-->
      <form role="form" method="post">
      
      <div class="modal-header" style="background: #3c8dbc; color:white">
        
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
        <h4 class="modal-title">Editar Categoría</h4>
      
      </div>
      

      <div class="modal-body">

        <div class="box-body">

          <!--*****************input de RNC de la CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCategoria" name="RncEmpresaCategoria" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioCategoria" name="UsuarioCategoria" value="<?php echo $_SESSION["Usuario"];?>" readonly>

            </div>


          </div>
          <!--*****************cierra input RNC de la CATEGORIA************************** -->
            

         <!--*****************input de Nombre de CATEGORIA********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
              <input type="hidden"  name="idCategoria" id="idCategoria">


            </div>

          </div>
          <!--*****************cierra input de Nombre de Usuario************************* -->

          
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Categoría</button>

      </div>
      <?php 
      

      $EditarCategoria = new ControladorCategorias();
      $EditarCategoria -> ctrEditarCategoria();
      

       ?>
    
    
    <!-- CIERRO EL FORMULARIO *-->
      </form>
      

    </div>

  </div>
</div>



<!--************************************************
                    CIERRE DE  MODAL EDITAR categoria
  ******************************************************* -->
   
  <?php 
$borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();


 ?>
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

<input type="hidden" class="form-control " id="ModuloProducto" name="ModuloProducto" value="categorias" readonly>

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
      <!-- CIERRO EL FORMULARIO *-->
    <?php 
      $crearProductos = new ControladorProductos();
      $crearProductos -> ctrCrearProducto();




     ?>
    
    </form>
    

    </div>

  </div>
</div>
