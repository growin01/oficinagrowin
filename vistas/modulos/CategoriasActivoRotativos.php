
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-th fa-lg" style="padding-left:50px"></i>
        Categorias Activos Rotativos
        
      </h1>
      
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoria"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Categoría
      </button>
      
      
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
                 <th>Codigo</th>
                <th>Nombre de Categoría</th>
                <th>Usuario Creador</th>
                <th>Acciones</th>             

              </tr>

            </thead>
            <!--*****************CIERRE CABECERA TABLA  USUARIO********************************* -->
            
            <!--*****************CUERPO  TABLA  USUARIO********************************* -->

            <tbody>

              <?php
              $Rnc_Empresa_Categoria_ActivoR = $_SESSION["RncEmpresaUsuario"];


$categoriasActivoR = ControladorCategoriasActivoR::ctrMostrarCategoriasActivoR($Rnc_Empresa_Categoria_ActivoR);
              
             
              foreach ($categoriasActivoR as $key => $value) {
                
                  echo '<tr>
                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$value["Codigo_CategoriaActivoR"].'</td>
                    <td class="text-uppercase">'.$value["Nombre_Categoria_ActivoR"].'</td>
                    <td>'.$value["Usuario_Creador"].'</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarCategoriaActivoR btn-xs" idCategoriaActivoR="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoriaActivoR"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarCategoriaActivoR btn-xs" idCategoriaActivoR="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                           

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
               <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $_SESSION["idEmpresa"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="RncEmpresaCategoria" name="RncEmpresaCategoria" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control input-lg" id="UsuarioCategoria" name="UsuarioCategoria" value="<?php echo $_SESSION["Usuario"];?>" readonly>
               <input type="hidden" class="form-control " id="ModuloCategorias" name="ModuloCategorias" value="CategoriasActivoRotativos" readonly>

            </div>


          </div>
          <div class="form-group">

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

  $Rnc_Empresa_Categoria_ActivoR = $_SESSION["RncEmpresaUsuario"];


$CodigoActivoR = ControladorCategoriasActivoR::ctrMostrarCategoriasActivoR($Rnc_Empresa_Categoria_ActivoR);


      if(!$CodigoActivoR){

        $number = 1;
        $length = 2;
        $string = substr(str_repeat(0, $length).$number, - $length);

        echo ' <input type="text" class="form-control" id="codigocategorias" name="codigocategorias" value="'.$string.'" readonly>
                      ';



          } else{

          foreach ($CodigoActivoR as $key => $value) {

                            
                          }
        $number =$value["Codigo_CategoriaActivoR"]+1;
        $length = 2;
        $string = substr(str_repeat(0, $length).$number, - $length);
             

     echo ' <input type="text" class="form-control" id="codigocategorias" name="codigocategorias" value="'.$string.'" readonly>';


                      }




                       ?>

                     

                    </div>
                   

                  </div>

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
      

      $crearCategoria = new ControladorCategoriasActivoR();
      $crearCategoria -> ctrCrearCategoriaActivoR();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

  <!-- Modal -->
<div id="modalEditarCategoriaActivoR" class="modal fade" role="dialog">
  
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
         <div class="form-group">

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      
       
             

      <input type="text" class="form-control" id="editarcodigocategorias" name="editarcodigocategorias" readonly>


                     

                    </div>
                   

                  </div>
          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>
              <input type="hidden"  name="idCategoria" id="idCategoria">


            </div>

          </div>
         
                     
          
        </div>

      
        
      </div>
      
      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Categoría</button>

      </div>
      <?php 
      

      $EditarCategoria = new ControladorCategoriasActivoR();
      $EditarCategoria -> ctrEditarCategoriaActivoR();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

<?php 
$borrarCategoria = new ControladorCategoriasActivoR();
$borrarCategoria -> ctrBorrarCategoriaActivoR();


 ?>

<!--************************************************
                    CIERRE DE  MODAL EDITAR categoria
  ******************************************************* -->
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
              <input type="hidden" class="form-control input-lg" name="RncEmpresaProductos" value="<?php echo $_SESSION["RncEmpresaUsuario"];?>" readonly>
              <input type="hidden" class="form-control" id="id_Empresa" name="id_Empresa" value="<?php echo $respuesta["id"];?>">

              <input type="hidden" class="form-control input-lg" id="UsuarioProductos" name="UsuarioProductos" value="<?php echo $_SESSION["Usuario"];?>" readonly>
              <input type="hidden" class="form-control " id="ModuloProducto" name="ModuloProducto" value="categorias" readonly>



            </div>


          </div>
          <!--*****************cierra input de RNC de EMPRESA Productos************************* -->
            <!--*****************SELECTOR DE Categoria********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-th"></i></span>
              <select class="form-control" id="nuevaCategoria" name="nuevaCategoria" required>
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
          <!--*****************cierra SELECTOR DE PEFIL************************* -->
            

         <!--*****************input de Nuevo Codigo de Productos********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-code"></i></span>
              <input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar Código" readonly>

            </div>

          </div>
          <!--*****************cierra input de Codigo de Productos************************* -->

          <!--*****************input de Descripcion********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
              <input type="text" class="form-control" name="nuevaDescripcion" placeholder="Ingresar Descripcion" required>

            </div>

          </div>
          <!--*****************cierra input Descripcion************************* -->

        

              <!--*****************input de STOCK********************** -->

          <div class="form-group">

            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-check"></i></span>
              <input type="number" class="form-control" name="nuevoStock" min="0" placeholder="Cantidad Disponible" required>

            </div>


          </div>
          <!--*****************cierra input STOCK************************* -->
           <!--*****************input de Precio Compra********************** -->

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

          </div>
          <!--*****************cierra input Precio Venta ************************* -->



          
          <!--*****************SUBIR FOTO********************** -->

          <div class="form-group">

            <div class="panel">SUBIR IMAGEN</div>
            <input type="file" class="nuevaImagen" name="nuevaImagen">
            <p class="help-block">Peso maximo de la IMAGEN 2MB</p>
            <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

          </div>
          <!--*****************CIERRE SUBIR FOTO************************* -->
          
                     
          
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