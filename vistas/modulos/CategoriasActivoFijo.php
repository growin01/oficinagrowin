
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="col-xs-3" style="font-size: 30px"><i class="fa fa-th fa-lg" style="padding-left:50px"></i>
        Categorias Activos Fijos
        
      </h1>
      
       <button class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoriafijo"><i class="glyphicon glyphicon-plus-sign fa-lg" style="padding-right:5px"></i>Categoría
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
              $Rnc_Empresa_Categoria_ActivoF = $_SESSION["RncEmpresaUsuario"];


$categoriasActivoF = ControladorCategoriasActivoF::ctrMostrarCategoriasActivoF($Rnc_Empresa_Categoria_ActivoF);
              
             
              foreach ($categoriasActivoF as $key => $value) {
                
                  echo '<tr>
                    <td>'.($key+1).'</td>
                    <td class="text-uppercase">'.$value["Codigo_CategoriaActivoF"].'</td>
                    <td class="text-uppercase">'.$value["Nombre_Categoria_ActivoF"].'</td>
                    <td>'.$value["Usuario_Creador"].'</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-warning btnEditarCategoriaActivoF btn-xs" idCategoriaActivoF="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoriaActivoF"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger btnEliminarCategoriaActivoF btn-xs" idCategoriaActivoF="'.$value["id"].'"><i class="fa fa-times"></i></button>
                                           

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
<div id="modalAgregarCategoriafijo" class="modal fade" role="dialog">
  
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
               <input type="hidden" class="form-control " id="ModuloCategorias" name="ModuloCategorias" value="CategoriasActivoFijo" readonly>

            </div>


          </div>
          <div class="form-group">

                    <div class="input-group">
                    

                      <span class="input-group-addon"><i class="fa fa-key"></i></span> 
                      <?php 

  $Rnc_Empresa_Categoria_ActivoF = $_SESSION["RncEmpresaUsuario"];


$CodigoActivoF = ControladorCategoriasActivoF::ctrMostrarCategoriasActivoF($Rnc_Empresa_Categoria_ActivoF);


      if(!$CodigoActivoF){

        $number = 1;
        $length = 2;
        $string = substr(str_repeat(0, $length).$number, - $length);

        echo ' <input type="text" class="form-control" id="codigocategorias" name="codigocategorias" value="'.$string.'" readonly>
                      ';



          } else{

          foreach ($CodigoActivoF as $key => $value) {

                            
                          }
        $number =$value["Codigo_CategoriaActivoF"]+1;
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
      

      $crearCategoria = new ControladorCategoriasActivoF();
      $crearCategoria -> ctrCrearCategoriaActivoF();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div>

  <!-- Modal -->
<div id="modalEditarCategoriaActivoF" class="modal fade" role="dialog">
  
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
      

      $EditarCategoria = new ControladorCategoriasActivoF();
      $EditarCategoria -> ctrEditarCategoriaActivoF();
      

       ?>
    
    </form>
    <!-- CIERRO EL FORMULARIO *-->

    </div>

  </div>
</div> 

<?php 
$borrarCategoria = new ControladorCategoriasActivoF();
$borrarCategoria -> ctrBorrarCategoriaActivoF();


 ?>
